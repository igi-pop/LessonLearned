<div class=" col-lg-12 settings-view" >
  <section id="settings-subview" class="profile">
   
    <h2><?php  echo $this->lang->line('note_notification_type');  ?> <?php echo "<span class=\"color-green bold\">".$this_notification->type_name; ?>
      <span class="pull-right color-dark" style="font-size:16px;">(<?php echo $this_notification->status; ?>)
      </span><a href="<?php echo base_url($language.'/admin/notification/'); ?>" class="color-green pull-right" style="font-size:16px">
      <i class="glyphicon glyphicon-circle-arrow-left"></i> <?php  echo $this->lang->line('note_back');  ?> &nbsp;</a>
    </h2>
   
      





    <section class="row">
      	<h3 class="color-alt-grey bold " style="clear:right"> 
        	<span class="bold " ><?php  echo $this->lang->line('note_author_info_title');  ?></span>
        </h3>
    <div class="block col-lg-4">
        <span class="color-dark bold" style="font-size:20px"><?php  echo $this->lang->line('note_username');  ?>
        	<span class="bold color-green" ><?php echo $this_notification->username; ?></span>
        </span>
       	
    </div>
<!-- color-alt-grey -->
     <div class="block col-lg-4" style="clear:right;">
        <span class="color-dark bold" style="font-size:20px"><?php  echo $this->lang->line('note_first_name');  ?>
        	<span class="bold color-green" ><?php echo $this_notification->first_name; ?></span>
        </span>
    </div>
    <div class="block col-lg-4" style="clear:right;">
        <span class="color-dark bold" style="font-size:20px"><?php  echo $this->lang->line('note_last_name');  ?>
        	<span class="bold color-green" ><?php echo $this_notification->last_name; ?></span>
        </span>
    </div>
  </section>





 <section class="row">
      	<h3 class="color-alt-grey bold " style="clear:right"> 
        	<span class="bold " ><?php  echo $this->lang->line('note_request_info_title');  ?></span>
        </h3>
    <div class="block col-lg-12">
        <span class="color-dark bold" style="font-size:20px"><?php  echo $this->lang->line('note_message');  ?> <br /><br />
        	<span class="bold color-alt-grey" ><?php echo $this_notification->message; ?></span>
        </span>
       	
    </div>
<!-- color-alt-grey -->
     
</section>

    <?php if($this_notification->flag != 3): ?>
      <?php
       echo form_open($language.'/admin/notification/send_request/');
      echo form_hidden('recive_id', $this_notification->send_id );
                          echo form_hidden('send_id', $this->session->userdata('id'));
                          echo form_hidden('type', 4);
                          echo form_hidden('flag', 1);
                          //For the automatic message action=0 negative, the old_type is what was the original request 
                          echo form_hidden('action', 1);
                         
                          echo form_hidden('old_type', $this_notification->type);
                          echo form_hidden('old_id', $this_notification->note_id);
                         
                         
                      
                          echo "<button class=\"btn btn-primary col-lg-2 col-lg-offset-2\" style=\"margin-top:60px\">".$this->lang->line('note_btn_approve')."</button> ";
                         echo form_close();

       ?>
   
    <?php
       echo form_open($language.'/admin/notification/send_request/');
      echo form_hidden('recive_id', $this_notification->send_id );
                          echo form_hidden('send_id', $this->session->userdata('id'));
                          echo form_hidden('type', 4);
                          echo form_hidden('flag', 1);
                          //For the automatic message action=0 negative, the old_type is what was the original request 
                          echo form_hidden('action', 2);
                         
                          echo form_hidden('old_type', $this_notification->type);
                          echo form_hidden('old_id', $this_notification->note_id);
                         
                         
                      
                          echo "<button class=\"btn btn-primary col-lg-2 col-lg-offset-2\" style=\"margin-top:60px\">".$this->lang->line('note_btn_deny')."</button> ";
                         echo form_close();

       ?>
  <?php endif; ?>

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
                    <h3>  ".$this->lang->line('note_reply_to')."  <span class=\"color-green\" >".$this_notification->username."</span> <i class=\"glyphicon glyphicon-send\"></i> </h3>
                    
                    <br />
                    <div class=\"row\">
                        <span class=\"bold\" style=\"padding:20px;margin-bottom:10px; font-size:16px\"> ".$this->lang->line('note_subject')." </span>
                        ";
                        //if(isset($course['course_id'])){
                      
                        
                        
                          echo form_open($language.'/developer/course/send_request/');
                          echo form_hidden('recive_id', $this_notification->send_id );
                          echo form_hidden('send_id', $this->session->userdata('id'));
                          echo form_hidden('type', 4);
                          echo form_hidden('flag', 1);
                         
                          echo form_hidden('lesson', $this_notification->lesson );
                          echo "<label class=\"col-lg-offset-1\">".$this->lang->line('note_message')."</label>";
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