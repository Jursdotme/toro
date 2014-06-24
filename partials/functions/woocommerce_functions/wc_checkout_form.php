<?php 

// Hook in
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_fields( $fields ) {
	    array_push( $fields['billing']['billing_first_name']['class'], 'hello');

      return $fields;
} ?>