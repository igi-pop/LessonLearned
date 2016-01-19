<?php

class Course extends Frontend_Controller{

	public function __construct(){
			parent::__construct();
			$this->session->set_userdata('language', 'english');
			$this->data['language']=$this->data['language']='en';
			$this->load->helper('captcha');
		
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
			$this->data['language']='en';
	}


	//Unused redirects to select function
	public function index($slug=NULL){
		$this->data['navigation_category_active']= true;
		redirect($this->data['language'].'/user/course/select');
		//DATA to be sent into views
			$this->data['course_slug']=$slug;
		//Get all categories for populating the sidebar
			$categories=$this->category_m->get_all();
			$this->data['sidebar_data'] = $categories;
		//Get the specific category thats located in the URL
			$category=$this->category_m->get_by_slug($slug);
			$this->data['main_view_data'] = $category;
			// $this->uri->segment(5); this is the CSS-3(category slug session)
		//Get all the courses with the category_id
			//$this->data['course_data'] =$this->course_m->get_by_category($category->category_id);



		$field= array('category_id'=> $category->category_id);
		$config = array();
        $config["base_url"] = base_url() . "/".$this->data['language']."/user/course/index/".$slug;
        $config["total_rows"] = $this->course_m->record_count($field,'courses');
        $config['num_links'] = 3;
        $config["per_page"] = 2;
        $config["uri_segment"] = 7;
        
        // Configuring styles for pagination (Located in '/library/My_pagination')
        foreach($this->my_pagination->set_style() as $key => $value)
        	$config[$key] =$value;

		$this->pagination->initialize($config);
		 $this->data["course_data"]=' ';
		$page = ($this->uri->segment(7)) ? $this->uri->segment(7) : 0;
		//THIS IS THE DATA THAT I NEED TP LINK TO THE LESSONS
        $this->data["course_data"] = $this->course_m->fetch_limit($config["per_page"], $page, $field, 'courses');
        $this->data["links"] = $this->pagination->create_links();

		if($slug!=NULL){
		$this->data['main_view'] = '/en/3-user/components/views/main_course';}
		else{
		$this->data['main_view'] = '/en/3-user/components/views/category';}
		
		$user_language = $this->session->userdata('language');
		$this->lang->load('frontpage_navigation_'.$user_language, $user_language);
		$this->load->view('en/3-user/layout/_layout_course', $this->data);
			
	}

	/**
	* 	Description: Allows user to select a course they would like to view
	 *				 If the category slug is NULL it will display all courses
	 *	@param 	string 	slug(Category slu previusly selecteted from the category menu)
	 *	@param 	string  difficulty (Select what kind of courses is the user going to view default is all)
	 */
	public function select($slug=NULL, $difficulty='all'){
		$this->data['view_all_data'] = false;
		$this->data['navigation_category_active']= true;
		//DATA to be sent into views
		//Get all categories for populating the sidebar
			$categories=$this->category_m->get_all();
			$this->data['sidebar_data'] = $categories;
		//Get the specific category thats located in the URL
			$category=$this->category_m->get_by_slug($slug, false);
			$this->data['main_view_data'] = $category;
		//Get all the courses with the category_id
			//$this->data['course_data'] =$this->course_m->get_by_category($category->category_id);
		$diff=$this->difficulty_m->get_by_slug($difficulty);

	 if($category !=NULL){
		if($difficulty=='all' ){
			$field= array('category_id'=> $category->category_id, 'approved' => '1');
		}
		else{
			if($diff != NULL){
			$field= array('category_id'=> $category->category_id, 'approved' => '1', 'difficulty_id' => $diff[0]->difficulty_id);
			}
			else{
			$diff=$this->difficulty_m->get_by_slug('all');
			$field= array('category_id'=> $category->category_id, 'approved' => '1', 'difficulty_id' => $diff[0]->difficulty_id);
			}
		}


		//--- Start of pagination 
		//Configuration files for pagination
		$config = array();
        $config["base_url"] = base_url() . "/".$this->data['language']."/user/course/select/".$slug."/".$difficulty;
        $config["total_rows"] = $this->course_m->record_count($field,'courses');
        $config['num_links'] = 3;
        $config["per_page"] = 2;
        $config["uri_segment"] = 7;
        
        // Configuring styles for pagination (Located in '/library/MY_PAgination')
        foreach($this->my_pagination->set_style() as $key => $value)
        	$config[$key] =$value;

		$this->pagination->initialize($config);
		$this->data["course_data"]=' ';
		//Getting page number from the url
		$page = ($this->uri->segment(7)) ? $this->uri->segment(7) : 0;
        $this->data["course_data"]  = $this->course_m->fetch_limit($config["per_page"], $page, $field, 'courses');
        //creating pagination links
        $this->data["links"] = $this->pagination->create_links();
        //--- End of pagination

        $this->data['main_view_formated'] = $this->course_m->create_course_list($this->data["course_data"] );
 		$base_url = base_url() . $this->data['language']."/user/course/select/";
        $this->data["difficulty_links"]=$this->difficulty_m->create_difficulty_links($base_url, $slug, $difficulty);
        $this->data['main_view'] = '/en/3-user/components/views/main_course';
	    }
	    else{
	    	$this->data['view_all_data'] = true;
		    if($difficulty=='all' ){
				$field= array( 'approved' => '1');
			}
			else{
				if($diff != NULL){
				$field= array('category_id'=> $category->category_id, 'approved' => '1', 'difficulty_id' => $diff[0]->difficulty_id);
				}
				else{
				$diff=$this->difficulty_m->get_by_slug('all');
				$field= array('category_id'=> $category->category_id, 'approved' => '1', 'difficulty_id' => $diff[0]->difficulty_id);
				}
			}


			//--- Start of pagination 
			//Configuration files for pagination
			$config = array();
	        $config["base_url"] = base_url() . "/".$this->data['language']."/user/course/select/".$slug."/".$difficulty;
	        $config["total_rows"] = $this->course_m->record_count($field,'courses');
	        $config['num_links'] = 3;
	        $config["per_page"] = 2;
	        $config["uri_segment"] = 7;
	        
	        // Configuring styles for pagination (Located in '/library/MY_PAgination')
	        foreach($this->my_pagination->set_style() as $key => $value)
	        	$config[$key] =$value;

			$this->pagination->initialize($config);
			$this->data["course_data"]=' ';
			//Getting page number from the url
			$page = ($this->uri->segment(7)) ? $this->uri->segment(7) : 0;
	        $this->data["course_data"]  = $this->course_m->fetch_limit($config["per_page"], $page, $field, 'courses');
	        //creating pagination links
	        $this->data["links"] = $this->pagination->create_links();
	        //--- End of pagination

	        $this->data['main_view_formated'] = $this->course_m->create_course_list($this->data["course_data"], $this->data['language'] );
	 		$base_url = base_url() . $this->data['language']."/user/course/select/";
	        $this->data["difficulty_links"]=$this->difficulty_m->create_difficulty_links($base_url, $slug, $difficulty);
	        $this->data['main_view'] = '/en/3-user/components/views/main_course';
	    }
	        
	        	//$this->data['main_view']='/en/0-components/404';
	       
	
		/**-------------------------------------------------------TESTING VARIABLE----------------------------------------*/
		//$this->data['main_view_data1']=    $this->data["difficulty_links"];
		/**-------------------------------------------------------TESTING VARIABLE----------------------------------------*/
		//Load view
		$this->load->view('en/3-user/layout/_layout_course', $this->data);
	}

	public function lesson($course_slug=NULL, $lesson_slug=NULL, $comments=null, $thread=null){
		//Creating deafult values for variables
		//Sets the active elements in the navigation
		$this->data['navigation_category_active']= true;
		//Checks if an error page sould be shown
		$this->data['error404']=false;
		$this->data['lesson_404']=false;
		$this->data['lesson_null']=false;
		$valid_course_lesson=false;
		//checks if the comments page is shown
		$this->data['thread_null']=true;
		$this->data['check_url']=$thread;
		$this->data['comments_null']=false;
		//Defaulting variables
		$this->data["sidebar_title"] = '';
		$this->data["main_links"] = NULL;
		$this->data["large_links"]='';
		if($lesson_temp=$this->lesson_m->get_by_slug($lesson_slug) AND $course_temp=$this->course_m->get_by_slug($course_slug)){
			$valid_course_lesson=$this->course_m->check_lesson_in_course($course_temp->course_id, $lesson_temp->lesson_id);
		}

		  //------START--------LOADING DATA--------------------
		if($course_slug!=NULL AND $this->course_m->get_by_slug($course_slug) )
		{
			//Loading from User_m, Category_m, Course_m, Lesson_m, Block_m
			// First get the course details and put them in "$this_course"
				$this_course = $this->course_m->get_by_slug($course_slug);
			// Extract "course_id" to get the course category details and put them in "$category"
				$category 	 = $this->category_m->get_by_id($this_course->category_id);
		if($this->category_m->get_by_id($this_course->category_id) ){
				$fields=array('course_id'=>$this_course->course_id, 'approved' => 1);
				
				$all_lessons = $this->lesson_m->get_by($fields, false);	// All related lessons(Used for the sidebar)
				$this->data['course_slug']=$category->cat_slug;
			//Extract "lesson" from the lesson_slug
				$lesson 	 = $this->lesson_m->get_by_slug($lesson_slug);		// Current lesson
				if($lesson) $this->data['lesson_id']=$lesson->lesson_id;
				if($lesson == false OR $valid_course_lesson == false){$this->data['lesson_404']=true;}
				if($lesson_slug ==  NULL){$this->data['lesson_null']=true;}
				if($comments ==  NULL){$this->data['comments_null']=true; $this->data['tab_lesson_active']= true;}
				if($comments == "comments"){$this->data['tab_comments_active']= true;}
			//Extract all blocks from a specific lesson
				if($lesson != NULL )
					$all_blocks = $this->block_m->get_by_id('block_group',$lesson->lesson_id);
				// Prepare and format the blocks for the view
				if(isset($all_blocks) )
					$this->data['lesson'] = $this->block_m->block_format($all_blocks);
			//Extract all comments in a specific lesson
				if($lesson != NULL ){
					//============================ START  Comments section   ============================================
					if($thread != null){
						$array=array('comments_id' => $thread,
									 'reply_id'	 => null,
									 'lesson_id' => $lesson->lesson_id,
									);
						//Getting all comment threads
						$this->data['all_threads']=$this->comment_m->get_by($array, false);
					}
					else{
						$all_comments = $this->comment_m->all_lesson_comments($lesson->lesson_id);
						$this->data['all_threads']= $this->comment_m->all_threads($lesson->lesson_id);
					}
					if($this->data['all_threads'] != NULL ){
						$i=0;
						$this->data['thread_null']=false;
						foreach($this->data['all_threads'] as $comment){
							$all_threads[$i]=$this->comment_m->detailed_comment($comment->comments_id);
							$this->data['all_threads'][$i] =$all_threads[$i][0];
							$i++;
						}	
					}
					//============================ END  Comments section   ============================================
				}
			// Get User information from the course "author_id"
				$user_data=$this->user_m->get_by_id('id',$this_course->author_id);
		  //-----END---------LOADING DATA-------------------

			//----------------------- BREADCRUMB VIEW INFORMATION
				if($lesson != NULL ){
				$this->data['breadcrumbz_category']=$category->category_name;
				$this->data['breadcrumbz_course_slug']=$this_course->c_slug;
				$this->data['breadcrumbz_course']=$this_course->title;
				$this->data['breadcrumbz_lesson_slug']=$lesson_slug;
				$this->data['breadcrumbz_lesson']=$lesson->lesson_name;	}
				else{
				$this->data['breadcrumbz_category']=$category->category_name;
				$this->data['breadcrumbz_course_slug']=$this_course->c_slug;
				$this->data['breadcrumbz_course']=$this_course->title;
				$this->data['breadcrumbz_lesson_slug']=null;
				$this->data['breadcrumbz_lesson']='Lesson';
				$this->data['breadcrumbz_lesson']='Unknown';
				}
			//----------------------- USER VIEW INFORMATION
				$this->data["first"]=$user_data->first_name;
				$this->data["last"]=$user_data->last_name;
				$this->data["username"]=$user_data->username;
				$this->data["thumb"]=$this->user_m->image_path($user_data);
				if($lesson != NULL ){
					$this->data['create']=$newDate = date("d M Y", strtotime($lesson->created));
				}else{
					$this->data['create']='dd mm yyyy';
				}
			//----------------------- SIDEBAR VIEW INFORMATION
				$this->data["sidebar_links"]="";
				$base_url = base_url() . $this->data['language']."/user/course/lesson/".$course_slug;		// Creating a base url 
				// Creating the links
				$this->data['all_lessons']=$all_lessons;
				foreach($all_lessons as $lesson){
					$activate='';
					if($lesson->lesson_slug === $lesson_slug ){
						$activate="current"; 
						$this->data["title"] =$lesson->lesson_name;	
					}
					$this->data["sidebar_title"] = $this_course->title;
					$this->data["sidebar_links"] .= "<li class=\"chapter-item lg-block_head card-nav-link ".$activate." \"><a href=\"$base_url/".$lesson->lesson_slug."\">".$lesson->lesson_name."</a>";
					$this->data["large_links"] .='<div class="col-lg-10 challenges-list" style="margin:5px;">
											      	 <div class="challenges-list-view mdB" style="clear:both" >
											         <div id="contest-challenges-problem" class="content--list track_content ">
											           <div class=" row">
											            <section class="col-lg-12" style="">
											                <h4 class="challengecard-title  " >
											                <a href="'.$base_url.'/'.$lesson->lesson_slug.'" class="backbone title-link" >'.$lesson->lesson_name.'</a>';   
											                switch($lesson->language_id){
											                	case 1:
											                		$this->data["large_links"] .= ' <span style="float:right;"> '.$this->lang->line('nav_language_english').'<img style="width:30px;height:20px;margin-left:15px;" src="'.site_url("/images/icons/Flag_of_the_United_Kingdom.png").'" alt="" /> </span>';
											                	break;
											                	case 2:
											                		$this->data["large_links"] .= ' <span style="float:right;"> '.$this->lang->line('nav_language_serbian').'<img style="width:30px;height:20px;margin-left:15px;" src="'.site_url("/images/icons/Flag_of_Serbia.png").'" alt="" /> </span>';
											                	break;
											                	default:
											                		 $this->data["large_links"] .=' <span style="float:right;"> '.$this->lang->line('nav_language_english').'<img style="width:30px;height:20px;margin-left:15px;" src="'.site_url("/images/icons/Flag_of_the_United_Kingdom.png").'" alt="" /> </span>';
											                	break;
											                }
											               
											                $this->data["large_links"] .='</h4>

											            </section> 
											           </div>
											    	 </div>
											      	</div>
													</div>';
					}
				
				if($lesson_slug ==  NULL ){
					$this->data["main_title"] 		= 'Buahaha';
					$this->data["main_links"] 		= $this->data["sidebar_links"];
					$this->data["all_large_links"]	= $this->data["large_links"];
					$this->data["sidebar_links"]  	= '';
					$this->data["sidebar_title"] 	='';
				}
			}//Category is equil to null aka we could find the
			else{
				$this->data['error404']=true;
			}
		}else{
			//course is not selected
			$this->data['error404']=true;
		}




		//==============================================   FORMS   =================================================
		//check if a form is sent
		if($this->input->post('reply_active') or $this->input->post('discussion_active')){
			//form validation for comments
				$rules = $this->comment_m->rules_comment;
				$this->form_validation->set_rules($rules);
			// Process the form for comments
			if ($this->form_validation->run() == TRUE) {
				//save and redirect the user
				$this->comment_m->input_comment();
				redirect($this->data['language'].'/user/course/lesson/'.$course_slug.'/'.$lesson_slug.'/comments/');
			}
		}

		if($this->input->post('update_active')){

			//form validation for changing comments
			$rules = $this->comment_m->rules_comment;
			$this->form_validation->set_rules($rules);

			// Process the form
			if ($this->form_validation->run() == TRUE) {

				$this->comment_m->input_comment($this->input->post('comments_id'));
				redirect($this->data['language'].'/user/course/lesson/'.$course_slug.'/'.$lesson_slug.'/comments/');
			}
		}

		if($thread != null){
			//testing comments
			$array=array(
					'comments_id' => $thread,
					'reply_id'	 => null,
				);
			$check_comment=$this->comment_m->get_by($array, false);	
		}
		//==============================================   FORMS   =================================================
		//-----------------------------------TEST VARIABLE---------------------------------
			//$this->data['main_view_data1']= $valid_course_lesson;
		//-----------------------------------TEST VARIABLE---------------------------------

		// The view 
		$this->load->view('en/3-user/layout/_layout_lesson', $this->data);
	}

	public function comment($id)
	{

	}

	/**
	 *	Description: Deleting comments if the user is the author
	 */
	public function delete_comment($id, $course=null, $lesson=null){
		// Check if the comment belongs the user and if its like that delete it
		$comment=$this->comment_m->get($id, true);
		if($comment->user_id == $this->session->userdata('id')){
			$this->comment_m->delete_comment($id);
			redirect($this->data['language'].'/user/course/lesson/'.$course.'/'.$lesson.'/comments/');
		}
	}
}
?>