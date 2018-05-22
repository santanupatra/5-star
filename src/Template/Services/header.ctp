<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <h5 class="modal-title text-center w-100" id="loginModal">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <button class="btn btn-block mb-3 button-fb flogin"><i class="ion-social-facebook "></i> Connect with Facebook</button>
        <button class="btn btn-block button-google"><i class="ion-social-googleplus"></i> Connect with Google Plus</button>
        <div class="or my-4">
          <span>OR</span>
        </div>
        <form id="frmLogin" accept-charset="utf-8" method="post" action="<?php echo $this->Url->build(["controller" => "Users","action" => "signin"]);?>">
          <div class="form-group">
            <label for="exampleInputEmail1">Email Address</label>
            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="password">
          </div>
          <div class="row">
            <div class="col">
              <div class="form-check">
                <input type="checkbox" class="form-check-input ml-0" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Remember me</label>
              </div>
            </div>
            <div class="col">
              <p class="text-right"><a href="#" onclick="forget()">Forgot Password?</a></p>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block mb-2">Login</button>
        </form>
      </div>
      <div class="modal-footer pt-0 border-0">
        <p class="text-center w-100 pt-3 mb-1" style="border-top:1px solid #e1e1e1">Don’t have account? <a href="#" onclick="registration()">Sign Up</a></p>
      </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <h5 class="modal-title text-center w-100" id="registerModal">Register</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <a href="#" class="btn btn-block mb-3 button-fb" onclick="flogin()"><i class="ion-social-facebook"></i> Connect with Facebook</a>
        <a href="#" onclick="google_login()" class="btn btn-block button-google"><i class="ion-social-googleplus"></i> Connect with Google Plus</a>
        <div class="or my-4">
          <span>OR</span>
        </div>
        <form action="<?php echo $this->Url->build(["controller" => "Users","action" => "signup"]);?>" method="post" id="frmRegister">
          <!-- <div class="user-pic-wrap mb-3">
            <div class="user-image text-center ml-auto mr-auto">
              <img src="<?php echo $this->request->webroot;?>images/no_avatar.jpg" id="usr_img">
              <span>
                <div>
                  <i class="ion-camera"></i>
                  <input type="file" id="input_img"/>
                </div>
              </span>
            </div>
          </div> -->
          <div class="form-group">
            <label for="exampleInputEmail1">Name<span style="color:red">*</span></label>
            <input type="text" name="full_name" class="form-control" id="full_name">
          </div>
          <!-- <div class="form-group">
            <label for="exampleInputEmail1">Address</label>
            <input type="text" name="address" class="form-control" id="address">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Country</label>
            <select class="form-control">
              <option value="">Albania</option>
              <option value="">India</option>
              <option value="">United States</option>
            </select>
          </div> -->
          <div class="form-group">
            <label for="exampleInputEmail1">Email<span style="color:red">*</span></label>
            <input type="email" name="email" class="form-control" id="email">
          </div>
          <div class="form-group">
            <label for="">Phone number<span style="color:red">*</span></label>
            <input type="text" name="phone" class="form-control" id="phone">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password<span style="color:red">*</span></label>
            <input type="password" name="password" class="form-control" id="password">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Confirm password<span style="color:red">*</span></label>
            <input type="password" name="con_password" class="form-control" id="con_password">
          </div>

          <div class="form-group">
            <label for="">Register as a</label>
            <select class="form-control" name="utype">
              <option value="1">User</option>
              <option value="2">Client</option>
            </select>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-check">
                <input type="checkbox" class="form-check-input ml-0" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Remember me</label>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block mb-2">Sign up</button>
        </form>
      </div>
      <div class="modal-footer pt-0 border-0">
        <p class="text-center w-100 pt-3 mb-1" style="border-top:1px solid #e1e1e1">You have account? <a href="#" onclick="login()">Sign in</a></p>
      </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="myModal_forget" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <h5 class="modal-title text-center w-100" id="loginModal">Forgot Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form style="text-align: center;" class="form-wrapper rightFrmContainer" id="frmLogin" accept-charset="utf-8" method="post" action="<?php echo $this->Url->build(["controller" => "Users","action" => "forgotpassword"]);?>">
          <div class="form-group">
            <label for="exampleInputEmail1">Email Address</label>
            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
          </div>
          <button type="submit" class="btn btn-primary btn-block mb-2">Send</button>
        </form>
      </div>
      </div>
    </div>
  </div>

<nav class="navbar navbar-expand-lg navbar-toggleable-md fixed-top navbar-light bg-light ">
    <div class="container">
      <?php
          if ($this->request->params['controller'] == 'Users' && $this->request->params['action'] != 'index'){
       ?>
        <a class="navbar-brand d-sm-block" href="#"><img src="<?php echo $this->request->webroot;?>images/logo.png" alt="" /></a>
      <?php
        }
       ?>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <?php
              if ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'index'){
           ?>
           <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="ion-android-phone-portrait"></i> Download App</a>
            </li>
          </ul>
          <?php
            }
          ?>
        <ul class="navbar-nav ml-auto right-navbar">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo $this->Url->build(["controller" => "Users","action" => "index"]);?>">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="chatbox" href="#">Messages</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Blog</a>
          </li>
         <?php
         if(isset($user_id)){?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo $this->Url->build(["controller" => "Users","action" => "signout"]);?>">Log Out</a>
          </li>

          <?php  if($user_details['utype'] == 1){ ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo $this->Url->build(["controller" => "Users","action" => "dashboard"]);?>">My Dashboard</a>
            </li>
            <?php }else{ ?>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo $this->Url->build(["controller" => "Users","action" => "servicedashboard"]);?>">My Dashboard</a>
              </li>
            <?php } ?>
          <?php
            }
            else{
          ?>
           <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal">Log In</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#registerModal">Register</a>
          </li>
          <?php
            }
          ?>
          <!--  <li class="nav-item cart-item">
              <a href="#" id="chatbox" class="nav-link">
                <img src="<?php echo $this->request->webroot;?>img/chat.png" style="width:50px">
              </a>
            </li> -->
          <li class="nav-item cart-item">
            <a href="<?php echo $this->request->webroot;?>services/cart" class="nav-link"><i class="ion-android-cart"></i><span><?php echo((isset($awaiting_payment) && !empty($awaiting_payment))?'<b>'.$awaiting_payment.'</b>':'<b>0</b>' );?></span></a>
          </li>

          <li class="nav-item">
            <?php if(!isset($user_id)){?>
              <a href="#" data-toggle="modal" data-target="#loginModal" class="btn btn-primary">Add Venues</a>
            <?php
             }
             else{
                echo '<a href="'.$this->Url->build(["controller" => "Services","action" => "addservice"]).'" class="btn btn-primary">Add Venues</a>';
             }
             ?>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <script type="text/javascript">
    function forget(){
        $('#loginModal').modal('hide');
        $('#myModal_forget').modal('show');
    }
    function login(){
        $('#registerModal').modal('hide');
        $('#loginModal').modal('show');
    }
    function registration(){
        $('#loginModal').modal('hide');
        $('#registerModal').modal('show');
    }


    $( document ).ready( function () {
      $('#chatbox').click(function(){
        $('.chat_box').slideToggle('slow');
      })
    $( "#frmRegister" ).validate({
        rules: {
          'full_name': "required",

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
          'full_name': "Please enter your name",

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
<script>


 /*************** Sign Up Facebook ***********************/
            $.getScript('//connect.facebook.net/en_US/all.js', function(){
                FB.init({ appId: '220021031884550'});
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
        gapi.client.setApiKey('AIzaSyAiHAU-y9TPqKPJsHCJWXISULhybhfhaag'); //set your API KEY
        gapi.client.load('plus', 'v1',function(){});//Load Google + API
    }

    function google_login()
    {
      var myParams = {
        'clientid' : '828743319746-e7f5upfed8l72l2imkqjrinliop95sut.apps.googleusercontent.com', //You need to set client id
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
                url: '/team6/carvis/users/googlelogin',
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
