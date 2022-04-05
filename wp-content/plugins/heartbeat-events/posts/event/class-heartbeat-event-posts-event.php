<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * This class declares event post type and all its fields.
 *
 * @author mjdbaga@gmail.com
 */
class Heartbeat_Event_Posts_Event {

    private static $instance;
    private $slug;
    private $label;

    /**
    * Returns an instance of this class. An implementation of the singleton design pattern.
    *
    * @return   Hearbeat_Event_Posts_Event    A reference to an instance of this class.
    * @since    1.0.0
    */
    public static function get_instance() {

        if( null == self::$instance ) {
            self::$instance = new Heartbeat_Event_Posts_Event();
        } // end if

        return self::$instance;
    }

    function __construct() {
        $this->slug = HEARTBEAT_EVENT_SLUG;
        $this->label = __( 'Events' );

        add_action( 'init', array( $this, 'init_post' ) );
        add_action( 'init', array( $this, 'register_fields' ) );
        add_action( 'init', array( $this, 'init_event_template' ) );
        add_action( 'save_post', array( $this, 'generate_ics_file' ), 10, 3 );
        add_filter( 'acf/validate_value/name=event_end_date', array( $this, 'hb_event_validate_enddate' ), 10, 4);
        add_filter( 'acf/validate_value/name=event_end_time', array( $this, 'hb_event_validate_endtime' ), 10, 4);
    }

    function init_post() {
        $args = array(
            'label' => $this->label,
            'public' => TRUE,
            'rewrite' => array( 'slug' => 'events-listing' ),
            'supports' => array(
                'title',
                'thumbnail',
                'excerpt',
                'editor'
            )
        );
        register_post_type( $this->slug, $args );
    }

    /**
    * Initiate the single template for event post
    */
    function init_event_template() {
        //add template
        add_filter( 'single_template', array( $this, '_heartbeat_event_single_template' ), 10, 1 );
    }

    /**
    * Callback for single template filter for event post type
    * 
    * @param string $single_template
    * @return string
    */
    function _heartbeat_event_single_template( $single_template ) {
        $object = get_queried_object();

        if( $object->post_type != $this->slug ) {
            return $single_template;
        }

        $single_type_name_template = locate_template( "single-{$object->post_type}-{$object->post_name}.php" );
        $single_type_template = locate_template( "single-{$object->post_type}.php" );

        if( $single_type_name_template ) {
            return $single_type_name_template;
        } else if( $single_type_template ) {
            return $single_type_template;
        } else {
            $single_template = HB_EVENT_PLUGIN_DIR . '/post_templates/single-' . $this->slug . '.php';
            return $single_template;
        }
    }
    
    function generate_ics_file( $post_id, $post_object, $update ) {
      if( $post_object->post_type != HEARTBEAT_EVENT_SLUG ) {
        return;
      }
      global $post;
      
      $wp_upload_dir = wp_upload_dir();
      $file_directory = $wp_upload_dir['basedir'] . DIRECTORY_SEPARATOR . 'ics-files';
      $filename = $file_directory . DIRECTORY_SEPARATOR . 'event-' . $post_id . '.ics';
      
      $offset = get_option('gmt_offset');
      $offset_multiplier = $offset * 100;
      
      $post = $post_object;
      
      setup_postdata( $post );
      $data = Heartbeat_Event_Api::get_ical_event_details_in_loop();
      $data['site_name'] = get_bloginfo('name');
      $data['timezone'] = get_option('timezone_string');
      $data['offset'] = sprintf( "%05d", $offset_multiplier );
      wp_reset_postdata();
      
      $content = Heartbeat_Event_Api::parse( 'ics', 'event', $data );
      file_put_contents( $filename, $content );
    }

    /**
     * Validates event end date to be greater than event start date
     */
    public function hb_event_validate_enddate( $valid, $value, $field, $input ) {
        if( !$valid ) {
            return $valid;
        }

        $event_start_date = 'field_591523d91610e';

        if($value < $_POST['acf'][$event_start_date]) {
            $valid = 'End date must be greater than start date';
        }        

        return $valid;
    }

    /**
     * Validates event end time to be greater than event start time for events of the same day
     */
    public function hb_event_validate_endtime( $valid, $value, $field, $input ) {
        if( !$valid ) {
            return $valid;
        }

        $event_start_date = 'field_591523d91610e';
        $event_end_date = 'field_5915241616110';
        $event_start_time = 'field_591523f81610f';

        if($_POST['acf'][$event_start_date] == $_POST['acf'][$event_end_date]) {
            
            if($value < $_POST['acf'][$event_start_time]) {
                $valid = 'Event end time must be greater than event start time for events on the same day.';
            }

        }

        return $valid;
    }

    function register_fields() {
        
        if( function_exists( 'acf_add_local_field_group' ) ):

            acf_add_local_field_group( array(
                "key" => "group_591523cf3f5c6",
                "title" => "Post - Event",
                "fields" => array(
                    array(
                        "key" => "field_59155920678d7",
                        "label" => "Page Banner",
                        "name" => "page_banner",
                        "type" => "image",
                        "instructions" => "",
                        "required" => 0,
                        "conditional_logic" => 0,
                        "wrapper" => array(
                            "width" => "",
                            "class" => "",
                            "id" => ""
                        ),
                        "return_format" => "array",
                        "preview_size" => "thumbnail",
                        "library" => "all",
                        "min_width" => "",
                        "min_height" => "",
                        "min_size" => "",
                        "max_width" => "",
                        "max_height" => "",
                        "max_size" => "",
                        "mime_types" => ""
                    ),
                    array(
                        "key" => "field_591523d91610e",
                        "label" => "Event Start Date",
                        "name" => "event_start_date",
                        "type" => "date_picker",
                        "instructions" => "",
                        "required" => 1,
                        "conditional_logic" => 0,
                        "wrapper" => array(
                            "width" => "",
                            "class" => "",
                            "id" => ""
                        ),
                        "display_format" => "d/m/Y",
                        "return_format" => "d/m/Y",
                        "first_day" => 1
                    ),
                    array(
                        "key" => "field_591523f81610f",
                        "label" => "Event Start Time",
                        "name" => "event_start_time",
                        "type" => "time_picker",
                        "instructions" => "",
                        "required" => 0,
                        "conditional_logic" => 0,
                        "wrapper" => array(
                            "width" => "",
                            "class" => "",
                            "id" => ""
                        ),
                        "display_format" => "g:i a",
                        "return_format" => "g:i a"
                    ),
                    array(
                        "key" => "field_5915241616110",
                        "label" => "Event End Date",
                        "name" => "event_end_date",
                        "type" => "date_picker",
                        "instructions" => "",
                        "required" => 1,
                        "conditional_logic" => 0,
                        "wrapper" => array(
                            "width" => "",
                            "class" => "",
                            "id" => ""
                        ),
                        "display_format" => "d/m/Y",
                        "return_format" => "d/m/Y",
                        "first_day" => 1
                    ),
                    array(
                        "key" => "field_5915242a16111",
                        "label" => "Event End Time",
                        "name" => "event_end_time",
                        "type" => "time_picker",
                        "instructions" => "",
                        "required" => 0,
                        "conditional_logic" => 0,
                        "wrapper" => array(
                            "width" => "",
                            "class" => "",
                            "id" => ""
                        ),
                        "display_format" => "g:i a",
                        "return_format" => "g:i a"
                    ),
                    array(
                        "key" => "field_591527a016114",
                        "label" => "Event Venue",
                        "name" => "event_venue",
                        "type" => "text",
                        "instructions" => "",
                        "required" => 0,
                        "conditional_logic" => 0,
                        "wrapper" => array(
                            "width" => "",
                            "class" => "",
                            "id" => ""
                        ),
                        "default_value" => "",
                        "placeholder" => "",
                        "prepend" => "",
                        "append" => "",
                        "maxlength" => ""
                    ),
                    array(
                        "key" => "field_5915243c16112",
                        "label" => "Sign Up Link",
                        "name" => "sign_up_link",
                        "type" => "url",
                        "instructions" => "",
                        "required" => 0,
                        "conditional_logic" => 0,
                        "wrapper" => array(
                            "width" => "",
                            "class" => "",
                            "id" => ""
                        ),
                        "default_value" => "",
                        "placeholder" => ""
                    ),
                ),
                "location" => array(
                    array(
                        array(
                            "param" => "post_type",
                            "operator" => "==",
                            "value" => HEARTBEAT_EVENT_SLUG
                        )
                    )
                ),
                "menu_order" => 0,
                "position" => "normal",
                "style" => "default",
                "label_placement" => "top",
                "instruction_placement" => "label",
                "hide_on_screen" => array(
                    "custom_fields",
                    "discussion",
                    "comments",
                    "author",
                    "format",
                    "categories",
                    "send-trackbacks"
                ),
                "active" => 1,
                "description" => ""
            ) );
        endif;

    }

}
