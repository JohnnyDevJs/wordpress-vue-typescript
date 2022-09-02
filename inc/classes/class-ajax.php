<?php
/**
 * Ajax
 *
 * @package sjp
 */

namespace SJP_THEME\Inc;

use SJP_THEME\Inc\Traits\Singleton;

class Ajax {

    use Singleton;

    protected function __construct() {

        // load class

        $this->setup_hooks();
    }

    protected function setup_hooks() {

        /**
         * Actions.
         */

        add_action( 'wp_ajax_nopriv_load_portfolio', [$this, 'load_portfolio'] );
        add_action( 'wp_ajax_load_portfolio', [$this, 'load_portfolio'] );

    }

    public function load_portfolio() {
        get_template_part( 'template-parts/partials/content-list', 'portfolio' );
        die();
    }

}