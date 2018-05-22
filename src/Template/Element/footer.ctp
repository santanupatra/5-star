<footer>
<script type="text/javascript">
$('document').ready(function(){
	$('#blah').hide();
	$('#cls').click(function(){
		$('#img_file').click();
	});
});
	function readURL(input) {
		$('#blah').show();
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(100)
                    .height(100);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
    	<section class="footer-top">
    		<div class="container">
		    	<div class="row">
		    		<div class="col-lg-12">
		    			<ul class="d-flex list-unstyled">
		    			<!-- <li>
		    				<div id="cls">click</div>
		    				<input type='file' id="img_file" onchange="readURL(this);" style="display:none;"/>
    <img id="blah" src="#" alt="your image" />
		    			</li> -->
							<li>
								<h5>About Us</h5>
								<a href="<?php echo $this->Url->build(["controller" => "contents", "about-us"]); ?>" class="footer-links">About us</a>
								<a href="<?php echo $this->Url->build(["controller" => "contents", "work-with-us"]); ?>" class="footer-links">Work with us</a>
								<a href="<?php echo $this->Url->build(["controller" => "contents", "sitemap"]); ?>" class="footer-links">Sitemap</a>

								<!-- <a href="<?php echo $this->Url->build(["controller" => "contents", "partners"]); ?>" class="footer-links">Partners</a>								
								<a href="<?php echo $this->Url->build(["controller" => "contents", "internship"]); ?>" class="footer-links">Internships</a>								
								<a href="<?php echo $this->Url->build(["controller" => "contents", "all-rent-units"]); ?>" class="footer-links">All rentable units</a> -->
							</li>
							<li>
								<h5>Tenants</h5>
								<a href="<?php echo $this->Url->build(["controller" => "contents", "how-it-works"]); ?>" class="footer-links">How it works</a>
								<a href="<?php echo $this->Url->build(["controller" => "contents", "terms-and-condition"]); ?>" class="footer-links">Terms and conditions</a>
								<a href="<?php echo $this->Url->build(["controller" => "contents", "privacy-policy"]); ?>" class="footer-links">Privacy policies</a>

								<!-- <a href="<?php echo $this->Url->build('/blog'); ?>" class="footer-links">Blog</a>
								<a href="<?php echo $this->Url->build(["controller" => "contents", "promotion"]); ?>" class="footer-links">Promotion</a>								
								<a href="<?php echo $this->Url->build(["controller" => "contents", "cookies-policy"]); ?>" class="footer-links">Cookies policy</a> -->
								
							</li>
							<li>
								<h5>Venue Seeker</h5>
								<a href="<?php echo $this->Url->build(["controller" => "contents", "publish-your-venue"]); ?>" class="footer-links">Publish your venue</a>
								<a href="<?php echo $this->Url->build(["controller" => "contents", "help"]); ?>" class="footer-links">Help</a>
								<!-- <a href="<?php echo $this->Url->build(["controller" => "contents", "get-the-app"]); ?>" class="footer-links">Get the app</a> -->
								<a href="<?php echo $this->Url->build(["controller" => "Users","action" => "contactus"]);?>" class="footer-links">Contact us</a>
							</li>
							<li>
								<h5>Contact Info</h5>
								<p class="contact">Customer support<br>+1 888-123-4567<br>hello@rentaroom.com</p>
							</li>
							<li class="social-links">
                                                            <h5>Available on</h5>
								<!-- <p><img src="<?php echo $this->request->webroot;?>images/available.png" alt="" class="img-fluid"></p> -->
								<h5>We accept: <span><img src="<?php echo $this->request->webroot;?>images/cards.png" alt=""></span></h5>
							</li>
						</ul>
		    		</div>
		    	</div>
    		</div>
    	</section>
		<section class="footer-bottom py-3">
			<div class="container">
		    	<div class="row">
		    		<div class="col-lg-12 col-md-12 col-sm-12">
		    			<ul>
		    				<li><a target="_blank" href="<?php echo $SiteSettings['facebook_url']; ?>" style="background: #39478b"><i class="ion-social-facebook"></i></a></li>
		    				<li><a target="_blank" href="<?php echo $SiteSettings['twitter_url']; ?>" style="background: #61d2fc"><i class="ion-social-twitter"></i></a></li>
		    				<li><a target="_blank" href="<?php echo $SiteSettings['gplus_url']; ?>" style="background: #f33a09"><i class="ion-social-googleplus"></i></a></li>
		    				<li><a target="_blank" href="<?php echo $SiteSettings['instagram_url']; ?>" style="background: #506471"><i class="ion-social-instagram"></i></a></li>
		    			</ul>
		    			<p class="copyright my-2 mb-0">Copyright &copy; 2018 companyname. All rights reserved</p>
		    		</div>
		    	</div>
	    	</div>
    	</section>



    </footer>
