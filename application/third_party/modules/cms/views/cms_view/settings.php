
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
                <ul class="nav nav-pills nav-stacked col-md-3">
                    <li class="<?php echo ($this->input->get('active')=='1'?'active':'');?>"><a href="#tab_a" data-toggle="pill">Header</a></li>
                    <li class="<?php echo ($this->input->get('active')=='2'?'active':'');?>"><a href="#tab_b" data-toggle="pill">Footer</a></li>
                    <li class="<?php echo ($this->input->get('active')=='3'?'active':'');?>"><a href="#tab_c" data-toggle="pill">Social</a></li>
                    <li class="<?php echo ($this->input->get('active')=='4'?'active':'');?>"><a href="#tab_d" data-toggle="pill">Themes Option</a></li>
                </ul>
                <div class="tab-content col-md-8">
                    <div class="tab-pane <?php echo ($this->input->get('active')=='1'?'active':'');?>" id="tab_a">
                        <?php require_once 'header-form.php'; ?>
                    </div>
                    <div class="tab-pane <?php echo ($this->input->get('active')=='2'?'active':'');?>" id="tab_b">
                        <?php require_once 'footer-form.php'; ?>
                    </div>
                    <div class="tab-pane <?php echo ($this->input->get('active')=='3'?'active':'');?>" id="tab_c">
                        <?php require_once 'social-form.php'; ?>
                    </div>
                    <div class="tab-pane <?php echo ($this->input->get('active')=='4'?'active':'');?>" id="tab_d">
                        <?php require_once 'themes-form.php'; ?>
                    </div>
                </div><!-- tab content -->
            </div>


        </div>

</div><!-- /.box -->

</section><!-- /.content -->
</div><!-- /.content-wrapper -->


