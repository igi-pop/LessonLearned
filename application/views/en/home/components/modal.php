
<div  id="hr-dialog-4397332843" class="modal" role="dialog" style="z-index: 1045">
<div class="hr-dialog  " role="dialog" style="padding: 2px 394.5px;z-index:70"> 
  <div class="hr-dialog-border modal-dialog" style="width:550px"> 
    <div class="hr-dialog-main-window " style="background: transparent !important; position: relative;z-index:770">
     
      <div class="hr-dialog-header" style="padding-bottom:25px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <i class="glyphicon glyphicon-remove"></i>
        </button>
      </div>
            
      <div class="nav nav-tabs hr-dialog-body " id="login-tabs">
        <div class="login-group homepage_admin tab-content"> 
            
            <ul class="login_tab unstyled horizontal  nav nav-justified"> 
              <li class="signup-toggle toggle " id="signup-tab">
                <a href="#signup" data-toggle="tab"><?php echo $this->lang->line('signup'); ?></a>
              </li> 
              <li class="login-toggle toggle active" id="login-tab" >
                <a href="#login" data-toggle="tab"><?php echo $this->lang->line('login'); ?></a>
              </li> 
            </ul> 



            <div class="tab-content">
                <div class="homepage_signup signup fade  tab-pane " id="signup"> 
                <!-- <form  id="legacy-signup" class="legacy-form">  -->
                    <?php echo validation_errors(); ?>
                    <?php $attributes = array(
                                    'class' => 'legacy-form',
                                     'id' => 'legacy-signup');

                    ?>

                    <?php echo form_open('en/user/user/signup', $attributes); ?>
                    <div class="homepage_signupgroup--legacy"> 
                        <div class="formgroup" style="display: table"> 
                        <input id="first_name" class="fw" name="first_name" value="" style="width: 212px;display: table-cell;margin-right: 4px;" placeholder="<?php echo $this->lang->line('first_name'); ?>"  type="text">     
                        <input id="last_name" class="fw " name="last_name" value="" style="width: 212px;display: table-cell;" placeholder="<?php echo $this->lang->line('last_name'); ?>"  type="text"> 
                        </div> 
                               
                        <div class="formgroup " > 
                        <i class="glyphicon glyphicon-envelope" ></i> 
                        <?php 
                        $email_place=$this->lang->line('your_email');
                        
                        $email_data = array(
                              'type'        => 'text',
                              'name'        => 'email',
                              'id'          => 'email',
                              'placeholder' => $this->lang->line('your_email'),
                              'class'       => 'fw',
                            );

                        echo form_input( $email_data); ?>
                        <!-- <input id="email" class="fw " name="email" value="" placeholder="<?php echo $this->lang->line('your_email'); ?>"  type="email"> --> 
                        </div> 

                        <div class="formgroup " > 
                        <i class="glyphicon glyphicon-user"></i> 
                        <input id="username" class="fw " name="username" value="" placeholder="<?php echo $this->lang->line('choose_username'); ?>"  type="text"> 
                        </div> 
                        <div class="formgroup"> 
                                    <i class="glyphicon glyphicon-lock"></i> 
                                    <input id="password" class="check fw" name="password" placeholder="<?php echo $this->lang->line('choose_password'); ?>"  type="password"> 
                                </div> 
                                <button class="btn btn-primary  block-center signup-button" name="commit" type="submit" value="request" ><?php echo $this->lang->line('create_account'); ?></button> 
                            </div> 
                            <div class="homepage_signupgroup--social "> 
                                <p class="text-center small msB mlT psT boundT"><?php echo $this->lang->line('or_social'); ?></p> 
                                <div class="unstyled clearfix socialbuttons row text-center" id="social-signup"> 
                                    <div class="social-btn-wrap col-lg-4"> 
                                        <a class="btn btn-facebook btn-social" data-analytics="SignupFacebook">
                                            <i class="fa fa-facebook"></i>Facebook
                                        </a> 
                                    </div> 
                                    <div class="social-btn-wrap col-lg-4"> 
                                        <a class="btn btn-google btn-social" data-analytics="SignupGoogle">
                                            <i class="fa fa-google"></i> Google
                                        </a> 
                                    </div> 
                                    <div class="social-btn-wrap col-lg-4"> 
                                        <a class="btn btn-twitter btn-social" data-analytics="SignupGithub">
                                            <i class="fa fa-twitter"></i> Twitter
                                        </a> 
                                    </div> 
                                </div> 
                            </div> 
                        <?php echo form_close(); ?> 
                    </div> 
            <!-- END SIGNUP TAB  -->

            <!-- START LOGIN TAB  -->
                    <div class="login fade in tab-pane active" id="login"> 
                        <?php echo validation_errors(); ?>
                    <?php $attributes = array(
                                    'class' => 'legacy-form',
                                     'id' => 'legacy-signup');

                    ?>

                    <?php echo form_open('admin/user/login_in', $attributes); ?>
                        
                            <div class="homepage_signupgroup--legacy"> 
                                <div class="text-center alert error glob-error" style="display:none;">
                                </div> 
                                <div class="formgroup"> 
                                    <i  class="glyphicon glyphicon-user"></i> 
                                    <input id="login" class="fw" name="login" value="" placeholder="<?php echo $this->lang->line('your_username'); ?>" type="text"> 
                                </div> 
                                <div class="formgroup"> 
                                    <i class="glyphicon glyphicon-lock"></i> 
                                    <input id="password" class="fw" name="password" placeholder="<?php echo $this->lang->line('your_password'); ?>" type="password"> 
                                </div> 
                                <div class="clearfix msB"> 
                                    <label class="remember pull-left msT">
                                        <input id="remember_me" type="checkbox"> <?php echo $this->lang->line('remember_me'); ?>
                                    </label> 
                                    <a target="_blank" href="https://www.hackerrank.com/auth/forgot_password" class="cursor pull-right password-retrieve btn btn-link">
                                       <?php echo $this->lang->line('forgot_pass'); ?>
                                    </a>
                                     </div> 
                                     <?php echo form_submit('submit', 'log in', 'class="btn btn-primary"'); ?>
                                     <button class="btn btn-primary span4 block-center login-button auth" name="commit" type="submit" value="request" data-analytics="LoginPassword">
                                       <?php echo $this->lang->line('login_me'); ?>
                                     </button> 
                                 </div> 
                                 <div class="homepage_signupgroup--social "> 
                                    <p class="text-center small msB mlT psT boundT">
                                       <?php echo $this->lang->line('or_social'); ?>
                                    </p> 
                                    <div class="unstyled clearfix socialbuttons row text-center" id="social-signup">
                                     <div class="social-btn-wrap col-lg-4"> 
                                        <a class="btn btn-facebook btn-social" data-analytics="SignupFacebook">
                                            <i class="fa fa-facebook"></i>Facebook
                                        </a> 
                                    </div> 
                                    <div class="social-btn-wrap col-lg-4"> 
                                        <a class="btn btn-google btn-social" data-analytics="SignupGoogle">
                                            <i class="fa fa-google"></i> Google
                                        </a> 
                                    </div> 
                                    <div class="social-btn-wrap col-lg-4"> 
                                        <a class="btn btn-twitter btn-social" data-analytics="SignupGithub">
                                            <i class="fa fa-twitter"></i> Twitter
                                        </a> 
                                    </div>  
                                </div> 
                            </div> 
                        </form> 
                    </div> 
            <!-- END LOGIN TAB  -->

                </div>

                </div>
            </div> 
            <div style="border-top: medium none; background: transparent none repeat scroll 0% 0%;" class="hr-dialog-footer"> 

                <div class="hr-dialog-loader"></div> 
                <div class="hr-dialog-success-message"></div>
                <div class="hr-dialog-failed-message"></div> 
                <div class="hr-dialog-buttons clearfix"></div>
                <div class="clearfix"></div> 
            </div> 
        </div> 
    </div>
</div>

</div>





