<?php

/**
 * @package Bootscore Child
 *
 * @version 6.0.0
 */


// Exit if accessed directly
defined('ABSPATH') || exit;


/**
 * Enqueue scripts and styles
 */
add_action('wp_enqueue_scripts', 'bootscore_child_enqueue_styles');
function bootscore_child_enqueue_styles() {

  // Compiled main.css
  $modified_bootscoreChildCss = date('YmdHi', filemtime(get_stylesheet_directory() . '/assets/css/main.css'));
  wp_enqueue_style('main', get_stylesheet_directory_uri() . '/assets/css/main.css', array('parent-style'), $modified_bootscoreChildCss);

  // style.css
  wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
  
  // custom.js
  // Get modification time. Enqueue file with modification date to prevent browser from loading cached scripts when file content changes. 
  $modificated_CustomJS = date('YmdHi', filemtime(get_stylesheet_directory() . '/assets/js/custom.js'));
  wp_enqueue_script('custom-js', get_stylesheet_directory_uri() . '/assets/js/custom.js', array('jquery'), $modificated_CustomJS, false, true);
}

/**
 * Header position and bg
 */
function header_bg_class() {
  return "position-relative bg-body border-bottom";
}
add_filter('bootscore/class/header', 'header_bg_class');

/**
 * Removes the 'mb-3' class from block buttons content.
 * 
 * @param string $block_content The original block content with classes.
 */
function block_flush_button($block_content) {
  return str_replace('mb-3', '', $block_content);
}
add_filter('bootscore/block/buttons/content', 'block_flush_button', 10, 1);

/**
 * Adjusts the navbar items positioning to the left.
 */
function navbar_nav_position_item() {
  return 'me-auto';
}
add_filter('bootscore/class/header/navbar-nav', 'navbar_nav_position_item');