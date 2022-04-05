<?php
/**
 * The template for displaying single event template
 */

get_header();

while( have_posts() ) {
  
	the_post();

	$data = Heartbeat_Event_Api::get_all_event_details_in_loop();

	Heartbeat_Event_Api::render( 'content', 'event-details', $data, 'event' );
    
}

get_footer();
