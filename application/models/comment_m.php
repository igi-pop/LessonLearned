<?php
class Comment_m extends MY_Model
{

	protected $_table_name = 'comments';
	protected $_order_by = 'date asc';
	protected $_timestamps = FALSE;
	protected $_primary_key= 'comments_id';
	public $rules_comment = array( 
		'comment' => array(
			'field' => 'comment', 
			'label' => 'Comment', 
			'rules' => 'trim|required|xss_clean'
		), 
	);

	public function all_lesson_comments($lesson_id){   
        $this->db->where('lesson_id', $lesson_id);
        $this->db->order_by('date','asc');
        $query = $this->db->get($this->_table_name)->result();
        return($query);
	}
	public function all_threads($lesson_id){
		$this->db->where('comments.lesson_id', $lesson_id);
		$this->db->where('reply_id', null);
		$this->db->join('lessons', 'comments.lesson_id = lessons.lesson_id','left');
		$this->db->join('users', 'users.id = comments.user_id','left');
		$this->db->order_by('date','desc');
        $query = $this->db->get($this->_table_name)->result();
        return($query);
	}
	public function count_reply($lesson_id, $reply_id){
		$this->db->select('count');
		$this->db->where('lesson_id', $lesson_id);
		$this->db->where('reply_id', $reply_id);
		$this->db->from($this->_table_name);

		$query = $this->db->count_all_results();
        return($query);
	}
	public function all_replies($lesson_id, $reply_id){
		$this->db->select('users.username, users.last_name, users.first_name, users.avatar, lessons.lesson_name, comments.*');
		$this->db->where('comments.lesson_id', $lesson_id);
		$this->db->where('reply_id', $reply_id);
		$this->db->join('lessons', 'comments.lesson_id = lessons.lesson_id','left');
		$this->db->join('users', 'users.id = comments.user_id','left');
		$this->db->order_by('date','asc');
        $query = $this->db->get($this->_table_name)->result();
        return($query);
	}
	public function detailed_comment($comment_id){
		$this->db->select('users.username, users.last_name, users.first_name, users.avatar, lessons.lesson_name, comments.*');
		$this->db->where('comments_id', $comment_id);
		$this->db->join('lessons', 'comments.lesson_id = lessons.lesson_id','left');
		$this->db->join('users', 'users.id = comments.user_id','left');
		$this->db->order_by('date','desc');
		$query = $this->db->get($this->_table_name)->result();
        return($query);
	}
	public function input_comment($id=null){
		//Formating all the data for updating into the database
		if($id == null){
			$date=time();
			$date = date("Y-m-d H:i:s", $date);

			$data = $this->array_from_post(array('comment', 'lesson_id', 'user_id', 'reply_id'));
			$data['date']=$date;
			if($data['reply_id']=='null'){
				$data['reply_id']=null;
			}
			$this->save($data, $id);
		}else{
			$data['comment']= $this->input->post('comment');
			$this->save($data, $this->input->post('comments_id'));
		}
		//Saving data and redirecting
		
	}
	public function delete_comment($id){
		$comment=$this->get($id, true);
		if($comment->reply_id == null){
			$this->delete($id);
			$this->delete_where('reply_id', $comment->comments_id);
		}else{
			$this->delete($id);
		}

	}




/*$post_date = '1079621429';
$now = time();

echo timespan($post_date, $now);*/


}
?>