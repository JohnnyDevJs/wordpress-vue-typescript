<?php
/**
 * Custom template tags for the theme.
 *
 * @package sjp
 */

/**
 * Sjp Copyright.
 */

function sjp_copyright() {

    $copyright = sprintf(
        '&copy; ' . get_bloginfo( 'name' ) . ' - ' . get_bloginfo( 'description' ) . ' ' . date( 'Y' ) . '. Todos os Direitos Reservados.'
    );

    return $copyright;

}

/**
 * Sjp Anchor Section.
 */

function sjp_anchor_section( $anchor_url, $color ) {

    $anchor = '
    <a class="anchor-section position-absolute z-index-1 text-center" href="#' . $anchor_url . '" class="position-absolute">
      <i class="fas fa-chevron-down fa-2xl ' . $color . ' animate-infinite-bounce"></i>
    </a>';

    return $anchor;
}