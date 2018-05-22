<?php
                 //pr($service); 
print_r($service);exit;
                 $current_date= date('Y-m-d H:i:s');
                 $post_date = $service->create_date; 
                                          
                  $date1 = new DateTime($post_date);  
                  $date2 = $date1->diff(new DateTime($current_date));
                  
                  $likes = 0;
                  $reports = 0;
                 
              ?>
              <div class="post-wrap d-flex mb-3">
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
                  ago</small>
                  <div class="post-image mb-2">
                    <a href="<?php echo $this->Url->build(["controller" => "Services","action" => "details",$service['id']]);?>"><img src="<?php echo $this->request->webroot;?>service_img/<?php echo (($service->image != "")? $service->image : 'nouser.png');?>" alt="" class="img-fluid"></a>
                  </div>
                  <p class="like-comment text-right mb-2">
                    <span id="nolike_<?php echo $service['id'];?>"><?php echo count($service->likes);?></span> <span class="grey-text">Likes</span>   <span class="grey-text"> |</span>
                    <a href="javascript: comment(<?php echo $service['id'];?>);"><span id="nocomment_<?php echo $service['id'];?>"><?php echo count($service->comments);?></span> <span class="grey-text">Comment</span></a>
                  </p>
                  <ul class="posted-extra-links d-flex list-unstyled mb-0 py-1">
                    <li><a href="javascript: like(<?php echo $service['id'];?>);" id='like_<?php echo $service['id'];?>'><i class="ion-thumbsup" <?php echo (($likes == 1)? 'style="color: #d8ad57"' : '');?>></i> Like</a></li>
                    <li><a href="javascript: comment(<?php echo $service['id'];?>);"><i class="ion-ios-chatbubble-outline"></i> Comment</a></li>
                    <li class="dropup social-share"><a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ion-android-share-alt"></i> Share</a>
                    
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="#" onclick="facebook_share('<?php echo $this->Url->build(["controller" => "Services","action" => "details",$service['id']]);?>', '<?php echo $service->service_name;?>', '<?php echo $service->description;?>', '<?php echo $this->request->webroot.'service_img/'.(($service->image != "")? $service->image : 'nouser.png');?>')"><i class="ion-social-facebook"></i>Facebook</a>

                        <a class="dropdown-item" href="javascript:twShare('<?php echo $this->Url->build(["controller" => "Services","action" => "details",$service['id']]);?>', '<?php echo $service->service_name;?>', '', '<?php echo $this->request->webroot.'service_img/'.(($service->image != "")? $service->image : 'nouser.png');?>', 520, 350)"><i class="ion-social-twitter"></i>Twitter</a>

                        <a class="dropdown-item" href="javascript:lnShare('<?php echo $this->Url->build(["controller" => "Services","action" => "details",$service['id']]);?>', '<?php echo $service->service_name;?>', '', '<?php echo $this->request->webroot.'service_img/'.(($service->image != "")? $service->image : 'nouser.png');?>', 520, 350)"><i class="ion-social-linkedin"></i>linkedin</a>

                        
                      </div>
                    
                    </li>                    
                    <li><a href="javascript: report(<?php echo $service['id'];?>);" id='report_<?php echo $service['id'];?>'><i class="ion-ios-information" <?php echo (($reports == 1)? 'style="color: #d8ad57"' : '');?>></i> Report</a></li>
                  </ul>
                    <!-- +++++++++++++++Comment++++++++++++++-->
                      <div class="foo w-100 bg-light p-md-2 float-left" style="display: none;" id="comment_<?php echo $service['id'];?>">
                          <div class="form-group">
                            <div class="row">
                              <div class="col-md-10">
                                <textarea id="ctext_<?php echo $service['id'];?>" class="form-control form-control-sm" cols="5" rows="2" placeholder="Message Here. . . ."></textarea>
                                </div>
                                <div class="col-md-2">
                                 <input type="button" value="Post" class="btn btn-primary text-white text-center ml-md-3 mt-md-2 rounded-0 text-uppercase" onclick="javascript:addcomment(<?php echo $service['id'];?>)">
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
                </div>
              </div>
              