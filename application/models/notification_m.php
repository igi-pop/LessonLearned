<?php
class Notification_m extends MY_Model
{

	protected $_table_name = 'notification';
	protected $_order_by = 'date desc';
	protected $_timestamps = false;
    protected $_primary_key = 'note_id';
	

	// Rules for message form
	public $rules = array(
		'message' => array(
			'field' => 'message', 
			'label' => 'Message', 
			'rules' => 'trim|required|xss_clean'
		), 
		
		);
//======================================================   Retriving data   ========================================================
   
	/**
	*	Description: Getting elements with the unique id
	 *	@param int $id (Notification_id)
	 *
	 * 	@return Object
	 */
	public function get_by_id($id){
    	$lesson_array=array('note_id' => $id);
		$notification=parent::get_by_slug($lesson_array,TRUE);
		
		if($notification){
		switch($notification->type){
				case 1:
				$notification->type_name=$this->lang->line("note_type_1");
				break;
				case 2:
				$notification->type_name=$this->lang->line("note_type_2");
				break;
				case 3:
				$notification->type_name=$this->lang->line("note_type_3");
				break;
				case 4:
				$notification->type_name=$this->lang->line("note_type_4");
				break;
				Default:
				$notification->type_name=$this->lang->line("note_type_default");
				break;
			}
		switch($notification->flag){
			case 1:
				$notification->status=$this->lang->line("note_flag_1");
				break;
			case 2:
				$notification->status=$this->lang->line("note_flag_2");
				break;
			case 3:
				$notification->status=$this->lang->line("note_flag_3");
				break;
			case 4:
				$notification->status=$this->lang->line("note_flag_4");
				break;
			Default:
				$notification->status=$this->lang->line("note_flag_1");
				break;
			}

		$temp=$this->notification_details($notification->note_id, $notification->type);
			
			$notification->username=$temp[0]->username;
			$notification->first_name=$temp[0]->first_name;
			$notification->last_name=$temp[0]->last_name;
			if($notification->type == 1){
			$notification->lesson_name=$temp[0]->lesson_name;
			}
			if($notification->type == 2){
			$notification->course=$temp[0]->title;
			}
			if($notification->type == 3){
			$notification->first_name=$temp[0]->first_name;
			$notification->last_name=$temp[0]->last_name;
			}
		return ($notification);
		}
		return(false);
    }

    /**
	*	Description: Getting notifications for a specific user or administrators
	 *	@param int $user_id(Optional)(If the user_id is null then we will get all notifications for administrators)
	 *
	 * 	@return Array of objects
	 */
    public function all_notification($user_id=NULL){
    	$new_result=NULL;
    	if($user_id !=NULL){
    		$lesson_array=array('recive_id' => $user_id);
    	}else
    		$lesson_array=array('recive_id' => 0);
		$result=parent::get_by_slug($lesson_array,false);
		$i=0;
		foreach($result as $notification)
		{
			$temp=$this->notification_details($notification->note_id, $notification->type);
			$notification->username=$temp[0]->username;
			$notification->first_name=$temp[0]->first_name;
			$notification->last_name=$temp[0]->last_name;
			if($notification->type == 1){
			$notification->lesson_name=$temp[0]->lesson_name;
			}
			if($notification->type == 2){
			$notification->course_name=$temp[0]->title;
			}
			if($notification->type == 3){
			$notification->first_name=$temp[0]->first_name;
			$notification->last_name=$temp[0]->last_name;
			}


			$new_result[$i]=$notification;
			$i++;
		}
		return ($new_result);
    }

    /**
	*	Description: Updating existing Notification objects depending on the type of notification for administrator users
	 *	@return Array of Objects
	 */
    public function admin_notification(){
    	$this->load->model('lesson_m');
    	$lesson_array=array('recive_id' => 0, 'flag' => 1);
		$result=parent::get_by_slug($lesson_array,false);
		$i=0;
		if($result != null)
		foreach($result as $notification){
			if($notification != null){
			$temp=$this->notification_details($notification->note_id, $notification->type);
			$notification->username=$temp[0]->username;
			$notification->first_name=$temp[0]->first_name;
			$notification->last_name=$temp[0]->last_name;
			if($notification->type == 1){
			$notification->lesson_name=$temp[0]->lesson_name;
			}
			if($notification->type == 2){
			$notification->course_name=$temp[0]->title;
			}
			if($notification->type == 3){
			$notification->first_name=$temp[0]->first_name;
			$notification->last_name=$temp[0]->last_name;
			}
			switch($notification->type){
				case 1:
				$notification->type_name=$this->lang->line("note_type_1");
				break;
				case 2:
				$notification->type_name=$this->lang->line("note_type_2");
				break;
				case 3:
				$notification->type_name=$this->lang->line("note_type_3");
				break;
				case 4:
				$notification->type_name=$this->lang->line("note_type_4");
				break;
				Default:
				$notification->type_name=$this->lang->line("note_type_default");
				break;
			}
			$new_result[$i]=$notification;

			$i++;
			}
		}
		return ($result);
    }

   /**
	*	Description: Updating existing Notification objects depending on the type of notification for ordinary users
	 *	@return Array of Objects
	 */
    public function user_notification($id){
    	$lesson_array=array('recive_id' => $id, 'flag' => 1);
		$result=parent::get_by_slug($lesson_array,false);
		$i=0;
		foreach($result as $notification)
		{
			switch($notification->type){
				case 1:
				$notification->type_name=$this->lang->line("note_type_1");
				break;
				case 2:
				$notification->type_name=$this->lang->line("note_type_2");
				break;
				case 3:
				$notification->type_name=$this->lang->line("note_type_3");
				break;
				case 4:
				$notification->type_name=$this->lang->line("note_type_4");
				break;
				Default:
				$notification->type_name=$this->lang->line("note_type_default");
				break;
			}
			$temp=$this->notification_details($notification->note_id, $notification->type);
			$notification->username=$temp[0]->username;
			$notification->first_name=$temp[0]->first_name;
			$notification->last_name=$temp[0]->last_name;
			if($notification->type == 1){
			$notification->lesson_name=$temp[0]->lesson_name;
			}
			if($notification->type == 2){
			$notification->course_name=$temp[0]->title;
			}
			if($notification->type == 3){
			$notification->first_name=$temp[0]->first_name;
			$notification->last_name=$temp[0]->last_name;
			}
			$new_result[$i]=$notification;
			$i++;
		}
		return ($result);
    }

   	/**
	*	Description: Updating existing Notification objects depending on the type of notification
	 *	@param int $id (Id of the notification)
	 *	@param int $type(Defines the type of notification, 1-lesson, 2-course, 3-developer, 4-reply)
	 *
	 *	@return Array of Objects
	 */
    public function notification_details($id, $type){
    	if($type == 1){
            $this->db->select('users.username, lessons.lesson_name, users.first_name, users.last_name,');
            $this->db->from('notification');
			$this->db->join('lessons', ' lessons.lesson_id = notification.lesson', 'inner');
            $this->db->join('users','notification.send_id = users.id', 'inner');
            $this->db->where('notification.note_id', $id);  
        }
        elseif($type == 2){
            $this->db->select('users.username, courses.title, users.first_name, users.last_name,');
            $this->db->from('notification');
			$this->db->join('courses', ' courses.course_id = notification.lesson', 'inner');
            $this->db->join('users','notification.send_id = users.id', 'inner');
            $this->db->where('notification.note_id', $id);  
        }elseif($type == 3){
            $this->db->select('users.username, users.first_name, users.last_name,');
            $this->db->from('notification');
            $this->db->join('users','notification.send_id = users.id', 'inner');
            $this->db->where('notification.note_id', $id); 
        }
        else{
           	$this->db->select('users.username, users.first_name, users.last_name,');
           	 $this->db->join('users','notification.send_id = users.id', 'inner');
            $this->db->from('notification');
            $this->db->where('notification.note_id', $id); 
        }

            $result= $this->db->get()->result();
            return($result);
    }

   
//======================================================   Validation/Checking   ========================================================
   	/**
   	*	Description: Checks if the lesson the lesson for the notification is approved or not.(Only for courses and lesson requests)
   	 *	@param int 	$lesson( the lesson we are checking)
   	 *	@param int 	$type (the type of notifications we are checking 1-lesson, 2-course)
   	 *
   	 * @return Array of objects
   	 */
    public function exist_check($lesson, $type ){
    	//currently for courses/lessons
    		$this->db->select();
            $this->db->select('lessons.approved');
            $this->db->from('notification');
			$this->db->join('lessons', ' lessons.lesson_id = notification.lesson', 'left');
			$this->db->where('lessons.approved', NULL); 
			if($type == 1 OR $type == 2)
            $this->db->where('notification.lesson', $lesson);  
            $this->db->where('notification.type', $type);  
            $this->db->where('notification.recive_id', 0); 	//Sent to all administrators
            $this->db->where('notification.flag', 2);  	 	//
            

            $this->db->or_where('lessons.approved', 0); 
            if($type == 1 OR $type == 2)
            $this->db->where('notification.lesson', $lesson);  
            $this->db->where('notification.type', $type);  
            $this->db->where('notification.recive_id', 0); 	//Sent to all administrators
            $this->db->where('notification.flag', 2);

            $this->db->or_where('lessons.approved', NULL); 
            if($type == 1 OR $type == 2)
            $this->db->where('notification.lesson', $lesson);  
            $this->db->where('notification.type', $type);  
            $this->db->where('notification.recive_id', 0); 	//Sent to all administrators
            $this->db->where('notification.flag', 1);  	 	//
           
            $this->db->or_where('lessons.approved', 0);
            if($type == 1 OR $type == 2) 
            $this->db->where('notification.lesson', $lesson);  
            $this->db->where('notification.type', $type); 
            $this->db->where('notification.recive_id', 0); 	//Sent to all administrators
            $this->db->where('notification.flag', 1);


            $result= $this->db->get()->result();
            return($result);
    }
    /**
    *	Description: Checking if the specific notification belongs to the current user or an admin
     *	@param int $note_id (the notification id)
     *	@param boolean $admin(If we are checking for an admin or not)
     *
     *	@return boolean
     */
    public function permission_check($note_id=NULL, $admin=false){
   		$this->db->select();
   		$this->db->from('notification');
   		if($admin == true)
   		{
   		$this->db->where('notification.recive_id', 0 );  
   	  	$this->db->where('notification.note_id', $note_id); 
   		}else{
   	  	$this->db->where('notification.recive_id', $this->session->userdata('id'));  
   	  	$this->db->where('notification.note_id', $note_id);  
   	  	}
        $result= $this->db->get()->result();
        if($result)
        return(true);
    	else
    	return(false);
    }
    
//======================================================   Specific commands   ========================================================
   
    /**
    * 	Description: Counting how meni notifications a user/administrators have	
     *	@param 	int 	 $Type (The type of notification)
     *	@param 	int 	 $flag (The sttus of a notification)
     *	@param  string 	 $admin (If we wnat admin or user notifications) 	
     *
     *	@return Int
     */
	public function record_count($type=NULL, $flag, $admin=true) {
       	if($type !=NULL)
       	switch($type){
			case $this->lang->line("note_type_slug_2"):
			$this->db->where('type', 1);
			break;
			case $this->lang->line("note_type_slug_3"):
			$this->db->where('type', 2);
			break;
			case $this->lang->line("note_type_slug_4"):
			$this->db->where('type', 3);
			break;
			case $this->lang->line("note_type_slug_1"):
			break;
			default:
			break;
		}
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
		if($admin== true)
		$this->db->where('recive_id', 0);
		else
		$this->db->where('recive_id', $this->session->userdata('id'));
		$this->db->from($this->_table_name);
		return $this->db->count_all_results();
    }
    /**
    *	Description: Pagination query for displaying  notifications
     *	@param int 		$limit (How meni result we want to show)
	 *	@param int 		$start (At what number are we starting to show)
	 *	@param int 		$type (The type of notifications)
	 *	@param int 		$flag (The status of the notifications)
	 *	@param boolean 	$admin (If we are lookung for an administratoirs)
	 *
     */
    public function fetch_limit($limit, $start, $type=NULL, $flag, $admin=true) {
    	if($type !=NULL)
    	switch($type){
			case $this->lang->line("note_type_slug_2"):
			$this->db->where('type', 1);
			break;
			case $this->lang->line("note_type_slug_3"):
			$this->db->where('type', 2);
			break;
			case $this->lang->line("note_type_slug_4"):
			$this->db->where('type', 3);
			break;
			case $this->lang->line("note_type_slug_1"):
			break;
			default:
			break;
		}
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
		$this->db->order_by($this->_order_by);
		if($admin== true)
		$this->db->where('recive_id', 0);
		else
		$this->db->where('recive_id', $this->session->userdata('id'));
        $this->db->limit($limit, $start);
        $query = $this->db->get($this->_table_name);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    /**
    *	Description: Messaging notifications for responding to user request
     *	@param int $action (If the message if positiv or negative, 1-positive, 2-negative)
	 *	@param int $type ($type of request responce)
     *	@param string $note ($message for the user)
     */
   	public function automatic_message($action, $type, $name=NULL, $note=NULL ){

		switch($action){
			case 1:
				switch($type){
					case 1:
						$message =$this->lang->line("note_success_lesson_message_1");
						$message .=$this->lang->line("note_success_lesson_message_2");
						$message .=$this->lang->line("note_success_lesson_message_3");
						break;
					case 2:
						$message =$this->lang->line("note_success_course_message_1");
						$message .=$this->lang->line("note_success_course_message_2");
						$message .=$this->lang->line("note_success_course_message_3");
						break;
					case 3:
						$message =$this->lang->line("note_success_dev_message_1");
			 			$message .=$this->lang->line("note_success_dev_message_2");
						$message .=$this->lang->line("note_success_dev_message_3");
						$message .=$this->lang->line("note_success_dev_message_4");
					break;

				}
			break;
			case 2:
				switch($type){
					case 1:
						$message =$this->lang->line("note_fail_lesson_message_1");
						$message .=$this->lang->line("note_fail_lesson_message_2");
						$message .=$note."<br /><br />";
						$message .=$this->lang->line("note_fail_lesson_message_4");
						break;
					case 2:
						$message =$this->lang->line("note_fail_course_message_1");
						$message .=$this->lang->line("note_fail_course_message_2");
						$message .=$note."<br /><br />";
						$message .=$this->lang->line("note_fail_course_message_4");
						break;
					case 3:
						$message =$this->lang->line("note_fail_dev_message_1");
			 			$message .=$this->lang->line("note_fail_dev_message_2");
						$message .=$this->lang->line("note_fail_dev_message_3");
						$message .=$this->lang->line("note_fail_dev_message_4");
					break;

				}
			break;
			
		}
		return($message);
   	} 

   	//  Description: delete all seen request from the current user
    public function delete_seen(){
   		$this->db->where('flag', 2);
   		$this->db->where('recive_id', $this->session->userdata('id'));
		$this->db->delete($this->_table_name);
    }
    //Sets a notification flag to "seen"
    //whenever the user opens the notification its set to seen
    public function seen($id){
    	$data['flag']=2;
    	$this->save($data, $id);
    }

//======================================================   Creating links   ========================================================
    
    /**
    *	Description: Creates filtering links for the types of notifications
     *	@param string 	$base_url(the begging of the page we want to put the filtering links)
     *	@param int 		$flag (the status of the notifications)
     * 	@param string 	$type_slug (the slug of the types s0 we can activate them)
     *
     * 	@return string
     */
    public function create_type_links($base_url, $flag, $type_slug){
		$all='';
		$lesson='';
		$course='';
		$developer='';
		switch($type_slug){
			case $this->lang->line("note_type_slug_1"):
				$all="active";
				break;
			case $this->lang->line("note_type_slug_2"):
				$lesson="active";
				break;
			case $this->lang->line("note_type_slug_3"):
				$course="active";
				break;
			case $this->lang->line("note_type_slug_4"):
				$developer="active";
				break;
			default:
			$all="active";	
				break;
		}
		$links='<a href="'.$base_url.$this->lang->line("note_type_slug_2").'/'.$flag.'" class="btn difficulty '.$lesson.'">'.$this->lang->line("note_type_name_2").'</a>
            	<a href="'.$base_url.$this->lang->line("note_type_slug_3").'/'.$flag.'" class="btn difficulty '.$course.'">'.$this->lang->line("note_type_name_3").'</a>
            	<a href="'.$base_url.$this->lang->line("note_type_slug_4").'/'.$flag.'" class="btn difficulty '.$developer.'">'.$this->lang->line("note_type_name_4").'</a>
            	<a href="'.$base_url.$this->lang->line("note_type_slug_1").'/'.$flag.'" class="btn difficulty '.$all.' ">'.$this->lang->line("note_type_name_1").'</a>';

        return($links);
	}

	/**
    *	Description: Creates filtering links for the flags(Status) of notifications
     *	@param string 	$base_url(the begging of the page we want to put the filtering links)
     *	@param int 		$type (the type of the notifications)
     * 	@param string 	$status_slug (the slug of the statuses(flags) so we can activate them)
     *
     * 	@return string
     */
	public function create_flag_links($base_url, $type=NULL, $status_slug){
		$all='';
		$unseen='';
		$seen='';
		$closed='';
		switch($status_slug){
			case $this->lang->line("note_status_slug_1"):
				$all="active";
				break;
			case $this->lang->line("note_status_slug_2"):
				$unseen="active";
				break;
			case $this->lang->line("note_status_slug_3"):
				$seen="active";
				break;
			case $this->lang->line("note_status_slug_4"):
				$closed="active";
				break;
			default:
			$all="active";	
				break;
		}
		if($type != NULL){
			$links='<a href="'.$base_url.$type.'/'.$this->lang->line("note_status_slug_2").'" class="btn difficulty '.$unseen.'">'.$this->lang->line("note_status_name_2").'</a>
            <a href="'.$base_url.$type.'/'.$this->lang->line("note_status_slug_3").'"  class="btn difficulty '.$seen.'">'.$this->lang->line("note_status_name_3").'</a>
            <a href="'.$base_url.$type.'/'.$this->lang->line("note_status_slug_4").'"   class="btn difficulty '.$closed.'">'.$this->lang->line("note_status_name_4").'</a>
       	    <a href="'.$base_url.$type.'/'.$this->lang->line("note_status_slug_1").'"   class="btn difficulty '.$all.' ">'.$this->lang->line("note_status_name_1").'</a>';
        }else{
       	$links='<a href="'.$base_url.$this->lang->line("note_status_slug_2").'" class="btn difficulty '.$unseen.'">'.$this->lang->line("note_status_name_2").'</a>
            	<a href="'.$base_url.$this->lang->line("note_status_slug_3").'"  class="btn difficulty '.$seen.'">'.$this->lang->line("note_status_name_3").'</a>
            	<a href="'.$base_url.$this->lang->line("note_status_slug_4").'"   class="btn difficulty '.$closed.'">'.$this->lang->line("note_status_name_4").'</a>
            	<a href="'.$base_url.$this->lang->line("note_status_slug_1").'"   class="btn difficulty '.$all.' ">'.$this->lang->line("note_status_name_1").'</a>';
        }
        return($links);
	}
}


?>