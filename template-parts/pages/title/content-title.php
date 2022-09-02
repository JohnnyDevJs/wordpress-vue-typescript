<?php
    /**
     * Content Page Title Template.
     *
     * @package cm
     */

    $mods = get_theme_mods();

    $background_page_title = isset( $mods['cm_field_pages_title_image'] ) ? $mods['cm_field_pages_title_image'] : '';

    $classes = get_body_class();
?>

<div class="page-title py-3 bg-info position-relative overflow-hidden">
  <div class="container">
    <div class="row">
      <div class="col-6 col-md-10 position-relative d-flex align-items-center">
        <?php

            if ( in_array( 'blog', $classes ) ) {
                echo '<h1 class="fw-bold text-white mb-0">Blog</h1>';
            } else {
                the_title( '<h1 class="fw-bold text-white mb-0">', '</h1>' );
            }

        ?>
      </div>
      <div class="col-6 col-md-2">
        <img class="img-fluid object-right w-100 h-100" src="<?php echo $background_page_title; ?>"
          alt="<?php get_the_title();?>" />
      </div>

    </div>
  </div>
</div>