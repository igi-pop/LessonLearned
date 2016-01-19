<?php $this->load->view('en/2-developer/components/headers/page_head'); ?>
 <body>
  

    <!-- START Navigation -->
<?php $this->load->view('en/2-developer/components/navigations/navigation_static', $this->data); ?>
<!-- END Navigation -->


<div id="content" class=" main_content" >

    





<?php $this->load->view('en/2-developer/components/views/main_category'); ?>
<?php //$this->load->view('en/2-developer/components/sidebars/sidebar_course'); ?>


</div>
<?php // $this->load->view('en/2-developer/components/footers/footer_white'); ?>
<?php $this->load->view('en/2-developer/components/footers/page_tail'); ?>