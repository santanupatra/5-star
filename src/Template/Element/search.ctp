<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<?php
  if(isset($this->request->data['start_amount']) && isset($this->request->data['end_amount'])){
      $start_amount = $this->request->data['start_amount'];
      $end_amount = $this->request->data['end_amount'];
  }
  else{
      $start_amount = 0;
      $end_amount = 500;
  }
?>
<section class="search-top">
        <div class="container">
        <form method="post" action="<?php echo $this->Url->build(["controller" => "services","action" => "result"]);?>">
            <div class="row">                
                <input type="hidden" name="lat" id="lat" value="<?php echo $this->request->data['lat'];?>">
                <input type="hidden" name="long" id="long" value="<?php echo $this->request->data['long'];?>">
                <div class="col-lg-4 mb-1">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-3">
                            <p class="mt-1 mb-0">Location</p>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-9">
                            <div class="input-group">
                                <input type="text" name="location" id="autocomplete" class="form-control location" placeholder="Venue location" value="<?php echo $this->request->data['location'];?>">
                                <span class="icon"><i class="ion-location"></i></span>
                            </div>
                        </div>
                    </div>                   
                </div>
                <div class="col-lg-4 mb-1">
                     <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <p class="mt-1 mb-0">Venue Name</p>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            <div class="input-group">
                                <input type="text" class="form-control venue-location" placeholder="Venue name" name="title" value="<?php echo $this->request->data['title'];?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 mb-1">
                    <div class="mt-2" style="position: relative; width:100%">
                        <!-- <input multiple="" value="0,100" class="multirange original" type="range">
                        <input multiple="" value="0,200" class="multirange ghost" style="--low: 1%; --high: 40%;" type="range"> -->
                       
                     
                      <input type="hidden" id="start_amount" name="start_amount" value="<?php echo $start_amount;?>">
                      <input type="hidden" id="end_amount" name="end_amount" value="<?php echo $end_amount;?>">
                    

                    <!-- <div id="slider-range"></div> -->
                    <input type="range" name="slider" class="slider" id="slider" value="500" min="0" max="1000"  />
                    <label for="amount">Price range:</label>
                    <span id="amount">$0 - $500</span>
                    </div>
                    
                </div>
                <div class="col-lg-2">
                    <button type="submit" class="btn btn-primary btn-block"><i class="ion-search"></i> Search</button>
                </div>
            </div>
            </form>
        </div>
    </section>

    <script>
  /*$( function() {
    $('#slider').change(function(){
      var val = $('#slider').slider("option", "value");
       $( "#amount" ).html(val); 
    })
    $( "#slider-range" ).slider({
      range: false,
      min: 0,
      max: 1000,
      values: [ <?php echo $start_amount;?>, <?php echo $end_amount;?> ],
      slide: function( event, ui ) {
        $( "#amount" ).html( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
        $( "#start_amount" ).val( ui.values[ 0 ] );
        $( "#end_amount" ).val( ui.values[ 1 ] );
      }
    });
    $( "#amount" ).html( "$" + $( "#slider-range" ).slider( "values", 0 ) +
      " - $" + $( "#slider-range" ).slider( "values", 1 ) );

    $( "#start_amount" ).val( $( "#slider-range" ).slider( "values", 0 ) );
    $( "#end_amount" ).val( $( "#slider-range" ).slider( "values", 1 ) );
  } );*/

  $(document).on('input', '#slider', function() {
      $('#amount').html(  "$" + $( "#start_amount" ).val() +
      " - $" + $(this).val() );
      $('#end_amount').val($(this).val());
  });
  </script>
  <style>

.slider {
    -webkit-appearance: none;
    width: 100%;
    height: 10px;
    background: #d3d3d3;
    outline: none;
    opacity: 0.7;
    -webkit-transition: .2s;
    transition: opacity .2s;
}

.slider:hover {
    opacity: 1;
}

.slider::-webkit-slider-thumb {
    -webkit-appearance: none;
    appearance: none;
    width: 15px;
    height: 15px;
    background: #4CAF50;
    cursor: pointer;
}

.slider::-moz-range-thumb {
    width: 15px;
    height: 15px;
    background: #4CAF50;
    cursor: pointer;
}
</style>