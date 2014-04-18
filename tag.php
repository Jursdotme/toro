<?php get_header(); ?>

	<!-- section -->
	<section role="main">

		<h1><?php _e( 'Tag Archive: ', 'toro' ); echo single_tag_title('', false); ?></h1>

		<?php get_template_part('partials/markup/loop'); ?>

		<?php get_template_part('partials/markup/pagination'); ?>

	</section>
	<!-- /section -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
