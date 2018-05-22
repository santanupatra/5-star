<style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
</style>  
<?php echo $this->element('profile_head');?>

    <section class=" pt-3 pb-5">
      <div class="container">
          <div id="AjaxMsgFrom"></div>
        <div class="row">
          <div class="col-md-6">
            <div id="map">
              <!--<img src="http://lcp.gov.ph/images/lcp_location_map.JPG" alt="" style=" width: 100%; height: 100%; ">-->
            </div>
          </div>
          <div class="col-md-6">
            <div>
            <div>
              <h4 class="hdr-sgn">Recently visited : </h4>
              <div class="row">
              <?php
             // pr($resutls);
              if(!empty($resutls)){
                foreach ($resutls as $result) {    
               // pr($result);            
              ?>
                <div class="col-md-6">
                  <div class="card">
              <div class="hdr">
                <div class="img" style="background-image: url(<?php echo $this->Url->build('/user_img/'.$result['details']['service']['user']['pimg']); ?>)"></div>
                <div class="txt">
                  <h4><?php echo $result['details']['service']['user']['full_name'];?></h4>
                  <p><?php echo $result['details']['service']['service_name'];?></p>
                </div>
                
                <?php if($result['details']['service']['id']==$result['favourite']['service_id']){?>
                
                <a href="javascript:void(0)" onclick="chk_add_to_faviouritelist_valid('<?php echo $result['details']['service']['id'];?>')"><div class="love text-gray" id="love_<?php echo $result['details']['service']['id'];?>">
                        <i class="fa fa-heart" aria-hidden="true"></i>
                </div></a>
                
                <?php }else{ ?>
                <a href="javascript:void(0)" onclick="chk_add_to_faviouritelist_valid('<?php echo $result['details']['service']['id'];?>')"><div class="love" id="love_<?php echo $result['details']['service']['id'];?>">
                        <i class="fa fa-heart" aria-hidden="true"></i>
                </div></a>
                <?php } ?>
              </div>
              
               <a href="<?php echo $this->Url->build(["controller" => "Users","action" => "servicedetails",$result['details']['service']['id']]);?>"><div class="img-prt" style="background-image: url('<?php echo $this->Url->build('/service_img/'.$result['details']['service']['image']); ?>')"></div></a>
              <div class="btn-grp">              
                 <?php foreach($result['details']['service']['service_provider_tags'] as $t){?>
                    <button type="button" name="button" class="btn btn-secondary btn-sm"><?php echo $t['tag']['tag_name']?></button>
                      <?php }  ?>
              </div>
              <div class="moreTxt">
                <div><?php echo $result['details']['service']['description'];?></div>
                <a href="<?php echo $this->Url->build(["controller" => "Users","action" => "servicedetails",$result['details']['service']['id']]);?>">Read More >></a>
              </div>
              <div class="ftr-rtng">
                <span>Rating</span>
                <div class="rate"><span class="stars1"><?php $avgrating=(($result['rating'][0]['avgr'])/6);if($avgrating!=''){echo $avgrating;}else{ echo 0;}?></span></div>
                <span class="icn-hdr">
                  <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                </span>
                <span class="icn-hdr">
                  <i class="fa fa-share-alt" aria-hidden="true"></i>
                </span>
              </div>
            </div>
                </div>
                <?php
                  } }else{
                ?>
                  <div class="col-md-6">No product viewed.</div>

                  <?php } ?>
                <div class="col-md-12 text-right"><a href="<?php echo $this->Url->build(["controller" => "Users","action" => "recendviewlist"]);?>">View All</a></div>
              </div>
            </div>
            </div>
          </div>
          </div>
        </div>
      </div>
    </section>
    <section>
      <div class="container">
        <h4 class="hdr-sgn"> You May Also Like : </h4>
        <div class="row">
            
            
           <?php 
           //pr($suggestedServiceDetails);
           if(!empty($suggestedServiceDetails)){
           foreach($suggestedServiceDetails as $ss){
               //pr($ss);
               ?> 
          <div class="col-md-3">
            <div class="card">
              <div class="hdr">
                <div class="img" style="background-image: url('<?php echo $this->Url->build('/user_img/'.$ss['details'][0]['user']['pimg']); ?>')"></div>
                <div class="txt">
                  <h4><?php echo $ss['details'][0]['user']['full_name']?></h4>
                  <p><?php echo $ss['details'][0]['service_name']?></p>
                </div>
                <?php if($ss['details'][0]['id']==$ss['favourite']['service_id']){?>
                
                <a href="javascript:void(0)" onclick="chk_add_to_faviouritelist_valid('<?php echo $ss['details'][0]['id'];?>')"><div class="love text-gray" id="love_<?php echo $ss['details'][0]['id'];?>">
                        <i class="fa fa-heart" aria-hidden="true"></i>
                </div></a>
                <?php }else{ ?>
                
                <a href="javascript:void(0)" onclick="chk_add_to_faviouritelist_valid('<?php echo $ss['details'][0]['id'];?>')"><div class="love" id="love_<?php echo $ss['details'][0]['id'];?>">
                        <i class="fa fa-heart" aria-hidden="true"></i>
                </div></a>
                
                <?php } ?>
                
              </div>
              <a href="<?php echo $this->Url->build(["controller" => "Users","action" => "servicedetails",$ss['details'][0]['id']]);?>"><div class="img-prt" style="background-image: url('<?php echo $this->Url->build('/service_img/'.$ss['details'][0]['image']); ?>')"></div></a>
              <div class="btn-grp">
                      <?php foreach($ss['details'][0]['service_provider_tags'] as $t){?>
                    <button type="button" name="button" class="btn btn-secondary btn-sm"><?php echo $t['tag']['tag_name']?></button>
                      <?php }  ?>
                    <!--<button type="button" name="button" class="btn btn-secondary btn-sm">Lactose free</button>-->
                  </div>
              <div class="moreTxt">
                <div><?php echo $ss['details'][0]['description']?></div>
                <a href="<?php echo $this->Url->build(["controller" => "Users","action" => "servicedetails",$ss['details'][0]['id']]);?>">Read More >></a>
              </div>
              <div class="ftr-rtng">
                <span>Rating</span>
                
                  <div class="rate"><span class="stars1"><?php $avgrating=(($ss['rating'][0]['avgr'])/6);if($avgrating!=''){echo $avgrating;}else{ echo 0;}?></span></div>
                
                <span class="icn-hdr">
                  <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                </span>
                <span class="icn-hdr">
                  <i class="fa fa-share-alt" aria-hidden="true"></i>
                </span>
              </div>
            </div>
          </div>
           <?php } }else{ ?>
            
            <div class="col-md-6">Sorry! No result found. Please set your preference.</div>
           <?php } ?>
<!--          <div class="col-md-3">
            <div class="card">
              <div class="hdr">
                <div class="img" style="background-image: url('<?php echo $this->Url->build('/image/pp.jpg'); ?>')"></div>
                <div class="txt">
                  <h4>John Doe</h4>
                  <p>Restaurant Name</p>
                </div>
                <div class="love">
                  <i class="fa fa-heart" aria-hidden="true"></i>
                </div>
              </div>
              <div class="img-prt" style="background-image: url('<?php echo $this->Url->build('/image/3.png'); ?>')"></div>
              <div class="btn-grp">
                <button type="button" name="button" class="btn btn-secondary btn-sm">Gluten free</button>
                <button type="button" name="button" class="btn btn-secondary btn-sm">Lactose free</button>
              </div>
              <div class="moreTxt">
                <div>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
                <a href="">Read More >></a>
              </div>
              <div class="ftr-rtng">
                <span>Rating</span>
                <div class="rate">
                  <i class="fa fa-star text-theme" aria-hidden="true"></i>
                  <i class="fa fa-star text-theme" aria-hidden="true"></i>
                  <i class="fa fa-star text-theme" aria-hidden="true"></i>
                  <i class="fa fa-star text-theme" aria-hidden="true"></i>
                  <i class="fa fa-star text-gray" aria-hidden="true"></i>
                </div>
                <span class="icn-hdr">
                  <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                </span>
                <span class="icn-hdr">
                  <i class="fa fa-share-alt" aria-hidden="true"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card">
              <div class="hdr">
                <div class="img" style="background-image: url('<?php echo $this->Url->build('/image/pp.jpg'); ?>')"></div>
                <div class="txt">
                  <h4>John Doe</h4>
                  <p>Restaurant Name</p>
                </div>
                <div class="love">
                  <i class="fa fa-heart" aria-hidden="true"></i>
                </div>
              </div>
              <div class="img-prt" style="background-image: url('<?php echo $this->Url->build('/image/3.png'); ?>')"></div>
              <div class="btn-grp">
                <button type="button" name="button" class="btn btn-secondary btn-sm">Gluten free</button>
                <button type="button" name="button" class="btn btn-secondary btn-sm">Lactose free</button>
              </div>
              <div class="moreTxt">
                <div>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
                <a href="">Read More >></a>
              </div>
              <div class="ftr-rtng">
                <span>Rating</span>
                <div class="rate">
                  <i class="fa fa-star text-theme" aria-hidden="true"></i>
                  <i class="fa fa-star text-theme" aria-hidden="true"></i>
                  <i class="fa fa-star text-theme" aria-hidden="true"></i>
                  <i class="fa fa-star text-theme" aria-hidden="true"></i>
                  <i class="fa fa-star text-gray" aria-hidden="true"></i>
                </div>
                <span class="icn-hdr">
                  <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                </span>
                <span class="icn-hdr">
                  <i class="fa fa-share-alt" aria-hidden="true"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card">
              <div class="hdr">
                <div class="img" style="background-image: url('<?php echo $this->Url->build('/image/pp.jpg'); ?>')"></div>
                <div class="txt">
                  <h4>John Doe</h4>
                  <p>Restaurant Name</p>
                </div>
                <div class="love">
                  <i class="fa fa-heart" aria-hidden="true"></i>
                </div>
              </div>
              <div class="img-prt" style="background-image: url('<?php echo $this->Url->build('/image/3.png'); ?>')"></div>
              <div class="btn-grp">
                <button type="button" name="button" class="btn btn-secondary btn-sm">Gluten free</button>
                <button type="button" name="button" class="btn btn-secondary btn-sm">Lactose free</button>
              </div>
              <div class="moreTxt">
                <div>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
                <a href="">Read More >></a>
              </div>
              <div class="ftr-rtng">
                <span>Rating</span>
                <div class="rate">
                  <i class="fa fa-star text-theme" aria-hidden="true"></i>
                  <i class="fa fa-star text-theme" aria-hidden="true"></i>
                  <i class="fa fa-star text-theme" aria-hidden="true"></i>
                  <i class="fa fa-star text-theme" aria-hidden="true"></i>
                  <i class="fa fa-star text-gray" aria-hidden="true"></i>
                </div>
                <span class="icn-hdr">
                  <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                </span>
                <span class="icn-hdr">
                  <i class="fa fa-share-alt" aria-hidden="true"></i>
                </span>
              </div>
            </div>
          </div>-->
        </div>
      </div>
    </section>

    <section class="mb-5 mt-5">
      <div class="container">
            <h4 class="mb-4">Reviews</h4>
            <ul class="command-lst">
                <?php if(!empty($reviewegave)){
                  
               foreach($reviewegave as $dt){?>
              <li class="clearfix">
              <?php if($dt['company']['pimg']!=''){?>
              <div class="dashboard-list-pic">
              	<div class="img" style="background-image:url('<?php echo $this->Url->build('/user_img/'.$dt['company']['pimg']); ?>')"></div>
              </div>
               <?php }else{ ?> 
            
             <div class="dashboard-list-pic"> 
            <div class="img" style="background-image:url('<?php echo $this->Url->build('/user_img/default.png'); ?>')"></div>
             </div>
              <?php } ?>
                <div class="txt ml-3">
                  <h4 class="mb-0"><?php echo $dt['company']['full_name']?></h4>
                  <div class="d-flex">
                    <div class="text-theme">
                        <div><span class="stars1"><?php $avgrating=(($dt['food']+$dt['friendly']+$dt['ambient']+$dt['selection']+$dt['pricey']+$dt['comfortable'])/6);if($avgrating!=''){echo $avgrating;}else{ echo 0;}?></span></div>
                        <?php //echo $avgrating?>
<!--                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>-->
                    </div>
                  </div>
                  <p class="mb-0">2 hrs ago</p>
                  <p class="mb-0"><?php echo $dt['review']?></p>
                </div>
              </li>
              <?php } }else{ ?>
            <li>
               <div>
                  Sorry! No review found.
                
              </div>
            </li>
            
              <?php } ?>
<!--              <li>
                <div class="img" style="background-image:url('<?php echo $this->Url->build('/image/pp.jpg'); ?>')"></div>
                <div class="txt ml-3">
                  <h4 class="mb-0">John Doe</h4>
                  <div class="d-flex">
                    <div class="text-theme">
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                    </div>
                  </div>
                  <p class="mb-0">2 hrs ago</p>
                  <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco</p>
                </div>
              </li>
              <li>
                <div class="img" style="background-image:url('<?php echo $this->Url->build('/image/pp.jpg'); ?>')"></div>
                <div class="txt ml-3">
                  <h4 class="mb-0">John Doe</h4>
                  <div class="d-flex">
                    <div class="text-theme">
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                    </div>
                  </div>
                  <p class="mb-0">2 hrs ago</p>
                  <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco</p>
                </div>
              </li>
              <li>
                <div class="img" style="background-image:url('<?php echo $this->Url->build('/image/pp.jpg'); ?>')"></div>
                <div class="txt ml-3">
                  <h4 class="mb-0">John Doe</h4>
                  <div class="d-flex">
                    <div class="text-theme">
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                    </div>
                  </div>
                  <p class="mb-0">2 hrs ago</p>
                  <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco</p>
                </div>
              </li>
              <li>
                <div class="img" style="background-image:url('<?php echo $this->Url->build('/image/pp.jpg'); ?>')"></div>
                <div class="txt ml-3">
                  <h4 class="mb-0">John Doe</h4>
                  <div class="d-flex">
                    <div class="text-theme">
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                    </div>
                  </div>
                  <p class="mb-0">2 hrs ago</p>
                  <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco</p>
                </div>
              </li>-->
            </ul>
      </div>
    </section>

<style>
   .form-horizontal .control-label {
	text-align: left;
    }
    
    
    span.stars1, span.stars1 span {
    display: block;
    background: url(../../jimja/image/stars.png) 0 -16px repeat-x;
    width: 80px;
    height: 16px;
}

span.stars1 span {
    background-position: 0 0;
}
    
    
</style>
<script>
$.fn.stars1 = function() {
    return $(this).each(function() {
        // Get the value
        var val = parseFloat($(this).html());
        // Make sure that the value is in 0 - 5 range, multiply to get width
        var size = Math.max(0, (Math.min(5, val))) * 16;
        // Create stars holder
        var $span = $('<span />').width(size);
        // Replace the numerical value with stars
        $(this).html($span);
    });
}
$(function() {
    $('span.stars1').stars1();
});

</script>
<script type="text/javascript">
    
    function chk_add_to_faviouritelist_valid(id){
       
            $.ajax({
                type: 'POST',
                url: 'ajaxaddtofavourite/'+ id,
                data: $('#ListingCart').serialize(),
                //dataType: 'json',
                success: function(response) {
                    var obj = jQuery.parseJSON( response );
                    
                    $("#AjaxMsgFrom").html('');
                    if(obj.Ack == 1){
                       $('#love_'+id).html('<div class="love text-gray"><i class="fa fa-heart" aria-hidden="true"></i></div>');
                        $("#AjaxMsgFrom").html('<div class="row"><div class="col-md-12"><div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Success!</strong> '+obj.data+'</div></div></div>');
                    }else{
                       $("#AjaxMsgFrom").html('<div class="row"><div class="col-md-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Error!</strong> '+obj.data+'</div></div></div>');
                        
                    }
                    
                }
            });
    
    }

 


   </script>

<script>

      var marker;

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 16,
          center: {lat: <?php echo $user->latitude;?>, lng: <?php echo $user->longitude;?>}
        });

        marker = new google.maps.Marker({
          map: map,
          draggable: true,
          animation: google.maps.Animation.DROP,
          position: {lat: <?php echo $user->latitude;?>, lng: <?php echo $user->longitude;?>}
        });
        marker.addListener('click', toggleBounce);
      }

      function toggleBounce() {
        if (marker.getAnimation() !== null) {
          marker.setAnimation(null);
        } else {
          marker.setAnimation(google.maps.Animation.BOUNCE);
        }
      }
      
      
      
    </script> 
    
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBq9EFFb37zUosUttGpoQcZ2HmXp2-6dTU&callback=initMap">
</script>
