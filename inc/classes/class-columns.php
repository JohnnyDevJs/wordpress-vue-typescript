<?php
/**
 * Register Columns
 *
 * @package cm
 */

namespace CM_THEME\Inc;

use CM_THEME\Inc\Traits\Singleton;

class Columns {

    use Singleton;

    protected function __construct() {

        // load class

        $this->setup_hooks();
    }

    protected function setup_hooks() {

        /**
         * Actions.
         */
        add_filter( 'manage_edit-hero_columns', [$this, 'hero_columns'] );
        add_filter( 'manage_hero_posts_custom_column', [$this, 'manage_hero_columns'], 10, 2 );

        add_filter( 'manage_edit-modal_columns', [$this, 'modal_columns'] );
        add_filter( 'manage_modal_posts_custom_column', [$this, 'manage_modal_columns'], 10, 2 );

        add_filter( 'manage_edit-team_columns', [$this, 'team_columns'] );
        add_filter( 'manage_team_posts_custom_column', [$this, 'manage_team_columns'], 10, 2 );

        add_filter( 'manage_edit-franchise_columns', [$this, 'franchise_columns'] );
        add_filter( 'manage_franchise_posts_custom_column', [$this, 'manage_franchise_columns'], 10, 2 );

        add_filter( 'manage_edit-reports_columns', [$this, 'reports_columns'] );
        add_filter( 'manage_reports_posts_custom_column', [$this, 'manage_reports_columns'], 10, 2 );

    }

    // Hero Columns
    public function hero_columns( $columns ) {

        $columns = [
            'cb'        => '&lt;input type="checkbox" />',
            'title'     => __( 'Título', 'hero' ),
            'content'   => __( 'Conteúdo', 'hero' ),
            'thumbnail' => __( 'Imagem', 'hero' ),
            'url'       => __( 'Url', 'hero' ),
            'author'    => __( 'Autor', 'hero' ),
            'date'      => __( 'Data' )
        ];

        return $columns;

    }

    public function manage_hero_columns( $column, $post_id ) {

        switch ( $column ) {

            case 'content':
                $content = get_the_content();
                echo $content;
                break;

            case 'thumbnail':

                if ( has_post_thumbnail() ):
                    echo get_the_post_thumbnail( $post_id, [100, 100] );
                endif;
                break;

            case 'url':
                echo get_post_meta( $post_id, '_url', true );
                //echo $url;

                break;

            default:
                break;
        }

    }

    // modal Columns
    public function modal_columns( $columns ) {

        $columns = [
            'cb'        => '&lt;input type="checkbox" />',
            'title'     => __( 'Título', 'modal' ),
            'content'   => __( 'Conteúdo', 'modal' ),
            'exibition' => __( 'Exibição', 'modal' ),
            'author'    => __( 'Autor', 'modal' ),
            'date'      => __( 'Data' )
        ];

        return $columns;

    }

    public function manage_modal_columns( $column, $post_id ) {

        switch ( $column ) {

            case 'content':
                $content = the_content();
                echo $content;
                break;

            case 'exibition':
                $terms = get_the_terms( $post_id, 'exibition' );

                if ( $terms != null ) {

                    foreach ( $terms as $term ) {
                        echo $term->name;
                        unset( $term );
                    }

                }

                break;

            default:
                break;
        }

    }

    // Team Columns
    public function team_columns( $columns ) {

        $columns = [
            'cb'      => '&lt;input type="checkbox" />',
            'title'   => __( 'Título', 'team' ),
            'content' => __( 'Conteúdo', 'team' ),
            'acting'  => __( 'Atuação', 'team' ),
            'author'  => __( 'Autor', 'team' ),
            'date'    => __( 'Data' )
        ];

        return $columns;

    }

    public function manage_team_columns( $column, $post_id ) {

        switch ( $column ) {

            case 'content':
                $content = the_content();
                echo $content;
                break;

            case 'acting':
                $terms = get_the_terms( $post_id, 'acting' );

                if ( $terms != null ) {

                    foreach ( $terms as $term ) {
                        echo $term->name;
                        unset( $term );
                    }

                }

                break;

            default:
                break;
        }

    }

    // Franchise Columns
    public function franchise_columns( $columns ) {

        $columns = [
            'cb'      => '&lt;input type="checkbox" />',
            'title'   => __( 'Título', 'team' ),
            'iframe'  => __( 'Iframe', 'team' ),
            'manager' => __( 'Responsável Técnico', 'team' ),
            'cro'     => __( 'CRO', 'team' ),
            'phone'   => __( 'Telefone', 'team' ),
            'author'  => __( 'Autor', 'team' ),
            'date'    => __( 'Data' )
        ];

        return $columns;

    }

    public function manage_franchise_columns( $column, $post_id ) {

        switch ( $column ) {

            case 'iframe':
                $content = the_content();
                echo $content;
                break;

            case 'manager':
                $manager = get_post_meta( $post_id, '_manager', true );
                echo $manager;
                break;

            case 'cro':
                $cro = get_post_meta( $post_id, '_cro', true );
                echo $cro;
                break;

            case 'phone':
                $phone = get_post_meta( $post_id, '_phone', true );
                echo $phone;
                break;

            default:
                break;
        }

    }

    // Reports Columns
    public function reports_columns( $columns ) {

        $columns = [
            'cb'      => '&lt;input type="checkbox" />',
            'title'   => __( 'Título', 'team' ),
            'content' => __( 'Conteúdo', 'team' ),
            'author'  => __( 'Autor', 'team' ),
            'date'    => __( 'Data' )
        ];

        return $columns;

    }

    public function manage_reports_columns( $column, $post_id ) {

        switch ( $column ) {

            case 'content':
                $content = the_content();
                echo $content;
                break;

            default:
                break;
        }

    }

}
