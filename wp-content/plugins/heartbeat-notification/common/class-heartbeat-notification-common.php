<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * This class has the implementation of all the common functions that can be 
 * used by classes across this module
 *
 * @author mjdbaga@gmail.com
 */
class Heartbeat_Notification_Common {

  /**
   * Implemantation of this module's render function. Prints data based on 
   * template or returns the template with data values in a string.
   * 
   * @param string $path
   * @param array $data
   * @param boolean $echo
   * @return mixed
   */
  public static function render( $slug, $name = null, $data = array(), $var_name = 'data', $echo = true ) {
    ob_start();
    $templater = new Heartbeat_Notification_Common_Templater();
    $templater->set_template_data( $data, $var_name );
    $templater->get_template_part( $slug, $name );
    $templater->unset_template_data();

    $out = ob_get_clean();
    if( $echo === true ) {
      echo $out;
    } else {
      return $out;
    }
  }
  
}
