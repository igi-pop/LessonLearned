<div class="col-lg-3 col-lg-offset-3 col-md-6 col-sm-6 challenges-list" style="margin-top:25px">
       <div class="challenges-list-view mdB" style="clear:both" >
         <div id="contest-challenges-problem" class="content--list track_content"  >
          
             
            <section class="track_content-footer " >
                <h4 class="challengecard-title  " >
                <a href="#" class="backbone title-link" ><?php  echo $this->lang->line('course_select_cat');  ?></a>    
                </h4>
				<table class="table table-striped col-lg-12" >
					<thead>
						<tr>
							<th style="text-align:center"><?php  echo $this->lang->line('category_table_icon');  ?></th>
							<th style="text-align:center"><?php  echo $this->lang->line('category_table_name');  ?></th>
						</tr>
					</thead>
					<tbody>
				<?php if(count($categories)): foreach($categories as $category): ?>
					<?php if($current_id == $category->category_id OR $current_id==NULL): ?>
					
					<tr style="text-align:center">
						<td><img src="<?php  echo $this->category_m->image_path($category->image); ?>" style="width:30px;height:30px"/></td>
						<td><?php echo  anchor($language.'/admin/category/show/' . $category->category_id,  $category->category_name) ?></td>
				
						
					</tr>
				<?php endif;
					  endforeach; ?>
				<?php else: ?>
				<tr>
					<td colspan="2"><?php  echo $this->lang->line('category_no_category');  ?></td>
				</tr>


				<?php endif; ?>
					</tbody>
				</table>	
			
            </section> 
          
    	 </div>
      </div>
	</div>

<?php if($this->data['next_panel'] !=NULL) { $this->load->view($next_panel); }?>
