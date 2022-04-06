<?php
/**
 * Register Taxonomies
 *
 * @package cdr
 */

namespace CDR_THEME\Inc;

use CDR_THEME\Inc\Traits\Singleton;

class Taxonomies {

    use Singleton;

    protected function __construct() {

        // load class

        $this->setup_hooks();
    }

    protected function setup_hooks() {

        /**
         * Actions.
         */
        add_action( 'init', [$this, 'modal_bytypes_taxonomy_init'], 0 );
        add_action( 'init', [$this, 'modal_taxonomy_init'], 0 );
        add_action( 'init', [$this, 'team_taxonomy_init'], 0 );

    }

    public function modal_taxonomy_init() {

        $labels = [
            'name'                       => _x( 'Exibições', 'taxonomy general name', 'exibition' ),
            'singular_name'              => _x( 'Exibição', 'taxonomy singular name', 'exibition' ),
            'search_items'               => __( 'Buscar Exibições', 'exibition' ),
            'popular_items'              => __( 'Exibições populares', 'exibition' ),
            'all_items'                  => __( 'Todas Exibições', 'exibition' ),
            'parent_item'                => null,
            'parent_item_colon'          => null,
            'edit_item'                  => __( 'Editar Exibição', 'exibition' ),
            'update_item'                => __( 'Atualizar Exibição', 'exibition' ),
            'add_new_item'               => __( 'Adicionar nova Exibição', 'exibition' ),
            'new_item_name'              => __( 'Nome da nova Exibição', 'exibition' ),
            'separate_items_with_commas' => __( 'Separar Exibiçãos por vírgula', 'exibition' ),
            'add_or_remove_items'        => __( 'Adicionar ou remover Atuações', 'exibition' ),
            'choose_from_most_used'      => __( 'Escolha entre a Exibição mais usada', 'exibition' ),
            'not_found'                  => __( 'Nenhuma Exibição encontrada.', 'exibition' ),
            'menu_name'                  => __( 'Exibições', 'exibition' )
        ];

        $args = [
            'labels'            => $labels,
            'hierarchical'      => true,
            'show_in_nav_menus' => true,
            'show_in_rest'      => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => false
        ];

        register_taxonomy( 'exibition', 'modal', $args );
    }

    public function modal_bytypes_taxonomy_init() {

        $labels = [
            'name'                       => _x( 'Tipos', 'taxonomy general name', 'types' ),
            'singular_name'              => _x( 'Tipo', 'taxonomy singular name', 'types' ),
            'search_items'               => __( 'Buscar Tipos', 'types' ),
            'popular_items'              => __( 'Tipos populares', 'types' ),
            'all_items'                  => __( 'Todos os Tipos', 'types' ),
            'parent_item'                => null,
            'parent_item_colon'          => null,
            'edit_item'                  => __( 'Editar Tipo', 'types' ),
            'update_item'                => __( 'Atualizar Tipo', 'types' ),
            'add_new_item'               => __( 'Adicionar novo Tipo', 'types' ),
            'new_item_name'              => __( 'Nome do novo Tipo', 'types' ),
            'separate_items_with_commas' => __( 'Separar Tipos por vírgula', 'types' ),
            'add_or_remove_items'        => __( 'Adicionar ou remover Tipos', 'types' ),
            'choose_from_most_used'      => __( 'Escolha entre o Tipo mais usada', 'types' ),
            'not_found'                  => __( 'Nenhum Tipo encontrada.', 'types' ),
            'menu_name'                  => __( 'Tipos', 'types' )
        ];

        $args = [
            'labels'            => $labels,
            'hierarchical'      => true,
            'show_in_nav_menus' => true,
            'show_in_rest'      => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => false
        ];

        register_taxonomy( 'bytypes', 'modal', $args );
    }

    public function team_taxonomy_init() {

        $labels = [
            'name'                       => _x( 'Tipos', 'taxonomy general name', 'acting' ),
            'singular_name'              => _x( 'Atuação', 'taxonomy singular name', 'acting' ),
            'search_items'               => __( 'Buscar Atuações', 'acting' ),
            'popular_items'              => __( 'Atuações populares', 'acting' ),
            'all_items'                  => __( 'Todas Atuações', 'acting' ),
            'parent_item'                => null,
            'parent_item_colon'          => null,
            'edit_item'                  => __( 'Editar Atuação', 'acting' ),
            'update_item'                => __( 'Atualizar Atuação', 'acting' ),
            'add_new_item'               => __( 'Adicionar nova Atuação', 'acting' ),
            'new_item_name'              => __( 'Nome da nova Atuação', 'acting' ),
            'separate_items_with_commas' => __( 'Separar Atuaçãos por vírgula', 'acting' ),
            'add_or_remove_items'        => __( 'Adicionar ou remover Atuações', 'acting' ),
            'choose_from_most_used'      => __( 'Escolha entre a Atuação mais usada', 'acting' ),
            'not_found'                  => __( 'Nenhuma Atuação encontrada.', 'acting' ),
            'menu_name'                  => __( 'Atuações', 'acting' )
        ];

        $args = [
            'labels'            => $labels,
            'hierarchical'      => true,
            'show_in_nav_menus' => true,
            'show_in_rest'      => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => false
        ];

        register_taxonomy( 'acting', 'team', $args );
    }

}