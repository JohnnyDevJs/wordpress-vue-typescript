<?php
/**
 * Partials Content List Portfolio Template.
 *
 * @package sjp
 */

global $post;

$args = [

    'post_type'      => 'portfolio',
    'posts_per_page' => -1,
    'order'          => 'ASC',
    'orderby'        => 'title'
];

if ( isset( $_POST['general'] ) ) {
    $general = sanitize_text_field( $_POST['general'] );

    $args = [
        'post_type'      => 'portfolio',
        'posts_per_page' => -1,
        'order'          => 'ASC',
        'orderby'        => 'title',
        's'              => $general
    ];
}

if ( isset( $_POST['exclusive'] ) ) {
    $exclusive = sanitize_text_field( $_POST['exclusive'] );

    $args = [
        'post_type'      => 'portfolio',
        'posts_per_page' => -1,
        'order'          => 'ASC',
        'orderby'        => 'title',
        's'              => $exclusive
    ];
}

$portfolio = new WP_Query( $args );

if ( $portfolio->have_posts() ):

    while ( $portfolio->have_posts() ): $portfolio->the_post();

        $badge_class = $post->post_name === 'general' ? 'bg-dark-black' : 'bg-light-red';

        $attachments = get_posts( [
            'post_type'      => 'attachment',
            'posts_per_page' => -1,
            'post_parent'    => get_the_ID()
        ] );

        foreach ( $attachments as $attachment ) {

            $html = '';
            $html .= '<div class="portfolio-item position-relative d-none overflow-hidden">';
            $html .= '<figure class="position-absolute mb-0 d-flex w-100 h-100">';
            $html .= '<a target="_blank" href="' . wp_get_attachment_url( $attachment->ID ) . '" class="align-items-end d-flex w-100" data-fancybox="gallery">';
            $html .= '<img class="img-fluid w-100 h-100 object-cover" src="' . wp_get_attachment_url( $attachment->ID ) . '" />';

            $html .= '<figcaption class="position-absolute">';
            $html .= ' <span class="badge ' . $badge_class . ' m-2">' . $post->post_title . '</span>';
            $html .= '</figcaption>';
            $html .= '</a>';
            $html .= '</figure>';
            $html .= '</div>';

            echo $html;

        }

    endwhile;
    wp_reset_postdata();
endif;

?>