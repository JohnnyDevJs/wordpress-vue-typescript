<?php
    /**
     * Content Portfolio Template.
     *
     * @package sjp
     */

?>


<section id="portfolio" class="position-relative">
  <div class="container h-100">
    <div class="row align-items-center">
      <div class="col-12">
        <h1 class="display-3 text-white fw-bold animate-fadeInUp-9 text-center mb-5">Portfólio</h1>
      </div>
    </div>

    <?php
        get_template_part( 'template-parts/partials/content', 'portfolio' );
        echo sjp_anchor_section( "fale-conosco", "text-light-red" );
    ?>

  </div>

</section>