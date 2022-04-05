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
class Heartbeat_Facilities_Posts_Icons {

    private static $instance;
    private $slug;
    private $label;

    /**
    * Returns an instance of this class. An implementation of the singleton design pattern.
    *
    * @return   Heartbeat_Facilities_Posts_Icons    A reference to an instance of this class.
    * @since    1.0.0
    */
    public static function get_instance() {

        if( null == self::$instance ) {
            self::$instance = new Heartbeat_Facilities_Posts_Icons();
        } // end if

        return self::$instance;
    }

    function __construct() {
        $this->slug = HEARTBEAT_ICON_SLUG;
        $this->label = __( 'Icon' );

        add_action( 'init', array( $this, 'init_post' ) );
        add_action( 'init', array( $this, 'register_fields' ) );
    }

    function init_post() {
        $args = array(
            'label' => $this->label,
            'public' => TRUE,
            'supports' => array(
                'title'
            )
        );
        register_post_type( $this->slug, $args );
    }

    function register_fields() {
        
        if( function_exists( 'acf_add_local_field_group' ) ):

            acf_add_local_field_group( array(
                "key" => "group_59152b46c1dbe",
                "title" => "Post - Icon",
                "fields" => array(
                    array(
                        "key" => "field_59152b59fdb27",
                        "label" => "Icon Class",
                        "name" => "icon_class",
                        "type" => "select",
                        "instructions" => "",
                        "required" => 0,
                        "conditional_logic" => 0,
                        "wrapper" => array(
                            "width" => "",
                            "class" => "",
                            "id" => ""
                        ),
                        "choices" => array(
                            "icon-gym" => "Gym",
                            "icon-swimming" => "Pools",
                            "icon-squash" => "Squash Court",
                            "icon-tennis" => "Tennis Court",
                            "icon-football" => "Football",
                            "icon-badminton" => "Badminton"
                        ),
                        "default_value" => array(),
                        "allow_null" => 0,
                        "multiple" => 0,
                        "ui" => 0,
                        "ajax" => 0,
                        "return_format" => "value",
                        "placeholder" => ""
                    )
                ),
                "location" => array(
                    array(
                        array(
                            "param" => "post_type",
                            "operator" => "==",
                            "value" => "hb-icons"
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
                    "featured_image",
                    "categories",
                    "tags",
                    "send-trackbacks"
                ),
                "active" => 1,
                "description" => ""
            ) );
        endif;

    }

}
