<?php
/**
 * Content Photos Template.
 *
 * @package cm
 */

$args = [
    'post_type'      => 'photos',
    'posts_per_page' => -1
];

$photos = get_posts( $args );

$html = '';
$html .= '<div class="page-content py-5">';
$html .= cm_breadcrumb( get_the_title() );
$html .= '<div class="container">';
$html .= '<div class="row">';

if ( $photos ):

    foreach ( $photos as $photo ):
        $cover = wp_get_attachment_image_src( get_post_thumbnail_id( $photo->ID ), 'full' );
        $cover = $cover ? $cover[0] : '';

        $html .= '<div class="col-12 col-lg-4 col-md-6 photo-item">';
        $html .= '<figure class="album-photo mb-0 position-relative shadow-4-strong">';
        $html .= '<a class="d-flex w-100 h-100 position-relative overflow-hidden" href="' . get_permalink( $photo->ID ) . '">';
        $html .= '<img class="img-fluid object-cover object-top h-100 w-100" src="' . $cover . '" alt="' . $photo->post_title . '" />';

        $html .= '<figcaption class="position-absolute bottom-0 p-3">';
        $html .= '<time class="mb-0 text-white fw-bold">' . get_the_time( 'j \d\e F \d\e Y', $photo->ID ) . '</time>';
        $html .= '<h4 class="mb-0 text-white fw-bold">' . $photo->post_title . '</h4>';
        $html .= '</figcaption>';

        $html .= '</a>';
        $html .= '</figure>';
        $html .= '</div>';
    endforeach;

else:
    $html .= 'Nenhum album encontrado.';
endif;

$html .= '</div>';
$html .= '</div>';
$html .= '</div>';

echo $html;
?>