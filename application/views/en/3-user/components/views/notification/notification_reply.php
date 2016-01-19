<a href="<?php echo base_url('en/user/profile/notification/'); ?>" class="color-green pull-right note-information visible-xs-block row" style=""><i class="glyphicon glyphicon-circle-arrow-left"></i> <?php echo $this->lang->line('go_back').'&nbsp;'; ?></a>
  
<div class=" col-lg-12 settings-view" >
  <section id="settings-subview" class="profile">
   
    <h2 class="note-title"><?php  echo $this->lang->line('note_notification_type');  ?>
     <?php echo "<span class=\"color-green bold note-information\">".$this_notification->type_name; ?>
      <span class="pull-right color-dark" style="font-size:16px;"> (<?php echo $this_notification->status; ?>) 
      </span>
    </span>
      <a href="<?php echo base_url('en/user/profile/notification/'); ?>" class="color-green pull-right note-information hidden-xs" style="">
        <i class="glyphicon glyphicon-circle-arrow-left"></i> <?php echo $this->lang->line('go_back').'&nbsp;'; ?></a>
    </h2>
   

      





    <section class="row">
      <div class="col-lg-12 col-md-12" style="border-top:1px solid #2ec866;margin:35px;"></div>
      	<h3 class="color-alt-grey bold note-title" style="clear:right"> 
        	<span class="bold " ><?php  echo $this->lang->line('note_author_info_title');  ?> </span>
        </h3>
    <div class="block col-lg-4">
        <span class="color-dark bold note-information" style="">
          <?php  echo $this->lang->line('note_username');  ?>
        	<span class="bold color-green" ><?php echo $this_notification->username; ?></span>
        </span>
       	
    </div>
<!-- color-alt-grey -->
     <div class="block col-lg-4" style="clear:right;">
        <span class="color-dark bold note-information" style="">
          <?php  echo $this->lang->line('note_first_name');  ?> 
        	<span class="bold color-green" ><?php echo $this_notification->first_name; ?></span>
        </span>
    </div>
    <div class="block col-lg-4" style="clear:right;">
        <span class="color-dark bold note-information" style="">
          <?php  echo $this->lang->line('note_last_name');  ?>  
        	<span class="bold color-green" ><?php echo $this_notification->last_name; ?></span>
        </span>
    </div>
  </section>

 <section class="row">
      <div class="col-lg-12 col-md-12" style="border-top:1px solid #2ec866;margin:35px;"></div>
        <h3 class="color-alt-grey bold note-title" style="clear:right"> 
          <span class="bold " ><?php  echo $this->lang->line('note_author_info_title');  ?> </span>
        </h3>
    <div class="block col-lg-4">
        <span class="color-dark bold note-information" style="">
          <?php  echo $this->lang->line('note_category');  ?>
          <span class="bold color-green" ><?php echo $this_notification->category; ?></span>
        </span>
        
    </div>
<!-- color-alt-grey -->
     <div class="block col-lg-4" style="clear:right;">
        <span class="color-dark bold note-information" style="">
         <?php  echo $this->lang->line('note_course');  ?>
          <span class="bold color-green" ><?php echo $this_notification->course; ?></span>
        </span>
    </div>
    <div class="block col-lg-4" style="clear:right;">
        <span class="color-dark bold note-information" style="">
          <?php  echo $this->lang->line('note_lesson');  ?> 
          <span class="bold color-green" ><?php echo $this_notification->lesson_name; ?></span>
        </span>
    </div>
  </section>



 <section class="row">
  <div class="col-lg-12 col-md-12" style="border-top:1px solid #2ec866;margin:35px;"></div>
      	<h3 class="color-alt-grey bold note-title" style="clear:right;"> 
        	<span class="bold " ><?php  echo $this->lang->line('note_message');  ?>  </span>
        </h3>
    <div class="block col-lg-12">
        <span class="color-dark bold  note-informationnote-title" style="note-title">
        	<span class="bold color-alt-grey" ><?php echo $this_notification->message; ?></span>
        </span>
       	
    </div>
<!-- color-alt-grey -->
   <div class="col-lg-12 col-md-12" style="border-top:1px solid #2ec866;margin:35px;"></div>  
</section>


  </section>
</div>

<?php echo "<!-- Modal start -->
<div  id=\"hr-dialog-response\" class=\"modal modal-above\" role=\"dialog\" >
<div class=\"hr-dialog\" role=\"dialog\" style=\"padding: 57px 600.5px;\"> 
    <div class=\"hr-dialog-border modal-dialog\" style=\"width:550px\"> 
        <div class=\"hr-dialog-main-window \" style=\"background: transparent !important; position: relative;z-index:770\">
            <div class=\"hr-dialog-header\" >
                
                <button type=\"button\" class=\"close\" style=\"font-size:28px;position:relative;bottom:10px;\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
            </div>
            
            <div class=\"nav nav-tabs hr-dialog-body \" id=\"login-tabs\">
            <h2 class=\"color-green\"></h2>
                <div style=\"padding:25;padding-top:0px;\">
                    <h3> ".$this->lang->line('note_reply_to')." <span class=\"color-green\" >".$this_notification->username."</span> <i class=\"glyphicon glyphicon-send\"></i> </h3>
                    
                    <br />
                    <div class=\"row\">
                        <span class=\"bold\" style=\"padding:20px;margin-bottom:10px; font-size:16px\"> 
                        ".$this->lang->line('note_subject')." 
                        </span>";
                        //if(isset($course['course_id'])){
                      
                        
                        
                          echo form_open('en/developer/course/send_request/');
                          echo form_hidden('recive_id', $this_notification->send_id );
                          echo form_hidden('send_id', $this->session->userdata('id'));
                          echo form_hidden('type', 4);
                          echo form_hidden('flag', 1);
                         
                          echo form_hidden('lesson', $this_notification->lesson );
                          echo "<label class=\"col-lg-offset-1\">Message: </label>";
                         $data=array(
                                    'rows' => '4',
                                    'name' => 'message',
                                    'class' => 'col-lg-10 col-lg-offset-1',
                            );
                       echo form_textarea($data);

                          echo "<button class=\"btn btn-primary col-lg-3 col-lg-offset-4\" style=\"margin-top:10px\">".$this->lang->line('note_btn_send')."</button> </div>";
                         echo form_close();
                           
            echo " </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Modal END -->";  ?>