<section class="py-5" style="padding-top: 4rem !important;">
  <div class="container">
  
    <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <h5 class="modal-title text-center w-100" id="loginModal">Forgot Password</h5>
        
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
</section>
 