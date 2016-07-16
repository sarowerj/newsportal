
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
                <table class="table table-responsive">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Details</th>
                         <th>Action</th> 
                    </tr>
                    <?php $i =0; foreach($contect as $post){  $i++;?>
                    <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $post->post_title;?></td>
                        <td><?php echo $post->post_content;?></td>
                         <td>Action</td> 
                    </tr>
                    <?php }?>
                </table>
            </div>


        </div>

</div><!-- /.box -->

</section><!-- /.content -->
</div><!-- /.content-wrapper -->

