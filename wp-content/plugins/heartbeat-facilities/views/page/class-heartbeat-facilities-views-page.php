<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Functionalities related to listing page.
 *
 * @author mjdbaga@gmail.com
 */
class Heartbeat_Facilities_Views_Page {
  
    /**
    * Implemtation of get_page_details_in_loop() function. returns details for current page
    * 
    * @param post $event
    */
    public static function get_page_details_in_loop() {
        $data = array();
        $data['title'] = apply_filters( 'the_title', get_the_title());
        $data['image_url'] = get_the_post_thumbnail_url( null , 'full' );
        $data['image_alt'] = get_the_post_thumbnail_caption( null);
        $data['page_banner'] = get_field( 'page_banner' );
        $data['operating_hours'] = get_field( 'operating_hours' );
        $data['facility_contact'] = get_field( 'facility_contact' );
        $data['facility_address'] = get_field( 'facility_address' );
        $data['facility_link'] = get_field( 'facility_link' );
        $data['facility_email'] = get_field( 'facility_email' );
        $data['get_directions_link'] = get_field( 'get_directions_link' );
        $data['content'] = apply_filters( 'the_content', get_the_content() );
        $data['breadcrumbs'] = hb_parse_sidebar( 'breadcrumbs_widget' );
        $data['upcoming_events'] = hb_parse_sidebar( 'hb_upcoming_events_widget' );
        $data['recent_news'] = hb_parse_sidebar( 'hb_news_widget' );
        $data['link'] = get_permalink();

        $all_icons = get_field('activity_icons');

        global $post;

        if( !empty($all_icons) ) {
            foreach( $all_icons as $post ) {
                setup_postdata( $post );
                $data['icons'][] = Heartbeat_Facilities_Api::get_icon_details_in_loop();
            }
        }

        wp_reset_postdata();

        return $data;
    }
}
