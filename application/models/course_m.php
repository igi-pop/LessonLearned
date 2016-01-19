<?php
class Course_m extends MY_Model{

	
    protected $_table_name = 'courses';
	protected $_order_by = 'title asc, course_id desc';
	protected $_timestamps = false;
    protected $_primary_key = 'course_id';
	public $rules = array(
		'pubdate' => array(
			'field' => 'pubdate', 
			'label' => 'Publication date', 
			'rules' => 'trim|required|exact_length[10]|xss_clean'
		), 
		'title' => array(
			'field' => 'title', 
			'label' => 'Title', 
			'rules' => 'trim|required|max_length[100]|xss_clean'
		), 
		'slug' => array(
			'field' => 'slug', 
			'label' => 'Slug', 
			'rules' => 'trim|required|url_title|xss_clean'
		), 
	);
    //Default rules for courses
    public $rules_edit = array(
        'title' => array(
            'field' => 'title', 
            'label' => 'Title', 
            'rules' => 'trim|required|xss_clean'
        ), 
        'description' => array(
            'field' => 'description', 
            'label' => 'Desciption', 
            'rules' => 'trim|required|xss_clean'
        ), 
        'c_slug' => array(
            'field' => 'c_slug', 
            'label' => 'Course slug', 
            'rules' => 'trim|url_title||xss_clean|required'
        )
    );
//===============================================================   Getting data   =============================================================== 

    // Description: Creates new user object
    public function get_new(){
        $course = new stdClass();
        $course->c_slug = '';
        $course->title = '';
        $course->description = '';
        $course->created = '';
        

        return $course;
        }
    
    //Get all course items
    public function get_all(){
        $course=$this->get();
        return ($course);
    }

    /**
    *   Description: Get elements from course table by their id
     *  @param int      $id (course_id)
     *  @param boolean  $admin( determinds if we want all courses or just active courses)
     *
     *  @return Array of objects
     */
    public function get_by_id($id=NULL, $admin=false){
        if($admin==false){
            if( $id!=NULL){ 
                $category = $this->get_by(array(
                    'category_id' => $id,
                    'approved' => '1',
                ), false);
                return($category);
            }
            return false; 
        }else{
            if( $id!=NULL){ 
            $category = $this->get_by(array(
                'category_id' => $id,
            ), false);
            return($category);
        }
        return false; 
        }
    }

    /**
    *   Description: Better solution for get_by_id(Allows diverse types of id to be searched for)
     *  @param  string  $column (The column name we want to be searched)
     *  @param  int     $id(The id value)
     *
     *  @return Array of objects
     */
    public function get_by_ids($column, $id){
        $lesson_array=array($column => $id);
        $result=parent::get_by_id($lesson_array, false);
        return ($result);
    }

    /**
    *   Description: When we want to check if a course is part of a category
     *  @param int  $id (id  of the category)
     *  @param int  $course_id (Course_id we wnat to check)
     *
     *  @return Array of objects
     */
    public function get_by_cou_and_cat($id=NULL, $course_id){
        if( $id!=NULL){ 
            $category = $this->get_by(array(
                'category_id' => $id,
                'course_id'   => $course_id,
            ), false);
            return($category);
        }
        return false;  
    }

    /**
    *   Description: Getting courses by category_id(Approved only and Both)
     *  @param int      $category(Category_id)
     *  @param boolen   $approved(if its true it will display only approved courses)
     *
     *  @return Array of objects
     */
    public function get_by_category($category=NULL, $approved=true){
        if( $category!=NULL){   
            if($approved==true){$course = $this->get_by(array(
                'category_id' => $category,
                'approved' => 1,
            ), FALSE);
        }else{
            $course = $this->get_by(array(
                'category_id' => $category,
            ), FALSE);
        }
            return($course);
        }
        return false;
    }

    /**
    *   Description: get a specific course by its unique slug
     *  @param int  $course (Unique course slug)
     *
     *  @return Object
     */
    public function get_by_slug($course){
        if( $course!=NULL){ 
            $result = $this->get_by(array(
                'c_slug' => $course,
            ), TRUE);
            return($result);
        }
        return false;
    }

    /**
    *   Description: Get all courses by an Author or by an Author AND a specific Category
     *  @param int $user (User_id)
     *  @param int $category (optional)(Category_id)
     *
     *  @return Array of objects
     */
    public function get_all_by_author($category=null, $user){
        if($category== null){
             $this->db->where(array(
                'author_id'   => $user,
            ));
         }else{
             $this->db->where(array(
                'category_id' => $category,
                'author_id'   => $user,
            ));
         }
        $result= $this->db->get('courses')->result();
        return($result);   
    }
    //===============================================================   Counting/Limiting data   =============================================================== 
    /**
    *   Description: When we need to get paggionation data to a specific query
     *  @param  int     $limit (How meny rows should we get)
     *  @param  int     $start (Start of the query)
     *  @param  array   $field (Query array example: array[field_name]= value)
     *  @param  string  $table (Table name of the query)
     *
     *  @return Array of Objects
     */
    public function fetch_limit($limit, $start, $field, $table) {
        $this->db->limit($limit, $start);
        foreach($field as $key => $value )
            $this->db->where($key, $value);
        $query = $this->db->get($table);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    /**
    *   Description: Counting courses in a category(Active)
     *  @param  int     $category (category i we want to search)
     *  @param  boolean $user (If we want to get what one specific user made)
     *
     *  @return Int
     */
    public function count_active($category, $user=false){
        if($user == false){// ( BUGFIX mora da postoji)
        $this->db->where(array(
                'approved' => '1',
                'category_id' => $category,
            ));
        $result= $this->db->count_all_results('courses');
        return($result);
        }else{
             $this->db->where(array(
                'approved' => '1',
                'category_id' => $category,
                'author_id'   => $user,
            ));
        $result= $this->db->count_all_results('courses');
        return($result);
        }
    }

    /**
    *   Description: Counting courses in a category(Non-active)
     *  @param  int     $category (category i we want to search)
     *  @param  boolean $user (If we want to get what one specific user made)
     *
     *  @return Int
     */
    public function count_non_active($category, $user=false){

        if($user == false){// ( BUGFIX mora da postoji)
            $this->db->where(array(
                'approved !=' => '1',
                'category_id' => $category,
            ));
            $result= $this->db->count_all_results('courses');
            return($result);
        }
        else{
             $this->db->where(array(
                'approved !=' => '1',
                'category_id' => $category,
                'author_id'   => $user,
            ));
            $result= $this->db->count_all_results('courses');
            return($result);
        }
    }

     /**
    *   Description: Counting a specific sql query
     *  @param Array field(the query string we wnat to find)
     *  @param string $table(In what table we want to search)
     *
     *  @return integer
     */
    public function record_count($field, $table) {
        $this->db->where($field);
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    //===============================================================   Counting/Limiting  data   =============================================================== 
//===============================================================   Getting data   =============================================================== 

//===============================================================   Data checking   =============================================================== 

    /**
    *   Description: Check if the current logged in user is the author of a course
     *  @param int $course_id(the course we are checking)
     *
     *  @return Array of objects
     */
    public function check_course($course_id){
        $this->db->select();
        $this->db->from('courses');
        $this->db->where('courses->author_id', $this->session->userdata('id'));
        $this->db->where('courses->course_id', $course_id);
        $query = $this->db->get()->result();
        return($query);
    }
    
     /**
    *   Description: Check if the current logged in user is the author of a course
     *  @param int $course_id(the course we are checking)
     *
     *  @return Boolean
     */
    public function check_lesson_in_course($course_id, $lesson_id){
        $this->db->select();
        $this->db->from('courses');
        $this->db->join('lessons', 'courses.course_id = lessons.course_id','left');
        $this->db->where('lessons.lesson_id', $lesson_id);
        $this->db->where('courses.course_id', $course_id);
        $query = $this->db->get()->result();
        return((bool)$query);
    }

     /**
    *   Description: Check if the current logged in user is the author of a lesson
     *  @param int $lesson_id(the lesson we are checking)
     *  @param ont $author (The author we are checking)
     *  @return Array of objects
     */
    public function check_lesson_author($lesson_id, $author){
        $this->db->select('author_id, lessons.lesson_id');
        $this->db->from('courses');
        $this->db->where('courses.author_id', $author); 
        $this->db->where('lessons.lesson_id', $lesson_id); 
        $this->db->join('lessons', 'courses.course_id = lessons.course_id','left');
        $result= $this->db->get()->result();
        return($result);
    }

    /**
    *   Description: Check if the current logged in user is the author of a course
     *  @param int $course_id(the course we are checking)
     *  @param ont $author (The author we are checking)
     *  @return Array of objects
     */
    public function check_course_author($course_id, $author){
        $this->db->select('author_id, course_id');
        $this->db->from('courses');
        $this->db->where('author_id', $author); 
        $this->db->where('course_id', $course_id); 
        $result= $this->db->get()->result();
        return($result);
    }

//===============================================================   Data checking   =============================================================== 
  
    /**
    *   Description: Creating a full list of courses
     *  @param Array of Objects     $course_data (All course data)
     *  @param string $language (What will the language linking be (default="en", serbian="sr"))
     *
     *  @return string
     */
    public function create_course_list($course_data, $language="en"){
     	$this->load->model('user_m');
     	$this->load->model('difficulty_m');
     	$item='';
       	$base_url = base_url() . $language."/user/course/lesson";
       	if($course_data !=NULL) :foreach($course_data as $course): 
       		$user=$this->user_m->get_by_id('id', $course->author_id);
       		$diff=$this->difficulty_m->get_by_id($course->difficulty_id);
            switch($diff->difficulty_id){
                case 1:
                    $diff->difficulty_name=$this->lang->line('all');
                break;
                case 2:
                    $diff->difficulty_name=$this->lang->line('easy');
                break;
                case 3:
                    $diff->difficulty_name=$this->lang->line('medium');
                break;
                case 4:
                    $diff->difficulty_name=$this->lang->line('hard');
                break;
                default:
                    $diff->difficulty_name=$this->lang->line('all');
                break;
            }
       	?>
        <?php $item.='<div class="challenges-list-view mdB" style="clear:both">
            <div id="contest-challenges-problem" class="content--list track_content ">
                <div class="content--list_body">
                <header class="content--list_header row">

                    <h4 class="challengecard-title msB col-lg-7 col-xs-12">
                    <a href="'.$base_url.'/'.$course->c_slug.'" class="backbone title-link">'.$course->title.'</a>    
                    </h4>
                </header>

                </div> <!-- END content--list_body -->
                <footer class="track_content-footer clearfix">
                    <div class="small bold  pull-left">
                        <span class="msR">
                        <span class="zeta small">'.$this->lang->line('course_author_plus').' </span>
                            <span class="zeta-data small">
                                  '.$user->username.'
                            </span>
                        </span>
                        <span class="msR"><br class="visible-xs-block" />
                            <span class="zeta small">'.$this->lang->line('course_relese_date').' </span>
                            <span class="zeta-data small">
                                  '.date("d-M-Y", strtotime($course->pub_date)).'
                            </span>
                        </span>
                        <span class="mlR">
                        <span class="zeta small">'.$this->lang->line('course_diff').'</span> 
                        <span class="zeta-data">'.$diff->difficulty_name.'</span></span>
                       
                        <p>'.$course->description.'</p>
                    </div>
                        <a href="'.$base_url.'/'.$course->c_slug.'"  class="btn btn-primary  start pull-right " style="z-index:100">
                            '.$this->lang->line('course_preview').'
                        </a>      
                </footer> 
            </div>
        </div>';
    	 endforeach; endif;
    	return( $item);
       }
    public function search_limit($limit, $start, $keyword, $field){
        $keyword=decodeseoURL($keyword);
        if($keyword != null){
        
        $this->db->select("category.category_name, category.image, courses.course_id, courses.c_slug, courses.author_id, courses.title, lessons.lesson_id, lessons.lesson_name, lessons.lesson_slug, users.username");
        $this->db->limit($limit, $start);
   
        switch($field){
            case "author":
                $this->db->or_like('users.username', $keyword);
                $this->db->like('courses.approved' , 1, 'none');
                $this->db->like('lessons.approved' , 1, 'none');
                $this->db->like('category.approved' , 1, 'none');
            break;
            case "course":
                $this->db->like('courses.title', $keyword);
                $this->db->like('courses.approved', 1, 'none');
                $this->db->like('lessons.approved' , 1 , 'none');
                $this->db->like('category.approved' , 1, 'none');
            break;
            case "author-course":
                $this->db->like('courses.title', $keyword);
                $this->db->like('courses.approved', 1, 'none');
                $this->db->like('lessons.approved' , 1 , 'none');
                $this->db->like('category.approved' , 1, 'none');
                $this->db->or_like('users.username', $keyword);
                $this->db->like('courses.approved' , 1, 'none');
                $this->db->like('lessons.approved' , 1, 'none');
                $this->db->like('category.approved' , 1, 'none');
                
            break;
            case "lesson":
                $this->db->or_like('lessons.lesson_name', $keyword);
                $this->db->like('courses.approved' , 1, 'none');
                $this->db->like('lessons.approved' , 1, 'none');
                $this->db->like('category.approved' , 1, 'none');
            break;
            case "author-lesson":
                $this->db->or_like('users.username', $keyword);
                $this->db->like('courses.approved' , 1, 'none');
                $this->db->like('lessons.approved' , 1, 'none');
                $this->db->like('category.approved' , 1, 'none');

                $this->db->or_like('lessons.lesson_name', $keyword);
                $this->db->like('courses.approved' , 1, 'none');
                $this->db->like('lessons.approved' , 1, 'none');
                $this->db->like('category.approved' , 1, 'none');        
            break;
            case "course-lesson":
                $this->db->like('courses.title', $keyword);
                $this->db->like('courses.approved', 1, 'none');
                $this->db->like('lessons.approved' , 1 , 'none');
                $this->db->like('category.approved' , 1, 'none');

                $this->db->or_like('lessons.lesson_name', $keyword);
                $this->db->like('courses.approved' , 1, 'none');
                $this->db->like('lessons.approved' , 1, 'none');
                $this->db->like('category.approved' , 1, 'none');
            break;
            default:
                $this->db->like('courses.title', $keyword);
                $this->db->like('courses.approved', 1, 'none');
                $this->db->like('lessons.approved' , 1 , 'none');
                $this->db->like('category.approved' , 1, 'none');
                
                $this->db->or_like('users.username', $keyword);
                $this->db->like('courses.approved' , 1, 'none');
                $this->db->like('lessons.approved' , 1, 'none');
                $this->db->like('category.approved' , 1, 'none');
                
                $this->db->or_like('lessons.lesson_name', $keyword);
                $this->db->like('courses.approved' , 1, 'none');
                $this->db->like('lessons.approved' , 1, 'none');
                $this->db->like('category.approved' , 1, 'none');
            break;
        }

       
        $this->db->join('lessons', 'courses.course_id = lessons.course_id','left');
        $this->db->join('category', 'courses.category_id = category.category_id','left');
        $this->db->join('users', 'courses.author_id = users.id','left');
        
        $query = $this->db->get($this->_table_name);
            if($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $data[] = $row;
                }
                return $data;
            }
        }
        return null;
        // $query = $this->db->get()->result();
        // return($query);
    }
    
    public function search_count($keyword , $field){
        $keyword=decodeseoURL($keyword);
        if($keyword != null){
        $this->db->select("category.category_name, category.image, courses.course_id, courses.c_slug, courses.author_id, courses.title, lessons.lesson_id, lessons.lesson_name, lessons.lesson_slug, users.username");
       
       
        switch($field){
            case "author":
                $this->db->or_like('users.username', $keyword);
                $this->db->like('courses.approved' , 1, 'none');
                $this->db->like('lessons.approved' , 1, 'none');
                $this->db->like('category.approved' , 1, 'none');
            break;
            case "course":
                $this->db->like('courses.title', $keyword);
                $this->db->like('courses.approved', 1, 'none');
                $this->db->like('lessons.approved' , 1 , 'none');
                $this->db->like('category.approved' , 1, 'none');
            break;
            case "author-course":
                $this->db->like('courses.title', $keyword);
                $this->db->like('courses.approved', 1, 'none');
                $this->db->like('lessons.approved' , 1 , 'none');
                $this->db->like('category.approved' , 1, 'none');
                $this->db->or_like('users.username', $keyword);
                $this->db->like('courses.approved' , 1, 'none');
                $this->db->like('lessons.approved' , 1, 'none');
                $this->db->like('category.approved' , 1, 'none');
                
            break;
            case "lesson":
                $this->db->or_like('lessons.lesson_name', $keyword);
                $this->db->like('courses.approved' , 1, 'none');
                $this->db->like('lessons.approved' , 1, 'none');
                $this->db->like('category.approved' , 1, 'none');
            break;
            case "author-lesson":
                $this->db->or_like('users.username', $keyword);
                $this->db->like('courses.approved' , 1, 'none');
                $this->db->like('lessons.approved' , 1, 'none');
                $this->db->like('category.approved' , 1, 'none');

                $this->db->or_like('lessons.lesson_name', $keyword);
                $this->db->like('courses.approved' , 1, 'none');
                $this->db->like('lessons.approved' , 1, 'none');
                $this->db->like('category.approved' , 1, 'none');        
            break;
            case "course-lesson":
                $this->db->like('courses.title', $keyword);
                $this->db->like('courses.approved', 1, 'none');
                $this->db->like('lessons.approved' , 1 , 'none');
                $this->db->like('category.approved' , 1, 'none');

                $this->db->or_like('lessons.lesson_name', $keyword);
                $this->db->like('courses.approved' , 1, 'none');
                $this->db->like('lessons.approved' , 1, 'none');
                $this->db->like('category.approved' , 1, 'none');
            break;
            default:
                $this->db->like('courses.title', $keyword);
                $this->db->like('courses.approved', 1, 'none');
                $this->db->like('lessons.approved' , 1 , 'none');
                $this->db->like('category.approved' , 1, 'none');
                
                $this->db->or_like('users.username', $keyword);
                $this->db->like('courses.approved' , 1, 'none');
                $this->db->like('lessons.approved' , 1, 'none');
                $this->db->like('category.approved' , 1, 'none');
                
                $this->db->or_like('lessons.lesson_name', $keyword);
                $this->db->like('courses.approved' , 1, 'none');
                $this->db->like('lessons.approved' , 1, 'none');
                $this->db->like('category.approved' , 1, 'none');
            break;
        }

        $this->db->from('courses');
        $this->db->join('lessons', 'courses.course_id = lessons.course_id','left');
        $this->db->join('category', 'courses.category_id = category.category_id','left');
        $this->db->join('users', 'courses.author_id = users.id','left');
        return $this->db->count_all_results();
        }else{
            return null;
        }
    }
        /**
    *   Description: Creating a table heaqder for administrator table(links can be ordered, and there is also a search)
     *  @param string $order (orderg by columns)
     *  @param string $type (what tupe of ordering you wnat "ascending"/"descending")
     *  @param int $page (pagination of the page)
     *  @param string $match (Search variable) 
     *
     *  @return string
     */
    public function create_table_header($language='en', $total_items, $extended_url, $header_list_name, $header_order_slug, $order, $type='asc', $page=0, $pagination_segment, $match='-'){  
        $links='';
        //Setting default values for displaying activated headers and ordering type icons
        $header_activate= array(
                0 => false,
                1 => false,
                2 => false,
                3 => false,
                4 => false,
                5 => false,
                6 => false,
                7 => false,
                8 => false,
                9 => false,
                10 => false,               
                );

        //Pagination position
        //$page = $this->uri->segment($pagination_segment) ? $this->uri->segment($pagination_segment) : 0;
        //Creating default values for ordering types if the user gave wrong information
        if($type != 'asc' AND $type!='desc'){$type='asc';}

        //Creating a dynamicly generated activation for headers 
        //Checking if the current order is in the list of valid header slugs
        if(in_array($order, $header_order_slug)){
            //retrieve the $key position of the current value
            $key=array_search ($order, $header_order_slug);
            //creating list and setting the value of the active header to "true"
            for($i=0; $i<=$total_items; $i++){
                if($i==$key){
                    $header_activate[$i]=true;
                }else{
                    $header_activate[$i]=false;
                }  
            }
        }
           
        //Creating the user visible fully formated table links
        $links="<tr class=\"center\">";
        for($i=0; $i<=$total_items; $i++){
            if($header_order_slug[$i] === false){
                 $links.="<th class=\"center\">".$header_list_name[$i]."</th>";
            }else{
                $links.= "<th class=\"center\" style=\"min-width:120px;\">
                            <a class=\" dark-limegreen-link\" href=\"".base_url().$language.$extended_url.$header_order_slug[$i]."/".$type."/".$match."/".$page."/\" >".$header_list_name[$i]."</a> ";
                if($header_activate[$i]){
                    if($type=='desc'){
                        $links.="&nbsp;<a class=\" dark-limegreen-link\" href=\"".base_url().$language.$extended_url.$order."/asc/".$match."/".$page."/\">";
                        $links.="<i class=\"glyphicon glyphicon-chevron-down\"></i>";
                        $links.="</a>";
                    }else{
                        $links.="&nbsp;<a class=\" dark-limegreen-link\" href=\"".base_url().$language.$extended_url.$order."/desc/".$match."/".$page."/\" >";
                        $links.="<i class=\"glyphicon glyphicon-chevron-up\"></i>";
                    $links.="</a>";
                    }
                }  
                $links.= "</th>";
                }  
            }
        $links.="</tr>";
        return($links);
    }
}
?>