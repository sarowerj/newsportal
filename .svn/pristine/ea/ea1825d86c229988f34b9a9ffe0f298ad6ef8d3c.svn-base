<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin_model');
        $session = $this->session->userdata('username');
        //print_r($session);die();
        if ($session == null) {
            $this->session->set_flashdata('error', 'Please login first!');
            redirect('login', 'refresh');
        }
    }

    public function index() {
        $data = new stdClass();
        $data->title = 'Site | Dashboard';
        $data->meta = 'dashbord';
        $data->active = 'academic';

        $this->template->load('admin/template_dashboard_admin', 'admin/class', $data);
    }

    public function form_submit() {
        $this->form_validation->set_rules('name', 'Name', 'required|min_length[4]|max_length[10]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('number', 'Phone Number', 'required|numeric|max_length[15]');
        $this->form_validation->set_rules('subject', 'Subject', 'required|max_length[10]|alpha');
        $this->form_validation->set_rules('message', 'Message', 'required|min_length[12]|max_length[100]');


        // hold error messages in div
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        // check for validation
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('form');
        } else {
            $this->session->set_flashdata('item', 'form submitted successfully');
            redirect(current_url());
        }
    }

    public function login() {
        $data = new stdClass();
        $data->title = 'Form | Dashboard';
        $this->template->load('template_dashboard_admin', 'login', $data);
    }

    /*
     * 
     * Start Class information 
     *
     */

    public function AllClass() {
        $data = new stdClass();
        $data->title = 'Class | Dashboard';
        $data->meta = 'class';
        $data->active = 'academic';
        $this->template->load('admin/template_dashboard_admin', 'admin/class', $data);
    }

    public function get_all_class() {
        $result = $this->admin_model->get_AllClass();
        /* not work below this */
        echo json_encode($result);
        die();
    }

    public function save_class() {

        $errflag = 0;
        /* validation php end */
        if (empty(trim($_POST['datastring'][0]['value'])) || empty(trim($_POST['datastring'][1]['value'])) || empty(trim($_POST['datastring'][2]['value'])))
            $errflag = 1;
        if (!is_numeric(trim($_POST['datastring'][2]['value'])) || (trim($_POST['datastring'][2]['value']) > 12))
            $errflag = 1;

        /**/

        if ($errflag == 0) {
            $insert_data = array(
                array(
                    'cls_name' => trim($_POST['datastring'][0]['value']),
                    'cls_bname' => trim($_POST['datastring'][1]['value']),
                    'cls_symble' => trim($_POST['datastring'][2]['value'])
                )
            );
            $result = $this->admin_model->insert('class', $insert_data);
            if (!$result)
                $errflag = 1;
        }
        $data['error'] = $errflag;

        /* not work below this */
        echo json_encode($data);
        die();
    }

    public function delete_class() {
        $class_id = $this->input->post('class_id');
        $this->admin_model->delete_class($class_id);
        echo "Class Successfully Removed";
    }

    public function edit_class() {
        $class_id = $this->input->post('class_id');
        $data = array(
            'cls_name' => $this->input->post('class_name'),
            'cls_bname' => $this->input->post('class_name_bn')
        );
        $q = $this->admin_model->edit_class($class_id, $data);
        echo 'Successed';
    }

    /*
     * 
     * End Class information 
     *
     */


    /*
     * Start subject information 
     */

    public function subject() {
        $data = new stdClass();
        $data->title = 'Subject | Dashboard';
        $data->meta = 'subject';
        $data->active = 'academic';
        $this->template->load('admin/template_dashboard_admin', 'admin/subject', $data);
    }

    public function get_all_subject() {
        $result = $this->admin_model->get_all_subject();
        /* not work below this */
        echo json_encode($result);
    }

    public function save_subject() {

        $errflag = 0;
        /* validation php end */
        if (empty(trim($_POST['datastring'][0]['value'])) ||
                empty(trim($_POST['datastring'][1]['value'])) ||
                empty(trim($_POST['datastring'][2]['value'])) ||
                empty(trim($_POST['datastring'][3]['value']))
        )
            $errflag = 1;
        if (!is_numeric(trim($_POST['datastring'][2]['value'])))
            $errflag = 1;

        /**/

        if ($errflag == 0) {
            $insert_data = array(
                array(
                    'sub_name' => trim($_POST['datastring'][0]['value']),
                    'sub_bname' => trim($_POST['datastring'][1]['value']),
                    'sub_code' => trim($_POST['datastring'][2]['value']),
                    'sub_type' => trim($_POST['datastring'][3]['value']),
                    'sub_optional' => trim($_POST['datastring'][4]['value'])
                )
            );
            $result = $this->admin_model->insert('subject', $insert_data);
            if (!$result)
                $errflag = 1;
        }
        $data['error'] = $errflag;

        /* not work below this */
        echo json_encode($data);
        die();
    }

    public function delete_subject() {
        $subject_id = $this->input->post('subject_id');
        $this->admin_model->delete_subject($subject_id);
        echo "Subject Successfully Removed";
    }

    public function edit_subject() {
        $subject_id = $this->input->post('subject_id');
        $data = array(
            'sub_name' => $this->input->post('subject_name'),
            'sub_bname' => $this->input->post('subject_name_bn')
        );
        $q = $this->admin_model->edit_subject($subject_id, $data);
    }

    /*
     * 
     * End subject information 
     *
     */

    /*
     * Start department information 
     */

    public function department() {
        $data = new stdClass();
        $data->title = 'Department | Dashboard';
        $data->meta = 'department';
        $data->active = 'academic';
        $this->template->load('admin/template_dashboard_admin', 'admin/department', $data);
    }

    public function get_all_department() {
        $class_id = $this->input->get('class_id');
        $result = $this->admin_model->get_all_department($class_id);
        /* not work below this */
        echo json_encode($result);
    }

    public function save_department() {
        $errflag = 0;
        /* validation php end */
        if (empty(trim($_POST['datastring'][0]['value'])) ||
                empty(trim($_POST['datastring'][1]['value'])) ||
                empty(trim($_POST['datastring'][2]['value']))
        )
            $errflag = 1;
        if ($errflag == 0) {
            $insert_data = array(
                array(
                    'cls_id' => trim($_POST['datastring'][0]['value']),
                    'dep_name' => trim($_POST['datastring'][1]['value']),
                    'dep_bname' => '',
                    'dep_code' => trim($_POST['datastring'][2]['value'])
                )
            );

            $result = $this->admin_model->insert('department', $insert_data);
            if (!$result)
                $errflag = 1;
        }
        $data['error'] = $errflag;

        /* not work below this */
        echo json_encode($data);
        die();
    }

    public function delete_department() {
        $department_id = $this->input->post('department_id');
        $this->admin_model->delete_department($department_id);
        echo "Subject Successfully Removed";
    }

    public function edit_department() {
        $department_id = $this->input->post('department_id');
        $data = array(
            'dep_name' => $this->input->post('department_name'),
            'dep_bname' => $this->input->post('department_name_bn')
        );
        $q = $this->admin_model->edit_department($department_id, $data);
    }

    /*
     * 
     * End department information 
     *
     */

    /*
     * Start shift information 
     */

    public function shift() {
        $data = new stdClass();
        $data->title = 'Shift | Dashboard';
        $data->meta = 'shift';
        $data->active = 'academic';
        $this->template->load('admin/template_dashboard_admin', 'admin/shift', $data);
    }

    public function get_all_shift() {
        $result = $this->admin_model->get_all_shift();
        /* not work below this */
        echo json_encode($result);
    }

    public function save_shift() {

        $errflag = 0;
        /* validation php end */
        if (empty(trim($_POST['datastring'][0]['value'])) ||
                empty(trim($_POST['datastring'][1]['value'])) ||
                empty(trim($_POST['datastring'][2]['value'])) ||
                empty(trim($_POST['datastring'][3]['value']))
        )
            $errflag = 1;
        if ($errflag == 0) {
            $insert_data = array(
                array(
                    'shi_name' => trim($_POST['datastring'][0]['value']),
                    'shi_bname' => trim($_POST['datastring'][1]['value']),
                    'shi_stime' => trim($_POST['datastring'][2]['value']),
                    'shi_etime' => trim($_POST['datastring'][3]['value'])
                )
            );
            $result = $this->admin_model->insert('shift', $insert_data);
            if (!$result)
                $errflag = 1;
        }
        $data['error'] = $errflag;

        /* not work below this */
        echo json_encode($data);
        die();
    }

    public function delete_shift() {
        $shift_id = $this->input->post('shift_id');
        $this->admin_model->delete_shift($shift_id);
        echo "Subject Successfully Removed";
    }

    public function edit_shift() {
        $shift_id = $this->input->post('shift_id');
        $data = array(
            'shi_name' => $this->input->post('shift_name'),
            'shi_bname' => $this->input->post('shift_name_bn'),
            'shi_stime' => $this->input->post('shift_stime'),
            'shi_etime' => $this->input->post('shift_etime')
        );

        $q = $this->admin_model->edit_shift($shift_id, $data);
    }

    /*
     * 
     * End shift information 
     *
     */

    public function status() {
        $tbl = $this->input->post('tbl_name');
        $col_pre = $this->input->post('col_pre');
        $id = $this->input->post('id');
        $this->admin_model->status($tbl, $col_pre, $id);
    }

    /*
     * Start section information 
     */

    public function section() {
        $data = new stdClass();
        $data->title = 'Section | Dashboard';
        $data->meta = 'class';
        $data->active = 'academic';
        $this->template->load('admin/template_dashboard_admin', 'admin/section', $data);
    }

    public function get_all_section() {
        $class_id = $this->input->get('class_id');
        $result = $this->admin_model->get_all_section($class_id);
        /* not work below this */
        echo json_encode($result);
    }

    public function save_section() {

        $errflag = 0;
        /* validation php end */
        foreach ($_POST['datastring'] as $value) {
            $get_data_array[$value['name']] = $value['value'];
        }

        if (isset($get_data_array['department'])) {
            $insert_data = array(
                array(
                    'dep_id' => $get_data_array['department'],
                    'cls_id' => $get_data_array['class_id'],
                    'shi_id' => $get_data_array['shift'],
                    'sec_name' => $get_data_array['section_name'],
                    'sec_bname' => $get_data_array['section_name_bn']
                )
            );
        } else {
            $insert_data = array(
                array(
                    'cls_id' => $get_data_array['class_id'],
                    'shi_id' => $get_data_array['shift'],
                    'sec_name' => $get_data_array['section_name'],
                    'sec_bname' => $get_data_array['section_name_bn']
                )
            );
        }
        $result = $this->admin_model->insert('section', $insert_data);
        if (!$result)
            $errflag = 1;
        $data['error'] = $errflag;
        /* not work below this */
        echo json_encode($data);
        die();
    }

    public function delete_section() {
        $section_id = $this->input->post('section_id');
        $this->admin_model->delete_section($section_id);
    }

    public function edit_section() {
        $section_id = $this->input->post('section_id');
        $data = array(
            'sec_name' => $this->input->post('section_name'),
            'sec_bname' => $this->input->post('section_name_bn')
        );

        if (!empty($this->input->post('shift_id'))) {
            $data = array(
                'shi_id' => $this->input->post('shift_id'),
                'sec_name' => $this->input->post('section_name'),
                'sec_bname' => $this->input->post('section_name_bn')
            );
        }

        $q = $this->admin_model->edit_section($section_id, $data);
    }

    /*
     * 
     * End section information 
     *
     */

    public function manage_subject($class_id) {
        $data = new stdClass();
        $data->class_id = $class_id;
        $data->title = 'Manage Subject | Dashboard';
        $data->meta = 'class';
        $data->active = 'academic';
        $class_info = $this->admin_model->get_class_info($class_id);
        $data->class_name = $class_info->cls_name;
        $data->class_symble = $class_info->cls_symble;
        $data->class_status = $class_info->cls_status;
        $data->class_id = $class_info->cls_id;
        $this->template->load('admin/template_dashboard_admin', 'admin/manage_class', $data);
    }

    public function get_subject_as_class() {
        $class_id = $this->input->post('class_id');
        $result = $this->admin_model->all_subject_class($class_id);

        echo json_encode($result);
    }

    public function save_subject_Choose() {

        $errflag = 0;
        /* validation php end */
        if (empty(trim($_POST['datastring'][0]['value'])) ||
                empty(trim($_POST['datastring'][1]['value']))
        )
            $errflag = 1;
        if ($errflag == 0) {
            $insert_data = array(
                array(
                    'cls_id' => trim($_POST['datastring'][0]['value']),
                    'sub_id' => trim($_POST['datastring'][1]['value'])
                )
            );

            $result = $this->admin_model->insert('class_meta', $insert_data);
            if (!$result)
                $errflag = 1;
        }
        $data['error'] = $errflag;

        /* not work below this */
        echo json_encode($data);
        die();
    }

    public function delete_subject_form_class() {
        $meta_id = $this->input->post('meta_id');
        $this->admin_model->delete_meta_class($meta_id);
    }

    public function get_subject_check() {
        $class_id = $this->input->post('class_id');
        $result = $this->admin_model->get_subject_check($class_id);
        /* not work below this */
        echo json_encode($result);
    }

    /*     * ***********Addmission Start********** */

    public function addmission_form() {
        $data = new stdClass();
        $data->title = 'Addmission | Dashboard';
        $data->meta = 'addmission';
        $data->active = 'addmission';

        $this->template->load('admin/template_dashboard_admin', 'admin/addmission-form', $data);
    }

    public function get_district() {
        $district = $this->admin_model->get_district();
        echo json_encode($district);
    }

    public function get_thana() {
        $district_id = $this->input->post('district_id');
        $thana = $this->admin_model->get_thana($district_id);
        echo json_encode($thana);
    }

    public function get_admission_data() {
        $date = explode('/', $this->input->post('date_of_birth'));
        $date_of_birth = $date[2] . '-' . $date[1] . '-' . $date[0];
        $insert_student_info = array(
            'stu_name' => $this->input->post('st_name_english'),
            'stu_bname' => $this->input->post('st_name_bangla'),
            'stu_contact' => $this->input->post('st_phone'),
            'stu_email' => $this->input->post('st_email'),
            'stu_type' => $this->input->post('admission_type'),
            'stu_date_of_birth' => $date_of_birth,
            //'stu_name' => $this->input->post('nationality'),
            'stu_religion' => $this->input->post('religion'),
            'stu_blood_group' => $this->input->post('blood_group'),
            'stu_gender' => $this->input->post('gender'),
            'stu_quota' => $this->input->post('quota'),
            'stu_nid' => $this->input->post('id_no'),
            'stu_bitrh_certificate' => $this->input->post('bitrh_certificate')
        );

        //student info data will be insert here


        $session = $this->input->post('academic_year');
        if (sizeof($session) != 1) {
            $session2 = explode('-', $session);
        } else {
            $session2[0] = $session;
            $session2[1] = $session;
        }
        $insert_admission_info = array(
            'add_syear' => $session2[0],
            'add_eyear' => $session2[1],
            'add_addmission_year' => $session2[0],
            'add_form_number' => $this->input->post('form_no'),
            'add_form_number' => $this->input->post('form_no'),
            'sec_id' => $this->input->post('section')
        );

        $common_sub = $this->input->post('general_sub');
        $common_sub_list = '';
        for ($i = 0; $i < sizeof($common_sub); $i++) {
            $common_sub_list .= $common_sub[$i] . ',';
        }

        $comp_sub = $this->input->post('compulsory_sub');
        $comp_sub_list = '';
        for ($i = 0; $i < sizeof($comp_sub); $i++) {
            $comp_sub_list .= $comp_sub[$i] . ',';
        }
        $insert_current_info = array(
            'sec_id' => $this->input->post('section'),
            'scd_mandatory_sub' => $common_sub_list . '' . $comp_sub_list,
            'scd_optional_sub' => $this->input->post('optional_sub'),
            'scd_class_roll' => $this->input->post('admission_roll')
        );
        //academic info data will be insert here

        $insert_ft_info = array(
            'par_name' => $this->input->post('ft_name_bangla'),
            'par_bname' => $this->input->post('ft_name_english'),
            'par_contact' => $this->input->post('ft_phone'),
            'par_designation' => $this->input->post('ft_designation'),
            'par_occupation' => $this->input->post('ft_occupation'),
            'par_is_contact_person' => $this->input->post('contact_person'),
            'par_type' => 'Father',
        );
        //father data will be insert here
        $insert_mt_info = array(
            'par_name' => $this->input->post('moth_name_english'),
            'par_bname' => $this->input->post('moth_name_bangla'),
            'par_contact' => $this->input->post('moth_phone'),
            'par_designation' => $this->input->post('moth_designation'),
            'par_occupation' => $this->input->post('moth_occupation'),
            'par_is_contact_person' => $this->input->post('contact_person'),
            'par_type' => 'Mother',
        );

        //mother data will be insert here
        $insert_lg_info = array(
            'par_name' => $this->input->post('local_guardian_name'),
            'par_contact' => $this->input->post('local_guardian_ph'),
            'par_relation' => $this->input->post('local_relationship'),
            'par_occupation' => $this->input->post('local_guardian_occupation'),
            'par_address' => $this->input->post('local_guardian_address'),
            'par_is_contact_person' => $this->input->post('contact_person'),
            'par_type' => 'Local',
        );

        //local guardian data will be insert here
        $insert_ap_info = array(
            'par_name' => $this->input->post('ab_guardian_name'),
            'par_bname' => $this->input->post('moth_name_english'),
            'par_contact' => $this->input->post('ab_guardian_ph'),
            'par_designation' => $this->input->post('moth_designation'),
            'par_occupation' => $this->input->post('moth_occupation'),
            'par_address' => $this->input->post('ab_guardian_address'),
            'par_is_contact_person' => $this->input->post('contact_person'),
            'par_type' => 'Absent_Parents',
        );
        //absent of parent data will be insert here
        $meta_data = array(
            array(
                'meta_key' => 'std_present_district',
                'meta_value' => $this->input->post('st_present_district')
            ),
            array(
                'meta_key' => 'std_present_thana',
                'meta_value' => $this->input->post('st_present_thana')
            ),
            array(
                'meta_key' => 'std_present_post_office',
                'meta_value' => $this->input->post('st_present_post_office')
            ),
            array(
                'meta_key' => 'std_present_ward',
                'meta_value' => $this->input->post('st_present_ward')
            ),
            array(
                'meta_key' => 'std_present_village',
                'meta_value' => $this->input->post('st_present_village')
            ),
            array(
                'meta_key' => 'std_present_house_no',
                'meta_value' => $this->input->post('st_present_house_no')
            ),
            array(
                'meta_key' => 'std_permanent_district',
                'meta_value' => $this->input->post('st_permanent_district')
            ),
            array(
                'meta_key' => 'std_permanent_thana',
                'meta_value' => $this->input->post('st_permanent_thana')
            ),
            array(
                'meta_key' => 'std_permanent_post_office',
                'meta_value' => $this->input->post('st_permanent_post_office')
            ),
            array(
                'meta_key' => 'std_permanent_ward',
                'meta_value' => $this->input->post('st_permanent_ward')
            ),
            array(
                'meta_key' => 'std_permanent_village',
                'meta_value' => $this->input->post('st_permanent_village')
            ), array(
                'meta_key' => 'std_permanent_house_no',
                'meta_value' => $this->input->post('st_permanent_house_no')
            )
        );
        //meta data will be insert here
        $pre_education_info = array(
            'ped_exam_name' => $this->input->post('st_exam_type'),
            'ped_board' => $this->input->post('board'),
            'ped_department' => $this->input->post('group'),
            'ped_session' => $this->input->post('ssc_session'),
            'ped_passing_year 	' => $this->input->post('passing_year'),
            'ped_roll' => $this->input->post('ssc_roll_no'),
            'ped_reg' => $this->input->post('registration_no'),
            'ped_lg' => $this->input->post('grade'),
            'ped_gpa' => $this->input->post('gpa'),
            'ped_institute' => $this->input->post('last_organization'),
        );

        //previous educational data will be insert here
        $this->admin_model->insert_student($insert_student_info, $insert_admission_info, $insert_current_info, $insert_ft_info, $insert_mt_info, $insert_lg_info, $insert_ap_info, $meta_data, $pre_education_info);


        echo '<pre>';
        print_r('success');
        die();
    }

    public function get_section_asclass() {
        $class_id = $this->input->post('class_id');
        $result = $this->admin_model->section_as_class($class_id);
        /* not work below this */
        echo json_encode($result);
    }

    public function get_section_asdepartment() {
        $class_id = $this->input->post('class_id');
        $department_id = $this->input->post('department_id');
        $result = $this->admin_model->get_section_asdepartment($class_id, $department_id);
        /* not work below this */
        echo json_encode($result);
    }

    /*     * ***********Addmission End********** */
}
