<?php

/**
 * Site Prefix
 */
if( !defined('HEARTBEAT_SITE_PREFIX') ) {
	define( 'HEARTBEAT_SITE_PREFIX', 'hb-' );
}

/**
 * Plugin Directory
 */
if( !defined('HB_EVENT_PLUGIN_DIR') ) {
	define( 'HB_EVENT_PLUGIN_DIR', dirname( __FILE__ ) . '/..' );
}

/**
 * Site Prefix
 */
if( !defined('HEARTBEAT_EVENT_SLUG') ) {
	define( 'HEARTBEAT_EVENT_SLUG', 'hb-event' );
}

/*
 * Event Listing Cache Time for featured items
 */
if( !defined( 'HB_EVENT_CACHE_TIME' ) ) {
	define( 'HB_EVENT_CACHE_TIME', 1800 ); //30 * 60
}

/**
 * Event Options name in cms settings
 */
if( !defined( 'HB_EVENTS_OPTIONS_NAME' ) ) {
  	define( 'HB_EVENTS_OPTIONS_NAME', 'hb_events_options_name' );
}