
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo $title; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class=""><?php echo $meta; ?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box">

            <div class="box-header with-border">
                <div class="header">
                    <h3>Student Admission Form</h3>
                </div>    
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>

            <div class="box-body">
                <ul class="nav nav-pills nav-stacked col-md-3">
                    <li class="active"><a href="#tab_a" data-toggle="pill">Admission Information</a></li>
                    <li><a href="#tab_b" data-toggle="pill">Student's Information</a></li>
                    <li><a href="#tab_c" data-toggle="pill">Patent Information</a></li>
                    <li><a id="address" href="#tab_d" data-toggle="pill">Address</a></li>
                    <li><a href="#tab_e" data-toggle="pill">Guardian Information</a></li>
                    <li><a href="#tab_f" data-toggle="pill">Subject Choose</a></li>
                    <li><a href="#tab_g" data-toggle="pill">Academic Information</a></li>
                </ul>
                <form id="admission_form" role="form" data-toggle="validator" action="<?php echo base_url(); ?>admin/get_admission_data" method="post" class="form-horizontal">
                    <div class="tab-content col-md-8">
                        <?php include_once 'std_addmission_info.php'; ?>
                        <div class="tab-pane" id="tab_b">
                            <?php include_once 'std_basic_info.php'; ?>
                        </div>
                        <div class="tab-pane" id="tab_c">
                            <?php include_once 'std_parent_info.php'; ?>
                        </div>
                        <div class="tab-pane" id="tab_d">
                            <?php include_once 'std_address.php'; ?>
                        </div>
                        <div class="tab-pane" id="tab_e">
                            <?php include_once 'std_guardian_info.php'; ?>
                        </div>
                        <div class="tab-pane" id="tab_f">
                            <?php include_once 'std_subject_info.php'; ?>
                        </div>
                        <div class="tab-pane" id="tab_g">
                            <?php include_once 'std_academic_info.php'; ?>
                        </div>
                    </div><!-- tab content -->
                    <button id="preview" type="button" class="btn btn-info" data-toggle="modal" data-target=".bs-example-modal-lg">Preview</button>
                </form>
            </div>
            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-info">

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span id="btn_close"  aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="gridSystemModalLabel">Preview</h4>
                            <button id="print_preview" class="btn-primary pull-right print-previrew">Print</button>
                        </div>
                        <div class="modal-body1" id="modal_body1">


                        </div>
                        <div class="modal-footer">
                        </div>
                        </form>
                        <?php // echo form_close();  ?>

                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div>
</div><!-- /.box -->



</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<script>
    $('#preview').click(function () {
        $('#admission_form .tab-content > .tab-pane').css('display', 'block');
        var test = $("#admission_form").clone();
        $('.modal-body1').html(test);
        $('.modal-body1 .tab-content').removeClass('col-md-8');
        $('.modal-body1 .tab-content').addClass('col-md-12');
        $('.modal-body1 > form :input').prop('disabled', true);
        $('.modal-body1 .btn').hide();
    });
    $("#btn_close").click(function () {
        $('#admission_form .tab-content > .tab-pane').css('display', 'none');
        $('#tab_a').css('display', 'block');
    });
    function validetion(submit_id) {
        var data = $("#" + submit_id).serializeArray();
        $(data).each(function (index, value) {
            if (value.value == '') {
                $('#' + value.name).parent().append('<h6 class="text-red" id="inputError">Required</h6>');
                flag = 1;
            } else
                flag = 0;

        });

//        console.log(flag);
    }
    $('#address').click(function () {
        all_district();
    });
    $('#print_preview').click(function () {

        printDiv('modal_body1');
    });

    function printDiv(div_id) {

        var divContents = $("#" + div_id).html();
        var printWindow = window.open();
        printWindow.document.write('<html><head><title></title>');
        printWindow.document.write('<link rel="stylesheet" href="<?php echo base_url(); ?>assets/common/css/bootstrap.min.css">');
        printWindow.document.write('<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/_all-skins.min.css">');
        printWindow.document.write('<link rel="stylesheet" href="<?php echo base_url(); ?>assets/common/css/common.css">');

        printWindow.document.write('</head><body >');
        printWindow.document.write(divContents);
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();
    }
</script>


