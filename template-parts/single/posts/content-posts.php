<?php
    /**
     * Content Single Posts.
     *
     * @package cm
     */

    $cover = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
    $cover = $cover ? $cover[0] : '';

    $categories = get_the_category();

    if ( !  empty( $categories ) ) {
        $category = esc_html( $categories[0]->name );
    }

    $args = [
        'post_type'      => 'post',
        'posts_per_page' => 5,
        'post__not_in'   => [get_the_ID()]
    ];

    $posts = get_posts( $args );

?>

<div class="post-content py-5">
  <?php echo cm_breadcrumb( get_the_title() ); ?>
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-8">
        <div class="post-meta d-flex w-100 justify-content-between mb-3">
          <div class="d-flex align-items-center">
            <i data-feather="calendar" width="18" height="18" stroke="#33bdf2" stroke-width="2.5"></i>
            <p class="mb-0 ms-1 fs-6">Publicado em <?php the_time( 'j \d\e F \d\e Y' )?></p>
          </div>
          <h5 class="m-0">
            <span class="badge badge-info bg-info"><?php echo $category; ?></span>
          </h5>
        </div>

        <figure class="figure-post mb-3 w-100 shadow-4-soft">
          <img class="img-fluid" src="<?php echo $cover; ?>" alt="<?php get_the_title()?>" />
        </figure>

        <?php the_content();?>

      </div>

      <div class="col-12 col-md-4">
        <div class="sidebar shadow-4-soft p-4 bg-light">
          <h3 class="fw-bold text-primary position-relative mb-0">Outras postagens</h3>
          <ul class="m-0 mt-3 p-0 list-unstyled">
            <?php

                if ( $posts ):

                    foreach ( $posts as $post ):
                        $html = '<li class="d-flex align-items-center"><i data-feather="chevron-right" stroke="#33bdf2" stroke-width="2.5" width="16" height="16"></i><a href="' . get_permalink( $post->ID ) . '">' . $post->post_title . '</a></li>';
                        echo $html;
                    endforeach;
                endif;
            ?>
          </ul>
        </div>

      </div>
    </div>
  </div>
</div>