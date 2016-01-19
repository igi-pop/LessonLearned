<?php $this->load->view('home/components/page_head'); ?>
 <body>
    
    <?php 
    $user_language = $this->session->userdata('language');
    $this->lang->load('frontpage_navigation_'.$user_language, $user_language);
    $this->lang->line('name');
     ?>
    <?php $this->load->view('home/components/navigation'); ?>

    
<div class="static-hero hr-home-hero" >
        <video class="videoBg" id="video" style="" autoplay="" loop="" muted="" style="">
            <source src="https://hrcdn.net/videos/hr_20mb.webm" type="video/webm">
            Video not supported
        </video>
        <div class="overlay" style="">
            <div class="container--flex">
                <div class="hero-content">
                    <h1>Bring out the best developer in you.</h1>
                    <p class="">Coding challenges. Community. Awesome jobs.</p>
                    <a class="btn btn-flat btn-primary btn-large"  href="/signup?utm_medium=header&amp;utm_source=hr-homepage">Take challenge now</a>
                </div>
            </div>
        </div>
    </div>

  <aside class="hr-home-herosub fill-dark position-testimonials container-fluid">
    <div class="container--flex  testimonials">
      <q><span class="color-green bold"></span>
      <em>Tell me and I forget. Teach me and I remember. Involve me and I learn.</em></q>
      <br>
      <figcaption class="color-green bold small"> - Benjamin Franklin </figcaption>
    </div>
  </aside>



<section class="container " id="name-logo-animate" data-appear-top-offset='-300'>
                    <div id="top-position" class="cut-off">
                            <span id="top-half" class="color-alt-grey">WEB DESIGN</span>
                    </div>
                    <div id="mid-position" class="" >
                            <span >Just learn it!</span>
                    </div>
                    <div id="bottom-position" class=" cut-off">
                            <span id="bottom-half" class="color-alt-grey">WEB DESIGN</span>
                    </div>
                </section>



  <div   style="overflow:hidden;"> 
    <section class="hr-domains static-section " >
      <div class="tilt">
        <div class="text-center block-center tilt-text container">
            <h2 class="mlB">Learn, Improve and Share your Knowledge</h2>
Learn technology, creative and business skills you can use today.
            <p class="">Learn new technologies in web design, fontend and backend skills you can use today. This site was created to share the knowledge i have learned in completly free enviroment trough lessons, courses, small tips and tricks. Only one thing is required, and that is to register. Registered users have the ability to preview the courses, ask questins on topics that they are interested in, they can also become creators and make courses of their own expertise to help other people furter develope their skills. </p>
        </div>
        
        <div class="hr-domains-cards container-fluid " style="">
            <ul  >
                <li class="hr-domains-card cursor hr-domains-ai  col-xs-5 col-sm-4  col-md-4 col-lg-2 animatedParent animateOnce " data-appear-top-offset='-300' data-link="https://www.hackerrank.com/domains/ai/introduction">
                    <div class="hr-landing-card-details hr-domain-card-details animated fadeIn  slow">
                   <object type="image/svg+xml" data="<?php echo site_url('images/icons/svg/time31.svg'); ?>" class="svg">Your browser does not support SVG</object>
                    


                        <div class="hr-domains-text" >
                            <h5 >Speed up your<br> Development</h5>
                            <p>View courses, practical tips and tricks that can help you accelorate your work</p>
                        </div>
                    </div>
                </li>
                <li class="hr-domains-card cursor hr-domains-ai col-xs-5 col-sm-4  col-md-4 col-lg-2 animatedParent animateOnce " data-appear-top-offset='-330' data-link="https://www.hackerrank.com/domains/algorithms/warmup">
                    <div class="hr-landing-card-details hr-domain-card-details  animated fadeIn  slow">
                    <object type="image/svg+xml" data="<?php echo site_url('images/icons/svg/winner13.svg'); ?>" class="svg">Your browser does not support SVG</object>
                                              <div class="hr-domains-text">
                             <h5>Brainstorming</h5>
                            <p>Solve problems with the help of our members, if you get stuck don't be afraid to ask. </p>
                        </div>
                    </div>
                </li>
                <li class="hr-domains-card cursor hr-domains-ai col-xs-5 col-sm-4  col-md-4 col-lg-2 animatedParent animateOnce " data-appear-top-offset='-360' data-link="https://www.hackerrank.com/domains/fp/intro">
                    <div class="hr-landing-card-details hr-domain-card-details  animated fadeIn  slow">
                          <object type="image/svg+xml" data="<?php echo site_url('images/icons/svg/notebook74.svg'); ?>" class="svg">Your browser does not support SVG</object>
                                <div class="hr-domains-text">
                            <h5>Community</h5>
                            <p>It's hard to get started in web develoment, technologies and technics keep changing, stay in touch with the trends and be a trend setter</p>
                        </div>
                    </div>
                </li>
                <li class="hr-domains-card cursor hr-domains-ai col-xs-5 col-sm-4  col-md-4 col-lg-2 animatedParent animateOnce " data-appear-top-offset='-390' data-link="https://www.hackerrank.com/domains/algorithms/normal-languages">
                    <div class="hr-landing-card-details hr-domain-card-details  animated fadeIn  slow">
                       
                            <object type="image/svg+xml" data="<?php echo site_url('images/icons/svg/briefcase64.svg'); ?>" class="svg">Your browser does not support SVG</object>
                        
                        <div class="hr-domains-text">
                            
                            <h5>Business</h5>
                            <p>Show the world what you are made of, connect your account to other social medias and promote yourself. Let that experiance and expertise shine!</p>
                        </div>
                    </div>
                </li>
                <li class="hr-domains-card cursor hr-domains-ai col-xs-5  col-sm-4 col-md-4 col-lg-2 animatedParent animateOnce " data-appear-top-offset='-410' data-link="https://www.hackerrank.com/domains/ai/machine-learning">
                    <div class="hr-landing-card-details hr-domain-card-details  animated fadeIn  slow">
                        <object type="image/svg+xml" data="<?php echo site_url('images/icons/svg/book229.svg'); ?>" class="svg">Your browser does not support SVG</object>
                        <div class="hr-domains-text">
                            <h5>Learn</h5>
                            <p>Don't stop learning, the mind is mightier then the sword, keep it sharp!</p>
                        </div>
                    </div>
                </li>
            </ul>
            
        </div>
      </div>
    </section>
  </div>














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
</script>


    <?php
     $this->load->view($subview);
   ?>












      <?php //echo mailto('just@codeigniter.cth', '<i class="glyphicon glyphicon-user"></i> igor.vidic@gmail.com'); ?><br />
      <?php //echo anchor('admin/user/logout', '<i class="glyphicon glyphicon-off"></i> Logout'); ?>




<?php $this->load->view('home/components/footer'); ?>
<?php $this->load->view('home/components/page_tail'); ?>

    