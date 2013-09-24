<?php
/*
Template Name: Forside Skabelon
*/
?>

<?php  get_header();?>

<!-- Slider -->
<?php include 'slider.php'; ?>

<!-- Knapper -->
<?php include 'knapper.php'; ?>

<!-- Statisk Indhold -->
	<hr class="hr1">
	<div class="row frontpage-content">
		<div class="large-9 medium-8 small-12 columns">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>
			<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
	<hr class="hr1 bottom">

<div class="row forside-nyhed">
<?php

// The Query
$query = new WP_Query( 'posts_per_page=3' );

// The Loop
if ( $query->have_posts() ) {
	while ( $query->have_posts() ) {
		$query->the_post();?>

	<div class="large-4 small-12 columns">
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

<!-- Medarbejdere -->
<div class="row">
	<div class="large-9 columns">
		<h2 class="label-header"><?php _e('Team','toro'); ?></h2>
	</div>
	<div class="large-3 columns">
		<div id="team-arrows">
    			<a class="team-prev"><img src="<?php echo get_template_directory_uri(); ?>/images/prev.png" style="border:none;" /></a>
    			<a class="team-next"><img src="<?php echo get_template_directory_uri(); ?>/images/next.png" style="border:none;" /></a>
		</div>
	</div>
</div>
<?php  get_footer();?>