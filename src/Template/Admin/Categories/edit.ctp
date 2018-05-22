   <?php ?> 
  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
  <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>
  <script>
    $(document).ready(function() {
        $('#summernote').summernote();
        $('#editor1').summernote({
            defaultFontName: 'Lato',
            height: 300,                 // set editor height
            width: 800,
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: true,                  // set focus to editable area after initializing summernote
            popover: {
                        image: [
                          ['imagesize', ['imageSize100', 'imageSize50', 'imageSize25']],
                          ['float', ['floatLeft', 'floatRight', 'floatNone']],
                          ['remove', ['removeMedia']]
                        ],
                        link: [
                          ['link', ['linkDialogShow', 'unlink']]
                        ],
                        air: [
                          ['color', ['color']],
                          ['font', ['bold', 'underline']],
                          ['fontsize', ['8', '9', '10', '11', '12', '14', '18', '24', '36']],
                          ['para', ['ul', 'paragraph']],
                          ['table', ['table']],
                          ['insert', ['link', 'picture']]
                          ['style', ['style']],
                          ['text', ['bold', 'italic', 'underline', 'color', 'clear']],
                          ['para', [ 'paragraph']],
                          ['height', ['height']],
                          ['font', ['Lato','Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Merriweather']],
                        ]
                      },
            onblur: function() {
                var text = $('#editor').code();
                text = text.replace("<br>", " ");
                $('#description').val(text);
            }
          
        });
    });
  </script>

<div id="content">
    <div class="inner">
        <div class="row">
            <div class="col-lg-12">
                <h1 > Category </h1>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <header>
                        <div class="icons"><i class="icon-th-large"></i></div>
                        <h5>Edit Category</h5>
                        <div class="toolbar">
                            <ul class="nav">
                                <li style="margin-right:15px">
                                    <div class="btn-group"> 
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </header>
                    <div id="collapseOne" class="accordion-body collapse in body">
                        <div class="col-sm-6">

                            <div class="row">
				  <?php echo $this->Form->create($category,['class' => 'form-horizontal', 'id' => 'cat-validate', 'enctype' => 'multipart/form-data']);?>

                                <div class="form-group">
                                    <label class="control-label col-lg-4">  Name </label>
                                    <?php echo '<div class="col-lg-8">'.$this->Form->input('name', array('class'=>'form-control','label' => false, 'style' => 'width:800px')).'</div>'; ?>
                                </div>
                                <!--
                                <div class="form-group">
                                    <label class="control-label col-lg-4">  Slug </label>
                                    <?php echo '<div class="col-lg-8">'.$this->Form->input('slug', array('class'=>'form-control','label' => false, 'style' => 'width:800px')).'</div>'; ?>
                                </div>   --->                             
                                <!--
                                 <div class="form-group">
                                    <label class="control-label col-lg-4"> Description </label>
                                    <?php echo '<div class="col-lg-8">'.$this->Form->textarea('description', array('class'=>'form-control','label' => false,'id'=>'editor1')).'</div>'; ?>
                                </div>   -->                             
                                <!---
                                <div class="form-group">
                                  <label class="control-label col-lg-4">Category Image </label>
                                  <div class="col-lg-8">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;">
                                            <?php $filePath = WWW_ROOT . 'category_img' .DS.$category->image; ?>
                                            <?php if ($category->image != "" && file_exists($filePath)) { ?>
                                                <img src="<?php echo $this->Url->build('/category_img/'.$category->image); ?>" width="150px" height="150px" />
                                            <?php } ?>
                                        </div>
                                      <div> <span class="btn btn-file btn-success"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
                                        <input type="file" id="image" name="image" />
                                        </span> <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a> </div>
                                    </div>
                                  </div>
                                </div>                                 
                                -->
                                <!---
                                <div class="form-group">
                                    <label class="control-label col-lg-4">  Meta Title </label>
                                    <?php echo '<div class="col-lg-8">'.$this->Form->input('meta_title', array('class'=>'form-control','label' => false, 'style' => 'width:800px')).'</div>'; ?>
                                </div>  -->                              
                                <!--
                                <div class="form-group">
                                    <label class="control-label col-lg-4">  Meta Keywords </label>
                                    <?php echo '<div class="col-lg-8">'.$this->Form->input('meta_key', array('class'=>'form-control','type' => 'textarea','label' => false, 'style' => 'width:800px')).'</div>'; ?>
                                </div>                                
                                -->
                                <!---
                                <div class="form-group">
                                    <label class="control-label col-lg-4">  Meta Description </label>
                                    <?php echo '<div class="col-lg-8">'.$this->Form->input('meta_description', array('class'=>'form-control','type' => 'textarea','label' => false, 'style' => 'width:800px')).'</div>'; ?>
                                </div>
                                -->
                                <div class="form-group">
                                    <label class="control-label col-lg-4">  Is Active ? </label>
                                    <?php echo '<div class="col-lg-8">'.$this->Form->input('is_active', array('label' => false, 'type' => 'checkbox')).'</div>'; ?>
                                </div>   
                                <!--
                                <div class="form-group">
                                    <label class="control-label col-lg-4">  Is Display Home Page ? </label>
                                    <?php echo '<div class="col-lg-8">'.$this->Form->input('is_displayhome', array('label' => false, 'type' => 'checkbox')).'</div>'; ?>
                                </div>   -->

                                <label class="control-label col-lg-4"></label>
                                <div class="col-lg-8" style="text-align:left;"> 
                                    <input type="submit" name="submit" value="Edit Category" class="btn btn-primary" />
                                </div>
                                </form>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $("#name").blur(function(){
                var Text = $(this).val();
                Text = Text.toLowerCase();
                Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
                $("#slug").val(Text+'-health');        
        });        
    });
</script>
