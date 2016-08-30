<link rel="stylesheet" href="<?php echo base_url('assets/plugins/bootstrap-select-1.10.0/dist/css/bootstrap-select.min.css'); ?>" />
<div class="content new_ad">
    <div class="content_header">
        <h3>Add new advertisement <a href="<?php echo base_url(); ?>admin/all_ad" class="btn btn-primary btn-xs">All Advertisement</a></h3>
    </div> 
    <div class="main_content">
        <form action="" method="post">
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-6">
                        <label for="ad_title">Title</label>
                        <input type="text" name="ad_title" id="ad_title" class="form-control" />
                    </div>
                    <div class="col-sm-6">
                        <br />
                        <span class="hints">This is your advertisement title. Can be visible or not. </span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-6">
                        <label for="ad_description">Description</label>
                        <textarea name="ad_description" id="ad_description" class="form-control" rows="4"></textarea>
                    </div>
                    <div class="col-sm-6">
                        <br />
                        <span class="hints">This is your advertisement description. Can be visible or not. </span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <script type="text/javascript">
                        $(document).ready(function () {
                            $('input.ad_type').change(function () {
                                var content_type = $(this).val();
                                var textarea = '<textarea name="" id="code_content" rows="10" class="form-control"></textarea>';
                                var dropzone = '<div id="dropzone2" class="">'
                                        + '<div class="upload_button">'
                                        + '<h5>Select image for article.</h5>'
                                        + '<div class="set_featured_image">'
                                        + '<input type="hidden" name="featured_image" value="null" class="form-control media_id_hidden" />'
                                        + ' <div class="thumb_container">'
                                        + '<img src="<?php echo base_url(); ?>assets/common/images/no_advertisment_image.jpg" alt="" class="img-responsive media_thumb"/>'
                                        + '</div>'
                                        + '<a href="javascript:void(0)" class="btn btn-default select_media_btn" data-parent_id="set_featured_image" data-multiple="false">Select Image</a>'
                                        + '</div>'
                                        + '</div>'
                                        + '</div>';
                                if (content_type == 'code_content') {
                                    $('.ad_content').append(textarea);
                                    $('#dropzone2').remove();
                                } else if (content_type == 'image_content') {
                                    $('.ad_content').append(dropzone);
                                    $('#code_content').remove();
                                }
                                $('.select_media_btn').click(function () {
                                    previous_id = $(this).siblings('input').val();
                                    parent_id = $(this).attr('data-parent_id');
                                    multiple = $(this).attr('data-multiple');
                                    ajax_media(0, previous_id);
                                });
                            });
                        });
                    </script>
                    <div class="col-sm-6">
                        <div>
                            <label>Advertisement Type</label>
                        </div>
                        <div class="ad_type">
                            <div class="item">
                                <input type="radio" value="code_content" name="ad_type" id="ad_type_code" class="ad_type css_checkbox" />
                                <label for="ad_type_code">Code Content</label>
                            </div>
                            <div class="item">
                                <input type="radio" value="image_content" name="ad_type" id="ad_type_image" class="ad_type css_checkbox" />
                                <label for="ad_type_image">Image</label>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="ad_content">

                        </div>
                    </div>
                    <div class="col-sm-6">
                        <br />
                        <span class="hints">Select your advertisement type.</span>
                    </div>
                </div>
            </div> 
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-6">
                        <script type="text/javascript" src="<?php echo base_url('assets/plugins/bootstrap-select-1.10.0/dist/js/bootstrap-select.min.js'); ?>"></script>
                        <label for="ad_description">Page</label>
                        <select name="category" id="category" class="selectpicker form-control" multiple data-live-search="true">
                            <?php
                            foreach ($category as $single_cat) {
                                ?>
                                <option value="<?php echo $single_cat->id; ?>"><?php echo $single_cat->name; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <br />
                        <span class="hints">Select your page name to show this advertisment. </span>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-sm-6">
                        <label for="ad_description">Type</label>
                        <select name="category" id="category" class="selectpicker form-control" multiple>
                            <option value="">Top</option>
                            <option value="">Right</option>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <br />
                        <span class="hints">Select your page name to show this advertisment. </span>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>




<!-- Media Modal Modal -->
<link rel="stylesheet" href="<?php echo base_url('assets/admin/css/media_modal.css'); ?>" />
<div class="modal fade" id="select_media_modal" tabindex="-1" role="dialog" aria-labelledby="select_media_modal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#upload_media" aria-controls="home" role="tab" data-toggle="tab">Upload Media</a></li>
                    <li role="presentation" class="select_media_tab"><a href="#existing_media" aria-controls="profile" role="tab" data-toggle="tab">Select Media</a></li>
                </ul>
            </div>
            <div class="modal-body">
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="upload_media">
                        <form id="fileupload" action="<?php echo base_url(); ?>admin/save_media" method="POST" enctype="multipart/form-data">
                            <div id="dropzone" class="">
                                <div class="upload_button">
                                    <h4>Select or drop image to upload.</h4>
                                    <input type="file" name="brows_file" id="brows_file">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="existing_media">
                        <div class="row">
                            <div class="col-sm-9 all_media">
                                <div class="all_items">

                                </div>
                            </div>
                            <div class="col-sm-3">
                                <form action="" id="media_details">
                                    <div class="demo_image">
                                        <img src="<?php echo base_url('assets/common/images/no_image.jpg'); ?>" alt="" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" id="file_caption" class="form-control" placeholder="File Caption">
                                        <input type="hidden" id="media_id" name="media_id" value="235">
                                    </div>
                                    <div class="form-group">
                                        <textarea name="media_description" id="media_description" class="form-control" rows="5" placeholder="File Details"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Save" class="btn btn-primary">
                                    </div>
                                    <div class="form-group">
                                        <div class="alert alert-success alert-dismissible alert_msg updated" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            <strong>Success!</strong> File information updated successfully.
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <input class="hidden" value="" type="text" name="" id="modal_hidden_input" />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default close_modal" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary set_featured_image_button">Set Featured Image</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
                        function media_details_function(media_id) {
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
                        }

                        function clean_form() {
                            $('#file_name').html('');
                            $('#file_caption').val('');
                            $('#media_description').text('');
                            $('#media_description').val('');
                            $('#media_id').val('');
                        }

                        function clean_selected() {
                            $('.modal .all_media .all_items .item').removeClass('selected').removeClass('current');
                            $('#media_details .demo_image img').attr('src', '<?php echo base_url('assets/common/images/no_image.jpg'); ?>');
                            $('#file_caption').val('');
                            $('#media_description').val('');
                        }

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

                        /**
                         * This function is for load ajax media.
                         * @type String
                         * @param {null} active is to selecte first item when uploaded.
                         */
                        function ajax_media(active = null, previous_id = null) {
                            $('#select_media_modal').modal({
                                backdrop: 'static',
                                keyboard: true,
                                show: true
                            });

                            if (previous_id == 'null') {
                                $('#modal_hidden_input').val('');
                            } else {
                                $('#modal_hidden_input').val(',' + previous_id);
                            }

                            var html_text = '';
                            status = '';
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

                                        if (active == 1 && index == 0) {
                                            status = 'selected';
                                            var old_value = $('#modal_hidden_input').val();
                                            $('#modal_hidden_input').val(old_value + ',' + value.media_id);
                                        } else {
                                            status = '';
                                        }

                                        html_text += '<div class="item ' + status + '" data-id="' + value.media_id + '">' +
                                                '<div class="img_table">' +
                                                '<div class="img_row">' +
                                                '<div class="img_col">' +
                                                '<img src="' + src + '" alt=" ">' +
                                                '</div>' +
                                                '</div>' +
                                                '</div>' +
                                                '<div class="check_icon"><span class="glyphicon glyphicon-ok"></span></div>' +
                                                '</div>';
                                    });
                                    $('#existing_media .all_items').html(html_text);


                                    $('.modal .all_media .all_items .item').click(function () {
                                        var demo_image_src = $(this).children().children().children().children().attr('src');
                                        var media_id = $(this).attr('data-id');
                                        $('.modal .all_media .all_items .item').removeClass('current');
                                        if (multiple == 'false') {
                                            $('.modal .all_media .all_items .item').removeClass('selected');
                                        }
                                        $(this).toggleClass('selected');
                                        $(this).addClass('current');
                                        $('#media_details .demo_image img').attr('src', demo_image_src);

                                        modal_hidden_input = $('#modal_hidden_input').val();

                                        if ($(this).hasClass('selected')) {
                                            if (modal_hidden_input.length == 0) {
                                                $('#modal_hidden_input').val(',' + media_id);
                                            } else {
                                                if (multiple == 'true') {
                                                    $('#modal_hidden_input').val(modal_hidden_input + ',' + media_id);
                                                } else {
                                                    $('#modal_hidden_input').val(',' + media_id);
                                                }
                                            }
                                        } else {
                                            $('#modal_hidden_input').val(modal_hidden_input.replace(',' + media_id, ''));
                                        }

                                        media_details_function(media_id);
                                    })

                                    $('.set_featured_image_button').click(function () {
                                        media_ids = $('#modal_hidden_input').val().slice(1);
                                        media_id_array = media_ids.split(',');
                                        last_img_src = $('[data-id="' + media_id_array[0] + '"]').children().children().children().children().attr('src');
                                        if (media_ids == '') {
                                            $('.' + parent_id + ' .media_id_hidden').val('null');
                                            $('.' + parent_id + ' .media_thumb').attr('src', '<?php echo base_url('assets/common/images/no_image.jpg'); ?>');
                                        } else {
                                            $('.' + parent_id + ' .media_id_hidden').val(media_ids);
                                            $('.' + parent_id + ' .media_thumb').attr('src', last_img_src);
                                        }
                                        $('#select_media_modal').modal('hide');
                                        clean_selected();
                                    })

                                    previous_id_array = previous_id.split(',');
                                    prev_id_array_len = previous_id_array.length;
                                    for (var i = 0; i < prev_id_array_len; i++) {
                                        $('[data-id="' + previous_id_array[i] + '"]').addClass('selected');
                                    }
                                }
                            });
                        }


                        $(function () {
                            'use strict';
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
                                            ajax_media(1, previous_id);
                                            $('#dropzone').removeClass('uploading');
                                            $('#select_media .nav-tabs li,.tab-pane').removeClass('active');
                                            $('#select_media .nav-tabs li.select_media_tab,#existing_media').addClass('active');
                                        }
                                    }
                                });
                            });

                            $('.remove_media').click(function () {
                                $(this).siblings('input').val('null');
                                $(this).siblings('.thumb_container').children().attr('src', '<?php echo base_url('assets/common/images/no_image.jpg'); ?>')
                            })
                        }
                        );

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


