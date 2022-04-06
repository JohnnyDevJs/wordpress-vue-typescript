<?php
    /**
     * Header template.
     *
     * @package cdr
     */

?>
<!doctype html>
<html <?php language_attributes();?>>

<head>

  <meta charset="<?php bloginfo( 'charset' );?>">
  <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta name="theme-color" content="#2c5b9f ">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <script src="http://localhost:8081/js/app.js"></script>

  <?php wp_head();?>
</head>

<body <?php body_class();?>>

  <?php

      if ( function_exists( 'wp_body_open' ) ) {
          wp_body_open();
      }

  ?>

  <header id="masthead" class="site-header" role="banner">
    <?php get_template_part( 'template-parts/header/content', 'header' );?>
  </header>

  <div id="content" class="site-content">