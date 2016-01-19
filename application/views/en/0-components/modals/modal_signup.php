
<div class=" signup fade  tab-pane <?php if($modal_signup_active){echo "in active"; } ?>" id="signup" > 
    <?php $attributes = array(
            'class' => 'legacy-form',
            'id' => 'legacy-signup');
            ?>

    <?php echo form_open('en/home/signup', $attributes); ?> 
         <form  id="legacy-signup" class="legacy-form"> 
        <?php  
        if (validation_errors() AND $this->session->flashdata('e_signup') OR $this->session->flashdata('error') !== FALSE AND $this->session->flashdata('e_signup')): ?>
        <div class="text-center alert error glob-error"><?php echo validation_errors(); echo $this->session->flashdata('error'); ?></div>
        <?php endif; ?>
            <div class="homepage_signupgroup--legacy container-fluid" style=""> 
            <?php echo $this->session->userdata('error'); ?> 
            <input type="hidden" name="form" value="form_signup">
               <div class="rose setting-roses"> 
                    <div class="col-lg-5 first-left">
                    <input  type="text"
                            id="first_name" 
                            name="first_name" 
                            class=" "
                            value="<?php if(!empty($this->session->userdata('first_name')))
                                    {echo $this->session->userdata('first_name'); } ?>"     
                            placeholder="<?php  echo $this->lang->line('first_name');  ?>">     
                    </div>
                    <div class="col-lg-5 first-right">
                    <input  type="text"
                            id="last_name"
                            name="last_name" 
                            value="<?php if(!empty($this->session->userdata('last_name'))){echo trim($this->session->userdata('last_name')); } ?>"
                            placeholder="<?php echo trim($this->lang->line('last_name')); ?>"> 
                    </div>
                </div> 
                          
            <div  class=" rose"> 
                <div class="col-lg-5 left">
                <i class="glyphicon glyphicon-envelope " ></i> 
                <input id="email" class=" " name="email" value="<?php 
                        if(!empty($this->session->userdata('email')))
                        {echo$this->session->userdata('email'); } ?>"
                      placeholder="<?php echo trim($this->lang->line('your_email')); ?>"  type="email"> 
                </div>
                <div class="col-lg-5 right">
                    <i class="glyphicon glyphicon-user "></i> 
                    <input id="username" class="" name="username" value="<?php 
                            if(!empty($this->session->userdata('username')))
                                {echo$this->session->userdata('username'); } ?>"
                           placeholder="<?php echo trim($this->lang->line('choose_username')); ?>"  type="text"> 
                </div>
            </div>                 
                   
            <div class="rose"> 
                <div class="col-lg-5 last-left">
                <i class="glyphicon glyphicon-lock"></i> 
                <input id="password" 
                      class="check " 
                      name="password" 
                      placeholder="<?php echo $this->lang->line('choose_password'); ?>"  
                      type="password">
                </div>
                <div class="col-lg-5 last-right"> 
                <i class="glyphicon glyphicon-lock"></i> 
                <input id="password" 
                       class="check " 
                       name="password_confirm" 
                       placeholder="<?php echo $this->lang->line('choose_password'); ?>"  
                       type="password">
                </div> 
            </div>
            <?php echo $recaptcha_html; ?> 
                   
            <button id="btn-signup" class="btn btn-primary  block-center signup-button" name="signup-submit" type="submit" value="request" ><?php echo $this->lang->line('create_account'); ?></button> 
                        
            </div>
        

                         <div class="homepage_signupgroup--social "> 
                            <p class="text-center small   boundT"><?php echo $this->lang->line('or_social'); ?></p> 
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

            <!-- END SIGNUP TAB  -->