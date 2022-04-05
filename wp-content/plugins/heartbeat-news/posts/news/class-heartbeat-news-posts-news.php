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
class Heartbeat_News_Posts_News {

    private static $instance;
    private $slug;
    private $label;

    /**
    * Returns an instance of this class. An implementation of the singleton design pattern.
    *
    * @return   Heartbeat_News_Posts_News    A reference to an instance of this class.
    * @since    1.0.0
    */
    public static function get_instance() {

        if( null == self::$instance ) {
            self::$instance = new Heartbeat_News_Posts_News();
        } // end if

        return self::$instance;
    }

    function __construct() {
        $this->slug = HB_NEWS_SLUG;
        $this->label = __( 'News' );

        add_action( 'init', array( $this, 'init_post' ) );
        add_action( 'init', array( $this, 'register_fields' ) );
        add_action( 'init', array( $this, 'init_news_template' ) );
        add_action( 'acf/save_post', array( $this, 'acf_add_default_post_date'), 1);
    }

    function init_post() {
        $args = array(
            'label' => $this->label,
            'public' => TRUE,
            'rewrite' => array( 'slug' => 'news-listing', ),
            'supports' => array(
                'title',
                'thumbnail',
                'excerpt',
                'editor'
            )
        );
        register_post_type( $this->slug, $args );
    }

    /**
    * Initiate the single template for event post
    */
    function init_news_template() {
        //add template
        add_filter( 'single_template', array( $this, '_heartbeat_news_single_template' ), 10, 1 );
    }

    /**
    * Callback for single template filter for event post type
    * 
    * @param string $single_template
    * @return string
    */
    function _heartbeat_news_single_template( $single_template ) {
        $object = get_queried_object();

        if( $object->post_type != $this->slug ) {
            return $single_template;
        }

        $single_type_name_template = locate_template( "single-{$object->post_type}-{$object->post_name}.php" );
        $single_type_template = locate_template( "single-{$object->post_type}.php" );

        if( $single_type_name_template ) {
            return $single_type_name_template;
        } else if( $single_type_template ) {
            return $single_type_template;
        } else {
            $single_template = HB_NEWS_PLUGIN_DIR . '/post_templates/single-' . $this->slug . '.php';
            return $single_template;
        }
    }

    function acf_add_default_post_date( $post_id ) {

        if( empty($_POST) ) {
            return;
        }

        if( empty($_POST['acf']['field_5916b6dd302a2']) ) { 
            
            $today = date('Y-m-d H:i:s');

            $_POST['acf']['field_5916b6dd302a2'] = $today;

        }
    }

    function register_fields() {
        
        if( function_exists( 'acf_add_local_field_group' ) ):

            acf_add_local_field_group( array(
                "key" => "group_591527ee1efc9",
                "title" => "Post - News",
                "fields" => array(
                    array(
                        "key" => "field_5916fb16a5eee",
                        "label" => "Page Banner",
                        "name" => "page_banner",
                        "type" => "image",
                        "instructions" => "",
                        "required" => 0,
                        "conditional_logic" => 0,
                        "wrapper" => array(
                            "width" => "",
                            "class" => "",
                            "id" => ""
                        ),
                        "return_format" => "array",
                        "preview_size" => "thumbnail",
                        "library" => "all",
                        "min_width" => "",
                        "min_height" => "",
                        "min_size" => "",
                        "max_width" => "",
                        "max_height" => "",
                        "max_size" => "",
                        "mime_types" => ""
                    ),
                    array(
                        "key" => "field_591527fe33c3e",
                        "label" => "Author",
                        "name" => "author",
                        "type" => "text",
                        "instructions" => "",
                        "required" => 0,
                        "conditional_logic" => 0,
                        "wrapper" => array(
                            "width" => "",
                            "class" => "",
                            "id" => ""
                        ),
                        "default_value" => "",
                        "placeholder" => "",
                        "prepend" => "",
                        "append" => "",
                        "maxlength" => ""
                    ),
                    array(
                        "key" => "field_5916b6dd302a2",
                        "label" => "Post Date",
                        "name" => "news_post_date",
                        "type" => "date_time_picker",
                        "instructions" => "",
                        "required" => 0,
                        "conditional_logic" => 0,
                        "wrapper" => array(
                            "width" => "",
                            "class" => "",
                            "id" => ""
                        ),
                        "display_format" => "d/m/Y g:i a",
                        "return_format" => "d/m/Y g:i a",
                        "first_day" => 1
                    )
                ),
                "location" => array(
                    array(
                        array(
                            "param" => "post_type",
                            "operator" => "==",
                            "value" => HB_NEWS_SLUG
                        )
                    )
                ),
                "menu_order" => 0,
                "position" => "normal",
                "style" => "default",
                "label_placement" => "top",
                "instruction_placement" => "label",
                "hide_on_screen" => array(
                    "custom_fields",
                    "discussion",
                    "comments",
                    "author",
                    "format",
                    "categories",
                    "send-trackbacks"
                ),
                "active" => 1,
                "description" => ""
            ) );
        endif;

    }

}
