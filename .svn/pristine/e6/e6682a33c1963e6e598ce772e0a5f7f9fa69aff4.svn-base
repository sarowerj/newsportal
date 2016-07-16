<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<!--    <section class="content-header">
        <h1>
    <?php echo $title; ?>

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><?php echo $meta; ?></li>
        </ol>
    </section>-->

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">

            <div class="box-header with-border">
                <div class="row">
                    <div class="col-md-12">
                        <ol class="breadcrumb">
                            <li><a href="#" class=""><i class="fa fa-dashboard"></i> Home</a></li>
                            <li class="active"><?php echo $meta; ?></li>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Add New Class</button>
                                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                            </div>
                        </ol>
                    </div>

                </div>


            </div>

            <div class="box-body all_class_list">

            </div>

        </div><!-- /.box -->

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->



<div id="new_class_add_modal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">Add New Class</h4>
            </div>
            <div class="modal-body">
                <?php // echo form_open('admin/add_class', array('class' => 'form-horizontal'));  ?>
                <form id="new_classid" class="form-horizontal" action="#" method="post">

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Class Name</label>
                        <div class="col-sm-9">
                            <input  class="form-control" value="<?php echo set_value('class_name'); ?>" id="class_name" name="class_name" placeholder="Class name" type="text" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Class Bangla Name</label>
                        <div class="col-sm-9">
                            <input class="form-control" id="class_name_bn" name="class_name_bn" placeholder="Class Bangla Name" type="text" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Class Symbol</label>
                        <div class="col-sm-9">
                            <input class="form-control number" id="class_symbol" name="class_symbol" placeholder="Class Symbol" max="12" type="number"  />
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="add_new_class('new_classid')">Save changes</button>
            </div>
            </form>
            <?php // echo form_close();  ?>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>

    /* add new class js code for submit function*/

    function add_new_class(form_id)
    {
        var datastring = $("#" + form_id).serializeArray();
        // var flag = is_required(datastring);
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
                url: base_url + 'admin/save_class',
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
                        $('#new_class_add_modal').modal('hide');
                        $('.box-header').append('<div class="alert alert-success alert-dismissible" role="alert">' +
                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                                '<span aria-hidden="true">&times;</span></button>' +
                                '<strong>Status! </strong>' +
                                'Data Added Successfully' +
                                '</div>');
                        all_class_list();

                    }
                }
            });
        }

    }

    /* all_class_list  */

    function all_class_list()
    {
        var all_class_list_html = '<table class="table table-responsive table-bordered">' +
                '<tbody><tr>' +
                '<th>Manage</th>' +
                '<th>Name</th>' +
                ' <th>Bangla Name</th>' +
                '<th>Symble</th>' +
                '<th>Status</th>' +
                '<th>Action</th>' +
                '</tr>';
        $.ajax({
            type: "GET",
            url: base_url + 'admin/get_all_class',
            dataType: "text",
            success: function (data) {
                var json = jQuery.parseJSON(data);
                $.each(json, function (index, value) {
                    if (value.cls_status == 1) {
                        var status = 'success';
                    } else {
                        var status = 'danger';
                    }
                    all_class_list_html += ' <tr>' +
                            '<td><a href="' + base_url + 'admin/manage_subject/' + value.cls_id + '" data-toggle="tooltip" data-placement="top" title="Manage Class" class="btn btn-sm btn-sm btn-primary"><i class="fa fa-bars"></i></a></td>' +
                            '<td><input class="class_name hidden" type="text" value="' + value.cls_name + '"><span>' + value.cls_name + '</span> </td>' +
                            '<td><input class="class_name_bn hidden" type="text" value="' + value.cls_bname + '"><span>' + value.cls_bname + '</span></td>' +
                            '<td>' + value.cls_symble + '</td>' +
                            '<td><button id="' + value.cls_id + '" class="status btn btn-sm btn-' + status + '"><i class="fa fa-check"></i></button></td>' +
                            '<td><input class="class_id" type="hidden" value="' + value.cls_id + '">' +
                            '<button class="btn btn-sm btn-success edit_class_success hidden"><i class="fa fa-check"></i></button>' +
                            '<div class="btn-group"><button class="btn btn-sm btn-warning edit_class"><i class="fa fa-edit"></i></button>' +
                            '<button class="btn btn-sm btn-danger delete_class"><i class="fa fa-trash"></i></button>' +
                            '<button class="btn btn-sm btn-danger cancel hidden"><i class="fa fa-times"></i></button></div>' +
                            '</td>' +
                            '</tr>';
                });
                all_class_list_html += '</tbody></table>';
                jQuery('.all_class_list').html(all_class_list_html);

                $('.status').click(function () {
                    id = $(this).attr('id');
                    $.ajax({
                        type: "POST",
                        url: base_url + 'admin/status',
                        data: {id: id, tbl_name: 'class', col_pre: 'cls'},
                        cache: false,
                        success: function (result) {
                            all_class_list();
                        }
                    });
                });
                $('.delete_class').click(function () {
                    class_id = $(this).parent().parent().find('input').val();
                    $.ajax({
                        type: "POST",
                        url: base_url + 'admin/delete_class',
                        data: 'class_id=' + class_id,
                        cache: false,
                        success: function (result) {
                            all_class_list();
                            $('.box-header').append('<div class="alert alert-warning alert-dismissible" role="alert">' +
                                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                                    '<span aria-hidden="true">&times;</span></button>' +
                                    '<strong>Status! </strong>' +
                                    'Successfully Removed' +
                                    '</div>');
                        }
                    });

                });
                $('.edit_class').click(function () {
                    $(this).parent().parent().parent().find('span').hide();
                    $(this).parent().parent().parent().find('input').removeClass('hidden');
                    $(this).next().hide();
                    $(this).hide();
                    $(this).parent().parent().parent().find('button').removeClass('hidden');
                });
                $('.cancel').click(function () {
                    $(this).parent().parent().parent().find('span').show();
                    $(this).parent().parent().parent().find('input').addClass('hidden');
                    $(this).next().hide();
                    $(this).hide();
                    $(this).parent().parent().parent().find('.edit_class').show();
                    $(this).parent().parent().parent().find('.edit_class_success').addClass('hidden');
                    $(this).parent().parent().parent().find('.delete_class').show();

                });
                $('.edit_class_success').click(function () {
                    class_id = $(this).parent().parent().find('td').last().find('input').val();
                    class_name = $(this).parent().parent().find('td').next().find('input').val();
                    class_name_bn = $(this).parent().parent().find('td').next().next().find('input').val();
                    $.ajax({
                        type: "POST",
                        url: base_url + 'admin/edit_class',
                        data: {class_id: class_id, class_name: class_name, class_name_bn: class_name_bn},
                        cache: false,
                        success: function (result) {
                            all_class_list();
                            $('.box-header').append('<div class="alert alert-danger alert-dismissible" role="alert">' +
                                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                                    '<span aria-hidden="true">&times;</span></button>' +
                                    '<strong>Status! </strong>' +
                                    'Successfully Changed' +
                                    '</div>');
                        }
                    });
                });
            }
        });
    }


    window.onload = function () {

        /* 
         * call the all class list jquery function to display 
         *  
         * */
        all_class_list();
    }


</script>



