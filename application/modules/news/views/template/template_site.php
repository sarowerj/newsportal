<!DOCTYPE HTML>
<html lang = "en">
    <!-- BEGIN head -->
    <head>
        <title><?php echo $title; ?></title>
        <!-- Meta Tags -->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

        <!-- Favicon -->
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />

        <!-- Stylesheet for Default HTML Reset -->
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() . 'assets/site/'; ?>css/reset.css" />

        <!-- Stylesheet for Custom Fonts-->
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() . 'assets/site/'; ?>css/fonts.css" />

        <!-- Stylesheet for Fontawesome-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/common/css/font-awesome.min.css" />

        <!-- Stylesheet for Retina -->
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() . 'assets/site/'; ?>css/retina.css" />

        <!-- Stylesheet for Theme Styling-->
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() . 'assets/site/'; ?>css/main-stylesheet.css" />

        <!--[if lte IE 8]>
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() . 'assets/site/'; ?>css/ie-transparecy.css" />
        <![endif]-->

        <link type="text/css" id="style-responsive" rel="stylesheet" media="screen" href="<?php echo base_url() . 'assets/site/'; ?>css/responsive/desktop.css" />

        <!-- Custom Styling by Sarower-->
        <link type="text/css" id="style-responsive" rel="stylesheet" media="screen" href="<?php echo base_url() . 'assets/site/'; ?>css/style.css" />

        <!-- jQuery 1.10.2 -->
        <script type="text/javascript" src="<?php echo base_url() . 'assets/site/'; ?>jscript/jquery-1.10.2.min.js"></script>

        <script type="text/javascript">
            var iPhoneVertical = Array(null, 320, "<?php echo base_url() . 'assets/site/'; ?>css/responsive/phoneverticald41d.css?" + Date());
            var iPhoneHorizontal = Array(321, 767, "css/responsive/phonehorizontald41d.css?" + Date());
            var iPad = Array(768, 1000, "<?php echo base_url() . 'assets/site/'; ?>css/responsive/ipadd41d.css?" + Date());
            var dekstop = Array(1001, null, "<?php echo base_url() . 'assets/site/'; ?>css/responsive/desktopd41d.css?" + Date());

            // Legatus Slider Options
            var _legatus_slider_autostart = true;	// Autostart Slider (false / true)
            var _legatus_slider_interval = 50000;	// Autoslide Interval (Def = 5000)
            var _legatus_slider_loading = true;		// Autoslide With Loading Bar (false / true)
        </script>
        
        <script type="text/javascript">
            fasdf
        </script>
        <!-- END head -->
    </head>
    <!-- BEGIN body -->
    <body>
        <!-- BEGIN .boxed -->
        <!-- <div class="boxed active"> -->
        <div class="boxed"> 
            <!-- BEGIN .header -->
            <div class="header">
                <!-- BEGIN .header-very-top -->
                <div class="header-very-top">
                    <div class="wrapper">
                        <div class="left">
                            ঢাকা, বুধবার, ২০ এপ্রিল ২০১৬, ০৭ বৈশাখ ১৪২৩, ১২ রজব ১৪৩৭
                        </div>

                        <div class="right">
                            <div class="social_icons">
                                <ul>
                                    <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                                    <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                                    <li><a href="#"><span class="fa fa-google-plus"></span></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="clear-float"></div>
                    </div>
                    <div class="double-split"></div>
                    <!-- END .header-very-top -->
                </div>

                <!-- BEGIN .header-middle -->
                <div class="header-middle">
                    <div class="wrapper">
                        <div class="logo-image">
                            <h1 style="display: none;">Bangabani</h1>
                            <a href="<?php echo base_url(); ?>"><img class="logo" src="<?php echo base_url() . 'assets/site/'; ?>images/logo.png" alt="" /></a>
                        </div>

                        <div class="banner">
                            <div class="banner-block">
                                <a href="#"><img src="<?php echo base_url() . 'assets/site/'; ?>images/banner-468x60.jpg" alt="" /></a>
                            </div>
                            <div class="banner-info">
                                <a href="contact-us.html" class="sponsored"><span class="icon-default">&nbsp;</span>Sponsored Advert<span class="icon-default">&nbsp;</span></a>
                            </div>
                        </div>

                        <div class="clear-float"></div>

                    </div>
                    <!-- END .header-middle -->
                </div>

                <!-- BEGIN .header-menu -->
                <div class="header-menu thisisfixed">
                    <div class="wrapper">
                        <ul class="main-menu">
                            <?php
                            foreach ($menus as $menu) {
                                if ($menu->parent_id == 0) {
                                    ?>
                                    <li>
                                        <a href="<?php echo base_url(); ?>news/inner_page/<?php echo $menu->slug; ?>"><?php echo $menu->name; ?></a>
                                        <ul class="sub-menu">
                                            <?php
                                            foreach ($menus as $children) {
                                                if ($menu->id == $children->parent_id) {
                                                    ?>
                                                    <li><a href="<?php echo base_url(); ?>news/inner_page/<?php echo $children->slug; ?>"><?php echo $children->name; ?></a></li>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </li>
                                    <?php
                                }
                            }
                            ?>
                        </ul>
                        <div class="clear-float"></div> 
                    </div>
                    <!-- END .header-menu -->
                </div>

                <!-- END .header -->
            </div> 
            <?= $contents ?>
            <!-- BEGIN .footer -->
            <div class="footer">

                <!-- BEGIN .wrapper -->
                <div class="wrapper">


                    <!-- BEGIN .breaking-news -->
                    <div class="breaking-news">

                        <div class="breaking-title"><span class="breaking-icon">&nbsp;</span><b>Breaking News</b><div class="the-corner"></div></div>

                        <div class="breaking-block">
                            <ul>
                                <?php
                                foreach ($breaking_news_title as $single_title) {
                                    $post_title = $single_title->newspost_title;
                                    $post_title = str_replace(" ", "-", $post_title);
                                    ?>
                                    <li><a href="<?php echo base_url('news/details' . '/' . $post_title . '/' . $single_title->newspost_id); ?>"><?= $single_title->newspost_long_title ?></a></li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>

                        <div class="breaking-controls"><a href="#" class="breaking-arrow-left">&nbsp;</a><a href="#" class="breaking-arrow-right">&nbsp;</a><div class="clear-float"></div><div class="the-corner"></div></div>

                        <!-- END .breaking-news -->
                    </div>


                    <!-- BEGIN .footer-content -->
                    <div class="footer-content">

                        <div class="footer-menu">
                            <ul>
                                <li><a href="category.html">Ouotaperiam</a></li>
                                <li><a href="category.html">Copiosaeusu</a></li>
                                <li><a href="category.html">Tantas</a></li>
                                <li><a href="category.html">Homero</a></li>
                                <li><a href="category.html">Sanctus</a></li>
                                <li><a href="category.html">Eameudicam</a></li>
                                <li><a href="category.html">Decore</a></li>
                                <li><a href="category.html">Blandit</a></li>
                                <li><a href="category.html">Mentitum</a></li>
                                <li><a href="category.html">Definiebas</a></li>
                            </ul>
                        </div>

                        <div class="left">&copy; 2013 Copyright <b>Bangabani News</b>. All Rights reserved.</div>

                        <div class="right">Powered by <a href="http://www.drinstech.com" target="_blank">Drins Tech Limited</a></div>

                        <div class="clear-float"></div>

                        <!-- END .footer-content -->
                    </div>


                    <!-- END .wrapper -->
                </div>

                <!-- END .footer -->
            </div>

            <!-- END .boxed -->
        </div>
        <script type="text/javascript" src="<?php echo base_url() . 'assets/site/'; ?>jscript/orange-themes-responsive.js"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'assets/site/'; ?>jscript/scripts.js"></script>
        <!-- END body -->
    </body>
    <!-- END html -->

    <!-- Mirrored from legatus.orange-themes.com/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Feb 2016 22:27:41 GMT -->
</html>
