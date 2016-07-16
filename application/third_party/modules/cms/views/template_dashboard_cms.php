<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $title; ?></title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/common/css/bootstrap.min.css">

        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/common/css/common.css">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/common/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/AdminLTE.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/admin.css">

        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/_all-skins.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/timepicker/bootstrap-timepicker.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <script src="<?php echo base_url(); ?>assets/common/js/jQuery-2.2.1.min.js"></script>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/select2.min.css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="<?php echo base_url(); ?>assets/admin/js/html5shiv.min.js"></script>
            <script src="<?php echo base_url(); ?>assets/admin/js/respond.min.js"></script>
        <![endif]-->
        <script>
            base_url = "<?php echo base_url(); ?>";
            required_flag = '';

        </script>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->
                <a href="#" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>E</b>MS</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>Admin</b>Panel</span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- Messages: style can be found in dropdown.less-->

                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?php echo base_url(); ?>assets/admin/dist/user2-160x160.jpg" class="user-image" alt="User Image">
                                    <span class="hidden-xs">Rashedul Islam</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="<?php echo base_url(); ?>assets/admin/dist/user2-160x160.jpg" class="img-circle" alt="User Image">
                                        <p>
                                            DrinsTech Ltd
                                            <small>Member since Nov. 2014</small>
                                        </p>
                                    </li>

                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-right">
                                            <a href="<?php echo base_url(); ?>login/logout" class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!-- Control Sidebar Toggle Button -->

                        </ul>
                    </div>
                </nav>
            </header> 
            <!-- =============================================== -->

            <!-- Left side column. contains the sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo base_url(); ?>assets/admin/dist/user2-160x160.jpg" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p>Rashedul Islam</p>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="header">MAIN NAVIGATION</li>
                        <li class="treeview">
                            <a target="_blank" href="<?php echo base_url(); ?>site">
                                <i class="fa fa-dashboard"></i> <span>Website</span>
                            </a>
                        </li>

                        <li class="treeview <?php echo ($active == 'cms') ? 'active' : ''; ?>">
                            <a href="#">
                                <i class="fa fa-book"></i>
                                <span>CMS</span> 
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class="<?php echo ($meta == 'settings') ? 'active' : ''; ?>"><a href="<?php echo base_url(); ?>cms/settings?active=1"><i class="fa fa-circle-o"></i> Settings</a></li>
                                <li class="<?php echo ($meta == 'media') ? 'active' : ''; ?>"><a href="<?php echo base_url(); ?>cms/media"><i class="fa fa-circle-o"></i> Media</a></li>

                                <li class="<?php if(isset($sub_meta))echo $sub_meta == 'content' ? 'active' : ''; ?>"><a href="#"><i class="fa fa-circle-o"></i> Content<i class="fa fa-angle-left pull-right"></i></a>
                                    <ul class="treeview-menu">
                                        <li class="<?php echo ($meta == 'add_content') ? 'active' : ''; ?>"><a href="<?php echo base_url(); ?>cms/add_content"><i class="fa fa-circle-o"></i> Add Content</a></li>
                                        <li class="<?php echo ($meta == 'view_content') ? 'active' : ''; ?>"><a href="<?php echo base_url(); ?>cms/view_content"><i class="fa fa-circle-o"></i> View Content</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>


                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <?= $contents ?>
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 1.0.0
                </div>
                <strong>Copyright &copy; 2016 <a target="_blank" href="http://drinstech.com">Drins Tech</a>.</strong> All rights reserved.
            </footer>

            <!-- Control Sidebar -->

            <div class="control-sidebar-bg"></div>
        </div><!-- ./wrapper -->
        <!-- jQuery 2.1.4 -->

        <!-- Bootstrap 3.3.5 -->
        <script src="<?php echo base_url(); ?>assets/common/js/bootstrap.min.js"></script>
        <!-- SlimScroll -->
        <script src="<?php echo base_url(); ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="<?php echo base_url(); ?>assets/plugins/fastclick/fastclick.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url(); ?>assets/admin/js/app.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo base_url(); ?>assets/admin/js/demo.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/common_admin.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>

        <script src="<?php echo base_url(); ?>assets/plugins/select2/select2.full.min.js"></script>
        <!-- InputMask -->  



    </body>
</html>

