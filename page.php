<?php
    /**
     * Page template
     *
     * @package cm
     */

    if ( is_page( 'sobre' ) ) {
        $home = home_url();
        wp_redirect( $home );
    }

    get_header();

?>

<section id="page" class="page-<?php echo sanitize_title( get_the_title() ); ?>">
  <?php get_template_part( 'template-parts/pages/content', 'page' );?>
</section>

<?php
get_footer();
?>