<?php
class Dashboard extends Admin_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('captcha');
        $this->session->set_userdata('language', 'english');
        $this->data['language']=$this->data['language']='en';
        $this->load->model('page_m');
        $this->load->model('course_m');
        $this->load->model('category_m');
        $this->load->model('difficulty_m');
        $this->load->model('lesson_m');
        $this->load->model('block_m');
    }

    /*
     *  Desciption: Main administrator dashboard
     */
    public function index() {
        // Redirect a user if he's not already logged in
        $this->user_m->loggedin() == TRUE || redirect($login);
        //Load view
    	$this->data['subview'] = 'en/1-admin/components/views/dashboard/index';
    	$this->load->view('en/1-admin/layout/_layout_main', $this->data);
    }
    
    public function modal() {
    	$this->load->view('admin/_layout_modal', $this->data);
    }
}