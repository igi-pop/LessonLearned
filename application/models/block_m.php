<?php
class Block_m extends MY_Model{

	protected $_table_name = 'blocks';
	protected $_primary_key = 'block_id';
	protected $_order_by = 'block_order, modified asc';
	protected $_timestamps = TRUE;
	//Deafault block rules for inserting/editing blocks
	public $rules = array(
		'title' => array(
			'field' => 'title', 
			'label' => 'Title', 
			'rules' => 'trim|xss_clean'
		), 
		'description' => array(
			'field' => 'title', 
			'label' => 'Title', 
			'rules' => 'trim|xss_clean'
		), 
		'note' => array(
			'field' => 'note', 
			'label' => 'Note', 
			'rules' => 'trim|xss_clean'
		), 
		'code' => array(
			'field' => 'code', 
			'label' => 'Code', 
			'rules' => 'trim'
		),
		'output' => array(
			'field' => 'output', 
			'label' => 'Output', 
			'rules' => 'trim'
		),
	);

	/**
	*	Get a single lesson row by its slug
	 *	@param String $lesson(Represents lesson slug)
	 *	@return Object 
	 */
	public function get_by_slug($lesson){
		$lesson_array=array('lesson_slug' => $lesson);
		$result=parent::get_by_slug($lesson_array,TRuE);
		return ($result);
	}

	/**
	*	Description: Gets  array of elements by any colum
	 *	@param string column(Column name of the current table)
	 *	@param any id (Any value of the column)
	 *	@return Array of objects
	 */
	public function get_by_id($column, $id){
		$lesson_array=array($column => $id);
		$result=parent::get_by_id($lesson_array, false);
		return ($result);
	}
	
	/**
	*	Description: Creates an formated list for viewing/editing block in the developer/admin section
	 *
	 *	@param Array of objects $block_objects (Its an array of objrct data we want to be formated exmpl. $object[$array_number]->object_variables)
	 *	@param boolean 			$admin (Default value is NULL, if it's !=NULL they we will give the user aditional blocks to edit, delete and add block in the administrator block menu)
	 *	@param int 				$block_group (Determinds what group are we creating new blocks)
	 *	@param string 			$module (Are we creating in the admin menu or the developer menu)
	 * 	@param string 			$language (What will the language linking be (default="en", serbian="sr"))
	 * 	@return String
	 */
	public function block_format($block_objects, $admin=NULL, $block_group=NULL, $module='admin', $language='en'){
		$lesson='';
		if($block_objects == NULL AND $admin != NULL){
			$lesson.="\t<div class=\"track_content col-lg-8 col-lg-offset-2 \" style=\"margin-bottom:25px; margin-top:15px; padding:10px\">\n";
			$lesson.="<h4 class=\"bold\">".$this->lang->line('block_m_format_no_block')." </h4> ";
			$lesson.="<p class=\"\">".$this->lang->line('block_m_format_start')."</p> <br />";
			$lesson.="\t<a href=\"".base_urL().$language."/$module/block/create/".$block_group."\" class=\"btn btn-primary\"><i class=\"glyphicon glyphicon-plus-sign\"></i> ".$this->lang->line('block')."</a>";
			$lesson.="</div>\n";
			
		}
		foreach($block_objects as $block_object){
			$block_group=$block_object->block_group;
			if($admin!=NULL){	
				$lesson.="\t<div class=\"track_content col-lg-12 col-md-12 \" style=\"margin-bottom:25px; margin-top:15px; padding:10px\">\n";
				$lesson.="<h4 class=\"color-green\">".$this->lang->line('block_m_format_number')." ".$block_object->block_id."<span class=\"pull-right\">".$this->lang->line('block_m_format_order')." ".$block_object->block_order."</span></h4> <br />";
			}

			if($block_object->title != NULL){
				$lesson.="\t<div class=\"msB\"><p><strong>".$block_object->title."</strong></p></div>\n\n";
			}
			if($block_object->description != NULL){
				$lesson.="\t<div class=\"msB\"><p>".$block_object->description."</p></div>\n\n";
			}
			if($block_object->note != NULL){
				$lesson.="\t<p>".$this->lang->line('block_m_format_note')." ".$block_object->note."</p>\n\n";
			}
			if($block_object->code != NULL){
				$lesson.="\t<pre>".$block_object->code."</pre>\n\n";
			}
			if($block_object->output != NULL){
				$lesson.="<div class=\"msB\"><p><strong>".$this->lang->line('block_m_format_output')."</strong></p></div>";
				$lesson.="\t<pre>".$block_object->output."</pre>\n\n";
			}
			if($block_object->video_url != NULL){
				$lesson.="<div class=\"video-container\"><div class=\"msB\"><p><strong> Video example </strong></p></div>";
				$lesson.="\t<iframe width=\"420\" height=\"315\" src=\"".$block_object->video_url."\"></iframe></div>\n\n";
			}
			if($admin!=NULL){
			$lesson.="\t<a href=\"".base_urL().$language."/$module/block/edit/".$block_object->block_id."\" class=\"btn btn-primary\"><i class=\"glyphicon glyphicon-pencil\"></i> ".$this->lang->line('block_m_edit_block')."</a>";
			$lesson.="\t<a href=\"".base_urL().$language."/$module/block/delete/".$block_object->block_id."\" class=\"btn btn-primary\"><i class=\"glyphicon glyphicon-trash\"></i> ".$this->lang->line('block')."</a>";
			$lesson.="</div>\n";
			}
		}
			if($admin!=NULL AND $block_objects != NULL)
			{
				$lesson.="\t<div class=\"track_content col-lg-6 col-lg-offset-3 col-md-12\" style=\"margin-bottom:25px; margin-top:15px; padding:10px\">\n";
				$lesson.="<h4 class=\"bold\">".$this->lang->line('block_m_add_new')."</h4> ";
				$lesson.="<p class=\"\">".$this->lang->line('block_m_format_start')."</p> <br />";
				$lesson.="\t<a href=\"".base_urL().$language."/$module/block/create/".$block_group."\" class=\"btn btn-primary\"><i class=\"glyphicon glyphicon-plus-sign\"></i> ".$this->lang->line('block')."</a>";
				$lesson.="</div>\n";
			}
		return($lesson);
	}

	/**
	*	Description:Get the max order number in a block_group
	 *	@param int $block_group(block_group we want to check)
	 *	@return int Max order number
	 */
	public function get_order($block_group){
		$group=array('block_group' => $block_group);
		$this->db->select_max('block_order');
		$this->db->where($group);
		return $this->db->get($this->_table_name)->row();
	}

	/**
	*	Description: Updateing order list
	 *	@param int Number of blocks
	 *	@param array block_ids
	 */
	public function update_order($total_items, $items){
		$order=1;	
		for($item = 0; $item <= $total_items; $item++ ){
            $data = array(
                    'block_id' => $items[$item],
                    'block_order' => $order
            );
            $order++;
            $this->db->where('block_id', $data['block_id']);
            $this->db->update('blocks', $data);
            echo '<br />'.$this->db->last_query();
        }
	}

}
?>