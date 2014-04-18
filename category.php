<?php get_header(); ?>

<div class="container">
	<div class="row">
		
		<!-- section -->
		<section role="main" class="col-md-9 col-xs-12">

			<div class="page-header">
			  <h1><small><?php _e( 'Archive for', 'toro' ); ?></small> <?php single_cat_title(); ?></h1>
			</div>

		
			<?php get_template_part('partials/markup/loop'); ?>
			
			<?php get_template_part('partials/markup/pagination'); ?>
		
		</section>
		<!-- /section -->
	
		<?php get_sidebar(); ?>

	</div>
</div>

<?php get_footer(); ?>