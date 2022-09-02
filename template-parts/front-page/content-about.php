<?php
    /**
     * Content About Template.
     *
     * @package sjp
     */

    $args = [
        'post_type' => 'page',
        'post__in'  => [31]
    ];

    $about = new WP_Query( $args );
?>

<?php

    if ( $about->have_posts() ) {

        while ( $about->have_posts() ) {
            $about->the_post();
            $slug = sanitize_title( get_the_title() );
            $first_word = strtok( get_the_title(), " " );
            $last_word = strrchr( get_the_title(), " " );

            $sortable_gallery = get_post_meta( get_the_ID(), '_' . get_the_ID() . '_sortable_wordpress_gallery', true );
            $ids = explode( ",", $sortable_gallery );

            $html = '';

            $html .= '

            <section id="' . $slug . '" class="vh-100 position-relative">
              <div class="container h-100">
                <div class="row h-100 d-flex align-items-center">
                  <div class="col-12 col-md-12 col-lg-5 mb-lg-0 mb-3">
                    <div id="carouselAboutIndicators" class="carousel slide" data-bs-ride="true">
                    <div class="carousel-inner shadow-lg">';

            $count = 1;

            foreach ( $ids as $id ) {

                $active = $count++ === 1 ? 'active' : '';

                $html .= '
                  <div class="carousel-item ' . $active . ' position-relative overflow-hidden">
                    <figure class="mb-0">
                      <a target="_blank" href="' . wp_get_attachment_url( $id ) . '" data-fancybox="gallery">
                        <img class="img-fluid object-cover position-absolute w-100 h-100" src="' . wp_get_attachment_url( $id ) . '" alt="Imagem da Selhareria Jovem Profeta" />
                      </a>
                    </figure>
                  </div>';
            }

            $html .= '

                      </div>

                      <button class="carousel-control-prev" type="button" data-bs-target="#carouselAboutIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                      </button>
                      <button class="carousel-control-next" type="button" data-bs-target="#carouselAboutIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                      </button>
                    </div>
                     </div>

                     <div class="col-12 col-md-12 col-lg-7 ps-4 text-lg-start text-center">
                  <h1 class="display-3 text-light-red fw-bold animate-fadeInUp-9"><span class="text-light-gray fw-semibold">' . $first_word . '</span> ' . $last_word . '</h1>
                  <div class="text-secondary animate-fadeInUp-9 animate-delay-2">' . get_the_content() . '</div>
                </div>

                </div>
              </div>';

            $html .= sjp_anchor_section( 'portfolio', 'text-light-red' );
            $html .= '</section>';

            echo $html;

        }

    }

?>