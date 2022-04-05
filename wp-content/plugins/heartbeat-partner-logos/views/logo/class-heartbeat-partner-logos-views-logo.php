<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * This class contains all the view functions for a single news post
 *
 * @author mjdbaga@gmail.com
 */

class Heartbeat_Partner_Logos_Views_Logo {

    /**
    * Implemtation of get_partner_logo_details_in_loop() function. returns details for news functions
    * 
    * @param post $news
    */
    public static function get_partner_logo_details_in_loop() {
        $data = array();
        $data['title'] = apply_filters( 'the_title', get_the_title());
        $data['partner_link'] = get_field( 'partner_link' );
        $data['image_url'] = get_the_post_thumbnail_url( null , 'full' );
        $data['image_alt'] = get_the_post_thumbnail_caption( null);
        return $data;
    }

}
