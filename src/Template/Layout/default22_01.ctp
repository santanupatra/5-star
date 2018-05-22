<?php 

$userid = $this->request->session()->read('Auth.User.id');
$admin_checkid = $this->request->session()->read('Auth.User.is_admin');

echo $this->element('head');?> 


  <body>
      
    <section class="hed-hdr-otr">
        
      <div class="hed-hdr-otr-inner">
        <div id="demo2" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ul class="carousel-indicators">
          <?php $a=0; foreach($slider as $dt){?>  
          <li data-target="#demo" data-slide-to="<?php echo $a;?>" class="<?php echo (($a == 0)? 'active' : '');?>"></li>
          
          <?php $a++; } ?>
        </ul>
        <!-- The slideshow -->
        <div class="carousel-inner">
            <?php $a=1; foreach($slider as $dt){?>
          <div class="carousel-item <?php echo (($a == 1)? 'active' : '');?>" >
            <div class="hed-hdr" style="background-image: url('<?php echo $this->Url->build('/slider_img/'.$dt->image); ?>');"></div>
          </div>
            <?php $a++; } ?>
<!--          <div class="carousel-item">
            <div class="hed-hdr"></div>
          </div>
          <div class="carousel-item">
            <div class="hed-hdr"></div>
          </div>-->
        </div>
      </div>
      </div>
        
      <div class="header">
        <div class="container">
          <nav class="navbar navbar-expand-lg navbar-light bg-light bg-transparent my-navbar">
          
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          
          <a class="navbar-brand" href="<?php echo $this->Url->build(["controller" => "Users","action" => "index"]);?>">
            <img src="<?php echo $this->Url->build('/image/logo.png'); ?>" alt="">
          </a>          

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              
             <?php if(isset($userid) && $admin_checkid!=1){?> 
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link text-white" href="<?php echo $this->Url->build(["controller" => "Users","action" => "toptenlist"]);?>">Top 10 Rated</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="<?php echo $this->Url->build(["controller" => "Users","action" => "jimjafav"]);?>"> Jimja Favorites </a>
              </li>
<!--              <li class="nav-item">
                <a class="nav-link text-white" href="<?php echo $this->Url->build(["controller" => "Users","action" => "signout"]);?>"> <i class="fa fa-user-plus" aria-hidden="true"></i> Sign Out </a>
              </li>-->
               <li class="nav-item dropdown">
              
                <button class="nav-link text-white dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border: none; background: none;">  <i class="fa fa-user"></i> <?php echo $user_details['full_name']?> </button>
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
              
            </ul>
             <?php }else{ ?>
              
              <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link text-white" href="<?php echo $this->Url->build(["controller" => "Users","action" => "toptenlist"]);?>">Top 10 Rated</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="<?php echo $this->Url->build(["controller" => "Users","action" => "jimjafav"]);?>"> Jimja Favorites </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="#"  data-toggle="modal" data-target="#exampleModal2"> <i class="fa fa-user-plus" aria-hidden="true"></i> Log In </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="#"  data-toggle="modal" data-target="#exampleModal">  <i class="fa fa-user"></i> Sign up </a>
              </li>
            </ul>
              
             <?php } ?>
              
              
              
            <form class="form-inline my-2 my-lg-0">
              <button type="button" name="button" class="btn btn-success btn-lg">Add your Favorite Place</button>
              <button class="btn btn-link my-2 my-sm-0 bg-transparent text-white" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
            </form>
          </div>
        </nav>
        </div>
      </div>
      
        
<?php echo $this->Flash->render() ?>
<?php echo $this->Flash->render('success') ?>
<?php echo $this->Flash->render('error') ?>
<?php echo $this->fetch('content');?>
<?php echo $this->element('footer');?> 
        
        
        
   
   
   

   
  
    
    <script type="text/javascript">
    $( document ).ready( function () {
//alert('ok');
    $( "#frmRegister" ).validate({
        //alert('ok');
        rules: {
          'firstname': "required",
          'lastname': "required",
          'phone': "required",
          'utype': "required",
          'email': {
            required: true           
          },
                  
          'password': {
            required: true,
            minlength: 6
          },
          'con_password': {
            required: true,
            minlength: 6
          }
          
        },
        messages: {
          'utype': "Please choose user type", 
          'firstname': "Please enter your firstname",
          'lastname': "Please enter your lastname",
          'email': "Please enter a valid email address", 
          'phone': "Please enter a valid mobileno.", 
                 
          'password': {
            required: "Please provide a password",
            minlength: "Your password must be at least 6 characters long"
          },
          'con_password': {
            required: "Please re-type  password",
            minlength: "Your password must be same as above password"
          }
        },
        
       
      });



$( "#frmLogin" ).validate({
        //alert('ok');
        rules: {
          
          'email': {
            required: true           
          },
                  
          'password': {
            required: true,
            minlength: 6
          }
         
        },
        messages: {
          
          'email': "Please enter a valid email address",
         
                 
          'password': {
            required: "Please provide a password",
            minlength: "Your password must be at least 6 characters long"
          }
          
        },
       
      });

    });


</script>

    
  </body>
</html>   
   
   
   
   
   