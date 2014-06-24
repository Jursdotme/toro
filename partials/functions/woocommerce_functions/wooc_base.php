<?php
/********************* DECLARE THEME SUPPORT *********************/
  add_action( 'after_setup_theme', 'woocommerce_support' );
  function woocommerce_support() {
      add_theme_support( 'woocommerce' );
  }

/********************* DISABLE DEFAULT STYLES *********************/

  add_filter( 'woocommerce_enqueue_styles', '__return_false' );

  require_once( 'wc_breadcrumbs.php' );
  require_once( 'wc_before_shop_loop.php' );
  require_once( 'wc_after_shop_loop.php' );
  require_once( 'wc_single_product.php' );
  require_once( 'wc_notices.php' );
  require_once( 'wc_single_tabs.php' );
  require_once( 'wc_related_products.php' );
  require_once( 'wc_sidebar.php' );
  require_once( 'wc_checkout_form.php' );
  require_once( 'wc_remove_stuff.php' );

// Replace WooComemrce button class with Bootstrap
add_filter('woocommerce_loop_add_to_cart_link', 'toro_commerce_switch_buttons');

function toro_commerce_switch_buttons( $button ){

  $button = str_replace('button', 'btn btn-primary', $button);

  return $button;

}

/**
 * Place a cart icon with number of items and total cost in the menu bar.
 */
function toro_woomenucart($menu, $args) {

	// Check if WooCommerce is active and add a new item to a menu assigned to Primary Navigation Menu location
	if ( !in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) || 'topbar' !== $args->theme_location )
		return $menu;

	ob_start();
		global $woocommerce;
		$viewing_cart = __('View your shopping cart', 'toro');
		$start_shopping = __('Start shopping', 'toro');
		$cart_url = $woocommerce->cart->get_cart_url();
		$shop_page_url = get_permalink( woocommerce_get_page_id( 'shop' ) );
		$cart_contents_count = $woocommerce->cart->cart_contents_count;
		$cart_contents = sprintf(_n('%d item', '%d items', $cart_contents_count, 'toro'), $cart_contents_count);
		$cart_total = $woocommerce->cart->get_cart_total();
		// Uncomment the line below to hide nav menu cart item when there are no items in the cart
		// if ( $cart_contents_count > 0 ) {
			if ($cart_contents_count == 0) {
				$menu_item = '<li class="pull-right"><a class="woo-menu-cart" href="'. $shop_page_url .'" title="'. $start_shopping .'">';
			} else {
				$menu_item = '<li class="pull-right"><a class="woo-menu-cart" href="'. $cart_url .'" title="'. $viewing_cart .'">';
			}

			$menu_item .= '<i class="fa fa-shopping-cart"></i> ';

			$menu_item .= $cart_contents.' - '. $cart_total;
			$menu_item .= '</a></li>';
		// Uncomment the line below to hide nav menu cart item when there are no items in the cart
		// }
		echo $menu_item;
	$social = ob_get_clean();
	return $menu . $social;

}
add_filter('wp_nav_menu_items','toro_woomenucart', 10, 2);
