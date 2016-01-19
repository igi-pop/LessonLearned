<h3 ><?php  echo empty($course->course_id)? $this->lang->line('course_add_new_course') : $this->lang->line('course_edit_course').' <span class="color-green bold">'.$course->title.'</span>'; ?></h3>
<?php if(validation_errors()) echo '<div class="alert alert-error  bold" style="text-align:center;" role="alert">'.validation_errors().'</div>'; ?>

<?php if(empty($category->category_id)): ?>
<?php echo form_open_multipart(); ?>

  <table class="table">
   
    <tr>
      <td class="hidden-xs"><?php echo $this->lang->line('course_author');  ?></td>
      <?php $hidden = array('author_id' => $user->id ); ?>
      <?php $hidden = array('approved' => 1); ?>
      <?php $array=array(
                      'name'        => 'author_name',
                      'id'          => 'author_name',
                      'placeholder' => $this->lang->line('course_author_placeholder'),
                      'disabled'    =>  'disabled',
                      'type'        =>  'text',
                      'class'       =>  'col-lg-6 col-xs-11',
                      'value'     =>  ucfirst($user->first_name).' '.ucfirst($user->last_name).' ('.$user->username.')',
                      );
                      ?>
      <td><span class="visible-xs-block"><?php echo $this->lang->line('course_author');  ?></span><?php echo form_input($array); ?></td>
    </tr>
    <tr>
      <td class="hidden-xs"><?php echo $this->lang->line('course_table_category');  ?></td>
      <?php   $options='';
        foreach($categories as $cat):
          
          $options["$cat->category_id"] = $cat->category_name;
        endforeach; ?>
      <td><span class="visible-xs-block"><?php echo $this->lang->line('course_table_category');  ?></span><?php echo form_dropdown('category_id', $options, ''); ?></td>
    </tr>



  <tr>
      <td class="hidden-xs"><?php echo $this->lang->line('course_difficulty');  ?></td>
      <?php   $dif_option='';
        foreach($dificulty as $dif):
           switch($dif->difficulty_slug){
            case 'all':
              $dif->difficulty_name=$this->lang->line('diff_m_all_slug');
              break;
            case 'easy':
              $dif->difficulty_name=$this->lang->line('diff_m_easy_slug');
              break;
            case 'medium':
              $dif->difficulty_name=$this->lang->line('diff_m_medium_slug');
              break;
            case 'hard':
              $dif->difficulty_name=$this->lang->line('diff_m_hard_slug');
              break;
            default:
            
            $dif->difficulty_name=$this->lang->line('diff_m_all_slug');
              break;
          }
        $dif_option["$dif->difficulty_id"] = $dif->difficulty_name;
        endforeach; ?>
      <td><span class="visible-xs-block"><?php echo $this->lang->line('course_difficulty');  ?></span><?php echo form_dropdown('difficulty_id', $dif_option, '1'); ?></td>
    </tr>
    




    <tr>
      <td class="hidden-xs"><?php echo $this->lang->line('course_title');  ?></td>
      <?php $array=array(
                      'name'        => 'title',
                      'id'          => 'title',
                      'placeholder' => $this->lang->line('course_title_placeholder'),
                      'type'        =>  'text',
                      'class'       =>  'col-lg-6 col-xs-11',
                      
                      );
                      ?>
      <td><span class="visible-xs-block"><?php echo $this->lang->line('course_title');  ?></span><?php echo form_input($array); ?></td>
    </tr>
    <tr>
      <td class="hidden-xs"><?php echo $this->lang->line('course_slug');  ?></td>
      <?php $array=array(
                      'name'        => 'c_slug',
                      'id'          => 'c_slug',
                      'placeholder' => $this->lang->line('course_slug_placeholder'),
                      'type'        =>  'text',
                      'class'       =>  'col-lg-6 col-xs-11',
                      
                      );
                      ?>
      <td><span class="visible-xs-block"><?php echo $this->lang->line('course_slug');  ?></span><?php echo form_input($array);  ?></td>
    </tr>
    <tr>
      <td class="hidden-xs"><?php echo $this->lang->line('course_desc');  ?></td>
      <?php $array=array(
                      'name'        => 'description',
                      'id'          => 'description',
                      'placeholder' => $this->lang->line('course_desc_placeholder'),
                      'rows'    =>  '5',
                      'class'       =>  'col-lg-12 col-xs-12',
                     
                      );
                      ?>
      <td><span class="visible-xs-block"><?php echo $this->lang->line('course_desc');  ?></span><?php echo form_textarea($array);  ?></td>
    </tr>
    

    <tr>
      <td class="hidden-xs"></td>
      <td><?php echo form_submit('submit',  $this->lang->line('save'), 'class="col-xs-4 col-xs-offset-4 btn btn-primary"'); ?></td>
    </tr>


  </table>

<?php echo form_close(); ?>







<?php else: ?>
<?php echo form_open_multipart(); ?>

	<table class="table">
		<tr>
			<td>Created on</td>

			<td><?php
			$array=array(
                      'name'        => 'pub_date',
                      'id'          => 'pub_date',
                      'placeholder' => 'Date',
                      'disabled'	=>	'disabled',
                      'type'        =>  'text',
                      'class'       =>  'col-lg-2 ',
                      'value' 		=>	$course->pub_date,
                      );
                       echo form_input($array);  ?></td>
		</tr>
    <tr>
      <td><?php echo $this->lang->line('course_author');  ?></td>

      <?php $array=array(
                      'name'        => 'author_id',
                      'id'          => 'author_id',
                      'placeholder' => 'Author name',
                      'disabled'  =>  'disabled',
                      'type'        =>  'text',
                      'class'       =>  'col-lg-6 ',
                      'value'     =>  ucfirst($user->first_name).' '.ucfirst($user->last_name).' ('.$user->username.')',
                      );
                      ?>
      <td><?php echo form_input($array); ?></td>
    </tr>
    <tr>
      <td><?php echo $this->lang->line('course_table_category');  ?></td>
      <?php   $options='';
        foreach($categories as $cat):
          if($cat->category_id == $category->category_id)
            $selected_id=$cat->category_id;
          $options["$cat->category_id"] = $cat->category_name;
        endforeach; ?>
      <td><?php echo form_dropdown('category_id', $options, $selected_id); ?></td>
    </tr>
		<tr>
			<td><?php echo $this->lang->line('course_title');  ?></td>
			<?php $array=array(
                      'name'        => 'title',
                      'id'          => 'title',
                      'placeholder' => 'Course title',
                      'type'        =>  'text',
                      'class'       =>  'col-lg-6 ',
                      'value' 		=>	$course->title,
                      );
                      ?>
			<td><?php echo form_input($array); ?></td>
		</tr>
		<tr>
			<td><?php echo $this->lang->line('course_slug');  ?></td>
			<?php $array=array(
                      'name'        => 'c_slug',
                      'id'          => 'c_slug',
                      'placeholder' => 'Course slug',
                      'type'        =>  'text',
                      'class'       =>  'col-lg-6 ',
                      'value' 		=>	$course->c_slug,
                      );
                      ?>
			<td><?php echo form_input($array);  ?></td>
		</tr>
		<tr>
			<td>Description</td>
			<?php $array=array(
                      'name'        => 'description',
                      'id'          => 'description',
                      'placeholder' => 'Describe the course you want to create.',
                      'rows'		=>	'5',
                      'class'       =>  'col-lg-12 ',
                      'value' 		=>	$course->description,
                      );
                      ?>
			<td><?php echo form_textarea($array);  ?></td>
		</tr>
		

		<tr>
			<td></td>
			<td><?php echo form_submit('submit', 'Save', 'class="btn btn-primary"'); ?></td>
		</tr>


	</table>

<?php echo form_close(); endif; ?>
