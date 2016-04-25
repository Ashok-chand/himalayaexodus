<?php
get_header();
global $post;
?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-1.11.3.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/parallax.js"></script>
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
                    <h1>
                        <?php the_title(); ?>
                    </h1>
                </div>
            </div>
        </div>



    </div>
</section>

<!-- inner title wrapper end --> 
<!-- start inner slider banner -->
<section class="inner_slider_wrap">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 ">
                <div class="trek_detail">
                    <ul>
                        <li><span class="left_text">Customer Review </span><span class="review level level<?php echo get_post_meta(get_the_ID(), 'tripfacts_review', TRUE); ?>"><?php echo get_post_meta(get_the_ID(), 'tripfacts_review', TRUE); ?></span></li>
                        <?php if (get_post_meta(get_the_ID(), 'tripfacts_grade', TRUE)) { ?>
                            <li><span class="left_text">Trip Grade</span> <span class="grade grade<?php echo get_post_meta(get_the_ID(), 'tripfacts_grade', TRUE); ?> "><?php echo get_post_meta(get_the_ID(), 'tripfacts_grade', TRUE); ?> </span><span class="text1">[ <?php echo get_post_meta(get_the_ID(), 'tripfacts_grade1', TRUE); ?> ]</span></li>
                        <?php } ?>
                        <?php if (get_post_meta(get_the_ID(), 'tripfacts_altitude', TRUE)) { ?>
                            <li class="altitude">Max Altitude <span><?php echo get_post_meta(get_the_ID(), 'tripfacts_altitude', TRUE); ?> </span></li>
                        <?php } ?>    
                        <li class="trip_type">
                            <div class="left_trip_type"><span class="trip_tite">Trip Type </span><span class="trip_ty"><?php echo get_post_meta(get_the_ID(), 'tripfacts_trip', TRUE); ?></span></div>
                            <span class="day">
                                <?php
                                $dayy = get_post_meta(get_the_ID(), 'tripfacts_trip_day', TRUE);
                                if ($dayy) {
                                    echo $dayy;
                                } else {
                                    echo '00';
                                }
                                ?>
                                days</span></li>
                        <li class="last_block">
                            <h1><?php echo get_post_meta(get_the_ID(), 'tripfacts_trip_day', TRUE); ?> days incl. flights</h1>
                            <p>(show price excl. flights)</p>
                            <p>From <span>$<?php echo get_post_meta(get_the_ID(), 'tripfacts_price_exclflight', TRUE); ?></span></p>
                            <!--<div> <a class="date_price" href="">Dates & Prices</a> </div>-->
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel"> 
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <?php
                        $imgslider = get_post_meta(get_the_ID(), 'repeatable_info_five_slider', TRUE);
//print_r( $imgslider );
                        $i = 0;
                        $to = count($imgslider);
                        if ($to > 1) {
                            for ($i = 0; $i < $to; $i++) {
                                ?>
                                <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i; ?>" class=""></li>
                                <?php
                            }
                        }
                        ?>

                    </ol>

                    <!-- Wrapper for slides  -->
                    <div class="carousel-inner" role="listbox">
                        <?php
                        $imgslider = get_post_meta(get_the_ID(), 'repeatable_info_five_slider', TRUE);
//print_r( $imgslider );
//count($imgslider);
                        if ($imgslider) {
                            foreach ($imgslider as $imgr) {
                                if ($imgr) {
                                    ?>
                                    <div class="item"> <img src="<?php echo $image_urll = wp_get_attachment_url($imgr); ?>"  /> </div>
                                <?php } else {
                                    ?>
                                    <div class="full-img">
                                        <?php
                                        the_post_thumbnail("full");
                                        ?>
                                    </div>
                                    <?php
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End inner slider banner --> 
<!-- Start inner content -->
<div class="book_trip_wrap menu"> <a class="book_trip" href="" data-target="#myModal" data-toggle="modal">Book Now</a> </div>

<section class="inner_content hidden-sm hidden-xs">
    <div class="container">
        <div class="row">
            <div id="verticalTab">
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="side_menu1">
                        <nav id="primary">
                            <ul>
                                <li><a href="#itinerary" class="itinerary">Itinerary & Map</a></li>
                                <li><a href="#glance" class="glance">At a glance</a></li>
                                <li><a href="#accomodation_detail" class="accomodation_detail">Accomodation Details</a></li>
                                <li><a href="#facts" class="facts">Trip Facts</a></li>
                                <li><a href="#gallery" class="gallery">Gallery</a></li>
                                <li><a href="#videos" class="videos">Videos</a></li>
                                <li><a href="#reviews" class="reviews">Reviews</a></li>
                                <li><a href="#faqs" class="faqs">FAQs</a></li>  
                                <li><a href="#useful_info" class="useful_info">Useful Info</a></li>
                                <li><a href="#equipments" class="equipments">Equipments</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9">
                    <div class="dash_bar"></div>
                    <div class="mid_content">
                        <div>
                            <article id="itinerary">
                                <h1>Outline Itinerary</h1>
                                <div class="col-md-7 col-sm-7 no_left_padding">
                                    <div id="accordion">
                                        <?php
                                        $repeated = get_post_meta(get_the_ID(), 'repeatable_info_itinerary', TRUE);
//print_r( array_values( $repeated ));

                                        if ($repeated) {
                                            $i = 1;
                                            foreach ($repeated as $re) {
                                                if ($re[0]) {
                                                    ?>
                                                    <h3><span class="days_count"><?php echo $i; ?></span>Day <?php echo $i; ?><br />
                                                        <p class="header_text"><?php echo $re[0]; ?></p>
                                                    </h3>
                                                    <div>
                                                        <p><?php echo $re[1]; ?></p>
                                                    </div>
                                                    <?php
                                                } else {
                                                    echo 'Content Not Found';
                                                }
                                                $i++;
                                            }
                                        } else {
                                            echo 'Content Not Found';
                                        }
                                        ?>
                                    </div>
                                    <?php
                                    echo get_post_meta(get_the_ID(), 'repeatable_info_note', TRUE);
                                    ?>
                                </div>
                                <div class="col-md-5 col-sm-5 no_right_padding">
                                    <div class="map">  
                                        <?php
                                        $map_location = get_post_meta(get_the_ID(), 'repeatable_info_six_image', true);
                                        $map_location_url = wp_get_attachment_url($map_location);
                                        if ($map_location_url) {
                                            echo "<img src='$map_location_url'>";
                                        } else {
                                            ?>
                                            <img src="<?php bloginfo('template_url'); ?>/images/mapnot.jpg">
                                        <?php }
                                        ?> 
                                    </div>

                                    <div class="photos_list">
                                        <h2>Photos of the Trip</h2>
                                        <ul>
                                            <?php
                                            $imgrepeate = get_post_meta(get_the_ID(), 'repeatable_info_three_imgrepeatablee', TRUE);
//print_r( $imgrepeate );


                                            if ($imgrepeate) {
                                                $i = 1;
                                                foreach ($imgrepeate as $imgre) {
                                                    if ($imgre) {
                                                        if ($i == 5)
                                                            break;
                                                        ?>
                                                        <li> <a  class="fancy" data-fancybox-group="gal" href=" <?php echo $image_url = wp_get_attachment_url($imgre); ?>"> <?php echo $image_url = wp_get_attachment_image($imgre); ?>
                                                                <div class="over"></div>
                                                                <span> <i class="fa fa-search"></i> </span> </a> </li>
                                                        <?php
                                                        $i++;
                                                    }else {
                                                        echo 'Image Not Found';
                                                    }
                                                }
                                            }
                                            ?>
                                        </ul>
                                        <div> <a class="image_view" href="#gallery">View all images</a> </div>
                                    </div>
                                    <div class="single_description">
                                        <h2>Description</h2>
                                        <?php
                                        if (have_posts()) :
                                            while (have_posts()) : the_post();
                                                ?>
                                                <?php the_content(); ?>
                                                <?php
                                            endwhile;
                                        else :
                                            echo wpautop('Sorry, no posts were found');
                                        endif;
                                        ?>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div>
                            <article id="glance">
                                <h1>At a glance</h1>
                                <?php if (get_post_meta(get_the_ID(), 'team_info_glance_left', TRUE)) { ?>
                                    <div class="col-lg-6 col-md-6 col-sm-6 no_left_padding"> <?php echo get_post_meta(get_the_ID(), 'team_info_glance_left', TRUE); ?> </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 no_right_padding"> <?php echo get_post_meta(get_the_ID(), 'team_info_glance_right', TRUE); ?> </div>
                                    <?php
                                } else {
                                    echo 'No Content Found';
                                }
                                ?>
                            </article>
                        </div>
                        <div>
                            <article id="accomodation_detail">
                                <div class="accomodation">
                                    <h1>Accomodation Details</h1>
                                    <?php
                                    $features_field = get_post_meta(get_the_ID(), 'team_info_two_image', true);
                                    $features_field_url = wp_get_attachment_url($features_field);
                                    if ($features_field_url) {
                                        echo "<img src='$features_field_url'>";
                                    }
                                    ?>
                                    <?php
                                    if (get_post_meta(get_the_ID(), 'team_info_two_accomodation', TRUE)) {
                                        echo get_post_meta(get_the_ID(), 'team_info_two_accomodation', TRUE);
                                    } else {
                                        echo 'Content Not Found';
                                    }
                                    ?>
                                </div>
                            </article>
                        </div>
                        <div>
                            <article id="facts">
                                <h1>Trip Facts</h1>
                                <div class="col-lg-6 col-md-6 col-sm-6 no_left_padding"> <?php echo get_post_meta(get_the_ID(), 'team_info_three_trip_facts_left', TRUE); ?> </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 no_right_padding"> <?php echo get_post_meta(get_the_ID(), 'team_info_three_trip_facts_right', TRUE); ?> </div>
                            </article>
                        </div>
                        <div>
                            <article id="gallery">
                                <h1>Gallery</h1>
                                <div class="inner_gallery">
                                    <ul>
                                        <?php // echo do_shortcode('[wpsgallery limit="3"]');      ?>
                                        <?php
                                        $imgrepeate = get_post_meta(get_the_ID(), 'repeatable_info_three_imgrepeatablee', TRUE);
//print_r( $imgrepeate );


                                        if ($imgrepeate) {

                                            foreach ($imgrepeate as $imgre) {
                                                if ($imgre) {
                                                    ?>
                                                    <li> <a class="fancy" data-fancybox-group="gal" href=" <?php echo $image_url = wp_get_attachment_url($imgre); ?>"> <?php echo $image_url = wp_get_attachment_image($imgre); ?>
                                                            <div class="over"></div>
                                                            <span> <i class="fa fa-search"></i> </span> </a> </li>
                                                    <?php
                                                } else {
                                                    echo 'Image Not Found';
                                                }
                                            }
                                        } else {
                                            echo 'Image Not Found';
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </article>
                        </div>
                        <div>
                            <article id="videos">
                                <h1>Videos</h1>
                                <ul class="video_wrap">
                                    <?php
                                    $re_video = get_post_meta(get_the_ID(), 'repeatable_info_four_video', TRUE);
//print_r( array_values( $re_video ));

                                    if ($re_video) {
                                        $i = 1;
                                        foreach ($re_video as $result) {
                                            $to_vidoe = count($re_video);
                                            if ($result) {
                                                ?>
                                                <li>
                                                    <div class="video_content">
                                                        <div id="myElement<?php echo $i; ?>">Loading the player...</div>
                                                        <script type="text/javascript">
                                                            jwplayer("myElement<?php echo $i; ?>").setup({
                                                                file: "<?php echo $result; ?>",
                                                                height: 265,
                                                                width: 410,
                                                            });

                                                            jwplayer("myElement<?php echo $i; ?>").onError(function (event) {
                                                                setTimeout(function ()
                                                                {
                                                                    jwplayer("myElement<?php echo $i; ?>").play(true);
                                                                }, 2000);
                                                            }
                                                            );
                                                        </script> 
                                                    </div>
                                                </li>
                                                <?php
                                                $i++;
                                            } else {
                                                echo 'Video Not Found';
                                            }
                                        }
                                    } else {
                                        echo 'Video Not Found';
                                    }
                                    ?>

                                </ul>
                            </article>
                        </div>
                        <div>
                            <article id="reviews">
                                <h1>Reviews & community</h1>
                                <div class="review_wrap">
                                    <ul>
                                        <?php
                                        $page_slug = $post->post_name;

                                        query_posts(array('post_type' => 'ourtestimonials', 'meta_key' => 'testimonial_posttitle', 'meta_value' => $page_slug, 'posts_per_page' => '10'));
                                        while (have_posts()) : the_post();
                                            ?>
                                            <li>
                                                <div class="reviewser"> 
                                                    <?php if (has_post_thumbnail()) {
                                                        ?>

                                                        <?php echo the_post_thumbnail('daynews-thumb'); ?>

                                                    <?php } else {
                                                        ?>
                                                        <img src="<?php bloginfo(template_url); ?>/images/review.jpg" />
                                                        <?php
                                                    }
                                                    ?>

                                                    <div class="review_name"><span><strong>-</strong> <?php echo get_post_meta(get_the_ID(), 'testimonial_name', TRUE); ?></span></div>
                                                    <div class="review_address"><?php echo get_post_meta(get_the_ID(), 'testimonial_addre', TRUE); ?></div>
                                                </div>
                                                <div class="review_content">
                                                    <div class="review_star"><span class="review level level<?php echo get_post_meta(get_the_ID(), 'testimonial_review', TRUE); ?>">level<?php echo get_post_meta(get_the_ID(), 'testimonial_review', TRUE); ?></span><span class="written_date"><?php the_time('F j, Y'); ?></span></div>
                                                    <h2><?php the_title(); ?></h2>
                                                    <?php the_content(); ?>
                                                </div>
                                            </li>
                                        <?php endwhile; ?>
                                    </ul>
                                </div>
                                <div> <a class="give_reviews" href="" data-target="#myModal1" data-toggle="modal">Give Your Review</a> </div>
                            </article>
                        </div>
                        <div>
                            <article id="faqs">
                                <h1>FAQs</h1>
                                <div id="accordion1">
                                    <?php wp_reset_query(); ?>
                                    <?php
                                    $fa = get_post_meta(get_the_ID(), 'repeatable_info_two_faqs', TRUE);
//print_r( array_values( $fa ));
                                    if ($fa) {
                                        $i = 1;
                                        foreach ($fa as $fq) {
                                            if ($fq[0]) {
                                                ?>
                                                <h3><span class="days_count"><?php echo $i; ?></span><?php echo $fq[0]; ?></h3>
                                                <div>
                                                    <p><?php echo $fq[1]; ?></p>
                                                </div>
                                                <?php
                                                $i++;
                                            } else {
                                                echo 'Content Not Found';
                                            }
                                        }
                                    } else {
                                        echo 'Content Not Found';
                                    }
                                    ?>
                                </div>
                            </article>
                        </div>
                        <div>
                            <article id="date_price1">

                            </article>
                        </div>
                        <div>
                            <article id="useful_info">
                                <h1>Useful Info</h1>
                                <?php wp_reset_query(); ?>
                                <?php
                                if (get_post_meta(get_the_ID(), 'team_info_four_useful_info', TRUE)) {
                                    echo get_post_meta(get_the_ID(), 'team_info_four_useful_info', TRUE);
                                } else {
                                    echo 'Content Not Found';
                                }
                                ?>
                            </article>
                        </div>
                        <div>
                            <article id="equipments">
                                <h1>Equipment</h1>
                                <?php wp_reset_query(); ?>
                                <?php
                                if (get_post_meta(get_the_ID(), 'team_info_five_equipments', TRUE)) {
                                    echo get_post_meta(get_the_ID(), 'team_info_five_equipments', TRUE);
                                } else {
                                    echo 'Content Not Found';
                                }
                                ?>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<!-- for small screen devices -->
<?php wp_reset_query(); ?>
<section class="inner_content small_screen hidden-lg hidden-md">
    <div class="container">

        <div class="mid_content">
            <div>
                <article id="itinerary">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1>Outline Itinerary</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7 col-sm-7 no_left_padding">
                            <div id="accordion2">
                                <?php wp_reset_query(); ?>
                                <?php
                                $repeated = get_post_meta(get_the_ID(), 'repeatable_info_itinerary', TRUE);
//print_r( array_values( $repeated ));

                                if ($repeated) {
                                    $i = 1;
                                    foreach ($repeated as $re) {
                                        if ($re[0]) {
                                            ?>
                                            <h3><span class="days_count"><?php echo $i; ?></span>Day <?php echo $i; ?><br />
                                                <p class="header_text"><?php echo $re[0]; ?></p>
                                            </h3>
                                            <div>
                                                <p><?php echo $re[1]; ?></p>
                                            </div>
                                            <?php
                                        } else {
                                            echo 'Content Not Found';
                                        }
                                        $i++;
                                    }
                                }
                                ?>
                            </div>
                            <?php
                            echo get_post_meta(get_the_ID(), 'repeatable_info_note', TRUE);
                            ?>
                        </div>
                        <div class="col-md-5 col-sm-5 no_right_padding">
                            <div class="map">  
                                <?php wp_reset_query(); ?>
                                <?php
                                $map_location = get_post_meta(get_the_ID(), 'repeatable_info_six_image', true);
                                $map_location_url = wp_get_attachment_url($map_location);
                                if ($map_location_url) {
                                    echo "<img src='$map_location_url'>";
                                } else {
                                    ?>
                                    <img src="<?php bloginfo('template_url'); ?>/images/mapnot.jpg">
                                <?php }
                                ?> 
                            </div>

                            <div class="photos_list">
                                <h2>Photos of the Trip</h2>
                                <ul>
                                    <?php wp_reset_query(); ?>
                                    <?php
                                    $imgrepeate = get_post_meta(get_the_ID(), 'repeatable_info_three_imgrepeatablee', TRUE);
//print_r( $imgrepeate );


                                    if ($imgrepeate) {
                                        $i = 1;
                                        foreach ($imgrepeate as $imgre) {
                                            if ($imgre) {
                                                if ($i == 5)
                                                    break;
                                                ?>
                                                <li> <a  class="fancy" data-fancybox-group="gal" href=" <?php echo $image_url = wp_get_attachment_url($imgre); ?>"> <?php echo $image_url = wp_get_attachment_image($imgre); ?>
                                                        <div class="over"></div>
                                                        <span> <i class="fa fa-search"></i> </span> </a> </li>
                                                <?php
                                                $i++;
                                            }else {
                                                echo 'Image Not Found';
                                            }
                                        }
                                    }
                                    ?>
                                </ul>
                                <div> <a class="image_view" href="#gallery">View all images</a> </div>
                            </div>
                            <div class="single_description">
                                <h2>Description</h2>
                                <?php
                                if (have_posts()) :
                                    while (have_posts()) : the_post();
                                        ?>
                                        <?php the_content(); ?>
                                        <?php
                                    endwhile;
                                else :
                                    echo wpautop('Sorry, no posts were found');
                                endif;
                                ?>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
            <div>
                <article id="glance">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1>At a glance</h1>
                        </div>
                    </div>
                    <div class="row">
                        <?php wp_reset_query(); ?>

                        <?php if (get_post_meta(get_the_ID(), 'team_info_glance_left', TRUE)) { ?>
                            <div class="col-lg-6 col-md-6 col-sm-6 no_left_padding"> <?php echo get_post_meta(get_the_ID(), 'team_info_glance_left', TRUE); ?> </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 no_right_padding"> <?php echo get_post_meta(get_the_ID(), 'team_info_glance_right', TRUE); ?> </div>
                        <?php } else {
                            ?>
                            <div class="col-lg-12">Content Not Found</div>
                            <?php
                        }
                        ?>
                    </div>
                </article>
            </div>
            <div>
                <article id="accomodation_detail">
                    <div class="accomodation">
                        <div class="row">
                            <div class="col-lg-12">
                                <h1>Accomodation Details</h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <?php wp_reset_query(); ?>
                                <?php
                                $features_field = get_post_meta(get_the_ID(), 'team_info_two_image', true);
                                $features_field_url = wp_get_attachment_url($features_field);
                                if ($features_field_url) {
                                    echo "<img src='$features_field_url'>";
                                }
                                ?>
                                <?php
                                if (get_post_meta(get_the_ID(), 'team_info_two_accomodation', TRUE)) {
                                    echo get_post_meta(get_the_ID(), 'team_info_two_accomodation', TRUE);
                                } else {
                                    echo 'Content Not Found';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
            <div>
                <article id="facts">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1>Trip Facts</h1>
                        </div>
                    </div>
                    <div class="row">
                        <?php wp_reset_query(); ?>
                        <?php $trip_left = get_post_meta(get_the_ID(), 'team_info_three_trip_facts_left', TRUE); ?>
                        <?php if ($trip_left) { ?>
                            <div class="col-lg-6 col-md-6 col-sm-6 no_left_padding"> <?php echo $trip_left; ?> </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 no_right_padding"> <?php echo get_post_meta(get_the_ID(), 'team_info_three_trip_facts_right', TRUE); ?> </div>
                            <?php
                        } else {
                            ?>
                            <div class="col-lg-12">Content Not Found</div>
                            <?php
                        }
                        ?>
                    </div>
                </article>
            </div>
            <div>
                <article id="gallery">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1>Gallery</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="inner_gallery">
                                <ul>
                                    <?php wp_reset_query(); ?>
                                    
                                    <?php
                                    $imgrepeate = get_post_meta(get_the_ID(), 'repeatable_info_three_imgrepeatablee', TRUE);
//print_r( $imgrepeate );


                                    if ($imgrepeate) {

                                        foreach ($imgrepeate as $imgre) {
                                            if ($imgre) {
                                                ?>
                                                <li> <a class="fancy" data-fancybox-group="gal" href=" <?php echo $image_url = wp_get_attachment_url($imgre); ?>"> <?php echo $image_url = wp_get_attachment_image($imgre); ?>
                                                        <div class="over"></div>
                                                        <span> <i class="fa fa-search"></i> </span> </a> </li>
                                                <?php
                                            } else {
                                                echo 'Image Not Found';
                                            }
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
            <div>
                <article id="videos">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1>Videos</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="video_wrap">
                                <?php wp_reset_query(); ?>
                                <?php
                                $re_video = get_post_meta(get_the_ID(), 'repeatable_info_four_video', TRUE);
//print_r( array_values( $re_video ));

                                if ($re_video) {
                                    $i = 1;
                                    foreach ($re_video as $result) {
                                        $to_vidoe = count($re_video);
                                        if ($result) {
                                            ?>
                                            <li>
                                                <div class="video_content">
                                                    <div id="myElement<?php echo $i; ?>">Loading the player...</div>
                                                    <script type="text/javascript">
                                                        jwplayer("myElement<?php echo $i; ?>").setup({
                                                            file: "<?php echo $result; ?>",
                                                            height: 265,
                                                            width: 410,
                                                        });

                                                        jwplayer("myElement<?php echo $i; ?>").onError(function (event) {
                                                            setTimeout(function ()
                                                            {
                                                                jwplayer("myElement<?php echo $i; ?>").play(true);
                                                            }, 2000);
                                                        }
                                                        );
                                                    </script> 
                                                </div>
                                            </li>
                                            <?php
                                            $i++;
                                        } else {
                                            echo 'Video Not Found';
                                        }
                                    }
                                }
                                ?>

                            </ul>
                        </div>
                    </div>
                </article>
            </div>
            <div>
                <article id="reviews">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1>Reviews & community</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="review_wrap">
                                <ul>
                                    <?php wp_reset_query(); ?>
                                    <?php
                                    query_posts(array('post_type' => 'ourtestimonials', 'posts_per_page' => '10'));
                                    while (have_posts()) : the_post();
                                        ?>
                                        <li>
                                            <div class="reviewser"> 
                                                <?php if (has_post_thumbnail()) {
                                                    ?>

                                                    <?php echo the_post_thumbnail('daynews-thumb'); ?>

                                                <?php } else {
                                                    ?>
                                                    <img src="<?php bloginfo(template_url); ?>/images/review.jpg" />
                                                    <?php
                                                }
                                                ?>

                                                <div class="review_name"><span><strong>-</strong> <?php echo get_post_meta(get_the_ID(), 'testimonial_name', TRUE); ?></span></div>
                                                <div class="review_address"><?php echo get_post_meta(get_the_ID(), 'testimonial_addre', TRUE); ?></div>
                                            </div>
                                            <div class="review_content">
                                                <div class="review_star"><span class="review level level<?php echo get_post_meta(get_the_ID(), 'testimonial_review', TRUE); ?>">level<?php echo get_post_meta(get_the_ID(), 'testimonial_review', TRUE); ?></span><span class="written_date"><?php the_time('F j, Y'); ?></span></div>
                                                <h2><?php the_title(); ?></h2>
                                                <?php the_content(); ?>
                                            </div>
                                        </li>
                                    <?php endwhile; ?>
                                </ul>
                            </div>
                            <div> <a class="give_reviews" href="" data-target="#myModal1" data-toggle="modal">Give Your Review</a> </div>
                        </div>
                    </div>
                </article>
            </div>
            <div>
                <article id="faqs">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1>FAQs</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div id="accordion3">
                                <?php wp_reset_query(); ?>
                                <?php
                                $fa = get_post_meta(get_the_ID(), 'repeatable_info_two_faqs', TRUE);
//print_r( array_values( $fa ));

                                if ($fa) {
                                    $i = 1;
                                    foreach ($fa as $fq) {
                                        if ($fq[0]) {
                                            ?>
                                            <h3><span class="days_count"><?php echo $i; ?></span><?php echo $fq[0]; ?></h3>
                                            <div>
                                                <p><?php echo $fq[1]; ?></p>
                                            </div>
                                            <?php
                                            $i++;
                                        } else {
                                            echo 'Content Not Found';
                                        }
                                    }
                                } else {
                                    echo 'Content Not Found';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
            <div>
                <article id="date_price1">

                </article>
            </div>
            <div>
                <article id="useful_info">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1>Useful Info</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <?php wp_reset_query(); ?>
                            <?php
                            if (get_post_meta(get_the_ID(), 'team_info_four_useful_info', TRUE)) {
                                echo get_post_meta(get_the_ID(), 'team_info_four_useful_info', TRUE);
                            } else {
                                echo 'Content Not Found';
                            }
                            ?>
                        </div>
                    </div>
                </article>
            </div>
            <div>
                <article id="equipments">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1>Equipment</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <?php wp_reset_query(); ?>
                            <?php
                            if (get_post_meta(get_the_ID(), 'team_info_five_equipments', TRUE)) {
                                echo get_post_meta(get_the_ID(), 'team_info_five_equipments', TRUE);
                            } else {
                                echo 'Content Not Found';
                            }
                            ?>
                        </div>
                    </div>
                </article>
            </div>
        </div>

    </div>
</div>
</section>
<!-- End Inner content -->
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
<div id="myModal1" class="modal fade form_model" role="dialog">
    <div class="modal-dialog"> 

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Give Your Review</h4>
            </div>
            <div class="modal-body">

                <form method="post" action="" enctype="multipart/form-data" id="reviewForm" name="reviewForm">
                    <div class="form-group row">
                        <label for="title" class="col-sm-3 form-control-label">Title</label>
                        <div class="col-sm-9">
                            <input type="text"  class="form-control required" placeholder="Title" id="title" name="title" value="" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-sm-3 form-control-label">Description </label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fullname" class="col-sm-3 form-control-label">Full Name</label>
                        <div class="col-sm-9">
                            <input type="text"  class="form-control" placeholder="Full Name" name="name" value="" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fullname" class="col-sm-3 form-control-label">Address</label>
                        <div class="col-sm-9">
                            <input type="text"  class="form-control" placeholder="Address" name="address" value="" />
                        </div>
                    </div>

                    <div class="form-group row">     
                        <label class="col-sm-3">Review</label>
                        <div class="col-sm-9">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="review" value="1" checked>
                                    One
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="review" value="2">
                                    Two
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="review" value="3">
                                    Three
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="review" value="4">
                                    Four
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="review" value="5">
                                    Five
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="feature_image" class="col-sm-3 form-control-label">Feature Image</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control-file"  name="feature_image" id="feature_image">
                            <small class="text-muted">This is the feature image to display.</small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-offset-3 col-sm-9">
                            <input  type="submit" class="btn btn-info" name="submit" value="submit"/>
                        </div>
                    </div>
                </form>


            </div>

        </div>
    </div>
</div>

<?php
if (isset($_POST['submit']) && !empty($_POST['submit'])) {

    $title = $_POST['title'];
    $description = $_POST['description'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $review = $_POST['review'];
    $post_slug = $post->post_name;

    $post_id = wp_insert_post(array(
        'post_status' => 'pending',
        'post_type' => 'post',
        'post_title' => $title,
        'post_content' => $description
    ));


    $post_type = 'ourtestimonials';

    $query = "UPDATE {$wpdb->prefix}posts SET post_type='" . $post_type . "' WHERE id='" . $post_id . "' LIMIT 1";

    GLOBAL $wpdb;

    $wpdb->query($query);
    if ($_FILES) {
        array_reverse($_FILES);
        $i = 0; //this will count the posts
        foreach ($_FILES as $file => $array) {
            if ($i == 0)
                $set_feature = 1; //if $i ==0 then we are dealing with the first post
            else
                $set_feature = 0; //if $i!=0 we are not dealing with the first post
            $newupload = insert_attachment($file, $post_id, $set_feature);
            echo $i++; //count posts
        }
    }

    if (isset($name) && !empty($name)) {
        $namequery = "INSERT into {$wpdb->prefix}postmeta (post_id, meta_key, meta_value) VALUES ('" . $post_id . "', 'testimonial_name', '" . $name . "')";

        $wpdb->query($namequery);
    }
    if (isset($address) && !empty($address)) {
        $addressquery = "INSERT into {$wpdb->prefix}postmeta (post_id, meta_key, meta_value) VALUES ('" . $post_id . "', 'testimonial_addre', '" . $address . "')";
        $wpdb->query($addressquery);
    }
    if (isset($review)) {
        $reviewquery = "INSERT into {$wpdb->prefix}postmeta (post_id, meta_key, meta_value) VALUES ('" . $post_id . "', 'testimonial_review', '" . $review . "')";
        $wpdb->query($reviewquery);
    }
    if (isset($post_slug)) {
        $reviewquery = "INSERT into {$wpdb->prefix}postmeta (post_id, meta_key, meta_value) VALUES ('" . $post_id . "', 'testimonial_posttitle', '" . $post_slug . "')";
        $wpdb->query($reviewquery);
    }

    header('Location:' . $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING']);
    die;
}
?>

<?php
get_footer();
?>
