<?php
/*
Template Name: Frontpage Template
*/
?>

<?php  get_header();?>

<!-- Slider -->
<?php include 'slider.php'; ?>

<!-- Statisk Indhold -->
<hr class="hr1">

<div class="row frontpage-content">
	<div class="large-12 medium-12 small-12 columns">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php the_content(); ?>
		<?php endwhile; ?>
		<?php endif; ?>
	</div>
</div>

<hr class="hr1 bottom">

<div class="row forside-nyhed">
	<?php

	// The Arguments
	$args = array(
		'posts_per_page' => 2,
	);

	// The Query
	$query = new WP_Query( $args );

	// The Loop
	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();?>

	<div <?php post_class('large-4 small-12 columns'); ?>>
		<div class="panel">
			<div class="row collapse">
				<div class="large-12 columns">
					<h3><?php the_title(); ?></h3>
					<hr>
					<p class="date"><?php the_time(get_option('date_format')); ?></p>
					<p><?php the_excerpt(); ?>	</p>
					
				</div>
			</div>
			<a class="readmore" href="<?php the_permalink(); ?>"><?php _e('Læs mere','toro'); ?></a>
		</div>
	</div>

	<?php
	}}
	/* Restore original Post Data */
	wp_reset_postdata();
	?>
</div>

<?php  get_footer();?>