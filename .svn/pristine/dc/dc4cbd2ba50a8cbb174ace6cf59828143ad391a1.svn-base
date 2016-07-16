<div class="tab-pane active" id="tab_a">
    <h4>Admission Information</h4>
    <div class="col-sm-12">
        <div class="form-group">
            <label class="col-md-4 control-label" for="admission_type">Admission Type</label>
            <div class="col-md-7">
                <div class="col-md-6">
                    <input type="radio" name="admission_type" id="admission_type" value="Residential" checked="">
                    Residential
                </div>
                <div class="col-md-6">
                    <input type="radio" name="admission_type" value="Non Residential">
                    Non Residential
                </div>  
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="st_addmission_class">Admission Class</label>
            <div class="col-md-7">
                <select id="st_addmission_class" name="st_addmission_class" class="form-control select2" data-placeholder="Select Class" style="width: 100%;">

                </select>
            </div>
        </div>

        <div id="department-area" class="form-group hidden">
            <label class="col-md-4 control-label" for="st_addmission_group">Admission Group</label>
            <div class="col-md-7"> 
                <select id="st_addmission_group" name="st_addmission_group" class="form-control select2" data-placeholder="Select Group" style="width: 100%;">

                </select>
            </div>
        </div>
        <div id="section-area" class="form-group hidden">
            <label class="col-md-4 control-label" for="st_addmission_group">Section</label>
            <div class="col-md-7"> 
                <select id="section" name="section" class="form-control select2" data-placeholder="Select Section" style="width: 100%;">

                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="academic_year">Academic Year</label>  
            <div class="col-md-7">
                <select id="academic_year" name="academic_year" class="form-control select2" data-placeholder="Select Session" style="width: 100%;">

                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="gender">Gender</label>
            <div class="col-md-7"> 
                <label class="radio-inline" for="gender">
                    <input type="radio" name="gender" id="gender" value="Male" checked="checked">
                    Male
                </label> 
                <label class="radio-inline" for="gender-1">
                    <input type="radio" name="gender" value="Female">
                    Female
                </label>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="admission_roll">Admission Roll</label>  
            <div class="col-md-7">
                <input id="admission_roll" name="admission_roll" type="text" placeholder="Admission Roll" class="form-control input-md">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="id_no">ID No</label>  
            <div class="col-md-7">
                <input id="id_no" name="id_no" type="text" placeholder="ID No" class="form-control input-md number">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="form_no">Form No</label>  
            <div class="col-md-7">
                <input id="form_no" name="form_no" type="text" placeholder="Form No" class="form-control input-md">
            </div>
        </div>
    </div>

</div>
<script>
    all_class_select();
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
                    all_class += '<option value="' + value.cls_id + '">' + value.cls_name + ' - ' + value.cls_symble + '</option>';
                });
                jQuery('#st_addmission_class').html(all_class);

            }
        });
    }
    $('#st_addmission_class').change(function () {
        val = $.trim($('#st_addmission_class option:selected').text());
        class_symbol = val.split('-');
        class_id = $(this).val();
        subject();
        var section_select = "<option value=''>Select Section</option>";

        if (class_symbol[1] > 8) {
            all_department_select();
            $('#department-area').removeClass('hidden');
                $('#st_addmission_group').change(function () {
                    department_id = $(this).val();
                    $.ajax({
                        type: 'post',
                        url: base_url + 'admin/get_section_asdepartment',
                        datatype: 'text',
                        data: {class_id: class_id, department_id: department_id},
                        success: function (data) {
                            var json = jQuery.parseJSON(data);
                            $.each(json, function (index, value) {
                                section_select += '<option value="' + value.sec_id + '">' + value.sec_name + '</option>';
                            });
                            $('#section').html(section_select);
                            $('#section-area').removeClass('hidden');
                        }
                    });
                });

            
        } else {
            $('#department-area').addClass('hidden');

            $.ajax({
                type: 'post',
                url: base_url + 'admin/get_section_asclass',
                datatype: 'text',
                data: {class_id: class_id},
                success: function (data) {
                    var json = jQuery.parseJSON(data);
                    $.each(json, function (index, value) {
                        section_select += '<option value="' + value.sec_id + '">' + value.sec_name + '</option>';
                    });
                    $('#section').html(section_select);
                    $('#section-area').removeClass('hidden');
                }
            });

        }
        var d = new Date();
        var year = d.getUTCFullYear();
        if (class_symbol[1] < 10) {

            option = "<option value=''>Select Academic Year</option>";

            for (i = (year - 1); i <= (year + 1); i++) {
                option += '<option value=' + i + '>' + (i) + '</option>';
            }
            $('#academic_year').html(option);
        } else {
            option2 = "<option value=''>Select Session</option>";
            for (i = (year - 1); i <= (year); i++) {
                option2 += '<option value=' + i + '-' + (i + 1) + '>' + i + '-' + (i + 1) + '</option>';
            }
            $('#academic_year').html(option2);
        }

    });
    $('#st_addmission_group').change(function () {
        group_id = $(this).val();
        group_name = $.trim($('#st_addmission_group option:selected').text());
        subject();
    });

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
                jQuery('#st_addmission_group').html(all_department);

            }
        });
    }
    function subject()
    {
        var geleral_subject = '';
        var compulsory_subject = '';
        var optional_sub = '';
        $.ajax({
            type: "POST",
            url: base_url + "admin/get_subject_as_class",
            dataType: "text",
            data: {class_id: class_id},
            success: function (data) {
                var json = jQuery.parseJSON(data);
                $.each(json, function (index, value) {
                    group_name = $.trim($('#st_addmission_group option:selected').text());
                    if (value.sub_type == 'general') {
                        geleral_subject += '<div class="col-md-6"> <input type="checkbox" name="general_sub[]" value="' + value.sub_id + '"> ' + value.sub_name + '</div>';
                    }
                    if ((value.sub_type === group_name) && (value.sub_optional != 1)) {

                        compulsory_subject += '<div class="col-md-6"> <input type="checkbox" name="compulsory_sub[]" value="' + value.sub_id + '"> ' + value.sub_name + '</div>';
                    }
                    if ((value.sub_type === group_name) && value.sub_optional == 1) {
                        optional_sub += '<div class="col-md-6"> <input type="radio" name="optional_sub" value="' + value.sub_id + '"> ' + value.sub_name + '</div>';
                    }
                });
                console.log(compulsory_subject);
                $('#general_sub').html(geleral_subject);
                $('#compulsory_subject').html(compulsory_subject);
                $('#optional_sub').html(optional_sub);

            }
        });
    }
     $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();
    });
</script>