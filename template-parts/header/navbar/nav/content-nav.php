<?php
    /**
     * Content Nav Template.
     *
     * @package cm
     */

    $menu_class = \CM_THEME\Inc\Menus::get_instance();
    $header_menu_id = $menu_class->get_menu_id( 'cm-header-menu' );
    $header_menu_items = wp_get_nav_menu_items( $header_menu_id );

?>

<div class="collapse navbar-collapse justify-content-evenly" id="navbar">
  <?php

      if ( !  empty( $header_menu_items ) && is_array( $header_menu_items ) ) {
          $menu = '';

          $menu .= '<ul class="navbar-nav mb-lg-0">';

          foreach ( $header_menu_items as $menu_item ) {

              if ( !  $menu_item->menu_item_parent ) {
                  $child_menu_items = $menu_class->get_child_menu_items( $header_menu_items, $menu_item->ID );
                  $has_sub_menu_class = !  empty( $has_children ) ? 'has-submenu' : '';
                  $has_children = !  empty( $child_menu_items ) && is_array( $child_menu_items );
                  $has_menu_class = $menu_item->classes[0] ? $menu_item->classes[0] . ' ' . $menu_item->classes[1] : 'nav-link pe-md-0 px-md-0 p-md-0';
                  $body_class = get_body_class();
                  $page_id = 'page-id-' . $menu_item->object_id;
                  $single_id = 'postid-' . $menu_item->object_id;
                  $page_slug = sanitize_title( $menu_item->title );

                  if ( in_array( 'blog', $body_class ) ):
                      $has_current_menu_class_active = in_array( $page_slug, $body_class ) ? 'active' : '';
                  else:
                      $has_current_menu_class_active = in_array( $page_id, $body_class ) ? 'active' : '';
                  endif;

                  if ( !  $has_children ) {
                      $menu .= '
                        <li class="nav-item d-flex align-items-center">
                          <a class="text-uppercase text-blue-800 ' . esc_html( $has_current_menu_class_active ) . ' ' . esc_html( $has_menu_class ) . '" href="' . esc_url( $menu_item->url ) . '">
                            ' . esc_html( $menu_item->title ) . '
                          </a>
                        </li>';
                  } else {
                      $menu .= '
                        <li class="nav-item dropdown">
                          <a class="text-uppercase text-blue-800 nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                            ' . esc_html( $menu_item->title ) . '

                          </a>
                          <ul class="dropdown-menu shadow-4-soft border-0 bg-light" aria-labelledby="navbarDropdownMenuLink">';

                      foreach ( $child_menu_items as $child_menu_item ) {
                          $link_target = !  empty( $child_menu_item->target ) && "_blank" === $child_menu_item->target ? "_blank" : "_self";
                          $child_submenu_items = $menu_class->get_child_menu_items( $header_menu_items, $child_menu_item->ID );

                          $menu .= '
                              <li class="m-0">
                              <a class="dropdown-item text-blue-800" href="' . esc_url( $child_menu_item->url ) . '">' . $child_menu_item->title . '</a>
                              </li>';
                      }

                      $menu .= '</ul>
                        </li>';
                  }

              }

          }

          $menu .= '</ul>';

          echo $menu;

          get_template_part( 'template-parts/components/content', 'social' );

      }

  ?>


</div>