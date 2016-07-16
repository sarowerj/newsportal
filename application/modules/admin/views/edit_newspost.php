<script type="text/javascript" src="<?php echo base_url() . 'assets/plugins/bootstrap-switch-master/dist/js/bootstrap-switch.min.js' ?>"></script>
<?php
$error = $this->session->flashdata('update_error');

$status = $this->session->flashdata('update_success');
?>
<div class="alert_messages">
    <div class="alert alert-success alert-dismissible alert_msg newspost_updated" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Success!</strong> Newspost updated successfully.
    </div>
    <div class="alert alert-danger alert-dismissible alert_msg title_required" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Error!</strong> Newspost title can not be empty or extra long.
    </div>
</div>

<main class="content edit_news_post">
    <!--Page Header-->
    <div class="content_header">
        <h3>Add New Article</h3>
    </div>
    <!--Main Content Start From Here-->
    <div class="main_content">
        <div class="row">
            <?php echo form_open(base_url() . 'admin/update_news/' . $all_news_data[0]->newspost_id); ?>
            <!--Start Left Content-->
            <div class="col-md-9">

                <!--News Title-->
                <div class="form-group">
                    <input autocomplete="off" type="text" name="newspost_title" value="<?php echo $all_news_data[0]->newspost_title; ?>" class="form-control input-lg" placeholder="News Title" required="required"/>
                    <span class="hints gray">Title must be between 8 to 50 characters.</span>
                </div>

                <!--News Long Title-->
                <div class="form-group">
                    <input autocomplete="off" value="<?php echo $all_news_data[0]->newspost_long_title; ?>" type="text" name="newspost_long_title" class="form-control input-md" placeholder="News Long Title"/>
                    <span class="hints gray">This title can be a short paragraph.</span>
                </div>

                <!--News Content-->
                <div class="form-group post_content">
                    <textarea name="news_content" id="news_content" placeholder="Content"><?php echo $all_news_data[0]->newspost_content; ?></textarea>

                    <!--JS for CK Editor-->
                    <script src="<?php echo base_url(); ?>assets/plugins/ckeditor/ckeditor.js"></script>
                    <script>
                        CKEDITOR.replace('news_content', {
                            height: 395
                        });
                    </script>
                </div>

                <div class="row">
                    <!--Widget Featured Video-->
                    <div class="col-xs-12 col-md-4">
                        <div class="box box-default widget featured_video">
                            <div class="box-header with-border">
                                <h3 class="box-title">Video Url</h3>
                                <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                </div>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <h5>Paste your youtube video url.</h5>
                                <?php
                                $video_url = $metas['post_video_url'][0]->meta_value;
                                if (!empty($video_url)) {
                                    $video_url = $metas['post_video_url'][0]->meta_value;
                                } else {
                                    $video_url = "";
                                }
                                ?>
                                <iframe id="featured_video" width="100%" height="auto" src="<?php
                                if (!empty($video_url)) {
                                    echo "https://www.youtube.com/embed/" . $video_url;
                                }
                                ?>" frameborder="0" allowfullscreen></iframe>
                                <input type="hidden" value="<?php echo $video_url; ?>" name="featured_video" id="featured_video_fld" class="form-control featured_video" />
                                <input type="text" value="https://www.youtube.com/watch?v=<?php echo $video_url ?>" class="form-control featured_video_url" name="featured_video_url" />
                                <div class="msg text-danger"></div>
                                <script type="text/javascript">
                                    $(document).ready(function () {
                                        $('.featured_video_url').keyup(function () {
                                            var url = $('.featured_video_url').val();
                                            var videoid = url.match(/(?:https?:\/{2})?(?:w{3}\.)?youtu(?:be)?\.(?:com|be)(?:\/watch\?v=|\/)([^\s&]+)/);
                                            if (videoid != null) {
                                                $('#featured_video').show();
                                                $('.featured_video').val(videoid[1]);
                                                $('#featured_video').attr('src', 'https://www.youtube.com/embed/' + videoid[1]);
                                                //$('div.msg').hide();
                                            } else {
                                                $('div.msg').html('Invalid Video URL');
                                                $('#featured_video').hide();
                                                $('#featured_video_fld').val('');
                                            }
                                        })
                                    })
                                </script>
                            </div>
                        </div>
                    </div>

                    <!--Widget Featured Gallery-->
                    <div class="col-xs-12 col-md-4">
                        <div class="box box-default widget select_media_widget">
                            <div class="box-header with-border">
                                <h3 class="box-title">Featured Image</h3>
                                <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <h5>Select image for article.</h5>
                                <div class="set_featured_image">
                                    <?php
                                    $featured_img_hidden_value = "";
                                    if (!empty($featured_image)) {
                                        $featured_img_hidden_value = $featured_image[0]->media_id;
                                    } else {
                                        $featured_img_hidden_value = "null";
                                    }

                                    $featured_image_path = '';
                                    if (!empty($featured_image)) {
                                        $featured_image_path = base_url() . 'uploads/' . $featured_image[0]->media_path . '330_200/' . $featured_image[0]->media_name;
                                    } else {
                                        $featured_image_path = base_url('assets/common/images/no_image.jpg');
                                    }
                                    ?>
                                    <input type="hidden" name="featured_image" value="<?= $featured_img_hidden_value ?>" class="form-control media_id_hidden" />
                                    <div class="thumb_container">
                                        <img src="<?= $featured_image_path ?>" alt="" class="img-responsive media_thumb" />
                                    </div>
                                    <a href="javascript:void(0)" class="btn btn-default select_media_btn" data-parent_id="set_featured_image" data-multiple="false">Select Image</a>
                                    <a href="javascript:void(0)"  class="remove_media">Remove Images</a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!--Widget Featured Gallery-->
                    <div class="col-xs-12 col-md-4">
                        <div class="box box-default widget select_media_widget">
                            <div class="box-header with-border">
                                <h3 class="box-title">Gallery Images</h3>
                                <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <h5>Select image for article.</h5>
                                <div class="set_featured_gallery">
                                    <?php
                                    $gallery_ids = $metas['post_featured_gallery'][0]->meta_value;
                                    if (!empty($gallery_ids)) {
                                        $gallery_ids = $metas['post_featured_gallery'][0]->meta_value;
                                    } else {
                                        $gallery_ids = "";
                                    }

                                    $img_path = '';
                                    if (!empty($img_urls)) {
                                        foreach ($img_urls as $img_url) {
                                            if (!empty($img_url)) {
                                                $img_path = base_url() . "uploads/" . $img_url[0]->media_path . "330_200/" . $img_url[0]->media_name;
                                                break;
                                            }
                                        }
                                    }
                                    ?>
                                    <input type="hidden" name="featured_gallery" value="<?= $gallery_ids ?>" class="form-control media_id_hidden" />
                                    <div class="thumb_container">
                                        <img src="<?php echo($img_path != '') ? $img_path : base_url() . 'assets/common/images/no_image.jpg'; ?>" alt="" class="img-responsive media_thumb"/>
                                    </div>
                                    <a href="javascript:void(0)" class="btn btn-default select_media_btn" data-parent_id="set_featured_gallery" data-multiple="true">Select Image</a>
                                    <a href="javascript:void(0)"  class="remove_media">Remove Images</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">
                        $(document).ready(function () {
                            $('.select_media_btn').click(function () {
                                previous_id = $(this).siblings('input').val();
                                parent_id = $(this).attr('data-parent_id');
                                multiple = $(this).attr('data-multiple');
                                ajax_media(0, previous_id);
                            });
                        })
                    </script>
                </div>
            </div><!--End Left Content-->


            <!--Start Right Widget Content-->
            <div class="col-md-3">

                <!--Widget for Status-->
                <div class="box box-default widget">
                    <div class="box-header with-border">
                        <h3 class="box-title">Article Status</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <ul>
                            <li>
                                <i class="fa fa-key" aria-hidden="true"></i>
                                <span>Status : <span class="status">Published</span></span><a href="javascript:void(0)" class="btn btn-default edit_button">Edit</a>
                                <div class="options">
                                    <select name="article_status" class="form-inline option_value">
                                        <option value="Published" <?php echo ($all_news_data[0]->status == "Published") ? 'selected' : ''; ?>>Published</option>
                                        <option value="Pending" <?php echo ($all_news_data[0]->status == "Pending") ? 'selected' : ''; ?>>Pending</option>
                                        <option value="Delete" <?php echo ($all_news_data[0]->status == "Delete") ? 'selected' : ''; ?>>Delete</option>
                                    </select>
                                    <a href="#" class="btn btn-primary ok">OK</a>
                                    <a href="#" class="btn btn-default cancel">Cancel</a>
                                </div>
                            </li>
                            <!--li>
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                <span>Published on: <span class="published_date">22 March 2016</span></span>
                            </li-->
                        </ul>
                        <script type="text/javascript">
                            jQuery(document).ready(function () {
                                var published_status = jQuery('select.option_value').val();
                                jQuery('span span.status').html(published_status);
                                jQuery('.edit_button').click(function () {
                                    jQuery(this).hide();
                                    jQuery(this).siblings('.options').slideToggle('fast');
                                })
                                jQuery('.ok').click(function () {
                                    var value = jQuery(this).siblings('select').val();
                                    jQuery(this).parent().siblings('span').children('.status').html(value);
                                    jQuery(this).parent().siblings('.edit_button').slideToggle('fast');
                                    jQuery(this).parent().slideToggle();
                                })
                                jQuery('.cancel').click(function () {
                                    jQuery(this).parent().siblings('.edit_button').slideToggle('fast');
                                    jQuery(this).parent().slideToggle();
                                })
                            })
                        </script>
                    </div>
                </div><!-- End Widget -->

                <div class="box box-default widget">
                    <div class="box-header with-border">
                        <h3 class="box-title">Update News</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <input type="submit" value="Update" name="save_button" class="btn btn-primary update_button form-control"/>
                    </div>
                </div>

                <!--Widget for Select Category-->
                <div class="box box-default widget select_category">
                    <div class="box-header with-border">
                        <h3 class="box-title">News Category</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        Select your article category.
                        <ul>
                            <?php
                            $selected_cat = explode(", ", $all_news_data[0]->cat_id);
                            foreach ($all_categories as $category) {
                                foreach ($selected_cat as $selected) {
                                    if ($selected == $category->id) {
                                        $checked = "true";
                                        break;
                                    } else {
                                        $checked = "false";
                                    }
                                }
                                ?>
                                <li>
                                    <input type="checkbox" name="category[]" value="<?= $category->id ?>" id="category_<?= $category->id ?>" class="css_checkbox"<?php echo ($checked == "true") ? 'checked' : ''; ?>/>
                                    <label for="category_<?= $category->id ?>"><?= $category->name ?></label>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>

                <!--Widget for Tags-->
                <div class="box box-default widget tags">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tags</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <h5>Add your news tags.</h5>
                        <div class="form-group">
                            <div id="added_tags">
                                <?php
                                foreach ($tags as $tag) {
                                    ?>
                                    <span onclick="remove_tag(this)" data-id="<?php echo $tag['id'] ?>" id="tag_id<?php echo $tag['id'] ?>"><?php echo $tag['name']; ?></span>
                                    <?php
                                }
                                ?>
                            </div>
                            <input id="news_tags" value="<?php echo $all_news_data[0]->tag_id; ?>" type="hidden" name="news_tags" />
                            <input type="text" placeholder="Type or select tags." name="article_tags" class="form-control" id="tags_input" value="" autocomplete="off" />
                            <ul id="tags" class="tags_dropdown"></ul>
                            <span id="add_new_tag" onclick="add_new_tag()">Add New Tag</span>
                            <div class="new_tag_form">
                                <input type="text" name="" placeholder="Type new tag name" class="form-control" />
                                <a href="#" class="btn btn-primary"> <span class="glyphicon glyphicon-ok"></span></a>
                            </div>
                            <span class="hints">Type or search tags.</span>
                        </div>
                        <script type="text/javascript">
                            $(document).ready(function () {
                                /**
                                 * Will send ajax request to create new tag from this page.
                                 */
                                $(".new_tag_form a").click(function () {
                                    var tag_value = $(this).siblings('input').val();
                                    if (!empty(tag_value)) {
                                        $.ajax({
                                            url: '<?php echo base_url(); ?>' + 'admin/save_tag_from_newspost?tag=' + tag_value,
                                            cache: false,
                                            contentType: false,
                                            processData: false,
                                            type: 'post',
                                            success: function (data) {
                                                if (data == "True") {
                                                    tags_input(" ");
                                                    $("#tags").slideDown();
                                                    $("#add_new_tag").show();
                                                    $(".new_tag_form").hide();
                                                    window.scrollBy(0, 1000);
                                                } else {
                                                    alert("The new tag (" + tag_value + ") not added. Please try again.");
                                                }
                                            }
                                        })
                                    }
                                })

                                /**
                                 * When user will compose tags name, 
                                 * then it will search and show dropdown with result of tags name.
                                 **/
                                $("#tags_input").keyup(function () {
                                    var str = $(this).val();
                                    tags_input(str);
                                    $("#tags").slideDown();
                                    $("#add_new_tag").css('display', 'block');
                                })

                                /**
                                 * When user will focus on input field, then it will appear dropdown with tags from database.
                                 **/
                                $("#tags_input").focus(function () {
                                    var str = $(this).val();
                                    tags_input(str);
                                    $("#new_tag_form").hide();
                                    $("#tags").slideDown();
                                    $("#add_new_tag").css('display', 'block');
                                })

                                /**
                                 * Will hide dropdown when user clicked on the body.
                                 * */
                                $('body').click(function (e) {
                                    var target = $(e.target);
                                    if (!target.is('#tags_input') && !target.is('#tags')) {
                                        if ($('#tags').is(':visible'))
                                            $('#tags').slideUp();
                                        $("#add_new_tag").hide();
                                    }
                                });
                            });

                            /**
                             * Will add selected tags to the above of tags input.
                             **/
                            function tag_select(THIS) {
                                var tag_text = $(THIS).text();
                                var tag_id = $(THIS).attr('data-id');
                                var full_tag_id = "#tag_id" + tag_id;
                                if ($(full_tag_id).length) {
                                    alert("This tag ( " + tag_text + " ) already selected.");
                                } else {
                                    $("#added_tags").append('<span onclick="remove_tag(this)" data-id="' + tag_id + '" id="tag_id' + tag_id + '">' + tag_text + '</span>');
                                    var news_tag_id = $('#news_tags').val();
                                    if (empty(news_tag_id)) {
                                        $('#news_tags').val(tag_id + ",");
                                    } else {
                                        $('#news_tags').val(news_tag_id + tag_id + ",");
                                    }
                                }

                                $(".new_tag_form").hide();
                            }

                            /**
                             * Will remove added tags from above the tags input field.
                             **/
                            function remove_tag(THIS) {
                                $(THIS).remove();
                                var this_tag_id = $(THIS).attr('data-id');
                                var news_tag_id = $('#news_tags').val();
                                var new_news_tag_id = news_tag_id.replace(this_tag_id + ",", "");
                                $('#news_tags').val(new_news_tag_id);
                            }

                            /**
                             * Will appear all tags from database as autocomplete.
                             * User can easyly select any tag by click on it.
                             * */
                            function tags_input(str) {
                                $.ajax({
                                    url: '<?php echo base_url(); ?>' + 'admin/tags_input_tags?q=' + str,
                                    cache: false,
                                    contentType: false,
                                    processData: false,
                                    type: 'post',
                                    success: function (data) {
                                        //var list = '';
                                        //var json = $.parseJSON(data);
                                        //$.each(json, function (index, value) {
                                        //list += '<li onclick="testFunction()">' + value.tag_name + '</li>'
                                        //});
                                        $('#tags').html(data);
                                    }
                                })
                            }

                            /**
                             * To slide new tag form when click Add new tag button from dropdown.
                             **/
                            function add_new_tag() {
                                $(".new_tag_form").slideDown();
                            }
                        </script>
                    </div>
                </div><!--End Tags-->

                <!--Widget for Making post as breaking-->
                <div class="box box-default widget tags">
                    <div class="box-header with-border">
                        <h3 class="box-title">Mark as breaking news</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <h5>Switched this on to make this news BREAKING.</h5>
                        <?php
                        $breaking_status = '';
                        if (isset($metas['post_breaking_status'][0])) {
                            $breaking_status = $metas['post_breaking_status'][0]->meta_value;
                        }
                        ?>
                        <input id="breaking_news" type="checkbox" name="breaking_news" <?php echo ($breaking_status == 'on') ? 'checked' : ''; ?>>
                        <script type="text/javascript">
                            $(document).ready(function () {
                                $("#breaking_news").bootstrapSwitch();
                            })
                        </script>
                    </div>
                </div><!--End breaking-->
            </div>
            <!--End Right Widget Content-->
            <?php echo form_close(); ?>
        </div>
    </div>
</main>

<!-- Media Modal Modal -->
<link rel="stylesheet" href="<?php echo base_url('assets/admin/css/media_modal.css'); ?>" />
<div class="modal fade" id="select_media_modal" tabindex="-1" role="dialog" aria-labelledby="select_media_modal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class=""><a href="#upload_media" aria-controls="home" role="tab" data-toggle="tab">Upload Media</a></li>
                    <li role="presentation" class="active select_media_tab"><a href="#existing_media" aria-controls="profile" role="tab" data-toggle="tab">Select Media</a></li>
                </ul>
            </div>
            <div class="modal-body">
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane" id="upload_media">
                        <form id="fileupload" action="<?php echo base_url(); ?>admin/save_media" method="POST" enctype="multipart/form-data">
                            <div id="dropzone" class="">
                                <div class="upload_button">
                                    <h4>Select or drop image to upload.</h4>
                                    <input type="file" name="brows_file" id="brows_file">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div role="tabpanel" class="tab-pane active" id="existing_media">
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


<?php
if (isset($status)) {
    if ($status == 'update_successfull') {
        ?>
                $('.alert_msg.newspost_updated').fadeIn().delay(3000).fadeOut("fast", 0);
        <?php
    }
}
if (isset($error)) {
    if ($error == 'title_required') {
        ?>
                $('.alert_msg.title_required').fadeIn().delay(3000).fadeOut("fast", 0);
        <?php
    }
}
?>
    });

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