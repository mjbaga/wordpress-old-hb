<?php
/**
 * The template for displaying single news template
 */

get_header();

while( have_posts() ) {
  
	the_post();

	$data = Heartbeat_News_Api::get_all_news_details_in_loop();

	Heartbeat_News_Api::render( 'content', 'news-details', $data, 'news' );
    
}

get_footer();
