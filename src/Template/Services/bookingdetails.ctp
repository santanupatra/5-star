<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">



<section class="user-dashboard">
	<div class="container">
		<div class="row">
            <?php echo ($this->element('side_menu'));?>
            <div class="col-lg-9 col-md-8">
				<div class="edit-pro p-3 p-lg-4">
					<h5 class="common-title mb-3 pb-2">Booking Details</h5>
                    
                    <?php if($service!=''){
                        //pr($dt);
                        ?>
                    <div class="row product-list-row">
                        <div class="col-lg-3 col-md-3 col-4">

                            <?php if(isset($service->service->image)) { ?>
                            <img src="<?php echo $this->Url->build('/service_img/'.$service->service->image); ?>" alt="" class="img-fluid">
                            <?php }else{ ?>
                             <img src="<?php echo $this->Url->build('/service_img/default.png'); ?>" alt="" class="img-fluid">
                            <?php } ?>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <h5><?php echo $service->service->service_name;?></h5>
                             <i class="fa fa-map-marker" aria-hidden="true"></i>
                             <span><?php echo $service->service->address;?></span>
                             <p class="text-grey">Contact Person: <?php echo $service->service->cp_fname.' '.$service->service->cp_fname;?></p>
                            <p class="text-grey">Contact No: <?php echo $service->service->cp_phone;?></p>
                           <p class="text-grey">Contact Email: <?php echo $service->service->cp_email;?></p>



                            <p class="text-grey">Event Date: <?php echo $service->service->start_time;?> to <?php echo $service->service->end_time;?></p>
                            <p class="text-grey">Your Reserved Date & Time: <?php echo $service->event_date;?> - <?php echo date('h:i A',strtotime($service->event_time));?></p>
                             <p class="text-grey">Amount Paid: $<?php echo number_format($service->total_amount,2);?></p>
                            <!--  <p class="text-grey">Booked By: <?php echo $service->user->full_name;?></p>
                             <p class="text-grey">Email: <?php echo $service->user->email;?></p>
                             <p class="text-grey">Phone: <?php echo $service->user->phone;?></p>
                             <?php if(isset($service->user->pimg)) { ?>
                            <img src="<?php echo $this->Url->build('/user_img/thumb_'.$service->user->pimg); ?>" alt="" class="img-fluid">
                            <?php }else{ ?>
                             <img src="<?php echo $this->Url->build('/user_img/thumb_default.png'); ?>" alt="" class="img-fluid">
                            <?php } ?> -->
         
                        </div>  
                         <div class="col-lg-3 col-md-3 col-12 text-md-right pt-md-5">   
                                    
                              <!-- <a href="javascript:void(0);" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#myModal_review">Review</a>  -->

                              <a href="javascript: select_friend_foot(<?php echo $service->service->provider_id;?>)"  style="display: inline-block" class="btn btn-primary text-capitalize rounded-0"> <div class="user userCurrent" data-id=<?php echo $service->service->provider_id;?> style="color: #fff; "> <?php if($service->service->provider_id){?> <span class="on_line on_<?php echo $service->service->provider_id;?>" ><i class="" aria-hidden="true"></i></span><?php }else{ ?><span class="off_line off_<?php echo $service->service->provider_id;?>"><i class="ion-chatbox" aria-hidden="true"></i></span><?php } ?>
                                chat now
                            </div></a> 
                             
                        </div>                          
                    </div>
                    <?php  } ?>

        	
<!--                       <?php if($myreview->rating!='' || $myreview->review!=''){?>                                                
                                    <div class="col-lg-6">
                                                <div class="starRating text-left">
                                                    
                                <?php $z=$myreview->rating;?>
                                              
                                        <i class="icon ion-android-star"></i>
                                        <span class="stars"><?php echo $z;?></span>
                               

                                </div>
                                <div class="starPara mt-2 text-left" >
                                    <p><?php echo base64_decode($myreview->review) ;?></p>
                                </div>
                                        </div>
                                    <?php }else{ ?> 
                                       <div class="col-lg-6"></div>                                           
                               <?php } ?> -->
                                       
                                       
                                       
                                       
                                       
                                       
                                       
                            <!--spandan-->
                            
                  <?php
                     if($myreview->rating!='' || $myreview->review!='') {                               
                     ?>
                  <div class="media mb-2">
                     <div class="media-left">
                        <div class="user-image rounded-circle r-imgdiv mr-0">
                           <div class="user userCurrent" >
                                 <img src="<?php echo $this->request->webroot;?>/user_img/thumb_<?php echo (($myreview->user->pimg != "")? $myreview->user->pimg : 'nouser.png');?>" alt="" class="img-fluid">
                           </div>   
                        </div>
                     </div>
                     <div class="media-body">
                         <h5 class="mt-0 mb-0"><?php echo $myreview->user->full_name;?></h5><span><?php echo date('dS M,Y h:m a',strtotime($myreview->date_time));?></span>
                        <p class="font-14 mb-0 text-capitalize text-muted "><?php echo  base64_decode($myreview->review);?> <br>
                           <small class="d-inline-block">
                           <span class="stars"><?php echo $myreview->rating;?></span>
                           </small>                    
                        </p>
                     </div>
                  </div>
                  <?php
                     }else{
                     ?> 
                  <div class="col-lg-6"></div>                                           
                 <?php } ?> 
               
                                       
                                       
                                       
                                       
                                       
                                       
                                       
                                       
                                       
                                       
                                       
                                       
                                       
                                        
                </div>
            </div>
        </div>
    </div>
</section>



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
      
           <input type="hidden" name="service_id" value="<?php echo $service->service_id?>">
           <input type="hidden" name="order_id" value="<?php echo $service->id?>">
           <input type="hidden" name="rated_to" value="<?php echo $service->provider_id?>">
           <input type="hidden" name="user_id" value="<?php echo $service->user_id?>">
           
           
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