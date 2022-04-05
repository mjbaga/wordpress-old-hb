<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Heartbeat_Subscribe_Widget to display subscribe
 *
 * @author mjdbaga@gmail.com
 */
class Heartbeat_Subscribe_Widget extends WP_Widget {
  
  protected $widget_slug;
  protected $widget_template_slug;
  protected $widget_template_name;
  protected $form_template_path;

  /**
   * Register widget with WordPress.
   */
  function __construct() {
    $this->widget_slug = 'hb_subscribe_widget';
    $this->widget_template_slug = 'widget';
    $this->widget_template_name = 'subscribe';
    $this->form_template_path = HB_SUBSCRIBE_PLUGIN_DIR . '/templates/form-subscribe.tpl.php';
    add_action( 'switch_theme', array( $this, 'flush_widget_cache' ) );
    parent::__construct(
            $this->widget_slug, // Base ID
            __( 'Subscribe Widget', $this->widget_slug ), // Name
            array( 'description' => __( 'A widget to display subscribe link.', $this->widget_slug ), ) // Args
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
    $cache_time = HB_SUBSCRIBE_CACHE_TIME; 

    if( $cache ) {
      return $cache;
    }

    $data = array();
    $data['title'] = $instance['title_name'];
    $data['link'] = $instance['link_name'];

    $html = Heartbeat_Subscribe_Api::parse( $this->widget_template_slug, $this->widget_template_name, $data );
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
    $link = !empty( $instance['link_name'] ) ? $instance['link_name'] : '';

    $data = array();
    $data['title'] = $title;
    $data['title_name'] = $this->get_field_name( 'title_name' );
    $data['title_id'] = $this->get_field_id( 'title_id' );
    $data['link'] = $link;
    $data['link_name'] = $this->get_field_name( 'link_name' );
    $data['link_id'] = $this->get_field_id( 'link_id' );

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
    $instance['link_name'] = ( !empty( $new_instance['link_name'] ) ) ? strip_tags( $new_instance['link_name'] ) : '';

    return $instance;
  }
  
  public function flush_widget_cache() {
    $cache_key = $this->widget_slug . '_' . $this->id;
    delete_transient( $cache_key );
  }
  
}
