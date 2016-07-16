<div class="tab-pane active" id="tab_a">
    <h4>Secondary School Information</h4>
    <div class="col-sm-12">

        <div class="form-group">
            <label class="col-md-3 control-label" for="st_exam_type">Name of Examination</label>
            <div class="col-sm-7 col-xs-12"> 
                <select id="st_exam_type" name="st_exam_type" class="form-control select2" data-placeholder="Select Exam" style="width: 100%;">
                    <option value="">Select Exam</option>
                    <option value="SSC">SSC</option>
                    <option value="Dakhil">Dakhil</option>
                    <option value="Other">other</option>
                </select>
            </div>
        </div>
        <!-- Radio input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="board">Examination Board</label>  
            <div class="col-sm-7 col-xs-12">
                <select name="board" id="board" class="form-control select2" data-placeholder="Select Board" style="width: 100%;">
                    <option value="">Select Board</option>
                    <option value="barisal">Barisal</option>
                    <option value="chittagong">Chittagong</option>
                    <option value="comilla">Comilla</option>
                    <option value="dhaka">Dhaka</option>
                    <option value="dinajpur">Dinajpur</option>
                    <option value="jessore">Jessore</option>
                    <option value="rajshahi">Rajshahi</option>
                    <option value="sylhet">Sylhet</option>
                    <option value="madrasah">Madrasah</option>
                    <option value="tec">Technical</option>
                    <option value="dibs">DIBS(Dhaka)</option>
                </select>
            </div>
        </div>
        <!-- Radio input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="group">Group</label>
            <div class="col-sm-7 col-xs-12 col-xs-12"> 
                <select id="group" name="group" class="form-control select2" data-placeholder="Select Group" style="width: 100%;">
                    <option value="">Select Group</option>
                    <option value="Science">Science</option>
                    <option value="Arts">Arts</option>
                    <option value="Commerce">Commerce</option>
                </select>
            </div>
        </div>
        <!-- Radio input-->
        <div class="form-group">
            <label class="col-sm-3 control-label" for="ssc_session">Academic Session</label>  
            <div class="col-md-7">
                <select id="ssc_session" name="ssc_session" class="form-control select2" style="width: 100%;">
                    <option value=""></option>
                    <?php for ($i = date('Y') - 3; $i < date('Y'); $i++) { ?>
                        <option value="<?php echo $i; ?> - <?php echo $i + 1; ?>"><?php echo $i; ?> - <?php echo $i + 1; ?></option>
                    <?php } ?>
                </select>
            </div>

        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label" for="passing_year">Passing Year</label>  
            <div class="col-sm-7 col-xs-12">
                <select id="passing_year" name="passing_year" class="form-control select2" data-placeholder="Select Passing Year" style="width: 100%;">
                    <option value="">Select One</option>
                    <?php for ($i = date('Y') - 3; $i <= date('Y'); $i++) { ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label" for="ssc_roll_no">Roll & Reg. No</label>  
            <div class="col-sm-3 col-xs-12">
                <input id="ssc_roll_no" name="ssc_roll_no" type="text" placeholder="Roll No" class="form-control input-md">
            </div>
            <div class="col-sm-4 col-xs-12">
                <input id="registration_no" id="registration_no" name="registration_no" type="text" placeholder="Registration No" class="form-control input-md">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label" for="gpa">GPA & Grade</label>  
            <div class="col-sm-3 col-xs-12">
                <input id="gpa" name="gpa" type="text" placeholder="GPA" class="form-control input-md">
            </div>
            <div class="col-sm-4 col-xs-12">
                <select id="grade" name="grade" class="form-control select2" data-placeholder="Select Grade" style="width: 100%;">
                    <option value="">Select Grade</option>
                    <option value="A+">A+</option>
                    <option value="A">A</option>
                    <option value="A-">A-</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label" for="last_organization">Institute Name</label>  
            <div class="col-sm-7 col-xs-12">
                <input required="" id="last_organization" name="last_organization" type="last_organization" placeholder="Last Education Organization" class="form-control input-md">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label" for="submit"></label>  
            <div class="col-sm-7 col-xs-12">
                <input type="submit" name="submit" id="submit" onclick="validetion('admission_form')" value="Submit" class="btn btn-primary btn-lg pull-right">
            </div>
        </div>

    </div>

</div>