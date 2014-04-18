<?php


/********************* MENUS & NAVIGATION *********************/


// wp menus
    add_theme_support( 'menus' );

    // registering wp3+ menus
    register_nav_menus(
        array(
            'desktop_nav' => __( 'Desktop Menu', 'torotheme' ),   // main nav in header
        )
    );

// Register Custom Navigation Walker
require_once('wp_bootstrap_navwalker.php');

// the main desktop menu
function desktop_nav() {
    // display the wp3 menu if available
    wp_nav_menu(array(
        'menu'              => __( 'Desktop Menu', 'torotheme' ),    // nav name
        'theme_location'    => 'desktop_nav',
        'depth'             => 2,
        'container'         => 'div',
        'container_class'   => 'collapse navbar-collapse',
        'container_id'      => 'bs-example-navbar-collapse-1',
        'menu_class'        => 'nav navbar-nav navbar-right',
        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
        'walker'            => new wp_bootstrap_navwalker()
    ));
} /* end toro desktop main nav */


 ?>
