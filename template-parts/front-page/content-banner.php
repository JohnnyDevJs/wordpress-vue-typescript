<?php
    /**
     * Content Banner Template.
     *
     * @package sjp
     */

    $args = [
        'post_type'      => 'banner',
        'posts_per_page' => 1

    ];

    $banners = new WP_Query( $args );
?>

<?php

    if ( $banners->have_posts() ) {

        while ( $banners->have_posts() ) {
            $banners->the_post();

            $cover = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
            $cover = $cover ? $cover[0] : '';
            $first_word = strtok( get_the_title(), " " );
            $last_word = strrchr( get_the_title(), " " );

            $html =
            '<section id="banner" class="vh-100 position-relative" style="background-image: url(' . $cover . ');">
                <div class="container h-100">
                  <div class="row h-100 d-flex align-items-center justify-content-center">
                    <div class="col-12 text-center z-index-1">
                      <h1 class="display-3 text-light-red fw-bold animate-fadeInUp-9">
                        <span class="text-white fw-semibold">
                        ' . $first_word . '
                        </span>
                        ' . $last_word . '
                      </h1>
                      <div class="banner-content text-white animate-fadeInUp-9 animate-delay-2">' . get_the_content() . '</div>
                    </div>
                  </div>
                </div>';

            $html .= sjp_anchor_section( 'quem-somos', 'text-white' );
            $html .= '</section>';

            echo $html;

        }

    }

?>