<?php get_header(); ?>

<?php the_breadcrumb(); ?>

<div class="container">

	<div class="row">

		<!-- section -->
		<section role="main" class="col-sm-9">

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<!-- post title -->
				<div class="page-header">
					<h1>
						<?php the_title(); ?>
					</h1>
				</div>
				<!-- /post title -->

				<!-- post details -->
				<p class="post-meta">
					<span class="date text-muted">
						<span class="fa fa-calendar-o"></span> <?php the_time('j. F - Y'); ?>
						<span class="fa fa-folder-o"></span> <?php the_category(', '); // Separated by commas ?>
						<span class="fa fa-pencil-square-o"></span> <?php the_author_posts_link(); ?></span>
					</span>
				</p>
				<!-- /post details -->

				<!-- Featured Image -->
				<?php // check if the post has a Post Thumbnail assigned to it.
				if ( has_post_thumbnail() ) { ?>
					<?php the_post_thumbnail(" img-thumbnail"); ?>
				<?php } ?>
				<!-- /Featured Image -->

				<?php the_content(); // Dynamic Content ?>


			</article>
			<?php get_template_part( 'partials/objects/meta-after-post' ); ?>
			<!-- /article -->

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() )
					comments_template();
			?>

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

		<aside>
			<?php // get_sidebar(); ?>
		</aside>

	</div>
</div>



<?php get_footer(); ?>
