<?php
    /**
     * Content Posts Template.
     *
     * @package cm
     */

?>

<section id="posts" class="bg-light pb-5">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1 class="display-1 fw-bold mt-4 mb-3">Blog</h1>
      </div>
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

              $html .= '<div class="col-12 d-flex align-items-center mt-4 justify-content-center">';
              $html .= '<a href="' . home_url( 'blog' ) . '" class="btn btn-primary text-white fw-bold">Mais notícias</a>';
              $html .= '</div>';

              echo $html;

          else:
              echo '<div class="col-12">' . esc_html__( 'Nenhuma postagem encontrada.' ) . '</div>';
          endif;
      ?>


    </div>
  </div>
</section>