<section class="py-5" style="padding-top: 4rem !important;">
  <div class="container">
    <div class="modal-dialog" role="document" style="height: auto !important;">
      <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <h5 class="modal-title text-center w-100" id="registerModal">Register</h5>
        
      </div>
      <div class="modal-body">
        <a href="#" class="btn btn-block button-fb" onclick="flogin()"><i class="ion-social-facebook"></i> Connect with Facebook</a>
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
            <select class="form-control" id="utype" name="utype">
              <option value="1">User</option>
              <option value="2">Client</option>
            </select>
          </div>
          <div id="client_fields" style="display: none;">

            <div class="form-group">
              <label for="">Business Name</label>
              <input type="text" name="business_name" class="form-control" id="business_name">
            </div>
            <div class="form-group">
              <label for="">Country</label>
              <input type="text" name="country" class="form-control" id="country">
            </div>

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
        <p class="text-center w-100 pt-3 mb-1" style="border-top:1px solid #e1e1e1">You have account? <a href="<?php echo $this->Url->build(["controller" => "Users","action" => "signin"]);?>">Sign in</a></p>
      </div>
      </div>
    </div>
  
  </div>
</section>

<script type="text/javascript">
  $(function(){
    $('#utype').change(function(){
      if($(this).val() == 2){
        $('#client_fields').show('slow');
      }
      else{
         $('#client_fields').hide('slow');
      }
    })
  })
</script>
 