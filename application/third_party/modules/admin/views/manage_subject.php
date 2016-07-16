<div class="box">
    <div id="box-header-subject" class="box-header with-border">
        <h3>Subjects</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            <button type="button" id="add_subject_btn" class="btn btn-primary pull-left" data-toggle="modal" data-target=".bs-example-modal-subject">Add Subject</button>
        </div>

    </div>
    <div class="box-body" id="class_subject_list">

    </div>

</div>

<div id="new_subject_add_modal" class="modal fade bs-example-modal-subject" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">Add New Subject</h4>
            </div>
            <div class="modal-body">
                <?php // echo form_open('admin/add_class', array('class' => 'form-horizontal'));  ?>
                <form id="new_subject_chooseid" class="form-horizontal" action="#" method="post">
                    <input value="" id="inp_class_id" name="class_id" type="hidden" />
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Department Code</label>
                        <div class="col-sm-9">
                            <select id="subject" class="form-control" name="subject">

                            </select>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="add_new_subject_choose('new_subject_chooseid')">Save changes</button>
            </div>
            </form>
            <?php // echo form_close();  ?>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
    class_symble = $.trim($("#class_symble").text());
    class_id = $.trim($("#class_id").text());
    $('#inp_class_id').val(class_id);
    function add_new_subject_choose(form_id)
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
                url: "<?php echo base_url() . 'admin/save_subject_Choose'; ?>",
                beforeSend: function (x) {
                    if (x && x.overrideMimeType) {
                        x.overrideMimeType(jsonMimeType);
                    }
                },
                data: {datastring: datastring},
                dataType: "text",
                success: function (data) {
                    all_subject_class();
                    all_subject_select();
                    var json = jQuery.parseJSON(data);
                    if (json.error == 0)
                    {
                        $('.success_msg').remove();
                        $('#new_subject_add_modal').modal('hide');
                        $('#box-header-subject').append('<div class="alert alert-success alert-dismissible" role="alert">' +
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
    all_subject_class();
    function all_subject_class()
    {

        var all_subject_class_html = '<table class="table table-responsive table-bordered">' +
                '<tbody><tr>' +
                '<th>#</th>' +
                '<th>Subject Name</th>' +
                ' <th>Subject Name Bangla</th>' +
                '<th>Subject Code</th>' +
                '<th>Action</th>' +
                '</tr>';
        $.ajax({
            type: "POST",
            url: base_url + 'admin/get_subject_as_class',
            dataType: "text",
            data: {class_id: class_id},
            success: function (data) {
                var json = jQuery.parseJSON(data);
                $.each(json, function (index, value) {
                    all_subject_class_html += ' <tr>' +
                            '<td>' + (index + 1) + '</td>' +
                            '<td><span>' + value.sub_name + '</span></td>' +
                            '<td><span>' + value.sub_bname + '</span></td>' +
                            '<td>' + value.sub_code + '</td>' +
                            '<td><input class="meta_id" type="hidden" value="' + value.id + '">' +
                            '<button class="btn btn-danger delete_subject"><i class="fa fa-trash"></i></button></div>' +
                            '</td>' +
                            '</tr>';
                });
                all_subject_class_html += '</tbody></table>';
                jQuery('#class_subject_list').html(all_subject_class_html);
                
                $('.delete_subject').click(function () {
                    if (confirm('Are you sure?')) {
                        alert('Data Parmanently Removed');
                        
                    } else {
                        exit();
                    }
                    meta_id = $(this).parent().parent().find('input').val();
                    $.ajax({
                        type: "POST",
                        url: base_url + 'admin/delete_subject_form_class',
                        data: 'meta_id=' + meta_id,
                        cache: false,
                        success: function (result) {
                            all_subject_select();
                            all_subject_class();
                            $('#box-header-subject').append('<div class="alert alert-warning alert-dismissible" role="alert">' +
                                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                                    '<span aria-hidden="true">&times;</span></button>' +
                                    '<strong>Status! </strong>' +
                                    'Successfully Removed' +
                                    '</div>');
                        }
                    });

                });
            }
        });
    }


    function all_subject_select()
    {
        var all_subject = '<option value="">Select Subject</option>';
        $.ajax({
            type: "POST",
            url: base_url + "admin/get_subject_check",
            dataType: "text",
            data:{class_id:class_id},
            success: function (data) {
                var json = jQuery.parseJSON(data);
                $.each(json, function (index, value) {
                    all_subject += '<option value="' + value.sub_id + '">' + value.sub_name + '</option>';
                });
                jQuery('#subject').html(all_subject);

            }
        });
    }

    all_subject_select();
</script>