<?php get_header();

?>
</section>
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
                    <h1>Travel News</h1>
                    
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
            <ul class="trekking_wrap">
                <?php
                query_posts(array('post_type' => 'ournews', 'posts_per_page' => '20'));
                while (have_posts()) : the_post();
                    ?>
                    <li>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="trekking_content">
                                <?php the_post_thumbnail('taxonomy-thumb'); ?>
                                <h2><?php the_title(); ?></h2>
                                <div class="news_date">
                                    <i class="fa fa-calendar"></i>
                                    <?php the_time('l, F j, Y'); ?>
                                </div>
                                <?php the_excerpt(); ?>
                                <div>
                                    <a href="<?php the_permalink(); ?>" class="read">View Detail</a>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php endwhile; ?>
            </ul>
        </div>
    </div>
</section>
<!-- End Inner content -->

<?php
get_footer();
?>