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
                            <!--                            <li class="dropdown messages-menu">
                                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                                <i class="fa fa-envelope-o"></i>
                                                                <span class="label label-success">4</span>
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li class="header">You have 4 messages</li>
                                                                <li>
                                                                     inner menu: contains the actual data 
                                                                    <ul class="menu">
                                                                        <li> start message 
                                                                            <a href="#">
                                                                                <div class="pull-left">
                                                                                    <img src="<?php echo base_url(); ?>assets/admin/dist/user2-160x160.jpg" class="img-circle" alt="User Image">
                                                                                </div>
                                                                                <h4>
                                                                                    Support Team
                                                                                    <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                                                                </h4>
                                                                                <p>Why not buy a new awesome theme?</p>
                                                                            </a>
                                                                        </li> end message 
                                                                    </ul>
                                                                </li>
                                                                <li class="footer"><a href="#">See All Messages</a></li>
                                                            </ul>
                                                        </li>
                                                         Notifications: style can be found in dropdown.less 
                                                        <li class="dropdown notifications-menu">
                                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                                <i class="fa fa-bell-o"></i>
                                                                <span class="label label-warning">10</span>
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li class="header">You have 10 notifications</li>
                                                                <li>
                                                                     inner menu: contains the actual data 
                                                                    <ul class="menu">
                                                                        <li>
                                                                            <a href="#">
                                                                                <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li class="footer"><a href="#">View all</a></li>
                                                            </ul>
                                                        </li>
                                                         Tasks: style can be found in dropdown.less 
                                                        <li class="dropdown tasks-menu">
                                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                                <i class="fa fa-flag-o"></i>
                                                                <span class="label label-danger">9</span>
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li class="header">You have 9 tasks</li>
                                                                <li>
                                                                     inner menu: contains the actual data 
                                                                    <ul class="menu">
                                                                        <li> Task item 
                                                                            <a href="#">
                                                                                <h3>
                                                                                    Design some buttons
                                                                                    <small class="pull-right">20%</small>
                                                                                </h3>
                                                                                <div class="progress xs">
                                                                                    <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                                                        <span class="sr-only">20% Complete</span>
                                                                                    </div>
                                                                                </div>
                                                                            </a>
                                                                        </li> end task item 
                                                                    </ul>
                                                                </li>
                                                                <li class="footer">
                                                                    <a href="#">View all tasks</a>
                                                                </li>
                                                            </ul>
                                                        </li>-->
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
                                    <!-- Menu Body -->
                                    <!--                                    <li class="user-body">
                                                                            <div class="col-xs-4 text-center">
                                                                                <a href="#">Followers</a>
                                                                            </div>
                                                                            <div class="col-xs-4 text-center">
                                                                                <a href="#">Sales</a>
                                                                            </div>
                                                                            <div class="col-xs-4 text-center">
                                                                                <a href="#">Friends</a>
                                                                            </div>
                                                                        </li>-->
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <!--                                        <div class="pull-left">
                                                                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                                                                </div>-->
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
                            <p>Alexander Pierce</p>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                   
                    <ul class="sidebar-menu">
                        <li class="header">MAIN NAVIGATION</li>
                        <li class="treeview">
                            <a target="_blank" href="<?php echo base_url(); ?>site">
                                <i class="fa fa-dashboard"></i> <span>Front End</span> <i class="fa fa-angle-left pull-right"></i>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="<?php echo base_url();?>cms">
                                <i class="fa fa-anchor"></i> <span>CMS</span> <i class="fa fa-angle-left pull-right"></i>
                            </a>
                        </li>
                        <li class="treeview <?php
                        if ($active == 'academic')
                            echo 'active';
                        else
                            echo '';
                        ?>">
                            <a href="#">
                                <i class="fa fa-book"></i>
                                <span>Academic Information</span> 
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class="<?php
                                if ($meta == 'class')
                                    echo 'active';
                                else
                                    echo '';
                                ?>"><a href="<?php echo base_url(); ?>admin/AllClass"><i class="fa fa-circle-o"></i> Classes</a></li>
                                <li class="<?php
                                if ($meta == 'subject')
                                    echo 'active';
                                else
                                    echo '';
                                ?>"><a href="<?php echo base_url(); ?>admin/subject"><i class="fa fa-circle-o"></i> Subject</a></li>

                                <li class="<?php
                                if ($meta == 'shift')
                                    echo 'active';
                                else
                                    echo '';
                                ?>"><a href="<?php echo base_url(); ?>admin/shift"><i class="fa fa-circle-o"></i> Shift</a></li>


                            </ul>
                        </li>
                        <li class="treeview <?php
                        if ($meta == 'addmission')
                            echo 'active';
                        else
                            echo '';
                        ?>">
                            <a href="<?php echo base_url(); ?>admin/addmission_form">
                                <i class="fa fa-dashboard"></i> <span>Student Admission</span> <i class="fa pull-right"></i>
                            </a>
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
        <script src="<?php echo base_url(); ?>assets/plugins/input-mask/jquery.inputmask.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/printjs.js"></script>



    </body>
</html>

