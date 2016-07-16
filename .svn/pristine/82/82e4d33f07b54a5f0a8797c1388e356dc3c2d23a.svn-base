
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
                                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                            </div>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="box-body">
                <?php require_once 'alert_message.php';?>
                <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>cms/add_content">
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="post_title">Title</label>  
                        <div class=" col-sm-7 col-xs-12">
                            <input id="post_title" name="post_title" type="text" placeholder="Title" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="post_details">Content Details</label>  
                        <div class=" col-sm-10 col-xs-12">
                            <div class="box box-info">
                                <div class="box-body pad">
                                    <textarea id="editor1" name="post_details" rows="10" cols="80">
                                            
                                    </textarea>
                                </div>
                            </div><!-- /.box -->
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label"></label>  
                        <div class=" col-sm-10 col-xs-12">
                            <input type="submit" class="btn btn-primary pull-right btn-lg" value="Save" />
                        </div>
                    </div>

                </form>
            </div>


        </div>

</div><!-- /.box -->

</section><!-- /.content -->
</div><!-- /.content-wrapper -->

<script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
<script>
    $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
    });
</script>
