<script type="text/javascript" src="<?php echo base_url() . 'assets/plugins/bootstrap-switch-master/dist/js/bootstrap-switch.min.js' ?>"></script>
<main class="content">
    <!--Page Header-->
    <div class="content_header">
        <h3>Add New Article</h3>
    </div>
    <!--Main Content Start From Here-->
    <div class="main_content">
        <div class="row">
            <?php echo form_open('admin/save_news'); ?>
            <!--Start Left Content-->
            <div class="col-md-9">

                <!--News Title-->
                <div class="form-group">
                    <input type="text" name="newspost_title" class="form-control input-lg" placeholder="News Title"/>
                    <span class="hints gray">Title must be between 8 to 50 characters.</span>
                </div>

                <!--News Long Title-->
                <div class="form-group">
                    <input type="text" name="newspost_long_title" class="form-control input-md" placeholder="News Long Title"/>
                    <span class="hints gray">This title can be a short paragraph.</span>
                </div>

                <!--News Content-->
                <div class="form-group">
                    <textarea name="news_content" id="news_content" placeholder="Content"></textarea>

                    <!--JS for CK Editor-->
                    <script src="<?php echo base_url(); ?>assets/plugins/ckeditor/ckeditor.js"></script>
                    <script>
                        CKEDITOR.replace('news_content', {
                            height: 395
                        });</script>
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
                                <iframe style="display:none;" id="featured_video" width="100%" height="auto" src="https://www.youtube.com/embed/lHjNxscOYM" frameborder="0" allowfullscreen></iframe>
                                <input type="hidden" name="featured_video" id="featured_video" class="form-control featured_video" />
                                <input type="text" class="form-control featured_video_url" name="featured_video_url" id="" />
                                <div class="msg text-danger"></div>
                                <script type="text/javascript">
                                    $(document).ready(function() {
                                        $('.featured_video_url').keyup(function() {
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
                                <h3 class="box-title">Gallery Images</h3>
                                <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <h5>Select image for article.</h5>
                                <div class="set_featured_image">
                                    <input type="hidden" name="featured_image" value="null" class="form-control media_id_hidden" />
                                    <div class="thumb_container">
                                        <img src="<?php echo base_url(); ?>assets/common/images/no_image.jpg" alt="" class="img-responsive media_thumb"/>
                                    </div>
                                    <a href="javascript:void(0)" class="btn btn-default select_media_btn" data-parent_id="set_featured_image" data-multiple="true">Select Image</a>
                                    <a href="javascript:void(0)"  class="remove_media">Remove Images</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">
                        $(document).ready(function() {
                            $('.select_media_btn').click(function() {
                                previous_id = $(this).siblings('input').val();
                                parent_id = $(this).attr('data-parent_id');
                                multiple = $(this).attr('data-multiple');
                                ajax_media(0, previous_id);
                            });
                        })
                    </script>

                    <!--Widget Featured Gallery-->
                    <div class="col-xs-12 col-md-4">
                        <div class="box box-default widget">
                            <div class="box-header with-border">
                                <h3 class="box-title">Gallery Images</h3>
                                <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <h5>Select image for articles.</h5>
                                <div class="">
                                    <input type="hidden" name="featured_img_input" value="25,78" class="form-control" />
                                    <div class="thumb_container">
                                        <img src="<?php echo base_url(); ?>assets/common/images/no_image.jpg" alt="" class="img-responsive"/>
                                    </div>
                                    <a href="javascript:void(0)" onclick="rs_media_prop(this)" class="btn btn-default" data-fld-name="featured_img_input" data-multiple="true">Select Image</a>
                                    <a href="javascript:void(0)"  class="remove_media">Remove Images</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        function rs_media_prop(THIS) {
                            event.preventDefault();
                            var fld_name = $(THIS).attr('data-fld-name');
                            var fld_multiple = $(THIS).attr('data-multiple');
                            var existing_ids = $('input[name="' + fld_name + '"]').val();
                            $('#media_modal').modal('show');
                            $('#media_modal').on('hidden.bs.modal', function() {
                                reset_rs_media();
                            });

                            if (fld_multiple === 'false') {
                                $('.rs_media_modal .all_medias .item').click(function() {
                                    $('.rs_media_modal .all_medias .item').removeClass('active').removeClass('selected');
                                    $(this).addClass('active').addClass('selected');
                                });
                            } else if (fld_multiple === 'true') {
                                $('.rs_media_modal .all_medias .item').click(function() {
                                    $('.rs_media_modal .all_medias .item').removeClass('active');
                                    $(this).addClass('active').addClass('selected');
                                    if ($(this).hasClass('selected')) {
                                        //$(this).addClass('active').removeClass('selected');
                                    }
                                    else {
                                        $(this).addClass('active').addClass('selected');
                                    }
                                });
                            }
                        }

                        function reset_rs_media() {
                            $('h4.file_name').text('No file choosen');
                            $('.rs_media_modal .all_medias .item').removeClass('active').removeClass('selected');
                        }

                        $(document).ready(function() {
                            $('.select_file_btn').change(function() {
                                var fullPath = $(this).val();
                                if (fullPath) {
                                    var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/'));
                                    var filename = fullPath.substring(startIndex);
                                    if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
                                        filename = filename.substring(1);
                                    }
                                    $('.file_name').text(filename);
                                }
                            });
                        });
                    </script>
                    <div class="modal fade rs_media_modal" id="media_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Select Media</h4>
                                </div>
                                <div class="modal-body">
                                    <div>
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li role="presentation"><a href="#upload_media" aria-controls="upload_media" role="tab" data-toggle="tab">Upload Media</a></li>
                                            <li role="presentation" class="active"><a href="#select_media" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
                                        </ul>

                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane" id="upload_media">
                                                <form>
                                                    <div class="drop_zone">
                                                        <div class="upload_button">
                                                            <h4 class="file_name">No file chosen.</h4>
                                                            <span class="btn btn-primary">Select File</span>
                                                            <input class="select_file_btn" type="file" name="select_file_btn">

                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div role="tabpanel" class="tab-pane active" id="select_media">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="all_medias">
                                                            <div class="row">
                                                                <?php
                                                                for ($i = 0; $i < 20; $i++) {
                                                                    ?> 
                                                                    <div class="item">
                                                                        <div class="img_cont">
                                                                            <img src="<?php echo base_url(); ?>assets/common/images/no_image.jpg" alt="" class="img-responsive"/>
                                                                        </div>
                                                                        <div class="check">
                                                                            <i class="fa fa-check" aria-hidden="true"></i>
                                                                        </div>
                                                                    </div> 
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="display_thumb">
                                                            <img src="<?php echo base_url(); ?>assets/common/images/no_image.jpg" alt="" class="img-responsive"/>
                                                        </div>
                                                        <div class="media_details">
                                                            <form>
                                                                <div class="form-group">
                                                                    <input class="form-control" type="text" name="media_title" placeholder="Media Title"/>
                                                                </div>
                                                                <div class="form-group">
                                                                    <textarea class="form-control" name="media_details" placeholder="Media Details" rows="5"></textarea>
                                                                </div>
                                                                <div class="form-group text-right">
                                                                    <input type="submit" class="btn btn-primary" value="Save"/>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <style>
                        .rs_media_modal .tab-pane{
                            min-height:350px;
                            position: relative;
                            padding-top: 30px;
                        }
                        .rs_media_modal .tab-pane .drop_zone{ 
                            min-height:350px;
                            height:250px;
                            width:100%;
                            background: white;
                            border: 2px dashed #bbb;
                            display:table;
                            text-align: center;
                        }
                        .rs_media_modal .tab-pane .drop_zone .upload_button{
                            display:table-cell;
                            vertical-align: middle;
                        }
                        .rs_media_modal .tab-pane .select_file_btn{
                            position: absolute;
                            left:0;
                            right:0;
                            bottom:0;
                            top:0;
                            background:green;
                            width:100%;
                            opacity:0;
                            cursor: pointer;
                        } 
                        .rs_media_modal #select_media .item .img_cont{
                            display:table-cell;
                            vertical-align: middle;
                        }
                        .rs_media_modal .display_thumb{
                            margin-bottom: 15px;
                        }
                        .rs_media_modal .display_thumb img{
                            width:100%;
                        }
                        .rs_media_modal .all_medias{
                            max-height: 385px;
                            overflow-y: scroll;
                            padding:0 15px;
                        }
                        .rs_media_modal .all_medias .item{
                            width:calc(20% - 12px);
                            float:left;
                            margin-right: 15px;
                            margin-bottom:30px;
                            min-height: 143px;
                            display:table;
                            box-shadow: inset 0 0 50px rgba(0,0,0,.1);
                            cursor: pointer;
                            border:5px solid white;
                            position: relative;
                        }
                        .rs_media_modal .all_medias .item .check{
                            position: absolute;
                            right:0;
                            bottom:0;
                            background:#93c0da;
                            color:white;
                            width:30px;
                            height:30px;
                            text-align: center;
                            padding:5px;
                            opacity:0;
                        }
                        .rs_media_modal .all_medias .item:nth-child(5n+0){
                            margin-right:0;
                        }
                        .rs_media_modal .all_medias .item.active{
                            border:5px solid #93c0da;
                        }
                        .rs_media_modal .all_medias .item.selected{
                            border:5px solid #93c0da;
                        }
                        .rs_media_modal .all_medias .item.selected .check{
                            opacity:1;
                        }
                    </style>


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
                                    <input type="hidden" name="featured_gallery" value="null" class="form-control media_id_hidden" />
                                    <div class="thumb_container">
                                        <img src="<?php echo base_url(); ?>assets/common/images/no_image.jpg" alt="" class="img-responsive media_thumb"/>
                                    </div>
                                    <a href="javascript:void(0)" class="btn btn-default select_media_btn" data-parent_id="set_featured_gallery" data-multiple="false">Select Image</a>
                                    <a href="javascript:void(0)"  class="remove_media">Remove Images</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--End Left Content-->


            <!--Start Right Widget Content-->
            <div class="col-md-3">
                <div class="box box-default widget">
                    <div class="box-header with-border">
                        <h3 class="box-title">Save News</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <input type="submit" value="Save" name="save_button" class="btn btn-primary update_button form-control"/>
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
                            foreach ($all_categories as $category) {
                                ?>
                                <li>
                                    <input type="checkbox" name="category[]" value="<?= $category->id ?>" id="category_<?= $category->id ?>" class="css_checkbox"/>
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
                            <!--input type="text" name="article_tags" class="form-control" value="Bangladeshi News,Business News" data-role="tagsinput"/-->
                            <div id="added_tags"></div>
                            <input id="news_tags" value="" type="hidden" name="news_tags" />
                            <input type="text" placeholder="Type or select tags." name="article_tags" class="form-control" id="tags_input" value="" autocomplete="off" />
                            <ul id="tags" class="tags_dropdown">

                            </ul>
                            <span id="add_new_tag" onclick="add_new_tag()">Add New Tag</span>
                            <div class="new_tag_form">
                                <input type="text" name="" placeholder="Type new tag name" class="form-control" />
                                <a href="javascript:void(0)" class="btn btn-primary"> <span class="glyphicon glyphicon-ok"></span></a>
                            </div>
                            <span class="hints">Type or search tags.</span>
                        </div>
                        <script type="text/javascript">
                            $(document).ready(function() {
                                /**
                                 * Will send ajax request to create new tag from this page.
                                 */
                                $(".new_tag_form a").click(function() {
                                    var tag_value = $(this).siblings('input').val();
                                    if (!empty(tag_value)) {
                                        $.ajax({
                                            url: '<?php echo base_url(); ?>' + 'admin/save_tag_from_newspost?tag=' + tag_value,
                                            cache: false,
                                            contentType: false,
                                            processData: false,
                                            type: 'post',
                                            success: function(data) {
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
                                $("#tags_input").keyup(function() {
                                    var str = $(this).val();
                                    tags_input(str);
                                    $("#tags").slideDown();
                                    $("#add_new_tag").css('display', 'block');
                                })

                                /**
                                 * When user will focus on input field, then it will appear dropdown with tags from database.
                                 **/
                                $("#tags_input").focus(function() {
                                    var str = $(this).val();
                                    tags_input(str);
                                    $("#new_tag_form").hide();
                                    $("#tags").slideDown();
                                    $("#add_new_tag").css('display', 'block');
                                })

                                /**
                                 * Will hide dropdown when user clicked on the body.
                                 * */
                                $('body').click(function(e) {
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
                                    success: function(data) {
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
                            $(document).ready(function() {
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
            success: function(data) {
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

    $("#media_details").submit(function(event) {
        event.preventDefault();
        var media_id = $('#media_details').find('#media_id').val();
        var media_caption = $('#media_details').find('#file_caption').val();
        var media_description = $('#media_details').find('textarea#media_description').val();
        $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>admin/update_media_details',
            data: {media_id: media_id, media_caption: media_caption, media_description: media_description},
            success: function(result) {
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
            success: function(data) {
                var json = $.parseJSON(data);
                $.each(json, function(index, value) {
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
                $('.modal .all_media .all_items .item').click(function() {
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

                $('.set_featured_image_button').click(function() {
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


    $(function() {
        'use strict';
        $('#brows_file').change(function() {
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
                success: function(data) {
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
        $('.remove_media').click(function() {
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


