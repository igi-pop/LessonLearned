<?php

class Course extends Developer_Controller{

	public function __construct()
		{
			parent::__construct();
			$this->session->set_userdata('language', 'english');
			$this->data['language']='en';
			$this->load->helper('captcha');
			$this->load->helper('form');
			
			$this->load->model('page_m');
			$this->load->model('course_m');
			$this->load->model('category_m');
			$this->load->model('difficulty_m');
			$this->load->model('lesson_m');
			$this->load->model('block_m');
			$this->load->model('user_m');
			$this->load->model('language_m');
			$this->load->model('notification_m');


		$total_url = $this->uri->uri_string();
		$this->data['lang_url'] = $this->uri->segment(1);
		$this->data['total_url'] = str_replace ("/","--", $total_url);
	}

	/**
	 *	Description: main user dashboard
	 */
	public function index(){
		//Set the active class in the navigation panel 
		$this->data['navigation_mylessons_active']=true;
		//Deafaulting the order
		$order=1; $type='asc';
		
		//Creating the table header links for ordering
		$this->data['links']=$this->lesson_m->tabel_header($order,$type, $this->data['language']);

		//Getting the information for the table(Ineer joining users, courses and lesson)
		$this->data['lessons']=$this->lesson_m->get_joined_by_user();
		$this->data['courses']=$this->course_m->get_all_by_author( null, 8);


		//Load views
		$this->data['main_view'] = 'en/2-developer/components/views/main_course';
		$this->load->view('en/2-developer/layout/_layout_choose', $this->data);
	}

	/**
	 *	Description: connected to the  index controller with added ordering functions
	 *	@param 	int 	order (the colum by which we order)
	 *	@param 	string  type  (the type of ordering ascending/descending)
	 */
	public function order($order=1, $type='asc'){
		//Sending the url information to the view
		$this->data['type']=$type;
		$this->data['order']=$order;
		//Check notifications if they exist
		$this->notification_m->exist_check(20, 1 );

		//Create table header links for ordering
		$this->data['links']=$this->lesson_m->tabel_header($order,$type, $this->data['language']);
		
		//Input the ordered data
		$this->data['lessons']=$this->lesson_m->get_joined_by_user($order, $type);
		$this->data['courses']=$this->course_m->get_all_by_author( null, 8);

		//Load views
		$this->data['main_view'] = 'en/2-developer/components/views/main_course';
		$this->load->view('en/2-developer/layout/_layout_choose', $this->data);
	}

	/**
	 *	Description: Editing/Creating a new course
	 *	@param 	int 	course (Optional)(the course id you wnat to edit)
	 *
	 */
	public function create($course_id=null){
		//Ge all default information about categories and difficulties
		$this->data['dificulty'] = $this->difficulty_m->get();
		$this->data['categories'] = $this->category_m->get();
		// Get course data and avoid using an array of objects just and object
		if($course_id !=NULL AND $this->course_m->get_by_ids('course_id',$course_id) != NULL AND $this->course_m->check_course_author($course_id, $this->session->userdata('id')) != NULL):
			//get all information about the specific course and put it into a temp variable
			$c=$this->course_m->get_by_ids('course_id',$course_id);
			$this->data['course']=$c[0];
			$this->data['category'] =  $this->category_m->get_by_id($this->data['course']->category_id, false);
			$this->data['user']=$this->user_m->get_by_id('id',$this->data['course']->author_id);
		else:
			$this->data['user']=$this->user_m->get_by_id('id',$this->session->userdata('id'));
		endif;

		//chek the course if its in the url or not the check if it was sent via forms
		if($course_id != NULL ){
			// set dorm validation rules
			$rules = $this->course_m->rules_edit;
			if($this->data['course']->c_slug != $this->input->post('c_slug')){$rules['c_slug']['rules'].='|is_unique[courses.c_slug]';}
			$this->form_validation->set_rules($rules);
			// Process the form
			if ($this->form_validation->run() == TRUE) {
				$data = $this->course_m->array_from_post(array('title','c_slug', 'description','category_id', ));
				$data['c_slug']=seoUrl($data['c_slug']);
				//Insert into the database and redirect the user
				$this->course_m->save($data, $course_id );
				redirect($this->data['language'].'/developer/course/');
			}
		}
		else{
			//Set the validation rules
			$rules = $this->course_m->rules_edit;
			$rules['c_slug']['rules'].='|is_unique[courses.c_slug]';
			$this->form_validation->set_rules($rules);
			// Process the form
			if ($this->form_validation->run() == TRUE) {
				// This is the editing form
				$data = $this->course_m->array_from_post(array('title','c_slug', 'description','category_id', 'approved', 'difficulty_id'));
				$data['pub_date'] = date('Y-m-d');
				$data['author_id'] = $this->session->userdata('id');
				$data['c_slug']=seoUrl($data['c_slug']);
				$data['approved']=1;
				$this->course_m->save($data );
				$this->session->set_flashdata('success', $this->lang->line('info_course_create_success'));
				redirect($this->data['language'].'/developer/course/');
			}
		}
		/**---------------------------------------------------------TESTING VARIABLE */
		//$this->data['main_view_data1']=   $category;
		/*-------------------------------------------------------TESTING VARIABLE*/

		//Load views
		$this->data['main_view'] = 'en/2-developer/components/views/main_course_create';
		$this->load->view('en/2-developer/layout/_layout_choose', $this->data);
	}

	/**
	 *	Description: Redirection controller
	 */
	public function redirect(){
		if($this->input->post('course_id'))
		redirect($this->data['language'].'/developer/course/add_lesson/'.$this->input->post('course_id'));
		else
			redirect($this->data['language'].'/developer/category/');
	}

	/**
	 *	Description: Allows the user to view and edit blocks in a lesson
	 *	@param int lesson(what lesson would you like to view/edit)
	 *	@param string action(Order or edit)(It allows the user to switch from editing to ordering blocks)
	 */
	public function lesson( $lesson=null, $action='' ){
		
		//------------------Data Storage------------------
			//Shared data for connecting links(Create/View)
			$this->data['type']='view';
			$this->data['linked']='create';
			//Lesson error handleing(Edit menu)
			$this->data['lesson_404']=false;
			$this->data['lesson_null']=false;
			//Defaulting values for the view data
			$this->data['category']=NULL;
			$this->data['course']=NULL;
			//Passing in the uri elements back to views(Mostly used for creating links)
			$this->data['lesson_current']=$lesson;
			
		//The ordering block form validation and setup
		if($lesson != NULL){	
			// Deciding what view to load
			if($action != 'order'){
				$this->data['view_edit']='/en/2-developer/components/views/main_lesson_block_edit';

			}
			else{
			$this->data['view_edit']='/en/2-developer/components/views/main_lesson_block_order';
			//This is for ordering
			if($this->input->post() !=NULL){
				$items = $this->input->post('item');
		        $total_items = count($this->input->post('item'));
		        echo '<h3>Debugging</h3>';
		        echo "<p>Total items sent: $total_items</p>";
		        // Update order is usde for inserting the correct order of block that we recieved from jquery
		        $this->block_m->update_order($total_items, $items);
				}
			}	
		}
		else{
			$this->data['view_edit']='/en/2-developer/components/views/main_lesson_block_edit';
		}


		// Edit lesson segmen(Editing the block)
			//Get all the lesson information by id
			$get_lesson = $this->lesson_m->get_by_id('lesson_id', $lesson);
			//Error checking if there isnt a lesson with that id
			if($get_lesson == false){$this->data['lesson_404']=true;}
			//if($lesson ==  NULL){$this->data['lesson_null']=true;}
			//passing a variable for the form edit screen
			if($get_lesson == true){
				$this->data['lesson_name']=$get_lesson[0]->lesson_name;
				$this->data['lesson_slug']=$get_lesson[0]->lesson_slug;
			}
		// Extract all blocks from a specific lesson
			if($get_lesson != NULL)
				$all_blocks = $this->block_m->get_by_id('block_group',$get_lesson[0]->lesson_id);
			// Prepare and format the blocks for the view
			if(isset($all_blocks) )
				$this->data['print_lesson'] = $this->block_m->block_format($all_blocks, TRUE, $get_lesson[0]->lesson_id ,$module='developer', $this->data['language']);
			// ust get the block informations witout formating(For the order page)
			if(isset($all_blocks))
				$this->data['direct_block']=$all_blocks;
			
		//-----------------------------------TEST VARIABLE FOR SHOWING DATA---------------------------------
			//$this->data['main_view_data1']= $this->course_m->get_by_category(3, true);
		//------------------------------------------TEST VARIABLE-------------------------------------------

		//Load views
		$this->data['lesson']=$lesson;
		$this->data['s']="main_lesson_block_edit";
		$this->load->view('en/2-developer/layout/_layout_lesson', $this->data);

	}

	/**
	 *	 Description: Allows the user to add new lessons or edit existing ones to an specific course
	 *	@param 	int		course (must be valid, othervise you would be redirected)(determins in what course would you create a lesson)
	 *	@param 	int 	lesson (if you wnat to edit the course)
	 */
	public function add_lesson($course=null, $lesson=NULL){
		
		//check if we got any form data
		if($this->input->post('category_id') != NULL){
			//Redirect the user
			$course=$this->input->post('category_id');
			$this->session->set_flashdata('course_view', '/en/2-developer/components/views/main_lesson_view_list');
			//redirect($this->data['language'].'/developer/course/add_lesson/'.$course, 'refresh');
		}
		//BUGFIX might need deleting
		//Check the flash data 
		if($this->session->flashdata('course_view') != null){
			//$this->data['lesson_all']=$this->lesson_m->get_by_id('course_id',$course);
			//$this->data['course_view']=$this->session->userdata('course_view');
		}
		if($course == NULL OR $this->course_m->get_by_ids('course_id',$course) == NULL){
			$this->session->set_flashdata('message', $this->lang->line('error_flash_no_course'));
			redirect($this->data['language'].'/developer/course/', 'refresh');
		}
		$this->data['course_current']=$course;
		$this->data['course']=$this->course_m->get_by_id($course, false);
				
				
				// Check lesson_id in the URL
					if($lesson != NULL AND $this->lesson_m->get_by_id('lesson_id',$lesson) != NULL  AND $this->lesson_m->check_lesson($lesson)!= NULL){
						/*===LESSON IS AVAILBLE IN THE URL=====
				 	 	 *	Description: we are checking for the last component in the entry.
				 	 	 *  			 if we have it we will load data so it will be displayed for the edit lesson screen
				  	 	 */
						$l=$this->lesson_m->get_by_id('lesson_id',$lesson);
						$this->data['l_data']=$l[0]; 
					}

				// Load language and course data
				//$this->data['course']=$this->course_m->get_by_cou_and_cat($category, $course);
				$this->data['language_lesson']=$this->language_m->get_all();

				//Loading subviews and main view
				
				$this->data['lesson_view']='/en/1-admin/components/views/main_lesson_create_form';

		
		// Form validation for new lessons
		if($this->input->post('submit')){
			// Set up the form rules
				$rules = $this->lesson_m->rules_create_lesson;
				$rules['lesson_slug']['rules'].='|is_unique[lessons.lesson_slug]';
				$this->form_validation->set_rules($rules);
			// Process the form
			if ($this->form_validation->run() == TRUE) {
				//Get data from form and put it into an array
				$data = $this->lesson_m->array_from_post(array('lesson_name','lesson_slug', 'language_id' ,'course_id'));
				$data['lesson_slug']=seoUrl($data['lesson_slug']);
				$this->lesson_m->save($data);

				//Set success message
				$this->session->set_flashdata('success', $this->lang->line('info_flash_add'));
				redirect($this->data['language'].'/developer/course/');
			}
		}
		// Form validation for editing a lessons
		if($this->input->post('edit')){
			// Set up the form rules
				$rules = $this->lesson_m->rules_create_lesson;
				if($this->data['l_data']->lesson_slug != $this->input->post('lesson_slug')){$rules['lesson_slug']['rules'].='|is_unique[lessons.lesson_slug]';}
				$this->form_validation->set_rules($rules);
			// Process the form
			if ($this->form_validation->run() == TRUE) {
				$data = $this->lesson_m->array_from_post(array('lesson_name','lesson_slug', 'language_id' ,'course_id', 'lesson_id'));
				$data['lesson_slug']=seoUrl($data['lesson_slug']);
				$this->lesson_m->save($data, $lesson);
				$this->session->set_flashdata('success', $this->lang->line('info_flash_update'));
				redirect($this->data['language'].'/developer/course/add_lesson/'.$course.'/'.$lesson);
			}
		}
		

		$this->data['subview'] ='/en/2-developer/components/views/main_lesson_create_form';
		$this->data['lesson']=$lesson;
		$this->load->view('en/2-developer/layout/_layout_main', $this->data);
	}

	/**
     * Description: Allows author developer to delete his lesson, check for developer permissio permission, and checks if the lesson is his.
   	 *
     * @param int id (determins which lesson is going to be deleted)
     */
	public function lesson_delete ($id){
		//Checking if the developer isthe author of the lesson
		$lesson=$this->course_m->check_lesson_author($id, $this->session->userdata('id'));
		if($lesson){
			//deleteting lesson if he is
			$this->lesson_m->delete($id);
			$this->session->set_flashdata('message', $this->lang->line('info_lesson_delete_success'));
			redirect($this->data['language'].'/developer/course/');
			}
		else{
			//setting up error message and redirecting the user
			$this->session->set_flashdata('message', $this->lang->line('error_flash_no_permission'));
			redirect($this->data['language'].'/developer/course', 'refresh');
		}
	}

	/**
     * Description: Allows author developer to delete his course, check for developer permission, and checks if the course is his.
   	 *
     * @param int id (determins which course is going to be deleted)
     */
	public function course_delete ($id){
		//Checking if the developer is the author of the course
		$lesson=$this->course_m->check_course_author($id, $this->session->userdata('id'));
		if($lesson){
			$this->course_m->delete($id);
			$this->lesson_m->delete_where($id, 'course_id');
			$this->session->set_flashdata('message', $this->lang->line('info_course_delete_success'));
			redirect($this->data['language'].'/developer/course/');
		}
		else{
			//setting up error message and redirecting the user
			$this->session->set_flashdata('message', $this->lang->line('error_flash_no_permission'));
			redirect($this->data['language'].'/developer/course', 'refresh');
		}
	}

	/**
	 *	Description: Used for sending requests/notifications to administrators for approval,
	 *				 all the data is gatherd from a form(lesson. course and developer requests)
	 */
	public function send_request(){
		// Set up the form
		$rules = $this->notification_m->rules;
		$this->form_validation->set_rules($rules);
		
		// Process the form
		if ($this->form_validation->run() == TRUE) {
			$data = $this->notification_m->array_from_post(array('message','send_id', 'recive_id', 'type', 'flag','lesson'));
			$data['recive_id']=$this->input->post('recive_id');
			$data['date']= date('Y-m-d H:i:s');
			//Saving to database and redirecting the user
			$this->notification_m->save($data);
			redirect($this->data['language'].'/developer/course/');
		}
		redirect($this->data['language'].'/developer/course/fail');
	}






}



?>