<?php

/***********  RENAME DEFAULT POST TYPE  ***********/
  function revcon_change_post_label() {
      global $menu;
      global $submenu;
      $menu[5][0] = 'News';
      $submenu['edit.php'][5][0] = __( 'News', 'toro' );
      $submenu['edit.php'][10][0] = __( 'Add News', 'toro' );
      $submenu['edit.php'][16][0] = __( 'News Tags', 'toro' );
      echo '';
  }
  function revcon_change_post_object() {
      global $wp_post_types;
      $labels = &$wp_post_types['post']->labels;
      $labels->name = __( 'News', 'toro' );
      $labels->singular_name = __( 'News', 'toro' );
      $labels->add_new = __( 'Add News', 'toro' );
      $labels->add_new_item = __( 'Add News', 'toro' );
      $labels->edit_item = __( 'Edit News', 'toro' );
      $labels->new_item = __( 'News', 'toro' );
      $labels->view_item = __( 'View News', 'toro' );
      $labels->search_items = __( 'Search News', 'toro' );
      $labels->not_found = __( 'No News found', 'toro' );
      $labels->not_found_in_trash = __( 'No News found in Trash', 'toro' );
      $labels->all_items = __( 'All News', 'toro' );
      $labels->menu_name = __( 'News', 'toro' );
      $labels->name_admin_bar = __( 'News', 'toro' );
  }

  add_action( 'admin_menu', 'revcon_change_post_label' );
  add_action( 'init', 'revcon_change_post_object' );
 ?>
