<?php
    /**
     * Content Options Template.
     *
     * @package cm
     */

    $mods = get_theme_mods();

    $image = isset( $mods['cm_field_options_image'] ) ? $mods['cm_field_options_image'] : '';

?>

<section id="options" class="d-flex align-items-center position-relative">
  <figure class="logo position-absolute mb-0 top-0">
    <img src="<?php echo $image; ?>" alt="Cristina Mel" class="img-fluid" />
  </figure>
  <div class="container-fluid d-lg-flex">
    <div class="row">

      <?php
          get_template_part( 'template-parts/front-page/options/about/content', 'about' );
          get_template_part( 'template-parts/front-page/options/schedule/content', 'schedule' );
          get_template_part( 'template-parts/front-page/options/defend/content', 'defend' );
      ?>
    </div>
  </div>
</section>