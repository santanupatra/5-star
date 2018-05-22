<div class="clearfix"></div>
<?php echo $this->element('profile_head');?>

<div class="clearfix"></div>

<section class="edit-profil-detaildiv">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				
                          <?php echo $this->element('side_menu');?>  
                            
			</div>
            
          <div class="col-md-8">
            <div class="row">
                <?php //pr($favourite);
                if(!empty($favourite)){
                foreach($favourite as $dt){
                ?>
              <div class="col-md-6" id="fav<?php echo $dt['id'];?>">
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
                 <div class="col-md-8">
                     <div class="row">
                         
                      Sorry! No data found..   
                         
                     </div>
                 </div>
                <?php } ?>

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