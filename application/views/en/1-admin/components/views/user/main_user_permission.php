<div class="col-lg-6 col-lg-offset-3 challenges-list" style="margin-top:25px">
	<h2>User permission status</h2>
       <div class="challenges-list-view mdB" style="clear:both" >
         <div id="contest-challenges-problem" class="content--list track_content"  >
			<section class="track_content-footer " style="z-index:75!important">
                <h4 class="challengecard-title  " >
                <a href="#" class="backbone title-link" >Information</a>    
                </h4>
               <div class="col-lg-3">
               	<img src="<?php echo $this->user_m->image_path($user); ?>" style="min-width:100px; max-width:150px; max-height:150px;"/>
               </div>
                <?php echo form_open($language.'/admin/user/perm_change/' ); ?>
            	<ul class="col-lg-9">
            		<li style="margin-bottom:10px"><span class="col-lg-6 bold" style="font-size:18px;">Username: </span><span class="col-lg-6" style="margin-bottom:10px"><?php echo $user->username; ?></span></li>
            		<li><span class="col-lg-6 bold" style="font-size:18px">First name: </span><span class="col-lg-6" style="margin-bottom:10px"> <?php echo $user->first_name; ?></span></li>
            		<li><span class="col-lg-6 bold" style="font-size:18px">Last name: </span><span class="col-lg-6"> <?php echo $user->last_name; ?></span></li>
            		<li>
            			<?php echo form_hidden('id', $current_id);  ?>
            		 <select name="privileges" class="col-lg-5 col-lg-offset-1" style="margin-top:10px;margin-bottom:20px">
            			<option value="2" <?php echo set_select('privileges', 2);  if($user->privileges <= 2){ echo "selected"; }; ?> ><?php  echo $this->lang->line('user_sele_priv_1');  ?></option>
           				<option value="4" <?php echo set_select('privileges', 4);  if($user->privileges > 2 AND $user->privileges <=4 ){ echo "selected";	} ?> ><?php  echo $this->lang->line('user_sele_priv_2');  ?></option>
            			<option value="8" <?php echo set_select('privileges', 8);  if($user->privileges >7 ){ echo "selected"; }?> ><?php  echo $this->lang->line('user_sele_priv_3');  ?></option>
          			 </select>
          			 <input type="submit" name="submit" class="btn btn-primary col-lg-3" style="margin:10px;margin-bottom:20px">
          			</li>
          			<li >
          				
          			</li>
            	</ul>
            	 <?php echo form_close(); ?>
            </section> 
          
    	 </div>
      </div>
	</div>
<section>
