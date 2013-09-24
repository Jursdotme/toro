<?php get_header(); ?>
			
<!-- Get latest Post -->
<div id="content" class="row nyhed aside">

		<div id="main" class="large-12 columns" role="main">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

					<header class="article-header">

						<h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>
						<p class="byline vcard"><?php
							printf(__('<time class="updated" datetime="%1$s" pubdate>%2$s</time>', 'torotheme'), get_the_time('Y-m-j'), get_the_time(get_option('date_format')), toro_get_the_author_posts_link(), get_the_category_list(', '));
						?></p>

					</header> <!-- end article header -->

					<section class="entry-content clearfix" itemprop="articleBody">
						<?php the_content(); ?>
					</section> <!-- end article section -->

					<footer class="article-footer right">
						<?php the_tags('<p class="tags"><span class="tags-title">' . __('Tags:', 'torotheme') . '</span> ', ', ', '</p>'); ?>
						
						<?php previous_post_link('%link', '<span class="larr">Forrige Nyhed</span>', TRUE); ?>	
						<?php next_post_link('%link', '<span class="rarr space">Næste Nyhed</span>', TRUE); ?> 
					
					</footer> <!-- end article footer -->

				</article> <!-- end article -->

			<?php endwhile; ?>

			<?php endif; ?>

		</div> <!-- end #main -->

	</div> <!-- end #inner-content -->
<?php get_footer(); ?>
</div> <!-- end #content -->


