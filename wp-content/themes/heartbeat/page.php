<?php

get_header(); 
while ( have_posts() ) :
	
	the_post();

	// Include the page content template.
	$page_data = Heartbeat_Theme_Components_Pages_Standard::get_data();
	hb_theme_render( 'templates/content', 'page', $page_data );

// End the loop.
endwhile;
get_footer(); 