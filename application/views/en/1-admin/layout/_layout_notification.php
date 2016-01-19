
<?php $this->load->view('en/3-user/components/headers/page_head'); ?>
 <body>
  

    <!-- START Navigation -->
    <?php $this->load->view('en/1-admin/components/navigations/navigation_static', $this->data); ?>
    <!-- END Navigation -->




<div id="content" class="main_content" style="margin-bottom:155px;"><div class="settings-view" >
    <section class="container " style=" padding-top:0px;">
        <div class="row">
            <?php //$this->load->view('en/3-user/components/sidebars/sidebar_user'); ?>
            <?php $this->load->view($main_view); ?>
        </div>
    </section>
</div>




<?php $this->load->view('en/3-user/components/footers/footer_white'); ?>
<?php $this->load->view('en/3-user/components/footers/page_tail'); ?>