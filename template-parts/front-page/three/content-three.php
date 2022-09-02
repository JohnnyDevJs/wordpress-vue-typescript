<?php
    /**
     * Content Three Template.
     *
     * @package cm
     */

    $mods = get_theme_mods();

    $image = $mods['cm_field_materials_image'];
    $image_multimedia = isset( $mods['cm_field_materials_multimedia'] ) ? $mods['cm_field_materials_multimedia'] : '';
    $image_mockup = isset( $mods['cm_field_materials_mockup'] ) ? $mods['cm_field_materials_mockup'] : '';
    $image_videos = isset( $mods['cm_field_materials_videos'] ) ? $mods['cm_field_materials_videos'] : '';
    $image_audios = isset( $mods['cm_field_materials_audios'] ) ? $mods['cm_field_materials_audios'] : '';

?>

<section id="three" class="bg-light position-relative">
  <figure class="figure-mockup bg-three w-50 h-100 m-0 position-absolute overflow-hidden">
    <img class="img-fluid w-100 object-cover h-100" src="<?php echo $image_mockup; ?>" alt="Materiais Cristina Mel" />
  </figure>

  <div class="container-fluid h-100 position-relative">
    <div class="row h-100">
      <div class="col-12 col-lg-6 col-md-6 left">
        <div class="row h-100">
          <div
            class="col-12 col-xl-4 col-lg-5 col-md-6 col-sm-6 d-flex align-items-md-start align-items-center justify-content-center flex-column mt-md-0 mt-4">
            <h4 class="mb-0 text-uppercase text-white mb-2">Baixe nosso</h4>
            <h1 class="display-5 fw-bold text-white">material de <br />campanha</h1>
            <h4 class="fw-bold text-white mt-2">e ajude a divulgar</h4>
            <a href="<?php echo home_url( 'downloads' ); ?>" class="btn btn-primary fw-bold mt-2">Baixar material</a>
          </div>
          <div class="col-12 col-xl-8 col-lg-7 col-md-6 col-sm-6 d-flex align-items-center">
            <img class="img-fluid" src="<?php echo $image; ?>"
              alt="Baixe nosso material de camapnha e ajude a divulgar." />
          </div>
          <div class="col-12 p-0 bg-primary py-4 px-3 d-flex align-items-center">
            <div class="avatar d-flex align-items-center">
              <img src="https://via.placeholder.com/100" class="img-fluid me-4" />
              <div class="d-flex align-items flex-column align-items-start justify-content-center w-100">
                <h1 class="display-6 mb-3"><span class="text-white">Use nosso</span> <span
                    class="text-info fw-bold">avatar!</span>
                </h1>
                <a href="#" class="btn btn-info fw-bold text-white">Acesse o Twibbon</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-6 col-md-6 p-0 shadow-4-soft right">
        <div class="d-flex flex-column h-100">
          <div class="multimedia-title shadow position-relative p-5">

            <div class="d-flex flex-column justify-content-center">
              <h1 class="display-4 fw-bold text-white mb-n3 d-flex flex-column">Conteúdo</h1>
              <h1 class="display-3 fw-bold text-info mb-0">multimídia</h1>
            </div>
            <figure class="figure-multimedia shadow bg-three h-100 m-0 position-absolute overflow-hidden">
              <img class="img-fluid w-100 object-contain h-100" src="<?php echo $image_multimedia; ?>"
                alt="Materiais Cristina Mel" />
            </figure>

          </div>
          <div class="d-flex h-100">
            <div class="col-12 col-md-12 h-100 pe-0">
              <div
                class="videos shadow position-relative p-4 bg-info h-100 d-flex align-items-center justify-content-center flex-column">
                <figure class="figure-videos w-100 h-100 m-0 position-absolute overflow-hidden">
                  <img class="img-fluid w-100 object-cover object-top h-100" src="<?php echo $image_videos; ?>"
                    alt="Acompanhe os vídeos de campanha da trajetória da Cristina Mel" />
                </figure>
                <span class="icon p-4 mb-3 d-flex align-items-center justify-content-center bg-white shadow-4-soft">
                  <i data-feather="youtube" width="35" height="35" stroke="#283593" stroke-width="2"></i>
                </span>
                <h4 class="text-white fw-bold display-6">Vídeos</h4>
                <p class="text-white text-center fs-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque
                  sapien
                  velit, aliquet eget commodo
                  nec, auctor a sapien.</p>

                <a href="<?php echo home_url( 'videos' ); ?>" class="btn btn-primary fw-bold">Ver vídeos</a>
              </div>
            </div>
            <!-- <div class="col-12 col-md-6 h-100 px-0">
              <div
                class="videos shadow-5-strong position-relative p-4 bg-info h-100 d-flex align-items-center justify-content-center flex-column">
                <figure class="figure-videos w-100 h-100 m-0 position-absolute overflow-hidden">
                  <img class="img-fluid w-100 object-cover h-100" src="<?php echo $image_audios; ?>"
                    alt="Ouça os áudios de campanha da trajetória da Cristina Mel" />
                </figure>
                <span class="icon p-3 mb-3 d-flex align-items-center justify-content-center bg-white shadow-3-soft">
                  <i data-feather="volume-2" width="30" height="30" stroke="#283593" stroke-width="2"></i>
                </span>
                <h4 class="text-white fw-bold">Áudios</h4>
                <p class="text-white text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque
                  sapien
                  velit, aliquet eget commodo
                  nec, auctor a sapien.</p>

                <a href="<?php echo home_url( 'audios' ); ?>" class="btn btn-primary fw-bold">Baixar áudios</a>
              </div>
            </div> -->
          </div>
        </div>
      </div>
    </div>

</section>