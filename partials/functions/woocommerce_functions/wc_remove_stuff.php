<?php 

// remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10); // Remove Sidebar

 /**
 * Remove product tabs
 *
 */
function woo_remove_product_tab($tabs) {

    unset( $tabs['description'] );              // Remove the description tab
    unset( $tabs['reviews'] );                  // Remove the reviews tab
    unset( $tabs['additional_information'] );   // Remove the additional information tab

    return $tabs;
 
}

// add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tab', 98);

?>