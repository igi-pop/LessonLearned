<?php

class Dashboard extends Frontend_Controller{

	public function __construct(){
			parent::__construct();
			$this->session->set_userdata('language', 'english');
			$this->data['language']=$this->data['language']='en';
			$this->load->helper('captcha');
			$this->load->model('page_m');
			$this->load->model('course_m');
			$this->load->model('category_m');
			// $this->load->model('user_m');
	}


	//Index page of the home
	public function index(){
		
		$total_url = $this->uri->uri_string();
		$this->data['lang_url'] = $this->uri->segment(1);
		$this->data['total_url'] = str_replace ("/","--", $total_url);
		
		$user_language = $this->session->userdata('language');
		$this->lang->load('frontpage_navigation_'.$user_language, $user_language);
		$this->load->view('en/3-user/layout/_layout_dashboard', $this->data);		
	}

}
	?>