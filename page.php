<?php
    /**
     * Page template
     *
     * @package sjp
     */

get_header();?>

<section id="page" class="py-md-5 py-4">
  <div class="page-title">
    <div class="container">
      <div class="row">
        <div class="col-12 mb-2">
          <h1 class="fw-bold text-light-red"><?php the_title();?></h1>
          <nav class="bg-light-gray p-2 mb-2"
            style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page"><?php the_title();?></li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <?php the_content();?>
    </div>

  </div>
  </div>
</section>

<?php
get_footer();
?>