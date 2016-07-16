<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('auth');
        if ($this->is_logedin()) {
            redirect('/admin/', 'refresh');
        }
    }

    public function index() {


        if ($this->input->post()) {
            $username = trim($this->input->post('username'));
            $password = trim($this->input->post('password'));
            if (empty($username) || empty($password)) {
                $error = 1;
            } else {
                $error = 0;
                $password = md5($this->pass_solt_prev . $password . $this->pass_solt_last);
                $result = $this->auth->check_login($username, $password);
                if ($result != null) {
                    $newdata = array(
                        'username' => $username,
                        'email' => $result->user_email,
                        'logged_in' => TRUE,
                        'type' => $result->user_type,
                        'user_nicename' => $result->user_nicename,
                        'id' => $result->id,
                    );

                    $this->session->set_userdata($newdata);
                } else {
                    $error = 1;
                }
            }
            echo json_encode(['error' => $error]);
            die();
        } else {
            $this->load->view('login');
        }
    }

}
