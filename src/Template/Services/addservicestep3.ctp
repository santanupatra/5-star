 <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script> -->
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<script>
        $(document).ready(function(){
          $("#sortable").sortable({
              stop : function(event, ui){
                  $.ajax({
                    method: "POST",
                    url: base_url+"services/order_image",
                    data: { ids: $(this).sortable('toArray')}
                  })
                .done(function( data ) {
                 var obj = jQuery.parseJSON( data );
                  
                });
                //alert($(this).sortable('toArray'));
              }
          });
        $("#sortable").disableSelection();
      });//ready
  </script>
	<section class="user-dashboard">
		<div class="container">
			<div class="row">
				<?php echo $this->element('side_menu');?>
				<div class="col-lg-9 col-md-8">
					<div class="edit-pro p-3 p-lg-4">
						<h5 class="common-title mb-3 pb-2">Add Venue</h5>
						<div class="row mb-5">
							<div class="col-lg-10 ml-auto mr-auto">
								<div class="step-holder d-flex justify-content-between">
									<div class="round rounded-circle text-uppercase active"><span>Basic Info</span></div>
									<div class="round rounded-circle text-uppercase active"><span>VENUE DETAILS</span></div>
									<div class="round rounded-circle text-uppercase active"><span>INSERT PHOTOS</span></div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<form method="post" action="<?php echo $this->Url->build(["controller" => "Services","action" => "addservicestep3",$service->id]);?>" enctype='multipart/form-data'>
									<input type="hidden" name="service_id" id="service_id" value="<?php echo $service->id;?>">
									<input type="hidden" name="total_image" id="total_image" value="<?php echo count($all_image);?>">
									<h5 class="mt-4 mb-4">Insert Photo</h5>
									<div class="company-images">                    
					                       <div class="fileUpload btn btn-primary">
					                          <span>Upload Image</span>
					                          <input type="file" id="multiFiles" name="files[]" multiple="multiple" class="upload"/>
					                      </div>

					                    <span id="status" ></span> 
					                   </div>
									<div class="row flex-parant">
						                
						                
						                <div class="col-md-12 col-sm-6 item">
						                  <h3>Manage Photo</h3>
						                  <img id="image_loader_product" src="<?php echo $this->request->webroot  ?>images/loader.gif" style="height: 300px">
						                  <div class="manage-photo" id="product_images">
						                  <ul id="sortable">
						                    <?php
						                      foreach ($all_image as $image) { 
						                      //pr($image);                     
						                      
						                    ?>
						                    <li id="<?php echo $image->id;?>">
						                    <div class="media" id="image_<?php echo $image->id;?>">
						                      <div class="media-left">
												<div class="mi-img">			
						                        <a href="#">
						                          <img src="<?php echo $this->request->webroot;?>service_img/<?php echo $image->name;?>" alt="" class="img-fluid" />
						                        </a>
												</div>
						                      </div>
						                      <div class="media-body media-middle">
						                        <span style="padding-left: 0 !important; text-align: center; padding: 5px 0 0!important;"><?php echo $image->name;?></span>
						                         <span> 
						                         <input type="text" name="title_<?php echo $image->id;?>" class="form-control" value="<?php echo $image->title;?>" placeholder="Photo comments">
						                         </span>
						                      </div>
						                      <div class="media-body media-middle">
						                          <a class="btn btn-danger btn-sm rounded-0" style="color: #fff" onclick="javascript: delete_image(<?php echo $image->id;?>)"><i class="icon ion-android-delete text-white"></i> Delete</a>                         
						                      </div>
						                    </div>
						                    </li>
						                    <?php
						                  }
						                  ?>
						                  </ul>
						                  </div>
						                </div>
						              </div>  
									<!-- <div class="form-group row">
										<label for="staticEmail" class="col-sm-4 col-form-label">Add File:</label>
										<div class="fileupload fileupload-new" data-provides="fileupload">
                                        
                                      <div> 
                                          <input type="file" class="form-control" id="image" name="image"/>
                                          </div>
                                                                                    <div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;">
                                            <?php $filePath = WWW_ROOT . 'service_img' .DS. $service->image; ?>
                                            <?php if ($service->image != "" && file_exists($filePath)) { ?>
                                                <img src="<?php echo $this->Url->build('/service_img/'.$service->image); ?>" width="150px" height="150px" />
                                            <?php } ?>
                                        </div>
                                    </div>
									</div> -->
									<div class="row">
										<div class="col-sm-12 text-right mt-3">
	                                        <button type="submit" class="btn btn-primary btn-lg">Submit</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</section>

	 <script type="text/javascript">
    $( document ).ready( function () {
    	$('#image_loader_product').hide();
        $('#multiFiles').on('change',function(){
        	$('#image_loader_product').show();
            var form_data = new FormData();
            var ins = document.getElementById('multiFiles').files.length;
           
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('multiFiles').files[x]);
            }
            $.ajax({
                url: base_url+'services/upload_photo/'+$('#service_id').val(), // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (response) {
                	$('#image_loader_product').hide();
                     var obj = jQuery.parseJSON( response );
                     if(obj.Ack == 1){
                      $('#total_image').val(parseInt($('#total_image').val())+obj.data.length);
                      for(var i = 0; i < obj.data.length; i++){
                          file_path = base_url+'service_img/'+obj.data[i].filename;
                        $('<li id="'+obj.data[i].last_id+'"></li>').appendTo('#sortable').html('<div class="media" id="image_'+obj.data[i].last_id+'"><div class="media-left"><a href="#"><img style="width: 100px; height: 100px" src="'+file_path+'" alt="" /></a></div><div class="media-body media-middle"><span style="padding-left: 10px;">'+obj.data[i].filename+'</span><span style="padding-left: 10px;"><input type="text" name="title_'+obj.data[i].last_id+'" class="form-control" value="" placeholder="Photo comments"></span></div><div class="media-body media-middle"><a class="btn btn-danger btn-sm rounded-0" style="color: #fff" onclick="javascript: delete_image('+obj.data[i].last_id+')"><i class="icon ion-android-delete text-white"></i>Delete </a></div></div></div></li>');
                      }
                     }
                },
                error: function (response) {
                    $('#msg').html(response); // display error response from the PHP script
                }
            });
        });


    } );

    function delete_image(id){
      $.ajax({
            method: "POST",
            url: base_url+"services/delete_image",
            data: { id: id}
          })
          .done(function( data ) {
           var obj = jQuery.parseJSON( data );
            if(obj.Ack  == 1){
            $('#total_image').val(parseInt($('#total_image').val())-1);                   
              $('#image_'+id).html("");
            }
          });
    }
  </script>



    
    
