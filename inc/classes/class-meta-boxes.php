<?php
/**
 * Register Meta Boxes
 *
 * @package cm
 */

namespace CM_THEME\Inc;

use CM_THEME\Inc\Traits\Singleton;

/**
 * Class Meta_Boxes
 */
class Meta_Boxes {

    use Singleton;

    protected $gallery_defaults = [
        'class'    => 'Sortable_WordPress_Gallery',
        'id'       => '',
        'title'    => '',
        'context'  => '',
        'priority' => ''];

    protected $galleries = [];
    protected $loaded_galleries = [];
    public static $alreadyEnqueued = false;

    protected function __construct() {

        // load class.
        $this->setup_hooks();
    }

    protected function setup_hooks() {

        /**
         * Actions.
         */
        add_action( 'add_meta_boxes', [$this, 'add_custom_meta_box'], 10, 2 );
        add_action( 'save_post', [$this, 'save_post_meta_data'] );
        add_filter( 'the_content', [$this, 'render'] );

    }

    /**
     * Add custom meta box.
     *
     * @return void
     */
    public function add_custom_meta_box() {

        $screens = [
            'unique_ID' => ['shortable-gallery-page-options', 'schedule-page-options'],
            'box_title' => ['Galeria', 'Horário'],
            'callback'  => ['custom_shortable_gallery_meta_box_html', 'custom_schedule_meta_box_html'],
            'post_type' => ['photos', 'schedule'],
            'context'   => ['normal', 'side'],
            'priority'  => ['high', 'high']
        ];

        for ( $i = 0; $i < sizeof( $screens['unique_ID'] ); $i++ ) {

            add_meta_box(
                $screens['unique_ID'][$i], // Unique ID
                __( $screens['box_title'][$i], 'sjp' ), // Box title
                [$this, $screens['callback'][$i]], // Content callback, must be of type callable
                $screens['post_type'][$i], // Post type
                $screens['context'][$i], // context
                $screens['priority'][$i]// priority
            );

        }

    }

    /**
     * Custom meta box HTML( for form )
     *
     * @param  object $post Post.
     * @return void
     */

    public function custom_shortable_gallery_meta_box_html( $post ) {

        $sortable_gallery = get_post_meta( $post->ID, '_' . $post->ID . '_sortable_wordpress_gallery', true );

        echo '<div class="table">';

        echo '<ul id="' . $post->ID . '_sortable_wordpress_gallery" class="sortable_wordpress_gallery">';

        $gallery = explode( ",", $sortable_gallery );

        if ( count( $gallery ) > 0 && $gallery[0] != '' ):

            foreach ( $gallery as $attachment_id ):

                $output = '<li tabindex="0" role="checkbox" aria-label="' . get_the_title( $attachment_id ) . '" aria-checked="true"
																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																												  data-id="' . $attachment_id . '" class="attachment save-ready selected details">';
                $output .= '<div class="attachment-preview js--select-attachment type-image subtype-jpeg portrait">';
                $output .= '<div class="thumbnail">';
                $output .= '<div class="centered">';

                $output .= '<img src="' . wp_get_attachment_thumb_url( $attachment_id ) . '" draggable="false" alt="">';
                $output .= '</div>';
                $output .= '</div>';
                $output .= '</div>';
                $output .= '<button type="button" data-gallery="#' . $post->ID . '_sortable_wordpress_gallery" class="button-link check remove-sortable-wordpress-gallery-image" tabindex="0"><span class="media-modal-icon"></span><span class="screen-reader-text">Deselect</span></button>';
                $output .= '</li>';
                echo $output;
            endforeach;

        endif;

        echo '</ul>';

        echo '<input type="hidden" id="' . $post->ID . '_sortable_wordpress_gallery_input" name="_' . $post->ID . '_sortable_wordpress_gallery" value="' . $sortable_gallery . '" />';
        echo '<button type="button" class="button button-primary add-sortable-wordpress-gallery" data-gallery="#' . $post->ID . '_sortable_wordpress_gallery">Adicionar Imagens</button>';

        echo '</div>';

    }

    public function custom_schedule_meta_box_html( $post ) {

        $time_schedule = get_post_meta( $post->ID, '_time_schedule', true );

        /**
         * Use nonce for verification.
         * This will create a hidden input field with id and name as
         * 'schedule_meta_box_nonce' and unique nonce input value.
         */

        $output = '<input type="time" id="cm-time-schedule-field" name="cm_time_schedule" value="' . $time_schedule . '" />';
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

        // Schedule
        $t_schedule = sanitize_text_field( $_POST['cm_time_schedule'] );

        if ( $t_schedule ):
            update_post_meta( $post_id, '_time_schedule', $t_schedule );
        endif;

        // Gallery

        $gallery = sanitize_text_field( $_POST['_' . $post_id . '_sortable_wordpress_gallery'] );

        if ( $gallery ):
            update_post_meta( $post_id, '_' . $post_id . '_sortable_wordpress_gallery', $gallery );
        endif;

        if ( !  current_user_can( 'edit_post', $post_id ) ) {
            return;
        }

    }

    public function render( $content ) {

        global $post;

        $post_types = apply_filters( 'sortable_wordpress_gallery_post_types', ['portfolio'] );
        $post_types = apply_filters( 'sortable_wordpress_gallery_' . $post->ID . '_post_types', $post_types );
        $this_post_type = get_post_type( $post );

        if ( in_array( $this_post_type, $post_types ) ) {

            $gallery_images = get_post_meta( $post->ID, '_' . $post->ID . '_sortable_wordpress_gallery', true );

            if ( $gallery_images != '' ) {

                $gallery_images_array = explode( ',', $gallery_images );

                foreach ( $gallery_images_array as $image_id ) {

                    $cover_large = wp_get_attachment_image_src( $image_id, 'full' );
                    $html = wp_get_attachment_image_src( $image_id, 'wp_rancho_thumb_portfolio' );

                    if ( $html == '' ) {
                        continue;
                    }

                    $content .= '<figure class="thumb thumb-hidden">';
                    $content .= '<a href="' . $cover_large[0] . '" class="fancybox" target="_blank">';
                    $content .= '<img class="img-responsive" src="' . $html[0] . '">';
                    $content .= '<div class="overlay-thumb transition"></div>';
                    $content .= '</a>';
                    $content .= '</figure>';

                }

            }

        }

        return $content;
    }

}