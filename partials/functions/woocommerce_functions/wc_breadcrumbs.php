<?php
  add_filter( 'woocommerce_breadcrumb_defaults', 'jk_woocommerce_breadcrumbs' );
  function jk_woocommerce_breadcrumbs() {
      return array(
              'delimiter'   => ' &#47; ',
              'wrap_before' => '<div class="container"><div class="row"><div class="col-sm-12"><nav class="breadcrumb" itemprop="breadcrumb">',
              'wrap_after'  => '</nav></div></div></div>',
              'before'      => '',
              'after'       => '',
              'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
          );
  }
 ?>
