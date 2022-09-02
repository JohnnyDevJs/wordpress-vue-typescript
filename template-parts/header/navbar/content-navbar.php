<?php
    /**
     * Content Navbar Template.
     *
     * @package sjp
     */
?>


<nav class="navbar navbar-expand-lg">
  <div class="container">

    <?php
        get_template_part( 'template-parts/header/navbar/brand/content', 'brand' );
        get_template_part( 'template-parts/header/navbar/toggler/content', 'toggler' );
        get_template_part( 'template-parts/header/navbar/nav/content', 'nav' );
        get_template_part( 'template-parts/components/content', 'social' );
    ?>

  </div>
</nav>