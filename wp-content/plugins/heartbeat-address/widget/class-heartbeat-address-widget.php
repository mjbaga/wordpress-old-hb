<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Heartbeat_Address_Widget to display breadcrumbs
 *
 * @author mjdbaga@gmail.com
 */
class Heartbeat_Address_Widget extends WP_Widget 
{
  
    protected $widget_slug;
    protected $widget_template_slug;
    protected $form_template_path;
    protected $menu_location;

    /**
    * Register widget with WordPress.
    */
    function __construct() 
    {
        $this->widget_slug = 'hp_address_widget';
        $this->widget_template_slug = 'hb-address';
        $this->menu_location = 'primary';

        parent::__construct(
                $this->widget_slug, // Base ID
                __( 'Address Widget', $this->widget_slug ), // Name
                array( 'description' => __( 'A widget to set address.', $this->widget_slug ), ) // Args
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
    public function widget( $args, $instance ) 
    {
        echo $args['before_widget'];
        echo $this->parse_widget( $instance );
        echo $args['after_widget'];
    }

    /**
    *
    * @param type $instance instance of this widget specified in widget area.
    * @return String html for all sponsors to be rendered in footer. Returns from cache if cache exists.
    */
    public function parse_widget( $instance ) 
    {
        $data = array();
        $data['address'] = Heartbeat_Address_Api::get_address_option();
        $data['address_link'] = Heartbeat_Address_Api::get_address_link_option();

        $html = Heartbeat_Address_Api::parse( $this->widget_template_slug, null, $data );

        return $html;
    }
  
}
