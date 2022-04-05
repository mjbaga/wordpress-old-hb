<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Heartbeat_Event_Widgets_Featured to display featured events
 *
 * @author mjdbaga@gmail.com
 */

class Heartbeat_Event_Widgets extends WP_Widget
{
	protected $widget_slug;
	protected $widget_template_slug;
	protected $widget_template_name;
	protected $form_template_path;

	public function __construct()
	{
		$this->widget_slug = 'hb_event_widget';
		$this->widget_template_slug = 'widget';
		$this->widget_template_name = 'upcoming-event';
		$this->form_template_path = HB_EVENT_PLUGIN_DIR . '/templates/form-upcoming-event.tpl.php';

		add_action( 'save_post_' . HEARTBEAT_EVENT_SLUG, array( $this, 'flush_widget_cache' ) );
		add_action( 'deleted_post', array( $this, 'flush_widget_cache' ) );
		add_action( 'switch_theme', array( $this, 'flush_widget_cache' ) );
		parent::__construct(
		        $this->widget_slug, // Base ID
		        __( 'Upcoming Events Widget', $this->widget_slug ), // Name
		        array( 'description' => __( 'A widget to display upcoming events.', $this->widget_slug ), ) // Args
		);
	}


	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		echo $this->parse_widget( $instance );
		echo $args['after_widget'];
	}

	/**
	 *
	 * @param type $instance instance of this widget specified in widget area.
	 * @return String html for all the sideposts to be rendered. Returns from cache if cache exists.
	 */
	public function parse_widget( $instance ) {
		$cache_key = $this->id;
		$cache = get_transient( $cache_key );
		$cache_time = HB_EVENT_CACHE_TIME; 

		if( $cache ) {
			return $cache;
		}

		$number_of_items = $instance['number_of_items_name'];

		global $post;

		$events = Heartbeat_Event_Api::get_upcoming_events( $number_of_items );

		$event_data = array();

		$class = $number_of_items > 2 ? 'col-md-12 event-section--four' : 'col-md-6 event-section--two';

		$event_data['title'] = $instance['title_name'];
		$event_data['class'] = $class;

		foreach( $events as $post ) {
			setup_postdata( $post );
			$event_data['events'][] = Heartbeat_Event_Api::get_upcoming_event_details_in_loop();
		}

		wp_reset_postdata();

		$all_events_page_id = Heartbeat_Event_Api::get_events_page();
		$event_data['all_events_link'] = get_permalink( $all_events_page_id );

		$html = Heartbeat_Event_Api::parse( $this->widget_template_slug, $this->widget_template_name, $event_data );

		set_transient( $cache_key, $html, $cache_time );
		return $html;
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = !empty( $instance['title_name'] ) ? $instance['title_name'] : '';
		$number_of_items = !empty( $instance['number_of_items_name'] ) ? $instance['number_of_items_name'] : '';

		$data = array();
		$data['title'] = $title;
		$data['title_name'] = $this->get_field_name( 'title_name' );
		$data['title_id'] = $this->get_field_id( 'title_id' );
		$data['number_of_items'] = $number_of_items;
		$data['number_of_items_name'] = $this->get_field_name( 'number_of_items_name' );
		$data['number_of_items_id'] = $this->get_field_id( 'number_of_items_id' );

		require $this->form_template_path;
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$this->flush_widget_cache();

		$instance = array();
		$instance['title_name'] = ( !empty( $new_instance['title_name'] ) ) ? strip_tags( $new_instance['title_name'] ) : '';
		$instance['number_of_items_name'] = ( !empty( $new_instance['number_of_items_name'] ) ) ? strip_tags( $new_instance['number_of_items_name'] ) : '';

		return $instance;
	}
	
	public function flush_widget_cache() {

		$ids = $this->get_widget_id_number();

		if(!empty($ids)) {
			foreach( $ids as $id ) { 
				delete_transient( $this->widget_slug . '-' . $id );
          	} 
		}

	}

	public function get_widget_id_number() {
	    $widgets = get_option( 'sidebars_widgets' );
	    $widget_ids = array();

	    foreach( $widgets as $widget ) {
	        if ( is_array( $widget ) ) {
	            foreach( $widget as $widget_saved ) {
	                $widget_saved_name = substr( $widget_saved, 0, strrpos( $widget_saved, '-' ) );
	                $widget_id = substr( $widget_saved, -1, strrpos( $widget_saved, '-' ) );
	                
	                if ( $widget_saved_name === $this->widget_slug ) {
	                    $widget_ids[] = $widget_id;
	                }
	            }
	        }
	    }

	    array_unique( $widget_ids );

	    return $widget_ids;
	}
}