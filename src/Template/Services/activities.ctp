<section class="user-dashboard">
    <div class="container">
      <div class="row">      
        <?php echo $this->element('side_menu');?>
        <div class="col-lg-9 col-md-8">
          <!-- <div class="vendor-dashboard-top mb-3">
            <ul class="links d-flex list-unstyled p-3 mb-0">
              <li><a href=""><i class="ion-compose"></i> Update Status</a></li>
              <li><a href=""><i class="ion-camera"></i> Add Photos/Videos</a></li>
              <li><a href=""><i class="ion-image"></i> Create Photo Album</a></li>
            </ul>
            <div class="msg-body p-3">
              <textarea rows="3" class="form-control" placeholder="What’s on your mind"></textarea>
            </div>
            <div class="msg-bottom px-3 py-2">
              <ul class="d-flex list-unstyled mb-0">
                <li><a href=""><i class="ion-compose"></i></a></li>
                <li><a href=""><i class="ion-camera"></i></a></li>
                <li><a href=""><i class="ion-image"></i></a></li>
              </ul>
            </div>
          </div> -->
          
          <div class="recent-post-wrap">
            <h5 class="common-title mb-0 p-3">Recend Activities</h5>
            <div class="p-3">
              <?php
                if(count($services) > 0){
                  foreach($services as $service){
                    

                    $current_date= date('Y-m-d H:i:s');
                   $post_date = $service->Services->created; 
                                            
                    $date1 = new DateTime($post_date);  
                    $date2 = $date1->diff(new DateTime($current_date));
                    
                    $likes = 0;
                    $reports = 0;
                    foreach ($service->Services->likes as $like) {
                      if($like->user_id == $uid)
                          {
                            $likes = 1;
                          }
                    }

                    foreach ($service->Services->reports as $report) {
                      if($report->user_id == $uid)
                          {
                            $reports = 1;
                          }
                    }
                ?>
                <div class="post-wrap mb-3">
                  <div class="left-side mr-2">
                    <img src="<?php echo $this->request->webroot;?>/user_img/thumb_<?php echo (($service->Services->user->pimg != "")? $service->Services->user->pimg : 'nouser.png');?>" class="user-image rounded-circle" alt="">

                      <div class="dashbrd-right-textdiv">
                        <p class="name mb-0"><?php echo $service->Services->user->full_name;?></p>
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
                        ago</small>
                      </div> <!--  dashbrd-right-textdiv -->                     
                  </div>

                  <div class="right-side">
                    <div class="post-image mb-2">
                       <a href="<?php echo $this->Url->build(["controller" => "Services","action" => "details",$service->Services->id]);?>"><img src="<?php echo $this->request->webroot;?>service_img/<?php echo (($service->Services->image != "")? $service->Services->image : 'nouser.png');?>" alt="" class="img-fluid"></a>
                    </div>
                    <p class="like-comment text-right mb-2">
                      <span id="nolike_<?php echo $service->Services->id;?>"><?php echo count($service->Services->likes);?></span> <span class="grey-text">Likes</span>   <span class="grey-text"> |</span>
                      <span id="nocomment_<?php echo $service->Services->id;?>"><?php echo count($service->Services->comments);?></span> <span class="grey-text">Comment</span>
                    </p>
                    <ul class="posted-extra-links d-flex list-unstyled mb-0 py-1">
                      <li><a href="javascript: like(<?php echo $service->Services->id;?>);" id='like_<?php echo $service->Services->id;?>'><i class="ion-thumbsup" <?php echo (($likes == 1)? 'style="color: #d8ad57"' : '');?>></i> Like</a></li>                    
                      <li><a href="javascript: comment(<?php echo $service->Services->id;?>);"><i class="ion-ios-chatbubble-outline"></i> Comment</a></li>

                     <li class="dropup social-share"><a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ion-android-share-alt"></i> Share</a>
                      
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="#" onclick="facebook_share('<?php echo $this->Url->build(["controller" => "Services","action" => "details",$service['id']]);?>', '<?php echo $service->Services->service_name;?>', '<?php echo $service->Services->description;?>', '<?php echo $this->request->webroot.'service_img/'.(($service->image != "")? $service->Services->image : 'nouser.png');?>')"><i class="ion-social-facebook"></i>Facebook</a>

                          <a class="dropdown-item" href="javascript:twShare('<?php echo $this->Url->build(["controller" => "Services","action" => "details",$service['id']]);?>', '<?php echo $service->service_name;?>', '', '<?php echo $this->request->webroot.'service_img/'.(($service->Services->image != "")? $service->image : 'nouser.png');?>', 520, 350)"><i class="ion-social-twitter"></i>Twitter</a>

                          <a class="dropdown-item" href="javascript:lnShare('<?php echo $this->Url->build(["controller" => "Services","action" => "details",$service['id']]);?>', '<?php echo $service->Services->service_name;?>', '', '<?php echo $this->request->webroot.'service_img/'.(($service->Services->image != "")? $service->Services->image : 'nouser.png');?>', 520, 350)"><i class="ion-social-linkedin"></i>linkedin</a>

                          
                        </div>
                      
                      </li>  

                      <li><a href="javascript: report(<?php echo $service->Services->id;?>);" id='report_<?php echo $service->Services->id;?>'><i class="ion-ios-information" <?php echo (($reports == 1)? 'style="color: #d8ad57"' : '');?>></i> Report</a></li>
                    </ul>
                      <!-- +++++++++++++++Comment++++++++++++++-->
                        <div class="foo w-100 bg-light p-md-2 float-left" style="display: none;" id="comment_<?php echo $service->Services->id;?>">
                            <div class="form-group">
                              <div class="row">
                                <div class="col-md-10">
                                  <textarea id="ctext_<?php echo $service->Services->id;?>" class="form-control form-control-sm" cols="5" rows="2" placeholder="Message Here. . . ."></textarea>
                                  </div>
                                  <div class="col-md-2">
                                   <input type="button" value="Submit" class="btn btn-primary text-white text-center ml-md-3 mt-md-2 rounded-0 text-uppercase" onclick="javascript:addcomment(<?php echo $service->Services->id;?>)">
                                </div>                             
                              </div>
                              <div class="row" style="height: 10px"></div>
                              <div class="row">
                                <div class="col-md-12" id="all_comment_<?php echo $service->Services->id;?>">

                                </div>                          
                              </div>                            
                            </div>
                        </div> 
                        <!-- +++++++++++++++Comment End++++++++++++++--> 
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
                $('#like_'+id).html('<i class="ion-thumbsup" style="color: #d8ad57"></i> Like');
                $('#nolike_'+id).html(parseInt(nolike)+parseInt(1));
             }
             else{
                 $('#like_'+id).html('<i class="ion-thumbsup"></i> Like');
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
        $('#comment_'+id).slideToggle();
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
        name: 'Aktively',
        link: url,
        picture: image,
        caption: 'aktively.com',
        description: descr
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
  </script>