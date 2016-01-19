<?php 


class Home extends Frontend_Controller{

	public function __construct()
		{
			parent::__construct();
			$this->session->set_userdata('language', 'english');
			$this->data['language']='en';
			$this->load->helper('url');
			$this->load->helper('captcha');
			$this->load->model('page_m');
			$this->load->library('facebook');
			$this->load->library('session');
			
			$total_url = $this->uri->uri_string();
		$this->data['lang_url'] = $this->uri->segment(1);
		$this->data['total_url'] = str_replace ("/","--", $total_url);
		

			$user_language = $this->session->userdata('language');
		$this->lang->load('frontpage_navigation_'.$user_language, $user_language);
		}


	//frontpage
	public function index(){
		$this->data['navigation_home_active']= true;
		$this->data['subview'] = 'en/home/index';
		$this->data['subview'] = 'en/home/components/modal';
		$this->load->view('en/home/_layout_main', $this->data);
	}
	

	/**
	 *	Description: Language changing redirect controller
	 *				 Gets users current full lenght url and changes its to the corret language
	 */
	public function change_language($new_language='en', $language){
			$lang_temp = $language;
			if($new_language == 'sr'){
				$this->session->set_userdata('language', 'serbian');
			}else{
				$this->session->set_userdata('language', 'english');
			}
			$string = str_replace("--", "/", $lang_temp);
			$new = substr_replace($string, $new_language, 0, 2);

			redirect($new);
		}

	public function login (){
		$this->data['navigation_login_active']= true;
		$this->load->library('facebook');
		//Redirect directories
		$dashboard =  $this->data['language'].'/user/category';
		if($this->user_m->loggedin()){
			$user=$this->user_m->get_by_id('id', $this->session->userdata('id'));
			if($user->privileges == NULL or $user->privileges <= 2)
				$dashboard = $this->data['language'].'/user/category';
			elseif($user->privileges > 2 && $user->privileges <= 4)
				$dashboard = $this->data['language'].'/user/category';
			elseif( $user->privileges > 4)
				$dashboard = $this->data['language'].'/user/category';
			else
				$dashboard = $this->data['language'].'/user/category';
		}
		
			/*Facebook*/
		$user = $this->facebook->getUser();   
        if ($user) {
            try {
               // $data['user_profile'] = $this->facebook->api('/me');
                $data['user_profile'] = $this->facebook->api('/me?fields=id,name,link,picture,email,birthday,first_name,last_name');
                $this->user_m->login_facebook($data['user_profile']);
            } catch (FacebookApiException $e) {
                $user = null;
            }
        }else {
            // Solves first time login issue. (Issue: #10)
            //$this->facebook->destroySession();
        }

        if ($user) {

            $this->data['logout_url'] = site_url($this->data['language'].'/home/logout/'); // Logs off application
        } else {            
            $this->data['login_url'] = $this->facebook->getLoginUrl(array(
                'redirect_uri' => site_url($this->data['language'].'/home/login/'), 
                'scope' => array("email") // permissions here
            ));
        }
    
		//Setting up captcha files
		$this->load->library('recaptcha');
        $this->data['recaptcha_html'] = $this->recaptcha->recaptcha_get_html();
        $this->data['page'] = $this->data['language'].'/home/signup';

		// Redirect a user if he's already logged in
		$this->user_m->loggedin() == FALSE || redirect($dashboard);
		
		// Set form
		$rules = $this->user_m->rules;
		$this->form_validation->set_rules($rules);
		
		// Process form
		if ($this->form_validation->run() == TRUE) {
			// We can login and redirect
			if ($this->user_m->login() == TRUE) {
				redirect($dashboard);
			}
			else{	
				//Setting up errors on login fails
				$this->session->set_flashdata('error', $this->lang->line('user_error_email_pass'));
				$this->session->set_flashdata('e_login', 'true');
				redirect($this->data['language'].'/home/login', 'refresh');
			}
		}
		else{
			//Setting up error on data validation errors
			$this->session->set_flashdata('e_login', 'true');
		}
		
		// Load view
		$this->data['subview'] = 'en/home/_layout_modal';
		$this->data['modal_login'] = 'en/0-components/modals/modal_login';
		$this->data['modal_signup'] = 'en/0-components/modals/modal_signup';
		$this->data['modal_login_active'] = true;
		$this->data['modal_signup_active'] = false;
		$this->load->view('en/home/_layout_login', $this->data);	
	}

	public function logout (){
		$this->user_m->logout();
		redirect($this->data['language'].'/home/');
	}

	public function signup ($log=NULL){
		$this->data['navigation_signup_active']= true;
		//Defineing the URL paths for redirections
		$signup_success= $this->data['language'].'/home';
		$signup_failed =$this->data['language'].'/home/signup';
		$logged_in = $this->data['language'].'/user/dashboard';

		//Opening and setting up the captcha html view
		$this->load->library('recaptcha');
        $this->data['recaptcha_html'] = $this->recaptcha->recaptcha_get_html();
        
        $this->data['page'] = $this->data['language'].'/home/signup';
        
        //Loading the modal(Login/Signup) settings and views
        $this->data['subview'] = 'en/home/_layout_modal';
		$this->data['modal_login'] = 'en/home/components/modal_login';
		$this->data['modal_signup'] = 'en/home/components/modal_signup';
		$this->data['modal_login_active'] = false;
		$this->data['modal_signup_active'] = true;

        //setting up the submit data for failed attemts
        if($this->input->post('signup-submit')){
		$this->session->set_userdata('first_name', $this->input->post('first_name') );
		$this->session->set_userdata('last_name', $this->input->post('last_name') );
		$this->session->set_userdata('username', $this->input->post('username') );
		$this->session->set_userdata('email', $this->input->post('email') );
		}

		//Checking for logged in users
		$this->user_m->loggedin() == FALSE || redirect($logged_in);
		
		// Set rules for form validation
		$rules = $this->user_m->rules_signup;
		$this->form_validation->set_rules($rules);
		
		// Process form
			// We can continue processing if all fields are filled and correct
			//If the validation is false that means there are is a conflicts with existing users
			//Otherwise procede to insert into database
		if ($this->form_validation->run() == TRUE ) {
			//Get captcha results and  validate answer	
			$this->recaptcha->recaptcha_check_answer();
			if($this->recaptcha->getIsValid())
			{
				//Successefull captcha entered
				//Time to enter data into database
				if ($this->user_m->signup($this->data['language']) == TRUE) 
				{
					//Redirect to activation page(sign in success page)
					$this->session->set_flashdata('error', 'correct captcha');
					redirect($signup_success, 'refresh');
				}
			}
			else
			{
				//Failed captcha, setting up errors and redirecting back 
				$this->session->set_flashdata('error',$this->lang->line('home_error_captcha'));
				$this->session->set_flashdata('e_signup', 'true');
				redirect($signup_failed, 'refresh');
			}
		}
		else
		{
			//Faild data validation setting up errors
              $this->session->set_flashdata('e_signup', 'true');
		}


		/*==============Facebook=============*/
		$user = $this->facebook->getUser();
        if ($user) {
            try {
                $this->data['user_profile'] = $this->facebook->api('/me?fields=id,name,link,picture,email,birthday,first_name,last_name');
            } catch (FacebookApiException $e) {
                $user = null;
            }
        }else {
            // Solves first time login issue. (Issue: #10)
            //$this->facebook->destroySession();
        }
		if($log== "facebook"){
        if($this->user_m->active_user($this->data['user_profile']['email']) == false){
			$this->user_m->facebook_signup($this->data['user_profile'], $this->data['language']);
			redirect($this->data['language'].'/home/signup/');        
		}
		else{
			$this->session->set_flashdata('e_signup', true);
			$this->session->set_flashdata('error', 'The email is already in use.');
			redirect($this->data['language'].'/home/signup/fail', 'refresh');
	    }
      }

        if ($user) {
            $this->data['logout_url'] = site_url('welcome/logout'); // Logs off application
        } else {
            $this->data['login_url'] = $this->facebook->getLoginUrl(array(
                'redirect_uri' => site_url($this->data['language'].'/home/signup/facebook'), 
                'scope' => array("email") // permissions here
            ));
        }
 		$this->data['login_url'] = $this->facebook->getLoginUrl(array(
                'redirect_uri' => site_url($this->data['language'].'/home/signup/facebook'), 
                'scope' => array("email") // permissions here
            ));
 		/*==============Facebook=============*/


    	/**--------------------------------------------------------TESTING VARIABLE -----------------*/
		//$this->data['main_view_data1']=  $this->session->userdata('profile');
		/**-------------------------------------------------------TESTING VARIABLE ------------------*/
	
	
		$this->data['subview'] = 'en/home/_layout_modal';
		$this->data['modal_login'] = 'en/0-components/modals/modal_login';
		$this->data['modal_signup'] = 'en/0-components/modals/modal_signup';
		$this->data['modal_login_active'] = false;
		$this->data['modal_signup_active'] = true;
		// Load view
		$this->load->view('en/home/_layout_signup', $this->data);
	}


	public function recovery($code=NULL){
		$logged_in 	= $this->data['language'].'/user/dashboard';
		$redirect 	= $this->data['language'].'/home/recovery';
		$success 	= $this->data['language'].'/home/recovery/success';
		//Checking for logged in users
			$this->user_m->loggedin() == FALSE || redirect($logged_in);

		//Setting up language derectory
			$total_url = $this->uri->uri_string();
			$this->data['lang_url'] = $this->uri->segment(1);
			$this->data['total_url'] = str_replace ("/","--", $total_url);
			$user_language = $this->session->userdata('language');
		
		if($code == NULL){
		// Set rules for form validation
			$rules = $this->user_m->rules_recovery;
			$this->form_validation->set_rules($rules);
			// Run Form Validation for Email inputs
			if ($this->form_validation->run() == TRUE ){
			// Check if the request is sent from the valid form
				if($this->input->post('recovery_form')){	
				// Check if a Active user with that email is in the database, return user data if found
					$data=$this->user_m->active_user($this->input->post('email'));
					if($data != NULL){
					/*	Setup the password changing form for a limited time
					 *	Input data is the active user information that needs changing
					 *	After changeing data, a Email will be sent to the user with a valid changeing link.
					 *	password_recovery is located @models/user_m
					 */
					$this->user_m->password_recovery($data, $this->data['language']);
					}
					else{
					//If a user is not found set error report and redirect back to recovery page
						//$this->session->set_flashdata('no_error', "<br/><br />Form Validation: Check <br /> Form Submit: Check <Br /> User found: Fail <Br/>" );
						redirect($redirect, 'refresh');
					}
				}
			}


		// Load view
			$this->data['subview'] = 'en/0-components/recovery/password_recovery';
			$this->load->view('en/home/_layout_static', $this->data);
		}
		elseif($code == 'success'){
		// Load view
			$this->data['subview'] = 'en/0-components/recovery/password_recovery_success';
			$this->lang->load('frontpage_navigation_'.$user_language, $user_language);
			$this->load->view('en/home/_layout_static', $this->data);
		}
		else{
			$this->data['page_code']=$code;
			if($this->user_m->recovery_test($code, $this->data['language']) == true){
				// Set rules for form validation
				$rules = $this->user_m->rules_password_change;
				$this->form_validation->set_rules($rules);

				// Run Form Validation for Email inputs
				if ($this->form_validation->run() == TRUE ){
					// Check if the request is sent from the valid form
					if($this->input->post('password_change_form')){	
						$user=$this->user_m->recovery_test($code, $this->data['language']);
						$this->user_m->password_change($user->id);
						redirect($success);	
					}
				}

				// Load view
				$this->data['subview'] = 'en/0-components/recovery/password_recovery_form';
				$this->lang->load('frontpage_navigation_'.$user_language, $user_language);
				$this->load->view('en/home/_layout_static', $this->data);
			}
			else{
				show_404();
			}
		}

	}

	public function activate($code=NULL){
		if($code === NULL){
			// Load view
			$this->data['subview'] = 'en/0-components/activations/activation_page';
			$this->load->view('en/home/_layout_static', $this->data);
		}
		else{
		if(null === $this->session->flashdata('activation')){
			$this->user_m->activation($code, $this->data['language']);
		}	
		elseif($this->session->flashdata('activation') == true){
		// Load view
		$this->data['subview'] = 'en/0-components/activations/activation_page_success';
		}
		else{
			$this->data['subview'] = 'en/0-components/activations/activation_page_fail';
		}
		$this->load->view('en/home/_layout_static', $this->data);
		}
	}
}
?>