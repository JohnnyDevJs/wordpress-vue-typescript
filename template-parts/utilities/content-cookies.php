<?php
/**
 * Content Cookies
 *
 * @package sjp
 */

$mods = get_theme_mods();

$cookies_active = $mods['sjp_field_cookies_active'];
$cookies_message = $mods['sjp_field_cookies_message'];
$cookies_url = $mods['sjp_field_cookies_url'];

$html = '';

if ( true === $cookies_active ):
    $html .= '<div id="consent-cookies" class="hidden shadow bg-white py-3">';
    $html .= '<div class="container">';
    $html .= '<div class="row">';
    $html .= '<div class="col-12 d-flex align-items-center justify-content-between flex-md-row flex-column">';
    $html .= '<p class="mb-0 text-md-start text-center">';
    $html .= isset( $cookies_message ) ? '<span>' . $cookies_message . ' Acesse </span>' : '';
    $html .= isset( $cookies_url ) ? '<a class="text-decoration-underline text-link text-light-red" target="_blank" href="' . esc_url( home_url( 'politica-de-cookies' ) ) . '">Política de Cookies</a> e <a class="text-decoration-underline text-link text-light-red" target="_blank" href="' . esc_url( home_url( 'politica-de-privacidade' ) ) . '">Política de Privacidade</a>' : '';
    $html .= '</p>';
    $html .= '<a id="accept" class="btn bg-dark-red text-white mt-md-0 mt-2" href="javascript:void(0)">Ciente</a>';

    $html .= '</div>';
    $html .= '</div>';
    $html .= '</div>';
    $html .= '</div>';
else:
    $html .= '';
endif;

echo $html;

?>