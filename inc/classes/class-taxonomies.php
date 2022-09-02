<?php
/**
 * Register Taxonomies.
 *
 * @package cm
 */

namespace CM_THEME\Inc;

use CM_THEME\Inc\Traits\Singleton;

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
        add_action( 'init', [$this, 'portfolio_taxonomy_init'], 0 );

    }

    public function portfolio_taxonomy_init() {

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
            'add_or_remove_items'        => __( 'Adicionar ou remover Exibições', 'exibition' ),
            'choose_from_most_used'      => __( 'Escolha entre a Exibição mais usada', 'exibition' ),
            'not_found'                  => __( 'Nenhuma Exibição encontrada.', 'exibition' ),
            'menu_name'                  => __( 'Exibições', 'exibition' )
        ];

        $args = [
            'labels'            => $labels,
            'hierarchical'      => true,
            'show_in_nav_menus' => true,
            'show_in_rest'      => false,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => true
        ];

        register_taxonomy( 'exibition', 'portfolio', $args );
    }

}