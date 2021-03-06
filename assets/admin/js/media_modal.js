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