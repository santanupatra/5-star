<?php

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

namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
use Cake\Mailer\Email;
use Cake\Routing\Router;
use Cake\Error\Debugger;

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

        $this->Auth->allow(['result', 'add_favourite', 'details','ajaxaddtocart','purchasepayment']);
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
        if($uid!='' && isset($uid) && $utype==2 && $uverify== 'Y'){
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
        if($uid!='' && isset($uid) && $utype==2 && $uverify== 'Y'){
        $this->loadModel('Services');
        
        $service = $this->Services->get($eid);
        
        if ($this->request->is('post')) {

            //print_r($this->request->data);exit;

            $flag = true;            
            $tableRegObj = TableRegistry::get('Services');
           
                      
            if($flag){
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
        $user = $this->Users->get($this->Auth->user('id'));
        $id=$this->Auth->user('id');
        $uid = $this->request->session()->read('Auth.User.id');
        $utype = $this->request->session()->read('Auth.User.utype');
        $uverify = $user->check_verified;
        //echo $uverify;exit;
        if($uid!='' && isset($uid) && $utype==2 && $uverify== 'Y'){
        $this->loadModel('Services');
        
        $service = $this->Services->get($eid);
        $all_image = $this->ServiceImages->find()->where(['service_id' => $eid])->order('is_order')->toArray();
        
        if ($this->request->is('post')) {
            foreach ($all_image as $image) {

               $service_image = $this->ServiceImages->get($image->id); 
               $data['title'] = $this->request->data['title_'.$image->id];

               $service_image = $this->Services->patchEntity($service_image, $data);
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

        $this->paginate = [
            'conditions' => ['Favourites.user_id' => $uid],
            'order' => [ 'id' => 'DESC'],
            'contain' => ['Services', 'Services.Users', 'Services.Comments', 'Services.Likes', 'Services.Reports'],
            'fields' => ['Users.full_name', 'Users.pimg', 'Services.id', 'Services.service_name', 'Services.image', 'Services.created']
        ];
        $services = $this->paginate($this->Favourites);
        
        $this->set(compact('services', 'uid'));
        $this->set('_serialize', ['services']);
  
    }    

    public function addLike(){
        $this->viewBuilder()->layout('false');
        $this->loadModel('Likes'); 
        
        $uid = $this->request->session()->read('Auth.User.id');
        $like = $this->Likes->find()->where(['service_id' => $this->request->data['id'],'user_id'=>$uid])->first();

        if(count($like) > 0){
                  
            $this->Likes->deleteAll(['service_id' => $this->request->data['id'],'user_id'=>$uid]);
            $output = array('Ack' => 0);
        }
        else{
            if($uid!='' && isset($uid)){
                $data['service_id'] = $this->request->data['id'];
                $data['user_id'] = $uid;
                $data['date'] = date('Y-m-d');   
                $con = $this->Likes->newEntity();
                $likes = $this->Likes->patchEntity($con, $data);
                if ($this->Likes->save($likes)) {
                    $output = array('Ack' => 1, 'msg' => 'Like added successfully.');
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
        
        $uid = $this->request->session()->read('Auth.User.id');

        if($uid!='' && isset($uid)){
            $data['service_id'] = $this->request->data['id'];
            $data['comment'] = $this->request->data['comment'];
            $data['user_id'] = $uid;
            $data['date'] = date('Y-m-d H:i:s');   
            $con = $this->Comments->newEntity();
            $comments = $this->Comments->patchEntity($con, $data);
            if ($this->Comments->save($comments)) {
                $user_details = $this->Users->find()->where(['id' => $uid])->first(); 
                
                $html = '<div class="media mb-md-3">
                          <img class="mr-3" style="width: 50px" src="'.$this->request->webroot.'/user_img/'.(($user_details->pimg == "")? "default.png" : $user_details->pimg).'" alt="">
                          <div class="media-body">
                            <h6 class="mt-0 text-uppercase text-muted">
                              <small><i class="ion-ios-time-outline pl-md-1"></i> '.date("d M Y H:i:s").' </small>                                      
                            </h6>
                            <div class="form-group">
                              '.$this->request->data['comment'].'
                            </div>
                          </div>
                        </div>';
                $output = array('Ack' => 1, 'msg' => 'Comment added successfully.', 'html' => $html);
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
        $id = $this->request->data['id'];
        //$uid = $this->request->session()->read('Auth.User.id');

        //if($uid != "" && isset($uid)){
            $comments = $this->Comments->find()->contain(['Users'])->where(['service_id' => $id])->toArray();
           $html = "";

            foreach ($comments as $comment) {                

               $html .= '<div class="media mb-md-3">
                          <img class="mr-3 user-image rounded-circle" style="width: 50px" src="'.$this->request->webroot.'/user_img/'.(($comment->user->pimg == "")? "default.png" : 'thumb_'.$comment->user->pimg).'" alt="" >
                          <div class="media-body">
                            <div class="form-group">'.$comment->user->full_name.'</div>
                            <h6 class="mt-0 text-muted">
                              <small><i class="ion-ios-time-outline pl-md-1"></i> '.date_format($comment->date,"d M Y H:i:s").' </small>                                      
                            </h6>
                            <div class="form-group">
                              '.$comment->comment.'
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
                      <img class="mr-3 user-image rounded-circle" style="width: 50px" src="'.$this->request->webroot.'/user_img/'.(($like->user->pimg == "")? "default.png" : 'thumb_'.$like->user->pimg).'" alt="">
                      <div class="media-body">
                        <div class="form-group">'.$like->user->full_name.'</div>
                        <h6 class="mt-0 text-muted">
                          <small><i class="ion-ios-time-outline pl-md-1"></i> '.date_format($like->date,"d M Y H:i:s").' </small>                                      
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
        $user = $this->Users->get($this->Auth->user('id'));
        $uid = $this->request->session()->read('Auth.User.id');
        $utype = $this->request->session()->read('Auth.User.utype');
        $uverify = $user->check_verified;

        $conditions = ['Bookings.user_id'=>$uid];
           
        $this->paginate = [
            'conditions' => $conditions,
            'contain' => ['Companies', 'Services'],
            'order' => [ 'id' => 'DESC'],
            'limit'=> 10 
        ];
        $service = $this->paginate($this->Bookings);
        //pr($service);
       
        $this->set(compact('service','user'));
        $this->set('_serialize', ['service']); 
    }

    
    
    public function bookingdetails($id) {
        $this->viewBuilder()->layout('default');
        $this->loadModel('Services');
        $this->loadModel('Bookings');
        $this->loadModel('Users');
        $this->loadModel('Ratings');
        $user = $this->Users->get($this->Auth->user('id'));
        $uid = $this->request->session()->read('Auth.User.id');
        $utype = $this->request->session()->read('Auth.User.utype');
        $uverify = $user->check_verified;
        
        $Ratings = $this->Ratings->newEntity();
        
        //$id=  base64_decode($id);
        
        
        $service=  $this->Bookings->find()->where(['Bookings.id'=>$id])->contain(['Companies','Services'])->first();
        
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
        $user = $this->Users->get($this->Auth->user('id'));
        $uid = $this->request->session()->read('Auth.User.id');
        $utype = $this->request->session()->read('Auth.User.utype');
        $uverify = $user->check_verified;

        $conditions = ['Bookings.provider_id'=>$uid];
           
        $this->paginate = [
            'conditions' => $conditions,
            'contain' => ['Users', 'Services'],
            'order' => [ 'id' => 'DESC'],
            'limit'=> 10 
        ];
        $service = $this->paginate($this->Bookings);
       
        $this->set(compact('service','user'));
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
          
           $productsInCart = $this->TempCarts->find()->where(['TempCarts.user_id' => $userid])->toArray();

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

                if (!$alreadyIn && !$woner_check && $userid != $Current_woner_id) {

                    //echo $product['price'];exit;
                    $this->request->data['service_id'] = $id;
                    $this->request->data['user_id'] = $userid;
                    $this->request->data['price'] = $product['price'];
                    $this->request->data['service_owner_id'] = $Current_woner_id;
                    $this->request->data['add_date'] = gmdate('Y-m-d H:i:s');
                    $Faviourit = $this->TempCarts->patchEntity($Faviourit, $this->request->data);
                    //print_r($this->request->data);exit;
                    if ($this->TempCarts->save($Faviourit)) {
                        $Msg = array('Ack'=>1, 'data'=> 'Service added to cart list.');
                    } else {
                        $Msg = array('Ack'=>0, 'data'=> 'The Service could not be saved into the cart list. Please, try again.');
                    }
                   
                } elseif ($userid == $Current_woner_id) {
                    $Msg = array('Ack'=>0, 'data'=> 'You cannot add your own Service.');
                } else {
                    $Msg = array('Ack'=>0, 'data'=> 'Service already in cart list.');
                }
            }
        }
       echo json_encode($Msg);
       exit();
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
    
    
    
    
    
     public function payment($price){
      //$this->viewBuilder()->layout(false);
      $this->loadModel('TempCarts');
      $this->loadModel('SiteSettings');
      $userid = $this->request->session()->read('Auth.User.id');
      if(!isset($userid) && $userid=='')
      {
        $this->Session->setFlash(__('Please login to access profile.', 'default', array('class' => 'error')));
        
      }
      $price=  base64_decode($price);

  //$product = $this->TempCarts->find('first', array('conditions' => array('TempCart.user_id' => $userid),'group'=>'TempCart.user_id','fields'=>array('sum(TempCart.pay_amt) as totalpay','sum(TempCart.quantity) as totalquantity')));
  
  //$product = $this->TempCarts->find()->sumOf(['TempCarts.price'])->where(['TempCarts.user_id' => $userid])->toArray();
  
  //echo ($price);exit;
  $paypalid = $this->SiteSettings->find()->first();
  //print_r($paypalid);exit;
  //nits.bikash@gmail.com
    //pr($paypalid);exit();
    $this->set(compact('price','userid','paypalid'));
  }


   public function stripepayment(){
    $this->autoRender = false;
    $this->layout = false;
    $this->loadModel('Bookings');
    $this->loadModel('TempCarts');
    $this->loadModel('Users');
    $book = $this->Bookings->newEntity();
    $post = array();
         //print_r($this->request->data);exit;
        $currency=$this->request->data['currency_code'];
          $amount=$this->request->data['amount'];
          $custom=$this->request->data['custom'];
         $strip_token=$this->request->data['strip_token'];
        
        $total=$amount*100;
        $stripe_api_sk_key="sk_test_qNLuxfQNwLic4AyewIcqLhmo";
        //$stripe_api_sk_key=Configure::read('STRIPE_SECRECT_KEY');
        $url = 'https://api.stripe.com/v1/charges';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization:Bearer ' . $stripe_api_sk_key));
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'amount=' . $total. '&currency='. $currency .'&source=' . $strip_token . '&description= Payment for Purchase');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data_all = curl_exec($ch);
        curl_close($ch);
        $charge_data = json_decode($data_all);
       // print_r($charge_data);
       //exit;
        if($charge_data->status=="succeeded"){
            //$txn_id=$charge_data->id;
            //$mc_gross=$amount;
            //$mc_currency=$currency;






           //$custom = $_POST["custom"]; 
         
           
           $cart = $this->TempCarts->find()->where(['TempCarts.user_id' => $custom])->toArray();
            
          //print_r($cart);exit;
            foreach($cart as $tempid){
                //print_r($tempid);exit;
                
                $this->request->data['user_id']=$tempid['user_id'];
                $this->request->data['service_id']=$tempid['service_id'];
                $this->request->data['price']=$tempid['price'];
                $this->request->data['booking_date']=date('Y-m-d H:i:s');
                $this->request->data['provider_id']=$tempid['service_owner_id'];
                $this->request->data['payment_type']= 'stripe';
                $this->request->data['transaction_id']= $charge_data->id;
                $book = $this->Bookings->patchEntity($book, $this->request->data); 
                
                //$msg_body =  array($this->request->data['user_id'],$this->request->data['service_id'], $this->request->data['price'],$this->request->data['provider_id'],$this->request->data['payment_type'],$this->request->data['transaction_id']);
                
                
               if ($lid=$this->Bookings->save($book)) {
                  // echo $lid;exit;
                                 
                 $services = $this->TempCarts->get($tempid['id']);
                // print_r($services);exit;
                 $rt = $this->TempCarts->delete($services);
                
                //print_r($rt);exit;
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





        $this->redirect(array('controller' => 'services', 'action' => 'success'));






            //$this->thank_you($custom,$txn_id,$mc_gross,$mc_currency);
        }else{
           // $this->Session->setFlash(__('Payment is not done.'));
            $this->redirect(array('controller' => 'services', 'action' => 'cart'));
        }
       
    }
  
  
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
        $user = $this->Users->get($this->Auth->user('id'));
        $uid = $this->request->session()->read('Auth.User.id');
        $utype = $this->request->session()->read('Auth.User.utype');
        $uverify = $user->check_verified;
        
        $Ratings = $this->Ratings->newEntity();
        
        //$id=  base64_decode($id);
        
        
        $service=  $this->Bookings->find()->where(['Bookings.id'=>$id])->contain(['Companies','Services','Users'])->first();
        
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
  
  
  
    
    

}
