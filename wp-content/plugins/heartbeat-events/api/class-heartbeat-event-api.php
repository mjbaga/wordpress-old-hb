<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * This class exposes all the api functions for these modules. 
 * They will all refer to other functions in other classes which will have the 
 * actual implementation.
 *
 * @author mjdbaga@gmail.com
 */
class Heartbeat_Event_Api {
  
    /**
    * This function returns all event details of event post. Use 
    * this function after starting the loop.
    * 
    * @return array
    */
    public static function get_upcoming_event_details_in_loop() {
        try{
            $data = Heartbeat_Event_Views_Event::get_upcoming_event_details_in_loop();
            return $data;
        } catch (Exception $ex) {
            error_log( $ex->getMessage() );
            return array();
        }
    }

    /**
     * This function returns all event details of event post. Use 
     * this function after starting the loop.
     * 
     * @return array
     */
    public static function get_all_event_details_in_loop() {
        try{
            $data = Heartbeat_Event_Views_Event::get_all_event_details_in_loop();
            return $data;
        } catch (Exception $ex) {
            error_log( $ex->getMessage() );
            return array();
        }
    }

    /**
     * This function returns all event details of event post. Use 
     * this function after starting the loop.
     * 
     * @return array
     */
    public static function get_ical_event_details_in_loop() {
        try{
            $data = Heartbeat_Event_Views_Event::get_ical_event_details_in_loop();
            return $data;
        } catch (Exception $ex) {
            error_log( $ex->getMessage() );
            return array();
        }
    }

    /**
     * Returns posts of type post type and pagination
     * 
     * @param type $post_type
     * @param type $year
     * @param type $page
     * @param type $perpage
     * @param type $order
     */
    public static function get_posts_data( $post_type, $year = '', $page = 1, $perpage = -1, $order = 'DESC' ) {
        try{
            $data = Heartbeat_Event_Views_Events::get_posts_data( $post_type, $year, $page, $perpage, $order );
            return $data;
        } catch (Exception $ex) {
            error_log( $ex->getMessage() );
            return array();
        }
    }

    /**
     * This function returns all events listing page details. Use 
     * this function after starting the loop.
     * 
     * @return array
     */
    public static function get_page_details_in_loop() {
        try{
            $data = Heartbeat_Event_Views_Page::get_page_details_in_loop();
            return $data;
        } catch (Exception $ex) {
            error_log( $ex->getMessage() );
            return array();
        }
    }
  
    public static function get_upcoming_events( $n ) {
        try {
            $data = Heartbeat_Event_Views_Events::get_upcoming_events( $n );
            return $data;
        } catch( Exception $ex ) {
            error_log( $ex->getMessage() );
            return array();
        }
    }

    /**
    * Prints data based on template or returns the template with data values in 
    * a string.
    * 
    * @param string $slug The slug name for the generic template.
    * @param string $name The name of the specialized template.
    * @param array $data
    * @param boolean $echo
    */
    public static function render( $slug, $name = null, $data = array(), $var_name = 'data', $echo = true ) {
        if( $echo !== true ) {
            return Heartbeat_Event_Common::render( $slug, $name, $data, $var_name, $echo );
        }
        Heartbeat_Event_Common::render( $slug, $name, $data, $var_name, $echo );
    }

    /**
    * @param type $path
    * @param type $data
    */
    public static function parse( $slug, $name = null, $data = array(), $var_name = 'data' ) {
        return Heartbeat_Event_Common::render( $slug, $name, $data, $var_name, false );
    }

    public static function get_events_page() {
        $page_id = 0;
        $options = get_option( HB_EVENTS_OPTIONS_NAME );
        if( !empty( $options ) && isset( $options['hb_events_page'] ) ) {
            $page_id = absint( $options['hb_events_page'] );
        }
        return $page_id;
    }
    
    public static function format_ical_date( $date, $time ) {
      return Heartbeat_Event_Common::format_ical_date( $date, $time );
    }

}
