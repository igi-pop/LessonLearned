<!-- Breadcrumbz -->

<div  class="content-header hidden-sm hidden-xs" style="margin-top:90px;">
        <div class="container bcrumb-position" >
            <div class="clearfix">
                <div class="pull-left  bcrumb" data-step="1" data-intro="Click here to go back to the company page" >
                <a href="<?php echo site_url($languge.'/home/'); ?>" class="backbone" ><?php  echo $this->lang->line('breadcurmbz_home');  ?></a>
                <i class="glyphicon glyphicon-menu-right mmL"></i>                    
                <a href="<?php echo site_url($languge.'/home/login/'); ?>" class="backbone" ><?php  echo $this->lang->line('breadcurmbz_login');  ?></a>  
                <i class="glyphicon glyphicon-menu-right"></i>                    
                <a href="<?php echo site_url($languge.'/home/recovery/'); ?>" class="backbone" ><?php  echo $this->lang->line('breadcurmbz_recovery');  ?></a>
                <i class="glyphicon glyphicon-menu-right"></i>                    
                <span class="bold"><?php  echo $this->lang->line('breadcurmbz_success');  ?></a>
                </div>
            </div>
        </div>
    </div>


<!-- Breadcrumbz -->

<div id="content" class="main_content" style="margin-top:90px;margin-bottom:30px;">
 <div class="dashboard-track">
   <div class="clearfix">
    <div class="container transition challenge-container">    
        <!-- Activation Default -->
        <div class="col-lg-12 track_contentList" style="text-align:center;min-width: 200px">
              
         <h3  class=" col-lg-12 color-green  bold lobster" > <?php  echo $this->lang->line('recovery_success_change');  ?> </h3>
         
            <div class="small bold col-lg-12">
              
            <span class="zeta ">
              <?php 
              echo $this->lang->line('recovery_success_confirm');
              echo $this->lang->line('recovery_success_link_1').$language.$this->lang->line('recovery_success_link_2'); ?>
            	
            </span>
      
    </div>


    </div>
  </div>
 </div>
</div>
</div>
