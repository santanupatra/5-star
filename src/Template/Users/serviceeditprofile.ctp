<section class="user-dashboard">
    <div class="container">
      <div class="row">
       <?php echo $this->element('side_menu');?>
        <div class="col-lg-9 col-md-8">
          <div class="edit-pro p-3 p-lg-4">
            <h5 class="common-title mb-3 pb-2">Edit Profile</h5>
            <div class="row">
              <div class="col-lg-10">
                <form method="post" action="<?php echo $this->Url->build(["controller" => "Users","action" => "serviceeditprofile"]);?>">
                  <div class="form-group row">
                    <label for="staticEmail" class="col-sm-4 col-form-label">Full Name:</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="full_name" value="<?php echo $user->full_name;?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="staticEmail" class="col-sm-4 col-form-label">Business Name:</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="business_name" value="<?php echo $user->business_name;?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="staticEmail" class="col-sm-4 col-form-label">Email Address:</label>
                    <div class="col-sm-8">
                      <input type="email" class="form-control" name="email" value="<?php echo $user->email;?>">                  
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="staticEmail" class="col-sm-4 col-form-label">Phone:</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="phone" value="<?php echo $user->phone;?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="staticEmail" class="col-sm-4 col-form-label">Address:</label>
                    <div class="col-sm-8">
                      <input class="form-control" id="autocomplete" name="address" type="text" onFocus=geolocate() value="<?php echo $user->address ?>"/>
                    </div>
                  </div>

                  <input  type="hidden" id="lat" name="latitude" value="<?php echo $user->latitude ?>"/>
                  <input  type="hidden" id="long" name="longitude" value="<?php echo $user->longitude ?>"/>
                  
                  <div class="form-group row">
                    <label for="staticEmail" class="col-sm-4 col-form-label">Town/City:</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="" value="<?php echo $user->city;?>" name="city">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="staticEmail" class="col-sm-4 col-form-label">Country:</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="country" name="country" value="<?php echo $user->country;?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="staticEmail" class="col-sm-4 col-form-label">Post Code:</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="postcode" name="postcode" value="<?php echo $user->postcode;?>">
                    </div>
                  </div>

                  <h5 class="mt-4 mb-4">To pay via invoice, please provide the following details:</h5>
                  <div class="form-group row">
                    <label for="staticEmail" class="col-sm-4 col-form-label">Accounts Contact:</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="" value="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="staticEmail" class="col-sm-4 col-form-label">Accounts Email:</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="" value="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="staticEmail" class="col-sm-4 col-form-label">Accounts Telephone:</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="" value="">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-8 ml-auto">
                      <button class="btn btn-primary" type="submit">Save Changes</button>
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