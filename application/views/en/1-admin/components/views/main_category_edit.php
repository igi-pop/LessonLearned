<h3 ><?php  echo empty($category->category_id)? $this->lang->line('category_add_new') : $this->lang->line('category_edit').' <span class="color-green bold">'.$category->category_name.'</span>'; ?></h3>

<?php if(validation_errors()) echo '<div class="alert alert-error  bold" style="text-align:center;" role="alert">'.
validation_errors().'</div>'; ?>
<?php echo form_open_multipart(); ?>

	<table class="table">
		<tr>
			<td class="hidden-xs"><?php echo $this->lang->line('category_date');  ?>
</td>

			<td><span class="visible-xs-block"><?php echo $this->lang->line('category_date');  ?></span><?php
			$array=array(
                      'name'        => 'date',
                      'id'          => 'date',
                      'placeholder' => $this->lang->line('category_date_placeholder'),
                      'disabled'	=>	'disabled',
                      'type'        =>  'text',
                      'class'       =>  'col-lg-2 col-xs-6',
                      'value' 		=>	$category->pub_date,
                      );
                       echo form_input($array);  ?></td>
		</tr>
		<tr>
			<td class="hidden-xs"><?php echo $this->lang->line('category_name');  ?></td>
			<?php $array=array(
                      'name'        => 'category_name',
                      'id'          => 'category_name',
                      'placeholder' => $this->lang->line('category_name_placeholder'),

                      'type'        =>  'text',
                      'class'       =>  'col-lg-6 col-xs-11',
                      'value' 		=>	$category->category_name,
                      );
                      ?>
			<td><span class="visible-xs-block"><?php echo $this->lang->line('category_name');  ?></span><?php echo form_input($array); ?></td>
		</tr>
		<tr>
			<td class="hidden-xs"><?php echo $this->lang->line('category_slug');  ?></td>
			<?php $array=array(
                      'name'        => 'cat_slug',
                      'id'          => 'cat_name',
                      'placeholder' => $this->lang->line('category_slug_placeholder'),

                      'type'        =>  'text',
                      'class'       =>  'col-lg-6 col-xs-11',
                      'value' 		=>	$category->cat_slug,
                      );
                      ?>
			<td><span class="visible-xs-block"><?php echo $this->lang->line('category_slug');  ?></span><?php echo form_input($array);  ?></td>
		</tr>
		<tr>
			<td class="hidden-xs"><?php echo $this->lang->line('category_abs');  ?></td>
			<?php $array=array(
                      'name'        => 'absolute_image',
                      'id'          => 'absolute_image',
                      'placeholder' => $this->lang->line('category_abs_placeholder'),
                      'disabled'	=>	'disabled',
                      'type'        =>  'text',
                      'class'       =>  'col-lg-10 col-xs-12',
                      'value' 		=>	$category->image,
                      );
                      ?>
			<td><span class="visible-xs-block"><?php echo $this->lang->line('category_abs');  ?></span><?php echo form_input($array);  ?></td>
		</tr>
		<tr>
			<td class="hidden-xs"><?php echo $this->lang->line('category_rel');  ?></td>
			<?php $array=array(
                      'name'        => 'relative_image',
                      'id'          => 'relative_image',
                      'placeholder' => $this->lang->line('category_rel_placeholder'),
                      'disabled'	  =>	'disabled',
                      'type'        =>  'text',
                      'class'       =>  'col-lg-10 col-xs-12',
                      'value' 		  =>	$this->category_m->image_path($category->image),
                      );
                      ?>
			<td><span class="visible-xs-block"><?php echo $this->lang->line('category_rel');  ?></span><?php echo form_input($array);  ?></td>
		</tr>
		<tr>
			<td class="hidden-xs"><?php echo $this->lang->line('category_desc');  ?></td>
			<?php $array=array(
                      'name'        => 'description',
                      'id'          => 'description',
                      'placeholder' => $this->lang->line('category_desc_placeholder'),
                      'rows'		    =>	'5',
                      'class'       =>  'col-lg-11 col-xs-12',
                      'value' 		  =>	$category->description,
                      );
                      ?>
			<td><span class="visible-xs-block"><?php echo $this->lang->line('category_desc');  ?></span><?php echo form_textarea($array);  ?></td>
		</tr>
    <tr>
      <td class="hidden-xs"><?php echo "Serbian".$this->lang->line('category_desc');  ?></td>
      <?php $array=array(
                      'name'        => 'description_sr',
                      'id'          => 'description_sr',
                      'placeholder' => $this->lang->line('category_desc_placeholder'),
                      'rows'        =>  '5',
                      'class'       =>  'col-lg-11 col-xs-12',
                      'value'       =>  $category->description_sr,
                      );
                      ?>
      <td><span class="visible-xs-block"><?php echo $this->lang->line('category_desc');  ?></span><?php echo form_textarea($array);  ?></td>
    </tr>
		<tr>
			<td class="hidden-xs"><?php echo $this->lang->line('category_date');  ?></td>
			<td><?php $Fdata = array(	'name' => 'image', 
										'class' => 'file  filestyle', 
										'style' => 'padding:2px;', 
										'data-buttonBefore'=>'true', 
										'data-input'=>'false'
										);
								echo form_upload($Fdata);?>
			</td>
		</tr>

		<tr>
			<td class="hidden-xs"></td>
			<td><?php echo form_submit('submit', $this->lang->line('save'), 'class="col-xs-4 col-xs-offset-4 col-lg-1 btn btn-primary"'); ?></td>
		</tr>


	</table>

<?php echo form_close(); ?>
