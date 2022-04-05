<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * This class declares news post type and all its fields.
 *
 * @author mjdbaga@gmail.com
 */
class Heartbeat_Store_Posts_Shop extends Heartbeat_Store_Posts_Base {

  protected static $instance;

  public static function get_instance() {

    if( null == self::$instance ) {
      self::$instance = new Heartbeat_Store_Posts_Shop();
    } // end if

    return self::$instance;
  }

  function __construct() {
    $this->slug = HEARTBEAT_STORE_POST_SHOP_SLUG;
    $this->label = __( 'Shop' );

    add_action( 'init', array( $this, 'init_post' ) );
  }

}
