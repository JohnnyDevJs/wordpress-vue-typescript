<?php
/**
 * Theme Customize
 *
 * @package cdr
 */

namespace CDR_THEME\Inc;

use CDR_THEME\Inc\Traits\Singleton;
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
        $wp_customize->add_setting( 'CDR_field_dark_logo', [
            'default' => ''
        ] );

        // Exams
        $wp_customize->add_setting( 'CDR_exams_field_description', [
            'default' => ''
        ] );

        $wp_customize->add_setting( 'CDR_exams_field_exam_results', [
            'default' => ''
        ] );

        $wp_customize->add_setting( 'CDR_exams_field_exams_offered', [
            'default' => ''
        ] );

        $wp_customize->add_setting( 'CDR_exams_field_image', [
            'default' => ''
        ] );

        // Fanchises
        $wp_customize->add_setting( 'CDR_franchises_field_title', [
            'default' => ''
        ] );

        $wp_customize->add_setting( 'CDR_franchises_field_description', [
            'default' => ''
        ] );

        $wp_customize->add_setting( 'CDR_franchises_field_know_more', [
            'default' => ''
        ] );

        $wp_customize->add_setting( 'CDR_franchises_field_image', [
            'default' => ''
        ] );

        // Reports
        $wp_customize->add_setting( 'CDR_reports_field_title', [
            'default' => ''
        ] );

        $wp_customize->add_setting( 'CDR_reports_field_description', [
            'default' => ''
        ] );

        $wp_customize->add_setting( 'CDR_reports_field_know_more', [
            'default' => ''
        ] );

        $wp_customize->add_setting( 'CDR_reports_field_image', [
            'default' => ''
        ] );

        // Where
        $wp_customize->add_setting( 'CDR_field_map_iframe', [
            'default' => ''
        ] );

        // Informations
        $wp_customize->add_setting( 'CDR_field_phone', [
            'default' => ''
        ] );

        $wp_customize->add_setting( 'CDR_field_address', [
            'default' => ''
        ] );

        $wp_customize->add_setting( 'CDR_field_email', [
            'default' => ''
        ] );

        $wp_customize->add_setting( 'CDR_field_privacy_email', [
            'default' => ''
        ] );

        // Week and Weekend
        $options = [
            'week',
            'weekend'
        ];

        foreach ( $options as $option ) {
            $wp_customize->add_setting( 'CDR_field_' . $option . '_attendance', [
                'default' => ''
            ] );

            $wp_customize->add_setting( 'CDR_field_' . $option . '_x_ray', [
                'default' => ''
            ] );

            $wp_customize->add_setting( 'CDR_field_' . $option . '_documentations', [
                'default' => ''
            ] );
        }

        // Networks
        $wp_customize->add_setting( 'CDR_field_whatsapp', [
            'default' => ''
        ] );

        $wp_customize->add_setting( 'CDR_field_facebook', [
            'default' => ''
        ] );

        $wp_customize->add_setting( 'CDR_field_instagram', [
            'default' => ''
        ] );

        $wp_customize->add_setting( 'CDR_field_youtube', [
            'default' => ''
        ] );

        // Franchise
        $wp_customize->add_setting( 'CDR_field_contract', [
            'default' => ''
        ] );

        // About
        $wp_customize->add_setting( 'CDR_field_about_description', [
            'default' => ''
        ] );

        $wp_customize->add_setting( 'CDR_field_about_image', [
            'default' => ''
        ] );

        $wp_customize->add_setting( 'CDR_field_about_url', [
            'default' => ''
        ] );

        // SEO
        $wp_customize->add_setting( 'CDR_field_seo_google_analytics', [
            'default' => ''
        ] );

        $wp_customize->add_setting( 'CDR_field_seo_pixel_facebook', [
            'default' => ''
        ] );

        // Cookies
        $wp_customize->add_setting( 'CDR_field_cookies_active', [
            'default' => false
        ] );

        $wp_customize->add_setting( 'CDR_field_cookies_message', [
            'default' => ''
        ] );

        $wp_customize->add_setting( 'CDR_field_cookies_url', [
            'default' => ''
        ] );

        // Maintenance
        $wp_customize->add_setting( 'CDR_field_maintenance_active', [
            'default' => false
        ] );

        $wp_customize->add_setting( 'CDR_field_maintenance_title', [
            'default' => ''
        ] );

        $wp_customize->add_setting( 'CDR_field_maintenance_description', [
            'default' => ''
        ] );

    }

    public function add_sections( $wp_customize ) {

        // Exams
        $wp_customize->add_section( 'CDR_exams_section', [
            'title'    => __( 'Seção exames', 'iro' ),
            'priority' => 30,
            'panel'    => 'iro'
        ] );

        // Franchises
        $wp_customize->add_section( 'CDR_franchises_section', [
            'title'    => __( 'Seção Franquias', 'iro' ),
            'priority' => 30,
            'panel'    => 'iro'
        ] );

        // Reports
        $wp_customize->add_section( 'CDR_reports_section', [
            'title'    => __( 'Seção Laudos', 'iro' ),
            'priority' => 30,
            'panel'    => 'iro'
        ] );

        // About
        $wp_customize->add_section( 'CDR_about_section', [
            'title'    => __( 'Seção Quem Somos', 'iro' ),
            'priority' => 30,
            'panel'    => 'iro'
        ] );

        // Where
        $wp_customize->add_section( 'CDR_where_section', [
            'title'    => __( 'Onde estamos?', 'iro' ),
            'priority' => 30,
            'panel'    => 'iro'
        ] );

        // Informations
        $wp_customize->add_section( 'CDR_informations_section', [
            'title'    => __( 'Informações', 'iro' ),
            'priority' => 30,
            'panel'    => 'iro'
        ] );

        // Week and Weekend
        $options = [
            'week'    => 'Horários semais',
            'weekend' => 'Horários fim de semana'
        ];

        foreach ( $options as $key => $option ) {

            $wp_customize->add_section( 'CDR_' . $key . '_section', [
                'title'    => __( $option, 'iro' ),
                'priority' => 30,
                'panel'    => 'iro'
            ] );
        }

        // Networks
        $wp_customize->add_section( 'CDR_networks_section', [
            'title'    => __( 'Redes Sociais', 'iro' ),
            'priority' => 31,
            'panel'    => 'iro'
        ] );

        // Franchise
        $wp_customize->add_section( 'CDR_franchise_section', [
            'title'    => __( 'Franquias', 'iro' ),
            'priority' => 31,
            'panel'    => 'iro'
        ] );

        // SEO
        $wp_customize->add_section( 'CDR_seo_section', [
            'title'    => __( 'SEO', 'iro' ),
            'priority' => 30,
            'panel'    => 'iro'
        ] );

        // Cookies
        $wp_customize->add_section( 'CDR_cookies_section', [
            'title'    => __( 'Cookies', 'iro' ),
            'priority' => 30,
            'panel'    => 'iro'
        ] );

        // Cookies
        $wp_customize->add_section( 'CDR_maintenance_section', [
            'title'    => __( 'Manutenção', 'iro' ),
            'priority' => 30,
            'panel'    => 'iro'
        ] );

    }

    public function add_panels( $wp_customize ) {

        $wp_customize->get_section( 'title_tagline' )->title = 'Geral';

        $wp_customize->add_panel( 'iro', [
            'title'    => __( 'Configurações IRO', 'iro' ),
            'priority' => 160
        ] );

    }

    public function add_controls( $wp_customize ) {

        // Logo
        $wp_customize->add_control( new WP_Customize_Image_Control(
            $wp_customize,
            'CDR_field_dark_logo',
            [
                'label'    => __( 'Logo escuro', 'iro' ),
                'section'  => 'title_tagline',
                'settings' => 'CDR_field_dark_logo'
            ]
        ) );

        // Exams
        $wp_customize->add_control( 'CDR_exams_field_description',
            [
                'label'    => __( 'Descrição', 'iro' ),
                'section'  => 'CDR_exams_section',
                'settings' => 'CDR_exams_field_description',
                'type'     => 'textarea'
            ]
        );

        $wp_customize->add_control( 'CDR_exams_field_exam_results',
            [
                'label'    => __( 'Url resultados de exames', 'iro' ),
                'section'  => 'CDR_exams_section',
                'settings' => 'CDR_exams_field_exam_results',
                'type'     => 'url'
            ]
        );

        $wp_customize->add_control( 'CDR_exams_field_exams_offered',
            [
                'label'    => __( 'Url exames oferecidos', 'iro' ),
                'section'  => 'CDR_exams_section',
                'settings' => 'CDR_exams_field_exams_offered',
                'type'     => 'url'
            ]
        );

        $wp_customize->add_control( new WP_Customize_Image_Control(
            $wp_customize,
            'CDR_exams_field_image',
            [
                'label'    => __( 'Imagem', 'iro' ),
                'section'  => 'CDR_exams_section',
                'settings' => 'CDR_exams_field_image'
            ]
        ) );

        // Franchises
        $wp_customize->add_control( 'CDR_franchises_field_title',
            [
                'label'    => __( 'Título', 'iro' ),
                'section'  => 'CDR_franchises_section',
                'settings' => 'CDR_franchises_field_title',
                'type'     => 'text'
            ]
        );

        $wp_customize->add_control( 'CDR_franchises_field_description',
            [
                'label'    => __( 'Descrição', 'iro' ),
                'section'  => 'CDR_franchises_section',
                'settings' => 'CDR_franchises_field_description',
                'type'     => 'textarea'
            ]
        );

        $wp_customize->add_control( 'CDR_franchises_field_know_more',
            [
                'label'    => __( 'Url', 'iro' ),
                'section'  => 'CDR_franchises_section',
                'settings' => 'CDR_franchises_field_know_more',
                'type'     => 'url'
            ]
        );

        $wp_customize->add_control( new WP_Customize_Image_Control(
            $wp_customize,
            'CDR_franchises_field_image',
            [
                'label'    => __( 'Imagem', 'iro' ),
                'section'  => 'CDR_franchises_section',
                'settings' => 'CDR_franchises_field_image'
            ]
        ) );

        // Reports
        $wp_customize->add_control( 'CDR_reports_field_title',
            [
                'label'    => __( 'Título', 'iro' ),
                'section'  => 'CDR_reports_section',
                'settings' => 'CDR_reports_field_title',
                'type'     => 'text'
            ]
        );

        $wp_customize->add_control( 'CDR_reports_field_description',
            [
                'label'    => __( 'Descrição', 'iro' ),
                'section'  => 'CDR_reports_section',
                'settings' => 'CDR_reports_field_description',
                'type'     => 'textarea'
            ]
        );

        $wp_customize->add_control( 'CDR_reports_field_know_more',
            [
                'label'    => __( 'Url', 'iro' ),
                'section'  => 'CDR_reports_section',
                'settings' => 'CDR_reports_field_know_more',
                'type'     => 'url'
            ]
        );

        $wp_customize->add_control( new WP_Customize_Image_Control(
            $wp_customize,
            'CDR_reports_field_image',
            [
                'label'    => __( 'Imagem', 'iro' ),
                'section'  => 'CDR_reports_section',
                'settings' => 'CDR_reports_field_image'
            ]
        ) );

        // Where
        $wp_customize->add_control( 'CDR_field_map_iframe',
            [
                'label'    => __( 'Iframe do mapa', 'iro' ),
                'section'  => 'CDR_where_section',
                'settings' => 'CDR_field_map_iframe',
                'type'     => 'textarea'
            ]
        );

        // Informations
        $wp_customize->add_control( 'CDR_field_phone',
            [
                'label'    => __( 'Telefone', 'iro' ),
                'section'  => 'CDR_informations_section',
                'settings' => 'CDR_field_phone',
                'type'     => 'text'
            ]
        );

        $wp_customize->add_control( 'CDR_field_address',
            [
                'label'    => __( 'Endereço', 'iro' ),
                'section'  => 'CDR_informations_section',
                'settings' => 'CDR_field_address',
                'type'     => 'textarea'
            ]
        );

        $wp_customize->add_control( 'CDR_field_email',
            [
                'label'    => __( 'E-mail', 'iro' ),
                'section'  => 'CDR_informations_section',
                'settings' => 'CDR_field_email',
                'type'     => 'email'
            ]
        );

        $wp_customize->add_control( 'CDR_field_privacy_email',
            [
                'label'    => __( 'E-mail de Privacidade', 'iro' ),
                'section'  => 'CDR_informations_section',
                'settings' => 'CDR_field_privacy_email',
                'type'     => 'email'
            ]
        );

        $options = [
            'week',
            'weekend'
        ];

        foreach ( $options as $option ) {
            // Week and Weekend
            $wp_customize->add_control( 'CDR_field_' . $option . '_attendance',
                [
                    'label'    => __( 'Horário de Atendimento', 'iro' ),
                    'section'  => 'CDR_' . $option . '_section',
                    'settings' => 'CDR_field_' . $option . '_attendance',
                    'type'     => 'text'
                ]
            );

            $wp_customize->add_control( 'CDR_field_' . $option . '_x_ray',
                [
                    'label'    => __( 'Raio-X', 'iro' ),
                    'section'  => 'CDR_' . $option . '_section',
                    'settings' => 'CDR_field_' . $option . '_x_ray',
                    'type'     => 'text'
                ]
            );

            $wp_customize->add_control( 'CDR_field_' . $option . '_documentations',
                [
                    'label'    => __( 'Documentações', 'iro' ),
                    'section'  => 'CDR_' . $option . '_section',
                    'settings' => 'CDR_field_' . $option . '_documentations',
                    'type'     => 'text'
                ]
            );
        }

        // Networks
        $wp_customize->add_control( 'CDR_field_whatsapp',
            [
                'label'    => __( 'WhatsApp', 'iro' ),
                'section'  => 'CDR_networks_section',
                'settings' => 'CDR_field_whatsapp',
                'type'     => 'text'
            ]
        );

        $wp_customize->add_control( 'CDR_field_facebook',
            [
                'label'    => __( 'Facebook', 'iro' ),
                'section'  => 'CDR_networks_section',
                'settings' => 'CDR_field_facebook',
                'type'     => 'text'
            ]
        );

        $wp_customize->add_control( 'CDR_field_instagram',
            [
                'label'    => __( 'Instagram', 'iro' ),
                'section'  => 'CDR_networks_section',
                'settings' => 'CDR_field_instagram',
                'type'     => 'text'
            ]
        );

        $wp_customize->add_control( 'CDR_field_youtube',
            [
                'label'    => __( 'Youtube', 'iro' ),
                'section'  => 'CDR_networks_section',
                'settings' => 'CDR_field_youtube',
                'type'     => 'text'
            ]
        );

        // Franchise
        $wp_customize->add_control(
            new WP_Customize_Upload_Control(
                $wp_customize,
                'CDR_field_contract',
                [
                    'label'    => __( 'Termo de Adesão', 'iro' ),
                    'section'  => 'CDR_franchise_section',
                    'settings' => 'CDR_field_contract'
                ] )
        );

        // About
        $wp_customize->add_control( new WP_Customize_Image_Control(
            $wp_customize,
            'CDR_field_about_image',
            [
                'label'    => __( 'Imagem', 'iro' ),
                'section'  => 'CDR_about_section',
                'settings' => 'CDR_field_about_image'
            ]
        ) );

        $wp_customize->add_control( 'CDR_field_about_description',
            [
                'label'    => __( 'Descrição', 'iro' ),
                'section'  => 'CDR_about_section',
                'settings' => 'CDR_field_about_description',
                'type'     => 'textarea'
            ]
        );

        $wp_customize->add_control( 'CDR_field_about_url',
            [
                'label'    => __( 'Url', 'iro' ),
                'section'  => 'CDR_about_section',
                'settings' => 'CDR_field_about_url',
                'type'     => 'url'
            ]
        );

        // SEO
        $wp_customize->add_control( 'CDR_field_seo_google_analytics',
            [
                'label'    => __( 'Google Analytics', 'iro' ),
                'section'  => 'CDR_seo_section',
                'settings' => 'CDR_field_seo_google_analytics',
                'type'     => 'text'
            ]
        );

        $wp_customize->add_control( 'CDR_field_seo_pixel_facebook',
            [
                'label'    => __( 'Píxel Facebook', 'iro' ),
                'section'  => 'CDR_seo_section',
                'settings' => 'CDR_field_seo_pixel_facebook',
                'type'     => 'text'
            ]
        );

        // Cookies
        $wp_customize->add_control( 'CDR_field_cookies_active',
            [
                'label'    => __( 'Ativar', 'iro' ),
                'section'  => 'CDR_cookies_section',
                'settings' => 'CDR_field_cookies_active',
                'type'     => 'checkbox'
            ]
        );

        // Cookies
        $wp_customize->add_control( 'CDR_field_cookies_message',
            [
                'label'    => __( 'Mensagem', 'iro' ),
                'section'  => 'CDR_cookies_section',
                'settings' => 'CDR_field_cookies_message',
                'type'     => 'textarea'
            ]
        );

        $wp_customize->add_control( 'CDR_field_cookies_url',
            [
                'label'    => __( 'URL', 'iro' ),
                'section'  => 'CDR_cookies_section',
                'settings' => 'CDR_field_cookies_url',
                'type'     => 'url'
            ]
        );

        // Maintenance
        $wp_customize->add_control( 'CDR_field_maintenance_active',
            [
                'label'    => __( 'Ativar', 'iro' ),
                'section'  => 'CDR_maintenance_section',
                'settings' => 'CDR_field_maintenance_active',
                'type'     => 'checkbox'
            ]
        );

        $wp_customize->add_control( 'CDR_field_maintenance_title',
            [
                'label'    => __( 'Título', 'iro' ),
                'section'  => 'CDR_maintenance_section',
                'settings' => 'CDR_field_maintenance_title',
                'type'     => 'text'
            ]
        );

        $wp_customize->add_control( 'CDR_field_maintenance_description',
            [
                'label'    => __( 'Descriçao', 'iro' ),
                'section'  => 'CDR_maintenance_section',
                'settings' => 'CDR_field_maintenance_description',
                'type'     => 'textarea'
            ]
        );
    }

}
