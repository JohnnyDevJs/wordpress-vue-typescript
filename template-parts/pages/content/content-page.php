<?php
    /**
     * Content Page Content Template.
     *
     * @package cm
     */

?>

<div class="page-content py-5">
  <?php echo cm_breadcrumb(); ?>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <?php the_content();?>
      </div>
    </div>
  </div>
</div>