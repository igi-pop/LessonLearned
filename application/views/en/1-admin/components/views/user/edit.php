 


       
   <h3 ><?php  echo empty($user->id)? $this->lang->line('user_new') : $this->lang->line('user_edit').' '.$user->username; ?></h3>
<?php 


?>
<?php if(validation_errors()) echo '<div class="alert alert-error  bold" style="text-align:center;" role="alert">'.validation_errors().'</div>'; ?>

<?php echo form_open(); ?>

	<table class="table">
		<tr>
			<td><?php  echo $this->lang->line('user_username');  ?></td>
			<td><?php echo form_input('username', set_value('username', $user->username), 'class="col-lg-8 col-md-8 col-xs-12"'); ?></td>
		</tr>
		<tr>
			<td><?php  echo $this->lang->line('user_firstname');  ?></td>
			<td><?php echo form_input('first_name', set_value('first_name', $user->first_name), 'class="col-lg-8 col-md-8 col-xs-12"');  ?></td>
		</tr>
		<tr>
			<td><?php  echo $this->lang->line('user_lastname');  ?></td>
			<td><?php echo form_input('last_name', set_value('last_name', $user->last_name), 'class="col-lg-8 col-md-8 col-xs-12"');  ?></td>
		</tr>
		<tr>
			<td><?php  echo $this->lang->line('user_email');  ?></td>
			<td><?php echo form_input('email', set_value('email', $user->email), 'class="col-lg-8 col-md-8 col-xs-12"');  ?></td>
		</tr>
		<tr>
			<td><?php  echo $this->lang->line('user_password');  ?></td>
			<td><?php echo form_password('password','', 'class="col-lg-6 col-md-6 col-xs-12"'); ?></td>
		</tr>
		<tr>
			<td><?php  echo $this->lang->line('user_pass_conf');  ?> </td>
			<td><?php echo form_password('password_confirm','', 'class="col-lg-6 col-md-6 col-xs-12"'); ?></td>
		</tr>
		<tr>
			<td><?php  echo $this->lang->line('user_country');  ?></td>
			<td><?php echo form_input('country', set_value('country', $user->country), 'class="col-lg-6 col-md-8 col-xs-12"');  ?></td>
		</tr>
		
		<tr>
			<td><?php  echo $this->lang->line('user_city');  ?></td>
			<td><?php echo form_input('city', set_value('city', $user->city), 'class="col-lg-6 col-md-8 col-xs-12"');  ?></td>
		</tr>
		<?php if(isset($user->id)){ ?>
		<tr><td></td>
			<td>
				<?php 
				
				?>
		 <select name="privileges">
            <option value="2" <?php echo set_select('privileges', 2);  if($user->privileges <= 2){ echo "selected"; }; ?> ><?php  echo $this->lang->line('user_sele_priv_1');  ?></option>
            <option value="4" <?php echo set_select('privileges', 4); if($user->privileges > 2 AND $user->privileges <=4 ){ echo "selected";	} ?> ><?php  echo $this->lang->line('user_sele_priv_2');  ?></option>
            <option value="8" <?php echo set_select('privileges', 8); if($user->privileges >7 ){ echo "selected"; }?> ><?php  echo $this->lang->line('user_sele_priv_3');  ?></option>
          </select>
          <?php }else{ 
          echo form_hidden('privileges', 2); 
          } ?>
      	</td>
		</tr>
		<tr>
			<td></td>
			<td><?php echo form_submit('submit', $this->lang->line('save'), 'class="btn btn-primary"'); ?></td>
		</tr>


	</table>

<?php echo form_close(); ?>
