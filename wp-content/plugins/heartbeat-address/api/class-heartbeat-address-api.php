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
class Heartbeat_Address_Api {

    public static function get_address_option()
    {
        $address = get_option( 'hb_address_option_id' );
        return $address;
    }


    public static function get_address_link_option()
    {
        $address_link = get_option( 'hb_address_option_link_id' );
        return $address_link;
    }

    // public static function get_address() {
    //     $address_options = self::get_address_option();
    //     $address = '';
    //     if( !empty( $options['hb_address_option_id'] ) ) {
    //         $address = $options['hb_address_option_id'];
    //     }
    //     return $address;
    // }

    // public static function get_address_link() {
    //     $address_options = self::get_address_link_option();
    //     $address_link = '';
    //     if( !empty( $address_options['hb_address_link_id'] ) ) {
    //         $address_link = $address_options['hb_address_link_id'];
    //     }
    //     return $address_link;
    // }

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
          return Heartbeat_Address_Common::render( $slug, $name, $data, $var_name, $echo );
        }
        Heartbeat_Address_Common::render( $slug, $name, $data, $var_name, $echo );
    }

    /**
    * 
    * @param type $path
    * @param type $data
    */
    public static function parse( $slug, $name = null, $data = array(), $var_name = 'data' ) {
        return Heartbeat_Address_Common::render( $slug, $name, $data, $var_name, false );
    }
}
