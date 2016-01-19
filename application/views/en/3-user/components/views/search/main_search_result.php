<h1 ><?php  echo $this->lang->line('Notification_title');  ?></h1>
<h4 class="color-alt-grey"><a class="grey-link" href="<?php echo base_url().'en/user/profile/notification_delete/'; ?>"><i class="glyphicon glyphicon-trash" style="font-size:20px"></i> Clear seen notifications</a></h4>
<?php var_dump($main_view1); ?>
 <div class="col-lg-5 col-lg-offset-6 title-h5" style="text-align:right;margin-right;100px;clear:both;">
  <div class="btn-group ">
    <?php  echo $this->lang->line('note_status');  ?><br />
    <?php  echo $flag_links; //(BUGFIX podesi language u notification_m) ?>
  </div>
</div>

<?php  if(isset($all_notifications)): ?>
<?php foreach($all_notifications as $notification): ?>
  <?php  if($notification->type==3): ?>
  <div class="col-lg-10 col-lg-offset-1 col-xs-12 challenges-list note" style="margin-top:10px;padding-right:0px ">
       <div class="challenges-list-view mdB" style="clear:both" >
         <div id="contest-challenges-problem" class="content--list track_content ">
           <div class=" row">