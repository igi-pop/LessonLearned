  <?php $this->load->view('en/0-components/headers/page_head'); ?>
 <body>
  

    <!-- START Navigation -->
        <?php $this->load->view('en/3-user/components/navigations/navigation_static', $this->data); ?>
    <!-- END Navigation -->

    <!-- Breadcrumbz -->
    <div class="content-header">
            <div class="container bcrumb-position" style="">
                <div class="clearfix">
                    <div class="pull-left  bcrumb" data-step="1" data-intro="Click here to go back to the company page" >
                    <a href="<?php echo base_url().'/'.$language.'/user/';?>" class="backbone" >User</a>
                    <i class="glyphicon glyphicon-menu-right mmL"></i>                    
                    <a href="<?php echo base_url().'/'.$language.'/user/categories';?>" class="backbone" >Categories</a>  
                    <i class="glyphicon glyphicon-menu-right"></i>                    
                    <a href="<?php echo base_url().'/'.$language.'/user/course';?>" >Courses</a>
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
<?php $this->load->view('en/3-user/components/sidebars/sidebar_course'); ?>


</div>









<?php $this->load->view('home/components/footer'); ?>
<?php $this->load->view('home/components/page_tail'); ?>