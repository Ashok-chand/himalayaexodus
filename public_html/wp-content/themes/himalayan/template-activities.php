<?php
/*
  Template Name: Activities
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
                    <div class="about_text">
                        <blockquote>"<?php echo get_post_meta(get_the_ID(), 'Blockquote', TRUE); ?>”</blockquote>
                    </div>
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
            <ul class="tour_wrap">
                <?php
                $categories = get_terms(
                        'category', array('parent' => 32)
                );

                foreach ($categories as $cat) {

                    $pid = $cat->term_id;
                    $subcategories = get_terms(
                            'category', array('parent' => $pid)
                    );
                    foreach ($subcategories as $subcat) {

                        if ($subcat->name == "Activities") {

                            $spid = $subcat->term_id;
                            $ssubcategories = get_terms(
                                    'category', array('parent' => $spid)
                            );
                            foreach ($ssubcategories as $ssubcat) {
                                //echo '<pre>'.print_r($ssubcategories). '</pre>';
                                ?>

                                <li>

                                    <div class="col-lg-7 col-md-7 col-sm-7  tour_image">
                                        <div class="image_full">
                                            <h2 class="activity_country"> <?php echo $cat->name; ?> </h2>
                                            <?php
                                            $terms = apply_filters('taxonomy-images-get-terms', '');

                                            if (!empty($terms)) {

                                                foreach ((array) $terms as $term) {
                                                    if ($term->term_id == $ssubcat->term_id) {
                                                        print wp_get_attachment_image($term->image_id, full);
                                                    }
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-5  tour_content">
                                        <div class="tour_body">

                                            <h2> <?php echo $ssubcat->name; ?> </h2>
                                            <p>    <?php
                                                $text = $ssubcat->description;
                                                echo wp_trim_words($text, $num_words = 40, $more = '… ');
                                                ?>
                                            </p>
                                            <div class="wrap_more"><a class="read" href="<?php echo get_category_link($ssubcat->term_id); ?>">+ Information</a></div>
                                        </div>
                                    </div>
                                </li>
                                <?php
                            }
                        }
                    }
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