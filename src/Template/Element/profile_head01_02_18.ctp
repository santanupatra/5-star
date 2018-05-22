<?php  if($user_details['utype'] == 1){ ?>
<section class=" pt-5 pb-5 bg-gray">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-3">
          <?php if($user_details->pimg!=''){?>
          <form>
        <div class="profile-image">
        	<img src="<?php echo $this->Url->build('/user_img/'.$user->pimg); ?>" />
            <?php }else{ ?>
        <div class="profile-image" style="background-image: url('<?php echo $this->Url->build('/user_img/default.png'); ?>')">
            <?php } ?>
          <span><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>
          <input type="file" name="pimg" id="multiFiles">
        </div>
          
      </div>
          </form>
  
      <div class="col-lg-9">
        <div class="profile-name">
          <h4><?php echo $user_details->full_name;?> </h4>
<!--          <div class="Rated mb-2">
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
          </div>-->
          <div class="loc-area">
            <div class="loc">
              <i class="fa fa-map-marker" aria-hidden="true"></i>
              <span><?php echo $user_details->address;?></span>
            </div>
<!--            <div class="loc">
              <i class="fa fa-exclamation-triangle" aria-hidden="true" style=" color: #a6041f; "></i>
              <span>Private</span>
            </div>-->
          </div>
                  
		 
          <div>
            <p class="mb-1"><?php echo $user_details->description;?></p>
          </div>
<!--                  <div class="business-btn-grp py-4">
                <div class="row">
                  <div class="col-lg-4">
                      <a href="<?php echo $this->Url->build(["action" => "addreview",$result['id'],$result['provider_id']]); ?>" class="btn btn-success btn-block">Add Review</a>
                  </div>
                    
                    <div class="col-lg-4">
                      <a href="#" class="btn btn-success btn-block">Add a Place</a>
                  </div>
                </div>
                  </div>-->
        </div>
      </div>
    </div>
  </div>
</section>
<?php }else{ ?>

<section class="pt-5 pb-5 bg-gray">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-3">
              <?php if($user->pimg!=''){?>
            <div class="profile-image" style="background-image: url('<?php echo $this->Url->build('/user_img/'.$user->pimg); ?>')">
              <?php }else{?>
                <div class="profile-image" style="background-image: url('<?php echo $this->Url->build('/user_img/default.png'); ?>')">
              <?php } ?>
              <span><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>
              <input type="file">
            </div>
          </div>
          <div class="col-lg-9">
            <div class="profile-name">
               <h4 class="text-black"><?php echo $user->full_name;?>
                <a href="">
                   <?php if($user->check_verified=='N'){?> 
                  <span class="ml-1 wrong"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>Verification pending</span>
                  <?php }else{ ?>
                  <span class="ml-1"><i class="fa fa-check-circle mr-1" aria-hidden="true"></i> Verified</span> 
                  <?php } ?>
                </a>
              </h4>
                <div class="Rated mb-2"><span class="stars"><?php $avgrating=(($provider_avg_review[0]['ap']+$provider_avg_review[0]['af']+$provider_avg_review[0]['ac']+$provider_avg_review[0]['ase']+$provider_avg_review[0]['aa']+$provider_avg_review[0]['afd'])/6);if($avgrating!=''){echo $avgrating;}else{ echo 0;}?></span></div>
<!--              <div class="Rated mb-2">
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
              </div>-->
              <div class="loc-area">
                <div class="loc">
                  <i class="fa fa-map-marker" aria-hidden="true"></i>
                  <span><?php echo $user->address;?></span>
                </div>
                <!--<div class="loc">
                  <i class="fa fa-exclamation-triangle" aria-hidden="true" style=" color: #a6041f; "></i>
                  <span>Private</span>
                </div>-->
                <div class="loc loc-2">
                  <i class="fa fa-phone" aria-hidden="true"></i>
                  <span><?php echo $user->phone;?></span>
                </div>
              </div>
              <div class="loc-area">
                <p class="mb-1"><?php echo $user->description;?></p>
              </div>
              <div class="business-btn-grp py-4">
<!--                <div class="row">
                  <div class="col-lg-4">
                      <a href="<?php echo $this->Url->build(["controller" => "Users","action" => "addmultiplephoto"]);?>" class="btn btn-success btn-block">Add new photos of your place</a>
                  </div>
                  <div class="col-lg-4">
                      <a href="<?php echo $this->Url->build(["controller" => "Services","action" => "listservice"]);?>" class="btn btn-success btn-block">Update your listing</a>
                  </div>
                </div>-->
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
<?php } ?>
<style>
   .form-horizontal .control-label {
	text-align: left;
    }
    
    
    span.stars, span.stars span {
    display: block;
    background: url(../../jimja/image/stars.png) 0 -16px repeat-x;
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

<!--<script>
    $( document ).ready( function () {
        
       $('#multiFiles').on('change',function(){
           
               var image_url =   '<?php echo $this->Url->build('/user_img/'); ?>' ;
              
                    var form_data = new FormData();
                    var ins = document.getElementById('multiFiles').files.length;
                    alert(ins);
                 //alert(JSON.stringify(document.getElementById('multiFiles')));
                   
                    form_data.append("files", document.getElementById('multiFiles').files;
                        //alert('ok');
                       // alert(JSON.stringify(document.getElementById('multiFiles').files[x]));
                    
                    console.log(form_data);
                    $.ajax({
                        url: 'upload_photo_add', // point to server-side PHP script 
                        dataType: 'text', // what to expect back from the PHP script
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post',
                        success: function (response) {
                          console.log(response);
                             var obj = jQuery.parseJSON( response );
                            
                             if(obj.Ack == 1){
                                 
                            //alert('ok');
                              $('#product_image_id').val(obj.image_name);
                              for(var i = 0; i < obj.data.length; i++){
                                  file_path = image_url+obj.data[i].filename;
                                $('<li id="'+obj.data[i].last_id+'"></li>').appendTo('#sortable').html('<div class="media" id="image_'+obj.data[i].last_id+'"><div class="media-left"><a href="#"><img style="width: 100px; height: 100px" src="'+file_path+'" alt="" /></a></div><div class="media-body media-middle"><h4>'+obj.data[i].filename+'</h4></div><div class="media-body media-middle"></div></div></div></li>');
                              }
                             }
                        },
                        error: function (response) {
                            $('#msg').html(response); // display error response from the PHP script
                        }
                    });
                });
      
    } ); 
    
     </script>-->