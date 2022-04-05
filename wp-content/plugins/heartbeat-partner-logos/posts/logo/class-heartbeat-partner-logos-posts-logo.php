<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * This class declares event post type and all its fields.
 *
 * @author mjdbaga@gmail.com
 */
class Heartbeat_Partner_Logos_Posts_Logo {

    private static $instance;
    private $slug;
    private $label;

    /**
    * Returns an instance of this class. An implementation of the singleton design pattern.
    *
    * @return   Heartbeat_Partner_Logos_Posts_Logo    A reference to an instance of this class.
    * @since    1.0.0
    */
    public static function get_instance() {

        if( null == self::$instance ) {
            self::$instance = new Heartbeat_Partner_Logos_Posts_Logo();
        } // end if

        return self::$instance;
    }

    function __construct() {
        $this->slug = HB_PARTER_LOGOS_SLUG;
        $this->label = __( 'Partner Logos' );

        add_filter( 'manage_posts_columns', array( $this, 'hb_add_id_column' ), 5 );
        add_action( 'manage_posts_custom_column', array( $this, 'hb_id_column_content' ), 5, 2 );
        add_action( 'init', array( $this, 'init_post' ) );
        add_action( 'init', array( $this, 'register_fields' ) );
    }

    function init_post() {
        $args = array(
            'label' => $this->label,
            'public' => TRUE,
            'rewrite' => array( 'slug' => $this->slug ),
            'supports' => array(
                'title',
                'thumbnail'
            )
        );
        register_post_type( $this->slug, $args );
    }

    function register_fields() {
        
        if( function_exists( 'acf_add_local_field_group' ) ):

            acf_add_local_field_group( array(
                "key" => "group_59152c1d04052",
                "title" => "Post - Partner Logo",
                "fields" => array(
                    array(
                        "key" => "field_59152c48ebd5a",
                        "label" => "Partner Link",
                        "name" => "partner_link",
                        "type" => "url",
                        "instructions" => "",
                        "required" => 1,
                        "conditional_logic" => 0,
                        "wrapper" => array(
                            "width" => "",
                            "class" => "",
                            "id" => ""
                        ),
                        "default_value" => "",
                        "placeholder" => ""
                    )
                ),
                "location" => array(
                    array(
                        array(
                            "param" => "post_type",
                            "operator" => "==",
                            "value" => HB_PARTER_LOGOS_SLUG
                        )
                    )
                ),
                "menu_order" => 0,
                "position" => "normal",
                "style" => "default",
                "label_placement" => "top",
                "instruction_placement" => "label",
                "hide_on_screen" => array(
                    "permalink",
                    "the_content",
                    "excerpt",
                    "custom_fields",
                    "discussion",
                    "comments",
                    "author",
                    "format",
                    "categories",
                    "tags",
                    "send-trackbacks"
                ),
                "active" => 1,
                "description" => ""
            ) );
        endif;

    }

    /**
     * Add post id column for all posts
     * 
     * @param array $columns
     * @return string
     */
    function hb_add_id_column( $columns ) {
        $columns['post_id'] = 'ID';
        return $columns;
    }

    /**
     * Print post_id when for post_id column
     * 
     * @param type $column
     * @param type $id
     */
    function hb_id_column_content( $column, $id ) {
        if( 'post_id' == $column ) {
            echo $id;
        }
    }

}
