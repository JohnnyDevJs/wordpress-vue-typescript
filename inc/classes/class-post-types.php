<?php
/**
 * Register Post Types.
 *
 * @package cm
 */

namespace CM_THEME\Inc;

use CM_THEME\Inc\Traits\Singleton;

class Post_Types {

    use Singleton;

    protected function __construct() {

        // load class
        $this->setup_hooks();

    }

    protected function setup_hooks() {

        /**
         * Actions.
         */
        add_action( 'init', [$this, 'banner_init'] );
        add_action( 'init', [$this, 'schedule_init'] );
        add_action( 'init', [$this, 'photos_init'] );
        add_action( 'init', [$this, 'videos_init'] );
    }

    // Post Type Banner.
    public function banner_init() {

        $labels = [
            'name'                  => _x( 'Banner', 'Post type general name', 'banner' ),
            'singular_name'         => _x( 'Banner', 'Post type singular name', 'banner' ),
            'menu_name'             => _x( 'Banner', 'Admin Menu text', 'banner' ),
            'name_admin_bar'        => _x( 'Banner', 'Add New on Toolbar', 'banner' ),
            'add_new'               => __( 'Adicionar novo', 'banner' ),
            'add_new_item'          => __( 'Adicionar novo banner', 'banner' ),
            'new_item'              => __( 'Novo banner', 'banner' ),
            'edit_item'             => __( 'Editar banner', 'banner' ),
            'view_item'             => __( 'Ver banner', 'banner' ),
            'all_items'             => __( 'Todos os banners', 'banner' ),
            'search_items'          => __( 'Buscar banner', 'banner' ),
            'parent_item_colon'     => __( 'Pai banner:', 'banner' ),
            'not_found'             => __( 'Nenhum banner encontrada.', 'banner' ),
            'not_found_in_trash'    => __( 'Nenhum banner encontrada na Lixeira.', 'banner' ),
            'featured_image'        => _x( 'Imagem da banner', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'banner' ),
            'set_featured_image'    => _x( 'Definir a imagem da banner', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'banner' ),
            'remove_featured_image' => _x( 'Remover imagem', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'banner' ),
            'use_featured_image'    => _x( 'Usar uma imagem', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'banner' ),
            'archives'              => _x( 'Arquivos de banner', 'banner' ),
            'insert_into_item'      => _x( 'Inserir na banner', 'banner' ),
            'uploaded_to_this_item' => _x( 'Carregar para esses banner', 'banner' ),
            'filter_items_list'     => _x( 'Filtrar lista de banner', 'banner' ),
            'items_list_navigation' => _x( 'Navegação da lista de banner', 'banner' ),
            'items_list'            => _x( 'Lista de banner', '', 'banner' )
        ];

        $args = [
            'labels'             => $labels,
            'public'             => false,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'show_in_rest'       => true,
            'query_var'          => true,
            'rewrite'            => false,
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => 30,
            'menu_icon'          => 'dashicons-slides',
            'supports'           => ['title', 'editor', 'thumbnail']
        ];

        register_post_type( 'banner', $args );

    }

    // Post Type Schedule.
    public function schedule_init() {

        $labels = [
            'name'                  => _x( 'Agendas', 'Post type general name', 'schedule' ),
            'singular_name'         => _x( 'Agenda', 'Post type singular name', 'schedule' ),
            'menu_name'             => _x( 'Agenda', 'Admin Menu text', 'schedule' ),
            'name_admin_bar'        => _x( 'Agenda', 'Add New on Toolbar', 'schedule' ),
            'add_new'               => __( 'Adicionar nova', 'agenda' ),
            'add_new_item'          => __( 'Adicionar nova agenda', 'schedule' ),
            'new_item'              => __( 'Nova agenda', 'schedule' ),
            'edit_item'             => __( 'Editar agenda', 'schedule' ),
            'view_item'             => __( 'Ver agenda', 'schedule' ),
            'all_items'             => __( 'Todos as agendas', 'schedule' ),
            'search_items'          => __( 'Buscar agenda', 'schedule' ),
            'parent_item_colon'     => __( 'Pai agenda:', 'schedule' ),
            'not_found'             => __( 'Nenhuma agenda encontrada.', 'schedule' ),
            'not_found_in_trash'    => __( 'Nenhuma agenda encontrada na Lixeira.', 'schedule' ),
            'featured_image'        => _x( 'Imagem da agenda', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'schedule' ),
            'set_featured_image'    => _x( 'Definir a imagem da agenda', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'schedule' ),
            'remove_featured_image' => _x( 'Remover imagem', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'schedule' ),
            'use_featured_image'    => _x( 'Usar uma imagem', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'schedule' ),
            'archives'              => _x( 'Arquivos de agenda', 'schedule' ),
            'insert_into_item'      => _x( 'Inserir na agenda', 'schedule' ),
            'uploaded_to_this_item' => _x( 'Carregar para essas agendas', 'schedule' ),
            'filter_items_list'     => _x( 'Filtrar lista de agendas', 'schedule' ),
            'items_list_navigation' => _x( 'Navegação da lista de agendas', 'schedule' ),
            'items_list'            => _x( 'Lista de agenda', '', 'schedule' )
        ];

        $args = [
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'show_in_rest'       => true,
            'query_var'          => true,
            'rewrite'            => false,
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => 30,
            'menu_icon'          => 'dashicons-schedule',
            'supports'           => ['title', 'editor'],
            'taxonomies'         => ['post_tag']

        ];

        register_post_type( 'schedule', $args );

    }

    // Post Type Photos.
    public function photos_init() {

        $labels = [
            'name'                  => _x( 'Fotos', 'Post type general name', 'photos' ),
            'singular_name'         => _x( 'Foto', 'Post type singular name', 'photos' ),
            'menu_name'             => _x( 'Fotos', 'Admin Menu text', 'photos' ),
            'name_admin_bar'        => _x( 'Foto', 'Add New on Toolbar', 'photos' ),
            'add_new'               => __( 'Adicionar nova', 'foto' ),
            'add_new_item'          => __( 'Adicionar nova foto', 'photos' ),
            'new_item'              => __( 'Nova foto', 'photos' ),
            'edit_item'             => __( 'Editar foto', 'photos' ),
            'view_item'             => __( 'Ver foto', 'photos' ),
            'all_items'             => __( 'Todos as fotos', 'photos' ),
            'search_items'          => __( 'Buscar foto', 'photos' ),
            'parent_item_colon'     => __( 'Pai foto:', 'photos' ),
            'not_found'             => __( 'Nenhuma foto encontrada.', 'photos' ),
            'not_found_in_trash'    => __( 'Nenhuma foto encontrada na Lixeira.', 'photos' ),
            'featured_image'        => _x( 'Imagem da foto', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'photos' ),
            'set_featured_image'    => _x( 'Definir a imagem da foto', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'photos' ),
            'remove_featured_image' => _x( 'Remover imagem', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'photos' ),
            'use_featured_image'    => _x( 'Usar uma imagem', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'photos' ),
            'archives'              => _x( 'Arquivos de foto', 'photos' ),
            'insert_into_item'      => _x( 'Inserir na foto', 'photos' ),
            'uploaded_to_this_item' => _x( 'Carregar para essas fotos', 'photos' ),
            'filter_items_list'     => _x( 'Filtrar lista de fotos', 'photos' ),
            'items_list_navigation' => _x( 'Navegação da lista de fotos', 'photos' ),
            'items_list'            => _x( 'Lista de foto', '', 'photos' )
        ];

        $args = [
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'show_in_rest'       => true,
            'query_var'          => true,
            'rewrite'            => [
                'slug' => 'fotos'
            ],
            'has_archive'        => false,
            'hierarchical'       => true,
            'menu_position'      => 30,
            'menu_icon'          => 'dashicons-images-alt',
            'supports'           => ['title', 'thumbnail']

        ];

        register_post_type( 'photos', $args );

    }

    // Post Type Videos.
    public function videos_init() {

        $labels = [
            'name'                  => _x( 'Videos', 'Post type general name', 'videos' ),
            'singular_name'         => _x( 'Video', 'Post type singular name', 'videos' ),
            'menu_name'             => _x( 'Videos', 'Admin Menu text', 'videos' ),
            'name_admin_bar'        => _x( 'Video', 'Add New on Toolbar', 'videos' ),
            'add_new'               => __( 'Adicionar novo', 'videos' ),
            'add_new_item'          => __( 'Adicionar novo vídeo', 'videos' ),
            'new_item'              => __( 'Nova vídeo', 'videos' ),
            'edit_item'             => __( 'Editar vídeo', 'videos' ),
            'view_item'             => __( 'Ver vídeo', 'videos' ),
            'all_items'             => __( 'Todos os vídeos', 'videos' ),
            'search_items'          => __( 'Buscar vídeo', 'videos' ),
            'parent_item_colon'     => __( 'Pai vídeo:', 'videos' ),
            'not_found'             => __( 'Nenhum vídeo encontrada.', 'videos' ),
            'not_found_in_trash'    => __( 'Nenhum vídeo encontrada na Lixeira.', 'videos' ),
            'featured_image'        => _x( 'Imagem do vídeo', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'videos' ),
            'set_featured_image'    => _x( 'Definir a imagem do vídeo', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'videos' ),
            'remove_featured_image' => _x( 'Remover imagem', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'videos' ),
            'use_featured_image'    => _x( 'Usar uma imagem', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'videos' ),
            'archives'              => _x( 'Arquivos de vídeo', 'videos' ),
            'insert_into_item'      => _x( 'Inserir no vídeo', 'videos' ),
            'uploaded_to_this_item' => _x( 'Carregar para esses vídeos', 'videos' ),
            'filter_items_list'     => _x( 'Filtrar lista de vídeos', 'videos' ),
            'items_list_navigation' => _x( 'Navegação da lista de vídeos', 'videos' ),
            'items_list'            => _x( 'Lista de vídeo', '', 'videos' )
        ];

        $args = [
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => false,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'show_in_rest'       => true,
            'query_var'          => true,
            'rewrite'            => [
                'slug' => 'videos'
            ],
            'has_archive'        => false,
            'hierarchical'       => false,
            'menu_position'      => 30,
            'menu_icon'          => 'dashicons-format-video',
            'supports'           => ['title', 'editor']

        ];

        register_post_type( 'videos', $args );

    }

}