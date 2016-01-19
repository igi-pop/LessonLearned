<div class="col-lg-6 col-lg-offset-3 challenges-list" style="margin-top:25px">
       <div class="challenges-list-view mdB" style="clear:both" >
         <div id="contest-challenges-problem" class="content--list track_content"  >
            <section class="track_content-footer " >
                <h4 class="challengecard-title  " >
                <a href="#" class="backbone title-link" ><?php echo $this->lang->line('course_activation');  ?></a>    
                </h4>
				<table class="table table-striped col-lg-12" >
					<thead>
						<tr>
							<th class="hidden-xs" style="text-align:center"><?php echo $this->lang->line('course_table_category');  ?></th>
							<th style="text-align:center"><?php echo $this->lang->line('course_title');  ?></th>
							<th  style="text-align:center"><?php echo $this->lang->line('active');  ?></th>
							<th class="hidden-xs"></th>
						</tr>
					</thead>
					<tbody>
				<?php if(count($courses)): foreach($courses as $course): ?>

					
					<tr class="center">
						<td class="hidden-xs">
							<?php 
							foreach($categories as $category)
							if($category->category_id ==$course->category_id)
								echo "<img src=\"".$this->category_m->image_path($category->image)."\" style=\"width:40px;\"/>.";

							?>
						</td>
						<td ><?php echo  anchor($language.'/admin/user/edit/' . $course->course_id,  $course->title, 'class="dark-limegreen-link"') ?></td>
						<?php 	$checked='';
								$active=$this->lang->line('activate');
								$class='btn-primary'; 
								if($course->approved)	{
									$checked ="checked=\"checked\""; 
									$active=$this->lang->line('deactivate');
									$class="";
						}?>
						<td  class="hidden-xs">  <?php echo    '<input type="checkbox" class="hidden-xs" disabled="disabled" '.$checked.' />'; ?></td>
						<td  class="center"> 
							<?php echo form_open('/'.$language.'/admin/course/active/'); ?>
							<?php 
								if($course->approved){ $approved='0';}else{$approved='1';}
								echo form_hidden('approved', $approved); ?>
							<?php echo form_hidden('course_id', $course->course_id); ?>
							<?php echo form_submit('submit', $active, 'class="btn '.$class.'" style="width:auto!important;"' ); ?>
							<?php echo form_close(); ?>
						</td>
					</tr>
				<?php endforeach; ?>
				<?php else: ?>
				<tr>
					<td colspan="3"><?php echo $this->lang->line('course_no_courses');  ?></td>
				</tr>


				<?php endif; ?>
					</tbody>
				</table>	
			
            </section> 
          
    	 </div>
      </div>
	</div>


