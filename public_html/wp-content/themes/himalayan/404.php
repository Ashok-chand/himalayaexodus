<?php get_header(); ?>
</section>
<section class="breadcrumb_wrap">
	<div class="container">
    	<div class="row">
        	<div class="col-lg-12">
            	<div class="bread">
                    <?php
			if (function_exists('bcn_display')) 
                            {
				bcn_display();
                            }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
	<div class="container">
    	<div class="row">
        	<div class="col-lg-12">
            	<div class="inner_title">
            		<h1>Page Not Found</h1>
                   
                   <div class="ropa"></div>
                </div>
            </div>
        </div>
    </div>
</section>
			
 <section class="inner_content">
	<div class="container">
    	<div class="row">
        <div class="col-lg-12">
        <div class="404" align="center">
            	<img src="<?php bloginfo('template_url') ?>/images/404.png"><br>
            	<a href="javascript:history.back();">[Go Back]</a>
            </div>
         </div>
        </div>
    </div>
</section>
        
<?php get_footer(); ?>