<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Heartbeat_Notification_Widget to display feedback
 *
 * @author mjdbaga@gmail.com
 */
class Heartbeat_Notification_Widget extends WP_Widget {

  protected $widget_slug;
  protected $widget_template_slug;
  protected $widget_template_name;
  protected $form_template_path;

  /**
   * Register widget with WordPress.
   */
  function __construct() {
    $this->widget_slug = 'hb_notification_widget';
    $this->widget_template_slug = 'widget';
    $this->widget_template_name = 'notification';
    $this->form_template_path = HB_NOTIFICATION_PLUGIN_DIR . '/templates/form-notification.tpl.php';
    add_action( 'switch_theme', array( $this, 'flush_widget_cache' ) );
    parent::__construct(
            $this->widget_slug, // Base ID
            __( 'Notification Widget', $this->widget_slug ), // Name
            array( 'description' => __( 'A widget to display notification.', $this->widget_slug ), ) // Args
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
    $cache_time = HB_NOTIFICATION_CACHE_TIME;

    if( $cache ) {
      return $cache;
    }

    $notification_start_date = $instance['notification_start_date_name'];
    $notification_start_time = $instance['notification_start_time_name'];
    $notification_end_date = $instance['notification_end_date_name'];
    $notification_end_time = $instance['notification_end_time_name'];

    $current_time = current_time( 'timestamp' );
    $notification_start_unix_time = strtotime( $notification_start_date . ' ' . $notification_start_time );
    $notification_end_unix_time = strtotime( $notification_end_date . ' ' . $notification_end_time );

    if( ( $notification_start_unix_time > $current_time ) || ( $notification_end_unix_time < $current_time ) ) {
      return '';
    }
    $data = array();
    $data['title'] = $instance['title_name'];
    $data['notification'] = $instance['notification_name'];

    $html = Heartbeat_Notification_Api::parse( $this->widget_template_slug, $this->widget_template_name, $data );
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
    $notification = !empty( $instance['notification_name'] ) ? $instance['notification_name'] : '';
    $notification_start_date = !empty( $instance['notification_start_date_name'] ) ? $instance['notification_start_date_name'] : '';
    $notification_start_time = !empty( $instance['notification_start_time_name'] ) ? $instance['notification_start_time_name'] : '';
    $notification_end_date = !empty( $instance['notification_end_date_name'] ) ? $instance['notification_end_date_name'] : '';
    $notification_end_time = !empty( $instance['notification_end_time_name'] ) ? $instance['notification_end_time_name'] : '';

    $data = array();
    $data['title'] = $title;
    $data['title_name'] = $this->get_field_name( 'title_name' );
    $data['title_id'] = $this->get_field_id( 'title_id' );
    $data['notification'] = $notification;
    $data['notification_name'] = $this->get_field_name( 'notification_name' );
    $data['notification_id'] = $this->get_field_id( 'notification_id' );
    $data['notification_start_date'] = $notification_start_date;
    $data['notification_start_date_name'] = $this->get_field_name( 'notification_start_date_name' );
    $data['notification_start_date_id'] = $this->get_field_id( 'notification_start_date_id' );
    $data['notification_start_time'] = $notification_start_time;
    $data['notification_start_time_name'] = $this->get_field_name( 'notification_start_time_name' );
    $data['notification_start_time_id'] = $this->get_field_id( 'notification_start_time_id' );
    $data['notification_end_date'] = $notification_end_date;
    $data['notification_end_date_name'] = $this->get_field_name( 'notification_end_date_name' );
    $data['notification_end_date_id'] = $this->get_field_id( 'notification_end_date_id' );
    $data['notification_end_time'] = $notification_end_time;
    $data['notification_end_time_name'] = $this->get_field_name( 'notification_end_time_name' );
    $data['notification_end_time_id'] = $this->get_field_id( 'notification_end_time_id' );

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
    $instance['title_name'] = (!empty( $new_instance['title_name'] ) ) ? strip_tags( $new_instance['title_name'] ) : '';
    $instance['notification_name'] = (!empty( $new_instance['notification_name'] ) ) ? strip_tags( $new_instance['notification_name'] ) : '';
    $instance['notification_start_date_name'] = (!empty( $new_instance['notification_start_date_name'] ) ) ? strip_tags( $new_instance['notification_start_date_name'] ) : '';
    $instance['notification_start_time_name'] = (!empty( $new_instance['notification_start_time_name'] ) ) ? strip_tags( $new_instance['notification_start_time_name'] ) : '';
    $instance['notification_end_date_name'] = (!empty( $new_instance['notification_end_date_name'] ) ) ? strip_tags( $new_instance['notification_end_date_name'] ) : '';
    $instance['notification_end_time_name'] = (!empty( $new_instance['notification_end_time_name'] ) ) ? strip_tags( $new_instance['notification_end_time_name'] ) : '';

    return $instance;
  }

  public function flush_widget_cache() {
    $cache_key = $this->widget_slug . '_' . $this->id;
    delete_transient( $cache_key );
  }

}
