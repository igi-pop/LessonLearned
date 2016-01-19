 <!-- SIDEBAR START -->

        <div id="profile-settings-sidebar" class="col-lg-3">
            <section class="clearfix col-xs-12 col-sm-6 col-md-6 col-lg-12">
                <img id="img-avatar" class="avatar block-center" src="<?php echo $user_info->avatar;?>" alt="igiruler" title="igiruler" style="max-height:150;max-width:150px" >
                
            </section>
            <div class="lg-block col-xs-12 col-sm-6 col-md-6 col-lg-12" id="profileTabs">
                <a class="lg-block_head hr_settingsToggle backbone <?php if($personal == 'active') echo "current";?>" id="profile" href="<?php echo base_url().$language.'/user/profile/settings/personal'; ?>" ><?php  echo $this->lang->line('user_profile_side_prof');  ?></a>
                <a class="lg-block_head hr_settingsToggle backbone <?php if($avatar == 'active') echo "current";?>" id="avatar" href="<?php echo base_url().$language.'/user/profile/settings/avatar'; ?>" ><?php  echo $this->lang->line('user_profile_side_avat');  ?></a>
                <a class="lg-block_head hr_settingsToggle backbone <?php if($password == 'active') echo "current";?>" id="change-password" href="<?php echo base_url().$language.'/user/profile/settings/password'; ?>" ><?php  echo $this->lang->line('user_profile_side_pass');  ?></a>
                <br /><br />
                
                
            </div>
           
        </div>
    <!-- SIDEBAR END -->