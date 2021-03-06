<?php echo $this->element('profile_head'); ?>
<section class="pt-5 pb-5">
    <div class="container">
        <div class="row">

            <?php echo $this->element('side_menu'); ?>

            <div class="col-lg-9">
                <div class="bg-gray p-3">
                    <form method="post" action="<?php echo $this->Url->build(["controller" => "Users", "action" => "addmultiplephoto"]); ?>">
                        <div class="form-group">

                            <label class="control-label col-lg-12 p-0">Upload Photos</label>  
                            <div class="company-images col-lg-12 p-0">

                                <input type="hidden" name="image" id="product_image_id">
                                <div class="fileUpload btn btn-primary">

                                    <input type="file" id="multiFiles" name="files[]" multiple="multiple" class="upload"/>
                                </div>

                                <span id="status" ></span> 
                            </div>
                            <div class="manage-photo" id="product_images" style="overflow:scroll; height:450px;width:500px;">
                                <ul id="sortable" class="uisortable">
                                    <?php
                                    foreach ($all_image as $image) {
                                        ?>
                                        <li id="<?php echo $image->id; ?>">
                                            <div class="media" id="image_<?php echo $image->id; ?>">
                                                <div class="media-left">
                                                    <a href="#">
                                                        <img style="width: 100px; height: 100px" src="<?php echo $this->Url->build('/user_img/' . $image->image_name) ?>" alt="" />
                                                    </a>
                                                </div>
                                                <div class="media-body media-middle">
                                                    <h4><?php echo $image->image_name; ?></h4>
                                                </div>
                                                <div class="media-body media-middle">
                                                    <a class="btn btn-blank" onclick="javascript: delete_image('<?php echo $image->id; ?>')"><button class="btn btn-danger" type="button">Delete</button></a>                         
                                                </div>
                                            </div>
                                        </li>
    <?php
}
?>
                                </ul>

                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 text-center">
                                <button type="submit" name="button" class="btn btn-success"><i class="fa fa-cloud-upload pr-2" aria-hidden="true"></i>UPDATE</button>
                <!--                <button type="button" name="button" class="btn btn-danger"><i class="fa fa-refresh pr-2" aria-hidden="true"></i> RESET</button>-->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    $(document).ready(function () {

        var base_url = '<?php echo $this->request->webroot; ?>';
        $('#multiFiles').on('change', function () {

            var image_url = '<?php echo $this->Url->build('/user_img/'); ?>';

            var form_data = new FormData();
            var ins = document.getElementById('multiFiles').files.length;
//alert(ins);
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", document.getElementById('multiFiles').files[x]);
                //alert('ok');
                // alert(JSON.stringify(document.getElementById('multiFiles').files[x]));
            }
            console.log(form_data);
            $.ajax({
                url: base_url + 'users/uploadphotoaddi', // point to server-side PHP script 
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (response) {
                    console.log(response);
                    var obj = jQuery.parseJSON(response);

                    if (obj.Ack == 1) {

                        //alert('ok');
                        $('#product_image_id').val(obj.image_name);
                        for (var i = 0; i < obj.data.length; i++) {
                            file_path = image_url + obj.data[i].filename;
                            $('<li id="' + obj.data[i].last_id + '"></li>').appendTo('#sortable').html('<div class="media" id="image_' + obj.data[i].last_id + '"><div class="media-left"><a href="#"><img style="width: 100px; height: 100px" src="' + file_path + '" alt="" /></a></div><div class="media-body media-middle"><h4>' + obj.data[i].filename + '</h4></div><div class="media-body media-middle"></div></div></div></li>');
                        }
                    }
                },
                error: function (response) {
                    $('#msg').html(response); // display error response from the PHP script
                }
            });
        });

    });


    function delete_image(id) {

        var base_url = '<?php echo $this->request->webroot; ?>';
        $.ajax({
            method: "GET",
            url: base_url + 'users/deleteimage',
            data: {id: id}
        })
                .done(function (data) {
                    var obj = jQuery.parseJSON(data);

                    if (obj.Ack == 1) {
                        //alert();
                        $('#image_' + id).html("");
                    }
                });
    }
</script>