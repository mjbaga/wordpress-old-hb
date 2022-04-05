<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * This class exposes all the api functions for this module. 
 * They will all refer to other functions in other classes which will have the 
 * actual implementation.
 *
 * @author mjdbaga@gmail.com
 */
class Heartbeat_Store_Api {
  /**
   * Get all post types declared in this plugin
   * 
   * @return array
   */
  public static function get_str_post_types() {
    $str_posts = array(
        HEARTBEAT_STORE_POST_SHOP_SLUG,
        HEARTBEAT_STORE_POST_DINE_SLUG,
    );
    return $str_posts;
  }

}
