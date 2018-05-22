
    <?php echo $this->element('profile_head');?>

    <section class="mb-5 mt-5">
      <div class="container">
        <h4 class="mb-4">Latest Reviews</h4>
          <ul class="command-lst">
              <?php if(!empty($reviewer)){
                  
               foreach($reviewer as $dt){?>
               
            <li class="clearfix">
               <?php if($dt['user']['pimg']!=''){?>
            <div class="serviceboard-pic">
	            <div class="img" style="background-image:url('<?php echo $this->Url->build('/user_img/'.$dt['user']['pimg']); ?>')"></div>
            </div>
              <?php }else{ ?>
             <div class="serviceboard-pic">
             	<div class="img" style="background-image:url('<?php echo $this->Url->build('/user_img/default.png'); ?>')"></div>
             </div> 
            
              <?php } ?>
              <div class="txt ml-3">
                <h4 class="mb-0"><?php echo $dt['user']['full_name']?></h4>
                <p class="time">2 hrs ago</p>
                <p class="mb-0 font-14"><?php echo $dt['review']?></p>
                <div class="d-flex font-12">
                  <span class="mr-2">Rating</span>
                  <div><span class="stars_r"><?php $avgrating=(($dt['food']+$dt['friendly']+$dt['ambient']+$dt['selection']+$dt['pricey']+$dt['comfortable'])/6);if($avgrating!=''){echo $avgrating;}else{ echo 0;}?></span></div>
<!--                  <div class="text-theme">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                  </div>-->
                </div>
                <div class="reply-btn">
                  <button type="button" name="button" class="btn btn-success btn-sm mt-2">Reply</button>
                </div>
              </div>
             <?php $i=1; foreach($dt['review_images'] as $dt){?>
            <div class="img-review">
              <a href="<?php echo $this->Url->build('/review_img/'.$dt['image_name']); ?>" data-lightbox="image-1" data-title="Image<?php echo $i;?>"><img src="<?php echo $this->Url->build('/review_img/'.$dt['image_name']); ?>" alt=""></a>
              <div class="arrow"></div>
            </div>
             <?php $i++; } ?>
            </li>
              <?php } }else{ ?>
            <li>
               <div>
                  Sorry! No review found.
                
              </div>
            </li>
            
              <?php } ?>
<!--            <li>
              <div class="img" style="background-image:url('image/pp.jpg')"></div>
              <div class="txt ml-3">
                <h4 class="mb-0">John Doe</h4>
                <p class="time">2 hrs ago</p>
                <p class="mb-0 font-14">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco</p>
                <div class="d-flex mt-1 font-12">
                  <span class="mr-2">Rating</span>
                  <div class="text-theme">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                  </div>
                </div>
                <div>
                  <button type="button" name="button" class="btn btn-success btn-sm mt-2">Respond to a Review</button>
                </div>
              </div>
              <div class="img-review">
                <a href="<?php echo $this->Url->build('/image/7.png'); ?>" data-lightbox="image-2" data-title="My caption"><img src="<?php echo $this->Url->build('/image/7.png'); ?>" alt=""></a>
                <div class="arrow"></div>
              </div>
            </li>
            <li>
              <div class="img" style="background-image:url('image/pp.jpg')"></div>
              <div class="txt ml-3">
                <h4 class="mb-0">John Doe</h4>
                <p class="time">2 hrs ago</p>
                <p class="mb-0 font-14">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco</p>
                <div class="d-flex mt-1 font-12">
                  <span class="mr-2">Rating</span>
                  <div class="text-theme">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
              <div class="img-review">
                <a href="image/11.jpg" data-lightbox="image-3" data-title="My caption"><img src="image/11.jpg" alt=""></a>
                <div class="arrow"></div>
              </div>
            </li>
            <li>
              <div class="img" style="background-image:url('image/pp.jpg')"></div>
              <div class="txt ml-3">
                <h4 class="mb-0">John Doe</h4>
                <div class="d-flex">
                  <div class="text-theme">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                  </div>
                </div>
                <p class="mb-0">2 hrs ago</p>
                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco</p>
              </div>
              <div class="img-review">
                <a href="image/11.jpg" data-lightbox="image-4" data-title="My caption"><img src="image/11.jpg" alt=""></a>
                <div class="arrow"></div>
              </div>
            </li>
            <li>
              <div class="img" style="background-image:url('image/pp.jpg')"></div>
              <div class="txt ml-3">
                <h4 class="mb-0">John Doe</h4>
                <div class="d-flex">
                  <div class="text-theme">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                  </div>
                </div>
                <p class="mb-0">2 hrs ago</p>
                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco</p>
              </div>
              <div class="img-review">
                <a href="image/11.jpg" data-lightbox="image-5" data-title="My caption"><img src="image/11.jpg" alt=""></a>
                <div class="arrow"></div>
              </div>
            </li>-->
          </ul>
      </div>
    </section>

 <style>
   .form-horizontal .control-label {
	text-align: left;
    }
    
    
    span.stars_r, span.stars_r span {
    display: block;
    background: url(../../carvis/image/stars.png) 0 -16px repeat-x;
    width: 80px;
    height: 16px;
}

span.stars_r span {
    background-position: 0 0;
}
    
    
</style>
<script>
$.fn.stars_r = function() {
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
    $('span.stars_r').stars_r();
});

</script> 