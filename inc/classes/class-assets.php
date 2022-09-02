<?php
/**
 * Enqueue theme assets
 *
 * @package sjp
 */

namespace SJP_THEME\Inc;

use SJP_THEME\Inc\Traits\Singleton;

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
        add_action( 'admin_enqueue_scripts', [$this, 'register_admin_scripts'] );
    }

    public function register_styles() {
        // Register styles.
        wp_register_style( 'app', SJP_PUBLIC_CSS_URI . '/app.css', [], filemtime( SJP_PUBLIC_CSS_DIR_PATH . '/app.css' ), 'all' );

        // Enqueue Styles.
        wp_enqueue_style( 'app' );
    }

    public function register_scripts() {
        global $wp_query;

        // Register scripts.
        wp_register_script( 'app', SJP_PUBLIC_JS_URI . '/app.js', ['jquery'], filemtime( SJP_PUBLIC_JS_DIR_PATH . '/app.js' ), true );

        // Localize the script with new data
        wp_localize_script( 'app', 'load_portfolio', [
            'ajaxurl'      => admin_url( 'admin-ajax.php' ),
            'posts'        => json_encode( $wp_query->query_vars ),
            'current_page' => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1,
            'max_page'     => $wp_query->max_num_pages
        ] );

        wp_localize_script( 'app', 'send_contact_form', ['ajaxurl' => admin_url( 'admin-ajax.php' )] );

        // Enqueue Scripts.
        wp_enqueue_script( 'app' );

    }

    public function register_admin_styles() {

        // Register Admin Styles
        wp_register_style( 'portfolio', SJP_ADMIN_CSS_DIR_PATH . '/portfolio.css', null, '1.0', 'all' );

        // Enqueue Admin Styles
        wp_enqueue_style( 'portfolio' );

    }

    public function register_admin_scripts() {

        // Register Admin Scripts
        wp_register_script( 'gallery', SJP_ADMIN_JS_DIR_PATH . '/portfolio.js', ['jquery'], '0.0.1', true );
        wp_enqueue_media();

        // Enqueue Admin Scripts
        wp_enqueue_script( 'gallery' );
    }

}