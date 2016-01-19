<?php

class MY_Pagination extends CI_Pagination {

    public function __construct() {
        parent::__construct();

        
    }

    public function set_style() {
        //----START Styles for pagination
        // Open/Close tags for pagination
        $config['full_tag_open'] = '<div class="challengeslist_pagination-wrapper pagination-wrapper col-lg-8 col-lg-offset-4"><div class="pagination"><ul class="list-inline">';
        $config['full_tag_close'] = '</ul></div></div>';

        // Open/Close tags + Name for First link
        $config['first_tag_open'] = '<li >';
        $config['first_tag_close'] = '</li>';
        $config['first_link'] = '<i class="glyphicon glyphicon-backward"></i>';

        // Open/Close tags + Name for Last link
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['last_link'] = '<i class="glyphicon glyphicon-forward"></i>';

        // Open/Close tags + Name for Next link
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '<li>';
        $config['next_link'] = '<i class="glyphicon glyphicon-chevron-right"></i>';

        // Open/Close tags + Name for Previus link
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '<li>';
        $config['prev_link'] = '<i class="glyphicon glyphicon-chevron-left"></i>';

        // Open/Close tags for Current link
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';

        // Open/Close tags for All links
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        return($config);
    //-----END Styles for pagination
    }
}