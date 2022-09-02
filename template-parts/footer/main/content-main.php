<?php
    /**
     * Content Main Template.
     *
     * @package sjp
     */

    $brand_id = get_theme_mod( 'custom_logo' );
    $brand = wp_get_attachment_image_src( $brand_id, 'full' );
?>


<div class="main-footer py-3">
  <div class="container">
    <div class="row position-relative">
      <div
        class="col-12 col-md-10 d-flex text-md-start text-center justify-content-md-start justify-content-center order-md-0 order-1">
        <?php get_template_part( 'template-parts/footer/main/nav/content', 'nav' );?>
      </div>
      <div
        class="footer-social col-12 col-md-2 d-flex align-items-center justify-content-md-end justify-content-center mb-md-0 mb-2">
        <?php get_template_part( 'template-parts/components/content', 'social' );?>
      </div>
    </div>
  </div>
</div>