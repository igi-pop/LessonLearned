<?php 



//var_dump($this_notification);

?>
<?php if($this_notification->type == 1): ?>
<?php $this->load->view('en/1-admin/components/views/notification/notification_lesson'); ?>
<?php endif; ?>

<?php if($this_notification->type == 3): ?>
<?php $this->load->view('en/1-admin/components/views/notification/notification_developer'); ?>
<?php endif; ?>

<?php if($this_notification->type == 4): ?>
<?php $this->load->view('en/3-user/components/views/notification/notification_reply'); ?>
<?php endif; ?>