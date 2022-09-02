<?php
    /**
     * Page Downloads Template.
     * Template Name: Contact
     * @package cm
     */

get_header();?>

<section id="page" class="page-<?php echo sanitize_title( get_the_title() ); ?>">
  <?php
      get_template_part( 'template-parts/pages/title/content', 'title' );
      get_template_part( 'template-parts/pages/contact/content', 'contact' );
      get_template_part( 'template-parts/components/content', 'modal' );
  ?>
</section>

<?php
get_footer();
?>