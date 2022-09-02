<?php
    /**
     * Content About Template.
     *
     * @package cm
     */

    $args = [
        'post_type' => 'page',
        'name'      => 'quem-sou'
    ];

    $about = new WP_Query( $args );
?>


<?php

    if ( $about->have_posts() ) {

        while ( $about->have_posts() ) {
            $about->the_post();
            $slug = sanitize_title( get_the_title() );
            $cover = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
            $cover = $cover ? $cover[0] : '';

            $html = '';
            $html .= '<div class="col-12 col-md-12 col-lg-6 position-relative bg-info">';
            $html .= '<div id="home-about" class="d-flex align-items-center flex-sm-row flex-column">';

            $html .= '<figure class="mb-0 photo me-sm-3">';
            $html .= '<img src="' . $cover . '" alt="Cristina Mel" class="img-fluid" />';
            $html .= '</figure>';

            $html .= '<div class="about-info d-flex flex-column align-items-sm-start align-items-center justify-content-center w-100 p-4">';
            $html .= '<h6 class="text-uppercase text-white mb-4">Sobre</h6>';
            $html .= '<h2 class="display-4 fw-bold mb-0">Cristina</h2>';
            $html .= '<h1 class="display-1 fw-bold text-white mb-0">Mel</h1>';
            $html .= '<p class="text-white text-sm-start text-center">' . get_the_excerpt() . '</p>';
            $html .= '<a href="' . home_url( 'sobre/quem-sou' ) . '" class="btn btn-primary fw-bold">Conheça Cristina Mel</a>';
            $html .= '</div>';

            $html .= '</div>';
            $html .= '</div>';

        }

        echo $html;

    }

?>