<?php
// namespace Worldpay;
namespace App\Controller;

/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */  



use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
use Cake\Mailer\Email;
use Cake\Routing\Router;
use Cake\Error\Debugger;
 use Worldpay\Worldpay1;

//App::import('webroot', 'Worldpay', array('file'=>array('init.php')));


//require_once(Router::url('/', true).'init.php');



//use Cake\I18n\FrozenDate; 
use Cake\Database\Type; 
//use Cake\I18n\Time;
//use Cake\I18n\Date;
//Type::build('date')->setLocaleFormat('yyyy-MM-dd');

//use Cake\Controller\Component;
// Admin Users Management
class ServicesController extends AppController {

    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['index']);
        //$this->loadComponent('Imagethumb');

        $this->Auth->allow(['result', 'add_favourite', 'details','ajaxaddtocart','purchasepayment','ajaxaddtocartDetails','latestrequestfootercount','latestrequestfooterusercount','latestbookingfooterusercount']);
        $this->loadComponent('Paginator');
     }   
    
    public $uses = array('User','Service');
     
   
     public function addservice() {
        $this->viewBuilder()->layout('default');
        $this->loadModel('Users');
        $this->loadModel('ServiceTypes'); 
        $user = $this->Users->get($this->Auth->user('id'));
        $id=$this->Auth->user('id');
        $uid = $this->request->session()->read('Auth.User.id');
        $utype = $this->request->session()->read('Auth.User.utype');
        $uverify = $user->check_verified;
        //echo $uverify;exit;
        //&& $uverify== 'Y'
        if($uid!='' && isset($uid) && $utype==2 ){
        $this->loadModel('Services');
        
        $service = $this->Services->newEntity();
        
        if ($this->request->is('post')) {

            $flag = true;
           
            $tableRegObj = TableRegistry::get('Services');
           
            // Validating Form
            if($this->request->data['service_name'] == ""){
                $this->Flash->error(__('Service Name can not be null. Please, try again.')); $flag = false;
            }
                      
            if($flag){
                  $this->request->data['provider_id']=$id;
                  $this->request->data['is_active']= 1;
                  $this->request->data['step']= 1;
                $this->request->data['description'] = base64_encode($this->request->data);
                $service = $this->Services->patchEntity($service, $this->request->data);
                if ($rs=$this->Services->save($service)) {
                   
                    //$this->Flash->success('Service added successfully.', ['key' => 'success']);
                    
                    $this->redirect(['action' => 'addservicestep2/'.$rs->id]);
                }
            }
        }
       
        $stname=$this->ServiceTypes->find('all', array('conditions' => array('ServiceTypes.status' =>1)));
        //pr($stname);exit;
        $this->set(compact('service','stname'));
        $this->set('_serialize', ['service']);
        }else{
             $this->Flash->error('You have no permission to access this.');
            return $this->redirect(['controller'=>'Users','action'=>'index']);
        }
    }
    
    
    
    public function addservicestep2($eid=null) {
        $this->viewBuilder()->layout('default');
        $this->loadModel('Users');
        $this->loadModel('Events'); 
        $this->loadModel('Amenities'); 
        $user = $this->Users->get($this->Auth->user('id'));
        $id=$this->Auth->user('id');
        $uid = $this->request->session()->read('Auth.User.id');
        $utype = $this->request->session()->read('Auth.User.utype');
        $uverify = $user->check_verified;
        //echo $uverify;exit;
        //&& $uverify== 'Y'
        if($uid!='' && isset($uid) && $utype==2 ){
        $this->loadModel('Services');
        
        $service = $this->Services->get($eid);
        
        if ($this->request->is('post')) {

            //print_r($this->request->data);exit;

            $flag = true;            
            $tableRegObj = TableRegistry::get('Services');
           
                      
            if($flag){

               /* $prepAddr = str_replace(' ','+',$this->request->data['address']); 
                
                $geocode=file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$prepAddr.'&key=AIzaSyAPCFTHLy2vABYWMKAwTV6zftOl4vwMGy0');
                sleep(5);
                $output= json_decode($geocode);               
                
                $this->request->data['latitude'] = $output->results[0]->geometry->location->lat;
                $this->request->data['longitude'] = $output->results[0]->geometry->location->lng;*/

                  //$this->request->data['provider_id']=$id;
                  //$this->request->data['is_active']= 1;
                $this->request->data['start_time']= date('Y-m-d',strtotime($this->request->data['start_date'])).' '.date('H:i:s',strtotime($this->request->data['start_time1']));
                $this->request->data['end_time']= date('Y-m-d',strtotime($this->request->data['end_date'])).' '.date('H:i:s',strtotime($this->request->data['end_time1']));
               // print_r($this->request->data);exit;
                  $this->request->data['event_id']=implode(',',$this->request->data['event_id']);
                  $this->request->data['amenity_id']=implode(',',$this->request->data['amenity_id']);
                  $this->request->data['step']= 2;

                $service = $this->Services->patchEntity($service, $this->request->data);
                if ($this->Services->save($service)) {
                   
                    //$this->Flash->success('Service added successfully.', ['key' => 'success']);
                    
                    $this->redirect(['action' => 'addservicestep3/'.$eid]);
                }
            }
        }
       
        $eventname=$this->Events->find()->where(['Events.status'=>1])->toArray();
        $amenityname=$this->Amenities->find()->where(['Amenities.status'=>1])->toArray();
        //pr($stname);exit;
        $this->set(compact('eventname','amenityname','service'));
        $this->set('_serialize', ['service']);
        }else{
             $this->Flash->error('You have no permission to access this.');
            return $this->redirect(['controller'=>'Users','action'=>'index']);
        }
    }
    
    
    
     public function addservicestep3($eid=null) {
        $this->viewBuilder()->layout('default');
        $this->loadModel('Users');
        $this->loadModel('Events'); 
        $this->loadModel('Amenities');
        $this->loadModel('ServiceImages'); 
        $this->loadModel('Posts');
        $user = $this->Users->get($this->Auth->user('id'));
        $id=$this->Auth->user('id');
        $uid = $this->request->session()->read('Auth.User.id');
        $utype = $this->request->session()->read('Auth.User.utype');
        $uverify = $user->check_verified;
        //echo $uverify;exit;
        //&& $uverify== 'Y'
        if($uid!='' && isset($uid) && $utype==2 ){
        $this->loadModel('Services');
        
        $service = $this->Services->get($eid);
        $all_image = $this->ServiceImages->find()->where(['service_id' => $eid])->order('is_order')->toArray();
        
        if ($this->request->is('post')) {
            $checkpost = $this->Posts->find()->select(['id'])->where(['service_id' => $eid])->first();
            if(count($checkpost) <= 0){
               $this->request->data['user_id']=$uid;
               $this->request->data['service_id']=$eid;
               $this->request->data['create_date'] = date('Y-m-d H:i:s');               
               $this->request->data['exp_date'] = $service->end_time;
               $this->request->data['update_date'] = date('Y-m-d H:i:s');    
               $post = $this->Posts->newEntity();
               $post = $this->Posts->patchEntity($post, $this->request->data);
               $rs=$this->Posts->save($post);  
            }
            else{
                $post = $this->Posts->get($checkpost->id); 
               $data['exp_date'] = $service->end_time;
               $this->request->data['update_date'] = date('Y-m-d H:i:s');
               $post_time = $this->Posts->patchEntity($post, $data);
               $this->Posts->save($post_time);
            }
            foreach ($all_image as $image) {
                
                
               
               $service_image = $this->ServiceImages->get($image->id); 
               $data['title'] = $this->request->data['title_'.$image->id];
               $data['post_id']= $rs->id;

               $service_image = $this->ServiceImages->patchEntity($service_image, $data);
               $this->ServiceImages->save($service_image);
            }
            /*$flag = true;
           
            $tableRegObj = TableRegistry::get('Services');
           
            
                
                 $arr_ext = array('jpg', 'jpeg', 'gif', 'png');
            if (!empty($this->request->data['image']['name'])) {
                $file = $this->request->data['image']; //put the data into a var for easy use
                $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                $fileName = time() . "." . $ext;
                if (in_array($ext, $arr_ext)) {
                    
                    if ($service->image != "" && $service->image != $fileName ) {
                        $filePathDel = WWW_ROOT . 'service_img' . DS . $service->image;
                        if (file_exists($filePathDel)) {
                            unlink($filePathDel);
                        }
                    }                     
                    move_uploaded_file($file['tmp_name'], WWW_ROOT . 'service_img' . DS . $fileName);
                    //$this->Imagethumb->generateThumb(WWW_ROOT .'service_img/', WWW_ROOT."service_img/thumbs/",$thumb_img_width='350', $filename);
                    $file = $fileName;
                    $this->request->data['image'] = $fileName;
                } else {
                    $flag = false;
                    $this->Flash->error(__('Upload image only jpg,jpeg,png files.'));
                }
            } else {
                $this->request->data['image'] = $service->image;
            }
                
                
                  
                  $this->request->data['step']= 3;
                
                $service = $this->Services->patchEntity($service, $this->request->data);
                if ($this->Services->save($service)) {
                   
                    //$this->Flash->success('Service added successfully.', ['key' => 'success']);
                    
                    $this->redirect(['action' => 'listservice/']);
                }*/
            
            if(empty($all_image)){
                
               $this->Flash->error('Upload atleast one photo.');  
            }else{
             $this->request->data['image'] = $all_image[0]->name;
             $service = $this->Services->patchEntity($service, $this->request->data);
            if ($this->Services->save($service)) {    
                $this->Flash->success('Image added successfully.', ['key' => 'success']);                    
                $this->redirect(['action' => 'listservice/']);
            }
        }
        } 
       
        $this->set(compact('service','all_image'));
        $this->set('_serialize', ['service']);


        }else{
             $this->Flash->error('You have no permission to access this.');
            return $this->redirect(['controller'=>'Users','action'=>'index']);
        }
    }
    
    
    
    
    
    public function listservice() {
        $this->viewBuilder()->layout('default');
        $this->loadModel('Services');
        $this->loadModel('Users');
        $user = $this->Users->get($this->Auth->user('id'));
        $uid = $this->request->session()->read('Auth.User.id');
        $utype = $this->request->session()->read('Auth.User.utype');
        $uverify = $user->check_verified;
        $conditions = ['Services.provider_id'=>$uid];
           
        $this->paginate = [
            'conditions' => $conditions,
            'order' => [ 'id' => 'DESC'],
            'limit'=> 10 
        ];
        $service = $this->paginate($this->Services);
      //  print_r($service);exit;
        //pr($user->toArray());
        $this->set(compact('service','user'));
        $this->set('_serialize', ['service']);
 
    }
    
    public function editservice($eid = null) {
        //$this->viewBuilder()->layout('other_layout');
        $this->loadModel('Users');
        $this->loadModel('Services');
        $this->loadModel('ServiceTypes');
        
        $service = $this->Services->get($eid);
        $service['description'] = base64_decode($service['description']);
        $user = $this->Users->get($this->Auth->user('id'));
        $id=$this->Auth->user('id');
        $uid = $this->request->session()->read('Auth.User.id');
        $utype = $this->request->session()->read('Auth.User.utype');
        $uverify = $user->check_verified;
        if ($this->request->is(['post', 'put'])) {
            //pr($this->request->data); exit;
            $flag = true;
            if($this->request->data['service_name'] == ""){
                $this->Flash->error(__('service Name can not be null. Please, try again.')); $flag = false;
            }
           
            
                        
            if($flag){
                
               $this->request->data['description'] = base64_encode($this->request->data['description']);
                $service = $this->Services->patchEntity($service, $this->request->data);
                
                if ($this->Services->save($service)) {
                    
                    
                    $this->Flash->success(__('Information has been edited successfully.'));
                    return $this->redirect(['action' => 'addservicestep2/'.$eid]);
                } else {
                    $this->Flash->error(__('Service could not be edit. Please, try again.'));
                    return $this->redirect(['action' => 'listservice']);
                }
            } else {
                return $this->redirect(['action' => 'editservice/'.$eid]);
            }           
        }
        
        
        $stname=$this->ServiceTypes->find('all', array('conditions' => array('ServiceTypes.status' =>1)));
       
        $this->set(compact('service','stname'));
        $this->set('_serialize', ['service']);
    }
    
   public function servicedelete($eid = null) {
        $this->loadModel('Services');
        $services = $this->Services->get($eid);
        if ($this->Services->delete($services)) {
            $this->Flash->success(__('Service has been deleted.'));
        } else {
            $this->Flash->error(__('Service could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'listservice']);
    } 

public function servicestatus($eid = null,$status=null) {
           // echo $status;exit;
        $this->loadModel('Services');
        $service = $this->Services->get($eid);
       // $status = $this->Services->get($status);
        if($status==1)
        {
            $this->request->data['is_active'] =0;
        }
        else
        {
           $this->request->data['is_active'] = 1;
        }
       // print_r($this->request->data);exit;
        $service = $this->Services->patchEntity($service, $this->request->data);
                
                if ($this->Services->save($service)) {
            $this->Flash->success(__('Service Status has been changed successfully.'));
        } else {
            $this->Flash->error(__('Service status could not change. Please, try again.'));
        }
        return $this->redirect(['action' => 'listservice']);
    }

    public function result(){
        $this->loadModel('Favourites'); 
        $this->loadModel('Services');
        $this->loadModel('ServiceImages');
        $this->loadModel('Ratings');  
      
       $location = $this->request->data['location'];
       $title = $this->request->data['title'];
       $latitude = $this->request->data['lat'];
       $longitude = $this->request->data['long'];
      $cdate_time=date('Y-m-d H:i:s');

       $start_amount = $this->request->data['start_amount'];
       $end_amount = $this->request->data['end_amount'];

       $uid = $this->request->session()->read('Auth.User.id');
       $condition = array('is_active' => 1,'end_time >=' => $cdate_time);
       if(isset($title) and $title != ""){
        $condition[] = array('Services.service_name LIKE'=>'%'.$title.'%');
       }

       if(isset($start_amount) and $start_amount != ""){
        $condition[] = array('Services.price >='.$start_amount.' and Services.price <='.$end_amount);
       }

       if($uid!='' && isset($uid)){  
            //$condition[] = array('Favourites.user_id' => $user_id);
            $contain = array('Favourites', 'Ratings');
       }
       else{
            $contain = array('Ratings');
       }
       if((isset($latitude) && $latitude != "") && (isset($longitude) && $longitude != "")){
           $distance = 10000;
           $distanceField = '(3959 * acos (cos ( radians(:latitude) )
                            * cos( radians( Services.latitude ) )
                            * cos( radians( Services.longitude )
                            - radians(:longitude) )
                            + sin ( radians(:latitude) )
                            * sin( radians( Services.latitude ) )))';  
            $services = $this->Services->find()
                        ->select([
                            'distance' => $distanceField,
                            'id','service_name', 'price', 'image', 'address'
                        ])
                        ->having(['distance < ' => $distance])
                        ->where($condition)
                        ->bind(':latitude', $latitude, 'float')
                        ->bind(':longitude', $longitude, 'float')
                        ->order('Services.price')
                        ->contain($contain);
        }
        else{
          $services = $this->Services->find()->where($condition)->order('Services.price')->contain($contain);  
        }
                    
         $this->set('services', $this->Paginator->paginate($services));
         $this->set(compact('uid'));
    }

    public function addFavourite(){
        $this->viewBuilder()->layout('false');
        $this->loadModel('Favourites'); 
        
        $uid = $this->request->session()->read('Auth.User.id');
        $fev = $this->Favourites->find()->where(['service_id' => $this->request->data['id'],'user_id'=>$uid])->first();

        if(count($fev) > 0){
                  
            $this->Favourites->deleteAll(['service_id' => $this->request->data['id'],'user_id'=>$uid]);
            $output = array('Ack' => 0);
        }
        else{
            if($uid!='' && isset($uid)){
                $data['service_id'] = $this->request->data['id'];
                $data['user_id'] = $uid;
                $data['add_date'] = date('Y-m-d');   
                $favourite = $this->Favourites->newEntity();
                $favourites = $this->Favourites->patchEntity($favourite, $data);
                if ($this->Favourites->save($favourites)) {
                    $output = array('Ack' => 1, 'msg' => 'Fevourite added successfully.');
                }
                else{
                    $output = array('Ack' => 0);
                }
            }
        }

        echo json_encode($output);exit;
    }

    public function wishlist(){
       $uid = $this->request->session()->read('Auth.User.id');
       
        $this->loadModel('Favourites');
        $this->loadModel('Users');
        $this->loadModel('Services');
        $this->loadModel('Likes');
        $this->loadModel('Comments');
        $this->loadModel('Reports'); 
        $this->loadModel('Posts'); 
        $this->loadModel('ServiceImages');
        // $this->paginate = [
        //     'conditions' => ['Favourites.user_id' => $uid],
        //     'order' => [ 'id' => 'DESC'],
        //     'contain' => ['Services', 'Services.Users', 'Services.Comments', 'Services.Likes', 'Services.Reports'],
        //     'fields' => ['Users.full_name', 'Users.pimg', 'Services.id', 'Services.service_name', 'Services.image', 'Services.created']
        // ];
        // $services = $this->paginate($this->Favourites);
        
        // $services1 = $this->Posts->find()->contain(['Users', 'Comments', 'Likes', 'Reports','ServiceImages'])->where(['Posts.status' => 1, 'Posts.exp_date >=' => $date])->order(['Posts.id'=>'DESC'])->toArray();




  $user_info = $this->Users->find()->where(['id' => $uid,'utype'=>1])->first();

          $latitude = $user_info->latitude;
          $longitude = $user_info->longitude;


          $conn = ConnectionManager::get('default');  
          $distance = 2000; 
           
          $date = date('Y-m-d H:i:s');




$services = $conn->execute('SELECT S.*,S.id as sid,P.id as pid,(SELECT count(*) FROM likes where likes.service_id = P.id ) as like_count,(SELECT count(*) FROM comments where comments.service_id = P.id ) as comment_count ,U.*,U.id as uids FROM favourites as F left join services as S on F.service_id = S.id left join posts as P on S.id = P.service_id left join users as U on S.provider_id = U.id where F.user_id ='.$uid.' order by P.update_date DESC ')->fetchAll('assoc');

    if($services)
    {
        foreach($services as $key=>$service)
        {
             
            $service_image =  $this->ServiceImages->find()->where(['status' => 1,'post_id' => $service['pid']])->order(['ServiceImages.id'=>'DESC'])->toArray();
            if($service_image)
            {
                $services[$key]['service_images'] = $service_image;
            }
            else
            {
                $services[$key]['service_images'] = '';
            }

            $is_likes =  $this->Likes->find()->where(['user_id' => $uid,'service_id' => $service['pid']])->toArray();
            if($is_likes)
            {
                $services[$key]['is_likes'] = 1;
            }
            else
            {
                $services[$key]['is_likes'] = '';
            }
        }
    }
    //print_r($services);exit;




        // $services = $this->Posts->find()->contain(['Users', 'Comments', 'Likes', 'Reports','ServiceImages'])->where(['Posts.status' => 1, 'Posts.exp_date >=' => $date,'Posts.user_id'=>$uid])->order(['Posts.update_date'=>'DESC'])->toArray(); 
        
        $this->set(compact('services', 'uid'));
        $this->set('_serialize', ['services']);
  
    }    

    public function addLike(){
        $this->viewBuilder()->layout('false');
        $this->loadModel('Likes'); 
        $this->loadModel('Messages'); 
        $this->loadModel('Posts');
        $this->loadModel('Users'); 
        $uid = $this->request->session()->read('Auth.User.id');
        $like = $this->Likes->find()->where(['service_id' => $this->request->data['id'],'user_id'=>$uid])->first();
        $service=$this->Posts->find()->where(['id' => $this->request->data['id']])->first();
        

        if(count($like) > 0){
                  
            $this->Likes->deleteAll(['service_id' => $this->request->data['id'],'user_id'=>$uid]);
            $output = array('Ack' => 0);
        }
        else{
            if($uid!='' && isset($uid)){
                $data['service_id'] = $this->request->data['id'];
                $data['user_id'] = $uid;
                $data['date'] = date('Y-m-d h:i:s');   
                $con = $this->Likes->newEntity();
                $likes = $this->Likes->patchEntity($con, $data);
                if ($this->Likes->save($likes)) {
                    $output = array('Ack' => 1, 'msg' => 'Like added successfully.');
                    
                    
                    $conn = ConnectionManager::get('default');  
           $conn->execute("UPDATE `posts` SET `update_date`= '".date('Y-m-d h:i:s')."' WHERE `id` = '".$this->request->data['id']."'");
                    
                    
                    $user_details = $this->Users->find()->where(['id' => $uid])->first(); 
                    $chat_val['from_id'] = $uid;
                    $chat_val['to_id'] =$service->user_id;
                    $chat_val['other_message'] =$uid;
                    $chat_val['message'] = base64_encode($user_details->full_name.'  Like your post');
                    
                    $con = $this->Messages->newEntity();
                    $msg = $this->Messages->patchEntity($con, $chat_val);
                    $this->Messages->save($msg); 
                    
                }
                else{
                    $output = array('Ack' => 0);
                }
            }
        }

        echo json_encode($output);exit;
    }

    public function addComment(){
        $this->viewBuilder()->layout('false');
        $this->loadModel('Comments');
        $this->loadModel('Users');  
        $this->loadModel('Messages'); 
        $this->loadModel('Posts'); 
        $uid = $this->request->session()->read('Auth.User.id');

        if($uid!='' && isset($uid)){
            
            $service=$this->Posts->find()->where(['id' => $this->request->data['id']])->first();
            
            
            $data['service_id'] = $this->request->data['id'];
            $data['comment'] = base64_encode($this->request->data['comment']);
            $data['user_id'] = $uid;
            $data['date'] = date('Y-m-d H:i:s');   
            $con = $this->Comments->newEntity();
            $comments = $this->Comments->patchEntity($con, $data);
            if ($this->Comments->save($comments)) {
                $user_details = $this->Users->find()->where(['id' => $uid])->first(); 
                
                $html = '<div class="media mb-md-3">
                          <img class="mr-3 user-image rounded-circle" src="'.$this->request->webroot.'user_img/'.(($user_details->pimg == "")? "default.png" : 'thumb_'.$user_details->pimg).'" alt="">
                          <div class="media-body">
                            <h6 class="text-capitalize text-dark mb-0"><strong>'.$user_details->full_name.'</strong></h6>
                           <h6 class="mt-0 text-muted mb-0">
                                <small class="new-small"><i class="ion-ios-time-outline pl-md-1"></i> '.date("d M Y H:i:s").' </small>                                      
                            </h6>
                            <small class="text-capitalize font-14 text-dark">
                              '.$this->request->data['comment'].'
                            </small>
                          </div>
                        </div>';

                        
                $output = array('Ack' => 1, 'msg' => 'Comment added successfully.', 'html' => $html);
                
                
                $conn = ConnectionManager::get('default');  
           $conn->execute("UPDATE `posts` SET `update_date`= '".date('Y-m-d h:i:s')."' WHERE `id` = '".$this->request->data['id']."'");
                
                
                
                
                $chat_val['from_id'] = $uid;
                $chat_val['to_id'] =$service->user_id;
                $chat_val['other_message'] = $uid;
                $chat_val['message'] = base64_encode($user_details->full_name.' Comment on your post');

                $con = $this->Messages->newEntity();
                $msg = $this->Messages->patchEntity($con, $chat_val);
                $this->Messages->save($msg);
                
                
                
                
                
                
                
            }
            else{
                $output = array('Ack' => 0);
            }
        }

        echo json_encode($output);exit;
    }

    public function report(){
       $this->viewBuilder()->layout('false');
       $this->loadModel('Reports');
       $this->loadModel('Services'); 
       $this->loadModel('EmailTemplates');
       $this->loadModel('SiteSettings');

        $uid = $this->request->session()->read('Auth.User.id');
        $full_name = $this->request->session()->read('Auth.User.full_name');

        if($uid!='' && isset($uid)){
            $data['service_id'] = $this->request->data['id'];
            $data['user_id'] = $uid;
            $data['date'] = date('Y-m-d H:i:s');   
            $con = $this->Reports->newEntity();
            $report = $this->Reports->patchEntity($con, $data);
            $contactmail= $this->SiteSettings->find()->where(['id' => 1])->first();
            if ($this->Reports->save($report)) {

                $etRegObj = TableRegistry::get('EmailTemplates');
                $emailTemp = $etRegObj->find()->where(['id' => 5])->first()->toArray();
                $service = $this->Services->find()->where(['id' => $this->request->data['id']])->first()->toArray();
                $image = $this->request->webroot.'service_img/'.$service['image'];
                $mail_body = str_replace(array('[IMAGE]', '[NAME]', '[USERNAME]'), array($image, $service['service_name'] , $full_name), $emailTemp['content']);
                //echo $mail_body; //exit;
                $mail_To = $contactmail['contact_email'];
                //$mail_CC = '';
                $mail_subject = $emailTemp['subject'];
                //Sending user email validation link
                $email = new Email('default');
                $email->emailFormat('html')->from(['nit.spandan@gmail.com'=>'5 Star'])
                        ->to($mail_To)
                        ->subject($mail_subject)
                        ->send($mail_body);

               $output = array('Ack' => 1); 
            }
            else{
                $output = array('Ack' => 0); 
            }
        } 
        else{
            $output = array('Ack' => 0);
        }

        echo json_encode($output);exit;  
    }
    public function allComment(){
        $this->viewBuilder()->layout('false');
        $this->loadModel('Comments');
        $this->loadModel('Users');  
        $uid = $this->request->session()->read('Auth.User.id');
        $id = $this->request->data['id'];
        //$uid = $this->request->session()->read('Auth.User.id');

        //if($uid != "" && isset($uid)){
            $comments = $this->Comments->find()->contain(['Users'])->where(['service_id' => $id])->order(['Comments.id' => 'desc'])->toArray();
           $html = "";

            foreach ($comments as $comment) {                
                $cmnt = base64_decode($comment->comment);
                //echo $cmnt;exit;
               $html .= '<div class="media mb-md-3">';
               if($comment->user->id != $uid){
                   $html .= '<a href="javascript:void(0)" class="d-inline-block open_cht" data-id='.$comment->user->id.'><div class="user userCurrent" data-id='.$comment->user->id.'><img class="mr-3 user-image rounded-circle" src="'.$this->request->webroot.'/user_img/'.(($comment->user->pimg == "")? "default.png" : 'thumb_'.$comment->user->pimg).'" alt="" ></div></a>';
                }
                else{
                    $html .= '<a href="javascript:void(0)" class="d-inline-block open_cht" data-id='.$comment->user->id.'>
                        <div class="user userCurrent" data-id='.$comment->user->id.'>
                    <img class="mr-3 user-image rounded-circle" src="'.$this->request->webroot.'/user_img/'.(($comment->user->pimg == "")? "default.png" : 'thumb_'.$comment->user->pimg).'" alt="" >
                    </div>
                      </a>'; 
                }

                $html .=  '<div class="media-body">
                            <h6 class="text-capitalize text-dark mb-0"><strong>'.$comment->user->full_name.'</strong></h6>
                            <h6 class="mt-0 text-muted mb-0">
                              <small class="new-small"><i class="ion-ios-time-outline pr-md-1"></i> '.date_format($comment->date,"d M Y H:i:s").' </small>                                      
                            </h6>
                            <small class="text-capitalize font-14 text-dark">
                              '.$cmnt.'
                            </div>
                          </div>
                        </div>';                          
            }

           

            $output = array('Ack' => 1, 'html' => $html);
            echo json_encode($output);
            die;
        //}

    }

    public function allLike(){
        $this->viewBuilder()->layout('false');
        $this->loadModel('Likes');
        $this->loadModel('Users');  
        $id = $this->request->data['id'];
       
        $likes = $this->Likes->find()->contain(['Users'])->where(['service_id' => $id])->toArray();
        $html = "";
        foreach ($likes as $like) {                

           $html .= '<div class="media mb-md-3">
                        <a href="javascript:void(0)" class="d-inline-block open_cht" data-id='.$like->user->id.'>
                        <div class="user userCurrent" data-id='.$like->user->id.'>
                      <img class="mr-3 user-image rounded-circle" style="width: 50px" src="'.$this->request->webroot.'/user_img/'.(($like->user->pimg == "")? "default.png" : 'thumb_'.$like->user->pimg).'" alt="">
                     </div>
                      </a>
                      <div class="media-body">
                        <h6 class="text-capitalize text-dark mb-0"><strong>'.$like->user->full_name.'</strong></h6>
                        <h6 class="mt-0 text-muted mb-0">
                          <small class="new-small"><i class="ion-ios-time-outline pr-md-1"></i> '.date_format($like->date,"d M Y H:i:s").' </small>                                      
                        </h6>
                      </div>
                    </div>';
        }

        $output = array('Ack' => 1, 'html' => $html);
        echo json_encode($output);
        die;
    }

    public function activities(){
        $uid = $this->request->session()->read('Auth.User.id');
       
        $this->loadModel('Favourites');        
        $this->paginate = [
            'conditions' => ['Favourites.user_id' => $uid],
            'order' => [ 'id' => 'DESC'],
            'contain' => ['Services', 'Services.Users'],
            'fields' => ['Users.full_name', 'Users.pimg', 'Services.id', 'Services.service_name', 'Services.image', 'Services.created']
        ];
        $services = $this->paginate($this->Favourites);
        $this->set(compact('services'));
        $this->set('_serialize', ['services']);
    }

    public function details($id = null){
        $this->loadModel('Services');
        $this->loadModel('Events');
        $this->loadModel('Amenities');
        $this->loadModel('Users');
        $this->loadModel('Ratings');

 $user_id = $this->request->session()->read('Auth.User.id');
        if ($this->request->is('post')) {
            $Ratings = $this->Ratings->newEntity();
            //print_r($this->request->data);exit;
                if (isset($this->request->data['rating']) && !empty($this->request->data['rating'])) {
                    $this->request->data['review'] = base64_encode($this->request->data['review']);
                    $user_id = $this->request->session()->read('Auth.User.id');
                    $this->request->data['user_id'] =  $user_id;
                    $service_id=$this->request->data['service_id'];
                    $review_ex=  $this->Ratings->find()->where(['Ratings.user_id'=>$user_id,'Ratings.service_id'=>$service_id])->toArray();
                    if(count($review_ex)> 0){
                        
                     $this->Flash->success('Alredy review given.', 'default', array('class' => 'error'));  
                    }else{
                    $this->request->data['date_time'] = gmdate('Y-m-d H:i:s');
                    $Ratings = $this->Ratings->patchEntity($Ratings, $this->request->data);
                    if ($this->Ratings->save($Ratings)) {

                        $this->Flash->success('The review has been saved.', 'default', array('class' => 'success'));
                        
                    } else {
                        $this->Flash->success(__('The review could not be saved. Please, try again.'));
                    }
                }
                }
            }
        $service = $this->Services->find()->contain(['ServiceImages','Users','Ratings', 'Ratings.Users', 'Users.Ratings'])->where(['Services.id' => $id])->first();
        // echo "<pre>";
        // print_r($service->provider_id);exit;
        $eid = explode(',', $service->event_id);
        $aid = explode(',', $service->amenity_id);
        $events = $this->Events->find()->where(['id IN' => $eid])->toArray();      
        $amenities = $this->Amenities->find()->where(['id IN' => $aid])->toArray();
       
         $all_review=  $this->Ratings->find()->contain(['Users'])->where(['Ratings.rated_to'=>$service->provider_id])->order(['Ratings.id'=> 'desc'])->toArray();

        $this->set(compact('service', 'events', 'amenities','user_id','all_review'));
        $this->set('_serialize', ['service','user_id','all_review']);

    }

    public function booking($id = null){
        $this->loadModel('Services');
        $this->loadModel('Users');
        $this->loadModel('ServiceImages');
        $this->loadModel('Bookings');
        $uid = $this->request->session()->read('Auth.User.id');
        $service = $this->Services->find()->where(['id' => $id])->first();
        $user_details = $this->Users->find()->where(['id' => $uid])->first();
        if($this->request->is('post')) {
            $data['user_id'] = $uid;
            $data['provider_id'] = $this->request->data['provider_id'];
            $data['service_id'] = $this->request->data['service_id'];
            $data['booking_date'] = date('Y-m-d H:i:s');
            $data['name'] = $this->request->data['name'];
            $data['email'] = $this->request->data['email'];
            $data['phone'] = $this->request->data['phone'];
            $data['price'] = $this->request->data['price'];
            $con = $this->Bookings->newEntity();
            $comments = $this->Bookings->patchEntity($con, $data);
            if ($this->Bookings->save($comments)) {
                
                 $this->Flash->success(__('You have successfully book this event.'));
                 $this->redirect(['controller' => 'Services','action'=>"booking_success"]); 

            }
        }
        $this->set(compact('service', 'user_details'));
        $this->set('_serialize', ['service']);
    }

    public function bookingSuccess(){

    }

     public function uploadPhoto($id = null){
           $this->viewBuilder()->layout('false');
           $this->loadModel('ServiceImages');
            if(!empty($_FILES['files']['name'])){
                $no_files = count($_FILES["files"]['name']);
                for ($i = 0; $i < $no_files; $i++) {
                  if ($_FILES["files"]["error"][$i] > 0) {
                      echo "Error: " . $_FILES["files"]["error"][$i] . "<br>";
                  } else {
                     $pathpart=pathinfo($_FILES["files"]["name"][$i]);                    
                      $ext=$pathpart['extension'];          
                      $uploadFolder = "service_img/";
                      $uploadPath = WWW_ROOT . $uploadFolder;
                      $filename =uniqid().'.'.$ext;
                      $full_flg_path = $uploadPath . '/' . $filename;
                      if (move_uploaded_file($_FILES['files']['tmp_name'][$i], $full_flg_path)) {
                        $data['service_id'] = $id;
                        $data['name'] = $filename;                           
                        $con = $this->ServiceImages->newEntity();
                        $images = $this->ServiceImages->patchEntity($con, $data);
                        if ($rs = $this->ServiceImages->save($images)) {

                           $file = array('filename' => $filename, 'last_id' => $rs->id);
                                                                  
                        }                     
                        
                      } 
                      $file_details[] = $file;

                  }
                  
                  
              }
                $data = array('Ack'=>1, 'data'=>$file_details);
                    
               }
               else {

                 $data = array('Ack'=> 0);
               }
               echo json_encode($data);
              exit();
       }

        public function orderImage(){
           $this->viewBuilder()->layout('false');
           $this->loadModel('ServiceImages');
           $i=1;         
            foreach ($_REQUEST['ids'] as $id) {
               $data['is_order'] = $i;
               $service = $this->ServiceImages->get($id);
               $service = $this->ServiceImages->patchEntity($service, $data);
               $this->ServiceImages->save($service);
               $i++;
            }
             echo json_encode(array('Ack' => 1));
          die;
        }

        
       public function deleteImage(){          
             $this->viewBuilder()->layout('false');
             $this->loadModel('ServiceImages');
             $image = $this->ServiceImages->get($_REQUEST['id']);
            if ($this->ServiceImages->delete($image)){ 
             $data = array('Ack'=> 1);
            }
              else{
                 $data = array('Ack'=> 0);
              }
              echo json_encode($data);
              exit();
       }


       public function mybooking() {
        $this->viewBuilder()->layout('default');
        $this->loadModel('Services');
        $this->loadModel('Bookings');
        $this->loadModel('Users');
        $this->loadModel('Orders');
        $user = $this->Users->get($this->Auth->user('id'));
        $uid = $this->request->session()->read('Auth.User.id');
        $utype = $this->request->session()->read('Auth.User.utype');
        $uverify = $user->check_verified;

        $conditions = ['Orders.user_id'=>$uid,'Orders.user_status'=>1];
           
        $this->paginate = [
            'conditions' => $conditions,
            'contain' => ['Users', 'Services'],
            'order' => [ 'id' => 'DESC'],
            'limit'=> 10 
        ];
        $orders = $this->paginate($this->Orders);
        //pr($service);
       //print_r($service);exit;
        $this->set(compact('orders','user'));
        $this->set('_serialize', ['orders']); 
    }
public function mybooking1() {
        $this->viewBuilder()->layout('default');
        $this->loadModel('Services');
        $this->loadModel('Bookings');
        $this->loadModel('Users');
        $this->loadModel('Orders');
        $user = $this->Users->get($this->Auth->user('id'));
        $uid = $this->request->session()->read('Auth.User.id');
        $utype = $this->request->session()->read('Auth.User.utype');
        $uverify = $user->check_verified;

        $conditions = ['Orders.owoner_id'=>$uid,'Orders.seller_status'=>1];
           
        $this->paginate = [
            'conditions' => $conditions,
            'contain' => ['Users', 'Services'],
            'order' => [ 'id' => 'DESC'],
            'limit'=> 10 
        ];
        $orders = $this->paginate($this->Orders);
        $conn = ConnectionManager::get('default');  
        $total= $conn->execute("select sum(total_amount) as t from orders WHERE `owoner_id` = '".$uid."'")->fetchAll('assoc');
        //pr($service);
       //print_r($orders);exit;
        $this->set(compact('orders','user','total'));
        $this->set('_serialize', ['orders','total']); 
    }
 public function bookingrequest() {
        $this->viewBuilder()->layout('default');
        $this->loadModel('Services');
        $this->loadModel('Bookings');
        $this->loadModel('Users');
        $this->loadModel('TempCarts');

        $user = $this->Users->get($this->Auth->user('id'));
        $uid = $this->request->session()->read('Auth.User.id');
        $utype = $this->request->session()->read('Auth.User.utype');
        $uverify = $user->check_verified;

        $conditions = ['TempCarts.service_owner_id'=>$uid,'TempCarts.is_accept'=>0];
           
        $this->paginate = [
            'conditions' => $conditions,
            'contain' => ['Services','Users'],
            'order' => [ 'id' => 'DESC'],
            'limit'=> 10 
        ];

        $service = $this->paginate($this->TempCarts);
        //pr($service);
        $temp_update = $this->TempCarts->find()->where(['TempCarts.service_owner_id' => $uid])->contain(['Services'])->toArray();
        if($temp_update)
        {
        	foreach ($temp_update as $key => $value) {
        		//print_r($value->id);exit;
        		$servicer = $this->TempCarts->get($value->id);
        		$data['is_read'] = 1;
        
                $servicer = $this->TempCarts->patchEntity($servicer, $data);
                
                $this->TempCarts->save($servicer) ;
        	}
        }
        
       
        $this->set(compact('service','user'));
        $this->set('_serialize', ['service']); 
    }
    

    public function mybookingrequest() {
        $this->viewBuilder()->layout('default');
        $this->loadModel('Services');
        $this->loadModel('Bookings');
        $this->loadModel('Users');
        $this->loadModel('TempCarts');

        $user = $this->Users->get($this->Auth->user('id'));
        $uid = $this->request->session()->read('Auth.User.id');
        $utype = $this->request->session()->read('Auth.User.utype');
        $uverify = $user->check_verified;

        $conditions = ['TempCarts.user_id'=>$uid,'TempCarts.is_accept !='=>3];
           
        $this->paginate = [
            'conditions' => $conditions,
            'contain' => ['Services','Users'],
            'order' => [ 'id' => 'DESC'],
            'limit'=> 10 
        ];
        $service = $this->paginate($this->TempCarts);
        //pr($service);
       
        $this->set(compact('service','user'));
        $this->set('_serialize', ['service']); 
    }


    public function requestreject($id=NULL)
    {
            $this->loadModel('TempCarts');
        $this->loadModel('Messages');
        $service = $this->TempCarts->get($id);
        $temp['is_accept'] = 2;
     $service = $this->TempCarts->patchEntity($service, $temp);
                
                $this->TempCarts->save($service);
                
                
                $chat_val['from_id'] = $service->service_owner_id;
                $chat_val['to_id'] =$service->user_id;
                $chat_val['message'] = base64_encode('Your reservation has been rejected.');
                    
                    

                    $con = $this->Messages->newEntity();
                    $msg = $this->Messages->patchEntity($con, $chat_val);
                    $this->Messages->save($msg);
                
                
                

                $service = $this->TempCarts->find()->where(['TempCarts.id' => $id])->contain(['Services','Users'])->first();


                    $this->loadModel('EmailTemplates');
                $EmailTemplate=$this->EmailTemplates->find()->where(['EmailTemplates.id'=>8])->first();
                
               
                
                $msg_body =str_replace(array('[SERVICENAME]'),array($service['service']['service_name']),$EmailTemplate['content']);
                
                $subject_mail="Booking Request Rejected";
                
                
                
                $email = new Email('default');
                $email->emailFormat('html')->from(['nit.spandan@gmail.com'=>'5 Star'])
                ->to($service['user']['email'])
                ->subject($subject_mail)
                ->send($msg_body);





                return $this->redirect(['action' => 'bookingrequest']);
    }
    
    
    
    
    
    public function requestdelete($id=NULL)
    {
            $this->loadModel('TempCarts');
        $services = $this->TempCarts->get($id);
        $userid = $this->request->session()->read('Auth.User.id');
        if (!isset($userid) && $userid == '') {
            $this->redirect('/');
        }
        
        if ($this->TempCarts->delete($services)) {
            $this->Flash->success(__('Cart item has been deleted.'));
        } else {
            $this->Flash->error(__('Cart item could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'bookingrequest']);


    }
    
    
    
    


 public function cancelrequest($id=NULL)
    {
        $id = base64_decode($id);
            $this->loadModel('TempCarts');
            $this->loadModel('Users');
        
        $service = $this->TempCarts->get($id);
        $temp['is_accept'] = 3;
     $service = $this->TempCarts->patchEntity($service, $temp);
                
                $this->TempCarts->save($service);



                     $service = $this->TempCarts->find()->where(['TempCarts.id' => $id])->contain(['Services','Users'])->first();

//print_r($service);exit;
 $Current_woner_id = $service['service_owner_id'];
          
//exit;

           $providerdetails = $this->Users->find()->where(['Users.id' => $Current_woner_id])->first();

//print_r($providerdetails);exit;
                    $this->loadModel('EmailTemplates');
                $EmailTemplate=$this->EmailTemplates->find()->where(['EmailTemplates.id'=>9])->first();
                
               
                
                $msg_body =str_replace(array('[NAME]','[SERVICENAME]'),array($service['user']['full_name'],$service['service']['service_name']),$EmailTemplate['content']);
                
                $subject_mail="Booking Request Cancelled";
                
                
                
                $email = new Email('default');
                $email->emailFormat('html')->from(['nit.spandan@gmail.com'=>'5 Star'])
                ->to($providerdetails['email'])
                ->subject($subject_mail)
                ->send($msg_body);



                return $this->redirect(['action' => 'mybookingrequest']);
    }


    public function requestaccept($id=NULL)
    {
        
         $this->viewBuilder()->layout('default');
        $this->loadModel('Services');
        $this->loadModel('Bookings');
        $this->loadModel('Users');
        $this->loadModel('TempCarts');

        $user = $this->Users->get($this->Auth->user('id'));
        $uid = $this->request->session()->read('Auth.User.id');
        $utype = $this->request->session()->read('Auth.User.utype');
        

        $service = $this->TempCarts->find()->where(['TempCarts.id' => $id])->contain(['Services','Users'])->first();
       //print_r($service);exit;
        $this->set(compact('service','user'));
        $this->set('_serialize', ['service']); 

    }

     public function requestconfirm($id=NULL)
        {
            $this->loadModel('TempCarts');
            $this->loadModel('Messages');
            $service = $this->TempCarts->get($id);
        
            $temp['is_accept'] = 1;
            $temp['offer_price'] = $this->request->data['offer_price'];
            $service = $this->TempCarts->patchEntity($service, $temp);
                
                if($this->TempCarts->save($service))
                {
                    $chat_val['from_id'] = $service->service_owner_id;
                    $chat_val['to_id'] =$service->user_id;
                    $chat_val['message'] = base64_encode('Your reservation for event '.$this->request->data['service_name'].' has been confirmed, please review details and proceed to complete payment or contact event manager. Welcome to #StarCity');
                    
                    

                    $con = $this->Messages->newEntity();
                    $msg = $this->Messages->patchEntity($con, $chat_val);
                    $this->Messages->save($msg);

                    $this->loadModel('EmailTemplates');
                    $EmailTemplate=$this->EmailTemplates->find()->where(['EmailTemplates.id'=>7])->first();
                
               
                
                    $msg_body =str_replace(array('[SERVICENAME]'),array($this->request->data['service_name']),$EmailTemplate['content']);
                
                    $subject_mail="Booking Request";
                
                
                
                    $email = new Email('default');
                    $email->emailFormat('html')->from(['nit.spandan@gmail.com'=>'5 Star'])
                    ->to($this->request->data['email'])
                    ->subject($subject_mail)
                    ->send($msg_body);

                    $this->Flash->success('Request Confirmed Successfully', 'default', array('class' => 'success'));
                    }
                    return $this->redirect(['action' => 'bookingrequest']);
        }

    public function bookingdetails($id) {
        //$id = base64_decode($id);
        $this->viewBuilder()->layout('default');
        $this->loadModel('Services');
        $this->loadModel('Orders');
        $this->loadModel('Users');
        $this->loadModel('Ratings');
        $user = $this->Users->get($this->Auth->user('id'));
        $uid = $this->request->session()->read('Auth.User.id');
        $utype = $this->request->session()->read('Auth.User.utype');
        $uverify = $user->check_verified;
        
        $Ratings = $this->Ratings->newEntity();
        
        //$id=  base64_decode($id);
        
        
        $service=  $this->Orders->find()->where(['Orders.id'=>$id])->contain(['Services'])->first();
        //print_r($service);exit;
       if ($this->request->is('post')) {
                if (isset($this->request->data['user_id']) && !empty($this->request->data['user_id'])) {
                    $user_id=$this->request->data['user_id'];
                    $service_id=$this->request->data['service_id'];
                    $review_ex=  $this->Ratings->find()->where(['Ratings.user_id'=>$user_id,'Ratings.service_id'=>$service_id])->toArray();
                    if(count($review_ex)> 0){
                        
                     $this->Flash->success('Alredy review given.', 'default', array('class' => 'error'));  
                    }else{
                    $this->request->data['date_time'] = gmdate('Y-m-d H:i:s');
                    $Ratings = $this->Ratings->patchEntity($Ratings, $this->request->data);
                    if ($this->Ratings->save($Ratings)) {

                        $this->Flash->success('The review has been saved.', 'default', array('class' => 'success'));
                        
                    } else {
                        $this->Flash->success(__('The review could not be saved. Please, try again.'));
                    }
                }
                }
            }
       
         $myreview=  $this->Ratings->find()->where(['Ratings.user_id'=>$uid,'Ratings.service_id'=>$service['service_id']])->contain(['Users'])->first();   
            
        //print_r($myreview);
            
        $this->set(compact('service','user','myreview'));
        $this->set('_serialize', ['service']); 
    }
    
    /*This is for service end*/
    public function bookingdetails1($id) {
        //$id = base64_decode($id);
        $this->viewBuilder()->layout('default');
        $this->loadModel('Services');
        $this->loadModel('Orders');
        $this->loadModel('Users');
        $this->loadModel('Ratings');
        $user = $this->Users->get($this->Auth->user('id'));
        $uid = $this->request->session()->read('Auth.User.id');
        $utype = $this->request->session()->read('Auth.User.utype');
        $uverify = $user->check_verified;
        
        $Ratings = $this->Ratings->newEntity();
        
        //$id=  base64_decode($id);
        
        
        $service=  $this->Orders->find()->where(['Orders.id'=>$id])->contain(['Services','Users'])->first();
        
//$order['id']=$id;
$order['is_view'] = 1;
$service = $this->Orders->patchEntity( $service,$order);
$this->Orders->save($service);


        //print_r($service);exit;
       if ($this->request->is('post')) {
                if (isset($this->request->data['user_id']) && !empty($this->request->data['user_id'])) {
                    $user_id=$this->request->data['user_id'];
                    $service_id=$this->request->data['service_id'];
                    $review_ex=  $this->Ratings->find()->where(['Ratings.user_id'=>$user_id,'Ratings.service_id'=>$service_id])->toArray();
                    if(count($review_ex)> 0){
                        
                     $this->Flash->success('Alredy review given.', 'default', array('class' => 'error'));  
                    }else{
                    $this->request->data['date_time'] = gmdate('Y-m-d H:i:s');
                    $Ratings = $this->Ratings->patchEntity($Ratings, $this->request->data);
                    if ($this->Ratings->save($Ratings)) {

                        $this->Flash->success('The review has been saved.', 'default', array('class' => 'success'));
                        
                    } else {
                        $this->Flash->success(__('The review could not be saved. Please, try again.'));
                    }
                }
                }
            }
       
         $myreview=  $this->Ratings->find()->where(['Ratings.user_id'=>$uid,'Ratings.service_id'=>$service['service_id']])->first();   
            
        //print_r($myreview);
            
        $this->set(compact('service','user','myreview'));
        $this->set('_serialize', ['service']); 
    }
    
    
    public function bookingHistory() {
         $this->viewBuilder()->layout('default');
        $this->loadModel('Services');
        $this->loadModel('Bookings');
        $this->loadModel('Users');
        $this->loadModel('TempCarts');
        $user = $this->Users->get($this->Auth->user('id'));
        $uid = $this->request->session()->read('Auth.User.id');
        $utype = $this->request->session()->read('Auth.User.utype');
        $uverify = $user->check_verified;

        $conditions = ['TempCarts.service_owner_id'=>$uid,'is_accept'=>1];
           
        $this->paginate = [
            'conditions' => $conditions,
            'contain' => ['Users', 'Services'],
            'order' => [ 'id' => 'DESC'],
            'limit'=> 10 
        ];
        $service = $this->paginate($this->TempCarts);
       
        $conn = ConnectionManager::get('default');  
        $total= $conn->execute("select sum(offer_price) as t from temp_carts WHERE `service_owner_id` = '".$uid."'")->fetchAll('assoc');
        
        //print_r($total);
        $this->set(compact('service','user','total'));
        $this->set('_serialize', ['service']);  
    }

    
    
    //spandan
    
    
     public function ajaxaddtocart($id = null) {
        
        $this->viewBuilder()->layout(false);
        $this->loadModel('TempCarts');
        $this->loadModel('Services');
        $Faviourit = $this->TempCarts->newEntity();
        $serviceExist = $this->Services->find()->where(['Services.id' => $id])->toArray();
        if (!$serviceExist) {
            $Msg = 'Invalid Service';
        }
        $userid = $this->request->session()->read('Auth.User.id');
        if (!isset($userid) && $userid == '') {
            $Msg = array('Ack'=> 0, 'data'=> 'Please Login First.');
        } else {
            
           $product = $this->Services->find()->where(['id'=>$id])->first();
           
           $Current_woner_id = $product['provider_id'];
          
           $productsInCart = $this->TempCarts->find()->where(['TempCarts.user_id' => $userid,'is_accept'=> 0])->toArray();

            if ($this->request->is('post')) {
                $product_woner_id = '';
                $alreadyIn = false;
                $woner_check = false;
                if (count($productsInCart) > 0) {
                    foreach ($productsInCart as $productInCart) {
                        $product_woner_id = $productInCart['service_woner_id'];
                        if ($productInCart['service_id'] == $id) {
                            $alreadyIn = true;
                        }
                    }
                }
//echo $userid;
//echo $Current_woner_id;exit;
                // if (!$alreadyIn && !$woner_check && $userid != $Current_woner_id) {

                //     //echo $product['price'];exit;
                //     $this->request->data['service_id'] = $id;
                //     $this->request->data['user_id'] = $userid;
                //     $this->request->data['price'] = $product['price'];
                //     $this->request->data['service_owner_id'] = $Current_woner_id;
                //     $this->request->data['add_date'] = gmdate('Y-m-d H:i:s');
                //     $Faviourit = $this->TempCarts->patchEntity($Faviourit, $this->request->data);
                //     //print_r($this->request->data);exit;
                //     if ($this->TempCarts->save($Faviourit)) {
                //         $Msg = array('Ack'=>1, 'data'=> 'Service added to cart list.');
                //     } else {
                //         $Msg = array('Ack'=>0, 'data'=> 'The Service could not be saved into the cart list. Please, try again.');
                //     }
                   
                // } 
                //echo $alreadyIn;exit;
                if ($userid == $Current_woner_id) {
                    $Msg = array('Ack'=>0, 'data'=> 'You cannot sent request your own Service.');
                } else if($alreadyIn) {
                    $Msg = array('Ack'=>0, 'data'=> 'Service request already sent.');
                }
                else
                {
                     $Msg = array('Ack'=>1, 'data'=> 'Service request sent successfully.');
                }
            }
        }
       echo json_encode($Msg);
       exit();
    }
    
      public function ajaxaddtocartDetails($id = null) {
       $this->loadModel('Services');
        $this->loadModel('Events');
        $this->loadModel('Amenities');
        $this->loadModel('Users');
        $this->loadModel('Ratings');
        $service = $this->Services->find()->contain(['ServiceImages','Users','Ratings', 'Ratings.Users', 'Users.Ratings'])->where(['Services.id' => $id])->first();
       /* echo "<pre>";
        print_r($service);*/
        $eid = explode(',', $service->event_id);
        $aid = explode(',', $service->amenity_id);
        $events = $this->Events->find()->where(['id IN' => $eid])->toArray();      
        $amenities = $this->Amenities->find()->where(['id IN' => $aid])->toArray();
       
        $this->set(compact('service', 'events', 'amenities'));
        $this->set('_serialize', ['service']);

 
     }


public function addtocart($id=null)
{

        
        $this->viewBuilder()->layout(false);
        $this->loadModel('TempCarts');
        $this->loadModel('Services');
         $this->loadModel('Users');
        $Faviourit = $this->TempCarts->newEntity();
        $serviceExist = $this->Services->find()->where(['Services.id' => $id])->toArray();
        if (!$serviceExist) {
            $Msg = 'Invalid Service';
        }
        $userid = $this->request->session()->read('Auth.User.id');
        if (!isset($userid) && $userid == '') {
            $Msg = array('Ack'=> 0, 'data'=> 'Please Login First.');
        } else {

            if($this->request->data['guest'] > 1)
            {

                $product = $this->Services->find()->where(['id'=>$id])->first();
           
           $Current_woner_id = $product['provider_id'];
          


           $providerdetails = $this->Users->find()->where(['Users.id' => $Current_woner_id])->first();
           $userdetails = $this->Users->find()->where(['Users.id' => $userid])->first();
           //print_r($userdetails['full_name']);exit;

           $productsInCart = $this->TempCarts->find()->where(['TempCarts.user_id' => $userid,'TempCarts.is_accept' => 0])->toArray();

            if ($this->request->is('post')) {
                $product_woner_id = '';
                $alreadyIn = false;
                $woner_check = false;
                if (count($productsInCart) > 0) {
                    foreach ($productsInCart as $productInCart) {
                        $product_woner_id = $productInCart['service_woner_id'];
                        if ($productInCart['service_id'] == $id) {
                            $alreadyIn = true;
                        }
                    }
                }
//echo $userid;
//echo $Current_woner_id;exit;
                if (!$alreadyIn && !$woner_check && $userid != $Current_woner_id) {

                    //echo $product['price'];exit;
                    if($this->request->data['guest'] == 0)
                    {
                        $this->request->data['guest'] =1;
                    }
                    $this->request->data['service_id'] = $id;
                    $this->request->data['user_id'] = $userid;
                    $this->request->data['price'] = $product['price'];
                    $this->request->data['event_time'] = date('H:i:s',strtotime($this->request->data['event_time'])) ;
                    $this->request->data['service_owner_id'] = $Current_woner_id;
                    $this->request->data['add_date'] = gmdate('Y-m-d H:i:s');
                    //print_r($this->request->data);exit;
                    $Faviourit = $this->TempCarts->patchEntity($Faviourit, $this->request->data);
                    //print_r($this->request->data);exit;
                    if ($this->TempCarts->save($Faviourit)) {


                        $this->loadModel('EmailTemplates');
                $EmailTemplate=$this->EmailTemplates->find()->where(['EmailTemplates.id'=>6])->first();
                
               
                
                $msg_body =str_replace(array('[NAME]','[SERVICENAME]'),array($userdetails['full_name'],$product['service_name']),$EmailTemplate['content']);
                
                $subject_mail="Booking Request";
                
                
                
                $email = new Email('default');
                $email->emailFormat('html')->from(['nit.spandan@gmail.com'=>'5 Star'])
                ->to($providerdetails['email'])
                ->subject($subject_mail)
                ->send($msg_body);



                        $Msg = array('Ack'=>1, 'data'=> 'Service added to reserved list.');
                    } else {
                        $Msg = array('Ack'=>0, 'data'=> 'The Service could not be saved into the reserved list. Please, try again.');
                    }
                   
                } 
                //echo $alreadyIn;exit;
                if ($userid == $Current_woner_id) {
                    $Msg = array('Ack'=>0, 'data'=> 'You cannot add your own Service.');
                } else if($alreadyIn) {
                    $Msg = array('Ack'=>0, 'data'=> 'Service already in reserved list.');
                }
                else
                {
                     $Msg = array('Ack'=>1, 'data'=> 'Service added to reserved list.');
                }
            }
            $this->redirect(['action' => 'success/']);
            }
            else
            {
                 //print_r($this->request->data);exit;
                $ids = base64_encode($id);
                $this->request->session()->write('event_date', $this->request->data['event_date']);
                $this->request->session()->write('event_time', $this->request->data['event_time']);

                 //$this->redirect(['action' => 'payment/s/'.$ids]);
                 $this->redirect(['controller'=>'Services','action' => 'payment','S', $ids]);
            }
            
           
        }
      // echo json_encode($Msg);
      // exit();
    
}


    public function cart() {
        $this->loadModel('TempCarts');
        $this->loadModel('Services');
        $title_for_layout = 'Shopping Cart';
        $userid = $this->request->session()->read('Auth.User.id');
        if($userid!='' && isset($userid)){
        
        $cart = $this->TempCarts->find()->contain(['Services'])->where(['TempCarts.user_id' => $userid])->toArray();

        //pr($cart);exit;


        $this->set(compact('cart', 'title_for_layout'));
        }
    }
    
   
    
    
    
    public function deletecart($id = null) {
        $this->loadModel('TempCarts');
        $services = $this->TempCarts->get($id);
        $userid = $this->request->session()->read('Auth.User.id');
        if (!isset($userid) && $userid == '') {
            $this->redirect('/');
        }
        
        if ($this->TempCarts->delete($services)) {
            $this->Flash->success(__('Cart item has been deleted.'));
        } else {
            $this->Flash->error(__('Cart item could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'cart']);
    }
    
    
    
    
    
     public function payment($type=null,$id){
       // echo $type;exit;
        $id = base64_decode($id);
//echo $id;exit;


      //$this->viewBuilder()->layout(false);
      $this->loadModel('TempCarts');
      $this->loadModel('Users');
      $this->loadModel('SiteSettings');
      $this->loadModel('Services');
      $this->loadModel('CardDetails');
      $userid = $this->request->session()->read('Auth.User.id');
      if(!isset($userid) && $userid=='')
      {
        $this->Session->setFlash(__('Please login to access profile.', 'default', array('class' => 'error')));
        
      }
      
      $card_list =$this->CardDetails->find()->where(['CardDetails.user_id' => $userid])->toArray();
       //print_r($card_list);exit;
        if($type == 'S')
        {   //echo "here";exit;
           // $vals = explode('/',$id);
           // print_r($vals);exit;
            $product = $this->Services->find('all')->select(['service_id' => 'Services.id','service_owner_id' => 'Services.provider_id','offer_price' => 'Services.price'])->contain(['Users'])->where(['Services.id' => $id])->first();
            $product['user'] = $this->Users->find()->where(['Users.id' =>  $userid])->first();
            $product['temp_id']='';
            $product['event_date'] = $this->request->session()->read('event_date');
            $product['event_time'] = $this->request->session()->read('event_time');
        }
        else
        {   
             
             $product = $this->TempCarts->find()->contain(['Services','Users'])->where(['TempCarts.id' => $id])->first();
             $product['temp_id']=$id;
        }
  
//print_r($product);exit;
$service_owoner = $this->Users->find()->where(['Users.id' => $product['service_owner_id']])->first();

//print_r($service_owoner);exit;

 // echo ($price);exit;
  $paypalid = $this->SiteSettings->find()->first();
  //print_r($paypalid);exit;
  //nits.bikash@gmail.com
    //pr($paypalid);exit();
    $this->set(compact('id','product','service_owoner','card_list'));
  }

public function worldpaypayment()
{
    $this->autoRender = false;
    $this->layout = false;
    $this->loadModel('CardDetails');
    $this->loadModel('Orders');
    $this->loadModel('TempCarts');
    
  //print_r($this->request->data['service_owner_id']);exit;
 //$this->request->data['chkReusable'] =1;
 //namespace Worldpay;
    //echo Router::url('/', true).'init.php';exit;
// echo ROOT;
// exit;
// require_once(ROOT.DS.'webroot/init.php');
//print_r($worldpay);exit;


     
$userid = $this->request->session()->read('Auth.User.id');
    
     //print_r($rt);exit;
     $order['user_id'] = $userid;
     $order['service_id'] = $this->request->data['service_id'];
     $order['total_amount'] =$this->request->data['amount'];
     $order['event_date'] =$this->request->data['event_date'];
     $order['event_time'] =$this->request->data['event_time'];
     $order['order_date'] = date('Y-m-d');
     $order['owoner_id'] = (int)$this->request->data['service_owner_id'];
     $order['payment_type'] = 'worldpay';
     $order['transaction_id'] = '';
     $order['paymant_status'] ='pending';
//print_r($order);exit;     

$orders = $this->Orders->newEntity();

    $orders = $this->Orders->patchEntity($orders, $order); 
                
        if($ord = $this->Orders->save($orders))

{

//print_r($ord->id);exit;
$this->request->data['customer-order-code'] = $ord->id;
 require_once(ROOT .DS. "vendor" . DS  . "Worldpay" . DS . "Worldpay.php");
  $obj = new Worldpay1;

 $rt = $obj->wpayment($this->request->data);
//print_r($rt);exit;
     if($rt['paymentStatus'] == 'SUCCESS')
     {


if(isset($this->request->data['temp_id']) && trim($this->request->data['temp_id']) != '' && trim($this->request->data['temp_id']) != null)
{
     
$temp_cart = $this->TempCarts->get($this->request->data['temp_id']);
             if(count($temp_cart) > 0) 
             {
                $this->TempCarts->delete($temp_cart);
             }
            
}

$card_exist = $this->CardDetails->find()->where(['CardDetails.card_number' => $rt['paymentResponse']['maskedCardNumber']])->first();
if(count($card_exist) > 0)
{
    $cardid = $this->CardDetails->get($card_exist['id']);
              
              
            $this->CardDetails->delete($cardid);
}
//print_r(count($card_exist));exit;
     $payment['user_id'] = $userid;
     $payment['token_id'] = $rt['token'];
     $payment['card_number'] =  $rt['paymentResponse']['maskedCardNumber'];
     $payment['card_type'] = $rt['paymentResponse']['cardType'];

    
$carddetails = $this->CardDetails->newEntity();

    $carddetails = $this->CardDetails->patchEntity($carddetails, $payment); 
                
            $rs =  $this->CardDetails->save($carddetails);


$ords = $this->Orders->get($ord->id);
       // print_r($rs);exit;
        $order1['transaction_id'] = $rt['orderCode'];
     $order1['paymant_status'] ='success';                
                $ords = $this->Orders->patchEntity($ords, $order1);
                
                if ($this->Orders->save($ords)) 
                   
                    







            $this->redirect(array('controller' => 'services', 'action' => 'paymentsuccess'));
             
}
else
{
    $ords = $this->Orders->get($ord->id);
        
        $order1['transaction_id'] = $rs['orderCode'];
     $order1['paymant_status'] ='success';                
                $ords = $this->Orders->patchEntity($ords, $order1);
                
                if ($this->Orders->save($ords)) 
    $this->redirect(array('controller' => 'services', 'action' => 'failed'));
}
}

}

public function paymentsuccess()
{

}

   // public function stripepayment(){
   //  $this->autoRender = false;
   //  $this->layout = false;
   //  $this->loadModel('Bookings');
   //  $this->loadModel('TempCarts');
   //  $this->loadModel('Users');
   //  $book = $this->Bookings->newEntity();
   //  $post = array();
   //       //print_r($this->request->data);exit;
   //      $currency=$this->request->data['currency_code'];
   //        $amount=$this->request->data['amount'];
   //        $custom=$this->request->data['custom'];
   //       $strip_token=$this->request->data['strip_token'];
        
   //      $total=$amount*100;
   //      $stripe_api_sk_key="sk_test_qNLuxfQNwLic4AyewIcqLhmo";
   //      //$stripe_api_sk_key=Configure::read('STRIPE_SECRECT_KEY');
   //      $url = 'https://api.stripe.com/v1/charges';
   //      $ch = curl_init($url);
   //      curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization:Bearer ' . $stripe_api_sk_key));
   //      curl_setopt($ch, CURLOPT_POSTFIELDS, 'amount=' . $total. '&currency='. $currency .'&source=' . $strip_token . '&description= Payment for Purchase');
   //      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   //      $data_all = curl_exec($ch);
   //      curl_close($ch);
   //      $charge_data = json_decode($data_all);
   //      //print_r($charge_data);exit;
   //     //exit;
   //      if($charge_data->status=="succeeded"){
   //          //$txn_id=$charge_data->id;
   //          //$mc_gross=$amount;
   //          //$mc_currency=$currency;






   //         //$custom = $_POST["custom"]; 
         
           
   //         $cart = $this->TempCarts->find()->where(['TempCarts.user_id' => $custom])->toArray();
            
   //        //print_r($cart);exit;
   //          foreach($cart as $tempid){
   //              //print_r($tempid);exit;
                
   //              $this->request->data['user_id']=$tempid['user_id'];
   //              $this->request->data['service_id']=$tempid['service_id'];
   //              $this->request->data['price']=$tempid['price'];
   //              $this->request->data['booking_date']=date('Y-m-d H:i:s');
   //              $this->request->data['provider_id']=$tempid['service_owner_id'];
   //              $this->request->data['payment_type']= 'stripe';
   //              $this->request->data['transaction_id']= $charge_data->id;
   //              $book = $this->Bookings->patchEntity($book, $this->request->data); 
                
   //              //$msg_body =  array($this->request->data['user_id'],$this->request->data['service_id'], $this->request->data['price'],$this->request->data['provider_id'],$this->request->data['payment_type'],$this->request->data['transaction_id']);
                
                
   //             if ($lid=$this->Bookings->save($book)) {
   //                // echo $lid;exit;
                                 
   //               $services = $this->TempCarts->get($tempid['id']);
   //              // print_r($services);exit;
   //               $rt = $this->TempCarts->delete($services);
                
   //              //print_r($rt);exit;
   //             }
              
   //          }
            
               
              
   //            $usermail = $this->Users->find()->where(['Users.id' => $custom])->first();
                
   //              $this->loadModel('EmailTemplates');
   //              $EmailTemplate=$this->EmailTemplates->find()->where(['EmailTemplates.id'=>4])->first();
                
               
                
   //              $msg_body =str_replace(array('[NAME]'),array($usermail['full_name']),$EmailTemplate['content']);
                
   //              $subject_mail="Booking Confirmation";
                
                
                
   //              $email = new Email('default');
   //              $email->emailFormat('html')->from(['nit.spandan@gmail.com'=>'5 Star'])
   //              ->to($usermail['email'])
   //              ->subject($subject_mail)
   //              ->send($msg_body);





   //      $this->redirect(array('controller' => 'services', 'action' => 'success'));






   //          //$this->thank_you($custom,$txn_id,$mc_gross,$mc_currency);
   //      }else{
   //         // $this->Session->setFlash(__('Payment is not done.'));
   //          $this->redirect(array('controller' => 'services', 'action' => 'cart'));
   //      }
       
   //  }
  
  
  public function purchasepayment(){
    $this->autoRender = false;
    $this->layout = false;
    $this->loadModel('Bookings');
    $this->loadModel('TempCarts');
    $this->loadModel('Users');
    $book = $this->Bookings->newEntity();
    $post = array();
        foreach ($_POST as $field => $value) {
            array_push($post,urlencode($field)."=".urlencode($value));
        }

        $id = $_POST["txn_id"];
    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://www.sandbox.paypal.com/cgi-bin/webscr");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, 0);

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, implode("&",$post)."&cmd=_notify-validate");
        $post = curl_exec($ch);

        curl_close($ch);
        
         

    if ($_POST["payment_status"] == 'Pending' || $_POST["payment_status"] == 'Completed')
      {
        
        
        
        
        
           $custom = $_POST["custom"]; 
         
           
           $cart = $this->TempCarts->find()->where(['TempCarts.user_id' => $custom])->toArray();
            
          
            foreach($cart as $tempid){
                //pr($cart);exit;
                
                $this->request->data['user_id']=$tempid['user_id'];
                $this->request->data['service_id']=$tempid['service_id'];
                $this->request->data['price']=$tempid['price'];
                $this->request->data['booking_date']=date('Y-m-d H:i:s');
                $this->request->data['provider_id']=$tempid['service_owner_id'];
                $this->request->data['payment_type']= 'paypal';
                $this->request->data['transaction_id']= $id;
                $book = $this->Bookings->patchEntity($book, $this->request->data); 
                
                //$msg_body =  array($this->request->data['user_id'],$this->request->data['service_id'], $this->request->data['price'],$this->request->data['provider_id'],$this->request->data['payment_type'],$this->request->data['transaction_id']);
                
                
               if ($lid=$this->Bookings->save($book)) {
                   
                                 
                 $services = $this->TempCarts->get($tempid['id']);
                 $this->TempCarts->delete($services);
                
                
               }
              
            }
            
               
              
              $usermail = $this->Users->find()->where(['Users.id' => $custom])->first();
                
                $this->loadModel('EmailTemplates');
                $EmailTemplate=$this->EmailTemplates->find()->where(['EmailTemplates.id'=>4])->first();
                
               
                
                $msg_body =str_replace(array('[NAME]'),array($usermail['full_name']),$EmailTemplate['content']);
                
                $subject_mail="Booking Confirmation";
                
                
                
                $email = new Email('default');
                $email->emailFormat('html')->from(['nit.spandan@gmail.com'=>'5 Star'])
                ->to($usermail['email'])
                ->subject($subject_mail)
                ->send($msg_body);
                
              
          
      }


  }
     
  
  public function success(){  
      // $userid = $this->request->session()->read('Auth.User.id');
      // if(!isset($userid) && $userid=='')
      // {
      // $this->Session->setFlash(__('Please login to access profile.', 'default', array('class' => 'error')));
      // return $this->redirect(array('action' => 'login'));
      // }

  }
        
    public function cancel(){
      $userid = $this->request->session()->read('Auth.User.id');
      if(!isset($userid) && $userid=='')
      {
      $this->Session->setFlash(__('Please login to access profile.', 'default', array('class' => 'error')));
      return $this->redirect(array('action' => 'login'));
      }
     
  }
    
    
  
  //spandan 30_03
  
  public function salesdetails($id) {
        $this->viewBuilder()->layout('default');
        $this->loadModel('Services');
        $this->loadModel('Bookings');
        $this->loadModel('Users');
        $this->loadModel('Ratings');
        $this->loadModel('TempCarts');
        $user = $this->Users->get($this->Auth->user('id'));
        $uid = $this->request->session()->read('Auth.User.id');
        $utype = $this->request->session()->read('Auth.User.utype');
        $uverify = $user->check_verified;
        
        $Ratings = $this->Ratings->newEntity();
        
        //$id=  base64_decode($id);
        
        
        $service=  $this->TempCarts->find()->where(['TempCarts.id'=>$id])->contain(['Services','Users'])->first();
        
       if ($this->request->is('post')) {
                if (isset($this->request->data['user_id']) && !empty($this->request->data['user_id'])) {
                    $user_id=$this->request->data['user_id'];
                    $service_id=$this->request->data['service_id'];
                    $review_ex=  $this->Ratings->find()->where(['Ratings.user_id'=>$user_id,'Ratings.service_id'=>$service_id])->toArray();
                    if(count($review_ex)> 0){
                        
                     $this->Flash->success('Alredy review given.', 'default', array('class' => 'error'));  
                    }else{
                    $this->request->data['date_time'] = gmdate('Y-m-d H:i:s');
                    $Ratings = $this->Ratings->patchEntity($Ratings, $this->request->data);
                    if ($this->Ratings->save($Ratings)) {

                        $this->Flash->success('The review has been saved.', 'default', array('class' => 'success'));
                        
                    } else {
                        $this->Flash->success(__('The review could not be saved. Please, try again.'));
                    }
                }
                }
            }
       
         $myreview=  $this->Ratings->find()->where(['Ratings.user_id'=>$uid,'Ratings.service_id'=>$service['service_id']])->first();   
            
        //pr($service);
            
        $this->set(compact('service','user','myreview'));
        $this->set('_serialize', ['service']); 
    }
   
    
     public function salesdelete($id = null) {
         
        $this->loadModel('Bookings');
        $services = $this->Bookings->get($id);
        $userid = $this->request->session()->read('Auth.User.id');
        if (!isset($userid) && $userid == '') {
            $this->redirect('/');
        }
        
        if ($this->Bookings->delete($services)) {
            $this->Flash->success(__('Sales history has been deleted.'));
        } else {
            $this->Flash->error(__('Sales history could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'bookingHistory']);
    }
  
  
   public function latestrequestfootercount() {
      
      
                    $this->autoRender = false;
                    $userid = $this->request->session()->read('Auth.User.id');
                    $this->loadModel('TempCarts');
        
                
     
      $msgcount = $this->TempCarts->find()->where(['TempCarts.service_owner_id' => $userid,'TempCarts.is_accept' => 0,'TempCarts.is_read' => 0])->toArray();
        
        
        
            echo count($msgcount);
                        exit();
    }
    
    
    
    
    public function latestrequestfooterusercount() {
      
      
                    $this->autoRender = false;
                    $userid = $this->request->session()->read('Auth.User.id');
                    $this->loadModel('TempCarts');
        
                
     
      $msgcount = $this->TempCarts->find()->where(['TempCarts.user_id' => $userid,'TempCarts.is_accept' => 0])->toArray();
        
        
        
            echo count($msgcount);
                        exit();
    }
    
    public function latestbookingfooterusercount(){

    	$this->autoRender = false;
    	 $userid = $this->request->session()->read('Auth.User.id');
    	 $this->loadModel('Orders');

    	  $msgcount = $this->Orders->find()->where(['Orders.owoner_id' => $userid,'Orders.seller_status'=>1,'Orders.is_view' => 0])->toArray();
        //'Orders.owoner_id'=>$uid,'Orders.seller_status'=>1
        
        
            echo count($msgcount);
                        exit();

    }
    
   public function bookingdelete($id=NULL)
        {
            $this->loadModel('Orders');
            
            $service = $this->Orders->get($id);
        
            $temp['user_status'] = 0;
            
            $service = $this->Orders->patchEntity($service, $temp);
                
                if($this->Orders->save($service))
                {
                   
                 $this->Flash->success('Successfully deleted', 'default', array('class' => 'success'));
                 return $this->redirect(['action' => 'mybooking']);
                }else{
                   
                    $this->Flash->success('Delete failed', 'default', array('class' => 'error'));
                    return $this->redirect(['action' => 'mybooking']);
                }
                    
        } 
    
     public function sellerbookingdelete($id=NULL)
        {
            $this->loadModel('Orders');
            
            $service = $this->Orders->get($id);
        
            $temp['seller_status'] = 0;
            
            $service = $this->Orders->patchEntity($service, $temp);
                
                if($this->Orders->save($service))
                {
                   
                 $this->Flash->success('Successfully deleted', 'default', array('class' => 'success'));
                 return $this->redirect(['action' => 'mybooking1']);
                }else{
                   
                    $this->Flash->success('Delete failed', 'default', array('class' => 'error'));
                    return $this->redirect(['action' => 'mybooking1']);
                }
                    
        }
  
}
