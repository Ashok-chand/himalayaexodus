<?php
get_header();
?>
<?php
// Get data from URL into variables
$by_destination = $_GET['by_destination'] != '' ? $_GET['by_destination'] : '';

$by_activity = $_GET['by_activity'] != '' ? $_GET['by_activity'] : '';

$by_duration = $_GET['by_duration'] != '' ? $_GET['by_duration'] : '';

$data = '';
$meta_query = array();
$tax_query = array();

if ($by_destination) {
    $data = $by_destination;
}
if ($by_activity) {
    $data = $by_activity;
}
if ($data) {
    $tax_query = array(
        'taxonomy' => 'category',
        'terms' => $data,
        'field' => 'term_id',
    );
}
if ($by_duration) {
    $duration = explode("-", $by_duration);
    $duration_from = $duration[0];
    $duration_to = $duration[1];
    $meta_query = array('relation' => 'OR');
    for ($i = $duration_from; $i <= $duration_to; $i++) {
        $meta_query[] = array(
            'key' => 'tripfacts_trip_day',
            'value' => $i,
            'compare' => '=', // CHANGED
        );
    }
    //$dur = rtrim($dur, ',');
}

// Start the Query
wp_reset_postdata();
?>
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
                    <h1>Advance Search Results</h1>
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
                    <?php
                    $args = array(
                        'post_type' => 'any',
                        'showposts' => -1,
                        'relation' => 'AND',
                        'tax_query' => array($tax_query),
                        'meta_query' => array($meta_query),
                    );
                    $loop = new WP_Query($args);
                    if ($loop->have_posts()) :
                        ?>

                        <div class="navigation">
                            <div class="alignleft">
                                <?php next_posts_link('&laquo; Previous Entries') ?>
                            </div>
                            <div class="alignright">
                                <?php previous_posts_link('Next Entries &raquo;') ?>
                            </div>
                        </div>
                        <?php while ($loop->have_posts()) : $loop->the_post(); ?>
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
get_footer();
?>