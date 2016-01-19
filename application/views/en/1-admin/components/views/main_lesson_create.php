

  

<?php echo form_open_multipart(); ?>
<div class="container-fluid">
<?php echo $this->load->view($category_view);?>
<?php if($category != NULL){ echo $this->load->view($course_view); }?>
<?php if( $course != NULL){ echo $this->load->view($lesson_view); }?>

<?php if(isset($view_edit)){  echo $this->load->view($view_edit, $this->data);  } ?>





</div>