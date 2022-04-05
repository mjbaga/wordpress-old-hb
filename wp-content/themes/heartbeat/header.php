<!DOCTYPE html><!--[if lt IE 9]>
<html class='lt-ie9 no-js' lang='en'>
<![endif]-->
<!--[if gte IE 9]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <!--[if lt IE 9]>
  <p class='browsehappy'>You are using an <strong>outdated</strong> browser. Please <a href='http://browsehappy.com/'>upgrade your browser</a> to improve your experience.</p>
  <![endif]--><a href="#main" class="skip-link visuallyhidden">Skip to main</a>

  <?php
    $header_data = Heartbeat_Theme_Components_Shared_Header::get_header_data();
    hb_theme_render( 'templates/content', 'header', $header_data );