<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class News extends MY_Controller {

    var $global_data;

    public function __construct() {
        parent::__construct();
        $this->load->model('Site_model');
        $this->global_data = new stdClass();
        $this->global_data->menus = $this->Site_model->getAll('categories');
        $this->global_data->breaking_news_title = $this->Site_model->breaking_title();
    }

    public function index() {
        $this->global_data->title = 'Bangabani | Homepage';
        $this->global_data->slider = $this->Site_model->breaking_news();
        $this->template->load('news/template/template_site', 'news/index', $this->global_data);
    }

    public function inner_page($page_name) {
        $page_name = urldecode($this->uri->segment(3));
    }

    /**
     * Show newspost details.
     */
    public function details() {
        $title = $this->uri->segment(3);
        $id = $this->uri->segment(4);

        $this->global_data->menus = $this->Site_model->getAll('categories');

        /* Get all news content from newspost table */
        $all_data = $this->Site_model->news_details($id);

        /* Check, is has newspost */
        if (!empty($all_data)) {
            /* Slice date time year */
            $date_time = explode("-", date('d M-Y-h:i', $all_data[0]->newspost_date));

            /* Get author information */
            $author = $this->Site_model->select_user($all_data[0]->author_id)[0]->user_nicename;

            /* Get all tags */
            $all_tags = $all_data[0]->tag_id;
            if (!empty($all_tags)) {
                $tags = $this->Site_model->get_tag_names($all_data[0]->tag_id);
            } else {
                $tags = '';
            }

            /* Get Featured image information */
            $featured_image_data = $this->Site_model->select_featured_image($all_data[0]->newspost_id);

            if (!empty($featured_image_data)) {
                $featured_img_path = $featured_image_data[0]->media_path . '600_440/' . $featured_image_data[0]->media_name;
            } else {
                $featured_img_path = '';
            }

            /* Get featured gallery information */
            $featured_gallery_data = $this->Site_model->select_featured_gallery($all_data[0]->newspost_id);

            $featured_video_data = $this->Site_model->select_featured_video($all_data[0]->newspost_id);

            /* Title of the News */
            $this->global_data->title = $all_data[0]->newspost_title;

            /* Make ready data to publish */
            $this->global_data->data_array = array(
                'id' => $all_data[0]->newspost_id,
                'title' => $all_data[0]->newspost_title,
                'content' => $all_data[0]->newspost_content,
                'date_month' => $date_time[0],
                'year' => $date_time[1],
                'time' => $date_time[2],
                'author' => $author,
                'tags' => $tags,
                'featured_image' => $featured_img_path,
                'featured_gallery' => $featured_gallery_data,
                'post_video' => $featured_video_data
            );

            /* Get breaking news post title */
            $this->global_data->breaking_news = $this->Site_model->breaking_title();

            /* Show newspost details */
            $this->template->load('news/template/template_site', 'news/news_details', $this->global_data);
        } else {
            /* Get breaking news post title */
            $this->global_data->breaking_news = $this->Site_model->breaking_title();

            /* Show Error Page */
            $this->template->load('news/template/template_site', 'news/not_found_page', $this->global_data);
        }
    }

}
