<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    var $pass_solt_prev = 'ruhul';
    var $pass_solt_last = 'newsportal';
    var $data;

    public function __construct() {
        parent::__construct();
        $this->load->library('template');
        $this->load->library('AnObj');

        $this->load->library('input');
        $this->load->helper('file');
        $this->load->library('image_lib');
    }

    public function is_logedin() {
        $session_data = $this->session->userdata();
        if (isset($session_data['logged_in'])) {
            if ($session_data['logged_in'] == true) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    
}
