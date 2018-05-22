<?php echo $this->element('profile_head');?>
<section class="pt-5 pb-5">
  <div class="container">
    <div class="row">
     
       <?php echo $this->element('side_menu');?>
      
      <div class="col-lg-9">
        <div class="bg-gray p-3">
            <form method="post" action="<?php echo $this->Url->build(["controller" => "Users","action" => "editprofile"]);?>">
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="full_name" value="<?php echo $user->full_name;?>">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                  <input type="email" class="form-control" name="email" value="<?php echo $user->email;?>">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Phone</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" name="phone" value="<?php echo $user->phone;?>">
              </div>
            </div>
              
              <div class="form-group row">
              <label class="col-sm-2 col-form-label">Address</label>
              <div class="col-sm-10">
                <input class="form-control" id="autocomplete" name="address" type="text" onFocus=geolocate() value="<?php echo $user->address ?>"/>
              </div>
            </div>
<input  type="hidden" id="lat" name="latitude" value="<?php echo $user->latitude ?>"/>
<input  type="hidden" id="long" name="longitude" value="<?php echo $user->longitude ?>"/>
              
              
              
              <?php //$sttag_id=explode(',',$user->preference); ?>    
                                       
<!--                            <div class="form-group row">
                                    <label class="col-form-label col-sm-2">Preferences</label>
                                    <div class="col-sm-10"> 
                                        <?php foreach($tags as $dt)
                                            { ?>
                                                <div class="form-check">
												  <label class="form-check-label">
												     <input type="checkbox" name="preference[]" value="<?php echo $dt->id; ?>" <?php if(in_array( $dt->id,$sttag_id)){echo 'checked';}?>>
												    <?php echo $dt->tag_name; ?>
												  </label>
												</div>
                                            <?php
                                            }
                                        ?>
                                    </div>
                                </div>-->
                              
                              
                              
                              <?php //$stype_id=explode(',',$user->interest); ?>    
                                       
<!--                            <div class="form-group row">
                                    <label class="col-form-label col-sm-2">Interests</label>
                                    <div class="col-sm-10"> 
                                        <?php foreach($servicetypes as $dt)
                                            { ?>
                             
                                                <div class="form-check">
												  <label class="form-check-label">
												     <input type="checkbox" name="interest[]" value="<?php echo $dt->id; ?>" <?php if(in_array( $dt->id,$stype_id)){echo 'checked';}?>>
												    <?php echo $dt->interest_name; ?>
												  </label>
												</div>
                                            <?php
                                            }
                                        ?>
                                    </div>
                                </div>-->
              
              
            
            
            <div class="form-group row">
              <div class="col-sm-12 text-center">
                <button type="submit" name="button" class="btn btn-success"><i class="fa fa-cloud-upload pr-2" aria-hidden="true"></i>UPDATE</button>
<!--                <button type="button" name="button" class="btn btn-danger"><i class="fa fa-refresh pr-2" aria-hidden="true"></i> RESET</button>-->
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
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