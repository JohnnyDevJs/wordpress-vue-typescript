<?php
/**
 * Register Post Types.
 *
 * @package sjp
 */

namespace SJP_THEME\Inc;

use SJP_THEME\Inc\Traits\Singleton;

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
        add_action( 'init', [$this, 'portfolio_init'] );
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

    // Post Type Portfolio.
    public function portfolio_init() {

        $labels = [
            'name'                  => _x( 'Portfólios', 'Post type general name', 'portfolio' ),
            'singular_name'         => _x( 'Portfólio', 'Post type singular name', 'portfolio' ),
            'menu_name'             => _x( 'Portfólio', 'Admin Menu text', 'portfolio' ),
            'name_admin_bar'        => _x( 'Portfólio', 'Add New on Toolbar', 'portfolio' ),
            'add_new'               => __( 'Adicionar novo', 'portfólio' ),
            'add_new_item'          => __( 'Adicionar novo portfólio', 'portfolio' ),
            'new_item'              => __( 'Novo portfólio', 'portfolio' ),
            'edit_item'             => __( 'Editar portfólio', 'portfolio' ),
            'view_item'             => __( 'Ver portfólio', 'portfolio' ),
            'all_items'             => __( 'Todos os portfólios', 'portfolio' ),
            'search_items'          => __( 'Buscar portfólio', 'portfolio' ),
            'parent_item_colon'     => __( 'Pai portfólio:', 'portfolio' ),
            'not_found'             => __( 'Nenhum portfólio encontrada.', 'portfolio' ),
            'not_found_in_trash'    => __( 'Nenhum portfólio encontrada na Lixeira.', 'portfolio' ),
            'featured_image'        => _x( 'Imagem do portfólio', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'portfolio' ),
            'set_featured_image'    => _x( 'Definir a imagem do portfólio', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'portfolio' ),
            'remove_featured_image' => _x( 'Remover imagem', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'portfolio' ),
            'use_featured_image'    => _x( 'Usar uma imagem', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'portfolio' ),
            'archives'              => _x( 'Arquivos de portfólio', 'portfolio' ),
            'insert_into_item'      => _x( 'Inserir no portfólio', 'portfolio' ),
            'uploaded_to_this_item' => _x( 'Carregar para esses portfólios', 'portfolio' ),
            'filter_items_list'     => _x( 'Filtrar lista de portfólios', 'portfolio' ),
            'items_list_navigation' => _x( 'Navegação da lista de portfólios', 'portfolio' ),
            'items_list'            => _x( 'Lista de portfólio', '', 'portfolio' )
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
            'menu_icon'          => 'dashicons-images-alt',
            'supports'           => ['title', 'editor']

        ];

        register_post_type( 'portfolio', $args );

    }

}