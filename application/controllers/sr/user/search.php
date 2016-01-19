<?php

class Search extends Frontend_Controller{

	public function __construct(){
			parent::__construct();
			$this->session->set_userdata('language', 'serbian');
			$this->data['language']=$this->data['language']='sr';
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
		
		}


/**
 *	All = all fields are filled
 *	1	= Author field is checked
 *  2	= Course field is checked
 *  3	= Author and Course field are checked
 *  4	= Lesson Field is checked
 *  5	= Lesson and Author fields are checked
 *  6	= Course and lesson fields are checked
 * 	Any other input =  All fields selected
 */ 
	public function index($match='-', $fields='all', $page=null){
		$this->data['main_view12']='';
		
		if($match == "-" OR $match == NULL)
			$this->data['did_we_search']=false;
		else{
			$this->data['did_we_search']=true;
		}
		switch($fields){
                case "author":
                	$this->data['checkbox_checking'][1]=true;
                	$this->data['checkbox_checking'][2]=false;
                	$this->data['checkbox_checking'][4]=false;
                    break;
                case "course":
                	$this->data['checkbox_checking'][1]=false;
                    $this->data['checkbox_checking'][2]=true;
                	$this->data['checkbox_checking'][4]=false;
                    
                    break;
                case "author-course":
                	$this->data['checkbox_checking'][1]=true;
                    $this->data['checkbox_checking'][2]=true;
                	$this->data['checkbox_checking'][4]=false;
                    
                    break;
                case "lesson":
                	$this->data['checkbox_checking'][1]=false;
                    $this->data['checkbox_checking'][2]=false;
                	$this->data['checkbox_checking'][4]=true;
                    
                    break;
                case "author-lesson":
                	$this->data['checkbox_checking'][1]=true;
                    $this->data['checkbox_checking'][2]=false;
                	$this->data['checkbox_checking'][4]=true;
                    
                    break;
                case "course-lesson":
                	$this->data['checkbox_checking'][1]=false;
                    $this->data['checkbox_checking'][2]=true;
                	$this->data['checkbox_checking'][4]=true;
                    break;
                default:
                    $this->data['checkbox_checking'][1]=true;
                	$this->data['checkbox_checking'][2]=true;
                	$this->data['checkbox_checking'][4]=true;
                    
                break;
        }
        // end of fields
        if($this->input->post('search_mini_button') == true){
				$filter_slug="all";
				redirect($this->data['language'].'/user/search/index/'.seoUrl($this->input->post('search')).'/'.$filter_slug.'/'.$page, 'refresh');
			}
		$property = $this->input->post('checkbox_group');
			//$this->data['main_view12']=$property;
		$total=0;
		$filter_slug='';
		if($this->input->post('search')){
			$this->data['did_we_search']=true;
			$match=seoUrl($this->input->post('search'));
			if($property)
			foreach($property as $value){
				$total+=$value;
			}

			switch($total){
				case 1:
				$filter_slug="author";
					break;
				case 2:
				$filter_slug="course";
					break;
				case 3:
				$filter_slug="author-course";
					break;
				case 4:
				$filter_slug="lesson";
					break;
				case 5:
				$filter_slug="author-lesson";
					break;
				case 6:
				$filter_slug="course-lesson";
					break;
				default:
					$filter_slug="all";
				break;
			}
			
			redirect($this->data['language'].'/user/search/index/'.seoUrl($this->input->post('search')).'/'.$filter_slug.'/'.$page, 'refresh');
		}
		
		//-------------------- Configuring the Pagination ----------------------
			$config = array();
	        $config["base_url"] = base_url() . $this->data['language']."/user/search/index/".$match.'/'.$fields;
		        //Defaulting the match parameter
		        if($match=='-')
					$match=NULL;
	        $this->data['main_view12'] = $config["total_rows"] = $this->course_m->search_count( decodeseoUrl($match), $fields);
	        $config['num_links'] = 3;
	        $config["per_page"] = 10;
	        $config["uri_segment"] = 7;
	        

	        // Configuring styles for pagination (Located in '/library/MY_PAgination')
	        foreach($this->my_pagination->set_style() as $key => $value)
	        	$config[$key] =$value;

	        


			$this->pagination->initialize($config);
			$this->data["course_data"]=' ';
			$page = ($this->uri->segment(7)) ? $this->uri->segment(7) : 0;
	        $this->data["course_data"] = $this->course_m->search_limit($config["per_page"], $page, decodeseoUrl($match), $fields);
	       
	        $this->data["page_links"] = $this->pagination->create_links();
       	//-------------------- Configuring the Pagination ----------------------
		
		//Search options
		if($this->input->post('match') != null) {
			//Redirecting to display the search results
			$match=$this->input->post('match');
			$match=seoUrl($this->input->post('match'));
			redirect($this->data['language'].'/user/search/index/'.$this->data['url'].$match.'/'.$fields, 'refresh') ;
		}

		$this->data['main_view12']=decodeseoURL($match);
		$this->data['main_view']= 'en/3-user/components/views/search/main_search_window';
		$this->load->view('en/3-user/layout/_layout_notification', $this->data);	
	}

} 
?>