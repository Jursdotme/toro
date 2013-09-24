<?php if( get_field('dias_settings') ):

	while( has_sub_field('dias_settings') ):
 
		$dias_interval = get_sub_field('dias_interval')*1000;
		$dias_fx = get_sub_field('dias_fx');
 
	endwhile; ?>
 
<?php endif; ?>

<div class="cycle-slideshow" data-cycle-fx="<?php echo $dias_fx; ?>" data-cycle-timeout="<?php echo $dias_interval; ?>" data-cycle-swipe=true data-cycle-slides="> div" data-cycle-prev=".prev" data-cycle-next=".next">

	<?php if( get_field('dias_slide') ):
		while( has_sub_field('dias_slide') ): ?>
			<div class="row collapse frontpage-slide">
				<div class="large-9 medium-12 columns large-image">
					<?php					
					$dias_image_large = wp_get_attachment_image_src( get_sub_field('dias_image'), 'diaslarge' );
					?>
					<img src="<?php echo $dias_image_large[0]; ?>">
				</div>
				<div class="large-3 medium-12 columns small-image">
					<?php
					$dias_image_small = wp_get_attachment_image_src( get_sub_field('dias_image_small'), 'diasthumb' );
					?>
					<img class="hide-for-medium-down" src="<?php echo $dias_image_small[0]; ?>">
					<div>
						<h2><?php the_sub_field('dias_headline'); ?></h2>
						<p><?php the_sub_field('dias_text'); ?></p>
						<a class="readmore" href="<?php the_sub_field('dias_link'); ?>"><?php _e('Læs mere','toro'); ?></a>
					</div>
				</div>
			</div>

		<?php endwhile; ?>
 
	<?php endif;?>	

</div>

	
