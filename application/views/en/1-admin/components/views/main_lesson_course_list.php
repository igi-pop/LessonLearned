<div class="col-lg-4 col-md-5  challenges-list" style="margin-top:25px">
       <div class="challenges-list-view mdB" style="clear:both" >
         <div id="contest-challenges-problem" class="content--list track_content"  >
          
             
            <section class="track_content-footer " style="z-index:75!important">
                <h4 class="challengecard-title  " >
                <a href="#" class="backbone title-link" ><?php echo $this->lang->line('lesson_selected_course');  ?></a> 
                <a href="<?php echo base_url().$language.'/admin/lesson/'.$type.'/'.$category->category_id; ?>" class="title-link pull-right">
                	<i class="glyphicon glyphicon-circle-arrow-left"></i><?php echo $this->lang->line('back');  ?>
                </a>   
                </h4>
              
            <table class="table table-striped col-lg-12" >
					<thead>
						<tr>
							<th style="text-align:center"><?php echo $this->lang->line('lesson_table_course');  ?></th>
							<th style="text-align:center"><?php echo $this->lang->line('lesson_table_total');  ?></th>
							<?php if($type!="view") { ?><th style="text-align:center"><?php echo $this->lang->line('view');  ?></th><?php } ?>
							<?php if($type!="create") { ?><th style="text-align:center"><?php echo $this->lang->line('create');  ?></th><?php } ?>
						</tr>
					</thead>
					<tbody>
					<tr style="text-align:center">
						<td  class="bold  dark-limegreen"><?php  echo  anchor($language.'/admin/lesson/view/'.$course[0]->category_id.'/'.$course[0]->course_id,$course[0]->title, 'class=" dark-limegreen-link"'); ?></td>

						<td  class="bold dark-limegreen">(<?php echo $course_count; ?>)</td>
					<?php if($type!="view") { ?>
						<td  class="bold">
						<?php  echo  anchor($language.'/admin/lesson/'.$linked.'/'.$course[0]->category_id.'/'.$course[0]->course_id,'<i class="glyphicon glyphicon-eye-open" style="font-size:18px"></i>', 'class=" dark-limegreen-link"'); ?>
						</td>
					<?php } ?>
					<?php if($type!="create") { ?>
						<td  class="bold "> 
						<?php echo  anchor($language.'/admin/lesson/'.$linked.'/'.$course[0]->category_id.'/'.$course[0]->course_id,'<i class="glyphicon glyphicon-plus-sign" style="font-size:18px"></i>', 'class=" dark-limegreen-link"'); ?>
						</td>
					<?php } ?>
					</tr>
					</tbody>
				</table>	
            </section> 
    	 </div>
      </div>
	</div>