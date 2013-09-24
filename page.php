<?php get_header(); ?>

			<div id="content" class="row">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						
						<div id="main" class="large-12 columns" role="main">

							

							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">

									<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>

								</header> <!-- end article header -->

								<section itemprop="articleBody" class="articlebody">
									<?php the_content(); ?>
							</section> <!-- end article section -->

							</article> <!-- end article -->

							<?php endwhile; else : ?>

									<article id="post-not-found" class="hentry clearfix">
										<header class="article-header">
											<h1><?php _e("Ups, Side ikke fundet!", "torotheme"); ?></h1>
										</header>
										<section class="entry-content">
											<p><?php _e("Hovsa. Der mangler noget, prøv at gå tilbage og prøv igen.", "torotheme"); ?></p>
										</section>
									</article>

							<?php endif; ?>

						</div> <!-- end #main -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
