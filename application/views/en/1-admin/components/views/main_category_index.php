<section class="overflow-small">
	<h2><?php echo $this->lang->line('category_page_title');  ?></h2>
	<?php echo anchor($language.'/admin/category/edit', '<i class="glyphicon glyphicon-plus"></i> '.$this->lang->line('category_add_new')); ?>
	<?php
	echo form_open($language.'/admin/category/order'.$url.$this->input->post('match'));
	$data = array(
              'name'        => 'match',
              'id'          => 'match',
              'class'		=> 'col-xs-8 col-lg-4',
              'placeholder' => $this->lang->line('user_search'),
              'maxlength'   => '100',
              'size'        => '50',
            );


	echo form_input($data);
		$data = array(
              'name'        => 'mysubmit',
 			  'value'		=> $this->lang->line('user_filter'),
              'class'		=> 'btn btn-primary col-xs-3 col-lg-1',
              'style'		=> 'margin-left:10px;'
            );
	echo form_submit($data ); 
	?>

	<table class="table table-striped">
		<thead>
			<?php echo $links; ?>
				
		</thead>
		<tbody>
			
	<?php if($categories): foreach($categories as $category): ?>

		
		<tr style="text-align:center">
			<td><img src="<?php  echo $this->category_m->image_path($category->image); ?>" style="width:40px;"/></td>
			<td><?php echo   $category->category_name; ?></td>
			<td><?php echo   $category->cat_slug; ?></td>
			<td class="hidden-xs"><?php echo    $category->description; ?></td>
			<td><?php echo $category->pub_date; ?></td>
			<?php $checked=''; if($category->approved) $checked ="checked=\"checked\"";?>
			<td >  <?php echo '<input type="checkbox" disabled="disabled" '.$checked.' />'; ?></td>
			<td ><?php echo btn_permit($language.'/admin/category/activate/' . $category->category_id); ?></td>
			<td ><?php echo btn_edit($language.'/admin/category/edit/' . $category->category_id); ?></td>
			<td ><?php echo btn_delete($language.'/admin/category/delete/' . $category->category_id); ?></td>
		</tr>
	<?php endforeach; ?>
	<?php else: ?>
	<tr class="center bold">
		<td colspan="9"><?php echo $this->lang->line('category_no_cat_exist');  ?></td>
	</tr>


	<?php endif; ?>
		</tbody>
	</table>	
	<?php echo $page_links; ?>
</section>