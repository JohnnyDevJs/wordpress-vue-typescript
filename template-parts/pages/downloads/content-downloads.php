<?php
    /**
     * Content Page Downloads Template.
     *
     * @package cm
     */

    $mods = get_theme_mods();

    $sticker = isset( $mods['cm_field_downloads_sticker'] ) ? $mods['cm_field_downloads_sticker'] : '';
    $informative_front = isset( $mods['cm_field_downloads_informativo_front'] ) ? $mods['cm_field_downloads_informativo_front'] : '';
    $informative_verse = isset( $mods['cm_field_downloads_informativo_verse'] ) ? $mods['cm_field_downloads_informativo_verse'] : '';
    $photo_oficial = isset( $mods['cm_field_downloads_oficial_photo'] ) ? $mods['cm_field_downloads_oficial_photo'] : '';
    $photo_oficial_two = isset( $mods['cm_field_downloads_photo_oficial_two'] ) ? $mods['cm_field_downloads_photo_oficial_two'] : '';

    $logo_one = isset( $mods['cm_field_downloads_logo_one'] ) ? $mods['cm_field_downloads_logo_one'] : '';
    $logo_two = isset( $mods['cm_field_downloads_logo_two'] ) ? $mods['cm_field_downloads_logo_two'] : '';
    $logo_horizontal_shadow = isset( $mods['cm_field_downloads_logo_horizontal_shadow'] ) ? $mods['cm_field_downloads_logo_horizontal_shadow'] : '';
    $logo_vertical_shadow = isset( $mods['cm_field_downloads_logo_vertical_shadow'] ) ? $mods['cm_field_downloads_logo_vertical_shadow'] : '';
?>

<div class="page-content py-5">
  <?php echo cm_breadcrumb( get_the_title() ); ?>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="downloads-items">
          <div class="download-item shadow-4-soft mb-4 overflow-hidden">
            <h3 class="download-header fw-bold p-3 text-white mb-0">Adesivos</h3>
            <div class="download-content p-3">

              <ul class="d-flex p-0  m-0 justify-content-between align-items-center list-unstyled">
                <li>
                  <h5 class="text-gray mb-0">Adesivo 80x45</h5>
                </li>
                <li>
                  <a class="btn btn-info fw-bold text-white" href="<?php echo $sticker ?>" download>Download</a>
                </li>
              </ul>
            </div>
          </div>

          <div class="download-item shadow-4-soft mb-4 overflow-hidden">
            <h3 class="download-header fw-bold p-3 text-white mb-0">Informativos</h3>
            <div class="download-content p-3">

              <ul class="d-flex p-0 m-0 mb-3 justify-content-between align-items-center list-unstyled">
                <li>
                  <h5 class="text-gray mb-0">Informativo frente</h5>
                </li>
                <li>
                  <a class="btn btn-info fw-bold text-white" href="<?php echo $informative_front ?>"
                    download>Download</a>
                </li>
              </ul>

              <ul class="d-flex p-0 m-0 justify-content-between align-items-center list-unstyled">
                <li>
                  <h5 class="text-gray mb-0">Informativo verso</h5>
                </li>
                <li>
                  <a class="btn btn-info fw-bold text-white" href="<?php echo $informative_verse ?>"
                    download>Download</a>
                </li>
              </ul>

            </div>
          </div>

          <div class="download-item shadow-4-soft mb-4 overflow-hidden">
            <h3 class="download-header fw-bold p-3 text-white mb-0">Fotos</h3>
            <div class="download-content p-3">

              <ul class="d-flex p-0 m-0 mb-3 justify-content-between align-items-center list-unstyled">
                <li>
                  <h5 class="text-gray mb-0">Foto oficial</h5>
                </li>
                <li>
                  <a class="btn btn-info fw-bold text-white" href="<?php echo $photo_oficial ?>" download>Download</a>
                </li>
              </ul>

              <ul class="d-flex p-0 m-0 justify-content-between align-items-center list-unstyled">
                <li>
                  <h5 class="text-gray mb-0">Foto oficial 2</h5>
                </li>
                <li>
                  <a class="btn btn-info fw-bold text-white" href="<?php echo $photo_oficial_two ?>"
                    download>Download</a>
                </li>
              </ul>

            </div>
          </div>

          <div class="download-item shadow-4-soft mb-4 overflow-hidden">
            <h3 class="download-header fw-bold p-3 text-white mb-0">Logos</h3>
            <div class="download-content p-3">

              <ul class="d-flex p-0 m-0 mb-3 justify-content-between align-items-center list-unstyled">
                <li>
                  <h5 class="text-gray mb-0">Logo 1</h5>
                </li>
                <li>
                  <a class="btn btn-info fw-bold text-white" href="<?php echo $logo_one ?>" download>Download</a>
                </li>
              </ul>

              <ul class="d-flex p-0 m-0 mb-3 justify-content-between align-items-center list-unstyled">
                <li>
                  <h5 class="text-gray mb-0">Logo 2</h5>
                </li>
                <li>
                  <a class="btn btn-info fw-bold text-white" href="<?php echo $logo_two ?>" download>Download</a>
                </li>
              </ul>

              <ul class="d-flex p-0 m-0 mb-3 justify-content-between align-items-center list-unstyled">
                <li>
                  <h5 class="text-gray mb-0">Logo horizontal com sombra</h5>
                </li>
                <li>
                  <a class="btn btn-info fw-bold text-white" href="<?php echo $logo_horizontal_shadow ?>"
                    download>Download</a>
                </li>
              </ul>

              <ul class="d-flex p-0 m-0 justify-content-between align-items-center list-unstyled">
                <li>
                  <h5 class="text-gray mb-0">Logo vertical com sombra</h5>
                </li>
                <li>
                  <a class="btn btn-info fw-bold text-white" href="<?php echo $logo_vertical_shadow ?>"
                    download>Download</a>
                </li>
              </ul>

            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>