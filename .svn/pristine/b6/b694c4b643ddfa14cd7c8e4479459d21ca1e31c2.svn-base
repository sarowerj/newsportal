
<div class="content-wrapper">

    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="row">
                    <div class="col-md-12">
                        <ol class="breadcrumb">
                            <li><a href="#" class=""><i class="fa fa-dashboard"></i> CMS</a></li>
                            <li class="active"><?php echo $meta; ?></li>
                            <div class="box-tools pull-right">
                                <button class="btn btn-primary" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus-circle"></i> Add Media</button>
                            </div>
                        </ol>
                    </div>

                </div>
            </div>

            <div class="box-body">
                <?php require_once 'alert_message.php'; ?>
                <form id="media_form" class="form-horizontal" method="post" action="<?php echo base_url(); ?>cms/media" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="media_file">Media Image</label>  
                        <div class=" col-sm-3 col-xs-6">

                            <input type='file' class="img-thumbnail col-md-12" id="media_file" name="media_file" />
                        </div>
                        <div class=" col-sm-3 col-xs-6">
                            <img height="100" width="150" id="blah" src="#" alt="No image selected" />

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label"></label>  
                        <div class=" col-sm-5 col-xs-6">
                            <input id="submit" name="media_form" type="submit" class="btn btn-primary pull-right btn-lg" value="Upload" />
                        </div>
                    </div>

                </form>
            </div>
        </div>


    </section><!-- /.content -->
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h2>Media Library</h2>
            </div>
                <?php foreach($media_image as $image){?>
            <img src="<?php echo base_url().'uploads/'.$image->opm_value.'small/'.$image->opt_value;?>" />
            <?php }?>
        </div>
        <!-- Default box -->
        
        
    </section>
</div><!-- /.content-wrapper -->


<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#media_file").change(function () {
        readURL(this);
    });
    $(document).ready(function () {
        $('#media_form').submit(function () {
            file = $('#media_file').val();
        });
    });
</script>
