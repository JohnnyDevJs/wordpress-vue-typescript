<?php
    /**
     * Content Navbar Template.
     *
     * @package cm
     */
?>

<nav class="navbar navbar-expand-xl shadow-4-soft">
  <div class="container">

    <?php
        get_template_part( 'template-parts/header/navbar/brand/content', 'brand' );
        get_template_part( 'template-parts/header/navbar/toggler/content', 'toggler' );
        get_template_part( 'template-parts/header/navbar/nav/content', 'nav' );
        get_template_part( 'template-parts/components/content', 'donation' );
    ?>

  </div>
</nav>