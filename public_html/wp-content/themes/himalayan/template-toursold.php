<?php
/*
	Template Name: Tours old
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


<section class="inner_content">
	<div class="container">
    	<div class="row">
        <ul class="tour_wrap">
        <?php
			query_posts(array('post_type'=>'ourtours', 'posts_per_page' => '20' )); 
			while (have_posts()) : the_post();
			?>
            <li>
        	<div class="col-lg-7 col-md-7 col-sm-7  tour_image">
            	<div class="image_full">
                    <?php the_post_thumbnail(array(670, 460)); ?>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-5  tour_content">
            	<div class="tour_body">
                	<h2><?php the_title(); ?></h2>
                    <?php the_excerpt(); ?>
					<div class="wrap_more"><a class="read" href="<?php the_permalink(); ?>">+ Information</a></div>
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