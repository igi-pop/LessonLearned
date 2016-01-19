<div class="static-topbar">
    <nav class="navbar navbar-default">
  <div class="container-fluid" >
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header" style="">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only"><?php echo $this->lang->line('nav_toggle'); ?></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      
      <a href="<?php echo base_url().$language.'/home/' ?>" class="pull-left">
            <span class="lobster color-green bold " style=" ">
              <object type="image/svg+xml" data="<?php $icon = $this->lang->line('logo'); echo site_url($icon); ?>" class="logo">
                <?php echo $this->lang->line('nav_error_svg'); ?>
              </object>
                    
             <span class="logo-text" >Lesson Learned</span></span>
        </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
        
   
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" role="navigation">
      <ul class="nav navbar-nav static-home-nav " style="">
        <li class="<?php if(isset($navigation_home_active)){ echo "active"; } ?> ">
          <a href="<?php echo site_url($language.'/home/'); ?>" class=" static-link width-100">
            <i class="glyphicon glyphicon-home active"> </i> 
            <?php echo $this->lang->line('main_first_item'); ?> 
          </a>
        </li>
        <?php if($logged_in != NULL){?>
        <?php if($this->user_m->developer_permission(false)): ?>
        <li>
          <a class="  static-link width-100" href="<?php echo base_url().$language."/developer/category/" ?>">
            <i class="glyphicon glyphicon-wrench"></i> 

            <?php echo $this->lang->line('main_second_item'); ?>
          </a>
        </li>
      <?php endif; ?>
         <?php if($this->user_m->admin_permission(false)): ?>
        <li class="visible-xs-block">
          <a class="  static-link width-100" href="<?php echo base_url().$language."/admin/dashboard/" ?>">
            <i class="glyphicon glyphicon-inbox"></i> 

            <?php echo $this->lang->line('nav_mode_admin'); ?>
          </a>
        </li>
      <?php endif; ?>
       <li> 
          <a class="static-link width-100" href="<?php echo base_url().$language."/user/category/" ?>"><i class="glyphicon glyphicon-book active">
          </i> <?php echo $this->lang->line('main_third_item'); ?>
         </a>
      </li>
        <?php } ?>
        

        <!-- New comands only for xs -->
        
        
        <li class="visible-xs-block " style="width:100%">
          <?php if($logged_in == NULL): ?>
          <a  class="static-link col-xs-5 <?php if(isset($navigation_signup_active)){ echo "active"; } ?>" href="<?php echo base_url().$language."/home/signup/" ?>">
            <i class="glyphicon glyphicon-pencil"></i> 

            <?php echo $this->lang->line('btn_signup'); ?> 
          </a>
          <a class="static-link col-xs-5 <?php if(isset($navigation_login_active)){ echo "active"; } ?>"  href="<?php echo base_url().$language."/home/login/" ?>">
            <i class=" glyphicon glyphicon-user"></i> 

            <?php echo $this->lang->line('btn_login'); ?> 
          </a>
          <?php else: ?>
          <a class="static-link col-xs-5 "  href="<?php echo base_url().$language."/home/logout/" ?>" >
            <i class="glyphicon glyphicon-off"></i> 

            <?php echo $this->lang->line('btn_logout'); ?> 
          </a>
           <a class="static-link col-xs-5"    href="<?php echo base_url().$language."/user/profile/" ?>">
            <i class="glyphicon glyphicon-user"></i> 

            <?php echo $this->lang->line('btn_profile'); ?>  
          </a>
        <?php endif; ?>
         

        </li>

        <!-- New comands only for xs -->
      


        <ul class="nav navbar-nav navbar-right pull-right hidden-xs" style=""> 
        <?php if($logged_in == NULL){?>
        <li class="btn-green-display pull-right">
          <a href="<?php echo site_url('/'.$language.'/home/login'); ?>" data-toggle="modal"  class="btn btn-flat btn-green "  >
            <?php  echo $this->lang->line('btn_login'); ?>
          </a>
        </li>
        <li class="btn-green-display pull-right">
          <a href="<?php echo site_url('/'.$language.'/home/signup'); ?>" data-toggle="modal" class="btn btn-flat btn-green "  >
            <?php echo $this->lang->line('btn_signup'); ?>
          </a>
        </li>
      <?php }else {?>
        <li class="btn-green-display pull-right">
          <a href="<?php echo site_url('/'.$language.'/home/logout'); ?>" data-toggle="modal"  class="btn btn-flat btn-green "  >
             <?php echo $this->lang->line('btn_logout'); ?> 
          </a>
        </li>

      <?php }?>
        <li class="dropdown hidden-xs pull-right" >
          <a href="#" class="dropdown-toggle static-link" data-toggle="dropdown" role="button"  aria-expanded="false">
            <?php echo $this->lang->line('btn_option'); ?>
             <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li>
              <a href=" <?php echo base_url().'en/home/change_language/en/'.$total_url;  ?>" class="static-link">
              <img src="<?php echo site_url('images/icons/Flag_of_the_United_Kingdom.png'); ?>" alt="united kingdom flag" style="width:20px;height:12px;padding:2px;margin-bottom:8px;"/>
              English 
            </a>
          </li>
            <li>
              <a href="<?php echo base_url().'en/home/change_language/sr/'.$total_url;;  ?>" class="static-link">
                <img src="<?php echo site_url('images/icons/Flag_of_Serbia.png'); ?>" alt="serbian flag" style="width:22px;height:15px;padding:2px;margin-bottom:8px;"/>
                Serbian
              </a>
            </li>
            
            <li role="separator" class="divider"></li>
            <li class="btn-green-mini"><a >User login:</a></li>
            <li class="btn-green-mini"><a href="<?php echo site_url('/'.$language.'/home/login'); ?>" class="btn btn-flat btn-green ">
              <?php echo $this->lang->line('btn_login'); ?></a></li>
            <li class="btn-green-mini"> <a href="<?php echo site_url('/'.$language.'/home/signup'); ?>" class="btn btn-flat btn-green btn-green-mini">
              <?php echo $this->lang->line('btn_signup'); ?></a></li>
            
          </ul>
        </li>
      </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</div>
      
