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

class Heartbeat_News_Views_Single {

    /**
    * Implemtation of get_all_news_details_in_loop() function. returns details for news functions
    * 
    * @param post $news
    */
    public static function get_all_news_details_in_loop() {
        $data = array();
        $data['title'] = apply_filters( 'the_title', get_the_title());
        $data['banner'] = get_field( 'page_banner' );
        
        $post_date = get_field( 'news_post_date', false, false );
        $date = new DateTime($post_date);
        $meta_post_date = $date->format( 'c' );
        $post_date = $date->format( 'd F Y' );
        
        $data['post_date'] = $post_date;
        $data['meta_post_date'] = $meta_post_date;
        $data['meta_mod_date'] = apply_filters( 'get_the_modified_date', get_the_modified_date( 'c' ) );
        $data['author'] = get_field( 'author' );
        $data['image_url'] = get_the_post_thumbnail_url( null , 'full' );
        $data['image_alt'] = get_the_post_thumbnail_caption( null);
        $data['content'] = apply_filters( 'the_content', get_the_content() );
        $data['breadcrumbs'] = hb_parse_sidebar( 'breadcrumbs_widget' );
        $data['upcoming_events'] = hb_parse_sidebar( 'hb_upcoming_events_widget' );
        $data['recent_news'] = hb_parse_sidebar( 'hb_news_widget' );
        return $data;
    }
  
    /**
    * Implemtation of get_recent_news_details_in_loop() function. returns details for news functions
    * 
    * @param post $news
    */
    public static function get_recent_news_details_in_loop() {
        $data = array();
        $data['title'] = apply_filters( 'the_title', get_the_title());
        
        $post_date = get_field( 'news_post_date', false, false );
        $date = new DateTime($post_date);
        $post_date = $date->format( 'd F Y' );

        $data['post_date'] = $post_date;
        $data['thumbnail_image_url'] = get_the_post_thumbnail_url( null , 'thumbnail' );
        $data['medium_image_url'] = get_the_post_thumbnail_url( null , 'medium' );
        $data['thumbnail_image_alt'] = get_the_post_thumbnail_caption();
        $data['url'] = get_the_permalink();
        $data['description'] = strip_tags( apply_filters( 'the_excerpt', get_the_excerpt() ) );
        return $data;
    }

}
