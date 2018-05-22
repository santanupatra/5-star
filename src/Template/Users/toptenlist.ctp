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
            <h6>Healthy restaurants in london</h6>
            <div class="row text-center inr-itm">
              <div class="col-lg-2">
                <div class="active  pt-2 pb-2 main-body">
                  <img src="<?php echo $this->Url->build('/image/icon1.png'); ?>" alt="">
                  <div>Brunch</div>
                </div>
              </div>
              <div class="col-lg-2">
                <div class=" pt-2 pb-2 main-body">
                  <img src="<?php echo $this->Url->build('/image/icon2.png'); ?>" alt="">
                  <div>Breakfast</div>
                </div>
              </div>
              <div class="col-lg-2">
                <div class=" pt-2 pb-2 main-body">
                  <img src="<?php echo $this->Url->build('/image/icon3.png'); ?>" alt="">
                  <div>Lunch</div>
                </div>
              </div>
              <div class="col-lg-2">
                <div class=" pt-2 pb-2 main-body">
                  <img src="<?php echo $this->Url->build('/image/icon4.png'); ?>" alt="">
                  <div>Dinner</div>
                </div>
              </div>
              <div class="col-lg-2">
                <div class="pt-2 pb-2 main-body">
                  <img src="<?php echo $this->Url->build('/image/icon5.png'); ?>" alt="">
                  <div>Desserts</div>
                </div>
              </div>
              <div class="col-lg-2">
                <div class="pt-2 pb-2 main-body">
                  <div>More Filter <i class="fa fa-angle-down" aria-hidden="true"></i></div>
              </div>
              </div>
            </div>
            <div class="row">
                <?php if(!empty($top_result)){
                    //pr($top_result);
                    foreach($top_result as $dt){
                        //pr ($dt);
                        ?>
                
              <div class="col-lg-6">
                  <form name="ListingCart" id="ListingCart"  method="post" autocomplete="off">
                     
                <div class="card">
                  <div class="hdr">
                    <div class="img" style="background-image: url('<?php echo $this->Url->build('/user_img/'.$dt['details'][0]['user']['pimg']); ?>')"></div>
                    <div class="txt">
                      <h4><?php echo $dt['details'][0]['user']['full_name']?></h4>
                      <p><?php echo $dt['details'][0]['service_name']?></p>
                    </div>
                    <?php if($dt['details'][0]['id']==$dt['favourite']['service_id']){?>
                <a href="javascript:void(0)" onclick="chk_add_to_faviouritelist_valid('<?php echo $dt['details'][0]['id'];?>')" ><div class="love text-gray" id="love_<?php echo $dt['details'][0]['id'];?>">
                    <i aria-hidden="true" class="fa fa-heart"></i>
                    </div></a>
                <?php }else{ ?>
                
                <a href="javascript:void(0)" onclick="chk_add_to_faviouritelist_valid('<?php echo $dt['details'][0]['id'];?>')" ><div class="love" id="love_<?php echo $dt['details'][0]['id'];?>">
                    <i aria-hidden="true" class="fa fa-heart"></i>
                    </div></a>
                
                
                <?php } ?>
                  </div>
                    <a href="<?php echo $this->Url->build(["controller" => "Users","action" => "servicedetails",$dt['details'][0]['id']]);?>"><div class="img-prt" style="background-image: url('<?php echo $this->Url->build('/service_img/'.$dt['details'][0]['image']); ?>')"></div></a>
                  
                  <div class="btn-grp">
                      <?php foreach($dt['details'][0]['service_provider_tags'] as $t){?>
                    <button type="button" name="button" class="btn btn-secondary btn-sm"><?php echo $t['tag']['tag_name']?></button>
                      <?php }  ?>
                    <!--<button type="button" name="button" class="btn btn-secondary btn-sm">Lactose free</button>-->
                  </div>
                 
                  <div class="moreTxt">
                    <div><?php echo $dt['details'][0]['description']?></div>
                    <a href="<?php echo $this->Url->build(["controller" => "Users","action" => "servicedetails",$dt['details'][0]['id']]);?>">Read More >></a>
                  </div>
                    
                  <div class="ftr-rtng">
                    <span>Rating</span>
                    <div class="rate"><span class="stars1"><?php $avgrating=(($dt['rating'][0]['avgr'])/6);if($avgrating!=''){echo $avgrating;}else{ echo 0;}?></span></div>
                    <span class="icn-hdr">
                      <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                    </span>
                   <span class="icn-hdr social-area">
                  <i aria-hidden="true" class="fa fa-share-alt" onclick="a('<?php echo $dt['details'][0]['id'];?>')"></i>
                  <div class="pop-up-box" id="share_<?php echo $dt['details'][0]['id'];?>" style="display: none">
                  	<div class="arrow_box">
						<ul>
                                                    <li><a href="javascript:void(0);" class="share_fb" onclick="facebook_share('<?php echo $dt['details'][0]['id'];?>','<?php echo $dt['details'][0]['image'];?>','<?php echo $dt['details'][0]['description']?>')"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                                    <li><a href="javascript:twShare('http://111.93.169.90/team6/jimja/users/servicedetails/<?php echo $dt['details'][0]['id'];?>', '<?php echo $sitesetting['SiteSetting']['twitter_share_text'];?>', '', 'http://111.93.169.90/team6/jimja/service_img/<?php echo $dt['details'][0]['image'];?>', 520, 350)" class="share_tweet"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                                    <li><a href="https://plus.google.com/share?url=http://111.93.169.90/team6/jimja/users/servicedetails/<?php echo $dt['details'][0]['id'];?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" class="share_gplus"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
						</ul>                 	
                </div>
                  </div>                  
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
<!--              <div class="col-lg-6">
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
          <div class="col-lg-6">
              <div class="img-warp" id="map"></div>

          </div>
        </div>
      </div>
    </section>

    <section class="pt-1 pb-5">
      <div class="container">
        <div class="row">
            <?php if(!empty($rest_result)){ foreach($rest_result as $dt){?>
          <div class="col-lg-3">
              <form name="ListingCart" id="ListingCart"  method="post" autocomplete="off">
                     
            <div class="card">
              <div class="hdr">
                <div style="background-image: url('<?php echo $this->Url->build('/user_img/'.$dt['details'][0]['user']['pimg']); ?>" class="img"></div>
                <div class="txt">
                  <h4><?php echo $dt['details'][0]['user']['full_name']?></h4>
                  <p><?php echo $dt['details'][0]['service_name']?></p>
                </div>
                
                <?php if($dt['details'][0]['id']==$dt['favourite']['service_id']){?>
                <a href="javascript:void(0)" onclick="chk_add_to_faviouritelist_valid('<?php echo $dt['details'][0]['id'];?>')" ><div class="love text-gray" id="love_<?php echo $dt['details'][0]['id'];?>">
                    <i aria-hidden="true" class="fa fa-heart"></i>
                    </div></a>
                <?php }else{ ?>
                
                <a href="javascript:void(0)" onclick="chk_add_to_faviouritelist_valid('<?php echo $dt['details'][0]['id'];?>')" ><div class="love" id="love_<?php echo $dt['details'][0]['id'];?>">
                    <i aria-hidden="true" class="fa fa-heart"></i>
                    </div></a>
                
                
                <?php } ?>
              </div>
                <a href="<?php echo $this->Url->build(["controller" => "Users","action" => "servicedetails",$dt['details'][0]['id']]);?>"><div style="background-image: url('<?php echo $this->Url->build('/service_img/'.$dt['details'][0]['image']); ?>')" class="img-prt"></div></a>

<div class="btn-grp">
                      <?php foreach($dt['details'][0]['service_provider_tags'] as $t){?>
                    <button type="button" name="button" class="btn btn-secondary btn-sm"><?php echo $t['tag']['tag_name']?></button>
                     <?php } ?>
                    
                  </div>
              <div class="moreTxt">
                <div><?php echo $dt['details'][0]['description']?></div>
                <a href="<?php echo $this->Url->build(["controller" => "Users","action" => "servicedetails",$dt['details'][0]['id']]);?>">Read More &gt;&gt;</a>
              </div>
              <div class="ftr-rtng custom-area">
                <span>Rating</span>
                <div class="rate"><span class="stars1"><?php $avgrating=(($dt['rating'][0]['avgr'])/6);if($avgrating!=''){echo $avgrating;}else{ echo 0;}?></span></div>
                <span class="icn-hdr">
                  <i aria-hidden="true" class="fa fa-thumbs-up"></i>
                </span>
                <span class="icn-hdr social-area">
                  <i aria-hidden="true" class="fa fa-share-alt" onclick="a('<?php echo $dt['details'][0]['id'];?>')"></i>
                  <div class="pop-up-box" id="share_<?php echo $dt['details'][0]['id'];?>" style="display: none">
                  	<div class="arrow_box">
						<ul>
                                                    <li><a href="javascript:void(0);" class="share_fb" onclick="facebook_share('<?php echo $dt['details'][0]['id'];?>','<?php echo $dt['details'][0]['image'];?>','<?php echo $dt['details'][0]['description']?>')"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							<li><a href="javascript:twShare('http://111.93.169.90/team6/jimja/users/servicedetails/<?php echo $dt['details'][0]['id'];?>', '<?php echo $sitesetting['SiteSetting']['twitter_share_text'];?>', '', 'http://111.93.169.90/team6/jimja/service_img/<?php echo $dt['details'][0]['image'];?>', 520, 350)" class="share_tweet"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                                    <li><a href="https://plus.google.com/share?url=http://111.93.169.90/team6/jimja/users/servicedetails/<?php echo $dt['details'][0]['id'];?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" class="share_gplus"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
						</ul>                 	
                </div>
                  </div>                  
                </span>
                                
                
              </div>
            </div>
              </form>
          </div>
            <?php } } ?>
            
            
         <!-- <div class="col-lg-3">
            <div class="card">
              <div class="hdr">
                <div style="background-image: url('<?php echo $this->Url->build('/image/pp.jpg'); ?>" class="img"></div>
                <div class="txt">
                  <h4>John Doe</h4>
                  <p>Restaurant Name</p>
                </div>
                <div class="love">
                  <i aria-hidden="true" class="fa fa-heart"></i>
                </div>
              </div>
              <div style="background-image: url('<?php echo $this->Url->build('/image/3.png'); ?>')" class="img-prt"></div>
              <div class="btn-grp">
                <button class="btn btn-secondary btn-sm" name="button" type="button">Gluten free</button>
                <button class="btn btn-secondary btn-sm" name="button" type="button">Lactose free</button>
              </div>
              <div class="moreTxt">
                <div>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
                <a href="">Read More &gt;&gt;</a>
              </div>
              <div class="ftr-rtng">
                <span>Rating</span>
                <div class="rate">
                  <i aria-hidden="true" class="fa fa-star text-theme"></i>
                  <i aria-hidden="true" class="fa fa-star text-theme"></i>
                  <i aria-hidden="true" class="fa fa-star text-theme"></i>
                  <i aria-hidden="true" class="fa fa-star text-theme"></i>
                  <i aria-hidden="true" class="fa fa-star text-gray"></i>
                </div>
                <span class="icn-hdr">
                  <i aria-hidden="true" class="fa fa-thumbs-up"></i>
                </span>
                <span class="icn-hdr">
                  <i aria-hidden="true" class="fa fa-share-alt"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="card">
              <div class="hdr">
               <div style="background-image: url('<?php echo $this->Url->build('/image/pp.jpg'); ?>" class="img"></div>
                <div class="txt">
                  <h4>John Doe</h4>
                  <p>Restaurant Name</p>
                </div>
                <div class="love">
                  <i aria-hidden="true" class="fa fa-heart"></i>
                </div>
              </div>
              <div style="background-image: url('<?php echo $this->Url->build('/image/3.png'); ?>" class="img-prt"></div>
              <div class="btn-grp">
                <button class="btn btn-secondary btn-sm" name="button" type="button">Gluten free</button>
                <button class="btn btn-secondary btn-sm" name="button" type="button">Lactose free</button>
              </div>
              <div class="moreTxt">
                <div>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
                <a href="">Read More &gt;&gt;</a>
              </div>
              <div class="ftr-rtng">
                <span>Rating</span>
                <div class="rate">
                  <i aria-hidden="true" class="fa fa-star text-theme"></i>
                  <i aria-hidden="true" class="fa fa-star text-theme"></i>
                  <i aria-hidden="true" class="fa fa-star text-theme"></i>
                  <i aria-hidden="true" class="fa fa-star text-theme"></i>
                  <i aria-hidden="true" class="fa fa-star text-gray"></i>
                </div>
                <span class="icn-hdr">
                  <i aria-hidden="true" class="fa fa-thumbs-up"></i>
                </span>
                <span class="icn-hdr">
                  <i aria-hidden="true" class="fa fa-share-alt"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="card">
              <div class="hdr">
                <div style="background-image: url('<?php echo $this->Url->build('/image/pp.jpg'); ?>" class="img"></div>
                <div class="txt">
                  <h4>John Doe</h4>
                  <p>Restaurant Name</p>
                </div>
                <div class="love">
                  <i aria-hidden="true" class="fa fa-heart"></i>
                </div>
              </div>
              <div style="background-image: url('<?php echo $this->Url->build('/image/3.png'); ?>')" class="img-prt"></div>
              <div class="btn-grp">
                <button class="btn btn-secondary btn-sm" name="button" type="button">Gluten free</button>
                <button class="btn btn-secondary btn-sm" name="button" type="button">Lactose free</button>
              </div>
              <div class="moreTxt">
                <div>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
                <a href="">Read More &gt;&gt;</a>
              </div>
              <div class="ftr-rtng">
                <span>Rating</span>
                <div class="rate">
                  <i aria-hidden="true" class="fa fa-star text-theme"></i>
                  <i aria-hidden="true" class="fa fa-star text-theme"></i>
                  <i aria-hidden="true" class="fa fa-star text-theme"></i>
                  <i aria-hidden="true" class="fa fa-star text-theme"></i>
                  <i aria-hidden="true" class="fa fa-star text-gray"></i>
                </div>
                <span class="icn-hdr">
                  <i aria-hidden="true" class="fa fa-thumbs-up"></i>
                </span>
                <span class="icn-hdr">
                  <i aria-hidden="true" class="fa fa-share-alt"></i>
                </span>
              </div>
            </div>
          </div>-->
        </div>
      </div>
    </section>
<?php //echo $result[0][0]['latitude']?>
    <section class="bg-gray pt-5 pb-5">
      <div class="container">
        <h3 class="text-center">Hey!</h3>
        <p class="text-center">We're still collecting *restaurants in this city, if you haven't see one place that you know it should be here. <br> please add it. To be the first to receive about new places coming up, pop your email below</p>
        <div class="src-input mt-4">
          <input type="text" name="" value="">
        </div>
        <div class="text-center">
          <button type="button" name="button" class="btn btn-success">Watch out</button>
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

 function a(id){
 var share= document.getElementById("share_"+id);
 if (share.style.display === "none") {
 $('#share_'+id).show();
 }else{
     $('#share_'+id).hide();
        }
    };


   </script>
    
  <script>
      var map;
      var marker;
      function initMap() {
          //alert('ok');
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 12,
          center: new google.maps.LatLng(<?php echo $result[0][0]['latitude']?>, <?php echo $result[0][0]['longitude']?>),
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
    <?php foreach($result as $res){ ?>
          {
            position: new google.maps.LatLng(<?php echo $res[0]['latitude']?> , <?php echo $res[0]['longitude']?>),
            type: 'info'
          }, 
<?php } ?>
  
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
      
      
      
  function facebook_share(id,img,desc)
    {
   	 FB.init({
   	 appId:'550300998642584',
   	 cookie:true,
   	 status:true,
   	 xfbml:true
   	 });
   	 FB.ui(
   	 {
   	 method: 'feed',
   	 name: 'Aktively',
   	 link: 'http://111.93.169.90/team6/jimja/users/servicedetails/'+id,
   	 picture: 'http://111.93.169.90/team6/jimja/service_img/'+img,
   	 caption: 'jimja.com',
   	 description: desc
   	 },
   	 function(response){
   	   if (response && response.post_id) {
   	   } else {
   	   }
   	 })
    }
    
   function twShare(url, title, descr, image, winWidth, winHeight) {
    	var winTop = (screen.height / 2) - (winHeight / 2);
    	var winLeft = (screen.width / 2) - (winWidth / 2);
    	window.open('http://twitter.com/share?url=' + encodeURI(url) + '&text=' + encodeURI(title) + '', 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width='+winWidth+',height='+winHeight);
	}
   
      
      
      
    </script>
    <script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBLfLpE3AURkapxqvczTgwCcXO6DappxjU&callback=initMap">
</script>
    

    
    
