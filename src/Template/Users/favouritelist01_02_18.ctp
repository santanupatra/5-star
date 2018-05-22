<?php echo $this->element('profile_head');?>
    <section class="pt-5 pb-5">
      <div class="container">
        <div class="row">
          
            <?php echo $this->element('side_menu');?>
            
          <div class="col-lg-9">
            <div class="row">
                <?php //pr($favourite);
                if(!empty($favourite)){
                foreach($favourite as $dt){
                ?>
              <div class="col-md-4" id="fav<?php echo $dt['id'];?>">
                <div class="card">
                  <div class="hdr">
                    <div class="img" style="background-image: url('<?php echo $this->Url->build('/user_img/'.$dt['service']['user']['pimg']); ?>')"></div>
                    <div class="txt">
                      <h4><?php echo $dt['service']['user']['full_name']?></h4>
                      <p><?php echo $dt['service']['service_name']?></p>
                    </div>
                    <div class="love">
                        <a href="javascript:void(0)" onclick="chk_delete_to_faviouritelist_valid('<?php echo $dt['id'];?>')"><i class="fa fa-times" aria-hidden="true"></i></a>
                    </div>
                  </div>
                    <a href="<?php echo $this->Url->build(["controller" => "Users","action" => "servicedetails",$dt['service']['id']]);?>"><div class="img-prt" style="background-image: url('<?php echo $this->Url->build('/service_img/'.$dt['service']['image']); ?>')"></div></a>
                 
                  <div class="btn-grp">
                      <?php foreach($dt['service']['service_provider_tags'] as $t){?>
                    <button type="button" name="button" class="btn btn-secondary btn-sm"><?php echo $t['tag']['tag_name']?></button>
<!--                    <button type="button" name="button" class="btn btn-secondary btn-sm">Lactose free</button>-->
                    <?php } ?>
                  </div>
                 
                  
                  <div class="moreTxt">
                    <div><?php echo $dt['service']['description']?></div>
                    <a href="<?php echo $this->Url->build(["controller" => "Users","action" => "servicedetails",$dt['service']['id']]);?>">Read More >></a>
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
                <?php }}else{ ?>
                 <div class="col-lg-9">
                     <div class="row">
                         
                      Sorry! No data found..   
                         
                     </div>
                 </div>
                <?php } ?>
<!--              <div class="col-md-4">
                <div class="card">
                  <div class="hdr">
                    <div class="img" style="background-image: url('image/pp.jpg')"></div>
                    <div class="txt">
                      <h4>John Doe</h4>
                      <p>Restaurant Name</p>
                    </div>
                    <div class="love">
                      <i class="fa fa-times" aria-hidden="true"></i>
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
              <div class="col-md-4">
                <div class="card">
                  <div class="hdr">
                    <div class="img" style="background-image: url('image/pp.jpg')"></div>
                    <div class="txt">
                      <h4>John Doe</h4>
                      <p>Restaurant Name</p>
                    </div>
                    <div class="love">
                      <i class="fa fa-times" aria-hidden="true"></i>
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
              <div class="col-md-4">
                <div class="card">
                  <div class="hdr">
                    <div class="img" style="background-image: url('image/pp.jpg')"></div>
                    <div class="txt">
                      <h4>John Doe</h4>
                      <p>Restaurant Name</p>
                    </div>
                    <div class="love">
                      <i class="fa fa-times" aria-hidden="true"></i>
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
              </div>-->
            </div>
          </div>

            <div class="paginator">
                <ul class="pagination">
            <?php echo $this->Paginator->prev('< ' . __('previous')) ?>
            <?php echo $this->Paginator->numbers(array('separator' => '')) ?>
            <?php echo $this->Paginator->next(__('next') . ' >') ?>
                </ul>
                <p><?php //echo $this->Paginator->counter() ?></p>
            </div>
        </div>
      </div>
    </section>
    
<script>
function chk_delete_to_faviouritelist_valid(id) {

        var base_url = '<?php echo $this->request->webroot; ?>';
        $.ajax({
            method: "GET",
            url: base_url + 'users/deletefavourite',
            data: {id: id}
        })
                .done(function (data) {
                    var obj = jQuery.parseJSON(data);

                    if (obj.Ack == 1) {
                        //alert();
                        $('#fav' + id).html("");
                    }
                });
    }



</script>   