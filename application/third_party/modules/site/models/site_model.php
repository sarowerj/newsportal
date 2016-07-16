<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Site_model extends CI_Model {

    function get_site_title() {
        $q = $this->db->get_where('cms_options', array('opt_name' => 'header_site_title'));
        if ($q->num_rows() > 0) {
            return $q->row()->opt_value;
        } else {
            return null;
        }
    }

    function get_site_logo() {
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
    function get_site_favicon() {
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
    function get_social_link($type) {
        $this->db->like('opt_name', "$type", 'before');
        $q = $this->db->get('cms_options');
        if ($q->num_rows() > 0) {
            return $q->row()->opt_value;
        } else {
            return null;
        }
    }
    function get_footer_copyright() {
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
}

?>