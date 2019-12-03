<?php

namespace ExtendBuilder;

class PageData
{
    public $label;
    public $url;
    public $category;
    public $colibri;

    function __construct($label, $url, $category, $post_id = -1)
    {
        $this->label = $label;
        $this->url = $this->get_customizer_url($url);
        $this->category = $category;
        $this->colibri = $this->is_colibri_page($post_id);
    }

     function is_colibri_page($post_id) {
        if ($post_id === -1) {
            return false;
        }
        $post_data = new PostData($post_id);
        $post_json_id = $post_data->get_meta_value("json", -1);
        if ($post_json_id !== -1) {
            return true;
        }
        return false;
    }

    function get_customizer_url($url)
    {
        $encodedUrl = rawurlencode($url);
        return get_option('home') . "/wp-admin/customize.php?url=" . $encodedUrl;
    }
}
