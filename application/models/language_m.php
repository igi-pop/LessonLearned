<?php
class Language_m extends MY_Model
{
	protected $_table_name = 'language';
	protected $_order_by = 'lang_name asc';
	protected $_primary_key ='lang_id';
	protected $_timestamps = TRUE;
	

	//Gets all languages
	public function get_all(){	
		$query=$this->db->get('language');
		$lang=$query->result();
		return ($lang);
	}
	

}