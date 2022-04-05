<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Heartbeat_Operating_Hours_Widget to display breadcrumbs
 *
 * @author mjdbaga@gmail.com
 */
class Heartbeat_Operating_Hours_Widget extends WP_Widget {
  
    protected $widget_slug;
    protected $widget_template_slug;
    protected $form_template_path;
    protected $menu_location;

    /**
    * Register widget with WordPress.
    */
    function __construct() {
        $this->widget_slug = 'hp_operating_hours_widget';
        $this->widget_template_slug = 'operating-hours';
        $this->menu_location = 'primary';

        parent::__construct(
                $this->widget_slug, // Base ID
                __( 'Operating Hours Widget', $this->widget_slug ), // Name
                array( 'description' => __( 'A widget to set operating hours.', $this->widget_slug ), ) // Args
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
    * @return String html for all sponsors to be rendered in footer. Returns from cache if cache exists.
    */
    public function parse_widget( $instance ) {

        $data = Heartbeat_Operating_Hours_Api::get_all_operating_hours_data();

        $today = strtolower(date('l'));

        foreach($data as $key => $day) {
            $data[$key]['class'] = $key != $today ? 'is-hidden' : '';
            $display = '';
            $meta = '';

            if(!empty($day['opening_hours']) && !empty($day['closing_hours'])) {
                $opening = new DateTime($day['opening_hours']);
                $closing = new DateTime($day['closing_hours']);

                $display = 'Open Today ' . $opening->format('g:iA') . '-' . $closing->format('g:iA');
                $meta = substr(ucwords($key), 0, 1) . ' ' . $opening->format('H:i') . '-' . $closing->format('H:i');
            } else {
                $display = 'Closed Today';
                $meta = '';
            }

            $data[$key]['display'] = $display;
            $data[$key]['meta'] = $meta;
        }

        $html = Heartbeat_Operating_Hours_Api::parse( $this->widget_template_slug, null, $data );

        return $html;
    }
  
}
