<?php $this->load->view('admin/components/page_head'); ?>
  <body>
   

   <nav class="navbar navbar-default navbar-static-top navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php site_url('admin/dashboard');?>"><?php echo $meta_title; ?></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="<?php site_url('admin/dashboard');?>"> Dashboard</a></li>
        <li><?php echo anchor('admin/page', 'Pages'); ?></li>
        <li><?php echo anchor('admin/page/order', 'Order pages'); ?></li>
        <li><?php echo anchor('admin/user', 'Users'); ?></li>
        
        
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>



<div class="container">
  <!-- Main colum -->
  <div class="row">
  <div class="col-lg-9">
    <?php
     $this->load->view($subview);
   ?>
  </div>

  <!-- Sidebar -->
  <div class="col-lg-3">
    <section>
      <?php echo mailto('just@codeigniter.cth', '<i class="glyphicon glyphicon-user"></i> igor.vidic@gmail.com'); ?><br />
      <?php echo anchor('admin/user/logout', '<i class="glyphicon glyphicon-off"></i> Logout'); ?>
    </section>
  </div>
  </div>
</div>


<?php $this->load->view('admin/components/page_tail'); ?>

    