<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Heartbeat_Theme_Components_Pages_Search
 *
 * @author mjdbaga@gmail.com
 */
class Heartbeat_Theme_Components_Pages_Search {
  
  public static function get_data() {
    global $query_string;

    $query_args = explode( "&", $query_string );
    $search_query = array();

    if( strlen( $query_string ) > 0 ) {
      foreach( $query_args as $key => $string ) {
        $query_split = explode( "=", $string );
        $search_query[$query_split[0]] = urldecode( $query_split[1] );
      } // foreach
    } //if

    $search_query['meta_query'] = array(
        array(
          'key' => '_wp_page_template',
          'value' => 'page-templates/template-news-listing.php',
          'compare' => 'NOT IN'
        ),
        array(
          'key' => '_wp_page_template',
          'value' => 'page-templates/template-event-listing.php',
          'compare' => 'NOT IN'
        )
      );

    $search = new WP_Query( $search_query );
    
    $search_term = get_search_query();
    $data['breadcrumbs'] = hb_parse_sidebar( 'breadcrumbs_widget' );
    $data['search_query'] = sprintf( __( 'Search Results for: %s' ), $search_term );
    $data['results'] = self::get_search_results();
    $data['no_results_message'] = __( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.' );
    $data['pagination'] = self::get_pagination();
    return $data;
  }
  
  private static function get_search_results() {
    global $wp_query;
    
    $results = array();
    if( have_posts() ) {
      while( have_posts() ) {
        the_post();
        $excerpt = get_the_excerpt();
        $item = array();
        $item['link'] = get_the_permalink();
        $item['title'] = get_the_title();
        $item['excerpt'] = apply_filters( 'the_excerpt', $excerpt );
        $item['image'] = get_the_post_thumbnail( null, 'thumbnail' );
        $results[] = $item;
      }
    }
    return $results;
  }
  
  private static function get_pagination() {
    global $wp_query;
    
    $big = 999999999;
    return paginate_links( array(
          'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
          'format' => '?paged=%#%',
          'current' => max( 1, get_query_var( 'paged' ) ),
          'total' => $wp_query->max_num_pages
      ) );
  }
}
