<?php

/*
	Plugin Name: Heartbeat Operating Hours Plugin
	Description: Bespoke Plugin to control the shown operating hours of mall
	Version: 1.0
	Author: Adelphi Digital
	Author URI: http://www.adelphi.digial/
 */

require_once dirname( __FILE__ ) . '/includes/plugin-config.php';
require_once dirname( __FILE__ ) . '/vendor/autoload.php';

if( !defined('ABSPATH') )
	die('Access denied.');

class Heartbeat_Operating_Hours
{

	public $settings;

	protected static $instance;

	/**
	 * Returns an instance of this class. An implementation of the singleton design pattern.
	 *
	 * @return   Heartbeat_Operating_Hours    A reference to an instance of this class.
	 * @since    0.1.0
	 */
	public static function get_instance() 
	{
		if( null == self::$instance ) {
			self::$instance = new Heartbeat_Operating_Hours();
		}

		return self::$instance;
	}

	private function __construct()
	{
		$this->settings = array(
				'prefix' => 'heartbeat_operating_hours_',
				// urls
				'basename' => plugin_basename( __FILE__ ),
				'path' => dirname( __FILE__ ),
				'dir' => plugin_dir_url( __FILE__ ),
			);

		add_filter( 'acf/settings/path', array( $this, 'update_acf_settings_path' ) );
		add_filter( 'acf/settings/dir', array( $this, 'update_acf_settings_dir' ) );

		spl_autoload_register( array( $this, 'register_autoloader' ) );

		$this->init_widgets();
		$this->init_custom_admin_settings();
	}

	/**
	 * Spl autoloader function. If classname is heatbeat_News_<folder1>_<folder2>,
	 * it will try to include php file named class-heartbeat-news-<folder1>-<folder2>
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
		$file = 'class-heartbeat-operating-hours-' . implode( '-', $directories );
		$path_to_file = $this->settings['path'] . '/' . $relative_path_to_folder . '/' . $file . '.php';

		if( file_exists( $path_to_file ) && !class_exists( $class ) ) {
			require_once( $path_to_file );
		}
	}

    private function init_widgets() 
    {
    	add_action( 'widgets_init', array( $this, 'register_widgets' ) );
    }

    function register_widgets() 
    {
    	register_widget( 'Heartbeat_Operating_Hours_Widget' );
    }

    function init_custom_admin_settings() 
    {
		$admin_settings = Heartbeat_Operating_Hours_Admin::get_instance();
    }

    public function update_acf_settings_path( $path ) 
    {
    	$path = dirname(dirname( __FILE__ )) . '/advanced-custom-fields-pro/';
    	return $path;
    }

    public function update_acf_settings_dir( $dir ) 
    {
    	$dir = plugin_dir_url(dirname(__FILE__)) . '/advanced-custom-fields-pro/';
    	return $dir;
    }

}

$heartbeat_news = Heartbeat_Operating_Hours::get_instance();