<?php get_header(); ?>

<div class="container">
	<div class="row">
	
		<!-- section -->
		<section role="main" class="col-sm-10 col-sm-offset-1">

		<h1><?php _e( 'Tag Archive: ', 'toro' ); echo single_tag_title('', false); ?></h1>

		<?php get_template_part('partials/markup/loop'); ?>

		<?php get_template_part('partials/markup/pagination'); ?>

		</section>
		<!-- /section -->
	
		<?php get_sidebar(); ?>
	</div>
</div>

<?php get_footer(); ?>
