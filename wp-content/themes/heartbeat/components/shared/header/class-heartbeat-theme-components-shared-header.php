<?php

/**
 * functions to be used in site header under body. Does not include functions for wp_head()
 *
 * @author mjdbaga@gmail.com
 * @since 0.1.0
 */
class Heartbeat_Theme_Components_Shared_Header {
  
  public static function get_header_data() {
    $data = array();
    $data['is_home'] = is_home();
    $data['site_title'] = SITE_NAME;
    $data['logo'] = get_custom_logo();
    $data['primary_navigation'] = Heartbeat_Theme_Components_Shared_Navigation::get_primary_navigation();
    $data['social_navigation'] = Heartbeat_Theme_Components_Shared_Navigation::get_social_navigation();
    $data['header_desktoponly'] = hb_parse_sidebar( 'header_desktoponly_widget' );
    $data['header_mobileonly'] = hb_parse_sidebar( 'header_mobileonly_widget' );
    $data['header_bottom'] = hb_parse_sidebar( 'header_bottom_widget' );
    $data['masthead'] = hb_parse_sidebar( 'masthead_widget' );
    if( class_exists( 'Adelphi_Base_Api' ) ) {
      $data['analytics_id'] = Adelphi_Base_Api::get_analytics_id();
    }
    return $data;
  }
  
}
