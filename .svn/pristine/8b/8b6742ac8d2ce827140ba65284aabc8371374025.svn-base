<!-- BEGIN .content -->
<div class="content">
    <!-- BEGIN .wrapper -->
    <div class="wrapper">
        <!-- BEGIN .breaking-news -->
        <div class="breaking-news">
            <div class="breaking-title"><span class="breaking-icon">&nbsp;</span><b>সর্বশেষ খবর</b><div class="the-corner"></div></div>
            <div class="breaking-block">
                <ul>
                    <ul>
                        <?php
                        foreach ($breaking_news as $single_title) {
                            $post_title = $single_title->newspost_title;
                            $post_title = str_replace(" ", "-", $post_title);
                            ?>
                            <li><a href="<?php echo base_url('news/details' . '/' . $post_title . '/' . $single_title->newspost_id); ?>"><?= $single_title->newspost_long_title ?></a></li>
                            <?php
                        }
                        ?>
                    </ul>
                </ul>
            </div>
            <div class="breaking-controls"><a href="#" class="breaking-arrow-left">&nbsp;</a><a href="#" class="breaking-arrow-right">&nbsp;</a><div class="clear-float"></div><div class="the-corner"></div></div>

            <!-- END .breaking-news -->
        </div>

        <!-- BEGIN .main-content-left -->
        <?php include('main_content_left.php'); ?>

        <!-- BEGIN .main-content-right -->
        <?php include('main_content_right.php'); ?>

        <div class="clear-float"></div>

        <!-- END .wrapper -->
    </div>

    <!-- BEGIN .content -->
</div>