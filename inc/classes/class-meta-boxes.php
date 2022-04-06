<?php
/**
 * Register Meta Boxes
 *
 * @package cdr
 */

namespace CDR_THEME\Inc;

use CDR_THEME\Inc\Traits\Singleton;

/**
 * Class Meta_Boxes
 */
class Meta_Boxes {

    use Singleton;

    protected function __construct() {

        // load class.
        $this->setup_hooks();
    }

    protected function setup_hooks() {

        /**
         * Actions.
         */
        add_action( 'add_meta_boxes', [$this, 'add_custom_meta_box'] );
        add_action( 'save_post', [$this, 'save_post_meta_data'] );

    }

    /**
     * Add custom meta box.
     *
     * @return void
     */
    public function add_custom_meta_box() {

        $screens = [
            'unique_ID' => ['hero-page-options', 'franchise-page-options', 'modal-page-options'],
            'callback'  => ['custom_hero_meta_box_html', 'custom_franchise_meta_box_html', 'custom_modal_meta_box_html'],
            'post_type' => ['hero', 'franchise', 'modal'],
            'box_title' => ['Opções da hero', 'Opções de Franquia', 'Opções de Modal']
        ];

        for ( $i = 0; $i < sizeof( $screens['unique_ID'] ); $i++ ) {

            add_meta_box(
                $screens['unique_ID'][$i], // Unique ID
                __( $screens['box_title'][$i], 'Iro' ), // Box title
                [$this, $screens['callback'][$i]], // Content callback, must be of type callable
                $screens['post_type'][$i], // Post type
                'normal' // context
            );
        }

    }

    /**
     * Custom meta box HTML( for form )
     *
     * @param  object $post Post.
     * @return void
     */

    public function custom_hero_meta_box_html( $post ) {

        $url = get_post_meta( $post->ID, '_url', true );

        /**
         * Use nonce for verification.
         * This will create a hidden input field with id and name as
         * 'hero_meta_box_nonce' and unique nonce input value.
         */
        wp_nonce_field( plugin_basename( __FILE__ ), 'meta_box_nonce' );

        $output = '';

        // URL
        $output .= '<div class="col-6 mb-3">';
        $output .= '<label for="iro-url-field" class="form-label">' . esc_html( 'URL', 'iro' ) . '</label>';
        $output .= '<input type="text" class="form-control" id="iro-url-field" name="CDR_url_field" placeholder="Insira a URL" value="' . esc_html( $url, 'iro' ) . '" />';
        $output .= '</div>';

        echo $output;

    }

    public function custom_franchise_meta_box_html( $post ) {

        $manager = get_post_meta( $post->ID, '_manager', true );
        $cro = get_post_meta( $post->ID, '_cro', true );
        $phone = get_post_meta( $post->ID, '_phone', true );

        /**
         * Use nonce for verification.
         * This will create a hidden input field with id and name as
         * 'hero_meta_box_nonce' and unique nonce input value.
         */
        wp_nonce_field( plugin_basename( __FILE__ ), 'meta_box_nonce' );

        $output = '';

        // Tecnichal
        $output .= '<div class="row">';
        $output .= '<div class="col-4 mb-3">';
        $output .= '<label for="iro-manager-field" class="form-label">' . esc_html( 'Responsável Técnico', 'iro' ) . '</label>';
        $output .= '<input type="text" class="form-control" id="iro-manager-field" name="CDR_manager_field" placeholder="Insira o responsável técnico" value="' . esc_html( $manager, 'iro' ) . '" />';
        $output .= '</div>';

        $output .= '<div class="col-2 mb-3">';
        $output .= '<label for="iro-cro-field" class="form-label">' . esc_html( 'CRO', 'iro' ) . '</label>';
        $output .= '<input type="text" class="form-control" id="iro-cro-field" name="CDR_cro_field" placeholder="Insira o CRO" value="' . esc_html( $cro, 'iro' ) . '" />';
        $output .= '</div>';
        $output .= '</div>';

        // phone
        $output .= '<div class="col-6 mb-3">';
        $output .= '<label for="iro-phone-field" class="form-label">' . esc_html( 'Telefone', 'iro' ) . '</label>';
        $output .= '<input type="tel" class="form-control" id="iro-phone-field" name="CDR_phone_field" placeholder="Insira o telefone" value="' . esc_html( $phone, 'iro' ) . '" />';
        $output .= '</div>';

        echo $output;

    }

    public function custom_modal_meta_box_html( $post ) {

        $title_one = get_post_meta( $post->ID, '_title_one', true );
        $title_two = get_post_meta( $post->ID, '_title_two', true );
        $url_one = get_post_meta( $post->ID, '_url_one', true );
        $url_two = get_post_meta( $post->ID, '_url_two', true );

        /**
         * Use nonce for verification.
         * This will create a hidden input field with id and name as
         * 'hero_meta_box_nonce' and unique nonce input value.
         */
        wp_nonce_field( plugin_basename( __FILE__ ), 'meta_box_nonce' );

        $output = '';

        // Buttons Titles and URLs
        $output .= '<div class="row">';
        $output .= '<div class="col-4">';
        $output .= '<label for="iro-title-one-field" class="form-label">' . esc_html( '1. Título do botão', 'iro' ) . '</label>';
        $output .= '<input type="text" class="form-control" id="iro-title-one-field" name="CDR_title_one_field" placeholder="Insira a URL" value="' . esc_html( $title_one, 'iro' ) . '" />';
        $output .= '</div>';

        $output .= '<div class="col-4 mb-3">';
        $output .= '<label for="iro-url-one-field" class="form-label">' . esc_html( '1. URL', 'iro' ) . '</label>';
        $output .= '<input type="text" class="form-control" id="iro-url-one-field" name="CDR_url_one_field" placeholder="Insira a URL" value="' . esc_html( $url_one, 'iro' ) . '" />';
        $output .= '</div>';
        $output .= '</div>';

        $output .= '<div class="row">';
        $output .= '<div class="col-4">';
        $output .= '<label for="iro-title-two-field" class="form-label">' . esc_html( '2. Título do botão', 'iro' ) . '</label>';
        $output .= '<input type="text" class="form-control" id="iro-title-two-field" name="CDR_title_two_field" placeholder="Insira a URL" value="' . esc_html( $title_two, 'iro' ) . '" />';
        $output .= '</div>';

        $output .= '<div class="col-4 mb-3">';
        $output .= '<label for="iro-url-two-field" class="form-label">' . esc_html( '2. URL', 'iro' ) . '</label>';
        $output .= '<input type="text" class="form-control" id="iro-url-two-field" name="CDR_url_two_field" placeholder="Insira a URL" value="' . esc_html( $url_two, 'iro' ) . '" />';
        $output .= '</div>';
        $output .= '</div>';

        echo $output;

    }

    /**
     * Save post meta into database
     * when the post is saved.
     *
     * @param  integer $post_id Post id.
     * @return void
     */
    public function save_post_meta_data( $post_id ) {

        /**
         * When the post is saved or updated we get $_POST available
         * Check if the current user is authorized
         */

        if ( !  current_user_can( 'edit_post', $post_id ) ) {
            return;
        }

        /**
         * Check if the nonce value we received is the same we created.
         */

        if ( !  isset( $_POST['meta_box_nonce'] ) ||
            !  wp_verify_nonce( $_POST['meta_box_nonce'], plugin_basename( __FILE__ ) )
        ) {
            return;
        }

        if ( array_key_exists( 'CDR_url_field', $_POST ) ) {

            $CDR_url_field = sanitize_text_field( $_POST['CDR_url_field'] );

            update_post_meta(
                $post_id,
                '_url',
                $CDR_url_field
            );
        }

        if ( array_key_exists( 'CDR_manager_field', $_POST ) ) {

            $CDR_manager_field = sanitize_text_field( $_POST['CDR_manager_field'] );

            update_post_meta(
                $post_id,
                '_manager',
                $CDR_manager_field
            );
        }

        if ( array_key_exists( 'CDR_cro_field', $_POST ) ) {

            $CDR_cro_field = sanitize_text_field( $_POST['CDR_cro_field'] );

            update_post_meta(
                $post_id,
                '_cro',
                $CDR_cro_field
            );
        }

        if ( array_key_exists( 'CDR_phone_field', $_POST ) ) {

            $CDR_phone_field = sanitize_text_field( $_POST['CDR_phone_field'] );

            update_post_meta(
                $post_id,
                '_phone',
                $CDR_phone_field
            );
        }

        if ( array_key_exists( 'CDR_url_one_field', $_POST ) ) {

            $CDR_url_one_field = sanitize_text_field( $_POST['CDR_url_one_field'] );

            update_post_meta(
                $post_id,
                '_url_one',
                $CDR_url_one_field
            );
        }

        if ( array_key_exists( 'CDR_title_one_field', $_POST ) ) {

            $CDR_title_one_field = sanitize_text_field( $_POST['CDR_title_one_field'] );

            update_post_meta(
                $post_id,
                '_title_one',
                $CDR_title_one_field
            );
        }

        if ( array_key_exists( 'CDR_url_two_field', $_POST ) ) {

            $CDR_url_two_field = sanitize_text_field( $_POST['CDR_url_two_field'] );

            update_post_meta(
                $post_id,
                '_url_two',
                $CDR_url_two_field
            );
        }

        if ( array_key_exists( 'CDR_title_two_field', $_POST ) ) {

            $CDR_title_two_field = sanitize_text_field( $_POST['CDR_title_two_field'] );

            update_post_meta(
                $post_id,
                '_title_two',
                $CDR_title_two_field
            );
        }

    }

}
