<?php
/**
 * Template Name: Facility Page Template
 *
 * Facility Page Template
 */

get_header(); 
while ( have_posts() ) : 
	the_post();

	// Include the page content template.
	$data = Heartbeat_Facilities_Api::get_page_details_in_loop();

	Heartbeat_Facilities_Api::render( 'content', 'facility-detail', $data );

// End the loop.
endwhile;
get_footer(); 