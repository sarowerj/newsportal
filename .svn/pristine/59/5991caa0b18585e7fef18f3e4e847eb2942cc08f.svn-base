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
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Add New Department</button>
                </h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>

            <div class="box-body all_department_list">

            </div>

        </div><!-- /.box -->

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->



<div id="new_department_add_modal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">Add New Department</h4>
            </div>
            <div class="modal-body">
                <?php // echo form_open('admin/add_class', array('class' => 'form-horizontal'));  ?>
                <form id="new_departmentid" class="form-horizontal" action="#" method="post">

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Department Name</label>
                        <div class="col-sm-9">
                            <input  class="form-control" id="department_name" name="department_name" placeholder="Department name" type="text" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Department Bangla Name</label>
                        <div class="col-sm-9">
                            <input class="form-control" id="department_name_bn" name="department_name_bn" placeholder="Department Bangla Name" type="text" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Department Code</label>
                        <div class="col-sm-9">
                            <input class="form-control" id="department_code" name="department_code" placeholder="Department Code" maxlength="4" type="text"  />
                        </div>
                    </div>
                    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="add_new_department('new_departmentid')">Save changes</button>
            </div>
            </form>
            <?php // echo form_close();  ?>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>

    /* add new class js code for submit function*/

    function add_new_department(form_id)
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
            
return flag;
        });
        
        if (flag == 1)
        {
            
            var jsonMimeType = "application/json;charset=UTF-8";
            $.ajax({
                type: "POST",
                url: "<?php echo base_url() . 'admin/save_department'; ?>",
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
                        $('#new_department_add_modal').modal('hide');
                        $('.box-header').append('<h3 class="text-green">Successfully Added</h3>');
                        all_department_list();

                    }

                }
            });
        }

    }

    /* all_department_list  */

    function all_department_list()
    {
        var all_department_list_html = '<table class="table table-responsive table-bordered">' +
                '<tbody><tr>' +
                '<th>#</th>' +
                '<th>Department Name</th>' +
                ' <th>Department Name Bangla</th>' +
                '<th>Department Code</th>' +
                '<th>Status</th>' +
                '<th>Action</th>' +
                '</tr>';
        $.ajax({
            type: "GET",
            url: base_url + "admin/get_all_department",
            dataType: "text",
            success: function (data) {
                var json = jQuery.parseJSON(data);
                $.each(json, function (index, value) {
                    if (value.dep_status == 1) {
                        var status = 'success';
                    } else {
                        var status = 'danger';
                    }
                    all_department_list_html += ' <tr>' +
                            '<td>' + (index + 1) + '</td>' +
                            '<td><input class="department_name hidden" type="text" value="'+value.dep_name+'"><span>'+value.dep_name + '</span></td>' +
                            '<td><input class="department_name_bn hidden" type="text" value="'+value.dep_bname+'"><span>'+value.dep_bname + '</span></td>' +
                            '<td>' + value.dep_code + '</td>' +
                            '<td><button id="' + value.dep_id + '" class="status btn btn-' + status + '"><i class="fa fa-check"></i></button></td>' +
                            '<td><input class="department_id" type="hidden" value="'+value.dep_id+'">'+
                            '<button class="btn btn-success edit_department_success hidden"><i class="fa fa-check"></i></button>'+
                            '<div class="btn-group"><button class="btn btn-warning edit_department"><i class="fa fa-edit"></i></button>'+
                            '<button class="btn btn-danger delete_department"><i class="fa fa-trash"></i></button></div>'+
                            '</td>' +
                            '</tr>';
                });
                all_department_list_html += '</tbody></table>';
                jQuery('.all_department_list').html(all_department_list_html);
                
                $('.status').click(function () {
                    id = $(this).attr('id');
                    $.ajax({
                        type: "POST",
                        url: base_url + 'admin/status',
                        data: {id:id,tbl_name:'department',col_pre:'dep'},
                        cache: false,
                        success: function (result) {
                            all_department_list();
                        }
                    });
                });
                $('.delete_department').click( function (){
                    department_id = $(this).parent().parent().find('input').val();
                    
                    $.ajax({
                        type: "POST",
                        url: base_url+'admin/delete_department',
                        data: 'department_id='+department_id,
                        cache: false,
                        success: function (result){
                            all_department_list();
                            $('.box-header').append('<div class="alert alert-warning alert-dismissible" role="alert">'+
                                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                                    '<span aria-hidden="true">&times;</span></button>'+
                                    '<strong>Status! </strong>'+
                                    'Successfully Removed'+
                                    '</div>');
                        }
                    });
                    
                });
                
                $('.edit_department').click(function (){
                   $(this).parent().parent().parent().find('span').hide();
                   $(this).parent().parent().parent().find('input').removeClass('hidden');
                   $(this).hide();
                   
                   
                   $(this).parent().parent().parent().find('button').removeClass('hidden');
                });
                $('.edit_department_success').click(function (){
                        department_id = $(this).parent().parent().find('td').last().find('input').val();
                        department_name = $(this).parent().parent().find('td').next().find('input').val();
                        department_name_bn = $(this).parent().parent().find('td').next().next().find('input').val();
                        $.ajax({
                        type: "POST",
                        url: base_url+'admin/edit_department',
                        data: {department_id:department_id,department_name:department_name,department_name_bn:department_name_bn},
                        cache: false,
                        success: function (result){
                            all_department_list();
                            $('.box-header').append('<div class="alert alert-danger alert-dismissible" role="alert">'+
                                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                                    '<span aria-hidden="true">&times;</span></button>'+
                                    '<strong>Status! </strong>'+
                                    'Successfully Changed'+
                                    '</div>');
                        }
                    });
                   });
            }
        });
    }

    window.onload = function () {

        all_department_list();

    }


</script>



