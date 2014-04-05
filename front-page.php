<?php  get_header();?>

<!-- Slider -->
<?php include 'slider.php'; ?>

<div class="container">
	<div class="row">

		<!-- Statisk Indhold -->
		
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