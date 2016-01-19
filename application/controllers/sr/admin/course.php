<?php
class Course extends Admin_Controller
{

	public function __construct (){
		parent::__construct();
		$this->data['language']='sr';
		$this->load->model('category_m');
		$this->load->model('course_m');
		$this->load->model('cat_link_m');
		$this->load->model('difficulty_m');
	}

	/**
	 * Description: List of courses and all information related to courses in a table
	 */
	public function index ($order=1, $type="asc",  $match='-', $page=0){
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
	        $total_items=10;
	        //what is the position of the pagination parameter
	        $pagination_segment=8;
	        //Specific url path
	        $extended_url="/admin/course/order/";
	        //User visible header names
	        $header_list_name=array(
	            0  => $this->lang->line('course_table_icon'),
	            1  => $this->lang->line('course_table_category'),
	            2  => $this->lang->line('course_table_course'),
	            3  => $this->lang->line('course_table_slug'),
	            4  => $this->lang->line('course_table_author'),
	            5  => $this->lang->line('course_table_description'),
	            6  => $this->lang->line('course_table_created'),
	            7  => $this->lang->line('active'),
	            8  => '',
	            9  => '',
	            10 => '',
	            );
	        //List of valid header slugs( False values are converted to non-clickable)
	        $header_order_slug= array(
	            0  => false,
	            1  => 'category',
	            2  => 'course',
	            3  => 'slug',
	            4  => 'author',
	            5  => 'description',
	            6  => 'date',
	            7  => 'active',
	            8  => false,
	            9  => false,
	            10 => false,
	            );
			//Calling and sending all data required to create header ordering links(Ordering value+type, Pagination and search result filtering)
			$this->data['links']=$this->course_m->create_table_header($this->data['language'], $total_items, $extended_url, $header_list_name, $header_order_slug, $order, $type, $page, $pagination_segment, decodeseoUrl($match));
		/**----------------------		Creating header links		--------------------------------------**/

			$this->data['type']=$type;

			//defaulting the type of search
			if($type != 'asc' AND $type!='desc'){
				$type='asc';
			}

			if($match != '-' OR $match==NULL){
				$field= array(
						'title'			=> seoUrl($match),
						'description'	=> seoUrl($match),
						'category_name'	=> seoUrl($match),
						'cat_slug'		=>seoUrl($match),
						);
				}else{
					$field=null;
				}
			//what columns are we searching in when the user wants to filter 
			$search_haystack=array(
					'1'=>'title',
					'2'=>'category_name',
					'3'=>'c_slug',
					'4'=>'courses.description',
					'5'=>'first_name',
					'5'=>'last_name',
					);
			//if we want to extend tables primary-secondery
			$multy= array(
				'1' =>'courses-users',
				'2' =>'courses-category',
				);

			//Defaulting the order_by
			//$this->db->order_by('category_namea', $type);
		//-------------------- Configuring the Pagination ----------------------
			$config = array();
		    $config["base_url"] = base_url() . $this->data['language']."/admin/course/order/".$order."/".$type.'/'.$match;
			//Defaulting the match parameter
			if($match=='-')
				$match=NULL;
		    $config["total_rows"] = $this->course_m->count_pagination_records(null, $search_haystack, $match, $multy);
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
		    $this->data['courses'] =$this->course_m->fetch_pagination_records($config["per_page"], $page, null , null ,$search_haystack, decodeseoUrl($match), $multy);
		    $this->data["page_links"] = $this->pagination->create_links();
	    //-------------------- Configuring the Pagination ----------------------
			
			//Search options
			if($this->input->post('match') != null) {
				//Redirecting to display the search results
				//$match=$this->input->post('match');
				$match=seoUrl($this->input->post('match'));
				redirect($this->data['language'].'/admin/course/order'.$this->data['url'].$match, 'refresh') ;
			}
			
			  //$this->data['courses'] =$this->course_m->count_pagination_records(null , null ,$search_haystack, 'a', $multy);

			

			$this->data['url']="/".$order1.'/'.$type.'/';
				// Getting information needed to display courses
			 //$this->data['categories'] = $this->category_m->get();
			// $this->data['courses']=$this->course_m->get();
			 //$this->data['users']=$this->user_m->get();
				// Load views
			 $this->data['subview'] = 'en/1-admin/components/views/main_course_index';
			 $this->load->view('en/1-admin/layout/_layout_main', $this->data);
		
	}
	public function order ($order=1, $type="asc",  $match='-'){
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
	        $total_items=10;
	        //what is the position of the pagination parameter
	        $pagination_segment=7;
	        //Specific url path
	        $extended_url="/admin/course/order/";
	        //User visible header names
	        $header_list_name=array(
	            0  => $this->lang->line('course_table_icon'),
	            1  => $this->lang->line('course_table_category'),
	            2  => $this->lang->line('course_table_course'),
	            3  => $this->lang->line('course_table_slug'),
	            4  => $this->lang->line('course_table_author'),
	            5  => $this->lang->line('course_table_description'),
	            6  => $this->lang->line('course_table_created'),
	            7  => $this->lang->line('active'),
	            8  => '',
	            9  => '',
	            10 => '',
	            );
	        //List of valid header slugs( False values are converted to non-clickable)
	        $header_order_slug= array(
	            0  => false,
	            1  => 'category',
	            2  => 'course',
	            3  => 'slug',
	            4  => 'author',
	            5  => 'description',
	            6  => 'date',
	            7  => 'active',
	            8  => false,
	            9  => false,
	            10 => false,
	            );
			//Calling and sending all data required to create header ordering links(Ordering value+type, Pagination and search result filtering)
			$this->data['links']=$this->course_m->create_table_header($this->data['language'], $total_items, $extended_url, $header_list_name, $header_order_slug, $order, $type, $page=0,$pagination_segment, $match);
		/**----------------------		Creating header links		--------------------------------------**/

		$this->data['type']=$type;

		//defaulting the type of search
		if($type != 'asc' AND $type!='desc'){
			$type='asc';
		}

		if($match != '-' OR $match==NULL){
			$field= array(
					'description'	=> $match,
					'category_name'	=> $match,
					'cat_slug'		=>$match,
					);
			}else{
				$field=null;
			}
		$search_haystack=array(
				'1'=>'title',
				'2'=>'category_name',
				'3'=>'c_slug',
				'4'=>'courses.description',
				'5'=>'first_name',
				'5'=>'last_name',
				);

		$multy= array(
			'1' =>'courses-users',
			'2' =>'courses-category',
			);

		//Defaulting the order_by
		//$this->db->order_by('category_namea', $type);
		//-------------------- Configuring the Pagination ----------------------
			$config = array();
	       $config["base_url"] = base_url() . $this->data['language']."/admin/course/order/".$order."/".$type.'/'.$match;
		        //Defaulting the match parameter
		        if($match=='-')
					$match=NULL;

	


	        $config["total_rows"] = $this->course_m->count_pagination_records(null, $search_haystack, $match, $multy);
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
	        $this->data['courses'] =$this->course_m->fetch_pagination_records($config["per_page"], $page, null , null ,$search_haystack, $match, $multy);
	        $this->data["page_links"] = $this->pagination->create_links();
       	//-------------------- Configuring the Pagination ----------------------
		
		//Search options
		if($this->input->post('match') != null) {
			//Redirecting to display the search results
			$match=$this->input->post('match');
			redirect($this->data['language'].'/admin/course/order'.$this->data['url'].$match, 'refresh') ;
		}
		
		  //$this->data['courses'] =$this->course_m->count_pagination_records(null , null ,$search_haystack, 'a', $multy);

		

		$this->data['url']="/".$order1.'/'.$type.'/';
			// Getting information needed to display courses
		 //$this->data['categories'] = $this->category_m->get();
		// $this->data['courses']=$this->course_m->get();
		 //$this->data['users']=$this->user_m->get();
			// Load views
		 $this->data['subview'] = 'en/1-admin/components/views/main_course_index';
		 $this->load->view('en/1-admin/layout/_layout_main', $this->data);
	}
	/**
	 *	Description: Edit/Add a new course 
	 *	@param course_id(optional)	(it determins which course will be edited, if its NULL it will create a new course)
	 */
	public function edit ($course_id=NULL){
		// We get all information about categories and difficulties
			$this->data['dificulty'] = $this->difficulty_m->get();
			$this->data['categories'] = $this->category_m->get();
		// Check if we got a course in the URl and check if it exist(is valid)
		if($course_id !=NULL AND $this->course_m->get_by_ids('course_id',$course_id) != NULL):
			//If its valid get all the information about it and put it into a temporary variable $c
				$c=$this->course_m->get_by_ids('course_id',$course_id);
			// $c is an array of objects, we just want an object
				$this->data['course']=$c[0];
			// Set the category information of our course
				$this->data['category'] =  $this->category_m->get_by_id($this->data['course']->category_id, false);
			// Set the user information of our course
				$this->data['user']=$this->user_m->get_by_id('id',$this->data['course']->author_id);
		else:
			//if the course is NULL or invalid we  will just get the user information for creating a course instead of editing an existing course
			$this->data['user']=$this->user_m->get_by_id('id',$this->session->userdata('id'));
		endif;

		//Check if the course_id exists and validate the form
		if($course_id != NULL){
			//Set validation rules
				$rules = $this->course_m->rules_edit;
				if($this->data['course']->c_slug != $this->input->post('c_slug')){$rules['c_slug']['rules'].='|is_unique[courses.c_slug]';}
				$this->form_validation->set_rules($rules);
			// Process the form
			if ($this->form_validation->run() == TRUE) {
				//Format the array for saving to the database from the form data
				$data = $this->course_m->array_from_post(array('title','c_slug', 'description','category_id', ));
				$data['c_slug']=seoUrl($data['c_slug']);
				// Save to database and redirect
				$this->course_m->save($data, $course_id );
				redirect($this->data['language'].'/admin/course');
			}
		}
		else{
			//Set validation rules
			$rules = $this->course_m->rules_edit;
			$rules['c_slug']['rules'].='|is_unique[courses.c_slug]';
			$this->form_validation->set_rules($rules);
			// Process the form
			if ($this->form_validation->run() == TRUE) {
				// If the administrator is creating a course it is approved and we add the date of creation
				//Format the array for saving to the database from the form data
				$data = $this->course_m->array_from_post(array('title','c_slug', 'description','category_id', 'approved', 'difficulty_id'));
				$data['pub_date'] = date('Y-m-d');
				$data['author_id'] = $this->session->userdata('id');
				$data['c_slug']=seoUrl($data['c_slug']);
				// Save to database and redirect
				$this->course_m->save($data );
				redirect($this->data['language'].'/admin/course');
			}
		}
		// Load the view
		$this->data['subview'] = 'en/1-admin/components/views/main_course_edit';
		$this->load->view('en/1-admin/layout/_layout_main', $this->data);
	}

	/**
	 *	Description: Activation form for courses
	 */
	public function activate(){
		// Get category and course information
		$this->data['categories'] = $this->category_m->get();
		$this->data['courses'] = $this->course_m->get();
		// Load views
		$this->data['subview'] = 'en/1-admin/components/views/main_course_active';
		$this->load->view('en/1-admin/layout/_layout_main', $this->data);
	}

	/**
	 *	Description: Activates/deactivates a course
	 */
	public function active(){
		//Checks if a form has been submited
		if($this->input->post('submit')){
			// Process form
			$id=$this->input->post('course_id');
			$data=array('approved' => $this->input->post('approved'));
			//Saving to database
			$this->course_m->save($data,$id);
			//Setting success message and redirecting the user
			$this->session->set_flashdata('message', $this->lang->line('catefory_info_active'));
			redirect($this->data['language'].'/admin/course/activate', 'refresh');
		}
	}
	public function delete($id){
		if($this->user_m->admin_permission()){
			$this->course_m->delete($id);
			$this->lesson_m->delete_where($id, 'course_id');
			$this->db->where('type',2);
			$result=$this->notification_m->get_by('lesson',$id,true);
			if($result){
				$this->notification_m->delete($result->note_id);
			}
			$this->session->set_flashdata('message', $this->lang->line('info_course_delete_success'));
			redirect($this->data['language'].'/admin/course/');
		}
		else{
			//setting up error message and redirecting the user
			$this->session->set_flashdata('message', $this->lang->line('error_flash_no_permission'));
			redirect($this->data['language'].'/admin/course/', 'refresh');
		}
	}
}
?>