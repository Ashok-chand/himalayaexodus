<?php get_header() ?>
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <?php
        // count custom post types
        $n_cpt = wp_count_posts('ourbanner');
        $count_posts = $n_cpt->publish;
        ?>
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <?php for ($i = 1; $i < $count_posts; $i++) { ?>
            <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i; ?>"></li>
        <?php } ?>

    </ol>

    <!-- Wrapper for slides  -->
    <div class="carousel-inner" role="listbox">
        <?php
        query_posts(array('post_type' => 'ourbanner', 'posts_per_page' => '1'));
        while (have_posts()) : the_post();
            ?>
            <div class="item active">
                <?php the_post_thumbnail('banner_image'); ?>
            </div>
        <?php endwhile; ?>

        <?php
        query_posts(array('post_type' => 'ourbanner', 'posts_per_page' => '10', 'offset' => '1'));
        while (have_posts()) : the_post();
            ?>
            <div class="item">
                <?php the_post_thumbnail('banner_image'); ?>
            </div>
        <?php endwhile; ?>

    </div>


</div> 
<?php get_sidebar('advsearch'); ?>
</section>
<!-- welcome section -->
<section class="welcome_wrap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="welcome_content">
                    <h1>Welcome to Himalayan Exodus</h1>
                    <?php
                    $post_id = 7;
                    $post_content = get_post($post_id);
                    ?>

                    <p><?php echo $ext = $post_content->post_excerpt; ?></p>
                    <div align="center"><a href="<?php echo get_permalink(7); ?>" class="read_more">+ In Details</a></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- welcome section end -->
<!-- why_choose section start -->
<section>
    <div class="container-fluid why_choose_wrap">
        <div class="row">        	
            <div class="video">
                <?php global $abeka; ?>
                <?php $homevideo = $abeka['video_link']; ?>
                <div id="myElement">Loading the player...</div>
                <script type="text/javascript">
                    jwplayer("myElement").setup({
                        file: "<?php echo $homevideo; ?>",
                        height: 440,
                        width: 440,
                        autostart: true,
                        mute: true,
                    });


                </script>
                <script>
                    if (document.cookie.indexOf("jwplayerAutoStart") == -1) {
                        document.cookie = "jwplayerAutoStart=1";
                        playerInstance.play();
                    }
                </script>

            </div>
            <div class="why_choose_content">
                <?php
                query_posts('cat=3&showposts=6');
                if (have_posts()) : while (have_posts()) : the_post();
                        ?>  	
                        <div class="col-lg-6 col-md-6 col-sm-6 block">
                            <div class="why_choose_description">
                                <h2><?php the_title(); ?></h2>
                                <?php the_content(); ?>
                            </div>
                            <div class="why_choose_image">
                                <?php echo the_post_thumbnail(array(120, 120)); ?>
                                <div class="overlay"></div>

                            </div>
                        </div>

                        <?php
                    endwhile;
                else:
                    ?>
                    <?php _e('No Posts Sorry.'); ?>
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>
<!-- why_choose section ends -->
<!-- start featured trip -->
<section class="featured_wrap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Featured Trips</h1>
                <div id="owl-feature" class="owl-carousel">
                    <?php
                    query_posts('cat=8&post_type=any&showposts=10');
                    if (have_posts()) : while (have_posts()) : the_post();
                            ?> 
                            <div class="item1">
                                <div class="featured_image">
                                    <div class="days"><span><?php
                                            $dayy = get_post_meta(get_the_ID(), 'tripfacts_trip_day', TRUE);
                                            if ($dayy) {
                                                echo $dayy;
                                            } else {
                                                echo '00';
                                            }
                                            ?>
                                        </span> Days</div>
                                    <?php the_post_thumbnail('featured-thumb'); ?>
                                    <div class="more_wrap"><a class="more" href="<?php the_permalink(); ?>"><img src="<?php bloginfo('template_url'); ?>/images/arrow.png" /></a></div>
                                </div>
                                <div class="featured_content">
                                    <h3><a href="<?php the_permalink(); ?>"><?php
                                            $tit = get_the_title();
                                            echo substr($tit, 0, 25);
                                            ?></a></h3>
                                    <p>
                                        <?php
                                        $ex = get_the_excerpt();
                                        echo substr($ex, 0, 60);
                                        ?></p>
                                </div>
                            </div>
                            <?php
                        endwhile;
                    else:
                        ?>
                        <?php _e('No Posts Sorry.'); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end featured trip -->
<!-- start popular trip -->
<section class="popular_trip_wrap">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1>Popular Trips</h1>
                <h2>Special Offer For You</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 no_left_padding fadeInLeft wow">
                <div class="trip">
                    <?php
                    query_posts('cat=66&post_type=any&showposts=1');
                    if (have_posts()) : while (have_posts()) : the_post();
                            ?>  
                            <div class="text_bar"></div>
                            <div class="title_bar"><p><?php the_title() ?><br /><?php echo get_post_meta(get_the_ID(), 'tripfacts_trip_day', TRUE); ?> days</p></div>


                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('trip-month'); ?></a>
                            <?php
                        endwhile;
                    else:
                        ?>
                        <?php _e('No Posts Sorry.'); ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="trip_list  fadeInRight wow">
                    <ul>
                        <?php
                        query_posts('cat=9&post_type=any&showposts=6');
                        if (have_posts()) : while (have_posts()) : the_post();
                                ?> 
                                <li>
                                    <div class="trip_image">
                                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('popular-thumb'); ?></a>
                                    </div>
                                    <div class="trip_content">
                                        <h4><a href="<?php the_permalink(); ?>"><?php
                                                $tit = get_the_title();
                                                echo substr($tit, 0, 23);
                                                ?></a></h4>
                                        <div><a class="book_now" data-target="#myModal" data-toggle="modal" href="" >Book now <span><i class="fa fa-book"></i></span></a></div>
                                        <div><a class="detail" href="<?php the_permalink(); ?>">Details ...</a></div>
                                    </div>
                                </li>
                                <?php
                            endwhile;
                        else:
                            ?>
                            <?php _e('No Posts Sorry.'); ?>
                        <?php endif; ?>  
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end popular trip -->
<!-- start day trip full -->
<!--<section class="day_trip">
        <div class="container">
        <div class="row">
                <div class="col-lg-12">
                <h1>Day Trips</h1>
               <div id="trips" class="owl-carousel">
                                <div>
                        <div class="trip_wrap">
                                
                                <div class="day_trip_image">
                                <img src="<?php bloginfo('template_url'); ?>/images/daytrip.jpg" />
                            </div>
                           
                                <h3>Dhulikhel Tour</h3>
                            <p>Dhulikhel is situated in the east part of Nepal, 32 km away from the capital Kathmandu. Kathmandu Dhulikhel tour is popular tour destination.</p>
                        </div>
                        <div><a href="" class="read">Read More <span><img src="<?php bloginfo('template_url'); ?>/images/read_arrow.png" /></span></a></div>
                        </div>
                        <div>
                        <div class="trip_wrap">
                                
                                <div class="day_trip_image">
                                <img src="<?php bloginfo('template_url'); ?>/images/daytrip.jpg" />
                            </div>
                           
                                <h3>Dhulikhel Tour</h3>
                            <p>Dhulikhel is situated in the east part of Nepal, 32 km away from the capital Kathmandu. Kathmandu Dhulikhel tour is popular tour destination.</p>
                        </div>
                        <div><a href="" class="read">Read More <span><img src="<?php bloginfo('template_url'); ?>/images/read_arrow.png" /></span></a></div>
                        </div>
                        <div>
                        <div class="trip_wrap">
                                
                                <div class="day_trip_image">
                                <img src="<?php bloginfo('template_url'); ?>/images/daytrip.jpg" />
                            </div>
                           
                                <h3>Dhulikhel Tour</h3>
                            <p>Dhulikhel is situated in the east part of Nepal, 32 km away from the capital Kathmandu. Kathmandu Dhulikhel tour is popular tour destination.</p>
                        </div>
                        <div><a href="" class="read">Read More <span><img src="<?php bloginfo('template_url'); ?>/images/read_arrow.png" /></span></a></div>
                        </div>
                        <div>
                        <div class="trip_wrap">
                                
                                <div class="day_trip_image">
                                <img src="<?php bloginfo('template_url'); ?>/images/daytrip.jpg" />
                            </div>
                           
                                <h3>Dhulikhel Tour</h3>
                            <p>Dhulikhel is situated in the east part of Nepal, 32 km away from the capital Kathmandu. Kathmandu Dhulikhel tour is popular tour destination.</p>
                        </div>
                        <div><a href="" class="read">Read More <span><img src="<?php bloginfo('template_url'); ?>/images/read_arrow.png" /></span></a></div>
                        </div>
                        <div>
                        <div class="trip_wrap">
                                
                                <div class="day_trip_image">
                                <img src="<?php bloginfo('template_url'); ?>/images/daytrip.jpg" />
                            </div>
                           
                                <h3>Dhulikhel Tour</h3>
                            <p>Dhulikhel is situated in the east part of Nepal, 32 km away from the capital Kathmandu. Kathmandu Dhulikhel tour is popular tour destination.</p>
                        </div>
                        <div><a href="" class="read">Read More <span><img src="<?php bloginfo('template_url'); ?>/images/read_arrow.png" /></span></a></div>
                        </div>
                        <div>
                        <div class="trip_wrap">
                                
                                <div class="day_trip_image">
                                <img src="<?php bloginfo('template_url'); ?>/images/daytrip.jpg" />
                            </div>
                           
                                <h3>Dhulikhel Tour</h3>
                            <p>Dhulikhel is situated in the east part of Nepal, 32 km away from the capital Kathmandu. Kathmandu Dhulikhel tour is popular tour destination.</p>
                        </div>
                        <div><a href="" class="read">Read More <span><img src="<?php bloginfo('template_url'); ?>/images/read_arrow.png" /></span></a></div>
                        </div>
                  </div> 
               
            </div>
        </div>
        
    </div>
</section>-->
<!-- end day trip -->
<!-- start day trip half -->
<section class="day_trip">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <h1>Day Trips</h1>
                <div id="trip" class="owl-carousel">
                    <?php
                    query_posts('cat=7&post_type=any&showposts=10');
                    if (have_posts()) : while (have_posts()) : the_post();
                            ?> 
                            <div>
                                <div class="trip_wrap">

                                    <div class="day_trip_image">
                                        <?php the_post_thumbnail('daynews-thumb'); ?>
                                    </div>

                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <?php
                                    $ex = get_the_content();
                                    echo substr($ex, 0, 150);
                                    ?>
                                </div>
                                <div class="read_wrap"><a href="<?php the_permalink(); ?>" class="read">Read More <span><img src="<?php bloginfo('template_url'); ?>/images/read_arrow.png" /></span></a></div>
                            </div>
                            <?php
                        endwhile;
                    else:
                        ?>
                        <?php _e('No Posts Sorry.'); ?>
                    <?php endif; ?>
                </div> 

            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <h1>News</h1>
                <div id="news" class="owl-carousel">
                    <?php
                    query_posts(array('post_type' => 'ournews', 'posts_per_page' => '10'));
                    while (have_posts()) : the_post();
                        ?>
                        <div>
                            <div class="trip_wrap">
                                <?php if (has_post_thumbnail()) { ?>
                                    <div class="day_trip_image">
                                        <?php the_post_thumbnail('daynews-thumb'); ?>
                                    </div>
                                <?php } ?>
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <div class="news_date"><i class="fa  fa-calendar"></i> <?php the_time('l, F j, Y'); ?></div>
                                <p><?php the_excerpt(); ?></p>
                            </div>
                            <div class="read_wrap"><a href="<?php the_permalink(); ?>" class="read">Read More <span><img src="<?php bloginfo('template_url'); ?>/images/read_arrow.png" /></span></a></div>
                        </div>
                    <?php endwhile; ?>
                </div> 

            </div>
        </div>

    </div>
</section>
<!-- end day trip -->
<!-- testimonials start -->
<section class="testimonial_wrap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>What Our Client’s Say !</h1>
                <div class="testimonial_content">
                    <div class="icon"><i class="fa fa-quote-left"></i></div>
                    <div id="testi" class="owl-carousel">
                        <?php
                        query_posts(array('post_type' => 'ourtestimonials', 'posts_per_page' => '10'));
                        while (have_posts()) : the_post();
                            ?>
                            <div>
                                <div class="testimonial">
                                    <?php the_content(); ?>
                                </div>
                                <div class="author"><?php echo get_post_meta(get_the_ID(), 'testimonial_name', TRUE);  ?></div>
                                <div class="t_place"><?php echo get_post_meta(get_the_ID(), 'testimonial_addre', TRUE); ?></div>
                            </div>
                        <?php endwhile; ?>
                        <?php // echo do_shortcode(' [hms_testimonials_rotating template="25" direction="DESC"]') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end testimonials -->
<div id="myModal" class="modal fade form_model" role="dialog">
    <div class="modal-dialog"> 

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Book Trip</h4>
            </div>
            <div class="modal-body">
                <?php include_once TEMPLATEPATH . '/booking.php'; ?>
            </div>

        </div>
    </div>
</div>

<?php
get_footer()
;
?>