 <div class=" col-lg-8  col-xs-8   settings-view" style="margin-left:20px">
  <section id="settings-subview " class="profile">
    <?php if(isset($main_view_data1)) var_dump( $main_view_data1); ?>
    <?php if($this->session->flashdata('message')) 
            echo "<div class=\"row\"><div class=\"alert alert-success col-lg-4 \" >
                    ".$this->session->flashdata('message')."
                  </div></div>"; ?>
    <h3><?php  echo $this->lang->line('user_profile_avatar_upload');  ?></h3>
    <p class="aside msT mlB"><?php  echo $this->lang->line('user_profile_avatar_info');  ?>.</p>
    
  <?php $attributes = array(
            'class' => 'legacy-form',
            'name' => 'user-avatar',
            'id' => 'legacy-user-standard');
            ?>
    <?php echo form_open_multipart($language.'/user/profile/avatar', $attributes); ?> 
    
      <?php validation_errors(); ?>
      <section class="row">
    <div class="block col-lg-12">
        <label for="username" style="clear:right;">
          <?php  echo $this->lang->line('user_profile_avatar_select');  ?>
        </label>
        <?php $Fdata = array('name' => 'user_avatar', 
                            'class' => 'file  filestyle', 
                            'style' => 'padding:2px;', 
                            'data-buttonBefore'=>'true', 
                            'data-input'=>'false');
          echo form_upload($Fdata);
        ?>
    </div>

     
   <div>
    
   </div>
   
  
    <button class="btn btn-primary col-lg-3  col-xs-8 col-xs-offset-1" style="margin-top:30px;" name="commit" type="submit" value="request" >
            <?php  echo $this->lang->line('user_profile_avatar_save');  ?>
    </button> 


  <?php echo form_close(); ?>
  </section>
</div>





