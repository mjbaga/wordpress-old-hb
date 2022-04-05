<?php
/**
 * Template Name: News Listing Page Template
 *
 * News Listing Page Template
 */
get_header();

while( have_posts() ):
    the_post();
    $paged = absint( get_query_var( 'paged', 1 ) );
    $perpage = get_option( 'posts_per_page' );

    $data = Heartbeat_News_Api::get_page_details_in_loop();

    $post_data = Heartbeat_News_Api::get_posts_data( '', $paged, $perpage );

    foreach( $post_data['posts'] as $post ) {
        setup_postdata( $post );
        $data['posts'][] = Heartbeat_News_Api::get_recent_news_details_in_loop();
    }
    
    wp_reset_postdata();

    $data['pagination'] = $post_data['pagination'];

    Heartbeat_News_Api::render( 'content', 'listing', $data );
endwhile;

get_footer();
