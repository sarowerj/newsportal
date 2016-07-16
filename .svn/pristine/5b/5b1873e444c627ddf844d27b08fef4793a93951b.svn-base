<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_model extends Ci_Model {

    public function get_AllClass() {
        $q = $this->db->get('class');
        if ($q->num_rows() > 0) {
            return $q->result();
        } else {
            return null;
        }
    }

    public function get_all_subject() {
        $q = $this->db->get('subject');
        if ($q->num_rows() > 0) {
            return $q->result();
        } else {
            return null;
        }
    }

    public function get_all_department($class_id) {
        $q = $this->db->get_where('department', array('cls_id' => $class_id));
        if ($q->num_rows() > 0) {
            return $q->result();
        } else {
            return null;
        }
    }

    public function get_all_shift() {
        $q = $this->db->get('shift');
        if ($q->num_rows() > 0) {
            return $q->result();
        } else {
            return null;
        }
    }

    public function get_all_section($class_id) {
        $q = $this->db->select('section.*,class.cls_name,shift.shi_name')
                ->from('section')
                ->join('class', 'class.cls_id=section.cls_id')
                ->join('shift', 'shift.shi_id=section.shi_id')
                ->where("section.cls_id=$class_id")
                ->get();
        if ($q->num_rows() > 0) {
            return $q->result();
        } else {
            return null;
        }
    }

    public function delete_section($section_id) {
        $this->db->delete("section", array('sec_id' => $section_id));
    }

    public function edit_section($section_id, $data) {
        $this->db->where('sec_id', $section_id);
        $this->db->update('section', $data);
    }

    public function insert() {
        $data = func_get_args();
        if ($this->db->insert("$data[0]", $data[1][0]))
            return true;
        else
            return false;;
    }

    public function delete_class($class_id) {
        $this->db->delete("class", array('cls_id' => $class_id));
    }

    public function edit_class($class_id, $data) {
        $this->db->where('cls_id', $class_id);
        $this->db->update('class', $data);
    }

    public function delete_subject($subject_id) {
        $this->db->delete("subject", array('sub_id' => $subject_id));
    }

    public function edit_subject($subject_id, $data) {
        $this->db->where('sub_id', $subject_id);
        $this->db->update('subject', $data);
    }

    public function delete_department($department_id) {
        $this->db->delete("department", array('dep_id' => $department_id));
    }

    public function edit_department($department_id, $data) {
        $this->db->where('dep_id', $department_id);
        $this->db->update('department', $data);
    }

    public function delete_shift($shift_id) {
        $this->db->delete("shift", array('shi_id' => $shift_id));
    }

    public function edit_shift($shift_id, $data) {
        $this->db->where('shi_id', $shift_id);
        $this->db->update('shift', $data);
    }

    public function status($tbl, $col_pre, $id) {
        $cl_id = $col_pre . '_id';
        $cl_status = $col_pre . '_status';
        $q = $this->db->get_where("$tbl", array("$cl_id" => $id));
        $status = $q->row()->$cl_status;
        if ($status == 1) {
            $data = array(
                $cl_status => 0
            );
        } else {
            $data = array(
                $cl_status => 1
            );
        }
        $this->db->where("$cl_id", $id);
        $this->db->update("$tbl", $data);
    }

    public function get_class_info($class_id) {
        $q = $this->db->get_where('class', array('cls_id' => $class_id));
        if ($q->num_rows() > 0) {
            return $q->row();
        } else {
            return null;
        }
    }

    public function all_subject_class($class_id) {
        $q = $this->db->select('subject.*,class_meta.id')
                ->from('class_meta')
                ->join('subject', 'subject.sub_id=class_meta.sub_id')
                ->where("class_meta.cls_id=$class_id")
                ->get();
        if ($q->num_rows() > 0) {
            return $q->result();
        } else {
            return null;
        }
    }

    public function delete_meta_class($meta_id) {
        $this->db->delete("class_meta", array('id' => $meta_id));
    }

    public function get_subject_check($class_id) {
//        $q = $this->db->select('subject.*')
//                        ->from('subject')
//                        ->join('class_meta','subject.sub_id=class_meta.sub_id')
//                        ->where_not_in("class_meta.cls_id",$class_id)
//                        ->get();
        $q = $this->db->query("SELECT oems_subject.*
FROM oems_subject
WHERE oems_subject.sub_id NOT IN (SELECT oems_class_meta.sub_id FROM oems_class_meta WHERE oems_class_meta.cls_id=$class_id)");
        //print_r($this->db->last_query());die();
        if ($q->num_rows() > 0) {
            return $q->result();
        } else {
            return null;
        }
    }

    public function get_district() {
        $q = $this->db->order_by('name', 'aesc')->get('districts');
        if ($q->num_rows() > 0) {
            return $q->result();
        } else {
            return null;
        }
    }

    public function get_thana($district_id) {
        $q = $this->db->order_by('name', 'aesc')->get_where('upazilas', array('district_id' => $district_id));
        if ($q->num_rows() > 0) {
            return $q->result();
        } else {
            return null;
        }
    }

    public function section_as_class($class_id) {
        $q = $this->db->order_by('sec_name', 'aesc')->get_where('section', array('cls_id' => $class_id));
        if ($q->num_rows() > 0) {
            return $q->result();
        } else {
            return null;
        }
    }

    public function get_section_asdepartment($class_id, $department_id) {
        $q = $this->db->order_by('sec_name', 'aesc')->get_where('section', array('dep_id' => $department_id));
        if ($q->num_rows() > 0) {
            return $q->result();
        } else {
            return null;
        }
    }

    /*     * *************Addmission********************** */

    public function insert_student($insert_student_info, $insert_admission_info, $insert_current_info, $insert_ft_info, $insert_mt_info, $insert_lg_info, $insert_ap_info, $meta_data, $pre_education_info) {
        $this->db->trans_start();

        $this->db->insert('students', $insert_student_info);
        $insert_id = $this->db->insert_id();
        $student_id = array('stu_id' => $insert_id);

        $addmission = $insert_admission_info + $student_id;
        $this->db->insert('addmission_data', $addmission);
        $insert_id_add = $this->db->insert_id();
        $addmission_id = array('stu_id' => $insert_id_add);
        
        $current_info = $insert_current_info + $student_id + $addmission_id;
        $this->db->insert('student_current_data', $current_info);
        
        $insert_ft = $insert_ft_info + $student_id;
        $this->db->insert('parents', $insert_ft);

        $insert_mt = $insert_mt_info + $student_id;
        $this->db->insert('parents', $insert_mt);

        $insert_lg = $insert_lg_info + $student_id;
        $this->db->insert('parents', $insert_lg);

        $insert_ap = $insert_ap_info + $student_id;
        $this->db->insert('parents', $insert_ap);

        for ($i = 0; $i < sizeof($meta_data); $i++) {
            $insert_meta = $meta_data[$i] + $student_id;
            $this->db->insert('student_meta', $insert_meta);
        }

        $insert_pre = $pre_education_info + $student_id;
        $this->db->insert('passed_edu_data', $insert_pre);

        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {

            $this->db->trans_rollback();
            return FALSE;
        } else {

            $this->db->trans_commit();
            return TRUE;
        }
    }

}

?>