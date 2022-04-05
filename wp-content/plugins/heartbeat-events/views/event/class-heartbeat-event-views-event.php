<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * This class contains all the view functions for a single Event post
 *
 * @author mjdbaga@gmail.com
 */

use Carbon\Carbon;

class Heartbeat_Event_Views_Event {

    /**
    * Implemtation of get_all_event_details_in_loop() function. returns details for event calendar functions
    * 
    * @param post $event
    */
    public static function get_all_event_details_in_loop() {

        $event_start_date = get_field( 'event_start_date', false, false );
        $event_start_time = get_field( 'event_start_time', false, false);
        $event_end_date = get_field( 'event_end_date', false, false );
        $event_end_time = get_field( 'event_end_time', false, false );

        $start_date = Carbon::parse($event_start_date);
        $end_date = Carbon::parse($event_end_date);

        $start_date_text = $start_date->format( 'D d F Y' );
        $end_date_text = $end_date->format( 'D d F Y' );

        if(!empty($event_start_time)) {
            $start_time = Carbon::parse($event_start_time);
            $start_date_text .= ' at ' . $start_time->format('g:iA');
        }

        if(!empty($event_end_time)) {
            $end_time = Carbon::parse($event_end_time);
            $end_date_text .= ' at ' . $end_time->format('g:iA');
        }
        
        $upload_dir = wp_upload_dir();
        $event_id = get_the_ID();

        $data = array();
        $data['title'] = apply_filters( 'the_title', get_the_title());
        $data['banner'] = get_field( 'page_banner' );
        $data['start_date'] = $start_date_text;
        $data['end_date'] = $end_date_text;
        $data['meta_start_date'] = $start_date->format('c');
        $data['meta_end_date'] = $end_date->format('c');
        $data['venue'] = get_field( 'event_venue' );
        $data['sign_up_link'] = get_field( 'sign_up_link' );
        $data['ical_link'] = $upload_dir['baseurl'] . '/ics-files/event-' . $event_id . '.ics';
        $data['image_url'] = get_the_post_thumbnail_url( null , 'full' );
        $data['image_alt'] = get_the_post_thumbnail_caption( null);
        $data['content'] = apply_filters( 'the_content', get_the_content() );
        $data['breadcrumbs'] = hb_parse_sidebar( 'breadcrumbs_widget' );
        $data['upcoming_events'] = hb_parse_sidebar( 'hb_upcoming_events_widget' );
        $data['recent_news'] = hb_parse_sidebar( 'hb_news_widget' );
        return $data;
    }
    
    /**
    * Implemtation of get_all_event_details_in_loop() function. returns details for event calendar functions
    * 
    * @param post $event
    */
    public static function get_ical_event_details_in_loop() {
        $post_id = get_the_ID();
        $event_start_date = get_field( 'event_start_date', false, false );
        $event_start_time = get_field( 'event_start_time', false, false);
        $event_end_date = get_field( 'event_end_date', false, false );
        $event_end_time = get_field( 'event_end_time', false, false );
        
        $start_date = Carbon::parse($event_start_date);
        $end_date = Carbon::parse($event_end_date);

        $start_date_text = $start_date->format( 'Ymd' );
        $end_date_text = $end_date->format( 'Ymd' );

        if(!empty($event_start_time)) {
            $start_time = Carbon::parse($event_start_time);
            $start_date_text .= 'T' . $start_time->format('His');
        }

        if(!empty($event_end_time)) {
            $end_time = Carbon::parse($event_end_time);
            $end_date_text .= 'T' . $end_time->format('His');
        }
        
        $content = get_the_content();
        $title = get_the_title();
        $filtered_content = apply_filters( 'the_content', $content );

        $data = array();
        $data['uid'] = hash( 'sha512', 'event_' . $post_id ); 
        $data['created_date'] = get_the_date( 'Ymd\THis\Z' );
        $data['modified_date'] = get_the_modified_date( 'Ymd\THis\Z' );
        $data['title'] = apply_filters( 'the_title', $title );
        $data['content'] = str_replace( array( "\r\n", "\r", "\n" ), "", $filtered_content );
        $data['stripped_content'] = strip_tags( $filtered_content );
        $data['start_date'] = $start_date_text;
        $data['end_date'] = $end_date_text;
        $data['venue'] = get_field( 'event_venue' );
        return $data;
    }
  
    /**
    * Implemtation of get_calendar_event_details_in_loop() function. returns details for event calendar functions
    * 
    * @param post $event
    */
    public static function get_upcoming_event_details_in_loop() {
        $event_start_date = get_field( 'event_start_date', false, false );
        $event_start_time = get_field( 'event_start_time', false, false);
        $event_end_date = get_field( 'event_end_date', false, false );
        $event_end_time = get_field( 'event_end_time', false, false );

        $start_date = Carbon::parse($event_start_date);
        $end_date = Carbon::parse($event_end_date);

        $event_date = null;

        if($event_start_date == $event_end_date) {

            $event_date = $start_date->format( 'd F Y' );

            if(!empty($event_start_time)) {
                $start_time = Carbon::parse($event_start_time);
                $event_date .= ' | ' . $start_time->format('g:iA');
            }

            if(!empty($event_end_time)) {
                $end_time = Carbon::parse($event_end_time);
                $event_date .= ' - ' . $end_time->format('g:iA');
            }

        } else {

            $event_date = $start_date->format('d F Y') . ' - ' . $end_date->format('d F Y');

        }

        $data = array();
        $data['title'] = apply_filters( 'the_title', get_the_title());
        $data['event_date'] = $event_date;
        $data['thumbnail_image_url'] = get_the_post_thumbnail_url( null , 'thumbnail' );
        $data['medium_image_url'] = get_the_post_thumbnail_url( null , 'medium' );
        $data['thumbnail_image_alt'] = get_the_post_thumbnail_caption();
        $data['venue'] = get_field( 'event_venue' );
        $data['url'] = get_the_permalink();
        $data['description'] = strip_tags( apply_filters( 'the_excerpt', get_the_excerpt() ) );
        return $data;
    }

}
