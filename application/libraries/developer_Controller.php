<?php
class Developer_Controller extends MY_Controller{

	function __construct (){
		parent::__construct();
		// Checking and loading language parameters
		$total_url = $this->uri->uri_string();
        $this->data['lang_url'] = $this->uri->segment(1);
        $this->data['total_url'] = str_replace ("/","--", $total_url);


		$this->data['meta_title'] = 'My awesome CMS';
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('router');
		$this->load->library('pagination'); 
		$this->load->library('MY_pagination');


		// Load stuff
		$this->load->model('page_m');
		$this->load->model('article_m');
		$this->load->model('lesson_m');
		$this->load->model('user_m');
		$this->load->model('notification_m');

		//Load language files
       	if($this->uri->segment(1)== 'en')
		{
		$user_language = 'english';
		}
		if($this->uri->segment(1)== 'sr')
		{
		$user_language = 'serbian';
		}
		$this->lang->load('user_navigation_'.$user_language, $user_language);
		$this->lang->load('admin_navigation_'.$user_language, $user_language);
		$this->lang->load('dev_navigation_'.$user_language, $user_language);
		$this->lang->load('user_notification_'.$user_language, $user_language);
		$this->lang->load('default_'.$user_language, $user_language);
		$this->lang->load('error_messages_'.$user_language, $user_language);
		$this->lang->load('lesson_'.$user_language, $user_language);
		$this->lang->load('course_'.$user_language, $user_language);
		$this->lang->load('category_'.$user_language, $user_language);
		$this->lang->load('user_'.$user_language, $user_language);
		$this->lang->load('other_'.$user_language, $user_language);
		$this->lang->load('form_validation', $user_language);
		
		$this->data['logged_in']=$this->user_m->loggedin();
       
		//Load navigation user information
		$this->data['nav_avatar']=$this->user_m->image_path($this->user_m->get_by_id('id', $this->session->userdata('id')));
		$this->data['nav_username']=$this->user_m->get_by_id('id', $this->session->userdata('id'))->username;

		//LOad navigation notifications
        $this->data['notifications']=$this->notification_m->user_notification($this->session->userdata('id'));
        $i=0; foreach( $this->data['notifications'] as $notification): 
        	$temp_lesson=$this->lesson_m->get_by_id('lesson_id',$notification->lesson);
       	 	$this->data['notifications'][$i]->lesson_name=$temp_lesson[0]->lesson_name;
			$this->data['notifications'][$i]->lesson_slug=$temp_lesson[0]->lesson_slug;
			$i++;
		endforeach;
		$this->data['notification_counter']=count($this->data['notifications']);

		

		// Login check
		// Login check
		$exception_uris = array(
			'admin/user/login', 
			'admin/user/logout',
			'en/admin/user/login', 
			'en/admin/user/logout',
			'sr/admin/user/login', 
			'sr/admin/user/logout',
			'sr/home/logout',
			'en/home/logout',
			'sr/home/login',
			'en/home/login',
			'en/home',
			'sr/home',
			'en/',
			'sr/',
			'en/admin/login_in'

		);
		$this->user_m->developer_permission(true);
		
		if (in_array(uri_string(), $exception_uris) == FALSE) {
			if ($this->user_m->loggedin() == FALSE) {
				redirect('en/home/login');
			}
		}
	
	}
}