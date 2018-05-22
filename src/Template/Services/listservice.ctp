    <section class="user-dashboard">
		<div class="container">
			<div class="row">
                <?php echo ($this->element('side_menu'));?>
                <div class="col-lg-9 col-md-8">
					<div class="edit-pro p-3 p-lg-4">
						<h5 class="common-title mb-3 pb-2">Event List</h5>
                        
                        <?php if($service!=''){foreach ($service as $dt){ ?>
                        <div class="row product-list-row">
                            <div class="col-lg-3 col-md-3 col-sm-12">

                                <?php if(isset($dt->image)) { ?>
                                <img src="<?php echo $this->Url->build('/service_img/'.$dt->image); ?>" alt="" class="img-fluid">
                                <?php }else{ ?>
                                 <img src="<?php echo $this->Url->build('/service_img/default.png'); ?>" alt="" class="img-fluid">
                                <?php } ?>
                            </div>
                            <div class="col-lg-5 col-md-6 col-12">
                                <h5><?php echo $dt['service_name'];?></h5>
                                 <i class="fa fa-map-marker" aria-hidden="true"></i>
                                 <span><?php echo $dt['address'];?></span>
                                <p class="text-grey"><?php  echo substr(base64_decode($dt['description']),0,100).'...';?></p>
                                <?php $cdate=date('Y-m-d H:i:s');
                                
                                if(date('Y-m-d H:i:s',strtotime($dt['end_time'])) >= $cdate){?>
                                <span style="color:green">Active</span>
                                <?php }else{ ?>
                                
                                <span style="color:red">Expired</span>
                                <?php } ?>
                            </div>
                            <div class="col-lg-4 col-md-3 col-12 text-md-right pt-md-5">
                                <?php if($dt['is_active']==1) {?>
                                <a href="<?php echo $this->Url->build(["controller" => "Services","action" => "servicestatus",$dt['id'],$dt['is_active']]);?>" onclick="return confirm('Are you sure you want to Deactive this service ?');" class="btn btn-sm btn-success">Active</a>
                                <?php }else{?>
                                <a href="<?php echo $this->Url->build(["controller" => "Services","action" => "servicestatus",$dt['id'],$dt['is_active']]);?>" onclick="return confirm('Are you sure you want to Active this service ?');" class="btn btn-sm btn-danger">Deactive</a>
                                <?php } ?>

                                <a href="<?php echo $this->Url->build(["controller" => "Services","action" => "editservice",$dt['id']]);?>" class="btn btn-sm btn-secondary">Edit</a>
                               
                                <a href="<?php echo $this->Url->build(["controller" => "Services","action" => "servicedelete",$dt['id']]);?>" onclick="return confirm('Are you sure you want to delete?');" class="btn btn-sm btn-danger">Delete</a>
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
