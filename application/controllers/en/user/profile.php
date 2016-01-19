<?php

class Profile extends Frontend_Controller{

	public function __construct(){
		parent::__construct();
		$this->session->set_userdata('language', 'english');
		$this->data['language']='en';
		$this->load->helper('captcha');
		$this->load->library('form_validation');
		$this->load->model('user_m');
		$this->load->model('lesson_m');
		$this->load->model('course_m');
		$this->load->model('notification_m');

		$total_url = $this->uri->uri_string();
		$this->data['lang_url'] = $this->uri->segment(1);
		$this->data['total_url'] = str_replace ("/","--", $total_url);


		$user_language = $this->session->userdata('language');
		$this->lang->load('user_navigation_'.$user_language, $user_language);
		$this->lang->load('user_notification_'.$user_language, $user_language);
	}


	//redirect to settings
	public function index(){
		$login=$this->data['language'].'/home/login';
		// Redirect a user if he's not already logged in
		$this->user_m->loggedin() == TRUE || redirect($login);
		redirect($this->data['language'].'/user/profile/settings/');
		$user_id = $this->session->userdata('id');
		$this->data['user_info'] = $this->user_m->get_by_id('id',$user_id);

		$this->data['subview'] = 'en/home/index';
		$this->data['subview'] = 'en/home/components/modal';
		$this->load->view('en/3-user/layout/_layout_user', $this->data);
	}

	/**
	 *	Description: Main settings panel, where users can change personal information
	 *	@param 	string type(selects what personal information you would like to chnage, "avatar", "password", "personal")	 
	 *
	 */
	public function settings($type=NULL, $return=NULL){

		//Get all form information
		$this->data['personal_form'] = $this->input->post();
		//Redirect directories
		$login 		= $this->data['language'].'/home/login';
		$dashboard 	= $this->data['language'].'admin/dashboard';

		
		// Redirect a user if he's not already logged in
		$this->user_m->loggedin() == TRUE || redirect($login);
		$user_id = $this->session->userdata('id');
		$this->data['user_info'] = $this->user_m->get_by_id('id',$user_id);

		// Set up the form
		$rules = $this->user_m->rules_user_personal;
		!$this->user_m->facebook_account_completed($this->session->userdata('id')) || $rules['username']['rules'] .= '|required';
		
		$this->form_validation->set_rules($rules);
		
		// Process form
		if ($this->form_validation->run() == TRUE) {
			$this->user_m->change_personal_info($this->session->userdata('id'), $this->data['language']);
		}else{
			//Setting up error on data validation errors
			$this->session->set_flashdata('e_login', 'true');
		}

		$this->data['avatar'] ='';
		$this->data['personal'] ='';
		$this->data['password'] ='';
		$this->data['user_info']->avatar = $this->user_m->image_path($this->data['user_info']);

		$total_url = $this->uri->uri_string();
		$this->data['lang_url'] = $this->uri->segment(1);
		$this->data['total_url'] = str_replace ("/","--", $total_url);
		
		if($type == "avatar" && $return=NULL){
			$this->data['main_view'] = 'en/3-user/components/views/main_user_avatar';
			$this->data['avatar'] ='active';
		}
		if($type == "avatar" && $return='success'){
			$this->data['main_view'] = 'en/3-user/components/views/main_user_avatar';
			$this->data['avatar'] ='active';
		}
		elseif($type == "personal"){
			$this->data['main_view'] = 'en/3-user/components/views/main_user_standard';
			$this->data['personal'] ='active';
		}
		elseif($type == "password"){
			$this->data['main_view'] = 'en/3-user/components/views/main_user_pass';
			$this->data['password'] ='active';
		}
		else{
			$this->data['main_view'] = 'en/3-user/components/views/main_user_standard';
			$this->data['personal'] ='active';
		}

		$this->load->view('en/3-user/layout/_layout_user', $this->data);
	}

	/**
	 *	Description: Allows changing the avatar picture
	 */
	public function avatar(){
		//creating the picture name
		$random='halabalu';
		$date = date_create();
		$unique_date = date_format($date, 'Y-m-d-H-i-s');
		$name = $unique_date.'-'.$random.'-'.$this->session->userdata('id').'';
			
		if($_FILES['user_avatar']['error'] == 0 ){
		//upload and update the file
		$config['upload_path'] = './images/profiles/avatar/';
		$thumb_path='./images/profiles/thumbnail/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['file_name'] = $name;
		$config['overwrite'] = false;
		$config['remove_spaces'] = true;
		//$config['max_size']	= '100';// in KB

		$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('user_avatar')){
				$this->session->set_flashdata('message', $this->upload->display_errors('', ''));
				redirect($this->data['language'].'/user/profile/settings/avatar/failed', 'refresh');
			}else{
				//Image Resizing
				$config['source_image'] =$this->upload->upload_path.$this->upload->file_name;
				$config['maintain_ratio'] = FALSE;
				$config['new_image'] = $thumb_path;
				$config['max_size']    = 20000;
				$config['width'] = 40;
				$config['height'] = 40;
				$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = TRUE;

				$this->load->library('image_lib', $config);

				if ( !$this->image_lib->resize()){
					$this->session->set_flashdata('message', $this->image_lib->display_errors('message', $thumb_path));
				}
				$thumbnail="C:/wamp/www/codeigniter-LessonLearned/public_html/".substr($thumb_path, 2).$name.'_thumb'.$this->upload->file_ext;
				$this->user_m->updateProfile($this->session->userdata('id'), $config['source_image'], $thumbnail);
				//Need to update the session information if email was changed
					
				$this->session->set_flashdata('message', $this->lang->line('profile_info_updated'));
				redirect($this->data['language'].'/user/profile/settings/avatar/success', 'refresh');
			}
		
		}
			$this->session->set_flashdata('message', $this->lang->line('error_profile_avatar_upload'));
			redirect($this->data['language'].'/user/profile/settings/avatar/failed', 'refresh');
	}

	/**
	 *	Description: Allows users changing their passwords(If its facebook activated then the pold password is not neccasy for the first change)
	 */
	public function password(){	
		$logged_in='/'.$this->data['language'].'/user/profile/settings/password/failed';
		$success='/'.$this->data['language'].'/user/profile/settings/password/success';
		
		$this->data['user_info'] = $this->user_m->get_by_id('id',$this->session->userdata('id'));
		// Set rules for form validation
		$this->form_validation->set_message('is_pass', $this->lang->line('profile_error_current_pass'));
		$rules = $this->user_m->rules_user_password_change;
		!$this->user_m->facebook_password_completed($this->session->userdata('id')) || $rules['old_password']['rules'] = 'trim|xss_clean';
		$this->form_validation->set_rules($rules);
		
		// Process form
			// We can continue processing if all fields are filled and correct
			//If the validation is false that means there are is a conflicts with existing users
			//Otherwise procede to insert into database
		if ($this->form_validation->run() == TRUE ) {
			//Get captcha results and  validate answer	
			$this->user_m->user_password_change($this->session->userdata('id'));
			//Redirect to activation page(sign in success page)
			$this->session->set_flashdata('success',$this->lang->line('profile_info_pass_updated'));
			redirect($success, 'refresh');
		}
		else{
			//Faild data validation setting up errors
            $this->session->set_flashdata('message', validation_errors());
            redirect($logged_in, 'refresh');
		}
	}

	/**
	 *	Description: shows all notifications, can be filtered by statuses of notifications and has pagination 
	 *	@param string flag(filtering notifications by status)
	 *	@param int pagePagination segment of the url)
	 */
		//make exception if no result are found BUGFIX
	public function notification( $flag='unseen', $page=1){
		$this->data['navigation_notification_active']= true;
		//pagination url link checker
		if(!is_int($page) AND !ctype_digit($page)){
        	redirect($this->data['language'].'/user/profile/notification/all/');
        }

        // Creating links to filter notifications
		$base_url = base_url() . $this->data['language']."/user/profile/notification/";
        $this->data["flag_links"]=$this->notification_m->create_flag_links($base_url, NULL , $flag);
    	
    	//Database flag filter	
		switch($flag){
			case $this->lang->line("note_status_slug_2"):
			$this->db->where('flag', 1);
			break;
			case $this->lang->line("note_status_slug_3"):
			$this->db->where('flag', 2);
			break;
			case $this->lang->line("note_status_slug_4"):
			$this->db->where('flag', 3);
			break;
			case $this->lang->line("note_status_slug_1"):
			break;
			default:
			break;
		}
		//Notification validation
		if($this->notification_m->all_notification($this->session->userdata('id')) != NULL){
		switch($flag){
			case $this->lang->line("note_status_slug_2"):
			$this->db->where('flag', 1);
			break;
			case $this->lang->line("note_status_slug_3"):
			$this->db->where('flag', 2);
			break;
			case $this->lang->line("note_status_slug_4"):
			$this->db->where('flag', 3);
			break;
			case $this->lang->line("note_status_slug_1"):
			break;
			default:
			break;
		}

		 //-------------------------------------------------PAGINATION---------------------------------------
		$config = array();
        $config["base_url"] = base_url() . "/".$this->data['language']."/user/profile/notification/".$flag."/";
        $config["total_rows"] = $this->notification_m->record_count(NULL , $flag,  false);
        $config['num_links'] = 4;
        $config["per_page"] = 10;
        $config["uri_segment"] = 6;
        $config['use_page_numbers'] = TRUE;
        // Configuring styles for pagination (Located in '/library/MY_PAgination')
        foreach($this->my_pagination->set_style() as $key => $value)
        	$config[$key] =$value;

		$this->pagination->initialize($config);
		$this->data["course_data"]=' ';
		$page = ($this->uri->segment(6)) ? $this->uri->segment(6) : 1;
		
        $all_notifications  = $this->notification_m->fetch_limit($config["per_page"], $page-1, NULL, $flag, false);
          $this->data["links"] = $this->pagination->create_links();
        //-------------------------------------------------PAGINATION---------------------------------------
		
		$i=0;
		if($all_notifications !=NULL)
		foreach($all_notifications as $note){
			$this->data['all_notifications'][$i]=$this->notification_m->get_by_id($note->note_id);
				$temp_lesson=$this->lesson_m->get_by_id('lesson_id',$note->lesson);
				$temp_course=$this->course_m->get_by_ids('course_id', $temp_lesson[0]->course_id);
			$this->data['all_notifications'][$i]->lesson_name=$temp_lesson[0]->lesson_name;
			$this->data['all_notifications'][$i]->lesson_slug=$temp_lesson[0]->lesson_slug;
			$this->data['all_notifications'][$i]->c_slug=$temp_course[0]->c_slug;
			$i++;
			}
		}
		else{}
		
		$this->data['notification_counter']=count($this->data['notifications']);
		$this->data['main_view']= 'en/3-user/components/views/notification/main_notification';
		$this->load->view('en/3-user/layout/_layout_notification', $this->data);	
	}

	public function notification_delete(){

		$this->notification_m->delete_seen();
		$this->session->set_flashdata('message_notification', $this->lang->line('info_seen_notif_del') );
		redirect($this->data['language'].'/user/profile/notification/');
	}

	/**
	 *	Description: Show a specific notificatio with full details
	 *	@param int nore_id(Notification identety number)
	 */
	public function notification_details($note_id=NULL){
		$this->data['navigation_notification_active']= true;
		if($note_id != NULL){
		if($this->notification_m->permission_check($note_id) == true){
			$this->data['this_notification']=$this->notification_m->get_by_id($note_id);
			if($this->data['this_notification']->flag== 1)
				$this->notification_m->seen($note_id);
			$test=$this->lesson_m->get_all_information($this->data['this_notification']->lesson, 1);
			$this->data['this_notification']->lesson_name=$test[0]->lesson_name;
			$this->data['this_notification']->course=$test[0]->course;
			$this->data['this_notification']->category=$test[0]->category;
			if($this->data['this_notification']->type != 3 AND $this->data['this_notification']->type != 4){
				
				$this->data['this_notification']->last_name=$test[0]->last_name;
				$this->data['this_notification']->first_name=$test[0]->first_name;
				$this->data['this_notification']->category=$test[0]->category;
				$this->data['this_notification']->category_id=$test[0]->category_id;
				$this->data['this_notification']->course=$test[0]->course;
				$this->data['this_notification']->course_id=$test[0]->course_id;
				$this->data['this_notification']->modified=$test[0]->modified;
				$this->data['this_notification']->lesson_name=$test[0]->lesson_name;
			}
			$this->data['main_view']= 'en/3-user/components/views/notification/main_notification_single';
		}else{
			$this->data['main_view']= 'en/0-components/404';
		}
		
		/**	-----------------------------------TEST VARIABLE FOR SHOWING DATA--------------------------------*/
			//$this->data['main_view_data1']=$test;
		/**-----------------------------------TEST VARIABLE FOR SHOWING DATA---------------------------------*/

		$user_language = $this->session->userdata('language');
		$this->lang->load('frontpage_navigation_'.$user_language, $user_language);
		$this->load->view('en/3-user/layout/_layout_notification', $this->data);
		}else
		{
			redirect($this->data['language'].'/user/profile/notification');
		}
	}

	/**
	 *	Description:detele a specific notifications that you own
	 */
	public function note_delete($note_id=NULL){
		if($note_id != NULL){
			if($this->notification_m->permission_check($note_id) == true){
			$this->notification_m->delete($note_id);
			redirect($this->data['language'].'/user/profile/notification/');
			}	
		}	
		redirect($this->data['language'].'/user/profile/notification/failed');
	}
}
?>