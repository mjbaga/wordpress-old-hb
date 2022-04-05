<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Functionalities related to listing page.
 *
 * @author mjdbaga@gmail.com
 */
class Heartbeat_Facilities_Views_Icon {
  
    /**
    * Implemtation of get_page_details_in_loop() function. returns details for current page
    * 
    * @param post $event
    */
    public static function get_icon_details_in_loop() {
        $data = array();
        $data['title'] = apply_filters( 'the_title', get_the_title());
        $data['icon_class'] = get_field( 'icon_class' );

        return $data;
    }
}
