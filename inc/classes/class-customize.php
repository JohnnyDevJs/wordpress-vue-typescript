<?php
/**
 * Theme Customize
 *
 * @package cm
 */

namespace CM_THEME\Inc;

use CM_THEME\Inc\Traits\Singleton;
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

        // Banner
        $wp_customize->add_setting( 'cm_field_banner_logo_ub', [
            'default' => ''
        ] );

        // Networks
        $wp_customize->add_setting( 'cm_field_whatsapp', [
            'default' => ''
        ] );

        $wp_customize->add_setting( 'cm_field_facebook', [
            'default' => ''
        ] );

        $wp_customize->add_setting( 'cm_field_instagram', [
            'default' => ''
        ] );

        $wp_customize->add_setting( 'cm_field_youtube', [
            'default' => ''
        ] );

        $wp_customize->add_setting( 'cm_field_twitter', [
            'default' => ''
        ] );

        // Options
        $wp_customize->add_setting( 'cm_field_options_image', [
            'default' => ''
        ] );

        // Materials
        $wp_customize->add_setting( 'cm_field_materials_multimedia', [
            'default' => ''
        ] );

        $wp_customize->add_setting( 'cm_field_materials_image', [
            'default' => ''
        ] );

        $wp_customize->add_setting( 'cm_field_materials_mockup', [
            'default' => ''
        ] );

        $wp_customize->add_setting( 'cm_field_materials_videos', [
            'default' => ''
        ] );

        $wp_customize->add_setting( 'cm_field_materials_audios', [
            'default' => ''
        ] );

        // About
        $wp_customize->add_setting( 'cm_field_about_image', [
            'default' => ''
        ] );

        $wp_customize->add_setting( 'cm_field_about_background', [
            'default' => ''
        ] );

        // Pages
        $wp_customize->add_setting( 'cm_field_pages_title_image', [
            'default' => ''
        ] );

        // Downloads
        $wp_customize->add_setting( 'cm_field_downloads_sticker', [
            'default' => ''
        ] );

        $wp_customize->add_setting( 'cm_field_downloads_informativo_front', [
            'default' => ''
        ] );

        $wp_customize->add_setting( 'cm_field_downloads_informativo_verse', [
            'default' => ''
        ] );

        $wp_customize->add_setting( 'cm_field_downloads_oficial_photo', [
            'default' => ''
        ] );

        $wp_customize->add_setting( 'cm_field_downloads_photo_oficial_two', [
            'default' => ''
        ] );

        $wp_customize->add_setting( 'cm_field_downloads_logo_one', [
            'default' => ''
        ] );

        $wp_customize->add_setting( 'cm_field_downloads_logo_one', [
            'default' => ''
        ] );

        $wp_customize->add_setting( 'cm_field_downloads_logo_two', [
            'default' => ''
        ] );

        $wp_customize->add_setting( 'cm_field_downloads_logo_horizontal_shadow', [
            'default' => ''
        ] );

        $wp_customize->add_setting( 'cm_field_downloads_logo_vertical_shadow', [
            'default' => ''
        ] );

    }

    public function add_sections( $wp_customize ) {

        // Banners
        $wp_customize->add_section( 'cm_banners_section', [
            'title'    => __( 'Banners', 'cm' ),
            'priority' => 31,
            'panel'    => 'cm'
        ] );

        // Networks
        $wp_customize->add_section( 'cm_socials_section', [
            'title'    => __( 'Redes Sociais', 'cm' ),
            'priority' => 31,
            'panel'    => 'cm'
        ] );

        // Options
        $wp_customize->add_section( 'cm_options_section', [
            'title'    => __( 'Sessão opções', 'cm' ),
            'priority' => 31,
            'panel'    => 'cm'
        ] );

        // Materials
        $wp_customize->add_section( 'cm_materials_section', [
            'title'    => __( 'Sessão materiais', 'cm' ),
            'priority' => 31,
            'panel'    => 'cm'
        ] );

        // Options
        $wp_customize->add_section( 'cm_about_section', [
            'title'    => __( 'Página quem sou', 'cm' ),
            'priority' => 31,
            'panel'    => 'cm'
        ] );

        // Pages
        $wp_customize->add_section( 'cm_pages_section', [
            'title'    => __( 'Páginas', 'cm' ),
            'priority' => 31,
            'panel'    => 'cm'
        ] );

        // Pages
        $wp_customize->add_section( 'cm_downloads_section', [
            'title'    => __( 'Downloads', 'cm' ),
            'priority' => 31,
            'panel'    => 'cm'
        ] );

    }

    public function add_panels( $wp_customize ) {

        $wp_customize->get_section( 'title_tagline' )->title = 'Geral';

        $wp_customize->add_panel( 'cm', [
            'title'    => __( 'Configurações Cristina Mel', 'cm' ),
            'priority' => 160
        ] );

    }

    public function add_controls( $wp_customize ) {

        // Networks
        $wp_customize->add_control( 'cm_field_whatsapp',
            [
                'label'    => __( 'WhatsApp', 'cm' ),
                'section'  => 'cm_socials_section',
                'settings' => 'cm_field_whatsapp',
                'type'     => 'text'
            ]
        );

        $wp_customize->add_control( 'cm_field_facebook',
            [
                'label'    => __( 'Facebook', 'cm' ),
                'section'  => 'cm_socials_section',
                'settings' => 'cm_field_facebook',
                'type'     => 'text'
            ]
        );

        $wp_customize->add_control( 'cm_field_instagram',
            [
                'label'    => __( 'Instagram', 'cm' ),
                'section'  => 'cm_socials_section',
                'settings' => 'cm_field_instagram',
                'type'     => 'text'
            ]
        );

        $wp_customize->add_control( 'cm_field_youtube',
            [
                'label'    => __( 'Youtube', 'cm' ),
                'section'  => 'cm_socials_section',
                'settings' => 'cm_field_youtube',
                'type'     => 'text'
            ]
        );

        $wp_customize->add_control( 'cm_field_twitter',
            [
                'label'    => __( 'Twitter', 'cm' ),
                'section'  => 'cm_socials_section',
                'settings' => 'cm_field_twitter',
                'type'     => 'text'
            ]
        );

        // Options
        $wp_customize->add_control( new WP_Customize_Image_Control(
            $wp_customize,
            'cm_field_options_image',
            [
                'label'    => __( 'Imagem', 'cm' ),
                'section'  => 'cm_options_section',
                'settings' => 'cm_field_options_image'
            ]
        ) );

        // Materials
        $wp_customize->add_control( new WP_Customize_Image_Control(
            $wp_customize,
            'cm_field_materials_image',
            [
                'label'    => __( 'Imagem', 'cm' ),
                'section'  => 'cm_materials_section',
                'settings' => 'cm_field_materials_image'
            ]
        ) );

        $wp_customize->add_control( new WP_Customize_Image_Control(
            $wp_customize,
            'cm_field_materials_multimedia',
            [
                'label'    => __( 'Multimídia', 'cm' ),
                'section'  => 'cm_materials_section',
                'settings' => 'cm_field_materials_multimedia'
            ]
        ) );

        $wp_customize->add_control( new WP_Customize_Image_Control(
            $wp_customize,
            'cm_field_materials_mockup',
            [
                'label'    => __( 'Mockup', 'cm' ),
                'section'  => 'cm_materials_section',
                'settings' => 'cm_field_materials_mockup'
            ]
        ) );

        $wp_customize->add_control( new WP_Customize_Image_Control(
            $wp_customize,
            'cm_field_materials_videos',
            [
                'label'    => __( 'Vídeos', 'cm' ),
                'section'  => 'cm_materials_section',
                'settings' => 'cm_field_materials_videos'
            ]
        ) );

        $wp_customize->add_control( new WP_Customize_Image_Control(
            $wp_customize,
            'cm_field_materials_audios',
            [
                'label'    => __( 'Áudios', 'cm' ),
                'section'  => 'cm_materials_section',
                'settings' => 'cm_field_materials_audios'
            ]
        ) );

        // About
        $wp_customize->add_control( new WP_Customize_Image_Control(
            $wp_customize,
            'cm_field_about_background',
            [
                'label'    => __( 'Imagem de fundo', 'cm' ),
                'section'  => 'cm_about_section',
                'settings' => 'cm_field_about_background'
            ]
        ) );

        $wp_customize->add_control( new WP_Customize_Image_Control(
            $wp_customize,
            'cm_field_about_image',
            [
                'label'    => __( 'Imagem', 'cm' ),
                'section'  => 'cm_about_section',
                'settings' => 'cm_field_about_image'
            ]
        ) );

        // Pages
        $wp_customize->add_control( new WP_Customize_Image_Control(
            $wp_customize,
            'cm_field_pages_title_image',
            [
                'label'    => __( 'Imagem', 'cm' ),
                'section'  => 'cm_pages_section',
                'settings' => 'cm_field_pages_title_image'
            ]
        ) );

        // Downloads
        $wp_customize->add_control( new WP_Customize_Upload_Control(
            $wp_customize,
            'cm_field_downloads_sticker',
            [
                'label'    => __( 'Adeviso', 'cm' ),
                'section'  => 'cm_downloads_section',
                'settings' => 'cm_field_downloads_sticker'
            ]
        ) );

        $wp_customize->add_control( new WP_Customize_Upload_Control(
            $wp_customize,
            'cm_field_downloads_informativo_front',
            [
                'label'    => __( 'Informativo frente', 'cm' ),
                'section'  => 'cm_downloads_section',
                'settings' => 'cm_field_downloads_informativo_front'
            ]
        ) );

        $wp_customize->add_control( new WP_Customize_Upload_Control(
            $wp_customize,
            'cm_field_downloads_informativo_verse',
            [
                'label'    => __( 'Informativo verso', 'cm' ),
                'section'  => 'cm_downloads_section',
                'settings' => 'cm_field_downloads_informativo_verse'
            ]
        ) );

        $wp_customize->add_control( new WP_Customize_Image_Control(
            $wp_customize,
            'cm_field_downloads_oficial_photo',
            [
                'label'    => __( 'Foto oficial da campanha', 'cm' ),
                'section'  => 'cm_downloads_section',
                'settings' => 'cm_field_downloads_oficial_photo'
            ]
        ) );

        $wp_customize->add_control( new WP_Customize_Image_Control(
            $wp_customize,
            'cm_field_downloads_photo_oficial_two',
            [
                'label'    => __( 'Foto oficial 2', 'cm' ),
                'section'  => 'cm_downloads_section',
                'settings' => 'cm_field_downloads_photo_oficial_two'
            ]
        ) );

        $wp_customize->add_control( new WP_Customize_Image_Control(
            $wp_customize,
            'cm_field_downloads_logo_one',
            [
                'label'    => __( 'Logo 1', 'cm' ),
                'section'  => 'cm_downloads_section',
                'settings' => 'cm_field_downloads_logo_one'
            ]
        ) );

        $wp_customize->add_control( new WP_Customize_Image_Control(
            $wp_customize,
            'cm_field_downloads_logo_two',
            [
                'label'    => __( 'Logo 2', 'cm' ),
                'section'  => 'cm_downloads_section',
                'settings' => 'cm_field_downloads_logo_two'
            ]
        ) );

        $wp_customize->add_control( new WP_Customize_Image_Control(
            $wp_customize,
            'cm_field_downloads_logo_horizontal_shadow',
            [
                'label'    => __( 'Logo horizontal com sombra', 'cm' ),
                'section'  => 'cm_downloads_section',
                'settings' => 'cm_field_downloads_logo_horizontal_shadow'
            ]
        ) );

        $wp_customize->add_control( new WP_Customize_Image_Control(
            $wp_customize,
            'cm_field_downloads_logo_vertical_shadow',
            [
                'label'    => __( 'Logo vertical com sombra', 'cm' ),
                'section'  => 'cm_downloads_section',
                'settings' => 'cm_field_downloads_logo_vertical_shadow'
            ]
        ) );

        // Banner
        $wp_customize->add_control( new WP_Customize_Image_Control(
            $wp_customize,
            'cm_field_banner_logo_ub',
            [
                'label'    => __( 'Logo União Brasil', 'cm' ),
                'section'  => 'cm_banners_section',
                'settings' => 'cm_field_banner_logo_ub'
            ]
        ) );

    }

}