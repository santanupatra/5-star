<div class="col-lg-3">
    <ul class="profile-list bg-gray">
     <?php  if($user_details['utype'] == 1){ ?>
        <li><a href="<?php echo $this->Url->build(["controller" => "Users","action" => "editprofile"]);?>" <?php if ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'editprofile'){?> class="active" <?php } ?>><i class="fa fa-pencil mr-1" aria-hidden="true"></i> Edit Profile</a></li>
        
        <?php }elseif($user_details['utype'] == 2){ ?>
        <li><a href="<?php echo $this->Url->build(["controller" => "Users","action" => "serviceeditprofile"]);?>" <?php if ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'serviceeditprofile'){?> class="active" <?php } ?>><i class="fa fa-pencil mr-1" aria-hidden="true"></i> Edit Profile</a></li>
        <?php if($user_details['check_verified'] == 'Y'){?>
        <li><a href="<?php echo $this->Url->build(["controller" => "Services","action" => "addservice"]);?>" <?php if ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'addservice'){?> class="active" <?php } ?>><i class="fa fa-plus mr-1" aria-hidden="true"></i> Add Service</a></li>
        
        <li><a href="<?php echo $this->Url->build(["controller" => "Services","action" => "listservice"]);?>" <?php if ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'listservice'){?> class="active" <?php } ?>><i class="fa fa-file mr-1" aria-hidden="true"></i> Services List</a></li>
        
        <?php } } ?>
        
        
        
        <li><a href="<?php echo $this->Url->build(["controller" => "Users","action" => "changepass"]);?>" <?php if ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'changepass'){?> class="active" <?php } ?>><i class="fa fa-unlock-alt mr-1" aria-hidden="true"></i> Change Password</a></li>
        
        <li><a href="<?php echo $this->Url->build(["controller" => "Users","action" => "favouritelist"]);?>" <?php if ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'favouritelist'){?> class="active" <?php } ?>><i class="fa fa-heart mr-1" aria-hidden="true"></i> My Favourite</a></li>
    </ul>
</div>