<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * CMS Settings for Heartbeat_Event plugin
 *
 * @author mjdbaga@gmail.com
 */
class Heartbeat_Event_Admin {
  
    protected static $instance;
    private $template_path;
  
    /**
    * Returns an instance of this class. An implementation of the singleton design pattern.
    *
    * @return   Heartbeat_Event_Admin    A reference to an instance of this class.
    * @since    0.1.0
    */
    public static function get_instance() {

        if( null == self::$instance ) {
            self::$instance = new Heartbeat_Event_Admin();
        } // end if

        return self::$instance;

    }
  
    private function __construct() {
        $this->template_path = dirname( __FILE__ ) . '/../admin/templates';
        $this->template_name = 'event_settings.tpl.php';
        $this->settings = array(
            'page_title' => __( 'Heartbeat Event Plugin Settings' ),
            'menu_title' => __( 'Heartbeat Event settings' ),
            'menu_slug' => 'hb-event-setting-admin',
            'option_group' => 'hb_event_option_group',
            'option_name' => 'hb_events_options_name',
        );
        $this->register_menu();
    }
  
    private function register_menu() {
        add_action( 'admin_menu', array( $this, 'add_plugin_menu' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
    }
  
    /**
    * Add options page
    */
    public function add_plugin_menu() {
        // This page will be under "Settings"
        add_options_page(
                $this->settings['page_title'], $this->settings['menu_title'], 'manage_options', $this->settings['menu_slug'], array( $this, 'create_admin_page' )
        );
    }
  
    /**
    * Options page callback
    */
    public function create_admin_page() {
        ob_start();
        settings_fields( $this->settings['option_group'] );
        do_settings_sections( $this->settings['menu_slug'] );
        submit_button();
        $settings = ob_get_clean();
        require_once( $this->template_path . DIRECTORY_SEPARATOR .$this->template_name );
    }
  
    /**
    * Register and add settings
    */
    public function page_init() {

        register_setting(
                $this->settings['option_group'], // Option group
                $this->settings['option_name'], // Option name
                array( $this, 'sanitize' )
        );

        //Events Section
        add_settings_section(
            'hb_event_section', // ID
            __( 'Heartbeat Event Section' ), // Title
            array( $this, 'event_section_callback' ), // Callback
            $this->settings['menu_slug'] // Page
        );


        //Add Fields
        add_settings_field(
            'hb_events_page', // ID
            __( 'Heartbeat Event Page' ), // Title
            array( $this, '_heartbeat_event_page_id_callback' ), // Callback
            $this->settings['menu_slug'], // Page
            'hb_event_section' // Section
        );
    }
  
    /**
    * Sanitize the data submitted by user
    * 
    * @param type $input
    * @return array
    */
    public function sanitize( $input ) {
        $new_input = array();
        if( isset( $input['hb_events_page'] ) ) {
            $new_input['hb_events_page'] = absint( $input['hb_events_page'] );
        }

        return $new_input;
    }
  
    /**
    * Callback function for settings field for options page
    */
    public function _heartbeat_event_page_id_callback() {
        $selected = Heartbeat_Event_Api::get_events_page();
        $args = array(
            'name' => $this->settings['option_name'] . '[hb_events_page]',
            'id' => 'hb_event_page_id',
            'selected' => $selected
        );
        wp_dropdown_pages( $args );
    }
  
    /**
    * callback function for event section
    */
    public function event_section_callback() {
        _e( 'Modify all Event Settings:' );
    }

}