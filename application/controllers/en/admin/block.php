<?php
class Block extends Admin_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->helper('captcha');
    //Loading models that are required for the controllers
    $this->load->model('page_m');
    $this->load->model('course_m');
    $this->load->model('category_m');
    $this->load->model('difficulty_m');
    $this->load->model('lesson_m');
    $this->load->model('block_m');
    $this->load->model('user_m');

    //code for determening the languge files/controllers
    $this->data['language']='en';
    $total_url = $this->uri->uri_string();
    $this->data['lang_url'] = $this->uri->segment(1);
    $this->data['total_url'] = str_replace ("/","--", $total_url);
  }

  public function index() {
  }
  
    /** 
      * Description: Allows administrators to edit/add new blocks and changes thair content 
      *
      * @param int block_id (determents what block i going to be edited)
      */
  public function edit($block_id=NULL) {
    //Collecting all relavent block information(Lessons, Courses, Blocks)
    //Variable contains all information about the block.
      $this->data['block_data']=$this->block_m->get_by_id('block_id', $block_id);
    //Variable contains all information about the lesson that the block links to.
      $this->data['lesson_data']=$this->lesson_m->get_by_id('lesson_id', $this->data['block_data'][0]->block_group);
    //Variable contains all information about the course that the lessons is in.
      $this->data['course_data']=$this->course_m->get_by_ids('course_id', $this->data['lesson_data'][0]->course_id);
        
    // Set up the form rules
      $rules = $this->block_m->rules;
      $this->form_validation->set_rules($rules);     
    // Process the form
    if ($this->form_validation->run() == TRUE) {
      //get form data and process it into an array for inputing into the database
        $data = $this->block_m->array_from_post(array('title','description', 'note','video_url', 'code', 'output'));
      //allowing special characters(tags) for the input
        $data['code']= htmlspecialchars($this->input->post('code'));

      //Saving information into the database
        $this->block_m->save($data, $block_id);
      //Returning a success message to the user
        $this->session->set_flashdata('message', $this->lang->line('block_info_update'));
        redirect($this->data['language'].'/admin/block/edit/'.$block_id, 'refresh');
    }   

    //maybe just first beta test parameter (Bugfix)  
      $this->data['main_view_data1']=  $this->data['block_data'];
    // Loading the subview for this controller
      $this->data['subview'] = 'en/1-admin/components/views/main_block_edit';
    
    //loading language files meybe redundant BUGFIX    
      $user_language = $this->session->userdata('language');
      $this->lang->load('frontpage_navigation_'.$user_language, $user_language);
    //Loading the layout
      $this->load->view('en/1-admin/layout/_layout_main', $this->data);
  }  

  /**
   * Description: Allows administrators delete block, check for administrator permission, and checks if the blocks  exist.
   *
   * @param int block_id (determins which blok is going to be deleted)
   */
  public function delete($id) {
    //Collecting all relavent block information(Lessons, Courses, Blocks)
    //Variable contains all information about the block.
      $this->data['block_data']=$this->block_m->get_by_id('block_id', $id);
    //Variable contains all information about the lesson that the block links to.
      $this->data['lesson_data']=$this->lesson_m->get_by_id('lesson_id', $this->data['block_data'][0]->block_group);
    //Variable contains all information about the course that the lessons is in.
      $this->data['course_data']=$this->course_m->get_by_ids('course_id', $this->data['lesson_data'][0]->course_id);

    //Variable contains all information about the block.
      $this->data['block_data']=$this->block_m->get_by_id('block_id', $id);
    //Checking id user has administrator permission to delete this block
    if($this->user_m->admin_permission()){
      //Checking if the block exist's
      if($this->data['block_data'][0]->block_id){
        //Deleting  the block
          $this->block_m->delete($id);
        //Setting the success messege and redirecting the user.
          $this->session->set_flashdata('message', $this->lang->line('block_info_delete'));
          redirect($this->data['language'].'/admin/lesson/view/'.$this->data['course_data'][0]->category_id.'/'.$this->data['course_data'][0]->course_id.'/'.$this->data['lesson_data'][0]->lesson_id.'/');
        }
        // Setting error message when the block doesnt exist and redirecting
          $this->session->set_flashdata('error', $this->lang->line('block_error_delete'));
          redirect($this->data['language'].'/admin/lesson/view/');
      }
      // Setting error message when the user doesnt have permission to delete the block and redirecting
      $this->session->set_flashdata('error', $this->lang->line('block_error_delete_no_permit').$this->data['block_data'][0]->id.')');
      redirect($this->data['language'].'/admin/lesson/view/');
    }

  /**
   * Description: Allows administrators create new blocks
   *
   * @param int block_group (used for determening in what group of block should we create the new block)
   */
  public function create($block_group=NULL) {
    // Passing the variable from the url to the view.
      $this->data['block_group']=$block_group;    
    // Set up the form rules
      $rules = $this->block_m->rules;
      $this->form_validation->set_rules($rules);           
    // Process the form
    if ($this->form_validation->run() == TRUE) {
      //Getting information from the form, preparing and formating data into an array for inputing to the database.
        $data = $this->block_m->array_from_post(array('title','description', 'note', 'code', 'output','video_url','block_group', 'block_order', 'approved'));
      //Saving to database and returning the id of the new entry 
        $id=$this->block_m->save($data);
      //Setting the success message and redirecting the user to the edit screen of the newly created row
        $this->session->set_flashdata('message', $this->lang->line('block_info_add'));
        redirect($this->data['language'].'/admin/block/edit/'.$id, 'refresh');
    }
        
    //Getting the order max(most highest order number in the array with the block_groups)  
      $this->data['order_number']=$this->block_m->get_order($block_group);
    //Creating the highest order number for the new item  
      $this->data['order_number']->block_order+=1;

    //The subview for the controller        
      $this->data['subview'] = 'en/1-admin/components/views/main_block_create';
    
    //Language files BUGFIX redundant    
      $user_language = $this->session->userdata('language');
      $this->lang->load('frontpage_navigation_'.$user_language, $user_language);

    //Layout for the controller
      $this->load->view('en/1-admin/layout/_layout_main', $this->data);
  }






}