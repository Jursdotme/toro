<?php
add_action ('woocommerce_after_single_product_summary', 'toro_woocommerce_before_related_products', 19);

function toro_woocommerce_before_related_products () {

  echo '<div class="bg-related-products">'; //
  echo '<div class="container">'; //
  echo '<div class="row">'; //

}

add_action ('woocommerce_after_single_product_summary', 'toro_woocommerce_after_related_products', 21);

function toro_woocommerce_after_related_products () {

  echo '</div>'; //
  echo '</div>'; //
  echo '</div>'; //

} ?>
