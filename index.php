<?php
    /**
     * Main template file.
     *
     * @package cm
     */

    get_header();

?>

<section id="page" class="page-blog">
  <?php get_template_part( 'template-parts/pages/title/content', 'title' );?>

  <div class="page-content py-5">
    <?php echo cm_breadcrumb( get_the_title() ); ?>
    <div class="container">
      <div class="row">

        <?php

            $args = [
                'post_type'      => 'post',
                'posts_per_page' => 4,
                'order'          => 'ASC'
            ];

            $posts = new WP_Query( $args );

            if ( $posts->have_posts() ):

                while ( $posts->have_posts() ): $posts->the_post();
                    get_template_part( 'template-parts/posts/content', 'posts' );
                endwhile;

                $html = '';

                echo $html;

            else:
                echo '<div class="col-12">' . esc_html__( 'Nenhuma postagem encontrada.' ) . '</div>';
            endif;
        ?>


      </div>
    </div>
  </div>
</section>


<?php
get_footer();