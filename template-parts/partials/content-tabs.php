<?php
/**
 * Partials Content Tabs Template.
 *
 * @package sjp
 */

$args = [
    'post_type'      => 'portfolio',
    'posts_per_page' => -1,
    'orderby'        => 'title',
    'order'          => 'ASC'
];

$titles = get_posts( $args );

$html = '';

$html .= '<div class="row align-items-center position-relative">';
$html .= '<div class="col-12 col-xl-9 col-lg-10 z-index-1">';
$html .= '<nav class="nav nav-pills nav-justified nav-fill nav-portfolios flex-md-row flex-column">';

//$html .= '<a class="nav-link text-white active_portfolio text-center" id="todos">Todos</a>';

$count = 1;

foreach ( $titles as $title ) {
    $active_portfolio = $count++ === 1 ? 'active_portfolio' : '';
    $html .= '<a class="' . $active_portfolio . ' nav-link text-white" id="' . $title->post_name . '">' . $title->post_title . '</a>';
}

$html .= '</nav>';
$html .= '</div>';
$html .= '<div class="icon-loading position-absolute top-0 h-100 d-flex align-items-center justify-content-end">';
$html .= '<svg class="loading d-none" style="background: rgba(0, 0, 0, 0) none repeat scroll 0% 0%; display: block; shape-rendering: auto;" width="30px" height="30px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><path d="M14 50A36 36 0 0 0 86 50A36 41.8 0 0 1 14 50" fill="#C43A3D" stroke="none"><animateTransform attributeName="transform" type="rotate" dur="0.6097560975609756s" repeatCount="indefinite" keyTimes="0;1" values="0 50 52.9;360 50 52.9"></animateTransform></path>';
$html .= '</div>';
$html .= '</div>';

echo $html;