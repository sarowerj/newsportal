<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/multiselect/bootstrap-multiselect.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/multiselect/bootstrap-multiselect.css" type="text/css"/>
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

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Choose Subject</button>
                </h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body all_subject_list">

            </div>

        </div><!-- /.box -->

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->



<div id="new_subject_add_modal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">Choose Subject</h4>
            </div>
            <div class="modal-body">
                <form id="new_subjectid" class="form-horizontal" action="#" method="post">
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Select Class</label>
                        <div class="col-sm-9">
                            <select name="class" id="class" class="form-control class">

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Choose Subject</label>
                        <select id="example-getting-started" multiple="multiple">

                        </select>
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="subject_choose('new_subjectid')">Save changes</button>
            </div>
            </form>
            <?php // echo form_close();  ?>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
    function subject_choose(form_id)
    {
        var datastring = $("#" + form_id).serializeArray();
        $(datastring).each(function (index, value) {
            $('#' + value.name).next().remove();
            if (value.value == '')
            {
                $('#' + value.name).parent().append('<h6 class="text-red" id="inputError">Required</h6>');
                flag = 0;
            } else {
                flag = 1;
            }
        });

        if (flag == 1)
        {
            var jsonMimeType = "application/json;charset=UTF-8";
            $.ajax({
                type: "POST",
                url: "<?php echo base_url() . 'admin/save_choose'; ?>",
                beforeSend: function (x) {
                    if (x && x.overrideMimeType) {
                        x.overrideMimeType(jsonMimeType);
                    }
                },
                data: {datastring: datastring},
                dataType: "text",
                success: function (data) {
                    var json = jQuery.parseJSON(data);
                    if (json.error == 0)
                    {
                        $('.success_msg').remove();
                        $('#new_subject_add_modal').modal('hide');
                        $('.box-header').append('<div class="alert alert-success alert-dismissible" role="alert">' +
                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                                '<span aria-hidden="true">&times;</span></button>' +
                                '<strong>Status! </strong>' +
                                'Data Added Successfully' +
                                '</div>');

                    }

                }
            });
        }

    }

    function all_class_select()
    {
        var all_class = '<option value="">Select Class</option>';
        $.ajax({
            type: "GET",
            url: base_url + "admin/get_all_class",
            dataType: "text",
            success: function (data) {
                var json = jQuery.parseJSON(data);
                $.each(json, function (index, value) {
                    all_class += '<option value="' + value.cls_id + '">' + value.cls_name + '</option>';
                });
                jQuery('.class').html(all_class);

            }
        });
    }
    function all_subject_select()
    {
        var all_subject = '<option></option>';

        $.ajax({
            type: "GET",
            url: base_url + "admin/get_all_subject",
            dataType: "text",
            success: function (data) {
                var json = jQuery.parseJSON(data);
                $.each(json, function (index, value) {
                    all_subject += '<option value="' + value.sub_id + '">' + value.sub_name + '</option>';
                });
                $('#example-getting-started').html(all_subject);

                $('#example-getting-started').multiselect('rebuild');
            }
        });
    }
    window.onload = function () {
        all_class_select();
        all_subject_select();

    }


</script>


<script type="text/javascript">
    $(document).ready(function () {
        $('#example-getting-started').multiselect();
    });
</script>
