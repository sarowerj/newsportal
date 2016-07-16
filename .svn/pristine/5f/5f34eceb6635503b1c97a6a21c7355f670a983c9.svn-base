<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth extends Ci_Model {

    public function check_login($username, $password) {
        $this->db->select('id, user_email, user_type,user_nicename');
        $this->db->where('user_login', $username);
        $this->db->where('user_pass', $password);
        $this->db->where('user_status', 1);
        $this->db->where('user_activation_key', '');
        return $this->db->get('users')->row();
    }

}

?>