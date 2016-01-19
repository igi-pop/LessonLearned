<?php 
if(isset($main_view_data1))var_dump($main_view_data1);
?>

<section class="overflow-small">
<h2><?php echo $this->lang->line('lessons');  ?></h2>
<div style="margin-bottom:60px;">
	<?php
	echo form_open($language.'/admin/lesson/order'.$url.$this->input->post('match'));
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

<?php //var_dump($courses); ?>
<table class="table table-striped" >
	<thead >
		<tr>
			<?php echo $links; ?> 
			
			</tr>
		</thead>
		<tbody>
			<?php echo form_open(); echo form_close();?>
	<?php   if($courses): foreach($courses as $course): ?>
		<?php 
		$checked='';
					$active="<i class=\"glyphicon glyphicon-ok-circle\" style=\"font-size:18px\"></i>";
					$class='btn-primary'; 
						if($course->lesson_approved)	{
							$checked ="checked"; 
							$active="<i class=\"glyphicon glyphicon-ban-circle\" style=\"font-size:18px;\"></i>";
							$class="";
						}
					
			
				$name=ucfirst($course->first_name).' '.ucfirst($course->last_name); ?>
				<?php  ?>
					<?php  ?>
					<tr class="center">
						<td><img src="<?php  echo $this->category_m->image_path($course->image); ?>" style="width:40px;"/></td>
						<td><?php echo $course->title; ?></td>
						<td><?php echo $course->lesson_name; ?></td>

						<td><?php echo $course->lesson_slug; ?></td>
						<td><?php echo $name; ?></td>
						<td><?php echo $course->lang_name; ?></td>
						<td><?php echo $course->created; ?></td>
						<td><?php echo $course->modified; ?></td>
						<?php $checked=''; if($course->lesson_approved) $checked ="checked=\"checked\"";?>
						<td >  <?php echo    '<input type="checkbox" disabled="disabled" '.$checked.' />'; ?></td>
						<td >
						<?php	echo form_open("/".$language."/admin/lesson/active/order/");
						if($course->lesson_approved ){ $approved='0';}
						else{$approved='1';}
						

						echo form_hidden("url",$url.$course->lesson_id); 
						echo form_hidden("approved", $approved); 
						echo form_hidden("lesson_id", $course->lesson_id); 
						echo form_hidden("link", $course->category_id."/".$course->course_id); 
						
						echo "<button name=\"active\" id=\"active\" type=\"submit\" class=\"color-green dark-limegreen-link\" style=\"background-color:transparent;border:none; \">
						".$active."
						</button>";
						echo form_close(); 
						 ?>

							<?php  //echo btn_permit($language.'/admin/lesson/activate/' . $course->lesson_id); ?></td>
						<td ><?php echo btn_edit($language.'/admin/lesson/view/'.$course->category_id.'/'. $course->course_id.'/'.$course->lesson_id); ?></td>
						<td ><?php echo btn_delete($language.'/admin/lesson/delete/' . $course->lesson_id); ?></td>
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
	<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-4 col-sm-8 col-sm-offset-4 col-xs-12"><?php echo $page_links; ?></div>
</section>