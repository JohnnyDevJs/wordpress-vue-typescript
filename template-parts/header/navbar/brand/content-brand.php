<?php
    /**
     * Content Brand Template.
     *
     * @package cm
     */

    $brand_id = get_theme_mod( 'custom_logo' );
    $brand = wp_get_attachment_image_src( $brand_id, 'full' );
?>

<?php

if ( has_custom_logo() ) {?>

<a class="navbar-brand m-0" href="<?php echo esc_url( home_url() ); ?>">
  <img class="img-fluid m-0" src="<?php echo $brand[0]; ?>"
    alt="<?php echo get_bloginfo( 'name' ) . ' | ' . get_bloginfo( 'description' ); ?>">
</a>

<?php }