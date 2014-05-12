<?php
/********************* DECLARE THEME SUPPORT *********************/
  add_action( 'after_setup_theme', 'woocommerce_support' );
  function woocommerce_support() {
      add_theme_support( 'woocommerce' );
  }

/********************* DISABLE DEFAULT STYLES *********************/

  define('WOOCOMMERCE_USE_CSS', false);
  
 ?>
