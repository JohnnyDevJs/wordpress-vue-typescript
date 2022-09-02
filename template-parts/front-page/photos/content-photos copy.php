<?php
    /**
     * Content Photos Template.
     *
     * @package cm
     */

?>

<section id="photos" class="bg-light pb-5">

  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1 class="display-1 fw-bold mt-4 mb-3">Fotos</h1>
      </div>
    </div>
  </div>



  <?php

      $args = [
          'post_type'      => 'photos',
          'posts_per_page' => -1,
          'order'          => 'DESC'
      ];

      $photos = get_posts( $args );

  if ( $photos ): ?>
  <div class="carousel" data-flickity='{ "imagesLoaded": true, "percentPosition": false, "wrapAround": true }'>
    <?php

        foreach ( $photos as $photo ):

            $cover = wp_get_attachment_image_src( get_post_thumbnail_id( $photo->ID ), 'full' );
            $cover = $cover ? $cover[0] : '';

        ?>


    <figure class="album-photo overflow-hidden mb-0">
      <a href="<?php echo get_permalink( $photo->ID ); ?>">
        <img class="img-fluid w-100 h-100 object-cover object-top" src="<?php echo $cover; ?>"
          alt="<?php echo get_the_title(); ?>">
        <figcaption class="p-4 position-absolute bottom-0 w-100 d-flex flex-column">
          <time class="mb-0 text-white fw-bold"><?php echo get_the_time( 'j \d\e F \d\e Y', $photo->ID ); ?></time>
          <h3 class="mb-0 text-white fw-bold"><?php echo $photo->post_title; ?></h3>
        </figcaption>
      </a>
    </figure>
    <?php endforeach;?>
  </div>


  <div class="d-flex align-items-center mt-5 justify-content-center">
    <a href="<?php echo home_url( 'fotos' ); ?>" class="btn btn-info text-white fw-bold">Mais fotos</a>
  </div>


  <?php

      endif;
  ?>

  </div>


</section>