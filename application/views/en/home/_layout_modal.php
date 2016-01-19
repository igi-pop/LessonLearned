<div  id="hr-dialog-4397332843" class="modal-open modal-above" role="dialog" >
<div class="hr-dialog" role="dialog" style="padding: 2px 394.5px;"> 
    <div class="hr-dialog-border modal-dialog" style="width:550px"> 
        <div class="hr-dialog-main-window " style="background: transparent !important; position: relative;z-index:770">
            <div class="hr-dialog-header" >
                <a href=" <?php echo site_url('en/home'); ?>" class="close" >
                    <i class="glyphicon glyphicon-remove"> </i>
                </a>
            </div>
            
            <div class="nav nav-tabs hr-dialog-body " id="login-tabs">
                <div class="login-group homepage_admin tab-content"> 
                    <ul class="login_tab unstyled horizontal  nav nav-justified"> 
                        <li class="signup-toggle toggle <?php if($modal_signup_active){echo " active"; } ?>" id="login-tab">
                            <a href="#signup" data-toggle="tab"><?php echo $this->lang->line('signup'); ?></a>
                        </li> 
                        <li class="login-toggle toggle <?php if($modal_login_active){echo "in active"; } ?>"  id="signup-tab">
                            <a href="#login" data-toggle="tab"><?php echo $this->lang->line('login'); ?></a>
                        </li> 
                    </ul> 



        <div class="tab-content">
			 <!-- START LOGIN TAB  -->
			 	<?php 	$this->load->view($modal_signup); 	?>
			 <!-- END SIGNUP TAB  -->
			 <!-- START LOGIN TAB  -->
				<?php 	$this->load->view($modal_login);	?>
			 <!-- END LOGIN TAB  -->
        </div>

        </div>
    </div> 
    <div style="border-top: medium none; background: transparent none repeat scroll 0% 0%;" class="hr-dialog-footer"> 

                <div class="hr-dialog-loader"></div> 
                <div class="hr-dialog-success-message"></div>
                <div class="hr-dialog-failed-message"></div> 
                <div class="hr-dialog-buttons clearfix"></div>
                <div class="clearfix"></div> 
            </div> 
        </div> 
    </div>
</div>

</div>











