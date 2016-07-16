<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cms extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('cms_model');
        $session = $this->session->userdata('username');
        if ($session == null) {
            $this->session->set_flashdata('error', 'Please login first!');
            redirect('login', 'refresh');
        }
    }

    public function index() {
        $data = array(
            'title' => 'Content Management System',
            'heading' => 'Content Management System',
            'message' => '',
            'meta' => 'add',
            'active' => 'academic'
        );

        $this->template->load('cms/template_dashboard_cms', 'cms_view/dashboard', $data);
    }

    public function settings() {

        $data = array(
            'title' => 'Settings',
            'heading' => 'settings',
            'message' => '',
            'meta' => 'settings',
            'active' => 'cms'
        );
        $data['header_title'] = $this->cms_model->get_meta_data('header_site_title');
        $data['header_slogan'] = $this->cms_model->get_meta_data('header_site_slogan');
        $data['header_logo'] = $this->cms_model->get_meta_header_logo();
        $data['header_favicon'] = $this->cms_model->get_meta_header_favicon();

        $data['copyright'] = $this->cms_model->get_meta_data('footer_site_copyright');

        $data['social_facebook'] = $this->cms_model->get_meta_data('social_site_facebook');
        $data['social_twitter'] = $this->cms_model->get_meta_data('social_site_twitter');
        $data['social_youtube'] = $this->cms_model->get_meta_data('social_site_youtube');
        $data['social_linkedin'] = $this->cms_model->get_meta_data('social_site_linkedin');

        $data['theme_bg'] = $this->cms_model->get_meta_data('theme_background_color');
        $data['theme_font'] = $this->cms_model->get_meta_data('theme_font_color');
        $data['theme_p'] = $this->cms_model->get_meta_data('theme_paragraph_color');

        $this->template->load('cms/template_dashboard_cms', 'cms_view/settings', $data);
    }

    public function save_header() {
        if (!$this->input->post('header_form')) {
            redirect('cms/error_page');
        }

        if ($_FILES['site_favicon']['name'] != '') {
            $this->upload_and_crop('cms', 'site_favicon');
        }
        if ($_FILES['site_logo']['name'] != '') {
            $this->upload_and_crop('cms', 'site_logo');
        }

        $meta_data = array(
            array(
                'opt_name' => 'header_site_title',
                'opt_value' => $this->input->post('site_title')
            ),
            array(
                'opt_name' => 'header_site_slogan',
                'opt_value' => $this->input->post('site_slogan')
            )
        );
        for ($i = 0; $i < sizeof($meta_data); $i++) {
            $this->cms_model->save_meta_data($meta_data[$i]);
        }
        $this->session->set_flashdata('success', 'Header changed successfully.');

        redirect('cms/settings?active=1', 'refresh');
    }

    function upload_and_crop($path = NULL, $file_name = NULL) {
        /*         * ***********create new folder image upload********** */
        $year = date('Y');
        $month = date('m');
        $path_year = "uploads/cms/" . $year;
        if (!is_dir($path_year)) { //create the folder if it's not already exists
            mkdir($path_year, 0755, TRUE);
        }
        $path_month = "uploads/cms/" . $year . '/' . $month;
        $path_month_small = "uploads/cms/" . $year . '/' . $month . '/small';
        $path_month_large = "uploads/cms/" . $year . '/' . $month . '/large';
        if (!is_dir($path_month)) {
            mkdir($path_month, 0755, TRUE);
            mkdir($path_month_small, 0755, TRUE);
            mkdir($path_month_large, 0755, TRUE);
        }

        /*         * ***********normal size image upload********** */

        $config = array(
            'allowed_types' => 'jpg|jpeg|gif|png',
            'upload_path' => './uploads/cms/' . $year . '/' . $month . '/'
        );
        $this->load->library('upload', $config);
        $this->upload->do_upload($file_name);
        $upload_data = $this->upload->data();
        /*         * ***********small image upload********** */

        $image_config["image_library"] = "gd2";
        $image_config["source_image"] = $upload_data["full_path"];
        $image_config['create_thumb'] = FALSE;
        $image_config['maintain_ratio'] = FALSE;
        $image_config['new_image'] = $upload_data["file_path"] . 'small/' . $upload_data['file_name'];
        $image_config['quality'] = "100%";
        $image_config['width'] = 100;
        $image_config['height'] = 100;
        $dim = (intval($upload_data["image_width"]) / intval($upload_data["image_height"])) - ($image_config['width'] / $image_config['height']);
        $image_config['master_dim'] = ($dim > 0) ? "height" : "width";

        $this->image_lib->initialize($image_config);
        $this->image_lib->resize();

        /*         * ***********large size image upload********** */

        $image_config2["image_library"] = "gd2";
        $image_config2["source_image"] = $upload_data["full_path"];
        $image_config2['create_thumb'] = FALSE;
        $image_config2['maintain_ratio'] = FALSE;
        $image_config2['new_image'] = $upload_data["file_path"] . 'large/' . $upload_data['file_name'];

        $image_config2['quality'] = "100%";
        $image_config2['width'] = 230;
        $image_config2['height'] = 158;
        $dim2 = (intval($upload_data["image_width"]) / intval($upload_data["image_height"])) - ($image_config2['width'] / $image_config2['height']);
        $image_config2['master_dim'] = ($dim2 > 0) ? "height" : "width";

        $this->load->library('image_lib');
        $this->image_lib->initialize($image_config2);

        $this->image_lib->resize();
        $file_path = "$path/$year/$month/";

        $data = array(
            'opt_name' => $file_name,
            'opt_value' => $upload_data['file_name'],
            'opm_key' => $file_name,
            'opm_path' => $file_path
        );
        if ($file_name == 'media_file') {
            $this->cms_model->save_media_image($data);
        } else {
            $this->cms_model->save_header_image($data);
        }
    }

    /*     * ********Footer option*********** */

    public function save_footer() {
        if (!$this->input->post('footer_form')) {
            redirect('cms/error_page');
        }
        $data = array(
            'opt_name' => 'footer_site_copyright',
            'opt_value' => $this->input->post('copyright'),
        );
        $this->cms_model->save_meta_data($data);
        $this->session->set_flashdata('success', 'Footer changed successfully.');
        redirect('cms/settings?active=2', 'refresh');
    }

    public function save_social() {
        if (!$this->input->post('social_form')) {
            redirect('cms/error_page');
        }
        $meta_data = array(
            array(
                'opt_name' => 'social_site_facebook',
                'opt_value' => $this->input->post('facebook'),
            ),
            array(
                'opt_name' => 'social_site_twitter',
                'opt_value' => $this->input->post('twitter'),
            ),
            array(
                'opt_name' => 'social_site_youtube',
                'opt_value' => $this->input->post('youtube'),
            ),
            array(
                'opt_name' => 'social_site_linkedin',
                'opt_value' => $this->input->post('linkedin'),
            ),
            array(
                'opt_name' => 'social_site_linkedin',
                'opt_value' => $this->input->post('linkedin'),
            )
        );
        for ($i = 0; $i < sizeof($meta_data); $i++) {
            $this->cms_model->save_meta_data($meta_data[$i]);
        }

        $this->session->set_flashdata('success', 'Social Media Link changed successfully.');
        redirect('cms/settings?active=3', 'refresh');
    }

    public function save_theme_option() {
        if (!$this->input->post('theme_form')) {
            redirect('cms/error_page');
        }
        $meta_data = array(
            array(
                'opt_name' => 'theme_background_color',
                'opt_value' => $this->input->post('background_color')
            ),
            array(
                'opt_name' => 'theme_font_color',
                'opt_value' => $this->input->post('font_color')
            ),
            array(
                'opt_name' => 'theme_paragraph_color',
                'opt_value' => $this->input->post('paragraph_color')
            )
        );
        for ($i = 0; $i < sizeof($meta_data); $i++) {
            $this->cms_model->save_meta_data($meta_data[$i]);
        }
        $this->session->set_flashdata('success', 'Theme Option changed successfully.');

        redirect('cms/settings?active=4', 'refresh');
    }

    function error_page() {
        $data = array(
            'title' => 'Settings',
            'heading' => 'settings',
            'message' => '',
            'meta' => 'settings',
            'active' => 'cms'
        );
        $this->template->load('cms/template_dashboard_cms', 'cms_view/404', $data);
    }

    function add_content() {
        $data = array(
            'title' => 'Settings',
            'heading' => 'content',
            'message' => '',
            'meta' => 'add_content',
            'sub_meta' => 'content',
            'active' => 'cms'
        );
        if ($this->input->post('post_title') && $this->input->post('post_details')) {
            $date = date('Y-m-d');
            $data_info = array(
                'post_title' => $this->input->post('post_title'),
                'post_content' => $this->input->post('post_details'),
                'post_date' => $date
            );
            $this->cms_model->save_content($data_info);
            $this->session->set_flashdata('success', 'Content added successfully.');
        }

        $this->template->load('cms/template_dashboard_cms', 'cms_view/add_contect', $data);
    }
    
    function view_content() {
        $data = array(
            'title' => 'Settings',
            'heading' => 'content',
            'message' => '',
            'meta' => 'view_content',
            'sub_meta' => 'content',
            'active' => 'cms'
        );
        $data['contect'] = $this->cms_model->get_contect();
        $this->template->load('cms/template_dashboard_cms', 'cms_view/view_contect', $data);
    }
    
    public function media() {
        $data = array(
            'title' => 'Media',
            'heading' => 'media',
            'message' => '',
            'meta' => 'media',
            'active' => 'cms'
        );
        if (isset($_FILES['media_file']['name']) != '') {
            $this->upload_and_crop('cms', 'media_file');
            $this->session->set_flashdata('success', 'Media added successfully.');
        }
        $data['media_image'] = $this->cms_model->get_all_media_image();
        $this->template->load('cms/template_dashboard_cms', 'cms_view/add_media', $data);
    }

    public function upload_media() {
        if (!$this->input->post('media_form')) {
            redirect('cms/error_page');
        }
        
    }

}
