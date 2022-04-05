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
class Heartbeat_Partner_Logos_Api {
  
    /**
    * This function returns needed details of each logo in widgets. Use 
    * this function after starting the loop.
    * 
    * @return array
    */
    public static function get_partner_logo_details_in_loop() {
        try{
            $data = Heartbeat_Partner_Logos_Views_Logo::get_partner_logo_details_in_loop();
            return $data;
        } catch (Exception $ex) {
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
            return Heartbeat_Partner_Logos_Common::render( $slug, $name, $data, $var_name, $echo );
        }
        Heartbeat_Partner_Logos_Common::render( $slug, $name, $data, $var_name, $echo );
    }

    /**
    * @param type $path
    * @param type $data
    */
    public static function parse( $slug, $name = null, $data = array(), $var_name = 'data' ) {
        return Heartbeat_Partner_Logos_Common::render( $slug, $name, $data, $var_name, false );
    }

}
