<?php
/**
 * Maintenance
 *
 * @package cdr
 */

namespace CDR_THEME\Inc;

use CDR_THEME\Inc\Traits\Singleton;

class Maintenance {

    use Singleton;

    protected function __construct() {

        // load class

        $this->setup_hooks();
    }

    protected function setup_hooks() {

        /**
         * Actions.
         */

        $mods = get_theme_mods();

        $active = isset( $mods['CDR_field_maintenance_active'] ) ? $mods['CDR_field_maintenance_active'] : '';

        if ( true === $active ) {

            add_filter( 'pre_get_document_title', [$this, 'maintenance_page_title'], 10, 2 );
            add_filter( 'template_include', [$this, 'show_maintenance_page'], 99 );
        }

    }

    public function show_maintenance_page( $template ) {

        if ( !  current_user_can( 'edit_themes' ) || !  is_user_logged_in() ) {
            $new_template = locate_template( ['maintenance-template.php'] );

            if ( !  empty( $new_template ) ) {
                return $new_template;
            }

        }

        return $template;

    }

    public function maintenance_page_title( $title ) {

        if ( !  current_user_can( 'edit_themes' ) || !  is_user_logged_in() ) {

            if ( is_front_page() ) {
                $title = 'Manutenção - ' . get_bloginfo( 'name' ) . ' - ' . get_bloginfo( 'description' );
            }

            return $title;
        }

    }

}
