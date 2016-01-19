

 <div class=" col-lg-8 col-xs-12 pull-right settings-view">
  <section id="settings-subview" class="profile">
    <?php if(isset($main_view_data1)) var_dump( $main_view_data1); echo validation_errors();?>
    
   
    <h3><?php  echo $this->lang->line('user_profile_pass_sett');  ?></h3>
    <p class="aside msT mlB"><?php  echo $this->lang->line('user_profile_pass_info');  ?></p>
    

            <?php if($this->session->flashdata('message')): ?>
              <div class="text-center alert error glob-error col-lg-8 ">
                <?php  echo $this->session->flashdata('message'); ?>
              </div>
           <?php endif;?>
            <?php if($this->session->flashdata('success')): ?>
              <div class="text-center alert alert-success col-lg-8 ">
                <?php  echo $this->session->flashdata('success'); ?>
              </div>
            <?php endif;?>
            
            <?php $attributes = array(
            'class' => 'legacy-form col-lg-offset-3 col-lg-9',);
            ?>
            <div class="col-lg-8 ">
            <?php echo form_open($language.'/user/profile/password', $attributes); ?>
             <div class="row ">
            <?php
            if($this->user_m->facebook_password_completed($this->session->userdata('id')) ==true){
             $data = array(
                      'name'        => 'old_password',
                      'id'          => 'old_password',
                      'placeholder' => $this->lang->line('user_profile_old_pass'),
                      'maxlength'   => '50',
                      'type'        =>  'password',
                      'size'        => '50',
                      'disabled'    => 'disabled',
                      'class'       =>  'col-lg-8 col-xs-12',
                      'style'       => 'margin-top:10px'
                      );
             if($user_info->facebook_signup == 1)
             echo form_hidden('facebook_signup', 3);
              if($user_info->facebook_signup == 2)
                echo form_hidden('facebook_signup', 4);
            }else{
            $data = array(
                      'name'        => 'old_password',
                      'id'          => 'old_password',
                      'placeholder' => $this->lang->line('user_profile_old_pass'),
                      'maxlength'   => '50',
                      'type'        =>  'password',
                      'size'        => '50',
                      'class'       =>  'col-lg-8 col-xs-12',
                      'style'       => 'margin-top:10px'
                      );
           
            }
            echo form_input($data);?></div>
            <div class="row ">
            <?php
            $data = array(
                      'name'        => 'password',
                      'id'          => 'password',
                      'placeholder' => $this->lang->line('user_profile_new_pass'),
                      'maxlength'   => '50',
                      'type'        =>  'password',
                      'size'        => '50',
                      'class'       =>  'col-lg-8 col-xs-12',
                      'style' => 'margin-top:10px'
                      );

            echo form_input($data);?></div>
            <div class="row">
            <?php
            $data = array(
                      'name'        => 'password_confirm',
                      'id'          => 'password_confirm',
                      'placeholder' => $this->lang->line('user_profile_con_pass'),
                      'maxlength'   => '50',
                      'type'        =>  'password',
                      'size'        => '50',
                      'class'       =>  'col-lg-8 col-xs-12',
                      'style' => 'margin-top:10px'
                        );

            echo form_input($data);?>
            </div>
            <?php
             $data = array(
                      'name'  => 'password_change_form',
                      'id'    => 'recovery',
                      'value' => $this->lang->line('user_profile_cha_pass'),
                      'class' => 'btn btn-primary col-lg-6 col-xs-9 col-xs-offset-1 col-lg-offset-1  login-button',
                      'style' => 'margin-top:10px'
                       );
            echo form_submit($data);
            ?>

         <?php echo form_close(); ?>
      </div>  
    


  <?php echo form_close(); ?>
  </section>
</div>






