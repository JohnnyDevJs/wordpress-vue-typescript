<?php
    /**
     * Page Downloads Template.
     * Template Name: Photos
     * @package cm
     */

get_header();?>

<section id="page" class="page-<?php echo sanitize_title( get_the_title() ); ?>">
  <?php
      get_template_part( 'template-parts/pages/title/content', 'title' );
      get_template_part( 'template-parts/pages/photos/content', 'photos' );
  ?>
</section>

<?php
get_footer();
?>