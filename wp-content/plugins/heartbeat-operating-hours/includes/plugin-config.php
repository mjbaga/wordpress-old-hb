<?php

/*
 * Site Prefix
 */
if( !defined( 'HEARTBEAT_SITE_PREFIX' ) ) {
	define( 'HEARTBEAT_SITE_PREFIX', 'hb-' );
}

/*
 * Plugin Directory
 */
if( !defined( 'HB_OPERATING_HOURS_PLUGIN_DIR' ) ) {
	define( 'HB_OPERATING_HOURS_PLUGIN_DIR', dirname( __FILE__ ) . '/..' );
}

/*
 * Operating Hours Options name in cms settings
 */
if( !defined( 'HB_OPERATING_HOURS_OPTIONS_NAME' ) ) {
	define( 'HB_OPERATING_HOURS_OPTIONS_NAME', 'hb_operating_hours_options_name' );
}