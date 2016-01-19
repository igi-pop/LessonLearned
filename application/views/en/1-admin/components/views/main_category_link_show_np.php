<div class="col-lg-3 col-md-6 challenges-list" style="margin-top:25px">
       <div class="challenges-list-view mdB" style="clear:both" >
         <div id="contest-challenges-problem" class="content--list track_content"  >
          
             
            <section class="track_content-footer " style="z-index:75!important">
                <h4 class="challengecard-title  " >
                <a href="#" class="backbone title-link" ><?php  echo $this->lang->line('course_linked_cat');  ?></a> 
                <a href="<?php echo base_url().$language.'/admin/category/show'; ?>" class="backbone title-link pull-right"> <?php  echo $this->lang->line('back');  ?></a>   
                </h4>
              
			  
				
				
				<table class="table table-striped col-lg-12" style="z-index:10 !important">
					<thead>
						<tr>
							<th style="text-align:center"><?php  echo $this->lang->line('category_table_icon');  ?></th>
							<th style="text-align:center"><?php  echo $this->lang->line('category_table_name');  ?></th>
							
						</tr>
					</thead>
					<tbody>
					<?php  if($links != NULL){?>
				<?php  foreach($links as $link):
					$category=$this->category_m->get_by_id($link);
					if($category != NULL):
					?>
						<tr style="text-align:center">
						<td><img src="<?php  echo $this->category_m->image_path($category->image); ?>" style="width:30px;height:30px"/></td>
						<td style="text-align:center;padding-top:10px;"><span class="bold color-green"><?php echo   $category->category_name; ?></a></td>
						
						
						
					</tr>
				<?php endif; endforeach; }else{
					echo "<tr>
						
						<td colspan=\"2\" class=\"bold center\" >".$this->lang->line('category_no_links')."</td>
						
						
						
					</tr>";
				}



				if(count($categories)): foreach($categories as $category): ?>
					<?php if($current_id != $category->category_id): ?>
					
					
				<?php endif; endforeach; ?>
				
				<?php else: ?>
				<tr>
					<td colspan="3">We could not find any users.</td>
				</tr>


				<?php endif; ?>
					</tbody>
				</table>	
			
            </section> 
          
    	 </div>
      </div>
	</div>