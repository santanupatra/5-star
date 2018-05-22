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
<section class="pt-5 pb-1">
      <div class="container">
          <div id="AjaxMsgFrom"></div>
        <div class="row">
            
          <div class="col-lg-6">            
            <div class="row">
                <?php 
                //pr($top_result);
                if(!empty($top_result)){ foreach($top_result as $dt){
                    //pr($dt);
                  ?>
                
              <div class="col-lg-6">
                  <form name="ListingCart" id="ListingCart"  method="post" autocomplete="off">
                     
                <div class="card">
                  <div class="hdr">
                    <div class="img" style="background-image: url('<?php echo $this->Url->build('/user_img/'.$dt['details']['service']['user']['pimg']); ?>')"></div>
                    <div class="txt">
                      <h4><?php echo $dt['details']['service']['user']['full_name']?></h4>
                      <p><?php echo $dt['details']['service']['service_name']?></p>
                    </div>
                    
                    <?php if($dt['details']['service']['id']==$dt['favourite']['service_id']){?>
                    <a href="javascript:void(0)" onclick="chk_add_to_faviouritelist_valid('<?php echo $dt['details']['service']['id'];?>')"><div class="love text-gray" id="love_<?php echo $dt['details']['service']['id'];?>">
                        <i class="fa fa-heart" aria-hidden="true"></i>
                </div></a>
                    <?php }else{ ?>
                    <a href="javascript:void(0)" onclick="chk_add_to_faviouritelist_valid('<?php echo $dt['details']['service']['id'];?>')"><div class="love" id="love_<?php echo $dt['details']['service']['id'];?>">
                        <i class="fa fa-heart" aria-hidden="true"></i>
                </div></a>
                    
                    <?php } ?>
                    
                  </div>
                    <a href="<?php echo $this->Url->build(["controller" => "Users","action" => "servicedetails",$dt['details']['service']['id']]);?>"><div class="img-prt" style="background-image: url('<?php echo $this->Url->build('/service_img/'.$dt['details']['service']['image']); ?>')"></div></a>
                  
                  <div class="btn-grp">
                      <?php foreach($dt['details']['service']['service_provider_tags'] as $t){?>
                    <button type="button" name="button" class="btn btn-secondary btn-sm"><?php echo $t['tag']['tag_name']?></button>
                      <?php }  ?>
                    <!--<button type="button" name="button" class="btn btn-secondary btn-sm">Lactose free</button>-->
                  </div>
                 
                  <div class="moreTxt">
                    <div><?php echo $dt['details']['service']['description']?></div>
                    <a href="<?php echo $this->Url->build(["controller" => "Users","action" => "servicedetails",$dt['details']['service']['id']]);?>">Read More >></a>
                  </div>
                  <div class="ftr-rtng">
                    <span>Rating</span>
                    <div class="rate"><span class="stars1"><?php $avgrating=(($dt['rating'][0]['avgr'])/6);if($avgrating!=''){echo $avgrating;}else{ echo 0;}?></span></div>
                    <span class="icn-hdr">
                      <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                    </span>
                    <span class="icn-hdr">
                      <i class="fa fa-share-alt" aria-hidden="true"></i>
                    </span>
                  </div>
                </div>
                     </form>
              </div>
                
                <?php  }  }else{ ?>
                <div class="col-lg-6">
                
                    Sorry! No result found.
                </div>
            
            <?php } ?>

            </div>
          </div>
          <div class="col-lg-6">
              <div class="img-warp" id="map"></div>

          </div>
        </div>
      </div>
    </section>

    <section class="pt-1 pb-5">
      <div class="container">
        <div class="row">
            <?php 
                if(!empty($rest_result)){ foreach($rest_result as $dt){
                 if($dt['details']['service']['id'] != ""){ 
              ?>
          <div class="col-lg-3">
              <form name="ListingCart" id="ListingCart"  method="post" autocomplete="off">
                     
            <div class="card">
              <div class="hdr">
                <div style="background-image: url('<?php echo $this->Url->build('/user_img/'.$dt['details']['service']['user']['pimg']); ?>" class="img"></div>
                <div class="txt">
                  <h4><?php echo $dt['details']['service']['user']['full_name']?></h4>
                  <p><?php echo $dt['details']['service']['service_name']?></p>
                </div>
                
                <?php if($dt['details']['service']['id']==$dt['favourite']['service_id']){?>
                <a href="javascript:void(0)" onclick="chk_add_to_faviouritelist_valid('<?php echo $dt['details']['service']['id'];?>')" ><div class="love text-gray" id="love_<?php echo $dt['details']['service']['id'];?>">
                    <i aria-hidden="true" class="fa fa-heart"></i>
                    </div></a>
                
                <?php }else{ ?>
                
                <a href="javascript:void(0)" onclick="chk_add_to_faviouritelist_valid('<?php echo $dt['details']['service']['id'];?>')" ><div class="love" id="love_<?php echo $dt['details']['service']['id'];?>">
                    <i aria-hidden="true" class="fa fa-heart"></i>
                    </div></a>
                
                <?php } ?>
                
              </div>
                <a href="<?php echo $this->Url->build(["controller" => "Users","action" => "servicedetails",$dt['details']['service']['id']]);?>"><div style="background-image: url('<?php echo $this->Url->build('/service_img/'.$dt['details']['service']['image']); ?>')" class="img-prt"></div></a>

<div class="btn-grp">
                      <?php foreach($dt['details']['service']['service_provider_tags'] as $t){?>
                    <button type="button" name="button" class="btn btn-secondary btn-sm"><?php echo $t['tag']['tag_name']?></button>
                     <?php } ?>
                    
                  </div>
              <div class="moreTxt">
                <div><?php echo $dt['details']['description']?></div>
                <a href="<?php echo $this->Url->build(["controller" => "Users","action" => "servicedetails",$dt['details']['service']['id']]);?>">Read More &gt;&gt;</a>
              </div>
              <div class="ftr-rtng">
                <span>Rating</span>
                <div class="rate"><span class="stars1"><?php $avgrating=(($dt['rating'][0]['avgr'])/6);if($avgrating!=''){echo $avgrating;}else{ echo 0;}?></span></div>
                <span class="icn-hdr">
                  <i aria-hidden="true" class="fa fa-thumbs-up"></i>
                </span>
                <span class="icn-hdr">
                  <i aria-hidden="true" class="fa fa-share-alt"></i>
                </span>
              </div>
            </div>
              </form>
          </div>
            <?php } }} ?>
            
            
         
        </div>
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
      var map;
      var marker;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 12,
          center: new google.maps.LatLng(<?php echo $result[0]['service']['latitude']?>, <?php echo $result[0]['service']['longitude']?>),
          mapTypeId: 'roadmap'
        });

        var iconBase = 'http://111.93.169.90/team6/jimja/image/';
       
        marker = new google.maps.Marker({
          map: map,
          draggable: true,
          animation: google.maps.Animation.DROP,
          
        });
        var icons = {
          
          info: {
            icon: iconBase + 'marker.png'
          }
        };

        var features = [
    <?php 
      foreach($result as $res){ 
        if($res['service']['id'] != ""){
      ?>
          {
            position: new google.maps.LatLng(<?php echo $res['service']['latitude']?> , <?php echo $res['service']['longitude']?>),
            type: 'info'
          }, 
<?php } }?>
  
        ];

        // Create markers.
        features.forEach(function(feature) {
          var marker = new google.maps.Marker({
            position: feature.position,
            icon: icons[feature.type].icon,
            map: map
          });
        });
      }
    </script>
  
   <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBq9EFFb37zUosUttGpoQcZ2HmXp2-6dTU&callback=initMap">
</script> 

    
    
