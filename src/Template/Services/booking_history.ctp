<?php
    //pr($service);
?>
<section class="user-dashboard">
	<div class="container">
		<div class="row">
            <?php echo ($this->element('side_menu'));?>
            <div class="col-lg-9 col-md-8">
				<div class="edit-pro p-3 p-lg-4">
					<h5 class="common-title mb-3 pb-2 justify-content-between d-flex"><span>Sales History</span> <span>Total Amount: <?php echo $total[0]['t'];?></span></h5>
                                        
                   
                    <?php $totalamount = 0; if($service!=''){foreach ($service as $dt){
                        
                        $totalamount= $totalamount + $dt->price ;
                        ?>
                                        
                    <div class="row product-list-row">
                        <div class="col-lg-3 col-md-3 col-sm-12">

                            <?php if(isset($dt->service->image)) { ?>
                            <img src="<?php echo $this->Url->build('/service_img/'.$dt->service->image); ?>" alt="" class="img-fluid">
                            <?php }else{ ?>
                             <img src="<?php echo $this->Url->build('/service_img/default.png'); ?>" alt="" class="img-fluid">
                            <?php } ?>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <h5><?php echo $dt->service->service_name;?></h5>
                             <i class="fa fa-map-marker" aria-hidden="true"></i>
                             <span><?php echo $dt->service->address;?></span>
                            <p class="text-grey">Contact: <?php echo $dt->user->phone;?></p>
                            <p class="text-grey">Event Date: <?php echo $dt->service->start_time;?> to <?php echo $dt->service->end_time;?></p>
                            
         
                        </div>
                         <div class="col-lg-3 col-md-3 col-12 text-md-right pt-md-5">                                                 <a href="<?php echo $this->Url->build(["controller" => "Services","action" => "salesdetails", $dt->id]);?>" class="btn btn-sm btn-danger">View</a>
                             <!-- <a href="<?php echo $this->Url->build(["controller" => "Services","action" => "salesdelete", $dt->id]);?>" class="btn btn-sm btn-danger" onclick="return deleteConfirm('Are you sure you want to delete?');">Delete</a> -->
                             
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

<script language="javascript" type="text/javascript">

    function deleteConfirm()
    {
        var x = window.confirm("Are you sure you want to delete this?")
        if (x)
        {
            return true;
        }
        else
        {
            return false;
        }
        return false;
    }
</script>