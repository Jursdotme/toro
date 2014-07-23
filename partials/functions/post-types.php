<?php

/***********  RENAME DEFAULT POST TYPE  ***********/
  function revcon_change_post_label() {
      global $menu;
      global $submenu;
      $menu[5][0] = __( 'News', 'toro_developer' );
      $submenu['edit.php'][5][0] = __( 'News', 'toro_developer' );
      $submenu['edit.php'][10][0] = __( 'Add News', 'toro_developer' );
      $submenu['edit.php'][16][0] = __( 'News Tags', 'toro_developer' );
      echo '';
  }
  function revcon_change_post_object() {
      global $wp_post_types;
      $labels = &$wp_post_types['post']->labels;
      $labels->name = __( 'News', 'toro_developer' );
      $labels->singular_name = __( 'News', 'toro_developer' );
      $labels->add_new = __( 'Add News', 'toro_developer' );
      $labels->add_new_item = __( 'Add News', 'toro_developer' );
      $labels->edit_item = __( 'Edit News', 'toro_developer' );
      $labels->new_item = __( 'News', 'toro_developer' );
      $labels->view_item = __( 'View News', 'toro_developer' );
      $labels->search_items = __( 'Search News', 'toro_developer' );
      $labels->not_found = __( 'No News found', 'toro_developer' );
      $labels->not_found_in_trash = __( 'No News found in Trash', 'toro_developer' );
      $labels->all_items = __( 'All News', 'toro_developer' );
      $labels->menu_name = __( 'News', 'toro_developer' );
      $labels->name_admin_bar = __( 'News', 'toro_developer' );
  }

  add_action( 'admin_menu', 'revcon_change_post_label' );
  add_action( 'init', 'revcon_change_post_object' );
 ?>
