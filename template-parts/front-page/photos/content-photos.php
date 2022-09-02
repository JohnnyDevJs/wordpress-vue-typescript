<?php
    /**
     * Content Photos Template.
     *
     * @package cm
     */

?>

<section id="photos" class="bg-light pt-5">

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

      $photos = new WP_Query( $args );

      if ( $photos->have_posts() ):

  ?>
  <div class="carousel"
    data-flickity='{ "imagesLoaded": true, "percentPosition": false, "wrapAround": true, "pageDots": false }'>
    <?php

        while ( $photos->have_posts() ): $photos->the_post();

            $ids = get_post_meta( get_the_ID(), '_' . get_the_ID() . '_sortable_wordpress_gallery', true );
            $result = str_replace( ',', ' ', $ids );
            $attachments = explode( ' ', $result );

            foreach ( $attachments as $id ):

                $html = '
		          <figure class="album-photo overflow-hidden mb-0">
		            <a href="' . wp_get_attachment_url( $id ) . '" data-fancybox>
		              <img class="img-fluid w-100 h-100 object-cover" src="' . wp_get_attachment_url( $id ) . '"
		                alt="' . get_the_title() . '>" />
		            </a>
		          </figure>';

                echo $html;

            endforeach;
        endwhile;

    ?>



  </div>




  <?php

      endif;
  ?>

  </div>


</section>