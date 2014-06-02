<?php
  add_action ('woocommerce_before_single_product_summary', 'toro_woocommerce_before_single_product_summary', 5);

  function toro_woocommerce_before_single_product_summary () {

    echo '<div class="bg-single-top">'; //
    echo '<div class="container">'; //
    echo '<div class="row">'; //

  }



  add_action ('woocommerce_after_single_product_summary', 'toro_woocommerce_after_single_product_summary', 1);

  function toro_woocommerce_after_single_product_summary () {

    echo '</div>'; // END .row
    echo '</div>'; // END .container
    echo '</div>'; // END .bg-single-top

  }

  add_action ('woocommerce_after_single_product_summary', 'toro_woocommerce_product_description', 10);

  function toro_woocommerce_product_description () { ?>

    <div class="bg-description">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <h2><?php the_title(); ?></h2>
            <?php the_content(); ?>
          </div>
        </div>
      </div>
    </div>

  <?php }






 ?>
