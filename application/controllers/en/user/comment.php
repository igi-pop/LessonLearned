<?php

class Comment extends Frontend_Controller{

	public function __construct()
		{
			parent::__construct();
			$this->session->set_userdata('language', 'english');
			$this->load->helper('captcha');
			$this->data['language']='en';
			$this->load->model('page_m');
			$this->load->model('course_m');
			$this->load->model('category_m');
			$this->load->model('difficulty_m');
			$this->load->model('lesson_m');
			$this->load->model('block_m');
			 $this->load->model('user_m');
			 $this->load->model('comment_m');

		$total_url = $this->uri->uri_string();
		$this->data['lang_url'] = $this->uri->segment(1);
		$this->data['total_url'] = str_replace ("/","--", $total_url);
		}


	/**
	 *	Index page not used, we redirect pages to thread
	 */
	public function index(){
		redirect($this->data['language'].'/user/comment/thread');
	}

	/**
	 *	Description: Unbfinished
	 *
	 *
	 */
	public function thread($id){
		

		if($slug!=NULL){
		$this->data['main_view'] = '/en/3-user/components/views/main_course';}
		else{
		//$this->data['main_view'] = '/en/3-user/components/views/category';}
		
		$user_language = $this->session->userdata('language');
		$this->lang->load('frontpage_navigation_'.$user_language, $user_language);
		$this->load->view('en/3-user/layout/_layout_course', $this->data);

	}












}
?>