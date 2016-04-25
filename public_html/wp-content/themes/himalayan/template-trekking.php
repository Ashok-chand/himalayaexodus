<?php
/*
  Template Name: Trekking
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

        <ul class="trekking_wrap">
            <?php
            $categories = get_terms(
                    'category', array('parent' => 32)
            );

            foreach ($categories as $cat) {
                ?>


                <?php
                $pid = $cat->term_id;
                $subcategory1 = get_terms(
                        'category', array('parent' => $pid)
                );
                foreach ($subcategory1 as $subcat1) {

                    if ($subcat1->name == "Trekking") {

                        $subcategory2 = get_terms(
                                'category', array('parent' => $subcat1->term_id)
                        );
                        ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <h2> <?php echo $cat->name; ?> </h2>
                            </div>
                        </div>
                        <div class="row list_cat">
                            <?php
                            foreach ($subcategory2 as $subcat2) {
                                ?>
                                <li>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="trekking_content">
                                            <?php
                                            $terms = apply_filters('taxonomy-images-get-terms', '');

                                            if (!empty($terms)) {

                                                foreach ((array) $terms as $term) {
                                                    if ($term->term_id == $subcat2->term_id) {
                                                        print wp_get_attachment_image($term->image_id, 'taxonomy-thumb');
                                                    }
                                                }
                                            }
                                            ?>
                                            <h2><a href="<?php echo get_category_link($subcat2->term_id); ?>"> <?php echo $subcat2->name; ?> </a></h2>

                                            <p><?php
                                                $text = $subcat2->description;
                                                echo wp_trim_words($text, $num_words = 12, $more = '…');
                                                ?></p>

                                            <div> <a href="<?php echo get_category_link($subcat2->term_id); ?> " class="read">View Packages</a> </div>
                                        </div>
                                    </div>
                                </li>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    }
                }
            }
            ?>
        </ul>

    </div>
</section>
<!-- End Inner content -->
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-1.11.3.min.js"></script> 
<script type="text/javascript">
    $(document).ready(function () {
        $(".list_cat li:nth-child(3n)").after("<div class='cl_both'></div>");

    });

</script>
<?php
get_footer();
?>
