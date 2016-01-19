<?php

class Category extends Developer_Controller{

	public function __construct(){
			parent::__construct();
			$this->session->set_userdata('language', 'english');
			$this->data['language']=$this->data['language']='en';
			$this->load->helper('captcha');
			$this->load->model('page_m');
			$this->load->model('course_m');
			$this->load->model('category_m');
			// $this->load->model('user_m');

			$total_url = $this->uri->uri_string();
			$this->data['lang_url'] = $this->uri->segment(1);
			$this->data['total_url'] = str_replace ("/","--", $total_url);
		}


	/**
	 *	Description: Category selection controller
	 */
	public function index(){
		//Get all categories
		$course_data=$this->category_m->get_all();
		//Set Navigation category link to active style
		$this->data['navigation_category_active']=true;

		//Check if we used a form to send data and redirect
		if($this->input->post('course_id') && $this->input->post('category_id'))
		redirect($this->data['language'].'/developer/course/'.$this->input->post('category_id').'/'.$this->input->post('course_id'));
		
		// Creating a formated list of categories
		$formated_list=$this->category_m->create_category_list($course_data, true, $this->data['language']);

		//Setting the formated list to the view
		$this->data['main_view_formated']=$formated_list;
		
		//Loading the views
		$this->data['subview'] = 'en/home/index';
		$this->data['subview'] = 'en/home/components/modal';	
		$this->load->view('en/2-developer/layout/_layout_category', $this->data);	
	}











}



?>