<?php get_header(); ?>

<div class="container">

	<div class="row">

		<!-- section -->
		<section role="main" class="col-md-9 col-sm-8 col-xs-12">
		
		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		
			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
				<!-- post title -->
				<div class="page-header">
					<h1>
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
					</h1>
				</div>
				<!-- /post title -->
				
				<!-- post details -->
				<p><span class="date text-muted"><?php the_time('j. F - Y'); ?></span>
				<span class="author text-muted"><?php _e( 'Skrevet af', 'toro' ); ?> <?php the_author_posts_link(); ?></span></p>
				<!-- /post details -->
				
				<?php the_content(); // Dynamic Content ?>

				<?php // include "comments-and-meta.php"; ?>
				
			</article>
			<!-- /article -->
			
		<?php endwhile; ?>
		
		<?php else: ?>
		
			<!-- article -->
			<article>
				
				<h1><?php _e( 'Sorry, nothing to display.', 'toro' ); ?></h1>
				
			</article>
			<!-- /article -->
		
		<?php endif; ?>
		
		</section>
		<!-- /section -->
		
		<?php get_sidebar(); // The sidebar has .col-md-3. (Change it in sidebar.php) ?>

	</div>
</div>

<?php get_footer(); ?>