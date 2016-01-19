
  <?php $this->load->view('en/3-user/components/headers/page_head'); ?>
 <body>
  

    <!-- START Navigation -->
<?php $this->load->view('en/3-user/components/navigations/navigation_static', $this->data); ?>




    <!-- END Navigation -->



 







<!-- Breadcrumbz -->
<div class="content-header">
        <div class="container bcrumb-position" style="">
            <div class="clearfix">
                <div class="pull-left  bcrumb" data-step="1" data-intro="Click here to go back to the company page" >                   
                <a href="<?php  echo base_url().'en/user/category'; ?>" class="backbone" ><?php  echo $this->lang->line('categories');  ?></a>  
                <i class="glyphicon glyphicon-chevron-right"></i>                    
                <span class="bold" ><?php  echo $this->lang->line('courses');  ?></span>
                </div>
               
            </div>
        </div>
    </div>


<!-- Breadcrumbz -->


<div id="content" class="main_content">
<div class="dashboard-track">
<div class="clearfix">
  <div class="container transition challenge-container">    
    <div class="row" >




<?php $this->load->view('en/3-user/components/views/main_course'); ?>
<?php  $this->load->view('en/3-user/components/sidebars/sidebar_course'); ?>


</div>









<?php $this->load->view('/en/3-user/components/footers/footer_white'); ?>
<?php $this->load->view('/en/3-user/components/footers/page_tail'); ?>