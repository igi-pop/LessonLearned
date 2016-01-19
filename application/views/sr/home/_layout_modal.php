<?php $this->load->view('admin/components/page_head'); ?>

<body style="background:#555;">
	


<div class="modal show">
  <div class="modal-dialog">
    <div class="modal-content">
     
      <?php $this->load->view($subview); //$subview is set in the controller ?>
      <div class="modal-footer">
        &copy <?php echo $meta_title; ?>
        
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<?php $this->load->view('admin/components/page_tail'); ?>