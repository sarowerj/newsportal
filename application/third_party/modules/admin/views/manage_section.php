<div class="box">
    <div id="box-header-section" class="box-header with-border">
        <h3>Section</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            <button type="button" id="add_section_btn" class="btn btn-primary pull-left" data-toggle="modal" data-target=".bs-example-modal-lg2">Add Section</button>
        </div>

    </div>
    <div class="box-body all_section_list">

    </div>

</div>

<div id="new_section_add_modal" class="modal fade bs-example-modal-lg2" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">Add New Section</h4>
            </div>
            <div class="modal-body">
                <form id="new_sectionid" class="form-horizontal" action="#" method="post">
                    <input class="inp_class_id" name="class_id" type="hidden" />
                    <div class="form-group" style="display: none" id="department-area">
                        <label for="inputPassword3" class="col-sm-3 control-label">Select Department</label>
                        <div class="col-sm-9">
                            <select name="department" id="department" class="form-control department">

                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Select Shift</label>
                        <div class="col-sm-9">
                            <select name="shift" id="shift" class="shift form-control">

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Section Name</label>
                        <div class="col-sm-9">
                            <input  class="form-control" value="<?php echo set_value('section_name'); ?>" id="section_name" name="section_name" placeholder="Section name" type="text" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Section Bangla Name</label>
                        <div class="col-sm-9">
                            <input class="form-control" id="section_name_bn" name="section_name_bn" placeholder="Section Bangla Name" type="text" />
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="add_new_section('new_sectionid')">Save changes</button>
            </div>
            </form>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
    class_symble = $.trim($("#class_symble").text());
    class_id = $.trim($("#class_id").text());
    function all_department_select()
    {
        var all_department = '<option value="">Select Departnemt</option>';
        $.ajax({
            type: "GET",
            url: base_url + "admin/get_all_department",
            dataType: "text",
            data: {class_id: class_id},
            success: function (data) {
                var json = jQuery.parseJSON(data);
                $.each(json, function (index, value) {
                    all_department += '<option value="' + value.dep_id + '">' + value.dep_name + '</option>';
                });
                jQuery('.department').html(all_department);

            }
        });
    }
    function all_class_and_shift_select()
    {
        var all_class = '<option value="">Select Class</option>';
        $.ajax({
            type: "GET",
            url: base_url + "admin/get_all_class",
            dataType: "text",
            success: function (data) {
                var json = jQuery.parseJSON(data);
                $.each(json, function (index, value) {
                    all_class += '<option value="' + value.cls_id + '">' + value.cls_name + ' - ' + value.cls_symble + '</option>';
                });
                jQuery('.class').html(all_class);

            }
        });
        var all_shift = '<option value="">Select Shift</option>';
        $.ajax({
            type: "GET",
            url: base_url + "admin/get_all_shift",
            dataType: "text",
            success: function (data) {
                var json = jQuery.parseJSON(data);
                $.each(json, function (index, value) {
                    all_shift += '<option value="' + value.shi_id + '">' + value.shi_name + '</option>';
                });
                jQuery('.shift').html(all_shift);

            }
        });
    }

    function all_section_list()
    {
        var all_section_list_html = '<table class="table table-responsive table-bordered">' +
                '<tbody><tr>' +
                '<th>#</th>' +
                '<th>Shift Name</th>' +
                '<th>Section Name</th>' +
                ' <th>Section Name Bangla</th>' +
                '<th>Status</th>' +
                '<th>Action</th>' +
                '</tr>';
        $.ajax({
            type: "GET",
            url: base_url + "admin/get_all_section",
            dataType: "text",
            data: {class_id: class_id},
            success: function (data) {
                var json = jQuery.parseJSON(data);
                $.each(json, function (index, value) {
                    if (value.sec_status == 1) {
                        var status = 'success';
                    } else {
                        var status = 'danger';
                    }
                    all_section_list_html += ' <tr>' +
                            '<td>' + (index + 1) + '</td>' +
                            '<td><select class="shift hidden"></select><span>' + value.shi_name + '</span></td>' +
                            '<td><input class="section_name hidden" type="text" value="' + value.sec_name + '"><span>' + value.sec_name + '</span></td>' +
                            '<td><input class="section_name_bn hidden" type="text" value="' + value.sec_bname + '"><span>' + value.sec_bname + '</span></td>' +
                            '<td><button id="' + value.sec_id + '" class="status btn btn-' + status + '"><i class="fa fa-check"></i></button></td>' +
                            '<td><input class="section_id" type="hidden" value="' + value.sec_id + '">' +
                            '<button class="btn btn-success edit_section_success hidden"><i class="fa fa-check"></i></button>' +
                            '<div class="btn-group"><button class="btn btn-warning edit_section"><i class="fa fa-edit"></i></button>' +
                            '<button class="btn btn-danger delete_section"><i class="fa fa-trash"></i></button></div>' +
                            '<button class="btn btn-danger cancel hidden"><i class="fa fa-times"></i></button></div>' +
                            '</td>' +
                            '</tr>';
                });
                all_section_list_html += '</tbody></table>';
                jQuery('.all_section_list').html(all_section_list_html);

                $('.status').click(function () {
                    id = $(this).attr('id');
                    $.ajax({
                        type: "POST",
                        url: base_url + 'admin/status',
                        data: {id: id, tbl_name: 'section', col_pre: 'sec'},
                        cache: false,
                        success: function (result) {
                            all_section_list();
                        }
                    });
                });
                $('.delete_section').click(function () {
                    if (confirm('Are you sure?')) {
                        alert('Data Parmanently Removed');
                    } else {
                        exit();
                    }
                    section_id = $(this).parent().parent().find('input').val();

                    $.ajax({
                        type: "POST",
                        url: base_url + 'admin/delete_section',
                        data: 'section_id=' + section_id,
                        cache: false,
                        success: function (result) {
                            all_section_list();
                            $('#box-header-section').append('<div class="alert alert-warning alert-dismissible" role="alert">' +
                                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                                    '<span aria-hidden="true">&times;</span></button>' +
                                    '<strong>Status! </strong>' +
                                    'Successfully Removed' +
                                    '</div>');
                        }
                    });

                });

                $('.edit_section').click(function () {
                    $(this).parent().parent().parent().find('span').hide();
                    $(this).parent().parent().parent().find('input').removeClass('hidden');
                    $(this).parent().parent().parent().find('select').removeClass('hidden');
                    $(this).hide();
                    all_shift_select();
                    $(this).parent().parent().parent().find('.cancel').removeClass('hidden');
                    $(this).parent().parent().parent().find('.delete_section').addClass('hidden');
                    $(this).parent().parent().parent().find('.edit_section_success').removeClass('hidden');
                });
                $('.cancel').click(function () {
                    $(this).parent().parent().parent().find('span').show();
                    $(this).parent().parent().parent().find('input').addClass('hidden');
                    $(this).parent().parent().parent().find('select').addClass('hidden');
                    $(this).next().hide();
                    $(this).hide();
                    $(this).parent().parent().parent().find('.edit_section').show();
                    $(this).parent().parent().parent().find('.edit_section_success').addClass('hidden');
                    $(this).parent().parent().parent().find('.delete_section').removeClass('hidden');

                });
                $('.edit_section_success').click(function () {
                    section_id = $(this).parent().parent().find('td').last().find('input').val();
                    section_name = $(this).parent().parent().find('td').next().find('input').val();
                    shift_id = $(this).parent().parent().find('td').find('select').val();
                    section_name_bn = $(this).parent().parent().find('td').next().next().next().find('input').val();

                    $.ajax({
                        type: "POST",
                        url: base_url + 'admin/edit_section',
                        data: {shift_id: shift_id, section_id: section_id, section_name: section_name, section_name_bn: section_name_bn},
                        cache: false,
                        success: function (result) {
                            all_section_list();
                            $('#box-header-section').append('<div class="alert alert-danger alert-dismissible" role="alert">' +
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
    $('#add_section_btn').click(function () {
        
        $('.inp_class_id').val(class_id);
        all_class_and_shift_select();
        all_department_select();
    }
    );

    if (class_symble > 8) {
        all_department_select();
        $('#department-area').show();
    }

    /* add new class js code for submit function*/

    function add_new_section(form_id)
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
                url: "<?php echo base_url() . 'admin/save_section'; ?>",
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
                        console.log(data);
                        $('.success_msg').remove();
                        $('#new_section_add_modal').modal('hide');
                        $('#box-header-section').append('<div class="alert alert-success alert-dismissible" role="alert">' +
                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                                '<span aria-hidden="true">&times;</span></button>' +
                                '<strong>Status! </strong>' +
                                'Data Added Successfully' +
                                '</div>');
                        all_section_list();

                    }

                }
            });
        }

    }

    function all_shift_select()
    {
        var all_shift = '<option value="">Select Shift</option>';
        $.ajax({
            type: "GET",
            url: base_url + "admin/get_all_shift",
            dataType: "text",
            success: function (data) {
                var json = jQuery.parseJSON(data);
                $.each(json, function (index, value) {
                    all_shift += '<option value="' + value.shi_id + '">' + value.shi_name + '</option>';
                });
                jQuery('.shift').html(all_shift);

            }
        });
    }

    window.onload = function () {
        all_section_list();

    }
</script>