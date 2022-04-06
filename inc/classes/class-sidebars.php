<?php
/**
 * Theme Sidebars.
 *
 * @package cdr
 */

namespace CDR_THEME\Inc;

use CDR_THEME\Inc\Traits\Singleton;

/**
 * Class Assets
 */
class Sidebars {

    use Singleton;

    /**
     * Construct method.
     */
    protected function __construct() {
        $this->setup_hooks();
    }

    /**
     * To register action/filter.
     *
     * @return void
     */
    protected function setup_hooks() {

        /**
         * Actions
         */
        add_action( 'widgets_init', [$this, 'register_sidebars'] );
        add_action( 'widgets_init', [$this, 'register_cults_widget'] );
        add_action( 'widgets_init', [$this, 'register_address_widget'] );
        add_action( 'widgets_init', [$this, 'register_networks_widget'] );

    }

    /**
     * Register widgets.
     *
     * @action widgets_init
     */
    public function register_sidebars() {

        register_sidebar(
            [
                'name'          => esc_html__( 'Footer One', 'iro' ),
                'id'            => 'sidebar-1',
                'description'   => '',
                'before_widget' => '<div id="%1$s" class="widget widget-sidebar %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h5 class="widget-title small-title text-uppercase">',
                'after_title'   => '</h5>'
            ]
        );

        register_sidebar(
            [
                'name'          => esc_html__( 'Footer Two', 'iro' ),
                'id'            => 'sidebar-2',
                'description'   => '',
                'before_widget' => '<div id="%1$s" class="widget widget-footer cell column %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h5 class="widget-title small-title text-uppercase">',
                'after_title'   => '</h5>'
            ]
        );

        register_sidebar(
            [
                'name'          => esc_html__( 'Footer Three', 'iro' ),
                'id'            => 'sidebar-3',
                'description'   => '',
                'before_widget' => '<div id="%1$s" class="widget widget-footer cell column %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h5 class="widget-title small-title text-uppercase text-white">',
                'after_title'   => '</h5>'
            ]
        );

        register_sidebar(
            [
                'name'          => esc_html__( 'Footer Four', 'iro' ),
                'id'            => 'sidebar-4',
                'description'   => '',
                'before_widget' => '<div id="%1$s" class="widget widget-footer cell column %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h5 class="widget-title small-title text-uppercase text-white">',
                'after_title'   => '</h5>'
            ]
        );

        register_sidebar(
            [
                'name'          => esc_html__( 'Sidebar', 'iro' ),
                'id'            => 'sidebar-5',
                'description'   => '',
                'before_widget' => '<div id="%1$s" class="widget widget-sidebar card shadow border-0 p-4 %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h5 class="widget-title small-title text-uppercase title mb-2">',
                'after_title'   => '</h5>'
            ]
        );

    }

    public function register_cults_widget() {
        register_widget( 'CDR_THEME\Inc\Cults_Widget' );
    }

    public function register_networks_widget() {
        register_widget( 'CDR_THEME\Inc\Networks_Widget' );
    }

    public function register_address_widget() {
        register_widget( 'CDR_THEME\Inc\Address_Widget' );
    }

}