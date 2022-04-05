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
if( !defined('HB_NEWS_PLUGIN_DIR') ) {
	define( 'HB_NEWS_PLUGIN_DIR', dirname( __FILE__ ) . '/..' );
}

/**
 * Plugin Directory
 */
if( !defined('HB_NEWS_SLUG') ) {
	define( 'HB_NEWS_SLUG', 'hb-news' );
}

/*
 * NEWS Listing Cache Time for featured items
 */
if( !defined( 'HB_NEWS_CACHE_TIME' ) ) {
	define( 'HB_NEWS_CACHE_TIME', 1800 ); //30 * 60
}

/**
 * NEWS Options name in cms settings
 */
if( !defined( 'HB_NEWS_OPTIONS_NAME' ) ) {
  	define( 'HB_NEWS_OPTIONS_NAME', 'hb_news_options_name' );
}