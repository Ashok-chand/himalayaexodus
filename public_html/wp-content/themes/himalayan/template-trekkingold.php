<?php
/*
  Template Name: Trekking old
 */
get_header();
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
                    <h1><?php echo the_title(); ?></h1>
                    <div class="about_text"><blockquote>"<?php echo get_post_meta(get_the_ID(), 'Blockquote', TRUE); ?>”</blockquote></div>
                    <div class="ropa"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- inner title wrapper end -->

<!-- Start inner content -->

<section class="inner_content">
    <!-- #container -->

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php
                $categories = get_categories();
               // echo '<pre>';
               // print_r($categories);
               // echo '</pre>';


                foreach ($categories as $cat) {

                    $parent = $cat->parent;
                    if ($parent == 0) {
                        ?>
                        <h2> <?php echo $cat_name = $cat->cat_name; ?> </h2>
                        <?php
                        $ii = $cat->term_id;
                        ?>
                        <?php
                        query_posts('cat=' . $ii . '&post_type=any&showposts=6');
                        if (have_posts()) : while (have_posts()) : the_post();
                                ?>
                                <p><?php the_title(); ?></p>
                            <?php endwhile;
                        else: ?>
                            <?php _e('No Posts Sorry.'); ?>
                        <?php endif; ?>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
        <div class="row">

            <ul class="trekking_wrap">
                <?php
                $taxonomy = 'taxonomy_trekking';
                //$queried_term = get_query_var($taxonomy);
                $terms = apply_filters('taxonomy-images-get-terms', '', array('taxonomy' => $taxonomy, 'posts_per_page' => 10, 'orderby' => 'ID', 'order' => 'DESC'));
                //$terms = get_terms($taxonomy, 'slug='.$queried_term);
                if ($terms) {
                    foreach ($terms as $term) {
                        //print_r($term);die;
                        ?>
                        <li>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="trekking_content">
                                    <?php
                                    echo wp_get_attachment_image($term->image_id, 'taxonomy-thumb');
                                    ?>
                                    <h2><a href="<?php echo get_term_link($term->slug, $taxonomy) ?>"><?php echo $term->name; ?></a></h2>
                                    <?php
                                    $text = $term->description;
                                    echo wp_trim_words($text, $num_words = 15, $more = '… ');
                                    ?>
                                    <div>
                                        <a href="<?php echo get_term_link($term->slug, $taxonomy) ?>" class="read">View Packages</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php
                    }
                }
                ?>
                <?php
                if (function_exists('wp_paginate')) {
                    wp_paginate();
                }
                ?>
            </ul>
        </div>
    </div>
</section>
<!-- End Inner content -->

<?php
get_footer();
?>