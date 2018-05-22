<div class="clearfix"></div>

<section class="si-sectiondiv">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3>Provider Name <span><?php echo $result['user']['full_name'];?></span></h3>
			</div>
		</div>

		<div class="si-sliderdiv">
			<div class="row">
				<div class="col-md-8">
					<div id="myCarousel" class="carousel slide" data-ride="carousel">
					    <!-- Indicators -->
					    <ol class="carousel-indicators">
                                                <?php //pr($serviceimages);
                                                $i=0;
                                                foreach($serviceimages as $dt){?>
					      <li data-target="#myCarousel" data-slide-to="<?php echo $i;?>" class="active"></li>
                                              <?php $i++;} ?>
<!--					      <li data-target="#myCarousel" data-slide-to="1"></li>
					      <li data-target="#myCarousel" data-slide-to="2"></li>-->
					    </ol>

					    <!-- Wrapper for slides -->
					    <div class="carousel-inner">
                                                
                                               
                                                <?php //pr($serviceimages);
                                                $i=0;
                                                foreach($serviceimages as $dt){?>
                                                
                                              <div class="item <?php if($i==0){?> active <?php } ?>">
					        <img src="<?php echo $this->Url->build('/user_img/'.$dt['image_name']); ?>" alt="" style="width:100%; height: 400px">
					      </div>
                                              <?php $i++;} ?>
<!--					      <div class="item">
					        <img src="images/chicago.jpg" alt="" style="width:100%;">
					      </div>
					    
					      <div class="item">
					        <img src="images/ny.jpg" alt="" style="width:100%;">
					      </div>-->
					    </div>

					    <!-- Left and right controls -->
					    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
					      <span class="glyphicon glyphicon-chevron-left"></span>
					      <span class="sr-only">Previous</span>
					    </a>
					    <a class="right carousel-control" href="#myCarousel" data-slide="next">
					      <span class="glyphicon glyphicon-chevron-right"></span>
					      <span class="sr-only">Next</span>
					    </a>
					  </div>
					</div>	

					<div class="col-md-4">
						<div class="si-rightdiv">
							<div class="div">
								<a  class="btn a2 text-center">
									<i class="fa fa-info-circle"></i>
								Information</a>

								<span class="text-uppercase">
<!--									<i class="fa fa-dollar"></i> Price-->
								</span>
							</div>

							<div class="div">
								<h5>Recent Reviews</h5>
                                                                
                                                                <?php if(!empty($reviewer)){
                                                                    
                                                                    foreach($reviewer as $dt){
                                                                    ?>
								<div class="media">
									<div class="media-left">
                                                                            <?php if($dt['user']['pimg']!=""){?>
                                                                            <img src="<?php echo $this->Url->build('/user_img/'.$dt['user']['pimg']); ?>" alt="" width="44px" height="43px">
                                                                            <?php }else{ ?>
                                                                
                                                                <img src="<?php echo $this->Url->build('/user_img/default.png'); ?>" alt="">
                                                                            <?php } ?>
									</div>
									<div class="media-body"> 
										<p class="h6">
                                                                                    <?php echo $dt['review'];?><br>
											<span class="stars_dr"><?php if($dt['rating']!=''){echo $dt['rating'];}else{ echo 0;}?></span>
										</p>
									</div>
								</div>
                                                                <?php } }else{ ?>
                                                                
                                                                <div class="media">
                                                                    Sorry! No review found.
                                                                </div>
                                                                
                                                                <?php } ?>
<!--								<div class="media">
									<div class="media-left">
										<a href="#"><img src="images/si2.jpg" alt=""></a>
									</div>
									<div class="media-body"> 
										<p class="h6">Lorem ipsum dolor sit amet, consectetur adipiscing elit. <br>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star-half-o"></i></a>
										</p>
									</div>
								</div>-->
							</div>

							<div class="div">
								<h5>Working Hours</h5>
								<h6 class="h5"><i class="fa fa-clock-o"></i> <strong><?php echo $workingdays->working_hours_from.' - '.$workingdays->working_hours_to?></strong></h6>
							</div>

							<div class="div">
								<h5>Working Days</h5>
                                                        <?php 
                                                            $wdays=explode(',',$workingdays->working_days);
                                                            foreach($wdays as $dt){ ?>
                                                                    <span class="label label-default"><?php echo $dt;?></span>
                                                             <?php } ?>   

							</div>

							<div class="div">
								<h5>Share this Service</h5>
								<h6 class="h4">
									<a href="#"><i class="fa fa-facebook-official"></i></a>
									<a href="#"><i class="fa fa-linkedin-square"></i></a>
								</h6>
							</div>							
						</div>	
					</div>				
				</div>
			</div>

			<div class="si-abp-section">
				<div class="row">
					<div class="col-md-12">
						<h5>About Provider :</h5>	
						<p class="h6">
							<?php echo $result['user']['description'];?>
						</p>
					</div>
				</div>
			</div>

			<div class="si-oursrvcdiv">
				<div class="row">
					<div class="col-md-12">
						<h3>Other <span>Services</span></h3>
					</div>
				</div>	
				
				<div class="row">
					<div class="col-md-8">
						<div class="si-oursrvc-leftdiv">
                                                    
                                                    
                                                    <?php if($servicetypes){
                                                        
                                                        foreach($servicetypes as $dt){
                                                        ?>
                                                    
							<div class="orsvc-div">
								<div class="row">
									<div class="col-md-10">
										<h6 class="text-capitalize h5"><?php echo $dt['service_type']['type_name']?></h6>
									</div>

									<div class="col-md-2">
										<a class="btn center-block">
											<i class="fa fa-dollar"></i> <?php echo ($dt['min_price'].' - '.$dt['max_price']);?>
										</a>
									</div>
								</div>
							</div>
                                                    
                                                        <?php } }else{ ?>
                                                    <div class="orsvc-div">
                                                        <div class="row">
                                                            <div class="col-md-10">
                                                         Sorry! No other services found.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <?php } ?>

						</div>
					</div>

					<div class="col-md-4">
						<div class="r-servcdiv">
							<h5 class="text-center">Related services</h5>
							<div class="rvew-div">
                                                            
                                                            <?php if(!empty($related_services)){
                                                                
                                                                foreach($related_services as $dt){
                                                                ?>
								<div class="media">
									<div class="media-left">
                                                                            <a href="<?php echo $this->Url->build(["controller" => "Users","action" => "servicedetails",$dt['id']]);?>"><img src="<?php echo $this->Url->build('/user_img/'.$serviceimages[0]['image_name']); ?>" alt="" width="141px" height="80px" ></a>
									</div>
									<div class="media-body">
										<h4 class="media-heading h4 text-uppercase"><?php echo $dt['service_name'];?>
                                                                                        <span class="fa fa-dollar"><?php if($dt['mp']!=''){echo $dt['mp'];}else{echo 0; }?></span>
										<span class="stars_dr"><?php if($dt['avg']!=''){echo $dt['avg'];}else{ echo 0;}?></span>	
										</h4>
									</div>
								</div>

                                                                <?php } }else{ ?>
                                                            <div class="media">
                                                                Sorry! No related product found.
                                                            </div>
                                                            
                                                            <?php } ?>


							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>
	</div>
</section>
<div class="clearfix"></div>

<style>
   .form-horizontal .control-label {
	text-align: left;
    }
    
    
    span.stars_dr, span.stars_dr span {
    display: block;
    background: url(../../image/stars.png) 0 -16px repeat-x;
    width: 80px;
    height: 16px;
}

span.stars_dr span {
    background-position: 0 0;
}
    
    
</style>
<script>
$.fn.stars_dr = function() {
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
    $('span.stars_dr').stars_dr();
});

</script>