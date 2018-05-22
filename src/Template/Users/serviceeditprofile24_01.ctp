<?php echo $this->element('profile_head');?>
<section class="pt-5 pb-5">
  <div class="container">
    <div class="row">
     
       <?php echo $this->element('side_menu');?>
      
      <div class="col-lg-9">
        <div class="bg-gray p-3">
            <form method="post" action="<?php echo $this->Url->build(["controller" => "Users","action" => "serviceeditprofile"]);?>">
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
              
              
              
             <div class="form-group row">
                                    <label class="control-label col-lg-2">Website Link</label>
                                    <div class="col-lg-10">
                                        <input type="text"  name="website" value="<?php echo $user->website ?>" class="form-control"/>
                                    </div>
                              </div>
                              
                <?php $working=explode(',',$user->working_days); ?>
                              <div class="form-group row">
                                    <label class="control-label col-lg-2">Working Days</label>
                                    <div class="col-lg-10"> 
                                        <div class="form-check">
								          <label class="form-check-label">
								            <input type="checkbox" name="working_days[]" value="Monday" <?php if(in_array( 'Monday',$working)){echo 'checked';}?>> Monday
								          </label>
								        </div>
                                        <div class="form-check">
								          <label class="form-check-label">
								            <input type="checkbox" name="working_days[]" value="Tuesday" <?php if(in_array( 'Tuesday',$working)){echo 'checked';}?>> Tuesday
								          </label>
								        </div>
                                        <div class="form-check">
								          <label class="form-check-label">
								            <input type="checkbox" name="working_days[]" value="Wednesday" <?php if(in_array( 'Wednesday',$working)){echo 'checked';}?>> Wednesday
								          </label>
								        </div>
                                        <div class="form-check">
								          <label class="form-check-label">
								            <input type="checkbox" name="working_days[]" value="Thursday" <?php if(in_array( 'Thursday',$working)){echo 'checked';}?>> Thursday
								          </label>
								        </div>        
                                        <div class="form-check">
								          <label class="form-check-label">
								            <input type="checkbox" name="working_days[]" value="Friday" <?php if(in_array( 'Friday',$working)){echo 'checked';}?>> Friday
								          </label>
								        </div>     
                                        <div class="form-check">
								          <label class="form-check-label">
								            <input type="checkbox" name="working_days[]" value="Saturday" <?php if(in_array( 'Saturday',$working)){echo 'checked';}?>> Saturday
								          </label>
								        </div>        
                                        <div class="form-check">
								          <label class="form-check-label">
								            <input type="checkbox" name="working_days[]" value="Sunday" <?php if(in_array( 'Sunday',$working)){echo 'checked';}?>> Sunday
								          </label>
								        </div>     
                                    </div>
                                </div>              
                          <div class="form-group row">
                                    <label class="control-label col-lg-2">Working Hours</label>
                                    <div class="col-lg-10">
                                        
                                        <div class="row">
                                            <div class="col-sm-6">
                                               <input type="text"  name="working_hours_from" value="<?php echo $user->working_hours_from ?>" class="form-control"/> 
                                            </div>
                                           
                                           <div class="col-sm-6">
                                               <input type="text"  name="working_hours_to" value="<?php echo $user->working_hours_to ?>" class="form-control"/> 
                                            </div> 
                                        </div>
                                       
                                    </div>
                                </div>
                              
                              
                              <div class="form-group row">
                                    <label class="control-label col-lg-2">Description</label>
                                    <div class="col-lg-10">
                                        <textarea  name="description" class="form-control"><?php echo $user->description?></textarea>
                                    </div>
                              </div>
                              
                              <div class="form-group row">
                                    <label class="control-label col-lg-2">Pricing</label>
                                    <div class="col-lg-10">
                                        <textarea  name="pricing" class="form-control"><?php echo $user->pricing?></textarea>
                                    </div>
                              </div>
                              
                          <?php $stype_id=explode(',',$user->service_type_id); ?>    
                                       
                            <div class="form-group row">
                                    <label class="control-label col-lg-2">Service Type</label>
                                    <div class="col-lg-10"> 
                                        <?php foreach($servicetypes as $dt)
                                            { ?>
                                                
                                                <div class="form-check">
												  <label class="form-check-label">
												    <input type="checkbox" name="service_type_id[]" value="<?php echo $dt->id; ?>" <?php if(in_array( $dt->id,$stype_id)){echo 'checked';}?>>
												    <?php echo $dt->type_name; ?>
												  </label>
												</div>
                                            <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                              
                              
                              
                              <?php $stag_id=explode(',',$user->service_tag_id); ?>    
                                       
                            <div class="form-group row">
                                    <label class="control-label col-lg-2">Tags</label>
                                    <div class="col-lg-10"> 
                                        <?php foreach($tags as $dt)
                                            { ?>
                                                <div class="form-check">
												  <label class="form-check-label">
												    <input type="checkbox" name="service_tag_id[]" value="<?php echo $dt->id; ?>" <?php if(in_array( $dt->id,$stag_id)){echo 'checked';}?>>
												     <?php echo $dt->tag_name; ?>
												  </label>
												</div>
                                            <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                              
                              <?php $sf_id=explode(',',$user->service_feature_id); ?>    
                                       
                            <div class="form-group row">
                                    <label class="control-label col-lg-2">Features</label>
                                    <div class="col-lg-10"> 
                                        <?php foreach($features as $dt)
                                            { ?>
                                                <div class="form-check">
												  <label class="form-check-label">
												    <input type="checkbox" name="service_feature_id[]" value="<?php echo $dt->id; ?>" <?php if(in_array( $dt->id,$sf_id)){echo 'checked';}?>>
												     <?php echo $dt->feature_name; ?>
												  </label>
												</div>
                                            <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                              
                              
                              
                               <div class="form-group">
                                  
                                   <label class="control-label col-lg-4">Upload Photos</label>  
                  <div class="company-images col-lg-8">
                   
                        <input type="hidden" name="image" id="product_image_id">
                        <div class="fileUpload btn btn-primary btnPart mb-3">
                         
                          <input type="file" id="multiFiles" name="files[]" multiple="multiple" class="upload"/>
                        </div>

                    <span id="status" ></span> 
                   </div>
                    <div class="manage-photo" id="product_images" style="overflow:scroll; height:450px;width:500px;">
                                <ul id="sortable" class="uisortable">
                                  <?php
                               
                                    foreach ($all_image as $image) {                      

                                  ?>
                                  <li id="<?php echo $image->id;?>">
                                  <div class="media" id="image_<?php echo $image->id;?>">
                                    <div class="media-left">
                                      <a href="#">
                                        <img style="width: 100px; height: 100px" src="<?php echo $this->Url->build('/user_img/'.$image->image_name)?>" alt="" />
                                      </a>
                                    </div>
                                    <div class="media-body media-middle">
                                      <h4><?php echo $image->image_name;?></h4>
                                    </div>
                                    <div class="media-body media-middle">
                                        <a class="btn btn-blank" onclick="javascript: delete_image('<?php echo $image->id;?>')"><button class="btn btn-danger" type="button">Delete</button></a>                         
                                    </div>
                                  </div>
                                  </li>
                                  <?php
                                }
                                ?>
                                  </ul>

                                    </div>
                                </div>
                              
                              
                              
                              <div class="form-group">
                                  
                                   <label class="control-label col-lg-4">Upload Documents</label>  
                  <div class="company-images col-lg-8">
                   
                        <input type="hidden" name="document" id="product_image_id1">
                        <div class="fileUpload btn btn-primary btnPart">
                         
                          <input type="file" id="multiFiles1" name="files1[]" multiple="multiple" class="upload"/>
                        </div>

                    <span id="status" ></span> 
                   </div>
                    <div class="manage-photo" id="product_images1" style="overflow:scroll; height:450px;width:500px;">
                                <ul id="sortable1" class="uisortable">
                                  <?php
                               
                                    foreach ($all_document as $image) {                      

                                  ?>
                                  <li id="<?php echo $image->id;?>">
                                  <div class="media" id="image_<?php echo $image->id;?>">
                                    <div class="media-left">
                                      
                                    </div>
                                    <div class="media-body media-middle">
                                      <h4><?php echo $image->doc_name;?></h4>
                                    </div>
                                    <div class="media-body media-middle">
                                        <a class="btn btn-blank" onclick="javascript: delete_doc('<?php echo $image->id;?>')"><button class="btn btn-danger" type="button">Delete</button></a>                         
                                    </div>
                                  </div>
                                  </li>
                                  <?php
                                }
                                ?>
                                  </ul>

                                    </div>
                                </div>

                              <!-- <?php $stype_id=explode(',',$user->interest); ?>   -->  
                                       
                            <!-- <div class="form-group row">
                                    <label class="col-form-label col-sm-2">Interests</label>
                                    <div class="col-sm-10"> 
                                        <?php foreach($servicetypes as $dt)
                                            { ?>
                                                <div class="col-sm-2">
                                                    <input type="checkbox" name="interest[]" value="<?php echo $dt->id; ?>" <?php if(in_array( $dt->id,$stype_id)){echo 'checked';}?>>
                                                </div>
                                                <div class="col-sm-8">
                                                    <?php echo $dt->interest_name; ?>
                                                </div>
                                                <div class="clearfix"></div>
                                            <?php
                                            }
                                        ?>
                                    </div>
                                </div> -->
              
              
            
            
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


        <script type="text/javascript">
    $( document ).ready( function () { 
        var base_url = '<?php echo $this->request->webroot; ?>';
       $('#multiFiles').on('change',function(){
          
               var image_url = '<?php echo $this->Url->build('/user_img/'); ?>';
              
                    var form_data = new FormData();
                    var ins = document.getElementById('multiFiles').files.length;
                 
                    for (var x = 0; x < ins; x++) {
                        form_data.append("files[]", document.getElementById('multiFiles').files[x]);
                        //alert('ok');
                       // alert(JSON.stringify(document.getElementById('multiFiles').files[x]));
                    }
                    console.log(form_data);
                    $.ajax({
                        url: base_url+'users/uploadphotoaddi', // point to server-side PHP script 
                        dataType: 'text', // what to expect back from the PHP script
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post',
                        success: function (response) {
                          console.log(response);
                             var obj = jQuery.parseJSON( response );
                            
                             if(obj.Ack == 1){
                                 
                            //alert('ok');
                              $('#product_image_id').val(obj.image_name);
                              for(var i = 0; i < obj.data.length; i++){
                                  file_path = image_url+obj.data[i].filename;
                                $('<li id="'+obj.data[i].last_id+'"></li>').appendTo('#sortable').html('<div class="media" id="image_'+obj.data[i].last_id+'"><div class="media-left"><a href="#"><img style="width: 100px; height: 100px" src="'+file_path+'" alt="" /></a></div><div class="media-body media-middle"><h4>'+obj.data[i].filename+'</h4></div><div class="media-body media-middle"></div></div></div></li>');
                              }
                             }
                        },
                        error: function (response) {
                            $('#msg').html(response); // display error response from the PHP script
                        }
                    });
                });
      
      });
    
  </script>
  <script>
     $( document ).ready( function () {
         
          var base_url = '<?php echo $this->request->webroot; ?>';

       $('#multiFiles1').on('change',function(){
          
               var image_url = '<?php echo $this->Url->build('/user_doc/'); ?>';
              
                    var form_data = new FormData();
                    var ins = document.getElementById('multiFiles1').files.length;
                 
                    for (var x = 0; x < ins; x++) {
                        form_data.append("files1[]", document.getElementById('multiFiles1').files[x]);
                        //alert('ok');
                       // alert(JSON.stringify(document.getElementById('multiFiles').files[x]));
                    }
                    console.log(form_data);
                    $.ajax({
                        url: base_url+'users/uploaddocadd', // point to server-side PHP script 
                        dataType: 'text', // what to expect back from the PHP script
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post',
                        success: function (response) {
                          console.log(response);
                             var obj = jQuery.parseJSON( response );
                            
                             if(obj.Ack == 1){
                                 
                            //alert('ok');
                              $('#product_image_id1').val(obj.image_name);
                              for(var i = 0; i < obj.data.length; i++){
                                  file_path = image_url+obj.data[i].filename;
                                $('<li id="'+obj.data[i].last_id+'"></li>').appendTo('#sortable1').html('<div class="media" id="image_'+obj.data[i].last_id+'"><div class="media-left"><a href="#"></a></div><div class="media-body media-middle"><h4>'+obj.data[i].filename+'</h4></div><div class="media-body media-middle"></div></div></div></li>');
                              }
                             }
                        },
                        error: function (response) {
                            $('#msg').html(response); // display error response from the PHP script
                        }
                    });
                });
      
      
    } );
    
    
    
    
    function delete_image(id){
    
    var base_url = '<?php echo $this->request->webroot; ?>';
          $.ajax({
            method: "GET",
            url: base_url+'users/deleteimage',
            data: { id: id}
          })
          .done(function( data ) {
           var obj = jQuery.parseJSON( data );
   
            if(obj.Ack  == 1){ 
                //alert();
              $('#image_'+id).html("");
            }
          });
    }
    
    function delete_doc(id){
     var base_url = '<?php echo $this->request->webroot; ?>';        
      $.ajax({
            method: "GET",
            url: base_url+'users/delete_document',
            data: { id: id}
          })
          .done(function( data ) {
           var obj = jQuery.parseJSON( data );
            if(obj.Ack  == 1){                   
              $('#image_'+id).html("");
            }
          });
    }
    
    
     </script> 
