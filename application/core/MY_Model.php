<?php
class MY_Model extends CI_Model {
	
	protected $_table_name = '';
	protected $_primary_key = 'id';
	protected $_primary_filter = 'intval';
	protected $_order_by = '';
	public $rules = array();
	protected $_timestamps = FALSE;
	
	function __construct() {
		parent::__construct();
	}
	
	public function array_from_post($fields){
		$data = array();
		foreach ($fields as $field) {
			$data[$field] = $this->input->post($field);
		}
		return $data;
	}
	
	public function get($id = NULL, $single = FALSE){
		
		if ($id != NULL) {
			$filter = $this->_primary_filter;
			$id = $filter($id);
			$this->db->where($this->_primary_key, $id);
			$method = 'row';
		}
		elseif($single == TRUE) {
			$method = 'row';
		}
		else {
			$method = 'result';
		}
		
		if (!count($this->db->ar_orderby)) {
			$this->db->order_by($this->_order_by);
		}
		return $this->db->get($this->_table_name)->$method();
	}
	
	public function get_by($where, $single = FALSE){
		$this->db->where($where);
		return $this->get(NULL, $single);
	}
	
	public function save($data, $id = NULL){
		
		// Set timestamps
		if ($this->_timestamps == TRUE) {
			$now = date('Y-m-d H:i:s');
			$id || $data['created'] = $now;
			$data['modified'] = $now;
		}
		
		// Insert
		if ($id === NULL) {
			!isset($data[$this->_primary_key]) || $data[$this->_primary_key] = NULL;
			$this->db->set($data);
			$this->db->insert($this->_table_name);
			$id = $this->db->insert_id();
		}
		// Update
		else {
			$filter = $this->_primary_filter;
			$id = $filter($id);
			$this->db->set($data);
			$this->db->where($this->_primary_key, $id);
			$this->db->update($this->_table_name);
		}
		
		return $id;
	}
	
	public function delete($id){
		$filter = $this->_primary_filter;
		$id = $filter($id);
		
		if (!$id) {
			return FALSE;
		}
		$this->db->where($this->_primary_key, $id);
		$this->db->limit(1);
		$this->db->delete($this->_table_name);
	}
	public function delete_where($id, $where){
		$filter = $this->_primary_filter;
		$id = $filter($id);
		
		if (!$id) {
			return FALSE;
		}
		$this->db->where($where, $id);
		$this->db->limit(1);
		$this->db->delete($this->_table_name);
	}


	//specific gets

	public function get_by_slug($array, $bool=true){
		if( $array!=NULL){	
			$result = $this->get_by($array, $bool);
			return($result);
		}
		return false;
	}
	public function get_by_id($array, $bool=false){
		if( $array!=NULL){	
			$result = $this->get_by($array, $bool);
			return($result);
		}
		return false;
	}


	public function record_count($field=null, $match=null, $reel=null) {
		if($match != NULL AND $reel== null)
		{
			$this->db->like('username', $match);
			$this->db->or_like('email', $match); 
		}
        if($field !=null){
        foreach($field as $key => $value )
        	$this->db->like($key, $value);
    	}



		$this->db->from($this->_table_name);
		return $this->db->count_all_results();
    }

    public function fetch_limit($limit, $start, $field=null, $match=null, $reel=null) {
        $this->db->limit($limit, $start);
        if($match != NULL AND  $reel== null)
		{
			$this->db->like('username', $match);
			$this->db->or_like('email', $match); 
		}

         if($field != null AND  $reel === true){
        foreach($field as $key => $value )
        	$this->db->like($key, $value);
    	}
        $query = $this->db->get($this->_table_name);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }

   public function count_pagination_records($table=null, $search_haystack=null, $search_needle=null, $multi_tables=null){
   		/*-- First we make a default value for a table we are searching in --*/
   		if($table== null){
   			$table=$this->_table_name;
   				//$this->db->where('title', 'php');
   		}
   		/*--- First we devide the where from like ---*/
   		/*--- If the $like_or_where is "true" we will use the like statement ---*/
	   
		foreach($multi_tables as $single_table){
			switch($single_table){
				/*--- The main table is "courses" and te secondery is "category"---*/
			case 'category-courses':
				$this->db->select('courses.*, courses.pub_date as course_date, category.pub_date as category_date, courses.description as course_description, courses.approved as course_approved');
				$this->db->join('courses', 'category.category_id = courses.category_id', 'left');
			break;
				/*--- The main table is "category" and te secondery is "courses"---*/
			case 'courses-category':
				$this->db->select('category.*, courses.pub_date as course_date, category.pub_date as category_date, courses.description as course_description, courses.approved as course_approved');
				$this->db->join('category', 'category.category_id = courses.category_id', 'left');
			break;
				/*--- The main table is "users" and te secondery is "courses"---*/
			case 'users-courses':
				$this->db->select('users.username, courses.pub_date as course_date, courses.description as course_description, courses.approved as course_approved');
				$this->db->join('courses', 'users.id = courses.author_id', 'left');
			break;
				/*--- The main table is "courses" and te secondery is "users"---*/
			case 'courses-users':
				$this->db->select('courses.*, courses.pub_date as course_date, users.*, courses.description as course_description, courses.approved as course_approved');
				$this->db->join('users', 'users.id = courses.author_id', 'left');
			break;
				/*--- The main table is "courses" and te secondery is "lessons"---*/
			case 'courses-lessons':
				$this->db->select('courses.*, courses.pub_date as course_date, lessons.*, courses.description as course_description, courses.approved as course_approved, lessons.approved as lesson_approved,');
				$this->db->join('lessons', 'lessons.course_id = courses.course_id', 'left');
			break;
				/*--- The main table is "lessons" and te secondery is "courses"---*/
			case 'lessons-courses':
				$this->db->select('courses.*, courses.pub_date as course_date, lessons.*, courses.description as course_description, courses.approved as course_approved, lessons.approved as lesson_approved,');
				$this->db->join('courses', 'lessons.course_id = courses.course_id', 'left');
			break;
			case 'lessons-language':
				$this->db->join('language', 'lessons.language_id = language.lang_id', 'left');
				$this->db->select('language.*');
			break;
			

			default:
			break;
			}

		}

	   /*--- Searching for specific data ---*/
   		if($search_haystack != NULL AND $search_needle != null){
   			if(is_array($search_haystack)){
   				$first=true;
   				foreach($search_haystack as  $field ){
   					if($first===true){
   					$first=false;
        			$this->db->like($field, $search_needle);
        			}else{
        				$this->db->or_like($field, $search_needle);
        			}
    			}
   			}else{
   				$this->db->like($search_haystack, $search_needle);
   			}
		}
		
		

		return $this->db->count_all_results($table);

   }

   public function fetch_pagination_records($limit, $start , $table=null , $like_or_where=true ,$search_haystack=null, $search_needle=null, $multi_tables=null){
   		$this->db->limit($limit, $start);
   		/*-- First we make a default value for a table we are searching in --*/
   		if($table == null){
   			$table=$this->_table_name;
   		}

	    /*--- Searching for specific data ---*/
   		if($search_haystack != NULL AND $search_needle != null){
   			if(is_array($search_haystack)){
   				$first=true;
   				foreach($search_haystack as  $field ){
   					if($first===true){
   					$first=false;
        			$this->db->like($field, $search_needle);
        			}else{
        				$this->db->or_like($field, $search_needle);
        			}
    			}
   			}else{
   				$this->db->like($search_haystack, $search_needle);
   			}
		}

		$this->db->from($this->_table_name);
		/*-- Joining tables --*/
		foreach($multi_tables as $single_table){
			switch($single_table){
				/*--- The main table is "courses" and te secondery is "category"---*/
			case 'category-courses':
				$this->db->select('courses.*, courses.pub_date as course_date, category.pub_date as category_date, courses.description as course_description,  courses.approved as course_approved');
				$this->db->join('courses', 'category.category_id = courses.category_id', 'left');
			break;
				/*--- The main table is "category" and te secondery is "courses"---*/
			case 'courses-category':
				$this->db->select('category.*, courses.pub_date as course_date, category.pub_date as category_date, courses.description as course_description,  courses.approved as course_approved');
				$this->db->join('category', 'category.category_id = courses.category_id', 'left');
			break;
				/*--- The main table is "users" and te secondery is "courses"---*/
			case 'users-courses':
				$this->db->select('users.username, courses.pub_date as course_date, courses.description as course_description ,  courses.approved as course_approved');
				$this->db->join('courses', 'users.id = courses.author_id', 'left');
			break;
				/*--- The main table is "courses" and te secondery is "users"---*/
			case 'courses-users':
				$this->db->select('courses.*, courses.pub_date as course_date, users.*, courses.description as course_description,  courses.approved as course_approved');
				$this->db->join('users', 'users.id = courses.author_id', 'left');
			break;
				/*--- The main table is "courses" and te secondery is "lessons"---*/
			case 'courses-lessons':
				$this->db->select('courses.*, courses.pub_date as course_date, lessons.*, courses.description as course_description,  courses.approved as course_approved, lessons.approved as lesson_approved,');
				$this->db->join('lessons', 'lessons.course_id = courses.course_id', 'left');
			break;
				/*--- The main table is "lessons" and te secondery is "courses"---*/
			case 'lessons-courses':
				$this->db->select('courses.*, courses.pub_date as course_date, lessons.*, courses.description as course_description,  courses.approved as course_approved, lessons.approved as lesson_approved,');
				$this->db->join('courses', 'lessons.course_id = courses.course_id', 'left');
			break;
			case 'lessons-language':
				$this->db->join('language', 'lessons.language_id = language.lang_id', 'left');
				$this->db->select('language.*');
			break;

			default:
			break;
			}

		}
		$query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            //Returning results
            return $data;
        }
        return false;
   }

   public function counting_stars($fields=NULL,$table, $multi_tables=null){
   	 $scenario= array(
   	 	"total"			=> 'skip',
   	 	"active"		=> 'positive',
   	 	"develop"		=> 'negative',
   	 	);

   	 foreach($scenario as $param => $result){
   	 	foreach($fields as $field => $value){
	   	 	
	   	 	if($result =='skip'){
	   	 		$this->db->where($field, $value);	
	   	 	}elseif($result =='negative' ){
	   	 		$this->db->where($field, $value);
	   	 		$this->db->where('approved', 0);

	   	 		$this->db->or_where('approved', NULL);
	   	 		$this->db->where($field, $value);
	   	 	}elseif($result =='positive'){
	   	 		$this->db->where($field, $value);
	   	 		$this->db->where('approved', 1);
	   	 	}else{}
   	 	}
   	 $data[$param]=$this->db->count_all_results($table);
   	 }
   	 
   	  return($data);
   }


}