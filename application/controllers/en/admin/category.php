<?php
class Category extends Admin_Controller
{

	public function __construct (){
		parent::__construct();
		$this->data['language']='en';
		$this->load->model('category_m');
		$this->load->model('course_m');
		$this->load->model('cat_link_m');
	}
	
	/**
	 *	Description: Index page for categories, shows all the categories in a table.
	 */
	public function index ($order='category', $type="asc", $match='-'){
		$order1=$order;
		if($order== NULL){
			$order1='category';
		}
		//Setting default url
		$this->data['url']="/".$order1.'/'.$type.'/';
		if(empty($match))
			//Search parameter
			$match='-';

		$this->data['links']=$this->category_m->tabel_header($order, $type,$page=0, $match, $this->data['language']);
		$this->data['type']=$type;

		//defaulting the type of search
		if($type != 'asc' AND $type!='desc'){
			$type='asc';
		}

		if($match != '-' OR $match==NULL){
			$field= array(
					'description'	=> $match,
					'category_name'	=> $match,
					'cat_slug'		=>$match,
					);
			}else{
				$field=null;
			}
		
		//Defaulting the order_by
		$this->db->order_by('category_name', $type);
		//-------------------- Configuring the Pagination ----------------------
			$config = array();
	        $config["base_url"] = base_url() . $this->data['language']."/admin/category/order/".$order."/".$type.'/'.$match;
		        //Defaulting the match parameter
		        if($match=='-')
					$match=NULL;
	        $config["total_rows"] = $this->category_m->record_count($field, $match, true);
	        $config['num_links'] = 3;
	        $config["per_page"] = 10;
	        $config["uri_segment"] = 8;
	        

	        // Configuring styles for pagination (Located in '/library/MY_PAgination')
	        foreach($this->my_pagination->set_style() as $key => $value)
	        	$config[$key] =$value;

	        switch($order){
				case 'category':
				$this->db->order_by('category_name', $type);
				break;
				case 'slug':
				$this->db->order_by('cat_slug', $type);
				break;
				case 'Description':
				$this->db->order_by('description', $type);
				break;
				case 'date':
				$this->db->order_by('pub_date', $type);
				break;
				case 'approved':
				$this->db->order_by('approved',$type);
				break;
				default:
				$this->db->order_by('category_name', $type);
				break;
			}
			

			$this->pagination->initialize($config);
			 $this->data["course_data"]=' ';
			$page = ($this->uri->segment(8)) ? $this->uri->segment(8) : 0;
	        $this->data['categories'] = $this->category_m->fetch_limit($config["per_page"], $page, $field, $match, true);
	        $this->data["page_links"] = $this->pagination->create_links();
       	//-------------------- Configuring the Pagination ----------------------
		
		//Search options
		if($this->input->post('match') != null) {
			//Redirecting to display the search results
			$match=$this->input->post('match');
			redirect($this->data['language'].'/admin/category/order'.$this->data['url'].$match, 'refresh') ;
		}




		// Load view
		$this->data['subview'] = 'en/1-admin/components/views/main_category_index';
		$this->load->view('en/1-admin/layout/_layout_main', $this->data);
	}

	public function order ($order='category', $type="asc", $match='-'){
		//Secondary order parameter
		$order1=$order;
		if($order== NULL){
			$order1='category';
		}
		//Setting default url
		$this->data['url']="/".$order1.'/'.$type.'/';
		if(empty($match))
			//Search parameter
			$match='-';

		$this->data['links']=$this->category_m->tabel_header($order, $type,$page=0, $match, $this->data['language']);
		$this->data['type']=$type;

		//defaulting the type of search
		if($type != 'asc' AND $type!='desc'){
			$type='asc';
		}

		if($match != '-' OR $match==NULL){
			$field= array(
					'description'	=> $match,
					'category_name'	=> $match,
					'cat_slug'		=>$match,
					);
			}else{
				$field=null;
			}
		
		//Defaulting the order_by
		$this->db->order_by('category_name', $type);
		//-------------------- Configuring the Pagination ----------------------
			$config = array();
	        $config["base_url"] = base_url() . $this->data['language']."/admin/category/order/".$order."/".$type.'/'.$match;
		        //Defaulting the match parameter
		        if($match=='-')
					$match=NULL;
	        $config["total_rows"] = $this->category_m->record_count($field, $match, true);
	        $config['num_links'] = 3;
	        $config["per_page"] = 10;
	        $config["uri_segment"] = 8;
	        

	        // Configuring styles for pagination (Located in '/library/MY_PAgination')
	        foreach($this->my_pagination->set_style() as $key => $value)
	        	$config[$key] =$value;

	        switch($order){
				case 'category':
				$this->db->order_by('category_name', $type);
				break;
				case 'slug':
				$this->db->order_by('cat_slug', $type);
				break;
				case 'Description':
				$this->db->order_by('description', $type);
				break;
				case 'date':
				$this->db->order_by('pub_date', $type);
				break;
				case 'approved':
				$this->db->order_by('approved',$type);
				break;
				default:
				$this->db->order_by('category_name', $type);
				break;
			}
			

			$this->pagination->initialize($config);
			 $this->data["course_data"]=' ';
			$page = ($this->uri->segment(8)) ? $this->uri->segment(8) : 0;
	        $this->data['categories'] = $this->category_m->fetch_limit($config["per_page"], $page, $field, $match, true);
	        $this->data["page_links"] = $this->pagination->create_links();
       	//-------------------- Configuring the Pagination ----------------------
		
		//Search options
		if($this->input->post('match') != null) {
			//Redirecting to display the search results
			$match=$this->input->post('match');
			redirect($this->data['language'].'/admin/category/order'.$this->data['url'].$match, 'refresh') ;
		}



		$this->data['url']="/";
		// Fetch all users
			//$this->data['categories'] = $this->category_m->get();	
		// Load view
		$this->data['subview'] = 'en/1-admin/components/views/main_category_index';
		$this->load->view('en/1-admin/layout/_layout_main', $this->data);
	}
	/**
	 *	Description: The category editing page, check is the category exists before it can be edited
	 *	@param int category_id (used for setting information for editing of a specific category)
	 */
	public function edit ($category_id = NULL){
		//Checking if the category exists
		if ($category_id !=NULL AND  $this->category_m->get_by_id($category_id ,false) != NULL) {
			//Passing the category information to the view
			$this->data['category'] = $this->category_m->get_by_id($category_id ,false);
			//setting error message if the category doesn't exist
			count($this->data['category']) || $this->data['errors'][] =  $this->lang->line('category_error_not_found');
		}
		else {
			//If there is no category_id or it doesnt exist we will add a new category
			$this->data['category'] = $this->category_m->get_new();
		}
		// Set up the form rules
		$rules = $this->category_m->rules;
		if($this->data['category']){
			if($this->data['category']->cat_slug != $this->input->post('cat_slug')){
				$rules['cat_slug']['rules'].='|is_unique[category.cat_slug]';
			}
		}else{
			$rules['cat_slug']['rules'].='|is_unique[category.cat_slug]';
		}
		$this->form_validation->set_rules($rules);		
		// Process the form
		if ($this->form_validation->run() == TRUE) {
			//Formating the data from the form
			$data = $this->category_m->array_from_post(array('category_name','cat_slug', 'description', 'description_sr'));
			$data['cat_slug']=seoUrl($data['cat_slug']);
			//Saving to the database  
			$this->category_m->save($data, $category_id );
			redirect($this->data['language'].'/admin/category');
		}
		// Load the views
		$this->data['subview'] = 'en/1-admin/components/views/main_category_edit';
		$this->load->view('en/1-admin/layout/_layout_main', $this->data);
	}

	/**
	 *	Description: Activation form for categories
	 */
	public function activate($category_id=null){
		if($category_id !=null AND (bool)($this->category_m->get_by_id($category_id, false)) == true){
			// Getting alll the categories
			$this->data['categories'][0] = $this->category_m->get_by_id($category_id, false);	
		}else{
		// Getting alll the categories
		$this->data['categories'] = $this->category_m->get();	
		}
		// Load views
		$this->data['subview'] = 'en/1-admin/components/views/main_category_active';
		$this->load->view('en/1-admin/layout/_layout_main', $this->data);
	}

	/**
	 *	Description: Activates/deactivates a category
	 */
	public function active(){
		//Checks if a form is sent
		if($this->input->post('submit')){
				//Setting up data for database input
			$id=$this->input->post('category_id');
			$data=array('approved' => $this->input->post('approved'));
				//Inputing into the database
			$this->category_m->save($data,$id);
				//Setting up success message and redirecting the user
			$this->session->set_flashdata('message', $this->lang->line('catefory_info_active'));
			redirect($this->data['language'].'/admin/category/activate', 'refresh');
		}
	}

	/**
  	 * Description: Allows administrators delete categories, check for administrator permission.
   	 * @param int id (Determins which category is going to be deleted)
   	 */
	public function delete ($id){
		//Checking for administrator permissions
		if($this->user_m->admin_permission()){
			//Deleteing the data from the database
			$this->category_m->delete($id);
			//Setting up success messege and redirecting
		 	$this->session->set_flashdata('message', $this->lang->line('category_info_delete'));
			redirect($this->data['language'].'/admin/category/');
		}
		else{
			//Setting up error messege when we don't have administrator permissions and redirecting
			$this->session->set_flashdata('error', 	$this->lang->line('category_error_delete_no_permit'));
			redirect($this->data['language'].'/admin/category/');
		}
	}

	/**
	 *	Description: Links 2 or more categories that are related to each other
	 *	@param int link (category_id we want to link to other categories)
	 * 					(Note: if the "$link" is NULL it will give the default screen for choosing a category we would like to link)		
	 */
	public function link($link=NULL){
		// Get all category information(of all categories)
		$this->data['categories'] = $this->category_m->get();
		// Passing the ide to the view
		$this->data['current_id']=$link;
		// Defaulting variable
		$this->data['next_panel']="";

		// Process form(No validation required here because we only get the checkbox's)
		if ($this->form_validation->run() == TRUE) {
			// Process all the category_ids you want to link with the current selected category(put the in to an array before saving to database)
				$link_ids=$this->cat_link_m->array_from_post('category');
			// Saving to database(if the link already exist its updated, if it doesnt its created)
				$this->cat_link_m->update_links($link, $link_ids, $this->data['language']);
				$link_ids=0;
		}else{
			//Setting up error on data validation errors
			$this->session->set_flashdata('e_login', 'true');
		}
		if($this->input->post('submit')){
			// If we sent the form request we can update the database
			$result=$this->cat_link_m->update_links($link, $this->input->post('category'), $this->data['language']);
		}
		if($link!=NULL AND ((bool)$this->category_m->get_by_id($link)) == true AND is_numeric($link) == true){// BUGFIX napravi tako da ako je link invalid da da ekran za biranje linka
			//If the link is not given then we will only show the screen where we pick a category
			$this->data['chain']=$chain = $this->cat_link_m->get_links($link);
			$this->data['links']=$this->category_m->sort_linked($chain, $link);
			
			// Load views
			$this->data['subview'] = 'en/1-admin/components/views/main_category_link';
			$this->data['next_panel']='en/1-admin/components/views/main_category_link_np';
		}elseif($link==NULL){
			//If the link is not given then we will only show the screen where we pick a category
			$this->data['chain']=$chain = $this->cat_link_m->get_links($link);
			$this->data['links']=$this->category_m->sort_linked($chain, $link);
		
			// Loading ordinery picking view when no id is present
			$this->data['subview'] = 'en/1-admin/components/views/main_category_link';
		}
		else{
			// Showing 404 error on non  existing categories or misstyped urls
			$this->data['subview'] = 'en/0-components/404';
		}
		// Load views
		$this->load->view('en/1-admin/layout/_layout_main', $this->data);
	}
		
	/**
	 *	Description: function used for a custom form validation rule
	 *				 (Note: checks for a unique email but excludes the current users email adress)
	 *	@param string str(the user input, most likely a email text input)		
	 */
	public function _unique_email ($str){
		// Do NOT validate if email already exists
		// UNLESS it's the email for the current user
		$id = $this->uri->segment(5);
		$this->db->where('email', $this->input->post('email'));
		!$id || $this->db->where('id !=', $id);
		$user = $this->user_m->get();	
		if (count($user)) {
			$this->form_validation->set_message('_unique_email', $this->lang->line('error_is_unique'));
			return FALSE;
		}
		
		return TRUE;
	}
}