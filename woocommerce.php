<?php get_header(); ?>
<div class="container">
	<div class="row">
		
		<!-- section -->
		<section role="main" class="col-md-9 col-sm-8 col-xs-12">
			<div class="page-header">
				<h1><?php the_title(); ?></h1>
			</div>
			
		<?php woocommerce_content(); ?>

		</section>
		<!-- /section -->
		
		<?php get_sidebar(); // The sidebar has ..col-md-3. (Change it in sidebar.php) ?>

	</div>
</div>
<?php include "edit_post_link.php" ?>
<?php get_footer(); ?>