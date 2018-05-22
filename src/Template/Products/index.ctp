<?php ?>
<!DOCTYPE HTML>

	<section class="details-top">
		<div class="container">
			<ul class="bredcumb">
				<li><a href="<?php echo $this->Url->build('/'); ?>">Home</a></li>
				<li class="active"><a href="">Product or Service name</a></li>
			</ul>
		</div>
	</section>
	
	<section class="details-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="cards">
						<div class="card-box">
							<div class="row">
								<div class="col-md-5 col-sm-6">
									<div class="product-img-box">
                                      <?php echo($this->Html->image('/productimg/'.$product->Productimages[0]->image, array('alt' => $product->title)));?>
									</div>
									<ul class="thumb-gallery">
                                       <?php
                                            foreach ($product->Productimages as $img)
                                            {
                                            ?>
                                        <li>
                                            
                                        <?php echo($this->Html->image('/productimg/'.$img->image, array('alt' => $product->title)));?>

                                            
                                        </li>
                                            <?php }?>
									</ul>
								</div>
								<div class="col-md-7 col-sm-6">
									<div class="right-prod-info">
										<h2><?php echo $product->title ?></h2>
										<?php
                                        	echo $product->description;
                                        ?>
										<h3 class="price margin-bot-20">Price: <span>$<?php echo number_format($product->price, 2, ',', ' ');?></span></h3>
										<p><a href="<?php echo $this->Url->build('/'); ?>products/payment" class="btn btn-primary btn-lg">Order Now</a></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</section>
	

<script>
	$(document).ready(function() {
		$('.thumb-gallery > li > img').click(function() {					
			$('.product-img-box>img').attr('src',$(this).attr('src'));
		});
	}); 
</script>
<?php echo $this->Html->script('classie', array('inline' => false));?>
<!-- js -->
<script>
    function init() {
        window.addEventListener('scroll', function(e){
            var distanceY = window.pageYOffset || document.documentElement.scrollTop,
                shrinkOn = 300,
                header = document.querySelector("header");
            if (distanceY > shrinkOn) {
                classie.add(header,"smaller");
            } else {
                if (classie.has(header,"smaller")) {
                    classie.remove(header,"smaller");
                }
            }
        });
    }
    window.onload = init();
</script>
