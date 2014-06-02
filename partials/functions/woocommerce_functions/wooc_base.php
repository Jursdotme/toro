<?php
/********************* DECLARE THEME SUPPORT *********************/
  add_action( 'after_setup_theme', 'woocommerce_support' );
  function woocommerce_support() {
      add_theme_support( 'woocommerce' );
  }

/********************* DISABLE DEFAULT STYLES *********************/

  define('WOOCOMMERCE_USE_CSS', false);

  require_once( 'wc_breadcrumbs.php' );
  require_once( 'wc_before_shop_loop.php' );
  require_once( 'wc_after_shop_loop.php' );
  require_once( 'wc_single_product.php' );
  require_once( 'wc_notices.php' );
  require_once( 'wc_single_tabs.php' );
  require_once( 'wc_related_products.php' );
 ?>
