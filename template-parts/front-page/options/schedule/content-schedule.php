<?php
/**
 * Content Schedule Template.
 *
 * @package cm
 */

$tags = get_terms(
    [
        'taxonomy' => 'post_tag'
    ]
);

$html = '';
$html .= '<div class="col-12 col-lg-3 col-md-6 bg-primary">';
$html .= '<div id="home-schedule" class="d-flex flex-column h-100 align-items-md-start align-items-center justify-content-center  p-4">';
$html .= '<h2 class="text-white fw-bold mb-3">Agenda</h2>';

foreach ( $tags as $tag ):

    $args = [
        'post_type'      => 'schedule',
        'posts_per_page' => 2,
        'post_status'    => 'publish',
        'order'          => 'ASC',
        'tax_query'      => [
            [
                'taxonomy' => $tag->taxonomy,
                'field'    => 'slug',
                'terms'    => $tag->slug
            ]
        ]
    ];

    $schedule = new WP_Query( $args );

    if ( $schedule->have_posts() ):
        $html .= '<div class="schedules d-flex flex-column align-items-md-start align-items-center w-100">';

        $html .= '<h6 class="schedule-title text-white text-uppercase fw-bold mb-1 w-100 text-md-start text-center">' . $tag->name . '</h6>';

        while ( $schedule->have_posts() ): $schedule->the_post();

            $time_schedule = get_post_meta( get_the_ID(), '_time_schedule', true );

            $html .= '<div class="schedule w-100">';
            $html .= '<ul class="list-unstyled m-0 text-uppercase">';
            $html .= '<li class="d-flex align-items-center justify-content-md-start justify-content-center">';
            $html .= '<time>' . $time_schedule . 'H</time>';
            $html .= '<p class="ms-3 mb-0 text-light">' . get_the_title() . '</p>';
            $html .= '</li>';
            $html .= '</ul>';
            $html .= '</div>';

        endwhile;

        $html .= '</div>';

        $html .= '<a class="btn btn-info text-white fw-bold mt-3" href="' . home_url( 'agenda' ) . '">Ver agenda completa</a>';

    endif;

    if ( !  $schedule ):
        echo 'Oiii';
        $html .= '<p>Nenhuma agenda no momento.</p>';
    endif;
endforeach;

$html .= '</div>';
$html .= '</div>';

echo $html;

?>