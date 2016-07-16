<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Site_model extends Ci_Model {

    /**
     * Get breaking news title and hyperlink
     * @return AssociativeArray
     */
    public function breaking_title() {
        $total = $this->db->select("newspost.newspost_id,newspost.newspost_title,newspost.newspost_long_title,newspost.status,postmeta.newspost_id,postmeta.meta_key,postmeta.meta_value")
                ->from("newspost")
                ->join("postmeta", "newspost.newspost_id = postmeta.newspost_id")
                ->where("newspost.status = 'Published'")
                ->where("postmeta.meta_key = 'post_breaking_status'")
                ->where("postmeta.meta_value = 'on'")
                ->get();
        return $total->result();
    }

    public function breaking_news() {
        $all_images = array();
        $news = $this->db->select("newspost.newspost_id,newspost.newspost_title,newspost.newspost_long_title,newspost.status,postmeta.newspost_id,postmeta.meta_key,postmeta.meta_value")
                ->from("newspost")
                ->join("postmeta", "newspost.newspost_id = postmeta.newspost_id")
                ->where("newspost.status = 'Published'")
                ->where("postmeta.meta_key = 'post_breaking_status'")
                ->where("postmeta.meta_value = 'on'")
                ->get()
                ->result();
        foreach ($news as $single_news) {
            $images = $this->db->select("meta_id,newspost_id,meta_key,meta_value")
                    ->from("postmeta")
                    ->where("newspost_id = $single_news->newspost_id")
                    ->where("meta_key = 'post_featured_image'")
                    ->get()
                    ->row();
            $image_id = $images->meta_value;
            $news_content = array(
                'news_id' => $single_news->newspost_id,
                'news_title' => $single_news->newspost_title,
                'news_long_title' => $single_news->newspost_long_title
            );
            if ($image_id != 'null') {
                $image_info = $this->db->select("media_id,media_name,media_caption,media_description,media_path")
                        ->from("media")
                        ->where("media_id=$image_id")
                        ->get()
                        ->row();
                $image_info = (array) $image_info;
                array_push($all_images, array_merge($image_info, $news_content));
            }
        }
        return $all_images;
    }

    /**
     * Get selected news details from newspost table.
     * @param integer $id is unique id of newspost.
     * @return AssociativeArray
     */
    public function news_details($id) {
        $query = $this->db->get_where('newspost', array('newspost_id' => $id, 'status' => 'Published'));
        return$query->result();
    }

    /**
     * Get news author by user id from user table
     * @param integer $author_id is user id.
     * @return AssociativeArray
     */
    public function select_user($author_id) {
        $query = $this->db->select('user_nicename')
                ->from('users')
                ->where("id=$author_id")
                ->get();
        return $query->result();
    }

    /**
     * Get tags name from tags table by tag id.
     * @param string $tags_id is the comma seperated tags id
     * @return Associative array
     */
    public function get_tag_names($tags_id) {
        $tags_id_array = explode(',', $tags_id);
        array_pop($tags_id_array);
        $query = $this->db->select('tag_name')
                ->from('tags')
                ->where_in("id", $tags_id_array)
                ->get();
        return $query->result();
    }

    /**
     * Get Featured image's path from media table.
     * @param integer $newspost_id is main id of newspost.
     * @return AssociativeArray
     */
    public function select_featured_image($newspost_id) {
        $query = $this->db->get_where('postmeta', array('newspost_id' => $newspost_id, 'meta_key' => 'post_featured_image'));
        $featured_image_id = $query->result()[0]->meta_value;

        $query_media = $this->db->get_where('media', array('media_id' => $featured_image_id));
        return $query_media->result();
    }

    /**
     * Get gallery images's path from media table
     * @param integer $newspost_id is main id of newspost.
     * @return AssociativeArray if get any content.
     */
    public function select_featured_gallery($newspost_id) {
        $query = $this->db->get_where('postmeta', array('newspost_id' => $newspost_id, 'meta_key' => 'post_featured_gallery'));
        $post_featured_gallery = $query->result()[0]->meta_value;

        if (!empty($post_featured_gallery)) {
            $post_featured_gall_array = explode(',', $post_featured_gallery);


            $query_media = $this->db->select('media_id,media_name,media_caption,media_path')
                    ->from('media')
                    ->where_in("media_id", $post_featured_gall_array)
                    ->get();
            return $query_media->result();
        } else {
            return FALSE;
        }
    }

    public function select_featured_video($newspost_id) {
        $query = $this->db->get_where('postmeta', array('newspost_id' => $newspost_id, 'meta_key' => 'post_video_url'));
        $post_featured_gallery = $query->result()[0]->meta_value;

        return $post_featured_gallery;
    }

    /**
     * Function Name = getAll() <br />
     * Uses = This function is to get all data from any table. <br />
     * Parameters = $tbl_name
     * @param string $tbl_name is name of Table
     * @return array It returns an associative array with object data.
     */
    public function getAll($tbl_name) {
        $query = $this->db->get($tbl_name);
        return $query->result();
    }

}

?>