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
            		<h1><?php echo the_title(); ?></h1>
                   
                </div>
            </div>
        </div>
    </div>
</section>
<!-- inner title wrapper end -->

<!-- Start inner content -->


<!-- /.content -->
<section class="inner_content">
	<div class="container">
    	<div class="row">
        	<div class="col-lg-9 col-md-9 col-md-9">
            <?php
							if ( have_posts() ) :
								while ( have_posts() ) : the_post();
								?>
                        <div class="news_date"><i class="fa  fa-calendar"></i> <?php the_time('l, F j, Y'); ?></div><br />
                       <?php if ( has_post_thumbnail() ) {
					   ?>
                       <div class="image_full">
                       <?php echo the_post_thumbnail('full'); ?>
						 </div>
                         <?php
							}
						  ?>
              			<?php the_content();?>
                        <?php endwhile;
							else :
								echo wpautop( 'Sorry, no posts were found' );
							endif;
							?>
                
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>
</section>
<?php
get_footer();
?>