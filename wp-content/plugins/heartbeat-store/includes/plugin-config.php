<?php
/*
 * Site Prefix
 */
if( !defined( 'HEARTBEAT_STORE_PREFIX' ) ) {
  define( 'HEARTBEAT_STORE_PREFIX', 'str-' );
}

/*
 * Post Slugs
 */
if( !defined( 'HEARTBEAT_STORE_POST_SHOP_SLUG' ) ) {
  define( 'HEARTBEAT_STORE_POST_SHOP_SLUG', 'str-shop' );
}

if( !defined( 'HEARTBEAT_STORE_POST_DINE_SLUG' ) ) {
  define( 'HEARTBEAT_STORE_POST_DINE_SLUG', 'str-dine' );
}

/*
 * Plugin Directory
 */
if( !defined( 'HEARTBEAT_STORE_PLUGIN_DIR' ) ) {
  define( 'HEARTBEAT_STORE_PLUGIN_DIR', dirname( __FILE__ ) . '/..' );
}

/*
 * Event Listing Cache Time for calendar and featured items
 */
if( !defined( 'HEARTBEAT_STORE_CACHE_TIME' ) ) {
  define( 'HEARTBEAT_STORE_CACHE_TIME', 1800 ); //30 * 60
}

/*
 * Posts Options name in cms settings
 */
if( !defined( 'HEARTBEAT_STORE_OPTIONS_NAME' ) ) {
  define( 'HEARTBEAT_STORE_OPTIONS_NAME', 'str_options_name' ); //30 * 60
}