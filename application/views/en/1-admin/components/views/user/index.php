<?php if ( validation_errors() ): ?>
        <div class="text-center alert error glob-error"><?php echo validation_errors();  ?></div>
        <?php endif; ?>
<section class="overflow-small">
	


	<h2><?php echo $this->lang->line('user_user'); ?></h2>
	<?php if($this->session->flashdata('message')) 
	echo '<div class="alert alert-info  bold" style="text-align:center;" role="alert">'.$this->session->flashdata('message').'</div>'; ?>

	<?php echo anchor($language.'/admin/user/edit', '<i class="glyphicon glyphicon-plus"></i> '.$this->lang->line('user_btn_new'), array('class'=>"dark-limegreen-link")); ?>
	<?php 
	echo form_open($language.'/admin/user/order'.$url.$this->input->post('match'));
	$data = array(
              'name'        => 'match',
              'id'          => 'match',
              'class'		=> 'col-xs-8 col-lg-6',
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
	<table class="table table-striped col-xs-12">
		<thead>
			<?php echo $links; ?>
		</thead>
		<tbody>
	<?php if(count($users) AND $users != NULL): foreach($users as $user): ?>

		
		<tr class="center">
			<td><?php echo  anchor($language.'/admin/user/edit/' . $user->id,  $user->username, array('class'=>"bold dark-limegreen-link")) ?></td>
			<td><?php echo    $user->first_name; ?></td>
			<td><?php echo    $user->last_name; ?></td>
			<td><?php echo    $user->email; ?></td>
			
				<?php $number=count($this->course_m->get_all_by_author(null, $user->id )); 

				?>
			<td><?php echo  '('.$number.')'; ?>



			</td>
			<td><?php echo perm_converter($user->privileges); ?></td>
			<?php $checked=''; if($user->account_active) $checked ="checked=\"checked\"";?>
			<td><?php echo    '<input type="checkbox" disabled="disabled" '.$checked.' />'; ?></td>
			<td ><?php echo btn_permit($language.'/admin/user/permission/' . $user->id); ?></td>
			<td ><?php echo btn_edit($language.'/admin/user/edit/' . $user->id); ?></td>
			<td ><?php echo btn_delete($language.'/admin/user/delete/' . $user->id); ?></td>
		</tr>
	<?php endforeach; ?>
		<tr>
			<td colspan="10"><?php if($page_links != NULL){echo $page_links;} ?></td>
		</tr>
	<?php else: ?>
	<tr>
		<td colspan="10"><?php  echo $this->lang->line('user_no_users');  ?></td>
	</tr>


	<?php endif; ?>
		</tbody>
	</table>	
</section>