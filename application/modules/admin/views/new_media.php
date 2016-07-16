<div class="content all_media new_media">
    <div class="content_header">
        <h3>Add new media <a href="<?php echo base_url(); ?>admin/all_media" class="btn btn-primary btn-xs">All media</a></h3>
    </div> 
    <div class="main_content">
        <form id="fileupload" action="<?php echo base_url(); ?>admin/save_media" method="POST" enctype="multipart/form-data">
            <div id="dropzone" class="">
                <div class="upload_button">
                    <h4>Select or drop image to upload.</h4>
                    <input type="file" name="brows_file" id="brows_file">
                </div>
            </div>
        </form>
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



<script type="text/javascript">
    $(function () {
        'use strict';
        /**
         * This click function is for load media on tab change.
         */
        $('.select_media_tab a').click(function () {
            ajax_media();
            $("#modal_hidden_input").val("");
        });
        /**
         * This change function is for upload Media and change tab with select uploaded item.
         */
        $('#brows_file').change(function () {
            var file_data = $(this).prop("files")[0];
            var form_data = new FormData();
            form_data.append("file", file_data)
            $('.loading-img').show();
            $.ajax({
                url: base_url + 'admin/save_media',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (data) {
                    $('#dropzone').addClass('uploading');
                    if (data == 'error') {
                        alert('File Type not Allow.');
                    } else {
                        ajax_media(1);
                        window.location = "<?php echo base_url(); ?>admin/all_media";
                    }
                }
            });
        });
    }
    );
    /**
     * This function is for load ajax media.
     * @type String
     * @param {null} active is to selecte first item when uploaded.
     */
    function ajax_media(active = null) {
        var html_text = '';
        $.ajax({
            url: base_url + 'admin/all_media_imgs',
            cache: false,
            contentType: false,
            processData: false,
            type: 'post',
            datatype: 'json',
            success: function (data) {
                var json = $.parseJSON(data);
                $.each(json, function (index, value) {
                    var src = '<?php echo base_url() ?>' + 'uploads/' + value.media_path + '150_150/' + value.media_name;
                    var status = 'not_selected';
                    if (active != null && index == 0) {
                        status = 'selected';
                        $("#modal_hidden_input").val(value.media_id + ' ');
                    }
                    html_text += '<li class="col-md-2">' +
                            '<label data-status="' + status + '" for="media_item_' + value.media_id + '" class="item ' + status + '">' +
                            '<input type="hidden" value="' + value.media_id + '" name="media_item_' + value.media_id + '" id="media_item_' + value.media_id + '">' +
                            '<img class="img-responsive" alt="" src="' + src + '">' +
                            '<div class="selected_icon">' +
                            '<span class="glyphicon glyphicon-ok"></span>' +
                            '</div>' +
                            '</label>' +
                            '</li>';
                });
                $('#existing_media ul').html(html_text);
                $('.item').click(function () {
                    var data_status = $(this).attr('data-status');
                    var modal_hidden_input_val = $('#modal_hidden_input').val();
                    demo_image_url = $(this).children('img').attr('src');
                    var item_id = $(this).children().val();
                    if (multiple === 'true') {
                        if (data_status == 'not_selected') {
                            $(this).addClass('selected');
                            $(this).attr('data-status', 'selected');
                            if (empty(modal_hidden_input_val)) {
                                $('#modal_hidden_input').val(item_id + ' ');
                            } else {
                                $('#modal_hidden_input').val(modal_hidden_input_val + item_id + ' ');
                            }
                        } else {
                            $(this).removeClass('selected');
                            $(this).attr('data-status', 'not_selected');
                            var str = modal_hidden_input_val;
                            var modal_hidden_input_val = str.replace(item_id + ' ', '');
                            $('#modal_hidden_input').val(modal_hidden_input_val);
                        }
                    } else {
                        if (data_status == 'not_selected') {
                            $('#select_media .item').removeClass('selected');
                            $(this).attr('data-status', 'not_selected');
                            $(this).addClass('selected');
                            $(this).attr('data-status', 'selected');
                            $('#modal_hidden_input').val(item_id + ' ');
                        } else {
                            $('#select_media .item').removeClass('selected');
                            $('#select_media .item').attr('data-status', 'not_selected');
                            $('#modal_hidden_input').val('');
                        }
                    }
                });
            }
        });
    }

    /**
     * empty function is to check input field's value
     * @param {type} str
     * @returns {Boolean}
     */
    function empty(str) {
        if (!str || str.length === 0 || str === "" || typeof str == 'undefined' || !/[^\s]/.test(str) || /^\s*$/.test(str) || str.replace(/\s/g, "") === "") {
            return true;
        } else {
            return false;
        }
    }
</script>


