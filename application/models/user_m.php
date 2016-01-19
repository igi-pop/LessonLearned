<?php
class User_M extends MY_Model
{
	
	protected $_table_name = 'users';
	protected $_order_by = 'username';
	
	function __construct ()	{
		parent::__construct();
		$this->load->helper('string');
		$this->load->library('email');
		$this->load->helper('date');
		}

	// Rules for login form
	public $rules = array(
		'email' => array(
			'field' => 'email', 
			'label' => 'Email', 
			'rules' => 'trim|required|valid_email|xss_clean'
		), 
		'password' => array(
			'field' => 'password', 
			'label' => 'Password', 
			'rules' => 'trim|required'
		)
		);

	public $rules_admin = array(
		'username' => array(
			'field' => 'username', 
			'label' => 'Username', 
			'rules' => 'trim|required|xss_clean'
		), 
		'email' => array(
			'field' => 'email', 
			'label' => 'Email', 
			'rules' => 'trim|required|valid_email|callback__unique_email|xss_clean'
		), 
		'password' => array(
			'field' => 'password', 
			'label' => 'Password', 
			'rules' => 'trim|matches[password_confirm]'
		),
		'password_confirm' => array(
			'field' => 'password_confirm', 
			'label' => 'Confirm password', 
			'rules' => 'trim|matches[password]'
		),
		);
	
	// Rules for signup form
	public $rules_signup = array(
		'first_name' => array(
			'field' => 'first_name', 
			'label' => 'First Name', 
			'rules' => 'trim|xss_clean'
		), 
		'last_name' => array(
			'field' => 'last_name', 
			'label' => 'Last Name', 
			'rules' => 'trim|xss_clean'
		), 
		'username' => array(
			'field' => 'username', 
			'label' => 'Username', 
			'rules' => 'trim|required|xss_clean|is_unique[users.username]'
		), 
		'email' => array(
			'field' => 'email', 
			'label' => 'Email', 
			'rules' => 'trim|required|valid_email|callback__unique_email|xss_clean|is_unique[users.email]'
		), 
		 'password' => array(
			'field' => 'password', 
		 	'label' => 'Password', 
		 	'rules' => 'trim|matches[password_confirm]|required'
		 ),
		 	'password_confirm' => array(
		 	'field' => 'password_confirm', 
		 	'label' => 'Confirm password', 
		 	'rules' => 'trim|matches[password]|required'
		 ),
		);
	
	// Rules for email recovery form
	public $rules_recovery = array(
		
		'email' => array(
			'field' => 'email', 
			'label' => 'Email', 
			'rules' => 'trim|required|valid_email|callback__unique_email|xss_clean|matches[email_confirm]'
		), 
		'email_confirm' => array(
			'field' => 'email_confirm', 
			'label' => 'Comfirm Email ', 
			'rules' => 'trim|required|valid_email|callback__unique_email|xss_clean|matches[email]'
		), 
		);
	
	// Rules for password changeing form
	public $rules_password_change = array(
		
		'password' => array(
			'field' => 'password', 
			'label' => 'Password', 
			'rules' => 'trim|matches[password_confirm]'
		),
		'password_confirm' => array(
			'field' => 'password_confirm', 
			'label' => 'Confirm password', 
			'rules' => 'trim|matches[password]'
		), 
		);
	
	public $rules_user_password_change = array(
		'old_password' => array(
			'field' => 'old_password', 
			'label' => 'Current Password', 
			'rules' => 'trim|xss_clean|required|is_pass[users.password]',
		),
		 	'password' => array(
			'field' => 'password', 
			'label' => 'Password', 
			'rules' => 'trim|xss_clean|required|matches[password_confirm]|min_length[6]|'
		),
		 	'password_confirm' => array(
			'field' => 'password_confirm', 
			'label' => 'Confirm password', 
			'rules' => 'trim|xss_clean|required|matches[password]'
		), 
		);
	
	// Rules for user personal information form
	public $rules_user_personal = array(
		'first_name' => array(
			'field' => 'first_name', 
			'label' => 'First Name', 
			'rules' => 'trim|xss_clean'
		), 
		'last_name' => array(
			'field' => 'last_name', 
			'label' => 'Last Name', 
			'rules' => 'trim|xss_clean'
		), 
		'country' => array(
			'field' => 'country', 
			'label' => 'Country', 
			'rules' => 'trim|xss_clean'
		),
		'city' => array(
			'field' => 'city', 
			'label' => 'City', 
			'rules' => 'trim|xss_clean'
		),
		'username' => array(
			'field' => 'username', 
			'label' => 'Username', 
			'rules' => 'trim|xss_clean|callback__unique_username'
		),
	
		);

//----------------------------------------------LOGIN FUNCTIONS------------------------------------------------------------------
	// Description: Checks for user login information and sets session
	public function login (){
		$user = $this->get_by(array(
			'email' => $this->input->post('email'),
			'password' => $this->hash($this->input->post('password')),
			), TRUE);
		
		if (count($user)) {
			// Log in user
			$data = array(
				'username' => $user->username,
				'email' => $user->email,
				'id' => $user->id,
				'loggedin' => TRUE,
			);
			$this->session->set_userdata($data);
		}
		}
	
	/**
	*	Description: facebook login functions(Takes information from facebook and checks existing acounts)
	 *	@param array $user_profile (information from afcebook)
	 */
	public function login_facebook ($user_profile){
		$user = $this->get_by(array(
			'email' => $user_profile['email'],
			), TRUE);
		if (count($user)) {
			// Log in user
			$data = array(
				'username' => $user->username,
				'email' => $user->email,
				'id' => $user->id,
				'facebook_id' => $user->id,
				'loggedin' => TRUE,
			);
			$this->session->set_userdata($data);
		}
		}
	
	// Description: Removes user information from session
	public function logout (){
		$this->load->library('facebook');
        // Logs off session from website
        $this->facebook->destroySession();
		$this->session->sess_destroy();
		}

	/** 
	* 	Description: Checks session data for user logged-in information
	 *	@return boolean
	 */ 
	public function loggedin (){
		return (bool) $this->session->userdata('loggedin');
		}
	
	//	Description: If we are loged in with facebook
	public function loggedin_face (){
		return (bool) $this->session->userdata('user_profile["id"]');
		}
	
	// Description: Creates new user object
	public function get_new(){
		$user = new stdClass();
		$user->username = '';
		$user->email = '';
		$user->first_name = '';
		$user->last_name = '';
		$user->password = '';
		$user->country = '';
		$user->city = '';
		return $user;
		}
	
	/** 
	*	Description: Encrypts password with sha512 encryption code, uses 'config/encryption_key'
	 *	@param string $string (data that you wnat encrypted)
	 *	@return string
	 */
	public function hash ($string){
		return hash('sha512', $string . config_item('encryption_key'));
		}
//----------------------------------------------SIGN UP / ACTIVATION FUNCTIONS---------------------------------------------------
	/** 
	*	Description: Emails notification messages
	 * @param object $data (User information) 
	 * @param string $message (Message to be sent )
	 * @param string $pass (Optional)(If we need to send a non encrypted password back to the users)
	 */
	public function email_to($data, $message, $pass=NULL){
		// Email configuration
		  $config = Array(
		     'protocol' => 'smtp',
		     'smtp_host' => 'smtp.yourdomainname.com.',
		     'smtp_port' => 465,
		     'smtp_user' => 'admin@yourdomainname.com', // change it to yours
		     'smtp_pass' => '******', // change it to yours
		     'mailtype' => 'html',
		     'charset' => 'iso-8859-1',
		     'wordwrap' => TRUE
		  ); 
	  //Setting up email header information
	  $this->load->library('email', $config);
	  $this->email->from($this->lang->line('user_m_from'), $this->lang->line('user_m_from_title'));
	  $this->email->to($data->email);
	  $this->email->cc($this->lang->line('user_m_cc'));
	  $this->email->subject($this->lang->line('user_m_subject'));
	  $this->email->message($message);
	  $data_email['message_op'] = $this->lang->line('user_m_error_not_sent'); 
	  //Sending the email
	   if($this->email->send()){     
	    $data_email['message_op'] = "Mail sent...";   
	   } 
		}

	/** 
	*	Description: Creates new user and sends activation mail
	 * Functions using:  array_from_post (MY_Modal.php), 
	 *					save (MY_Modal.php),
	 *					random_string (Default CI function),
	 *					email_to (user_m.php),
	 *					hash (user_m.php)
	 */
	public function signup ($language="en"){
		//Redirect URLs
		$activation=$language.'/home/activate';

		$id = NULL; //We sed id=NULL becuse we want to create a new user
		$code = random_string('alnum', 32); //Generate random alpha numeric code
		//Setting up default values for the database input
			$array=array(
			'account_active' => '0',
			'code' => $code,
			'new_pass_active' => '0',
			'new_password'	=> 'default',
			'privileges'	=> '1',
			);
		// public function edit ($id = NULL)
		// $this->data['user'] = $this->get_new();

		//Creating a email message  with user information
		$message=$this->lang->line('user_m_message_1');
	  	$message.=$this->lang->line('user_m_message_2')." ".$data['username']." \n ";
	  	$message.=$this->lang->line('user_m_message_3')." ".$pass." \n\n \t ";
	  	$message.=$this->lang->line('user_m_subject_4');
	  	$message.="\n\n http://localhost/codeigniter-LessonLearned/public_html/".$language."/home/activate/".$data['code'];		

		//Formating all the data for updating into the database
		$data = $this->array_from_post(array('username', 'email', 'first_name', 'last_name', 'password'));
		foreach ($array as $key => $field) {
			$data[$key] = $field;
		}
		$pass=$data['password'];
		$this->email_to($data,$message,$pass);
		$data['password'] = $this->hash($data['password']);
		
		
		//Saving data and redirecting
		$this->save($data, $id);
		//Redirecting to user activation page
		redirect($activation);
		}
	
	/** 
	*	Description: Activates account after validation
	 *	Uses function check_activity as validation for a user
	 *	@param STRING $code (unique code for activation)
	 */
	public function activation($code, $language="en"){
		if($this->check_activity($code)){
		//User validation passes
			$data = array(
			'account_active' => '1',
			);

			$this->save($data, $id);
			//Sets up notification and redirecting
			$this->session->set_flashdata('activation', true);
			redirect($language.'/home/activate', 'refresh');
		}
		//User validation fails
		//Sets up error reporting and redirecting
		$this->session->set_flashdata('activation', false);
		redirect($language.'/home/activate', 'refresh');
		}
	
	/** 
	*	Description: Account activation check
	 *	Uses two parameters for validation, if the user exist or if he is already activated
	 *	@param INT $id (User id)
	 *	@param VARCHAR $code (Unique user activation code)
	 *	@return BOOLEAN
	 */
	public function check_activity( $code=NULL){
		if( $code!=NULL){	
			$user = $this->get_by(array(
				'code' => $code,
				'account_active' => '0',
			), TRUE);
			return($user);
		}
		return false;
		}

	/**
	*	Description: facebook signup functions(Takes information from facebook and crates new acounts)
	 *	@param array $user_profile (information from afcebook)
	 */
	public function facebook_signup ($user_profile, $language="en"){
		//Redirect URLs
		$activation=$language.'/home/activate';
		$temp_pass= random_string('alnum', 32);
		$id = NULL; //We sed id=NULL becuse we want to create a new user
		$code = random_string('alnum', 32); //Generate random alpha numeric code
		//Setting up default values for the database input
			$array=array(
			'account_active' => '1',
			'facebook_signup' => '1',
			'facebook_id' => $user_profile['id'],
			'code' => $code,
			'new_pass_active' => '0',
			'new_password'	=> null,
			'password'	=> $temp_pass,
			'username'		=> $user_profile['name'].mt_rand(1000,10000),
			'email'		=> $user_profile['email'],
			'first_name'		=> $user_profile['first_name'],
			'last_name'		=> $user_profile['last_name'],
			'privileges'	=> '2',
			);
		// public function edit ($id = NULL)
		// $this->data['user'] = $this->get_new();

		//Creating a email message  with user information
		$message=$this->lang->line('user_m_message_1');
	  	$message.=$this->lang->line('user_m_message_2')." ".$data['username']." \n ";
	  	$message.=$this->lang->line('user_m_message_3')." ".$pass." \n\n \t ";
	  	$message.=$this->lang->line('user_m_subject_4');
	  	$message.="\n\n http://localhost/codeigniter-LessonLearned/public_html/".$language."/home/activate/".$data['code'];		

		//Formating all the data for updating into the database
		//$data = $this->array_from_post(array('username', 'email', 'first_name', 'last_name', 'password'));
		foreach ($array as $key => $field) {
			$data[$key] = $field;
		}
		$pass=$data['password'];
		$this->email_to($data,$message,$pass);
		$data['password'] = $this->hash($data['password']);
		
		
		//Saving data and redirecting
		$this->save($data, $id);
		//Redirecting to user activation page
		redirect($activation);
		}

	/**
	*	Description: When users signup with faceboook they have they can change their username once
	 *	@param int id (User_id that we want to change the username)
	 *
	 * 	@return Object
 	 */
	public function facebook_account_completed($id){
		$this->db->where('id', $id);
		$this->db->where('facebook_signup', 1);
		$this->db->or_where('id', $id);
		$this->db->where('facebook_signup', 3);
		$result=$this->db->get($this->_table_name)->row();
		return($result);
	}

	/**
	*	Description: When users signup with faceboook they have they can change their password without the old password only once
	 *	@param int id (User_id that we want to change the password)
	 *
	 * 	@return Object
 	 */
	public function facebook_password_completed($id){
		$this->db->where('id', $id);
		$this->db->where('facebook_signup', 1);
		$this->db->or_where('id', $id);
		$this->db->where('facebook_signup', 2);
		$result=$this->db->get($this->_table_name)->row();
		return($result);
	}

//----------------------------------------------PASSWORD RECOVERY FUNCTIONS------------------------------------------------------
	/** 
	*	Description: Validation check for password recovery form
	 *	Explanation: The user needs have a code set with a 'new_pass_active=1' and 'expiration' timestamp higher tahn the 'current' timestamp 
	 *	@param STRING $code
	 *	@return boolean/object
	 */
	public function recovery_test( $code=NULL, $language="en"){
		$user=NULL;
		$redirect='/'.$language.'/home/recovery/'.$code;
		$now=now();
		
			$user = $this->get_by(array(
				'code' => $code,
				'new_pass_active' => '1',
				'expiration >' => $now,
			), TRUE);
			
			if($user){
				return ($user);
			}
			return false;
			
		}
	
	/** 
	*	Description: Checks user account activity and returns active user information
	 *	@param STRING $email(User email)
	 *	@return array (User information) 
	 */	
	public function active_user($email){
		$email_result = $this->get_by(array(
			'email' => $email,
			'account_active'	=> 1 ,
		), TRUE);
		return($email_result);
		}

	/**
	*	Derscription:Checking if the username is available
	 *	@param string $username(the username we are checking)
	 *
	 * 	@return boolean
	 */
	public function active_username($username){
		$email = $this->get_by(array(
			'username' => $username,
		), TRUE);
		return($email);
		}
	/** 
	*	Description: Activates user password changeing form with valid code information
	 *	Explanation, Sets the data('new_pass_active', 'code' and 'expiration' to valid data that are sent to the user via email)
	 *	@param object $data (User information)
	 */
	public function password_recovery($data, $language="en"){
		$expiration_time=time() + (30 * 60); //Create a Unix timestamp for 30min
		$expiration_human=unix_to_human($expiration_time); //Human readable date
		$current_time=now(); //The current Unix timestamp
		$code = random_string('alnum', 32);//Generate random alpha numeric code
		//Default values for enableing the password chaning form
			$data_recovery = array(
				'new_pass_active' => '1',
				'code' => $code,
				'expiration' =>$expiration_time,
				);
		
		$id=$data->id;
		$data->code=$code;
		$this->save($data_recovery, $id);
		$message ="\t ".$data->username.$this->lang->line('user_m_recovery_message'); 
		$message .="http://localhost/codeigniter-LessonLearned/public_html/".$language."/home/recovery/".$data->code;
		
		$this->email_to($data,$message);
		}

	/**
	*	Description: When the user signups with facebook, use this password change for one change. 
	 *	@param int 	$id (user id) 
	 */
	public function user_password_change($id){
		if($this->facebook_password_completed($this->session->userdata('id'))){
			$data = $this->array_from_post(array('password', 'facebook_signup' ));
		}
		else{
			$data = $this->array_from_post(array('password'));
		}
		$data['password'] = $this->hash($data['password']);
		//Saving data and redirecting
		$this->save($data, $id);
	}

	/** 
	*	Description: Changes the user password and send notification email to the user
	 * 	@param INT $id (User identification number)
	 */
	public function password_change($id){
		$now=now();
		$pass=$this->input->post('password');
		$message  =$this->lang->line('user_m_pass_change_message_1');
	  	$message .=$this->lang->line('user_m_pass_change_message_2').$pass." \n\n \t ";
	  	$message .=$this->lang->line('user_m_pass_change_message_3');
	  	$message .=$this->lang->line('user_m_pass_change_subject_4');

		//Setting up default values
			$array=array(
			'new_pass_active' => '0',
			'expiration'	=> $now,
			);
		$data = $this->array_from_post(array('password'));
		foreach ($array as $key => $field) {
			$data[$key] = $field;
		}

		
		$data['password'] = $this->hash($data['password']);

		//Saving data and redirecting
		$this->save($data, $id);

		$user = $this->get_by(array(
			'id' => $id,
			'account_active' => '1',
		), TRUE);
		$this->email_to($user,$message,$pass);
		}
//----------------------------------------------INFORMATION RETRIVAL-------------------------------------------------------------
	public function get_by_id($column, $id){
		$lesson_array=array($column => $id);
		$result=parent::get_by_id($lesson_array, true);
		return ($result);
		}
//----------------------------------------------USER INFORMATION CHANGES FUNCTIONS-------------------------------------------------------------
	/**
	*	Description: Changing active users personal information
	 *	@param int $id (user_id)
	 */
	public function change_personal_info($id=0, $language="en"){
		//Redirect URLs
		$personal=$language.'/user/profile/settings/personal';
		$data = $this->array_from_post(array( 'first_name', 'last_name','country','city'));
		if($this->input->post('facebook_signup') != NULL )
		{
			$data = $this->array_from_post(array('username','first_name', 'last_name','country','city','facebook_signup'));
		}
		//Saving data and redirecting
		$this->save($data, $id);
		//Redirecting to user activation page
		redirect($personal, 'refresh');
	}

	/**
	*	Description: Deleting old userpictures when a new picture is updated(deleting from the database and the server)
	 *	@param int user_id(user_id that ahs changed his profile picture)
	 */
	public function delete_old_files($user_id){
		$user=$this->get_by_id('id', $user_id);
		$avatar_path=$user->avatar;
		$thumb_path=$user->thumb;
		if($avatar_path != NULL)
			unlink($avatar_path);
		if($thumb_path != NULL)
			unlink($thumb_path);// ( BUGFIX zapravio ne pravi koppiju u drugom folderu)
	}

	/**
	*	Description: Updating users avatar
	 *	@param int $user_id (user identification number)
	 *	@param string $avatar (avatar path)
	 * 	@param string $thumb (Thumbnail path)
	 */
	public function updateProfile($user_id, $avatar, $thumb){
		if($_FILES['user_avatar']['error'] == 0){
			$relative_url_a = $avatar;
			$profile_data['avatar'] = $relative_url_a;
			$relative_url_t = $thumb;
			$profile_data['thumb'] = $relative_url_t;
			$this->delete_old_files($user_id);
		}
		$this->db->where('id', $user_id);
		$this->db->update('users', $profile_data);
		}

	/**
	*	Description: Used for changing an Absolute image path to a relative image path
	 *				(Relative paths are needed for displaying images in the website)
	 *				(Absolute image paths are in the database and are needed for changing pictures on the server)
	 *	@param object $user_info (user information) 
	 *	@return string 
	 */
	public function image_path($user_info){
		$i=3; 
	    $string='';
	     if($user_info != null){
	     	if($user_info->avatar != null){
				$link_part=explode("/", $user_info->avatar);
			    while(isset($link_part[$i])){
			        $string .='/'.$link_part[$i];
			        $i++;
			     }
	     	}
	 	}
	     if($string==NULL)
	     {
	     	$string="codeigniter-LessonLearned/public_html/images/placeholder.png";
	     }
	     $string='http://localhost/'.$string;
	     return($string);
		}

		public function thumb_path($user_info)
		{
		$i=3; 
	    $string='';
	    if($user_info != null){
	    	if($user_info->thumb != null){
				$link_part=explode("/", $user_info->thumb);
			    while(isset($link_part[$i])){
			        $string .='/'.$link_part[$i];
			        $i++;
			    }
	 		}
	     }
	     if($string==NULL)
	     {
	     	$string="codeigniter-LessonLearned/public_html/images/placeholder.png";
	     }
	     $string='http://localhost/'.$string;
	     return($string);


	    
		}
	
//----------------------------------------------   CHECKING DATA   -------------------------------------------------------------

	/**
	*	Description:Checking if the logged in user ahs administrator permisions
	 *	@param $true (test variable, used for testing the function)
	 */
	public function admin_permission($true=false, $language="en"){
		$this->db->where('id', $this->session->userdata('id'));
		$this->db->where('privileges >', 6);
		$query=$this->db->get($this->_table_name)->row();
		if($true == true){
			if($query == null)
				redirect($language.'/user/category/');	
		}else{
		return($query);
		}
	}

	/**
	*	Description: Checking if the logged in user ahs developer permisions
	 *	@param $true (test variable, used for testing the function)
	 */
	public function developer_permission($true=false, $language="en"){		
		$this->db->where('id', $this->session->userdata('id'));
		$this->db->where('privileges >', 4);
		$query=$this->db->get($this->_table_name)->row();
		if($true == true){
			if($query == null)
				redirect($language.'/user/category/');		
		}else{
		return($query);
		}
	}

	// Checking if the username is taken not including your currently(used for validation forms)
	public function _unique_username ($str){
		// Do NOT validate if email already exists
		// UNLESS it's the email for the current user
		
		$id = $this->session->userdata('id');
		$this->db->where('username', $this->input->post('username'));
		!$id || $this->db->where('id !=', $id);
		$user = $this->user_m->get();
		
		if (count($user)) {
			$this->form_validation->set_message('_unique_username', '%s should be unique');
			return FALSE;
		}
		
		return TRUE;
	}

//----------------------------------------------   Creating content   -------------------------------------------------------------

	/**
	*	Description: Creating a table heaqder for administrator table(links can be ordered, and there is also a search)
	 *	@param string $order (orderg by columns)
	 *	@param string $type (what tupe of ordering you wnat "ascending"/"descending")
	 *	@param int $page (pagination of the page)
	 *	@param string $match (Search variable) 
	 *
	 *	@return string
	 */
	public function tabel_header($order='username', $type='asc', $page=0, $match='-', $language="en"){	
		$links='';
		$cat_order='';
		$fn_order='';
		$ln_order='';
		$cor_order='';
		$les_order='';
		$mod_order='';
		$act_order='';
	
		if($type != 'asc' AND $type!='desc'){
			$type='asc';
		}
		switch($order){
			case 'username':
			$cat_order='active';
			break;
			case 'first-name':
			$fn_order='active';
			break;
			case 'last-name':
			$ln_order='active';
			break;
			case 'email':
			$cor_order='active';
			break;
			case 'status':
			$les_order='active';
			break;
			case 'active':
			$mod_order='active';
			break;
			default:
			$cat_order='active';
			break;
		}
		$page = ($this->uri->segment(7)) ? $this->uri->segment(7) : 0;

		$links.="<tr class=\"center\">";
		$links.= "<th class=\"center\"><a class=\" dark-limegreen-link\" href=\"".base_url().$language."/admin/user/order/username/".$type."/".$page."/".$match."/\" >".$this->lang->line('user_m_table_username')."</a> ";
		if($cat_order !=''){
			if($type=='desc'){
				$links.="	<a class=\" dark-limegreen-link\" href=\"".base_url().$language."/admin/user/order/".$order."/asc/".$page."/".$match."/\" class=\"\">";
				$links.= 	"<i class=\"glyphicon glyphicon-chevron-down\"></i>";
				$links.="	</a>";
			}else{
				$links.="	<a class=\" dark-limegreen-link\" href=\"".base_url().$language."/admin/user/order/".$order."/desc/".$page."/".$match."/\" class=\"\">";
				$links.= 	"<i class=\"glyphicon glyphicon-chevron-up\"></i>";
			$links.="</a>";
			}

		}  
		$links.= "</th>";
		
		$links.= "<th class=\"center\"><a class=\" dark-limegreen-link\" href=\"".base_url().$language."/admin/user/order/first-name/".$type."/".$page."/".$match."/\" class=\"\">".$this->lang->line('user_m_table_first_name')."</a> ";
		if($fn_order !=''){
			if($type=='desc'){
				$links.="	<a class=\" dark-limegreen-link\" href=\"".base_url().$language."/admin/user/order/".$order."/asc/".$page."/".$match."/\" class=\"\">";
				$links.= 	"<i class=\"glyphicon glyphicon-chevron-down\"></i>";
				$links.="	</a>";
			}else{
				$links.="	<a class=\" dark-limegreen-link\" href=\"".base_url().$language."/admin/user/order/".$order."/desc/".$page."/".$match."/\" class=\"\">";
				$links.= 	"<i class=\"glyphicon glyphicon-chevron-up\"></i>";
			$links.="</a>";
			}

		}  
		$links.= "</th>";
		
		$links.= "<th class=\"center\"><a class=\" dark-limegreen-link\" href=\"".base_url().$language."/admin/user/order/last-name/".$type."/".$page."/".$match."/\" class=\"\">".$this->lang->line('user_m_table_last_name')."</a> ";
		if($ln_order !=''){
			if($type=='desc'){
				$links.="	<a class=\" dark-limegreen-link\" href=\"".base_url().$language."/admin/user/order/".$order."/asc/".$page."/".$match."/\" class=\"\">";
				$links.= 	"<i class=\"glyphicon glyphicon-chevron-down\"></i>";
				$links.="	</a>";
			}else{
				$links.="	<a class=\" dark-limegreen-link\" href=\"".base_url().$language."/admin/user/order/".$order."/desc/".$page."/".$match."/\" class=\"\">";
				$links.= 	"<i class=\"glyphicon glyphicon-chevron-up\"></i>";
			$links.="</a>";
			}

		}  
		$links.= "</th>";
		$links.= "<th class=\"center\" ><a class=\" dark-limegreen-link\" href=\"".base_url().$language."/admin/user/order/email/".$type."/".$page."/".$match."/\" class=\"\">".$this->lang->line('user_m_table_email')."</a> ";
		if($cor_order !=''){
			if($type=='desc'){
				$links.="	<a class=\" dark-limegreen-link\" href=\"".base_url().$language."/admin/user/order/".$order."/asc/".$page."/".$match."/\" class=\"\">";
				$links.= 	"<i class=\"glyphicon glyphicon-chevron-down\"></i>";
				$links.="	</a>";
			}else{
				$links.="	<a class=\" dark-limegreen-link\" href=\"".base_url().$language."/admin/user/order/".$order."/desc/".$page."/".$match."/\" class=\"\">";
				$links.= 	"<i class=\"glyphicon glyphicon-chevron-up\"></i>";
				$links.="</a>";
			}

		}  
		$links.= "</th>";
		$links.= "<th class=\"center\"> Courses</th>";
		$links.= "<th class=\"center\"><a class=\" dark-limegreen-link\" href=\"".base_url().$language."/admin/user/order/status/".$type."/".$page."/".$match."/\" class=\"\">".$this->lang->line('user_m_table_status')."</a> ";
		if($les_order !=''){
			if($type=='desc'){
				$links.="	<a class=\" dark-limegreen-link\" href=\"".base_url().$language."/admin/user/order/".$order."/asc/".$page."/".$match."/\" class=\"\">";
				$links.= 	"<i class=\"glyphicon glyphicon-chevron-down\"></i>";
				$links.="	</a>";
			}else{
				$links.="	<a class=\" dark-limegreen-link\" href=\"".base_url().$language."/admin/user/order/".$order."/desc/".$page."/".$match."/\" class=\"\">";
				$links.= 	"<i class=\"glyphicon glyphicon-chevron-up\"></i>";
				$links.="</a>";
			}

		}  
		$links.= "</th>";
		
		$links.= "<th class=\"center\"><a class=\" dark-limegreen-link\" href=\"".base_url().$language."/admin/user/order/active/".$type."/".$page."/".$match."\" class=\"\">".$this->lang->line('user_m_table_active')."</a> ";
		if($mod_order !=''){
			if($type=='desc'){
				$links.="	<a class=\" dark-limegreen-link\" href=\"".base_url().$language."/admin/user/order/".$order."/asc/".$page."/".$match."\" class=\"\">";
				$links.= 	"<i class=\"glyphicon glyphicon-chevron-down\"></i>";
				$links.="	</a>";
			}else{
				$links.="	<a class=\" dark-limegreen-link\" href=\"".base_url().$language."/admin/user/order/".$order."/desc/".$page."/".$match."\" class=\"\">";
				$links.= 	"<i class=\"glyphicon glyphicon-chevron-up\"></i>";
				$links.="</a>";
			}

		}  
		$links.= "<th class=\"center\">".$this->lang->line('permit')."</th>
				<th class=\"center\">".$this->lang->line('edit')."</th>
				<th class=\"center\">".$this->lang->line('delete')."</th>
			</tr>";


		return($links);
	}


}