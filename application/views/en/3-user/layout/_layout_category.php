<?php $this->load->view('en/3-user/components/headers/page_head'); ?>
 <body>
  

    <!-- START Navigation -->
<?php $this->load->view('en/3-user/components/navigations/navigation_static', $this->data); ?>
<!-- END Navigation -->


<div id="content" class=" main_content" >

<?php $this->load->view('en/3-user/components/views/main_category'); ?>
<?php //$this->load->view('en/3-user/components/sidebars/sidebar_course'); ?>


</div>
<?php $this->load->view('en/3-user/components/footers/footer_white'); ?>
<?php $this->load->view('en/3-user/components/footers/page_tail'); ?>