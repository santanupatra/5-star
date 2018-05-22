<?php echo $this->element('search');?>   
<section class="search-body">
   <div class="container">
      <div class="row">
         <div class="col-lg-12 col-md-12">
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item"><a href="#">Search</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Result</li>
               </ol>
            </nav>
         </div>
         <div class="col-lg-12">
            <?php
               if(count($services) >0){
               ?>
            <ul class="list-unstyled searchlist">
               <?php 
                  //pr($services);                         
                  foreach ($services as $service) {
                   // pr($service);
                    $rat = 0;
                    $avgrat = 0;
                  
                  foreach ($service->ratings as $rating) {
                       $rat = ($rat+$rating->rating);
                       $avgrat = ($rat / count($service->ratings));
                    }
                  ?>
               <li>
                  <div class="venue-image">
                     <a href="<?php echo $this->Url->build(["controller" => "Services","action" => "details",$service['id']]);?>">
                    
                     <?php
                      if($service['image'] != ""){
                    ?>
                    <img src="<?php echo $this->request->webroot;?>service_img/<?php echo $service['image'];?>" alt="">
                    <?php
                      }
                      else{
                    ?>      
                    <img src="<?php echo $this->request->webroot;?>service_img/no-image.png" alt="">
                    <?php
                      }
                    ?>
                     </a>
                     <div class="price"><small>From:</small> $<?php echo $service['price'];?></div>
                  </div>
                  <article>
                     <h4 class="mb-1 text-uppercase"><?php echo $service['service_name'];?></h4>
                     <p class="rating mb-1">
                        <span class="stars"><?php echo $avgrat;?></span>
                        (<?php echo count($service->ratings);?>)
                     </p>
                     <p class="mb-1"><i class="ion-location"></i> <?php echo $service['address'];?></p>
                     <p class="mb-1"><?php echo $service['cp_fname'].' '.$service['cp_lname'];?> </p>
                     <p class="mb-1">Call <?php echo $service['cp_phone'];?></p>
                     <a href="<?php echo $this->Url->build(["controller" => "Services","action" => "details",$service['id']]);?>" class="btn btn-primary rounded-0 mt-1">Book Now</a>
                     <?php
                        if(isset($uid) && $uid != ""){                  
                        ?>
                     <a href="javascript: favourite(<?php echo $service['id'];?>)" class="fab">
                     <?php
                        }
                        else{
                          echo '<a class="nav-link fab" href="#" data-toggle="modal" data-target="#loginModal">';
                        }
                        ?> 
                     <i class="ion-ios-heart" id="feb_<?php echo $service['id'];?>" <?php
                        echo ((isset($service->favourites[0]->service_id))? 'style="color: red;"' : '');?>></i></a>
                  </article>
               </li>
               <?php
                  }
                  ?>                
            </ul>
            <div class="paginator">
               <ul class="pagination">
                  <?php echo $this->Paginator->prev('< ' . __('previous')) ?>
                  <?php echo $this->Paginator->numbers(array('separator' => '')) ?>
                  <?php echo $this->Paginator->next(__('next') . ' >') ?>
               </ul>
               <p><?php //echo $this->Paginator->counter() ?></p>
            </div>
            <?php
               }
               else{
                 echo '<div style="text-align: center; font-size: 23px; color: #ccc;"> No Event available.</div>';
               }
               ?>                    
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCQ9hl89w8uiMND1-cnmkTVnqGh37TDvvk&libraries=places&callback=initAutocomplete"
   async defer></script>
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