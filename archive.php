<?php get_header(); ?>

<div class="container">
	<div class="row">
	
		<!-- section -->
		<section role="main" class="col-md-9 col-xs-12">
		
			<h1><?php _e( 'Archives', 'toro' ); ?></h1>
		
			<?php get_template_part('partials/markup/loop'); ?>
			
			<?php get_template_part('partials/markup/pagination'); ?>
		
		</section>
		<!-- /section -->
	
		<?php get_sidebar(); ?>
	</div>
</div>

<?php get_footer(); ?>