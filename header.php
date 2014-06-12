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
		<link href="<?php echo get_template_directory_uri(); ?>/img/min/icons/favicon.ico" rel="shortcut icon">
		<link href="<?php echo get_template_directory_uri(); ?>/img/min/icons/touch.png" rel="apple-touch-icon-precomposed">

		<!-- css + javascript -->
		<?php wp_head(); ?>

		<!-- google fonts -->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,800,700,600,300' rel='stylesheet' type='text/css'>

	</head>
	<body <?php body_class(); ?> style="
		background-color: <?php echo of_get_option( 'background_color', '#fff' ); ?>;
		background-image: url('<?php echo of_get_option( 'background_image' ); ?>');
		background-repeat:<?php echo of_get_option( 'background_tiling' ); ?>;
		background-attachment:<?php echo of_get_option( 'background_image' ); ?>;
		background-position:<?php echo of_get_option( 'background_position', 'left top' ); ?>;
		background-size:<?php echo of_get_option( 'background_size' ); ?>;
		background-attachment:<?php if ( of_get_option( 'fix_image' ) == 1) {echo 'fixed'; } else { echo 'inherit'; }; ?>;
		">

	<?php if (of_get_option( 'use_wrapper' )  == 1 ) {
		echo '<div id="page-wrapper" style="background-color:'. of_get_option( 'wrapper_color', '#fff' ) .';">';
	} ?>

		<div class="container page-head">
			<div class="row">
				<div class="col-sm-12">
					<a class="top-logo" href="<?php echo home_url(); ?>">
										<span class="inzite-inzite_tagline"></span>
								</a>
				</div>
			</div>
		</div>

		<nav class="navbar navbar-inverse navbar-static-top" role="navigation">

		  <div class="container">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>

		    </div>
	    	<?php topbar(); ?>
	    </div>
		</nav>
