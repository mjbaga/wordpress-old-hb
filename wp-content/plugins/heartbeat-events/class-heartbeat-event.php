<?php

/*
	Plugin Name: Heartbeat Events Plugin
	Description: Bespoke Plugin to create event functionalities to display across website
	Version: 1.0
	Author: Adelphi Digital
	Author URI: http://www.adelphi.digial/
 */

require_once dirname( __FILE__ ) . '/includes/plugin-config.php';
require_once dirname( __FILE__ ) . '/vendor/autoload.php';
if( !class_exists( 'Page_Template_Plugin' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/tommcfarlin/page-template-example/class-page-template-example.php';
}

if( !defined('ABSPATH') )
	die('Access denied.');

class Heartbeat_Event
{

	public $settings;

	protected static $instance;

	/**
	 * Returns an instance of this class. An implementation of the singleton design pattern.
	 *
	 * @return   Heartbeat_Event    A reference to an instance of this class.
	 * @since    0.1.0
	 */
	public static function get_instance() 
	{
		if( null == self::$instance ) {
			self::$instance = new Heartbeat_Event();
		}

		return self::$instance;
	}

	private function __construct()
	{
		$this->settings = array(
				'prefix' => 'heartbeat_event_',
				// urls
				'basename' => plugin_basename( __FILE__ ),
				'path' => dirname( __FILE__ ),
				'dir' => plugin_dir_url( __FILE__ ),
			);

		spl_autoload_register( array( $this, 'register_autoloader' ) );

		$this->init_custom_posts();
		$this->init_widgets();
		$this->init_page_templates();
		$this->init_custom_admin_settings();
	}

	/**
	 * Spl autoloader function. If classname is heatbeat_event_<folder1>_<folder2>,
	 * it will try to include php file named class-heartbeat-event-<folder1>-<folder2>
	 * located in <pathtpplugin>/<folder1>/<folder2>.
	 *
	 * @param String $class
	 * @return boolean
	 */
	function register_autoloader( $class ) 
	{
		$lower = strtolower( $class );
		if( strpos( $lower, $this->settings['prefix'] ) !== 0 ) {
			return;
		}

		$str_folder = str_replace( $this->settings['prefix'], '', $lower );
		$directories = explode( '_', $str_folder );
		$relative_path_to_folder = implode( '/', $directories );
		$file = 'class-heartbeat-event-' . implode( '-', $directories );
		$path_to_file = $this->settings['path'] . '/' . $relative_path_to_folder . '/' . $file . '.php';

		if( file_exists( $path_to_file ) && !class_exists( $class ) ) {
			require_once( $path_to_file );
		}
	}

	function init_custom_posts() 
	{
    	$event = Heartbeat_Event_Posts_Event::get_instance();
    }

    private function init_widgets() 
    {
    	add_action( 'widgets_init', array( $this, 'register_widgets' ) );
    }

    function register_widgets() 
    {
    	register_widget( 'Heartbeat_Event_Widgets' );
    }

    function init_custom_admin_settings() 
    {
		$admin_settings = Heartbeat_Event_Admin::get_instance();
    }

    function init_page_templates() 
    {
		$page_templates = Heartbeat_Event_Pages_Listing::get_instance();
    }
}

$heartbeat_event = Heartbeat_Event::get_instance();