<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Heartbeat_Theme_Components_Pages_Standard
 *
 * @author mjdbaga@gmail.com
 */
class Heartbeat_Theme_Components_Pages_Standard {

    public static function register_fields() {
        
        if( function_exists( 'acf_add_local_field_group' ) ):

            acf_add_local_field_group( array(
                "key" => "group_591cfb35454fc",
                "title" => "All Stores",
                "fields" => array(
                    array(
                        "key" => "field_591cfb50ef6d0",
                        "label" => "Stores",
                        "name" => "stores",
                        "type" => "relationship",
                        "instructions" => "Select the stores you want to display",
                        "required" => 0,
                        "conditional_logic" => 0,
                        "wrapper" => array(
                            "width" => "",
                            "class" => "",
                            "id" => ""
                        ),
                        "post_type" => array(
                            "str-dine",
                            "str-shop"
                        ),
                        "taxonomy" => array(),
                        "filters" => array(
                            "search",
                            "post_type",
                            "taxonomy"
                        ),
                        "elements" => "",
                        "min" => "",
                        "max" => "",
                        "return_format" => "object"
                    )
                ),
                "location" => array(
                    array(
                        array(
                            "param" => "page_template",
                            "operator" => "==",
                            "value" => "default"
                        )
                    )
                ),
                "menu_order" => 0,
                "position" => "normal",
                "style" => "default",
                "label_placement" => "top",
                "instruction_placement" => "label",
                "hide_on_screen" => "",
                "active" => 1,
                "description" => ""
            ) );

        endif;

    }
  
    public static function get_data() {
        $stores = get_field( 'stores' );

        $data = array();
        $data['title'] = apply_filters( 'the_title', get_the_title() );
        $data['banner'] = get_the_post_thumbnail_url( null, 'full' );
        $data['breadcrumbs'] = hb_parse_sidebar( 'breadcrumbs_widget' );
        $data['content'] = apply_filters( 'the_content', get_the_content() );
        $data['stores'] = self::get_store_data( $stores );

        return $data;
    }
  
    private static function get_store_data( $stores ) {
        if( empty( $stores ) ) {
            return array();
        }

        if( !class_exists( 'Heartbeat_Store' ) ) {
            return false;
        }

        global $post;

        $store_data = array();

        $stores = sort_posts($stores, 'post_title');

        foreach( $stores as $post ) {
            setup_postdata( $post );
            $item = array();
            $item['title'] = get_the_title();
            $item['image'] = get_the_post_thumbnail_url( null, 'full' );
            $item['image_alt'] = get_the_post_thumbnail_caption(null);
            $item['description'] = get_field( 'description' );
            $item['store_operating_hours'] = get_field( 'store_operating_hours' );
            $item['store_contact'] = get_field( 'store_contact' );
            $item['store_email'] = get_field( 'store_email' );
            $item['store_link'] = get_field( 'store_link' );
            $item['store_location'] = get_field( 'store_location' );
            $store_data[] = $item;
        }

        wp_reset_postdata();
        return $store_data;
    }
    
}

function sort_posts( $posts, $orderby, $order = 'ASC', $unique = true ) {
    if ( ! is_array( $posts ) ) {
        return false;
    }
    
    usort( $posts, array( new Sort_Posts( $orderby, $order ), 'sort' ) );
    
    // use post ids as the array keys
    if ( $unique && count( $posts ) ) {
        $posts = array_combine( wp_list_pluck( $posts, 'ID' ), $posts );
    }
    
    return $posts;
}

class Sort_Posts {
    var $order, $orderby;
    
    function __construct( $orderby, $order ) {
        $this->orderby = $orderby;
        $this->order = ( 'desc' == strtolower( $order ) ) ? 'DESC' : 'ASC';
    }
    
    function sort( $a, $b ) {
        if ( $a->{$this->orderby} == $b->{$this->orderby} ) {
            return 0;
        }
        
        if ( $a->{$this->orderby} < $b->{$this->orderby} ) {
            return ( 'ASC' == $this->order ) ? -1 : 1;
        } else {
            return ( 'ASC' == $this->order ) ? 1 : -1;
        }
    }
}

