<?php get_header(); ?>

<div class="row">
	
	<!-- section -->
	<section role="main" class="col-md-9 col-sm-8 col-xs-12">
		
			<h1><?php the_title(); ?></h1>
		
		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		
			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
				<?php the_content(); ?>
				
				<?php comments_template( '', true ); // Remove if you don't want comments ?>
				
				<br class="clear">
				
				<?php edit_post_link(); ?>
				
			</article>
			<!-- /article -->
			
		<?php endwhile; ?>
		
		<?php else: ?>
		
			<!-- article -->
			<article>
				
				<h2><?php _e( 'Sorry, nothing to display.', 'toro' ); ?></h2>
				
			</article>
			<!-- /article -->
		
		<?php endif; ?>

	</section>
	<!-- /section -->
	
	<?php get_sidebar(); // The sidebar has ..col-md-3. (Change it in sidebar.php) ?>

</div> 

<?php get_footer(); ?>