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
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Add New Shift</button>
                </h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>

            <div class="box-body all_shift_list">

            </div>

        </div><!-- /.box -->

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->



<div id="new_shift_add_modal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">Add New Shift</h4>
            </div>
            <div class="modal-body">
                <?php // echo form_open('admin/add_class', array('class' => 'form-horizontal'));  ?>
                <form id="new_shiftid" class="form-horizontal" action="#" method="post">

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Shift Name</label>
                        <div class="col-sm-9">
                            <input  class="form-control" id="shift_name" name="shift_name" placeholder="Shift name" type="text" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Shift Bangla Name</label>
                        <div class="col-sm-9">
                            <input class="form-control" id="shift_name_bn" name="shift_name_bn" placeholder="Shift Bangla Name" type="text" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Shift Start Time</label>
                        <div class="col-sm-9">
                            <div class="bootstrap-timepicker">
                                <div class="input-group">
                                    <input name="start_time" id="start_time" type="text" class="form-control timepicker">
                                    <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                </div><!-- /.input group -->

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Shift End Time</label>
                        <div class="col-sm-9">
                            <div class="bootstrap-timepicker">
                                <div class="input-group">
                                    <input name="end_time" id="end_time" type="text" class="form-control timepicker">
                                    <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="add_new_shift('new_shiftid')">Save changes</button>
            </div>
            </form>
            <?php // echo form_close();  ?>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>

    /* add new class js code for submit function*/

    function add_new_shift(form_id)
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
                url: "<?php echo base_url() . 'admin/save_shift'; ?>",
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
                        $('#new_shift_add_modal').modal('hide');
                        $('.box-header').append('<div class="alert alert-success alert-dismissible" role="alert">' +
                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                                '<span aria-hidden="true">&times;</span></button>' +
                                '<strong>Status! </strong>' +
                                'Data Added Successfully' +
                                '</div>');
                        all_shift_list();

                    }

                }
            });
        }

    }

    /* all_shift_list  */

    function all_shift_list()
    {
        var all_shift_list_html = '<table class="table table-responsive table-bordered">' +
                '<tbody><tr>' +
                '<th>#</th>' +
                '<th>Shift Name</th>' +
                ' <th>Shift Name Bangla</th>' +
                '<th>Start Time</th>' +
                '<th>End Time</th>' +
                '<th>Action</th' +
                '</tr>';
        $.ajax({
            type: "GET",
            url: base_url + "admin/get_all_shift",
            dataType: "text",
            success: function (data) {
                var json = jQuery.parseJSON(data);
                $.each(json, function (index, value) {

                    all_shift_list_html += ' <tr>' +
                            '<td>' + (index + 1) + '</td>' +
                            '<td><input class="shift_name hidden" type="text" value="' + value.shi_name + '"><p>' + value.shi_name + '</p></td>' +
                            '<td><input class="shift_name_bn hidden" type="text" value="' + value.shi_bname + '"><p>' + value.shi_bname + '</p></td>' +
                            '<td><div class="bootstrap-timepicker hidden" style="width:150px">' +
                            '<div class="input-group">' +
                            '<input value="' + value.shi_stime + '" type="text" class="form-control timepicker">' +
                            '<div class="input-group-addon">' +
                            '<i class="fa fa-clock-o"></i>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '<p>' + value.shi_stime + '</p></td>' +
                            '<td><div class="bootstrap-timepicker start_time hidden" style="width:150px">' +
                            '<div class="input-group">' +
                            '<input value="' + value.shi_etime + '" type="text" class="form-control timepicker">' +
                            '<div class="input-group-addon">' +
                            '<i class="fa fa-clock-o"></i>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '<p>' + value.shi_etime + '</p></td>' +
                            '<td><input class="shift_id" type="hidden" value="' + value.shi_id + '">' +
                            '<div class="btn-group"><button class="btn btn-warning edit_shift"><i class="fa fa-edit"></i></button>' +
                            '<button class="btn btn-danger delete_shift"><i class="fa fa-trash"></i></button>' +
                            '<button class="btn btn-success edit_shift_success hidden"><i class="fa fa-check"></i></button>' +
                            '<button class="btn btn-danger cancel hidden"><i class="fa fa-times"></i></button></div>' +
                            '</td>' +
                            '</tr>';

                });

                all_shift_list_html += '</tbody></table>';
                jQuery('.all_shift_list').html(all_shift_list_html);
                $(".timepicker").timepicker({
                    showInputs: false
                });
                $('.delete_shift').click(function () {
                    shift_id = $(this).parent().parent().find('input').val();

                    $.ajax({
                        type: "POST",
                        url: base_url + 'admin/delete_shift',
                        data: 'shift_id=' + shift_id,
                        cache: false,
                        success: function (result) {
                            all_shift_list();
                            $('.box-header').append('<div class="alert alert-warning alert-dismissible" role="alert">' +
                                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                                    '<span aria-hidden="true">&times;</span></button>' +
                                    '<strong>Status! </strong>' +
                                    'Successfully Removed' +
                                    '</div>');
                        }
                    });

                });

                $('.edit_shift').click(function () {
                    $(this).parent().parent().parent().find('p').hide();
                    $(this).parent().parent().parent().find('input').removeClass('hidden');
                    $(this).parent().parent().find('.cancel').removeClass('hidden');
                    $(this).parent().parent().parent().find('div').removeClass('hidden');
                    $(this).hide();
                    $(this).next().hide();


                    $(this).parent().parent().parent().find('button').removeClass('hidden');
                });
                $('.edit_shift_success').click(function () {
                    shift_id = $(this).parent().parent().parent().find('td').last().find('input').val();
                    shift_name = $(this).parent().parent().parent().find('td').next().find('input').val();
                    shift_name_bn = $(this).parent().parent().parent().find('td').next().next().find('input').val();
                    shift_stime = $(this).parent().parent().parent().find('td').last().prev().prev().find('input').val();
                    shift_etime = $(this).parent().parent().parent().find('td').last().prev().find('input').val();
                    // alert(shift_id);
                    $.ajax({
                        type: "POST",
                        url: base_url + 'admin/edit_shift',
                        data: {shift_id: shift_id, shift_name: shift_name, shift_name_bn: shift_name_bn, shift_stime: shift_stime, shift_etime: shift_etime},
                        cache: false,
                        success: function (result) {
                            all_shift_list();
                            $('.box-header').append('<div class="alert alert-danger alert-dismissible" role="alert">' +
                                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                                    '<span aria-hidden="true">&times;</span></button>' +
                                    '<strong>Status! </strong>' +
                                    'Successfully Changed' +
                                    '</div>');
                        }
                    });
                });
                $('.cancel').click(function () {
                    $(this).parent().parent().parent().find('p').show();
                    $(this).parent().parent().parent().find('input').addClass('hidden');
                    $(this).parent().parent().find('.cancel').addClass('hidden');
                    $(this).parent().parent().find('.edit_shift_success').addClass('hidden');
                    $(this).parent().parent().find('.btn').show();
                    $(this).parent().parent().parent().find('.input-group-addon').addClass('hidden');
                    $(this).parent().parent().parent().find('.delete_shift').removeClass('hidden');
                    $(this).parent().parent().parent().find('.edit_shift').removeClass('hidden');
                });
            }
        });
    }

    window.onload = function () {

        all_shift_list();

    }
    $(document).ready(function () {
        $(".timepicker").timepicker({
            showInputs: false
        });
    });

</script>



