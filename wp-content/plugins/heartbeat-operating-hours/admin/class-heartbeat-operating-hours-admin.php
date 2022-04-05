<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * CMS Settings for Heartbeat Operating Hours plugin
 *
 * @author mjdbaga@gmail.com
 */
class Heartbeat_Operating_Hours_Admin {
  
    protected static $instance;
    private $template_path;
  
    /**
    * Returns an instance of this class. An implementation of the singleton design pattern.
    *
    * @return   Heartbeat_Operating_Hours_Admin    A reference to an instance of this class.
    * @since    0.1.0
    */
    public static function get_instance() {

        if( null == self::$instance ) {
            self::$instance = new Heartbeat_Operating_Hours_Admin();
        } // end if

        return self::$instance;
    }
  
    private function __construct() {
        $this->template_path = HB_OPERATING_HOURS_PLUGIN_DIR . '/admin/templates';
        $this->template_name = 'operating_hours_settings.tpl.php';
        $this->settings = array(
            'page_title' => __( 'Heartbeat Operating Hours Plugin Settings' ),
            'menu_title' => __( 'Operating Hours' ),
            'menu_slug' => 'hb-operating-hours-setting-admin',
            'option_group' => 'hb_operating_hours_option_group',
            'capability' => 'manage_options',
            'icon' => 'dashicons-admin-plugins',
            'option_name' => HB_OPERATING_HOURS_OPTIONS_NAME,
        );

        $this->register_options_page();
        $this->setup_option_fields();

        add_action( 'admin_init', array( $this, 'add_acf_variables' ) );
    }
  
    private function register_options_page()
    {
        if( function_exists('acf_add_options_page') ) {

            $page = acf_add_options_page(array(
                'page_title'    => $this->settings['page_title'],
                'menu_title'    => $this->settings['menu_title'],
                'menu_slug'     => $this->settings['menu_slug'],
                'capability'    => 'manage_options',
                'redirect'      => false
            ));

        }
    }

    public function add_acf_variables() {
        if(function_exists('acf_form_head')) {
            acf_form_head();
        }
    }

    private function setup_option_fields()
    {
        if( function_exists( 'acf_add_local_field_group' ) ):

            acf_add_local_field_group( array(
                "key" => "group_591babf603599",
                "title" => "Options - Operating Hours",
                "fields" => array(
                    array(
                        "key" => "field_591bbc394b619",
                        "label" => "Monday Opening Hours",
                        "name" => "monday_opening_hours",
                        "type" => "time_picker",
                        "instructions" => "",
                        "required" => 0,
                        "conditional_logic" => 0,
                        "wrapper" => array(
                            "width" => "50",
                            "class" => "",
                            "id" => ""
                        ),
                        "display_format" => "g:iA",
                        "return_format" => "g:iA"
                    ),
                    array(
                        "key" => "field_591bbc7d2aecb",
                        "label" => "Monday Closing Hours",
                        "name" => "monday_closing_hours",
                        "type" => "time_picker",
                        "instructions" => "",
                        "required" => 0,
                        "conditional_logic" => 0,
                        "wrapper" => array(
                            "width" => "50",
                            "class" => "",
                            "id" => ""
                        ),
                        "display_format" => "g:iA",
                        "return_format" => "g:iA"
                    ),
                    array(
                        "key" => "field_591bbc9846a2c",
                        "label" => "Tuesday Opening Hours",
                        "name" => "tuesday_opening_hours",
                        "type" => "time_picker",
                        "instructions" => "",
                        "required" => 0,
                        "conditional_logic" => 0,
                        "wrapper" => array(
                            "width" => "50",
                            "class" => "",
                            "id" => ""
                        ),
                        "display_format" => "g:iA",
                        "return_format" => "g:iA"
                    ),
                    array(
                        "key" => "field_591bbcb146a2d",
                        "label" => "Tuesday Closing Hours",
                        "name" => "tuesday_closing_hours",
                        "type" => "time_picker",
                        "instructions" => "",
                        "required" => 0,
                        "conditional_logic" => 0,
                        "wrapper" => array(
                            "width" => "50",
                            "class" => "",
                            "id" => ""
                        ),
                        "display_format" => "g:iA",
                        "return_format" => "g:iA"
                    ),
                    array(
                        "key" => "field_591bbcea46a2e",
                        "label" => "Wednesday Opening Hours",
                        "name" => "wednesday_opening_hours",
                        "type" => "time_picker",
                        "instructions" => "",
                        "required" => 0,
                        "conditional_logic" => 0,
                        "wrapper" => array(
                            "width" => "50",
                            "class" => "",
                            "id" => ""
                        ),
                        "display_format" => "g:iA",
                        "return_format" => "g:iA"
                    ),
                    array(
                        "key" => "field_591bbd0046a2f",
                        "label" => "Wednesday Closing Hours",
                        "name" => "wednesday_closing_hours",
                        "type" => "time_picker",
                        "instructions" => "",
                        "required" => 0,
                        "conditional_logic" => 0,
                        "wrapper" => array(
                            "width" => "50",
                            "class" => "",
                            "id" => ""
                        ),
                        "display_format" => "g:iA",
                        "return_format" => "g:iA"
                    ),
                    array(
                        "key" => "field_591bbd1746a30",
                        "label" => "Thursday Opening Hours",
                        "name" => "thursday_opening_hours",
                        "type" => "time_picker",
                        "instructions" => "",
                        "required" => 0,
                        "conditional_logic" => 0,
                        "wrapper" => array(
                            "width" => "50",
                            "class" => "",
                            "id" => ""
                        ),
                        "display_format" => "g:iA",
                        "return_format" => "g:iA"
                    ),
                    array(
                        "key" => "field_591bbd2746a31",
                        "label" => "Thursday Closing Hours",
                        "name" => "thursday_closing_hours",
                        "type" => "time_picker",
                        "instructions" => "",
                        "required" => 0,
                        "conditional_logic" => 0,
                        "wrapper" => array(
                            "width" => "50",
                            "class" => "",
                            "id" => ""
                        ),
                        "display_format" => "g:iA",
                        "return_format" => "g:iA"
                    ),
                    array(
                        "key" => "field_591bbd3d46a32",
                        "label" => "Friday Opening Hours",
                        "name" => "friday_opening_hours",
                        "type" => "time_picker",
                        "instructions" => "",
                        "required" => 0,
                        "conditional_logic" => 0,
                        "wrapper" => array(
                            "width" => "50",
                            "class" => "",
                            "id" => ""
                        ),
                        "display_format" => "g:iA",
                        "return_format" => "g:iA"
                    ),
                    array(
                        "key" => "field_591bbd5946a33",
                        "label" => "Friday Closing Hours",
                        "name" => "friday_closing_hours",
                        "type" => "time_picker",
                        "instructions" => "",
                        "required" => 0,
                        "conditional_logic" => 0,
                        "wrapper" => array(
                            "width" => "50",
                            "class" => "",
                            "id" => ""
                        ),
                        "display_format" => "g:iA",
                        "return_format" => "g:iA"
                    ),
                    array(
                        "key" => "field_591bbd6d46a34",
                        "label" => "Saturday Opening Hours",
                        "name" => "saturday_opening_hours",
                        "type" => "time_picker",
                        "instructions" => "",
                        "required" => 0,
                        "conditional_logic" => 0,
                        "wrapper" => array(
                            "width" => "50",
                            "class" => "",
                            "id" => ""
                        ),
                        "display_format" => "g:iA",
                        "return_format" => "g:iA"
                    ),
                    array(
                        "key" => "field_591bbd7c46a35",
                        "label" => "Saturday Closing Hours",
                        "name" => "saturday_closing_hours",
                        "type" => "time_picker",
                        "instructions" => "",
                        "required" => 0,
                        "conditional_logic" => 0,
                        "wrapper" => array(
                            "width" => "50",
                            "class" => "",
                            "id" => ""
                        ),
                        "display_format" => "g:iA",
                        "return_format" => "g:iA"
                    ),
                    array(
                        "key" => "field_591bbd8846a36",
                        "label" => "Sunday Opening Hours",
                        "name" => "sunday_opening_hours",
                        "type" => "time_picker",
                        "instructions" => "",
                        "required" => 0,
                        "conditional_logic" => 0,
                        "wrapper" => array(
                            "width" => "50",
                            "class" => "",
                            "id" => ""
                        ),
                        "display_format" => "g:iA",
                        "return_format" => "g:iA"
                    ),
                    array(
                        "key" => "field_591bbd9846a37",
                        "label" => "Sunday Closing Hours",
                        "name" => "sunday_closing_hours",
                        "type" => "time_picker",
                        "instructions" => "",
                        "required" => 0,
                        "conditional_logic" => 0,
                        "wrapper" => array(
                            "width" => "50",
                            "class" => "",
                            "id" => ""
                        ),
                        "display_format" => "g:iA",
                        "return_format" => "g:iA"
                    )
                ),
                "location" => array(
                    array(
                        array(
                            "param" => "options_page",
                            "operator" => "==",
                            "value" => "hb-operating-hours-setting-admin"
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
}
