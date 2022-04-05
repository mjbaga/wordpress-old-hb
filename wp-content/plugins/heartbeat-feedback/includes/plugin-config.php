<?php
/*
 * Site Prefix
 */
if( !defined( 'HEARTBEAT_SITE_PREFIX' ) ) {
  define( 'HEARTBEAT_SITE_PREFIX', 'hb_' );
}

/*
 * Plugin Directory
 */
if( !defined( 'HB_FEEDBACK_PLUGIN_DIR' ) ) {
  define( 'HB_FEEDBACK_PLUGIN_DIR', dirname( __FILE__ ) . '/..' );
}

/*
 * Feedback Options name in cms settings
 */
if( !defined( 'HB_FEEDBACK_OPTIONS_NAME' ) ) {
  define( 'HB_FEEDBACK_OPTIONS_NAME', 'hb_feedback_options_name' );
}

/*
 * Subscribe widget cache time
 */
if( !defined( 'HB_FEEDBACK_CACHE_TIME' ) ) {
  define( 'HB_FEEDBACK_CACHE_TIME', 1800 ); //60 * 30
}