 
<?php echo $this->element('profile_head');?>
<section class="pt-5 pb-5">
  <div class="container">
    <div class="row">
     
       <?php echo $this->element('side_menu');?>
      
      <div class="col-lg-9">
        <div class="bg-gray p-3">
            <form method="post" action="<?php echo $this->Url->build(["controller" => "Users","action" => "changepass"]);?>">
<!--            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Old Password</label>
              <div class="col-sm-10">
                  <input type="password" class="form-control" name="old_password" >
              </div>
            </div>-->
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">New Password</label>
              <div class="col-sm-10">
                  <input type="password" class="form-control" name="new_password" >
              </div>
            </div>
            
             <div class="form-group row">
              <label class="col-sm-2 col-form-label">Confirm Password</label>
              <div class="col-sm-10">
                  <input type="password" class="form-control" name="password" >
              </div>
            </div> 
            
            <div class="form-group row">
              <div class="col-sm-12 text-center">
                <button type="submit" name="button" class="btn btn-success"><i class="fa fa-cloud-upload pr-2" aria-hidden="true"></i>Change Password</button>
<!--                <button type="button" name="button" class="btn btn-danger"><i class="fa fa-refresh pr-2" aria-hidden="true"></i> RESET</button>-->
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

