<?php

$userid = $this->request->session()->read('Auth.User.id');
$admin_checkid = $this->request->session()->read('Auth.User.is_admin');

echo $this->element('head');?>
<?php echo  $this->Html->css('style.css') ?>

  <body>

<section class="bg-gray inr-hdr">
      <div class="header">
        <div class="container">
          <nav class="navbar navbar-expand-lg navbar-light bg-light bg-transparent my-navbar">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <a class="navbar-brand" href="<?php echo $this->Url->build(["controller" => "Users","action" => "index"]);?>">
            <img src="<?php echo $this->Url->build('/images/logo.png'); ?>" alt="">
          </a>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
              
              
              <?php if(isset($userid) && $admin_checkid!=1){?>
<!--              <li class="nav-item">
                <a class="nav-link text-gray" href="<?php echo $this->Url->build(["controller" => "Users","action" => "signout"]);?>"> <i class="fa fa-user-plus" aria-hidden="true"></i> Sign Out </a>
              </li>-->
               

              
              <li class="nav-item dropdown">
              
                <button class="nav-link text-gray dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border: none; background: none;">  <i class="fa fa-user"></i> <?php echo $user_details['full_name']?> </button>
                <?php  if($user_details['utype'] == 1){ ?>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="<?php echo $this->Url->build(["controller" => "Users","action" => "dashboard"]);?>">My Dashboard</a>
                  <a class="dropdown-item" href="<?php echo $this->Url->build(["controller" => "Users","action" => "editprofile"]);?>">Edit Profile</a>
                  <a class="dropdown-item" href="<?php echo $this->Url->build(["controller" => "Users","action" => "signout"]);?>">Sign Out</a>
                  
                </div>
                <?php }elseif($user_details['utype'] == 2){ ?>
                 <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="<?php echo $this->Url->build(["controller" => "Users","action" => "servicedashboard"]);?>">My Dashboard</a>
                  <a class="dropdown-item" href="<?php echo $this->Url->build(["controller" => "Users","action" => "serviceeditprofile"]);?>">Edit Profile</a>
                  <a class="dropdown-item" href="<?php echo $this->Url->build(["controller" => "Users","action" => "signout"]);?>">Sign Out</a>
                  
                </div>
                <?php } ?>
              </li>
              
              
             
              
              <?php }else{ ?>

              <li class="nav-item">
                <a class="nav-link text-gray " href="#"  data-toggle="modal" data-target="#exampleModal2"> <i class="fa fa-user-plus" aria-hidden="true"></i> Log In </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-gray" href="#"  data-toggle="modal" data-target="#exampleModal">  <i class="fa fa-user"></i> Sign up </a>
              </li>
              <?php } ?>

            </ul>
            
          </div>
        </nav>
        </div>
      </div>
    </section>


<?php echo $this->Flash->render() ?>
<?php echo $this->Flash->render('success') ?>
<?php echo $this->Flash->render('error') ?>
<?php echo $this->fetch('content');?>
<?php echo $this->element('footer');?>



  </body>
</html>
