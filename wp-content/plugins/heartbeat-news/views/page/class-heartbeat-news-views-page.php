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
class Heartbeat_News_Views_Page {
  
    /**
    * Implemtation of get_page_details_in_loop() function. returns details for current page
    * 
    * @param post $event
    */
    public static function get_page_details_in_loop() {
        $data = array();
        $data['title'] = apply_filters( 'the_title', get_the_title());
        $data['banner'] = get_the_post_thumbnail_url( null , 'full' ); 
        $data['image_alt'] = get_the_post_thumbnail_caption( null);
        $data['content'] = strip_tags( apply_filters( 'the_exerpt', get_the_excerpt() ) );
        $data['breadcrumbs'] = hb_parse_sidebar( 'breadcrumbs_widget' );
        $data['link'] = get_permalink();
        return $data;
    }
}
