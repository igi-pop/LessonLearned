<?php $this->load->view('en/2-developer/components/headers/page_head'); ?>
  <body>

    <!-- START Navigation -->
<?php $this->load->view('en/2-developer/components/navigations/navigation_static', $this->data); ?>

    <!-- END Navigation -->

   <?php //if(isset($main_view_data1)) var_dump( $main_view_data1); ?>

   


<div class="container-fluid">
  <!-- Main colum -->
  <div class="row">
  <div class="col-lg-12">
    <?php
     $this->load->view($subview);
   ?>
  </div>

  <!-- Sidebar -->
  
  </div>
</div>


<?php $this->load->view('en/2-developer/components/footers/page_tail'); ?>

    