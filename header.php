<?php
    /**
     * Header Template.
     *
     * @package cm
     */

?>
<!doctype html>
<html <?php language_attributes();?>>

<head>
  <meta charset="<?php bloginfo( 'charset' );?>">
  <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta name="theme-color" content="#254ba5">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php wp_head();?>
</head>

<body <?php body_class( cm_pages_id( 'blog' ) );?>>

  <div id="wrapper">

    <?php get_template_part( 'template-parts/header/content', 'header' );?>