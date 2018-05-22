<!-- MENU SECTION -->
<?php ?>
<div id="left" >
    <div class="media user-media well-small"> <a class="user-link" href="javascript:void(0);"> 

        </a> <br />
        <div class="media-body">
            <h5 class="media-heading"> <?php echo $SiteSettings['site_title'];?> Admin </h5>
            <ul class="list-unstyled user-info">
                <li> <!-- <a class="btn btn-success btn-xs btn-circle" style="width: 10px;height: 12px;"></a> Online --> </li>
            </ul>
        </div>
        <br />
    </div>
    <ul id="menu" class="collapse" style=" width:100%; margin-top:30px;">
        <li class="panel <?php if ($this->request->params['action'] == 'home') { ?> active <?php } else { ?><?php } ?>"> <a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "home"]); ?>" >  Dashboard </a> </li>

        
        <!----------------- Site Settings Start ------------------------>
        
        <li class="panel <?php if ($this->request->params['controller'] == 'SiteSettings') { ?> active <?php } else { ?><?php } ?>"> 
            <a href="javascript:void(0)" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#sitesettings"> Site Settings </a>
            <ul class="<?php echo $this->request->params['controller'] == 'SiteSettings' ? 'in' : 'collapse' ?>" id="sitesettings">
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "SiteSettings", "action" => "logo"]); ?>"><i class="icon-angle-right"></i> Logo Management </a></li>
                
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "SiteSettings", "action" => "sitedetail"]); ?>"><i class="icon-angle-right"></i> Site Settings </a></li>
                
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "SiteSettings", "action" => "sitesociials"]); ?>"><i class="icon-angle-right"></i> Social Settings </a></li>



                
            </ul>
        </li> 
        
        <!----------------- Site Settings End ------------------------>
        
       
        
        <!----------------- Slider Management Start ------------------------>
        
        <li class="panel <?php if (($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'listslider') || ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'addslider') || ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'editslider') || ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'sliderdelete') || ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'sliderview')) { ?> active <?php } else { ?><?php } ?>"> 
            <a href="javascript:void(0)" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#slider"> Banner Management </a>
            <ul class="<?php if (($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'listslider') || ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'addslider') || ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'editslider') || ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'sliderdelete') || ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'sliderview')) { ?> in <?php } else { ?> collapse <?php } ?>" id="slider">
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "listslider"]); ?>"><i class="icon-angle-right"></i> Banner List </a></li>					
                <!-- <li class=""><a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "addslider"]); ?>"><i class="icon-angle-right"></i> Add Slider </a></li> -->
            </ul>
        </li>
       
        <!----------------- Slider Management End ------------------------>
        
        
        
        
        
        
        <!----------------- User Management Start ------------------------>
        
        <li class="panel <?php if (($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'listuser') || ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'add') || ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'edituser') || ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'userdelete') || ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'userview')) { ?> active <?php } else { ?><?php } ?>"> 
            <a href="javascript:void(0)" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#users"> Users Management </a>
            <ul class="<?php if (($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'listuser') || ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'add') || ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'edituser') || ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'userdelete') || ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'userview')) { ?> in <?php } else { ?> collapse <?php } ?>" id="users">
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "listuser"]); ?>"><i class="icon-angle-right"></i> Users List </a></li>					
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "add"]); ?>"><i class="icon-angle-right"></i> Add Users </a></li>
            </ul>
        </li>
       
        <!----------------- Users Management End ------------------------>
        
        
        <!----------------- Service Provider Management Start ------------------------>
        
        <li class="panel <?php if (($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'listserviceprovider_verified') || ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'listserviceprovider_nonverified') || ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'addserviceprovider') || ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'editserviceprovider') || ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'companydelete') || ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'serviceproviderview')) { ?> active <?php } else { ?><?php } ?>"> 
            <a href="javascript:void(0)" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#company"> Clients Management </a>
            <ul class="<?php if (($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'listserviceprovider_verified') || ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'listserviceprovider_nonverified')  || ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'addserviceprovider') || ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'editserviceprovider') || ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'companydelete') || ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'serviceproviderview')) { ?> in <?php } else { ?> collapse <?php } ?>" id="company">
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "listserviceprovider_nonverified"]); ?>"><i class="icon-angle-right"></i> Non verified Clients </a></li>			
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "listserviceprovider_verified"]); ?>"><i class="icon-angle-right"></i> Verified Clients List </a></li>
                
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "addserviceprovider"]); ?>"><i class="icon-angle-right"></i> Add Client </a></li>
            </ul>
        </li>
       
        <!----------------- Service Provider Management End ------------------------>

        
        
       <!----------------- Service Type Management Start ------------------------>
        
        <li class="panel <?php if (($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'listservicetype') || ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'addservicetype') || ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'editservicetype') || ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'servicetypedelete') || ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'servicetypeview')) { ?> active <?php } else { ?><?php } ?>"> 
            <a href="javascript:void(0)" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#services"> Venue Type Management </a>
            <ul class="<?php if (($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'listservicetype') || ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'addservicetype') || ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'editservicetype') || ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'servicetypedelete') || ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'servicetypeview')) { ?> in <?php } else { ?> collapse <?php } ?>" id="services">
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "Services", "action" => "listservicetype"]); ?>"><i class="icon-angle-right"></i> Venue Type List </a></li>					
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "Services", "action" => "addservicetype"]); ?>"><i class="icon-angle-right"></i> Add Venue Type </a></li>
            </ul>
        </li>
       
        <!----------------- Service Type Management End ------------------------> 
        
        
       
        <!----------------- Car Make Management Start ------------------------>
        
<!--        <li class="panel <?php if (($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'listmake') || ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'addmake') || ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'editmake') || ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'makedelete') || ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'makeview')) { ?> active <?php } else { ?><?php } ?>"> 
            <a href="javascript:void(0)" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#servicesmake"> Car Make Management </a>
            <ul class="<?php if (($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'listmake') || ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'addmake') || ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'editmake') || ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'makedelete') || ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'makeview')) { ?> in <?php } else { ?> collapse <?php } ?>" id="servicesmake">
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "Services", "action" => "listmake"]); ?>"><i class="icon-angle-right"></i> Car Make List </a></li>					
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "Services", "action" => "addmake"]); ?>"><i class="icon-angle-right"></i> Add Car Make </a></li>
            </ul>
        </li>-->
       
        <!----------------- Car Make Management End ------------------------> 
        
       
        <!----------------- Car Model Management Start ------------------------>
        
<!--        <li class="panel <?php if (($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'listmodel') || ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'addmodel') || ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'editmodel') || ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'modeldelete')) { ?> active <?php } else { ?><?php } ?>"> 
            <a href="javascript:void(0)" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#model"> Car Model Management </a>
            <ul class="<?php if (($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'listmodel') || ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'addmodel') || ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'editmodel') || ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'modeldelete') ) { ?> in <?php } else { ?> collapse <?php } ?>" id="model">
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "Services", "action" => "listmodel"]); ?>"><i class="icon-angle-right"></i> Model List </a></li>					
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "Services", "action" => "addmodel"]); ?>"><i class="icon-angle-right"></i> Add Model </a></li>
            </ul>
        </li>-->
       
        <!----------------- Car Model Management End ------------------------>
        
        
        
        
        
        
        
        
        
        <!----------------- Feature Management Start ------------------------>
        
        <li class="panel <?php if (($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'listevent') || ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'addevent') || ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'editevent') || ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'eventdelete') || ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'eventview') || ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'listamenities') || ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'addamenities') || ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'editamenities') || ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'amenitiesdelete') || ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'amenitiesview')) { ?> active <?php } else { ?><?php } ?>"> 
            <a href="javascript:void(0)" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#event"> Feature Management </a>
            <ul class="<?php if (($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'listevent') || ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'addevent') || ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'editevent') || ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'eventdelete') || ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'eventview') || ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'listamenities') || ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'addamenities') || ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'editamenities') || ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'amenitiesdelete') || ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'amenitiesview')) { ?> in <?php } else { ?> collapse <?php } ?>" id="event">
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "Services", "action" => "listevent"]); ?>"><i class="icon-angle-right"></i> Event List </a></li>					
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "Services", "action" => "addevent"]); ?>"><i class="icon-angle-right"></i> Add Event </a></li>
                
                
                
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "Services", "action" => "listamenities"]); ?>"><i class="icon-angle-right"></i> Amenities List </a></li>					
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "Services", "action" => "addamenities"]); ?>"><i class="icon-angle-right"></i> Add Amenities </a></li>
               
            </ul>
        </li>
       
        
        
        <!---------------- Feature Management End ------------------------> 
        
        
        
        
        
        
        
        
        
        <!----------------- Rating Text Management Start ------------------------>
        
<!--        <li class="panel <?php if (($this->request->params['controller'] == 'Reviews' && $this->request->params['action'] == 'listratingtext') || ($this->request->params['controller'] == 'Reviews' && $this->request->params['action'] == 'addratingtext') || ($this->request->params['controller'] == 'Reviews' && $this->request->params['action'] == 'editratingtext') || ($this->request->params['controller'] == 'Reviews' && $this->request->params['action'] == 'ratingtextdelete')) { ?> active <?php } else { ?><?php } ?>"> 
            <a href="javascript:void(0)" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#ratingtext"> Rating Text Management </a>
            <ul class="<?php if (($this->request->params['controller'] == 'Reviews' && $this->request->params['action'] == 'listratingtext') || ($this->request->params['controller'] == 'Reviews' && $this->request->params['action'] == 'addratingtext') || ($this->request->params['controller'] == 'Reviews' && $this->request->params['action'] == 'editratingtext') || ($this->request->params['controller'] == 'Reviews' && $this->request->params['action'] == 'ratingtextdelete') ) { ?> in <?php } else { ?> collapse <?php } ?>" id="ratingtext">
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "Reviews", "action" => "listratingtext"]); ?>"><i class="icon-angle-right"></i> Rating Text List </a></li>					
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "Reviews", "action" => "addratingtext"]); ?>"><i class="icon-angle-right"></i> Add Rating Text </a></li>
            </ul>
        </li>-->
       
        <!----------------- Rating Text Management End ------------------------> 
        
        

     <!----------------- Moderation Management Start ------------------------>
        
        <li class="panel <?php if (($this->request->params['controller'] == 'Reviews' && $this->request->params['action'] == 'listreview') || ($this->request->params['controller'] == 'Reviews' && $this->request->params['action'] == 'reviewview') || ($this->request->params['controller'] == 'Reviews' && $this->request->params['action'] == 'listserviceprovider') || ($this->request->params['controller'] == 'Reviews' && $this->request->params['action'] == 'listreview_new') || ($this->request->params['controller'] == 'Reviews' && $this->request->params['action'] == 'listwish')) { ?> active <?php } else { ?><?php } ?>"> 
            
            <a href="javascript:void(0)" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#Review"> Moderation </a>
            
            <ul class="<?php if (($this->request->params['controller'] == 'Reviews' && $this->request->params['action'] == 'listreview') || ($this->request->params['controller'] == 'Reviews' && $this->request->params['action'] == 'reviewview') || ($this->request->params['controller'] == 'Reviews' && $this->request->params['action'] == 'listserviceprovider') || ($this->request->params['controller'] == 'Reviews' && $this->request->params['action'] == 'listreview_new') || ($this->request->params['controller'] == 'Reviews' && $this->request->params['action'] == 'listwish')) { ?> in <?php } else { ?> collapse <?php } ?>" id="Review">
                
<!--                <li class=""><a href="<?php echo $this->Url->build(["controller" => "Reviews", "action" => "listreview"]); ?>"><i class="icon-angle-right"></i> All Review List </a></li>-->
                
<!--                <li class=""><a href="<?php echo $this->Url->build(["controller" => "Reviews", "action" => "listreview_new"]); ?>"><i class="icon-angle-right"></i> New Reviews </a></li>-->
                
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "Reviews", "action" => "listserviceprovider"]); ?>"><i class="icon-angle-right"></i> Clients To Be Verified </a></li>
                
<!--                <li class=""><a href="<?php echo $this->Url->build(["controller" => "Reviews", "action" => "listwish"]); ?>"><i class="icon-angle-right"></i> Wish List </a></li>-->
                
            </ul>
        </li>
       
        <!----------------- Moderation Management End ------------------------>
        
        
        
        <!----------------- Booking Management Start -------------------------------->
       
        <li class="panel <?php if (($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'listbooking')) { ?> active <?php } else { ?> '' <?php } ?>"> 
            <a href="javascript:void(0)" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#books"> Booking Management </a>
            <ul class="<?php if($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'listbooking') { ?> in <?php }else{ ?> collapse <?php } ?>" id="books">
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "Services", "action" => "listbooking"]); ?>"><i class="icon-angle-right"></i> Booking List </a></li>					
            </ul>
        </li>   
        
        <!----------------- Booking Management End -------------------------------->
        
       
        
        <!----------------- Contents Management Start -------------------------------->
       
        <li class="panel <?php if ($this->request->params['controller'] == 'Contents') { ?> active <?php } else { ?> '' <?php } ?>"> 
            <a href="javascript:void(0)" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#contents"> Contents </a>
            <ul class="<?php echo $this->request->params['controller'] == 'Contents'  ? 'in' : 'collapse' ?>" id="contents">
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "Contents", "action" => "index"]); ?>"><i class="icon-angle-right"></i> Contents List </a></li>					
            </ul>
        </li>   
        
        <!----------------- Contents Management End -------------------------------->
        
        
        
        
       <!----------------- Email Templates Management  Start -------------------------------->
        
        <li class="panel <?php if ($this->request->params['controller'] == 'EmailTemplates') { ?> active <?php } else { ?> '' <?php } ?>"> 
            <a href="javascript:void(0)" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#email_tpl"> Email Templates </a>
            <ul class="<?php echo $this->request->params['controller'] == 'EmailTemplates' ? 'in' : 'collapse' ?>" id="email_tpl">
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "EmailTemplates", "action" => "index"]); ?>"><i class="icon-angle-right"></i> Email Templates List </a></li>					
            </ul>
        </li>   
        
        <!----------------- Email Templates Management End -------------------------------->
         
       <!-----------------  Email Subscribers  Start -------------------------------->
        
<!--        <li class="panel <?php if (($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'listemailsubscriber') || ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'sendemail')) { ?> active <?php } else { ?> '' <?php } ?>"> 
            <a href="javascript:void(0)" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#Suscribers"> Email Subscribers </a>
            <ul class="<?php echo $this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'listemailsubscriber' ? 'in' : 'collapse' ?>" id="Suscribers">
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "Services", "action" => "listemailsubscriber"]); ?>"><i class="icon-angle-right"></i>  Subscribers List </a></li>			
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "Services", "action" => "sendemail"]); ?>"><i class="icon-angle-right"></i>  Send Email </a></li>
            </ul>
            
        </li>   -->
        
        <!----------------- Email Subscribers End -------------------------------->
        
        
        <!-----------------  Statistics  Start -------------------------------->
        
<!--        <li class="panel <?php if ($this->request->params['controller'] == 'Statistics') { ?> active <?php } else { ?> '' <?php } ?>"> 
            <a href="javascript:void(0)" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#Statistics"> Statistics </a>
            <ul class="<?php echo $this->request->params['controller'] == 'Statistics' ? 'in' : 'collapse' ?>" id="Statistics">
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "Statistics", "action" => "index"]); ?>"><i class="icon-angle-right"></i> View Statistics </a></li>					
            </ul>
        </li>   -->
        
        <!----------------- Statistics End -------------------------------->
        
       <!----------------- FAQ Management Start ------------------------>
        
        <li class="panel <?php if ($this->request->params['controller'] == 'Faqs') { ?> active <?php } else { ?><?php } ?>"> 
            <a href="javascript:void(0)" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#faq"> FAQ </a>
            <ul class="<?php echo $this->request->params['controller'] == 'Faqs' ? 'in' : 'collapse' ?>" id="faq">
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "Faqs", "action" => "index"]); ?>">
                        <i class="icon-angle-right"></i> FAQ List </a></li>                 
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "Faqs", "action" => "add"]); ?>">
                        <i class="icon-angle-right"></i> Add FAQ </a></li>   
            </ul>
        </li> 
       
        <!----------------- FAQ Management End ------------------------>

        <!----------------- Testimonial Start ------------------------>
        
        <li class="panel <?php if ($this->request->params['controller'] == 'Testimonials') { ?> active <?php } else { ?><?php } ?>"> 
            <a href="javascript:void(0)" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#testimoliak"> Testimonials </a>
            <ul class="<?php echo $this->request->params['controller'] == 'Testimonials' ? 'in' : 'collapse' ?>" id="testimoliak">
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "Testimonials", "action" => "index"]); ?>">
                        <i class="icon-angle-right"></i> Testimonial List </a></li>                 
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "Testimonials", "action" => "add"]); ?>">
                        <i class="icon-angle-right"></i> Add Testimonial </a></li>   
            </ul>
        </li> 
       
        <!----------------- Testimonial End ------------------------>
        
    </ul>
</div>
<!--END MENU SECTION --> 