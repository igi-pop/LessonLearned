<?php
class Block extends Developer_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->helper('captcha');
    $this->data['language']='sr';
    $this->load->model('page_m');
    $this->load->model('course_m');
    $this->load->model('category_m');
    $this->load->model('difficulty_m');
    $this->load->model('lesson_m');
    $this->load->model('block_m');

    $total_url = $this->uri->uri_string();
    $this->data['lang_url'] = $this->uri->segment(1);
    $this->data['total_url'] = str_replace ("/","--", $total_url);    
  }
  public function index() {
  }

  /**
   *  Description:  Developer block editin controller(Only allows the authors to edit their blocks in a lesson)
   *  @param  int   block_id (identification number of a block)
   */
  public function edit($block_id=NULL) {
    //retrieve block information and all relavent lesson and course information that the block belongs to
      $this->data['block_data']=$this->block_m->get_by_id('block_id', $block_id);
      $this->data['lesson_data']=$this->lesson_m->get_by_id('lesson_id', $this->data['block_data'][0]->block_group);
      $this->data['course_data']=$this->course_m->get_by_ids('course_id', $this->data['lesson_data'][0]->course_id);
        
    // Set up the form
      $rules = $this->block_m->rules;
      $this->form_validation->set_rules($rules);
            
    // Process the form
    if ($this->form_validation->run() == TRUE) {
      //Format the data from a form into an array
      $data = $this->block_m->array_from_post(array('title','description', 'note', 'code', 'output','video_url'));
      $data['description']=htmlspecialchars($this->input->post('description'));
      $data['code']=htmlspecialchars($this->input->post('code'));
      $data['output']=htmlspecialchars($this->input->post('output'));
      
      //Save the data into the database, set success message and redirect the user
      $this->block_m->save($data, $block_id);
      $lesson_data['approved']=0;
      $this->lesson_m->save( $lesson_data, $this->data['block_data'][0]->block_group);
      
      $this->session->set_flashdata('message',  $this->lang->line('block_info_update'));
      redirect($this->data['language'].'/developer/block/edit/'.$block_id, 'refresh');
    }
           
    $this->data['main_view_data1']=  $this->data['block_data'];
     
    //Load views   
    $this->data['subview'] = 'en/2-developer/components/views/main_block_edit';
    $this->load->view('en/2-developer/layout/_layout_main', $this->data);
  }

  /**
   *  Description: Allows developers to create new blocks
   *  @param  int   block_groupd( defines in what group the new block should go to)
   */
  public function create($block_group=NULL) {
    //passing the block_group to the view
      $this->data['block_group']=$block_group;
    
    // Set up the form
      $rules = $this->block_m->rules;
      $this->form_validation->set_rules($rules);
            
    // Process the form
    if ($this->form_validation->run() == TRUE) {
      $data = $this->block_m->array_from_post(array('title','description', 'note','video_url', 'code', 'output','block_group', 'block_order', 'approved'));
       $data['description']=htmlspecialchars($this->input->post('description'));
       $data['code']=htmlspecialchars($this->input->post('code'));
      $data['output']=htmlspecialchars($this->input->post('output'));
      
      $id=$this->block_m->save($data);
      $lesson_data['approved']=0;
      $this->lesson_m->save($lesson_data, $data['block_group']);
      $this->session->set_flashdata('message', $this->lang->line('block_info_add'));
      redirect($this->data['language'].'/developer/block/edit/'.$id, 'refresh');
    }
        
    //Setting the order number to the highest
    $this->data['order_number']=$this->block_m->get_order($block_group);
    $this->data['order_number']->block_order+=1;
   
    //Load the views   
    $this->data['subview'] = 'en/2-developer/components/views/main_block_create';
    $this->load->view('en/2-developer/layout/_layout_main', $this->data);
  }


  /**
   * Description: Allows developers to delete blocks, check for developer permission, and checks if the blocks  exist.
   *
   * @param int block_id (determins which blok is going to be deleted)
   */
  public function delete($id) {
    
    
    //Variable contains all information about the block.
      $this->data['block_data']=$this->block_m->get_by_id('block_id', $id);
    //Checking id user has administrator permission to delete this block
    if($this->user_m->developer_permission() AND ((bool)$this->block_m->get_by_id('block_id', $id))== true){
      //Checking if the block exist's
      if($this->data['block_data'][0]->block_id){
        //Deleting  the block
          $this->block_m->delete($id);
        //Setting the success messege and redirecting the user.
          $this->session->set_flashdata('message', $this->lang->line('block_info_delete'));
          redirect($this->data['language'].'/developer/course/lesson/'.$this->data['block_data'][0]->block_group);
        }
        // Setting error message when the block doesnt exist and redirecting
          $this->session->set_flashdata('error', $this->lang->line('block_error_delete'));
          redirect($this->data['language'].'/developer/course/lesson/');
      }
      // Setting error message when the user doesnt have permission to delete the block and redirecting
      $this->session->set_flashdata('error', $this->lang->line('block_error_delete_no_permit').$this->data['block_data'][0]->id.')');
      redirect($this->data['language'].'/developer/course/lesson/');
    }





}