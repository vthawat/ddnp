<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title><?=$title?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="shortcut icon" href="<?=base_url()?>themes/bootstrap3/img/receipt.ico">
    <!-- Bootstrap 3.3.4 -->
    <link href="<?=base_url()?>themes/admin/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="<?=base_url()?>themes/admin/font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
   
    <!-- Theme style -->
    <link href="<?=base_url()?>themes/admin/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link href="<?=base_url()?>themes/admin/dist/css/skins/skin-green.min.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url()?>assets/bootsnipp/custom.css" rel="stylesheet" type="text/css" />
	<?=$_styles?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
        <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.1.4 -->
    <script src="<?=base_url()?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?=base_url()?>themes/admin/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- SlimScroll -->
    <script src="<?=base_url()?>assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="<?=base_url()?>themes/admin/dist/js/app.min.js" type="text/javascript"></script>
  	<?=$_scripts?>
  </head>
  <!--
  BODY TAG OPTIONS:
  =================
  Apply one or more of the following classes to get the
  desired effect
  |---------------------------------------------------------|
  | SKINS         | skin-blue                               |
  |               | skin-black                              |
  |               | skin-purple                             |
  |               | skin-yellow                             |
  |               | skin-red                                |
  |               | skin-green                              |
  |---------------------------------------------------------|
  |LAYOUT OPTIONS | fixed                                   |
  |               | layout-boxed                            |
  |               | layout-top-nav                          |
  |               | sidebar-collapse                        |
  |               | sidebar-mini                            |
  |---------------------------------------------------------|
  -->
  <body class="skin-green sidebar-mini">
    <div class="wrapper">

      <!-- Main Header -->
      <header class="main-header">
	   <div class="hidden-xs">
        <!-- Logo -->
        <a href="<?=base_url()?>" class="logo">
        	<span class="logo-mini"><img width="50px" height="50px" src="<?=base_url()?>images/min-logo.png"></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><img height="50px" src="<?=base_url()?>images/logo.png"></span>
        </a>
		</div>
        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span><span class="thai-webfont font-medium">MENU</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

              <!-- Notifications Menu -->
              <li class="dropdown notifications-menu">
				<?=$notifications?>
              </li>
              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
				                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="fa fa-user fa-fw fa-2x"></span>
                    <span><?=$this->ezrbac->getCurrentUser()->email?></span>
                    </a>
                     <ul class="dropdown-menu">
                     	<li class="user-header">
                     		 	<span><img class="img-circle bg-gray" src="<?=base_url('images/users/boy.png')?>"></span>
                     		 <p><span><?php $userinfo=$this->ezrbac->getUserMeta($this->ezrbac->getCurrentUserID());?>
                     		 	<?=$userinfo->first_name?> <?=$userinfo->last_name?></span> 	
                     		 </p>
                     		 <p><span><?=$this->ezrbac->getRoleName()?></span></p>
                          <?php if($this->manage_user->get_current_user()->user_role_id==3): // level เจ้าหน้าที่กระทรวง?>
                         <p>(<?=$this->ministry->get_by_id($this->manage_user->get_user_meta()->village_id)->MINISTRY_NAME?>)</p>
                         <?php endif;?>
                         <?php if($this->manage_user->get_current_user()->user_role_id==2): // level หัวหน้าชุมชน?>
                         <p>(หมู่บ้าน<?=$this->village->get_by_id($this->manage_user->get_user_meta()->village_id)->VILLAGE_NAME?>)</p>
                         <?php endif;?>
                     		
                     	</li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="<?=base_url('rbac/logout')?>" class="btn btn-default btn-flat"><span class="fa fa-sign-out fa-fw"></span>Sign out</a>
                    </div>
                  </li>
                  </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- search form (Optional) -->
			<?=$search?>
          <!-- /.search form -->

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <!-- Optionally, you can add icons to the links -->
			<?=$sidebar?>
          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1 class="text-info thai-webfont"><?=$page_header?></h1>
          <?=$message?>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Your Page Content Here -->
          <?=$content?>
		<div class="clearfix"></div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <!-- Main Footer -->
      <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right action_bar">
          <?=$action_button?>
        </div>
        <!-- Default to the left -->
        <span class="hidden-xs"><?=$footer?></span>
      </footer>
    </div><!-- ./wrapper -->

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
          Both of these plugins are recommended to enhance the
          user experience. Slimscroll is required when using the
          fixed layout. -->
  </body>
   <script type="text/javascript">
$(document).ready(function () {
    $('a[href="' + this.location.href + '"]').parent().addClass('active');

    $('a[href="' + this.location.href + '"]').parent().parent().parent().addClass('active');
});
</script>
</html>