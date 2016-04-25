<?php get_header(); ?>
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
                    <h1>Search Results</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Inner title wrapper -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-sm-8 col-xs-12">

                <div id="content" class="search_content">
                    <?php if (have_posts()) : ?>

                        <div class="navigation">
                            <div class="alignleft">
                                <?php // next_posts_link('&laquo; Previous Entries') ?>
                            </div>
                            <div class="alignright">
                                <?php // previous_posts_link('Next Entries &raquo;') ?>
                            </div>
                        </div>
                        <?php while (have_posts()) : the_post(); ?>
                            <div class="post">
                                <h4 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
                                        <?php the_title(); ?>

                                    </a></h4>

                                <?php
                                if (has_post_thumbnail()) {
                                    the_post_thumbnail('medium');
                                }
                                ?>
                                <?php the_excerpt(); ?>


                            </div>
                        <?php endwhile; ?>
                        <div class="navigation">
                            <div class="alignleft">
                                <?php next_posts_link('&laquo; Previous Entries') ?>
                            </div>
                            <div class="alignright">
                                <?php previous_posts_link('Next Entries &raquo;') ?>
                            </div>
                        </div>
                    <?php else : ?>
                        <h3 class="center">No result found. Try a different search?</h3>
                        <p>&nbsp;</p>
                        <center>
                            <div class="top-header"> <?php echo do_shortcode('[widgets_on_pages id=4]') ?> </div>
                        </center>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="adv_search">
                    <?php get_sidebar('advsearch'); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- inner title wrapper end -->

<?php
get_footer()
;
?>
