<?php
    /**
     * Content Social Template.
     *
     * @package sjp
     */
?>

<ul id="social" class="d-lg-flex d-none list-unstyled mb-0">
  <?php

      $mods = get_theme_mods();

      $socials = [
          'facebook-f' => 'sjp_field_facebook',
          'instagram'  => 'sjp_field_instagram'
      ];

      foreach ( $socials as $icon => $field ) {

          $social = $mods[$field] ? '<li><a class="d-flex align-items-center justify-content-center text-white rounded-circle" href="' . $mods[$field] . '" target="_blank"><i class="fab fa-' . $icon . '"></i></a></li>' : '';
          echo $social;

      }

  ?>
</ul>