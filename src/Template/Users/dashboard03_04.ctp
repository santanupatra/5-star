<section class="user-dashboard">
    <div class="container">
      <div class="row">      
        <?php echo $this->element('side_menu');?>
        <div class="col-lg-9 col-md-8">
         <div class="vendor-dashboard-top mb-3">
          <form class="form-horizontal custom_horizontal" name="PhotoGallery" id="postfrm" action="" method="post" enctype="multipart/form-data">
            <ul class="links d-flex list-unstyled p-3 mb-0">
             <!--  <li><a href=""><i class="ion-compose"></i> Update Status</a></li> -->
              <li><a a href="javascript:void(0);" class="upl"><i class="ion-camera"></i> Add Photos</a></li>
              <!-- <li><a href=""><i class="ion-image"></i> Create Photo Album</a></li> -->
            </ul>
            <div class="msg-body p-3">
              <textarea rows="3" class="form-control" name="data[Post][description]" id="txt_ar" placeholder="What’s on your mind"></textarea>
            </div>
             <div class="clearfix"></div>
                                            <div id="uplimg" style="display:none;">
                                            <div id="appimg">
                                            <div id="filediv" class='filediv' style="display:none;"><input name="file" type="file" id="file" class="file" style="display:none;"/></div>
                             <!--<img id="blah" class="uplimg" src="#" alt="your image" />-->
                             </div>
                              
                            </div>
             <div class="msg-bottom px-3 py-2">
              <ul class="d-flex list-unstyled mb-0">
                <!--<li><a href=""><i class="ion-compose"></i></a></li>
                <li><a href=""><i class="ion-camera"></i></a></li>
                <li><a href=""><i class="ion-image"></i></a></li>-->
                <li id="lod_img" style="display:none;"><img src="<?php echo $this->request->webroot;?>img/uploading.gif"></li>
                <li><a class="btn btn-primary" id="imgp" href="javascript:void(0);" style="margin-bottom:5px;">Post</a></li>
              </ul>
               </form>
            </div> 
          
          <div class="recent-post-wrap">
            <h5 class="common-title mb-0 p-3">Nerest Posts</h5>
            <div class="p-3">
              <?php
              if(count($services) > 0){
                foreach($services as $service){

                 $current_date= date('Y-m-d H:i:s');
                 $post_date = $service->create_date; 
                                          
                  $date1 = new DateTime($post_date);  
                  $date2 = $date1->diff(new DateTime($current_date));
                  
                  $likes = 0;
                  $reports = 0;
                  foreach ($service->likes as $like) {
                    if($like->user_id == $uid)
                        {
                          $likes = 1;
                        }
                  }

                  foreach ($service->reports as $report) {
                    if($report->user_id == $uid)
                        {
                          $reports = 1;
                        }
                  }
              ?>
              <div class="post-wrap mb-3">
                <div class="left-side mr-2">
                  <img src="<?php echo $this->request->webroot;?>/user_img/thumb_<?php echo (($service->user->pimg != "")? $service->user->pimg : 'nouser.png');?>" class="user-image rounded-circle" alt="">
                  
                </div>
                <div class="right-side">
                  <p class="name mb-0"><?php echo $service->user->full_name;?></p>
                    <small class="grey-text d-block mb-2">
                    <?php
                      if($date2->m > 0)
                      echo $date2->m.' months'."\n";
                      if($date2->d > 0)
                      echo $date2->d.' days'."\n";
                      if($date2->h > 0)
                      echo $date2->h.' hours'."\n";
                      if($date2->i > 0)
                      echo $date2->i.' minutes'."\n";
                    ?>
                    ago</small></div></div>
                    <div class="slider-maindiv w-100 float-left">
                        <div id="wowslider-container1">
                          <div class="ws_images">
                            <ul>
                            <?php 
                        
                  if(count($service->service_images)>0)
                  {
                    foreach($service->service_images as $imgs)
                      { 
                        ?>
                              <li><img src="<?php echo $this->request->webroot;?>service_img/<?php echo (($imgs->name != "")? $imgs->name : 'nouser.png');?>" alt="" id="wows1_0" class="img-fluid" />
                                <span class="w-100 bg-dark text-white">
                                <?php
                      if($service->description){

                        ?>
                        <?php echo $service->description; ?>
                        <?php
                      }
                    ?>
                      
                    </span>
                              </li>
                              <?php 

                    }
                  }
                    ?>
                             <!--  <li><img src="/team6/5star/images/2.jpg" alt=""  id="wows1_1" class="img-fluid" />
                                <span class="w-100 bg-dark text-white">Lorem ipsum is here</span>
                              </li>

                              <li><img src="/team6/5star/images/3.jpg" alt="#"  id="wows1_2" class="img-fluid" />
                                <span class="w-100 bg-dark text-white">Lorem ipsum is here</span>
                              </li>

                              <li><img src="/team6/5star/images/4.jpg" alt=""  id="wows1_3" class="img-fluid" />
                                <span class="w-100 bg-dark text-white">Lorem ipsum is here</span>
                              </li> -->

                            </ul>
                          </div>
                        </div>
                      </div><!-- slider-maindiv -->
                  <!-- <div class="post-image mb-2">
                     <a href="<?php echo $this->Url->build(["controller" => "Services","action" => "details",$service['id']]);?>"><img src="<?php echo $this->request->webroot;?>service_img/<?php echo (($service->image != "")? $service->image : 'nouser.png');?>" alt="" class="img-fluid"></a>
                  </div> -->
                  <p class="like-comment text-right mb-2">
                    <a href="javascript: all_like(<?php echo $service['id'];?>);"><span id="nolike_<?php echo $service['id'];?>"><?php echo count($service->likes);?></span> <span class="grey-text">Likes</span></a>   <span class="grey-text"> |</span>
                    <a href="javascript: comment(<?php echo $service['id'];?>);"><span id="nocomment_<?php echo $service['id'];?>"><?php echo count($service->comments);?></span> <span class="grey-text">Comment</span></a>
                  </p>
                  <ul class="posted-extra-links d-flex list-unstyled mb-0 py-1">
                    <li><a href="javascript: like(<?php echo $service['id'];?>);" id='like_<?php echo $service['id'];?>'><i class="ion-ios-heart" <?php echo (($likes == 1)? 'style="color: #d8ad57"' : '');?>></i> Like</a></li>
                    <li><a href="javascript: comment(<?php echo $service['id'];?>);"><i class="ion-ios-chatbubble-outline"></i> Comment</a></li>
                    <li class="dropup social-share"><a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ion-android-share-alt"></i> Share</a>
                    
                    <div class="dropdown-menu">
   							<a class="dropdown-item" href="#" onclick="facebook_share('http://111.93.169.90/team6/5star/users/dashboard#', '<?php echo $service->service_name;?>', '<?php echo $service->description;?>', 'http://111.93.169.90/team6/5star/service_img/<?php echo (($service->image != "")? $service->image : 'nouser.png');?>')"><i class="ion-social-facebook"></i>Facebook</a>

    							<a class="dropdown-item" href="javascript:twShare('<?php echo $this->Url->build(["controller" => "Services","action" => "details",$service['id']]);?>', '<?php echo $service->service_name;?>', '', '<?php echo $this->request->webroot.'service_img/'.(($service->image != "")? $service->image : 'nouser.png');?>', 520, 350)"><i class="ion-social-twitter"></i>Twitter</a>

                  <a class="dropdown-item" href="javascript:lnShare('<?php echo $this->Url->build(["controller" => "Services","action" => "details",$service['id']]);?>', '<?php echo $service->service_name;?>', '', '<?php echo $this->request->webroot.'service_img/'.(($service->image != "")? $service->image : 'nouser.png');?>', 520, 350)"><i class="ion-social-linkedin"></i>linkedin</a>

                  
  						  </div>
                    
                    </li>
                    
                    <li><a href="javascript: report(<?php echo $service['id'];?>);" id='report_<?php echo $service['id'];?>'><i class="ion-ios-information" <?php echo (($reports == 1)? 'style="color: #d8ad57"' : '');?>></i> Report</a></li>
                  </ul>
                    <!-- +++++++++++++++Comment++++++++++++++-->
                      <div class="foo w-100 bg-light p-md-2 float-left" style="display: none;" id="comment_<?php echo $service['id'];?>">
                          <div class="form-group">
                            <div class="row" id="commentbox_<?php echo $service['id'];?>">
                              <div class="col-md-10">
                                <textarea id="ctext_<?php echo $service['id'];?>" class="form-control form-control-sm" cols="5" rows="2" placeholder="Message Here. . . ."></textarea>
                                </div>
                                <div class="col-md-2">
                                 <input type="button" value="Submit" class="btn btn-primary text-white text-center ml-md-3 mt-md-2 rounded-0 text-uppercase" onclick="javascript:addcomment(<?php echo $service['id'];?>)">
                              </div>                             
                            </div>
                            <div class="row" style="height: 10px"></div>
                            <div class="row">
                              <div class="col-md-12" id="all_comment_<?php echo $service['id'];?>">

                              </div>                          
                            </div>                            
                          </div>
                      </div> 
                      <!-- +++++++++++++++Comment End++++++++++++++--> 

                      <!-- +++++++++++++++Like++++++++++++++-->
                      <div class="foo w-100 bg-light p-md-2 float-left" style="display: none;" id="likelike_<?php echo $service['id'];?>">
                          <div class="form-group">                            
                            <div class="row" style="height: 10px"></div>
                            <div class="row">
                              <div class="col-md-12" id="all_like_<?php echo $service['id'];?>">

                              </div>                          
                            </div>                            
                          </div>
                      </div> 
                      <!-- +++++++++++++++Like End++++++++++++++--> 
                </div>
              </div>
              <?php
                }
              }
              ?>
             
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </section>

  <script type="text/javascript">
    function like(id){   
        nolike = $('#nolike_'+id).html();     
        $.ajax({
            method: "POST",
            url: base_url+"services/add_like",
            data: { id: id}
          })
          .done(function( data ) { 
             var obj = $.parseJSON(data);
             if(obj.Ack == 1){
                $('#like_'+id).html('<i class="ion-ios-heart" style="color: #d8ad57"></i> Like');
                $('#nolike_'+id).html(parseInt(nolike)+parseInt(1));
             }
             else{
                 $('#like_'+id).html('<i class="ion-ios-heart"></i> Like');
                 $('#nolike_'+id).html(parseInt(nolike)-parseInt(1));
             }
          });
      } 

      function comment(id){
        $.ajax({
            method: "POST",
            url: base_url+"services/all_comment",
            data: { id: id}
          })
          .done(function( data ) { 
             var obj = $.parseJSON(data);
             if(obj.Ack == 1){
                $('#all_comment_'+id).html(obj.html);
             }
             
          });
          $('#likelike_'+id).css({ 'display': "none" });
          $('#comment_'+id).slideToggle();
      }

      function all_like(id){
        $.ajax({
            method: "POST",
            url: base_url+"services/all_like",
            data: { id: id}
          })
          .done(function( data ) { 
             var obj = $.parseJSON(data);
             if(obj.Ack == 1){
                $('#all_like_'+id).html(obj.html);
             }
             
          });
          $('#comment_'+id).css({ 'display': "none" });
          $('#likelike_'+id).slideToggle();
      }

      function addcomment(id){
         var nocomment = $('#nocomment_'+id).html(); 
         var comment = $('#ctext_'+id).val(); 
        $.ajax({
            method: "POST",
            url: base_url+"services/add_comment",
            data: { id: id, comment: comment}
          })
          .done(function( data ) { 
             var obj = $.parseJSON(data);
             if(obj.Ack == 1){
                $('#nocomment_'+id).html(parseInt(nocomment)+parseInt(1));
                $('#all_comment_'+id).prepend(obj.html);
                $('#commentbox_'+id).css({ 'display': "none" });

             }
             else{
              $('#nocomment_'+id).html(parseInt(nocomment)-parseInt(1));
             }
             
          });
      }   

      function report(id){
        $.ajax({
            method: "POST",
            url: base_url+"services/report",
            data: { id: id}
          })
          .done(function( data ) { 
             var obj = $.parseJSON(data);
             if(obj.Ack == 1){
                $('#report_'+id).html('<i class="ion-ios-information" style="color: #d8ad57"></i> Report');
             }
             else{
              $('#report_'+id).html('<i class="ion-ios-information"></i> Report');
             }
             
          });
      }


      function twShare(url, title, descr, image, winWidth, winHeight) {
        var winTop = (screen.height / 2) - (winHeight / 2);
        var winLeft = (screen.width / 2) - (winWidth / 2);
        window.open('http://twitter.com/share?url=' + encodeURI(url) + '&text=' + encodeURI(title) + '', 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width='+winWidth+',height='+winHeight);
    }

    function facebook_share(url, title, descr, image)
    {
        FB.init({
        appId:'220021031884550',
        cookie:true,
        status:true,
        xfbml:true
        });
        FB.ui(
        {
        method: 'feed',
        name: '5star',
        link: url,
        picture: image,
        caption: 'http://111.93.169.90/team6/5star/',
        description: title
        },
        function(response){
          if (response && response.post_id) {
          } else {
          }
        })
    }

    function lnShare(url, title, descr, image, winWidth, winHeight) {
        var articleUrl = encodeURIComponent(url);
         var articleTitle = encodeURIComponent(title);
         var articleSummary = encodeURIComponent(descr);
         var articleSource = encodeURIComponent('Aktively');
         var goto = 'http://www.linkedin.com/shareArticle?mini=true'+
             '&url='+articleUrl+
             '&title='+articleTitle+
             '&summary='+articleSummary+
             '&source='+articleSource;
         window.open(goto, "LinkedIn", "width=800,height=400,scrollbars=no;resizable=no");        
    }


      $(document).ready(function(){
    
    $.ajax({
 type: 'post',
 dataType: 'json',
 url: '<?php echo $this->request->webroot;?>/Users/tmp-image-remove-all',
 data: {
        
     },
                            success: function(data){

                            }
                    });
    var abc = 0;
      $('body').on('click','.upl',function(){
      //alert();
      //$('#add_more').click();
      $(this).before($("<div/>", {
id: 'filediv',
class: 'filediv col-md-6'
}).fadeIn('slow').append($("<input/>", {
name: 'file',
type: 'file',
id: 'file'
}), $("<br/><br/>")));
//$('#file').click();
$(this).prev().find('#file').click();
      });

$('#add_more').click(function() { //alert('here');
$(this).before($("<div/>", {
id: 'filediv',
class: 'filediv col-md-6'
}).fadeIn('slow').append($("<input/>", {
name: 'file',
type: 'file',
id: 'file'
}), $("<br/><br/>")));
//$('#file').click();
$(this).prev().find('#file').click();
});


$('body').on('change', '#file', function() {
//
 //var file_data = $('#file').prop('files')[0];  
 $('#lod_img').show();
  var file_data = $(this).prop('files')[0]; 
    var form_data = new FormData();                  
    form_data.append('file', file_data);
    //alert(form_data);
        
       // $('#postfrm').serialize()
         $.ajax({
                            url: '<?php echo $this->request->webroot;?>/Users/user-upload-temp-image',
                             dataType: 'text',  // what to expect back from the PHP script, if anything
                              cache: false,
                              contentType: false,
                              processData: false,
                             data: form_data,                         
                             type: 'post',
                            success: function(data){ //alert(data);
                                if(data)
                                {
                $('#lod_img').hide();
                //$('#file').val('');
                   //$('.close').click();
                                 // $("#post_time").prepend( data );  
                                }  
                                else
                                {
                                   
                                }
                            }
                    });
//
$('#uplimg').css('display','block');
if (this.files && this.files[0]) {
abc += 1; // Incrementing global variable by 1.
var z = abc - 1;
var x = $(this).parent().find('#previewimg' + z).remove();
$(this).before("<div id='abcd_" + abc + "' class='abcd '><img class='uplimg' id='previewimg" + abc + "' src='' /></div>");
var reader = new FileReader();
reader.onload = imageIsLoaded;
reader.readAsDataURL(this.files[0]);
$(this).hide();
$("#abcd_" + abc).append($("<img/>", {
id: 'img',
class:'uplimg_t',
src: '<?php echo $this->request->webroot;?>/img/x.png',
alt: 'delete',
}).click(function() {
var tmp_id = $(this).parent().attr("id");
abc = abc-1;
$('#lod_img').show();
$.ajax({
 type: 'post',
 dataType: 'json',
 url: '<?php echo $this->request->webroot;?>/Users/tmp-image-remove',
 data: {
        id:tmp_id
     },
                            success: function(data){ //alert(data);
                                if(data)
                                {  
                  tmp_id =0;
                 $('#lod_img').hide();
                                }  
                                else
                                {
                                   
                                }
                            }
                    });
//alert(tmp_id);

 $(this).parent().parent().remove();
}));
}
});
function imageIsLoaded(e) {
$('#previewimg' + abc).attr('src', e.target.result);
};


$('body').on('click','#imgp',function(){  // post upload and post
      
       if($('#txt_ar').val() !='')
      {
        $.ajax({
                            url: '<?php echo $this->request->webroot;?>Users/user-post',
                              dataType: 'json',
                              type: 'post',                         
                              data: $('#postfrm').serialize(),
                            success: function(data){ //alert(data);
                                if(data)
                                {
                                  window.location.reload();
                abc = 0;
                $('.filediv').hide();
                $('.filediv').html('');
                $('#uplimg').html('');
                $('.abcd').html('');
                   $('.uplimg_t').val('');
                   $('#txt_ar').val('');
                   //$('.close').click();
                                  $("#post_time").prepend( data );  
                                }  
                                else
                                {
                                   
                                }
                            }
                    });
          
        }
        else
        {
          //alert('post not blank');
          $('#post_err').html('post not blank');
          $('#txt_ar').focus();
        }
      });
    });
  </script>
  