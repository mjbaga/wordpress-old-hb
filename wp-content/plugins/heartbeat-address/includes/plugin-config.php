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
if( !defined( 'HB_ADDRESS_PLUGIN_DIR' ) ) {
	define( 'HB_ADDRESS_PLUGIN_DIR', dirname( __FILE__ ) . '/..' );
}

/*
 * Address options name in cms settings
 */
if( !defined( 'HB_ADDRESS_OPTION' ) ) {
	define( 'HB_ADDRESS_OPTION', 'hb_address_option' );
}