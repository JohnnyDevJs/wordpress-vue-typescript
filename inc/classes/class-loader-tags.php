<?php
/**
 * Loader Tags
 *
 * @package sjp
 */

namespace SJP_THEME\Inc;

use SJP_THEME\Inc\Traits\Singleton;

class Loader_Tags {

    use Singleton;

    protected function __construct() {

        // load class

        $this->setup_hooks();
    }

    protected function setup_hooks() {

        /**
         * Actions.
         */
        add_filter( 'script_loader_tag', [$this, 'add_type_script'], 10, 3 );

    }

    public function add_type_script( $tag, $handle, $src ) {

        if ( "app" === $handle ) {
            $tag = '<script type="module" src="' . esc_url( $src ) . '"></script>';
        }

        return $tag;

    }

}
