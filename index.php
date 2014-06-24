<?php get_header(); ?>

<div class="container">

	<div class="row">

		<!-- section -->
		<section role="main" class="col-sm-10 col-sm-offset-1">
			<div class="page-header">
				<h1><?php _e( 'Latest Posts', 'toro' ); ?></h1>
			</div>
				<?php get_template_part('partials/objects/loop'); ?>

				<?php get_template_part('partials/objects/pagination'); ?>

		</section>
		<!-- section -->

		<?php // get_sidebar(); // The sidebar has .large-3 columns. (Change it in sidebar.php) ?>

	</div>
</div>

<?php get_footer(); ?>
