<?php


/********************* MENUS & NAVIGATION *********************/


// wp menus
    add_theme_support( 'menus' );

    // registering wp3+ menus
    register_nav_menus(
        array(
            'topbar' => __( 'Topbar Menu', 'toro' ),   // main nav in header
            'footer_nav' => __( 'Footer Menu', 'toro' ),   // main nav in header
        )
    );


/********************* DESKTOP NAVIGATION *********************/

// Register Custom Navigation Walker
require_once('wp_bootstrap_navwalker.php');

// the main desktop menu
function topbar() {
    // display the wp3 menu if available
    wp_nav_menu(array(
        'menu'              => __( 'Desktop Menu', 'toro' ),    // nav name
        'theme_location'    => 'topbar',
        'depth'             => 2,
        'container'         => 'div',
        'container_class'   => 'collapse navbar-collapse',
        'container_id'      => 'bs-example-navbar-collapse-1',
        'menu_class'        => 'nav navbar-nav navbar-left',
        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
        'walker'            => new wp_bootstrap_navwalker()
    ));
} /* end toro desktop main nav */

/********************* MENUS & NAVIGATION *********************/

// Register Custom Navigation Walker
require_once('wp_footer_navwalker.php');


// the main desktop menu
function footer_nav() {
    // display the wp3 menu if available
    wp_nav_menu(array(
        'theme_location'  => 'footer_nav',
        'menu'            => __( 'Footer Menu', 'toro' ),
        'container'       => '',
        'container_class' => '',
        'container_id'    => 'footer_nav',
        'menu_class'      => 'menu',
        'menu_id'         => '',
        'echo'            => true,
        'fallback_cb'     => 'wp_page_menu',
        'before'          => '',
        'after'           => '',
        'link_before'     => '',
        'link_after'      => '',
        'items_wrap'      => '%3$s',
        'depth'           => 0,
        'walker'          => new wp_footer_navwalker()
    ));
} /* end toro desktop main nav */


 ?>
