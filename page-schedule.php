<?php
    /**
     * Page Schedule Template.
     * Template Name: Page schedule
     * @package cm
     */

get_header();?>

<section id="page" class="page-<?php echo sanitize_title( get_the_title() ); ?>">
  <?php
      get_template_part( 'template-parts/pages/title/content', 'title' );
      get_template_part( 'template-parts/pages/schedule/content', 'schedule' );
  ?>
</section>

<?php
get_footer();
?>