<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico">
<title><?php
	global $page, $paged;
    wp_title( '|', true, 'right' );
    // Add the blog name.
	bloginfo( 'name' );
    // Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo "";
	?></title>

<!-- Bootstrap core CSS -->
<link href="<?php bloginfo('template_url'); ?>/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet">
<link href="<?php bloginfo('template_url'); ?>/css/font-awesome.css" rel="stylesheet">
<link href="<?php bloginfo('template_url'); ?>/css/animate.css" rel="stylesheet">
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bootstrap-select.css">
<link type="text/css" rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/yamm.css" />
 <link href="<?php bloginfo('template_url'); ?>/css/jquery.fancybox.css" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<!-- Owl Carousel Assets -->
    <link href="<?php bloginfo('template_url'); ?>/css/owl.carousel.css" rel="stylesheet">
    <link href="<?php bloginfo('template_url'); ?>/css/owl.theme.css" rel="stylesheet">
    <link rel="stylesheet" media="all" href="<?php bloginfo('template_url'); ?>/css/main.css" />
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/jquery-ui.css">
    <!--Book now form steps & validattion css -->
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/jquery.steps.css" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/formValidation.min.css" />
<!-- Jwplayer jquery and css -->
<script src="<?php bloginfo('template_url'); ?>/js/jwplayer.js"></script>
<script type="text/javascript">jwplayer.key="+8T8JW/Tu+XwZH1qfU/otEOpFCJUUL26mKu/aA==";</script>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bootstrap-datepicker.min.css">
<!-- Just for debugging purposes. Don't actually copy this line! -->
<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="<?php bloginfo('template_url'); ?>/css/bootstrap-datetimepicker.css" rel="stylesheet" media="screen">

<?php wp_head();?>    
</head>

<body <?php body_class();?>>
<!--/.header -->
<?php global $abeka; ?>
<section class="banner-wrapper">
	<header>
	<!--/.nav -->
  <div class="navbar navbar-inverse navbar" role="navigation">
  <div class="top_bar">
  	<div class="container">
    	<div class="row">
        	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            	<ul class="top_contact">
                	<li><i class="fa fa-map-marker"></i><?php echo $abeka['company-address1']; ?></li>
                    <li><i class="fa fa-phone"></i><?php echo $abeka['company-phone']; ?></li>
                    <li><i class="fa fa-envelope"></i><a href="Mailto:<?php echo $abeka['company-email']; ?>"><?php echo $abeka['company-email']; ?></a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 no_right_padding">
                <div class="search_center">
                    <div class="search1">
                       <?php get_search_form(); ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            	<div class="social_link_wrap">
            	<ul class="social_link">
                	<li><a target="_blank" href="<?php echo $abeka['company-facebook']; ?>"><i class="fa fa-facebook"></i></a></li>
                    <li><a target="_blank" href="<?php echo $abeka['company-google']; ?>"><i class="fa fa-google-plus"></i></a></li>
                    <li><a target="_blank" href="<?php echo $abeka['company-twitter']; ?>"><i class="fa fa-twitter"></i></a></li>
                    <li><a target="_blank" href="<?php echo $abeka['company-linkedin']; ?>"><i class="fa fa-linkedin"></i></a></li>
                    <li><a target="_blank" href="<?php echo $abeka['company-youtube']; ?>"><i class="fa fa-youtube"></i></a></li>
                </ul>
                </div>
            </div>
        </div>
    </div>
  </div>
  <div class="second_top_bar yamm">
    <div class="container">
    
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <a class="navbar-brand" href="<?php echo home_url();?>"><img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt=""/></a> </div>
      <div class="collapse navbar-collapse pull-right">
        <?php
		
		$defaults = array(
			'theme_location'  => 'header-menu',
			'menu'            => '',
			'container'       => 'ul',
			'container_class' => '',
			'container_id'    => '',
			'menu_class'      => 'nav navbar-nav',
			'menu_id'         => '',
			'echo'            => true,
			'fallback_cb'     => 'wp_page_menu',
			'before'          => '',
			'after'           => '',
			'link_before'     => '',
			'link_after'      => '',
			'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			'depth'           => 0,
			'walker'          => ''
		);
		
		wp_nav_menu( $defaults );                
		
		?>
      </div>
       
      <!--/.nav-collapse --> 
    </div>
   </div>
  </div>
</header>
   