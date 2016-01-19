<div class="topbar-style navbar-static-top" style="margin-bottom:25px;">
    <nav class="navbar navbar-default">
  <div class="container-fluid" >
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      
      <a href="<?php echo base_url().$language.'/home/' ?>" class="pull-left">
            <span class="lobster color-green bold logo-text" style="margin-top:10px;text-shadow: 1px 1px #007700;font-family: 'Candal', sans-serif;"> 
               <object type="image/svg+xml" data="<?php $icon = $this->lang->line('logo'); echo site_url("images/icons/svg/books8.svg"); ?>" class="logo" style=" ">Your browser does not support SVG</object>
               
              Lesson Learned</span>
        </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    
    <div class="collapse navbar-collapse margin-mini" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav " >

        <li style="border-bottom:#2ec866 1px solid;" class="visible-xs-block">
        <span class=" col-xs-3 bold" style="color:white;padding:13px;padding-bottom:13px;text-align:center;background-color:rgb(35,41,49); margin:0px auto;height:100%;border-bottom:solid 1px #2ec866;">
          Profile:
        </span>
          <a class="nav-avatar col-xs-9" href="<?php echo base_url().$language.'/user/profile/settings'; ?>" style="border-bottom:solid 1px #2ec866; padding:5px;text-align:center;background-color:rgb(35,41,49); margin:0px auto;z-index:80;">
            <img src="<?php echo $nav_avatar; ?>" alt="" class="avatar" style="width:30px; height:30px;" >
            <span class="mmR"><?php echo $nav_username; ?></span></a>
           </a>
        </li>

        <li class="active ">
          <a href="<?php echo base_url().$language.'/admin/dashboard/';?>" class=" static-link width-100">
            <i class="<?php  echo $this->lang->line('admin_first_item_icon'); ?>"> </i> 
            <?php echo $this->lang->line('admin_first_item'); ?> 
            
          </a>
        </li>
        
      
        <li class="dropdown" >
          <a href="#" class="dropdown-toggle static-link width-100" data-toggle="dropdown"  aria-expanded="false">
            <i class="<?php  echo $this->lang->line('admin_second_item_icon'); ?>"> </i> 
            <?php  echo $this->lang->line('admin_second_item'); ?> 
            <span class="caret"></span>
          </a>
          <ul class="dropdown-menu" style="">
             <li>
              <span  class="static-link" style="padding:0px;margin:0px;margin-left:10px;">
              <?php  echo $this->lang->line('admin_dropdown_user'); ?>
            </span>
            
            <li>
            <li><a href="<?php echo base_url().$language.'/admin/user/'; ?>"><i class="glyphicon glyphicon-th-list"></i> <?php  echo $this->lang->line('admin_dropdown_list_users'); ?></a></li>
            <li><a href="<?php echo base_url().$language.'/admin/user/edit/'; ?>"><i class="glyphicon glyphicon-lock"></i> <?php  echo $this->lang->line('admin_dropdown_priv_user'); ?></a></li>
            <li><a href="<?php echo base_url().$language.'/admin/user/inactive/'; ?>"><i class="glyphicon glyphicon-off"></i> <?php  echo $this->lang->line('admin_dropdown_activ_user'); ?></a></li>
            <li role="separator" class="divider"></li>
            <li>
              <span  class="static-link" style="padding:0px;margin:0px;margin-left:10px;">
              <?php  echo $this->lang->line('admin_dropdown_category'); ?>
            </span>
            
            <li>
            <li><a href="<?php echo base_url().$language.'/admin/category/edit/'; ?>"><i class="glyphicon glyphicon-plus"></i> <?php  echo $this->lang->line('admin_dropdown_category_new'); ?></a></li>
            <li><a href="<?php echo base_url().$language.'/admin/category/'; ?>"><i class="glyphicon glyphicon-cog"></i> <?php  echo $this->lang->line('admin_dropdown_category_tools'); ?></a></li>
            <li><a href="<?php echo base_url().$language.'/admin/category/activate/'; ?>"><i class="glyphicon glyphicon-off"></i> <?php  echo $this->lang->line('admin_dropdown_category_disable'); ?></a></li>
            <li><a href="<?php echo base_url().$language.'/admin/category/link/'; ?>"><i class="glyphicon glyphicon-tags"></i> <?php  echo $this->lang->line('admin_dropdown_category_relate'); ?></a></li>
            <li role="separator" class="divider"></li>
            <li>
              <span  class="static-link" style="padding:0px;margin:0px;margin-left:10px;">
              <?php  echo $this->lang->line('admin_dropdown_course'); ?>
            </span>
            
            <li>
            <li><a href="<?php echo base_url().$language.'/admin/course/edit/'; ?>"><i class="glyphicon glyphicon-plus"></i> <?php  echo $this->lang->line('admin_dropdown_course_new'); ?></a></li>
            <li><a href="<?php echo base_url().$language.'/admin/course/'; ?>"><i class="glyphicon glyphicon-cog"></i> <?php  echo $this->lang->line('admin_dropdown_course_tools'); ?></a></li>
            <li><a href="<?php echo base_url().$language.'/admin/course/activate/'; ?>"><i class="glyphicon glyphicon-off"></i> <?php  echo $this->lang->line('admin_dropdown_course_disable'); ?></a></li>
            <li role="separator" class="divider"></li>
            <li>
              <span  class="static-link" style="padding:0px;margin:0px;margin-left:10px;">
              <?php  echo $this->lang->line('admin_dropdown_lesson'); ?>
            </span>
            
            <li>
            <li><a href="<?php echo base_url().$language.'/admin/lesson/create/'; ?>"><i class="glyphicon glyphicon-plus"></i> <?php  echo $this->lang->line('admin_dropdown_lesson_new'); ?> </a></li>
            <li><a href="<?php echo base_url().$language.'/admin/lesson/view/'; ?>"><i class="glyphicon glyphicon-cog"></i> <?php  echo $this->lang->line('admin_dropdown_lesson_tools'); ?></a></li>
          </ul>
        </li>

      <li role="separator" class="divider"></li>
          <li> 

       <a class="color-alt-grey notification-link width-100 visible-xs-block" title="Notifications" href="<?php echo base_url().$language.'/admin/notification/'; ?>" style="border-radius:0px; ">
               <?php  if(count($notifications)!=0 OR $notifications!=NULL){ ?>
                  <span class="notif-numb color-alt-grey img-circle bold"
                   style=""> <?php echo $notification_counter; ?></span>
                   <?php } ?>
                  <span class="notif-icon">
        <i class="notif-icon glyphicon glyphicon-cloud" style=""></i>
         Notifications
      </span>
     
      </a>
    
      </li>
     




            <li role="separator" class="divider visible-xs-block"></li>
             
             <li class="visible-xs-block ">
              <span  class="static-link" style="padding:0px;margin:0px;margin-left:10px;">
              <?php echo $this->lang->line('nav_language'); ?>
            </span>
            
            <li class="visible-xs-block col-xs-6">
              <a href=" <?php echo base_url().$language.'/home/change_language/en/'.$total_url;  ?>" class="static-link">
              <img src="<?php echo site_url('images/icons/Flag_of_the_United_Kingdom.png'); ?>" alt="united kingdom flag" style="width:20px;height:12px;padding:2px;margin-bottom:8px;"/>
              <?php echo $this->lang->line('nav_language_english'); ?>
            </a>
          </li>
            <li class="visible-xs-block col-xs-6">
              <a href="<?php echo base_url().$language.'/home/change_language/sr/'.$total_url;  ?>" class="static-link">
                <img src="<?php echo site_url('images/icons/Flag_of_Serbia.png'); ?>" alt="serbian flag" style="width:22px;height:15px;padding:2px;margin-bottom:8px;"/>
                <?php echo $this->lang->line('nav_language_serbian'); ?>
              </a>
            </li>
            
             <li role="separator" class="divider visible-xs-block"></li>
             <li class="visible-xs-block ">
              <span class="static-link" style="padding:0px;margin:0px;margin-left:10px;">
              <?php  echo $this->lang->line('nav_mode_switch');  ?>
            </span>
            
            <li class="visible-xs-block">
             <li class="visible-xs-block col-xs-6">
              <a href="<?php echo base_url().$language.'/developer/course/';  ?>" class="static-link ">
                <?php  echo $this->lang->line('nav_mode_dev');  ?>
              </a>
            </li>
            <li class="visible-xs-block col-xs-6">
              <a href="<?php echo base_url().$language.'/user/category/';  ?>" class="static-link">
                <?php  echo $this->lang->line('nav_mode_user');  ?>
              </a>
            </li>

              <li role="separator" class="divider"></li>
      <li class="visible-xs-block " style="width:100%">
          <?php if($logged_in == NULL): ?>
          <a class="static-link col-xs-6 <?php if(isset($navigation_signup_active)){ echo "active"; } ?>" href="<?php echo base_url().$language."/home/signup/" ?>">
            <i class="glyphicon glyphicon-pencil"></i> 

            <?php echo $this->lang->line('btn_signup'); ?> 
          </a>
          <a class="static-link col-xs-6 <?php if(isset($navigation_login_active)){ echo "active"; } ?>"  href="<?php echo base_url().$language."/home/login/" ?>">
            <i class=" glyphicon glyphicon-user"></i> 

            <?php echo $this->lang->line('btn_login'); ?> 
          </a>
          <?php else: ?>
          <a class="static-link col-xs-12 visible-xs-block"  href="<?php echo base_url().$language."/home/logout/" ?>" >
            <i class="glyphicon glyphicon-off"></i> 

            <?php echo $this->lang->line('btn_logout'); ?> 
          </a>
           
        <?php endif; ?>
         

        </li>
      </ul>


<ul class="nav navbar-nav navbar-right pull-right hidden-xs " id="now">
    <li class="dropdown notification" style="">
      
      <a class="color-alt-grey notification-link  " title="Notifications" data-toggle="dropdown"  aria-expanded="false" >
      <?php  if(count($notifications)!=0 OR $notifications!=NULL){ ?>
      <span class="notif-numb color-alt-grey img-circle bold"> <?php echo $notification_counter; ?></span>
      <?php } ?>
      <span class="notif-icon">
        <i class="notif-icon glyphicon glyphicon-cloud" style=""></i>
      </span>
      </a> 
      <ul class="dropdown-menu col-lg-12 notification-dropdown" >
        <li >
          <section class="color-alt-grey header-notification col-lg-12" >
            <span class="pull-left bold" style="color:white;font-size:18px;"><?php  echo $this->lang->line('Notification_title');  ?></span> 
            <span class="pull-right" href="#"><?php  echo $this->lang->line('right_link');  ?></span>
          </section>
        </li>
        <?php  if(count($notifications)==0 OR $notifications==NULL){
        echo "<li >
          <section class=\"center empty-notification\" >".$this->lang->line('no_notifications')."</section></li>";
        }
        else{ $first=0; 
          foreach($notifications as $notification): ?>
            <a href="<?php echo base_url().$language.'/admin/notification/view/'.$notification->note_id.'/'; ?>" >
              <li >
                <section class="<?php if($first==0){ echo "first-note"; $first=1;} ?> notification-tab bold" class="col-lg-5" >
                <span class="" style="font-size:18px; color:white">
                  <?php echo $notification->type_name; 
                  if($notification->lesson == 0){
                  echo "<span class=\"color-alt-grey\" style=\"font-size:16px\">".$this->lang->line('note_for')."</span>".$this->lang->line('note_dev_req')." the developer request";//( BUGFIX mozda je nepotrebna linija)
                  } ?>
                </span>
          <?php if($notification->type==1){ ?>
                 <br />
                <span class="color-green" ><?php  echo $notification->lesson_name; ?></span>
                <?php  echo $this->lang->line('note_sent_by');  ?> 
                <span class="color-green"> <?php echo $notification->username; ?></span> 
                <?php  echo $this->lang->line('note_when');  ?>
                <span class="color-green"><?php echo date('d M Y',strtotime($notification->date));; ?></span>
          <?php } ?>
          <?php if($notification->type==2){ ?>
                 <br />
                <span class="color-green" ><?php  echo $notification->course_name; ?></span>
                <?php  echo $this->lang->line('note_sent_by');  ?> 
                <span class="color-green"> <?php echo $notification->username; ?></span> 
                <?php  echo $this->lang->line('note_when');  ?> 
                <span class="color-green"><?php echo date('d M Y',strtotime($notification->date)); ?></span>
          <?php } ?>
          <?php if($notification->type==4){ ?>
                <br />
                <span class="color-green" ><?php   ?></span>
                <?php  echo $this->lang->line('note_sent_by');  ?>  
                <span class="color-green"> <?php echo $notification->username; ?></span> 
                <?php  echo $this->lang->line('note_when');  ?>
                <span class="color-green"><?php echo date('d M Y',strtotime($notification->date)); ?></span>
          <?php } ?>
          <?php if($notification->type==3){ ?>
                 <br />
                <span class="color-green" ><?php   ?></span>
               
                <span class="color-green"> <?php echo $notification->username; ?></span> 
                <?php  echo $this->lang->line(' note_sent_dev');  ?>
                <span class="color-green"><?php echo date('d M Y',strtotime($notification->date)); ?></span>
                <?php } ?>
              </section>
            </li></a>
            <?php endforeach; }?>
            <li >
              <footer class="center" style="padding:5px;border-top:1px solid rgb(154,159,175);border-bottom-left-radius:10px;border-bottom-right-radius:10px;">
               <a class="dark-limegreen-link bold" href="<?php echo base_url().$language.'/admin/notification/'; ?>"><?php  echo $this->lang->line('view_link');  ?></a>
              </footer>
            </li>      
          </ul>
        </li>
        <div class="pull-left" id="profile-menu" style="margin-left:30px">
       
        </div>
        <?php if($logged_in == NULL){?>

        <li class="btn-green-display">
          <a href="<?php echo site_url('/'.$language.'/home/login'); ?>" data-toggle="modal"  class="btn btn-flat btn-green "  >
            <?php echo $this->lang->line('btn_login'); ?>
          </a>
        </li>
        <li class="btn-green-display">
          <a href="<?php echo site_url('/'.$language.'/home/signup'); ?>" data-toggle="modal" class="btn btn-flat btn-green "  >
            <?php echo $this->lang->line('btn_signup'); ?>
          </a>
        </li>
      <?php }else {?>

        <li class="btn-green-display">
          <a href="<?php echo site_url('/'.$language.'/home/logout'); ?>" data-toggle="modal"  class="btn btn-flat btn-green "  >
            <?php echo $this->lang->line('btn_logout'); ?>
          </a>
        </li>
      <?php }?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle static-link hidden-sm" data-toggle="dropdown" role="button"  aria-expanded="false">
            <?php echo $this->lang->line('btn_option'); ?>
             <span class="caret"></span></a>
          <button type="button" class="navbar-toggle collapsed visible-sm-block" style="margin:20px;"  data-toggle="dropdown" role="button"  aria-expanded="false" >
            <span class="sr-only"><?php echo $this->lang->line('nav_toggle'); ?></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <ul class="dropdown-menu">

            <li>
              <span  class="static-link" style="padding:0px;margin:0px;margin-left:10px;">
              <?php echo "User:" ?>
            </span>
            
            <li>
            
             <li class="hidden-sm hidden-md">
          <a class="nav-avatar " href="<?php echo base_url().$language.'/user/profile/settings';  ?>" >
            <img src="<?php echo $nav_avatar; ?>" alt="" class="avatar" style="width:30px; height:30px;" >
            <span class="mmR"><?php echo $nav_username; ?></span></a>
           </a>
        </li>


            <li class="visible-sm-block visible-md-block">
            <a class="nav-avatar " href="<?php echo base_url().$language.'/user/profile/settings';  ?>" >
              <img src="<?php echo $nav_avatar; ?>" alt="" class="avatar" style="width:30px; height:30px;" >
              <span class="mmR"><?php echo $nav_username; ?></span></a>
            </a>
            </li>
             <li role="separator" class="divider"></li>
             
             <li>
              <span  class="static-link" style="padding:0px;margin:0px;margin-left:10px;">
              <?php echo $this->lang->line('nav_language'); ?>
            </span>
            
            <li>
              <a href=" <?php echo base_url().$language.'/home/change_language/en/'.$total_url;  ?>" class="static-link">
              <img src="<?php echo site_url('images/icons/Flag_of_the_United_Kingdom.png'); ?>" alt="united kingdom flag" style="width:20px;height:12px;padding:2px;margin-bottom:8px;"/>
              <?php echo $this->lang->line('nav_language_english'); ?>
            </a>
          </li>
            <li>
              <a href="<?php echo base_url().$language.'/home/change_language/sr/'.$total_url;  ?>" class="static-link">
                <img src="<?php echo site_url('images/icons/Flag_of_Serbia.png'); ?>" alt="serbian flag" style="width:22px;height:15px;padding:2px;margin-bottom:8px;"/>
                <?php echo $this->lang->line('nav_language_serbian'); ?>
              </a>
            </li>
            
             <li role="separator" class="divider"></li>
             <li>
              <span class="static-link" style="padding:0px;margin:0px;margin-left:10px;">
              <?php  echo $this->lang->line('nav_mode_switch');  ?>
            </span>
            
            <li>
             <li>
              <a href="<?php echo base_url().$language.'/developer/course/';  ?>" class="static-link">
                <?php  echo $this->lang->line('nav_mode_dev');  ?>
              </a>
            </li>
            <li>
              <a href="<?php echo base_url().$language.'/user/category/';  ?>" class="static-link">
                <?php  echo $this->lang->line('nav_mode_user');  ?>
              </a>
            </li>


              <li role="separator" class="divider"></li>
            <li>
              <span href=" <?php echo 'home/change_language/sr/'.$total_url;  ?>" class="static-link" style="padding:0px;margin:0px;margin-left:10px;">
              <?php echo $this->lang->line('nav_options'); ?>
            </span>
            
            <li>
            <li>
              <a href="<?php echo base_url().$language.'/user/profile/settings';  ?>" class="static-link">
                <i class="<?php echo $this->lang->line('nav_user_setting_icon'); ?>"></i> 
                <?php echo $this->lang->line('nav_user_setting'); ?>
              </a>
            </li>
            <li>
              <a href="<?php echo base_url().$language.'/home';  ?>" class="static-link">
                <i class="<?php echo $this->lang->line('nav_search_icon'); ?>"></i> 
               <?php echo $this->lang->line('nav_search'); ?>
              </a>
            </li>
            
             <?php if($logged_in == NULL){?>
             <li role="separator" class="divider"></li>
            <li class="btn-green-mini"><a href="<?php echo site_url('/'.$language.'/home/login/'); ?>" class="btn btn-flat btn-green "><?php echo $this->lang->line('btn_login'); ?></a></li>
            <li class="btn-green-mini"> <a href="<?php echo site_url('/'.$language.'/home/signup/'); ?>" class="btn btn-flat btn-green btn-green-mini"><?php echo $this->lang->line('btn_signup'); ?></a></li>
            <?php }else{ ?>
              <li role="separator" class="divider"></li>
             <li class="btn-green-mini"> <a href="<?php echo site_url('/'.$language.'/home/logout/'); ?>" class="btn btn-flat btn-green btn-green-mini"><?php echo $this->lang->line('btn_logout'); ?></a></li>
            
            <?php } ?>
          </ul>
        </li>
      </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</div>

<script type="text/javascript">
$('.dropdown-toggle').dropdown();


</script>

         