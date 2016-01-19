<div class="col-lg-4  col-lg-offset-2 col-md-offset-1 col-md-5 challenges-list" style="margin-top:25px">
       <div class="challenges-list-view mdB" style="clear:both" >
         <div id="contest-challenges-problem" class="content--list track_content"  >
          
             
            <section class="track_content-footer overflow-small" style="z-index:75!important;">
                <h4 class="challengecard-title  " >
                <a href="#" class="backbone " ><?php echo $this->lang->line('lesson_selected_category');  ?></a> 
                <a href="<?php echo base_url().$language.'/admin/lesson/'.$type; ?>" class="backbone title-link pull-right">
                	<i class="glyphicon glyphicon-circle-arrow-left"></i> <?php echo $this->lang->line('back');  ?></a>   
                </h4>
              
            <table class="table table-striped col-lg-12" >
					<thead>
						<tr>
							<th style="text-align:center"><?php echo $this->lang->line('lesson_table_category');  ?></th>
							<th style="text-align:center"><?php echo $this->lang->line('lesson_table_total');  ?></th>
						</tr>
					</thead>
					<tbody>
				
					
					<tr style="text-align:center">
						<td  class="bold "><?php echo  anchor($language.'/admin/lesson/'.$linked.'/'.$category->category_id, $category->category_name, 'class=" dark-limegreen-link"'); ?></td>
						<td  class="bold dark-limegreen">(<?php echo $category->count; ?>)</td>
					</tr>

					</tbody>
				</table>	

            </section> 
          
    	 </div>
      </div>
	</div>