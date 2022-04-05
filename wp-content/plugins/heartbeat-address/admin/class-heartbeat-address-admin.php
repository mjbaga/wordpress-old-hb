<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * CMS Settings for Heartbeat Address plugin
 *
 * @author mjdbaga@gmail.com
 */
class Heartbeat_Address_Admin {
  
    protected static $instance;
    private $template_path;
  
    /**
    * Returns an instance of this class. An implementation of the singleton design pattern.
    *
    * @return   Heartbeat_Address_Admin    A reference to an instance of this class.
    * @since    0.1.0
    */
    public static function get_instance() {

        if( null == self::$instance ) {
            self::$instance = new Heartbeat_Address_Admin();
        } // end if

        return self::$instance;
    }
  
    private function __construct() {
        $this->template_path = HB_ADDRESS_PLUGIN_DIR . '/admin/templates';
        $this->template_name = 'address_settings.tpl.php';
        $this->settings = array(
            'page_title' => __( 'Heartbeat Address Plugin Settings' ),
            'menu_title' => __( 'Heartbeat Address Settings' ),
            'menu_slug' => 'hb-address-setting-admin',
            'option_group' => 'hb_address_option_group',
            'capability' => 'manage_options',
            'option_name' => HB_ADDRESS_OPTION,
        );
        $this->register_menu();
    }

    private function register_menu() {
        add_action( 'admin_menu', array( $this, 'add_plugin_menu' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
        // add_action( 'admin_init', array( $this, 'setup_fields' ) );
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
        //Address Section
        add_settings_section(
            'hb_address_settings_section', // ID
            __( 'Heartbeat Address Settings' ), // Title
            array( $this, 'address_section_callback' ), // Callback
            $this->settings['menu_slug'] // Page
        );

        //Add Fields
        add_settings_field(
            'hb_address_option_id', // ID
            __( 'Address' ), // Title
            array( $this, '_address_id_callback' ), // Callback
            $this->settings['menu_slug'], // Page
            'hb_address_settings_section' // Section
        );

        register_setting(
            $this->settings['option_group'], // Option group
            'hb_address_option_id', // Option name
            array( $this, 'sanitize' )
        );

        //Add Fields
        add_settings_field(
            'hb_address_option_link_id', // ID
            __( 'Address Link' ), // Title
            array( $this, '_address_link_callback' ), // Callback
            $this->settings['menu_slug'], // Page
            'hb_address_settings_section' // Section
        );

        register_setting(
            $this->settings['option_group'], // Option group
            'hb_address_option_link_id', // Option name
            array( $this, 'sanitize' )
        );
    }

    // public function setup_fields() {
    //     $fields = array(
    //         array(
    //             'uid' => 'hb_address_field',
    //             'label' => 'Address',
    //             'section' => $this->settings['menu_slug'],
    //             'type' => 'text',
    //             'options' => false,
    //             'placeholder' => 'Address'
    //         ),
    //         array(
    //             'uid' => 'hb_address_link_field',
    //             'label' => 'Address Link',
    //             'section' => $this->settings['menu_slug'],
    //             'type' => 'text',
    //             'options' => false,
    //             'placeholder' => 'Address Link'
    //         )
    //     );
    //     foreach( $fields as $field ){
    //         add_settings_field( $field['uid'], $field['label'], array( $this, 'field_callback' ), $this->settings['menu_slug'], $field['section'], $field );
    //         register_setting( $this->settings['menu_slug'], $field['uid'] );
    //     }
    // }

    // public function field_callback( $arguments ) {
    //     $value = get_option( $arguments['uid'] ); // Get the current value, if there is one
    //     if( ! $value ) { // If no value exists
    //         $value = $arguments['default']; // Set to our default
    //     }

    //     // Check which type of field we want
    //     switch( $arguments['type'] ){
    //         case 'text': // If it is a text field
    //             printf( '<input name="%1$s" id="%1$s" type="%2$s" placeholder="%3$s" value="%4$s" />', $arguments['uid'], $arguments['type'], $arguments['placeholder'], $value );
    //             break;
    //     }
    // }

    /**
     * callback function for breadcrumbs calendar section
     */
    public function address_section_callback() {
        _e( 'Set address and link:' );
    }

    public function _address_id_callback() {
        $address = Heartbeat_Address_Api::get_address_option();
        require_once HB_ADDRESS_PLUGIN_DIR . '/admin/templates/field_address.tpl.php';
    }

    public function _address_link_callback() {
        $address_link = Heartbeat_Address_Api::get_address_link_option();
        require_once HB_ADDRESS_PLUGIN_DIR . '/admin/templates/field_address_link.tpl.php';
    }
    
}
