<div class="content all_media">
    <div class="content_header">
        <h3>All Medias <a href="<?php echo base_url(); ?>admin/new_media" class="btn btn-primary btn-xs">Add New</a></h3>
    </div> 
    <div class="main_content">
        <div class="all_items">
            <?php
            foreach ($all_media as $single_media) {
                ?>
                <div class="item" data-toggle="modal" data-target="#media_details" data-id="<?php echo $single_media->media_id; ?>">
                    <div class="img_table">
                        <div class="img_row">
                            <div class="img_col">
                                <img src="<?php echo base_url('uploads/' . $single_media->media_path . '150_150/' . $single_media->media_name); ?>" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?> 
        </div>
    </div>
</div>

<!-- Modal -->
<link rel="stylesheet" href="<?php echo base_url('assets/admin/css/media_modal.css'); ?>" />
<div class="modal fade media_modal" id="media_details" tabindex="-1" role="dialog" aria-labelledby="media_details">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Media Details</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="image_container">
                            <img src="" alt="" class="img_view" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="media_details">
                            <ul>
                                <li>
                                    <strong>File Name : </strong> <span id="file_name"></span>
                                    <form action="" id="media_details">
                                        <div class="form-group">
                                            <input type="text" id="file_caption" class="form-control" placeholder="File Caption" />
                                            <input type="hidden" id="media_id" name="media_id" value="5" />
                                        </div>
                                        <div class="form-group">
                                            <textarea name="media_description" id="media_description" class="form-control" rows="8" placeholder="File Details"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" value="Save" class="btn btn-primary" />
                                        </div>
                                        <div class="form-group">
                                            <div class="alert alert-success alert-dismissible alert_msg updated" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <strong>Success!</strong> File information updated successfully.
                                            </div>
                                        </div>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>  
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('.item').click(function () {
            var media_id = $(this).attr('data-id');
            var img_src = $(this).children().children().children().children('img').attr('src');
            var img_src_large = img_src.replace("150_150", "680_250");
            $('.modal-body img').attr('src', img_src_large);
            $.ajax({
                url: base_url + 'admin/all_media_list/' + media_id,
                type: 'post',
                dataType: 'text',
                success: function (data) {
                    data = $.parseJSON(data);
                    data = data[0];
                    $('#file_name').html(data.media_name);
                    $('#file_caption').val(data.media_caption);
                    $('#media_description').text(data.media_description);
                    $('#media_description').val(data.media_description);
                    $('#media_id').val(data.media_id);
                }
            });
        });

        $("#media_details").submit(function (event) {
            event.preventDefault();
            var media_id = $('#media_details').find('#media_id').val();
            var media_caption = $('#media_details').find('#file_caption').val();
            var media_description = $('#media_details').find('textarea#media_description').val();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url(); ?>admin/update_media_details',
                data: {media_id: media_id, media_caption: media_caption, media_description: media_description},
                success: function (result) {
                    $('.alert_msg.updated').fadeIn().delay(3000).fadeOut("fast", 0);
                }
            });
        });
    });
</script>

