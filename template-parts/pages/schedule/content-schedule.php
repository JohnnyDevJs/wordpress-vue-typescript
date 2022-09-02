<?php
/**
 * Content Page Schedule Template.
 *
 * @package cm
 */

$args = [
    'post_type'      => 'schedule',
    'posts_per_page' => -1,
    'order'          => 'ASC',
    'post_status'    => 'publish'
];
$schedule = new WP_Query( $args );

if ( $schedule->have_posts() ):
    $html = '';

    $html .= '<div class="page-content py-5">';
    $html .= cm_breadcrumb( get_the_title() );
    $html .= '<div class="container">';
    $html .= '<div class="row">';

    while ( $schedule->have_posts() ): $schedule->the_post();

        $time_schedule = get_post_meta( get_the_ID(), '_time_schedule', true );

        $schedule_tags = get_the_tags( get_the_ID() );
        $tag = get_tag( $schedule_tags[0]->term_id );
        $ex = explode( "-", $tag->slug );

        $day = $ex[0];
        $month = get_the_time( 'M', $tag->slug );

        $current_date = date( 'd' );

        if ( $day < $current_date ) {
            $update_schedule = [
                'ID'          => get_the_ID(),
                'post_status' => 'draft'
            ];
            wp_update_post( $update_schedule );
        }

        $html .= '<div class="col-12 col-md-6 schedule">';
        $html .= '<div class="schedule-content overflow-hidden d-flex align-items-center w-100 bg-light shadow-4-strong">';
        $html .= '<div class="schedule-date bg-info d-flex align-items-center justify-content-center">';

        $html .= '<time class="text-white text-center">';
        $html .= '<h1 class="mb-n1 fw-bold">' . $day . '</h1>';
        $html .= '<h5 class="mb-0 text-uppercase">' . $month . '</h5>';
        $html .= '</time>';

        $html .= '</div>';

        $html .= '<div class="schedule-info px-2 w-100 d-flex justify-content-center flex-column">';
        $html .= '<h5 class="fw-bold text-primary text-uppercase mb-1">' . get_the_title() . '</h5>';

        $html .= '<ul class="p-0 d-flex align-items-center list-unstyled m-0 p-0">';
        $html .= '<li class="d-flex align-items-center"><i class="me-1" data-feather="clock" width="18" height="18" stroke="#33bdf2" stroke-width="2.5"></i>' . $time_schedule . 'H</li>';
        $html .= '<li class="d-flex align-items-center"><i class="me-1" data-feather="map-pin" width="18" height="18" stroke="#33bdf2" stroke-width="2.5"></i>' . get_the_content() . '</li>';
        $html .= '</ul>';

        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';

    endwhile;
    $html .= '</div>';
    $html .= '</div>';
    $html .= '</div>';
    echo $html;
endif;

?>