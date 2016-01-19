<div class="col-lg-4 col-md-6 col-sm-6 challenges-list" style="margin-top:25px">
       <div class="challenges-list-view mdB" style="clear:both" >
         <div id="contest-challenges-problem" class="content--list track_content"  >
			<section class="track_content-footer " style="z-index:75!important">
                <h4 class="challengecard-title  " >
                <a href="#" class="backbone title-link" ><?php  echo $this->lang->line('course_select_cat');  ?></a>    
                <a href="<?php echo base_url().$language.'/admin/category/link'; ?>" class="backbone title-link pull-right"> <i class="glyphicon glyphicon-circle-arrow-left"></i><?php  echo $this->lang->line('back');  ?></a>   
                
                </h4>

            <?php if( $this->session->flashdata('links')):?><div class="alert alert-success color-green bold" role="alert">  <?php echo $this->session->flashdata('links'); ?></div><?php endif;?>
            <?php echo form_open('/'.$language.'/admin/category/link/'.$current_id ); ?>
				<table class="table table-striped col-lg-12" style="z-index:10 !important">
					<thead>
						<tr>
							<th style="text-align:center"><?php  echo $this->lang->line('category_table_icon');  ?></th>
							<th style="text-align:center"><?php  echo $this->lang->line('category_table_name');  ?></th>
							<th style="text-align:center"><?php  echo $this->lang->line('category_table_linked');  ?></th>
							
						</tr>
					</thead>
					<tbody>
				<?php

				//var_dump($main_view_data1);
				 if(count($categories)): foreach($categories as $category): ?>
					<?php 
					$checked='';
					foreach($chain as $check):
						if($check->course_main == $category->category_id OR $check->course_second == $category->category_id)
							$checked="checked";
					endforeach;
					if($current_id != $category->category_id): 

					
					?>
					<tr style="text-align:center">
						<td><img src="<?php  echo $this->category_m->image_path($category->image); ?>" style="max-width:40px;max-height:40px"/></td>
						<td style="text-align:center"><?php echo  anchor($language.'/admin/category/link/' . $category->category_id,  $category->category_name, 'class=" dark-limegreen-link"'); ?></td>
						<td style="text-align:center">  <?php echo '<input type="checkbox"  name="category[]" value="'.$category->category_id.'" '.$checked.' />'; ?></td>	
					</tr>
				<?php  endif; endforeach; ?>
				<tr>
					<td class="center" colspan="3">
					<button class="btn btn-primary col-lg-3 col-lg-offset-4  " style="margin-top:30px;" name="submit" type="submit" value="request" >
           			 <?php  echo $this->lang->line('save');  ?>
    				</button> </td>
				</tr>
				<?php else: ?>
				<tr>
					<td colspan="3"><?php  echo $this->lang->line('category_no_category');  ?></td>
				</tr>


				<?php endif; ?>
					</tbody>
				</table>	
			<?php echo form_close();?>
            </section> 
          
    	 </div>
      </div>
	</div>