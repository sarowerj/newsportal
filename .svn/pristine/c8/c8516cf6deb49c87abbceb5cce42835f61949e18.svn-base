<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cms_model extends CI_Model {

    function save_header_image($data) {
        $meta = array(
            'opt_name' => $data['opt_name'],
            'opt_value' => $data['opt_value'],
        );
        $q = $this->db->select('*')
                ->from('cms_options')
                ->where('opt_name', "$data[opm_key]")
                ->get();
        if ($q->num_rows() == 0) {
            $this->db->trans_start();
            $this->db->insert('cms_options', $meta);
            $id = $this->db->insert_id();
            $meta_value = array(
                'opt_id' => $id,
                'opm_key' => $data['opm_key'],
                'opm_value' => $data['opm_path']
            );
            $this->db->insert('cms_options_meta', $meta_value);

            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return FALSE;
            } else {
                $this->db->trans_commit();
                return TRUE;
            }
        } else {
            $this->db->trans_start();

            $this->db->update('cms_options', $meta, array('opt_id' => $q->row()->opt_id));
            $meta_value = array(
                'opt_id' => $q->row()->opt_id,
                'opm_key' => $data['opm_key'],
                'opm_value' => $data['opm_path']
            );
            $this->db->update('cms_options_meta', $meta_value, array('opt_id' => $q->row()->opt_id));
            unlink('uploads/' . $data['opm_path'] . 'small/' . $q->row()->opt_value);
            unlink('uploads/' . $data['opm_path'] . 'large/' . $q->row()->opt_value);
            unlink('uploads/' . $data['opm_path'] . $q->row()->opt_value);

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

    function save_meta_data($meta_data) {

        $q = $this->db->select('*')
                ->from('cms_options')
                ->where('opt_name', "$meta_data[opt_name]")
                ->get();
        if ($q->num_rows() == 0) {
            $this->db->insert('cms_options', $meta_data);
        } else {
            $this->db->update('cms_options', $meta_data, array('opt_name' => "$meta_data[opt_name]"));
        }
    }

    /*     * *************Get Header Data********** */

    function get_meta_data($title) {
        $q = $this->db->select('*')
                ->from('cms_options')
                ->where('opt_name', "$title")
                ->get();
        if ($q->num_rows() > 0) {
            return $q->row()->opt_value;
        } else {

            return null;
        }
    }

    function get_meta_header_slogan() {
        $q = $this->db->select('*')
                ->from('cms_options')
                ->where('opt_name', 'header_site_slogan')
                ->get();
        if ($q->num_rows() > 0) {
            return $q->row()->opt_value;
        } else {

            return null;
        }
    }

    function get_meta_header_logo() {
        $q = $this->db->select('cms_options.opt_value,cms_options_meta.opm_value')
                ->from('cms_options')
                ->join('cms_options_meta', 'cms_options_meta.opt_id=cms_options.opt_id')
                ->where('cms_options.opt_name', 'site_logo')
                ->get();
        if ($q->num_rows() > 0) {
            return $q->row();
        } else {

            return null;
        }
    }

    function get_meta_header_favicon() {
        $q = $this->db->select('cms_options.opt_value,cms_options_meta.opm_value')
                ->from('cms_options')
                ->join('cms_options_meta', 'cms_options_meta.opt_id=cms_options.opt_id')
                ->where('cms_options.opt_name', 'site_favicon')
                ->get();
        if ($q->num_rows() > 0) {
            return $q->row();
        } else {

            return null;
        }
    }

    /*     * **************Get Footer Data****************** */

    function get_meta_footer_copyright() {
        $q = $this->db->select('*')
                ->from('cms_options')
                ->where('opt_name', 'footer_site_copyright')
                ->get();
        if ($q->num_rows() > 0) {
            return $q->row()->opt_value;
        } else {

            return null;
        }
    }

    /*     * ****************Get Social Data************* */

    function get_meta_social_facebook() {
        $q = $this->db->select('*')
                ->from('cms_options')
                ->where('opt_name', 'social_site_facebook')
                ->get();
        if ($q->num_rows() > 0) {
            return $q->row()->opt_value;
        } else {

            return null;
        }
    }

    function get_meta_social_twitter() {
        $q = $this->db->select('*')
                ->from('cms_options')
                ->where('opt_name', 'social_site_twitter')
                ->get();
        if ($q->num_rows() > 0) {
            return $q->row()->opt_value;
        } else {

            return null;
        }
    }

    function get_meta_social_youtube() {
        $q = $this->db->select('*')
                ->from('cms_options')
                ->where('opt_name', 'social_site_youtube')
                ->get();
        if ($q->num_rows() > 0) {
            return $q->row()->opt_value;
        } else {

            return null;
        }
    }

    function get_meta_social_linkedin() {
        $q = $this->db->select('*')
                ->from('cms_options')
                ->where('opt_name', 'social_site_linkedin')
                ->get();
        if ($q->num_rows() > 0) {
            return $q->row()->opt_value;
        } else {

            return null;
        }
    }

    function get_meta_social() {
        $q = $this->db->select('*')
                ->from('cms_options')
                ->like('opt_name', 'social', 'after')
                ->get();
        if ($q->num_rows() > 0) {
            return $q->result();
        } else {

            return null;
        }
    }

    /*     * **********Content************* */

    function save_content($data_info) {
        $this->db->insert('cms_post', $data_info);
    }
    
    function get_contect() {
        $q = $this->db->select('*')
                ->from('cms_post')
                ->where('post_status', 1)
                ->get();
        if ($q->num_rows() > 0) {
            return $q->result();
        } else {

            return null;
        }
    }

    function save_media_image($data) {
        $meta = array(
            'opt_name' => $data['opt_name'],
            'opt_value' => $data['opt_value'],
        );

        $this->db->trans_start();
        $this->db->insert('cms_options', $meta);
        $id = $this->db->insert_id();
        $meta_value = array(
            'opt_id' => $id,
            'opm_key' => $data['opm_key'],
            'opm_value' => $data['opm_path']
        );
        $this->db->insert('cms_options_meta', $meta_value);

        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return FALSE;
        } else {
            $this->db->trans_commit();
            return TRUE;
        }
    }
    function get_all_media_image(){
        $q = $this->db->select('cms_options.opt_value,cms_options_meta.opm_value')
                ->from('cms_options')
                ->join('cms_options_meta','cms_options.opt_id=cms_options_meta.opt_id')
                ->where('cms_options.opt_name', 'media_file')
                ->order_by('cms_options.opt_id','desc')
                ->get();
        if ($q->num_rows() > 0) {
            return $q->result();
        } else {

            return null;
        }
    }

}

?>