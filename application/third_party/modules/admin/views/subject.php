<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
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
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Add New Subject</button>
                                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                            </div>
                        </ol>
                    </div>

                </div>


            </div>

            <div class="box-body all_subject_list">

            </div>
        </div><!-- /.box -->

    </section><!-- /.content -->

    <!-- Main content -->
    
</div><!-- /.content-wrapper -->



<div id="new_subject_add_modal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">Add New Subject</h4>
            </div>
            <div class="modal-body">
                <?php // echo form_open('admin/add_class', array('class' => 'form-horizontal'));  ?>
                <form id="new_subjectid" class="form-horizontal" action="#" method="post">

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Subject Name</label>
                        <div class="col-sm-9">
                            <input  class="form-control" value="<?php echo set_value('subject_name'); ?>" id="subject_name" name="subject_name" placeholder="Subject name" type="text" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Subject Bangla Name</label>
                        <div class="col-sm-9">
                            <input class="form-control" id="subject_name_bn" name="subject_name_bn" placeholder="Subject Bangla Name" type="text" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Subject Code</label>
                        <div class="col-sm-9">
                            <input class="form-control" id="subject_code" name="subject_code" placeholder="Subject Code" maxlength="4" type="text"  />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Subject Type</label>
                        <div class="col-sm-9">
                            <select name="subject_type" id="subject_type" class="form-control">
                                <option value="">Select Type</option>
                                <option value="general">general</option>
                                <option value="science">science</option>
                                <option value="arts">arts</option>
                                <option value="commerce">commerce</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Is Optional</label>
                        <div class="col-sm-1">
                            <input type="radio" checked="" name="subject_optional" value="0" id="subject_optioanl" class="checkbox form-control" /> No
                        </div>
                        <div class="col-sm-1">
                            <input type="radio" name="subject_optional" value="1" id="subject_optioanl" class="checkbox form-control" /> Yes
                        </div>

                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="add_new_subject('new_subjectid')">Save changes</button>
            </div>
            </form>
            <?php // echo form_close();  ?>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>

    /* add new class js code for submit function*/

    function add_new_subject(form_id)
    {
        var datastring = $("#" + form_id).serializeArray();
        $(datastring).each(function (index, value) {
            console.log(value);
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
                url: "<?php echo base_url() . 'admin/save_subject'; ?>",
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
                        all_subject_list();

                    }

                }
            });
        }

    }

    /* all_subject_list  */

    function all_subject_list()
    {
        var all_subject_list_html = '<table class="table table-responsive table-bordered">' +
                '<tbody><tr>' +
                '<th>#</th>' +
                '<th>Subject Name</th>' +
                ' <th>Subject Name Bangla</th>' +
                '<th>Subject Code</th>' +
                '<th>Subject Type</th>' +
                '<th>Status</th>' +
                '<th>Action</th>' +
                '</tr>';
        $.ajax({
            type: "GET",
            url: base_url + "admin/get_all_subject",
            dataType: "text",
            success: function (data) {
                var json = jQuery.parseJSON(data);
                $.each(json, function (index, value) {
                    if (value.sub_optional == 1) {
                        sub = 'Optional';
                    } else {
                        sub = '';
                    }
                    if (value.sub_status == 1) {
                        var status = 'success';
                    } else {
                        var status = 'danger';
                    }
                    all_subject_list_html += ' <tr>' +
                            '<td>' + (index + 1) + '</td>' +
                            '<td><input class="subject_name hidden" type="text" value="' + value.sub_name + '"><span>' + value.sub_name + '</span></td>' +
                            '<td><input class="subject_name_bn hidden" type="text" value="' + value.sub_bname + '"><span>' + value.sub_bname + '</span></td>' +
                            '<td>' + value.sub_code + '</td>' +
                            '<td>' + sub + '</td>' +
                            '<td><button id="' + value.sub_id + '" class="status btn btn-' + status + '"><i class="fa fa-check"></i></button></td>' +
                            '<td><input class="subject_id" type="hidden" value="' + value.sub_id + '">' +
                            '<button class="btn btn-success edit_subject_success hidden"><i class="fa fa-check"></i></button>' +
                            '<div class="btn-group"><button class="btn btn-warning edit_subject"><i class="fa fa-edit"></i></button>' +
                            '<button class="btn btn-danger delete_subject"><i class="fa fa-trash"></i></button></div>' +
                            '<button class="btn btn-danger cancel hidden"><i class="fa fa-times"></i></button></div>' +
                            '</td>' +
                            '</tr>';
                });
                all_subject_list_html += '</tbody></table>';
                jQuery('.all_subject_list').html(all_subject_list_html);

                $('.status').click(function () {
                    id = $(this).attr('id');
                    $.ajax({
                        type: "POST",
                        url: base_url + 'admin/status',
                        data: {id: id, tbl_name: 'subject', col_pre: 'sub'},
                        cache: false,
                        success: function (result) {
                            all_subject_list();
                        }
                    });
                });
                $('.delete_subject').click(function () {
                    subject_id = $(this).parent().parent().find('input').val();
                    $.ajax({
                        type: "POST",
                        url: base_url + 'admin/delete_subject',
                        data: 'subject_id=' + subject_id,
                        cache: false,
                        success: function (result) {
                            all_subject_list();
                            $('.box-header').append('<div class="alert alert-warning alert-dismissible" role="alert">' +
                                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                                    '<span aria-hidden="true">&times;</span></button>' +
                                    '<strong>Status! </strong>' +
                                    'Successfully Removed' +
                                    '</div>');
                        }
                    });

                });
                $('.cancel').click(function () {
                    $(this).parent().parent().parent().find('span').show();
                    $(this).parent().parent().parent().find('input').addClass('hidden');
                    $(this).next().hide();
                    $(this).hide();
                    $(this).parent().parent().parent().find('.edit_subject').show();
                    $(this).parent().parent().parent().find('.edit_subject_success').addClass('hidden');
                    $(this).parent().parent().parent().find('.delete_subject').removeClass('hidden');

                });
                $('.edit_subject').click(function () {
                    $(this).parent().parent().parent().find('span').hide();
                    $(this).parent().parent().parent().find('input').removeClass('hidden');
                    $(this).parent().parent().parent().find('.delete_subject').addClass('hidden');
                    $(this).parent().parent().parent().find('.cancel').removeClass('hidden');
                    $(this).parent().parent().parent().find('.edit_subject_success').removeClass('hidden');
                    $(this).hide();

                });
                $('.edit_subject_success').click(function () {
                    subject_id = $(this).parent().parent().find('td').last().find('input').val();
                    subject_name = $(this).parent().parent().find('td').next().find('input').val();
                    subject_name_bn = $(this).parent().parent().find('td').next().next().find('input').val();
                    $.ajax({
                        type: "POST",
                        url: base_url + 'admin/edit_subject',
                        data: {subject_id: subject_id, subject_name: subject_name, subject_name_bn: subject_name_bn},
                        cache: false,
                        success: function (result) {
                            all_subject_list();
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

        all_subject_list();

    }


</script>



