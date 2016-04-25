<?php
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
                        <?php if(get_post_meta(get_the_ID(), 'tripfacts_grade', TRUE)){ ?>
                        <li><span class="left_text">Trip Grade</span> <span class="grade grade<?php echo get_post_meta(get_the_ID(), 'tripfacts_grade', TRUE); ?> "><?php echo get_post_meta(get_the_ID(), 'tripfacts_grade', TRUE); ?> </span><span class="text1">[ <?php echo get_post_meta(get_the_ID(), 'tripfacts_grade1', TRUE); ?> ]</span></li>
                        <?php } ?>
                    <?php if(get_post_meta(get_the_ID(), 'tripfacts_altitude', TRUE)){ ?>
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
                                        } else {?>
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
                                        <?php // echo do_shortcode('[wpsgallery limit="3"]');   ?>
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
                                        query_posts(array('post_type' => 'ourtestimonials', 'posts_per_page' => '10'));
                                        while (have_posts()) : the_post();
                                            ?>
                                        <li>
                                            <div class="reviewser"> 
                                                <?php if (has_post_thumbnail()) {
                                                    ?>
                                                    
                                                        <?php echo the_post_thumbnail('daynews-thumb'); ?>
                                                   
                                                    <?php
                                                }else{ ?>
                                                <img src="<?php bloginfo(template_url); ?>/images/review.jpg" />
                                                <?php
                                                }
                                                ?>
                                                
                                                <div class="review_name"><span><strong>-</strong> <?php echo get_post_meta(get_the_ID(), 'testimonial_name', TRUE);  ?></span></div>
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
                                    <?php
                                    $fa = get_post_meta(get_the_ID(), 'repeatable_info_two_faqs', TRUE);
//print_r( array_values( $repeated ));

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
<section class="inner_content small_screen hidden-lg hidden-md ">
	<div class="container">
    	<div class="row">
        <div id="verticalTab">
        	<div class="col-lg-3">
            <div class="side_menu">
                	<ul class="resp-tabs-list">
                    	<li>Itinerary & Map</li>
                        <li>At a glance</li>
                        <li>Accomodation Details</li>
                        <li>Trip Facts</li>
                        <li>Gallery</li>
                        <li>Reviews</li>
                        <li>FAQs</li>
                        <li>Dates & Prices</li>
                        <li>Useful Info</li>
                        <li>Equipments</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
            <div class="dash_bar"></div>
            <div class="resp-tabs-container mid_content">
                <div class="tab_content" id="itinerary">
                <h1>Outline Itinerary</h1>
                    <div class="col-lg-7 no_left_padding">
                         <div id="accordion">
                             
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
                    <div class="col-lg-5 no_right_padding">
                         <div class="map">  
                                        <?php
                                        $map_location = get_post_meta(get_the_ID(), 'repeatable_info_six_image', true);
                                        $map_location_url = wp_get_attachment_url($map_location);
                                        if ($map_location_url) {
                                            echo "<img src='$map_location_url'>";
                                        } else {?>
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
                </div>
                <div class="tab_content" id="glance">
                <h1>At a glance</h1>
                  <div class="col-lg-6 no_left_padding">
                  		<ul>
                        <li>4 nights camping, 1 night gite with shared facilities and 2 nights 3-star hotel in en suite rooms</li>
                        <li>5 days point-to-point walking</li>
                        <li>Crampons may be needed in April and October</li>
                        <li>Altitude maximum 4167m, average 2600m</li>
                        </ul>
                        <h2>Trip Style</h2>
                        <p>Lodge to Lodge Trekking</p>
                  </div>
                  <div class="col-lg-6 no_right_padding">
                  	<h2>Trip Highlight</h2>
                    <ul>
                    <li>Sightseeing around Kathmandu and Pokhara</li>
                    <li>Impressive Sunrise and mountain views from Ghorepani and Poon Hill</li>
                    <li>Typical Gurung village along the trekking route</li>
                    <li>Fishtail (Machhapuchhre) Base Camp</li>
                    <li>Spectacular mountain and glacier views from Annapurna Base Camp</li>
                    <li>Natural  Bath in hot spring at Jhinu</li>
                    </ul> 
                    <h2>Best Season</h2>
                    	<p>February, March, April, May, June, September, October, November & December</p>
                  </div>
                </div>
                <div class="tab_content" id="accomodation" >
                <div class="accomodation">
                    <h1>Accomodation Details</h1>
                    <img src="images/campian.jpg" />
                    
                   <h2>Hotels & Camping</h2>
                        <p>On this trip you will spend 2 nights in a 3 star hotel with en suite rooms, 4 nights will be spent wild semi-participatory camping. Camp chores will be done for you but there will be limited washing facilities and no fixed toilets. On day 6 you will spend 1 night in a simple gite with showers and toilets.</p>
<p>You can request a single room on this trip subject to availability from GBP80. Please inquire upon booking for prices.</p><br />
                 </div>
                </div>
                <div class="tab_content" id="facts">
                	<h1>Trip Facts</h1>
                    <div class="col-lg-6 no_left_padding">
                    <h2>Eating & drinking</h2>
                    <p>All breakfasts, 5 lunches, 5 dinners included.<br />

Moroccan food is, generally speaking, excellent though not particularly varied. Breakfasts usually consist of bread and jam with coffee or tea. When eating out, meals are reasonably priced - kebab and bread cost only about GBP4 (approx. . USD6.50). In main towns it is possible to find very good French and Moroccan restaurants where a meal and French wine will cost anything from GBP20 (approx. . USD30) upwards. Generally dinner is likely to cost between GBP5-10 (approx. . USD8-15) depending on what you drink. GBP15 (approx. . USD25) a day for food should be sufficient. Local beers, wines and soft drinks are available at very reasonable prices but you can pay UK prices or more for imported alcohol. Your leader can help recommend restaurants each evening.
Vegetarians can be catered for but there is a fairly limited choice of cous cous and tajine or omelettes. This is particularly the case during the more rural or trekking sections of the trip.<br />
Please note that if you have any special dietary requirements you should inform the Exodus Office prior to the trip. If you have a specific medical/dietary need (i.e. coeliac or vegan) you may find it helpful to bring some items of food with you from home.
Since the EU banned the use of iodine tablets, we are no longer able to provide these on trek. The recommended alternative of Biox Aqua drops are not available in Morocco, therefore if you are travelling from UK we advise you buy your own purification tablets in the UK and take them with you. Bottled water can be purchased throughout the trip. Please note recycling is not fully established in Morocco so plastic bottles are an increasing waste problem.</p>
					<div class="box trip_note">
                	<div class="box_image">
                    	<img src="images/book.png" />
                    </div>
                    <div class="box_content">
                    	<h2>Trip notes</h2>
                        <p>Download the detailed trip notes for everything you could possibly want to know about this trip, including detailed itinerary and full kit list.  <a href="">Click here</a> to download.</p>
                    </div>
                </div>
					</div>
                    <div class="col-lg-6 no_right_padding">
                    	<h2>Holiday style</h2>
                        <p>This is a challenging yet non-technical short trek to an area of outstanding scenic and cultural interest. Although this trip is not technically difficult, you should be an experienced walker as trails can be very stony. Most routes follow mule trails but there are some rough paths that involve walking on scree. All 5 days walking include full porterage and you should be prepared for a couple of long days walking (maximum 8-9 hours). Jebel Ouanakrim requires a small amount of scrambling near the summit and is optional.<br />
The temperature at a particular time of year can make a difference to how tough this trek feels. Please note that Morocco can get very hot during the summer months of July and August and departures during this time may not be suitable if you struggle with the heat. Be prepared as well for some stormy weather during the summer. There can be snow patches in late April/early May and from the end of September so crampons may be needed for April and October departures. We will advise no more than two weeks before departure if extra equipment (such as crampons) is necessary.<br />
Altitude maximum 4167m, average 2600m.<br />
Altitude Warning - This trip goes to high altitudes where there is a risk of being affected by Acute Mountain Sickness. Please refer to the Altitude Warning below for further information.
In order to keep a circular itinerary, this holiday offers four nights camping, with two of these spent over 3000m. Please note most nights camping are in wild camps as official campsites do not exist in some of the areas we visit. On the treks we use mules to carry personal gear so only a light daypack is required, occasionally with a share of the picnic lunch. Our hotel in Marrakech is of a good standard and usually has a swimming pool to help relax after a challenging trek.
If you would like to a more strenuous ascent of Mt Toubkal, using ice axe and crampons, please check out our winter itinerary - Mt Toubkal Winter Climb (trip reference TMW).<br />

Ramadan<br />
Please note Ramadan runs from 06th June to 05th July 2016. During Ramadan, our local guides and drivers choose to work and so we continue to run trips in this period. However, it does need to be recognised that the energy levels of our local staff may be a bit lower and that some restaurants may be closed during the day. Having said this, Ramadan is a unique time to visit a Muslim country - each evening the streets empty for an hour while everyone breaks their fast, and there's a feeling of festivity in the air every night.</p>
                    </div>
                </div>
                <div class="tab_content" id="gallery">
                	<h1>Gallery</h1>
                    <div class="inner_gallery">
                    <ul>
                    	<li><a href=""><img src="images/photo1.jpg" /><div class="over"></div><span><i class="fa fa-search"></i></span></a></li>
                        <li><a href=""><img src="images/photo1.jpg" /><div class="over"></div><span><i class="fa fa-search"></i></span></a></li>
                        <li><a href=""><img src="images/photo1.jpg" /><div class="over"></div><span><i class="fa fa-search"></i></span></a></li>
                        <li><a href=""><img src="images/photo1.jpg" /><div class="over"></div><span><i class="fa fa-search"></i></span></a></li>
                        <li><a href=""><img src="images/photo1.jpg" /><div class="over"></div><span><i class="fa fa-search"></i></span></a></li>
                        <li><a href=""><img src="images/photo1.jpg" /><div class="over"></div><span><i class="fa fa-search"></i></span></a></li>
                         <li><a href=""><img src="images/photo1.jpg" /><div class="over"></div><span><i class="fa fa-search"></i></span></a></li>
                        <li><a href=""><img src="images/photo1.jpg" /><div class="over"></div><span><i class="fa fa-search"></i></span></a></li>
                        <li><a href=""><img src="images/photo1.jpg" /><div class="over"></div><span><i class="fa fa-search"></i></span></a></li>
                        <li><a href=""><img src="images/photo1.jpg" /><div class="over"></div><span><i class="fa fa-search"></i></span></a></li>
                        <li><a href=""><img src="images/photo1.jpg" /><div class="over"></div><span><i class="fa fa-search"></i></span></a></li>
                                  <li><a href=""><img src="images/photo1.jpg" /><div class="over"></div><span><i class="fa fa-search"></i></span></a></li>
                        <li><a href=""><img src="images/photo1.jpg" /><div class="over"></div><span><i class="fa fa-search"></i></span></a></li>
                        <li><a href=""><img src="images/photo1.jpg" /><div class="over"></div><span><i class="fa fa-search"></i></span></a></li>
                        <li><a href=""><img src="images/photo1.jpg" /><div class="over"></div><span><i class="fa fa-search"></i></span></a></li>
                    </ul>
                    </div>
                </div>
                <div class="tab_content" id="reviews">
                	<h1>Reviews & community</h1>
                    <div class="review_wrap">
                    	<ul>
                        	<li>
                            <div class="reviewser">
                            	<img src="images/review.jpg" />
                                <div class="review_name"><span><strong>-</strong> Sarah Saunders</span></div>
                            </div>
                            <div class="review_content">
                            	<div class="review_star"><span class="review level level4">level4</span><span class="written_date">Oct 2015</span></div>
                                <h2>Fantastic experience!</h2>
                            	<p>An amazing trip with a fantastic bunch of people. When we got within metres of the summit - the entire group waited and we all summited together! True team spirit all the way. It was sad to all leave each other.<br />Fantastic Hassan kept us all organised, was a mind of fascinating information and really good fun. Lovely guy.</p>
                            </div>
                            </li>
                            <li>
                            <div class="reviewser">
                            	<img src="images/review.jpg" />
                                <div class="review_name"><span><strong>-</strong> Alison Gospel</span></div>
                            </div>
                            <div class="review_content">
                            	<div class="review_star"><span class="review level level3">level3</span><span class="written_date">Sep 2015</span></div>
                                <h2>Mount Toubkal</h2>
                            	<p>Generally the week was good, marred by the shortage of guides and the poor organisation on the first night on the mountain when our tents arrived after we… did. This meant all the mattresses and bags getting wet, and us all standing in the rain. Also we had no toilet at all the first night despite being right outside a village where children would play. The toilet facilities for the other nights were very poor (a very shallow or non existent hole in ground with a tent on top). Food was good, the people friendly, and the mules lovely.</p>
                            </div>
                            </li>
                        </ul>
                    </div>
                    <div>
                    	<a class="give_reviews" href="" data-target="#myModal1" data-toggle="modal">Give Your Review</a>
                    </div>
                </div>
                <div class="tab_content" id="faqs">
                	<h1>FAQs</h1>
                    <div class="according_wrap">
                    <div class="accordion-container">
		<a href="#" class="accordion-toggle"><span class="days_count">1</span><h3>What type of shape do I need to be in, is this trip for me?</h3><span class="toggle-icon"><i class="fa fa-caret-right"></i></span>
        </a>
		<div class="accordion-content">
		<p>Annapurna base camp trek is suitable for average people who are moderately fit, thus no previous experience is required. Some physical fitness programs such as running, swimming, hiking is recommended before you embark on your journey. Persons suffering from a pre-existing medical condition must seek medical advice/consent before considering the trek. Whilst on the trek, it is common to experience some discomfort before being fully acclimatized. To prepare for trek you should begin training at least two to three months before your departure. As a guideline, an hour of aerobic exercise three to four times per week would be considered a minimum requirement. The best preparation is bushwalking involving relatively steep ascents and descents. If you can manage a couple of valley floor to ridgeline ascents per comfortable and able to enjoy the trek to the fullest. They are physically strong, sharp-witted and have an incredibly positive attitude towards a life that we would consider extremely tough. There is something about a trek in the Himalaya that draws you back time and time again. For keen walkers it is a paradise and even avowed non-walkers find that one foot just seems to follow the other, drawn by the appeal of what lies beyond.</p>
		</div>
		<!--/.accordion-content-->
	</div>
                    <!--/.accordion-container-->
                    <div class="accordion-container">
		<a href="#" class="accordion-toggle"><span class="days_count">2</span><h3>Will somebody come to pick me up at the airport upon my arrival?</h3><span class="toggle-icon"><i class="fa fa-caret-right"></i></span>
        </a>
		<div class="accordion-content">
		<p>Yes, our airport representative will be there to greet you at the airport. She/he will be displaying an Himalayan Exodus sign board outside the airport terminal. Upon arrival, you will be transferred to your hotel by our tourist vehicle.</p>
		</div>
	</div>
                    <!--/.accordion-container-->
                    <div class="accordion-container">
		<a href="#" class="accordion-toggle"><span class="days_count">3</span><h3>What sort of accommodation can I expect in Kathmandu, pokhara and in trekking?</h3><span class="toggle-icon"><i class="fa fa-caret-right"></i></span>
        </a>
		<div class="accordion-content">
		<p>We use standard rooms at three star hotels in Kathmandu and Pokhara  with breakfast included. Along the trekking routes, teahouses/lodges generally provide basic clean facilities with a mattress and a quilt or blanket. We can also offer you Himalayan Exodus sleeping bags if needed (to be returned after the trip) but it is a good idea to always have your own sleeping equipment.The lodges in trekking routes usually provide single and double rooms, or occasionally a dormitory. At times when possible, dining will be around a bon fire. In tea houses, food will be prepared in the kitchen which you should not enter without permission. The toilet in tea houses provides essential and basic facilities and are always outside the room.</p>
		</div>
		<!--/.accordion-content-->
	</div>
                    <!--/.accordion-container-->
                    <div class="accordion-container">
		<a href="#" class="accordion-toggle"><span class="days_count">4</span><h3>What sort of food can I expect in trekking?</h3><span class="toggle-icon"><i class="fa fa-caret-right"></i></span>
        </a>
		<div class="accordion-content">
		<p>Most teahouses (lodges) in Annapurna Base Camp trails cook a delicious range of mostly vegetarian fare. Pasta, tuna bakes, noodles, potatoes, eggs, daal bhat(rice and lentils), bread, soup, fresh vegetables (variety depends on the season) and even some desserts like apple pies, pancakes, and some interesting attempts at custard. You will find a lot of garlic on the menu because it assists with acclimatization – eat some every day. In many larger villages you may find some meat items on the menu. You can always get hot chocolate, tea, and hot lemon drinks, as well as soft drinks, and treats like chocolate and crisps. Each day dinner and breakfast will be at a lodge you'll stay at while lunch will be taken on the way to destination.</p>
		</div>
	</div>
    				<!--/.accordion-container-->
                    <div class="accordion-container">
		<a href="#" class="accordion-toggle"><span class="days_count">5</span><h3>What mode of transportation do you use?</h3><span class="toggle-icon"><i class="fa fa-caret-right"></i></span>
        </a>
		<div class="accordion-content">
		<p>Himalayan Exodus is all about providing you with local insights, lifestyle as well as adventure. Depending on the nature of the travel, the transportation to and from the destination varies from domestic flights to vehicular transportation to even piggyback rides on mules and yaks. We provide you only those options which enhance your local experience while allowing you to travel comfortably and efficiently. We use private tourist vehicles for sightseeing, city tours and pickups. Depending on the group size we use cars, minibus, vans or alternatively 4WD SUVs, more maneuverable in travelling along the narrow and bumpy roads of Nepal. All the vehicles are usually air-conditioned unless we are travelling in cooler areas.</p>
		</div>
	</div>
    				<!--/.accordion-container-->
    				<div class="accordion-container">
		<a href="#" class="accordion-toggle"><span class="days_count">6</span><h3>What is the best season for this trekking?</h3><span class="toggle-icon"><i class="fa fa-caret-right"></i></span>
        </a>
		<div class="accordion-content">
		<p>Our trekking season extends from mid- September to May. From early September the monsoonal rains decrease. By end of September through to December the weather is usually stable with mild to warm days, cold nights. February, March, April, May, June, October, November, December are the best time to do this trek.</p>
		</div>
	</div>
    				<!--/.accordion-container-->
                    <div class="accordion-container">
		<a href="#" class="accordion-toggle"><span class="days_count">7</span><h3>What is the weather & temperature like in trekking?</h3><span class="toggle-icon"><i class="fa fa-caret-right"></i></span>
        </a>
		<div class="accordion-content">
		<p>Weather in the mountains is notoriously difficult to predict. At night it is generally cooler the days are generally warm. Winter (January and February) will be bit colder but the days can be quite beautiful and warm if the sun is out. There will be bit of snow during the month of January, February and December. It is also important to make sure that you can stay warm and dry in just about any conditions. Expect the unexpected! The temperature could be as high as 20 deg C to -10 deg C low.</p>
		</div>
	</div>
    				<!--/.accordion-container-->
                     <div class="accordion-container">
		<a href="#" class="accordion-toggle"><span class="days_count">8</span><h3>How much additional money do I need per day?</h3><span class="toggle-icon"><i class="fa fa-caret-right"></i></span>
        </a>
		<div class="accordion-content">
		<p>It depends on your spending habits. Generally, in Kathmandu, you can allocate USD 10 to USD 15 for a lunch and a dinner. USD 10 to USD 15 per person a day will be enough to buy bottles of water, chocolates, pay for the hot shower and a few drinks during the trekking.</p>
		</div>
	</div>
    				<!--/.accordion-container-->
                </div>
                </div>
                <div class="tab_content" id="date_price">
                	<h1>Date & Price</h1>
                    <div class="date_price_wrap">
                    	<p><strong>Flight Inclusive prices include return flights from a London airport & transfers at your destination. If you wish to book your own flights independently, then please select the ‘Excluding Flights’ tab above. For more information on group flights & transfers,</strong></p>
                        <table cellspacing="0" cellpadding="0" border="0">
                        	<thead>
                            	<tr>
                            		<th>Date</th>
                                    <th>Trip Status</th>
                                    <th>Price incl. flights (pp) from</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            	<tr>
                                	<td>Sun 01 May 16 - Sun 08 May 16</td>
                                    <td>Available & guaranteed</td>
                                    <td>GBP  £629</td>
                                    <td><a href="" class="book_now">Book Now</a></td>
                                </tr>
                                <tr>
                                	<td>Sun 01 May 16 - Sun 08 May 16</td>
                                    <td>Available & guaranteed</td>
                                    <td>GBP  £629</td>
                                    <td><a href="" class="book_now">Book Now</a></td>
                                </tr>
                                <tr>
                                	<td>Sun 01 May 16 - Sun 08 May 16</td>
                                    <td>Available & guaranteed</td>
                                    <td>GBP  £629</td>
                                    <td><a href="" class="book_now">Book Now</a></td>
                                </tr>
                                <tr>
                                	<td>Sun 01 May 16 - Sun 08 May 16</td>
                                    <td>Available & guaranteed</td>
                                    <td>GBP  £629</td>
                                    <td><a href="" class="book_now">Book Now</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <div class="tab_content" id="useful_info">
                	<h1>Useful Info</h1>
                    <h2>Medical & Personal:</h2>
                    <p>
                    	<strong>Sunscreen:</strong> SPF 30 or higher, non-oily (Dermatone or Terrapin)<br />

<strong>Lipscreen:</strong> SPF 30 or higher (any brand)<br />

<strong>Toiletry kit:</strong> Toothbrush, toothpaste, skin lotion, alcohol-based hand sanitizer, soap, comb/brush, shave kit, (bring travel size bottles to keep your kit small).<br />

<strong>First-aid kit:</strong> Ibuprofen/Aspirin, assorted band-aids, moleskin, Neosporin-type suave, small gauze pad, roll of adhesive tape, tweezers, safety pins. Include any prescription travel meds that might be prescribed by your doctor (antibiotics, Diamox, sleep aids).<br />

<strong>Large trash compactor bags:</strong> For waterproofing some items inside your duffel.<br />

<strong>Zip-loc bags: </strong> These are always useful.<br />

<strong>Baby wipes</strong><br />

<strong>Earplugs:</strong> Very useful for sleeping in tents and lodges. Available in most hardware stores.<br />

<strong>Water purification tablets:</strong> Such as Potable Aqua brand iodine tablets. You will be given plenty of purified water during your trek, but one bottle of backup purification tablets is always a good idea for your travels. They are especially useful in hotels on your way to Nepal. You should not drink untreated tap water anywhere in Asia and bottled water in some rare cases might not be available.
                    </p>
                </div>
                <div class="tab_content" id="equipment">
                	<h1>Equipment</h1>
                    <h2>Footwear:</h2>
                    <p>
                    <strong>Running shoes:</strong> These are great for travel and easy walking.<br />
					<strong>Hiking boots:</strong> Leather with a sturdy mid-sole and Vibram sole. ½ or ¾ shank, boots should be warm and fit well over light and heavy sock combinations. Fit is much more important than brand. Take the time to select a pair that fits your foot, and break them in well. (Asolo, Merrill, Scarpa, La Sportiva)<br />

<strong>Gaiters:</strong> Short, simple gaiters are best, such as Outdoor Research's Rocky Mountain Low Gaiters.. Gore-Tex gaiters are not necessary.<br />

<strong>Sport sandals:</strong> They are excellent in camp during evenings when worn over wool socks and perfect for living in tea shops, Sherpa lodges and for visiting monasteries.  (Teva, Chaco)<br />

<strong>Booties:</strong> Down or synthetic. An optional luxury, any brand with thick foam soles is recommended.<br />

<strong>Lightweight socks:</strong> Three pairs of synthetic/wool blend (Bridgedale, Patagonia , Wigwam, Fox River)<br />

<strong>Heavy socks:</strong> Three pairs synthetic/wool blend (Smartwool, Bridgedale, Wigwam, Fox River)
</p>
					<hr />
					<h2>Clothing:</h2>
                    <p>
                    	<strong>Lightweight pants:</strong> Two pair (any brand Supplex or “stretch woven” pants)<br />

<strong>Lightweight long underwear top:</strong> (Patagonia-Capilene, REI, Mountain Equipment Co-op)<br />

<strong>Mid-weight long underwear top:</strong> Zip T-neck design is good. Light colors are better for tops because they are cooler when hiking in direct sunlight and just as warm as dark colors when worn underneath other layers.  ( Patagonia , North Face, Mountain Hardwear)<br />

<strong>Lightweight long underwear bottom:</strong> Dark colors are preferable. (Patagonia-Capilene, REI, Mountain Equipment Co-op)<br />

<strong>Mid-weight underwear bottom:</strong> Dark colors are preferable because they do not show dirt. ( Patagonia, REI, Mountain Equipment Co-op)<br />

<strong>Briefs:</strong> 4 pairs synthetic or cotton. Running shorts also work well for underwear.<br />

<strong>Short-sleeved shirts:</strong> Two synthetic; most nylon running shirts or athletic shirts work well. Shirt material should have vapor wicking capabilities. (North Face, Patagonia-Capilene)<br />

<strong>Jacket synthetic or fleece:</strong> Synthetic jackets or pullovers are a great alternative to fleece because they are lighter and more compressible. Primaloft type fill or Polartec 100 or 200 fleece is recommended. (Wild Things Primaloft, Patagonia Puff Jacket)<br />

<strong>Synthetic insulated pants:</strong> Primaloft or Polarguard 3D. Full side zips are recommended. Mountain Hardwear Chugach 3D pants are an example. An acceptable alternative are fleece pants Polartec 100 or 200, but they are bulky, heavier and less versatile.<br />

<strong>Down insulated jacket:</strong> A medium weight down fill jacket with a hood. The hood is optional but is highly recommended. (Marmot, North Face, Mountain Hardwear, Patagonia)<br />

<strong>Waterproof breathable jacket & pants:</strong> The jacket must have a hood and the pants must have full-length side zips. (Arc'Teryx, Marmot, Mountain Equipment Co-op)
                    </p>
                    <hr />
                    <h2>Head & Hand Gear:</h2>
                    <p>
                    	<strong>Liner gloves:</strong> They should be lightweight and synthetic. (Patagonia Capilene)<br />

<strong>Windstopper fleece gloves:</strong> (any brand of Windstopper fleece)<br />

<strong>Mittens w/ pile liners:</strong> (Outdoor Research)<br />

<strong>Bandana:</strong> Two to three traditional cotton style. This is an important item with many uses, large sizes are best.<br />

<strong>Sun hat:</strong> Any lightweight hat with a good brim or visor.<br />

<strong>Wool or fleece hat:</strong> Any brand of warm hat that can go over ears.<br />

<strong>Balaclava:</strong> Should fit underneath your wool or fleece hat or be thick enough to be worn alone.
                    </p>
                </div>
                </div>
            </div>
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
                <h4 class="modal-title">Reviews</h4>
            </div>
            <div class="modal-body">
                <p>Reviews Form</p>
            </div>

        </div>
    </div>
</div>
<script src="<?php bloginfo('template_url'); ?>/js/easyResponsiveTabs.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
	$('#verticalTab').easyResponsiveTabs({
            type: 'vertical',
            width: 'auto',
            fit: true
        });
    });
</script>

<?php
get_footer();
?>
