<!-- Breadcrumbz -->

<div  class="content-header" style="margin-top:100px;">
        <div class="container bcrumb-position" >
            <div class="clearfix">
                <div class="pull-left  bcrumb"  >
                <a href="<?php echo base_url().$language.'/home/'; ?>" class="backbone" ><?php echo $this->lang->line('breakcrumbs_activation_home'); ?></a>
                <i class="glyphicon glyphicon-menu-right mmL"></i>                    
                <a href="<?php echo base_url().$language.'/home/signup/'; ?>" class="backbone" ><?php echo $this->lang->line('breakcrumbs_activation_signup'); ?></a>  
                <i class="glyphicon glyphicon-menu-right"></i>                    
                <a href="<?php echo base_url().$language.'/home/activate/'; ?>" class="backbone" ><?php echo $this->lang->line('breakcrumbs_activation_activate'); ?></a>
                <i class="glyphicon glyphicon-menu-right"></i>                    
                <span class="bold" ><?php echo $this->lang->line('breakcrumbs_activation_fail'); ?></span>
                </div>
            </div>
        </div>
    </div>
<i class="glyphicon glyphicon-menu-right mmL"></i>  

<!-- Breadcrumbz -->

<div id="content" class="main_content">
 <div class="dashboard-track">
   <div class="clearfix">
    <div class="container transition challenge-container">    
        <!-- Activation Default -->
        <div class="col-lg-12 track_contentList" style="text-align:center;min-width: 200px">
         <h3 class=" col-lg-12  bold color-green lobster"> <?php echo $this->lang->line('activation_title_fail'); ?> </h3>
         <h5 class=" col-lg-12 color-alt-grey bold "> <?php echo $this->lang->line('activation_desc_fail'); ?> </h5>
            <div class="small bold col-lg-12">
            <span class="zeta "><?php echo $this->lang->line('activation_description_fail'); ?>
            </span>
            <br />
            <br />
            <span><?php echo $this->lang->line('activation_end'); ?></span>
            </div>
        </div>


    </div>
  </div>
 </div>
</div>

