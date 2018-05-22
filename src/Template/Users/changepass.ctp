<section class="user-dashboard">
    <div class="container">
      <div class="row">
       <?php echo $this->element('side_menu');?>
        <div class="col-lg-9 col-md-8">
          <div class="edit-pro p-3 p-lg-4">
            <h5 class="common-title mb-3 pb-2">Change Password</h5>
            <div class="row">
              <div class="col-lg-10">
                <form method="post" action="<?php echo $this->Url->build(["controller" => "Users","action" => "serviceeditprofile"]);?>">
                  <div class="form-group row">
                    <label for="staticEmail" class="col-sm-4 col-form-label">New Password:</label>
                    <div class="col-sm-8">                      
                       <input type="password" class="form-control" id="n" placeholder="New password..." name="new_password" >
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="staticEmail" class="col-sm-4 col-form-label">Confirm Password:</label>
                    <div class="col-sm-8">
                      <input type="password" class="form-control" id="e" name="password"  placeholder="Confirm password...">                  
                    </div>
                  </div>
                                 
                
                  <div class="row">
                    <div class="col-sm-8 ml-auto">
                      <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </section>