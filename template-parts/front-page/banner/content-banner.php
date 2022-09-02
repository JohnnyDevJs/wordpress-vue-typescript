<?php
    /**
     * Content Banner Template.
     *
     * @package cm
     */

    $args = [
        'post_type'      => 'banner',
        'posts_per_page' => -1,
        'order'          => 'ASC'

    ];

    $banners = get_posts( $args );

?>

<?php

    if ( $banners ):
        $count_banners = 0;
        $count_indicators = 0;

        $mods = get_theme_mods();
        $logo_ub = isset( $mods['cm_field_banner_logo_ub'] ) ? $mods['cm_field_banner_logo_ub'] : '';

        $html = '';

        $html .= '<section id="banner" class="carousel slide carousel-fade position-relative" data-mdb-ride="carousel">';

        $html .= '<div class="carousel-indicators">';

        foreach ( $banners as $banner ):
            $active = $count_indicators === 0 ? 'active' : '';
            $html .= '<button type="button" data-mdb-target="#banner" data-mdb-slide-to="' . $count_indicators++ . '" class="' . $active . '" aria-current="true" aria-label="' . $banner->post_title . '"></button>';
        endforeach;

        $html .= '</div>';
        $html .= '<div class="carousel-inner w-100 h-100">';

        foreach ( $banners as $banner ):

            $active = $count_banners++ === 0 ? 'active' : '';

            $cover = wp_get_attachment_image_src( get_post_thumbnail_id( $banner->ID ), 'full' );

            $cover = $cover ? $cover[0] : '';
            $content = $banner->post_content;

            $html .= '<div class="carousel-item w-100 h-100 ' . $active . '" data-mdb-interval="10000" style="background-image: url(' . $cover . ')">';

            $html .= '<div class="container h-100 position-relative">';
            $html .= '<div class="row h-100 justify-content-center">';

            $html .= '<div class="col-12 col-xl-9 col-lg-11 col-md-12 h-100 d-flex flex-column align-items-center justify-content-center">';
            $html .= '<div class="d-flex flex-column align-items-start w-100 h-100 position-relative">';
            $html .= '<img class="logo-ub img-fluid position-absolute" src="' . $logo_ub . '"  alt="Partido União Brasil 44" />';
            $html .= $content;
            $html .= '</div>';

            $html .= '</div>';

            $html .= '</div>';
            $html .= '</div>';

            $html .= '</div>';

        endforeach;

        $html .= '</div>';
        $html .= '</section>';

        echo $html;

    endif;

?>