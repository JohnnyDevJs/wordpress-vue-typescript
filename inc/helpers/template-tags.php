<?php
/**
 * Custom template tags for the theme.
 *
 * @package cm
 */

/**
 * cm copyright
 */

function cm_copyright() {

    $copyright = sprintf(
        '&copy; ' . get_bloginfo( 'name' ) . ' - ' . get_bloginfo( 'description' ) . ' ' . date( 'Y' ) . '. Todos os Direitos Reservados.'
    );

    echo $copyright;

}

function cm_breadcrumb() {

    $classes = get_body_class();

    $item = '';

    if ( in_array( 'single-post', $classes ) ) {
        global $post;
        $item = '<li class="breadcrumb-item"><a href="' . home_url( 'blog' ) . '">Blog</a></li>';
    }

    if ( in_array( 'page-child', $classes ) ) {
        global $post;
        $item = '<li class="breadcrumb-item">Sobre</li>';
    }

    if ( in_array( 'single-photos', $classes ) ) {
        $item = '<li class="breadcrumb-item"><a href="' . home_url( 'fotos' ) . '">Fotos</a></li>';
    }

    if ( in_array( 'blog', $classes ) ) {
        $title = 'Blog';
        $item = '';

    } else {
        $title = get_the_title();
    }

    if ( is_page( 'quem-sou' ) ) {
        $output = '
      <div class="breadcrumbs mb-4">
          <nav class="navbar navbar-expand-lg navbar-light px-3 ">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="' . home_url() . '">Início</a></li>
                ' . $item . '
                <li class="breadcrumb-item">' . $title . '</li>
              </ol>
            </nav>
          </nav>
        </div>';
    } else {
        $output = '
      <div class="breadcrumbs">
        <div class="container mb-4">
          <div class="row">
            <div class="col-12">
              <nav class="navbar navbar-expand-lg navbar-light px-3 ">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="' . home_url() . '">Início</a></li>
                    ' . $item . '
                    <li class="breadcrumb-item">' . $title . '</li>
                  </ol>
                </nav>
              </nav>
            </div>
          </div>
        </div>
      </div>';
    }

    return $output;
}

/**
 * cm meta.
 */

function cm_meta() {

    $categories = get_the_category();

    if ( !  empty( $categories ) ) {
        $category = esc_html( $categories[0]->name );
    }

    $html = '
      <div class="meta d-flex flex-column">
        <h5>
          <span class="badge badge-info bg-info">' . $category . '</span>
        </h5>
        <time class="text-uppercase">' . get_the_time( 'j \d\e F \d\e Y' ) . '</time>
      </div>';

    echo $html;
}

/**
 * cm socials.
 */

function cm_socials( ...$fields ) {

    $mods = get_theme_mods();

    $html = '';

    foreach ( $fields as $field ) {
        $html .= isset( $mods['cm_field_' . $field] ) ? '<li><a class="d-flex align-items-center text-info justify-content-center" href="' . $mods['cm_field_' . $field] . '" target="_blank"><i data-feather="' . $field . '"></i></a></li>' : '';
    }

    echo $html;

}

/**
 * cm clear posts or post types.
 */

function clear_posts_from_db() {

    global $wpdb;

    $wpdb->query( "DELETE FROM wp_posts WHERE post_type='schedule'" );
    $wpdb->query( "DELETE FROM wp_postmeta WHERE post_id NOT IN (SELECT id FROM wp_posts);" );
    $wpdb->query( "DELETE FROM wp_term_relationships WHERE object_id NOT IN (SELECT id FROM wp_posts)" );

}

//clear_posts_from_db();

function cm_pages_id( $title ) {

    $classes = get_body_class();

    if ( in_array( 'blog', $classes ) ):
        $page = get_page_by_title( $title );

        return ' page-id-' . $page->ID;
    endif;

}