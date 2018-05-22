<script type="text/javascript"> 
$(function() {
    $('span.stars').stars();
});
  		
$.fn.stars = function() {
	return $(this).each(function() {
		$(this).html($('<span />').width(Math.max(0, (Math.min(5, parseFloat($(this).html())))) * 16));
	});
}


</script>   
<section class="home-banner">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-10 ml-auto mr-auto text-center">
					
					
					<div class="home-search rounded">
						<form method="post" action="<?php echo $this->Url->build(["controller" => "services","action" => "result"]);?>">
						<input type="hidden" name="lat" id="lat" value="">
						<input type="hidden" name="long" id="long" value="">
						<div class="input-group">
							<input type="text" class="form-control venue-location" placeholder="Venue location" name="location" id="autocomplete" required="required">
							<span class="icon"><i class="ion-location"></i></span>
							<input type="text" class="form-control venue-name" placeholder="Venue name..." name="title">
						<div class="input-group-prepend">
							<button class="btn btn-primary" type="submit"><i class="ion-search"></i> Search</button>
						</div>						
						</div>
						</form>
					</div>
					<p class="mt-4 mb-0"><img src="<?php echo $this->request->webroot;?>images/banner-logo.png" alt="" class="img-fluid"></p>
					<h1 class="text-uppercase mt-4">find your Nearest venue</h1>
					<h6 class="mb-4">The easiest way to find and book your mid to long-term venue</h6>
				</div>
			</div>
		</div>
	</section>
	
	<section class="how-it text-center">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<h1 class="mb-5">How does it works</h1>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 mb-3">
					<div class="how-wrap pl-2 pr-2">
						<div class="how-image-holder"><img src="<?php echo $this->request->webroot;?>images/how-1.png" alt=""></div>
						<h5 class="mb-3">Look for Enchanting Nightlife</h5>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labor dolore magna aliqua</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 mb-3">
					<div class="how-wrap pl-2 pr-2">
						<div class="how-image-holder"><img src="<?php echo $this->request->webroot;?>images/how-2.png" alt=""></div>
						<h5 class="mb-3">Book Suitable Venue for You</h5>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labor dolore magna aliqua</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 mb-3">
					<div class="how-wrap pl-2 pr-2">
						<div class="how-image-holder"><img src="<?php echo $this->request->webroot;?>images/how-3.png" alt=""></div>
						<h5 class="mb-3">Easy Pay & Enjoy Crazy</h5>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labor dolore magna aliqua</p>
					</div>
				</div>
			</div>
		</div>
    </section>
    
    <section class="best-venue">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-12 col-md-12">
	    			<h1 class="text-center">Best Venues Near You</h1>
	    			<h5 class="text-center mb-5">Explore some of the best tips from around the world from our partners and friends.</h5>
	    		</div>
	    		<div class="col-lg-12 col-md-12 col-sm-12">
	    			<ul class="list-unstyled">
	    				<?php
	    					foreach ($services as $service) {	    						//pr($service);
	    						$rat = 0;
	    						$avgrat = 0;

	    					foreach ($service->ratings as $rating) {
	    							 $rat = ($rat+$rating->rating);
	    							 $avgrat = ($rat / count($service->ratings));
	    						}	

	    				?>
						<li>
							<div class="venue-image">
								<a href="<?php echo $this->Url->build(["controller" => "Services","action" => "details",$service->id]);?>">
								<img src="<?php echo $this->request->webroot;?>service_img/<?php echo $service->image;?>" alt="">
								</a>
								

								<div class="price">From: $<?php echo $service->price;?></div>
							</div>
							
                               
							<article>
								<h4 class="text-primary mb-1"><?php echo $service->service_name;?></h4>
								 <a href="javascript: favourite(<?php echo $service['id'];?>)" class="fab"><i class="ion-ios-heart" id="feb_<?php echo $service['id'];?>" <?php
                                echo ((isset($service->favourites[0]->service_id))? 'style="color: red;"' : '');?>></i></a>
								<p class="rating mb-1">
								<span class="stars"><?php echo $avgrat;?></span>
								(<?php echo count($service->ratings);?>)</p>
								<p class="mb-0"><i class="ion-location"></i> <?php echo $service->address;?></p>
							</article>
						</li>
						<?php
							}
						?>
						
					</ul>
	    		</div>
	    			
	    		
    		</div>
    	</div>
    </section>

	<section class="testimonial text-center">
		<div class="container">
	    	<div class="row">
	    		<div class="col-lg-8 col-md-9 ml-auto mr-auto">
	    			<h2 class="mb-4">What our client say</h2>
					<ul class="bxslider list-unstyled">
						<?php
							foreach ($testimonials as $testi) {	
							//pr($testi);							
						?>
						<li>
							<p class="text-center quote"><img src="<?php echo $this->request->webroot;?>images/quote.png" alt=""></p>
							<h4 class="mb-5"><?php echo $testi->description;?></h4>
							<div class="user-image mb-3"><img src="<?php echo $this->request->webroot;?>user_img/thumb_<?php echo (($testi->user->pimg != "")? $testi->user->pimg : 'default.png');?>" alt=""></div>
							<p class="text-uppercase"><?php echo $testi->user->full_name;?></p>
						</li>
						<?php
							}
						?>						
					</ul>
	    		</div>
	    	</div>
    	</div>
    </section>
   <script>     
      var placeSearch, autocomplete;   

      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['geocode']});   

             google.maps.event.addListener(autocomplete, 'place_changed', function() {
          var place = autocomplete.getPlace();
          var lat = place.geometry.location.lat();
          var lng = place.geometry.location.lng();
          $('#lat').val(lat);
          $('#long').val(lng);
        
        });     
      }

     
      function geolocate() { 
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) { 
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            
            autocomplete.setBounds(circle.getBounds());
          });
        }
      }
    </script>

 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCQ9hl89w8uiMND1-cnmkTVnqGh37TDvvk&libraries=places&callback=initAutocomplete"
        async defer></script>

<script type="text/javascript">
	
	function favourite(id){        
        $.ajax({
            method: "POST",
            url: base_url+"services/add_favourite",
            data: { id: id}
          })
          .done(function( data ) { 
             var obj = $.parseJSON(data);
             if(obj.Ack == 1){
                $('#feb_'+id).css("color", "red");
             }
             else{
                 $('#feb_'+id).css("color", "gray");
             }
          });
      }
</script>