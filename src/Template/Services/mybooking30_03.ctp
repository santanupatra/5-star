<section class="user-dashboard">
	<div class="container">
		<div class="row">
            <?php echo ($this->element('side_menu'));?>
            <div class="col-lg-9 col-md-8">
				<div class="edit-pro p-3 p-lg-4">
					<h5 class="common-title mb-3 pb-2">My Booking</h5>
                    
                    <?php if($service!=''){foreach ($service as $dt){ 
                     
                        ?>
                    <div class="row product-list-row">
                        <div class="col-lg-3 col-md-3 col-4">
                            <a href="<?php echo $this->Url->build(["controller" => "Services","action" => "details",$dt->service->id]);?>">
                            <?php if(isset($dt->service->image)) { ?>
                            <img src="<?php echo $this->Url->build('/service_img/'.$dt->service->image); ?>" alt="" class="img-fluid">
                            <?php }else{ ?>
                             <img src="<?php echo $this->Url->build('/service_img/default.png'); ?>" alt="" class="img-fluid">
                            <?php } ?>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <h5><?php echo $dt->service->service_name;?></h5>
                             <i class="fa fa-map-marker" aria-hidden="true"></i>
                             <span><?php echo $dt->service->address;?></span>
                            <p class="text-grey">Contact No: <?php echo $dt->service->cp_phone;?></p>
                            
         
                        </div>  
                         <div class="col-lg-3 col-md-3 col-12 text-md-right pt-md-5">              
                             <a href="<?php echo $this->Url->build(["controller" => "Services","action" => "bookingdetails",  $dt->id]);?>" class="btn btn-sm btn-danger">View</a>
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
