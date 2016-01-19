<?php

class Lesson extends Admin_Controller{

	public function __construct(){
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
			$this->load->model('language_m');
			// $this->load->model('user_m');


			$total_url = $this->uri->uri_string();
			$this->data['lang_url'] = $this->uri->segment(1);
			$this->data['total_url'] = str_replace ("/","--", $total_url);
		}


	//Index page of the home
	public function index(){
		redirect('/'.$this->data['language'].'/admin/dashboard');
		

		$this->load->view('en/1-admin/layout/_layout_main', $this->data);	
		}

	/** 	
	*		Creating lessons controller
	 *		Description: Controller lets you select a category, course and gives you a form for creating or editing a lesson
	 *		@param int $category its a category_id and is used for determening in what course the lesson should be created
	 *		@param int $course 	 its a course_id and is used for determening where we want to create a lesson
	 *		@param int $lessin	 its a lesson id and is used for finding and dispalying the lesson form
	 */
	public function create($category=NULL, $course=NULL, $lesson=NULL){	
	  //------------------Data Storage------------------
		//Shared data for connecting links(Create/View)
		$this->data['type']='create';
		$this->data['linked']='view';
		//Default values 
		$this->data['category']=NULL;
		$this->data['course']=NULL;
		//Passing in the uri elements back to views(Mostly used for creating links)
		$this->data['category_current']=$category;
		$this->data['course_current']=$course;
		$this->data['lesson_current']=$lesson;
	  //------------------Data Storage------------------
		
		// Description: Main Logic for determening what part of the page we are ona and what views are active
		if($category != NULL OR $this->category_m->get_by_id($category) != NULL ){
			/*==========================CATEGORY IS AVAILABLE IN THE URL=====================================
			 * Description: First we are checking the category element of the URL.
			 *				If the we have a category we will load the "main_lesson_cat_list" view and get all the data on the specific category.
			 *				@param object $this->data['category']
			 */				
			
			$this->data['category']=$this->category_m->get_by_id($category, false);
			$this->data['category_view']='/en/1-admin/components/views/main_lesson_cat_list';

			// Get the number of courses available in this category and an exception if no courses are available
			if(count($this->course_m->get_by_category($category, false)) != NULL){
				$this->data['category']->count=count($this->course_m->get_by_category($category, false));
			}else{
				$this->data['category']->count=0;
			}

			// Checking if we have a valid course in the URL
			if($course != NULL OR $this->course_m->get_by_id($course) != NULL ){
				
				/*=======================================COURSE IS AVAILBLE IN THE URL============================
				 *	Description: We have a valid category_id and a valid course_id in the url.
				 *				 we are putting all our course data in $this->data['course'].
				 */
				$this->data['course']=$this->course_m->get_by_id($category, false);
				
				// Counting all the lessons in a specific course and amking an exception for courses with zero entries
				// Function get_by_cou_and_cat is checking if the category and course id match with an existing course
				if($this->course_m->get_by_cou_and_cat($category, $course) == NULL){
					$this->session->set_flashdata('error', $this->lang->line('error_flash_not_valid'));
					redirect($this->data['language'].'/admin/lesson/create/'.$category, 'refresh');
					}
				// Counting how meni lessons there are in a course and adding exception for zero
				if(count($this->lesson_m->get_by_course($course))!=NULL)
					$this->data['course_count']=count($this->lesson_m->get_by_course($course));//correct
				else
					$this->data['course_count']=0;

				// Check lesson_id in the URL
					if($lesson != NULL AND $this->lesson_m->get_by_id('lesson_id',$lesson)){
						/*===  LESSON IS AVAILBLE IN THE URL  =====
				 	 	 *	Description: we are checking for the last component in the entry.
				 	 	 *  			 if we have it we will load data so it will be displayed for the edit lesson screen
				  	 	 */
						$l=$this->lesson_m->get_by_id('lesson_id',$lesson);
						$this->data['l_data']=$l[0]; 
					}

				// Load language and course data
				$this->data['course']=$this->course_m->get_by_cou_and_cat($category, $course);
				$this->data['language_lesson']=$this->language_m->get_all();

				//Loading subviews and main view
				$this->data['course_view']='/en/1-admin/components/views/main_lesson_course_list';
				$this->data['lesson_view']='/en/1-admin/components/views/main_lesson_create_form';
			}
			else{
				/*=======================================COURSE IS NOT AVAILBLE IN THE URL============================
				 *	Description: We have a valid category_id and not a valid course_id in the url.
				 *				 We are getting all the courses and putting them in  view so the user can select a course
				 */
				// Get all courses with a category_id
				$this->data['course_all']=$this->course_m->get_by_id($category, false);

				//Go trough them in a loop and add lesson counter
				foreach($this->data['course_all'] as $key => $courses){
					if(count($this->lesson_m->get_by_course($course))!=NULL)
						$this->data['course_all'][$key]->count=count($this->lesson_m->get_by_course($course));//correct
					else
						$this->data['course_all'][$key]->count=0;
				}
				
				// Load the view
				$this->data['course_view']='/en/1-admin/components/views/main_lesson_course_select';	
			}
		}
		else{
			/*=======================================CATEGORY IS NOT AVAILBLE IN THE URL============================
				 *	Description: We have don't a valid category_id in the url.
				 *				 We are getting all the categories and putting them in  view so the user can select a course
				 */
			//Retriev all category data
			$this->data['category_all']=$this->category_m->get_all();

			//Loop trough them so we can add the counters
			foreach($this->data['category_all'] as $key => $category_temp){
				//Make exception filter for zerro courses
				if(count($this->course_m->get_by_category($category_temp->category_id, false))!=NULL)
					$this->data['category_all'][$key]->count=count($this->course_m->get_by_category($category_temp->category_id, false));
				else
					$this->data['category_all'][$key]->count=0;
			}

			//Load subviews
			$this->data['category_view']='/en/1-admin/components/views/main_lesson_cat_select';
			$this->data['course_view']='/en/1-admin/components/views/main_lesson_course_select';
		}

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
				$this->session->set_flashdata('message', $this->lang->line('info_flash_add'));
				redirect($this->data['language'].'/admin/lesson/create/'.$category.'/'.$course);
			}
		}
		// Form validation for editing a lessons
		if($this->input->post('edit')){
			// Set up the form rules
				$rules = $this->lesson_m->rules_create_lesson;
				if($this->data['l_data']->lesson_slug != $this->input->post('lesson_slug')){
				$rules['lesson_slug']['rules'].='|is_unique[lessons.lesson_slug]';
			}
				$this->form_validation->set_rules($rules);
			// Process the form
			if ($this->form_validation->run() == TRUE) {
				$data = $this->lesson_m->array_from_post(array('lesson_name','lesson_slug', 'language_id' ,'course_id', 'lesson_id'));
				$data['lesson_slug']=seoUrl($data['lesson_slug']);
				$this->lesson_m->save($data, $lesson);
				$this->session->set_flashdata('message', $this->lang->line('info_flash_update'));
				redirect($this->data['language'].'/admin/lesson/create/'.$category.'/'.$course.'/'.$lesson);
			}
		}

		//loading views
		$this->data['lesson']=$lesson;
		$this->data['subview'] = 'en/1-admin/components/views/main_lesson_create';
		$this->load->view('en/1-admin/layout/_layout_main', $this->data);
		}

	/** 	
	*		Viewing and Editing lessons controller
	 *		Description: Controller lets you select a category, course and gives you a list of lesson to edit.
	 *					 Editing includes, block edits, creating block, ordering blocks, deleting blocks.
	 *					 (Note: All 3 parameters are needed for editing blocks + the optional parameter for switing betwen edit and order.)
	 *		@param int $category its a category_id and i used for determening in what course the lesson should be created
	 *		@param int $course 	its a course_id and i used for determening where we want to create a lesson
	 *		@param int $lessin	its a lesson id and is used for finding and dispalying the lesson list view
	 *		@param string $action  lets you switch views betwen editing blocks and ordering (Anything or "Edit" value id for the edit screen and only "order" is for the order screen)
	 */
	public function view($category=NULL, $course=NULL, $lesson=NULL, $action="edit"){	
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
			$this->data['category_current']=$category;
			$this->data['course_current']=$course;


				//The ordering block form validation and setup
		if($lesson != NULL){	
			// Deciding what view to load
			if($action != 'order'){
				$this->data['view_edit']='/en/1-admin/components/views/main_lesson_block_edit';
			}
			else{
			$this->data['view_edit']='/en/1-admin/components/views/main_lesson_block_order';
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
		//------------------Data Storage------------------
		//Checking the category_id fucking for a valid value
		if($category != NULL AND $this->category_m->get_by_id($category) != NULL ){
		     /**
			*==========================CATEGORY IS AVAILABLE IN THE URL=====================================
			 * 		Description: First we are checking the category element of the URL.
			 *				If the we have a category we will load the "main_lesson_cat_list" view and get all the data on the specific category.
			 *				@param object $this->data['category']
			 */	

			//Getting specific category data related to the category_id
			$this->data['category']=$this->category_m->get_by_id($category, false);
			$this->data['category_view']='/en/1-admin/components/views/main_lesson_cat_list';
			
			//Getting the number of courses in the category and making exception for categories with zero courses
			if(count($this->course_m->get_by_category($category, false)) != NULL){
				$this->data['category']->count=count($this->course_m->get_by_category($category, false));}
			else{
				$this->data['category']->count=0;}
				//Preparind data for statistics
				$fields= array(
			   	 	"category_id"	=> $category,
			   	 	);
				//Selecting the table for checking statistics
				$table="courses";
				//Retrieve statistics
				$this->data['category_stat']=$this->category_m->counting_stars($fields, $table);
				//format sattistics data
				foreach($this->data['category_stat'] as $field => $value){
					$this->data['category']->$field = $value;
				}
			// Check the course_id if its a valid it and if it exists
			if($course != NULL OR $this->course_m->get_by_id($course) != NULL ){
				/*=======================================COURSE IS AVAILBLE IN THE URL============================
				 *	Description: We have a valid category_id and a valid course_id in the url.
				 *				 we are putting all our course data in $this->data['course'].
				 */
				//Loading all the course data for the specific course_id
				$this->data['course']=$this->course_m->get_by_id($category);
				//Validification of the course with the category(test if there exist a course with that id and that category_id)
				if($this->course_m->get_by_cou_and_cat($category, $course) == NULL){
					$this->session->set_flashdata('error_course', $this->lang->line('error_flash_not_valid'));
					redirect($this->data['language'].'/admin/lesson/view/'.$category, 'refresh');
				}

				//Counting the number of lesson in the course (POSSIBLE BUGFIX FOR ZERO LESSONS)
				$this->data['course_count']=count($this->lesson_m->get_by_course($course));
				//Getting valid course data
				$this->data['course']=$this->course_m->get_by_cou_and_cat($category, $course);

				//Preparind data for statistics
				$fields= array(
			   	 	"course_id"	=> $course,
			   	 	);
				//Selecting the table for checking statistics
				$table="lessons";
				//Retrieve statistics
				$this->data['course_stat']=$this->category_m->counting_stars($fields, $table);
				//format sattistics data
				foreach($this->data['course_stat'] as $field => $value){
					$this->data['course'][0]->$field = $value;
				}

				$this->data['author']= $this->user_m->get_by_id('id',$this->data['course'][0]->author_id);
				//Preparind data for statistics
				$fields= array(
			   	 	"author_id"	=> $this->data['course'][0]->author_id,
			   	 	);
				//Selecting the table for checking statistics
				$table="courses";
				//Retrieve statistics
				$this->data['author_stat']=$this->category_m->counting_stars($fields, $table);
				//format sattistics data
				foreach($this->data['author_stat'] as $field => $value){
					$this->data['author']->$field = $value;
				}

				
				//Load lesson and language data
				$this->data['language_lesson']=$this->language_m->get_all();
				$this->data['lesson_all']=$this->lesson_m->get_by_id('course_id',$course);

				//Load views
				$this->data['course_view']='/en/1-admin/components/views/main_lesson_course_list';
				$this->data['lesson_view']='/en/1-admin/components/views/main_lesson_view_list';
			}
			else{
				/*=======================================COURSE IS NOT AVAILBLE IN THE URL============================
				 *	Description: We have a valid category_id and not a valid course_id in the url.
				 *				 We are getting all the courses and putting them in  view so the user can select a course
				 */
				// Get all courses with a category_id
				$this->data['course_all']=$this->course_m->get_by_id($category, true);

				//Get the number of lesson in a specific course and making an exception for zero lessons
				foreach($this->data['course_all'] as $key => $course_temp)
					$this->data['course_all'][$key]->count=count($this->lesson_m->get_by_course($course_temp->course_id));

				//Load view
				$this->data['course_view']='/en/1-admin/components/views/main_lesson_course_select';	
			}
		}else{
			/*=======================================CATEGORY IS NOT AVAILBLE IN THE URL============================
				 *	Description: We have don't a valid category_id in the url.
				 *				 We are getting all the categories and putting them in  view so the user can select a course
				 */
			//Retriev all category data
			$this->data['category_all']=$this->category_m->get_all();
			//Get the number of courses in a all categories and making an exception for zero courses
			foreach($this->data['category_all'] as $key => $category_temp)
					$this->data['category_all'][$key]->count=count($this->course_m->get_by_category($category_temp->category_id, false));

			//Load views
			$this->data['category_view']='/en/1-admin/components/views/main_lesson_cat_select';
			$this->data['course_view']='/en/1-admin/components/views/main_lesson_course_select';
			//display the category select And course select
		}

		// Edit lesson segmen(Editing the block)
			//Get all the lesson information by id
			$get_lesson = $this->lesson_m->get_by_id('lesson_id', $lesson);
			$this->data['lesson_side']=$this->lesson_m->get_by_id('lesson_id', $lesson);
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
				$this->data['print_lesson'] = $this->block_m->block_format($all_blocks, TRUE, $get_lesson[0]->lesson_id, 'admin', $this->data['language'] );
			// ust get the block informations witout formating(For the order page)
			if(isset($all_blocks))
				$this->data['direct_block']=$all_blocks;
			

		//----------------------------------- TEST VARIABLE FOR SHOWING DATA ---------------------------------
			//$this->data['main_view_data1']= $this->data['notifications'];
		//------------------------------------------ TEST VARIABLE -------------------------------------------

		//url and language segment
		$total_url = $this->uri->uri_string();
		$this->data['lang_url'] = $this->uri->segment(1);
		$this->data['total_url'] = str_replace ("/","--", $total_url);
	
		//Load views
		$this->data['lesson']=$lesson;
		$user_language = $this->session->userdata('language');
		$this->data['subview'] = 'en/1-admin/components/views/main_lesson_create';
		$this->lang->load('frontpage_navigation_'.$user_language, $user_language);
		$this->load->view('en/1-admin/layout/_layout_main', $this->data);
		}

	/**
  	 * Description: Allows administrators delete lessons, check for administrator permission and if the lesson is valid.
   	 * @param int id (Determins which lesson is going to be deleted)
   	 */
	public function delete ($id){

		//Checking for administrator permissions, if its a valid lesson, and if the input is strictly numeric
		if($this->user_m->admin_permission() AND ((bool)$this->lesson_m->get_by_id("lesson_id", $id) == true ) AND is_numeric($id)== true ){
			//Deleteing the data from the database
			//$this->category_m->delete($id);
			$this->lesson_m->delete($id);
			$this->notification_m->delete_where('lesson', $id);
			//Setting up success messege and redirecting
		 	$this->session->set_flashdata('message', $this->lang->line('category_info_delete'));
			redirect($this->data['language'].'/admin/lesson/order/');
		}
		else{
			//Setting up error messege when we don't have administrator permissions and redirecting
			$this->session->set_flashdata('error', 	$this->lang->line('category_error_delete_no_permit'));
			redirect($this->data['language'].'/admin/lesson/view/fail');
		}	
	}

	/**
	 *	Description: Displays a table view of all lesson, filterable, orderable with header links 
	 *				 and devided with pagination(Takes information from ultiple database tables)
	 *	@param int $order (Order type)
	 *	@param string $type ('asc' OR 'desc')
	 *	@param string $match (Search needle for filtering)
	 *
	 */
	public function order ($order=1, $type="asc",  $match='-'){
		if($match == "-" OR $match == NULL)
			$this->data['did_we_search']=false;
		else{
			$this->data['did_we_search']=true;
		}
		//Secondary order parameter
		$order1=$order;
		if($order== NULL){
			$order1='course';
		}
		//Setting default url
		$this->data['url']="/".$order1.'/'.$type.'/';
		if(empty($match))
			//Search parameter
			$match='-';
		/**----------------------		Creating header links		--------------------------------------**/
			//Total number of table columns
	        $total_items=11;
	        //what is the position of the pagination parameter
	        $pagination_segment=7;
	        //Specific url path
	        $extended_url="/admin/lesson/order/";
	        //User visible header names
	        $header_list_name=array(
	            0  => $this->lang->line('course_table_icon'),
	            1  => $this->lang->line('course_table_course'),
	            2  => 'Lesson',
	            3  => $this->lang->line('course_table_slug'),
	            4  => $this->lang->line('course_table_author'),
	            5  => 'Language',
	            6  => $this->lang->line('course_table_created'),
	            7  => 'Modified',
	            8  => $this->lang->line('active'),
	            9  => '',
	            10 => '',
	            11 => '',
	            );
	        //List of valid header slugs( False values are converted to non-clickable)
	        $header_order_slug= array(
	            0  => 'category',
	            1  => 'course',
	            2  => 'lesson',
	            3  => 'slug',
	            4  => 'author',
	            5  => 'description',
	            6  => 'created',
	            7  => 'modified',
	            8  => 'active',
	            9  => false,
	            10 => false,
	            11  => false,
	            );
			//Calling and sending all data required to create header ordering links(Ordering value+type, Pagination and search result filtering)
			$this->data['links']=$this->course_m->create_table_header($this->data['language'], $total_items, $extended_url, $header_list_name, $header_order_slug, $order, $type, $page=0,$pagination_segment, $match);
		/**----------------------		Creating header links		--------------------------------------**/

			$this->data['type']=$type;

			//defaulting the type of search
			if($type != 'asc' AND $type!='desc'){
				$type='asc';
			}

			if($match != '-' AND is_numeric($match)== false OR $match==NULL AND is_numeric($match)== false){
				$field= array(
						'description'	=> decodeseoUrl($match),
						'category_name'	=> decodeseoUrl($match),
						'lesson_name'	=> decodeseoUrl($match),
						'title'			=> decodeseoUrl($match),
						'lesson_slug'	=> decodeseoUrl($match),
						'cat_slug'		=> decodeseoUrl($match),
						'lessons.lesson_id'	=>decodeseoUrl($match),
						);
				}
				elseif($match != '-' AND is_numeric($match)){
					$field= array(
						'lessons.lesson_id'		=>$match,
						);
				}
				else{
					$field=null;
				}
			$search_haystack=array(
					1=>'title',
					2=>'category_name',
					3=>'lesson_name',
					4=>'language.lang_name',
					5=>'first_name',
					6=>'last_name',
					7=>'lessons.lesson_id',
					);
			
			$multy= array(
				'0'	=> 'lessons-courses',
				'1' =>'courses-users',
				'2' =>'courses-category',
				'3' =>'lessons-language',
				);

		//-------------------- Configuring the Pagination ----------------------
			$config = array();
	       $config["base_url"] = base_url() . $this->data['language']."/admin/lesson/order/".$order."/".$type.'/'.$match;
		        //Defaulting the match parameter
		        if($match=='-')
					$match=NULL;

	


	        $config["total_rows"] = $this->lesson_m->count_pagination_records(null, $search_haystack, decodeseoUrl($match), $multy);
	        $config['num_links'] = 3;
	        $config["per_page"] = 10;
	        $config["uri_segment"] = 8;
	        

	        // Configuring styles for pagination (Located in '/library/MY_PAgination')
	        foreach($this->my_pagination->set_style() as $key => $value)
	        	$config[$key] =$value;

	        switch($order){
	        	case 'category':
				$this->db->order_by('category_name', $type);
				break;
				case 'course':
				$this->db->order_by('title', $type);
				break;
				case 'slug':
				$this->db->order_by('c_slug', $type);
				break;
				case 'author':
				$this->db->order_by('first_name', $type);
				break;
				case 'description':
				$this->db->order_by('course_description', $type);
				break;
				case 'date':
				$this->db->order_by('course_date', $type);
				break;
				case 'active':
				$this->db->order_by('course_approved',$type);
				break;
				default:
				$this->db->order_by('title', $type);
				break;
			}
			

			$this->pagination->initialize($config);
			 $this->data["course_data"]=' ';
			$page = ($this->uri->segment(8)) ? $this->uri->segment(8) : 0;
	        //$this->data['courses'] = $this->course_m->fetch_limit($config["per_page"], $page, $field, $match, true);
	        $this->data['courses'] =$this->lesson_m->fetch_pagination_records($config["per_page"], $page, null , true ,$search_haystack, decodeseoUrl($match), $multy);
	        
	        $this->data["page_links"] = $this->pagination->create_links();
       	//-------------------- Configuring the Pagination ----------------------
		
		//Search options
		if($this->input->post('match') != null) {
			//Redirecting to display the search results
			$match=$this->input->post('match');
			$match=seoUrl($this->input->post('match'));
			redirect($this->data['language'].'/admin/lesson/order'.$this->data['url'].$match, 'refresh') ;
		}
		
		  //$this->data['courses'] =$this->course_m->count_pagination_records(null , null ,$search_haystack, 'a', $multy);

		

		$this->data['url']="/".$order1.'/'.$type.'/';
			// Getting information needed to display courses
		 //$this->data['categories'] = $this->category_m->get();
		// $this->data['courses']=$this->course_m->get();
		 //$this->data['users']=$this->user_m->get();
			// Load views
		 $this->data['subview'] = 'en/1-admin/components/views/lesson/lesson_index';
		 $this->load->view('en/1-admin/layout/_layout_main', $this->data);
	}

	
	public function save(){
		$items = $this->input->post('item');
        $total_items = count($this->input->post('item'));
        echo '<h3>Debugging</h3>';
        echo "<p>Total items sent: $total_items</p>";


		//-----------------------------------TEST VARIABLE---------------------------------
			//$this->data['main_view_data1']= $_POST['order'];
		//-----------------------------------TEST VARIABLE---------------------------------
		
		$this->data['subview'] = 'en/1-admin/components/views/main_lesson_create';
		$this->data['lesson']=$lesson;

		$this->load->view('en/1-admin/layout/_layout_main', $this->data);
		}

	/**
	 *	Description: Activates/deactivates a lesson
	 */
	public function active($url_name='view'){
		// Process form
			$link=$this->input->post('link');
			$id=$this->input->post('lesson_id');
			$data=array('approved' => $this->input->post('approved'));
		//Save to database
			$this->lesson_m->save($data,$id);
		//Setting up the success message and redirecting the user
			$this->session->set_flashdata('message', $this->lang->line('info_flash_activation'));
			if($url_name == 'order'){redirect($this->data['language'].'/admin/lesson/'.$url_name.$this->input->post('url'));}
			redirect($this->data['language'].'/admin/lesson/'.$url_name.'/'.$link);	
	}
}
?>

