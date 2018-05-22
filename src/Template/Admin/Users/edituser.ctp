<?php //pr($user); //exit; ?>


<div id="content">
    <div class="inner">
        <div class="row">
            <div class="col-lg-12">
                <h1 > Edit User </h1>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <header>
                        <div class="icons"><i class="icon-th-large"></i></div>
                        <h5>Edit User</h5>
                        <div class="toolbar">
                            <ul class="nav">
                                <li style="margin-right:15px">
                                    <div class="btn-group"> 
                                        <a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "add"]); ?>">
                                            <button class="btn btn-xs btn-success close-box"> <i class="icon-plus"></i> Add User</button></a>
                                        <a href="<?php echo $this->Url->build(["controller" => "Users","action" => "listuser"]);?>"><button class="btn btn-xs btn-success close-box">
                                                <i class="icon-list"></i>List User</button></a>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </header>
                    <div id="collapseOne" class="accordion-body collapse in body">
                        <div class="col-sm-6">

                            <div class="row">
                                <?php echo $this->Form->create($user, ['class' => 'form-horizontal', 'id' => 'user-validate', 'enctype' => 'multipart/form-data']); ?>

                                                              
                        <div><h3><b>Basic Information</b></h3></div><br>
                                <div class="form-group">
                                    <label class="control-label col-lg-4">Full Name</label>
                                    <div class="col-lg-8">
                                        <input type="text" id="first_name" name="full_name" class="form-control" value="<?php echo $user->full_name ?>"/>
                                    </div>
                                </div>  

                                <div class="form-group">
                                    <label class="control-label col-lg-4">Contact Number</label>
                                    <div class="col-lg-8">
                                        <input type="text" id="phone" name="phone" class="form-control" value="<?php echo $user->phone ?>"/>
                                    </div>
                                </div>                               

                                <div class="form-group">
                                    <label class="control-label col-lg-4">Email</label>
                                    <div class="col-lg-8">
                                        <input type="text" id="email" name="email" class="form-control" readonly="readonly" value="<?php echo $user->email ?>"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-4">Password</label>
                                    <div class="col-lg-8">
                                        <input type="password" id="epassword" name="epassword" class="form-control" value=""/>
                                    </div>
                                </div>

                                
                                <div class="form-group">
                                    <label class="control-label col-lg-4">Address</label>
                                    <div class="col-lg-8">
                                        <input class="form-control" id="autocomplete" name="address" type="text" onFocus=geolocate() value="<?php echo $user->address ?>"/>
                                    </div>
                                </div>     
                                    
                              <input  type="hidden" id="lat" name="latitude" value="<?php echo $user->latitude ?>"/>
                              <input  type="hidden" id="long" name="longitude" value="<?php echo $user->longitude ?>"/>
                               
                              
                              <div class="form-group">
                                    <label class="control-label col-lg-4">Town/City</label>
                                    <div class="col-lg-8">
                                        <input type="text" id="password" name="city" value="<?php echo $user->city ?>" class="form-control" value=""/>
                                    </div>
                                </div>
                              
                              <div class="form-group">
                                    <label class="control-label col-lg-4">Country</label>
                                    <div class="col-lg-8">
                                        <input type="text" id="password" name="country" value="<?php echo $user->country ?>" class="form-control" value=""/>
                                    </div>
                                </div>
                              
                              <div class="form-group">
                                    <label class="control-label col-lg-4">Postcode</label>
                                    <div class="col-lg-8">
                                        <input type="text" id="password" name="postcode" value="<?php echo $user->postcode ?>" class="form-control" value=""/>
                                    </div>
                                </div>
                              
                              <div class="form-group">
                                  <label class="control-label col-lg-4">User Image </label>
                                  <div class="col-lg-8">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;">
                                            <?php $filePath = WWW_ROOT . 'user_img' .DS. $user->pimg; ?>
                                            <?php if ($user->pimg != "" && file_exists($filePath)) { ?>
                                                <img src="<?php echo $this->Url->build('/user_img/'.$user->pimg); ?>" width="150px" height="150px" />
                                            <?php } ?>
                                        </div>
                                      <div> <span class="btn btn-file btn-success"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
                                        <input type="file" id="image" name="image" />
                                        </span> <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a> </div>
                                    </div>
                                  </div>
                                </div> 
                              
                              
                              
                              
                              
                              
                              
                              
                              <div><h3><b>To pay via invoice:</b></h3></div><br>   
                              
                              <div class="form-group">
                                    <label class="control-label col-lg-4">Accounts Contact</label>
                                    <div class="col-lg-8">
                                        <input type="text" id="password" name="acc_contact" value="<?php echo $user->acc_contact ?>" class="form-control" value=""/>
                                    </div>
                                </div>
                              <div class="form-group">
                                    <label class="control-label col-lg-4">Accounts Email</label>
                                    <div class="col-lg-8">
                                        <input type="text" id="password" name="acc_email" value="<?php echo $user->acc_email ?>" class="form-control" value=""/>
                                    </div>
                                </div>
                              <div class="form-group">
                                    <label class="control-label col-lg-4">Accounts Telephone</label>
                                    <div class="col-lg-8">
                                        <input type="text" id="password" name="acc_phone" value="<?php echo $user->acc_phone ?>" class="form-control" value=""/>
                                    </div>
                                </div>
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              <?php //$sttag_id=explode(',',$user->preference); ?>    
                                       
<!--                            <div class="form-group">
                                    <label class="control-label col-lg-4">Preferences</label>
                                    <div class="col-lg-8"> 
                                        <?php foreach($tags as $dt)
                                            { ?>
                                                <div class="col-lg-1">
                                                    <input type="checkbox" name="preference[]" value="<?php echo $dt->id; ?>" <?php if(in_array( $dt->id,$sttag_id)){echo 'checked';}?>>
                                                </div>
                                                <div class="col-lg-7">
                                                    <?php echo $dt->tag_name; ?>
                                                </div>
                                                <div class="clearfix"></div>
                                            <?php
                                            }
                                        ?>
                                    </div>
                                </div>-->
                              
                              
                              
                              <?php //$stype_id=explode(',',$user->interest); ?>    
                                       
<!--                            <div class="form-group">
                                    <label class="control-label col-lg-4">Interests</label>
                                    <div class="col-lg-8"> 
                                        <?php foreach($servicetypes as $dt)
                                            { ?>
                                                <div class="col-lg-1">
                                                    <input type="checkbox" name="interest[]" value="<?php echo $dt->id; ?>" <?php if(in_array( $dt->id,$stype_id)){echo 'checked';}?>>
                                                </div>
                                                <div class="col-lg-7">
                                                    <?php echo $dt->interest_name; ?>
                                                </div>
                                                <div class="clearfix"></div>
                                            <?php
                                            }
                                        ?>
                                    </div>
                                </div>-->
                                
                                
                                                                
                                
                                <label class="control-label col-lg-4"></label>
                                <div class="col-lg-8" style="text-align:left;"> 
                                    <input type="submit" name="submit" value="Edit User" class="btn btn-primary" />
                                </div>
                                <?php echo $this->Form->end();?>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo $this->request->webroot;?>js/bootstrap-datepicker.js"></script>
<script>
$(document).ready(function(){
    $('.subdate').datepicker({
    format:"yyyy-mm-dd",
    startDate:"today"
    });
});
</script>
<style>
    .datepicker{
        background:white !important;
    }    
</style>   

<script>     
      var placeSearch, autocomplete;   

      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['geocode']});   

             google.maps.event.addListener(autocomplete, 'place_changed', function() {
		      var place = autocomplete.getPlace();
		      var lat = place.geometry.location.lat();
		      var lng = place.geometry.location.lng();
		      $('#lat').val(lat);
                      $('#long').val(lng);
		    
		    });     
      }

     
      function geolocate() { 
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) { 
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            
            autocomplete.setBounds(circle.getBounds());
          });
        }
      }
    </script>

 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCQ9hl89w8uiMND1-cnmkTVnqGh37TDvvk&libraries=places&callback=initAutocomplete"
        async defer></script>