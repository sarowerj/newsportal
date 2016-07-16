<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title><?php echo $site_title; ?></title>

        <!-- core CSS -->
        <link rel="shortcut icon" href="<?php echo site_url() .'uploads/'. $site_favicon->opm_value.'small/'.$site_favicon->opt_value; ?>"/>
        <link href="<?php echo site_url() . 'assets/site/themes/theme1/css/bootstrap.min.css'; ?>" rel="stylesheet">
        <link href="<?php echo site_url() . 'assets/site/themes/theme1/css/font-awesome.min.css'; ?>" rel="stylesheet">
        <link href="<?php echo site_url() . 'assets/site/themes/theme1/css/animate.min.css'; ?>" rel="stylesheet">
        <link href="<?php echo site_url() . 'assets/site/themes/theme1/css/owl.carousel.css'; ?>" rel="stylesheet">
        <link href="<?php echo site_url() . 'assets/site/themes/theme1/css/owl.transitions.css'; ?>" rel="stylesheet">
        <link href="<?php echo site_url() . 'assets/site/themes/theme1/css/prettyPhoto.css'; ?>" rel="stylesheet">
        <link href="<?php echo site_url() . 'assets/site/themes/theme1/css/main.css'; ?>" rel="stylesheet">
        <link href="<?php echo site_url() . 'assets/site/themes/theme1/css/responsive.css'; ?>" rel="stylesheet">
        <link href="<?php echo site_url() . 'assets/site/themes/theme1/css/custom.css'; ?>" rel="stylesheet">

        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->           
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo site_url() . 'assets/site/themes/theme1/'; ?>images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo site_url() . 'assets/site/themes/theme1/'; ?>images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo site_url() . 'assets/site/themes/theme1/'; ?>images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="<?php echo site_url() . 'assets/site/themes/theme1/'; ?>images/ico/apple-touch-icon-57-precomposed.png">
    </head><!--/head-->

    <body id="home" class="homepage">

        <header id="header">
            <nav id="main-menu" class="navbar navbar-default navbar-fixed-top" role="banner">
                <div class="container">
                    <div>
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="<?php echo site_url(); ?>"><img src="<?php echo site_url() .'uploads/'. $site_logo->opm_value.'small/'.$site_logo->opt_value; ?>" alt="<?php echo $site_title; ?>"></a>
                        </div>

                        <div class="collapse navbar-collapse navbar-right">
                            <ul class="nav navbar-nav">
                                <li class="scroll active"><a href="#home">হোম</a></li>
                                <li class="scroll"><a href="#features">ম্যানেজিং কমিটি</a></li>
                                <li class="scroll"><a href="#services">শিক্ষকদের তথ্য</a></li>						
                                <li class="scroll"><a href="#meet-team">ভর্তির নিয়মাবলী ও আবেদন</a></li>
                                <li class="scroll"><a href="#about">নোটিশ বোর্ড</a></li>
                                <li class="scroll"><a href="#pricing">প্রয়োজনীয় লিংক</a></li>
                                <li class="scroll"><a href="#portfolio">গ্যালারি</a></li>
                                <li class="scroll"><a href="#get-in-touch">আমাদের সম্পর্কে</a></li> 
                                <li class="scroll"><a href="#contact-us">যোগাযোগ</a></li>

                            </ul>
                        </div>
                    </div>
                </div><!--/.container-->
            </nav><!--/nav-->
        </header><!--/header-->

        <?= $contents ?>


        <!--/#bottom-->

        <footer id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <?php echo $site_copyright ?>
                    </div>
                    <div class="col-sm-6">
                        <ul class="social-icons">
                            <li><a href="<?php echo $site_social_fb;?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="<?php echo $site_social_twitter;?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="<?php echo $site_social_youtube;?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
                            <li><a href="<?php echo $site_social_linkedin;?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer><!--/#footer-->

        <script src="<?php echo site_url() . 'assets/site/themes/theme1/'; ?>js/jquery.js"></script>
        <script src="<?php echo site_url() . 'assets/site/themes/theme1/'; ?>js/bootstrap.min.js"></script>
        <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        <script src="<?php echo site_url() . 'assets/site/themes/theme1/'; ?>js/owl.carousel.min.js"></script>
        <script src="<?php echo site_url() . 'assets/site/themes/theme1/'; ?>js/mousescroll.js"></script>
        <script src="<?php echo site_url() . 'assets/site/themes/theme1/'; ?>js/smoothscroll.js"></script>
        <script src="<?php echo site_url() . 'assets/site/themes/theme1/'; ?>js/jquery.prettyPhoto.js"></script>
        <script src="<?php echo site_url() . 'assets/site/themes/theme1/'; ?>js/jquery.isotope.min.js"></script>
        <script src="<?php echo site_url() . 'assets/site/themes/theme1/'; ?>js/jquery.inview.min.js"></script>
        <script src="<?php echo site_url() . 'assets/site/themes/theme1/'; ?>js/wow.min.js"></script>
        <script src="<?php echo site_url() . 'assets/site/themes/theme1/'; ?>js/main.js"></script>
    </body>
</html>