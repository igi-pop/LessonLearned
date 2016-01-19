<?php if(isset($l_data)){
  $lesson_name=$l_data->lesson_name;
  $lesson_slug=$l_data->lesson_slug;
?>
            <?php if($this->session->flashdata('message')){ ?>
              <div class="alert alert-success col-lg-6 col-lg-offset-3 bold" style="text-align:center;clear:both;margin:10px" role="alert">
                <?php echo $this->session->flashdata('message'); ?>
              </div> 
              <?php } ?>
               <?php if($this->session->flashdata('error')){ ?>
              <div class="alert alert-error col-lg-6 col-lg-offset-3 bold" style="text-align:center;clear:both;margin:10px" role="alert">
                <?php echo $this->session->flashdata('error'); ?>
              </div> 
              <?php } ?>
  <div class="col-lg-6 col-lg-offset-3 col-xs-12 challenges-list" style="margin-top:25px;">
       <div class="challenges-list-view mdB" style="clear:both" >
         <div id="contest-challenges-problem" class="content--list track_content"  >
          
            <section class="track_content-footer " style="z-index:75!important">
                <h4 class="challengecard-title  " >
                <a href="#" class="backbone title-link" ><?php echo $this->lang->line('lesson_edit_lesson'); ?></a> 
                 
                </h4>
                
              
        <?php $hidden = array('course_id' => $course_current);?>

<?php if(validation_errors()) echo '<div class="alert alert-error  bold" style="text-align:center;" role="alert">'.validation_errors().'</div>'; ?>
<?php echo form_open('/'.$language.'/developer/course/add_lesson/'.$course_current.'/'.$l_data->lesson_id);?>
  <table class="table">
    <?php  echo form_hidden('course_id', $course_current); ?>
    <?php  echo form_hidden('lesson_id', $l_data->lesson_id); ?>
    
    <tr>
      <td class="hidden-xs"><?php echo $this->lang->line('lesson_lesson_name'); ?></td>

      <?php $array=array(
                      'name'        => 'lesson_name',
                      'id'          => 'lesson_name',
                      'placeholder' => $this->lang->line('lesson_lesson_name_placeholder'),
                      'type'        =>  'text',
                      'class'       =>  'col-lg-12 col-xs-12',
                      'value'       =>  $lesson_name,
                      );
                      ?>
      <td><?php echo form_input($array); ?></td>
    </tr>
    <tr>
      <td class="hidden-xs"><?php echo $this->lang->line('lesson_lesson_slug'); ?></td>
      <?php $array=array(
                      'name'        => 'lesson_slug',
                      'id'          => 'lesson_name',
                      'placeholder' =>  $this->lang->line('lesson_lesson_slug_placeholder'),
                      'value'       =>  $lesson_slug,
                      'type'        =>  'text',
                      'class'       =>  'col-lg-12 col-xs-12',
                      
                      );
                      ?>
      <td><?php echo form_input($array);  ?></td>
    </tr>
    
<tr>
      <td class="hidden-xs"><?php echo $this->lang->line('lesson_lesson_language'); ?></td>
    
      <td>
          <select name="language_id" class="col-xs-12">
            <?php  foreach($language_lesson as $lang): ?>
            <option value="<?php echo $lang->lang_id; ?>" <?php echo set_select('language_id', $lang->lang_id); ?> ><?php echo $lang->lang_name; ?></option>
            <?php endforeach; ?>
          </select>
      </td>
    </tr>


    <tr>
      <td class="hidden-xs"></td>
      <td><?php echo form_submit('edit', $this->lang->line('update'), 'class="btn btn-primary col-xs-5 col-xs-offset-3"'); ?></td>
    </tr>


  </table>

<?php echo form_close(); ?>





            </section> 
          
       </div>
      </div>
  </div>





<?php 
}else{
  $lesson_name='';
  $lesson_slug="";
?>
  <?php if($this->session->flashdata('message')){ ?>
  <div class="alert alert-success col-lg-9 col-lg-offset-1 bold" style="text-align:center;clear:both;margin:10px" role="alert">
    <?php echo $this->session->flashdata('message'); ?>
  </div>
   <?php } ?>
 <?php if($this->session->flashdata('error') OR validation_errors()){ ?>
  <div class="alert alert-error col-lg-6 col-lg-offset-3 bold" style="text-align:center;clear:both;" role="alert">
    <?php echo $this->session->flashdata('error');echo validation_errors(); ?>
  </div>
   <?php } ?>
<div class="col-lg-6 col-lg-offset-3 col-xs-12 challenges-list">
       <div class="challenges-list-view mdB" style="clear:both;" >
         <div id="contest-challenges-problem" class="content--list track_content"  >
          
            <section class="track_content-footer  " style="z-index:75!important">
                <h4 class="challengecard-title  " >
                <a href="#" class="backbone title-link" ><?php echo $this->lang->line('lesson_create_lesson'); ?></a> 
                 
                </h4>
            
			  <?php $hidden = array('course_id' => $course_current);?>


<?php echo form_open('/'.$language.'/developer/course/add_lesson/'.$course_current);?>
	<table class="table col-xs-12" style="">
	 <?php echo form_hidden('course_id', $course_current); ?>
		<tr>
			<td class="col-xs-4  hidden-xs"><?php echo $this->lang->line('lesson_lesson_name'); ?></td>

			<?php $array=array(
                      'name'        => 'lesson_name',
                      'id'          => 'lesson_name',
                      'placeholder' => $this->lang->line('lesson_lesson_name_placeholder'),
                      'type'        =>  'text',
                      'class'       =>  'col-lg-12 col-xs-12',
                      'value'       =>  $lesson_name,
                      );
                      ?>
			<td><?php echo form_input($array); ?></td>
		</tr>
		<tr>
			<td class="col-xs-4 hidden-xs"><?php echo $this->lang->line('lesson_lesson_slug'); ?></td>
			<?php $array=array(
                      'name'        => 'lesson_slug',
                      'id'          => 'lesson_name',
                      'placeholder' => $this->lang->line('lesson_lesson_slug_placeholder'),
                      'value'       =>  $lesson_slug,
                      'type'        =>  'text',
                      'class'       =>  'col-lg-12 col-xs-12',
                      );
                      ?>
			<td ><?php echo form_input($array);  ?></td>
		</tr>
		
<tr>
      <td class="hidden-xs"><?php echo $this->lang->line('lesson_lesson_language'); ?></td>
    
      <td>
          <select name="language_id" class="col-xs-8">
            <?php  foreach($language_lesson as $lang): ?>
            <option value="<?php echo $lang->lang_id; ?>" <?php echo set_select('language_id', $lang->lang_id); ?> ><?php echo $lang->lang_name; ?></option>
            <?php endforeach; ?>
          </select>
      </td>
    </tr>


		<tr>
			<td class="hidden-xs"></td>
			<td ><?php echo form_submit('submit', $this->lang->line('save'), 'class="btn btn-primary col-xs-5 col-xs-offset-3 col-lg-offset-4" '); ?></td>
		</tr>


	</table>

<?php echo form_close(); ?>





            </section> 
          
    	 </div>
      </div>
	</div>
  <?php }

  if(isset($course_view)){
    $this->load->view($course_view);
  }
  ?>