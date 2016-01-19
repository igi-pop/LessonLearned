<div class=" col-lg-12 settings-view" >
  <section id="settings-subview" class="profile">
   
    <h2>Notification type: <?php echo "<span class=\"color-green bold\">".$this_notification->type_name; ?>
      <span class="pull-right color-dark" style="font-size:16px;">(<?php echo $this_notification->status; ?>)</span>
    </h2>
   
      <section class="row">
      	<h3 class="color-alt-grey bold " style="clear:right"> 
        	<span class="bold " >Lesson information:</span>
        </h3>
    <div class="block col-lg-4">
        <span class="color-dark bold" style="font-size:20px">Category: 
        	<span class="bold color-green" ><?php echo $this_notification->category; ?></span>
        </span>
       	
    </div>
<!-- color-alt-grey -->
     <div class="block col-lg-4" style="clear:right;">
        <span class="color-dark bold" style="font-size:20px">Course: 
        	<span class="bold color-green" ><?php echo $this_notification->course; ?></span>
        </span>
    </div>
    <div class="block col-lg-4" style="clear:right;">
        <span class="color-dark bold" style="font-size:20px">Lesson: 
        	<span class="bold color-green" ><?php echo $this_notification->lesson_name; ?></span>
        </span>
    </div>



    <div class="block col-lg-4">
        <span class="color-dark bold" style="font-size:20px">
        	<span class="bold color-green" ></span>
        </span>
       	
    </div>
<!-- color-alt-grey -->
     <div class="block col-lg-4" style="clear:right;">
        <span class="color-dark bold" style="font-size:20px">Published: 
        	<span class="bold color-green" ><?php echo date('d M Y',strtotime($this_notification->course_created)); ?></span>
        </span>
    </div>
    <div class="block col-lg-4" style="clear:right;">
        <span class="color-dark bold" style="font-size:20px">Published: 
        	<span class="bold color-green" ><?php echo  date('d M Y',strtotime($this_notification->lesson_created)); ?></span>
        </span>
    </div>

     <div class="block col-lg-4">
        <span class="color-dark bold" style="font-size:20px">
        	<span class="bold color-green" ></span>
        </span>
       	
    </div>
<!-- color-alt-grey -->
     <div class="block col-lg-4" style="clear:right;">
        <span class="color-dark bold" style="font-size:20px">
        	<span class="bold color-green" ></span>
        </span>
    </div>
    <div class="block col-lg-4" style="clear:right;">
        <span class="color-dark bold" style="font-size:20px">Modified: 
        	<span class="bold color-green" ><?php echo date('d M Y', strtotime($this_notification->lesson_modified)); ?></span>
        </span>
    </div>



     <div class="block col-lg-4">
        <span class="color-dark bold" style="font-size:20px">
        	<span class="bold color-green" ></span>
        </span>
       	
    </div>
<!-- color-alt-grey -->
     <div class="block col-lg-4" style="clear:right;">
        <span class="color-dark bold" style="font-size:20px">Approved: 
        	<span class="bold color-green" ><?php if($this_notification->course_a == 0 OR $this_notification->course_a == NULL){ echo "No"; } else{ echo "Yes"; } ?></span>
        </span>
    </div>
    <div class="block col-lg-4" style="clear:right;">
        <span class="color-dark bold" style="font-size:20px">Approved: 
        	<span class="bold color-green" ><?php if($this_notification->lesson_a == 0 OR $this_notification->lesson_a == NULL){ echo "No"; } else{ echo "Yes"; } ?></span>
        </span>
    </div>

    <div class="block col-lg-4">
        <span class="color-dark bold" style="font-size:20px">
        	<span class="bold color-green" ></span>
        </span>
       	
    </div>
<!-- color-alt-grey -->
     <div class="block col-lg-4" style="clear:right;">
        <span class="color-dark bold" style="font-size:20px"> 
        	<span class="bold color-green" >LINK</span>
        </span>
    </div>
    <div class="block col-lg-4" style="clear:right;">
        <span class="color-dark bold" style="font-size:20px">
        	<span class="bold color-green" >LINK</span>
        </span>
    </div>
  </section>





    <section class="row">
      	<h3 class="color-alt-grey bold " style="clear:right"> 
        	<span class="bold " >Author information:</span>
        </h3>
    <div class="block col-lg-4">
        <span class="color-dark bold" style="font-size:20px">Username: 
        	<span class="bold color-green" ><?php echo $this_notification->username; ?></span>
        </span>
       	
    </div>
<!-- color-alt-grey -->
     <div class="block col-lg-4" style="clear:right;">
        <span class="color-dark bold" style="font-size:20px">Firstname: 
        	<span class="bold color-green" ><?php echo $this_notification->first_name; ?></span>
        </span>
    </div>
    <div class="block col-lg-4" style="clear:right;">
        <span class="color-dark bold" style="font-size:20px">Lastname: 
        	<span class="bold color-green" ><?php echo $this_notification->last_name; ?></span>
        </span>
    </div>
  </section>





 <section class="row">
      	<h3 class="color-alt-grey bold " style="clear:right"> 
        	<span class="bold " >Request information:</span>
        </h3>
    <div class="block col-lg-12">
        <span class="color-dark bold" style="font-size:20px">Message: <br /><br />
        	<span class="bold color-alt-grey" ><?php echo $this_notification->message; ?></span>
        </span>
       	
    </div>
<!-- color-alt-grey -->
     
</section>
<?php if($this_notification->flag != 3): ?>
      <?php
       echo form_open('en/admin/notification/send_request/');
      echo form_hidden('recive_id', $this_notification->send_id );
                          echo form_hidden('send_id', $this->session->userdata('id'));
                          echo form_hidden('type', 4);
                          echo form_hidden('flag', 1);
                          //For the automatic message action=0 negative, the old_type is what was the original request 
                          echo form_hidden('action', 1);
                          if(isset($this_notification->lesson_name)) echo form_hidden('name', $this_notification->lesson_name);
                          if(isset($this_notification->course)) echo form_hidden('name', $this_notification->flag == 3);
                          echo form_hidden('old_type', $this_notification->type);
                           echo form_hidden('old_id', $this_notification->note_id);
                          echo form_hidden('lesson', $this_notification->lesson );
                         
                      
                          echo "<button class=\"btn btn-primary col-lg-2 col-lg-offset-2\" style=\"margin-top:60px\">Approve</button> ";
                         echo form_close();

       ?>
   
    <a class="btn btn-primary col-lg-2 col-lg-offset-1  " style="margin-top:60px;"  >
            Deny
    </a> 
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
                    <h3> Reply to: <span class=\"color-green\" >".$this_notification->username."</span> <i class=\"glyphicon glyphicon-send\"></i> </h3>
                    
                    <br />
                    <div class=\"row\">
                        <span class=\"bold\" style=\"padding:20px;margin-bottom:10px; font-size:16px\"> Subject: ".$this_notification->lesson_name."</span>
                        ";
                        //if(isset($course['course_id'])){
                      
                        
                        
                          echo form_open('en/admin/notification/send_request/');
                          echo form_hidden('recive_id', $this_notification->send_id );
                          echo form_hidden('send_id', $this->session->userdata('id'));
                          echo form_hidden('type', 4);
                          echo form_hidden('flag', 1);
                          //For the automatic message action=0 negative, the old_type is what was the original request 
                          echo form_hidden('action', 0);
                          if(isset($this_notification->lesson_name)) echo form_hidden('name', $this_notification->lesson_name);
                          if(isset($this_notification->course)) echo form_hidden('name', $this_notification->course);
                          echo form_hidden('old_type', $this_notification->type);
                          echo form_hidden('old_id', $this_notification->note_id);
                          echo form_hidden('lesson', $this_notification->lesson );
                          echo "<label class=\"col-lg-offset-1\">Message: </label>";
                         $data=array(
                                    'rows' => '4',
                                    'name' => 'message',
                                    'class' => 'col-lg-10 col-lg-offset-1',
                            );
                       echo form_textarea($data);

                          echo "<button class=\"btn btn-primary col-lg-3 col-lg-offset-4\" style=\"margin-top:10px\">Send</button> </div>";
                         echo form_close();
                           
            echo " </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Modal END -->";  ?>