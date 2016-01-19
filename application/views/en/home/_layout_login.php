<?php $this->load->view('en/0-components/headers/page_head'); ?>


 <body >
  
    <?php $this->load->view('en/0-components/navigations/navigation', $this->data); ?>

    <!-- START LOGIN TAB  -->
<div class="  col-sm-10 col-sm-offset-1 col-lg-5 col-md-8 col-md-offset-2 col-lg-offset-4" id="login" style="margin-top:80px;margin-bottom:40px">
 
<?php $attributes = array(
            'class' => 'legacy-form',
            'id' => 'legacy-signup');
            ?>
    <?php echo form_open($language.'/home/login', $attributes); ?> 
    
    <div class="homepage_signupgroup--legacy container-fluid"> 
    <?php if (validation_errors() AND $this->session->flashdata('e_login') OR $this->session->flashdata('error') !== FALSE AND $this->session->flashdata('e_login')): ?>
        <div class="text-center alert error glob-error"><?php echo validation_errors(); echo $this->session->flashdata('error'); ?></div>
        <?php endif; ?>



        <div class="rose"> 
            <div class="col-lg-10 col-md-10 col-xs-12 col-sm-10 col-sm-offset-1 ">
            <i  class="glyphicon glyphicon-user"></i> 
            <input  id="login" 
                    class="col-lg-12 col-xs-12" 
                    name="email" 
                    value="" 
                    placeholder="<?php echo $this->lang->line('your_username'); ?>" 
                    type="text"> 
                </div>
        </div> 
        <div class="rose"> 
            <div class="col-lg-10 col-md-10 col-xs-12 col-sm-10 col-sm-offset-1">
            <i class="glyphicon glyphicon-lock"></i> 
            <input  id="password" 
                    class="col-lg-12 col-xs-12" 
                    name="password" 
                    placeholder="<?php echo $this->lang->line('your_password'); ?>" 
                    type="password"> 
            </div>
        </div> 
        <div class=""> 
           
            <a  target="_blank" 
                href="<?php echo site_url('/'.$language.'/home/recovery'); ?>" 
                class="cursor pull-right password-retrieve btn btn-link ">
            <?php echo $this->lang->line('forgot_pass'); ?>
            </a>
        </div> 
        <button class="btn btn-primary col-xs-4 col-lg-4 col-lg-offset-4 col-sm-4 block-center login-button " style="position:relative;top:20px" name="commit" type="submit" value="request" data-analytics="LoginPassword">
            <?php echo $this->lang->line('login_me'); ?>
        </button> 
    </div> 
    

    <div class="homepage_logingroup--social "> 
        <p class="text-center small msB mlT psT boundT">
            <?php echo $this->lang->line('or_social'); ?>
        </p> 
        <div class="unstyled clearfix socialbuttons row text-center " id="social-signup">
            <div class="social-btn-wrap col-lg-4 col-lg-offset-4"> 
               <a href="<?= $login_url ?>" class="btn btn-social btn-facebook " data-analytics="SignupFacebook">
               <i class="fa fa-facebook"></i>Facebook
               </a> 
            </div> 
            
        </div> 
    </div> 
    </form> 
</div> 









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

    <script type="text/javascript">
jQuery('object.svg').each(function(){
            var $img = jQuery(this);
            var imgID = $img.attr('id');
            var imgClass = $img.attr('class');
            var imgURL = $img.attr('data');

            jQuery.get(imgURL, function(data) {
                // Get the SVG tag, ignore the rest
                var $svg = jQuery(data).find('svg');

                // Add replaced image's ID to the new SVG
                if(typeof imgID !== 'undefined') {
                    $svg = $svg.attr('id', imgID);
                }
                // Add replaced image's classes to the new SVG
                if(typeof imgClass !== 'undefined') {
                    $svg = $svg.attr('class', imgClass+' replaced-svg');
                }

                // Remove any invalid XML tags as per http://validator.w3.org
                $svg = $svg.removeAttr('xmlns:a');

                // Replace image with new SVG
                $img.replaceWith($svg);

            }, 'xml');

        });

function slowEasyIn()
{
    $('#name-logo-animate #mid-position').animate({
            transition: '.6s ease all',
            opacity:'0.8'
            }, 1800
       );
   
}
function slowSpread()
{
    $('#name-logo-animate #bottom-position').animate({
            top:'20', 
            opacity:'1'
            }, 800
       );
        $('#name-logo-animate #top-position').animate({
            top:'-20', 
            opacity:'1',
            transition: '.6s ease all'
            }, 800
       );
   
}
$('#name-logo-animate #mid-position').animate({
        height:'0', 
        opacity:'0.0',
        },0.00000000001
   );
  $('#name-logo-animate #bottom-position').animate({
        top:'22', 
        opacity:'1',
        },0.00000000001
   );
    $('#name-logo-animate #top-position').animate({
        top:'22', 
        opacity:'1',
        transition: '.6s ease all'
        },0.00000000001
   );
   $(window).on('scroll', function() {
    var y_scroll_pos = window.pageYOffset;
   
    var scroll_pos_test = 1500;             // set to whatever you want it to be

    if($("#name-logo-animate").isOnScreen(0.9, 0.9)) {
      window.setTimeout(slowSpread, 1200);
      window.setTimeout(slowEasyIn, 1500);
    }
});

$.fn.isOnScreen = function(x, y){
    
    if(x == null || typeof x == 'undefined') x = 1;
    if(y == null || typeof y == 'undefined') y = 1;
    
    var win = $(window);
    
    var viewport = {
        top : win.scrollTop(),
        left : win.scrollLeft()
    };
    viewport.right = viewport.left + win.width();
    viewport.bottom = viewport.top + win.height();
    
    var height = this.outerHeight();
    var width = this.outerWidth();
 
    if(!width || !height){
        return false;
    }
    
    var bounds = this.offset();
    bounds.right = bounds.left + width;
    bounds.bottom = bounds.top + height;
    
    var visible = (!(viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < bounds.top || viewport.top > bounds.bottom));
    
    if(!visible){
        return false;   
    }
    
    var deltas = {
        top : Math.min( 1, ( bounds.bottom - viewport.top ) / height),
        bottom : Math.min(1, ( viewport.bottom - bounds.top ) / height),
        left : Math.min(1, ( bounds.right - viewport.left ) / width),
        right : Math.min(1, ( viewport.right - bounds.left ) / width)
    };
    
    return (deltas.left * deltas.right) >= x && (deltas.top * deltas.bottom) >= y;
    
};


</script>