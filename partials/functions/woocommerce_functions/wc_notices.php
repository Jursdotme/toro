<?php

// Remove Default function
remove_action( 'woocommerce_before_shop_loop', 'wc_print_notices', 10 );
remove_action( 'woocommerce_before_single_product', 'wc_print_notices', 10 );

// The New Function (includes/wc-notice-functions.php)
function toro_wc_print_notices() {

	$all_notices  = WC()->session->get( 'wc_notices', array() );
	$notice_types = apply_filters( 'woocommerce_notice_types', array( 'error', 'success', 'notice' ) );

	foreach ( $notice_types as $notice_type ) {
		if ( wc_notice_count( $notice_type ) > 0 ) {
      echo '<div class="container">';
			echo 	'<div class="row">';
			echo 		'<div class="col-sm-12">';
									wc_get_template( "notices/{$notice_type}.php", array(
										'messages' => $all_notices[$notice_type]
									) );
			echo			'</div>';
			echo		'</div>';
			echo	'</div>';
		}
	}

	wc_clear_notices();
}

// Add The new Funtion
add_action( 'woocommerce_before_shop_loop', 'toro_wc_print_notices', 10 );
add_action( 'woocommerce_before_single_product', 'toro_wc_print_notices', 10 );

 ?>
