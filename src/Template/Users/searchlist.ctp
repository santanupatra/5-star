
<div class="clearfix"></div>

<section class="cus_section">
	<div class="cus-bg">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h1 class="text-center">Our Services</h1>
				</div>
			</div>
		</div>
	</div>
</section>
<div class="clearfix"></div>

<section class="service-section">
	<div class="container">
		<div class="service-topdiv">
			<div class="row">
				<div class="col-md-4">
					<h4><?php echo count($allservices);?> Results</h4>
				</div>

				<div class="col-md-8">
					<form action="#" class="form-inline text-right">
					  <div class="form-group">
						<select class="form-control input-sm">
						  <option selected="selected">Sort By</option>
						  <option value="3">3</option>
						  <option value="4">4</option>
						</select>
					  </div>

					  <div class="form-group">
						<select class="form-control input-sm">
						  <option selected="selected">Highest to Lowest</option>
						  <option value="1">1</option>
						  <option value="2">2</option>
						</select>
					  </div>

					  <div class="form-group">
						<select class="form-control input-sm">
						  <option selected="selected">Lowest to Highest</option>
						  <option value="3">3</option>
						  <option value="4">4</option>
						</select>
					  </div>
				
					  <a href="#" class="btn btn-default btn-sm new_select" data-toggle="tooltip" data-placement="top" title="Grid View" 
					  id="grid">
					  	<i class="fa fa-th-large"></i>
					  </a>	

					  <a href="#" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top" title="List View"
					  id="list">
					  	<i class="fa fa-list"></i>
					  </a>
					</form>
				</div>
			</div>
		</div>


		<div class="srvc-innerdiv" id="products">
                    
                    
                    
                <?php if(!empty($allservices)){
                    
                    foreach($allservices as $dt){
                    
                    ?>    
                    
                    
	        <div class="item col-xs-12 col-sm-12 col-md-3">
	            <div class="thumbnail">
	            	<div class="sv-imgdiv">
                            <?php if($dt['details']['image_name']!=""){?>
	                	<img class="group list-group-image "  src="<?php echo $this->request->webroot;?>user_img/<?php echo $dt['details']['image_name'];?>" alt="" width="253px" height="204px"/>
                            <?php }else{ ?>
                                
                            <img class="group list-group-image "  src="<?php echo $this->request->webroot;?>user_img/car_default.png" width="253px" height="204px" alt="" />    
                                
                                
                            <?php } ?>
	                </div>	
        			<div class="caption">
                                        <h5>"<?php if($dt['price'][0]['mp']!="" || $dt['price'][0]['mxp']!=""){ echo ('$'.$dt['price'][0]['mp'].'-'.'$'.$dt['price'][0]['mxp']);}else { ?> <?php echo ('$0-$0');} ?>" </h5>
 						<h5><?php echo $dt['details']['service_name']?>
							<span>
								<div><span class="stars"><?php if($dt['rating'][0]['avr']!=''){echo $dt['rating'][0]['avr'];}else{ echo 0; }?></span></div>
<!--								<span>(<?php echo $dt['rating'][0]['avr']?>)</span>-->
							</span> 							
 						</h5>

 						<h5> Working Hours : <?php echo ($dt['details']['working_hours_from'].'-'.$dt['details']['working_hours_to']);?>
							<a href="#" class="btn-sm btn"><i class="fa fa-arrow-down"></i> More Details</a>
 						</h5>

 						<h5> Working Days :  <br>
                                                    
                                                    <?php $wd=explode(',',$dt['details']['working_days']);
                                                            foreach($wd as $w){ ?>
								<span class="label label-default"><?php echo $w;?></span>
                                                            <?php } ?>
                                                    
 						</h5>

        			</div>
	            </div>
	        </div>
                    
                <?php } }else{ ?>
                    
                    <div class="item col-xs-12 col-sm-12 col-md-12">
                        
                       Sorry! No results found. 
                    </div>  
                    
                <?php } ?>



		</div>
	</div>
</section>
<div class="clearfix"></div>



<!--<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>-->

<style>
   .form-horizontal .control-label {
	text-align: left;
    }
    
    
    span.stars, span.stars span {
    display: block;
    background: url(../image/stars.png) 0 -16px repeat-x;
    width: 80px;
    height: 16px;
}

span.stars span {
    background-position: 0 0;
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

<script>
	$(document).ready(function() {
    $('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});
    $('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
});
</script>	
