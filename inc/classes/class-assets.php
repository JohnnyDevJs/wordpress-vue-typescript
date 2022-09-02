<?php
/**
 * Enqueue theme assets
 *
 * @package cm
 */

namespace CM_THEME\Inc;

use CM_THEME\Inc\Traits\Singleton;

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

        $manifest = file_get_contents( CM_PUBLIC_PATH . '/public.json' );
        $json = json_decode( $manifest, true );
        $css = $json['']['css'];

        // Register styles.
        wp_register_style( 'app', CM_PUBLIC_URI . '/' . $css, [], filemtime( CM_PUBLIC_PATH . '/' . $css ), 'all' );

        // Enqueue Styles.
        wp_enqueue_style( 'app' );
    }

    public function register_scripts() {

        $manifest = file_get_contents( CM_PUBLIC_PATH . '/public.json' );
        $json = json_decode( $manifest, true );
        $js = $json['main']['js'];

        // Register scripts.
        wp_register_script( 'app', CM_PUBLIC_URI . '/' . $js, ['jquery'], filemtime( CM_PUBLIC_PATH . '/' . $js ), true );

        // Localize the script with new data
        wp_localize_script( 'app', 'send_contact_form', ['ajaxurl' => admin_url( 'admin-ajax.php' )] );

        // Enqueue Scripts.
        wp_enqueue_script( 'app' );

    }

    public function register_admin_styles() {

        // Register Admin Styles
        wp_register_style( 'photos', CM_ADMIN_CSS_DIR_PATH . '/photos.css', null, '1.0', 'all' );

        // Enqueue Admin Styles
        wp_enqueue_style( 'photos' );

    }

    public function register_admin_scripts() {

        // Register Admin Scripts
        wp_register_script( 'photos', CM_ADMIN_JS_DIR_PATH . '/photos.js', ['jquery'], '0.0.1', true );
        wp_enqueue_media();

        // Enqueue Admin Scripts
        wp_enqueue_script( 'photos' );
    }

}