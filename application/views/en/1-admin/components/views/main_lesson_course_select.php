<div class="col-lg-4 col-md-5 challenges-list" style="margin-top:25px">
       <div class="challenges-list-view mdB" style="clear:both" >
         <div id="contest-challenges-problem" class="content--list track_content"  >
          
             <section class="track_content-footer " style="z-index:75!important">
                <h4 class="challengecard-title  " >
                <a href="#" class="backbone title-link" ><?php echo $this->lang->line('lesson_select_course');  ?></a> 
                   
                </h4>
              	<?php if($this->session->flashdata('error_course')){ ?>
              	<div class="alert alert-info col-lg-9 col-lg-offset-3 bold" style="text-align:center;clear:both;margin:10px" role="alert">
              		<?php echo $this->session->flashdata('error_course'); ?>
              	</div> <?php } ?>
            
            <table class="table table-striped col-lg-12" >
					<thead>
						<tr>
							<th style="text-align:center"><?php echo $this->lang->line('lesson_table_course');  ?></th>
							<th style="text-align:center"><?php echo $this->lang->line('lesson_table_total');  ?></th>
						</tr>
					</thead>
					<tbody>
				
					<?php  foreach($course_all as $course): ?>
					<tr class="center">
						<td class="bold"><?php echo anchor('/'.$language.'/admin/lesson/'.$type.'/'.$category->category_id.'/'.$course->course_id,$course->title, 'class=" dark-limegreen-link"'); ?></td>
						<td class="bold">(<?php echo anchor('/'.$language.'/admin/lesson/'.$type.'/'.$category->category_id.'/'.$course->course_id,$course->count, 'class=" dark-limegreen-link"'); ?>)</td>
						
					</tr>
					<?php endforeach; ?>
					
					<?php if($course_all == NULL){ ?>
					<tr>
						<td colspan="4" style="text-align:center"><?php echo $this->lang->line('lesson_no_courses');  ?></td>
					</tr>
					<?php }?>
					<tr>

						<td colspan="4" style="text-align:center"><a href="<?php echo base_url().$language.'/admin/course/edit/'; ?>" class="btn btn-primary">
							<i class="glyphicon glyphicon-plus-sign"></i>
							 <?php echo $this->lang->line('lesson_btn_new_course');  ?>
							</a>
						</td>
					</tr>
			
					</tbody>
				</table>	

            </section> 
          
    	 </div>
      </div>
	</div>