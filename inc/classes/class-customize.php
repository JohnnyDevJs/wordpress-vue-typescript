<?php
/**
 * Theme Customize
 *
 * @package sjp
 */

namespace SJP_THEME\Inc;

use SJP_THEME\Inc\Traits\Singleton;
use WP_Customize_Image_Control;
use WP_Customize_Upload_Control;

class Customize {

    use Singleton;

    protected function __construct() {

        // load class

        $this->setup_hooks();
    }

    protected function setup_hooks() {

        /**
         * Actions.
         */
        add_action( 'customize_register', [$this, 'customizer_register'] );
    }

    public function customizer_register( $wp_customize ) {

        $this->add_settings( $wp_customize );
        $this->add_sections( $wp_customize );
        $this->add_panels( $wp_customize );
        $this->add_controls( $wp_customize );

    }

    public function add_settings( $wp_customize ) {

        // Logos
        $wp_customize->add_setting( 'sjp_field_dark_logo', [
            'default' => ''
        ] );

        // Where
        $wp_customize->add_setting( 'sjp_field_map_iframe', [
            'default' => ''
        ] );

        // Informations
        $wp_customize->add_setting( 'sjp_field_phone', [
            'default' => ''
        ] );

        $wp_customize->add_setting( 'sjp_field_address', [
            'default' => ''
        ] );

        $wp_customize->add_setting( 'sjp_field_email', [
            'default' => ''
        ] );

        $wp_customize->add_setting( 'sjp_field_privacy_email', [
            'default' => ''
        ] );

        // Networks
        $wp_customize->add_setting( 'sjp_field_whatsapp', [
            'default' => ''
        ] );

        $wp_customize->add_setting( 'sjp_field_facebook', [
            'default' => ''
        ] );

        $wp_customize->add_setting( 'sjp_field_instagram', [
            'default' => ''
        ] );

        $wp_customize->add_setting( 'sjp_field_youtube', [
            'default' => ''
        ] );

        // SEO
        $wp_customize->add_setting( 'sjp_field_seo_google_analytics', [
            'default' => ''
        ] );

        $wp_customize->add_setting( 'sjp_field_seo_pixel_facebook', [
            'default' => ''
        ] );

        // Cookies
        $wp_customize->add_setting( 'sjp_field_cookies_active', [
            'default' => false
        ] );

        $wp_customize->add_setting( 'sjp_field_cookies_message', [
            'default' => ''
        ] );

        $wp_customize->add_setting( 'sjp_field_cookies_url', [
            'default' => ''
        ] );

        // Maintenance
        $wp_customize->add_setting( 'sjp_field_maintenance_active', [
            'default' => false
        ] );

        $wp_customize->add_setting( 'sjp_field_maintenance_title', [
            'default' => ''
        ] );

        $wp_customize->add_setting( 'sjp_field_maintenance_description', [
            'default' => ''
        ] );

    }

    public function add_sections( $wp_customize ) {

        // Where
        $wp_customize->add_section( 'sjp_where_section', [
            'title'    => __( 'Onde estamos?', 'sjp' ),
            'priority' => 30,
            'panel'    => 'sjp'
        ] );

        // Informations
        $wp_customize->add_section( 'sjp_informations_section', [
            'title'    => __( 'Informações', 'sjp' ),
            'priority' => 30,
            'panel'    => 'sjp'
        ] );

        // Networks
        $wp_customize->add_section( 'sjp_networks_section', [
            'title'    => __( 'Redes Sociais', 'sjp' ),
            'priority' => 31,
            'panel'    => 'sjp'
        ] );

        // SEO
        $wp_customize->add_section( 'sjp_seo_section', [
            'title'    => __( 'SEO', 'sjp' ),
            'priority' => 30,
            'panel'    => 'sjp'
        ] );

        // Cookies
        $wp_customize->add_section( 'sjp_cookies_section', [
            'title'    => __( 'Cookies', 'sjp' ),
            'priority' => 30,
            'panel'    => 'sjp'
        ] );

        // Maintenance
        $wp_customize->add_section( 'sjp_maintenance_section', [
            'title'    => __( 'Manutenção', 'sjp' ),
            'priority' => 30,
            'panel'    => 'sjp'
        ] );

    }

    public function add_panels( $wp_customize ) {

        $wp_customize->get_section( 'title_tagline' )->title = 'Geral';

        $wp_customize->add_panel( 'sjp', [
            'title'    => __( 'Configurações Serralheria Jovem Profeta', 'sjp' ),
            'priority' => 160
        ] );

    }

    public function add_controls( $wp_customize ) {

        // Logo
        $wp_customize->add_control( new WP_Customize_Image_Control(
            $wp_customize,
            'sjp_field_dark_logo',
            [
                'label'    => __( 'Logo escuro', 'sjp' ),
                'section'  => 'title_tagline',
                'settings' => 'sjp_field_dark_logo'
            ]
        ) );

        // Where
        $wp_customize->add_control( 'sjp_field_map_iframe',
            [
                'label'    => __( 'Iframe do mapa', 'sjp' ),
                'section'  => 'sjp_where_section',
                'settings' => 'sjp_field_map_iframe',
                'type'     => 'textarea'
            ]
        );

        // Informations
        $wp_customize->add_control( 'sjp_field_phone',
            [
                'label'    => __( 'Telefone', 'sjp' ),
                'section'  => 'sjp_informations_section',
                'settings' => 'sjp_field_phone',
                'type'     => 'text'
            ]
        );

        $wp_customize->add_control( 'sjp_field_address',
            [
                'label'    => __( 'Endereço', 'sjp' ),
                'section'  => 'sjp_informations_section',
                'settings' => 'sjp_field_address',
                'type'     => 'textarea'
            ]
        );

        $wp_customize->add_control( 'sjp_field_email',
            [
                'label'    => __( 'E-mail', 'sjp' ),
                'section'  => 'sjp_informations_section',
                'settings' => 'sjp_field_email',
                'type'     => 'email'
            ]
        );

        $wp_customize->add_control( 'sjp_field_privacy_email',
            [
                'label'    => __( 'E-mail de Privacidade', 'sjp' ),
                'section'  => 'sjp_informations_section',
                'settings' => 'sjp_field_privacy_email',
                'type'     => 'email'
            ]
        );

        // Networks
        $wp_customize->add_control( 'sjp_field_whatsapp',
            [
                'label'    => __( 'WhatsApp', 'sjp' ),
                'section'  => 'sjp_networks_section',
                'settings' => 'sjp_field_whatsapp',
                'type'     => 'text'
            ]
        );

        $wp_customize->add_control( 'sjp_field_facebook',
            [
                'label'    => __( 'Facebook', 'sjp' ),
                'section'  => 'sjp_networks_section',
                'settings' => 'sjp_field_facebook',
                'type'     => 'text'
            ]
        );

        $wp_customize->add_control( 'sjp_field_instagram',
            [
                'label'    => __( 'Instagram', 'sjp' ),
                'section'  => 'sjp_networks_section',
                'settings' => 'sjp_field_instagram',
                'type'     => 'text'
            ]
        );

        $wp_customize->add_control( 'sjp_field_youtube',
            [
                'label'    => __( 'Youtube', 'sjp' ),
                'section'  => 'sjp_networks_section',
                'settings' => 'sjp_field_youtube',
                'type'     => 'text'
            ]
        );

        // SEO
        $wp_customize->add_control( 'sjp_field_seo_google_analytics',
            [
                'label'    => __( 'Google Analytics', 'sjp' ),
                'section'  => 'sjp_seo_section',
                'settings' => 'sjp_field_seo_google_analytics',
                'type'     => 'text'
            ]
        );

        $wp_customize->add_control( 'sjp_field_seo_pixel_facebook',
            [
                'label'    => __( 'Píxel Facebook', 'sjp' ),
                'section'  => 'sjp_seo_section',
                'settings' => 'sjp_field_seo_pixel_facebook',
                'type'     => 'text'
            ]
        );

        // Cookies
        $wp_customize->add_control( 'sjp_field_cookies_active',
            [
                'label'    => __( 'Ativar', 'sjp' ),
                'section'  => 'sjp_cookies_section',
                'settings' => 'sjp_field_cookies_active',
                'type'     => 'checkbox'
            ]
        );

        $wp_customize->add_control( 'sjp_field_cookies_message',
            [
                'label'    => __( 'Mensagem', 'sjp' ),
                'section'  => 'sjp_cookies_section',
                'settings' => 'sjp_field_cookies_message',
                'type'     => 'textarea'
            ]
        );

        $wp_customize->add_control( 'sjp_field_cookies_url',
            [
                'label'    => __( 'URL', 'sjp' ),
                'section'  => 'sjp_cookies_section',
                'settings' => 'sjp_field_cookies_url',
                'type'     => 'url'
            ]
        );

        // Maintenance
        $wp_customize->add_control( 'sjp_field_maintenance_active',
            [
                'label'    => __( 'Ativar', 'sjp' ),
                'section'  => 'sjp_maintenance_section',
                'settings' => 'sjp_field_maintenance_active',
                'type'     => 'checkbox'
            ]
        );

        $wp_customize->add_control( 'sjp_field_maintenance_title',
            [
                'label'    => __( 'Título', 'sjp' ),
                'section'  => 'sjp_maintenance_section',
                'settings' => 'sjp_field_maintenance_title',
                'type'     => 'text'
            ]
        );

        $wp_customize->add_control( 'sjp_field_maintenance_description',
            [
                'label'    => __( 'Descriçao', 'sjp' ),
                'section'  => 'sjp_maintenance_section',
                'settings' => 'sjp_field_maintenance_description',
                'type'     => 'textarea'
            ]
        );
    }

}