<?php 
if(isset($main_view_data1))var_dump($main_view_data1);
?>

<section class="overflow-small">
<h2><?php echo $this->lang->line('course_course');  ?></h2>
<?php echo anchor($language.'/admin/course/edit/', '<i class="glyphicon glyphicon-plus"></i> '.$this->lang->line('course_add_course')); ?>

<div style="margin-bottom:60px;">
	<?php
	echo form_open($language.'/admin/course/order'.$url.$this->input->post('match'));
	$data = array(
              'name'        => 'match',
              'id'          => 'match',
              'class'		=> 'col-xs-8 col-lg-4',
              'placeholder' => $this->lang->line('user_search'),
              'maxlength'   => '100',
              'size'        => '50',
            );


	echo form_input($data);
		$data = array(
              'name'        => 'mysubmit',
 			  'value'		=> $this->lang->line('user_filter'),
              'class'		=> 'btn btn-primary col-xs-3 col-lg-1',
              'style'		=> 'margin-left:10px;'
            );
	echo form_submit($data ); 
	?>
</div>


<table class="table table-striped" >
	<thead >
		<tr>
			<?php echo $links; ?> 
			
			</tr>
		</thead>
		<tbody>
	<?php   if($courses): foreach($courses as $course): ?>
		<?php 
			
				$name=ucfirst($course->first_name).' '.ucfirst($course->last_name); ?>
				<?php  ?>
					<?php  ?>
					<tr class="center">
						<td><img src="<?php  echo $this->category_m->image_path($course->image); ?>" style="width:40px;"/></td>
						<td><?php echo    $course->category_name; ?></td>
						<td><?php echo    $course->title; ?></td>
						<td><?php echo   $course->c_slug; ?></td>
						<td><?php echo    $name; ?></td>
						<td><?php echo    $course->course_description; ?></td>
						<td><?php echo $course->course_date; ?></td>
						<?php $checked=''; if($course->course_approved) $checked ="checked=\"checked\"";?>
						<td >  <?php echo    '<input type="checkbox" disabled="disabled" '.$checked.' />'; ?></td>
						<td ><?php echo btn_permit($language.'/admin/course/activate/' . $course->course_id); ?></td>
						<td ><?php echo btn_edit($language.'/admin/course/edit/' . $course->course_id); ?></td>
						<td ><?php echo btn_delete($language.'/admin/course/delete/' . $course->course_id); ?></td>
					</tr>
		
			<?php ?>
		<?php  ?>
	<?php endforeach; ?>
	<?php else: ?>
	<tr class="center bold">
		<td colspan="10"><?php echo $this->lang->line('course_no_courses');  ?></td>
	</tr>


	<?php endif; ?>
		</tbody>
	</table>	
	<?php echo $page_links; ?>
</section>