<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js ie lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js ie lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js ie lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<!-- Google Chrome Frame for IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title><?php wp_title(''); ?></title>

		<!-- mobile meta (hooray!) -->
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<!-- icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) -->
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-icon-touch.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<!-- or, set /favicon.ico for IE10 win -->
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<!-- Google Fonts -->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

		<!-- wordpress head functions -->

		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script>
			var mob_menu_width = "100%";
			var mob_menu_pos = "top"; /* left, right, top or bottom. if bottom is used place mob_nav element after wrapper. */
		</script>
		<script src="<?php echo get_template_directory_uri(); ?>/javascripts/jquery-nav.mob.desk.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/javascripts/jquery.cycle2.min.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/javascripts/jquery.cycle2.carousel.min.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/javascripts/jquery.cycle2.swipe.min.js"></script>
		
		<script type="text/javascript" src="http://fast.fonts.net/jsapi/b8894765-a03b-48b9-ada6-2fac8055ae47.js"></script>
		
		<?php wp_head(); ?>
		<!--[if IE 8]>
		<link rel='stylesheet' href="<?php echo get_template_directory_uri(); ?>/stylesheets/ie8fix.css">
		<script>
			document.createElement('header');
			document.createElement('nav');
			document.createElement('section');
			document.createElement('article');
			document.createElement('aside');
			document.createElement('footer');
			document.createElement('hgroup');
			</script>
		<![endif]-->
		<!-- end of wordpress head -->

		<!-- drop Google Analytics Here -->
		<!-- end analytics -->

	</head>

	<body <?php body_class(); ?> style="position: relative; overflow-x: hidden;">
		
		
		
		<!-- Page Start -->
		
			<header class="header row" role="banner">

				<div class="large-6 medium-5 small-10 columns">

					<!-- to use a image just replace the bloginfo('name') with your img src and remove the surrounding <p> -->
					<a id="logo" href="<?php echo home_url(); ?>" rel="nofollow"><h1><?php bloginfo('name'); ?></h1></a>

					<!-- if you'd like to use the site description you can un-comment it below -->
					<?php // bloginfo('description'); ?>

				</div>
				<div class="small-2 medium-1 columns show-for-small">
					<div class="mob_trigger">&#9776;</div>
				</div>
				
			</header> <!-- end header -->

			<!-- Navigation -->
				<div class="row hide-for-small">
					<div class="large-12 columns">
						<nav role="navigation" class="desk_nav">
							<?php desktop_nav(); ?>
						</nav>
					</div>
				</div>
				
				<!-- Mobile Navigation -->
				<nav role="navigation" class="mob_nav">
					<?php mobile_nav(); ?>
				</nav>

				<hr class="headerhr">

			<!-- END Navigation -->
