<?php

require_once dirname( __FILE__ ) . '/includes/theme-config.php';

/**
  * Spl autoloader function. If classname is heartbeat_theme_<folder1>_<folder2>,
  * it will try to include php file named class-heartbeat-theme-<folder1>-<folder2>
  * located in <pathtotheme>/<folder1>/<folder2>.
  *
  * @param String $class
  * @return boolean
  * @since 0.1.0
  */
function hb_register_autoloader( $class ) {
  $lower = strtolower( $class );
  if( strpos( $lower, 'heartbeat_' ) !== 0 ) {
    return;
  }

  $str_folder = str_replace( 'heartbeat_theme_', '', $lower );
  $directories = explode( '_', $str_folder );
  $relative_path_to_folder = implode( '/', $directories );
  $file = 'class-heartbeat-theme-' . implode( '-', $directories );
  $path_to_file = dirname( __FILE__ ) . '/' . $relative_path_to_folder . '/' . $file . '.php';

  if( file_exists( $path_to_file ) && !class_exists( $class ) ) {
    require_once( $path_to_file );
  }
}

spl_autoload_register( 'hb_register_autoloader' );
 
 /**
 *
 * @param String $path Path to template
 * @param Array $data Array containing all the data to be rendered. Should not have numeric keys.
 * @param type $echo  To echo the html or to return it as a string
 * @return mixed string containing html if echo is false and will print the content if echo is true.
 * @since 0.1.0
 */
function hb_theme_render( $slug, $name = null, $data = array(), $var_name = 'data', $echo = true ) {
  global $wp_query;
  
  $wp_query->query_vars[ $var_name ] = (object) $data;
  ob_start();
  get_template_part( $slug, $name );

  $out = ob_get_clean();
  if( $echo === true ) {
    echo $out;
  } else {
    return $out;
  }
}

/**
 *
 * @param String $path Path to template
 * @param Array $data Array containing all the data to be rendered. Should not have numeric keys.
 * @return String html to be rendered out
 * @since 0.1.0
 */
function hb_theme_parse( $slug, $name = null, $data = array(), $var_name = 'data' ) {
  return hb_theme_render( $slug, $name, $data, $var_name, false );
}

function hb_get_assets_url() {
  return THEME_URL . '/assets';
}

/**
 * Enqueue styles and scripts conditionally.
 * @since 0.1.0
 */
if( !function_exists( 'enqueue_hb_styles_and_scripts' ) ):
function enqueue_hb_styles_and_scripts() {
  
    //header styles and scripts scripts
    wp_enqueue_style( 'hb_main', ASSETS_URL . '/heartbeat/styles/main.css' );
    wp_enqueue_script( 'hb_modernizr', ASSETS_URL . '/heartbeat/vendor/modernizr.js', array(), false, false );

    //footer scripts
    wp_enqueue_script( 'hb_main', ASSETS_URL . '/heartbeat/scripts/main.js', array(), false, true );
}
endif;
add_action( 'wp_enqueue_scripts', 'enqueue_hb_styles_and_scripts' );


/**
 * Register widget areas
 * @since 0.1.0
 */
if( !function_exists( 'heartbeat_widgets_init' ) ):
function heartbeat_widgets_init() {
  
  register_sidebar( array(
      'name' => 'Masthead widget',
      'description' => __( 'Appears in all templates masthead section.' ),
      'id' => 'masthead_widget',
      'before_widget' => '',
      'after_widget' => '',
  ) );
  
  register_sidebar( array(
      'name' => 'Header Desktop Only widget',
      'description' => __( 'Appears in all templates header section. Displayed only in desktop' ),
      'id' => 'header_desktoponly_widget',
      'before_widget' => '<div class="desktop-only">',
      'after_widget' => '</div>',
  ) );
  
  register_sidebar( array(
      'name' => 'Header Mobile Only widget',
      'description' => __( 'Appears in all templates header section. Displayed only in mobile' ),
      'id' => 'header_mobileonly_widget',
      'before_widget' => '<div class="mobile-only">',
      'after_widget' => '</div>',
  ) );
  
  register_sidebar( array(
      'name' => 'Header Bottom widget',
      'description' => __( 'Appears in all templates header section. Displayed at the bottom of header.' ),
      'id' => 'header_bottom_widget',
      'before_widget' => '',
      'after_widget' => '',
  ) );
  
  register_sidebar( array(
      'name' => 'Footer Top widget',
      'description' => __( 'Appears in all templates footer top section' ),
      'id' => 'footer_top_widget',
      'before_widget' => '<div class="footer-logos">',
      'after_widget' => '</div>',
  ) );
  
  register_sidebar( array(
      'name' => 'Footer Middle widget',
      'description' => __( 'Appears in all templates footer middle section' ),
      'id' => 'footer_middle_widget',
      'before_widget' => '<!-- Footer middle item begins -->',
      'after_widget' => '<!-- Footer middle item ends -->',
  ) );
  
  register_sidebar( array(
      'name' => 'Footer Bottom widget',
      'description' => __( 'Appears in all templates footer bottom section' ),
      'id' => 'footer_bottom_widget',
      'before_widget' => '<!-- Footer bottom item begins -->',
      'after_widget' => '<!-- Footer bottom item ends -->',
  ) );
  
  register_sidebar( array(
      'name' => 'Breadcrumbs widget',
      'description' => __( 'Appears in all templates except homepage before title' ),
      'id' => 'breadcrumbs_widget',
      'before_widget' => '<section class="breadcrumb">',
      'after_widget' => '</section>',
  ) );
  
  register_sidebar( array(
      'name' => 'Home News and Events widget',
      'description' => __( 'Appears in homepage templates after shop and dine section' ),
      'id' => 'home_news_events_widget',
      'before_widget' => '<!-- Home News and Events section widget begins -->',
      'after_widget' => '<!-- Home News and Events section widget ends -->',
  ) );

  register_sidebar( array(
      'name' => 'Upcoming Events widget',
      'description' => __( 'Appears in other templates' ),
      'id' => 'hb_upcoming_events_widget',
      'before_widget' => '<section class="section--mtb"><div class="container"><div class="row">',
      'after_widget' => '</div></div></section>',
  ) );

  register_sidebar( array(
      'name' => 'Recent News widget',
      'description' => __( 'News that appears in other templates' ),
      'id' => 'hb_news_widget',
      'before_widget' => '<section class="section--mts"><div class="container"><div class="row">',
      'after_widget' => '</div></div></section>',
  ) );

}
endif;

add_action( 'widgets_init', 'heartbeat_widgets_init' );

/**
 * Register menus
 * @since 0.1.0
 */
function register_heartbeat_menus() {
  register_nav_menus( array(
      'primary' => __( 'Primary Menu' ),
      'legal' => __( 'Legal Menu' ),
      'social' => __( 'Social Links Menu' ),
      'quick' => __( 'Quick Links Menu' ),
  ) );
}
add_action( 'after_setup_theme', 'register_heartbeat_menus' );


/**
 * Add menu icon class
 * @since 0.1.0
 */
function hb_theme_update_custom_nav_fields( $menu_id, $menu_item_db_id, $args ) {
  if ( is_array( $_REQUEST['menu-item-icon-class']) ) {
      $icon_class_value = $_REQUEST['menu-item-icon-class'][$menu_item_db_id];
      update_post_meta( $menu_item_db_id, '_menu_item_icon_class', $icon_class_value );
  }
}
add_action( 'wp_update_nav_menu_item', 'hb_theme_update_custom_nav_fields', 10, 3 );

function hb_theme_add_custom_nav_fields( $menu_item ) {
  $menu_item->icon_class = get_post_meta( $menu_item->ID, '_menu_item_icon_class', true );
  return $menu_item;
}
add_filter( 'wp_setup_nav_menu_item', 'hb_theme_add_custom_nav_fields' );

// Walker to add icon class to wordpress admin
function hb_theme_edit_walker( $walker, $menu_id ) {
  return 'Heartbeat_Theme_Components_Shared_Navigation_Walkers_Admin';
}
add_filter( 'wp_edit_nav_menu_walker', 'hb_theme_edit_walker', 10, 2 );

// Add icon to title and add span outside title based on arguments
function hb_theme_nav_menu_item_title( $title, $item, $args, $depth ) {
  if( !empty( $args->hide_item_title ) ) {
    $title = '<span class="visuallyhidden">' . $title . '</span>';
  }
  if( !empty( $args->is_quick_link ) ) {
    $title = '<span>' . $title . '</span>';
  }
  if( !empty( $item->icon_class ) && !empty( $args->show_icons_after_title ) ) {
    $title .= '<i class="' . $item->icon_class . '"></i>';
  }
  if( !empty( $item->icon_class ) && !empty( $args->show_icons_before_title ) ) {
    $title = '<i class="icon ' . $item->icon_class . '"></i>' . $title;
  }
  return $title; 
}; 
         
add_filter( 'nav_menu_item_title', 'hb_theme_nav_menu_item_title', 10, 4 );

// Add social-media__item class to all anchor tags if add_social_item_class is not empty
function hb_menu_add_social_menu_class( $atts, $item, $args ) {
  $class = '';
  if( !empty( $args->add_social_item_class ) ) {
    $class = 'social-media__item';
  }
  else if( !empty( $args->is_quick_link ) ){
    $class = 'shortcut__item';
  }
  else {
    $class = 'nav__item';
  }
  $atts['class'] = $class;
  return $atts;
}
add_filter( 'nav_menu_link_attributes', 'hb_menu_add_social_menu_class', 10, 3 );

/**
 * Parses the html of given sidebar
 * 
 * @param string $sidebar
 * @return string
 * @since 0.1.0
 */
function hb_parse_sidebar( $sidebar ) {
  $html = '';
  if( is_active_sidebar( $sidebar ) ) {
    ob_start();
    dynamic_sidebar( $sidebar );
    $html = ob_get_clean();
  }
  return $html;
}

/**
 * Add custom posts to theme rss
 * @since 0.1.0
 */
function hb_rss_update( $request ) {
    if ( isset( $request['feed'] ) ) {
      $args = array(
          'public' => true,
      );
      $request['post_type'] = get_post_types( $args );
    }
    return $request;
}
add_filter( 'request', 'hb_rss_update' );

add_filter( 'search_rewrite_rules', 'cwp_search_rewrite_rules' );
function cwp_search_rewrite_rules( $search_rewrite_rules )
{
    global $wp_rewrite;
    $wp_rewrite->add_rewrite_tag( '%post_type%', '([^/]+)', 'post_type=' );
    $search_structure = $wp_rewrite->get_search_permastruct();
    return $wp_rewrite->generate_rewrite_rules( $search_structure . '/section/%post_type%', EP_SEARCH );
}

/**
 * Register template fields
 */
add_action( 'init', array( 'Heartbeat_Theme_Components_Pages_Home', 'register_fields' ) );
add_action( 'init', array( 'Heartbeat_Theme_Components_Pages_Standard', 'register_fields' ) );
/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length( $length ) {
  return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

remove_action('wp_head', 'wp_generator');

add_filter( 'style_loader_src',  'sdt_remove_ver_css_js', 9999, 2 );
add_filter( 'script_loader_src', 'sdt_remove_ver_css_js', 9999, 2 );

function sdt_remove_ver_css_js( $src, $handle ) 
{
    $handles_with_version = array( 'style' ); // <-- Adjust to your needs!

    if ( strpos( $src, 'ver=' ) && ! in_array( $handle, $handles_with_version, true ) )
        $src = remove_query_arg( 'ver', $src );

    return $src;
}

function parse_external_url( $url ) {

    // Abort if parameter URL is empty
    if( empty($url) ) {
        return false;
    }

    // Parse home URL and parameter URL
    $link_url = parse_url( $url );
    $home_url = parse_url( home_url() );  // Works for WordPress

    // Decide on target
    if( $link_url['host'] == $home_url['host'] ) {
        // Is an internal link
        $target = '_self';

    } else {
        // Is an external link
        $target = '_blank';
    }

    // Return array
    $output = array(
        'target'    => $target,
        'url'       => $url
    );
    return $output;
}

/*
 * Only allow Admin users to view WP REST API JSON Endpoints
 */
function hb_only_allow_logged_in_rest_access( $access ) {
  if( ! is_user_logged_in() || ! current_user_can( 'manage_options' ) ) {
    return new WP_Error( 'rest_cannot_access', __( 'Only authenticated users can access the REST API.', 'disable-json-api' ), array( 'status' => rest_authorization_required_code() ) );
  }
  return $access;
}
add_filter( 'rest_authentication_errors', 'hb_only_allow_logged_in_rest_access' );

function custom_error_pages()
{
    global $wp_query;
 
    if(isset($_REQUEST['status']) && $_REQUEST['status'] == 403)
    {
        $wp_query->is_404 = FALSE;
        $wp_query->is_page = FALSE;
        $wp_query->is_singular = FALSE;
        $wp_query->is_single = FALSE;
        $wp_query->is_home = FALSE;
        $wp_query->is_archive = FALSE;
        $wp_query->is_category = FALSE;
        add_filter('wp_title','custom_error_title',65000,2);
        add_filter('body_class','custom_error_class');
        status_header(403);
        get_template_part('403');
        exit;
    }
 
    if(isset($_REQUEST['status']) && $_REQUEST['status'] == 401)
    {
        $wp_query->is_404 = FALSE;
        $wp_query->is_page = FALSE;
        $wp_query->is_singular = FALSE;
        $wp_query->is_single = FALSE;
        $wp_query->is_home = FALSE;
        $wp_query->is_archive = FALSE;
        $wp_query->is_category = FALSE;
        add_filter('wp_title','custom_error_title',65000,2);
        add_filter('body_class','custom_error_class');
        status_header(401);
        get_template_part('401');
        exit;
    }
}
 
function custom_error_title($title='',$sep='')
{
    if(isset($_REQUEST['status']) && $_REQUEST['status'] == 403)
        return "Forbidden ".$sep." ".get_bloginfo('name');
 
    if(isset($_REQUEST['status']) && $_REQUEST['status'] == 401)
        return "Unauthorized ".$sep." ".get_bloginfo('name');
}
 
function custom_error_class($classes)
{
    if(isset($_REQUEST['status']) && $_REQUEST['status'] == 403)
    {
        $classes[]="error403";
        return $classes;
    }
 
    if(isset($_REQUEST['status']) && $_REQUEST['status'] == 401)
    {
        $classes[]="error401";
        return $classes;
    }
}
 
add_action('wp','custom_error_pages');

function hb_filter_location( $location, $status ) {
  if($status == 301) {
    $split = explode('?', $location);

    if(!empty($split[1])) {
      $params = urlencode($split[1]);

      $location = $split[0] . $params;
      return $location;
    }
  }

  return $location;
}
add_filter( 'wp_redirect', 'hb_filter_location', 10, 2 );