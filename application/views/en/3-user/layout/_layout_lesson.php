
  
  <?php $this->load->view('en/3-user/components/headers/page_head'); ?>
 <body>
  <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=151538791864963";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

    <!-- START Navigation -->
<?php $this->load->view('en/3-user/components/navigations/navigation_static', $this->data); ?>




    <!-- END Navigation -->


<?php if($error404==false )
{
?>

  <!-- Breadcrumbz -->
  <div class="content-header">
          <div class="container bcrumb-position">
              <div class="clearfix">
                  <div class="pull-left  bcrumb" >
                    <a href="<?php  echo base_url().$language.'/user/category'; ?>">
                      <?php echo $this->lang->line('categories'); ?>
                    </a>
                  <i class="glyphicon glyphicon-chevron-right"></i>                    
                    <a href="<?php  echo base_url().$language.'/user/course/select/'.$course_slug; ?>" >
                      <?php 
                      if($this->data['breadcrumbz_category'] != NULL)
                        {echo $this->lang->line('category').': '.$this->data['breadcrumbz_category']; }
                      else
                        {echo $this->lang->line('category'); }?>
                    </a>  
                  <i class="glyphicon glyphicon-chevron-right"></i>  
                    <a href="<?php  echo base_url().$language.'/user/course/lesson/'.$breadcrumbz_course_slug; ?>"  >
                      <?php 
                      if($this->data['breadcrumbz_course'] != NULL)
                        {echo $this->lang->line('course').': '.$this->data['breadcrumbz_course']; }
                      else
                        { echo $this->lang->line('courses'); }?>
                    </a>                    
                  <?php if($lesson_null != true) {?> 
                  <i class="glyphicon glyphicon-chevron-right"></i>                    
                  <span class="bold">
                    <?php 
                    if($this->data['breadcrumbz_lesson'] != NULL)
                      {echo $this->data['breadcrumbz_lesson']; }
                    else
                      { echo $this->lang->line('courses'); }?></span>
                  <?php } ?>
                  </div>
              </div>
          </div>
      </div>
  <!-- Breadcrumbz -->


  <div id="content" class="main_content">
      <div class="challenge-view">
      <div>
      <div class="challenge-header"><!-- Challange-header START -->
          <div class="container"><!-- CONTAINER START -->
          <div class="clearfix mdT mmB">
              <h2 class="hr_tour-challenge-name pull-left mlT">
                  <?php 
                  if($lesson_404 == false && $lesson_null == false) 
                    if(isset($title)){echo $title;}
                    else{
                      echo $this->lang->line('error_flash_no_lesson');} 
                  elseif($lesson_404 == true && $lesson_null == true) 
                    echo $this->lang->line('preview').": ".$this->data['breadcrumbz_course']; 
                  else 
                    echo $this->lang->line('error_flash_no_lesson'); ?>
              </h2>
          </div>
          
              <div class="clearfix mlB mmT">
                  <?php if($lesson_404 == false):?>
                  <img src="<?php echo $thumb; ?>" class="avatar pull-left msR"  height="25" width="25">
                  <span class="small bold"><?php echo $this->lang->line('lessons_user_author'); ?>
                      <span class="backbone dark-limegreen-link"  ><?php echo $first." ".$last; ?></span></span>
                       <?php echo $this->lang->line('lessons_user_on'); ?>
                       <span class="aside"><?php echo $create; ?></span>
                   <?php endif; ?>
              </div>
          
          </div><!-- CONTAINER END -->
                  

      <div class="container">
          <ul class="nav-tabs nav mlT" >
              <li id="problemTab" class="<?php if(isset($tab_lesson_active)){ echo "active"; } ?>" style="position:relative;top:4px;">
                <a class="hr-problem-link" <?php if($lesson_null == null): ?> href="<?php  echo base_url().$language.'/user/course/lesson/'.$breadcrumbz_course_slug.'/'.$breadcrumbz_lesson_slug.'/'; ?>" <?php endif; ?> >
                  <?php echo $this->lang->line('lessons_user_lesson'); ?>
                </a>
              </li>
              <?php if($lesson_null == null): ?>
              <li id="forumTab" class="<?php if(isset($tab_comments_active)){ echo "active"; } ?>" style="position:relative;top:4px;">
                <a class="hr-forum-link " <?php if($lesson_null == null): ?> href="<?php  echo base_url().$language.'/user/course/lesson/'.$breadcrumbz_course_slug.'/'.$breadcrumbz_lesson_slug.'/comments/'; ?>" <?php endif; ?> >
                  <?php echo $this->lang->line('lessons_user_disscussion'); ?>
                </a>
              </li>   
              <?php endif; ?> 
          </ul>
      </div>
  </div><!-- Challange-header END -->
      <section class="challenge-interface">
          <div class="challenge-body">
          <div class="challenge-body-elements-problem challenge-container-element">
            <div class="challenge-content">
              <div class="container fs-container">
      <div class="row">
         


  <?php $this->load->view('en/3-user/components/views/main_lecture'); ?>
  <?php //$this->load->view('en/3-user/components/views/main_comments'); ?>

  <?php $this->load->view('en/3-user/components/sidebars/sidebar_lecture'); ?>
         


      </div><!-- END OF BIG ASS ROW START -->



    




     
  </div>
  </div>









  </div></div>
      </section>
  </div>
  </div></div>

<?php }else{ ?>


<div id="content" class="main_content">
    <div class="challenge-view">
        <?php $this->load->view('en/0-components/404'); ?>
    <div>
</div>

<?php } $this->load->view('en/3-user/components/footers/footer_white'); ?>
<?php $this->load->view('en/3-user/components/footers/page_tail'); ?>