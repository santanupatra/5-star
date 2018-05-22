<section class="user-dashboard">
	<div class="container">
		<div class="row">
            <?php echo ($this->element('side_menu'));?>
            <div class="col-lg-9 col-md-8">
				<div class="edit-pro p-3 p-lg-4">
					<h5 class="common-title mb-3 pb-2">Booking History</h5>
                    
                    <?php if($orders!=''){
                        foreach($orders as $ord){
                            
                            ?>
                            <div class="row product-list-row">
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <a href="<?php echo $this->Url->build(["controller" => "Services","action" => "details",$ord->service->id]);?>">
                            <?php if(isset($ord->service->image)) { ?>
                            <img src="<?php echo $this->Url->build('/service_img/'.$ord->service->image); ?>" alt="" class="img-fluid">
                            <?php }else{ ?>
                             <img src="<?php echo $this->Url->build('/service_img/default.png'); ?>" alt="" class="img-fluid">
                            <?php } ?>
                            </a>
                        </div>
                              <div class="col-lg-6 col-md-6 col-12">
                            <h5 class="w-100 float-left text-left"><?php echo $ord->service->service_name;?></h5>
                             <i class="fa fa-map-marker" aria-hidden="true"></i>
                             <span><?php echo $ord->service->address;?></span>
                            <p class="text-grey mb-0">Contact Person : <?php echo $ord->service->cp_fname." ".$ord->service->cp_lname;?></p>
                            <p class="text-grey mb-0">Contact No: <?php echo $ord->service->cp_phone;?></p>
                            <p class="text-grey mb-0">Date of Booking: <?php echo $ord->order_date;?></p>
                            <p class="text-grey mb-0">Amount Pay: <?php echo $ord->total_amount;?></p>
                            
         
                        </div> 
                        <div class="col-lg-3 col-md-3 col-12 text-md-right pt-md-5">              
                             <a href="<?php echo $this->Url->build(["controller" => "Services","action" => "bookingdetails",  $ord->id]);?>" class="btn btn-sm btn-danger">View</a>
                             
                            <a href="<?php echo $this->Url->build(["controller" => "Services","action" => "bookingdelete",  $ord->id]);?>" class="btn btn-sm btn-danger">Delete</a>
                             
                        </div>              
                    </div>

                       <?php  }
                       // print_r($orders);exit;
                        foreach ($orders as $dt){ 
                    
                        ?>
                    <!-- <div class="row product-list-row">
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <a href="<?php echo $this->Url->build(["controller" => "Services","action" => "details",$dt->service->id]);?>">
                            <?php if(isset($dt->service->image)) { ?>
                            <img src="<?php echo $this->Url->build('/service_img/'.$dt->service->image); ?>" alt="" class="img-fluid">
                            <?php }else{ ?>
                             <img src="<?php echo $this->Url->build('/service_img/default.png'); ?>" alt="" class="img-fluid">
                            <?php } ?>
                            </a>
                        </div> -->
                        <!-- <div class="col-lg-6 col-md-6 col-12">
                            <h5 class="w-100 float-left text-left"><?php echo $dt->service->service_name;?></h5>
                             <i class="fa fa-map-marker" aria-hidden="true"></i>
                             <span><?php echo $dt->service->address;?></span>
                            <p class="text-grey mb-0">Contact Person : <?php echo $dt->service->cp_fname." ".$dt->service->cp_lname;?></p>
                            <p class="text-grey mb-0">Contact No: <?php echo $dt->service->cp_phone;?></p>
                            <p class="text-grey mb-0">Date of Booking: <?php echo $dt->booking_date;?></p>
                            <p class="text-grey mb-0">Amount Pay: <?php echo $dt->price;?></p>
                            
         
                        </div>  --> 
                        <!--  <div class="col-lg-3 col-md-3 col-12 text-md-right pt-md-5">              
                             <a href="<?php echo $this->Url->build(["controller" => "Services","action" => "bookingdetails",  $dt->id]);?>" class="btn btn-sm btn-danger">View</a>
                             
                          <a href="javascript: select_friend_foot(<?php echo $dt->company->id;?>)"  style="display: inline-block" class="btn btn-primary text-capitalize btn-sm"> <div class="user userCurrent" data-id=<?php echo $dt->company->id;?> style="color: #fff; "> <?php if($dt->company->is_active==1){?> <span class="on_line on_<?php echo $dt->company->id;?>" ><i class="" aria-hidden="true"></i></span><?php }else{ ?><span class="off_line off_<?php echo $dt->company->id;?>"><i class="ion-chatbox" aria-hidden="true"></i></span><?php } ?>
                                chat now
                            </div></a>   
                             
                        </div>      -->                     
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
