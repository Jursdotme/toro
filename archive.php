<?php get_header(); ?>

			<div id="content" class="row">

						<div id="main" class="large-9 columns" role="main">

							<?php if (is_category()) { ?>
								<h1 class="archive-title h2">
									<span><?php _e("Nyheder i Kategorien:", "torotheme"); ?></span> <?php single_cat_title(); ?>
								</h1>

							<?php } elseif (is_tag()) { ?>
								<h1 class="archive-title h2">
									<span><?php _e("Nyheder Tagget med:", "torotheme"); ?></span> <?php single_tag_title(); ?>
								</h1>

							<?php } elseif (is_author()) {
								global $post;
								$author_id = $post->post_author;
							?>
								<h1 class="archive-title h2">

									<span><?php _e("Nyheder skrevet af:", "torotheme"); ?></span> <?php the_author_meta('display_name', $author_id); ?>

								</h1>
							<?php } elseif (is_day()) { ?>
								<h1 class="archive-title h2">
									<span><?php _e("Dagligt arkiv:", "torotheme"); ?></span> <?php the_time('l, F j, Y'); ?>
								</h1>

							<?php } elseif (is_month()) { ?>
									<h1 class="archive-title h2">
										<span><?php _e("Månedligt Arktiv:", "torotheme"); ?></span> <?php the_time('F Y'); ?>
									</h1>

							<?php } elseif (is_year()) { ?>
									<h1 class="archive-title h2">
										<span><?php _e("Årligt Arkiv:", "torotheme"); ?></span> <?php the_time('Y'); ?>
									</h1>
							<?php } ?>

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

								<header class="article-header">

									<h3 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
									<p class="byline vcard"><?php
										printf(__('Skrevet <time class="updated" datetime="%1$s" pubdate>%2$s</time> af <span class="author">%3$s</span> <span class="amp">&</span> arkiveret under %4$s.', 'torotheme'), get_the_time('Y-m-j'), get_the_time(__('F jS, Y', 'torotheme')), toro_get_the_author_posts_link(), get_the_category_list(', '));
									?></p>

								</header> <!-- end article header -->

								<section class="entry-content clearfix">

									<?php the_post_thumbnail( 'toro-thumb-300' ); ?>

									<?php the_excerpt(); ?>

								</section> <!-- end article section -->

								<footer class="article-footer">

								</footer> <!-- end article footer -->

							</article> <!-- end article -->

							<?php endwhile; ?>

									<?php if (function_exists('toro_page_navi')) { ?>
										<?php toro_page_navi(); ?>
									<?php } else { ?>
										<nav class="wp-prev-next">
											<ul class="clearfix">
												<li class="prev-link"><?php next_posts_link(__('&laquo; Tidligere indlæg', "torotheme")) ?></li>
												<li class="next-link"><?php previous_posts_link(__('Nyere indlæg &raquo;', "torotheme")) ?></li>
											</ul>
										</nav>
									<?php } ?>

							<?php else : ?>

									<article id="post-not-found" class="hentry clearfix">
										<header class="article-header">
											<h1><?php _e("Ups, ingen nyheder fundet", "torotheme"); ?></h1>
										</header>
										<section class="entry-content">
											<p><?php _e("Hovsa, der mangler noget, prøv at gå tilbage og se om du mangler noget.", "torotheme"); ?></p>
										</section>
									</article>

							<?php endif; ?>

						</div> <!-- end #main -->

						<?php get_sidebar(); ?>

								</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
