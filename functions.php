<?php

/**
 * Theme Functions.
 *
 * @package sjp
 */

if ( !  defined( 'SJP_DIR_PATH' ) ) {
    define( 'SJP_DIR_PATH', untrailingslashit( get_template_directory() ) );
}

if ( !  defined( 'SJP_DIR_URI' ) ) {
    define( 'SJP_DIR_URI', untrailingslashit( get_template_directory_uri() ) );
}

if ( !  defined( 'SJP_PUBLIC_URI' ) ) {
    define( 'SJP_PUBLIC_URI', untrailingslashit( get_template_directory_uri() ) . '/public' );
}

if ( !  defined( 'SJP_PUBLIC_PATH' ) ) {
    define( 'SJP_PUBLIC_PATH', untrailingslashit( get_template_directory() ) . '/public' );
}

if ( !  defined( 'SJP_PUBLIC_JS_URI' ) ) {
    define( 'SJP_PUBLIC_JS_URI', untrailingslashit( get_template_directory_uri() ) . '/public/js' );
}

if ( !  defined( 'SJP_PUBLIC_JS_DIR_PATH' ) ) {
    define( 'SJP_PUBLIC_JS_DIR_PATH', untrailingslashit( get_template_directory() ) . '/public/js' );
}

if ( !  defined( 'SJP_PUBLIC_IMG_URI' ) ) {
    define( 'SJP_PUBLIC_IMG_URI', untrailingslashit( get_template_directory_uri() ) . '/public/src/img' );
}

if ( !  defined( 'SJP_PUBLIC_CSS_URI' ) ) {
    define( 'SJP_PUBLIC_CSS_URI', untrailingslashit( get_template_directory_uri() ) . '/public/css' );
}

if ( !  defined( 'SJP_PUBLIC_CSS_DIR_PATH' ) ) {
    define( 'SJP_PUBLIC_CSS_DIR_PATH', untrailingslashit( get_template_directory() ) . '/public/css' );
}

if ( !  defined( 'SJP_ADMIN_CSS_DIR_PATH' ) ) {
    define( 'SJP_ADMIN_CSS_DIR_PATH', untrailingslashit( get_template_directory_uri() ) . '/inc/assets/css' );
}

if ( !  defined( 'SJP_ADMIN_JS_DIR_PATH' ) ) {
    define( 'SJP_ADMIN_JS_DIR_PATH', untrailingslashit( get_template_directory_uri() ) . '/inc/assets/js' );
}

require_once SJP_DIR_PATH . '/inc/helpers/autoloader.php';
require_once SJP_DIR_PATH . '/inc/helpers/template-tags.php';

function sjp_get_theme_instance() {
    \SJP_THEME\Inc\SJP_THEME::get_instance();
}

sjp_get_theme_instance();