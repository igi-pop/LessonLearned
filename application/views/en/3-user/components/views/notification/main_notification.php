<h1 ><?php  echo $this->lang->line('Notification_title');  ?></h1>
<h4 class="color-alt-grey"><a class="grey-link" href="<?php echo base_url().$language.'/user/profile/notification_delete/'; ?>">
  <i class="glyphicon glyphicon-trash" style="font-size:20px"></i><?php echo '&nbsp;'.$this->lang->line('clear_notifications'); ?></a></h4>

 <div class="col-lg-5 col-lg-offset-6 title-h5" style="text-align:right;margin-right;100px;clear:both;">
  <div class="btn-group ">
    <?php  echo $this->lang->line('note_status');  ?><br />
    <?php  echo $flag_links; ?>
  </div>
</div>

<?php  if(isset($all_notifications)): ?>
<?php foreach($all_notifications as $notification): ?>
  <?php  if($notification->type==3): ?>
  <div class="col-lg-10 col-lg-offset-1 col-xs-12 challenges-list note" style="margin-top:10px;padding-right:0px ">
       <div class="challenges-list-view mdB" style="clear:both" >
         <div id="contest-challenges-problem" class="content--list track_content ">
           <div class=" row">
            <?php  if($notification->flag == 1) {?>
            <img src="<?php echo  image_path('images/new_ribbon.png'); ?>" style="position:absolute;right:-4px;top:-4px;z-index:70 " />
            <?php } ?>
            <section class="col-lg-12 col-xs-8" style="padding:20px; padding-left:40px; padding-right:40px;">
            <div class="row challengecard-title bold">
              <span class="pull-left challengecard-title  bold" style="margin-30px;">
              <?php if($notification->type == 1){ ?>  
              <a href="<?php echo base_url().$language.'/admin/notification/view/'.$notification->note_id; ?>" class="backbone title-link" >
                <?php echo $notification->lesson_name; ?>
              </a> 
              <?php } 
              elseif($notification->type == 3){ ?>
                  <?php  echo $this->lang->line('note_applicant');  ?> 
                  <a href="#" class="backbone title-link" >
                      <?php echo $notification->username; ?>
                  </a>
              <?php } ?>
              </span>
              <span class="pull-right "  style="font-size:14px;margin-left:30px;">
                <?php  echo $this->lang->line('note_type');  ?> 
                <span class="color-green"> 
                  <?php echo $notification->type_name; ?>
                </span>
              </span>
               
              <span class="pull-right"  style="font-size:14px">
                <?php  echo $this->lang->line('note_status');  ?> 
                <span class="color-alt-grey">
                  <?php echo $notification->status; ?>
                </span>
              </span>
          </div>
          <div class="row" style="margin-top:10px">
      <?php if($notification->first_name): ?>
            <span class="col-lg-4 bold">
                <?php  echo $this->lang->line('note_first_name');  ?> 
            <span class="color-alt-grey" style="font-size:16px">
                <?php echo $notification->first_name; ?>
            </span>
            </span>
      <?php endif; ?>
      <?php if($notification->last_name): ?>
            <span class="col-lg-4 bold">
               <?php  echo $this->lang->line('note_last_name');  ?> 
            <span class="color-alt-grey" style="font-size:16px">
                <?php echo $notification->last_name; ?>
            </span>
            </span>
      <?php endif; ?>
      <?php if($notification->date): ?> 
            <span class="col-lg-4 bold">
                <?php  echo $this->lang->line('note_sent_on');  ?>  
              <span class="color-alt-grey" style="font-size:16px">
                <?php echo date('d M Y',strtotime($notification->date)); ?>
              </span>
            </span>
      <?php endif; ?>
          </div>
        </section> 
        </div> 
       </div>
      </div>
    </div>
    <div class="color-alt-grey note-submeni " >
      <a href="<?php echo base_url().$language.'/user/profile/note_delete/'.$notification->note_id.'/'; ?>" 
          onclick= "return confirm('<?php  echo $this->lang->line('popout_confirm_delete');  ?>')" title="<?php  echo $this->lang->line('popout_delete_title');  ?>" class="note-submeni-link">
          <i class="<?php  echo $this->lang->line('popout_delete_icon');  ?>">
          </i>
        </a>
      <a href="<?php echo base_url().$language.'/user/profile/notification_details/'.$notification->note_id.'/'; ?>" title="<?php  echo $this->lang->line('popout_view_title');  ?>" class="note-submeni-link">
        <i class="<?php  echo $this->lang->line('popout_view_icon');  ?>"></i>
      </a>
    </div>
  <?php  elseif($notification->type==2): ?>
  <div class="col-lg-10 col-lg-offset-1 challenges-list note" style="margin-top:10px;padding-right:0px ">
    <img src="<?php base_url().'images/new_ribbon.png'?>" />
    <div class="challenges-list-view mdB" style="clear:both" >
      <div id="contest-challenges-problem" class="content--list track_content "><!-- BUGFIX proveri da li ove classe rade ensto sa stilom   -->
        <div class="row">
        <?php  if($notification->flag == 1) {?><img src="<?php echo  image_path('images/new_ribbon.png'); ?>" style="position:absolute;right:-4px;top:-4px;z-index:70 " /><?php } ?>
          <section class="col-lg-12" style="padding:20px; padding-left:40px; padding-right:40px;">
            <div class="row challengecard-title bold">
            <span class="pull-left challengecard-title  bold" style="margin-30px;">
                Course:
              <?php if($notification->type == 2){ ?>  
              <a href="<?php echo base_url().$language.'/admin/notification/view/'.$notification->note_id; ?>" class="backbone title-link" >
                <?php echo $notification->course; ?>
              </a> 
              <?php } ?>
            </span>
                



                <span class="pull-right "  style="font-size:14px;margin-left:30px;">
                <?php  echo $this->lang->line('note_type');  ?> 
                <span class="color-green"> 
                  <?php echo $notification->type_name; ?>
                </span>
              </span>
               
              <span class="pull-right"  style="font-size:14px">
                <?php  echo $this->lang->line('note_status');  ?> 
                <span class="color-alt-grey">
                  <?php echo $notification->status; ?>
                </span>
              </span>
          </div>
          <div class="row" style="margin-top:10px">
      <?php if($notification->first_name): ?>
            <span class="col-lg-4 bold">
                <?php  echo $this->lang->line('note_first_name');  ?> 
            <span class="color-alt-grey" style="font-size:16px">
                <?php echo $notification->first_name; ?>
            </span>
            </span>
      <?php endif; ?>
      <?php if($notification->last_name): ?>
            <span class="col-lg-4 bold">
               <?php  echo $this->lang->line('note_last_name');  ?> 
            <span class="color-alt-grey" style="font-size:16px">
                <?php echo $notification->last_name; ?>
            </span>
            </span>
      <?php endif; ?>
      <?php if($notification->date): ?> 
            <span class="col-lg-4 bold">
                <?php  echo $this->lang->line('note_sent_on');  ?>  
              <span class="color-alt-grey" style="font-size:16px">
                <?php echo date('d M Y',strtotime($notification->date)); ?>
              </span>
            </span>
      <?php endif; ?>
          </div>
        </section> 
        </div> 
       </div>
      </div>
    </div>
    <div class="color-alt-grey note-submeni" >
      <a href="<?php echo base_url().$language.'/user/profile/note_delete/'.$notification->note_id.'/'; ?>" 
          onclick= "return confirm('<?php  echo $this->lang->line('popout_confirm_delete');  ?>')" title="<?php  echo $this->lang->line('popout_delete_title');  ?>" class="note-submeni-link">
          <i class="<?php  echo $this->lang->line('popout_delete_icon');  ?>">
          </i>
        </a>
      <a href="<?php echo base_url().$language.'/user/profile/notification_details/'.$notification->note_id.'/'; ?>" title="<?php  echo $this->lang->line('popout_view_title');  ?>" class="note-submeni-link">
        <i class="<?php  echo $this->lang->line('popout_view_icon');  ?>"></i>
      </a>
    </div>
  <?php else: ?>
  <div class="col-lg-10 col-lg-offset-1  col-sm-11 challenges-list note" style="margin-top:10px;padding-right:0px;">
    <div class="challenges-list-view mdB" style="clear:both" >
      <div id="contest-challenges-problem" class="content--list track_content " style="">
        <div class=" row">
        <?php  if($notification->flag == 1) {?><img src="<?php echo  image_path('images/new_ribbon.png'); ?>" style="position:absolute;right:-4px;top:-4px;z-index:70 " /><?php } ?>
        <section class="col-lg-12 note-tab-padding" style="">
          <div class="row challengecard-title bold">
            <span class="pull-left challengecard-title  bold" style="margin-30px;">
          <?php if($notification->type == 4){ ?>  
            <a href="<?php echo site_url($language.'/user/course/lesson/'.$notification->c_slug.'/'.$notification->lesson_slug.'/'); ?>" class="backbone title-link" >
              <?php echo $notification->lesson_name; ?>
            </a> 
          <?php } ?>
            </span>
                

                <span class="pull-right "  style="font-size:14px;margin-left:30px;">
                <?php  echo $this->lang->line('note_type');  ?> 
                <span class="color-green"> 
                  <?php echo $notification->type_name; ?>
                </span>
              </span><br class="visible-xs-block" />
               
              <span class="pull-right"  style="font-size:14px">
                <?php  echo $this->lang->line('note_status');  ?> 
                <span class="color-alt-grey">
                  <?php echo $notification->status; ?>
                </span>
              </span><br class="visible-xs-block" />
          </div>
          <div class="row" style="margin-top:10px">
      <?php if($notification->first_name): ?>
            <span class="col-lg-4 bold">
                <?php  echo $this->lang->line('note_first_name');  ?> 
            <span class="color-alt-grey" style="font-size:16px">
                <?php echo $notification->first_name; ?>
            </span>
            </span><br class="visible-xs-block" />
      <?php endif; ?>
      <?php if($notification->last_name): ?>
            <span class="col-lg-4 bold">
               <?php  echo $this->lang->line('note_last_name');  ?> 
            <span class="color-alt-grey" style="font-size:16px">
                <?php echo $notification->last_name; ?>
            </span>
            </span><br class="visible-xs-block" />
      <?php endif; ?>
      <?php if($notification->date): ?> 
            <span class="col-lg-4 bold">
                <?php  echo $this->lang->line('note_sent_on');  ?>  
              <span class="color-alt-grey" style="font-size:16px">
                <?php echo date('d M Y',strtotime($notification->date)); ?>
              </span>
            </span><br class="visible-xs-block" />
            <span class="col-lg-4 bold visible-xs-block msT">
            <a href="<?php echo base_url().$language.'/user/profile/note_delete/'.$notification->note_id.'/'; ?>" 
          onclick= "return confirm('<?php  echo $this->lang->line('popout_confirm_delete');  ?>')" title="<?php  echo $this->lang->line('popout_delete_title');  ?>" class="btn btn-primary">
          <i class="<?php  echo $this->lang->line('popout_delete_icon');  ?>"> 
          </i> Delete
        </a>
        <a href="<?php echo base_url().$language.'/user/profile/notification_details/'.$notification->note_id.'/'; ?>" title="<?php  echo $this->lang->line('popout_view_title');  ?>" class="btn btn-primary">
        <i class="<?php  echo $this->lang->line('popout_view_icon');  ?>"></i> Open 
      </a>
            </span>


      <?php endif; ?>
          </div>
        </section> 
        </div> 
       </div>
      </div>
    </div>
    <div class="color-alt-grey note-submeni hidden-xs" >
      <a href="<?php echo base_url().$language.'/user/profile/note_delete/'.$notification->note_id.'/'; ?>" 
          onclick= "return confirm('<?php  echo $this->lang->line('popout_confirm_delete');  ?>')" title="<?php  echo $this->lang->line('popout_delete_title');  ?>" class="note-submeni-link">
          <i class="<?php  echo $this->lang->line('popout_delete_icon');  ?>">
          </i>
        </a>
      <a href="<?php echo base_url().$language.'/user/profile/notification_details/'.$notification->note_id.'/'; ?>" title="<?php  echo $this->lang->line('popout_view_title');  ?>" class="note-submeni-link">
        <i class="<?php  echo $this->lang->line('popout_view_icon');  ?>"></i>
      </a>
    </div>

  <?php  endif; ?>
<?php endforeach; ?>
 <?php echo"<div class=\"col-lg-offset-2\">".$links."</div>"; ?>
<?php else: ?>

  <div class="col-lg-10 col-lg-offset-1 challenges-list" style="margin-top:10px">
    <div class="col-lg-6 col-lg-offset-3 alert alert-info center bold">
      <?php  echo $this->lang->line('note_no_notifications');  ?>
    </div>
  </div>


  <?php  endif; ?>