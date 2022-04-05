<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage heartbeat
 * @since 0.1.0
 * @version 0.1.0
 */
get_header();

// Include the page content template.
$page_data = Heartbeat_Theme_Components_Pages_Search::get_data();
hb_theme_render( 'templates/content', 'search', $page_data );
  
get_footer();
