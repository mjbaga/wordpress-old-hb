<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * This class has the implementation of all the common functions that can be 
 * used by classes across this module
 *
 * @author mjdbaga@gmail.com
 */
class Heartbeat_Operating_Hours_Common {

    /**
    * Implemantation of this module's render function. Prints data based on 
    * template or returns the template with data values in a string.
    * 
    * @param string $path
    * @param array $data
    * @param boolean $echo
    * @return mixed
    */
    public static function render( $slug, $name = null, $data = array(), $var_name = 'data', $echo = true ) {
        ob_start();
        $templater = new Heartbeat_Operating_Hours_Common_Templater();
        $templater->set_template_data( $data, $var_name );
        $templater->get_template_part( $slug, $name );
        $templater->unset_template_data();

        $out = ob_get_clean();
        if( $echo === true ) {
            echo $out;
        } else {
            return $out;
        }
    }

    public static function get_all_operating_hours_data()
    {
        $data = array();
        $data['monday']['opening_hours'] = get_field('monday_opening_hours', 'option', false);
        $data['monday']['closing_hours'] = get_field('monday_closing_hours', 'option', false);
        $data['tuesday']['opening_hours'] = get_field('tuesday_opening_hours', 'option', false);
        $data['tuesday']['closing_hours'] = get_field('tuesday_closing_hours', 'option', false);
        $data['wednesday']['opening_hours'] = get_field('wednesday_opening_hours', 'option', false);
        $data['wednesday']['closing_hours'] = get_field('wednesday_closing_hours', 'option', false);
        $data['thursday']['opening_hours'] = get_field('thursday_opening_hours', 'option', false);
        $data['thursday']['closing_hours'] = get_field('thursday_closing_hours', 'option', false);
        $data['friday']['opening_hours'] = get_field('friday_opening_hours', 'option', false);
        $data['friday']['closing_hours'] = get_field('friday_closing_hours', 'option', false);
        $data['saturday']['opening_hours'] = get_field('saturday_opening_hours', 'option', false);
        $data['saturday']['closing_hours'] = get_field('saturday_closing_hours', 'option', false);
        $data['sunday']['opening_hours'] = get_field('sunday_opening_hours', 'option', false);
        $data['sunday']['closing_hours'] = get_field('sunday_closing_hours', 'option', false);

        return $data;
    }  

}
