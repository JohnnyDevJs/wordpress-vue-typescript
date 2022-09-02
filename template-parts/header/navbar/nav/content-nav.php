<?php
    /**
     * Content Nav Template.
     *
     * @package sjp
     */

    $menu_class = \SJP_THEME\Inc\Menus::get_instance();
    $header_menu_id = $menu_class->get_menu_id( 'sjp-header-menu' );
    $header_menu_items = wp_get_nav_menu_items( $header_menu_id );
?>

<div class="collapse navbar-collapse d-lg-flex justify-content-end me-4" id="navbar">
  <?php

      if ( !  empty( $header_menu_items ) && is_array( $header_menu_items ) ) {
          $menu = '';

          $menu .= '<ul class="navbar-nav">';

          foreach ( $header_menu_items as $menu_item ) {

              if ( !  $menu_item->menu_item_parent ) {

                  if ( !  $menu_item->menu_item_parent ) {
                      $child_menu_items = $menu_class->get_child_menu_items( $header_menu_items, $menu_item->ID );
                      $has_children = !  empty( $child_menu_items ) && is_array( $child_menu_items );
                      $has_menu_class = $menu_item->classes[0] ? $menu_item->classes[0] . ' ' . $menu_item->classes[1] : 'nav-link pe-md-0 px-md-0 p-md-0';
                      $has_menu_post_name = $menu_item->post_name;

                      $menu .= '
                        <li class="nav-item d-flex align-items-center">
                          <a class="text-uppercase fw-semibold text-white ' . esc_html( $has_menu_class ) . '" href="' . esc_url( $menu_item->url ) . '">
                            ' . esc_html( $menu_item->title ) . '
                          </a>
                        </li>';
                  }

              }

          }

          $menu .= '</ul>';

          echo $menu;

      }

  ?>


</div>