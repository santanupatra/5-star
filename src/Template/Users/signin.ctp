<section class="py-5" style="padding-top: 4rem !important;">
  <div class="container">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <h5 class="modal-title text-center w-100" id="loginModal">Login</h5>
        
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
              <p class="text-right"><a href="<?php echo $this->Url->build(["controller" => "Users","action" => "forgotpassword"]);?>" >Forgot Password?</a></p>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block mb-2">Login</button>
        </form>
      </div>
      <div class="modal-footer pt-0 border-0">
        <p class="text-center w-100 pt-3 mb-1" style="border-top:1px solid #e1e1e1">Don’t have account? <a href="<?php echo $this->Url->build(["controller" => "Users","action" => "signup"]);?>">Sign Up</a></p>
      </div>
      </div>
    </div>
  </div>
</section>
 