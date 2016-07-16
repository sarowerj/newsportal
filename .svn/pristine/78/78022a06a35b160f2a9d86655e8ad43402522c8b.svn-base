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
            $post_featured_gall_array = explode(' ', $post_featured_gallery);
            array_pop($post_featured_gall_array);


            $query_media = $this->db->select('media_id,media_name,media_caption,media_path')
                    ->from('media')
                    ->where_in("media_id", $post_featured_gall_array)
                    ->get();
            return $query_media->result();
        }
        else{
            return FALSE;
        }
    }
    
    
    public function select_featured_video($newspost_id){
        $query = $this->db->get_where('postmeta', array('newspost_id' => $newspost_id, 'meta_key' => 'post_video_url'));
        $post_featured_gallery = $query->result()[0]->meta_value;
        
        return $post_featured_gallery;
    }

}

?>