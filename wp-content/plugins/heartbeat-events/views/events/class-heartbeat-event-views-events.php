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
class Heartbeat_Event_Views_Events {
  
    /**
    * Implemtation of get_all_events_in_date_range() function. This function 
    * returns requested number of upcoming events based on date.
    * 
    * @param int $n number of events to display
    * 
    * @return array of event posts
    */
    public static function get_upcoming_events( $n ) {
        $today = date( 'Ymd' );

        $args = array(
            'post_type' => HEARTBEAT_EVENT_SLUG,
            'numberposts' => $n,
            'post_status' => 'publish',
            'meta_query'	=> array(
                array(
                    'key' => 'event_end_date',
                    'value' => $today,
                    'compare' => '>=',
                ),
            ),
            'meta_key' => 'event_start_date',
            'orderby' => 'meta_value_num',
            'order' => 'asc',
        );

        $events = get_posts( $args );

        return $events;
    }

    public static function get_posts_data( $post_type, $page = 1, $perpage = -1 ) {
        $args = self::get_post_args( $post_type, $page, $perpage );

        $posts = get_posts( $args );

        $pagination = self::get_pagination( $args, $page );

        $data = array();
        $data['posts'] = $posts;
        $data['pagination'] = $pagination;

        return $data;
    }

    public static function get_post_args( $post_type, $page = 1, $perpage = -1 ) {
        $today = date( 'Ymd' );

        $args = array(
            'post_type' => HEARTBEAT_EVENT_SLUG,
            'numberposts' => $perpage,
            'paged' => $page,
            'post_status' => 'publish',
            'meta_query'  => array(
                array(
                    'key' => 'event_end_date',
                    'value' => $today,
                    'compare' => '>=',
                ),
            ),
            'meta_key' => 'event_start_date',
            'orderby' => 'meta_value_num',
            'order' => 'asc',
        );
        
        return $args;
    }
    
    private static function get_pagination( $args, $current ) {
        $listing_items_query = new WP_Query( $args );
        $big = 999999999;
        $pagination_args = array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, $current ),
            'type' => 'plain',
            'total' => $listing_items_query->max_num_pages
        );
        $html = paginate_links( $pagination_args );

        return $html;
    }

}
