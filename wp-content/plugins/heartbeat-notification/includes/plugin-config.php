<?php

/*
 * Plugin Directory
 */
if( !defined( 'HB_NOTIFICATION_PLUGIN_DIR' ) ) {
  define( 'HB_NOTIFICATION_PLUGIN_DIR', dirname( __FILE__ ) . '/..' );
}

/*
 * Notification Options name in cms settings
 */
if( !defined( 'HB_NOTIFICATION_OPTIONS_NAME' ) ) {
  define( 'HB_NOTIFICATION_OPTIONS_NAME', 'hb_notification_options_name' );
}

/*
 * Subscribe widget cache time
 */
if( !defined( 'HB_NOTIFICATION_CACHE_TIME' ) ) {
  define( 'HB_NOTIFICATION_CACHE_TIME', 1800 ); //60 * 30
}