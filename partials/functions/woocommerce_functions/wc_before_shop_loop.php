<?php
// Remove Archive page title
  function override_page_title() {
    return false;
  };

    add_filter('woocommerce_show_page_title', 'override_page_title');


// Remove default markup form woocommerce
  remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
  remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);


// Add Bootstrap page-title
  add_action('woocommerce_before_main_content', 'toro_woocommerce_before_main_content', 20);

  function toro_woocommerce_before_main_content() {
      ?>
        <div class="container">
          <div class="row">
            <div class="col-sm-12">
              <div class='page-header'>
                <h1><?php woocommerce_page_title(); ?></h1>
              </div>
            </div>
          </div>
        </div>
      <?php ;
  };


// Add container row and columns to Result Count and Ordering dropdown
  add_action ('woocommerce_before_shop_loop', 'toro_woocommerce_before_shop_loop_container_open', 10);
  add_action ('woocommerce_before_shop_loop', 'toro_woocommerce_before_shop_loop_container_close', 40);

  function toro_woocommerce_before_shop_loop_container_open () {
    echo
      '<div class="container">
        <div class="row">
          <div class="col-sm-12">'


  ;}

  function toro_woocommerce_before_shop_loop_container_close () {
    echo
          '</div>
        </div>
      </div>
      <div class="bg-products">
        <div class="container">'
  ;}


 ?>
