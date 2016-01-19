<?php
class User extends Admin_Controller {

	public function __construct (){
		parent::__construct();
		$this->load->model('course_m');
		$this->data['language']='sr';
	}

	/**
	 *	Description: Displaying users in a table(Connected with order function for more detailed filtering options)
	 *	@param 	string 		order(the colum thay you want to order by)
	 * 	@param 	string 		type (the type of orderring ascending/descending)
	 */
	public function index ($order='username', $type='asc'){
		//Secondary order parameter
		$order1=$order;
		//Defaulting page_links
		$this->data['page_links']='';
		//Setting default order
		if($order== NULL){
			$order1='username';
		}
		//Setting default url
		$this->data['url']="/".$order1.'/'.$type.'/';
		//Search parameter
		if(empty($match))
			$match='-';

		$this->data['links']=$this->user_m->tabel_header($order, $type, $page=0, $match, $this->data['language']);
		$this->data['type']=$type;

		// Fetch all users
		$this->data['users'] = $this->user_m->get();
		
		if($this->input->post('match') != null) {
			$match=$this->input->post('match');
			redirect($this->data['language'].'/admin/user/order'.$this->data['url'].$match, 'refresh') ;
		}
		// Load view
		$this->data['subview'] = 'en/1-admin/components/views/user/index';
		$this->load->view('en/1-admin/layout/_layout_main', $this->data);
		}
	
	/**
	 *	Description: All users shown in a table with ordering options(serach option)
	 * 	@param 	string order (The order of the tabel by its columms)
	 * 	@param 	string type (The type of ordering, ascending/descending)
	 * 	@param 	string match(Optional) (matching table entries to the search field)
	 */
	public function order($order=null, $type='asc', $match='-'){
		//Secondary order parameter
		$order1=$order;
		if($order== NULL){
			$order1='username';
		}
		//Setting default url
		$this->data['url']="/".$order1.'/'.$type.'/';
		if(empty($match))
			//Search parameter
			$match='-';

		$this->data['links']=$this->user_m->tabel_header($order, $type,$page=0, $match, $this->data['language']);
		$this->data['type']=$type;

		//defaulting the type of search
		if($type != 'asc' AND $type!='desc'){
			$type='asc';
		}
		//Defaulting the order_by
		$this->db->order_by('username', $type);
		//-------------------- Configuring the Pagination ----------------------
			$config = array();
	        $config["base_url"] = base_url() . $this->data['language']."/admin/user/order/".$order."/".$type.'/'.$match;
		        //Defaulting the match parameter
		        if($match=='-')
					$match=NULL;
	        $config["total_rows"] = $this->user_m->record_count(null, $match);
	        $config['num_links'] = 3;
	        $config["per_page"] = 10;
	        $config["uri_segment"] = 8;
	        

	        // Configuring styles for pagination (Located in '/library/MY_PAgination')
	        foreach($this->my_pagination->set_style() as $key => $value)
	        	$config[$key] =$value;

	        switch($order){
				case 'username':
				$this->db->order_by('username', $type);
				break;
				case 'first-name':
				$this->db->order_by('first_name', $type);
				break;
				case 'last-name':
				$this->db->order_by('last_name', $type);
				break;
				case 'email':
				$this->db->order_by('email', $type);
				break;
				case 'status':
				$this->db->order_by('privileges',$type);
				break;
				case 'active':
				$this->db->order_by('account_active', $type);
				break;
				default:
				$this->db->order_by('username', $type);
				break;
			}


			$this->pagination->initialize($config);
			 $this->data["course_data"]=' ';
			$page = ($this->uri->segment(8)) ? $this->uri->segment(8) : 0;
	        $this->data["users"] = $this->user_m->fetch_limit($config["per_page"], $page, null, $match);
	        $this->data["page_links"] = $this->pagination->create_links();
       	//-------------------- Configuring the Pagination ----------------------
		
		//Search options
		if($this->input->post('match') != null) {
			//Redirecting to display the search results
			$match=$this->input->post('match');
			redirect($this->data['language'].'/admin/user/order'.$this->data['url'].$match, 'refresh') ;
		}
		// Load view
		$this->data['subview'] = 'en/1-admin/components/views/user/index';
		$this->load->view('en/1-admin/layout/_layout_main', $this->data);
	}

	public function edit ($id = NULL){
		if($this->user_m->admin_permission()){
		
		// Fetch a user or set a new one
		if(count($this->user_m->get($id))){
			if ($id) {
				$this->data['user'] = $this->user_m->get($id);
				count($this->data['user']) || $this->data['error'][] = $this->lang->line('user_error_not_found');
			}
			else {
				$this->data['user'] = $this->user_m->get_new();
			}
		}
		else{
			redirect($this->data['language'].'/admin/user/edit/');
		}
		
		// Set up the form
		$rules = $this->user_m->rules_admin;
		$id || $rules['password']['rules'] .= '|required';
		$this->form_validation->set_rules($rules);
		
		// Process the form
		if ($this->form_validation->run() == TRUE) {
			$data = $this->user_m->array_from_post(array('username','first_name', 'last_name', 'email', 'password','country','city','privileges'));
			$data['password'] = $this->user_m->hash($data['password']);
			$this->user_m->save($data, $id);
			redirect($this->data['language'].'/admin/user');
		}
		
			// Load the view
			$this->data['subview'] = 'en/1-admin/components/views/user/edit';
			$this->load->view('en/1-admin/layout/_layout_main', $this->data);
		}else{	
		$this->session->set_flashdata('error', 'You don\'t have permission to edit this user or the user is has the same status as you.');
		redirect($this->data['language'].'/admin/user/');}
	}

	/**
  	 * Description: Allows administrators delete users, check for administrator permission and if the lesson is valid.
   	 * @param int id (Determins which user is going to be deleted)
   	 */
	public function delete ($id=NULL){
		if($this->user_m->admin_permission() AND ((bool)$this->user_m->get_by_id('id', $id)) == true){
			//When the user exists and we have permission to delete him
			$this->user_m->delete($id);
			$this->session->set_flashdata('message', $this->lang->line('user_infor_success_delete'));	
			redirect($this->data['language'].'/admin/user/');
		}elseif(((bool)$this->user_m->get_by_id('id', $id)) == false OR $id=NULL){
			//when we didn't get an id of the user, or the user id is invalid
			$this->session->set_flashdata('error', $this->lang->line('user_error_invalid'));
			redirect($this->data['language'].'/admin/user/');
		}
		else{
			//When the user exist but we don't have permission to delete him
			$this->session->set_flashdata('error', $this->lang->line('user_error_no_permisssion'));
			redirect($this->data['language'].'/admin/user/');
		}
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

	/**
	 *	Description: Display an specific users permission status and allows the administrator to change its
	 *	@param int 	id(The unique user id)		
	 */
	public function permission($id=NULL){
		//gets all users
		$this->data['users'] = $this->user_m->get();
		
		// Checks if the user id macheck an existing user
		if(count($this->user_m->get($id))){
			if ($id) {
				//if its valid it retrieves user information or sets an error
				$this->data['user'] = $this->user_m->get($id);
				count($this->data['user']) || $this->data['error'][] = $this->lang->line('user_error_not_found');
				$this->data['current_id']=$id;
			}
			else {
				//redirecting if the user isnt found
				redirect($this->data['language'].'/admin/user/index/');
			}
		}
		else{
			//redirecting if the user isnt found
			redirect($this->data['language'].'/admin/user/index/');
		}
		
		// Process the form
		if ($this->form_validation->run() == TRUE) {
			//Format the form data into an array
			$data = $this->user_m->array_from_post(array('username','first_name', 'last_name', 'email', 'password','country','city','privileges'));
			$data['password'] = $this->user_m->hash($data['password']);
			//saves the user permissions and redirect us
			$this->user_m->save($data, $id);
			redirect($this->data['language'].'/admin/user');
		}
		// Load view
		$this->data['subview'] = 'en/1-admin/components/views/user/main_user_permission';
		$this->load->view('en/1-admin/layout/_layout_main', $this->data);
	}

	/**
	 *	Description: Changing the users permison
	 */
	public function perm_change(){
		//Check if we sent the data via an form
		if ($this->input->post('submit')) {
			//Formats the data from a form into an array
			$data = $this->user_m->array_from_post(array('privileges'));
			//Saves the data into the database and reidrects us
			$this->user_m->save($data, $this->input->post('id'));
			redirect($this->data['language'].'/admin/user');
		}
		//redirects us if we didnt use an form(Direct access)
		redirect($this->data['language'].'/admin/user');
	}


}