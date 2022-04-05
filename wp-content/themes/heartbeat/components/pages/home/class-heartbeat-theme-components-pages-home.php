<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Heartbeat_Theme_Components_Pages_Home
 *
 * @author mjdbaga@gmail.com
 */
class Heartbeat_Theme_Components_Pages_Home {
  
  public static function register_fields() {
    $post_type = array();
    $post_type[0] = 'post';
    $post_type[1] = 'post';
    if( class_exists( 'Heartbeat_Store' ) ) {
      $post_type = Heartbeat_Store_Api::get_str_post_types();
    }
    if( function_exists('acf_add_local_field_group') ){
      acf_add_local_field_group(array (
              'key' => 'group_59152e3ee9697',
              'title' => 'Template - Home',
              'fields' => array (
                      array (
                              'key' => 'field_59152e6707a91',
                              'label' => 'Carousel',
                              'name' => 'carousel',
                              'type' => 'flexible_content',
                              'instructions' => '',
                              'required' => 1,
                              'conditional_logic' => 0,
                              'wrapper' => array (
                                      'width' => '',
                                      'class' => '',
                                      'id' => '',
                              ),
                              'layouts' => array (
                                      '59152e77653ec' => array (
                                              'key' => '59152e77653ec',
                                              'name' => 'slide',
                                              'label' => 'Slide',
                                              'display' => 'block',
                                              'sub_fields' => array (
                                                      array (
                                                              'key' => 'field_59152e9307a92',
                                                              'label' => 'Carousel Title',
                                                              'name' => 'carousel_title',
                                                              'type' => 'text',
                                                              'instructions' => '',
                                                              'required' => 1,
                                                              'conditional_logic' => 0,
                                                              'wrapper' => array (
                                                                      'width' => '',
                                                                      'class' => '',
                                                                      'id' => '',
                                                              ),
                                                              'default_value' => '',
                                                              'placeholder' => '',
                                                              'prepend' => '',
                                                              'append' => '',
                                                              'maxlength' => 20,
                                                      ),
                                                      array (
                                                              'key' => 'field_59152eb207a93',
                                                              'label' => 'Carousel Image',
                                                              'name' => 'carousel_image',
                                                              'type' => 'image',
                                                              'instructions' => '',
                                                              'required' => 1,
                                                              'conditional_logic' => 0,
                                                              'wrapper' => array (
                                                                      'width' => '',
                                                                      'class' => '',
                                                                      'id' => '',
                                                              ),
                                                              'return_format' => 'array',
                                                              'preview_size' => 'thumbnail',
                                                              'library' => 'all',
                                                              'min_width' => '',
                                                              'min_height' => '',
                                                              'min_size' => '',
                                                              'max_width' => '',
                                                              'max_height' => '',
                                                              'max_size' => '',
                                                              'mime_types' => '',
                                                      ),
                                                      array (
                                                              'key' => 'field_59152ece07a94',
                                                              'label' => 'Carousel Description',
                                                              'name' => 'carousel_description',
                                                              'type' => 'text',
                                                              'instructions' => '',
                                                              'required' => 1,
                                                              'conditional_logic' => 0,
                                                              'wrapper' => array (
                                                                      'width' => '',
                                                                      'class' => '',
                                                                      'id' => '',
                                                              ),
                                                              'default_value' => '',
                                                              'placeholder' => '',
                                                              'prepend' => '',
                                                              'append' => '',
                                                              'maxlength' => 30,
                                                      ),
                                                      array (
                                                              'key' => 'field_59152f0207a95',
                                                              'label' => 'Carousel Button Text',
                                                              'name' => 'carousel_button_text',
                                                              'type' => 'text',
                                                              'instructions' => '',
                                                              'required' => 0,
                                                              'conditional_logic' => 0,
                                                              'wrapper' => array (
                                                                      'width' => '',
                                                                      'class' => '',
                                                                      'id' => '',
                                                              ),
                                                              'default_value' => '',
                                                              'placeholder' => '',
                                                              'prepend' => '',
                                                              'append' => '',
                                                              'maxlength' => '',
                                                      ),
                                                      array (
                                                              'key' => 'field_591ac848867ea',
                                                              'label' => 'Carousel Button Link',
                                                              'name' => 'carousel_button_link',
                                                              'type' => 'url',
                                                              'instructions' => '',
                                                              'required' => 0,
                                                              'conditional_logic' => 0,
                                                              'wrapper' => array (
                                                                      'width' => '',
                                                                      'class' => '',
                                                                      'id' => '',
                                                              ),
                                                              'default_value' => '',
                                                              'placeholder' => '',
                                                      ),
                                              ),
                                              'min' => '',
                                              'max' => '',
                                      ),
                              ),
                              'button_label' => 'Add Slide',
                              'min' => '',
                              'max' => 5,
                      ),
                      array (
                              'key' => 'field_591abdf7fd710',
                              'label' => 'Shop Section',
                              'name' => '',
                              'type' => 'tab',
                              'instructions' => '',
                              'required' => 0,
                              'conditional_logic' => 0,
                              'wrapper' => array (
                                      'width' => '',
                                      'class' => '',
                                      'id' => '',
                              ),
                              'placement' => 'top',
                              'endpoint' => 0,
                      ),
                      array (
                              'key' => 'field_591abf2aa68ef',
                              'label' => 'Shop Section Title',
                              'name' => 'shop_section_title',
                              'type' => 'text',
                              'instructions' => '',
                              'required' => 0,
                              'conditional_logic' => 0,
                              'wrapper' => array (
                                      'width' => '',
                                      'class' => '',
                                      'id' => '',
                              ),
                              'default_value' => '',
                              'placeholder' => '',
                              'prepend' => '',
                              'append' => '',
                              'maxlength' => '',
                      ),
                      array (
                              'key' => 'field_591abe9aa68ed',
                              'label' => 'All Shops',
                              'name' => 'all_shops',
                              'type' => 'post_object',
                              'instructions' => '',
                              'required' => 0,
                              'conditional_logic' => 0,
                              'wrapper' => array (
                                      'width' => '',
                                      'class' => '',
                                      'id' => '',
                              ),
                              'post_type' => array (
                                      0 => 'page',
                              ),
                              'taxonomy' => array (
                              ),
                              'allow_null' => 1,
                              'multiple' => 0,
                              'return_format' => 'object',
                              'ui' => 1,
                      ),
                      array (
                              'key' => 'field_59152f3b07a97',
                              'label' => 'Shops',
                              'name' => 'shops',
                              'type' => 'relationship',
                              'instructions' => '',
                              'required' => 0,
                              'conditional_logic' => 0,
                              'wrapper' => array (
                                      'width' => '',
                                      'class' => '',
                                      'id' => '',
                              ),
                              'post_type' => array (
                                      0 => $post_type[0],
                              ),
                              'taxonomy' => array (
                              ),
                              'filters' => array (
                                      0 => 'search',
                                      1 => 'post_type',
                                      2 => 'taxonomy',
                              ),
                              'elements' => '',
                              'min' => '',
                              'max' => 2,
                              'return_format' => 'object',
                      ),
                      array (
                              'key' => 'field_591abe20fd711',
                              'label' => 'Dine Section',
                              'name' => '',
                              'type' => 'tab',
                              'instructions' => '',
                              'required' => 0,
                              'conditional_logic' => 0,
                              'wrapper' => array (
                                      'width' => '',
                                      'class' => '',
                                      'id' => '',
                              ),
                              'placement' => 'top',
                              'endpoint' => 0,
                      ),
                      array (
                              'key' => 'field_591abf46a68f0',
                              'label' => 'Dine Section Title',
                              'name' => 'dine_section_title',
                              'type' => 'text',
                              'instructions' => '',
                              'required' => 0,
                              'conditional_logic' => 0,
                              'wrapper' => array (
                                      'width' => '',
                                      'class' => '',
                                      'id' => '',
                              ),
                              'default_value' => '',
                              'placeholder' => '',
                              'prepend' => '',
                              'append' => '',
                              'maxlength' => '',
                      ),
                      array (
                              'key' => 'field_591abeb9a68ee',
                              'label' => 'All Diners',
                              'name' => 'all_diners',
                              'type' => 'post_object',
                              'instructions' => '',
                              'required' => 0,
                              'conditional_logic' => 0,
                              'wrapper' => array (
                                      'width' => '',
                                      'class' => '',
                                      'id' => '',
                              ),
                              'post_type' => array (
                                      0 => 'page',
                              ),
                              'taxonomy' => array (
                              ),
                              'allow_null' => 1,
                              'multiple' => 0,
                              'return_format' => 'object',
                              'ui' => 1,
                      ),
                      array (
                              'key' => 'field_59152f5207a98',
                              'label' => 'Diners',
                              'name' => 'diners',
                              'type' => 'relationship',
                              'instructions' => '',
                              'required' => 0,
                              'conditional_logic' => 0,
                              'wrapper' => array (
                                      'width' => '',
                                      'class' => '',
                                      'id' => '',
                              ),
                              'post_type' => array (
                                      0 => $post_type[1],
                              ),
                              'taxonomy' => array (
                              ),
                              'filters' => array (
                                      0 => 'search',
                                      1 => 'post_type',
                                      2 => 'taxonomy',
                              ),
                              'elements' => '',
                              'min' => '',
                              'max' => 2,
                              'return_format' => 'object',
                      ),
                      array (
                              'key' => 'field_591abe62a68ec',
                              'label' => 'Social Wall Section',
                              'name' => '',
                              'type' => 'tab',
                              'instructions' => '',
                              'required' => 0,
                              'conditional_logic' => 0,
                              'wrapper' => array (
                                      'width' => '',
                                      'class' => '',
                                      'id' => '',
                              ),
                              'placement' => 'top',
                              'endpoint' => 0,
                      ),
                      array (
                              'key' => 'field_59152f7107a99',
                              'label' => 'Social Wall Title',
                              'name' => 'social_wall_title',
                              'type' => 'text',
                              'instructions' => '',
                              'required' => 1,
                              'conditional_logic' => 0,
                              'wrapper' => array (
                                      'width' => '',
                                      'class' => '',
                                      'id' => '',
                              ),
                              'default_value' => '',
                              'placeholder' => '',
                              'prepend' => '',
                              'append' => '',
                              'maxlength' => '',
                      ),
              ),
              'location' => array (
                      array (
                              array (
                                      'param' => 'post_template',
                                      'operator' => '==',
                                      'value' => 'page-templates/template-homepage.php',
                              ),
                      ),
              ),
              'menu_order' => 0,
              'position' => 'normal',
              'style' => 'default',
              'label_placement' => 'top',
              'instruction_placement' => 'label',
              'hide_on_screen' => array (
                      0 => 'the_content',
                      1 => 'excerpt',
                      2 => 'custom_fields',
                      3 => 'discussion',
                      4 => 'comments',
                      5 => 'author',
                      6 => 'format',
                      7 => 'featured_image',
                      8 => 'categories',
                      9 => 'tags',
                      10 => 'send-trackbacks',
              ),
              'active' => 1,
              'description' => '',
      ));
    }
  }
  
  public static function get_data() {
    $carousel = get_field( 'carousel' );
    $shops = get_field( 'shops' );
    $diners = get_field( 'diners' );
    $all_shops_post = get_field( 'all_shops' );
    $all_diners_post = get_field( 'all_diners' );
    $data = array();
    $data['carousel'] = self::get_carousel_data( $carousel );
    $data['quick_links'] = Heartbeat_Theme_Components_Shared_Navigation::get_quick_links_navigation();
    $data['shops'] = self::get_store_data( $shops );
    $data['shop_section_title'] = get_field( 'shop_section_title' );
    if( !empty( $all_shops_post ) ) {
      $data['all_shops_link'] = get_the_permalink( $all_shops_post );
      $data['all_shops_title'] = get_the_title( $all_shops_post );
    }
    $data['diners'] = self::get_store_data( $diners );
    $data['dine_section_title'] = get_field( 'dine_section_title' );
    if( !empty( $all_diners_post ) ) {
      $data['all_diners_link'] = get_the_permalink( $all_diners_post );
      $data['all_diners_title'] = get_the_title( $all_diners_post );
    }
    $data['news_events'] = hb_parse_sidebar( 'home_news_events_widget' );
    $data['social_wall_title'] = get_field( 'social_wall_title' );
    return $data;
  }
  
  private static function get_store_data( $stores ) {
    if( empty( $stores ) ) {
      return array();
    }
    if( !class_exists( 'Heartbeat_Store' ) ) {
      return self::get_post_data( $posts );
    }
    
    global $post;
    
    $store_data = array();
    foreach( $stores as $post ) {
      setup_postdata( $post );
      $item = array();
      $item['title'] = get_the_title();
      $item['image'] = get_the_post_thumbnail( null, 'thumbnail' );
      $item['description'] = get_field( 'store_teaser_description' );
      $store_data[] = $item;
    }
    wp_reset_postdata();
    return $store_data;
  }
  
  private static function get_post_data( $posts ) {
    global $post;
    
    $post_data = array();
    foreach( $posts as $post ) {
      setup_postdata( $post );
      $excerpt = get_the_excerpt();
      $item = array();
      $item['title'] = get_the_title();
      $item['image'] = get_the_post_thumbnail( null, 'thumbnail' );
      $item['description'] = apply_filters( 'the_excerpt', $excerpt );
      $post_data[] = $item;
    }
    wp_reset_postdata();
    return $post_data;
  }
  
  private static function get_carousel_data( $carousel ) {
    $carousel_data = array();
    foreach( $carousel as $c ) {
      $slide = array();
      foreach( $c as $k => $i ) { 
        if( $k == 'carousel_image' ) {
          $slide[$k] = wp_get_attachment_image( $i['ID'], 'large' );
        } 
        else if($k == 'carousel_button_link') {
          $slide[$k] = parse_external_url($i);
        }
        else{
          $slide[$k] = $i;
        }
      }
      $carousel_data[] = $slide;
    }
    return $carousel_data;
  }
}
