<?php

/*
  Plugin Name: Heartbeat Feedback Plugin
  Description: Bespoke Plugin to create feedback functionalities
  Version: 0.1.0
  Author: Adehbhi Digital
  Author URI: http://www.adehbhi.digital/
 */
require_once dirname( __FILE__ ) . '/includes/plugin-config.php';
require_once dirname( __FILE__ ) . '/vendor/autoload.php';

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

if( !class_exists( 'Heartbeat_Feedback' ) ) :

  class Heartbeat_Feedback {

    public $settings;
    
    protected static $instance;

    /**
     * Returns an instance of this class. An implementation of the singleton design pattern.
     *
     * @return   Heartbeat_Feedback    A reference to an instance of this class.
     * @since    0.1.0
     */
    public static function get_instance() {

      if( null == self::$instance ) {
        self::$instance = new Heartbeat_Feedback();
      } // end if

      return self::$instance;
    }

    private function __construct() {
      $this->settings = array(
          'prefix' => 'heartbeat_feedback_',
          // urls
          'basename' => plugin_basename( __FILE__ ),
          'path' => dirname( __FILE__ ),
          'dir' => plugin_dir_url( __FILE__ ),
      );
      spl_autoload_register( array( $this, 'register_autoloader' ) );
      
      $this->init_widgets();
    }

    /**
     * Spl autoloader function. If classname is heartbeat_feedback_<folder1>_<folder2>,
     * it will try to include php file named class-heartbeat-feedback-<folder1>-<folder2>
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
      $file = 'class-heartbeat-feedback-' . implode( '-', $directories );
      $path_to_file = $this->settings['path'] . '/' . $relative_path_to_folder . '/' . $file . '.php';

      if( file_exists( $path_to_file ) && !class_exists( $class ) ) {
        require_once( $path_to_file );
      }
    }
    
    private function init_widgets() {
      add_action( 'widgets_init', array( $this, 'register_widgets' ) );
    }

    function register_widgets() {
      register_widget( 'Heartbeat_Feedback_Widget' );
    }

  }

  endif;

$heartbeat_feedback = Heartbeat_Feedback::get_instance();