
  <section class="py-2 bg-gray">
    <div class="container">
    	<div class="add-review-btn">
    		<button type="button" class="btn btn-success btn-lg btn-block menu-btn">
    			Service Types
    			<i class="fa fa-angle-down pull-right" aria-hidden="true"></i>
    		</button>
      <ul class="nav nav-tabs nav-profile" id="myTab" role="tablist">
          <?php $a=0; foreach($servicetypes as $dt){?>
        <li class="nav-item">
          <a class="nav-link <?php echo (($dt->id == $servicedetails->service_type_id)? 'active' : '');?>" data-toggle="tab" href="#tab1" role="tab" aria-controls="home" aria-selected="true">
              <div onclick="fetchservice('<?php echo $dt->id?>')"><span><img src="<?php echo $this->Url->build('/service_img/'.$dt->icon); ?>" alt=""></span> <?php echo $dt->type_name;?></div>
          </a>
        </li>
          <?php $a++;} ?>
<!--        <li class="nav-item">
          <a class="nav-link"  data-toggle="tab" href="#tab2" role="tab" aria-controls="profile" aria-selected="false">
            <span><img src="image/icon/icon2.png" alt=""></span> Eco Resort
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#tab3" role="tab" aria-controls="contact" aria-selected="false">
            <span><img src="image/icon/icon3.png" alt=""></span> Healthy Restaurant
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#tab4" role="tab" aria-controls="contact" aria-selected="false">
            <span><img src="image/icon/icon4.png" alt=""></span> Yoga studios
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#tab5" role="tab" aria-controls="contact" aria-selected="false">
            <span><img src="image/icon/icon5.png" alt=""></span> Healthy delivery
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#tab6" role="tab" aria-controls="contact" aria-selected="false">
            <span><img src="image/icon/icon6.png" alt=""></span> organic shops
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#tab7" role="tab" aria-controls="contact" aria-selected="false">
            <span><img src="image/icon/icon7.png" alt=""></span> Others
          </a>
        </li>-->
      </ul>
    	</div>
      
    </div>
  </section>

  <section class="pt-4 pb-3">
    <div class="container">
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="tab1" id="teb1">
          <section class="detailsPart">
            <form  method="post" id="review_form" action="<?php echo $this->Url->build('/users/addreview'); ?>" enctype="multipart/form-data">
              <div class="row">
                
                <div class="col-lg-6">
                    
                    <div class="bg-gray upload-img-warp" >
                    <div class="graybg-height d-flex justify-content-center align-items-center">
                      <div id="sortable">
                      </div>
                        <div class="text-center icon">
                        <div class="camera-icon" >
                          <i class="fa fa-camera font-72" aria-hidden="true"></i>
                        </div>
                      <h3 class="ddd">Upload or take a photo</h3>
                        </div>
                      
                      <input type="file" required="" id="multiFiles" name="files[]" multiple="multiple" class="upload"/>
                      <input type="hidden" name="image_name" id="product_image_id">
                    </div>
                  </div>
                  <!--<button type="button" class="btn btn-warning btn-block btn-lg rounded-0">SEND IMAGE</button>-->
                    
                </div>
            
                <div class="col-lg-6">
                  <div class="venuePart-warp">
                      
                    <div class="venuePart bg-gray">
                        
                      <div class="formpart">
                          
                        <?php if($id==""){ ?>  
                          <div class="form-group">
                              <i class="fa fa-angle-down" aria-hidden="true"></i>
                              <select id="service_id_demo" name="service_id_demo" class="form-control text-field">
                                  <option value="">Select service type first</option>
                              </select>
                              
                              
                            </div>
                                                   
                        <?php } ?>
                          
                          <input  type="hidden" id="service_provider_id" name="service_provider_id" value="<?php echo $spid?>"/>
                          <input  type="hidden" id="service_id" name="service_id" value="<?php echo $id?>"/>
                        
                          
                          
                            <div class="form-group">
                            <input type="text" id="autocomplete" required="" name="address" class="form-control text-field" placeholder="Add Venue" onFocus="geolocate()">
                              <i class="fa fa-map-marker"></i>
                            </div>
                              <input  type="hidden" id="lat" name="latitude" />
                              <input  type="hidden" id="long" name="longitude" />
                              
                              
                               
                              
                            <div class="form-group">
                              <input type="text" id="inputTag" class="form-control text-field" placeholder="Add Tag">
                              <i class="fa fa-hashtag"></i>

                            </div>
                            <ul class="tagPart pb-3 pl-0">
                                <?php foreach($servicetags as $dt){?>
                                <li><input type="checkbox" name="tag[]" onclick="taketag()" value="<?php echo $dt->tag_name;?>"><a href="#"><?php echo $dt->tag_name;?></a></li>
                                <?php } ?>
<!--                              <li><a href="#">Pizza</a></li>
                              <li><a href="#">241</a></li>-->
                              <div class="clearfix"></div>
                            </ul>
                            <div class="form-group">
                              <input type="text" name="address_details" class="form-control text-field" placeholder="Street no, City, Zip code, Country">
                              <i class="fa fa-map-o" aria-hidden="true"></i>
                            </div>
                            <div class="form-group mb-0">
                                <textarea class="form-control text-field" required="" name="review" placeholder="How did you find it ?"></textarea>
                              <p class="number">120</p>
                            </div>
                      </div>
                      <div class="bg-white">
                          <div class="row">
                              <div class="col-lg-12">
                                <div class="rangePart py-2 mt-3">
                                  <div class="row">
                                      <?php foreach($rating as $dt){?>
                                    <div class="col-lg-6">
                                      <div class="diff-clr-slider" id="review_color<?php echo $dt['id']?>" style=" background: #6fc394; ">
                                        <div class="ranger-area">
                                          <div class="p-0">
                                            <h4 class="text-uppercase text-white font-16 text-center font-weight-bold mb-0" ><?php echo $dt['type_name']?></h4>
                                          </div>
                                          <p class="text-uppercase font-14 color-black mb-0 txt" id="ratingMsg<?php echo $dt['id']?>">BAD</p>
                                          <div class="p-3">
                                            <input id="ex5" type="text" name="<?php echo $dt['type_name']?>" data-slider-min="0" data-slider-max="5" class="span<?php echo $dt['id']?>" data-slider-step="1" data-slider-value="0"/>
                                        </div>
                                        </div>
                                      </div>
                                    </div>
                                      <?php } ?>
<!--                                    <div class="col-lg-6">
                                      <div style="background: #85d779;"  class="diff-clr-slider">
                                        <div>
                                          <div class="p-3">
                                            <h4 class="text-uppercase text-white font-16 text-center font-weight-bold">Extremly good</h4>
                                          </div>
                                          <p class="text-uppercase font-14 color-black mb-0 txt">Service</p>
                                          <div class="p-3">
                                            <input id="ex6" type="text" data-slider-min="-5" data-slider-max="20" data-slider-step="1" data-slider-value="0"/>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <div style="background: #85d779;"  class="diff-clr-slider">
                                        <div>
                                          <div class="p-3">
                                            <h4 class="text-uppercase text-white font-16 text-center font-weight-bold">pretty poor</h4>
                                          </div>
                                          <p class="text-uppercase font-14 color-black mb-0 txt">Selection</p>
                                          <div class="p-3">
                                            <input id="ex7" type="text" data-slider-min="-5" data-slider-max="20" data-slider-step="1" data-slider-value="0"/>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <div style="background: #a8d376;"  class="diff-clr-slider">
                                        <div>
                                          <div class="p-3">
                                            <h4 class="text-uppercase text-white font-16 text-center font-weight-bold">Good value</h4>
                                          </div>
                                          <p class="text-uppercase font-14 color-black mb-0 txt">Value For Money</p>
                                          <div class="p-3">
                                            <input id="ex8" type="text" data-slider-min="-5" data-slider-max="20" data-slider-step="1" data-slider-value="0"/>
                                          </div>
                                        </div>
                                      </div>
                                    </div>-->
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                         
                    <div>
                      <button type="button" onclick="addnewreview()" name="button" class="btn btn-success btn-block btn-lg rounded-0">SEND REVIEW</button>
                    </div>
                          
                  </div>
                     
                </div>
                    
            </div>
                </form>
         </section>
        </div>
        <div class="tab-pane fade" role="tabpanel" aria-labelledby="tab2" id="tab2">...</div>
        <div class="tab-pane fade" role="tabpanel" aria-labelledby="tab3" id="tab3">...</div>
        <div class="tab-pane fade" role="tabpanel" aria-labelledby="tab4" id="tab4">...</div>
        <div class="tab-pane fade" role="tabpanel" aria-labelledby="tab5" id="tab5">...</div>
        <div class="tab-pane fade" role="tabpanel" aria-labelledby="tab6" id="tab6">...</div>
        <div class="tab-pane fade" role="tabpanel" aria-labelledby="tab7" id="tab7">...</div>
      </div>
    </div>
  </section>

<script>
$(document).ready(function(){

    <?php foreach($rating as $dt){?>     
var originalVal;
$('.span<?php echo $dt['id'];?>').slider().on('slideStart', function(ev){
    originalVal = $('.span<?php echo $dt['id'];?>').data('slider').getValue();
});

$('.span<?php echo $dt['id'];?>').slider().on('slideStop', function(ev){
    var newVal = $('.span<?php echo $dt['id'];?>').data('slider').getValue();
    if(originalVal != newVal) {
        <?php foreach($dt['details'] as $a){?>
                
        if(newVal==<?php echo $a['rating_value'];?>){
            $('#ratingMsg<?php echo $dt['id']?>').html('<?php echo $a['rating_text']?>');
             <?php if($a['rating_value']==0){ ?>
            $('#review_color<?php echo $dt['id']?>').css({ 'background': '#6fc394'});
            <?php } ?>
            <?php if($a['rating_value']==1){ ?>
            $('#review_color<?php echo $dt['id']?>').css({ 'background': '#EF3108'});
            <?php } ?>
        <?php if($a['rating_value']==2){ ?>
            $('#review_color<?php echo $dt['id']?>').css({ 'background': '#DCEF08'});
        <?php } ?>
        <?php if($a['rating_value']==3){ ?>
            $('#review_color<?php echo $dt['id']?>').css({ 'background': '#D308EF'});
        <?php } ?>
        <?php if($a['rating_value']==4){ ?>
            $('#review_color<?php echo $dt['id']?>').css({ 'background': '#55EF08'});
        <?php } ?>
        <?php if($a['rating_value']==5){ ?>
            $('#review_color<?php echo $dt['id']?>').css({ 'background': '#55EF08'});
        <?php } ?>
        }
       <?php } ?>
     }
});
<?php } ?>

/*<?php foreach($servicetags as $dt){?>
               
         $('#tag<?php echo $dt->id;?> a').on('click',function(){
             
           alert('ok');
    });
          <?php } ?>
*/

});






</script>

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
        <script>
        
       function addnewreview(){
           
           $('#review_form').submit();
       }
            
      
    function taketag(){
    
    //alert('ok');
    var tagid = new Array();
    $.each($("input[name='tag[]']:checked"), function() {       
        tagid.push($(this).val());
    });
    //alert(tagid);
    $('#inputTag').val(tagid);
}    
        
        </script> 

<script>
    $( document ).ready( function () {
        
       $('#multiFiles').on('change',function(){
           var base_url = '<?php echo $this->request->webroot; ?>'; 
               var image_url =   '<?php echo $this->Url->build('/review_img/'); ?>' ;
              
                    var form_data = new FormData();
                    var ins = document.getElementById('multiFiles').files.length;
                   // alert(ins);
                 //alert(JSON.stringify(document.getElementById('multiFiles')));
                    for (var x = 0; x < ins; x++) {
                        form_data.append("files[]", document.getElementById('multiFiles').files[x]);
                        //alert('ok');
                       // alert(JSON.stringify(document.getElementById('multiFiles').files[x]));
                    }
                    console.log(form_data);
                    $.ajax({
                        url: base_url+'users/uploadreviewadd', // point to server-side PHP script 
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
                                /*$('<li id="'+obj.data[i].last_id+'"></li>').appendTo('#sortable').html('<div class="media" id="image_'+obj.data[i].last_id+'"><div class="media-left"><a href="#"><img style="width: 100%; height: 100p%" src="'+file_path+'" alt="" /></a></div><div class="media-body media-middle"></div><div class="media-body media-middle"></div></div></div></li>');*/
                               $('#sortable').append('<div class="media" id="image_'+obj.data[i].last_id+'"><div class="media-left"><a href="#"><img style="width: 100%; height: 100%" src="'+file_path+'" alt="" /></a></div><div class="media-body media-middle"></div><div class="media-body media-middle"></div></div></div></li>'); 
                              }
                             $('.icon').hide(); 
                             }
                        },
                        error: function (response) {
                            $('#msg').html(response); // display error response from the PHP script
                        }
                    });
                });
      
    } ); 
    
     </script>

<script>
	$(document).ready(function(){
		$(".menu-btn").click(function(){
			$(".nav-profile").slideToggle();
		});
                
                $("#service_id_demo").change(function(){
                    id_arr = $(this).val().split("_");                    
                    $("#service_id").val(id_arr[0]);
                    $("#service_provider_id").val(id_arr[1]);
                })
		});
</script>

<script>
   
    function fetchservice(id) {
        //alert(id);exit;
            var stid= id;   
            $.ajax({
                url: '<?php echo $this->request->webroot; ?>users/fetchservice', 
                cache: false,
                data: { stid: stid },
                type: 'post',
                success: function (response) {
                    console.log(response);
                    var obj = jQuery.parseJSON(response);

                    if (obj.Ack == 1) {
                        html ="<option value=''>Select service</option>";
                        for (var i = 0; i < obj.data.length; i++) {
                           
                           html= html+"<option value="+obj.data[i].id+"_"+obj.data[i].provider_id+">"+obj.data[i].service_name+"</option>";
                           //var a = obj.data[i].provider_id;
                           
                        }
                        
                      $('#service_id_demo').html(html); 
                      //$('#service_provider_id').val(a);
                    }
                },
                error: function (response) {
                    $('#msg').html(response); // display error response from the PHP script
                }
            });
        }

 
 




</script>    
  