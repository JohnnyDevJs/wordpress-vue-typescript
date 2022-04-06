<?php
    /**
     * Address Widget
     *
     * @package cdr
     */

    namespace CDR_THEME\Inc;

    use CDR_THEME\Inc\Traits\Singleton;
    use WP_Widget;

    class Address_Widget extends WP_Widget {

        use Singleton;

        /**
         * Register widget with WordPress.
         */
        public function __construct() {
            parent::__construct(
                'Address_widget', // Base ID
                'Endereço', // Name
                ['description' => __( 'Endereço Widget', 'Iro' )]// Args
            );
        }

        /**
         * Front-end display of widget.
         *
         * @see WP_Widget::widget()
         *
         * @param array $args     Widget arguments.
         * @param array $instance Saved values from Addressbase.
         */
        public function widget( $args, $instance ) {
            extract( $args );

            $title = apply_filters( 'widget_title', $instance['title'] );

            echo $before_widget;

            if ( !  empty( $title ) ) {
                echo $before_title . $title . $after_title;
            }

            $mods = get_theme_mods();

            $address = isset( $mods['CDR_field_address'] ) ? $mods['CDR_field_address'] : '';

            $html = '';

            $html .= '<h4 class="Iro-address text-center mb-0">';
            $html .= $address;
            $html .= '</h4>';

            echo $html;

            echo $after_widget;
        }

        /**
         * Back-end widget form.
         *
         * @see WP_Widget::form()
         *
         * @param array $instance Previously saved values from Addressbase.
         */
        public function form( $instance ) {

            if ( isset( $instance['title'] ) ) {
                $title = $instance['title'];
            } else {
                $title = __( 'Endereço', 'Iro' );
            }

        ?>
<p>
  <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:', 'Iro' );?></label>
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
         * @param  array $old_instance Previously saved values from Addressbase.
         * @return array Updated safe values to be saved.
         */
        public function update( $new_instance, $old_instance ) {
            $instance = [];
            $instance['title'] = ( !  empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

            return $instance;
        }

    }
