<!-- Modal login -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Sign In</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <section>
              <form style="text-align: center;" class="form-wrapper rightFrmContainer" id="frmLogin" accept-charset="utf-8" method="post" action="<?php echo $this->Url->build(["controller" => "Users","action" => "signin"]);?>">
                 <div class="clearfix">
                    <div class="form-group">
                       <div class="row">
                         <div class="col-lg-6">
                           <button class="btn btn-block btn-google" type="button" onclick="google_login()"><i class="fa fa-google-plus mr-2" aria-hidden="true"></i>Sign up with Google</button>
                         </div>
                         <div class="col-lg-6">
                            <button class="btn btn-block btn-facebook flogin" type="button"><i class="fa fa-facebook mr-2" aria-hidden="true"></i>Sign up with Facebook</button>
                         </div>
                       </div>
                    </div>
                    <div style="margin-bottom:0px;" class="hr-label mb-3"><span class="text">or</span></div>
                 </div>
                 
                 <div class="form-group">
                    <input type="text" class="form-control input-lg" size="30" maxlength="80" placeholder="Email" id="email" name="email">
                 </div>
                 <div class="form-group">
                    <input type="password" class="form-control input-lg" placeholder="Password" size="30" maxlength="100" id="password" name="password">
                 </div>
                 <div class="clearfix">
                    <button type="submit" class="btn btn-success btn-block" name="submit">Sign In</button>
                 </div>
              </form>
            </section>
          </div>
        </div>
      </div>
    </div>
   <!--login modal end-->
   
   <!--registration modal-->
   
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Sign Up</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <section>
              <form style="text-align: center;" class="form-wrapper rightFrmContainer"  accept-charset="utf-8" method="post" action="<?php echo $this->Url->build(["controller" => "Users","action" => "signup"]);?>" id="frmRegister">
                 <div class="clearfix">
                    <div class="form-group">
                       <div class="row">
                         <div class="col-lg-6">
                           <button class="btn btn-block btn-google" type="button"><i class="fa fa-google-plus mr-2" aria-hidden="true"></i>Sign up with Google</button>
                         </div>
                         <div class="col-lg-6">
                           <button class="btn btn-block btn-facebook" type="button"><i class="fa fa-facebook mr-2" aria-hidden="true"></i>Sign up with Facebook</button>
                         </div>
                       </div>
                    </div>
                    <div style="margin-bottom:0px;" class="hr-label mb-3"><span class="text">or</span></div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group d-flex align-items-center pull-left clearfix">
                            <input type="radio"  class="form-split form-control input-lg mr-1" id="utype" value="1"  name="utype" style="width: 20px" checked="">User
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group d-flex align-items-center pull-left clearfix">
                            <input type="radio" class="form-split form-control input-lg mr-1" id="utype" value="2" name="utype" style="width: 20px">Service Provider
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                            <input type="text"  class="form-split form-control input-lg" placeholder="First name" id="firstName"  name="firstname">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                           <input type="text" class="form-split form-control input-lg" size="30"  placeholder="Last name" id="lastname" name="lastname">
                        </div>
                      </div>
                    </div>
                 </div>

                 <div class="form-group">
                    <input type="text" class="form-control input-lg" size="30" maxlength="80" placeholder="Phone number" id="phone" name="phone">
                 </div>
                 <div class="form-group">
                    <input type="text" autocomplete="off" class="form-control input-lg" size="30" maxlength="80" placeholder="Email" id="email"  name="email">
                 </div>
                 <div class="form-group">
                    <input type="password" autocomplete="off" class="form-control input-lg" placeholder="Password" size="30" maxlength="100" id="password"  name="password">
                 </div>

                 <div class="form-group">
                    <input type="password" autocomplete="off" class="form-control input-lg" placeholder="Confirm password" size="30" maxlength="100" id="con_password" name="con_password">
                 </div>
                 <div class="clearfix">
                    <button type="submit" class="btn btn-success btn-block">Sign up for free</button>
                    <div class="clearfix">
                       <label class="termsCondition checkbox pull-left"> By signing up, you agree to our <a class="link" href="/terms">Terms</a>.</label>
                    </div>
                 </div>
              </form>
            </section>
          </div>
        </div>
      </div>
    </div>
<footer class="pt-5 pb-5">
      <div class="container">
        <div class="ftr-prt-wth-warp">
          <div class="ftr-prt-wth">
            <h4>Help</h4>
            <ul>
              <li>
                <a href="<?php echo $this->Url->build(["controller" => "contents", "terms-and-condition"]); ?>"> Terms of Service </a>
              </li>
              <li>
                <a href="<?php echo $this->Url->build(["controller" => "contents", "privacy-policy"]); ?>"> Privacy Policy </a>
              </li>
              <li>
                <a href="#"> Site Map </a>
              </li>
            </ul>
          </div>
          <div class="ftr-prt-wth">
            <h4>Follow Us</h4>
            <ul>
              <li>
                <a href="<?php echo $SiteSettings['facebook_url'];?>"> <i class="fa fa-facebook" aria-hidden="true"></i> Facebook </a>
              </li>
              <li>
                <a href="<?php echo $SiteSettings['instagram_url'];?>"> <i class="fa fa-instagram" aria-hidden="true"></i> Instagram </a>
              </li>
              <li>
                <a href="<?php echo $SiteSettings['twitter_url'];?>"> <i class="fa fa-twitter" aria-hidden="true"></i> Twitter </a>
              </li>
            </ul>
          </div>
          
          <!-- <div class="ftr-prt-wth">
            <h4>Follow Us</h4>
            <ul>
                <?php 
                $userid = $this->request->session()->read('Auth.User.id');
                if(isset($userid)){?> 
              
              <li>
                <a href="<?php echo $this->Url->build(["controller" => "Users","action" => "signout"]);?>" > Sign Out </a>
              </li>
                <?php }else{ ?>
              
              <li>
                <a href="#" data-toggle="modal" data-target="#exampleModal"> Sign Up  </a>
              </li>
              <li>
                <a href="#" data-toggle="modal" data-target="#exampleModal2"> Log In </a>
              </li>
              
                <?php } ?>
            </ul>
          </div> -->
          <div class="ftr-prt-wth">
            <h4>Company</h4>
            <ul>
              <li>
                <a href="<?php echo $this->Url->build('/blog'); ?>"> Blog </a>
              </li>
              <li>
                <a href="<?php echo $this->Url->build(["controller" => "faqs"]); ?>"> FAQ </a>
              </li>
              <li>
                <a href="<?php echo $this->Url->build(["controller" => "contents", "about-us"]); ?>"> About Us </a>
              </li>
            </ul>
          </div>
          <div class="ftr-prt-wth">
            <h4>Support</h4>
            <ul>
              <li>
                <a href="#"> <i class=""></i>Your Voice </a>
              </li>
              <li>
                <a href="#"> Add Your Place </a>
              </li>
              <li>
                <a href="#"> Contact Us </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="ftr-btn-lab pt-5 mt-5">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <p class="mb-0">All Contents Copyright © 2017 Jimja.com</p>
            </div>
            <div class="col-md-6 text-right">
              <div class="d-inline-block">
                <div class="text-center">
                  <img src="<?php echo $this->Url->build('/image/top.png'); ?>" alt="">
                </div>
                <p class="mb-0">Back to Top</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
   <script>
$(document).ready(function(){
  setTimeout(function(){ $(".message").fadeOut() }, 3000);
})    
</script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/bootstrap-slider.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    
    <?php echo $this->Html->script('bootstrap.min.js') ?>
    <?php echo $this->Html->script('jquery.flexslider.js'); ?>
    <?php echo $this->Html->script('lightbox.js'); ?>
    <script type="text/javascript">
    // Can also be used with $(document).ready()
    /*$(window).load(function() {
      $('.flexslider').flexslider({
        animation: "slide",
        animationLoop: false,
        controlNav: false,
        itemWidth: 210,
        itemMargin: 5,
        minItems: 2,
        maxItems: 4
      });
      
    });*/
    (function() {
 
		  // store the slider in a local variable
		  var $window = $(window),
		      flexslider = { vars:{} };
		 
		  // tiny helper function to add breakpoints
		  function getGridSize() {
		    return (window.innerWidth < 600) ? 1 :
		           (window.innerWidth < 900) ? 3 : 4;
		  }
		 
		  $(function() {
		    SyntaxHighlighter.all();
		  });
		 
		  $window.load(function() {
		    $('.flexslider').flexslider({
		     animation: "slide",
	         animationLoop: false,
	         controlNav: false,
	         itemWidth: 210,
	         itemMargin: 5,
	         minItems: 2,
	         maxItems: 4,
		      
		      minItems: getGridSize(), // use function to pull in initial value
		      maxItems: getGridSize() // use function to pull in initial value
		    });
		  });
		 
		  // check grid size on resize event
		  $window.resize(function() {
		    var gridSize = getGridSize();
		 
		    flexslider.vars.minItems = gridSize;
		    flexslider.vars.maxItems = gridSize;
		  });
		}());
    </script>
    
<!--    <script>
    	$("#ex5").slider();
    	$("#ex6").slider();
    	$("#ex7").slider();
    	$("#ex8").slider();
    	$("#ex9").slider();
    </script> -->

    
<script>


 /*************** Sign Up Facebook ***********************/
            $.getScript('//connect.facebook.net/en_US/all.js', function(){
                FB.init({ appId: '550300998642584'});    
                $(".flogin").on("click", function(e){ 
                    
                    
                 e.preventDefault();    
                 FB.login(function(response){
                  // FB Login Failed //
                  if(!response || response.status !== 'connected') {
                   alert("Given account information are not authorised", "Facebook says");
                  }else{
                   // FB Login Successfull //
                   FB.api('/me',{fields: ['email','name']}, function(fbdata){ 
                   //alert(fbdata) ;    
                   //console.log(fbdata); 
                   var name1 = fbdata.name;
                   var name = name1.split(' ');
                    var fb_user_id = fbdata.id;      
                    var fb_first_name = name[0];
                    var fb_last_name = name[1];
                    var fb_email = fbdata.email;
                    var fb_username = fbdata.username;
                    //fb_usertype = 'S';
                   
                    //alert(fb_email);
                    
                    //console.log(fb_email);
                    
                    $.ajax({
                            url: 'users/fblogin',
                            dataType: 'json',
                            type: 'post',
                            data: {"data" : {"User" : {"email" : fb_email,  "full_name" : fb_first_name +' '+fb_last_name, "facebook_id" : fb_user_id, "is_active" : 1,"is_admin" : 0 }}},
                            success: function(data){ //console.log(data);alert('here ok');alert(data.status);
                                if(data.status)
                                {
                                  //alert(data.url);
                                    window.location.href = data.url;
                                    //$(this).closest('form').find("input[type=text]").val("");
                                    //showSuccess('Registration successfull.');
                                     //$('.email_error').hide();
                                    //$('.sign-up-btn').removeAttr('disabled');
                                }  
                                else
                                {
                                    window.location = '';
                                    //showError(data.message);
                                    //showError('Internal Error. Please try again later.');
                                   // $('.email_error').show();
                                    //$('.sign-up-btn').attr('disabled','disabled');
                                }
                            }
                    });
                   

                   })
                  }
                 }, {scope:"email"});
                 
                 
                  });


                  
               });
               
     
</script>    
    
    
    
    


<script src="https://apis.google.com/js/client:plusone.js" type="text/javascript"></script>
<script>
    (function() {
                 var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                 po.src = 'https://apis.google.com/js/client:plusone.js?onload=googleonLoadCallback1';
                 var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
               })();
               
               function googleonLoadCallback1()
                {
                    gapi.client.setApiKey('AIzaSyCofoe11UHxc81zeiBbC9TGb-hQkS8hmm0'); //set your API KEY
                    gapi.client.load('plus', 'v1',function(){});//Load Google + API
                }

                function google_login()
                {
                  var myParams = {
                    'clientid' : '751525553369-e95mm54jbb0mumnrm1pbk8tn2idet4hu.apps.googleusercontent.com', //You need to set client id
                    'cookiepolicy' : 'single_host_origin',
                    'callback' : 'googleloginCallback', //callback function
                    'approvalprompt':'force',
                    'scope' : 'https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/plus.profile.emails.read'
                  };
                  gapi.auth.signIn(myParams);
                }

                function googleloginCallback(result)
                {
                    if(result['status']['signed_in'])
                    {
                        console.log(result);
                       // alert("Login Success");
                        gapi.client.load('plus', 'v1', function() {

    var request = gapi.client.plus.people.get({
        'userId': 'me'
    });

    request.execute(function(resp) {
      //console.log(resp);
        var email = '';
                            if(resp['emails'])
                            {
                                for(i = 0; i < resp['emails'].length; i++)
                                {
                                    if(resp['emails'][i]['type'] == 'account')
                                    {
                                        email = resp['emails'][i]['value'];
                                    }
                                }
                            }
              var name1 = resp['displayName'];
               var name = name1.split(' ');      
                             var first_name = name[0];
                             var last_name = name[1];
               var google_id = resp['id'];
                              $.ajax({
                            url: '/team6/jimja/users/googlelogin',
                            dataType: 'json',
                            type: 'post',
                            data: {"data" : {"User" : {"email" : email,  "full_name" : first_name +' '+ last_name, "google_id" : google_id, "is_active" : 1,"is_admin" : 0}}},
                            success: function(data){ //console.log(data);alert(data.url);alert(data.status);
                                if(data.status)
                                {
                                    
                                    window.location.href = data.url;

                                    //$(this).closest('form').find("input[type=text]").val("");
                                    //showSuccess('Registration successfull.');
                                     //$('.email_error').hide();
                                    //$('.sign-up-btn').removeAttr('disabled');
                                }  
                                else
                                {
                                    window.location = '';
                                    //showError(data.message);
                                    //showError('Internal Error. Please try again later.');
                                   // $('.email_error').show();
                                    //$('.sign-up-btn').attr('disabled','disabled');
                                }
                            }
                    });
                           
    });
});
                       
                        
                    }  

                }
</script>


  </body>
</html>