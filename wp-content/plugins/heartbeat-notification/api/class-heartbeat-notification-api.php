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
class Heartbeat_Notification_Api {

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
      return Heartbeat_Notification_Common::render( $slug, $name, $data, $var_name, $echo );
    }
    Heartbeat_Notification_Common::render( $slug, $name, $data, $var_name, $echo );
  }

  /**
   * 
   * @param type $path
   * @param type $data
   */
  public static function parse( $slug, $name = null, $data = array(), $var_name = 'data' ) {
    return Heartbeat_Notification_Common::render( $slug, $name, $data, $var_name, false );
  }

}
