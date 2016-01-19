<?php
class Difficulty_m extends MY_Model
{
	protected $_table_name = 'difficulty';
	protected $_order_by = 'difficulty_slug desc';
	protected $_timestamps = TRUE;
	
	/**
	*	Description: Retrieves a difficulty item by its unique slug
  	 *	@param string $difficulty_slug
  	 *
  	 * 	@return Array of objects
	 */
	public function get_by_slug($difficulty_slug){
		if( $difficulty_slug==NULL){	
			$difficulty_slug='all';
		}
		else{
			$diff = $this->get_by(array(
				'difficulty_slug' => $difficulty_slug,
			), FALSE);
			if($diff==NULL)
			{
				$this->get_by_slug(NULL);
			}
			return($diff);
		}
		return false;
	}

	/**
	*	Description: Retrieves a difficulty item by its unique id
  	 *	@param string $difficulty_id
  	 *
  	 * 	@return Objects
	 */
	public function get_by_id($difficulty_id){
			$diff = $this->get_by(array(
				'difficulty_id' => $difficulty_id,
			), true);
		
			return($diff);	
	}

	/**
	*	Description: Creat difficulty links for filtering courses, allows users to change their difficulty (Only applies styling to active and non active links)
	 *	@param string $base_url (URL of the page we are going to use the filtering links)
	 *	@param string $slug (If there is a slug before the filtering, exmple. course_slug) 
	 *	@param string $difficulty_slug (Determinds what filter we should use)
	 *
	 * 	@return string (returns aformated string with all the links needed)
	 */
	public function create_difficulty_links($base_url, $slug, $difficulty_slug){
		$all='';
		$easy='';
		$medium='';
		$hard='';
		switch($difficulty_slug){
			case $this->lang->line('diff_m_all_slug'):
				$all="active";
				break;
			case $this->lang->line('diff_m_easy_slug'):
				$easy="active";
				break;
			case $this->lang->line('diff_m_medium_slug'):
				$medium="active";
				break;
			case $this->lang->line('diff_m_hard_slug'):
				$hard="active";
				break;
			default:
			$all="active";	
				break;
		}
		$links='<a href="'.$base_url.$slug.'/'.$this->lang->line('diff_m_easy_slug').'" class="btn difficulty '.$easy.'">'.$this->lang->line('diff_m_easy').'</a>
            	<a href="'.$base_url.$slug.'/'.$this->lang->line('diff_m_medium_slug').'"  class="btn difficulty '.$medium.'">'.$this->lang->line('diff_m_medium').'</a>
            	<a href="'.$base_url.$slug.'/'.$this->lang->line('diff_m_hard_slug').'"   class="btn difficulty '.$hard.'">'.$this->lang->line('diff_m_hard').'</a>
            	<a href="'.$base_url.$slug.'/'.$this->lang->line('diff_m_all_slug').'"   class="btn difficulty '.$all.' ">'.$this->lang->line('diff_m_all').'</a>';

        return($links);
	}
}