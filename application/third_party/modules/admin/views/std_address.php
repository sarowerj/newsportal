<div class="tab-pane active" id="tab_a">
    <h4>Student's Address</h4>
    <div class="col-sm-12">
        <div id="present-address">
            <div class="form-group">
                <label class="col-md-4 control-label" for="st_present_district"></label>  
                <div class="col-sm-7 col-xs-12 text-bold">
                    Present Address
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">District & Upazila</label>  
                <div class="col-sm-4 col-xs-12">
                    <select id="st_present_district" name="st_present_district" class="district form-control select2" data-placeholder="Select District" style="width: 100%;">

                    </select>
                </div>
                <div class="col-sm-3 col-xs-12">
                    <select id="st_present_thana" name="st_present_thana" class="thana form-control select2" data-placeholder="Select Thana" style="width: 100%;">

                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="st_present_post_office">Post Office & Ward</label>  
                <div class="col-sm-4 col-xs-12">
                    <input id="st_present_post_office" name="st_present_post_office" type="text" placeholder="Post Office" class="form-control input-md">
                </div>
                <div class="col-sm-3 col-xs-12">
                    <input id="st_present_ward" name="st_present_ward" type="text" placeholder="Ward No" class="form-control input-md">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="st_present_village">Village & House No</label>  
                <div class="col-sm-4 col-xs-12">
                    <input id="st_present_village" name="st_present_village" type="text" placeholder="Village" class="form-control input-md">
                </div>
                <div class="col-sm-3 col-xs-12">
                    <input id="st_present_house_no" name="st_present_house_no" type="text" placeholder="House No" class="form-control input-md">
                </div>
            </div>
        </div>
        <div id="permanent-address">
            <div class="form-group">
                <label class="col-md-4 control-label"></label>  
                <div class="col-sm-7 col-xs-12 text-bold">
                    Permanent Address
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="st_permanent_district">District & Upazila</label>  
                <div class="col-sm-4 col-xs-12">
                    <select id="st_permanent_district" name="st_permanent_district" class="district form-control select2" data-placeholder="Select District" style="width: 100%;">

                    </select>
                </div>
                <div class="col-sm-3 col-xs-12">
                    <select id="st_permanent_thana" name="st_permanent_thana" class="thana form-control select2" data-placeholder="Select Thana" style="width: 100%;">

                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="st_permanent_post_office">Post Office & Ward</label>  
                <div class="col-sm-4 col-xs-12">
                    <input id="st_permanent_post_office" name="st_permanent_post_office" type="text" placeholder="Post Office" class="form-control input-md">
                </div>
                <div class="col-sm-3 col-xs-12">
                    <input id="st_permanent_ward" name="st_permanent_ward" type="text" placeholder="Ward No" class="form-control input-md">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="st_permanent_village">Village & House No</label>  
                <div class="col-sm-4 col-xs-12">
                    <input id="st_permanent_village" name="st_permanent_village" type="text" placeholder="Village" class="form-control input-md">
                </div>
                <div class="col-sm-3 col-xs-12">
                    <input id="st_permanent_house_no" name="st_permanent_house_no" type="text" placeholder="House No" class="form-control input-md">
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function all_district() {
        var all_district = "<option value=''>Select District</optioan>";
        $.ajax({
            type: "POST",
            url: base_url + 'admin/get_district',
            datatype: "Text",
            success: function (data) {
                var district = jQuery.parseJSON(data);
                $.each(district, function (index, value) {
                    all_district += '<option value="' + value.id + '">' + value.name + '</option>';
                });
                $('.district').html(all_district);
            }
        });
    }
    $('.district').change(function () {
        parent = $(this).parent().parent().parent().attr('id');
        district_id = $(this).val();
        all_thana = "<option value=''>Select Upazila</optioan>";
        $.ajax({
            type: "POST",
            url: base_url + 'admin/get_thana',
            datatype: "Text",
            data: {district_id: district_id},
            success: function (data) {
                var thana = jQuery.parseJSON(data);
                $.each(thana, function (index, value) {
                    all_thana += '<option value="' + value.id + '">' + value.name + '</option>';
                });
                $('#' + parent).find('.thana').html(all_thana);
            }

        });



    });
</script>