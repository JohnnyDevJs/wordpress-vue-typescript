<?php
/**
 * Mimes Types
 *
 * @package cdr
 */

namespace CDR_THEME\Inc;

use CDR_THEME\Inc\Traits\Singleton;

class Mimes {

    use Singleton;

    protected function __construct() {

        // load class

        $this->setup_hooks();
    }

    protected function setup_hooks() {

        /**
         * Actions.
         */
        add_filter( 'upload_mimes', [$this, 'mimes_types'] );

    }

    public function mimes_types( $mimes ) {

        $mimes['svg'] = 'image/svg+xml';
        $mimes['gz'] = 'application/x-gzip';

        return $mimes;

    }

}
