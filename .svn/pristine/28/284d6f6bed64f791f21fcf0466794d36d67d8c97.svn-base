<!-- BEGIN .content -->
<div class="content news_details">
    <!-- BEGIN .wrapper -->
    <div class="wrapper">
        <!-- BEGIN .main-content-left -->
        <div class="main-content-left">
            <div class="social-icons-float">

                <span class="soc-header">Share</span>

                <span class="social-icon">
                    <span class="social-count">293<span class="social-arrow">&nbsp;</span></span>
                    <a href="#" class="social-button" style="background:#495fbd;"><span class="icon-text">&#62220;</span><font>Share</font></a>
                </span>

                <span class="social-icon">
                    <span class="social-count">34<span class="social-arrow">&nbsp;</span></span>
                    <a href="#" class="social-button" style="background:#43bedd;"><span class="icon-text">&#62217;</span><font>Tweet</font></a>
                </span>

                <span class="social-icon">
                    <span class="social-count">29<span class="social-arrow">&nbsp;</span></span>
                    <a href="#" class="social-button" style="background:#df6149;"><span class="icon-text">&#62223;</span><font>+1</font></a>
                </span>

                <span class="social-icon">
                    <span class="social-count">18<span class="social-arrow">&nbsp;</span></span>
                    <a href="#" class="social-button" style="background:#d23131;"><span class="icon-text">&#62226;</span><font>Share</font></a>
                </span>

                <span class="social-icon">
                    <span class="social-count">170<span class="social-arrow">&nbsp;</span></span>
                    <a href="#" class="social-button" style="background:#264c84;"><span class="icon-text">&#62232;</span><font>Share</font></a>
                </span>

            </div>


            <div class="main-article-content">
                <h1 class="article-title" data-content=" <?php
                $full_url = base_url('news/details' . '/' . $data_array['title'] . '/' . $data_array['id']);
                echo $full_url;
                ?>"><?php echo $data_array['title']; ?></h1>

                <div class="article-photo">
                    <span class="set-image-border" style="margin: 0px; padding: 0px; float: none;">

                    </span>

                </div>

                <!-- BEGIN .slider-container -->
                <div class="slider-container">

                    <!-- BEGIN .slider-content -->
                    <div class="slider-content">
                        <ul>
                            <!--import Featured Image-->
                            <?php
                            if (!empty($data_array['featured_image'])) {
                                ?>
                                <li>
                                    <a href="javascript:voie(0)">
                                        <span class="slider-info">Novum mediocrem eu pro, oporteat tincidunt eam in per tractatos consectetuer</span>
                                        <img src="<?php echo base_url('uploads') . '/' . $data_array['featured_image']; ?>" class="setborder" alt="" />

                                    </a>
                                </li>
                                <?php
                            }
                            ?>
                            <!--import gallery images-->
                            <?php
                            if (!empty($data_array['featured_gallery'])) {
                                foreach ($data_array['featured_gallery'] as $single) {
                                    $path = base_url('uploads') . '/' . $single->media_path . '600_440/' . $single->media_name;
                                    ?>
                                    <li>
                                        <a href="javascript:voie(0)">
                                            <span class="slider-info">Novum mediocrem eu pro, oporteat tincidunt eam in per tractatos consectetuer</span>
                                            <img src="<?= $path; ?>" class="setborder" alt="" />
                                        </a>
                                    </li>
                                    <?php
                                }
                            }
                            ?>
                        </ul>
                        <!-- END .slider-content -->
                    </div>

                    <ul class="slider-controls"></ul>

                    <!-- END .slider-container -->
                </div>

                <!-- BEGIN .article-controls -->
                <div class="article-controls">

                    <div class="date">
                        <div class="calendar-date">
                            <?php echo $data_array['date_month']; ?>
                        </div>
                        <div class="calendar-time">
                            <font><?php echo $data_array['time']; ?></font>
                            <font><?php echo $data_array['year']; ?></font>
                        </div>
                    </div>

                    <div class="right-side">
                        <div class="colored">
                            <a href="javascript:printArticle();" class="icon-link"><span class="icon-text">&#59158;</span>Print This Article</a>
                            <a href="#" class="icon-link"><span class="icon-text">&#59196;</span>Share it With Friends</a>
                        </div>

                        <div>
                            <a href="javascript:void(0)" class="icon-link"><span class="icon-text">&#128100;</span>by <?php echo $data_array['author'] ?></a>
                            <a href="#" class="icon-link"><span class="icon-text">&#59160;</span>39 comments</a>
                        </div>
                    </div>
                    <div class="clear-float"></div>

                    <!-- END .article-controls -->
                </div>

                <!-- BEGIN .shortcode-content -->
                <div class="shortcode-content">
                    <?php echo $data_array['content']; ?>
                    <!-- END .shortcode-content -->
                </div>
                <?php
                if (!empty($data_array['post_video'])) {
                    ?>
                    <iframe width="100%" height="400" src="https://www.youtube.com/embed/<?php echo $data_array['post_video']; ?>" frameborder="0" allowfullscreen></iframe>
                    <?php
                }
                ?>
            </div>

            <!-- BEGIN .main-nosplit -->
            <div class="main-nosplit">

                <div class="article-share-bottom">

                    <div class="review-title">
                        <b>Dico splendide eos inulla detraxit - overview</b>
                    </div>
                    <div class="review-content">
                        <div class="article-rating right">
                            <span class="icon-text active">&#9733;</span>
                            <span class="icon-text active">&#9733;</span>
                            <span class="icon-text active">&#9733;</span>
                            <span class="icon-text active">&#9733;</span>
                            <span class="icon-text">&#9734;</span>
                        </div>
                        <b>Graphics</b>
                    </div>
                    <div class="review-content">
                        <div class="article-rating right">
                            <span class="icon-text active">&#9733;</span>
                            <span class="icon-text active">&#9733;</span>
                            <span class="icon-text active">&#9733;</span>
                            <span class="icon-text">&#9734;</span>
                            <span class="icon-text">&#9734;</span>
                        </div>
                        <b>Gameplay</b>
                    </div>
                    <div class="review-content">
                        <div class="article-rating right">
                            <span class="icon-text active">&#9733;</span>
                            <span class="icon-text active">&#9733;</span>
                            <span class="icon-text active">&#9733;</span>
                            <span class="icon-text active">&#9733;</span>
                            <span class="icon-text active">&#9733;</span>
                        </div>
                        <b>Sound</b>
                    </div>
                    <div class="review-content">
                        <div class="article-rating right">
                            <span class="icon-text active">&#9733;</span>
                            <span class="icon-text active">&#9733;</span>
                            <span class="icon-text">&#9734;</span>
                            <span class="icon-text">&#9734;</span>
                            <span class="icon-text">&#9734;</span>
                        </div>
                        <b>Storyline</b>
                    </div>
                    <div class="review-content">
                        <div class="article-rating right">
                            <span class="icon-text active">&#9733;</span>
                            <span class="icon-text active">&#9733;</span>
                            <span class="icon-text active">&#9733;</span>
                            <span class="icon-text active">&#9733;</span>
                            <span class="icon-text">&#9734;</span>
                        </div>
                        <b>Presentation</b>
                    </div>
                    <div class="review-foot">
                        <div class="review-sum">
                            <p><b>Summary:</b> Maiorum definiebas no per. Illud vulputate mediocritatem pro. Fuisset partiendo, ubique deseruisse ad, id vel illum error inermis. Sumo neglegentur sit te, vis luptatum principes, cetero comprehensam ad mel. Eu legere insolens incorrupte usu, cum eu deleniti insolens. In eum labore graeco, nostrud constituto qui numquam definiebas has. Eum copiosae consequuntur id, cu error nullam tritani mea.</p>
                        </div>

                        <div class="review-total">
                            <b>3.0</b>
                            <span>Good</span>
                            <div class="article-rating">
                                <span class="icon-text active">&#9733;</span>
                                <span class="icon-text active">&#9733;</span>
                                <span class="icon-text active">&#9733;</span>
                                <span class="icon-text">&#9734;</span>
                                <span class="icon-text">&#9734;</span>
                            </div>
                        </div>

                        <div class="clear-float"></div>
                    </div>

                    <div class="clear-float"></div>

                </div>

                <div class="article-share-bottom">

                    <b>Tags</b>

                    <div class="tag-block">
                        <?php
                        if (!empty($data_array['tags'])) {
                            foreach ($data_array['tags'] as $single_tag) {
                                ?>
                                <a href="javascript:void(0)"><?php echo $single_tag->tag_name; ?></a>  
                                <?php
                            }
                        } else {
                            echo "No Tag Selected";
                        }
                        ?>
                    </div>

                    <div class="clear-float"></div>

                </div>

                <div class="article-share-bottom">

                    <b>Share</b> 

                    <span class='st_facebook_large' st_title="FF" st_url='http://192.168.10.70/newsportal/news/details/%E0%A6%B8%E0%A7%8D%E0%A6%AA%E0%A6%BE%E0%A6%87%E0%A6%A1%E0%A6%BE%E0%A6%B0%E0%A6%AE%E0%A7%8D%E0%A6%AF%E0%A6%BE%E0%A6%A8-post-id-64' displayText='Facebook'></span>
                    
                    <span class='st_twitter_large' displayText='Tweet'></span>
                    <span class='st_linkedin_large' displayText='LinkedIn'></span>
                    <span class='st_pinterest_large' displayText='Pinterest'></span>
                    <span class='st_googleplus_large' displayText='Google +'></span>

                    <div class="clear-float"></div>

                </div>

                <!-- END .main-nosplit -->
            </div>

            <div class="content-article-title">
                <h2>About Author</h2>
                <div class="right-title-side">
                    <a href="#top"><span class="icon-text">&#59231;</span>Scroll Back To Top</a>
                    <a href="blog.html"><span class="icon-text">&#128196;</span>More Articles From Author</a>
                </div>
            </div>

            <!-- BEGIN .main-nosplit -->
            <div class="main-nosplit">

                <div class="author-photo">
                    <img src="images/photos/_avatar-60x60.jpg" class="setborder" alt="" />
                </div>

                <div class="author-content">
                    <h3>Orange-Themes</h3>
                    <div class="right-top">
                        <a href="#" class="icon-text">&#62212;</a>
                        <a href="#" class="icon-text">&#62215;</a>
                        <a href="#" class="icon-text">&#62218;</a>
                        <a href="#" class="icon-text">&#62221;</a>
                        <a href="#" class="icon-text">&#62224;</a>
                        <a href="#" class="icon-text">&#62227;</a>
                    </div>
                    <p>Lorem ipsum dolor sit amet, eu altera suscipit suavitate vix. Cum reformidans consectetuer ei, his melius legimus constituam at. Duo cu sale dignissim, et noluisse luptatum has. In aeque nominati theophrastus has, vel id labore sententiae, et prima aliquip nec. Et qui nominati complectitur.</p>
                </div>

                <div class="split-line"></div>

                <!-- END .main-nosplit -->
            </div>

            <div class="content-article-title">
                <h2>Related Articles</h2>
                <div class="right-title-side">
                    <a href="#top"><span class="icon-text">&#59231;</span>Scroll Back To Top</a>
                    <a href="category.html"><span class="icon-text">&#128196;</span>More Articles</a>
                </div>
            </div>

            <div class="related-block">

                <!-- BEGIN .article-array -->
                <ul class="article-array">
                    <li>
                        <a href="post.html">Lorem ipsum dolor sit amet et dolor adolescens</a><a href="post.html#comments" class="comment-icon"><span class="icon-text">&#59160;</span>23</a>
                    </li>
                    <li>
                        <a href="post.html">At legere iisque quo sit libris delectus an doctus delenit epicuri vel his dolorem dissentiunt ne</a><a href="post.html#comments" class="comment-icon"><span class="icon-text">&#59160;</span>19</a>
                    </li>
                    <li>
                        <a href="post.html">Agam eruditi appetere vix no, congue detraxit quaerend ad per intellegat quaerendum</a><a href="post.html#comments" class="comment-icon"><span class="icon-text">&#59160;</span>42</a>
                    </li>
                    <li>
                        <a href="post.html">Vide erant debitis esse facer elitr mea modo</a><a href="post.html#comments" class="comment-icon"><span class="icon-text">&#59160;</span>8</a>
                    </li>
                    <li>
                        <a href="post.html">Lorem ipsum dolor sit amet et dolor adolescens</a><a href="post.html#comments" class="comment-icon"><span class="icon-text">&#59160;</span>23</a>
                    </li>
                    <li>
                        <a href="post.html">At legere iisque quo sit libris delectus an doctus delenit epicuri vel his dolorem dissentiunt ne</a><a href="post.html#comments" class="comment-icon"><span class="icon-text">&#59160;</span>19</a>
                    </li>
                    <!-- END .article-array -->
                </ul>
                <div class="split-line"></div>

            </div>


            <div class="content-article-title">
                <h2>4 Comments</h2>
                <div class="right-title-side">
                    <a href="#top"><span class="icon-text">&#59231;</span>Scroll Back To Top</a>
                    <a href="#writecomment"><span class="icon-text">&#9998;</span>Write Comment</a>
                </div>
            </div>

            <div class="comment-block">

                <ol class="comments">
                    <li>
                        <div class="commment-content">
                            <div class="user-avatar">
                                <img src="images/no-avatar-60x60.jpg" class="setborder" alt="" title="" />
                            </div>
                            <strong class="user-nick"><a href="#">Ignasi Cleto</a></strong>
                            <span class="time-stamp">April 25, 12:53</span>
                            <div class="comment-text">
                                <p>Usu inani perfecto quaestio in, id usu paulo eruditi salutandi. In eros prompta dolores nec, ut pro causae conclusionemque. In pro elit mundi dicunt. No odio diam interpretaris pri.</p>
                            </div>
                            <a href="#" class="icon-link"><span class="icon-text">&#59154;</span><span>Reply to this comment</span></a>
                        </div>
                        <ul>
                            <li>
                                <div class="commment-content">
                                    <div class="user-avatar">
                                        <img src="images/photos/_avatar-40x40.jpg" class="setborder" alt="" title="" />
                                    </div>
                                    <strong class="user-nick"><a href="#">Orange-Themes</a><span class="marker">Author</span></strong>
                                    <span class="time-stamp">April 25, 12:53</span>
                                    <div class="comment-text">
                                        <p>Ad est audire imperdiet. Cum an docendi assentior. Usu inani perfecto quaestio in, id usu paulo eruditi salutandi. In eros prompta dolores nec, ut pro causae conclusionemque. In pro elit mundi dicunt. No odio diam interpretaris pri.</p>
                                    </div>
                                    <a href="#" class="icon-link"><span class="icon-text">&#59154;</span><span>Reply to this comment</span></a>
                                </div>
                            </li>
                            <li>
                                <div class="commment-content">
                                    <div class="user-avatar">
                                        <img src="images/no-avatar-40x40.jpg" class="setborder" alt="" title="" />
                                    </div>
                                    <strong class="user-nick"><a href="#">Tatius Eugenio</a></strong>
                                    <span class="time-stamp">April 25, 12:53</span>
                                    <div class="comment-text">
                                        <p>Has possit definiebas ne. Sed dico consul ut. Eu labore efficiantur pro. Sed legimus probatus pericula ea, cum oratio labitur concludaturque ne. Mei cu viris moderatius.</p>
                                    </div>
                                    <a href="#" class="icon-link"><span class="icon-text">&#59154;</span><span>Reply to this comment</span></a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div class="commment-content">
                            <div class="user-avatar">
                                <img src="images/no-avatar-60x60.jpg" class="setborder" alt="" title="" />
                            </div>
                            <strong class="user-nick">Ignasi Cleto</strong>
                            <span class="time-stamp">April 25, 12:53</span>
                            <div class="comment-text">
                                <p>Usu inani perfecto quaestio in, id usu paulo eruditi salutandi. In eros prompta dolores nec, ut pro causae conclusionemque. In pro elit mundi dicunt. No odio diam interpretaris pri.</p>
                            </div>
                            <a href="#" class="icon-link"><span class="icon-text">&#59154;</span><span>Reply to this comment</span></a>
                        </div>
                    </li>
                </ol>

            </div>

            <div class="content-article-title">
                <h2>Write a Comment</h2>
                <div class="right-title-side">
                    <a href="#top"><span class="icon-text">&#59231;</span>Scroll Back To Top</a>
                </div>
            </div>

            <div class="comment-form">
                <form action="" method="post" id="writecomment">
                    <p class="comment-notes">Your email address will not be published.<br/>Required fields are marked <span class="required">*</span></p>
                    <p class="comment-form-author">
                        <label for="author">Nickname:<span class="required">*</span></label>
                        <input type="text" placeholder="My name" name="author" id="author" />
                    </p>
                    <p class="comment-form-email">
                        <label for="email">E-mail address:<span class="required">*</span></label>
                        <input class="error" placeholder="e.g. email@mail.me" type="text" name="email" id="email" />
                        <font class="comment-error"><span class="icon-text">&#9888;</span>ERROR: Field is Empty</font>
                    </p>
                    <p class="comment-form-url">
                        <label for="url">Your website:</label>
                        <input type="text" placeholder="www.website.com" name="url" id="url" />
                    </p>
                    <p class="comment-form-text">
                        <label for="comment">Comment:</label>
                        <textarea id="comment" placeholder="Your comment text.."></textarea>
                        <!-- <font class="comment-error textarea-error"><span class="icon-text">&#9888;</span>ERROR: Field is Empty</font> -->
                    </p>
                    <p class="form-submit">
                        <input name="submit" type="submit" id="submit" class="submit-button" value="Post a Comment" />
                    </p>
                </form>

                <div class="split-line"></div>
            </div>

            <!-- END .main-content-left -->
        </div>

        <!-- BEGIN .main-content-right -->
        <div class="main-content-right">

            <!-- BEGIN .main-nosplit -->
            <div class="main-nosplit">

                <!-- BEGIN .banner -->
                <div class="banner">
                    <div class="banner-block">
                        <a href="#"><img src="images/banner-300x250.jpg" alt="" /></a>
                    </div>
                    <div class="banner-info">
                        <a href="contact-us.html" class="sponsored"><span class="icon-default">&nbsp;</span>Sponsored Advert<span class="icon-default">&nbsp;</span></a>
                    </div>
                    <!-- END .banner -->
                </div>

                <!-- END .main-nosplit -->
            </div>


            <!-- BEGIN .main-content-split -->
            <div class="main-content-split">

                <!-- BEGIN .main-split-left -->
                <div class="main-split-left">

                    <!-- END .panel -->
                    <div class="panel">
                        <h3>Popular articles</h3>
                        <div>

                            <!-- BEGIN .article-middle-block -->
                            <div class="article-middle-block">

                                <div class="article-photo">
                                    <a href="post.html">
                                        <img src="images/photos/image-36.jpg" class="setborder" alt="" />
                                    </a>
                                </div>

                                <div class="article-header">
                                    <h2><a href="post.html">Sumo aliquip facilisi temporibus pri</a></h2>
                                    <div class="article-rating">
                                        <span class="icon-text active">&#9733;</span>
                                        <span class="icon-text active">&#9733;</span>
                                        <span class="icon-text active">&#9733;</span>
                                        <span class="icon-text active">&#9733;</span>
                                        <span class="icon-text">&#9734;</span>
                                    </div>
                                </div>

                                <div class="article-links">
                                    <a href="post.html#comments" class="article-icon-link"><span class="icon-text">&#59160;</span>91 comments</a>
                                </div>

                                <!-- END .article-middle-block -->
                            </div>

                            <!-- BEGIN .article-middle-block -->
                            <div class="article-middle-block">

                                <div class="article-photo">
                                    <a href="post.html">
                                        <img src="images/photos/image-37.jpg" class="setborder" alt="" />
                                    </a>
                                </div>

                                <div class="article-header">
                                    <h2><a href="post.html">Deleniti voluptatibus congue erroribus nec</a></h2>
                                    <div class="article-rating">
                                        <span class="icon-text active">&#9733;</span>
                                        <span class="icon-text active">&#9733;</span>
                                        <span class="icon-text active">&#9733;</span>
                                        <span class="icon-text active">&#9733;</span>
                                        <span class="icon-text">&#9734;</span>
                                    </div>
                                </div>

                                <div class="article-links">
                                    <a href="post.html#comments" class="article-icon-link"><span class="icon-text">&#59160;</span>23 comments</a>
                                </div>

                                <!-- END .article-middle-block -->
                            </div>

                            <!-- BEGIN .article-middle-block -->
                            <div class="article-middle-block">

                                <div class="article-photo">
                                    <a href="post.html">
                                        <img src="images/photos/image-38.jpg" class="setborder" alt="" />
                                    </a>
                                </div>

                                <div class="article-header">
                                    <h2><a href="post.html">Denique conceptm ad minim scaevola no</a></h2>
                                    <div class="article-rating">
                                        <span class="icon-text active">&#9733;</span>
                                        <span class="icon-text active">&#9733;</span>
                                        <span class="icon-text active">&#9733;</span>
                                        <span class="icon-text active">&#9733;</span>
                                        <span class="icon-text">&#9734;</span>
                                    </div>
                                </div>

                                <div class="article-links">
                                    <a href="post.html#comments" class="article-icon-link"><span class="icon-text">&#59160;</span>101 comments</a>
                                </div>

                                <!-- END .article-middle-block -->
                            </div>

                            <!-- BEGIN .article-middle-block -->
                            <div class="article-middle-block">

                                <div class="article-photo">
                                    <a href="post.html">
                                        <img src="images/photos/image-39.jpg" class="setborder" alt="" />
                                    </a>
                                </div>

                                <div class="article-header">
                                    <h2><a href="post.html">An oblique nusquam pertinacia et mei</a></h2>
                                    <div class="article-rating">
                                        <span class="icon-text active">&#9733;</span>
                                        <span class="icon-text active">&#9733;</span>
                                        <span class="icon-text active">&#9733;</span>
                                        <span class="icon-text active">&#9733;</span>
                                        <span class="icon-text">&#9734;</span>
                                    </div>
                                </div>

                                <div class="article-links">
                                    <a href="post.html#comments" class="article-icon-link"><span class="icon-text">&#59160;</span>45 comments</a>
                                </div>

                                <!-- END .article-middle-block -->
                            </div>

                            <!-- BEGIN .article-middle-block -->
                            <div class="article-middle-block">

                                <div class="article-photo">
                                    <a href="post.html">
                                        <img src="images/photos/image-40.jpg" class="setborder" alt="" />
                                    </a>
                                </div>

                                <div class="article-header">
                                    <h2><a href="post.html">Ut sea omnes causae eleifend eirmod</a></h2>
                                    <div class="article-rating">
                                        <span class="icon-text active">&#9733;</span>
                                        <span class="icon-text active">&#9733;</span>
                                        <span class="icon-text active">&#9733;</span>
                                        <span class="icon-text active">&#9733;</span>
                                        <span class="icon-text">&#9734;</span>
                                    </div>
                                </div>

                                <div class="article-links">
                                    <a href="post.html#comments" class="article-icon-link"><span class="icon-text">&#59160;</span>239 comments</a>
                                </div>

                                <!-- END .article-middle-block -->
                            </div>

                            <!-- BEGIN .article-middle-block -->
                            <div class="article-middle-block">

                                <div class="article-photo">
                                    <a href="post.html">
                                        <img src="images/photos/image-41.jpg" class="setborder" alt="" />
                                    </a>
                                </div>

                                <div class="article-header">
                                    <h2><a href="post.html">Ut sea omnes causae eleifend eirmod</a></h2>
                                    <div class="article-rating">
                                        <span class="icon-text active">&#9733;</span>
                                        <span class="icon-text active">&#9733;</span>
                                        <span class="icon-text active">&#9733;</span>
                                        <span class="icon-text active">&#9733;</span>
                                        <span class="icon-text">&#9734;</span>
                                    </div>
                                </div>

                                <div class="article-links">
                                    <a href="post.html#comments" class="article-icon-link"><span class="icon-text">&#59160;</span>87 comments</a>
                                </div>

                                <!-- END .article-middle-block -->
                            </div>

                        </div>
                        <!-- END .panel -->
                    </div>

                    <!-- END .main-split-left -->
                </div>

                <!-- BEGIN .main-split-right -->
                <div class="main-split-right">

                    <!-- BEGIN .panel -->
                    <div class="panel">
                        <h3>Popular categories</h3>
                        <div>

                            <ul class="category-list">
                                <li><span class="category-bull" style="background:#a21d1d;">&nbsp;</span><a href="category.html">Sport News</a><span class="article-count">(101)</span></li>
                                <li><span class="category-bull" style="background:#338aa6;">&nbsp;</span><a href="category.html">Business</a><span class="article-count">(93)</span></li>
                                <li><span class="category-bull" style="background:#9f3819;">&nbsp;</span><a href="category.html">Technology</a><span class="article-count">(66)</span></li>
                                <li><span class="category-bull" style="background:#6d8b13;">&nbsp;</span><a href="category.html">Entertainment</a><span class="article-count">(40)</span></li>
                                <li><span class="category-bull" style="background:#cb50b5;">&nbsp;</span><a href="category.html">Gossips</a><span class="article-count">(37)</span></li>
                                <li><span class="category-bull" style="background:#13168b;">&nbsp;</span><a href="category.html">Online Shopping</a><span class="article-count">(22)</span></li>
                                <li><span class="category-bull" style="background:#8b6d13;">&nbsp;</span><a href="category.html">Automotive</a><span class="article-count">(16)</span></li>
                            </ul>

                        </div>
                        <!-- END .panel -->
                    </div>

                    <!-- BEGIN .panel -->
                    <div class="panel">
                        <h3>Recent Comments</h3>
                        <div>

                            <div class="panel-comment">
                                <div class="comment-header">
                                    <b><a href="#">Vitali Seppel</a></b>
                                </div>
                                <div class="comment-content">
                                    <p>Erant sapientem at usu, lorem aliquid scribentur id vel. Sed habeo gloriatur abhorreant ex, fabella accommodare ei.</p>
                                </div>
                                <div class="comment-links">
                                    <a href="post.html#comments" class="comment-icon-link"><span class="icon-text">&#59160;</span>View in article</a>
                                </div>
                            </div>

                            <div class="panel-comment">
                                <div class="comment-header">
                                    <b>Rameshwar Svante</b>
                                </div>
                                <div class="comment-content">
                                    <p>Ei vis cibo assueverit, erat salutatus ius ne.</p>
                                </div>
                                <div class="comment-links">
                                    <a href="post.html#comments" class="comment-icon-link"><span class="icon-text">&#59160;</span>View in article</a>
                                </div>
                            </div>

                            <div class="panel-comment">
                                <div class="comment-header">
                                    <b><a href="#">Sohail Rhydderch</a></b>
                                </div>
                                <div class="comment-content">
                                    <p>Timeam laboramus omittantur et mei, everti commodo id pri vulputate, insolens pericula.</p>
                                </div>
                                <div class="comment-links">
                                    <a href="post.html#comments" class="comment-icon-link"><span class="icon-text">&#59160;</span>View in article</a>
                                </div>
                            </div>

                            <div class="panel-comment">
                                <div class="comment-header">
                                    <b><a href="#">Eduard Peter</a></b>
                                </div>
                                <div class="comment-content">
                                    <p>Possim quaerendum usu id, an pro lorem affert, te audiam tri tani imperdiet eam.</p>
                                </div>
                                <div class="comment-links">
                                    <a href="post.html#comments" class="comment-icon-link"><span class="icon-text">&#59160;</span>View in article</a>
                                </div>
                            </div>

                        </div>
                        <!-- END .panel -->
                    </div>

                    <!-- BEGIN .panel -->
                    <div class="panel">
                        <h3>Latest Galleries</h3>
                        <div>

                            <div class="panel-gallery">
                                <div class="gallery-images">

                                    <a href="#" class="gallery-navi-left icon-text">&#59229;</a>
                                    <a href="#" class="gallery-navi-right icon-text">&#59230;</a>
                                    <ul>
                                        <li class="active"><a href="photo-gallery-single.html"><img src="images/photos/image-42.jpg" class="setborder" alt="" title="" /></a></li>
                                        <li class="active"><a href="photo-gallery-single.html"><img src="images/photos/image-43.jpg" class="setborder" alt="" title="" /></a></li>
                                        <li class="active"><a href="photo-gallery-single.html"><img src="images/photos/image-44.jpg" class="setborder" alt="" title="" /></a></li>
                                    </ul>

                                </div>
                                <div class="gallery-header">
                                    <b><a href="photo-gallery-single.html">Wisi mucius prota sed deleniti voluptatibus</a></b>
                                </div>
                            </div>

                            <div class="panel-gallery">
                                <div class="gallery-images">

                                    <a href="#" class="gallery-navi-left icon-text">&#59229;</a>
                                    <a href="#" class="gallery-navi-right icon-text">&#59230;</a>
                                    <ul>
                                        <li class="active"><a href="photo-gallery-single.html"><img src="images/photos/image-43.jpg" class="setborder" alt="" title="" /></a></li>
                                        <li class="active"><a href="photo-gallery-single.html"><img src="images/photos/image-44.jpg" class="setborder" alt="" title="" /></a></li>
                                        <li class="active"><a href="photo-gallery-single.html"><img src="images/photos/image-42.jpg" class="setborder" alt="" title="" /></a></li>
                                    </ul>

                                </div>
                                <div class="gallery-header">
                                    <b><a href="photo-gallery-single.html">Wisi mucius prota sed deleniti voluptatibus</a></b>
                                </div>
                            </div>

                            <div class="panel-gallery">
                                <div class="gallery-images">

                                    <a href="#" class="gallery-navi-left icon-text">&#59229;</a>
                                    <a href="#" class="gallery-navi-right icon-text">&#59230;</a>
                                    <ul>
                                        <li class="active"><a href="photo-gallery-single.html"><img src="images/photos/image-44.jpg" class="setborder" alt="" title="" /></a></li>
                                        <li class="active"><a href="photo-gallery-single.html"><img src="images/photos/image-42.jpg" class="setborder" alt="" title="" /></a></li>
                                        <li class="active"><a href="photo-gallery-single.html"><img src="images/photos/image-43.jpg" class="setborder" alt="" title="" /></a></li>
                                    </ul>

                                </div>
                                <div class="gallery-header">
                                    <b><a href="photo-gallery-single.html">Wisi mucius prota sed deleniti voluptatibus</a></b>
                                </div>
                            </div>

                        </div>
                        <!-- END .panel -->
                    </div>

                    <!-- END .main-split-right -->
                </div>

                <!-- END .main-content-split -->
            </div>


            <!-- END .main-content-right -->
        </div>

        <div class="clear-float"></div>

        <!-- END .wrapper -->
    </div>

    <!-- End .content -->
</div>