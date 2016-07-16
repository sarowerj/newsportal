<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('site_model');
    }

    public function index() {

        $data = new stdClass();
        $data->title = 'Home | School Name';
        $data->meta = 'Home';
        $data->site_title = $this->site_model->get_site_title();
        $data->site_logo = $this->site_model->get_site_logo();
        $data->site_favicon = $this->site_model->get_site_favicon();
        
        $data->site_social_fb = $this->site_model->get_social_link('facebook');
        $data->site_social_twitter = $this->site_model->get_social_link('twitter');
        $data->site_social_youtube = $this->site_model->get_social_link('youtube');
        $data->site_social_linkedin = $this->site_model->get_social_link('linkedin');
        
        $data->site_copyright = $this->site_model->get_footer_copyright();
        $this->template->load('site/theme_one/template_site', 'site/theme_one/home', $data);
    }

    public function send_mail() {
        $this->load->library('email');
        $config['protocol'] = 'sendmail';
        $config['mailpath'] = '/usr/sbin/sendmail';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        $this->email->from('cse_rashad2011@yahoo.com', 'Rashed');
        $this->email->to('rashadul@drinstech.com');
        $this->email->subject('Email Test');
        $this->email->message('Testing the email class.');
        if ($this->email->send())
            echo 'success';
    }

}
