<?php echo validation_errors(); ?>
 <div class=" col-lg-8 pull-right settings-view">
  <section id="settings-subview" class="profile">
    <?php if(isset($main_view_data1)) var_dump( $main_view_data1); ?>
    <h3><?php  echo $this->lang->line('user_profile_personal');  ?></h3>
    <p class="aside msT mlB"><?php  echo $this->lang->line('user_profile_info');  ?></p>
    
  <?php $attributes = array(
            'class' => 'legacy-form',
            'name' => 'user-standard',
            'id' => 'legacy-user-standard');
            ?>
    <?php echo form_open($language.'/user/profile/settings/personal', $attributes); ?> 
    
      <!-- Mogu se obrisati classe input-v2 insu iskoriscene za sada -->
      <?php validation_errors(); ?>
      <section class="row">
    <div class="block col-lg-5 col-xs-12">
        <label for="username" style="clear:right;"><?php  echo $this->lang->line('user_profile_username');  ?>
          <span class="sub-help hint-block">
          <?php 
           if($this->user_m->facebook_account_completed($this->session->userdata('id')) == true):
            echo $this->lang->line('user_profile_change_once'); 
           if($user_info->facebook_signup == 1){
            echo form_hidden('facebook_signup', 2);}
           if($user_info->facebook_signup == 3):
            echo form_hidden('facebook_signup', 4);
           endif;
           else: 
            echo $this->lang->line('user_profile_change'); ?>
         <?php endif; ?>
          </span>
        </label>
        <?php
      if($this->user_m->facebook_account_completed($this->session->userdata('id')) == true):
        $data = array(
              'name'        => 'username',
              'value'       => $user_info->username,
              'type'        =>  'text',
              'class'       => 'input-v2  col-lg-12 col-xs-12',
            );
      else:
         $data = array(
              'name'        => 'username',
              'value'       => $user_info->username,
              'type'        =>  'text',
              'disabled'    =>  'disabled',
              'class'       => 'input-v2  col-lg-12 col-xs-12',
            );
       endif;
        echo form_input($data);?>
    </div>

     <div class="block col-lg-7 col-xs-12" style="clear:right;">
        <label for="username">
          <?php echo $this->lang->line('user_profile_email'); ?> 
          <span class="sub-help hint-block">
            <?php echo $this->lang->line('user_profile_change'); ?>
          </span>
        </label>
        <?php $data = array(
              'name'        => 'email',
              'value'       => $user_info->email,
              'type'        =>  'text',
              'disabled'    =>  'disabled',
              'class'       => 'input-v2  col-lg-12 col-xs-12',
            );
        echo form_input($data);?>
    </div>
  </section>
    <div class="block col-lg-6 col-xs-12">
      <label for="personal_first_name">
        <?php echo $this->lang->line('user_profile_fname'); ?>
      </label>
      <?php $data = array(
              'name'        => 'first_name',
              'id'          => 'first_name',
              'value'       =>  $user_info->first_name,
              'placeholder' =>  'First name',
              'type'        =>  'text',
              'class'       => 'input-v2  col-lg-12 col-xs-12',
            );
        echo form_input($data);?>
    </div>

    <div class="block col-lg-6 col-xs-12">
      <label for="personal_last_name">
        <?php echo $this->lang->line('user_profile_lname'); ?>
      </label>
      <?php $data = array(
              'name'        => 'last_name',
              'value'       => $user_info->last_name,
              'placeholder' =>  'Last name',
              'type'        =>  'text',
              'class'       => 'input-v2  col-lg-12 col-xs-12',
              );
        echo form_input($data);?>
    </div>

   
      <div class="input-append date block col-lg-3 col-xs-12" id="dp3" name="birthday" data-date="12-02-2012" data-date-format="dd-mm-yyyy">
      <!-- <label for="job_title">Birthday</label> -->
      <?php /*
      if($user_info->birthday == NULL){
        $birthday='2010-10-10';
      }else{
        $birthday=$user_info->birthday;
      }
      $data = array(
              'name'        => 'birthday',
              'id'          => 'date',
              'value'       =>  $birthday,
              'placeholder' =>  'Your date of birth',
              'type'        =>  'text',
              'class'       => 'input-v2  col-lg-12 col-xs-12 ',
            );
        echo form_input($data); */?>
        <span class="add-on"><i class="icon-th"></i></span>
    </div>
    
     
    <div class="block col-lg-4 col-xs-12">
      <label for="job_title">
        <?php echo $this->lang->line('user_profile_country'); ?>
      </label>
      <?php $data = array(
              'name'        => 'country',
              'id'          => 'country',
              'value'       =>  $user_info->country,
              'placeholder' =>   $this->lang->line('user_profile_country'),
              'type'        =>  'text',
              'class'       => 'input-v2  col-lg-12 col-xs-12',
            );
        echo form_input($data);?>
       
    </div>
    <div class="block col-lg-5 col-xs-12">
      <label for="job_title"><?php echo $this->lang->line('user_profile_city'); ?></label>
      <?php $data = array(
              'name'        => 'city',
              'id'        => 'city',
              'value'       =>  $user_info->city,
              'placeholder' =>  $this->lang->line('user_profile_city_placeholder'),
              'type'        =>  'text',
              'class'       => 'input-v2  col-lg-12 col-xs-12',
            );
        echo form_input($data);?>
       
    </div>
    
   
    <button class="btn btn-primary col-lg-3 col-lg-offset-4 col-xs-6 col-xs-offset-3 " style="margin-top:30px;" name="commit" type="submit" value="request" >
        <?php echo $this->lang->line('user_profile_save'); ?>
    </button> 


  <?php echo form_close(); ?>
  </section>
</div>







<!-- ------------------------------------------------------------------------------------------------------------------------------- -->

