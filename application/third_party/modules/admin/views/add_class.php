 <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo $title;?>
              
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Class</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $meta;?></h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
               <?php var_dump($form_validation);?>

            <?php if(validation_errors()) { ?>
            <div class="alert alert-warning">
            <?php echo validation_errors(); ?>
            </div>
            <?php } ?>


            <?php if($this->session->flashdata('item')) { ?>
            <div class="alert alert-success">
            <?php echo $this->session->flashdata('item'); ?>
            </div>
            <?php } ?>
<?php echo form_open('admin/save_class',array('class'=>'form-horizontal'));?>
          
            
 
  <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Class Name</label>
              <div class="col-sm-9">
                  <input class="form-control" value="<?php echo set_value('class_name'); ?>" id="inputEmail3" name="class_name" placeholder="Class name" type="text">
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-3 control-label">Class Bangla Name</label>
              <div class="col-sm-9">
                  <input class="form-control" id="inputEmail3" name="class_name_bn" placeholder="Class Bangla Name" type="text">
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-3 control-label">Class Symbol</label>
              <div class="col-sm-9">
                  <input class="form-control" id="inputEmail3" name="class_symbol" placeholder="Class Symbol" type="number">
              </div>
            </div>
                <div class="form-group">
              <label for="inputPassword3" class="col-sm-3 control-label"></label>
              <div class="col-sm-9">
                  <input class="btn btn-primary" type="submit" value="Submit">
              </div>
            </div>
            <?php echo form_close(); ?>
            </div><!-- /.box-body -->

          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      