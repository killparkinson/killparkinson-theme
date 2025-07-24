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
 * Unregisters the core post excerpt block type from Gutenberg editor.
 *
 * This function is hooked to the 'init' action to ensure it runs during
 * WordPress initialization.
 */
function custom_init() {
    unregister_block_type('core/post-excerpt');
}
add_action('init', 'custom_init');

/**
 * Registers a custom post excerpt block with a custom render callback.
 *
 * This function registers the 'core/post-excerpt' block type and associates it
 * with the `render_custom_post_excerpt` function for rendering.
 */
function register_custom_post_excerpt_block() {
    register_block_type('core/post-excerpt', [
        'render_callback' => 'render_custom_post_excerpt',
    ]);
}
add_action('init', 'register_custom_post_excerpt_block');

/**
 * Renders a custom post excerpt with customizable attributes.
 *
 * This function overrides the default WordPress post excerpt rendering,
 * allowing for dynamic styling, truncation, and "Read more" link customization.
 *
 * @since 1.0.0
 *
 * @param array $attributes {
 *     Block attributes from the editor.
 *
 *     @type int    $excerptLength         Optional. The number of characters to truncate the excerpt to. Default is 55.
 *     @type string $className             Optional. Class name for the outer container div.
 *     @type string $excerptClassName      Optional. Class name for the paragraph containing the excerpt text.
 *     @type string $moreText              Optional. Custom "Read more" link text to display.
 *     @type bool   $showMoreOnNewLine     Optional. Whether to wrap the "Read more" link in a new paragraph. Default is false.
 *     @type string $showMoreOnNewLineClassName Optional. Class name for the container paragraph of the "Read more" link.
 *     @type string $moreTextClassName     Optional. Class name for the anchor tag of the "Read more" link.
 *     @type string $moreTextPrefix        Optional. Text to display before the "Read more" link.
 *     @type string $moreTextSuffix        Optional. Text to display after the "Read more" link.
 * }
 *
 * @return string HTML markup for the custom excerpt.
 */
function render_custom_post_excerpt($attributes) {
    // set default excerpt length if not provided
    $excerpt_length = isset($attributes['excerptLength']) ? $attributes['excerptLength'] : 55;

    // start building the outer container div
    $excerpt = '<div';

    // add class attribute if specified in block settings
    if (isset($attributes['className'])) {
        $excerpt .= ' class="'. $attributes['className'] . '"';
    } else {
        $excerpt .= '>';
    }
    
    // begin paragraph tag for the excerpt text
    $excerpt .= '<p';

    // apply custom class to the paragraph if specified
    if (isset($attributes['excerptClassName'])) {
        $excerpt .= ' class="'. $attributes['excerptClassName'] . '">';
    } else {
        $excerpt .= '>';
    }

    // truncate or use full excerpt based on length
    if (strlen(get_the_excerpt()) > $excerpt_length) {
        // Truncate and add ellipsis if excerpt exceeds specified length
        $excerpt .= substr(get_the_excerpt(), 0, $excerpt_length) . '…';
    } else {
        $excerpt .= get_the_excerpt();
    }

    // close the paragraph tag
    $excerpt .= '</p>';

    // conditionally append "Read more" link with custom styling/text
    if (isset($attributes['moreText'])) {
        // wrap "Read more" in a new paragraph if specified
        if ($attributes['showMoreOnNewLine']) {
            $excerpt .= '<p';

            // apply class to the container paragraph
            if (isset($attributes['showMoreOnNewLineClassName'])) {
                $excerpt .= ' class="' . $attributes['showMoreOnNewLineClassName'] . '"';
            }

            $excerpt .= '>';
        }

        // build anchor tag with custom classes, prefix, and suffix
        $excerpt .= '<a ';

        if (isset($attributes['moreTextClassName'])) {
            $excerpt .= 'class="' . $attributes['moreTextClassName'] . '" ';
        }

        $excerpt .= 'href="' . wp_get_canonical_url() .'">';

        // add optional prefix text before the "Read more" link
        if (isset($attributes['moreTextPrefix'])) {
            $excerpt .= $attributes['moreTextPrefix'];
        }

        // insert custom "Read more" text
        $excerpt .= $attributes['moreText'];

        // add optional suffix text after the "Read more" link
        if (isset($attributes['moreTextSuffix'])) {
            $excerpt .=  $attributes['moreTextSuffix'];
        }

        $excerpt .= '</a>';

        // close the paragraph tag if "Read more" was wrapped in a new line
        if ($attributes['showMoreOnNewLine']) {
            $excerpt .= '</p>';
        }
    }

    // close the outer container div
    $excerpt .= '</div>';

    return $excerpt;
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

/**
 * Adds Bootstrap classes to categories post terms.
 *
 * @param string $block_content The block content.
 * @param array  $block         The full block, including name and attributes.
 * @return string The filtered block content.
 */
function bootscore_child_block_post_categories_classes($block_content, $block) {

  if (isset($block['attrs']) && $block['attrs']['term'] == 'category') {
    $search = array(
      '<a'
    );
    $replace = array(
      '<a class="btn btn-outline-primary btn-sm" ',
    );

    return str_replace($search, $replace, $block_content);
  }
}
add_filter('render_block_core/post-terms', 'bootscore_child_block_post_categories_classes', 10, 2);



//Use container-fluid class instead of container
function footer_container_class($class, $context){
  if ($context === 'footer-columns') {
    return 'container-fluid';
  }

  if($context=== "footer-info") {
    return 'container-fluid d-flex flex-md-wrap flex-wrap-reverse justify-content-md-between justify-content-center align-content-stretch align-items-md-center';
  }
  return $class;
}
add_filter('bootscore/class/container', 'footer_container_class', 10, 2);

/**
 * Change footer column wrapper classes
 */
function add_footer_class() {
  return "pt-5 pb-4";
}
add_filter('bootscore/class/footer/columns', 'add_footer_class', 10, 2);


//Custom classes for each footer column in use
function footer_col_class($string, $location) {

  if ($location == 'footer-1') {
    return "col-12 col-lg-3 order-1 order-md-1";
  }
    if ($location == 'footer-2') {
    return "col-12 col-lg-6 pt-4 order-3 order-md-2";
  }
   if ($location == 'footer-3') {
    return "col-12 col-lg-3 pt-4 order-2 order-md-3";
  }
  
  if ($location == 'footer-4') {
    return "d-none";
  }
  return $string;
}

add_filter('bootscore/class/footer/col', 'footer_col_class', 10, 2);


function add_footer_info_class() {
  return "text-body-secondary border-top py-4 text-center";
}
add_filter('bootscore/class/footer/info', 'add_footer_info_class', 10, 2);



