<?php $this->load->view('en/1-admin/components/headers/page_head'); ?>
  <body>

    <!-- START Navigation -->
<?php $this->load->view('en/1-admin/components/navigations/navigation_static', $this->data); ?>

    <!-- END Navigation -->


<div class="" style="z-index:10;">
  <!-- Main colum -->
  <div class="row">
  <div class="col-lg-12">
    <?php if ( $this->session->flashdata('error') !== FALSE ): ?>
        <div class="text-center alert error glob-error"><?php echo validation_errors(); echo $this->session->flashdata('error'); ?></div>
        <?php endif; ?>
    <?php
     $this->load->view($subview, $this->data);
   ?>
  </div>







</div>
  <!-- Sidebar -->
  
  </div>
</div>


<?php $this->load->view('en/1-admin/components/footers/page_tail'); ?>

    