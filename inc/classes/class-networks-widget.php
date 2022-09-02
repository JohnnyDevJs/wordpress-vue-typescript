<?php
    /**
     * Networks Widget
     *
     * @package sjp
     */

    namespace SJP_THEME\Inc;

    use SJP_THEME\Inc\Traits\Singleton;
    use WP_Widget;

    class Networks_Widget extends WP_Widget {

        use Singleton;

        /**
         * Register widget with WordPress.
         */
        public function __construct() {
            parent::__construct(
                'networks_widget', // Base ID
                'Redes Sociais', // Name
                ['description' => __( 'Redes Sociais Widget', 'sjp' )]// Args
            );
        }

        /**
         * Front-end display of widget.
         *
         * @see WP_Widget::widget()
         *
         * @param array $args     Widget arguments.
         * @param array $instance Saved values from database.
         */
        public function widget( $args, $instance ) {
            extract( $args );

            $title = apply_filters( 'widget_title', $instance['title'] );

            echo $before_widget;

            if ( !  empty( $title ) ) {
                echo $before_title . $title . $after_title;
            }

            $mods = get_theme_mods();

            $facebook = isset( $mods['sjp_field_facebook'] ) ? $mods['sjp_field_facebook'] : '';
            $instagram = isset( $mods['sjp_field_instagram'] ) ? $mods['sjp_field_instagram'] : '';
            $youtube = isset( $mods['sjp_field_youtube'] ) ? $mods['sjp_field_youtube'] : '';

            $html = '';
            $html .= '<ul class="list-networks list-unstyled p-0 d-flex">';
            $html .= '<li>';
            $html .= '<a href="https://www.facebook.com/' . $facebook . '" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="Curta nossa página no Facebook"><i data-feather="facebook"></i></a>';
            $html .= '</li>';
            $html .= '<li>';
            $html .= '<a href="https://www.instagram.com/' . $instagram . '" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="Siga-nos no Instagram"><i data-feather="instagram"></i></a>';
            $html .= '</li>';
            $html .= '</ul>';

            echo $html;

            echo $after_widget;
        }

        /**
         * Back-end widget form.
         *
         * @see WP_Widget::form()
         *
         * @param array $instance Previously saved values from database.
         */
        public function form( $instance ) {

            if ( isset( $instance['title'] ) ) {
                $title = $instance['title'];
            } else {
                $title = __( 'Redes Sociais', 'sjp' );
            }

        ?>
<p>
  <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:', 'sjp' );?></label>
  <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>"
    name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php
    }

        /**
         * Sanitize widget form values as they are saved.
         *
         * @see WP_Widget::update()
         *
         * @param  array $new_instance Values just sent to be saved.
         * @param  array $old_instance Previously saved values from database.
         * @return array Updated safe values to be saved.
         */
        public function update( $new_instance, $old_instance ) {
            $instance = [];
            $instance['title'] = ( !  empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

            return $instance;
        }

    }
