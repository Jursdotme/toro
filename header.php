<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
		
		<!-- dns prefetch -->
		<link href="//www.google-analytics.com" rel="dns-prefetch">
		
		<!-- meta -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">
		
		<!-- icons -->
		<link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
		<link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">
			
		<!-- css + javascript -->
		<?php wp_head(); ?>
		<script>
		!function(){
			// configure legacy, retina, touch requirements @ conditionizr.com
			conditionizr()
		}()
		</script>
	</head>
	<body <?php body_class(); ?>>
	
		<!-- wrapper -->
		<div class="wrapper">
			<div class="inner-pagewrapper">
	
			<!-- header -->
			<div class="head-wrapper">
				<header class="header row" role="banner">
					
						<!-- logo -->
						<div class="logo large-12 small-12 columns">
							<a href="<?php echo home_url(); ?>">
								<!-- svg logo - toddmotto.com/mastering-svg-use-for-a-retina-web-fallbacks-with-png-script -->
								<img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="Logo" class="logo-img">
							</a>
						</div>
						<!-- /logo -->
						
						<div class="show-for-small">
							<a id="off-canvas-nav-toggle" href="#">m</a>
						</div>
						
				</header>


				<!-- nav -->
				<div class="nav-wrapper">
					<div class="row">
						<div class="large-12 columns navigation-wrapper">
							<?php main_nav(); ?>
						</div>
					</div>
				</div>
				<!-- /nav -->


			</div>
			<!-- /header -->


			