<?php
    /**
     * Page About Template.
     * Template Name: Page about
     * @package cm
     */

    get_header();

    $mods = get_theme_mods();

    $image_about = isset( $mods['cm_field_about_image'] ) ? $mods['cm_field_about_image'] : '';
    $background_about = isset( $mods['cm_field_about_background'] ) ? $mods['cm_field_about_background'] : '';
?>

<section id="page" class="bg-light page-<?php echo sanitize_title( get_the_title() ); ?> position-relative">

  <div class="container h-100">
    <div class="row h-100">
      <div class="col-12 col-lg-5 col-md-12 h-100 mt-auto order-one">
        <figure class="figure-cristina-mel position-relative mb-0 h-100">
          <img src="<?php echo $image_about; ?>" class="img-fluid mb-0 h-100" />
        </figure>
      </div>
      <div class="col-12 col-lg-7 col-md-12 py-5 d-flex flex-column justify-content-center">
        <?php echo cm_breadcrumb( get_the_title() ); ?>
        <h1 class="display-4 fw-bold text-primary mb-2">Cristina Mel</h1>
        <div class="fs-5"><?php echo get_the_content(); ?></div>

      </div>
    </div>
  </div>
</section>

<?php
get_footer();
?>