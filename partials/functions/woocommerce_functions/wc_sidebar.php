<?php

  add_action ('woocommerce_sidebar', 'toro_woocommerce_close_container', 12);

  function toro_woocommerce_close_container () {

    echo '</div>'; // END ROW
    echo '</div>'; // END CONTAINER

  };


 ?>
