<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
    <div class="why_choose_us">
        <h2>Why Choose Us?</h2>
        <ul>
            <?php
            query_posts('cat=3&showposts=10');
            if (have_posts()) : while (have_posts()) : the_post();
                    ?>  
                    <li><?php the_title(); ?></li>
                    <?php
                endwhile;
            else:
                ?>
                <?php _e('No Posts Sorry.'); ?>
            <?php endif; ?>

        </ul>
    </div>
    <div class="site_day_trip">
        <h2>Day Trips</h2>
        <ul>
            <?php
            global $post;
            $args = array('numberposts' => 10, 'post_type' => any, 'category' => 7);
            $posts = get_posts($args);
            foreach ($posts as $post): setup_postdata($post);
                ?>
                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>

            <?php endforeach; ?>


        </ul>
    </div>

    <div class="site_testimonials">
        <h2>What Our Client’s Say !</h2>
        <div class="site_testimonial_wrap">
            <i class="test_comma fa fa-quote-left"></i>
           <div id="testi1" class="owl-carousel">
                        <?php
                        query_posts(array('post_type' => 'ourtestimonials', 'posts_per_page' => '10'));
                        while (have_posts()) : the_post();
                            ?>
                            <div>
                                <div class="testimonial">
                                    <?php the_content(); ?>
                                </div>
                                <div class="author"><?php echo get_post_meta(get_the_ID(), 'testimonial_name', TRUE); ?></div>
                                <div class="t_place"><?php echo get_post_meta(get_the_ID(), 'testimonial_addre', TRUE); ?></div>
                            </div>
                        <?php endwhile; ?>
                        <?php // echo do_shortcode(' [hms_testimonials_rotating template="25" direction="DESC"]') ?>
                    </div>
        </div>
    </div>


</div>