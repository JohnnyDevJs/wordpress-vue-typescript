<?php
/**
 * Partials Content List Portfolio Template.
 *
 * @package cm
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
            $html .= '<div class="col-12 col-md-3 portfolio-item position-relative d-none">';
            $html .= '<a href="#" class="overflow-hidden h-100 d-flex align-items-end">';
            $html .= '<figure class="position-relative mb-0 h-100 d-flex">';
            $html .= '<img class="img-fluid w-100" src="' . wp_get_attachment_url( $attachment->ID ) . '" />';
            $html .= '</figure>';

            $html .= '<figcaption class="position-absolute">';
            $html .= ' <span class="badge ' . $badge_class . ' m-2">' . $post->post_title . '</span>';
            $html .= '</figcaption>';
            $html .= '</a>';
            $html .= '</div>';

            echo $html;

        }

    endwhile;
    wp_reset_postdata();
endif;

?>