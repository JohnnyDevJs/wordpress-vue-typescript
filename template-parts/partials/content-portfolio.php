<?php
    /**
     * Partials Content Portfolio Template.
     *
     * @package sjp
     */

    get_template_part( 'template-parts/partials/content', 'tabs' );

?>

<div class="d-flex flex-wrap mt-4 mb-5 all" id="list_portfolio">
  <?php get_template_part( 'template-parts/partials/content-list', 'portfolio' );?>
</div>

<div class="row align-items-center">
  <div class="col-12 d-flex align-items-center justify-content-center">
    <a id="load_more_all" class="btn bg-dark-red text-white d-none">Carregar mais</a>
    <a id="load_more_exclusive" class="btn bg-dark-red text-white d-none">Carregar mais</a>
    <a id="load_more_general" class="btn bg-dark-red text-white d-none">Carregar mais</a>
  </div>
</div>