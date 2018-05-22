<?php
  $upload_path = $this->request->webroot."user_img/";
  $thumb_width = "150";           
  $thumb_height = "150";  


  function resizeThumbnailImage($thumb_image_name, $image, $width, $height, $start_width, $start_height, $scale){
  list($imagewidth, $imageheight, $imageType) = getimagesize($image);
  $imageType = image_type_to_mime_type($imageType);
  
  $newImageWidth = ceil($width * $scale);
  $newImageHeight = ceil($height * $scale);
  $newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);
  switch($imageType) {
    case "image/gif":
      $source=imagecreatefromgif($image); 
      break;
      case "image/pjpeg":
    case "image/jpeg":
    case "image/jpg":
      $source=imagecreatefromjpeg($image); 
      break;
      case "image/png":
    case "image/x-png":
      $source=imagecreatefrompng($image); 
      break;
    }
  imagecopyresampled($newImage,$source,0,0,$start_width,$start_height,$newImageWidth,$newImageHeight,$width,$height);
  switch($imageType) {
    case "image/gif":
        imagegif($newImage,$thumb_image_name); 
      break;
        case "image/pjpeg":
    case "image/jpeg":
    case "image/jpg":
        imagejpeg($newImage,$thumb_image_name,100); 
      break;
    case "image/png":
    case "image/x-png":
      imagepng($newImage,$thumb_image_name);  
      break;
    }
  chmod($thumb_image_name, 0777);
  return $thumb_image_name;
}



if (isset($_POST["upload_thumbnail"])) {

  $filename = $_POST['filename'];

  $large_image_location = $upload_path.$_POST['filename'];
  $thumb_image_location = $upload_path."thumb_".$_POST['filename'];

  $x1 = $_POST["x1"];
  $y1 = $_POST["y1"];
  $x2 = $_POST["x2"];
  $y2 = $_POST["y2"];
  $w = $_POST["w"];
  $h = $_POST["h"];
  
  $scale = $thumb_width/$w;
  $cropped = resizeThumbnailImage($thumb_image_location, $large_image_location,$w,$h,$x1,$y1,$scale);
  header("location:".$_SERVER["PHP_SELF"]);
  exit();
}
?>
<link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot;?>css/cropimage.css" />
<link type="text/css" href="<?php echo $this->request->webroot;?>css/imgareaselect-default.css" rel="stylesheet" />
  
  <script type="text/javascript" src="<?php echo $this->request->webroot;?>js/jquery.form.js"></script>
  <script type="text/javascript" src="<?php echo $this->request->webroot;?>js/jquery.imgareaselect.js"></script>



<div class="col-lg-3 col-md-4">
  <div class="left-bar mb-4">
    <div class="d-flex p-3 p-lg-4 align-items-center left-bar-top">
       
      <div class="user-image mr-2" data-toggle="modal" data-target="#myModal">
          <?php if ($user_details->pimg != '') { ?>
        <img src="<?php echo $this->Url->build('/user_img/thumb_' . $user_details->pimg); ?>" alt="" class="rounded-circle" id="profile_image">
          <?php }else{ ?>
        <img src="<?php echo $this->Url->build('/user_img/default.png'); ?>" alt="" class="rounded-circle" id="profile_image">
        <i style="position: absolute; margin: -27px 0px 0 17px;" class="ion-android-camera"></i>
          <?php } ?>

          <img src="<?php echo $this->request->webroot;?>images/upload.png" alt="" class="rounded-circle upload-img">
      </div>
      <div class="user-info">

        <h6 class="mb-0"><?php echo $user_details->full_name;?></h6>
        
        <p class="mb-0 location"><i class="ion-location"></i> <?php echo $user_details->city.' '.$user_details->country.' '.$user_details->postcode;?></p>

      </div>
    </div>
      
      
      
      <!--menus-->
      
    <ul class="sidebar-menu list-unstyled mb-0">

        <?php 
         if($user_details['utype'] == 2){ ?>
           <li <?php if ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'index'){?> class="active" <?php } ?>><a href="<?php echo $this->Url->build(["controller" => "Users","action" => "index"]);?>"><span><i class="ion-home"></i></span> Home</a></li>
          <li <?php if ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'serviceeditprofile'){?> class="active" <?php } ?>><a href="<?php echo $this->Url->build(["controller" => "Users","action" => "serviceeditprofile"]);?>"><span><i class="ion-ios-person"></i></span>Edit Profile</a></li>
          <li <?php if ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'changepass'){?> class="active" <?php } ?>><a href="<?php echo $this->Url->build(["controller" => "Users","action" => "changepass"]);?>"><span><i class="ion-ios-person"></i></span> Change Password</a></li> 

           <li <?php if ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'addservice'){?> class="active" <?php } ?>><a href="<?php echo $this->Url->build(["controller" => "Services","action" => "addservice"]);?>"><span><i class="ion-plus-round"></i></span> Add Event</a></li> 

            <li <?php if ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'listservice'){?> class="active" <?php } ?>><a href="<?php echo $this->Url->build(["controller" => "Services","action" => "listservice"]);?>"><span><i class="ion-navicon-round"></i></span> List Event</a></li> 

          <!-- <li><a href=""><span><i class="ion-ios-email"></i></span> Messages</a></li> -->
          <li <?php if ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'mybooking'){?> class="active" <?php } ?>><a href="<?php echo $this->Url->build(["controller" => "Services","action" => "mybooking"]);?>"><span><i class="ion-android-calendar"></i></span> My Booking</a></li>

          <li <?php if ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'bookingHistory'){?> class="active" <?php } ?>><a href="<?php echo $this->Url->build(["controller" => "Services","action" => "bookingHistory"]);?>"><span><i class="ion-android-calendar"></i></span> Bookings History</a></li>

         <li <?php if ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'message'){?> class="active" <?php } ?>><a href="<?php echo $this->Url->build(["controller" => "Users","action" => "message"]);?>"><span><i class="ion-android-calendar"></i></span> Message</a></li>
          <!-- <li><a href=""><span><i class="ion-star"></i></span> Reviews</a></li>
          <li><a href=""><span><i class="ion-ios-pricetag"></i></span> Subscriptions</a></li> -->
      <?php
        }
        else {
      ?>
       <li <?php if ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'index'){?> class="active" <?php } ?>><a href="<?php echo $this->Url->build(["controller" => "Users","action" => "index"]);?>"><span><i class="ion-home"></i></span> Home</a></li>
      <li <?php if ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'editprofile'){?> class="active" <?php } ?>><a href="<?php echo $this->Url->build(["controller" => "Users","action" => "editprofile"]);?>"><span><i class="ion-ios-person"></i></span>Edit Profile</a></li>
        <li <?php if ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'changepass'){?> class="active" <?php } ?>><a href="<?php echo $this->Url->build(["controller" => "Users","action" => "changepass"]);?>"><span><i class="ion-ios-person"></i></span> Change Password</a></li> 
         <li <?php if ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'wishlist'){?> class="active" <?php } ?>><a href="<?php echo $this->Url->build(["controller" => "Services","action" => "wishlist"]);?>"><span><i class="ion-heart"></i></span> Wishlist</a></li>
         <li <?php if ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'mybooking'){?> class="active" <?php } ?>><a href="<?php echo $this->Url->build(["controller" => "Services","action" => "mybooking"]);?>"><span><i class="ion-android-calendar"></i></span> My Booking</a></li>
         <li <?php if ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'activities'){?> class="active" <?php } ?>><a href="<?php echo $this->Url->build(["controller" => "Services","action" => "activities"]);?>"><span><i class="ion-heart"></i></span> Recent Activities</a></li>
         <li <?php if ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'message'){?> class="active" <?php } ?>><a href="<?php echo $this->Url->build(["controller" => "Users","action" => "message"]);?>"><span><i class="ion-android-calendar"></i></span> Message</a></li>
      <?php
       }
       ?>       
      <li><a href=""><span><i class="ion-log-out"></i></span> Log Out</a></li>
    </ul>
      
     
  </div>
</div>


<script type="text/javascript" >
    $(document).ready(function() {
        $('#submitbtn').click(function() {
            $("#viewimage").html('');
            $("#viewimage").html('<img src="<?php echo $this->request->webroot;?>images/loading.gif" />');
            $(".uploadform").ajaxForm({
              url: base_url+"users/changeimage",
                success:    showResponse 
            }).submit();
        });
    });
    
    function showResponse(responseText, statusText, xhr, $form){

      if(responseText.indexOf('.')>0){
      $('#thumbviewimage').html('<img src="<?php echo $upload_path; ?>'+responseText+'"   style="position: relative;" alt="Thumbnail Preview" />');
        $('#viewimage').html('<img class="preview" alt="" src="<?php echo $upload_path; ?>'+responseText+'"   id="thumbnail" />');
        $('#filename').val(responseText); 
      $('#thumbnail').imgAreaSelect({  aspectRatio: '1:1', handles: true  , onSelectChange: preview });
    }else{
      $('#thumbviewimage').html(responseText);
        $('#viewimage').html(responseText);
    }
    }
    
</script>

<script type="text/javascript">
function preview(img, selection) { 
  var scaleX = <?php echo $thumb_width;?> / selection.width; 
  var scaleY = <?php echo $thumb_height;?> / selection.height; 

  $('#thumbviewimage > img').css({
    width: Math.round(scaleX * img.width) + 'px', 
    height: Math.round(scaleY * img.height) + 'px',
    marginLeft: '-' + Math.round(scaleX * selection.x1) + 'px', 
    marginTop: '-' + Math.round(scaleY * selection.y1) + 'px' 
  });
  
  var x1 = Math.round((img.naturalWidth/img.width)*selection.x1);
  var y1 = Math.round((img.naturalHeight/img.height)*selection.y1);
  var x2 = Math.round(x1+selection.width);
  var y2 = Math.round(y1+selection.height);
  
  $('#x1').val(x1);
  $('#y1').val(y1);
  $('#x2').val(x2);
  $('#y2').val(y2); 
  
  $('#w').val(Math.round((img.naturalWidth/img.width)*selection.width));
  $('#h').val(Math.round((img.naturalHeight/img.height)*selection.height));
  
} 

$(document).ready(function () { 
  $('#save_thumb').click(function() {
    var x1 = $('#x1').val();
    var y1 = $('#y1').val();
    var x2 = $('#x2').val();
    var y2 = $('#y2').val();
    var w = $('#w').val();
    var h = $('#h').val();
    if(x1=="" || y1=="" || x2=="" || y2=="" || w=="" || h==""){
      alert("Please Make a Selection First");
      return false;
    }else{
      return true;
    }
  });
}); 
</script>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

   
      <section>
        <div class="container">

          <div class="crop_box">
        <form class="uploadform" method="post" enctype="multipart/form-data" action="<?php echo $this->Url->build(["controller" => "Users","action" => "changeimage"]);?>" name="photo">  
          <div class="crop_set_upload">
            <div class="crop_upload_label">Upload files: </div>
            <div class="crop_select_image">
              <div class="file_browser">
                  <input type="file" name="imagefile" id="imagefile" class="hide_broswe" />
              </div>
            </div>
            <div style="padding-top: 12px; margin-left: 250px;"><input type="button" value="Upload" class="upload_button" name="submitbtn" id="submitbtn" /></div>
          </div>
        </form>     
            <div class="crop_set_preview">
              <div class="crop_preview_left"> 
                <div class="crop_preview_box_big" id='viewimage'> 
                  
                </div>
              </div>
              <div class="crop_preview_right">
                Preview (150x150 px)
                <div class="crop_preview_box_small" id='thumbviewimage' style="position:relative; overflow:hidden;"> </div>
                
                <form name="thumbnail" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                  <input type="hidden" name="x1" value="" id="x1" />
                  <input type="hidden" name="y1" value="" id="y1" />
                  <input type="hidden" name="x2" value="" id="x2" />
                  <input type="hidden" name="y2" value="" id="y2" />
                  <input type="hidden" name="w" value="" id="w" />
                  <input type="hidden" name="h" value="" id="h" />
                  <input type="hidden" name="wr" value="" id="wr" />
                  
                  <input type="hidden" name="filename" value="" id="filename" />
                  <div class="crop_preview_submit">
                      <input type="button" name="upload_thumbnail" value="Save Thumbnail" id="save_thumb" class="submit_button" />
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
                  </div>
                </form>
                
              </div>
            </div>
          </div>
          
        </div>
        </section>
      <!-- <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div> -->
    

  </div>
</div>

<script type="text/javascript">
  $(function(){

    $('#save_thumb').click(function(){
      var x1 = $('#x1').val();
      var y1 = $('#y1').val();
      var x2 = $('#x2').val();
      var y2 = $('#y2').val();
      var w = $('#w').val();
      var h = $('#h').val();
      var wr = $('#wr').val();
      var filename = $('#filename').val();
      $.ajax({
            method: "POST",
            url: base_url+"users/thumbimage",
            data: { x1: x1, y1: y1, x2: x2, y2: y2, w: w, h: h, wr: wr, filename:filename}
          })
          .done(function( data ) { 
             var obj = $.parseJSON(data);
             if(obj.Ack == 1){
              //alert('<?php echo $this->request->webroot;?>user_img/thumb_'+obj.image);
                $('#profile_image').attr('src', '<?php echo $this->request->webroot;?>user_img/thumb_'+obj.image);            
             
                $('#myModal').modal('hide');
             }
             
          });
    })
  })
</script>

