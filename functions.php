<?php

/**
 * Theme Functions.
 *
 * @package cm
 */

if ( !  defined( 'CM_DIR_PATH' ) ) {
    define( 'CM_DIR_PATH', untrailingslashit( get_template_directory() ) );
}

if ( !  defined( 'CM_DIR_URI' ) ) {
    define( 'CM_DIR_URI', untrailingslashit( get_template_directory_uri() ) );
}

if ( !  defined( 'CM_PUBLIC_URI' ) ) {
    define( 'CM_PUBLIC_URI', untrailingslashit( get_template_directory_uri() ) . '/public' );
}

if ( !  defined( 'CM_PUBLIC_PATH' ) ) {
    define( 'CM_PUBLIC_PATH', untrailingslashit( get_template_directory() ) . '/public' );
}

if ( !  defined( 'CM_ADMIN_CSS_DIR_PATH' ) ) {
    define( 'CM_ADMIN_CSS_DIR_PATH', untrailingslashit( get_template_directory_uri() ) . '/inc/assets/css' );
}

if ( !  defined( 'CM_ADMIN_JS_DIR_PATH' ) ) {
    define( 'CM_ADMIN_JS_DIR_PATH', untrailingslashit( get_template_directory_uri() ) . '/inc/assets/js' );
}

require_once CM_DIR_PATH . '/inc/helpers/autoloader.php';
require_once CM_DIR_PATH . '/inc/helpers/template-tags.php';

function cm_get_theme_instance() {
    \CM_THEME\Inc\CM_THEME::get_instance();
}

cm_get_theme_instance();