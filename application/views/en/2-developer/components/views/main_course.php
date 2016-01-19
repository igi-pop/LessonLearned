<?php //var_dump($this->session->userdata('id'));
	//var_dump($courses);
 ?>
<section style="margin-bottom:150px;">
	<h2><?php echo $this->lang->line('lessons_user_lesson'); ?></h2>
	<?php echo anchor($language.'/developer/course/create/', '<i class="glyphicon glyphicon-plus"></i> '.$this->lang->line('course_add_course'), 'class="dark-limegreen-link" style="clear:both;"'); ?>
	<?php if($this->session->flashdata('error')) echo "<div class=\"alert alert-error center bold\">".$this->session->flashdata('error')."</div>"; ?>
	<?php if($this->session->flashdata('message')) echo "<div class=\"alert alert-success center bold\">".$this->session->flashdata('message')."</div>"; ?>
	<?php if($this->session->flashdata('success')) echo "<div class=\"alert  alert-success center  bold\">
														".$this->session->flashdata('success')."</div>"; ?>
	<?php if(validation_errors()) echo "<div class=\"alert alert-error center \">".validation_errors()."</div>"; ?>
	
	<table class="table table-striped">
		<thead>
			<?php echo $links; ?>
		</thead>
		<tbody>

	<?php $i=0; if($lessons): foreach($lessons as $lesson): ?>
	<?php $rand[$i]=rand ( 100000 , 2000000 );
		foreach($rand as $r){
		    if($r==$rand[$i]){
		        $rand[$i]=rand ( 100000 , 2000000 );
		    }
		} 
	?>
		<?php
		 $checked='';
		 $disabled=''; 
		 if($lesson->approved){ 
		 	$checked ="checked=\"checked\"";
		 	$disabled="disabled";
		 }
		 if($this->notification_m->exist_check($lesson->lesson_id, 1) != NULL)
		 {
			$disabled='disabled';
		 }
		 if($lesson->lesson_name == NULL  ){$disabled='disabled';} 

		 ?>
		<tr class="center">
			<td class="hidden-xs col-lg-2"><?php echo $lesson->category; ?></td>
			<td class="col-xs-5 col-lg-2">
				<?php echo $lesson->course." "; 
					echo "<span class=\"pull-right\">".'<a href="'.base_url().$language.'/developer/course/create/'.$lesson->course_id .'" class="btn thumb-icon btn-green-small"><i class="glyphicon glyphicon-pencil"></i></a>
					<br class="visible-xs-block" /> '; 
					echo '<a href="'.base_url().$language.'/developer/course/course_delete/'.$lesson->course_id.'" class="btn thumb-icon btn-green-small" ><i class="glyphicon glyphicon-trash"></i></a>'."</span>";?>
			</td>
			<td class="col-xs-5 col-lg-3"><?php if($lesson->lesson_name) {echo $lesson->lesson_name." "; 
			echo "<span class=\"pull-right\">".'<a href="'.base_url().$language.'/developer/course/add_lesson/'.$lesson->course_id.'/'.$lesson->lesson_id.'/'.'" class="btn thumb-icon btn-green-small" ><i class="glyphicon glyphicon-pencil"></i></a> '; } 
			
			else echo "<span class=\"color-alt-grey \">
					  ".$this->lang->line('error_flash_no_lesson_in_course')."
					  </span>"; ?>
				</td>
			<td class="hidden-xs col-lg-2"><?php echo $lesson->modified; ?></td>
			<td class="hidden-xs col-lg-1"> <?php echo  '<input type="checkbox" disabled="disabled" '.$checked.' />'; ?></td>
			<td class="col-xs-2 col-lg-2"><?php echo '<a href="'.base_url().$language.'/developer/course/add_lesson/'.$lesson->course_id.'" class="btn thumb-icon btn-green-small"><i class="glyphicon glyphicon-plus-sign"></i></a><br class="visible-xs-block" /> '; 
					if($lesson->lesson_name) {

						echo '<a href="'.base_url().$language.'/developer/course/lesson/'.$lesson->lesson_id .'" class="btn thumb-icon btn-green-small"><i class="glyphicon glyphicon-pencil"></i></a> <br class="visible-xs-block" /> '; 
						
					}
					else { echo "";} 

						echo '<a href="'.base_url().$language.'/developer/course/lesson_delete/'.$lesson->lesson_id .'" class="btn thumb-icon btn-green-small" >
						<i class="glyphicon glyphicon-trash"> </i></a> <br class="visible-xs-block" />'; ?>

					<?php echo "<button class=\"btn btn-green-small \" type=\"submit\" style=\"border:none; \" data-toggle=\"modal\" data-target=\"#hr-dialog-".$rand[$i]."\" $disabled ><i class=\"glyphicon glyphicon-paperclip\"></i></button>";?>
					</td>
			<td class="hidden"><?php echo "<button class=\"btn btn-green-small\" type=\"submit\" style=\"float:left;border:none; \" data-toggle=\"modal\" data-target=\"#hr-dialog-".$rand[$i]."\" $disabled ><i class=\"glyphicon glyphicon-paperclip\"></i></button>";?></td>
		</tr>


		<?php echo "<!-- Modal start -->
<div  id=\"hr-dialog-".$rand[$i]."\" class=\"modal modal-above\" role=\"dialog\" >
<div class=\"hr-dialog\" role=\"dialog\" style=\"overflow:scroll;\"> 
    <div class=\"hr-dialog-border modal-dialog\" style=\"\"> 
        <div class=\"hr-dialog-main-window \" style=\"background: transparent !important; position: relative;z-index:770\">
            <div class=\"hr-dialog-header\" >
                
                <button type=\"button\" class=\"close\" style=\"font-size:28px;position:relative;bottom:10px;\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
            </div>
            
            <div class=\"nav nav-tabs hr-dialog-body \" id=\"login-tabs\">
            <h2 class=\"color-green\"></h2>
                <div style=\"padding:25;padding-top:0px;\">
                    <h3 class=\"col-offset-xs-1 col-xs-12 col-sm-12 col-sm-offset-2 col-md-offset-2 col-md-10\">".$this->lang->line('dev_less_submit_title')." <i class=\"glyphicon glyphicon-send\"></i> </h3>
                    <p style=\"padding:20px\">
                    <span>  ".$this->lang->line('dev_less_submit_p1')."</span>
                    <br /><br /> ".$this->lang->line('dev_less_submit_p2')."
                    <br /><br /> ".$this->lang->line('dev_less_submit_p3')."
                    </p>
                    <br />
                    <div class=\"row\">
                        ";
                        //if(isset($course['course_id'])){
                      
                        
                        
                          echo form_open($language.'/developer/course/send_request/');
                          echo form_hidden('receive_id', 0 );
                          echo form_hidden('send_id', $this->session->userdata('id'));
                          echo form_hidden('type', 1);
                          echo form_hidden('flag', 1);
                          echo form_hidden('lesson', $lesson->lesson_id );
                          echo form_hidden('author_id', $lesson->author_id);
                          echo form_hidden('date', date("Y-m-d"));
                          echo "<label class=\"col-lg-offset-1 col-xs-offset-1\">".$this->lang->line('dev_less_submit_mess')." </label>";
                         $data=array(
                         			'rows' => '4',
                         			'name' => 'message',
                         			'class' => 'col-lg-10 col-lg-offset-1 col-xs-10 col-xs-offset-1',
                         	);
                       echo form_textarea($data);

                          echo "<button class=\"btn btn-primary col-lg-3 col-lg-offset-4 col-xs-offset-1 col-xs-4\" style=\"margin-top:10px\">".$this->lang->line('send')."</button> </div>";
                         echo form_close();
                           
            echo " </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Modal END -->"; $i++; ?>
	<?php endforeach; else:?>
	<tr>
		<td colspan="3">We could not find any courses.</td>
	</tr>

<?php endif; ?>
	
		</tbody>
	</table>	
</section>