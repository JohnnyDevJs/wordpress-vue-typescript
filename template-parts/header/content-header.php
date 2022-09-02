<?php
    /**
     * Content Header Template.
     *
     * @package sjp
     */

    $position = is_front_page() ? 'position-fixed' : '';
    $background = !  is_front_page() ? 'bg-light-black' : '';
?>

<header id="header" class="<?php echo $position . ' ' . $background; ?> w-100 m-auto">
  <?php get_template_part( 'template-parts/header/navbar/content', 'navbar' );?>
</header>