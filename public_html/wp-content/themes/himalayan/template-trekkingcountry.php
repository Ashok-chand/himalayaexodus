<?php
/*
  Template Name: Trekking Country
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
    <!-- #container -->

    <div class="container">
        <div class="row">
            <ul class="trekking_wrap">
                <?php
                $categories = get_terms(
                        'category', array('parent' => 32)
                );

                foreach ($categories as $cat) {
                    ?>
                    <div class="col-lg-12">
                        <h2> <?php echo $cat->name; ?> </h2>
                    </div>
                    <?php
                    $pid = $cat->term_id;
                    $subcategories = get_terms(
                            'category', array('parent' => $pid)
                    );
                    foreach ($subcategories as $subcat) {

                        if ($subcat->name == "Trekking") {

                            $spid = $subcat->term_id;
                            $ssubcategories = get_terms(
                                    'category', array('parent' => $spid)
                            );
                            foreach ($ssubcategories as $ssubcat) {
                                //echo '<pre>'.print_r($ssubcategories). '</pre>';
                                ?>
                                <li>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="trekking_content">
                                            <?php
                                            $terms = apply_filters('taxonomy-images-get-terms', '');

                                            if (!empty($terms)) {

                                                foreach ((array) $terms as $term) {
                                                    if ($term->term_id == $ssubcat->term_id) {
                                                        print wp_get_attachment_image($term->image_id, 'taxonomy-thumb');
                                                    }
                                                }
                                            }
                                            ?>
                                            <h2><a href=""> <?php echo $ssubcat->name; ?> </a></h2>

                                            <?php
                                            $text = $ssubcat->description;
                                            echo wp_trim_words($text, $num_words = 15, $more = '… ');
                                            ?>

                                            <div> <a href="<?php echo get_category_link($ssubcat->term_id); ?> " class="read">View Packages</a> </div>
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
