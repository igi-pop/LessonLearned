<h2 style="font-size:18px"><?php  echo $this->lang->line('admin');  ?></h2>



<div class="container-fluid">
	<div class="row">
	<div class="col-lg-6 challenges-list" style="margin-top:25px">
       <div class="challenges-list-view mdB" style="clear:both" style="border:blue 1px solid;">
         <div id="contest-challenges-problem" class="content--list track_content ">
           <div class="content--list_body row">
             
            <section class="track_content-footer col-lg-12" >
                <h4 class="challengecard-title  " >
                <a href="'.$course['url'].'" class="backbone title-link" ><?php  echo $this->lang->line('dashboard_user_title');  ?></a>    
                </h4>
                <div class="small bold  pull-left"  style="padding:5px">
                    <span class=" small">
                      <h5 class="bold dark-limegreen-link inline " style="display:inline;">
                        <?php echo anchor($language.'/admin/user/edit', '<i class="glyphicon glyphicon-user" style="font-size:18px"></i> '.$this->lang->line('dashboard_user_create'), 'class="bold dark-limegreen-link"');?>
                      </h5>
                    </a>  
                    <span class="zeta hidden-xs">
                      <?php  echo $this->lang->line('dashboard_user_create_d');  ?>
                    </span>
                  </span>
                  <Br />
                    <span class="zeta small"><h5 class="bold inline " style="display:inline;"><?php echo anchor($language.'/admin/user', '<i class="glyphicon glyphicon-eye-open" style="font-size:18px"></i> '.$this->lang->line('dashboard_user_list'),'class="dark-limegreen-link"');?></h5> <span class="hidden-xs"> <?php  echo $this->lang->line('dashboard_user_list_d');  ?></span></span><Br />
                    <span class="zeta small"><h5 class="bold  inline " style="display:inline;"><?php echo anchor($language.'/admin/user', '<i class="glyphicon glyphicon-pencil" style="font-size:18px"></i> '.$this->lang->line('dashboard_user_edit'),'class="dark-limegreen-link"');?></h5>  <span class="hidden-xs"><?php  echo $this->lang->line('dashboard_user_edit_d');  ?></span></span><Br />
                    <span class="zeta small"><h5 class="bold inline " style="display:inline;"><?php echo anchor($language.'/admin/user', '<i class="glyphicon glyphicon-trash" style="font-size:18px"></i> '.$this->lang->line('dashboard_user_delete'),'class="dark-limegreen-link"');?> </h5>  <span class="hidden-xs"><?php  echo $this->lang->line('dashboard_user_delete_d');  ?> </span></span><Br />
                    
                    
                    </div>
            </section> 
           </div>
            <footer class="container-fluid">
            </footer>
    	 </div>
      </div>
	</div>

	<div class="col-lg-6 challenges-list" style="margin-top:25px">
       <div class="challenges-list-view mdB" style="clear:both" style="border:blue 1px solid;">
         <div id="contest-challenges-problem" class="content--list track_content ">
           <div class="content--list_body row">
             
            <section class="track_content-footer col-lg-12" >
                <h4 class="challengecard-title  " >
                <a href="'.$course['url'].'" class="backbone title-link" ><?php  echo $this->lang->line('dashboard_category_title');  ?></a>    
                </h4>
                <div class="small bold  pull-left" style="padding:5px">
                    <span class="zeta small"><h5 class="color-green inline bold" style="display:inline;"><?php echo anchor($language.'/admin/category/edit', '<i class="glyphicon glyphicon-plus-sign" style="font-size:18px"></i> '.$this->lang->line('dashboard_category_create'),'class=" dark-limegreen-link"'); ?></h5> <span class="hidden-xs"><?php  echo $this->lang->line('dashboard_category_create_d');  ?></span></span><Br />
                    <span class="zeta small"><h5 class="color-green inline bold" style="display:inline;"><?php echo anchor($language.'/admin/category', '<i class="glyphicon glyphicon-tasks" style="font-size:18px"></i> '.$this->lang->line('dashboard_category_list'),'class=" dark-limegreen-link"'); ?></h5> <span class="hidden-xs"><?php  echo $this->lang->line('dashboard_category_list_d');  ?></span></span><Br />
                    <span class="zeta small"><h5 class="color-green inline bold" style="display:inline;"><?php echo anchor($language.'/admin/category', '<i class="glyphicon glyphicon-pencil" style="font-size:18px"></i> '.$this->lang->line('dashboard_category_edit'),'class=" dark-limegreen-link"');?> </h5> <span class="hidden-xs"><?php  echo $this->lang->line('dashboard_category_edit_d');  ?></span></span><Br />
                    <span class="zeta small"><h5 class="color-green inline bold" style="display:inline;"><?php echo anchor($language.'/admin/category', '<i class="glyphicon glyphicon-trash" style="font-size:18px"></i> '.$this->lang->line('dashboard_category_delete'),'class=" dark-limegreen-link"');?></h5> <span class="hidden-xs"><?php  echo $this->lang->line('dashboard_category_delete_d');  ?></span></span><Br />
                    <span class="zeta small"><h5 class="color-green inline bold" style="display:inline;"><?php echo anchor($language.'/admin/category/activate', '<i class="glyphicon glyphicon-ban-circle" style="font-size:18px"></i>  '.$this->lang->line('dashboard_category_dis'),'class=" dark-limegreen-link"');?></h5> <span class="hidden-xs"><?php  echo $this->lang->line('dashboard_category_dis_d');  ?></span></span><Br />
                    <span class="zeta small"><h5 class="color-green inline bold" style="display:inline;"><?php echo anchor($language.'/admin/category/link', '<i class="glyphicon glyphicon-link" style="font-size:18px"></i> '.$this->lang->line('dashboard_category_link'),'class=" dark-limegreen-link"');?> </h5> <span class="hidden-xs"><?php  echo $this->lang->line('dashboard_category_link_d');  ?></span></span><Br />
                    
                    </div>
            </section> 
           </div>
            <footer class="container-fluid">
            </footer>
    	 </div>
      </div>
	</div>
</div>
<div class="row" style="margin-bottom:45px">
<div class="col-lg-6 challenges-list" style="margin-top:25px">
       <div class="challenges-list-view mdB" style="clear:both" style="border:blue 1px solid;">
         <div id="contest-challenges-problem" class="content--list track_content ">
           <div class="content--list_body row">
             
            <section class="track_content-footer col-lg-12" >
                <h4 class="challengecard-title  " >
                <a href="'.$course['url'].'" class="backbone title-link" > <?php  echo $this->lang->line('dashboard_course_title');  ?></a>    
                </h4>
                <div class="small bold  pull-left inline" style="padding:5px">
                    <span class="zeta small">
                        <h5 class="color-green  bold" style="display:inline;">
                            <?php echo anchor($language.'/admin/course/edit/', '<i class="glyphicon glyphicon-plus-sign" style="font-size:18px"></i> '.$this->lang->line('dashboard_course_new'),'class=" dark-limegreen-link"'); ?>
                        </h5>  <span class="hidden-xs"><?php  echo $this->lang->line('dashboard_course_new_d');  ?></span>
                    </span><Br />
                    <span class="zeta small">
                        <h5 class="color-green  bold" style="display:inline;">
                            <?php echo anchor($language.'/admin/course/', '<i class="glyphicon glyphicon-tasks" style="font-size:18px"></i> '.$this->lang->line('list').' &nbsp; <i class="glyphicon glyphicon-pencil" style="font-size:18px"></i> '.$this->lang->line('edit').'  &nbsp; <i class="glyphicon glyphicon-trash" style="font-size:18px"></i> '.$this->lang->line('delete'),'class=" dark-limegreen-link"'); ?>
                        </h5> <span class="hidden-xs"><?php  echo $this->lang->line('dashboard_course_list_d');  ?></span>
                    </span><Br />
                     <span class="zeta small">
                        <h5 class="color-green  bold" style="display:inline;">
                            <?php echo anchor($language.'/admin/course/activate/', '<i class="glyphicon glyphicon-ban-circle" style="font-size:18px"></i> '.$this->lang->line('dashboard_course_app'),'class=" dark-limegreen-link"'); ?>
                        </h5> <span class="hidden-xs"> <?php  echo $this->lang->line('dashboard_course_app_d');  ?></span>
                    </span><Br />
                    </div>
            </section> 
           </div>
            <footer class="container-fluid">
            </footer>
    	 </div>
      </div>
	</div>

<div class="col-lg-6 col-xs-12 challenges-list" style="margin-top:25px">
       <div class="challenges-list-view mdB" style="clear:both" style="border:blue 1px solid;">
         <div id="contest-challenges-problem" class="content--list track_content ">
           <div class="content--list_body row">
             
            <section class="track_content-footer col-lg-12" >
                <h4 class="challengecard-title  " >
                <a href="'.$course['url'].'" class="backbone title-link" > <?php  echo $this->lang->line('dashboard_lesson_title');  ?></a>    
                </h4>
                <div class="small bold  pull-left" style="padding:5px">
                    <span class="zeta small"><h5 class="color-green inline bold" style="display:inline;"><?php echo anchor('/en/admin/lesson/create/', '<i class="glyphicon glyphicon-plus-sign" style="font-size:18px"></i> '.$this->lang->line('dashboard_lesson_new'),'class=" dark-limegreen-link"'); ?></h5><span class="hidden-xs"> <?php  echo $this->lang->line('dashboard_lesson_new_d');  ?> </span></span><Br />
                    <span class="zeta small"><h5 class="color-green inline bold" style="display:inline;"><?php echo anchor('/en/admin/lesson/order/', '<i class="glyphicon glyphicon-tasks" style="font-size:18px"></i>&nbsp;'.$this->lang->line('list').' &nbsp; <i class="glyphicon glyphicon-pencil" style="font-size:18px"></i>&nbsp;'.$this->lang->line('edit').' &nbsp; <i class="glyphicon glyphicon-random" style="font-size:18px"></i>&nbsp;'.$this->lang->line('order').'&nbsp; <i class="glyphicon glyphicon-trash" style="font-size:18px"></i>&nbsp;'.$this->lang->line('delete').' &nbsp;','class=" dark-limegreen-link"'); ?></h5><span class="hidden-xs"> <?php  echo $this->lang->line('dashboard_lesson_list_d');  ?></span></span><Br />
                    <span class="zeta small"><h5 class="color-green inline bold" style="display:inline;"><?php echo anchor('/en/admin/lesson/view/', '<i class="glyphicon glyphicon-fire" style="font-size:18px"></i> '.$this->lang->line('dashboard_lesson_wiz'),'class=" dark-limegreen-link"');?></h5> <span class="hidden-xs"><?php  echo $this->lang->line('dashboard_lesson_wiz_d');  ?> </span></span><Br />
                    
                    </div>
            </section> 
           </div>
            <footer class="container-fluid">
            </footer>
    	 </div>
      </div>
	</div>

</div>




</div>