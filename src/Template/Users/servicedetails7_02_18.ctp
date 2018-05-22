<style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 400px;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
    <section class=" pt-5 pb-5 bg-gray">
      <div class="container">
        <div class="flexslider">
          <ul class="slides">
              <?php //pr($serviceimages);
              $i=0;
              foreach($serviceimages as $dt){?>
            <li>
              <img src="<?php echo $this->Url->build('/user_img/'.$dt[$i]['image_name']); ?>" />
            </li>
              <?php $i++;} ?>
            <li>
              <img src="<?php echo $this->Url->build('/image/7.png'); ?>" />
            </li>
            <li>
              <img src="<?php echo $this->Url->build('/image/8.png'); ?>" />
            </li>
            <li>
              <img src="<?php echo $this->Url->build('/image/9.png'); ?>" />
            </li>
            <li>
              <img src="image/6.png" />
            </li>
            <li>
              <img src="image/7.png" />
            </li>
            <li>
              <img src="image/8.png" />
            </li>
            <li>
              <img src="image/9.png" />
            </li>
          </ul>
        </div>
      </div>
    </section>
    <section class="pt-5 pb-5">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
              <a href="<?php echo $this->Url->build(["action" => "addreview",$result['id'],$result['provider_id']]); ?>"><button>Add review</button></a>
            <div class="row">
              <div class="col-lg-12">
                <h2><?php echo $result['service_name'];?></h2>
              </div>
              <div class="col-lg-8">
                <div class="d-flex pb-3">
                  <div class="text-theme">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                  </div>
                  <div class=" ml-3">Reviews (<?php echo $review[0]['reviewcount']; ?>)</div>
                </div>
                <div class="d-flex">
                    <?php foreach($result['service_provider_tags'] as $t){?>
                  <div>
                    <img src="<?php echo $this->Url->build('/image/logo2.png'); ?>" alt="">
                  </div>
                  <div class="ml-2"><?php echo $t['tag']['tag_name']?></div>
                    <?php } ?>
                </div>
                <div class="address-bdr pt-2 pb-2">
                  <div class="name">Address:</div>
                  <div class="value">
                    <?php echo $result['address']?>
                  </div>
                </div>
                  <?php //pr($review);?>
                <div class="row">
                  <div class="col-lg-4">Price? </div>
                  <div class="col-lg-8">
                      <input type="range" min="0" max="5" step="1" value="<?php echo $review[0]['ap']?>" readonly="" data-orientation="vertical" class="range-sldr" >
                  </div>
                  <div class="col-lg-4">Friendly? </div>
                  <div class="col-lg-8">
                    <input type="range" min="0" max="5" step="1" value="<?php echo $review[0]['af']?>" data-orientation="vertical" readonly class="range-sldr" >
                  </div>
                  <div class="col-lg-4">Comfortable? </div>
                  <div class="col-lg-8">
                    <input type="range" min="0" max="5" step="1" value="<?php echo $review[0]['ac']?>" data-orientation="vertical" readonly class="range-sldr" >
                  </div>
                  <div class="col-lg-4">Ambient? </div>
                  <div class="col-lg-8">
                    <input type="range" min="0" max="5" step="1" value="<?php echo $review[0]['aa']?>" data-orientation="vertical" readonly class="range-sldr" >
                  </div>
                  <div class="col-lg-4">Food? </div>
                  <div class="col-lg-8">
                    <input type="range" min="0" max="5" step="1" value="<?php echo $review[0]['afd']?>" data-orientation="vertical" readonly class="range-sldr" >
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <h5>Opening Hours:</h5>
                <ul class="time-list">
                    <?php 
                    $wdays=explode(',',$workingdays->working_days);
                    //pr($wdays);
                   
                    foreach($wdays as $dt){ ?>
                  <li><?php echo $dt;?>: <?php echo $workingdays->working_hours_from.'-'.$workingdays->working_hours_to?></li>
                    <?php } ?>
<!--                  <li>Monday: 12:00 PM – 12:30 AM</li>
                  <li>Monday: 12:00 PM – 12:30 AM</li>
                  <li>Monday: 12:00 PM – 12:30 AM</li>
                  <li>Monday: 12:00 PM – 12:30 AM</li>
                  <li>Monday: 12:00 PM – 12:30 AM</li>
                  <li>Monday: 12:00 PM – 12:30 AM</li>
                  <li>Monday: 12:00 PM – 12:30 AM</li>
                  <li>Monday: 12:00 PM – 12:30 AM</li>
                  <li>Monday: 12:00 PM – 12:30 AM</li>-->
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-4">
              <div class=" mt-5 mb-5" id="map"></div>
          </div>
        </div>
      </div>
    </section>

    <section class="pt-5 pb-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <ul class="command-lst">
              <li>
                <div class="img" style="background-image:url('image/pp.jpg')"></div>
                <div class="txt ml-3">
                  <h4 class="mb-0">John Doe</h4>
                  <p class="mb-0">2 hrs ago</p>
                  <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                  <div class="d-flex">
                    <div>Rateing : </div>
                    <div class="ml-2 text-theme">
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                    </div>

                  </div>
                </div>
              </li>
              <li>
                <div class="img" style="background-image:url('image/pp.jpg')"></div>
                <div class="txt ml-3">
                  <h4 class="mb-0">John Doe</h4>
                  <p class="mb-0">2 hrs ago</p>
                  <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                  <div class="d-flex">
                    <div>Rateing : </div>
                    <div class="ml-2 text-theme">
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                    </div>

                  </div>
                </div>
              </li>
              <li>
                <div class="img" style="background-image:url('image/pp.jpg')"></div>
                <div class="txt ml-3">
                  <h4 class="mb-0">John Doe</h4>
                  <p class="mb-0">2 hrs ago</p>
                  <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                  <div class="d-flex">
                    <div>Rateing : </div>
                    <div class="ml-2 text-theme">
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                    </div>

                  </div>
                </div>
              </li>
              <li>
                <div class="img" style="background-image:url('image/pp.jpg')"></div>
                <div class="txt ml-3">
                  <h4 class="mb-0">John Doe</h4>
                  <p class="mb-0">2 hrs ago</p>
                  <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                  <div class="d-flex">
                    <div>Rateing : </div>
                    <div class="ml-2 text-theme">
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                    </div>

                  </div>
                </div>
              </li>
              <li>
                <div class="img" style="background-image:url('image/pp.jpg')"></div>
                <div class="txt ml-3">
                  <h4 class="mb-0">John Doe</h4>
                  <p class="mb-0">2 hrs ago</p>
                  <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                  <div class="d-flex">
                    <div>Rateing : </div>
                    <div class="ml-2 text-theme">
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                    </div>

                  </div>
                </div>
              </li>
            </ul>
          </div>
          <div class="col-lg-3">
            <div class="side-story">
              <h4 class="ttl-hd">Title here</h4>
              <ul class="side-story-lst">
                <li>
                  <div class="img" style="background-image:url('image/6.png')"></div>
                  <div class="txt">
                    <h5 class="mb-0">John Doe</h5>
                    <p class="mb-0">Lorem Ipsum is simply dummy text of the printing</p>
                  </div>
                </li>
                <li>
                  <div class="img" style="background-image:url('image/6.png')"></div>
                  <div class="txt">
                    <h5 class="mb-0">John Doe</h5>
                    <p class="mb-0">Lorem Ipsum is simply dummy text of the printing</p>
                  </div>
                </li>
                <li>
                  <div class="img" style="background-image:url('image/6.png')"></div>
                  <div class="txt">
                    <h5 class="mb-0">John Doe</h5>
                    <p class="mb-0">Lorem Ipsum is simply dummy text of the printing</p>
                  </div>
                </li>
                <li>
                  <div class="img" style="background-image:url('image/6.png')"></div>
                  <div class="txt">
                    <h5 class="mb-0">John Doe</h5>
                    <p class="mb-0">Lorem Ipsum is simply dummy text of the printing</p>
                  </div>
                </li>
                <li>
                  <div class="img" style="background-image:url('image/6.png')"></div>
                  <div class="txt">
                    <h5 class="mb-0">John Doe</h5>
                    <p class="mb-0">Lorem Ipsum is simply dummy text of the printing</p>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="pt-5 pb-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <div class="card">
              <div class="hdr">
                <div class="img" style="background-image: url('image/pp.jpg')"></div>
                <div class="txt">
                  <h4>John Doe</h4>
                  <p>Restaurant Name</p>
                </div>
                <div class="love">
                  <i class="fa fa-heart" aria-hidden="true"></i>
                </div>
              </div>
              <div class="img-prt" style="background-image: url('image/3.png')"></div>
              <div class="btn-grp">
                <button type="button" name="button" class="btn btn-secondary btn-sm">Gluten free</button>
                <button type="button" name="button" class="btn btn-secondary btn-sm">Lactose free</button>
              </div>
              <div class="moreTxt">
                <div>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
                <a href="">Read More >></a>
              </div>
              <div class="ftr-rtng">
                <span>Rating</span>
                <div class="rate">
                  <i class="fa fa-star text-theme" aria-hidden="true"></i>
                  <i class="fa fa-star text-theme" aria-hidden="true"></i>
                  <i class="fa fa-star text-theme" aria-hidden="true"></i>
                  <i class="fa fa-star text-theme" aria-hidden="true"></i>
                  <i class="fa fa-star text-gray" aria-hidden="true"></i>
                </div>
                <span class="icn-hdr">
                  <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                </span>
                <span class="icn-hdr">
                  <i class="fa fa-share-alt" aria-hidden="true"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="card">
              <div class="hdr">
                <div class="img" style="background-image: url('image/pp.jpg')"></div>
                <div class="txt">
                  <h4>John Doe</h4>
                  <p>Restaurant Name</p>
                </div>
                <div class="love">
                  <i class="fa fa-heart" aria-hidden="true"></i>
                </div>
              </div>
              <div class="img-prt" style="background-image: url('image/3.png')"></div>
              <div class="btn-grp">
                <button type="button" name="button" class="btn btn-secondary btn-sm">Gluten free</button>
                <button type="button" name="button" class="btn btn-secondary btn-sm">Lactose free</button>
              </div>
              <div class="moreTxt">
                <div>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
                <a href="">Read More >></a>
              </div>
              <div class="ftr-rtng">
                <span>Rating</span>
                <div class="rate">
                  <i class="fa fa-star text-theme" aria-hidden="true"></i>
                  <i class="fa fa-star text-theme" aria-hidden="true"></i>
                  <i class="fa fa-star text-theme" aria-hidden="true"></i>
                  <i class="fa fa-star text-theme" aria-hidden="true"></i>
                  <i class="fa fa-star text-gray" aria-hidden="true"></i>
                </div>
                <span class="icn-hdr">
                  <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                </span>
                <span class="icn-hdr">
                  <i class="fa fa-share-alt" aria-hidden="true"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="card">
              <div class="hdr">
                <div class="img" style="background-image: url('image/pp.jpg')"></div>
                <div class="txt">
                  <h4>John Doe</h4>
                  <p>Restaurant Name</p>
                </div>
                <div class="love">
                  <i class="fa fa-heart" aria-hidden="true"></i>
                </div>
              </div>
              <div class="img-prt" style="background-image: url('image/3.png')"></div>
              <div class="btn-grp">
                <button type="button" name="button" class="btn btn-secondary btn-sm">Gluten free</button>
                <button type="button" name="button" class="btn btn-secondary btn-sm">Lactose free</button>
              </div>
              <div class="moreTxt">
                <div>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
                <a href="">Read More >></a>
              </div>
              <div class="ftr-rtng">
                <span>Rating</span>
                <div class="rate">
                  <i class="fa fa-star text-theme" aria-hidden="true"></i>
                  <i class="fa fa-star text-theme" aria-hidden="true"></i>
                  <i class="fa fa-star text-theme" aria-hidden="true"></i>
                  <i class="fa fa-star text-theme" aria-hidden="true"></i>
                  <i class="fa fa-star text-gray" aria-hidden="true"></i>
                </div>
                <span class="icn-hdr">
                  <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                </span>
                <span class="icn-hdr">
                  <i class="fa fa-share-alt" aria-hidden="true"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="card">
              <div class="hdr">
                <div class="img" style="background-image: url('image/pp.jpg')"></div>
                <div class="txt">
                  <h4>John Doe</h4>
                  <p>Restaurant Name</p>
                </div>
                <div class="love">
                  <i class="fa fa-heart" aria-hidden="true"></i>
                </div>
              </div>
              <div class="img-prt" style="background-image: url('image/3.png')"></div>
              <div class="btn-grp">
                <button type="button" name="button" class="btn btn-secondary btn-sm">Gluten free</button>
                <button type="button" name="button" class="btn btn-secondary btn-sm">Lactose free</button>
              </div>
              <div class="moreTxt">
                <div>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
                <a href="">Read More >></a>
              </div>
              <div class="ftr-rtng">
                <span>Rating</span>
                <div class="rate">
                  <i class="fa fa-star text-theme" aria-hidden="true"></i>
                  <i class="fa fa-star text-theme" aria-hidden="true"></i>
                  <i class="fa fa-star text-theme" aria-hidden="true"></i>
                  <i class="fa fa-star text-theme" aria-hidden="true"></i>
                  <i class="fa fa-star text-gray" aria-hidden="true"></i>
                </div>
                <span class="icn-hdr">
                  <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                </span>
                <span class="icn-hdr">
                  <i class="fa fa-share-alt" aria-hidden="true"></i>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="bg-gray pt-5 pb-5">
      <div class="container">
        <h3 class="text-center">Hey!</h3>
        <p class="text-center">We're still collecting *restaurants in this city, if you haven't see one place that you know it should be here. <br> please add it. To be the first to receive about new places coming up, pop your email below</p>
        <div class="src-input mt-4">
          <input type="text" name="" value="">
        </div>
        <div class="text-center">
          <button type="button" name="button" class="btn btn-success">Watch out</button>
        </div>
      </div>
    </section>

    <section class="pt-5 pb-5">
      <div class="container">
        <div class="hdr text-center">
          <h4>Find a Place Near You</h4>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
        </div>
        <div class="row">
          <div class="col-md-3">
            <ul class="FindAPlace">
              <li>Healthy Restaurants in London</li>
              <li>Healthy Restaurants in Berlin</li>
              <li>Healthy Restaurants in Paris</li>
            </ul>
          </div>
          <div class="col-md-3">
            <ul class="FindAPlace">
              <li>Healthy Restaurants in London</li>
              <li>Healthy Restaurants in Berlin</li>
              <li>Healthy Restaurants in Paris</li>
            </ul>
          </div>
          <div class="col-md-3">
            <ul class="FindAPlace">
              <li>Healthy Restaurants in London</li>
              <li>Healthy Restaurants in Berlin</li>
              <li>Healthy Restaurants in Paris</li>
            </ul>
          </div>
          <div class="col-md-3">
            <ul class="FindAPlace">
              <li>Healthy Restaurants in London</li>
              <li>Healthy Restaurants in Berlin</li>
              <li>Healthy Restaurants in Paris</li>
            </ul>
          </div>
        </div>
      </div>
    </section>

   <script>

      var marker;

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 13,
          center: {lat: <?php echo $result['latitude']?>, lng: <?php echo $result['longitude']?>}
        });
        var iconBase = 'http://111.93.169.90/team6/jimja/image/';
        
        var icons = {
          info: {
            icon: iconBase + 'marker.png'
          }
        };
        marker = new google.maps.Marker({
          map: map,
          draggable: true,
          animation: google.maps.Animation.DROP,
          position: {lat: <?php echo $result['latitude']?>, lng: <?php echo $result['longitude']?>}
          
       });
        marker.addListener('click', toggleBounce);
      }

      function toggleBounce() {
        if (marker.getAnimation() !== null) {
          marker.setAnimation(null);
        } else {
          marker.setAnimation(google.maps.Animation.BOUNCE);
        }
      }
      
      
      
    </script> 
    
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBq9EFFb37zUosUttGpoQcZ2HmXp2-6dTU&callback=initMap">
</script>  
