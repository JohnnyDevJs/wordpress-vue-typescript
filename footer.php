<?php
    /**
     * Footer template
     *
     * @package cdr
     */
?>
</div>
<footer class="site-footer pt-5 pb-2">
  <?php
      get_template_part( 'template-parts/footer/content', 'widgets' );
      get_template_part( 'template-parts/footer/content', 'copyright' );
  ?>
</footer>

<?php

    wp_footer();
?>


</body>

</html>