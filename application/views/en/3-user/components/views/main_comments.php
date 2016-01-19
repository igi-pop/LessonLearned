<?php //if(isset($main_view_data1)) var_dump( $main_view_data1); ?>
<div class="col-md-11 col-lg-12 hr_tour-problem-statement problem-statement" style="padding-bottom:160px;">

<?php if($thread_null == true AND $check_url != NULL){ ?>
<!-- If there is somethig in the url but its not a valid thread -->
<div id="content" class="main_content col-lg-12 pull-right" style="margin-top:150px;">
 <div class="dashboard-track">
   <div class="clearfix">
    <div class="container transition challenge-container">    
    <!-- Activation Default -->
        <div class="col-lg-7 track_contentList" style="text-align:center;">
         <p style="font-size: 80px; text-shadow: 0 5px 20px rgba(0,0,0,0.4);" class="text-center col-lg-12 ">
          <strong><?php  echo $this->lang->line('comment_404');  ?></strong>
        </p>     
         <h3  class=" col-lg-12 color-green  bold lobster" ><?php  echo $this->lang->line('comment_not_found');  ?></h3>
         <div class="small bold col-lg-12"> 
            <span class="zeta "><?php  echo $this->lang->line('comment_exipired');  ?>
            </span>
          </div>
        </div>
    </div>
   </div>
  </div>
</div>
<?php } elseif($thread_null == true AND $check_url == NULL){ ?>
<!-- If there are no comments to be seen -->
<div class="alert alert-info center" style="margin:10px;"><?php  echo $this->lang->line('comment_no_comment');  ?></diV>
<div class="comments-container">
    
    <div class="msB more-comment-list fbt-wt-600 cursor mjT pdT">
        <a class="btn btn-primary btn-large active" role="button" data-toggle="collapse" href="#new_discussion" aria-expanded="false" aria-controls="new_discussion">
          <?php  echo $this->lang->line('comment_btn_new_discussion');  ?>
        </a>
    </div>
    <?php if(validation_errors()) { echo"<div class=\"alert alert-error col-lg-12 col-lg-offset-4 bold\" style=\"clear:right;text-align:center;clear:both;margin:10px\" role=\"alert\">".validation_errors()."</div>"; } ?>
    <div class="comment-response msT  clearfix col-lg-12 collapse " id="new_discussion">
      <label style="font-size:16px;"><?php  echo $this->lang->line('comment_your_c');  ?></label><br />
        <?php  echo form_open('/'.$language.'/user/course/lesson/'.$breadcrumbz_course_slug.'/'.$breadcrumbz_lesson_slug.'/comments/');
        $data = array('name'        => 'comment',
                      'id'          => 'comment',
                      'placeholder' =>  $this->lang->line('comment_comment_placeholder'),
                      'type'        =>  'text',
                      'cols'        => '60', 
                      'rows'        =>  '3',
                      'class'       => 'fw comment-description',
                      );
        echo form_textarea($data);
        echo form_hidden('discussion_active', true);
        echo form_hidden('lesson_id', $lesson_id);
        echo form_hidden('user_id', $this->session->userdata('id'));
        echo form_hidden('reply_id', 'null');
        ?>
      <p class="psT">
        <button name="discussion_submit" type="submit" class="btn msR btn-small add-reply btn-primary">
          <?php  echo $this->lang->line('post');  ?>
        </button>
        <a class="btn error small cancel-response bold" role="button" data-toggle="collapse" href="#new_discussion" aria-expanded="false" aria-controls="new_discussion">
         <?php  echo $this->lang->line('cancel');  ?>
        </a>
      </p>
      <?php echo form_close(); ?>
    </div>
</div>
<?php }else{  ?>
<!-- If there are valid comments to be dispalyed -->
<div class="comments-container">
<!-- Start Create new Threads  -->
  <div class="msB more-comment-list fbt-wt-600 cursor mjT pdT">
    <a class="btn btn-primary btn-large active" role="button" data-toggle="collapse" href="#new_discussion" aria-expanded="false" aria-controls="new_discussion">
     <?php  echo $this->lang->line('comment_btn_new_discussion');  ?>
    </a>
  </div>
  <?php if(validation_errors()) { echo"<div class=\"alert alert-error col-lg-12 col-lg-offset-4 bold\" style=\"clear:right;text-align:center;clear:both;margin:10px\" role=\"alert\">".validation_errors()."</div>"; } ?>
  <div class="comment-response msT  clearfix col-lg-12 collapse " id="new_discussion">
    <label style="font-size:16px;"><?php  echo $this->lang->line('comment_your_c');  ?></label><br />
    <?php 
  echo form_open('/'.$language.'/user/course/lesson/'.$breadcrumbz_course_slug.'/'.$breadcrumbz_lesson_slug.'/comments/');
    $data = array(
           'name'        => 'comment',
           'id'          => 'comment',
           'placeholder' =>  $this->lang->line('comment_comment_placeholder'),
           'type'        =>  'text',
           'cols'        => '60', 
           'rows'        =>  '3',
           'class'       => 'fw comment-description',
           );
    echo form_textarea($data);
    echo form_hidden('discussion_active', true);
    echo form_hidden('lesson_id', $lesson_id);
    echo form_hidden('user_id', $this->session->userdata('id'));
    echo form_hidden('reply_id', 'null');
    ?>                    
    <p class="psT">
      <button name="discussion_submit" type="submit" class="btn msR btn-small add-reply btn-primary">
        <?php  echo $this->lang->line('post');  ?>
      </button>
      <a class="btn error small cancel-response bold" role="button" data-toggle="collapse" href="#new_discussion" aria-expanded="false" aria-controls="new_discussion">
        <?php  echo $this->lang->line('cancel');  ?>
      </a>
    </p>
  <?php echo form_close(); ?>
  </div>
<!-- End of new thread -->
               
  <ul class="has-string discussion-comments" style="padding:5px;display:block;">
<!-- START OF COMMENTS  -->
  <?php  foreach($all_threads as $comment):

    $comment->avatar_image=$this->user_m->thumb_path($this->user_m->get_by_id('id', $comment->user_id));
    $comment_counter=$this->comment_m->count_reply($comment->lesson_id, $comment->comments_id);
    ?>        
  <div class="single-comment" style="margin-bottom:20px !important;border-top:1px solid #C2C7D0;padding-bottom:2px;clear:both;">
    <li class="discussion-comment clearfix more-width" data-id="64561" data-cid="view188">
    <div class="discussion-main more-width">
      <div class="comment-section" >
        <div class="discussion-avatar avatar col-lg-1 pull-left">
          <img src="<?php echo $comment->avatar_image; ?>" alt="" class="avatar" style="max-width:40px; max-height:40px;" >
        </div>
        <header class="comment-header col-lg-10 " style="clear:right;">
          <span class="discussion-name ">
          <a class="backbone" href="systemovich" ><?php echo $comment->username; ?></a>
          </span>
          <span class="discussion-details vertical-align-top "> 
            <?php  echo $this->lang->line('comment_created_thread');  ?>
            <i class="glyphicon glyphicon-time info-color "></i>&nbsp;
            <span class="timeago <?php if(time() - strtotime($comment->date) < 3600 ) echo "info-color bold"; ?>">
              <?php echo  timespan(strtotime($comment->date, time())); ?> 
             <?php  echo $this->lang->line('comment_ago');  ?>
            </span>
            <span class="is-collapsed-meta comment-count color-green bold"><?php if($comment_counter != 0): ?>  +<?php  echo  $comment_counter; ?> 
              <?php  echo $this->lang->line('comment_comments');  ?> 
            <?php endif; ?>
            </span>
          </span>
        </header>           

        <div class="comment-content col-lg-12 pull-left">
          <div class="">
            <p><?php  echo $comment->comment; ?></p>
          </div>
        </div>
        <footer class="comment-footer col-lg-12 pull-left">
          <div>
            <a class="btn-text backbone" href="<?php echo base_url().$language.'/user/course/lesson/'.$breadcrumbz_course_slug.'/'.$breadcrumbz_lesson_slug.'/comments/'.$comment->comments_id.'/'; ?>">
              <?php  echo $this->lang->line('permalink');  ?> 
            </a>&nbsp;
        <?php if($this->session->userdata('id') == $comment->user_id): ?>
            <a class="btn-text mark-spam "  role="button" data-toggle="collapse" href="<?php echo "#edit_".$comment->comments_id; ?>" aria-expanded="false" aria-controls="<?php echo "edit_".$comment->comments_id; ?>" >
               <?php  echo $this->lang->line('edit');  ?> 
            </a>&nbsp;
            <a class="btn-text backbone" href="<?php echo base_url().$language.'/user/course/delete_comment/'.$comment->comments_id.'/'.$breadcrumbz_course_slug.'/'.$breadcrumbz_lesson_slug; ?>" >
             <?php  echo $this->lang->line('delete');  ?> 
            </a>&nbsp;
        <?php endif; ?>
            <a class="btn-text backbone"   role="button" data-toggle="collapse" href="<?php echo "#reply_to_".$comment->comments_id; ?>" aria-expanded="false" aria-controls="<?php echo "reply_to_".$comment->comments_id; ?>">
             <?php  echo $this->lang->line('reply');  ?> 
            </a>&nbsp;
          </div>

          <div class="comment-response msT  clearfix col-lg-12  collapse" id="<?php echo "reply_to_".$comment->comments_id; ?>">
            <label style="font-size:16px;"><?php  echo $this->lang->line('comment_reply');  ?> </label><br />
              <?php 
              echo form_open('/'.$language.'/user/course/lesson/'.$breadcrumbz_course_slug.'/'.$breadcrumbz_lesson_slug.'/comments/');
                  $data = array(
                            'name'        => 'comment',
                            'id'          => 'comment',
                            'placeholder' =>  $this->lang->line('comment_comment_placeholder'),
                            'type'        =>  'text',
                            'cols'        => '60', 
                            'rows'        =>  '3',
                            'class'       => 'fw comment-description',
                            );
                  echo form_textarea($data);             
                  echo form_hidden('reply_active', true);
                  echo form_hidden('user_id', $this->session->userdata('id'));
                  echo form_hidden('lesson_id', $comment->lesson_id);
                  echo form_hidden('reply_id', $comment->comments_id);
            ?>
            <p class="psT">
              <button name="reply_submit" class="btn msR btn-small add-reply btn-primary" data-analytics="ForumAddReply" >
                <?php  echo $this->lang->line('reply');  ?>
              </button>
              <a class="btn error small cancel-response bold" role="button" data-toggle="collapse" href="<?php echo "#reply_to_".$comment->comments_id; ?>" aria-expanded="true" aria-controls="<?php echo "reply_to_".$comment->comments_id; ?>">
                <i class="icon-cancel-small" ></i>
                <?php  echo $this->lang->line('cancel');  ?>
              </a>
            </p>
            <?php echo form_close(); ?>
          </div>

          <div class="comment-response msT  clearfix col-lg-12  collapse" id="<?php echo "edit_".$comment->comments_id; ?>">
              <label style="font-size:16px;">
                <?php  echo $this->lang->line('comment_edit');  ?>
              </label><br />
               <?php 
                echo form_open('/'.$language.'/user/course/lesson/'.$breadcrumbz_course_slug.'/'.$breadcrumbz_lesson_slug.'/comments/');
                $data = array(
                            'name'        => 'comment',
                            'id'          => 'comment',
                            'value'       =>  $comment->comment,
                            'type'        =>  'text',
                            'cols'        => '60', 
                            'rows'        =>  '3',
                            'class'       => 'fw comment-description',
                            );
                echo form_textarea($data); 
                echo form_hidden('update_active', true);
                echo form_hidden('comments_id', $comment->comments_id);                            
                ?>
              <p class="psT">
                <button name="reply_submit" class="btn msR btn-small add-reply btn-primary" data-analytics="ForumAddReply" >
                  <?php  echo $this->lang->line('update');  ?>
                </button>
                <a class="btn error small cancel-response bold" role="button" data-toggle="collapse" href="<?php echo "#reply_to_".$comment->comments_id; ?>" aria-expanded="true" aria-controls="<?php echo "reply_to_".$comment->comments_id; ?>">
                  <i class="icon-cancel-small" ></i>
                  <?php  echo $this->lang->line('cancel');  ?>
                </a>
              </p>
              <?php echo form_close(); ?>
            </div>
          </footer>
        </div>
                  
                      
    <!-- Start of children links -->
      <ul class="has-string children-comments col-lg-offset-1 col-lg-11"  >
        <?php $all_children=$this->comment_m->all_replies($comment->lesson_id, $comment->comments_id);
        $i=0;
        foreach($all_children as $comment):
        $comment->avatar_image=$this->user_m->thumb_path($this->user_m->get_by_id('id', $comment->user_id));
        ?>        
        
        <li class="discussion-comment clearfix more-width" style="margin-top:10px;display:block;">
          <div class="discussion-main more-width">
            <div class="comment-section" data-id="64561">
              <div class="discussion-avatar avatar col-lg-1 pull-left">
                <img src="<?php echo $comment->avatar_image; ?>" alt="" class="avatar" style="max-width:40px; max-height:40px;" >                   
              </div>
              <header class="comment-header col-lg-10 " style="clear:right;">
                <span class="discussion-name ">
                  <a class="backbone" href="systemovich" ><?php echo $comment->username; ?></a>
                </span>
                <span class="discussion-details vertical-align-top "> 
                  replied  
                  <i class="glyphicon glyphicon-time info-color"></i>&nbsp;
                  <span class="timeago <?php if(time() - strtotime($comment->date) < 3599 ) echo "info-color bold"; ?>" title="2015-08-03T21:06:04.000Z">
                    <?php echo  timespan(strtotime($comment->date), time()); ?> 
                    <?php  echo $this->lang->line('comment_ago');  ?>
                  </span>
                </span>
              </header>
                      
              <div class="comment-content col-lg-12 pull-left">
                <div class="">
                  <p><?php  echo $comment->comment; ?></p>
                </div>
              </div>
              <footer class="comment-footer col-lg-12 pull-left ">
                <?php if($this->session->userdata('id') == $comment->user_id): ?>
                <div class="">
                  <a class="btn-text mark-spam "  role="button" data-toggle="collapse" href="<?php echo "#edit_".$comment->comments_id; ?>" aria-expanded="true" aria-controls="<?php echo "edit_".$comment->comments_id; ?>">
                    <?php  echo $this->lang->line('edit');  ?>
                  </a>&nbsp;
                  <a class="btn-text backbone" href="<?php echo base_url().$language.'/user/course/delete_comment/'.$comment->comments_id.'/'.$breadcrumbz_course_slug.'/'.$breadcrumbz_lesson_slug; ?>" >
                   <?php  echo $this->lang->line('delete');  ?>
                  </a>&nbsp;
                </div>
                <?php endif; ?>
                <div class="comment-response msT  clearfix col-lg-12  collapse" id="<?php echo "edit_".$comment->comments_id; ?>">
                    <label style="font-size:16px;"><?php  echo $this->lang->line('comment_edit');  ?> </label><br />
                 <?php 
                  echo form_open('/'.$language.'/user/course/lesson/'.$breadcrumbz_course_slug.'/'.$breadcrumbz_lesson_slug.'/comments/');
                  $data = array(
                          'name'        => 'comment',
                          'id'          => 'comment',
                          'value'       =>  $comment->comment,
                          'type'        =>  'text',
                          'cols'        => '60', 
                          'rows'        =>  '3',
                          'class'       => 'fw comment-description',
                          );
                  echo form_textarea($data);
                  echo form_hidden('update_active', true);
                  echo form_hidden('comments_id', $comment->comments_id);
                  ?>         
                <p class="psT">
                  <button name="reply_submit" class="btn msR btn-small add-reply btn-primary" data-analytics="ForumAddReply" >
                    <?php  echo $this->lang->line('update');  ?>
                  </button>
                  <a class="btn error small cancel-response bold" role="button" data-toggle="collapse" href="<?php echo "#reply_to_".$comment->comments_id; ?>" aria-expanded="true" aria-controls="<?php echo "reply_to_".$comment->comments_id; ?>">
                    <i class="icon-cancel-small" ></i>
                   <?php  echo $this->lang->line('cancel');  ?>
                  </a>
                </p>
                <?php echo form_close(); ?>
                </div>
              </footer>
            </div>
          </div>
        </li>
        <?php $i++; endforeach; ?>
      </ul>
    <!-- END of children links -->

      </div>
    </li>
    </div>
    <?php  endforeach; ?>
<!-- END OF COMMENTS -->
  </ul>

  <div class="msB more-comment-list fbt-wt-600 cursor mjT pdT hide">
    <a class="btn btn-primary btn-large active">Load more conversations</a>
  </div>
</div>

<?php } ?>
</div>