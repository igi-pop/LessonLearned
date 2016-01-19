
  <?php $this->load->view('en/0-components/headers/page_head'); ?>
 <body>
  

    <!-- START Navigation -->
<?php $this->load->view('en/3-user/components/navigations/navigation_static', $this->data); ?>




    <!-- END Navigation -->



 







<!-- Breadcrumbz -->
<div class="content-header">
        <div class="container bcrumb-position" style="">
            <div class="clearfix">
                <div class="pull-left  bcrumb" data-step="1" data-intro="Click here to go back to the company page" >
                <a href="/domains" class="backbone" >User</a>
                <i class="glyphicon glyphicon-menu-right mmL"></i>                    
                <a href="/domains/algorithms" class="backbone" ><?php if($this->data['breadcrumbz_category'] != NULL){echo $this->data['breadcrumbz_category']; }else{ echo "Category"; }?></a>  
                <i class="glyphicon glyphicon-menu-right"></i>                    
                <a href="/domains/algorithms/strings" ><?php if($this->data['breadcrumbz_course'] != NULL){echo $this->data['breadcrumbz_course']; }else{ echo "course"; }?></a>
                <?php if($lesson_null != true) {?> 
                <i class="glyphicon glyphicon-menu-right"></i>                    
                <a href="/domains/algorithms/strings" ><?php if($this->data['breadcrumbz_lesson'] != NULL){echo $this->data['breadcrumbz_lesson']; }else{ echo "lesson"; }?></a>
                <?php } ?>

                
                </div>
                
            </div>
        </div>
    </div>


<!-- Breadcrumbz -->


<div id="content" class="main_content">
    <?php if ( $this->session->flashdata('error') !== FALSE ): ?>
        <div class="text-center alert error glob-error"><?php echo validation_errors(); echo $this->session->flashdata('error'); ?></div>
        <?php endif; ?>
    <div class="challenge-view">
    <div>
    <div class="challenge-header"><!-- Challange-header START -->
        <div class="container"><!-- CONTAINER START -->
        <div class="clearfix mdT mmB">
            <h2 class="hr_tour-challenge-name pull-left mlT">
                <?php if($lesson_404 == false && $lesson_null == false) echo $title; elseif($lesson_404 == true && $lesson_null == true) echo "Preview: ".$this->data['breadcrumbz_course']; else echo "We are sorry but we could find that lesson"; ?>
                
            </h2>
            
        </div>
        
            <div class="clearfix mlB mmT">
                <?php if($lesson_404 == false):?>
                <img src="https://hr-avatars.s3.amazonaws.com/8fca191d-5912-43a1-8bbd-2b136fde5fac/150x150.png" class="avatar pull-left msR" onerror="this.onerror=null; this.src='https://d3rpyts3de3lx8.cloudfront.net/hackerrank/assets/gravatar.jpg';" height="25" width="25">
                <span class="small bold">Authored by 
                    <a class="backbone color-blue" href="/Shafaet" ><?php echo $first." ".$last; ?></a></span>
                     on 
                     <span class="aside"><?php echo $create; ?></span>
                 <?php endif; ?>
            </div>
        
        </div><!-- CONTAINER END -->
                

    <div class="container">
        <ul class="nav-tabs nav mlT">
                <li id="problemTab" class="active"><a class="hr-problem-link" href="/challenges/funny-string" >Problem</a></li>
                
                
                    <li id="submissionsTab"><a class="hr-submissions-link" href="/challenges/funny-string/submissions" >Submissions</a></li>
                
                <li id="leaderboardTab"><a class="hr-leaderboard-link" href="/challenges/funny-string/leaderboard" >Leaderboard</a></li>
                
                    <li id="forumTab"><a class="hr-forum-link" href="/challenges/funny-string/forum/questions" >Discussions</a></li>
                
                
                
                  
                
                
                <li id="topicsTab"><a class="hr-topics-link" href="/challenges/funny-string/topics">Topics</a></li>
                
        </ul>
    </div>
</div><!-- Challange-header END -->
    <section class="challenge-interface">
        <div class="challenge-body">
          <div class="challenge-container-element hidden challenge-container-elements-loading">
            <div class="gray block-center">
              <div style="background: url(https://d3rpyts3de3lx8.cloudfront.net/hackerrank/hackerrank_spinner_64x64.gif); height: 64px; width: 64px; display: inline-block;"></div>
            </div>
          </div>
        <div class="challenge-body-elements-problem challenge-container-element"><div class="challenge-content"><div class="container fs-container">
    <div class="row">
       


<?php $this->load->view('en/3-user/components/views/main_lecture'); ?>
<?php $this->load->view('en/3-user/components/sidebars/sidebar_lecture'); ?>
       


    </div><!-- END OF BIG ASS ROW START -->



  




    <div class="challenge_suggestion fullscreen-hide row">
        <div class="span11">
            <div class="formgroup clearfix text-center">
                <div class="alert error hide"></div>
            </div>
            <form  id="suggestion-form" class="hide challenge_suggestion-form fullscreen-hide">
                <p class="challenge_suggestion-header">Thanks for helping us refine this problem statement. Please address your suggestions below. </p>
                <textarea id="suggestion" rows="10" class="challenge_suggestion-input"></textarea>
                <div class="challenge_suggestion-buttons access-buttons clearfix">
                    <div class="pull-right mlB">
                        <button class="btn btn-green js-suggestion-save pull-right" data-analytics="Submit Suggestion">Submit Suggestion</button>
                        <button class="btn btn-text js-suggestion-cancel pull-right" data-analytics="Cancel Suggestion">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>









</div></div>
    </section>
</div>
</div></div>











<?php $this->load->view('home/components/footer'); ?>
<?php $this->load->view('home/components/page_tail'); ?>