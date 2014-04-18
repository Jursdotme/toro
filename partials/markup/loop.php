<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	
	<!-- article -->
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		<!-- post title -->
		<h2>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
		</h2>
		<!-- /post title -->
		
		<!-- post details -->
		<p><span class="date text-muted"><?php the_time('j. F - Y'); ?></span>
		<span class="author text-muted"><?php _e( 'Skrevet af', 'toro' ); ?> <?php the_author_posts_link(); ?></span></p>
		<!-- /post details -->
		
		<?php toro_excerpt('toro_index'); // Build your custom callback length in functions.php ?>
		
		
		
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