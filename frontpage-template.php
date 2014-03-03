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
	<div class=".col-md-12 .col-md-12 columns">
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

	<div <?php post_class('.col-md-4 .col-md-12 columns'); ?>>
		<div class="panel panel-default">
			
					<div class="panel-heading"><h3><?php the_title(); ?></h3></div>
					<div class="panel-body">
						<p class="date"><?php the_time(get_option('date_format')); ?></p>
						<p><?php the_excerpt(); ?>	</p>
					</div>
					<div class="panel-footer"><a class="readmore" href="<?php the_permalink(); ?>"><?php _e('Læs mere','toro'); ?></a></div>
		</div>
	</div>



	<?php
	}}
	/* Restore original Post Data */
	wp_reset_postdata();
	?>
</div>

<?php  get_footer();?>