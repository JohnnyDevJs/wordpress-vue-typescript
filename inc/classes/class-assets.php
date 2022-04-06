<?php
/**
 * Enqueue theme assets
 *
 * @package cdr
 */

namespace CDR_THEME\Inc;

use CDR_THEME\Inc\Traits\Singleton;

class Assets {
    use Singleton;

    protected function __construct() {

        // load class.
        $this->setup_hooks();
    }

    protected function setup_hooks() {

        /**
         * Actions.
         */
        add_action( 'wp_enqueue_scripts', [$this, 'register_styles'] );
        add_action( 'wp_enqueue_scripts', [$this, 'register_scripts'] );
        add_action( 'admin_enqueue_scripts', [$this, 'register_admin_styles'] );
    }

    public function register_styles() {
        // Register styles.
        wp_register_style( 'app', CDR_PUBLIC_CSS_URI . '/app.css', [], filemtime( CDR_PUBLIC_CSS_DIR_PATH . '/app.css' ), 'all' );

        // Enqueue Styles.
        wp_enqueue_style( 'app' );
    }

    public function register_scripts() {
        // Register scripts.
        wp_register_script( 'app', CDR_PUBLIC_JS_URI . '/app.js', ['jquery'], filemtime( CDR_PUBLIC_JS_DIR_PATH . '/app.js' ), true );

        // Enqueue Scripts.
        wp_enqueue_script( 'app' );

    }

    public function register_admin_styles() {

        // Register Admin Styles
        wp_register_style( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css', NULL, '5.0.2', 'all' );
        wp_register_style( 'iframe', CDR_ADMIN_CSS_DIR_PATH . '/iframe.css', NULL, '1.0', 'all' );

        // Enqueue Admin Styles
        wp_enqueue_style( 'bootstrap' );
        wp_enqueue_style( 'iframe' );
    }

}