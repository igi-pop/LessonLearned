<?php
class Lesson_m extends MY_Model
{

	protected $_table_name = 'lessons';
	protected $_order_by = 'lesson_name asc';
	protected $_timestamps = TRUE;
	protected $_primary_key = 'lesson_id';
	
	public $rules_create_lesson = array(
		'lesson_name' => array(
			'field' => 'lesson_name', 
			'label' => 'Lesson name', 
			'rules' => 'trim|required|xss_clean'
		), 
		'lesson_slug' => array(
			'field' => 'lesson_slug', 
			'label' => 'Lesson slug', 
			'rules' => 'trim|required|url_title|xss_clean'
		), 
		'language_id' => array(
			'field' => 'language_id', 
			'label' => 'Language ', 
			'rules' => 'trim|required'
		)
	);

 	// Description: Creates new user object
    public function get_new(){
        $lesson = new stdClass();
        $lesson->lesson_name = '';
        $lesson->lesson_slug = '';
        $lesson->pub_date = '';
        
        return $lesson;
    }

    /**
    *	Description: Standard get_by search for lessons
     *	@param string 	$column (The coulumn we want to check)
     *	@param any 		id 		(The value of the column we are checking)
     *
     * 	@return Array of objects 
     */
    public function get_by_id($column, $id){
		$lesson_array=array($column => $id);
		$result=parent::get_by_id($lesson_array, false);
		return ($result);
	}

	/**
    *	Description: Standard get by a specific lesson_slug
     *	@param string $lesson (The slug we are looking for)
     *
     *	@return Objects
     */
	public function get_by_slug($lesson){
		$lesson_array=array('lesson_slug' => $lesson);
		$result=parent::get_by_slug($lesson_array,TRuE);
		return ($result);
	}
	
	/**
    *	Description: Standard get all lessons by a specific course_id
     *	@param int 	$course(The course_id)
     *
     *	@return Array of objects
     */
	public function get_by_course($course){
		if( $course!=NULL){	
			$lesson = $this->get_by(array(
				'course_id' => $course,
			), FALSE);
			return($lesson);
		}
		return false;
	}

	/**
    *	Description: Gets a information about a lesson, the course it belongs too and checks if the current user is its author
     *	@param int $lesson_id(The lesson id we are checking)
     *
     *	@return Array of objects 
     */
	public function check_lesson($lesson_id){
		$this->db->select();
		$this->db->from('lessons');
		$this->db->join('courses', 'courses.course_id = lessons.course_id','left');
		$this->db->where('courses.author_id', $this->session->userdata('id'));
		$this->db->where('lessons.lesson_id', $lesson_id);
		$query = $this->db->get()->result();
		return($query);
	}

	/**
    *	Description: Get specific information about a lesson, its course, the category of the course and the author
     * 				 who made it. It also orders the results.
     *	@param int $order (In what order we want the results to be)
     *	@param string $type(what type of ordering we want "ascending"/"descending")
     *
     * 	@return Array of objects
     */
	public function get_joined_by_user($order=NUll, $type="asc"){
		$id=$this->session->userdata('id');
		$this->db->select(' courses.author_id, 
							courses.title as course, 
							category_name as category, 
							category.category_id, 
							courses.course_id, 
							lessons.lesson_id, 
							lesson_name, 
							lessons.modified as modified, 
							lessons.approved,');
		$this->db->from('courses');
		$this->db->where('courses.author_id', $id); 
		$this->db->join('lessons', 'courses.course_id = lessons.course_id','left');
		$this->db->join('category', 'category.category_id = courses.category_id', 'inner');
		if($type != 'asc' AND $type!='desc')
		{
			$type='asc';
		}
		switch($order){

			case 1:
				$this->db->order_by('category', $type);
				$this->db->order_by('course', $type);
				$this->db->order_by('lesson_name', $type);
				break;
			case 2:
				$this->db->order_by('course', $type);
				$this->db->order_by('lesson_name', $type);
				break;
			case 3:
				$this->db->order_by('lesson_name', $type);
				$this->db->order_by('modified', $type);
				$this->db->order_by('course', $type);
				break;
			case 4:
				$this->db->order_by('modified', $type);
				$this->db->order_by('category', $type);
				$this->db->order_by('course', $type);
				break;		
			case 5:
				$this->db->order_by('approved', $type);
				$this->db->order_by('category', $type);
				$this->db->order_by('course', $type);
				$this->db->order_by('lesson_name', $type);
				$this->db->order_by('modified', $type);
				break;
			default:
				$this->db->order_by('category', $type);
				$this->db->order_by('course', $type);
				$this->db->order_by('lesson_name', $type);

		}
		$this->db->order_by('category', 'asc');
		$this->db->order_by('course', 'asc');
		$this->db->order_by('lesson_name', 'asc');
		$query = $this->db->get()->result();
		return($query);
	}


	/**
    *	Description: A simple function taht approves lessons
     *	@param int $id(lesson_id)
     */
	public function approve($id){
    	$data['approve']=1;
    	$this->save($data, $id);
    }

    /**
    *	Description: A detailed information about courses and lessons
     *	@param int $lesson_id(Can be a lesson_id or a course id, but must be followed with the appropriate $type parameter)
     *	@param int $type (determins if we are looking for a course or a lesson type=1 is for lesson, and type=2 are for courses)
     *
     *  @return  Array of objects
     */
	public function get_all_information($lesson_id, $type){
		if($type==1){
		$this->db->select(' users.first_name, 
							users.last_name, 
							category_name as category, 
							category.category_id, 
							courses.course_id, 
							courses.title as course,
							courses.pub_date as course_created,
							courses.approved as course_a,   
							lessons.lesson_id, 
							lesson_name, 
							lessons.created as lesson_created,
							lessons.modified as lesson_modified,
							lessons.approved as lesson_a,
							');
		$this->db->from('lessons');
		$this->db->where('lessons.lesson_id', $lesson_id); 
		$this->db->join('courses', 'courses.course_id = lessons.course_id','left');
		$this->db->join('users', 'users.id = courses.author_id','inner');
		$this->db->join('category', 'category.category_id = courses.category_id', 'inner');
		$query = $this->db->get()->result();
		}
		elseif($type==2){
		$this->db->select('	 users.first_name,
							 users.last_name, 
							 courses.title as course, 
							 courses.approved as course_a,  
							 courses.course_id, 
							 courses.pub_date as course_created,
							 category_name as category, 
							 category.category_id');
		$this->db->from('courses');
		$this->db->where('courses.course_id', $lesson_id); 
		$this->db->join('users', 'users.id = courses.author_id','inner');
		$this->db->join('category', 'category.category_id = courses.category_id', 'inner');
		$query = $this->db->get()->result();
		}
		
		else{
		return(false);
		}
		
		return($query);
	}

	/**
    *	Description: Creates linkable table headers that order the table content(Developer lesson table)
     *	@param int $order(With waht colum we should order)
     *	@param string $type(What type of ordering we want "ascending/"descending")
     *
     *	@return String(formated table header links)
     */
	public function tabel_header($order=1, $type='asc', $language="en")	{	
		$links='';
		$cat_order='';
		$cor_order='';
		$les_order='';
		$mod_order='';
		$act_order='';
		switch($order){
			case 1:
			$cat_order='active';
			break;
			case 2:
			$cor_order='active';
			break;
			case 3:
			$les_order='active';
			break;
			case 4:
			$mod_order='active';
			break;
			case 5:
			$act_order='active';
			break;
			
			default:
			$cat_order='active';
		}
		$links.="<tr class=\"center\">";
		$links.= "<th class=\"center hidden-xs\" style=\"\"><a class=\" dark-limegreen-link\" href=\"".base_url(). $language."/developer/course/order/1/".$type."\" class=\"\">".$this->lang->line('lesson_m_table_category')."</a>";
		if($cat_order !=''){
			if($type=='desc'){
				$links.="&nbsp;<a class=\" dark-limegreen-link\" href=\"".base_url().$language."/developer/course/order/".$order."/asc\" class=\"\">";
				$links.="<i class=\"glyphicon glyphicon-chevron-down\">&nbsp;</i>";
				$links.="</a>";
			}else{
				$links.="&nbsp;<a class=\" dark-limegreen-link\" href=\"".base_url().$language."/developer/course/order/".$order."/desc\" class=\"\">";
				$links.="<i class=\"glyphicon glyphicon-chevron-up\"></i>";
			$links.="</a>";
			}

		}  
		$links.= "</th>";

		$links.= "<th class=\"center\" ><a class=\" dark-limegreen-link\" href=\"".base_url().$language."/developer/course/order/2/".$type."\" class=\"\">".$this->lang->line('lesson_m_table_course')."</a> ";
		if($cor_order !=''){
			if($type=='desc'){
				$links.="<a class=\" dark-limegreen-link\" href=\"".base_url().$language."/developer/course/order/".$order."/asc\" class=\"\">";
				$links.= 	"<i class=\"glyphicon glyphicon-chevron-down\"></i>";
				$links.="	</a>";
			}else{
				$links.="	<a class=\" dark-limegreen-link\" href=\"".base_url().$language."/developer/course/order/".$order."/desc\" class=\"\">";
				$links.= 	"<i class=\"glyphicon glyphicon-chevron-up\"></i>";
				$links.="</a>";
			}

		}  
		$links.= "</th>";
		$links.= "<th class=\"center\"><a class=\" dark-limegreen-link\" href=\"".base_url().$language."/developer/course/order/3/".$type."\" class=\"\">".$this->lang->line('lesson_m_table_lesson')."</a> ";
		if($les_order !=''){
			if($type=='desc'){
				$links.="	<a class=\" dark-limegreen-link\" href=\"".base_url().$language."/developer/course/order/".$order."/asc\" class=\"\">";
				$links.= 	"<i class=\"glyphicon glyphicon-chevron-down\"></i>";
				$links.="	</a>";
			}else{
				$links.="	<a class=\" dark-limegreen-link\" href=\"".base_url().$language."/developer/course/order/".$order."/desc\" class=\"\">";
				$links.= 	"<i class=\"glyphicon glyphicon-chevron-up\"></i>";
				$links.="</a>";
			}

		}  
		$links.= "</th>";
		
		$links.= "<th class=\"center hidden-xs\"><a class=\" dark-limegreen-link\" href=\"".base_url().$language."/developer/course/order/4/".$type."\" class=\"\">".$this->lang->line('block_m_table_modified')."</a> ";
		if($mod_order !=''){
			if($type=='desc'){
				$links.="	<a class=\" dark-limegreen-link\" href=\"".base_url().$language."/developer/course/order/".$order."/asc\" class=\"\">";
				$links.= 	"<i class=\"glyphicon glyphicon-chevron-down\"></i>";
				$links.="	</a>";
			}else{
				$links.="	<a class=\" dark-limegreen-link\" href=\"".base_url().$language."/developer/course/order/".$order."/desc\" class=\"\">";
				$links.= 	"<i class=\"glyphicon glyphicon-chevron-up\"></i>";
				$links.="</a>";
			}
		}  
		$links.= "</th>";
		$links.= "<th class=\"center hidden-xs \"><a class=\" dark-limegreen-link\" href=\"".base_url().$language."/developer/course/order/5/".$type."\" >".$this->lang->line('block_m_table_active')."</a> ";
		if($act_order !=''){
			if($type=='desc'){
				$links.="	<a class=\" dark-limegreen-link\" href=\"".base_url().$language."/developer/course/order/".$order."/asc\" class=\"\">";
				$links.= 	"<i class=\"glyphicon glyphicon-chevron-down\"></i>";
				$links.="	</a>";
			}else{
				$links.="	<a class=\" dark-limegreen-link\" href=\"".base_url().$language."/developer/course/order/".$order."/desc\" class=\"\">";
				$links.= 	"<i class=\"glyphicon glyphicon-chevron-up\"></i>";
				$links.="</a>";
			}
		}  
		$links.= "</th>";
		$links.= "
				<th class=\"center\">".$this->lang->line('block_m_table_tools')."</th>
				<th class=\"center hidden\">".$this->lang->line('block_m_table_approve')."</th>
			</tr>";


		return($links);
	}
}
?>