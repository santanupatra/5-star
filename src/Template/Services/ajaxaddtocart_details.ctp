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
              <div style="margin: 10px">
                <h5><strong>Contact Details</strong></h5>
                <div><strong>Name: </strong><?php echo $service->cp_fname; ?> <?php echo $service->cp_lname; ?> <br> <span class="stars"><?php echo $avgrating;?></span> (<?php echo count($service->user->sellerrating);?>)</div>
                <div><strong>Email: </strong><?php echo $service->cp_email; ?></div>
                <div><strong>Phone: </strong><?php echo $service->cp_phone; ?></div> 
              </div>
            </div>
          </div>

          <div class="left-bar mb-4">
            <h5 class="text-dark text-capitalize mb-0 p-md-2"><strong>Event Location</strong></h5>
            <div class="google-mapdiv" id="map"></div>         
          </div>   

          <!--<div class="left-bar mb-4">
            <div class="review-div w-100 float-left pb-3 pl-2 pr-2">
              <h6 class="text-capitalize text-muted mb-3">Review and Rating</h6>
              <div class="media mb-2">
                <img class="mr-3" src="/team6/5star/images/rv.png" alt="" class="img-fluid img-circle">
                <div class="media-body">
                  <h6 class="mt-0">Lorem</h6>
                  <p class="font-14 mb-0">Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. <br>
                    <a href="#" class="btn-link d-inline-block">Click Here</a>
                    <span class="d-inline-block">Rating:
                      <i class="icon ion-android-star"></i>
                      <i class="icon ion-android-star"></i>
                      <i class="icon ion-android-star"></i>
                      <i class="icon ion-android-star-half"></i>
                      <i class="icon ion-android-star-outline"></i>
                    </span>                    
                  </p>
                </div>
              </div> 

              <div class="media mb-2">
                <img class="mr-3" src="/team6/5star/images/rv.png" alt="" class="img-fluid img-circle">
                <div class="media-body">
                  <h6 class="mt-0">Lorem</h6>
                  <p class="font-14 mb-0">Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. <br>
                    <a href="#" class="btn-link d-inline-block">Click Here</a>
                    <span class="d-inline-block">Rating:
                      <i class="icon ion-android-star"></i>
                      <i class="icon ion-android-star"></i>
                      <i class="icon ion-android-star"></i>
                      <i class="icon ion-android-star-half"></i>
                      <i class="icon ion-android-star-outline"></i>
                    </span>                    
                  </p>
                </div>
              </div> 

              <div class="media mb-2">
                <img class="mr-3" src="/team6/5star/images/rv.png" alt="" class="img-fluid img-circle">
                <div class="media-body">
                  <h6 class="mt-0">Lorem</h6>
                  <p class="font-14 mb-0">Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. <br>
                    <a href="#" class="btn-link d-inline-block">Click Here</a>
                    <span class="d-inline-block">Rating:
                      <i class="icon ion-android-star"></i>
                      <i class="icon ion-android-star"></i>
                      <i class="icon ion-android-star"></i>
                      <i class="icon ion-android-star-half"></i>
                      <i class="icon ion-android-star-outline"></i>
                    </span>                    
                  </p>
                </div>
              </div> 
            </div>        
          </div> -->                

        </div>

        <div class="col-lg-8 col-md-8">
          <div class="edit-pro p-3 p-lg-4 w-100 float-left">
            <h5 class="common-title mb-3 pb-2">Enter Details</h5>
            
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

             <!--  <div id="demo" class="carousel slide" data-ride="carousel">

                <div class="carousel-inner">
                    
                    <?php
                    $a = 1;
                      foreach ($service->service_images as $img) {                        
                    ?>
                  <div class="carousel-item <?php echo (($a == 1)? 'active' : '');?>">
                    <img src="<?php echo $this->Url->build('/service_img/'.$img->name); ?>" alt="" width="1100" height="300" class="img-fluid">
                    <div class="carousel-caption">
                      <h3><?php echo $img->title;?></h3>
                      
                    </div>   
                  </div>
                    <?php $a++; } ?>

                </div>
                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                  <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#demo" data-slide="next">
                  <span class="carousel-control-next-icon"></span>
                </a>
              </div>  -->             
            </div><!-- slider-maindiv -->




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
                    <td colspan="3" >
                      $ <span id="show_price"><?php echo money_format("%.2n", $service->price);?></span>
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

                 <form  method="post" action="<?php echo $this->Url->build(["controller" => "Services","action" => "add_to_cart",$service->id]);?>" enctype='multipart/form-data'>
                 <tr>
                    <td>
                      <h6 class="text-secondary text-capitalize mb-0 p-md-2">Enter Guest Number</h6>
                    </td>
                    <td colspan="3">
                      <input type="text" name="guest" value="1" onkeyup="change_value(<?php echo $service->price ; ?>)" id="guest" >
                    </td>
                  </tr>

                  <tr>
                    <td>
                      <h6 class="text-secondary text-capitalize mb-0 p-md-2">Enter Date</h6>
                    </td>
                    <td colspan="3">
                       <input type="text" name="event_date" value="<?php echo date('Y-m-d',strtotime($service->start_time));?>" class="form-control date left" id="datetimepicker" placeholder="Start date." required/>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <h6 class="text-secondary text-capitalize mb-0 p-md-2">Enter Time</h6>
                    </td>
                    <td colspan="3">
                       <input type="text" name="event_time" value="<?php echo date('h:i A',strtotime($service->start_time));?>"  class="form-control date left" id="starttime" placeholder="Start time." required/>
                    </td>
                  </tr>
                 
                  
                  
                  
                  <tr>
                    <td colspan="4">
                      
                       
                        <!-- <div class="form-group">
                          <a href="<?php echo $this->Url->build(["controller" => "Services","action" => "booking",$service['id']]);?>" class="btn btn-primary text-capitalize rounded-0">
                           Book Now </a><br>
                        </div>  -->
                        <div class="form-group mb-0" style="text-align: right;">
                           <button type="submit" class="btn btn-primary btn-lg">Confirm Booking</button>
                        </div>
                        
                        <!--  <div class="form-group" style="padding-left: 15px;">
                            <?php
                              if(isset($user_id) && $user_id != ""){
                            ?>
                            <a href="javascript: select_friend_foot(<?php echo $service['user']['id'];?>)"  style="display: inline-block" class="btn btn-primary text-capitalize rounded-0"> <div class="user userCurrent" data-id=<?php echo $service['user']['id'];?> style="color: #fff; "> <?php if($service['user']['is_active']==1){?> <span class="on_line on_<?php echo $service['user']['id'];?>" ><i class="" aria-hidden="true"></i></span><?php }else{ ?><span class="off_line off_<?php echo $service['user']['id'];?>"><i class="ion-chatbox" aria-hidden="true"></i></span><?php } ?>
                                chat now
                            </div></a>
                            <?php
                              }
                              else{
                               echo '<a class="btn btn-primary text-capitalize" href="#" data-toggle="modal" data-target="#loginModal">chat now</a>';
                              }
                             ?>
                        </div> -->
                        <!--<div class="form-group" style="padding-left: 15px;">
                           <a href="javascript: review_rating();" class="btn btn-primary text-capitalize rounded-0">Review and Rating</a>
                        </div>-->
                      </form>                 

                        <div id="AjaxMsgFrom"></div>
                    </td>
                  </tr>
                  
                </tbody>
              </table>
            </div>

           
          </div>
        </div>
        
      </div>
    </div>
  </section>


<script>
    
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
    
    function change_value(price)
    {
     //var t = $('#guest').val();
     //var price = t * price;
     //alert(price);
     //$('#show_price').html(price)
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
    src="https://maps.googleapis.com/maps/api/js?key= AIzaSyD2muWsAM7xF8ECB8rTN4fVYx3J5n_GjOc&callback=initMap">
    </script>
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

 <script type="text/javascript">
 $('#datetimepicker').datetimepicker({
  dayOfWeekStart : 1,
  lang:'en',
  timepicker:false,
  format:'Y-m-d'
  //disabledDates:['1986/01/08','1986/01/09','1986/01/10']
  });
   
  $('#starttime').datetimepicker({
    datepicker:false,
    format:'g:i A',
      formatTime: 'g:i A',
    ampm:true
  });
  
  
  
</script>