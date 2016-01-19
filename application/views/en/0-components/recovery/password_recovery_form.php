<!-- Breadcrumbz -->

<div  class="content-header hidden-sm hidden-xs" style="margin-top:90px">
        <div class="container bcrumb-position" >
            <div class="clearfix">
                <div class="pull-left  bcrumb" data-step="1" data-intro="Click here to go back to the company page" >
                <a href="<?php echo site_url($languge.'/home/'); ?>" class="backbone" ><?php  echo $this->lang->line('breadcurmbz_home');  ?></a>
                <i class="glyphicon glyphicon-menu-right mmL"></i>                    
                <a href="<?php echo site_url($languge.'/home/login/'); ?>" class="backbone" ><?php  echo $this->lang->line('breadcurmbz_login');  ?></a>  
                <i class="glyphicon glyphicon-menu-right"></i>                    
                <a href="<?php echo site_url($languge.'/home/recovery/'); ?>" class="backbone" ><?php  echo $this->lang->line('breadcurmbz_recovery');  ?></a>
                <i class="glyphicon glyphicon-menu-right"></i>                    
                <a href="#" class="backbone" ><?php  echo $this->lang->line('breadcurmbz_change');  ?></a>
                </div>
            </div>
        </div>
    </div>


<!-- Breadcrumbz -->

<div id="content" class="main_content" style="margin-top:90px;margin-bottom:40px;">
 <div class="dashboard-track">
   <div class="clearfix">
    <div class="container transition challenge-container">    
        <!-- Activation Default -->
        <div class="col-lg-12 track_contentList" style="text-align:center;min-width: 200px">
              
         <h3  class=" col-lg-12 color-green  bold lobster" ><?php  echo $this->lang->line('recovery_form_title');  ?>
            </span></h3>
         
            <div class="small bold col-lg-12">
              
            <span class="zeta "><?php  echo $this->lang->line('recovery_form_enter');  ?>
            </span>
            <?php echo $this->session->flashdata('no_error'); ?>
            </div>
            <?php if (validation_errors()  OR $this->session->flashdata('error') !== FALSE AND $this->session->flashdata('e_login')): ?>
                 <div class="text-center alert error glob-error col-lg-6 col-lg-offset-3"><?php echo validation_errors(); echo $this->session->flashdata('error'); ?></div>
                 <?php endif; ?>
            <?php $attributes = array(
            'class' => 'legacy-form',);
            ?>
            <div class="col-lg-8 col-lg-offset-4">
            <?php echo form_open('en/home/recovery/'.$this->data['page_code'], $attributes); ?>
            <div class="row ">
            <?php
            $data = array(
                      'name'        => 'password',
                      'id'          => 'password_confirm',
                      'placeholder' => $this->lang->line('recovery_form_password'),
                      'maxlength'   => '50',
                      'type'        =>  'password',
                      'size'        => '50',
                      'class'       =>  'col-lg-5 ',
                      'style' => 'margin-top:10px'
                      );

            echo form_input($data);?></div>
            <div class="row">
            <?php
            $data = array(
                      'name'        => 'password_confirm',
                      'id'          => 'password_confirm',
                      'placeholder' => $this->lang->line('recovery_form_confirm'),
                      'maxlength'   => '50',
                      'type'        =>  'password',
                      'size'        => '50',
                      'class'       =>  'col-lg-5',
                      'style' => 'margin-top:10px'
                        );

            echo form_input($data);?>
            </div>
            <?php
             $data = array(
                      'name'  => 'password_change_form',
                      'id'    => 'recovery',
                      'value' => $this->lang->line('recovery_form_btn_chnage'),
                      'class' => 'btn btn-primary col-lg-3 col-lg-offset-1  login-button',
                      'style' => 'margin-top:10px'
                       );
            echo form_submit($data);
            ?>

         <?php echo form_close(); ?>
      </div>  
    </div>


    </div>
  </div>
 </div>
</div>

