<?php
class Cat_link_m extends MY_Model{
	protected $_primary_key= 'id';
	protected $_table_name = 'category_link';
	protected $_order_by = 'id asc';
	protected $_timestamps = TRUE;
	
	/**
	*	Description: Check and get a link if its active
	 *	@param int 	$id ($category id we want to check)
	 *	@return Array of objects
	 */
	public function get_links($id){
		$this->db->where(array('course_main' => $id, 'active' => 1));
		$this->db->or_where(array('course_second' => $id,));
		$this->db->where(array( 'active' => 1));
		$result=$this->get(NULL, false);
		return ($result);
		}

	/**
	*	Description: Checks a pair of category links,  if it exist return the link
	 *	@param int 	$first ($category id we want to check)
	 *	@param int 	$second ($category id we want to check)
	 *	@return Array of objects
	 */
	public function check_links($first, $second){
			$this->db->where(array('course_main' => $first,	));
			$this->db->where(array('course_second' => $second,));
			
			$this->db->or_where(array('course_main' => $second,));
			$this->db->where(array('course_second' => $first,));
			$result=$this->get(NULL, false);
			
			return ($result);
			}

	/**
	*	Description: Checks a pair of category links,  if it exist return the link
	  *	@param int 	$first ($category id we want to check)
	 *	@param int 	$second ($category id we want to check)
	 *	@return Object
	 */
	public function get_spec($first, $second){
		$this->db->where(array('course_main' => $second,));
		$this->db->where(array('course_second' => $first,));
		$this->db->or_where(array('course_main' => $first,));
		$this->db->where(array('course_second' => $second,));
		$result=$this->db->get('category_link')->row();
		return ($result);
		}

	/**
	*	Description: We check all existing links to categories, if they dont exist we create them, we reset all connected links and set them to the current values
	 *	@param int 	$id(Id of the category)
	 *	@param array $links_id
	 * 	@param string $language (What will the language linking be (default="en", serbian="sr"))
	 */
	public function update_links($id, $links_id=NULL, $language="en"){	
		/* Description first we make an exxception when we want to reset the link(No checkbox selected) */
		if($links_id == false){
			//Select all connection with the main $id
			$all=$this->get_links($id);
			//set active to false on each instance
			foreach($all as $one){
				$data=array('active'=> false,);
				$this->db->set($data);
				$this->db->where($this->_primary_key, $one->id);
				$this->db->update($this->_table_name);

			}
		}	
		else{
		//Checking for an array type	
			if(is_array($links_id)){
				//we want to check if all the connections we want to update already exist in the database
				//If they dont we will create it
				foreach($links_id as $link){
					if($this->check_links($link, $id) == NULL){
						//Setting the data we want to insert
						$data=array('course_main' => $id,
									'course_second'=>$link,
									'active'=> true,
									);
						!isset($data[$this->_primary_key]) || $data[$this->_primary_key] = NULL;
						$this->db->set($data);
						$this->db->insert($this->_table_name);
					}
				}
				//Before we update we want a clean slate so we will reset all data related to our amin subject that wasnt sent
				$all=$this->get_links($id);
				foreach($all as $one){
					$data=array('active'=> false,);
					$this->db->set($data);
					$this->db->where($this->_primary_key, $one->id);
					$this->db->update($this->_table_name);
				}
				//Finally we will activate the connnections the user has sent to us 
				foreach($links_id as $news){
					$the_one=$this->get_spec($news,$id);
					$data=array('active'=> true,);
					$this->db->set($data);
					$this->db->where('id', $the_one->id);
					$this->db->update($this->_table_name);	
				}	
			}// END OF IF STATEMENT (is_array)
		}// END OF ELSE STATEMENT
		$this->session->set_flashdata('links', $this->lang->line('catefory_info_links'));
		redirect($language.'/admin/category/link/'.$id, 'refresh');
	}

	

}


?>