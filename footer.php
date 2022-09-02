<?php
    /**
     * Footer template
     *
     * @package sjp
     */
?>

<footer class="site-footer">
  <?php
      get_template_part( 'template-parts/footer/main/content', 'main' );
      get_template_part( 'template-parts/footer/bottom/content', 'bottom' );
      get_template_part( 'template-parts/utilities/content', 'floating' );
      get_template_part( 'template-parts/utilities/content', 'cookies' );
  ?>
</footer>
<?php wp_footer();?>
</div>
</body>

</html>