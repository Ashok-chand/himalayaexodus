<?php
/*
	Template Name: Contact Us
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
        	<div class="col-lg-8 col-md-8 col-sm-8">
               <div class="about_text"><blockquote>"<?php echo get_post_meta(get_the_ID(), 'Blockquote', TRUE); ?>”</blockquote></div>
               <div class="ropa"></div>
               <?php
							if ( have_posts() ) :
								while ( have_posts() ) : the_post();
								?>
                      
              			<?php the_content();?>
                        <?php endwhile;
							else :
								echo wpautop( 'Sorry, no posts were found' );
							endif;
							?>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <?php global $abeka; ?>
                	<h2>Contact Info</h2>
                    <div class="contact_us inner_contact animated fadeInUp wow">
                    <ul>
                    	<li class="office"><i class="fa fa-home"></i> <?php echo $abeka['company-name']; ?></li>
                        <li class="address"><i class="fa fa-map-marker"></i> <?php echo $abeka['company-address']; ?><br />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $abeka['company-address1']; ?></li>
                        <li class="phone"><i class="fa fa-phone"></i> Phone: <?php echo $abeka['company-phone']; ?></li>
                        <li class="fax"><i class="fa fa-fax"></i> Fax: <?php echo $abeka['company-fax']; ?></li>
                        <li class="email"><i class="fa fa-envelope"></i> E-mail: <a href="mailto:<?php echo $abeka['company-email']; ?>"><?php echo $abeka['company-email']; ?></a></li>
                    </ul>
                </div>
               
            	
                
            </div>
        </div>
        
    </div>
    <div class="map_wrap">
    <?php echo $abeka['map-link']; ?>
                	
                </div>
</section>




<?php
get_footer();
?>