<?php 

$classes = get_body_class();

if (in_array('woocommerce-cart', $classes)) { ?>
    // your markup
<?php } else { ?>
  <!-- sidebar -->
	<aside class="sidebar col-md-3 col-sm-4 col-xs-12" role="complementary">

		<div class="sidebar-widget">
			<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-1')) ?>
		</div>

		<div class="sidebar-widget">
			<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-2')) ?>
		</div>

	</aside>
	<!-- /sidebar -->
<?php } ?>