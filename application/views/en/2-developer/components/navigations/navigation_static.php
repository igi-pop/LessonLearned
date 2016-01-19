<div class="topbar-style navbar-static-top" style="margin-bottom:25px;">
    <nav class="navbar navbar-default">
  <div class="container-fluid" >
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only"><?php  echo $this->lang->line('nav_toggle');  ?></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      
       <a href="<?php echo base_url().$language.'/developer/course/' ?>" class="pull-left">
            <span class="lobster color-green bold logo-text" style="padding-top:10px;text-shadow: 1px 1px #007700;font-family: 'Candal', sans-serif;">
               <object type="image/svg+xml" data="<?php $icon = $this->lang->line('logo'); echo site_url($icon); ?>" class="logo" style=" "><?php  echo $this->lang->line('nav_error_svg');  ?></object>
               
              Lesson Learned</span><br /><span class="color-alt-grey  bold"><?php  echo $this->lang->line('dev_version');  ?></span>
        </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    
    <div class="collapse navbar-collapse margin-mini" id="bs-example-navbar-collapse-1" style="">
      <ul class="nav navbar-nav static-home-nav " >


       <li style="border-bottom:#2ec866 1px solid;" class="visible-xs-block">
        <span class=" col-xs-3 bold profile_label "><?php  echo $this->lang->line('nav_user_profile');  ?></span>
          <a class="nav-avatar col-xs-9 profile_name_dark" href="<?php echo base_url().$language.'/user/profile/settings'; ?>" style="">
            <img src="<?php echo $nav_avatar; ?>" alt="" class="avatar" style="width:30px; height:30px;" >
            <span class="mmR"><?php echo $nav_username; ?></span></a>
           </a>
        </li>
        



        <li class="<?php if(isset($navigation_mylessons_active)){ echo "active"; } ?>">
          <a href="<?php echo base_url().$language.'/developer/course/'; ?>" class=" static-link width-100">
            <i class="<?php echo $this->lang->line('dev_first_item_icon'); ?> "> </i> 
            <?php echo $this->lang->line('dev_first_item'); ?>
            
          </a>
        </li>
        <li class="hidden ">
          <a href="<?php echo base_url().$language.'/user/category/'; ?>" class=" static-link width-100">
            <i class="<?php echo $this->lang->line('dev_second_item_icon'); ?>"> </i> 
            <?php echo $this->lang->line('dev_second_item'); ?> 
            
          </a>
        </li>
        <li class="<?php if(isset($navigation_category_active)){ echo "active"; } ?>">
          <a href="<?php echo base_url().$language.'/developer/category/'; ?>" class=" static-link width-100">
            <i class="<?php echo $this->lang->line('dev_third_item_icon'); ?> "> </i> 
            <?php echo $this->lang->line('dev_third_item'); ?> 
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li>
          <a class="hidden  static-link width-100" href="<?php echo base_url().$language.'/developer/course/'; ?>">
            <i class="glyphicon glyphicon-user"></i> 

            <?php  echo $this->lang->line('dev_second_item');  ?>
          </a>
        </li>
        
        <li class="visible-xs-block">
          <a class="  static-link width-100" href="<?php echo base_url().$language."/user/category/" ?>">
            <i class="glyphicon glyphicon-user"></i> 

            <?php echo $this->lang->line('nav_mode_user'); ?>
          </a>
        </li>
      
          <?php if($this->user_m->admin_permission(false)): ?>
        <li class="visible-xs-block">
          <a class="  static-link width-100" href="<?php echo base_url().$language."/admin/dashboard/" ?>">
            <i class="glyphicon glyphicon-inbox"></i> 

            <?php echo $this->lang->line('nav_mode_admin'); ?>
          </a>
        </li>
      <?php endif; ?>

         <li role="separator" class="divider"></li>
       

       <li class="visible-xs-block"> 
      <a class=" static-link notification-link width-100" title="Notifications" href="<?php echo base_url().$language.'/user/profile/notification/'; ?>" style="border-radius:0px; ">
      <?php  if(count($notifications)!=0 OR $notifications!=NULL){ ?>
      <span class="notif-numb color-alt-grey img-circle bold"> <?php echo $notification_counter; ?></span>
      <?php } ?>
      <span class="notif-icon">
        <i class="notif-icon glyphicon glyphicon-cloud" style=""></i>
      </span>
      <?php echo $this->lang->line('Notification_title'); ?>
      </a>
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
            <span class="pull-left bold" style="color:white;font-size:18px;">
              <?php  echo $this->lang->line('Notification_title');  ?>
            </span> 
            <span class="pull-right" href="#"><?php  echo $this->lang->line('right_link');  ?></span>
          </section>
        </li>
        <?php  if(count($notifications)==0 OR $notifications==NULL){
        echo "<li >
          <section class=\"center empty-notification\" >".$this->lang->line('no_notifications')."</section></li>";
        }
        else{ $first=0; 
          foreach($notifications as $notification): ?>
            <a href="<?php echo base_url().$language.'/user/profile/notification_details/'.$notification->note_id.'/'; ?>" >
              <li >
                <section class="<?php if($first==0){ echo "first-note"; $first=1;} ?> notification-tab bold" class="col-lg-5" >
                <span class="" style="font-size:18px; color:white">
                  <?php //echo $notification->type_name; 
                  if($notification->lesson == 0){
                  echo "<span class=\"color-alt-grey\" style=\"font-size:16px\">".$this->lang->line('note_for')."</span>".$this->lang->line('note_dev_req')." the developer request";//( BUGFIX mozda je nepotrebna linija)
                  } ?>
                </span>
         
                <?php if($notification->type==4){ ?>
                  <span class="color-green" ><?php echo substr($notification->lesson_name,0,30).'...'; ?></span>
                <span class="pull-right" style="font-size:12px;">
                  <?php echo $this->lang->line('note_status');  ?>
                  <?php echo $this->lang->line('nav_unseen'); ?></span> <br />
                
                <?php  echo $this->lang->line('note_sent_by');  ?>  
                <span class="color-green"> <?php echo $notification->username; ?></span> 
                <?php  echo $this->lang->line('note_when');  ?>
                <span class="color-green"><?php echo date('d M Y',strtotime($notification->date)); ?></span>
                <?php } ?>
                <?php if($notification->type==3){ ?>
                <span class="pull-right" style="font-size:12px;"><?php echo $this->lang->line('note_status');  ?><?php echo $this->lang->line('nav_unseen'); ?></span> <br />
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
               <a href="<?php echo base_url().$language.'/user/profile/notification/'; ?>">
                <?php  echo $this->lang->line('view_link');  ?>
              </a>
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
            <span class="sr-only"><?php echo $this->lang->line('nav_toggle');  ?></span>
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
              <?php echo $this->lang->line('nav_language');  ?>
            </span>
            
            <li>
              <a href=" <?php echo base_url().$language.'/home/change_language/en/'.$total_url;  ?>" class="static-link">
              <img src="<?php echo site_url('images/icons/Flag_of_the_United_Kingdom.png'); ?>" alt="united kingdom flag" style="width:20px;height:12px;padding:2px;margin-bottom:8px;"/>
               <?php echo $this->lang->line('nav_language_english');  ?>
            </a>
          </li>
            <li>
              <a href="<?php echo base_url().$language.'/home/change_language/sr/'.$total_url;  ?>" class="static-link">
                <img src="<?php echo site_url('images/icons/Flag_of_Serbia.png'); ?>" alt="serbian flag" style="width:22px;height:15px;padding:2px;margin-bottom:8px;"/>
                 <?php echo $this->lang->line('nav_language_serbian');  ?>
              </a>
            </li>
            <li role="separator" class="divider"></li>
             <li>
              <span class="static-link" style="padding:0px;margin:0px;margin-left:10px;">
              <?php  echo $this->lang->line('nav_mode_switch');  ?>
            </span>
            
            <li>
              <?php if($this->user_m->admin_permission(false)): ?>
             <li>
              <a href="<?php echo base_url().$language.'/admin/dashboard/';  ?>" class="static-link">
                <?php  echo $this->lang->line('nav_mode_admin');  ?>
              </a>
            </li>
          <?php endif; ?>
            <li>
              <a href="<?php echo base_url().$language.'/user/category/';  ?>" class="static-link">
                <?php  echo $this->lang->line('nav_mode_user');  ?>
              </a>
            </li>
            <li role="separator" class="divider"></li>
            <li>
              <span  class="static-link" style="padding:0px;margin:0px;margin-left:10px;">
               <?php echo $this->lang->line('nav_options');  ?>
            </span>
            
            <li>
            <li>
              <a href="<?php echo base_url().$language.'/user/profile/settings';  ?>" class="static-link">
                <i class="<?php  echo $this->lang->line('nav_user_setting_icon');  ?>" ></i>
                <?php  echo $this->lang->line('nav_user_setting');  ?>
              </a>
            </li>
            <li>
              <a href="<?php echo base_url().$language.'/home';  ?>" class="static-link">
                <i class="<?php  echo $this->lang->line('nav_search_icon');  ?>" ></i>
                <?php  echo $this->lang->line('nav_search');  ?>
              </a>
            </li>
            
             <?php if($logged_in == NULL){?>
             <li role="separator" class="divider"></li>
            <li class="btn-green-mini">
              <a href="<?php echo site_url('/'.$language.'/home/login'); ?>" class="btn btn-flat btn-green ">
                <?php echo $this->lang->line('btn_login'); ?>
              </a>
            </li>
            <li class="btn-green-mini"> 
              <a href="<?php echo site_url('/'.$language.'/home/signup'); ?>" class="btn btn-flat btn-green btn-green-mini">
                <?php echo $this->lang->line('btn_signup'); ?>
              </a>
            </li>
            <?php }else{ ?>
              <li role="separator" class="divider"></li>
             <li class="btn-green-mini"> 
              <a href="<?php echo site_url('/'.$language.'/home/logout'); ?>" class="btn btn-flat btn-green btn-green-mini">
                <?php echo $this->lang->line('btn_logout'); ?>
              </a>
            </li>
            
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
