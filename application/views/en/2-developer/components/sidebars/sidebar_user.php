 <!-- SIDEBAR START -->

        <div id="profile-settings-sidebar" class="col-lg-3">
            <section class="clearfix">
                <img id="img-avatar" class="avatar block-center" src="<?php echo $user_info->avatar;?>" alt="igiruler" title="igiruler" style="max-height:150;max-width:150px" >
                <button class="btn btn-small block-center margin-large " style="width:200px;" id="upload-avatar"><i class="icon--single icon-upload" data-analytics="SettingsUploadAvatar"></i> Upload</button>
            </section>
            <div class="lg-block " id="profileTabs">
                <a class="lg-block_head hr_settingsToggle backbone <?php if($personal == 'active') echo "current";?>" id="profile" href="<?php echo base_url().'en/user/profile/settings/personal'; ?>" >Profile</a>
                <a class="lg-block_head hr_settingsToggle backbone <?php if($avatar == 'active') echo "current";?>" id="school" href="<?php echo base_url().'en/user/profile/settings/avatar'; ?>" >Avatar</a>
                <a class="lg-block_head hr_settingsToggle backbone <?php if($password == 'active') echo "current";?>" id="change-password" href="<?php echo base_url().'en/user/profile/settings/password'; ?>" >Change Password</a>
                <br /><br />
                 <a class="lg-block_head hr_settingsToggle backbone" id="school" href="<?php base_url().'en/user/profile/change/personal'; ?>" >School (Unavailable)</a>
                <a class="lg-block_head hr_settingsToggle backbone" id="company" href="/settings/company" >Company (Unavailable)</a>
                <a class="lg-block_head hr_settingsToggle backbone" id="account" href="/settings/account" >Account (Unavailable)</a>
                <a class="lg-block_head hr_settingsToggle backbone" id="jobs" href="/settings/jobs" >Jobs (Unavailable)</a>
                <a class="lg-block_head hr_settingsToggle backbone" id="teams" href="/settings/teams" >Teams (Unavailable)</a>
                
            </div>
            <div class="text-center"><p id="save-success" class="psT hide"><small>Changes saved</small></p></div>
        </div>
    <!-- SIDEBAR END -->