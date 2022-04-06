<?php
/**
 * Custom template tags for the theme.
 *
 * @package cdr
 */

/**
 * Gets the thumbnail with Lazy Load.
 * Should be called in the WordPress Loop.
 *
 * @param  int|null $post_id               Post ID.
 * @param  string   $size                  The registered image size.
 * @param  array    $additional_attributes Additional attributes.
 * @return string
 */
function get_the_post_custom_thumbnail( $post_id, $size = 'featured-thumbnail', $additional_attributes = [] ) {
    $custom_thumbnail = '';

    if ( null === $post_id ) {
        $post_id = get_the_ID();
    }

    if ( has_post_thumbnail( $post_id ) ) {
        $default_attributes = [
            'loading' => 'lazy'
        ];

        $attributes = array_merge( $additional_attributes, $default_attributes );

        $custom_thumbnail = wp_get_attachment_image(
            get_post_thumbnail_id( $post_id ),
            $size,
            false,
            $attributes
        );
    }

    return $custom_thumbnail;
}

/**
 * Renders Custom Thumbnail with Lazy Load.
 *
 * @param int    $post_id               Post ID.
 * @param string $size                  The registered image size.
 * @param array  $additional_attributes Additional attributes.
 */
function the_post_custom_thumbnail( $post_id, $size = 'featured-thumbnail', $additional_attributes = [] ) {
    echo get_the_post_custom_thumbnail( $post_id, $size, $additional_attributes );
}

/**
 * Iro Copyright.
 *
 * @return void
 */

function cdr_copyright() {

    $copyright = sprintf(
        '&copy; ' . get_bloginfo( 'name' ) . ' - ' . get_bloginfo( 'description' ) . ' ' . date( 'Y' ) . '. Todos os Direitos Reservados.'
    );

    return $copyright;

}

/**
 * Iro Breadcrumb.
 *
 * @return void
 */

function cdr_breadcrumb( $main_page, $page_parent = '' ) {

    $home_link = get_home_url();

    if ( !  empty( $page_parent ) ):
        $page_parent = '<li class="breadcrumb-item d-flex align-items-center" aria-current="page">' . $page_parent . '</li>';
    endif;

    $breadcrumb = '
    <nav class="page-breadcrumb d-flex align-items-center justify-content-center shadow bg-white text-center py-1 px-3 d-flex position-absolute">
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="' . $home_link . '">Home</a></li>
        ' . $page_parent . '
        <li class="breadcrumb-item active d-flex align-items-center" aria-current="page">' . $main_page . '</li>
      </ol>
    </nav>';

    return $breadcrumb;
}

function cdr_authentication() {

    $is_user_logged_in = is_user_logged_in();
    $home_url = home_url();

    if ( $is_user_logged_in ) {
        wp_redirect( $home_url );
        exit();
    }

}