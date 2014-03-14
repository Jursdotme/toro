<?php  get_header();?>

<div class="container">
	<div class="row">

		<!-- Slider -->
		<?php include 'slider.php'; ?>

		<!-- Statisk Indhold -->
		<hr class="hr1">
		<div class="col-md-12 col-xs-12">
			<div class="frontpage-content">
			
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
				<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>

		<hr class="hr1 bottom">

	</div>
</div>

<?php  get_footer();?>