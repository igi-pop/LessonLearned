<?php
class Frontend_Controller extends MY_Controller{

	function __construct (){
				parent::__construct();
		$this->data['meta_title'] = 'My awesome CMS';
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('router');
		$this->load->library('pagination'); 
		$this->load->library('MY_pagination');
		$this->load->library('form_validation');
		// Load stuff
		$this->load->model('page_m');
		$this->load->model('article_m');
		$this->load->model('user_m');
		$this->load->model('lesson_m');
		$this->load->model('notification_m');
		
		
		
		

		$total_url = $this->uri->uri_string();
        $this->data['lang_url'] = $this->uri->segment(1);
        $this->data['total_url'] = str_replace ("/","--", $total_url);
            
        if($this->user_m->loggedin() == true) {
        $this->data['notifications']=$this->notification_m->user_notification($this->session->userdata('id'));
        $i=0; foreach( $this->data['notifications'] as $notification): 
        	$temp_lesson=$this->lesson_m->get_by_id('lesson_id',$notification->lesson);
       	 	$this->data['notifications'][$i]->lesson_name=$temp_lesson[0]->lesson_name;
			$this->data['notifications'][$i]->lesson_slug=$temp_lesson[0]->lesson_slug;
			$i++;
		endforeach;
		$this->data['notification_counter']=count($this->data['notifications']);
		}

		$user_language = 'english';
		if($this->uri->segment(1)== 'en'){
		$user_language = 'english';
		}
		if($this->uri->segment(1)== 'sr'){
		$user_language = 'serbian';
		}
		$this->lang->load('user_navigation_'.$user_language, $user_language);
		$this->lang->load('user_search_'.$user_language, $user_language);
		$this->lang->load('user_profile_'.$user_language, $user_language);
		$this->lang->load('admin_navigation_'.$user_language, $user_language);
		$this->lang->load('user_notification_'.$user_language, $user_language);
		$this->lang->load('default_'.$user_language, $user_language);
		$this->lang->load('error_messages_'.$user_language, $user_language);
		$this->lang->load('lesson_'.$user_language, $user_language);
		$this->lang->load('course_'.$user_language, $user_language);
		$this->lang->load('category_'.$user_language, $user_language);
		$this->lang->load('user_'.$user_language, $user_language);
		$this->lang->load('other_'.$user_language, $user_language);
		$this->lang->load('form_validation', $user_language);
		//navigation bar user information
		if($this->session->userdata('id')){
		$this->data['nav_avatar']=$this->user_m->image_path($this->user_m->get_by_id('id', $this->session->userdata('id')));
		$this->data['nav_username']=$this->user_m->get_by_id('id', $this->session->userdata('id'))->username;
		}

        $this->data['logged_in']=$this->user_m->loggedin();
       

		// Fetch navigation
		$this->data['menu'] = $this->page_m->get_nested();
		$this->data['news_archive_link'] = $this->page_m->get_archive_link();
		$this->data['meta_title'] = config_item('site_name');

		$this->data['logged_in']=null;
		if ($this->user_m->loggedin() == True) {
				$this->data['logged_in']=true;

			}

		// Login check
		$exception_uris = array(
			'en/home/recovery/success/',
			'en/home/recovery',
			'en/home/activate',
			'en/home/active',
			'en/home/index',
			'en/home/signup',
			'en/home/logout',
			'en/home/login',
			'en/home',

			'sr/home/recovery/success/',
			'sr/home/recovery',
			'sr/home/activate',
			'sr/home/active',
			'sr/home/index',
			'sr/home/signup',
			'sr/home/logout',
			'sr/home/login',
			'sr/home/',
			

		);
		$found=false;
		foreach($exception_uris as $url){
			if($this->uri->uri_string()){
			 if((bool)(strpos($url, $this->uri->uri_string())) == false){
			 	$found=true;
			 }
			}else{
				$segment='en';
			}
		}
		if($found === false){
			if($this->user_m->loggedin() == FALSE) {
				$segment=$this->uri->segment(1);
			 	redirect($segment.'/home/login/');
			  }
		}

		 if ($this->uri->segment(2) == 'user' OR $this->uri->segment(2) == 'developer' OR $this->uri->segment(2) == 'admin') {
		 	if ($this->user_m->loggedin() == FALSE) {
		 	$lol='lol';	redirect($this->uri->segment(1).'/home/login/');
		 	}
		 }
		
	}
}