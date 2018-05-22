

<div class="clearfix"></div>

<section class="cus_section">
	<div class="cus-bg">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1 class="text-center">reviews</h1>
				</div>
			</div>
		</div>
	</div>
</section>
<div class="clearfix"></div>

<section class="review-section">
	<div class="container">
		<div class="revw-topdiv">
			<div class="row">
				<div class="col-md-7">
					<h2 class="text-capitalize">Latest Reviews</h2>
				</div>
				<div class="col-md-5">
					<div class="revw-formdiv text-right">
<!--						<form action="#" class="form-inline">
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
						</form>-->
					</div>
				</div>
			</div>
		</div>

		<div class="revw-bottomdiv">
                    
                    
                    
                    <?php if(!empty($allreview)){
                        //pr($allreview);
                        foreach($allreview as $dt){
                        ?>
			<div class="row">
				<div class="col-md-12">
					<div class="revw-innerdiv bg-gray">
						<div class="media">
						  <div class="media-left">
						    <a href="#">
						      <img class="media-object" src="<?php echo $this->request->webroot;?>user_img/<?php echo $dt['user']['pimg']?>" alt="" class="center-block" width="89px" height="89px">
						    </a>
						  </div>
						  <div class="media-body">
						    <h4 class="media-heading"><?php echo $dt['user']['full_name']?>
						    	<span>2 hrs ago</span>
						    </h4>
							<p><?php echo $dt['review']?><br>
							<a href="services.html" class="text-capitalize">click Here</a>	
							<!--<span>Rating:-->
								<div><span class="stars"><?php if($dt['rating']!=''){echo $dt['rating'];}else{ echo 0; }?></span></div>
							<!--</span>-->  
							</p>
						  </div>
						</div>
					</div>
				</div>
			</div>
                    
                    <?php } } ?>

<!--			<div class="row">
				<div class="col-md-12">
					<div class="revw-innerdiv bg-gray">
						<div class="media">
						  <div class="media-left">
						    <a href="#">
						      <img class="media-object" src="images/rv.png" alt="" class="img-responsive center-block">
						    </a>
						  </div>
						  <div class="media-body">
						    <h4 class="media-heading">John Doe
						    	<span>2 hrs ago</span>
						    </h4>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. <br> Lorem Ipsum is simply dummy text of the printing and typesetting industry. <br>
							<a href="services.html" class="text-capitalize">click Here</a>	
							<span>Rating:
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-half-o"></i>
								<i class="fa fa-star-o"></i>
							</span>  
							</p>
						  </div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="revw-innerdiv bg-gray">
						<div class="media">
						  <div class="media-left">
						    <a href="#">
						      <img class="media-object" src="images/rv.png" alt="" class="img-responsive center-block">
						    </a>
						  </div>
						  <div class="media-body">
						    <h4 class="media-heading">John Doe
						    	<span>2 hrs ago</span>
						    </h4>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. <br> Lorem Ipsum is simply dummy text of the printing and typesetting industry. <br>
							<a href="services.html" class="text-capitalize">click Here</a>	
							<span>Rating:
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-half-o"></i>
								<i class="fa fa-star-o"></i>
							</span>  
							</p>
						  </div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="revw-innerdiv bg-gray">
						<div class="media">
						  <div class="media-left">
						    <a href="#">
						      <img class="media-object" src="images/rv.png" alt="" class="img-responsive center-block">
						    </a>
						  </div>
						  <div class="media-body">
						    <h4 class="media-heading">John Doe
						    	<span>2 hrs ago</span>
						    </h4>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. <br> Lorem Ipsum is simply dummy text of the printing and typesetting industry. <br>
							<a href="services.html" class="text-capitalize">click Here</a>	
							<span>Rating:
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-half-o"></i>
								<i class="fa fa-star-o"></i>
							</span>  
							</p>
						  </div>
						</div>
					</div>
				</div>
			</div>-->
		</div>
            <div class="paginator">
                <ul class="pagination">
            <?php echo $this->Paginator->prev('< ' . __('previous')) ?>
            <?php echo $this->Paginator->numbers(array('separator' => '')) ?>
            <?php echo $this->Paginator->next(__('next') . ' >') ?>
                </ul>
                <p><?php //echo $this->Paginator->counter() ?></p>
            </div>
	</div>
</section>
<div class="clearfix"></div>

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