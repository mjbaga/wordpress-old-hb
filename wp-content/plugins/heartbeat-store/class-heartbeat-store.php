<?php

/*
  Plugin Name: Heartbeat Store Plugin
  Description: Bespoke Plugin to declare store post types.
  Version: 0.1.0
  Author: Adelphi Digital
  Author URI: http://www.adelphi.digital/
 */
require_once dirname( __FILE__ ) . '/includes/plugin-config.php';

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

if( !class_exists( 'Heartbeat_Store' ) ) :

  class Heartbeat_Store {

    public $settings;
    protected static $instance;

    /**
     * Returns an instance of this class. An implementation of the singleton design pattern.
     *
     * @return   Heartbeat_Store    A reference to an instance of this class.
     * @since    0.1.0
     */
    public static function get_instance() {

      if( null == self::$instance ) {
        self::$instance = new Heartbeat_Store();
      } // end if

      return self::$instance;
    }

    private function __construct() {
      $this->settings = array(
          'prefix' => 'heartbeat_store_',
          // urls
          'basename' => plugin_basename( __FILE__ ),
          'path' => dirname( __FILE__ ),
          'dir' => plugin_dir_url( __FILE__ ),
      );
      spl_autoload_register( array( $this, 'register_autoloader' ) );

      //register_activation_hook( __FILE__, array( $this, 'heartbeat_store_activate' ) );
      //register_activation_hook( __FILE__, array( $this, 'heartbeat_store_deactivate' ) );

      $this->init_custom_posts();

      add_action( 'init', array( 'Heartbeat_Store_Posts_Base', 'register_fields' ) );
    }

    /**
     * On Activation, allow all custom post types to be instantiated.
     */
    function heartbeat_store_activate() {
      //add_option( '', $post_types );
    }

    /**
     * On Deactivation, allow all custom post types to be instantiated.
     */
    function heartbeat_store_deactivate() {
      //add_option( '', $post_types );
    }

    /**
     * Spl autoloader function. If classname is adelphi_post_<folder1>_<folder2>,
     * it will try to include php file named class-adelphi-post-<folder1>-<folder2>
     * located in <pathtpplugin>/<folder1>/<folder2>.
     *
     * @param String $class
     * @return boolean
     */
    function register_autoloader( $class ) {
      $lower = strtolower( $class );
      if( strpos( $lower, $this->settings['prefix'] ) !== 0 ) {
        return;
      }

      $str_folder = str_replace( $this->settings['prefix'], '', $lower );
      $directories = explode( '_', $str_folder );
      $relative_path_to_folder = implode( '/', $directories );
      $file = 'class-heartbeat-store-' . implode( '-', $directories );
      $path_to_file = $this->settings['path'] . '/' . $relative_path_to_folder . '/' . $file . '.php';

      if( file_exists( $path_to_file ) && !class_exists( $class ) ) {
        require_once( $path_to_file );
      }
    }

    function init_custom_posts() {
      /**
       * @Todo: get custom post types from options
       */
      $custom_post_types = array(
          'dine' => 'Dine',
          'shop' => 'Shop',
      );
      foreach( $custom_post_types as $slug => $type ) {
        $class = 'Heartbeat_Store_Posts_' . $type;
        $$slug = $class::get_instance();
      }
    }

  }

  endif;

$heartbeat_store = Heartbeat_Store::get_instance();

