<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * This class extends default page template example by tomcarlin
 *
 * @author mjdbaga@gmail.com
 */

class Heartbeat_Facilities_Pages_Facilities extends Page_Template_Plugin {

    /**
     * The array of page templates that this plugin tracks.
     *
     * @var      array
     */
    protected $templates;

    private static $instance;

    /**
     * Returns an instance of this class. An implementation of the singleton design pattern.
     *
     * @return  Heartbeat_Facilities_Pages_Facilities. A reference to an instance of this class.
     */
    public static function get_instance() {
        if( null == self::$instance ) {
            self::$instance = new Heartbeat_Facilities_Pages_Facilities();
        } // end if
        return self::$instance;
    }

    private function __construct() {
        $this->templates = array();

        // Grab the translations for the plugin
        add_action( 'init', array( $this, 'load_plugin_textdomain' ) );
        
        // Add a filter to the attributes metabox to inject template into the cache.
        if ( version_compare( floatval( get_bloginfo( 'version' ) ), '4.7', '<' ) ) {
            // 4.6 and older
            add_filter('page_attributes_dropdown_pages_args', array( $this, 'register_project_templates' ));
        } else {
           // Add a filter to the wp 4.7 version attributes metabox
           add_filter('theme_page_templates', array( $this, 'add_new_template' ));
        }

        // Add a filter to the save post in order to inject out template into the page cache
        add_filter( 'wp_insert_post_data', array( $this, 'register_project_templates' ) );
        // Add a filter to the template include in order to determine if the page has our template assigned and return it's path
        add_filter( 'template_include', array( $this, 'view_project_template' ) );
        // Register hooks that are fired when the plugin is activated, deactivated, and uninstalled, respectively.
        register_deactivation_hook( __FILE__, array( $this, 'deactivate' ) );
        // Add your templates to this array.
        $this->templates = array(
            'page-templates/template-facilities.php' => 'Facilities Page Template'
        );
        // adding support for theme templates to be merged and shown in dropdown
        $templates = wp_get_theme()->get_page_templates();
        $templates = array_merge( $templates, $this->templates );

        $this->register_fields();

        add_filter( 'query_vars', array( $this, 'hb_facilities_query_vars' ), 10, 1 );
    }

    public function view_project_template( $template ) {

        global $post;

        // If no posts found, return to
        // avoid "Trying to get property of non-object" error
        if ( !isset( $post ) ) return $template;

        if ( ! isset( $this->templates[ get_post_meta( $post->ID, '_wp_page_template', true ) ] ) ) {
              return $template;
        } // end if

        $template_name = get_post_meta( $post->ID, '_wp_page_template', true );
        $theme_template = locate_template( $template_name );

        if( $theme_template ) {
            return $theme_template;
        }

        $file = HEARTBEAT_FACILITIES_PLUGIN_DIR . '/' . get_post_meta( $post->ID, '_wp_page_template', true );

        // Just to be safe, we check if the file exist first
        if( file_exists( $file ) ) {
            return $file;
        } // end if

        return $template;

    }

    public function hb_facilities_query_vars( $vars ) {
        $vars[] = 'posts_per_page';
        $vars[] = 'post_year';
        $vars[] = 'order';
        return $vars;
    }

    /**
      * Adds our template to the page dropdown for v4.7+
      *
      */
    public function add_new_template( $posts_templates ) {
        $posts_templates = array_merge( $posts_templates, $this->templates );
        return $posts_templates;
    }

    function register_fields() {
        
        if( function_exists( 'acf_add_local_field_group' ) ):

            acf_add_local_field_group( array(
                "key" => "group_59152211d4bc3",
                "title" => "Template - Facilities",
                "fields" => array(
                    array(
                        "key" => "field_591522d15242c",
                        "label" => "Activity Icons",
                        "name" => "activity_icons",
                        "type" => "relationship",
                        "instructions" => "",
                        "required" => 0,
                        "conditional_logic" => 0,
                        "wrapper" => array(
                            "width" => "",
                            "class" => "",
                            "id" => ""
                        ),
                        "post_type" => array(
                                "hb-icons"
                            ),
                        "taxonomy" => array(),
                        "filters" => array(
                            "search",
                            "post_type",
                            "taxonomy"
                        ),
                        "elements" => "",
                        "min" => "",
                        "max" => 6,
                        "return_format" => "object"
                    ),
                    array(
                        "key" => "field_5915231f5242d",
                        "label" => "Operating Hours",
                        "name" => "operating_hours",
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
                        "key" => "field_591523325242e",
                        "label" => "Facility Contact",
                        "name" => "facility_contact",
                        "type" => "number",
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
                        "min" => "",
                        "max" => "",
                        "step" => ""
                    ),
                    array(
                        "key" => "field_591523445242f",
                        "label" => "Facility Address",
                        "name" => "facility_address",
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
                        "key" => "field_5915234f52430",
                        "label" => "Facility Email",
                        "name" => "facility_email",
                        "type" => "email",
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
                        "append" => ""
                    ),
                    array(
                        "key" => "field_5915235b52431",
                        "label" => "Facility Link",
                        "name" => "facility_link",
                        "type" => "url",
                        "instructions" => "",
                        "required" => 0,
                        "conditional_logic" => 0,
                        "wrapper" => array(
                            "width" => "",
                            "class" => "",
                            "id" => ""
                        ),
                        "default_value" => "",
                        "placeholder" => ""
                    ),
                    array(
                        "key" => "field_5919bcb4544dd",
                        "label" => "Get Directions Link",
                        "name" => "get_directions_link",
                        "type" => "url",
                        "instructions" => "",
                        "required" => 0,
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
                            "param" => "page_template",
                            "operator" => "==",
                            "value" => "page-templates/template-facilities.php"
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
                    "tags",
                    "send-trackbacks"
                ),
                "active" => 1,
                "description" => ""
            ) );

        endif;

    }

}
