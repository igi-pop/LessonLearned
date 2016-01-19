<?php $this->load->view('en/0-components/headers/page_head'); ?>
 <body style="">
    <?php $this->load->view('en/0-components/navigations/navigation', $this->data); ?>


<div id="carousel-example-generic" class="carousel slide hidden-xs  carousel-position" data-ride="carousel" style="">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner carousel-position" role="listbox" style="position:relative; top:-10px;">
    <div class="item active">
      <img src="<?php echo site_url('images/web-languages.png'); ?>" alt="..." style="overflow:hidden;width:100%; ">
      <div class="white-content color-green ceneter screen-text col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6 col-sm-6 col-sm-offset-3" style=" ">
                    <h1 class="bold"><?php echo $this->lang->line('screen-1-title'); ?></h1>
                    <p class="center"><?php echo $this->lang->line('screen-1-description'); ?></p>
                    <a class="btn btn-flat btn-primary btn-large  "  href="<?php echo site_url($language.'/signup/'); ?>"><?php echo $this->lang->line('screen-1-button'); ?></a>
                </div>
    
      <div class="carousel-caption" >
       
                    
                    
                
      </div>
    </div>
    <div class="item">
      <img src="<?php echo site_url('images/samsung-laptop.jpg'); ?>" alt="..." style=" ">
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

  <aside class="hr-home-herosub fill-dark position-testimonials container-fluid hidden-xs " style="position:relative; top:-10px;">
    <div class="container--flex  testimonials" >
      <q><span class="color-green bold"></span>
      <em  ><?php echo $this->lang->line('quetes_text_1'); ?></em></q>
      <br />
      <figcaption class="color-green bold small" ><?php echo $this->lang->line('quetes_author_1'); ?> </figcaption>
    </div>
  </aside>


  <div class="visible-xs-block">
      <img src="<?php echo site_url('images/samsung-laptop.jpg'); ?>" alt="..." style="width:100%; height:50%;margin-top:6em; ">
      <div class="carousel-caption">
        ...
      </div>
    </div>
                    
  <?php
      $this->load->view($subview);
   ?>
  <section class="container hidden-xs hidden-sm" id="name-logo-animate" data-appear-top-offset='-300'>
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
        <div class="text-center block-center tilt-text container-fluid">
            <h2 class="mlB"><?php echo $this->lang->line('main_content_title'); ?></h2>

            <p class=""><?php echo $this->lang->line('main_content'); ?></p>
        </div>
        
        <div class="hr-domains-cards container-fluid visible-lg" style="">
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
                 <li class="hr-domains-card cursor hr-domains-ai  col-xs-10 col-xs-offset-1 col-sm-4  col-md-8 col-lg-2 col-lg-offset-0  animatedParent animateOnce " >
                    <div class="hr-landing-card-details hr-domain-card-details animated fadeIn  slow">
                   <object type="image/svg+xml" data="<?php $icon = $this->lang->line('tab_icon_2'); echo site_url($icon); ?>" class="svg">Your browser does not support SVG</object>
                    


                        <div class="hr-domains-text" >
                            <h5><?php echo $this->lang->line('tab_title_2'); ?></h5>
                            <p><?php echo $this->lang->line('tab_content_2'); ?></p>
                        </div>
                    </div>
                </li>
                <li class="hr-domains-card cursor hr-domains-ai  col-xs-10 col-xs-offset-1 col-sm-4  col-md-8 col-lg-2 col-lg-offset-0  animatedParent animateOnce " >
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
<div class="container-fluid hidden-lg">
  <div class="row">
         <div class="hr-landing-card-details1 hr-domain-card-details1 col-md-3 col-md-offset-2 col-sm-4 col-sm-offset-1 col-xs-8 col-xs-offset-2">
                   <object type="image/svg+xml" data="<?php $icon = $this->lang->line('tab_icon_1'); echo site_url($icon); ?>" class="svg">Your browser does not support SVG</object>
                    


                        <div class="hr-domains-text" >
                            <h5><?php echo $this->lang->line('tab_title_1'); ?></h5>
                            <p><?php echo $this->lang->line('tab_content_1'); ?></p>
                        </div>
                    </div>
                     <div class="hr-landing-card-details1 hr-domain-card-details1 col-md-3 col-md-offset-2 col-sm-4 col-sm-offset-1 col-xs-8 col-xs-offset-2">
                   <object type="image/svg+xml" data="<?php $icon = $this->lang->line('tab_icon_2'); echo site_url($icon); ?>" class="svg">Your browser does not support SVG</object>
                    


                        <div class="hr-domains-text" >
                            <h5><?php echo $this->lang->line('tab_title_2'); ?></h5>
                            <p><?php echo $this->lang->line('tab_content_2'); ?></p>
                        </div>
                    </div>
  </div>

  <div class="row">
         <div class="hr-landing-card-details1 hr-domain-card-details1 col-md-3 col-md-offset-2 col-sm-4 col-sm-offset-1 col-xs-8 col-xs-offset-2">
                   <object type="image/svg+xml" data="<?php $icon = $this->lang->line('tab_icon_3'); echo site_url($icon); ?>" class="svg">Your browser does not support SVG</object>
                    


                        <div class="hr-domains-text" >
                            <h5><?php echo $this->lang->line('tab_title_3'); ?></h5>
                            <p><?php echo $this->lang->line('tab_content_4'); ?></p>
                        </div>
                    </div>
                     <div class="hr-landing-card-details1 hr-domain-card-details1 col-md-3 col-md-offset-2 col-sm-4 col-sm-offset-1 col-xs-8 col-xs-offset-2">
                   <object type="image/svg+xml" data="<?php $icon = $this->lang->line('tab_icon_4'); echo site_url($icon); ?>" class="svg">Your browser does not support SVG</object>
                    


                        <div class="hr-domains-text" >
                            <h5><?php echo $this->lang->line('tab_title_4'); ?></h5>
                            <p><?php echo $this->lang->line('tab_content_4'); ?></p>
                        </div>
                    </div>
  </div>



                  </div>
<?php 
// $this->load->view('en/home/components/modal', $this->data);


 ?>













   












      <?php //echo mailto('just@codeigniter.cth', '<i class="glyphicon glyphicon-user"></i> igor.vidic@gmail.com'); ?><br />
      <?php //echo anchor('admin/user/logout', '<i class="glyphicon glyphicon-off"></i> Logout'); ?>




<?php $this->load->view('en/0-components/footers/footer'); ?>
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