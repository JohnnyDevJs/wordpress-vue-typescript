<?php
    /**
     * Content Videos Template.
     *
     * @package cm
     */

    $args = [
        'post_type'      => 'videos',
        'posts_per_page' => -1
    ];

    $videos = new WP_Query( $args );

if ( $videos->have_posts() ): ?>



<div class="page-content py-5">
  <?php echo cm_breadcrumb( get_the_title() ); ?>
  <div class="container">
    <div class="row">

      <?php

          while ( $videos->have_posts() ): $videos->the_post();

          ?>

      <div class="col-12 col-lg-4 col-md-6" col-sm-6>
        <?php the_content();?>
      </div>
      <?php
              endwhile;

              else:
                  echo 'Nenhum vídeo encontrado.';
              endif;
          ?>
    </div>
  </div>
</div>