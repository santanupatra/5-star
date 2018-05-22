<section class="user-dashboard">
	<div class="container">
		<div class="row">
            <?php echo ($this->element('side_menu'));?>
            <div class="col-lg-9 col-md-8">
				<div class="edit-pro p-3 p-lg-4">
					<h5 class="common-title mb-3 pb-2">Booking Request Status</h5>
                    
                    <?php 
                        //print_r($service);exit;
                    if($service!=''){foreach ($service as $dt){ 
                     
                        ?>
                    <div class="row product-list-row">
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <a href="<?php echo $this->Url->build(["controller" => "Services","action" => "details",$dt->service->id]);?>">
                            <?php if(isset($dt->service->image)) { ?>
                            <img src="<?php echo $this->Url->build('/service_img/'.$dt->service->image); ?>" alt="" class="img-fluid">
                            <?php }else{ ?>
                             <img src="<?php echo $this->Url->build('/service_img/default.png'); ?>" alt="" class="img-fluid">
                            <?php } ?>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <h5 class="w-100 float-left text-left"><?php echo $dt->service->service_name;?></h5>
                             <i class="fa fa-map-marker" aria-hidden="true"></i>
                             <span><?php echo $dt->service->address;?></span>
                            <p class="text-grey mb-0">Contact Person : <?php echo $dt->service->cp_fname." ".$dt->service->cp_lname;?></p>
                            <p class="text-grey mb-0">Contact No: <?php echo $dt->service->cp_phone;?></p>
                            <p class="text-grey mb-0">Date of Booking: <?php echo $dt->event_date;?></p>
                            <?php if($dt->offer_price !="") { ?>
                            <p class="text-grey mb-0">Amount Pay: <?php echo $dt->offer_price;?></p>
                            <?php } ?>
                            <?php if($dt->is_accept == 2) { ?>
                            <p class="text-grey mb-0" >Status: <span style="color: red">Your request rejected</span></p>
                            <?php } ?>
                        </div>  
                         <div class="col-lg-3 col-md-3 col-12 text-md-right pt-md-5"> 
                         <?php if($dt->is_accept == 1){?>
                          <a href="<?php echo $this->Url->build(["controller" => "Services","action" => "payment",'M',  base64_encode($dt->id)]);?>" class="btn btn-sm btn-danger">Pay</a>
                          <a href="<?php echo $this->Url->build(["controller" => "Services","action" => "cancelrequest",  base64_encode($dt->id)]);?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you would like to cancel this request ?');">Cancel</a>
                         <?php //}else if($dt->is_accept == 2) {?> 
<!--                          <a href="<?php echo $this->Url->build(["controller" => "Services","action" => "bookingdetails",  base64_encode($dt->id)]);?>" class="btn btn-sm btn-danger">Your request rejected</a>-->
                         <?php }else if($dt->is_accept != 2){ ?>

                             <a href="<?php echo $this->Url->build(["controller" => "Services","action" => "cancelrequest",  base64_encode($dt->id)]);?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you would like to cancel this request ?');">Cancel</a>
                             <?php } ?>
                             
                           <a href="javascript: select_friend_foot(<?php echo $dt->service->provider_id;?>)"  style="display: inline-block" class="btn btn-sm btn-primary text-capitalize rounded-0"> <div class="user userCurrent" data-id=<?php echo $dt->service->provider_id;?> style="color: #fff; "> <?php if($dt->service->provider_id){?> <span class="on_line on_<?php echo $dt->service->provider_id;?>" ><i class="" aria-hidden="true"></i></span><?php }else{ ?><span class="off_line off_<?php echo $dt->service->provider_id;?>"><i class="ion-chatbox" aria-hidden="true"></i></span><?php } ?>
                                chat
                            </div></a>  
                             
                        </div>                          
                    </div>
                    <?php } } ?>

        		<div class="paging">
                    <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center mt-5">
            		<?php
                      echo $this->Paginator->prev('&laquo;', array('tag' => 'li', 'escape' => false), '<a href="#" class="page-link">&laquo;</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
                      echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentLink' => true, 'currentClass' => 'page-item active', 'currentTag' => 'a'));
                      echo $this->Paginator->next('&raquo;', array('tag' => 'li', 'escape' => false), '<a href="#" class="page-link">&raquo;</a>', array('class' => 'prev disabled page-link', 'tag' => 'li', 'escape' => false));
            		?>
                    </ul>
                    </nav>
                
        		</div>
                </div>
            </div>
        </div>
    </div>
</section>
