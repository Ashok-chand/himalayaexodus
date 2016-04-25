<?php get_header(); ?>

<!-- breadcrumb section start -->
<section class="breadcrumb_wrap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="bread">
                    <?php
                    if (function_exists('bcn_display')) {
                        bcn_display();
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb section end -->
<!-- Inner title wrapper -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner_title">
                    <h1><?php single_cat_title(); ?></h1>
                    <div class="about_text"><blockquote>" 
                            <?php
                            $text = term_description();
                            echo wp_trim_words($text, $num_words = 40, $more = '');
                            ?>
                            ”</blockquote></div>
                    <div class="ropa"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- inner title wrapper end -->

<!-- Start inner content -->
<section class="inner_content">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-9">


                <div class="image_full">

                    <?php print apply_filters('taxonomy-images-queried-term-image', '', array('image_size' => 'full')); ?>
                </div>
                <?php echo term_description(); ?>


                <hr />

                <ul class="package_wrap">
                    <?php
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    global $wp_query;
                    $args = array_merge($wp_query->query, array('post_type' => 'any', 'paged' => $paged));
                    query_posts($args);
                    ?>
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                            <li>
                                <div class="package_image">
                                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('post-thumb'); ?></a>
                                </div>
                                <div class="package_body">
                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <p><?php
                                        //the_excerpt();
                                        $ex = get_the_excerpt();
                                        echo substr($ex, 0, 85);
                                        ?></p>
                                    <div class="trip_inner">
                                        <ul>
                                            <li><div class="altitude_wrap"><span class="left_text">Max. Altitude : </span><span class="right_text"><?php echo get_post_meta(get_the_ID(), 'tripfacts_altitude', TRUE); ?> </span></span></div></li>
                                            <li><div class="trip_review"><span class="left_text">Customer Review : </span><span class="review level level<?php echo get_post_meta(get_the_ID(), 'tripfacts_review', TRUE); ?> "><?php echo get_post_meta(get_the_ID(), 'tripfacts_review', TRUE); ?> </span></span></div></li>
                                            <li><div class="trip_wrap1"><span class="left_text">Trip Grade : </span> <span class="grade grade4"><?php echo get_post_meta(get_the_ID(), 'tripfacts_grade', TRUE); ?> </span></div></li>
                                        </ul>
                                    </div>

                                </div>

                            </li>
                    <?php endwhile;
                endif; ?>
                </ul>
            <?php ashok_pagination(); ?>

            </div>
<?php get_sidebar(); ?>
        </div>
    </div>
</section>
<!-- End Inner content -->

<?php get_footer(); ?>