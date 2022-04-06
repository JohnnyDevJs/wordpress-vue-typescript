<?php
/**
 * Register Post Types
 *
 * @package cdr
 */

namespace CDR_THEME\Inc;

use CDR_THEME\Inc\Traits\Singleton;

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
        add_action( 'init', [$this, 'hero_init'] );
        add_action( 'init', [$this, 'exams_init'] );
        add_action( 'init', [$this, 'team_init'] );
        add_action( 'init', [$this, 'franchise_init'] );
        add_action( 'init', [$this, 'reports_init'] );
        add_action( 'init', [$this, 'modal_init'] );

    }

    // Post Type hero
    public function hero_init() {

        $iconpath = get_stylesheet_directory_uri() . '/inc/posticons';

        $labels = [
            'name'                  => _x( 'Hero', 'Post type general name', 'hero' ),
            'singular_name'         => _x( 'Hero', 'Post type singular name', 'hero' ),
            'menu_name'             => _x( 'Hero', 'Admin Menu text', 'hero' ),
            'name_admin_bar'        => _x( 'Hero', 'Add New on Toolbar', 'hero' ),
            'add_new'               => __( 'Adicionar nova', 'hero' ),
            'add_new_item'          => __( 'Adicionar nova Hero', 'hero' ),
            'new_item'              => __( 'Novo Hero', 'Hero' ),
            'edit_item'             => __( 'Editar Hero', 'Hero' ),
            'view_item'             => __( 'Ver Hero', 'Hero' ),
            'all_items'             => __( 'Todos os Heros', 'hero' ),
            'search_items'          => __( 'Buscar Hero', 'hero' ),
            'parent_item_colon'     => __( 'Pai Hero:', 'hero' ),
            'not_found'             => __( 'Nenhum Hero encontrada.', 'hero' ),
            'not_found_in_trash'    => __( 'Nenhum Hero encontrada na Lixeira.', 'hero' ),
            'featured_image'        => _x( 'Imagem da Hero', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'hero' ),
            'set_featured_image'    => _x( 'Definir a imagem da Hero', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'hero' ),
            'remove_featured_image' => _x( 'Remover imagem', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'hero' ),
            'use_featured_image'    => _x( 'Usar uma imagem', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'hero' ),
            'archives'              => _x( 'Arquivos de Hero', 'hero' ),
            'insert_into_item'      => _x( 'Inserir na Hero', 'hero' ),
            'uploaded_to_this_item' => _x( 'Carregar para esses Hero', 'hero' ),
            'filter_items_list'     => _x( 'Filtrar lista de Hero', 'hero' ),
            'items_list_navigation' => _x( 'Navegação da lista de Hero', 'hero' ),
            'items_list'            => _x( 'Lista de Hero', '', 'hero' )
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
            'menu_icon'          => $iconpath . '/icon-posttype-hero.png',
            'supports'           => ['title', 'editor', 'thumbnail']
        ];

        register_post_type( 'hero', $args );

    }

    // Post Type exams
    public function exams_init() {

        $iconpath = get_stylesheet_directory_uri() . '/inc/posticons';

        $labels = [
            'name'                  => _x( 'Exames', 'Post type general name', 'exams' ),
            'singular_name'         => _x( 'Exame', 'Post type singular name', 'exams' ),
            'menu_name'             => _x( 'Exames', 'Admin Menu text', 'exams' ),
            'name_admin_bar'        => _x( 'Exames', 'Add New on Toolbar', 'exams' ),
            'add_new'               => __( 'Adicionar novo', 'exams' ),
            'add_new_item'          => __( 'Adicionar novo exame', 'exams' ),
            'new_item'              => __( 'Nova exame', 'exams' ),
            'edit_item'             => __( 'Editar exame', 'exams' ),
            'view_item'             => __( 'Ver exame', 'exams' ),
            'all_items'             => __( 'Todas os exames', 'exams' ),
            'search_items'          => __( 'Buscar exame', 'exams' ),
            'parent_item_colon'     => __( 'Pai exame:', 'exams' ),
            'not_found'             => __( 'Nenhum exame encontrado.', 'exams' ),
            'not_found_in_trash'    => __( 'Nenhum exame encontrado na Lixeira.', 'exams' ),
            'featured_image'        => _x( 'Imagem do exame', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'exams' ),
            'set_featured_image'    => _x( 'Definir a imagem do exame', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'exams' ),
            'remove_featured_image' => _x( 'Remover imagem', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'exams' ),
            'use_featured_image'    => _x( 'Usar uma imagem', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'exams' ),
            'archives'              => _x( 'Arquivos de exame', 'exams' ),
            'insert_into_item'      => _x( 'Inserir no exame', 'exams' ),
            'uploaded_to_this_item' => _x( 'Carregar para esse exame', 'exams' ),
            'filter_items_list'     => _x( 'Filtrar lista de exame', 'exams' ),
            'items_list_navigation' => _x( 'Navegação da lista de exame', 'exams' ),
            'items_list'            => _x( 'Lista de exame', '', 'exams' )
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
            'has_archive'        => false,
            'hierarchical'       => false,
            'menu_position'      => 31,
            'menu_icon'          => $iconpath . '/icon-posttype-exams.png',
            'supports'           => ['title', 'editor', 'thumbnail', 'excerpt']
        ];

        register_post_type( 'exams', $args );

    }

    // Post Type Team
    public function team_init() {

        $iconpath = get_stylesheet_directory_uri() . '/inc/posticons';

        $labels = [
            'name'                  => _x( 'Corpo Clínico', 'Post type general name', 'team' ),
            'singular_name'         => _x( 'Corpo Clínico', 'Post type singular name', 'team' ),
            'menu_name'             => _x( 'Corpo Clínico', 'Admin Menu text', 'team' ),
            'name_admin_bar'        => _x( 'Corpo Clínico', 'Add New on Toolbar', 'team' ),
            'add_new'               => __( 'Adicionar novo', 'team' ),
            'add_new_item'          => __( 'Adicionar novo corpo clínico', 'team' ),
            'new_item'              => __( 'Novo corpo clínico', 'team' ),
            'edit_item'             => __( 'Editar corpo clínico', 'team' ),
            'view_item'             => __( 'Ver corpo clínico', 'team' ),
            'all_items'             => __( 'Todos corpo clínicos', 'team' ),
            'search_items'          => __( 'Buscar corpo clínico', 'team' ),
            'parent_item_colon'     => __( 'Pai corpo clínico:', 'team' ),
            'not_found'             => __( 'Nenhum corpo clínico encontrado.', 'team' ),
            'not_found_in_trash'    => __( 'Nenhum corpo clínico encontrado na Lixeira.', 'team' ),
            'featured_image'        => _x( 'Imagem do corpo clínico', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'team' ),
            'set_featured_image'    => _x( 'Definir a imagem de corpo clínico', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'team' ),
            'remove_featured_image' => _x( 'Remover imagem', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'team' ),
            'use_featured_image'    => _x( 'Usar uma imagem', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'team' ),
            'archives'              => _x( 'Arquivos de corpo clínico', 'team' ),
            'insert_into_item'      => _x( 'Inserir no corpo clínico', 'team' ),
            'uploaded_to_this_item' => _x( 'Carregar para esse corpo clínico', 'team' ),
            'filter_items_list'     => _x( 'Filtrar lista de corpo clínico', 'team' ),
            'items_list_navigation' => _x( 'Navegação da lista de corpo clínico', 'team' ),
            'items_list'            => _x( 'Lista de corpo clínico', '', 'team' )
        ];

        $args = [
            'labels'             => $labels,
            'public'             => false,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'show_in_rest'       => true,
            'query_var'          => true,
            'rewrite'            => ['slug' => 'corpo-clinico'],
            'capability_type'    => 'post',
            'has_archive'        => false,
            'hierarchical'       => false,
            'menu_position'      => 32,
            'menu_icon'          => $iconpath . '/icon-posttype-team.png',
            'supports'           => ['title', 'editor', 'thumbnail', 'excerpt']
        ];

        register_post_type( 'team', $args );

    }

    // Post Type Franchises
    public function franchise_init() {

        $iconpath = get_stylesheet_directory_uri() . '/inc/posticons';

        $labels = [
            'name'                  => _x( 'Franquias', 'Post type general name', 'franchise' ),
            'singular_name'         => _x( 'Franquia', 'Post type singular name', 'franchise' ),
            'menu_name'             => _x( 'Franquias', 'Admin Menu text', 'franchise' ),
            'name_admin_bar'        => _x( 'Franquias', 'Add New on Toolbar', 'franchise' ),
            'add_new'               => __( 'Adicionar nova', 'franchise' ),
            'add_new_item'          => __( 'Adicionar nova franquia', 'franchise' ),
            'new_item'              => __( 'Nova franquia', 'franchise' ),
            'edit_item'             => __( 'Editar franquia', 'franchise' ),
            'view_item'             => __( 'Ver franquia', 'franchise' ),
            'all_items'             => __( 'Todas as franquias', 'franchise' ),
            'search_items'          => __( 'Buscar franquia', 'franchise' ),
            'parent_item_colon'     => __( 'Pai franquia:', 'franchise' ),
            'not_found'             => __( 'Nenhuma franquia encontrado.', 'franchise' ),
            'not_found_in_trash'    => __( 'Nenhuma franquia encontrado na Lixeira.', 'franchise' ),
            'featured_image'        => _x( 'Imagem da franquia', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'franchise' ),
            'set_featured_image'    => _x( 'Definir a imagem de franquia', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'franchise' ),
            'remove_featured_image' => _x( 'Remover imagem', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'franchise' ),
            'use_featured_image'    => _x( 'Usar uma imagem', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'franchise' ),
            'archives'              => _x( 'Arquivos de franquia', 'franchise' ),
            'insert_into_item'      => _x( 'Inserir na franquia', 'franchise' ),
            'uploaded_to_this_item' => _x( 'Carregar para essa franquia', 'franchise' ),
            'filter_items_list'     => _x( 'Filtrar lista de franquia', 'franchise' ),
            'items_list_navigation' => _x( 'Navegação da lista de franquia', 'franchise' ),
            'items_list'            => _x( 'Lista de franquia', '', 'franchise' )
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
            'has_archive'        => false,
            'hierarchical'       => false,
            'menu_position'      => 30,
            'menu_icon'          => $iconpath . '/icon-posttype-franchise.png',
            'supports'           => ['title', 'editor']
        ];

        register_post_type( 'franchise', $args );

    }

    // Post Type Modal
    public function modal_init() {

        $iconpath = get_stylesheet_directory_uri() . '/inc/posticons';

        $labels = [
            'name'                  => _x( 'Modais', 'Post type general name', 'modal' ),
            'singular_name'         => _x( 'Modal', 'Post type singular name', 'modal' ),
            'menu_name'             => _x( 'Modais', 'Admin Menu text', 'modal' ),
            'name_admin_bar'        => _x( 'Modais', 'Add New on Toolbar', 'modal' ),
            'add_new'               => __( 'Adicionar novo', 'modal' ),
            'add_new_item'          => __( 'Adicionar novo Modal', 'modal' ),
            'new_item'              => __( 'Novo Modal', 'modal' ),
            'edit_item'             => __( 'Editar Modal', 'modal' ),
            'view_item'             => __( 'Ver Modal', 'modal' ),
            'all_items'             => __( 'Todos os Modais', 'modal' ),
            'search_items'          => __( 'Buscar Modal', 'modal' ),
            'parent_item_colon'     => __( 'Pai Modal:', 'modal' ),
            'not_found'             => __( 'Nenhum Modal encontrado.', 'modal' ),
            'not_found_in_trash'    => __( 'Nenhum Modal encontrado na Lixeira.', 'modal' ),
            'featured_image'        => _x( 'Imagem do Modal', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'modal' ),
            'set_featured_image'    => _x( 'Definir a imagem do Modal', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'modal' ),
            'remove_featured_image' => _x( 'Remover imagem', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'modal' ),
            'use_featured_image'    => _x( 'Usar uma imagem', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'modal' ),
            'archives'              => _x( 'Arquivos de Modal', 'modal' ),
            'insert_into_item'      => _x( 'Inserir no Modal', 'modal' ),
            'uploaded_to_this_item' => _x( 'Carregar para esse Modal', 'modal' ),
            'filter_items_list'     => _x( 'Filtrar lista de Modal', 'modal' ),
            'items_list_navigation' => _x( 'Navegação da lista de Modal', 'modal' ),
            'items_list'            => _x( 'Lista de Modal', '', 'modal' )
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
            'menu_icon'          => $iconpath . '/icon-posttype-modal.png',
            'supports'           => ['title', 'editor', 'thumbnail'],
            'taxonomies'         => ['exibition']
        ];

        register_post_type( 'modal', $args );

    }

    // Post Type Reports
    public function reports_init() {

        $iconpath = get_stylesheet_directory_uri() . '/inc/posticons';

        $labels = [
            'name'                  => _x( 'Laudos', 'Post type general name', 'reports' ),
            'singular_name'         => _x( 'Laudo', 'Post type singular name', 'reports' ),
            'menu_name'             => _x( 'Laudos', 'Admin Menu text', 'reports' ),
            'name_admin_bar'        => _x( 'Laudos', 'Add New on Toolbar', 'reports' ),
            'add_new'               => __( 'Adicionar novo', 'reports' ),
            'add_new_item'          => __( 'Adicionar novo Laudo', 'Laudo' ),
            'new_item'              => __( 'Novo Laudo', 'reports' ),
            'edit_item'             => __( 'Editar Laudo', 'reports' ),
            'view_item'             => __( 'Ver Laudo', 'reports' ),
            'all_items'             => __( 'Todos os Laudos', 'reports' ),
            'search_items'          => __( 'Buscar Laudo', 'reports' ),
            'parent_item_colon'     => __( 'Pai Laudo:', 'reports' ),
            'not_found'             => __( 'Nenhum Laudo encontrado.', 'reports' ),
            'not_found_in_trash'    => __( 'Nenhum Laudo encontrado na Lixeira.', 'reports' ),
            'featured_image'        => _x( 'Imagem do Laudo', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'reports' ),
            'set_featured_image'    => _x( 'Definir a imagem do Laudo', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'reports' ),
            'remove_featured_image' => _x( 'Remover imagem', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'reports' ),
            'use_featured_image'    => _x( 'Usar uma imagem', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'reports' ),
            'archives'              => _x( 'Arquivos de Laudo', 'reports' ),
            'insert_into_item'      => _x( 'Inserir no Laudo', 'reports' ),
            'uploaded_to_this_item' => _x( 'Carregar para esse Laudo', 'reports' ),
            'filter_items_list'     => _x( 'Filtrar lista de Laudo', 'reports' ),
            'items_list_navigation' => _x( 'Navegação da lista de Laudo', 'reports' ),
            'items_list'            => _x( 'Lista de Laudo', '', 'reports' )
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
            'menu_icon'          => $iconpath . '/icon-posttype-reports.png',
            'supports'           => ['title', 'editor', 'thumbnail']
        ];

        register_post_type( 'reports', $args );

    }

}