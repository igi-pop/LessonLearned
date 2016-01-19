
<div class="col-lg-4 col-lg-offset-2 col-md-offset-1 col-md-5 challenges-list" style="margin-top:25px">
       <div class="challenges-list-view mdB" style="clear:both" >
         <div id="contest-challenges-problem" class="content--list track_content"  >
          
             
            <section class="track_content-footer overflow-small" style="z-index:75!important">
                <h4 class="challengecard-title  " >
                <a href="#" class="backbone title-link" ><?php echo $this->lang->line('lesson_selected_category');  ?></a> 
                   
                </h4>
              
            <table class="table table-striped col-lg-12" >
					<thead>
						<tr>
							<th style="text-align:center"><?php echo $this->lang->line('lesson_table_category');  ?></th>
							<th style="text-align:center"><?php echo $this->lang->line('lesson_table_total');  ?></th>
						</tr>
					</thead>
					<tbody>
					
					<?php foreach($category_all as $cat):?>
					<tr style="text-align:center">
						<td class="bold" ><?php echo anchor('/'.$language.'/admin/lesson/'.$type.'/'.$cat->category_id,$cat->category_name, 'class=" dark-limegreen-link"'); ?></td>

						<td class="bold" ><?php echo anchor('/'.$language.'/admin/lesson/'.$type.'/'.$cat->category_id, "(".$cat->count.")", 'class=" dark-limegreen-link"'); ?></td>
						
					</tr>

					<?php  endforeach; ?>
				

					<tr>
						<td colspan="4" style="text-align:center">
							<a href="<?php echo base_url().$language.'/admin/category/edit/'; ?>" class="btn btn-primary">
							<i class="glyphicon glyphicon-plus-sign"></i>
							<?php echo $this->lang->line('lesson_btn_new_category');  ?>
							</a>
						</td>
					</tr>
						


					</tbody>
				</table>	

            </section> 
          
    	 </div>
      </div>
	</div>