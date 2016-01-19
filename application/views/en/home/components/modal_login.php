<!-- START LOGIN TAB  -->

<div class="login fade  tab-pane <?php if($modal_login_active){echo "in active"; } ?>" id="login"> 
<?php $attributes = array(
            'class' => 'legacy-form',
            'id' => 'legacy-signup');
            ?>
    <?php echo form_open('en/home/login', $attributes); ?> 
    
    <div class="homepage_signupgroup--legacy container-fluid"> 
        <?php if (validation_errors() AND $this->session->flashdata('e_login') OR $this->session->flashdata('error') !== FALSE AND $this->session->flashdata('e_login')): ?>
        <div class="text-center alert error glob-error"><?php echo validation_errors(); echo $this->session->flashdata('error'); ?></div>
        <?php endif; ?>



        <div class="rose"> 
            <div class="col-lg-12">
            <i  class="glyphicon glyphicon-user"></i> 
            <input  id="login" 
                    class="col-lg-12" 
                    name="email" 
                    value="" 
                    placeholder="<?php echo $this->lang->line('your_username'); ?>" 
                    type="text"> 
                </div>
        </div> 
        <div class="rose"> 
            <div class="col-lg-12">
            <i class="glyphicon glyphicon-lock"></i> 
            <input  id="password" 
                    class="col-lg-12" 
                    name="password" 
                    placeholder="<?php echo $this->lang->line('your_password'); ?>" 
                    type="password"> 
            </div>
        </div> 
        <div class=""> 
            <label class="remember pull-left msT">
                <input id="remember_me" type="checkbox"> <?php echo $this->lang->line('remember_me'); ?>
            </label> 
            <a  target="_blank" 
                href="" 
                class="cursor pull-right password-retrieve btn btn-link">
            <?php echo $this->lang->line('forgot_pass'); ?>
            </a>
        </div> 
        <button class="btn btn-primary col-lg-4 block-center login-button auth" style="position:relative;top:20px" name="commit" type="submit" value="request" data-analytics="LoginPassword">
            <?php echo $this->lang->line('login_me'); ?>
        </button> 
    </div> 
    

    <div class="homepage_logingroup--social "> 
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