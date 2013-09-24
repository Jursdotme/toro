<?php get_header(); ?>

<!-- Side titel -->
<div class="row">
	<div class="large-12 columns">
		<h2 style="margin: 0;" class="label-header">Nyheder</h2>
	</div>
</div>

<div id="content" class="row news-overview">

		<div id="main" class="large-12 columns panel" role="main">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?> role="article">

				<div class="large-8 small-12 columns">
					<header class="article-header">

						<h1 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>

					</header> <!-- end article header -->

					<section class="entry-content">
						<?php the_excerpt(); ?>
					</section> <!-- end article section -->

					<footer class="article-footer">
						<p class="tags"><?php the_tags('<span class="tags-title">' . __('Tags:', 'Toro') . '</span> ', ', ', ''); ?></p>

					</footer> <!-- end article footer -->

					<?php // comments_template(); // uncomment if you want to use them ?>
				</div>			
			</article> <!-- end article -->
			<hr>
			<?php endwhile; ?>

							<?php toro_page_navi(); ?>
					
			<?php else : ?>

					<article id="post-not-found" class="hentry clearfix">
							<header class="article-header">
								<h1><?php _e("Oops, Post Not Found!", "Toro"); ?></h1>
						</header>
							<section class="entry-content">
								<p><?php _e("Uh Oh. Something is missing. Try double checking things.", "Toro"); ?></p>
						</section>
						<footer class="article-footer">
								<p><?php _e("This is the error message in the index.php template.", "Toro"); ?></p>
						</footer>
					</article>

			<?php endif; ?>

		</div> <!-- end #main -->

	</div> <!-- end #content -->

<?php get_footer(); ?>



