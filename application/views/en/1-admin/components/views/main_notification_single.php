<?php 




?>
<?php if($this_notification->type == 1): ?>
<?php $this->load->view('en/1-admin/components/views/notification/notification_lesson'); ?>
<?php endif; ?>
<?php if($this_notification->type == 2): ?>
<?php $this->load->view('en/1-admin/components/views/notification/notification_course'); ?>
<?php endif; ?>
<?php if($this_notification->type == 3): ?>
<?php $this->load->view('en/1-admin/components/views/notification/notification_developer'); ?>
<?php endif; ?>

