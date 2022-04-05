<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * All the navigation functions used in site
 *
 * @author mjdbaga@gmail.com
 * @since 0.1.0
 */
class Heartbeat_Theme_Components_Shared_Navigation {

  public static function get_primary_navigation() {
    $args = array(
        'theme_location' => 'primary',
        'menu' => 'Primary',
        //'walker' => new Primary_Walker(),
        'container' => 'nav',
        'container_class' => 'primary-nav',
        'container_id' => 'primary-nav-id',
        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        'depth' => 3,
        'echo' => false
    );
    return wp_nav_menu( $args );
  }
  
  public static function get_quick_links_navigation() {
    $args = array(
        'theme_location' => 'quick',
        'menu' => 'Quick Links',
        'container' => 'div',
        'container_class' => 'shortcut-wrap',
        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        'link_before' => '<div class="content">',
        'link_after' => '</div>',
        'show_icons_before_title' => true,
        'is_quick_link' => true,
        'depth' => 1,
        'echo' => false
    );
    return wp_nav_menu( $args );
  }

  public static function get_legal_navigation() {
    $args = array(
        'theme_location' => 'legal',
        'menu' => 'Footer',
        'container' => false,
        'menu_class' => 'links',
        'menu_id' => 'menu-footer-links',
        'echo' => false
    );
    return wp_nav_menu( $args );
  }
  
  public static function get_social_navigation() {
    $args = array(
        'theme_location' => 'social',
        'menu' => 'Social Links',
        'container' => false,
        'add_social_item_class' => true,
        //'container_class' => 'footer__social-links',
        'menu_class' => 'social-media',
        'show_icons_after_title' => true,
        'hide_item_title' => true,
        'echo' => false
    );
    return wp_nav_menu( $args );
  }

}

