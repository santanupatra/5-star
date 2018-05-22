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

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
use Cake\Mailer\Email;
use Cake\Routing\Router;

//use Cake\I18n\FrozenDate; 
use Cake\Database\Type; 
//use Cake\I18n\Time;
//use Cake\I18n\Date;
//Type::build('date')->setLocaleFormat('yyyy-MM-dd');

// Admin Users Management
class UsersController extends AppController {

    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['index','forgot','forgotpassword']);
     }   
    
    public $uses = array('User', 'Admin');
    
    // Admin Login
    public function index() {
        //$this->layout = 'adminlogin';
        $this->viewBuilder()->layout('adminlogin');
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            //if ($user['type'] == 'superadmin') { }
            if ($user) {
                $this->Auth->setUser($user);
                $session = $this->request->session();
                $session->write('Auth.User', $user);
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->error('Your username or password is incorrect.');
            }
        }
    }
    
    
    public function forgotpassword() {

$this->viewBuilder()->layout('adminlogin');
$this->loadModel('Admins');
        $user = $this->Admins->newEntity();
        if ($this->request->is('post')) {

            // Checking if User is valid or not.
            $tableRegObj = TableRegistry::get('Admins');
            $userExist = $tableRegObj->find()->where(['email' => $this->request->data['email']])->first();
 //pr($userExist);exit;
            $etRegObj = TableRegistry::get('EmailTemplates');
            $emailTemp = $etRegObj->find()->where(['id' => 1])->first()->toArray();

            $siteSettings = $this->site_setting();
            //pr($siteSettings); pr($emailTemp); pr($userExist); pr($this->request->data); exit;
            if (!empty($userExist)) {
                $chkPost = $this->generateRandomString(); //Generating new Password
                $this->request->data['password']=$chkPost;
                $userdt = TableRegistry::get('Admins');
                $query = $userdt->query();
                
                //$user = $this->Admins->find()->where(['id' => $this->request->data['id']])->first();
                $user = $this->Admins->patchEntity($user, ['password' => $this->request->data['password'],'id'=>1]);
                $this->Admins->save($user);

                //$query->update()->set(['cpass_req' => 1, 'password' => $chkPost])->where(['id' => $userExist['id']])->execute();

                $mail_To = $userExist['email'];
                $mail_CC = '';
                $mail_subject = $emailTemp['subject'];
                $name = $userExist['first_name'] . " " . $userExist['last_name'];
                $url = Router::url('/', true);
                //$link = $url . 'users/setpassword/' . $chkPost;

                $mail_body = str_replace(array('[NAME]','[PASSWORD]'), array($name,$chkPost), $emailTemp['content']);
                //echo $mail_body; //exit;

                // Sending user the reset password link.
                $email = new Email('default');
                if ($email->emailFormat('html')->from(['nit.spandan@gmail.com' => 'admin'])
                                ->to($userExist['email'])
                                ->subject($mail_subject)
                                ->send($mail_body)) {
                    $this->Flash->success(__('Your new password sent to your email.'));
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->Flash->error(__('Email Not Registerd With Us, try with another.'));
                }
            } else {
                $this->Flash->error(__('Email Not Registerd With Us, try with another.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }
    
    
    
    
    
    
    

    public function login() {
        //$this->layout = 'admin';
        $this->viewBuilder()->layout('admin');
    }
    public function signin() {
        //$this->layout = 'admin';
        $this->viewBuilder()->layout('admin');
    }
//

    public function home() {
        /*
          echo "hello";
          pr($this->Auth->user('id'));
          pr($this->Auth->user('type'));
         */

        /* 
          pj($this->request->session()->check('Auth.Admin'));
          pj($this->request->session()->read('Auth.Admin'));
          pr($this->request->session()->check('Auth.Admin'));
          pr($this->request->session()->read('Auth.Admin'));
          exit;
         */
       
        
        $total_user=$this->Users->find("all")->where(["utype"=>1])->count();
        $total_client=$this->Users->find("all")->where(["utype"=>2,"check_verified"=>'Y'])->count();
        $this->set(compact('total_user','total_client'));
        $this->set('_serialize', ['total_user']);
        $this->viewBuilder()->layout('admin');
    }

    public function logout() {

        $this->Auth->logout();
        return $this->redirect('/admin/users/index');
    }

    // Admin Settings
    public function settings() {
        $this->viewBuilder()->layout('admin');
        $users = TableRegistry::get('Users');
        $user = $users->get($this->Auth->user('id'));
        if (!empty($this->request->data)) {
            $user->username = $this->request->data['username'];
            if ($this->request->data['admin_password'] != "") {
                $user->password = $this->request->data['admin_password'];
            }
            $user->email = $this->request->data['email'];
            $users->save($user);
            $this->Flash->success('Your details has been saved.', ['key' => 'success']);
            //if($this->Users->save($this->request->data)) {
            ///echo "hello";
            //}
        }
        //
        //$user = $this->Users->get($this->Auth->user('id'));//$users->get($this->Auth->user('id'));
        //pr($user->password);
        //pr($user['username']);
        $this->set('user', $user);
    }
    
    public function listservice($id) {
        $this->viewBuilder()->layout('admin');
        $this->loadModel('Services');
        
        $conditions = ['Services.provider_id'=>$id];
           
        $this->paginate = [
            'conditions' => $conditions,
            'order' => [ 'id' => 'DESC']
        ];
        $service = $this->paginate($this->Services);
        //pr($user->toArray());
        $this->set(compact('service','id'));
        $this->set('_serialize', ['service','id']);
 
    }
    
    
     public function listtiming($id) {
        $this->viewBuilder()->layout('admin');
        $this->loadModel('Timings');
        
        $conditions = ['Timings.company_id'=>$id];
           
        $this->paginate = [
            'conditions' => $conditions,
            'order' => [ 'id' => 'DESC']
        ];
        $service = $this->paginate($this->Timings);
        //pr($user->toArray());
        $this->set(compact('service','id'));
        $this->set('_serialize', ['service','id']);
 
    }
   
    public function listuser() {
        $this->viewBuilder()->layout('admin');
        //$user = $this->Users->find();
        $conditions = ['Users.utype' => 1];
        if(!empty($_REQUEST['title']))
        {
            $conditions['OR']['full_name LIKE']='%'.$_REQUEST['title'].'%';
            
            $conditions['OR']['email LIKE']='%'.$_REQUEST['title'].'%';
        } 
        if(!empty($_REQUEST['location']))
        {
            $conditions['and']['address LIKE']='%'.$_REQUEST['location'].'%';
            
           
        } 
        if(!empty($_REQUEST['interest']))
        {
            $conditions['and']['interest LIKE'] = '%'.$_REQUEST['interest'].'%';
           
        }
        
        if(!empty($_REQUEST['preference']))
        {
            $conditions['and']['preference LIKE'] = '%'.$_REQUEST['preference'].'%';
           
        }
        
        //print_r($conditions);
        $this->paginate = [
            'conditions' => $conditions,
            'order' => [ 'id' => 'DESC']
        ];
        $user = $this->paginate($this->Users);
        //pr($user->toArray());
        
        ///$interestid= explode(',','Users.interest');
        
        $this->loadModel('Interests'); 
        $interests = $this->Interests->find()->where(['Interests.status' => 1])->toArray();
        $this->loadModel('Tags'); 
        $tags = $this->Tags->find()->where(['Tags.status' => 1])->toArray();
       //pr($interests);
        $countuser = $this->Users->find()->where([$conditions])->group('Users.id')->count(); 
        
        $this->set(compact('user','interests','tags','countuser'));
        $this->set('_serialize', ['user','interests','tags','countuser']);
 
    }
    
    
   

    public function listserviceprovider_verified() {
        $this->viewBuilder()->layout('admin');
        $this->loadModel('ServiceTypes');
        //$user = $this->Users->find();
        $conditions = ['Users.utype' => 2,'Users.is_mail_verified'=>1];
        if(!empty($_REQUEST['title']))
        {
            $conditions['OR']['full_name LIKE']='%'.$_REQUEST['title'].'%';
            
            $conditions['OR']['email LIKE']='%'.$_REQUEST['title'].'%';
        } 
        if(!empty($_REQUEST['location']))
        {
            $conditions['and']['address LIKE']='%'.$_REQUEST['location'].'%';
            
           
        } 
        if(!empty($_REQUEST['stype']))
        {
            $conditions['and']['service_type_id LIKE'] = '%'.$_REQUEST['stype'].'%';
           
        }
        
        
        
        
        $this->paginate = [
            'conditions' => $conditions,
            'order' => [ 'id' => 'DESC']
        ];
        $user = $this->paginate($this->Users);
        $stypes = $this->ServiceTypes->find()->where(['ServiceTypes.status' => 1])->toArray();
        
        $countprovider = $this->Users->find()->where([$conditions])->group('Users.id')->count(); 
        
        $this->set(compact('user','stypes','countprovider'));
        $this->set('_serialize', ['user']);
 
    }

     public function listserviceprovider_nonverified() {
        $this->viewBuilder()->layout('admin');
        $this->loadModel('ServiceTypes');
        //$user = $this->Users->find();
        $conditions = ['Users.utype' => 2,'Users.is_mail_verified'=>0];
         if(!empty($_REQUEST['title']))
        {
            $conditions['OR']['full_name LIKE']='%'.$_REQUEST['title'].'%';
            
            $conditions['OR']['email LIKE']='%'.$_REQUEST['title'].'%';
        } 
        if(!empty($_REQUEST['location']))
        {
            $conditions['and']['address LIKE']='%'.$_REQUEST['location'].'%';
            
           
        } 
        if(!empty($_REQUEST['stype']))
        {
            $conditions['and']['service_type_id LIKE'] = '%'.$_REQUEST['stype'].'%';
           
        }
        
        $this->paginate = [
            'conditions' => $conditions,
            'order' => [ 'id' => 'DESC']
        ];
        $user = $this->paginate($this->Users);
        //pr($user->toArray());
        $stypes = $this->ServiceTypes->find()->where(['ServiceTypes.status' => 1])->toArray();
        
        $countprovider = $this->Users->find()->where([$conditions])->group('Users.id')->count(); 
        
        $this->set(compact('user','stypes','countprovider'));
        $this->set('_serialize', ['user']);
 
    }
    
    public function addtiming($id) {
        $this->viewBuilder()->layout('admin');
        $this->loadModel('Timings');
        $service = $this->Timings->newEntity();
        if ($this->request->is('post')) {

            $flag = true;
            //echo $this->generateRandomString(); exit;
            $tableRegObj = TableRegistry::get('Timings');
           
            // Validating Form
            if($this->request->data['day'] == ""){
                $this->Flash->error(__('Day can not be null. Please, try again.')); $flag = false;
            }
            
            
            
            if($flag){
                if($this->request->data['from_time'] == ""){
                    $this->Flash->error(__('Time  can not be null. Please, try again.')); $flag = false;
                }            
            }            
            
                       

                       
            
            if($flag){
                if($this->request->data['to_time'] == ""){
                    $this->Flash->error(__('Time can not be null. Please, try again.')); $flag = false;
                }            
            }
            
             
                        
            if($flag){
                  $this->request->data['company_id']=$id;         
                // Saving User details after validation
                $service = $this->Timings->patchEntity($service, $this->request->data);
                if ($this->Timings->save($service)) {
                 
                    $this->Flash->success('Timing added successfully.', ['key' => 'success']);
                    
                    //pr($this->request->data); pr($user); exit;
                    $this->redirect(['action' => 'listtiming',$id]);
                }
            }
        }
        $this->set(compact('service'));
        $this->set('_serialize', ['service']);
    }
    
    public function addservice($id) {
        $this->viewBuilder()->layout('admin');
        $this->loadModel('Services');
        $this->loadModel('ServiceTypes'); 
        $this->loadModel('Events'); 
        $this->loadModel('Amenities');
        
        $service = $this->Services->newEntity();
        
        if ($this->request->is('post')) {

            $flag = true;
            //echo $this->generateRandomString(); exit;
            $tableRegObj = TableRegistry::get('Services');
           
            // Validating Form
            if($this->request->data['service_name'] == ""){
                $this->Flash->error(__('Service Name can not be null. Please, try again.')); $flag = false;
            }
            
            if($flag){
                if($this->request->data['address'] == ""){
                    $this->Flash->error(__('Address can not be null. Please, try again.')); $flag = false;
                }            
            }            
            
            
            
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
                    $file = $fileName;
                    $this->request->data['image'] = $fileName;
                } else {
                    $flag = false;
                    $this->Flash->error(__('Upload image only jpg,jpeg,png files.'));
                }
            } else {
                $this->request->data['image'] = $service->image;
            }
             
                        
            if($flag){
                  $this->request->data['provider_id']=$id;
                  $this->request->data['event_id']=implode(',',$this->request->data['event_id']);
                  $this->request->data['amenity_id']=implode(',',$this->request->data['amenity_id']);
                // Saving User details after validation
                $service = $this->Services->patchEntity($service, $this->request->data);
                if ($rs=$this->Services->save($service)) {
                    
                                    
                    $this->Flash->success('Service added successfully.', ['key' => 'success']);
                    
                    $this->redirect(['action' => 'listservice',$id]);
                }
            }
        }
        
        $users = $this->Users->get($id);
        
        $stname=$this->ServiceTypes->find('all', array('conditions' => array('ServiceTypes.status' =>1)));
        $eventname=$this->Events->find()->where(['Events.status'=>1])->toArray();
        $amenityname=$this->Amenities->find()->where(['Amenities.status'=>1])->toArray();
        $this->set(compact('service','stname','eventname','amenityname'));
        $this->set('_serialize', ['service']);
    }
    
    
    
    
    public function add() {
        $this->viewBuilder()->layout('admin');
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {

            $flag = true;
            //echo $this->generateRandomString(); exit;
            $tableRegObj = TableRegistry::get('Users');
            $userExist = $tableRegObj->find()->where(['email' => $this->request->data['email']])->toArray();
            // Validating Patient Form
            if($this->request->data['full_name'] == ""){
                $this->Flash->error(__('First Name can not be null. Please, try again.')); $flag = false;
            }
            
            
            
            if($flag){
                if($this->request->data['email'] == ""){
                    $this->Flash->error(__('Last Name can not be null. Please, try again.')); $flag = false;
                }            
            }            
            
            if($flag){
                if($userExist){
                    $flag = false;
                    $this->Flash->error(__('Email Already Registered, try with another.'));
                }  
            }            

                       
            
            if($flag){
                if($this->request->data['password'] == ""){
                    $this->Flash->error(__('password can not be null. Please, try again.')); $flag = false;
                }            
            }
            
             if($flag){
                if($this->request->data['address'] == ""){
                    $this->Flash->error(__('Address can not be null. Please, try again.')); $flag = false;
                }            
            }
            
             
            
            
            
            
             $arr_ext = array('jpg', 'jpeg', 'gif', 'png');
            if (!empty($this->request->data['image']['name'])) {
                $file = $this->request->data['image']; //put the data into a var for easy use
                $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                $fileName = time() . "." . $ext;
                if (in_array($ext, $arr_ext)) {
                    
                    if ($user->pimg != "" && $user->pimg != $fileName ) {
                        $filePathDel = WWW_ROOT . 'user_img' . DS . $user->pimg;
                        if (file_exists($filePathDel)) {
                            unlink($filePathDel);
                        }
                    }                     
                    move_uploaded_file($file['tmp_name'], WWW_ROOT . 'user_img' . DS . $fileName);
                    $file = $fileName;
                    $this->request->data['pimg'] = $fileName;
                } else {
                    $flag = false;
                    $this->Flash->error(__('Upload image only jpg,jpeg,png files.'));
                }
            } else {
                $this->request->data['pimg'] = $user->pimg;
            }             
            if($flag){
                
                $fullname = $this->request->data['full_name'];
                $themail = $this->request->data['email'];
                
                $pass = $this->request->data['password'];
                $this->request->data['ptxt'] = base64_encode($this->request->data['password']);                      //$this->request->data['preference'] = implode(',',$this->request->data['preference']);
                //$this->request->data['interest'] = implode(',',$this->request->data['interest']);
                $this->request->data['created'] = gmdate("Y-m-d h:i:s");
                $this->request->data['modified'] = gmdate("Y-m-d h:i:s");
                
                //print_r($this->request->data);exit;
                // Saving User details after validation
                $user = $this->Users->patchEntity($user, $this->request->data);
                if ($rs = $this->Users->save($user)) {
                    
                    

//                    $etRegObj = TableRegistry::get('EmailTemplates');
//                    $emailTemp = $etRegObj->find()->where(['id' => 5])->first()->toArray(); 
//
//                    $mail_To = $themail;
//                    //$mail_CC = '';
//                    $mail_subject = $emailTemp['subject'];
//                    $url = Router::url('/', true);
//                    $link = $url.'users/signin';
//                    
//                    // Sending credentials to user
//                    $mail_body = str_replace(array('[NAME]', '[LINK]', '[EMAIL]', '[PASS]'), array($fullname, $link, $mail_To, $pass), $emailTemp['content']);
//                    //echo $mail_body; //exit;
//
//                    $email = new Email('default');
//                    $email->emailFormat('html')->from(['info@medicinesbymailbox.co.uk' => 'Medicines By Mailbox'])
//                                                ->to($mail_To)
//                                                ->subject($mail_subject)
//                                                ->send($mail_body);                

                    $this->Flash->success('User added successfully.', ['key' => 'success']);
                    
                    //pr($this->request->data); pr($user); exit;
                    $this->redirect(['action' => 'listuser']);
                }
            }
        }
       // $this->loadModel('Tags');
       // $tags = $this->Tags->find()->where(['Tags.status' => 1])->toArray();
        
        //$this->loadModel('Interests'); 
       
        //$servicetypes = $this->Interests->find()->where(['Interests.status' => 1])->toArray();
        
        $this->set(compact('user','tags','servicetypes'));
        $this->set('_serialize', ['user','tags','servicetypes']);
    }

    
    
    
    
     public function editservice($eid = null,$id = null) {
        $this->viewBuilder()->layout('admin');
        $this->loadModel('Services');
        $this->loadModel('ServiceTypes');
        $this->loadModel('Events');
        $this->loadModel('Amenities');
        
        $user = $this->Services->get($eid);
        
        if ($this->request->is(['post', 'put'])) {
            //pr($this->request->data); exit;
            $flag = true;
            if($this->request->data['service_name'] == ""){
                $this->Flash->error(__('service Name can not be null. Please, try again.')); $flag = false;
            }
           
             
           if($this->request->data['address'] == ""){
                $this->Flash->error(__('Address can not be null. Please, try again.')); $flag = false;
            }
            
            
            $arr_ext = array('jpg', 'jpeg', 'gif', 'png');
            if (!empty($this->request->data['image']['name'])) {
                $file = $this->request->data['image']; //put the data into a var for easy use
                $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                $fileName = time() . "." . $ext;
                if (in_array($ext, $arr_ext)) {
                    
                    if ($user->image != "" && $user->image != $fileName ) {
                        $filePathDel = WWW_ROOT . 'service_img' . DS . $user->image;
                        if (file_exists($filePathDel)) {
                            unlink($filePathDel);
                        }
                    }                     
                    move_uploaded_file($file['tmp_name'], WWW_ROOT . 'service_img' . DS . $fileName);
                    $file = $fileName;
                    $this->request->data['image'] = $fileName;
                } else {
                    $flag = false;
                    $this->Flash->error(__('Upload image only jpg,jpeg,png files.'));
                }
            } else {
                $this->request->data['image'] = $user->image;
            }
                        
            if($flag){
                $this->request->data['event_id']=implode(',',$this->request->data['event_id']);
                $this->request->data['amenity_id']=implode(',',$this->request->data['amenity_id']);
                
                if($this->request->data['start_time']==""){
                    
                  $this->request->data['start_time'] = $this->request->data['start_time1'];  
                }
               
                 if($this->request->data['end_time']==""){
                    
                  $this->request->data['end_time'] = $this->request->data['end_time1'];  
                }
                
                
                
                $user = $this->Services->patchEntity($user, $this->request->data);
                
                if ($this->Services->save($user)) {
                    
                    
                    $this->Flash->success(__('Vanue has been edited successfully.'));
                    return $this->redirect(['action' => 'listservice',$id]);
                } else {
                    $this->Flash->error(__('Vanue could not be edit. Please, try again.'));
                    return $this->redirect(['action' => 'listservice',$id]);
                }
            } else {
                return $this->redirect(['action' => 'listservice',$id]);
            }           
        }
        
        $users = $this->Users->get($id);
        
        $stname=$this->ServiceTypes->find()->where(['ServiceTypes.status'=>1])->toArray();
        
        $eventname=$this->Events->find()->where(['Events.status'=>1])->toArray();
        $amenityname=$this->Amenities->find()->where(['Amenities.status'=>1])->toArray();
       
        $this->set(compact('user','stname','eventname','amenityname'));
        $this->set('_serialize', ['user']);
    }
    

    
    

    // Admin Modify User details
    public function edituser($id = null) {
        $this->viewBuilder()->layout('admin');
        $user = $this->Users->get($id);
        if ($this->request->is(['post', 'put'])) {
            //pr($this->request->data); exit;
            $flag = true;
            if($this->request->data['full_name'] == ""){
                $this->Flash->error(__('Full Name can not be null. Please, try again.')); $flag = false;
            }
            
                      
                       
            
            if($this->request->data['epassword'] != ""){
                $this->request->data['password'] = $this->request->data['epassword'];
                $this->request->data['ptxt'] = base64_encode($this->request->data['epassword']);
            }
            
            
             
            if($this->request->data['address'] == ""){
                $this->Flash->error(__('Address can not be null. Please, try again.')); $flag = false;
            }
            
             
            
            
             $arr_ext = array('jpg', 'jpeg', 'gif', 'png');
            if (!empty($this->request->data['image']['name'])) {
                $file = $this->request->data['image']; //put the data into a var for easy use
                $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                $fileName = time() . "." . $ext;
                if (in_array($ext, $arr_ext)) {
                    
                    if ($user->pimg != "" && $user->pimg != $fileName ) {
                        $filePathDel = WWW_ROOT . 'user_img' . DS . $user->pimg;
                        if (file_exists($filePathDel)) {
                            unlink($filePathDel);
                        }
                    }                     
                    move_uploaded_file($file['tmp_name'], WWW_ROOT . 'user_img' . DS . $fileName);
                    $file = $fileName;
                    $this->request->data['pimg'] = $fileName;
                } else {
                    $flag = false;
                    $this->Flash->error(__('Upload image only jpg,jpeg,png files.'));
                }
            } else {
                $this->request->data['pimg'] = $user->pimg;
            }             
            if($flag){
                //$this->request->data['modified'] = gmdate("Y-m-d H:i:s");
                if(empty($this->request->data['is_mail_verified']))
                {
                    $this->request->data['is_mail_verified'] = 1;
                }
                //pr($this->request->data);
                //exit;
                $this->request->data['preference']= implode(',',$this->request->data['preference']);
                $this->request->data['interest']= implode(',',$this->request->data['interest']);
                $user = $this->Users->patchEntity($user, $this->request->data);
                $user['modified'] = gmdate("Y-m-d H:i:s");
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('user has been edited successfully.'));
                    //return $this->redirect(['action' => 'listuser']);
                } else {
                    $this->Flash->error(__('user could not be edit. Please, try again.'));
                    return $this->redirect(['action' => 'listuser']);
                }
            } else {
                return $this->redirect(['action' => 'listuser']);
            }           
        }
        $this->loadModel('Tags');
        $tags = $this->Tags->find()->where(['Tags.status' => 1])->toArray();
        $this->loadModel('Interests'); 
       
        $servicetypes = $this->Interests->find()->where(['Interests.status' => 1])->toArray();
        
        $this->set(compact('user','tags','servicetypes'));
        $this->set('_serialize', ['user','tags','servicetypes']);
    }

    
    
    
    public function addserviceprovider() {
        $this->loadModel('ServiceProviderImages');
        
        $this->loadModel('ServiceTypes'); 
        $this->loadModel('Makes'); 
        $this->loadModel('Models');
        $this->loadModel('Features'); 
        $this->viewBuilder()->layout('admin');
        $user = $this->Users->newEntity();
        
        if ($this->request->is('post')) {

            $flag = true;
            //echo $this->generateRandomString(); exit;
            $tableRegObj = TableRegistry::get('Users');
            $userExist = $tableRegObj->find()->where(['email' => $this->request->data['email']])->toArray();
            // Validating Patient Form
            if($this->request->data['full_name'] == ""){
                $this->Flash->error(__('First Name can not be null. Please, try again.')); $flag = false;
            }
            
            
            
            if($flag){
                if($this->request->data['email'] == ""){
                    $this->Flash->error(__('Last Name can not be null. Please, try again.')); $flag = false;
                }            
            }            
            
            if($flag){
                if($userExist){
                    $flag = false;
                    $this->Flash->error(__('Email Already Registered, try with another.'));
                }  
            }            

                       
            
//            if($flag){
//                if($this->request->data['password'] == ""){
//                    $this->Flash->error(__('password can not be null. Please, try again.')); $flag = false;
//                }            
//            }
            
             if($flag){
                if($this->request->data['address'] == ""){
                    $this->Flash->error(__('Address can not be null. Please, try again.')); $flag = false;
                }            
            }
            
           
           
            if($flag){
                $fullname = $this->request->data['full_name'];
                $themail = $this->request->data['email'];
                
                 $typename = $this->request->data['type_name'];
                 $description = $this->request->data['description'];
                 
                if(!empty($typename)){
                    for ($i = 0; $i < count($typename); $i++) {
                    
                   $servicet = $this->ServiceTypes->newEntity(); 
                   $this->request->data['type_name']=$typename[$i];
                   $this->request->data['description']=$description[$i];
                   $servicet = $this->ServiceTypes->patchEntity($servicet, $this->request->data);
                   $rs = $this->ServiceTypes->save($servicet);
                    
                       //$new_id[$i] = $rs->id; 
                    
                   $data[]= $rs->id;
                    }
                    
                }
                
               if(empty($this->request->data['service_type_id'])){
                 
                   $new_st= $data;
                   
               }elseif(empty($data)){
                   
                  $new_st= $this->request->data['service_type_id'];
                   
               }else{
               $new_st=array_merge($this->request->data['service_type_id'], $data);
               }
               // print_r($new_st);exit;
                //$pass = $this->request->data['password'];
                //$this->request->data['ptxt'] = base64_encode($this->request->data['password']); 
                $servicetype = implode(',',$new_st);
                $servicetag = implode(',',$this->request->data['service_make_id']);
                $model = implode(',',$this->request->data['service_model_id']);
                $servicefeature = implode(',',$this->request->data['service_feature_id']);
                $workingdays = implode(',',$this->request->data['working_days']);
                $this->request->data['service_type_id']=$servicetype;
                $this->request->data['service_make_id']=$servicetag;
                $this->request->data['service_model_id']=$model;
                $this->request->data['service_feature_id']=$servicefeature;
                $this->request->data['working_days']=$workingdays;
                $this->request->data['created'] = gmdate("Y-m-d h:i:s");
                $this->request->data['modified'] = gmdate("Y-m-d h:i:s");
                
                
                // Saving User details after validation
                $user = $this->Users->patchEntity($user, $this->request->data);
                if ($rs = $this->Users->save($user)) {
                    
                    
                   $file_image_name = explode(",",$this->request->data['image']);
                     //print_r($file_image_name);exit;
                    foreach( $file_image_name as $img)
                {
                        
                        
                $this->request->data['serviceprovider_id'] = $rs->id;
                $this->request->data['image_name'] = $img;
                $spimage = $this->ServiceProviderImages->newEntity();        
                $spimage = $this->ServiceProviderImages->patchEntity($spimage, $this->request->data);
                
                $this->ServiceProviderImages->save($spimage);
                         
                }
                
                
               
                $this->Flash->success('Client added successfully.', ['key' => 'success']);
                   
                $this->redirect(["controller" => "Reviews", 'action' => 'listserviceprovider']);
                }
            }
        }
        
        
       
       
        $servicetypes = $this->ServiceTypes->find()->where(['ServiceTypes.status' => 1])->toArray();
        $tags = $this->Makes->find()->where(['Makes.status' => 1])->toArray();
        $models = $this->Models->find()->where(['Models.status' => 1])->contain(['Makes'])->order('Makes.make_name')->toArray();
        $features = $this->Features->find()->where(['Features.status' => 1])->toArray();
        $this->set(compact('user','servicetypes','tags','features','models'));
        $this->set('_serialize', ['user','servicetypes']);
    }
    
    
     public function upload_photo_add(){
            
            
           //$this->viewBuilder()->autoRender(false);
           $this->viewBuilder()->layout(false);
            $filen = '';
            //print_r($_FILES);
            if(!empty($_FILES['files']['name'])){

                $no_files = count($_FILES["files"]['name']);
                
                //echo $no_files;exit;
                for ($i = 0; $i < $no_files; $i++) {
                  if ($_FILES["files"]["error"][$i] > 0) {
                      echo "Error: " . $_FILES["files"]["error"][$i] . "<br>";
                      //echo 'a';exit;
                  } else {
                      
                     $pathpart=pathinfo($_FILES["files"]["name"][$i]); 
                     //echo $pathpart;exit;
                      $ext=$pathpart['extension'];          
                      $uploadFolder = "user_img/";
                      $uploadPath = WWW_ROOT . $uploadFolder;
                      $filename =uniqid().'.'.$ext;
                      $full_flg_path = $uploadPath . '/' . $filename;
                      if (move_uploaded_file($_FILES['files']['tmp_name'][$i], $full_flg_path)) { 
                          //echo $product_id;exit;
                       // $this->request->data['ProductImage']['product_id'] = $product_id;
                        //$this->request->data['ProductImage']['name'] = $filename;
                        //echo $filename,exit;
                        //$this->admin_resize($full_flg_path, $filename,$ext);
                     
                     $file = array('filename' => $filename, 'last_id' => $i+1);
                     
                     if($filen == '')
                     {
                         $filen = $filename;
                     }
                     else
                     {
                         $filen = $filen.','.$filename;
                     }   
                        
                      } 
                      $file_details[] = $file;

                  }
                  
                  
              }
                $data = array('Ack'=>1, 'data'=>$file_details,'image_name'=>$filen);
                    
               }
               else {

                 $data = array('Ack'=> 0);
               }
               echo json_encode($data);
              exit();
       }
    
       
      public function upload_doc_add(){
            
            
           //$this->viewBuilder()->autoRender(false);
           $this->viewBuilder()->layout(false);
            $filen = '';
            //print_r($_FILES);
            if(!empty($_FILES['files1']['name'])){

                $no_files = count($_FILES["files1"]['name']);
                
                //echo $no_files;exit;
                for ($i = 0; $i < $no_files; $i++) {
                  if ($_FILES["files1"]["error"][$i] > 0) {
                      echo "Error: " . $_FILES["files1"]["error"][$i] . "<br>";
                      //echo 'a';exit;
                  } else {
                      
                     $pathpart=pathinfo($_FILES["files1"]["name"][$i]); 
                     //echo $pathpart;exit;
                      $ext=$pathpart['extension'];          
                      $uploadFolder = "user_doc/";
                      $uploadPath = WWW_ROOT . $uploadFolder;
                      $filename =uniqid().'.'.$ext;
                      $full_flg_path = $uploadPath . '/' . $filename;
                      if (move_uploaded_file($_FILES['files1']['tmp_name'][$i], $full_flg_path)) { 
                          //echo $product_id;exit;
                       // $this->request->data['ProductImage']['product_id'] = $product_id;
                        //$this->request->data['ProductImage']['name'] = $filename;
                        //echo $filename,exit;
                        //$this->admin_resize($full_flg_path, $filename,$ext);
                     
                     $file = array('filename' => $filename, 'last_id' => $i+1);
                     
                     if($filen == '')
                     {
                         $filen = $filename;
                     }
                     else
                     {
                         $filen = $filen.','.$filename;
                     }   
                        
                      } 
                      $file_details[] = $file;

                  }
                  
                  
              }
                $data = array('Ack'=>1, 'data'=>$file_details,'image_name'=>$filen);
                    
               }
               else {

                 $data = array('Ack'=> 0);
               }
               echo json_encode($data);
              exit();
       } 
    
    
    
     public function editserviceprovider($id = null) {
        $this->viewBuilder()->layout('admin');
        $this->loadModel('ServiceProviderImages');
        $this->loadModel('Makes');
        $this->loadModel('Models');
        $this->loadModel('Features');
        //$this->loadModel('ServiceProviderDocuments');
        $this->loadModel('ServiceTypes'); 
        $user = $this->Users->get($id);
        if ($this->request->is(['post', 'put'])) {
            //pr($this->request->data); exit;
            $flag = true;
            if($this->request->data['full_name'] == ""){
                $this->Flash->error(__('Full Name can not be null. Please, try again.')); $flag = false;
            }
           
            if($this->request->data['address'] == ""){
                $this->Flash->error(__('Address can not be null. Please, try again.')); $flag = false;
            }
            
           
                         
            if($flag){
                //$this->request->data['modified'] = gmdate("Y-m-d H:i:s");
                if(empty($this->request->data['is_mail_verified']))
                {
                    $this->request->data['is_mail_verified'] = 1;
                }
                
                $typename = $this->request->data['type_name'];
                $description = $this->request->data['description'];
                if(!empty($typename)){
                    for ($i = 0; $i < count($typename); $i++) {
                    
                   $servicet = $this->ServiceTypes->newEntity(); 
                   $this->request->data['type_name']=$typename[$i];
                   $this->request->data['description']=$description[$i];
                   $servicet = $this->ServiceTypes->patchEntity($servicet, $this->request->data);
                   $rs = $this->ServiceTypes->save($servicet);
                    
                       //$new_id[$i] = $rs->id; 
                    
                   $data[]= $rs->id;
                    }
                    
                }
                
               if(empty($this->request->data['service_type_id'])){
                 
                   $new_st= $data;
                   
               }elseif(empty($data)){
                   
                  $new_st= $this->request->data['service_type_id'];
                   
               }else{
               $new_st=array_merge($this->request->data['service_type_id'], $data);
               }
               
                $servicetype = implode(',',$new_st);
                
                //$servicetype = implode(',',$this->request->data['service_type_id']);
                $servicetag = implode(',',$this->request->data['service_make_id']);
                $model = implode(',',$this->request->data['service_model_id']);
                $servicefeature = implode(',',$this->request->data['service_feature_id']);
                $workingdays = implode(',',$this->request->data['working_days']);
                $this->request->data['service_type_id']=$servicetype;
                $this->request->data['service_make_id']=$servicetag;
                $this->request->data['service_model_id']=$model;
                $this->request->data['service_feature_id']=$servicefeature;
                $this->request->data['working_days'] = $workingdays;
                
                $user = $this->Users->patchEntity($user, $this->request->data);
                $user['modified'] = gmdate("Y-m-d H:i:s");
                if ($this->Users->save($user)) {
                    
                    if($this->request->data['image']!=''){  
                    $file_image_name = explode(",",$this->request->data['image']);
                     //print_r($file_image_name);exit;
                    foreach( $file_image_name as $img)
                {
                        
                        
                $this->request->data['serviceprovider_id'] = $id;
                $this->request->data['image_name'] = $img;
                $spimage = $this->ServiceProviderImages->newEntity();        
                $spimage = $this->ServiceProviderImages->patchEntity($spimage, $this->request->data);
                
                $this->ServiceProviderImages->save($spimage);
                         
                }
                    
                    }
                        
                    
                    
                    $this->Flash->success(__('Service Provider has been edited successfully.'));
                    //return $this->redirect(['action' => 'listuser']);
                } else {
                    $this->Flash->error(__('Service Provider could not be edit. Please, try again.'));
                    //return $this->redirect(['action' => 'listserviceprovider_verified']);
                }
            } else {
                //return $this->redirect(['action' => 'listserviceprovider_verified']);
            }           
        }
        
        
        
        
        
        
        
        $all_image = $this->ServiceProviderImages->find()->where(['ServiceProviderImages.serviceprovider_id' => $id])->toArray();
        //$all_document = $this->ServiceProviderDocuments->find()->where(['ServiceProviderDocuments.serviceprovider_id' => $id])->toArray();
        
        $tags = $this->Makes->find()->where(['Makes.status' => 1])->toArray();
        $models = $this->Models->find()->where(['Models.status' => 1])->contain(['Makes'])->order('Makes.make_name')->toArray();
        $features = $this->Features->find()->where(['Features.status' => 1])->toArray();
        $servicetypes = $this->ServiceTypes->find()->where(['ServiceTypes.status' => 1])->toArray();
        $this->set(compact('user','servicetypes','all_image','tags','features','all_document','models'));
        $this->set('_serialize', ['user','servicetypes','all_image']);
    }

    
    public function servicedelete($eid = null,$id = null) {
        $this->loadModel('Services');
        $services = $this->Services->get($eid);
        if ($this->Services->delete($services)) {
            $this->Flash->success(__('Service has been deleted.'));
        } else {
            $this->Flash->error(__('Service could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'listservice',$id]);
    }
    
    public function delete_image(){          
             
              //$this->viewBuilder()->layout(false);
              $this->loadModel('ServiceProviderImages');
              $imageid = $this->ServiceProviderImages->get($_REQUEST['id']);
              
              if($this->ServiceProviderImages->delete($imageid)){
                   if ($imageid->image_name != "") {
                        $filePathDel = WWW_ROOT . 'user_img' . DS . $imageid->image_name;
                        if (file_exists($filePathDel)) {
                            unlink($filePathDel);
                        }
                    }
                 $data = array('Ack'=> 1);
              }
              else{
                 $data = array('Ack'=> 0);
              }
              echo json_encode($data);
              exit();
       }
    public function delete_document(){          
             
              //$this->viewBuilder()->layout(false);
              $this->loadModel('ServiceProviderDocuments');
              $imageid = $this->ServiceProviderDocuments->get($_REQUEST['id']);
              
              if($this->ServiceProviderDocuments->delete($imageid)){
                   if ($imageid->doc_name != "") {
                        $filePathDel = WWW_ROOT . 'user_doc' . DS . $imageid->doc_name;
                        if (file_exists($filePathDel)) {
                            unlink($filePathDel);
                        }
                    }
                 $data = array('Ack'=> 1);
              }
              else{
                 $data = array('Ack'=> 0);
              }
              echo json_encode($data);
              exit();
       }
    
    
     public function timingdelete($eid = null,$id = null) {
        $this->loadModel('Timings');
        $services = $this->Timings->get($eid);
        if ($this->Timings->delete($services)) {
            $this->Flash->success(__('Timing has been deleted.'));
        } else {
            $this->Flash->error(__('Timing could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'listtiming',$id]);
    }
    
    //Delete User
    public function userdelete($id = null) {
        //$this->request->allowMethod(['post', 'delete']);
        $users = $this->Users->get($id);
        if ($this->Users->delete($users)) {
            $this->Flash->success(__('User has been deleted.'));
        } else {
            $this->Flash->error(__('User could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'listuser']);
    } 
    
    public function companydelete($id = null) {
        //$this->request->allowMethod(['post', 'delete']);
        $users = $this->Users->get($id);
        if ($this->Users->delete($users)) {
            $this->Flash->success(__('Company has been deleted.'));
        } else {
            $this->Flash->error(__('Company could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'listserviceprovider_verified']);
    }
    
    public function userview($id = null) {

        $this->viewBuilder()->layout('admin');
        $this->loadModel('Interests');
        $this->loadModel('Tags');
        $users = $this->Users->get($id);
        //pr($users);
        $interestid= explode(',',$users->interest);
        $preferid= explode(',',$users->preference);
       
        $interesrname=$this->Interests->find('all', array('conditions' => array('Interests.id IN' =>$interestid)));      

        $preferencename=$this->Tags->find('all', array('conditions' => array('Tags.id IN' =>$preferid)));
        $this->set('users', $users);
        $this->set(compact('interesrname','preferencename'));
        $this->set('_serialize', ['users']);
    }    
    
    public function serviceproviderview($id = null) {

        $this->viewBuilder()->layout('admin');
        $this->loadModel('ServiceTypes');
        $this->loadModel('Makes');
        $this->loadModel('Features');
        $this->loadModel('ServiceProviderImages');
        //$this->loadModel('ServiceProviderDocuments');
        
        $users = $this->Users->get($id);

        $stid= explode(',',$users->service_type_id);
        $sfid= explode(',',$users->service_feature_id);
        $stagid= explode(',',$users->service_make_id);
        $stname=$this->ServiceTypes->find('all', array('conditions' => array('ServiceTypes.id IN' =>$stid)));
        
       $sfname=$this->Features->find('all', array('conditions' => array('Features.id IN' =>$sfid)));
        $stagname=$this->Makes->find('all', array('conditions' => array('Makes.id IN' =>$stagid)));
        
       $spimages=$this->ServiceProviderImages->find('all', array('conditions' => array('ServiceProviderImages.serviceprovider_id' =>$id))); 
        
       //$spdocs=$this->ServiceProviderDocuments->find('all', array('conditions' => array('ServiceProviderDocuments.serviceprovider_id' =>$id))); 
       
        
        $this->set('users', $users);
        $this->set(compact('stname','spimages','stagname','spdocs','sfname'));
        $this->set('_serialize', ['users','spimages']);
    }
    
    
    
     public function servicestatus($eid = null, $status = null,$id = null) {
        //echo $id; echo "--"; echo $status; //exit;
        $this->loadModel('Services'); 
        $tableRegObj = TableRegistry::get('Services');
        $query = $tableRegObj->find('all', [ 'conditions' => ['id' => $eid]]);
        $row = $query->first()->toArray();
        //pr($row); exit;
        if($row){
            $subquestion = TableRegistry::get('Services');
            $query = $subquestion->query();
            if($status == 1){
                $query->update()->set(['is_active' => 1])->where(['id' => $eid])->execute();
                $this->Flash->success(__('Service has been activated.'));
            } else if($status == 0){
                $query->update()->set(['is_active' => 0])->where(['id' => $eid])->execute(); 
                $this->Flash->success(__('Service has been suspended.'));
            }
        } else {
            $this->Flash->error(__('Service Not Found.'));
        }        
        return $this->redirect(['action' => 'listservice',$id]); 
    }
   
     public function timingstatus($eid = null, $status = null,$id = null) {
        //echo $id; echo "--"; echo $status; //exit;
        $this->loadModel('Timings'); 
        $tableRegObj = TableRegistry::get('Timings');
        $query = $tableRegObj->find('all', [ 'conditions' => ['id' => $eid]]);
        $row = $query->first()->toArray();
        //pr($row); exit;
        if($row){
            $subquestion = TableRegistry::get('Timings');
            $query = $subquestion->query();
            if($status == 1){
                $query->update()->set(['is_active' => 1])->where(['id' => $eid])->execute();
                $this->Flash->success(__('Timing has been activated.'));
            } else if($status == 0){
                $query->update()->set(['is_active' => 0])->where(['id' => $eid])->execute(); 
                $this->Flash->success(__('Timing has been suspended.'));
            }
        } else {
            $this->Flash->error(__('Service Not Found.'));
        }        
        return $this->redirect(['action' => 'listtiming',$id]); 
    }
    
    
        
    
    //Change User Status
    public function userstatus($id = null, $status = null) {
        //echo $id; echo "--"; echo $status; //exit;
        $this->loadModel('Users'); 
        $tableRegObj = TableRegistry::get('Users');
        $query = $tableRegObj->find('all', [ 'conditions' => ['id' => $id]]);
        $row = $query->first()->toArray();
        //pr($row); exit;
        if($row){
            $subquestion = TableRegistry::get('Users');
            $query = $subquestion->query();
            if($status == 1){
                $query->update()->set(['is_active' => 1,'is_mail_verified' => 1])->where(['id' => $id])->execute();
                $this->Flash->success(__('Tenant has been activated.'));
            } else if($status == 0){
                $query->update()->set(['is_active' => 0])->where(['id' => $id])->execute(); 
                $this->Flash->success(__('Tenant has been suspended.'));
            }
        } else {
            $this->Flash->error(__('Tenant Not Found.'));
        }        
        return $this->redirect(['action' => 'listuser']); 
    }

     public function companystatus($id = null, $status = null) {
        //echo $id; echo "--"; echo $status; //exit;
        $this->loadModel('Users'); 
        $tableRegObj = TableRegistry::get('Users');
        $query = $tableRegObj->find('all', [ 'conditions' => ['id' => $id]]);
        $row = $query->first()->toArray();
        //pr($row); exit;
        if($row){
            $subquestion = TableRegistry::get('Users');
            $query = $subquestion->query();
            if($status == 1){
                $query->update()->set(['is_active' => 1,'is_mail_verified' => 1])->where(['id' => $id])->execute();
                $this->Flash->success(__('Client has been activated.'));
            } else if($status == 0){
                $query->update()->set(['is_active' => 0])->where(['id' => $id])->execute(); 
                $this->Flash->success(__('Client has been suspended.'));
            }
        } else {
            $this->Flash->error(__('Client Not Found.'));
        }        
        return $this->redirect(['action' => 'listserviceprovider_verified']); 
    }
    
     public function companystatus_nonverified($id = null, $status = null) {
        //echo $id; echo "--"; echo $status; //exit;
        $this->loadModel('Users'); 
        $tableRegObj = TableRegistry::get('Users');
        $query = $tableRegObj->find('all', [ 'conditions' => ['id' => $id]]);
        $row = $query->first()->toArray();
        //pr($row); exit;
        if($row){
            $subquestion = TableRegistry::get('Users');
            $query = $subquestion->query();
            if($status == 1){
                $query->update()->set(['is_active' => 1,'is_mail_verified' => 1])->where(['id' => $id])->execute();
                $this->Flash->success(__('Company has been activated.'));
            } else if($status == 0){
                $query->update()->set(['is_active' => 0])->where(['id' => $id])->execute(); 
                $this->Flash->success(__('Company has been suspended.'));
            }
        } else {
            $this->Flash->error(__('Company Not Found.'));
        }        
        return $this->redirect(['action' => 'listserviceprovider_nonverified']); 
    }
    
    
    
    //Check timezone and convert date time
    public function change_datetimeformat($datetime)
    {
//        $time = Time::createFromFormat(
//    'Y-m-d H:i:s',
//    $datetime,
//    'Asia/Karachi'
//);
        $date = date('Y-m-d h:i a',$datetime);
        $ip= isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? 
        $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR']; 
        $session = $this->request->session();
        $timezone = $session->read('Config.timezone');
        if(empty($timezone))
        {
            $time_data = file_get_contents('http://ip-api.com/json/' . $ip);
            $session->write('Config.timezone',$time_data);
            $data = json_decode($time_data); 
        }
        else
        {
            $data = json_decode($timezone);
        }
        $result=array();
        if($data->status == 'success')
        {
             $timezone = $data->timezone;
        }
        else 
        {
            $timezone="Europe/London";
        }
        date_default_timezone_set($timezone);
        $gmtTimezone = new \DateTimeZone('GMT'); 
        $myDateTime = new \DateTime($date, $gmtTimezone);
        $offset = date("P");
        $place_order_date=date('d/m/Y h:i a', $myDateTime->format('U') + $offset);
        $this->response->body($place_order_date);
        return $this->response;
    }
    
    function balk_delete()
    {
       foreach($this->request->data["users"] as $user)
       {
           $users = $this->Users->get($user);
           $this->Users->delete($users);
       }
      echo "1";
      exit;

    }
    
    public function forgot()
    {
     $this->viewBuilder()->layout('adminlogin');
      if ($this->request->is('post')) 
      {
          $username=$this->request->data["username"];
          $user=$this->Users->find->where(["username"=>$username])->first();
          pr($user);exit;
      }

    }
    
    
    
    //for slider
    
    public function addslider() {
        $this->loadModel('Sliders');
        $this->viewBuilder()->layout('admin');
        $user = $this->Sliders->newEntity();
        if ($this->request->is('post')) {

            $flag = true;
            //echo $this->generateRandomString(); exit;
            $tableRegObj = TableRegistry::get('Sliders');
             
             $arr_ext = array('jpg', 'jpeg', 'gif', 'png');
            if (!empty($this->request->data['image']['name'])) {
                $file = $this->request->data['image']; //put the data into a var for easy use
                $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                $fileName = time() . "." . $ext;
                if (in_array($ext, $arr_ext)) {
                    
                    if ($user->image != "" && $user->image != $fileName ) {
                        $filePathDel = WWW_ROOT . 'slider_img' . DS . $user->image;
                        if (file_exists($filePathDel)) {
                            unlink($filePathDel);
                        }
                    }                     
                    move_uploaded_file($file['tmp_name'], WWW_ROOT . 'slider_img' . DS . $fileName);
                    $file = $fileName;
                    $this->request->data['image'] = $fileName;
                } else {
                    $flag = false;
                    $this->Flash->error(__('Upload image only jpg,jpeg,png files.'));
                }
            } else {
                $this->request->data['image'] = $user->image;
            }             
            if($flag){
                
               
                $this->request->data['created'] = gmdate("Y-m-d h:i:s");
                $this->request->data['modified'] = gmdate("Y-m-d h:i:s");
                
                
                $user = $this->Sliders->patchEntity($user, $this->request->data);
                if ($rs = $this->Sliders->save($user)) {
                
                    $this->Flash->success('Slider added successfully.', ['key' => 'success']);
                    
                    //pr($this->request->data); pr($user); exit;
                    $this->redirect(['action' => 'listslider']);
                }
            }
        }
       
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }
    
    public function listslider() {
        $this->viewBuilder()->layout('admin');
        $this->loadModel('Sliders');
        //$conditions = ['Sliders.is_active' => 1];
       
        $this->paginate = [
           //'conditions' => $conditions,
            'order' => [ 'id' => 'DESC']
        ];
        $user = $this->paginate($this->Sliders);
       
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
 
    }
    
    public function editslider($id = null) {
        $this->viewBuilder()->layout('admin');
        $this->loadModel('Sliders');
        $user = $this->Sliders->get($id);
        if ($this->request->is(['post', 'put'])) {
            //pr($this->request->data); exit;
            $flag = true;
           
            
             $arr_ext = array('jpg', 'jpeg', 'gif', 'png');
            if (!empty($this->request->data['image']['name'])) {
                $file = $this->request->data['image']; //put the data into a var for easy use
                $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                $fileName = time() . "." . $ext;
                if (in_array($ext, $arr_ext)) {
                    
                    if ($user->image != "" && $user->image != $fileName ) {
                        $filePathDel = WWW_ROOT . 'slider_img' . DS . $user->image;
                        if (file_exists($filePathDel)) {
                            unlink($filePathDel);
                        }
                    }                     
                    move_uploaded_file($file['tmp_name'], WWW_ROOT . 'slider_img' . DS . $fileName);
                    $file = $fileName;
                    $this->request->data['image'] = $fileName;
                } else {
                    $flag = false;
                    $this->Flash->error(__('Upload image only jpg,jpeg,png files.'));
                }
            } else {
                $this->request->data['image'] = $user->image;
            }             
            if($flag){
                
                $user = $this->Sliders->patchEntity($user, $this->request->data);
                $user['modified'] = gmdate("Y-m-d H:i:s");
                if ($this->Sliders->save($user)) {
                    $this->Flash->success(__('Slider has been edited successfully.'));
                    //return $this->redirect(['action' => 'listuser']);
                } else {
                    $this->Flash->error(__('Slider could not be edit. Please, try again.'));
                    return $this->redirect(['action' => 'listslider']);
                }
            } else {
                return $this->redirect(['action' => 'listslider']);
            }           
        }
       
        
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }
    
    public function sliderdelete($id = null) {
       $this->loadModel('Sliders');
        $users = $this->Sliders->get($id);
        if ($this->Sliders->delete($users)) {
            $this->Flash->success(__('Slider has been deleted.'));
        } else {
            $this->Flash->error(__('Slider could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'listslider']);
    }
    
    public function sliderstatus($id = null, $status = null) {
        $this->loadModel('Sliders');
        $this->loadModel('Sliders'); 
        $tableRegObj = TableRegistry::get('Sliders');
        $query = $tableRegObj->find('all', [ 'conditions' => ['id' => $id]]);
        $row = $query->first()->toArray();
        //pr($row); exit;
        if($row){
            $subquestion = TableRegistry::get('Sliders');
            $query = $subquestion->query();
            if($status == 1){
                $query->update()->set(['is_active' => 1])->where(['id' => $id])->execute();
                $this->Flash->success(__('Slider has been activated.'));
            } else if($status == 0){
                $query->update()->set(['is_active' => 0])->where(['id' => $id])->execute(); 
                $this->Flash->success(__('Slider has been suspended.'));
            }
        } else {
            $this->Flash->error(__('Slider Not Found.'));
        }        
        return $this->redirect(['action' => 'listslider']); 
    }
    
    
    
    //SELECT i.interest_name FROM `users` as u ,interests as i WHERE find_in_set(i.id,u.interest) and u.id=43
    
}

