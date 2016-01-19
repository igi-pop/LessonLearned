<div class="col-lg-4 col-lg-offset-4 challenges-list" style="margin-top:25px">
       <div class="challenges-list-view mdB" style="clear:both" >
         <div id="contest-challenges-problem" class="content--list track_content"  >
            <section class="track_content-footer " >
                <h4 class="challengecard-title  " >
                <a href="#" class="backbone title-link" ><?php echo $this->lang->line('lesson_activation');  ?></a>    
                </h4>
				<table class="table table-striped col-lg-12" >
					<thead>
						<tr>
							<th style="text-align:center"><?php echo $this->lang->line('lesson_table_course');  ?></th>
							<th style="text-align:center"><?php echo $this->lang->line('lesson_table_category');  ?></th>
							<th style="text-align:center"><?php echo $this->lang->line('lesson_table_lesson');  ?></th>
							<th style="text-align:center"><?php echo $this->lang->line('active');  ?></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
				<?php if(count($lessons)): foreach($lessons as $lesson): ?>

					
					<tr class="center">
						
							<?php 
							foreach($courses as $course)
								if($course->course_id == $lesson->course_id)
								{
										echo "<td class=\"center\">";
										echo "".$course->title;
										echo "</td>";
									foreach($categories as $category)
									if($category->category_id ==$course->category_id){
										echo "<td class=\"center\">";
										echo "<img src=\"".$this->category_m->image_path($category->image)."\" style=\"width:40px;\"/>.";
										echo "</td>";
									}
								}
							?>
						
						<td ><?php echo  anchor($language.'/admin/user/edit/' . $lesson->lesson_id,  $lesson->lesson_name) ?></td>
						<?php 	$checked='';
								$active=$this->lang->line('activate');
								$class='btn-primary'; 
								if($lesson->approved)	{
									$checked ="checked=\"checked\""; 
									$active= $this->lang->line('deactivate'); 
									$class="";
						}?>
						<td >  <?php echo    '<input type="checkbox" disabled="disabled" '.$checked.' />'; ?></td>
						<td > 
							<?php echo form_open('/'.$language.'/admin/course/active/'); ?>
							<?php 
								if($lesson->approved){ $approved='0';}else{$approved='1';}
								echo form_hidden('approved', $approved); ?>
							<?php echo form_hidden('course_id', $lesson->lesson_id); ?>
							 <?php echo    '<input type="checkbox" disabled="disabled" '.$checked.' />'; ?>
							<?php echo form_submit('active', $active, 'class="btn '.$class.'"'); ?>
							<?php echo form_close(); ?>
						</td>
					</tr>
				<?php endforeach; ?>
				<?php else: ?>
				<tr>
					<td colspan="5"><?php  echo $this->lang->line('lesson_no_lessons');  ?></td>
				</tr>


				<?php endif; ?>
					</tbody>
				</table>	
			
            </section> 
          
    	 </div>
      </div>
	</div>


