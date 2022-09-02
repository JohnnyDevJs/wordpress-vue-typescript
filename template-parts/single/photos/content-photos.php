<?php
    /**
     * Content Single Photos.
     *
     * @package cm
     */

?>

<div class="page-content py-5">
  <?php echo cm_breadcrumb( get_the_title() ); ?>
  <div class="container">
    <div class="row">

      <?php
          $ids = get_post_meta( get_the_ID(), '_' . get_the_ID() . '_sortable_wordpress_gallery', true );
          $result = str_replace( ',', ' ', $ids );
          $images_id = explode( ' ', $result );

          $html = '';

          if ( $ids ):

              foreach ( $images_id as $id ):

                  $html .= '<div class="col-12 col-xl-3 col-lg-4 col-md-6 portfolio-item position-relative">';
                  $html .= '<div class="item-album-photo shadow-4-strong">';
                  $html .= '<a href="' . wp_get_attachment_url( $id ) . '" class="overflow-hidden h-100" data-fancybox="gallery">';
                  $html .= '<figure class="position-relative mb-0 w-100 d-flex shadow-4-strong">';
                  $html .= '<img class="img-fluid w-100 object-cover object-top" src="' . wp_get_attachment_url( $id ) . '" />';
                  $html .= '</figure>';
                  $html .= '</a>';
                  $html .= '</div>';
                  $html .= '</div>';

              endforeach;
          else:
              $html .= '<div class="col-12">';
              $html .= 'Nenhuma foto encontrada.';
              $html .= '</div>';
          endif;

          echo $html;

      ?>

    </div>
  </div>
</div>