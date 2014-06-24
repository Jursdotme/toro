<?php global $product; ?>
<li class="media">
	<a href="<?php echo esc_url( get_permalink( $product->id ) ); ?>" title="<?php echo esc_attr( $product->get_title() ); ?>" class="pull-left">
		<?php echo $product->get_image(); ?>
	</a>
	<div class="media-body">
		<a href="<?php echo esc_url( get_permalink( $product->id ) ); ?>" title="<?php echo esc_attr( $product->get_title() ); ?>">
			<h4 class="media-heading"><?php echo $product->get_title(); ?></h4>
		</a>
		<?php if ( ! empty( $show_rating ) ) echo $product->get_rating_html(); ?>
		<?php echo $product->get_price_html(); ?>
	</div>
</li>

