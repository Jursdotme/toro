<?php get_header(); ?>

<div class="row">
	
	<!-- section -->
	<section role="main" class="large-9 medium-8 small-12 columns">
		
			<h1><?php _e( 'Latest Posts', 'toro' ); ?></h1>
		
			<?php get_template_part('loop'); ?>
			
			<?php get_template_part('pagination'); ?>

	</section>
	<!-- section -->
	
	<?php get_sidebar(); // The sidebar has .large-3 columns. (Change it in sidebar.php) ?> 

</div>

<?php get_footer(); ?>