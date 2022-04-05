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
if( !defined('HB_PARTER_LOGOS_PLUGIN_DIR') ) {
	define( 'HB_PARTER_LOGOS_PLUGIN_DIR', dirname( __FILE__ ) . '/..' );
}

/**
 * Plugin Directory
 */
if( !defined('HB_PARTER_LOGOS_SLUG') ) {
	define( 'HB_PARTER_LOGOS_SLUG', 'hb-parter-logo' );
}

/*
 * NEWS Listing Cache Time for featured items
 */
if( !defined( 'HB_PARTER_LOGOS_CACHE_TIME' ) ) {
	define( 'HB_PARTER_LOGOS_CACHE_TIME', 1800 ); //30 * 60
}