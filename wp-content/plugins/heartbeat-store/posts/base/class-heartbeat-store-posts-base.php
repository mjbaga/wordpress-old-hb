<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * This class declares base post type and all its fields. Other post types in this module will extend from this
 *
 * @author mjdbaga@gmail.com
 */
class Heartbeat_Store_Posts_Base {

  protected $slug;
  protected $label;

  function init_post() {
    $args = array(
        'label' => $this->label,
        'publicly_queryable' => FALSE,
        'show_ui' => TRUE,
        'show_in_nav_menus' => FALSE,
        'exclude_from_search' => TRUE,
        'rewrite' => array( 'slug' => $this->slug, ),
        'supports' => array(
            'title',
            'thumbnail',
            'excerpt',
            'editor'
        )
    );
    register_post_type( $this->slug, $args );
  }

  public static function register_fields() {
    if( function_exists( 'acf_add_local_field_group' ) ):

      acf_add_local_field_group( array(
          'key' => 'group_59152a225a48e',
          'title' => 'Post - Store',
          'fields' => array(
              array(
                  'key' => 'field_59152a31ce79f',
                  'label' => 'Description',
                  'name' => 'description',
                  'type' => 'text',
                  'instructions' => '100-character limit',
                  'required' => 1,
                  'conditional_logic' => 0,
                  'wrapper' => array(
                      'width' => '',
                      'class' => '',
                      'id' => ''
                  ),
                  'default_value' => '',
                  'placeholder' => '',
                  'prepend' => '',
                  'append' => '',
                  'maxlength' => 100
              ),
              array(
                  'key' => 'field_5924e78a4b023',
                  'label' => 'Store Teaser Description',
                  'name' => 'store_teaser_description',
                  'type' => 'text',
                  'instructions' => '50-character limit',
                  'required' => 1,
                  'conditional_logic' => 0,
                  'wrapper' => array(
                      'width' => '',
                      'class' => '',
                      'id' => ''
                  ),
                  'default_value' => '',
                  'placeholder' => '',
                  'prepend' => '',
                  'append' => '',
                  'maxlength' => 50
              ),
              array(
                  'key' => 'field_59152a73ce7a0',
                  'label' => 'Store Operating Hours',
                  'name' => 'store_operating_hours',
                  'type' => 'text',
                  'instructions' => '',
                  'required' => 1,
                  'conditional_logic' => 0,
                  'wrapper' => array(
                      'width' => '',
                      'class' => '',
                      'id' => ''
                  ),
                  'default_value' => '',
                  'placeholder' => '',
                  'prepend' => '',
                  'append' => '',
                  'maxlength' => ''
              ),
              array(
                  'key' => 'field_59152a83ce7a1',
                  'label' => 'Store Contact',
                  'name' => 'store_contact',
                  'type' => 'text',
                  'instructions' => '',
                  'required' => 0,
                  'conditional_logic' => 0,
                  'wrapper' => array(
                      'width' => '',
                      'class' => '',
                      'id' => ''
                  ),
                  'default_value' => '',
                  'placeholder' => '',
                  'prepend' => '',
                  'append' => '',
                  'maxlength' => ''
              ),
              array(
                  'key' => 'field_59152a8bce7a2',
                  'label' => 'Store Email',
                  'name' => 'store_email',
                  'type' => 'email',
                  'instructions' => '',
                  'required' => 0,
                  'conditional_logic' => 0,
                  'wrapper' => array(
                      'width' => '',
                      'class' => '',
                      'id' => ''
                  ),
                  'default_value' => '',
                  'placeholder' => '',
                  'prepend' => '',
                  'append' => ''
              ),
              array(
                  'key' => 'field_59152a98ce7a3',
                  'label' => 'Store Link',
                  'name' => 'store_link',
                  'type' => 'url',
                  'instructions' => '',
                  'required' => 0,
                  'conditional_logic' => 0,
                  'wrapper' => array(
                      'width' => '',
                      'class' => '',
                      'id' => ''
                  ),
                  'default_value' => '',
                  'placeholder' => ''
              ),
              array(
                  'key' => 'field_59152ab7ce7a4',
                  'label' => 'Store Location',
                  'name' => 'store_location',
                  'type' => 'text',
                  'instructions' => 'Unit Number',
                  'required' => 1,
                  'conditional_logic' => 0,
                  'wrapper' => array(
                      'width' => '',
                      'class' => '',
                      'id' => ''
                  ),
                  'default_value' => '',
                  'placeholder' => '',
                  'prepend' => '',
                  'append' => '',
                  'maxlength' => ''
              )
          ),
          'location' => array(
              array(
                  array(
                      'param' => 'post_type',
                      'operator' => '==',
                      'value' => 'str-shop'
                  )
              ),
              array(
                  array(
                      'param' => 'post_type',
                      'operator' => '==',
                      'value' => 'str-dine'
                  )
              )
          ),
          'menu_order' => 0,
          'position' => 'normal',
          'style' => 'default',
          'label_placement' => 'top',
          'instruction_placement' => 'label',
          'hide_on_screen' => array(
              'permalink',
              'the_content',
              'excerpt',
              'custom_fields',
              'discussion',
              'comments',
              'author',
              'format',
              'categories',
              'tags',
              'send-trackbacks'
          ),
          'active' => 1,
          'description' => ''
      ) );

    endif;
  }

}
