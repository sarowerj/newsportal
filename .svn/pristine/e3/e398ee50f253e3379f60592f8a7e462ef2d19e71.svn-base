<style>
    .font-size16{
        font-size: 16px;
        font-family: sans-serif;
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo $title; ?>

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><?php echo $meta; ?></li>
        </ol>

    </section>
    <hr>
    <section class="content-header">
        <div class="col-sm-4">
            <label class="label label-default text-bold font-size16">Class Name</label>
            <label class="label label-info text-bold font-size16"><?php echo $class_name; ?></label>

        </div>

        <div class="col-sm-4">
            <label class="label label-default text-bold font-size16">Class Symbol</label>
            <label id="class_symble" class="label label-info text-bold font-size16"><?php echo $class_symble; ?></label>
            <label class="hidden" id="class_id"><?php echo $class_id; ?></label>
        </div>
        <div class="col-sm-4">
            <label class="label label-default text-bold font-size16">Status</label>
            <?php
            if ($class_status == 1) {
                ?>
                <label class="label label-info text-bold font-size16">Active</label>
                <?php
            } else {
                ?>
                <label class="label label-warning text-bold font-size16">Inactive</label>
            <?php } ?>
        </div>
    </section>
    <hr>
    <!-- Main content -->
    <section class="content">
        <?php include_once 'manage_subject.php'; ?>

    </section><!-- /.content -->
    <section class="content">
        <?php include_once 'manage_section.php'; ?>
        <!-- Default box -->

    </section><!-- /.content -->
    <?php if($class_symble > 8){?>
    <section class="content">
        <?php include_once 'manage_department.php'; ?>
    </section><!-- /.content -->
    <?php }?>
</div><!-- /.content-wrapper -->




