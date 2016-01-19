<?php

class Notification extends Admin_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->session->set_userdata('language', 'serbian');
		$this->load->helper('captcha');
		$this->data['language']='sr';
		
		$this->load->model('page_m');
		$this->load->model('course_m');
		$this->load->model('category_m');
		$this->load->model('difficulty_m');
		$this->load->model('lesson_m');
		$this->load->model('block_m');
		$this->load->model('language_m');
		// $this->load->model('user_m');



		//Getting the complete url of the page we are on
		$total_url = $this->uri->uri_string();
		$this->data['lang_url'] = $this->uri->segment(1);
		$this->data['total_url'] = str_replace ("/","--", $total_url);
	}


	/**
	 *	Description: Used for showing all administrator shared notifications about user requests
	 *	@param string $type (Used for filtering data)(Determines what type of notifications would you like to show)
	 *	@param string $flag (Used for filtering data)(Determines the status(Seen, Unseen) of notifications you would like to show)
	 *	@param string $page (Used for pagination)(Determineson the page number you are currently viewing)
	 */
		//make exception if no result are found BUGFIX
	public function index($type='all', $flag='all', $page=1){
		
		// Validation for pagination, it can only contain numbers
		if(!is_int($page) AND !ctype_digit($page)){
        	redirect($this->data['language'].'/admin/notification/index/all/all/');
        }
        //Setting the default redirection path
			$base_url = base_url() . $this->data['language']."/admin/notification/index/";
		//Creating filterable links
        	$this->data["flag_links"]=$this->notification_m->create_flag_links($base_url, $type, $flag);
        	$this->data["type_links"]=$this->notification_m->create_type_links($base_url, $flag, $type);

        //Switcking database query depending on the type variable
		switch($type){
			case $this->lang->line('note_type_slug_2'):
			$this->db->where('type', 1);
			break;
			case $this->lang->line('note_type_slug_3'):
			$this->db->where('type', 2);
			break;
			case $this->lang->line('note_type_slug_4'):
			$this->db->where('type', 3);
			break;
			case $this->lang->line('note_type_slug_1'):
			break;
			default:
			break;
		}		
		//Switcking database query depending on the flag variable
		switch($flag){
			case $this->lang->line('note_status_slug_2'):
			$this->db->where('flag', 1);
			break;
			case $this->lang->line('note_status_slug_3'):
			$this->db->where('flag', 2);
			break;
			case $this->lang->line('note_status_slug_4'):
			$this->db->where('flag', 3);
			break;
			case $this->lang->line('note_status_slug_1'):
			break;
			default:
			break;
		}
		//Checking the reult(the prieview query command is now used up for displaying the results we need to create switches again)
		if($this->notification_m->all_notification() != NULL){
			 //Switcking database query depending on the type variable
			switch($type){
				case $this->lang->line('note_type_slug_2'):
				$this->db->where('type', 1);
				break;
				case $this->lang->line('note_type_slug_3'):
				$this->db->where('type', 2);
				break;
				case $this->lang->line('note_type_slug_4'):
				$this->db->where('type', 3);
				break;
				case $this->lang->line('note_type_slug_1'):
				break;
				default:

				break;
			}		
			//Switcking database query depending on the flag variable
			switch($flag){
				case $this->lang->line('note_status_slug_2'):
				$this->db->where('flag', 1);
				break;
				case $this->lang->line('note_status_slug_3'):
				$this->db->where('flag', 2);
				break;
				case $this->lang->line('note_status_slug_4'):
				$this->db->where('flag', 3);
				break;
				case $this->lang->line('note_status_slug_1'):
				break;
				default:
				break;
		}

		//-------------------------------------------------PAGINATION---------------------------------------
			$config = array();
			//Config files for pagination class
		        $config["base_url"] = base_url() . $this->data['language']."/admin/notification/index/".$type."/".$flag;
		        $config["total_rows"] = $this->notification_m->record_count($type , $flag);
		        $config['num_links'] = 4;
		        $config["per_page"] = 10;
		        $config["uri_segment"] = 7;
		        $config['use_page_numbers'] = TRUE;
	        // Configuring styles for pagination (Located in '/library/MY_PAgination')
	        foreach($this->my_pagination->set_style() as $key => $value)
	        	$config[$key] =$value;
	        //Initializing pagination
				$this->pagination->initialize($config);
				$this->data["course_data"]=' ';
			//getting the current page number from the URL
				$page = ($this->uri->segment(7)) ? $this->uri->segment(7) : 1;
			//Creating notification links for the current page
	        	$all_notifications  = $this->notification_m->fetch_limit($config["per_page"], $page-1, $type, $flag);
	        //Creating pagination links
	        	$this->data["links"] = $this->pagination->create_links();
        //-------------------------------------------------PAGINATION---------------------------------------
		$i=0;
		//Creating detailed notifications(Adding more information to them)
		if($all_notifications !=NULL)
			foreach($all_notifications as $note){
				$this->data['all_notifications'][$i]=$this->notification_m->get_by_id($note->note_id);
				$i++;
			}
		}else{
			//Statement if there are no notification
		}
		//Notification counter
			$this->data['notification_counter']=count($this->data['notifications']);


		//Loading views
			$this->data['main_view']= 'en/1-admin/components/views/main_notification';
			$this->load->view('en/1-admin/layout/_layout_notification', $this->data);	
	}

	/**
	 *	Description: Shows a specific notification in detail (Note:When you view a notification it is automaticly set to seen)
	 *	@param int $note_id (Used getting specific notifaction details)
	 */
	public function view($note_id=NULL){
		//Check if the note_id is set
		if($note_id != NULL){
			//Notification_id can be numerical only, redirect if false
			if(!is_int($note_id) AND !ctype_digit($note_id) OR ((bool)$this->notification_m->get_by_id( $note_id)) == false OR ( (bool)$this->notification_m->permission_check($note_id, true)== false) ){
        		$this->session->set_flashdata('error', $this->lang->line('note_error_no_permission'));
        		redirect($this->data['language'].'/admin/notification/index/all/all/');
       		}
       	//Get notification details
		$this->data['this_notification']=$this->notification_m->get_by_id($note_id);
		//Sorting notification by type and flags
		if($this->data['this_notification']->flag== 1)
			$this->notification_m->seen($note_id);


		if($this->data['this_notification']->type != 3){
		$test=$this->lesson_m->get_all_information($this->data['this_notification']->lesson, $this->data['this_notification']->type);

			
				$this->data['this_notification']->last_name=$test[0]->last_name;
				$this->data['this_notification']->first_name=$test[0]->first_name;
				$this->data['this_notification']->category=$test[0]->category;
				$this->data['this_notification']->category_id=$test[0]->category_id;
				$this->data['this_notification']->course=$test[0]->course;
				$this->data['this_notification']->course_id=$test[0]->course_id;
				

			if($this->data['this_notification']->type ==1){
				$this->data['this_notification']->lesson_created=$test[0]->lesson_created;
				$this->data['this_notification']->lesson_modified=$test[0]->lesson_modified;
				$this->data['this_notification']->lesson_a=$test[0]->lesson_a;
			}
			$this->data['this_notification']->course_created=$test[0]->course_created;
			$this->data['this_notification']->course_a=$test[0]->course_a;
		}
		//	-----------------------------------  TEST VARIABLE FOR SHOWING DATA  ---------------------------------
			$this->data['main_view_data1']=$this->data['notifications'];
		//	-----------------------------------  TEST VARIABLE FOR SHOWING DATA  ---------------------------------
		
		//Load views
		$this->data['main_view']= 'en/1-admin/components/views/main_notification_single';
		$this->load->view('en/1-admin/layout/_layout_notification', $this->data);
		}else{
			//if the note_id is NULL
			redirect($this->data['language'].'/admin/notification/');
		}
	}

	/**
	 *	Description: Replying to notification request sent by users(lesson, course, developer request)
	 *				(When we reply to a request it also applies the command to the database, deny/approve)
	 */
	public function send_request(){
		// Set up the form validation rules
		if($this->input->post('action')== 1){
		$this->notification_m->rules=array(	'message' => array(
											'field' => 'message', 
											'label' => 'Message', 
											'rules' => 'trim'
											), );
		}
		$rules = $this->notification_m->rules;
		$this->form_validation->set_rules($rules);
		

		// Process the form
		if ($this->form_validation->run() == TRUE) {
			//Format the data from the form into an array
			$data = $this->notification_m->array_from_post(array('send_id', 'recive_id', 'type', 'flag','lesson'));
			$message=$this->input->post('message');
			$name=$this->input->post('name');
			//setting default messages via automatic_message function
			$data['message']=$this->notification_m->automatic_message($this->input->post('action'), $this->input->post('old_type'), $name ,$message );
			$data['recive_id']=$this->input->post('recive_id');
			$data['date']= date('Y-m-d H:i:s');
			//Saving notification
			$this->notification_m->save($data);
			//Updateing status of the notification we replied to.
			$this->input->post('old_id');
			if($this->input->post('old_id') != NULL){
				// setting flag  to Closed
				$update['flag']=3;
				$this->notification_m->save($update, $this->input->post('old_id'));
			}
			if($this->input->post('action')==1){
				if($this->input->post('lesson') != NULL AND $this->input->post('old_type') == 1){
					// setting a lesson to approved
					$lesson_update['approved']=1;
					$this->lesson_m->save($lesson_update, $this->input->post('lesson'));
				}
				if($this->input->post('lesson') != NULL AND $this->input->post('old_type') == 2){
					//setting course to approved
					$course_update['approved']=1;
					$this->course_m->save($course_update, $this->input->post('lesson'));
				}
				if( $this->input->post('old_type') == 3){
					// adding developer priveleges to accpted developer request
					$user['privileges']=4;
					$this->user_m->save($user, $this->input->post('recive_id'));
				}
			}
			elseif($this->input->post('action')==2){
				//If you want to deactivate the lesson/course
				if($this->input->post('lesson') != NULL AND $this->input->post('old_type') == 1){
					//Deactivating a lesson
					$lesson_update['approved']=0;
					$this->lesson_m->save($lesson_update, $this->input->post('lesson'));
				}
				if($this->input->post('lesson') != NULL AND $this->input->post('old_type') == 2){
					//Deactivating a course
					$course_update['approved']=0;
					$this->course_m->save($course_update, $this->input->post('lesson'));
				}
			}
			else{}
			redirect($this->data['language'].'/admin/notification/');
		}
	}

	/**
  	 * Description: Allows administrators delete notifications, check for administrator permission.
   	 * @param int id (Determins which botification is going to be deleted)
   	 */
	public function delete($id){
		if($id != NULL){
			if($this->notification_m->permission_check($id, true) == true){
				$this->notification_m->delete($id);
				redirect($this->data['language'].'/admin/notification/index/all/all/success');
			}
		}
		redirect($this->data['language'].'/admin/notification/index/all/all/fail');
	}


}
?>