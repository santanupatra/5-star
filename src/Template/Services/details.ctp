<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<?php echo  $this->Html->css('gallery.css') ?>
<?php echo $this->element('search');?>
<?php
   $sellerrating = 0;
   foreach ($service->user->sellerrating as $srating) {
     $sellerrating = ($sellerrating + $srating->rating);
   }
   $avgrating = ($sellerrating / count($service->user->sellerrating));
   //echo "<pre>";
   //print_r($service);
   ?>
<section class="detail-div">
   <div class="container">
      <div class="row">
         <div class="col-lg-12 col-md-12">
            <h4 cla6s="text-upperuppercasecase text-left pt-md-2 pb-md-2 text-muted">Details :</h4>
            <hr class="mt-md-2 mb-md-2">
         </div>
      </div>
      <div class="row">
         <div class="col-lg-4 col-md-4">
            <div class="left-bar mb-4">
               <div id="js-gallery" class="gallery">
                  <div style="margin: 10px" data-toggle="modal" data-target="#myModal_review_details" >
                     <h5><strong>Contact Details</strong></h5>
                     <div><strong>Name: </strong><?php echo $service->cp_fname; ?> <?php echo $service->cp_lname; ?> <br> <span class="stars1 d-inline-block"><?php echo $avgrating;?></span> <a href="javascript:void()">(<?php echo count($service->user->sellerrating).' Reviews';?>)</a></div>
                     <div><strong>Email: </strong><?php echo $service->cp_email; ?></div>
                     <div><strong>Phone: </strong><?php echo $service->cp_phone; ?></div>
                  </div>
               </div>
            </div>
            <div class="left-bar mb-4">
               <h5 class="text-dark text-capitalize mb-0 p-2"><strong>Event Location</strong></h5>
               <div class="google-mapdiv" id="map"></div>
            </div>
         </div>
         <div class="col-lg-8 col-md-8">
            <div class="edit-pro p-3 p-lg-4 w-100 float-left">
               <h5 class="common-title mb-3 pb-2"><?php echo $service->user->business_name; ?></h5>
               <div class="slider-maindiv w-100 float-left">
                  <!--               <div id="wowslider-container1">
                     <div class="ws_images">
                       <ul>
                     
                        <?php
                        foreach ($service->service_images as $img) {                        
                        ?>
                         <li><img src="<?php echo $this->Url->build('/service_img/'.$img->name); ?>" alt="" id="wows1_0" class="img-fluid w-100 h-100" />
                           <span class="w-100 bg-dark text-white"><?php echo $img->title;?></span>
                         </li>
                         <?php
                        }
                        ?>
                        
                     
                       </ul>
                     </div>
                     </div> -->
                  <div id="demo" class="carousel slide" data-ride="carousel">
                     <!--                <ul class="carousel-indicators">
                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                        <li data-target="#demo" data-slide-to="1"></li>
                        <li data-target="#demo" data-slide-to="2"></li>
                        </ul>-->
                     <div class="carousel-inner">
                        <?php
                           $a = 1;
                             foreach ($service->service_images as $img) {                        
                           ?>
                        <div class="carousel-item <?php echo (($a == 1)? 'active' : '');?>">
                           <img src="<?php echo $this->Url->build('/service_img/'.$img->name); ?>" alt="" width="1100" height="300" class="img-fluid">
                           <div class="carousel-caption">
                              <h3><?php echo $img->title;?></h3>
                              <!--<p>We had such a great time in LA!</p>-->
                           </div>
                        </div>
                        <?php $a++; } ?>
                        <!--                  <div class="carousel-item">
                           <img src="/team6/5star/images/2.jpg" alt="" width="1100" height="300" class="img-fluid">
                           <div class="carousel-caption">
                             <h3>Chicago</h3>
                             <p>Thank you, Chicago!</p>
                           </div>   
                           </div>
                           <div class="carousel-item">
                           <img src="/team6/5star/images/3.jpg" alt="" width="1100" height="300" class="img-fluid">
                           <div class="carousel-caption">
                             <h3>New York</h3>
                             <p>We love the Big Apple!</p>
                           </div>   
                           </div>-->
                     </div>
                     <a class="carousel-control-prev" href="#demo" data-slide="prev">
                     <span class="carousel-control-prev-icon"></span>
                     </a>
                     <a class="carousel-control-next" href="#demo" data-slide="next">
                     <span class="carousel-control-next-icon"></span>
                     </a>
                  </div>
               </div>
               <!-- slider-maindiv -->
               <div class="table-responsive">
                  <table class="table table-sm table-bordered table-light">
                     <tbody>
                        <tr>
                           <td colspan="4">
                              <h6 class="text-secondary text-uppercase mb-0 p-md-1"><?php echo $service->service_name; ?></h6>
                           </td>
                        </tr>
                        <tr>
                           <td>
                              <h6 class="text-secondary text-capitalize mb-0 p-md-2">Price</h6>
                           </td>
                           <td colspan="3">
                              USD <?php echo money_format("%.2n", $service->price);?><br>
                              EUR <?php echo money_format("%.2n", $service->eur_price);?><br>
                              COP <?php echo money_format("%.2n", $service->cop_price);?>
                           </td>
                        </tr>
                        <tr>
                           <td>
                              <h6 class="text-secondary text-capitalize mb-0 p-md-2">Event Location</h6>
                           </td>
                           <td colspan="3">
                              <?php echo $service->address;?>
                           </td>
                        </tr>
                        <tr>
                           <td>
                              <h6 class="text-secondary text-capitalize mb-0 p-md-2">Event type</h6>
                           </td>
                           <td colspan="3">
                              <?php 
                                 foreach ($events as $event) {
                                   echo $event->event_name.'<br>';
                                 }
                                 ?>
                           </td>
                        </tr>
                        <tr>
                           <td>
                              <h6 class="text-secondary text-capitalize mb-0 p-md-2">Amenities</h6>
                           </td>
                           <td colspan="3">
                              <?php 
                                 foreach ($amenities as $amen) {
                                   echo $amen->amenities_name.'<br>';
                                 }
                                 ?>
                           </td>
                        </tr>
                        <tr>
                           <td>
                              <h6 class="text-secondary text-capitalize mb-0 p-md-2">Event Start</h6>
                           </td>
                           <td>
                              <h6 class=" text-dark bg-light text-uppercase p-md-2 rounded-0 m-md-0 d-inline-block"><?php echo $service->start_time;?></h6>
                           </td>
                        </tr>
                        <tr>
                           <td>
                              <h6 class="text-secondary text-capitalize mb-0 p-md-2">Event End </h6>
                           </td>
                           <td>
                              <h6 class=" text-dark bg-light text-uppercase p-md-2 rounded-0 m-md-0 d-inline-block"><?php echo $service->end_time;?></h6>
                           </td>
                        </tr>
                        <tr>
                           <td colspan="4">
                              <h6 class="text-secondary text-capitalize mb-0 p-md-2">Event Description</h6>
                           </td>
                        </tr>
                        <tr>
                           <td colspan="4">
                              <article class="text-capitalize pl-md-2 text-muted">
                                 <?php echo base64_decode($service->description); ?>
                              </article>
                           </td>
                        </tr>
                        <tr>
                           <td colspan="4">
                              <form action="#" class="mt-md-1">
                                 <!-- <div class="form-group">
                                    <a href="<?php echo $this->Url->build(["controller" => "Services","action" => "booking",$service['id']]);?>" class="btn btn-primary text-capitalize rounded-0">
                                     Book Now </a><br>
                                    </div>  -->
                                 <div class="form-group mb-0">
                                    <div class="row">
                                       <div class="col-md-4 col-6">
                                          <a href="javascript:void(0)" onclick="chk_add_to_cart_valid('<?php echo $service['id'];?>')" class="btn btn-primary btn-block btn-sm text-capitalize mb-2">Reserve</a>
                                       </div>
                                       <div class="col-md-4 col-6">
                                          <?php
                                             if(isset($user_id) && $user_id != ""){
                                             ?>
                                          <a href="javascript: select_friend_foot(<?php echo $service['user']['id'];?>)"  style="display: inline-block" class="btn btn-primary btn-sm text-capitalize btn-block rounded-0">
                                             <div class="user userCurrent text-center" data-id=<?php echo $service['user']['id'];?> style="color: #fff; "> <?php if($service['user']['is_active']==1){?> <span class="on_line on_<?php echo $service['user']['id'];?>" ><i class="" aria-hidden="true"></i></span><?php }else{ ?><span class="off_line off_<?php echo $service['user']['id'];?>"><i class="ion-chatbox" aria-hidden="true"></i></span><?php } ?>
                                                chat now
                                             </div>
                                          </a>
                                          <?php
                                             }
                                             else{
                                              echo '<a class="btn btn-primary btn-sm text-capitalize btn-block rounded-0" href="#" data-toggle="modal" data-target="#loginModal">chat now</a>';
                                             }
                                             ?>                              
                                       </div>
                                       <div class="col-md-4 col-12">
                                          <?php if($user_id != '' && $user_id != $service->ratings[0]->user_id){ ?>
                                          <a href="javascript:void(0);" style="display: inline-block" class="btn btn-primary btn-sm text-capitalize btn-block rounded-0" id="review_box_open">Review</a> 
                                          <?php }else if($user_id != ''){
                                             ?>
                                          <a href="javascript:void(0);" style="display: inline-block" class="btn btn-primary btn-sm text-capitalize btn-block rounded-0" id="review_box_open_a">Review</a> 
                                          <?php
                                             } ?>                              
                                       </div>
                                       <span id="review_box_open_error" style="color: red;"> You already reviewed this service . </span>
                                    </div>
                                 </div>
                                 <!--<div class="form-group" style="padding-left: 15px;">
                                    <a href="javascript: review_rating();" class="btn btn-primary text-capitalize rounded-0">Review and Rating</a>
                                    </div>-->
                              </form>
                              <!-- Modal content-->
                              <div class="modal-content" id="review_box">
                                 <div class="modal-header">
                                    <h5 class="modal-title text-muted text-uppercase  text-center">Review and rating</h5>
                                    <!--  <button type="button" class="close float-right" data-dismiss="modal">&times;</button> -->
                                 </div>
                                 <div class="pop_msg" align="center"></div>
                                 <div class="modal-body">
                                    <form method="post" action="<?php echo $this->Url->build(["controller" => "Services","action" => "details",$service->id]);?>">
                                       <input type="hidden" name="service_id" value="<?php echo $service->id?>">
                                       <input type="hidden" name="order_id" value=" ">
                                       <input type="hidden" name="rated_to" value="<?php echo $service->provider_id?>">
                                       <div id="reg_first">
                                          <div class="col-md-12">
                                             <div class="form-group">
                                                <div class="row">
                                                   <div class="col-sm-12">
                                                      <div class="stars">
                                                         <input class="star star-5" id="star-5" type="radio" name="rating"  value="5"/>
                                                         <label class="star star-5" for="star-5"></label>
                                                         <input class="star star-4" id="star-4" type="radio" name="rating"  value="4"/>
                                                         <label class="star star-4" for="star-4"></label>
                                                         <input class="star star-3" id="star-3" type="radio" name="rating"  value="3"/>
                                                         <label class="star star-3" for="star-3"></label>
                                                         <input class="star star-2" id="star-2" type="radio" name="rating"  value="2"/>
                                                         <label class="star star-2" for="star-2"></label>
                                                         <input class="star star-1" id="star-1" type="radio" name="rating"  value="1"/>
                                                         <label class="star star-1" for="star-1"></label>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-md-12">
                                             <div class="form-group">
                                                <h6 class="text-muted text-uppercase">Review</h6>
                                                <textarea class="form-control mb-2" name="review"   tabindex="4" placeholder=""></textarea>
                                             </div>
                                          </div>
                                          <div class="form-group" align="right">
                                             <input type="submit" class=" btn btn-primary"  value="Submit" placeholder="" style="margin-right:3%">
                                          </div>
                                       </div>
                                    </form>
                                 </div>
                              </div>
                              <div id="AjaxMsgFrom"></div>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </div>
               <div class="review-div w-100 float-left pb-3 pl-2 pr-2">
                  <h6 class="text-capitalize text-muted mb-3">Reviews and Ratings</h6>
                  <?php
                     foreach ($service->ratings as $value) {                               
                     ?>
                  <div class="media mb-2">
                     <div class="media-left">
                        <div class="user-image rounded-circle r-imgdiv mr-0">
                           <?php
                              if($value->user->id != $uid){
                              ?>
                           <a href="javascript: select_friend_foot(<?php echo $value->user->id;?>)">
                              <div class="user userCurrent" data-id=<?php echo $value->user->id;?>>
                                 <img src="<?php echo $this->request->webroot;?>/user_img/thumb_<?php echo (($value->user->pimg != "")? $value->user->pimg : 'nouser.png');?>" alt="" class="img-fluid">
                              </div>
                           </a>
                           <?php
                              }
                              else{
                              ?>
                           <img src="<?php echo $this->request->webroot;?>/user_img/thumb_<?php echo (($value->user->pimg != "")? $value->user->pimg : 'nouser.png');?>" alt="" class="img-fluid w-100 h-100">
                           <?php
                              }
                              ?>
                           
                        </div>
                     </div>
                     <div class="media-body">
                        <h5 class="mt-0 mb-0"><?php echo $value->user->full_name;?></h5><span><?php echo date('dS M,Y h:m a',strtotime($value->date_time));?></span>
                        <p class="font-14 mb-0 text-capitalize text-muted "><?php echo base64_decode($value->review);?> <br>
                           <small class="d-inline-block">
                           <span class="stars2"><?php echo $value->rating;?></span>
                           </small>                    
                        </p>
                     </div>
                  </div>
                  <?php
                     }
                     ?>            
               </div>
               <!-- review-div -->
            </div>
         </div>
      </div>
   </div>
</section>
<script>
   $('document').ready(function(){
   
     $('#review_box').hide();
     $('#review_box_open_error').hide();
     $('#review_box_open_a').click(function(){
       $('#review_box_open_error').show();
     });
     $('#review_box_open').click(function(){
   $('#review_box').show();
   
     });
   });
       
        function chk_add_to_cart_valid(id){
           
          //alert(id);
       
               $.ajax({
                   type: 'POST',
                   url: '<?php echo $this->request->webroot; ?>services/ajaxaddtocart/'+id,
                   data: $('#ListingCart').serialize(),
                   
                   success: function(response) {
                       var obj = jQuery.parseJSON( response );
                       
                       $("#AjaxMsgFrom").html('');
                      if(obj.Ack == 0){
                           $("#AjaxMsgFrom").html('<div class="row"><div class="col-md-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Error!</strong> '+obj.data+'</div></div></div>');
                       }else if(obj.Ack == 1){
             window.location.href = '<?php echo $this->request->webroot; ?>services/ajaxaddtocart_details/'+id;
                           // var CartCount=$('.cart-item').find('b').text().trim();
                           // var NewCnt= parseInt(CartCount)+1;
                           // $('.cart-item').find('b').text( NewCnt);
                           // $("#AjaxMsgFrom").html('<div class="row"><div class="col-md-12"><div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Success!</strong> '+obj.data+'</div></div></div>');
                       }
                       
                   }
               });
       
       }
       
       
       
</script>    
<script>
   function initMap() {
     var uluru = {lat: <?php echo $service->latitude; ?>, lng: <?php echo $service->longitude; ?>};
     var map = new google.maps.Map(document.getElementById('map'), {
       zoom: 14,
       center: uluru
     });
     var marker = new google.maps.Marker({
       position: uluru,
       map: map
     });
   }
</script>
<script async defer
   src="https://maps.googleapis.com/maps/api/js?key= AIzaSyD2muWsAM7xF8ECB8rTN4fVYx3J5n_GjOc&callback=initMap"></script>
<style>
   #map {
   height: 300px;
   width: 100%;
   }
</style>
<script type="text/javascript"> 
   $(function() {
       $('span.stars').stars();
   });
         
   $.fn.stars = function() {
     return $(this).each(function() {
       $(this).html($('<span />').width(Math.max(0, (Math.min(5, parseFloat($(this).html())))) * 16));
     });   
   }
   
   function review_rating(){        
           $('#review').slideToggle();
         }
   
         
</script>
<style>
   .form-horizontal .control-label {
   text-align: left;
   }
   span.stars, span.stars span {
   display: block;
   background: url(../../img/stars.png) 0 -16px repeat-x;
   width: 80px;
   height: 16px;
   }
   span.stars span {
   background-position: 0 0;
   }
</style>
<style>
   div.stars {
   width: 270px;
   display: inline-block;
   margin: 0 auto;
   }
   input.star { display: none; }
   label.star {
   float: right;
   padding: 10px;
   font-size: 36px;
   color: #d3c45b;
   transition: all .2s;
   }
   input.star:checked ~ label.star:before {
   content: '\f005';
   color: #d3c45b;
   transition: all .25s;
   }
   input.star-5:checked ~ label.star:before {
   color: #d3c45b;
   text-shadow: 0 0 20px #952;
   }
   input.star-1:checked ~ label.star:before { color: #d3c45b; }
   label.star:hover { transform: rotate(-15deg) scale(1.3); }
   label.star:before {
   content: '\f006';
   font-family: FontAwesome;
   }
</style>
<script>
   $.fn.stars = function() {
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
       $('span.stars').stars();
   });
   
</script>









<!--review star-->

<style>
   .form-horizontal .control-label {
   text-align: left;
   }
   span.stars2, span.stars2 span {
   display: block;
   background: url(../../img/stars.png) 0 -16px repeat-x;
   width: 80px;
   height: 16px;
   }
   span.stars2 span {
   background-position: 0 0;
   }
</style>

<script>
   $.fn.stars2 = function() {
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
       $('span.stars2').stars();
   });
   
</script>








<!--side star-->

<style>
   .form-horizontal .control-label {
   text-align: left;
   }
   span.stars1, span.stars1 span {
   display: block;
   background: url(../../img/stars.png) 0 -16px repeat-x;
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
       $('span.stars1').stars();
   });
   
</script>


<!--All review star-->

<style>
   .form-horizontal .control-label {
   text-align: left;
   }
   span.stars3, span.stars3 span {
   display: block;
   background: url(../../img/stars.png) 0 -16px repeat-x;
   width: 80px;
   height: 16px;
   }
   span.stars3 span {
   background-position: 0 0;
   }
</style>

<script>
   $.fn.stars3 = function() {
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
       $('span.stars3').stars();
   });
   
</script>




<div id="myModal_review" class="modal fade" role="dialog">
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title titletext text-center">Review and rating</h4>
            <button type="button" class="close float-right" data-dismiss="modal">&times;</button>
         </div>
         <div class="pop_msg" align="center"></div>
         <div class="modal-body">
            <form method="post" >
               <input type="hidden" name="service_id" value="<?php echo $service->id?>">
               <input type="hidden" name="order_id" value=" ">
               <input type="hidden" name="rated_to" value="<?php echo $service->provider_id?>">
               <div id="reg_first">
                  <div class="col-md-12">
                     <div class="form-group">
                        <div class="row">
                           <div class="col-sm-12">
                              <div class="stars">
                                 <input class="star star-5" id="star-5" type="radio" name="rating"  value="5"/>
                                 <label class="star star-5" for="star-5"></label>
                                 <input class="star star-4" id="star-4" type="radio" name="rating"  value="4"/>
                                 <label class="star star-4" for="star-4"></label>
                                 <input class="star star-3" id="star-3" type="radio" name="rating"  value="3"/>
                                 <label class="star star-3" for="star-3"></label>
                                 <input class="star star-2" id="star-2" type="radio" name="rating"  value="2"/>
                                 <label class="star star-2" for="star-2"></label>
                                 <input class="star star-1" id="star-1" type="radio" name="rating"  value="1"/>
                                 <label class="star star-1" for="star-1"></label>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <h4>Review</h4>
                        <textarea class="form-control" name="review"   tabindex="4" placeholder=""></textarea>
                     </div>
                  </div>
                  <div class="form-group" align="right">
                     <input type="submit" class=" btn btn-primary"  value="Submit" placeholder="" style="margin-right:3%">
                  </div>
               </div>
            </form>
         </div>
         <div class="modal-footer">
         </div>
      </div>
   </div>
</div>
<div id="myModal_review_details" class="modal fade" role="dialog">
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title titletext text-center">Reviews</h4>
            <button type="button" class="close float-right" data-dismiss="modal">&times;</button>
         </div>
         <div class="pop_msg" align="center"></div>
         <div class="modal-body">
            <div class="review-div w-100 float-left pb-3 pl-2 pr-2">
               <!--  <h6 class="text-capitalize text-muted mb-3">Reviews and Ratings</h6> -->
               <?php
                  foreach ($all_review as $value) {                               
                  ?>
               <div class="media mb-2">
                  <div class="media-left">
                     <div class="user-image rounded-circle r-imgdiv mr-0">
                        <?php
                           if($value->user->id != $uid){
                           ?>
                        <a href="javascript: select_friend_foot(<?php echo $value->user->id;?>)">
                           <div class="user userCurrent" data-id=<?php echo $value->user->id;?>>
                              <img src="<?php echo $this->request->webroot;?>/user_img/thumb_<?php echo (($value->user->pimg != "")? $value->user->pimg : 'nouser.png');?>" alt="" class="img-fluid">
                           </div>
                        </a>
                        <?php
                           }
                           else{
                           ?>
                        <img src="<?php echo $this->request->webroot;?>/user_img/thumb_<?php echo (($value->user->pimg != "")? $value->user->pimg : 'nouser.png');?>" alt="" class="img-fluid w-100 h-100">
                        <?php
                           }
                           ?>                  
                     </div>
                  </div>
                  <div class="media-body">
                     <h5 class="mt-0 mb-0"><?php echo $value->user->full_name;?></h5><span><?php echo date('dS M,Y h:m a',strtotime($value->date_time));?></span>
                     <p class="font-14 mb-0 text-capitalize text-muted "><?php echo base64_decode($value->review);?> <br>
                        <small class="d-inline-block">
                        <span class="stars3"><?php echo $value->rating;?></span>
                        </small>                    
                     </p>
                  </div>
               </div>
               <?php
                  }
                  ?>            
            </div>
         </div>
         <div class="modal-footer">
         </div>
      </div>
   </div>
</div>