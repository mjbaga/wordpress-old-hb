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
class Heartbeat_News_Views_Multiple {
  
    /**
    * Implemtation of get_recent_news() function. This function 
    * returns requested number of recent news posts based on date.
    * 
    * @param int $n number of news to display
    * 
    * @return array of news posts
    */
    public static function get_recent_news( $n ) {

        $args = array(
            'post_type' => HB_NEWS_SLUG,
            'numberposts' => $n,
            'post_status' => 'publish',
            'meta_key' => 'news_post_date',
            'orderby' => 'meta_value',
            'order' => 'desc'
        );

        $news = get_posts( $args );

        return $news;
    }

    public static function get_posts_data( $post_type, $page = 1, $perpage = -1 ) {
        $args = self::get_post_args( $post_type, $page, $perpage );

        $posts = get_posts( $args );

        $pagination = self::get_pagination( $args, $page );

        $data = array();
        $data['posts'] = $posts;
        $data['pagination'] = $pagination;

        return $data;
    }

    public static function get_post_args( $post_type, $page = 1, $perpage = -1 ) {
        
        $args = array(
            'post_type' => HB_NEWS_SLUG,
            'numberposts' => $perpage,
            'paged' => $page,
            'post_status' => 'publish',
            'meta_key' => 'news_post_date',
            'orderby' => 'meta_value',
            'order' => 'desc'
        );
        
        return $args;
    }
    
    private static function get_pagination( $args, $current ) {
        $listing_items_query = new WP_Query( $args );
        $big = 999999999;
        $pagination_args = array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, $current ),
            'type' => 'plain',
            'total' => $listing_items_query->max_num_pages
        );
        $html = paginate_links( $pagination_args );

        return $html;
    }

}
