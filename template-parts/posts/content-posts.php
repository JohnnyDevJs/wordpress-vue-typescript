<?php
    /**
     * Content Posts.
     *
     * @package cm
     */

    global $post;

    $cover = has_post_thumbnail( $post->ID ) ? wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ) : '';

?>

<div class="col-12 col-lg-3 col-md-4 col-sm-6 post-item">
  <article class="post h-100">
    <div class="card border-0 shadow-4-soft h-100">

      <figure class="featured-image mb-0 overflow-hidden position-relative">
        <img src="<?php echo $cover[0]; ?>" alt="<?php the_title();?>"
          class="img-fluid card-img-top h-100 object-cover">
      </figure>

      <div class="card-body pb-4">
        <?php cm_meta();?>
        <h5 class="card-title mb-0 pt-2 fw-bold"><?php echo the_title(); ?></h5>
        <a href="<?php the_permalink();?>" class="stretched-link"></a>
      </div>

    </div>
  </article>
</div>