<?php

class MY_Form_validation extends CI_Form_validation {

    public function __construct() {
        parent::__construct();
        $this->CI =& get_instance();
        $this->CI->load->model('user_m');
    }

    public function is_unique($str, $field) {
        $field_ar = explode('.', $field);
        $query = $this->CI->db->get_where($field_ar[0], array($field_ar[1] => $str), 1, 0);
        if ($query->num_rows() === 0) {
            return TRUE;
        }

        return FALSE;
    }
     public function is_pass($str, $field) {
        $pass = $this->CI->user_m->hash($str);
        
        
        $field_ar = explode('.', $field);

        $query = $this->CI->db->get_where($field_ar[0], array($field_ar[1] => $pass), 1, 0);
        if ($query->num_rows() === 0) {
            return FALSE;
        }

        return TRUE;
    }
}