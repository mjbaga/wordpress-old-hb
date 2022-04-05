<?php

/**
 * functions to be used in site footer under body. Does not include functions for wp_footer()
 *
 * @author mjdbaga@gmail.com
 * @since 0.1.0
 */
class Heartbeat_Theme_Components_Shared_Footer {
  
  public static function get_data() {
    $data = array();
    $data['is_home'] = is_home();
    $data['feedback'] = '';
    $data['subscribe'] = '';
    $data['footer_bottom'] = hb_parse_sidebar( 'footer_bottom_widget' );
    $data['footer_middle'] = hb_parse_sidebar( 'footer_middle_widget' );
    $data['footer_top'] = hb_parse_sidebar( 'footer_top_widget' );
    $data['footer_navigation'] = Heartbeat_Theme_Components_Shared_Navigation::get_legal_navigation();
    $data['social_navigation'] = Heartbeat_Theme_Components_Shared_Navigation::get_social_navigation();
    $data['site_search'] = '';
    return $data;
  }
  
}
