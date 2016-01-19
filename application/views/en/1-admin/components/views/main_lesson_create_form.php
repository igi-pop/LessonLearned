<?php if(isset($l_data)){
  $lesson_name=$l_data->lesson_name;
  $lesson_slug=$l_data->lesson_slug;
?>

  <div class="col-lg-8 col-lg-offset-2 col-md-offset-3 col-md-6  challenges-list" style="margin-top:25px">
       <div class="challenges-list-view mdB" style="clear:both" >
         <div id="contest-challenges-problem" class="content--list track_content"  >
          
            <section class="track_content-footer " style="z-index:75!important">
                <h4 class="challengecard-title  " >
                <a href="#" class="backbone title-link" ><?php echo $this->lang->line('lesson_edit_lesson');  ?></a> 
                 <a href="<?php echo base_url().$language.'/admin/lesson/view/'.$category->category_id.'/'.$course_current.'/'; ?>" class="title-link pull-right">
                  <i class="glyphicon glyphicon-th-list"></i> <?php echo $this->lang->line('list');  ?>
                </a> 
                </h4>

                <?php if(validation_errors()) echo '<div class="alert alert-error  bold" style="text-align:center;" role="alert">'.validation_errors().'</div>'; ?>

              <?php if($this->session->flashdata('message')){ ?>
              <div class="alert alert-success col-lg-8 col-lg-offset-2 bold center" style="clear:both;margin:10px" role="alert">
                <?php echo $this->session->flashdata('message'); ?>
              </div> <?php } ?>
            
        <?php $hidden = array('course_id' => $course[0]->course_id);?>


<?php echo form_open('/'.$language.'/admin/lesson/create/.'.$category->category_id.'/'.$course[0]->course_id);?>
  <table class="table">
   <?php echo form_hidden('course_id', $course_current); ?>
    <?php echo form_hidden('lesson_id', $l_data->lesson_id); ?>
   
    <tr>
      <td><?php echo $this->lang->line('lesson_lesson_name');  ?></td>

      <?php $array=array(
                      'name'        => 'lesson_name',
                      'id'          => 'lesson_name',
                      'placeholder' =>   $this->lang->line('lesson_lesson_name_placeholder'),
                      'type'        =>  'text',
                      'class'       =>  'col-lg-12 col-lg-12 col-xs-12',
                      'value'       =>  $lesson_name,
                      );
                      ?>
      <td><?php echo form_input($array); ?></td>
    </tr>
    <tr>
      <td><?php echo $this->lang->line('lesson_lesson_slug');  ?></td>
      <?php $array=array(
                      'name'        => 'lesson_slug',
                      'id'          => 'lesson_name',
                      'placeholder' => $this->lang->line('lesson_lesson_slug_placeholder'),
                      'value'       =>  $lesson_slug,
                      'type'        =>  'text',
                      'class'       =>  'col-lg-12 col-md-12 col-xs-12',
                      
                      );
                      ?>
      <td><?php echo form_input($array);  ?></td>
    </tr>
    
<tr>
      <td><?php echo $this->lang->line('lesson_lesson_language');  ?></td>
    
      <td>
          <select name="language_id">
            <?php  foreach($language_lesson as $lang): ?>
            <option class="col-lg-6 col-md-6 " value="<?php echo $lang->lang_id; ?>" 
              <?php echo set_select('language_id', $lang->lang_id); ?> >
              <?php echo $lang->lang_name; ?>
            </option>
            <?php endforeach; ?>
          </select>
      </td>
    </tr>


    <tr>
      <td></td>
      <td><?php echo form_submit('edit', $this->lang->line('save'), 'class="btn btn-primary"'); ?></td>
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
<div class="col-lg-8 col-lg-offset-2 col-md-offset-3 col-md-6  challenges-list" style="margin-top:25px">
  <div class="challenges-list-view mdB" style="clear:both" >
    <div id="contest-challenges-problem" class="content--list track_content"  >
      <section class="track_content-footer " style="z-index:75!important">
        <h4 class="challengecard-title">
          <a href="#" class="backbone title-link" ><?php echo $this->lang->line('lesson_create_lesson');  ?></a> 
          <a href="<?php echo base_url().$language.'/admin/lesson/view/'.$category->category_id.'/'.$course_current.'/'; ?>" class="title-link pull-right">
                  <i class="glyphicon glyphicon-th-list"></i> <?php echo $this->lang->line('list');  ?>
                </a> 
        </h4>
          <?php if(validation_errors()) echo '<div class="alert alert-error  bold" style="text-align:center;" role="alert">'.validation_errors().'</div>'; ?>

              <?php if($this->session->flashdata('message')){ ?>
              <div class="alert alert-success col-lg-8 col-lg-offset-2 bold center" style="clear:both;margin:10px" role="alert">
                <?php echo $this->session->flashdata('message'); ?>
              </div> <?php } ?>  
	<?php $hidden = array('course_id' => $course[0]->course_id);?>
  <?php form_open('/'.$language.'/admin/lesson/create/.'.$category->category_id.'/'.$course[0]->course_id);?>
	<table class="table">
	 <?php echo form_hidden('course_id', $course_current); ?>
		<tr>
			<td><?php echo $this->lang->line('lesson_lesson_name');  ?></td>

			<?php $array=array(
                      'name'        => 'lesson_name',
                      'id'          => 'lesson_name',
                      'placeholder' => $this->lang->line('lesson_lesson_name_placeholder'),
                      'type'        =>  'text',
                      'class'       =>  'col-lg-12 col-md-12 col-xs-12',
                      'value'       =>  $lesson_name,
                      );
                      ?>
			<td><?php echo form_input($array); ?></td>
		</tr>
		<tr>
			<td><?php echo $this->lang->line('lesson_lesson_slug');  ?></td>
			<?php $array=array(
                      'name'        => 'lesson_slug',
                      'id'          => 'lesson_name',
                      'placeholder' => $this->lang->line('lesson_lesson_slug_placeholder'),
                      'value'       =>  $lesson_slug,
                      'type'        =>  'text',
                      'class'       =>  'col-lg-12 col-md-12 col-xs-12',
                      
                      );
                      ?>
			<td><?php echo form_input($array);  ?></td>
		</tr>
		
<tr>
      <td><?php echo $this->lang->line('lesson_lesson_language');  ?></td>
    
      <td>
          <select name="language_id">
            <?php  foreach($language_lesson as $lang): ?>
            <option class="col-md-6 col-lg-6" value="<?php echo $lang->lang_id; ?>" <?php echo set_select('language_id', $lang->lang_id); ?> >
              <?php echo $lang->lang_name; ?>
            </option>
            <?php endforeach; ?>
          </select>
      </td>
    </tr>


		<tr>
			<td></td>
			<td><?php echo form_submit('submit', $this->lang->line('save'), 'class="btn btn-primary"'); ?></td>
		</tr>


	</table>

<?php echo form_close(); ?>





            </section> 
          
    	 </div>
      </div>
	</div>
  <?php }?>