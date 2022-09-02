<?php
    /**
     * Header Template.
     *
     * @package sjp
     */

?>
<!doctype html>
<html <?php language_attributes();?>>

<head>
  <meta charset="<?php bloginfo( 'charset' );?>">
  <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta name="theme-color" content="#191919">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php wp_head();?>
</head>

<body <?php body_class();?>>

  <div id="wrapper">

    <?php
        get_template_part( 'template-parts/header/navbar/nav-mobile/content', 'nav-mobile' );
        get_template_part( 'template-parts/header/content', 'header' );

    ?>