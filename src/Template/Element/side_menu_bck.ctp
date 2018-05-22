
<div class="col-lg-3 col-md-4">
  <div class="left-bar mb-4">
    <div class="d-flex p-3 p-lg-4 align-items-center left-bar-top">
       
      <div class="user-image mr-2">
          <?php if ($user_details->pimg != '') { ?>
        <img src="<?php echo $this->Url->build('/user_img/' . $user->pimg); ?>" alt="" class="rounded-circle">
          <?php }else{ ?>
        <img src="<?php echo $this->Url->build('/user_img/default.png'); ?>" alt="" class="rounded-circle">
          <?php } ?>
      </div>
      <div class="user-info">

        <h6 class="mb-0"><?php echo $user_details->full_name;?></h6>
        <p class="mb-0 location"><i class="ion-location"></i> <?php echo $user_details->address;?></p>

      </div>
    </div>
      
      
      
      <!--menus-->
      
      <?php  if($user_details['utype'] == 2){ ?>
    <ul class="sidebar-menu list-unstyled mb-0">

      <li <?php if ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'servicedashboard'){?> class="active" <?php } ?>><a href="<?php echo $this->Url->build(["controller" => "Users","action" => "servicedashboard"]);?>"><span><i class="ion-home"></i></span> Home</a></li>
      
      <li <?php if ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'serviceeditprofile'){?> class="active" <?php } ?>><a href="<?php echo $this->Url->build(["controller" => "Users","action" => "serviceeditprofile"]);?>"><span><i class="ion-ios-person"></i></span> Profile</a></li>
      
      
      <li <?php if ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'changepass'){?> class="active" <?php } ?>><a href="<?php echo $this->Url->build(["controller" => "Users","action" => "changepass"]);?>"><span><i class="ion-ios-person"></i></span> Change Password</a></li>
      
      <li <?php if ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'addservice'){?> class="active" <?php } ?>><a href="<?php echo $this->Url->build(["controller" => "Services","action" => "addservice"]);?>"><span><i class="ion-plus"></i></span> Add Venue</a></li>
      
      
      <li <?php if ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'listservice'){?> class="active" <?php } ?>><a href="<?php echo $this->Url->build(["controller" => "Services","action" => "listservice"]);?>" ><i class="ion-star"></i> Venue List</a></li>
      
      
      <li><a href=""><span><i class="ion-heart"></i></span> Wishlist</a></li>
      <li><a href=""><span><i class="ion-ios-email"></i></span> Messages</a></li>

     
        <?php 
         if($user_details['utype'] == 2){ ?>
           <li <?php if ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'servicedashboard'){?> class="active" <?php } ?>><a href="<?php echo $this->Url->build(["controller" => "Users","action" => "servicedashboard"]);?>"><span><i class="ion-home"></i></span> Home</a></li>
          <li <?php if ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'serviceeditprofile'){?> class="active" <?php } ?>><a href="<?php echo $this->Url->build(["controller" => "Users","action" => "serviceeditprofile"]);?>"><span><i class="ion-ios-person"></i></span>Edit Profile</a></li>
      <?php
        }
        else {
      ?>
       <li <?php if ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'dashboard'){?> class="active" <?php } ?>><a href="<?php echo $this->Url->build(["controller" => "Users","action" => "dashboard"]);?>"><span><i class="ion-home"></i></span> Home</a></li>
      <li <?php if ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'editprofile'){?> class="active" <?php } ?>><a href="<?php echo $this->Url->build(["controller" => "Users","action" => "editprofile"]);?>"><span><i class="ion-ios-person"></i></span>Edit Profile</a></li>
      <?php
       }
       ?>
      <li <?php if ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'changepass'){?> class="active" <?php } ?>><a href="<?php echo $this->Url->build(["controller" => "Users","action" => "changepass"]);?>"><span><i class="ion-ios-person"></i></span> Change Password</a></li>      
        <li><a href=""><span><i class="ion-heart"></i></span> Wishlist</a></li>
        <li><a href=""><span><i class="ion-ios-email"></i></span> Messages</a></li>
        <?php 
         if($user_details['utype'] == 2){ ?>
       
      <li><a href=""><span><i class="ion-android-calendar"></i></span> Bookings</a></li>
      <li><a href=""><span><i class="ion-star"></i></span> Reviews</a></li>
      <li><a href=""><span><i class="ion-ios-pricetag"></i></span> Subscriptions</a></li>
      <?php
        }
       ?>
      <li><a href=""><span><i class="ion-log-out"></i></span> Log Out</a></li>
    </ul>
      
      <?php } ?>
  </div>
</div>