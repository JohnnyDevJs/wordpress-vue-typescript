<?php

/**
 * Theme Functions.
 *
 * @package cdr
 */

if ( !  defined( 'CDR_DIR_PATH' ) ) {
    define( 'CDR_DIR_PATH', untrailingslashit( get_template_directory() ) );
}

if ( !  defined( 'CDR_DIR_URI' ) ) {
    define( 'CDR_DIR_URI', untrailingslashit( get_template_directory_uri() ) );
}

if ( !  defined( 'CDR_PUBLIC_URI' ) ) {
    define( 'CDR_PUBLIC_URI', untrailingslashit( get_template_directory_uri() ) . '/public' );
}

if ( !  defined( 'CDR_PUBLIC_PATH' ) ) {
    define( 'CDR_PUBLIC_PATH', untrailingslashit( get_template_directory() ) . '/public' );
}

if ( !  defined( 'CDR_PUBLIC_JS_URI' ) ) {
    define( 'CDR_PUBLIC_JS_URI', untrailingslashit( get_template_directory_uri() ) . '/public/js' );
}

if ( !  defined( 'CDR_PUBLIC_JS_DIR_PATH' ) ) {
    define( 'CDR_PUBLIC_JS_DIR_PATH', untrailingslashit( get_template_directory() ) . '/public/js' );
}

if ( !  defined( 'CDR_PUBLIC_IMG_URI' ) ) {
    define( 'CDR_PUBLIC_IMG_URI', untrailingslashit( get_template_directory_uri() ) . '/public/src/img' );
}

if ( !  defined( 'CDR_PUBLIC_CSS_URI' ) ) {
    define( 'CDR_PUBLIC_CSS_URI', untrailingslashit( get_template_directory_uri() ) . '/public/css' );
}

if ( !  defined( 'CDR_PUBLIC_CSS_DIR_PATH' ) ) {
    define( 'CDR_PUBLIC_CSS_DIR_PATH', untrailingslashit( get_template_directory() ) . '/public/css' );
}

if ( !  defined( 'CDR_ADMIN_CSS_DIR_PATH' ) ) {
    define( 'CDR_ADMIN_CSS_DIR_PATH', untrailingslashit( get_template_directory_uri() ) . '/inc/assets/css' );
}

if ( !  defined( 'CDR_ADMIN_JS_DIR_PATH' ) ) {
    define( 'CDR_ADMIN_JS_DIR_PATH', untrailingslashit( get_template_directory_uri() ) . '/inc/assets/js' );
}

require_once CDR_DIR_PATH . '/inc/helpers/autoloader.php';
require_once CDR_DIR_PATH . '/inc/helpers/template-tags.php';

function CDR_get_theme_instance() {
    \CDR_THEME\Inc\CDR_THEME::get_instance();
}

cdr_get_theme_instance();