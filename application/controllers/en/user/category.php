<?php

class Category extends Frontend_Controller{

	public function __construct()
		{
			parent::__construct();
			$this->session->set_userdata('language', 'english');
			$this->data['language']='en';
			$this->load->helper('captcha');
			$this->load->model('page_m');
			$this->load->model('course_m');
			$this->load->model('category_m');

		$total_url = $this->uri->uri_string();
		$this->data['lang_url'] = $this->uri->segment(1);
		$this->data['total_url'] = str_replace ("/","--", $total_url);
		}


	/**
	 *	Description: Shows all courses in a grid.
	 */
	public function index(){
		$course_data=$this->category_m->get_all_approved();
		$formated_list=$this->category_m->create_category_list($course_data, false, $this->data['language']);
		
		$this->data['navigation_category_active']= true;
		$this->data['main_view_formated']=$formated_list;

		$this->data['subview'] = 'en/home/index';
		$this->data['subview'] = 'en/home/components/modal';
		$this->load->view('en/3-user/layout/_layout_category', $this->data);
	}
}
?>