<div class="col-lg-8 col-lg-offset-2 col-md-offset-1 col-md-10 col-xs-12 challenges-list " style="margin-top:25px;z-index:90">
       <div class="challenges-list-view mdB" style="clear:both" >
         <div id="contest-challenges-problem" class="content--list track_content"  >
          
             <section class="track_content-footer " style="z-index:75!important">
                <h4 class="challengecard-title  " >
                <a href="#" class="backbone title-link" ><?php  echo $this->lang->line('lessons_view_lesson');  ?></a> 
                   <a href="<?php echo base_url().$language.'/admin/lesson/create/'.$category->category_id.'/'.$course_current.'/'; ?>" class="title-link pull-right">
                	<i class="glyphicon glyphicon-plus"></i> <?php echo $this->lang->line('create');  ?>
                </a> 
                </h4>
              	<?php if($this->session->flashdata('error')){ ?>
              	<div class="alert alert-info col-lg-9 col-lg-offset-3 bold" style="text-align:center;clear:both;margin:10px" role="alert">
              		<?php echo $this->session->flashdata('error'); ?>
              	</div> 
              	<?php } ?>
            
            <table class="table table-striped col-lg-12" >
					<thead>
						<tr style="text-align:center">
							<th style="text-align:center"><?php  echo $this->lang->line('lessons_table_lesson_name');  ?></th>
							<th style="text-align:center"><?php  echo $this->lang->line('edit');  ?></th>
							<th class="hidden-xs" style="text-align:center"><?php  echo $this->lang->line('order');  ?></th>
							<th style="text-align:center"><?php  echo $this->lang->line('delete');  ?></th>
							<th style="text-align:center"><?php  echo $this->lang->line('active');  ?></th>
							
						</tr>
					</thead>
					<tbody>
					<?php echo form_open(); echo form_close();?>
					<?php  $i=0; 
					
					foreach($lesson_all as $lesson): 
					$checked='';
					$active="<i class=\"glyphicon glyphicon-ok-circle\" style=\"font-size:18px\"></i>";
					$class='btn-primary'; 
						if($lesson->approved)	{
							$checked ="checked"; 
							$active="<i class=\"glyphicon glyphicon-ban-circle\" style=\"font-size:18px;\"></i>";
							$class="";
						}
					?>
					<tr style="text-align:center;">	
						<?php  ?>
						<td class="bold" > <?php echo anchor('/'.$language.'/admin/lesson/view/'.$category->category_id.'/'.$course_current.'/'.$lesson->lesson_id, $lesson->lesson_name, 'class="dark-limegreen-link"'); ?></td>
						<td ><?php echo anchor('/'.$language.'/admin/lesson/create/'.$category->category_id.'/'.$course_current.'/'.$lesson->lesson_id, '<i class="glyphicon glyphicon-pencil" ></i>', 'class="dark-limegreen-link"'); ?></td>
						<td class="hidden-xs"><?php echo anchor('/'.$language.'/admin/lesson/view/'.$category->category_id.'/'.$course_current.'/'.$lesson->lesson_id.'/order/', '<i class="glyphicon glyphicon-align-left" ></i>', 'class="dark-limegreen-link"'); ?></td>
						<td ><?php echo anchor('/'.$language.'/admin/lesson/delete/'.$lesson->lesson_id, '<i class="glyphicon glyphicon-trash" ></i>', 'class="dark-limegreen-link"'); ?></td>
						<td ><?php  
						echo form_open("/".$language."/admin/lesson/active/");
						if($lesson->approved ){ $approved='0';}
						else{$approved='1';}
						$i++;

						
						echo form_hidden("approved", $approved); 
						echo form_hidden("lesson_id", $lesson->lesson_id); 
						echo form_hidden("link", $category->category_id."/".$course_current); 
						echo "<input type=\"checkbox\" disabled=\"disabled\" ".$checked." />"; 
						echo "<button name=\"active\" id=\"active\" type=\"submit\" class=\"color-green dark-limegreen-link\" style=\"background-color:transparent;border:none; \">
						".$active."
						</button>";
						echo form_close(); 
						 ?></td>
						</form>
						<?php  ?>
					</tr>
					<?php endforeach; ?>
					<?php if($lesson_all == NULL){ ?>
					<tr>
						<td colspan="6" style="text-align:center"><?php  echo $this->lang->line('lesson_no_lessons');  ?> </td>
					</tr>
					<?php }?>
					<tr>

						<td colspan="5" style="text-align:center">
							<a href="<?php echo base_url().$language."/admin/lesson/create/$category_current/$course_current"; ?>" class="btn btn-primary">
								 <i class="glyphicon glyphicon-plus-sign"></i>
								 <?php  echo $this->lang->line('lessons_btn_new');  ?>
			
							</a>
						</td>
					</tr>
			
					</tbody>
				</table>	

            </section> 
          
    	 </div>
      </div>
	</div>