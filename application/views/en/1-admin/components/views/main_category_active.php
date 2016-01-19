<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 challenges-list" style="margin-top:25px;">
       <div class="challenges-list-view mdB" style="clear:both" >
         <div id="contest-challenges-problem" class="content--list track_content"  >
            <section class="track_content-footer overflow-small">
                <h4 class="challengecard-title  " >
                <a href="#" class="backbone title-link" ><?php echo $this->lang->line('category_activation');  ?></a>    
                </h4>
				<table class="table table-striped col-lg-12" >
					<thead>
						<tr>
							<th class="hidden-xs" style="text-align:center"><?php echo $this->lang->line('category_table_icon');  ?></th>
							<th style="text-align:center"><?php echo $this->lang->line('category_table_name');  ?></th>
							<th style="text-align:center"><?php echo $this->lang->line('active');  ?></th>
							<th class="hidden-xs" style="text-align:center"></th>
						</tr>
					</thead>
					<tbody>
				<?php if($categories): foreach($categories as $category): ?>
					<tr class="center" >
						<td class="hidden-xs"><img src="<?php  echo $this->category_m->image_path($category->image); ?>" style="width:40px;"/></td>
						<td ><?php echo  anchor($language.'/admin/user/edit/' . $category->category_id,  $category->category_name, 'class="dark-limegreen-link bold"') ?></td>
						<?php 	$checked='';
								$active=$this->lang->line('activate');
								$class='btn-primary'; 
								if($category->approved)	{
									$checked ="checked=\"checked\""; 
									$active=$this->lang->line('deactivate');
									$class="";
						}?>
						<td class="hidden-xs">  <?php echo '<input type="checkbox" disabled="disabled" '.$checked.' />'; ?></td>
						<td > 
							<?php echo form_open('/'.$language.'/admin/category/active/'); ?>
							<?php 
								if($category->approved){ $approved='0';}else{$approved='1';}
								echo form_hidden('approved', $approved); ?>
							<?php echo form_hidden('category_id', $category->category_id); ?>
							<?php echo form_submit('submit', $active, 'class="btn   '.$class.'" style="width:auto;"'); ?>
							<?php echo form_close(); ?>
						</td>
					</tr>
				<?php endforeach; ?>
				<?php else: ?>
				<tr>
					<td colspan="4"><?php echo $this->lang->line('category_no_category');  ?></td>
				</tr>


				<?php endif; ?>
					</tbody>
				</table>	
			
            </section> 
          
    	 </div>
      </div>
	</div>


