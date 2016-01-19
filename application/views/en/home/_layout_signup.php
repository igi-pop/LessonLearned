<?php $this->load->view('en/0-components/headers/page_head'); ?>

 <body >
    
  

    <?php $this->load->view('en/0-components/navigations/navigation', $this->data); ?>

    <!-- START LOGIN TAB  -->
 <div  id="hr-dialog-4397332843" class="modal-open modal-above " role="dialog" style="height:100% !important;">
<div class="hr-dialog " role="dialog" style="position:relative;top:none;left:none;"> 
    <div class="hr-dialog-border  col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-xs-12 no-padding" style=""> 
      <!-- padding:100px; -->
        <div class="hr-dialog-main-window col-md-12 col-xs-12 no-padding" style="background: transparent !important; position: relative;z-index:770;">
            <div class="hr-dialog-header" >
                <a href=" <?php echo site_url($language.'/home'); ?>" class="close" >
                    <i class="glyphicon glyphicon-remove"> </i>
                </a>
            </div>
            
            <div class="nav nav-tabs hr-dialog-body " id="login-tabs">
                <div class="login-group homepage_admin tab-content"> 
                    <ul class="login_tab unstyled horizontal  nav nav-justified"> 
                        <li class="signup-toggle toggle <?php if($modal_signup_active){echo " active"; } ?>" id="login-tab">
                            <a href="#signup" data-toggle="tab"><?php echo $this->lang->line('signup'); ?></a>
                        </li> 
                        
                    </ul> 



        <div class="tab-content">
        
 <?php // if(isset($main_view_data1)) dump($main_view_data1);

       ?>

 <div class="visible-xs-block visible-sm-block visible-md-block visible-lg-block " id="signup" > 
  <h3 class="title-h5 note-title visible-xs-block" style="margin-top:50px;margin-left:20px;">Create an account:</h3>
    <?php $attributes = array(
            'class' => 'legacy-form',
            'id' => 'legacy-signup');
            ?>

    <?php echo form_open($language.'/home/signup', $attributes); ?> 
          
        <?php  
        if (validation_errors() AND $this->session->flashdata('e_signup') OR $this->session->flashdata('error') != FALSE AND $this->session->flashdata('e_signup')): ?>
        <div class="text-center alert error glob-error col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3"><?php echo validation_errors(); echo $this->session->flashdata('error'); ?></div>
        <?php endif; ?>
            <div class="homepage_signupgroup--legacy container-fluid col-lg-12 col-md-12 col-sm-12" style="overflow:hidden;padding:20px 35px;"> 
            <?php echo $this->session->userdata('error'); ?> 
            <input type="hidden" name="form" value="form_signup">
               <div class="rose setting-roses" style=""> 
                    <div class=" col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-0 col-lg-5 col-lg-offset-1">
                    <input  type="text"
                            id="first_name" 
                            name="first_name" 
                            class=" col-xs-12"
                            style="margin-top:20px;"
                            value="<?php if(!empty($this->session->userdata('first_name')))
                                    {echo $this->session->userdata('first_name'); } ?>"     
                            placeholder="<?php  echo $this->lang->line('first_name');  ?>">     
                    </div>
                    <div class=" col-xs-12  col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-0 col-lg-5 col-lg-offset-0" style="">
                    <input  type="text"
                            id="last_name"
                            name="last_name" 
                            class=" col-xs-12"
                            style="margin-top:20px;"
                            value="<?php if(!empty($this->session->userdata('last_name'))){echo trim($this->session->userdata('last_name')); } ?>"
                            placeholder="<?php echo trim($this->lang->line('last_name')); ?>"> 
                    </div>
                </div> 
                          
            <div  class=" rose"> 
                <div class="col-lg-10 col-lg-offset-1 col-xs-12 col-md-6 col-md-offset-0 col-sm-8 col-sm-offset-2">
                <i class="glyphicon glyphicon-envelope " ></i> 
                <input id="email" class=" col-xs-12 " name="email" value="<?php 
                        if(!empty($this->session->userdata('email')))
                        {echo$this->session->userdata('email'); } ?>"
                      placeholder="<?php echo trim($this->lang->line('your_email')); ?>"  type="email"> 
                </div>
                <div class="col-lg-10 col-lg-offset-1 col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-0">
                    <i class="glyphicon glyphicon-user "></i> 
                    <input id="username" class="col-xs-12" name="username" value="<?php 
                            if(!empty($this->session->userdata('username')))
                                {echo$this->session->userdata('username'); } ?>"
                           placeholder="<?php echo trim($this->lang->line('choose_username')); ?>"  type="text"> 
                </div>
            </div>                 
                   
            <div class="rose"> 
                <div class="col-lg-5 col-lg-offset-1 col-xs-12 col-md-6 col-md-offset-0 col-sm-8 col-sm-offset-2">
                <i class="glyphicon glyphicon-lock"></i> 
                <input id="password" 
                      class="check col-xs-12" 
                      name="password" 
                      placeholder="<?php echo $this->lang->line('choose_password'); ?>"  
                      type="password">
                </div>
                <div class="col-lg-5 col-lg-offset-0 col-xs-12 col-md-6 col-md-offset-0 col-sm-8 col-sm-offset-2"> 
                <i class="glyphicon glyphicon-lock"></i> 
                <input id="password" 
                       class="check col-xs-12 " 
                       name="password_confirm" 
                       placeholder="<?php echo $this->lang->line('confirm_password'); ?>"  
                       type="password">
                </div> 
            </div>
           
            <?php  echo "<div class=\"col-xs-12 col-xs-1  col-sm-10 col-sm-offset-4 col-lg-5 col-lg-offset-1\" style=\"border;1px solid green;margin-left:10px;margin-top:80px;\">
            <span class=\"hidden-xs col-sm-4 col-md-4 col-lg-8 \" >&nbsp</span><span class=\"col-lg-4 col-md-4 col-sm-4\">".$recaptcha_html."</span> </div>"; ?> <br />
                  
            <button  class="btn btn-primary  col-xs-12 col-sm-4 col-sm-offset-4 col-lg-4 col-offset-1" name="signup-submit" type="submit" value="request" ><?php echo $this->lang->line('create_account'); ?></button> 
                        
            </div>
        

                         
                            
                            <div class="unstyled clearfix socialbuttons row text-center" id="social-signup"> 
                               <p class="text-center small  col-lg-12 col-md-12 col-sm-12 col-xs-12 boundT"><?php echo $this->lang->line('or_social'); ?></p> 
                                <div class="social-btn-wrap col-lg-4 col-lg-offset-4 col-md-12 col-sm-12 col-xs-12"> 
                                <a href="<?= $login_url ?>" class="btn btn-social btn-facebook " >
                                <i class="fa fa-facebook"></i>Facebook
                                </a> 
                                </div> 
                                
                               
                            
                             </div> 
                     <?php echo form_close(); ?>
           </div>          
</div> </div>
            <!-- END SIGNUP TAB  -->
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










<script type="text/javascript">

var screenWidth = window.screen.width,
    screenHeight = window.screen.height;    


/*
$( window ).resize(function() {
 
  var captcha =<?php  $recaptcha_html;  ?>;
 if(screenWidth >= 991 ){
 $('#smallscreen').remove();
 alert('bu');
 $('#largescreenplace').append('<div id=\"smallscreen\" class=\"\">'+captcha+'</div>');
}else{
  alert('bu');
  $('#largescreen').remove();
  $('#smallscreenplace').append('<div id=\"largescreen\" class=\"\">'+captcha+'</div>');
  <?php // echo "$('#smallscreenplace').append('<div id=\"smallscreen\" class=\"\">".$recaptcha_html."</div>')"; ?>
}
});
*/
</script>


<div class="wrap hidden-xs hidden-sm hidden" >
<div id="carousel-example-generic" class="carousel slide hidden-xs" data-ride="carousel" style="position:relative; top:40px; height:750px">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox" style="">
    <div class="item active">
      <img src="<?php echo site_url('images/php-code.jpg'); ?>" alt="..." style="overflow:hidden;">
      <div class="hero-content color-green ceneter" style="position:absolute; top:-50px;right:10px;z-index:9000; ">
                    <h1 class="bold">Bring out the best developer in you.</h1>
                    <p class="center">Coding challenges. Community. Awesome tutorials.</p>
                    <a class="btn btn-flat btn-primary btn-large col-lg-offset-5"  href="/signup?utm_medium=header&amp;utm_source=hr-homepage">Join Now</a>
                </div>
    
      <div class="carousel-caption" >
       
                    
                    
                
      </div>
    </div>
    <div class="item">
      <img src="<?php echo site_url('images/busin.jpg'); ?>" alt="...">
      <div class="carousel-caption">
        ...
      </div>
    </div>
    ...
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

  <aside class="hr-home-herosub fill-dark position-testimonials container-fluid">
    <div class="container--flex  testimonials" >
      <q><span class="color-green bold"></span>
      <em  ><?php echo $this->lang->line('quetes_text_1'); ?></em></q>
      <br />
      <figcaption class="color-green bold small" ><?php echo $this->lang->line('quetes_author_1'); ?> </figcaption>
    </div>
  </aside>

                    
  <?php
      $this->load->view($subview);
   ?>
  <section class="container hidden-xs" id="name-logo-animate" data-appear-top-offset='-300'>
    <div id="top-position" class="cut-off">
     <span id="top-half" class="color-alt-grey"><?php echo $this->lang->line('logo_devide'); ?></span>
    </div>
    <div id="mid-position">
      <span ><?php echo $this->lang->line('logo_fade_in'); ?></span>
    </div>
    <div id="bottom-position" class=" cut-off">
      <span id="bottom-half" class="color-alt-grey"><?php echo $this->lang->line('logo_devide'); ?></span>
    </div>
  </section>



  <div   style="overflow:hidden;"> 
    <section class="hr-domains static-section " >
      <div class="tilt">
        <div class="text-center block-center tilt-text container">
            <h2 class="mlB"><?php echo $this->lang->line('main_content_title'); ?></h2>

            <p class=""><?php echo $this->lang->line('main_content'); ?></p>
        </div>
        
        <div class="hr-domains-cards container-fluid " style="">
            <ul  >
                <li class="hr-domains-card cursor hr-domains-ai  col-xs-10 col-xs-offset-1 col-sm-4  col-md-4 col-lg-2 col-lg-offset-0  animatedParent animateOnce " >
                    <div class="hr-landing-card-details hr-domain-card-details animated fadeIn  fast">
                   <object type="image/svg+xml" data="<?php $icon = $this->lang->line('tab_icon_1'); echo site_url($icon); ?>" class="svg">Your browser does not support SVG</object>
                    


                        <div class="hr-domains-text" >
                            <h5><?php echo $this->lang->line('tab_title_1'); ?></h5>
                            <p><?php echo $this->lang->line('tab_content_1'); ?></p>
                        </div>
                    </div>
                </li>
                 <li class="hr-domains-card cursor hr-domains-ai  col-xs-10 col-xs-offset-1 col-sm-4  col-md-4 col-lg-2 col-lg-offset-0  animatedParent animateOnce " >
                    <div class="hr-landing-card-details hr-domain-card-details animated fadeIn  slow">
                   <object type="image/svg+xml" data="<?php $icon = $this->lang->line('tab_icon_2'); echo site_url($icon); ?>" class="svg">Your browser does not support SVG</object>
                    


                        <div class="hr-domains-text" >
                            <h5><?php echo $this->lang->line('tab_title_2'); ?></h5>
                            <p><?php echo $this->lang->line('tab_content_2'); ?></p>
                        </div>
                    </div>
                </li>
                <li class="hr-domains-card cursor hr-domains-ai  col-xs-10 col-xs-offset-1 col-sm-4  col-md-4 col-lg-2 col-lg-offset-0  animatedParent animateOnce " >
                    <div class="hr-landing-card-details hr-domain-card-details animated fadeIn  slow">
                   <object type="image/svg+xml" data="<?php $icon = $this->lang->line('tab_icon_3'); echo site_url($icon); ?>" class="svg">Your browser does not support SVG</object>
                    


                        <div class="hr-domains-text" >
                            <h5><?php echo $this->lang->line('tab_title_3'); ?></h5>
                            <p><?php echo $this->lang->line('tab_content_3'); ?></p>
                        </div>
                    </div>
                </li>

                <li class="hr-domains-card cursor hr-domains-ai  col-xs-10 col-xs-offset-1 col-sm-4  col-md-4 col-lg-2 col-lg-offset-0  animatedParent animateOnce " >
                    <div class="hr-landing-card-details hr-domain-card-details animated fadeIn  slow">
                   <object type="image/svg+xml" data="<?php $icon = $this->lang->line('tab_icon_4'); echo site_url($icon); ?>" class="svg">Your browser does not support SVG</object>
                    


                        <div class="hr-domains-text" >
                            <h5><?php echo $this->lang->line('tab_title_4'); ?></h5>
                            <p><?php echo $this->lang->line('tab_content_4'); ?></p>
                        </div>
                    </div>
                </li>
                <li class="hr-domains-card cursor hr-domains-ai  col-xs-10 col-xs-offset-1 col-sm-4  col-md-4 col-lg-2 col-lg-offset-0 animatedParent animateOnce " >
                    <div class="hr-landing-card-details hr-domain-card-details animated fadeIn  slow">
                   <object type="image/svg+xml" data="<?php $icon = $this->lang->line('tab_icon_5'); echo site_url($icon); ?>" class="svg">Your browser does not support SVG</object>
                    


                        <div class="hr-domains-text" >
                            <h5><?php 

                            echo $this->lang->line('tab_title_5'); ?></h5>
                            <p><?php echo $this->lang->line('tab_content_5'); ?></p>
                        </div>
                    </div>
                </li>
               
            </ul>
            
        </div>
      </div>
    </section>
  </div>

<?php 
// $this->load->view('en/home/components/modal', $this->data);


 ?>













   












      <?php //echo mailto('just@codeigniter.cth', '<i class="glyphicon glyphicon-user"></i> igor.vidic@gmail.com'); ?><br />
      <?php //echo anchor('admin/user/logout', '<i class="glyphicon glyphicon-off"></i> Logout'); ?>




<?php $this->load->view('en/0-components/footers/footer'); ?>
</div>
<?php $this->load->view('en/0-components/footers/page_tail'); ?>

    