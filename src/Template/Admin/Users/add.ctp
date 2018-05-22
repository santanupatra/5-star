<?php ?>
<div id="content">
    <div class="inner">
        <div class="row">
            <div class="col-lg-12">
                <h1 > Add User </h1>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <header>
                        <div class="icons"><i class="icon-th-large"></i></div>
                        <h5>Add User</h5>
                        <div class="toolbar">
                            <ul class="nav">
                                <li style="margin-right:15px">
                                    <div class="btn-group"> 

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
				<?php echo $this->Form->create($user,['class' => 'form-horizontal', 'id' => 'user-validate', 'enctype' => 'multipart/form-data']);?>
                                <input type="hidden" name="utype" id="utype" value="1" />
                                <input type="hidden" name="is_active" id="is_active" value="1" />
                                <input type="hidden" name="is_mail_verified" id="is_mail_verified" value="1" />
                                
                                <div class="form-block">

                               <div><h3><b>Basic Information</b></h3></div><br>                                  

                                <div class="form-group">
                                    <label class="control-label col-lg-4">Full Name</label>
                                    <div class="col-lg-8">
                                        <?php echo $this->Form->input('full_name', array('class'=>'form-control','label' => false)); ?>
                                    </div>
                                </div>
                                
                                
 
                                                              
                                
                                <div class="form-group">
                                    <label class="control-label col-lg-4">Contact Number</label>
                                    <div class="col-lg-8">
                                        <?php echo $this->Form->input('phone', array('class'=>'form-control','label' => false)); ?>
                                    </div>
                                </div>
                                    
                                    <div class="form-group">
                                    <label class="control-label col-lg-4">Email</label>
                                    <div class="col-lg-8">
                                        <?php echo $this->Form->input('email', array('class'=>'form-control','label' => false)); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-4">Password</label>
                                    <div class="col-lg-8">
                                        <input type="password" id="password" name="password" class="form-control" value=""/>
                                    </div>
                                </div>
                                
                                
                               <div class="form-group">
                                    <label class="control-label col-lg-4">Address</label>
                                    <div class="col-lg-8">
                                        <input class="form-control" id="autocomplete" name="address" type="text" onFocus=geolocate() />
                                    </div>
                                </div>     
                                    
                              <input  type="hidden" id="lat" name="latitude" />
                              <input  type="hidden" id="long" name="longitude" />
                               
                               
                              <div class="form-group">
                                    <label class="control-label col-lg-4">Town/City</label>
                                    <div class="col-lg-8">
                                        <input type="text" id="password" name="city" class="form-control" value=""/>
                                    </div>
                                </div>
                              
                              <div class="form-group">
                                    <label class="control-label col-lg-4">Country</label>
                                    <div class="col-lg-8">
                                        <input type="text" id="password" name="country" class="form-control" value=""/>
                                    </div>
                                </div>
                              
                              <div class="form-group">
                                    <label class="control-label col-lg-4">Postcode</label>
                                    <div class="col-lg-8">
                                        <input type="text" id="password" name="postcode" class="form-control" value=""/>
                                    </div>
                                </div>
                              
                              <div class="form-group"> 
                                  <label class="control-label col-lg-4">User Image </label>
                                  <div class="col-lg-8">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="fileupload-preview thumbnail" style="width: 150px; height: 150px;">
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
                                        <input type="text" id="password" name="acc_contact" class="form-control" value=""/>
                                    </div>
                                </div>
                              <div class="form-group">
                                    <label class="control-label col-lg-4">Accounts Email</label>
                                    <div class="col-lg-8">
                                        <input type="text" id="password" name="acc_email" class="form-control" value=""/>
                                    </div>
                                </div>
                              <div class="form-group">
                                    <label class="control-label col-lg-4">Accounts Telephone</label>
                                    <div class="col-lg-8">
                                        <input type="text" id="password" name="acc_phone" class="form-control" value=""/>
                                    </div>
                                </div>
                              
                              
                              
                              
                              
                              
<!--                              <div class="form-group">
                                    <label class="control-label col-lg-4">Preferences</label>
                                    <div class="col-lg-8"> 
                                        <?php foreach($tags as $dt)
                                            { ?>
                                                <div class="col-lg-1">
                                                    <input type="checkbox" name="preference[]" value="<?php echo $dt->id; ?>">
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
                              
<!--                              <div class="form-group">
                                    <label class="control-label col-lg-4">Interests</label>
                                    <div class="col-lg-8"> 
                                        <?php foreach($servicetypes as $dt)
                                            { ?>
                                                <div class="col-lg-1">
                                                    <input type="checkbox" name="interest[]" value="<?php echo $dt->id; ?>">
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
                                    <input type="submit" name="submit" value="Add User" class="btn btn-primary" />
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
</div>

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