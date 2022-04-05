<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Heartbeat_Partner_Logos_Widgets to display featured events
 *
 * @author mjdbaga@gmail.com
 */

class Heartbeat_Partner_Logos_Widgets extends WP_Widget
{

	public function __construct()
	{
		$this->widget_slug = 'hb_partner_logos_widget';
		$this->widget_template_slug = 'widget';
		$this->widget_template_name = 'partner-logos';
		$this->form_template_path = HB_PARTER_LOGOS_PLUGIN_DIR . '/templates/form-logos.tpl.php';

		add_action( 'save_post_events', array( $this, 'flush_widget_cache' ) );
		add_action( 'deleted_post', array( $this, 'flush_widget_cache' ) );
		add_action( 'switch_theme', array( $this, 'flush_widget_cache' ) );
		parent::__construct(
	        $this->widget_slug, // Base ID
	        __( 'Partner Logos Widget', $this->widget_slug ), // Name
	        array( 'description' => __( 'A widget to display partner logos.', $this->widget_slug ), ) // Args
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
		$cache_key = $this->widget_slug . '_' . $this->id;
		$cache = get_transient( $cache_key );
		$cache_time = HB_PARTER_LOGOS_CACHE_TIME; 

		if( $cache ) {
			return $cache;
		}

		$partner_logos = $instance['partner_logos_name'];

		if( $partner_logos === '' ) {
			return '';
		}

		$partner_logos_array = explode( ',', $partner_logos );

		global $post;

		$data = array();

		foreach( $partner_logos_array as $logo_id ) {
			$post = get_post( $logo_id );
			setup_postdata( $post );
			$data['logos'][] = Heartbeat_Partner_Logos_Api::get_partner_logo_details_in_loop();
		}

		wp_reset_postdata();

		$data['title'] = !empty( $instance['title_name'] ) ? $instance['title_name'] : '';

		$html = Heartbeat_Partner_Logos_Api::parse( $this->widget_template_slug, $this->widget_template_name, $data );

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
		$partner_logos = !empty( $instance['partner_logos_name'] ) ? $instance['partner_logos_name'] : '';

		$data = array();
		$data['title'] = $title;
		$data['title_name'] = $this->get_field_name( 'title_name' );
		$data['title_id'] = $this->get_field_id( 'title_id' );
		$data['partner_logos'] = $partner_logos;
		$data['partner_logos_name'] = $this->get_field_name( 'partner_logos_name' );
		$data['partner_logos_id'] = $this->get_field_id( 'partner_logos_id' );

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
		$instance['partner_logos_name'] = ( !empty( $new_instance['partner_logos_name'] ) ) ? strip_tags( $new_instance['partner_logos_name'] ) : '';

		return $instance;
	}
	
	public function flush_widget_cache() {
		$cache_key = $this->widget_slug . '_' . $this->id;
		delete_transient( $cache_key );
	}
}