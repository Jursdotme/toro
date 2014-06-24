<?php

  add_action ('woocommerce_after_shop_loop', 'toro_woocommerce_close_loop', 9);

  function toro_woocommerce_close_loop () {

    echo '</div>'; // END Row

  };

  add_action ('woocommerce_after_shop_loop', 'toro_woocommerce_after_shop_loop', 11);

  function toro_woocommerce_after_shop_loop () {

    echo '</div>'; // END CONTAINER

  };


 ?>
