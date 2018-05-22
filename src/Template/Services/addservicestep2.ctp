	<section class="user-dashboard">
		<div class="container">
			<div class="row">
				<?php echo $this->element('side_menu');?>
				<div class="col-lg-9 col-md-8">
					<div class="edit-pro p-3 p-lg-4">
						<h5 class="common-title mb-3 pb-2">Add Venue</h5>
						<div class="row mb-5">
							<div class="col-lg-10 ml-auto mr-auto">
								<div class="step-holder d-flex justify-content-between">
									<div class="round rounded-circle text-uppercase active"><span>Basic Info</span></div>
									<div class="round rounded-circle text-uppercase active"><span>VENUE DETAILS</span></div>
									<div class="round rounded-circle text-uppercase"><span>INSERT PHOTOS</span></div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-10">
								<form method="post" action="<?php echo $this->Url->build(["controller" => "Services","action" => "addservicestep2",$service->id]);?>" enctype='multipart/form-data'>
									<h5 class="mt-5 mb-4">Location</h5>
									<div class="form-group row">
										<label for="staticEmail" class="col-sm-4 col-form-label">Venue Address:</label>
										<div class="col-sm-8">
                                            <input type="text" class="form-control" id="autocomplete" name="address" value="<?php echo $service->address; ?>" onFocus="geolocate()" required="">
										</div>
									</div>
                                                                        
                              <input  type="hidden" value="<?php echo $service->latitude; ?>" id="lat" name="latitude" />
                              <input  type="hidden" value="<?php echo $service->longitude; ?>" id="long" name="longitude" /> 
                                                                        
                                                                        
									<!-- <div class="form-group row">
										<div class="col-sm-12">
											<iframe width="100%" height="300px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?hl=en&amp;ie=UTF8&amp;ll=37.0625,-95.677068&amp;spn=56.506174,79.013672&amp;t=m&amp;z=4&amp;output=embed"></iframe>
										</div>
									</div> -->
									<h5 class="mt-5 mb-4">Pricing</h5>
									<div class="form-group row">
										<label for="staticEmail" class="col-sm-4 col-form-label">Minimum Price:</label>
										<div class="col-sm-8">
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1">USD</span>
												</div>
                                                    <input type="text" class="form-control mb-0" name="price" value="<?php echo $service->price; ?>" required="">
											</div>
										</div>
									</div>
									<div class="form-group row">
										<label for="staticEmail" class="col-sm-4 col-form-label">Minimum Price:</label>
										<div class="col-sm-8">
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1">EUR</span>
												</div>
                                                    <input type="text" class="form-control mb-0" name="eur_price" value="<?php echo $service->eur_price; ?>" required="">
											</div>
										</div>
									</div>
									<div class="form-group row">
										<label for="staticEmail" class="col-sm-4 col-form-label">Minimum Price:</label>
										<div class="col-sm-8">
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1">COP</span>
												</div>
                                                    <input type="text" class="form-control mb-0" name="cop_price" value="<?php echo $service->cop_price; ?>" required="">
											</div>
										</div>
									</div>
									<?php
									//echo($service->start_time);
									//	echo $start_date=date_create($service->strat_time); exit;
										//$end_date=date_create($service->end_time);								
									?>
									<h5 class="mt-5 mb-4">Timing</h5>
									<div class="form-group row">
										<label for="staticEmail" class="col-sm-2 col-form-label">Start Date:</label>
										<div class="col-sm-4">
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1"><i class="ion-clock"></i></span>
												</div>
												<!-- <input type="text" class="form-control" name="start_time" value="<?php echo $service->start_time; ?>" id="timepicker"> -->
												<!--  <div class="controls input-append date form_startdate" data-date="2018-09-16T05:25:07Z" data-date-format="dd MM yyyy " data-link-field="start_time">
								                    <input class="form-control" type="text" value="<?php echo date_format($start_date,"d F Y ");?>" readonly>
								                    <span class="add-on"><i class="icon-remove"></i></span>
													<span class="add-on"><i class="icon-th"></i></span>
								                </div> -->
								                <input type="text" name="start_date" value="<?php echo (($service->start_time != '') ? date('Y-m-d',strtotime($service->start_time)) : date('Y-m-d'));?>" class="form-control date left mb-0" id="datetimepicker" placeholder="Start date." required/>

												<!-- <input type="hidden" id="start_time" name="start_time" value="<?php echo date_format($start_date,"Y-m-d"); ?>" /> -->
											</div>
										</div>
										<label for="staticEmail" class="col-sm-2 col-form-label">Start Time:</label>
										<div class="col-sm-4">
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1"><i class="ion-clock"></i></span>
												</div>
												<!-- <input type="text" class="form-control" name="start_time" value="<?php echo $service->start_time; ?>" id="timepicker"> -->
												 <!-- <div class="controls input-append date form_starttime" data-date="2018-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="start_time">
								                    <input class="form-control" type="text" value="<?php echo date_format($start_date,"d F Y - g:i A");?>" readonly>
								                    <span class="add-on"><i class="icon-remove"></i></span>
													<span class="add-on"><i class="icon-th"></i></span>
								                </div> -->
								                <input type="text" name="start_time1" value="<?php echo date('h:i A',strtotime($service->start_time));?>"  class="form-control date left mb-0" id="starttime" placeholder="Start time." required/>


											



												<!-- <input type="hidden" id="start_time" name="start_time" value="<?php echo date_format($start_date,"Y-m-d H:i:s"); ?>" /> -->
											</div>
										</div>
									</div>


									<!-- <div class="control-group">
						                <label class="control-label">DateTime Picking</label>
						                <div class="controls input-append date form_datetime" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
						                    <input size="16" type="text" value="" readonly>
						                    <span class="add-on"><i class="icon-remove"></i></span>
											<span class="add-on"><i class="icon-th"></i></span>
						                </div>
										<input type="text" id="dtp_input1" value="" /><br/>
						            </div> -->




									<div class="form-group row">





										<label for="staticEmail" class="col-sm-2 col-form-label">End Date:</label>
										<div class="col-sm-4">
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1"><i class="ion-clock"></i></span>
												</div>
												<!-- <input type="text" value="<?php echo $service->end_time; ?>" class="form-control" name="end_time" id="timepicker1"> -->
												
												 <!-- <div class="controls input-append date form_enddate" data-date="2018-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="end_time">
								                    <input class="form-control" type="text" value="<?php echo date_format($end_date,"d F Y - g:i A");?>" readonly>
								                    <span class="add-on"><i class="icon-remove"></i></span>
													<span class="add-on"><i class="icon-th"></i></span>												
								                </div> -->
								                <input type="text" name="end_date" value="<?php echo (($service->end_date != '') ? date('Y-m-d',strtotime($service->end_date)) : date('Y-m-d'));?>" class="form-control date left mb-0" id="enddatetimepicker" placeholder="End date." required/>


												



								               <!--  <input type="hidden" id="end_time" name="end_time" value="<?php echo date_format($end_date,"Y-m-d H:i:s"); ?>" /> -->
											</div>
										</div>
										<label for="staticEmail" class="col-sm-2 col-form-label">End Time:</label>
										<div class="col-sm-4">
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1"><i class="ion-clock"></i></span>
												</div>
												<!-- <input type="text" value="<?php echo $service->end_time; ?>" class="form-control" name="end_time" id="timepicker1"> -->
												
												<!--  <div class="controls input-append date form_enddate" data-date="2018-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="end_time">
								                    <input class="form-control" type="text" value="<?php echo date_format($end_date,"d F Y - g:i A");?>" readonly>
								                    <span class="add-on"><i class="icon-remove"></i></span>
													<span class="add-on"><i class="icon-th"></i></span>												
								                </div> -->
								                <input type="text" name="end_time1" value="<?php echo date('h:i A',strtotime($service->end_time));?>" class="form-control date left mb-0" id="endtime" placeholder="End time." required/>

											<!-- <input type="text" name="start_date" value="<?php echo date_format($start_date,"d F Y ");?>" class="form-control date left" id="datetimepicker" placeholder="Start date." required/> -->





								               <!--  <input type="hidden" id="end_time" name="end_time" value="<?php echo date_format($end_date,"Y-m-d H:i:s"); ?>" /> -->
											</div>
										</div>
									</div>
									
									<h5 class="mt-5 mb-4">Occupancy</h5>
									<div class="form-group row">
										<label for="staticEmail" class="col-sm-4 col-form-label">Max Occupancy:</label>
										<div class="col-sm-8">
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1">Max occupancy</span>
												</div>
												<input type="text" class="form-control mb-0" name="max_occupancy" value="<?php echo $service->max_occupancy; ?>">
											</div>
										</div>
									</div>
									<div class="form-group row">
										<label for="staticEmail" class="col-sm-4 col-form-label">Square Footage:</label>
										<div class="col-sm-8">
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1">Square Footage</span>
												</div>
                                                 <input type="text" class="form-control mb-0" name="square_footage" value="<?php echo $service->square_footage; ?>">
											</div>
										</div>
									</div>
									<?php $events=explode(',',$service->event_id)?>
									<h5 class="mt-4 mb-4">Venue Features</h5>
									<h6>Type of event</h6>
									<ul class="list-unstyled d-flex event-type-list flex-wrap">
									<?php foreach($eventname as $dt)
                                            { ?>	
                                                                            
                                                                            <li>
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="customCheck<?php echo $dt->id; ?>" <?php if(in_array($dt->id,$events)){echo 'checked';}?> name="event_id[]" value="<?php echo $dt->id; ?>">
												<label class="custom-control-label" for="customCheck<?php echo $dt->id; ?>"><?php echo $dt->event_name; ?></label>
											</div>
										</li>
										
                                            <?php } ?>
										
									</ul>
                                                                        
                                                                        
                                                                        
                                                                        
                                     <?php $amities=explode(',',$service->amenity_id)?>
									<h6>Amenities</h6>
									<ul class="list-unstyled d-flex event-type-list flex-wrap">
									<?php foreach($amenityname as $dt)
                                            { ?>	
                                                                            <li>
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="customCheckami<?php echo $dt->id; ?>" <?php if(in_array($dt->id,$amities)){echo 'checked';}?> name="amenity_id[]" value="<?php echo $dt->id; ?>">
												<label class="custom-control-label" for="customCheckami<?php echo $dt->id; ?>"><?php echo $dt->amenities_name; ?></label>
											</div>
										</li>
										
                                            <?php } ?>
										
									</ul>
									
									
									<div class="row">
										<div class="col-sm-12 text-right mt-3">
                                          <button type="submit" class="btn btn-primary btn-lg">Next <i class="ion-android-arrow-forward"></i></button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</section>
 <!-- <?php echo  $this->Html->css('mdtimepicker.css') ?>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<?php echo $this->Html->script('mdtimepicker.js') ?>

<script>
  $(document).ready(function(){
    $('#timepicker').mdtimepicker(); //Initializes the time picker
  });
</script>

<script>
  $(document).ready(function(){
    $('#timepicker1').mdtimepicker(); //Initializes the time picker
  });
</script> -->
    
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
 $('#datetimepicker').datetimepicker({
	dayOfWeekStart : 1,
	lang:'en',
	timepicker:false,
	format:'Y-m-d'
	//disabledDates:['1986/01/08','1986/01/09','1986/01/10']
	});
    $('#enddatetimepicker').datetimepicker({
	dayOfWeekStart : 1,
	lang:'en',
	timepicker:false,
	format:'Y-m-d'
	//disabledDates:['1986/01/08','1986/01/09','1986/01/10']
	});
	
	$('#starttime').datetimepicker({
	  datepicker:false,
	  format:'g:i A',
      formatTime: 'g:i A',
	  ampm:true
	});
	
	$('#endtime').datetimepicker({
	  datepicker:false,
	  //format:'H:i'
	  format:'g:i A',
      formatTime: 'g:i A',
	  ampm:true
	});
	
</script>