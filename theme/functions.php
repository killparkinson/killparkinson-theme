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
      '<a class="badge bg-primary-subtle border border-primary-subtle text-primary-emphasis text-decoration-none border border-primary" ',
    );

    return str_replace($search, $replace, $block_content);
  }
}
add_filter('render_block_core/post-terms', 'bootscore_child_block_post_categories_classes', 10, 2);

/**
 * Custom language switcher dropdown for WordPress menus.
 *
 * This function modifies the language switcher menu to display a custom HTML structure
 * with flags and names of available languages. It replaces the default menu items
 * with a styled language switcher dropdown.
 *
 * @param array $items     The list of menu items.
 * @param object $args     Menu arguments.
 * @return string          Modified menu items or custom language switcher HTML.
 */
function custom_language_switcher_dropdown( $items, $args ) {
	// check if this is the language switcher
	if ( $args->menu->slug == 'language-switcher' ) {
		// get the current language slug
		$current_lang_slug = pll_current_language( 'slug' );

		// get the list of languages slugs
		$language_slugs = pll_languages_list();

		if ( ! empty( $language_slugs ) ) {
			$language_names = pll_languages_list( array( 'fields' => 'name' ) );
			$language_locales = pll_languages_list( array( 'fields' => 'locale' ) );

			$custom_html = '<li id="top-language-switcher" class="mx-n3 px-3 pt-3 border-top mx-lg-0 p-lg-0 border-lg-0">';
			$custom_html .= '<div class="dropdown dropup dropdown-lg">';
			$custom_html .= '<button class="btn btn-ghost-secondary dropdown-toggle icon-css text-uppercase" data-bs-display="static" type="button" data-bs-toggle="dropdown" aria-expanded="false">';
			$custom_html .= '<span class="icon-start flag flag-' . strtoupper( $current_lang_slug ) . ' flag-round flag-lg me-2"></span>';
			$custom_html .= $current_lang_slug;
			$custom_html .= '</button>';
			$custom_html .= '<ul class="dropdown-menu dropdown-menu-start dropdown-menu-lg-end shadow">';

			foreach ( $language_slugs as $key => $slug ) {
				// check if this is the current language
				$is_current = ( $slug === $current_lang_slug ) ? ' active icon-css' : '';
				$lang_name = esc_attr( $language_names[ $key ] );
				$lang_locale = esc_attr( $language_locales[ $key ] );

				// display the language switcher item with flag and name
				$custom_html .= '<li>';
				$custom_html .= '<a lang="'. $lang_locale .'" hreflang="'. $lang_locale .'" class="dropdown-item' . $is_current . '" href="' . pll_home_url( $slug ) . '" title="' . $lang_name . '">';
				$custom_html .= '<span class="flag flag-' . strtoupper( $slug ) . ' flag-round flag-lg me-2"></span>';
				$custom_html .= $lang_name;
				$custom_html .= '</a>';
				$custom_html .= '</li>';
			}
			$custom_html .= '</ul></div></li>';
		}

		// return the custom HTML instead of the default menu
		return $custom_html;
	}

	// for other menus, return the original items
	return $items;
}
add_filter( 'wp_nav_menu_items', 'custom_language_switcher_dropdown', 10, 2 );

/**
 * Use container-fluid class instead of container on footer
 */
function footer_container_class($class, $context){

  if($context=== "footer-info") {
    return 'container d-flex flex-md-wrap flex-wrap-reverse justify-content-md-between justify-content-center align-content-stretch align-items-md-center';
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


/**
 * Custom classes for each footer column in use
 */
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

/**
 * Custom classes for footer info
 */
function add_footer_info_class() {
  return "text-body-secondary border-top py-4 text-center";
}
add_filter('bootscore/class/footer/info', 'add_footer_info_class', 10, 2);

/**
 * Sets the direction for the mobile menu in the offcanvas body.
 *
 * @param string $classNames The existing class names.
 * @param mixed  $context   The context in which the function is called.
 */
function mobile_offcanvas_body_direction ($classNames, $context) {
  if ($context == 'menu') {
    return 'd-flex flex-column flex-lg-row';
  }

  return $classNames;
}
add_filter('bootscore/class/offcanvas/body', 'mobile_offcanvas_body_direction', 10, 2);

/**
 * Adds a flex-grow-1 class to the navbar nav.
 */
function grow_mobile_navbar_nav () {
  return 'flex-grow-1';
}
add_filter('bootscore/class/header/navbar-nav', 'grow_mobile_navbar_nav', 10, 2);


/**
 * Disable Font Awesome
 */
add_filter('bootscore/load_fontawesome', '__return_false');

/**
 * Icon helper creates a feater SVG icon element
 * @param string $name The name of the icon to render 
 * @param string $position Position of icon
 * @link https://feathericons.com
 */
function icon ($name, $position = '') {
  if ($position == 'start') {
    $position = ' icon-start';
  } else if ($position == 'end') {
    $position = ' icon-end';
  }

  return '<svg class="icon'. $position .'"><use href="'. get_stylesheet_directory_uri() .'/assets/fonts/icon.svg#'. $name .'"></svg>';
}

/**
 * Change nav-toggler icon
 */
function change_nav_toggler_icon() {
  return icon('menu');
}
add_filter('bootscore/icon/menu', 'change_nav_toggler_icon');

/**
 * Change search-toggler icon
 */
function change_search_toggler_icon() {
  return icon('search');
}
add_filter('bootscore/icon/search', 'change_search_toggler_icon');

/**
 * Change account-toggler user icon
 */
function change_account_toggler_icon() {
  return icon('log-out');
}
add_filter('bootscore/icon/user', 'change_account_toggler_icon');

/**
 * Change cart-toggler bag icon
 */
function change_cart_toggler_icon() {
  return icon('shopping-cart');
}
add_filter('bootscore/icon/cart', 'change_cart_toggler_icon');

/**
 * Change back-to-cart-toggler arrow icon
 */
function change_back_to_cart_arrow_icon() {
  return icon('chevron-right');
}
add_filter('bootscore/icon/arrow-left', 'change_back_to_cart_arrow_icon');

/**
 * Change sidebar offcanvas-toggler icon
 */
function change_sidebar_toggler_icon() {
  return icon('more-horizontal');
}
add_filter('bootscore/icon/ellipsis-vertical', 'change_sidebar_toggler_icon');

/**
 * Change WooCommerce mini-cart trash icon
 */
function change_trash_icon() {
  return icon('trash');
}
add_filter('bootscore/icon/trash', 'change_trash_icon');

/**
 * Change star icon
 */
function change_star_icon() {
  return icon('map-pin');
}
add_filter('bootscore/icon/star', 'change_star_icon');

/**
 * Change comments icon
 */
function change_comments_icon() {
  return icon('message-square');
}
add_filter('bootscore/icon/comments', 'change_comments_icon');

/**
 * Change breadcrumb home icon
 */
function change_home_icon() {
  return icon('home');
}
add_filter('bootscore/icon/home', 'change_home_icon');

/**
 * Change to-top button icon
 */
function change_to_top_icon() {
  return icon('chevron-up');
}
add_filter('bootscore/icon/chevron-up', 'change_to_top_icon');

/**
 * Change category badge class
 */
function change_category_badge_link_class($class) {
  return 'badge bg-primary-subtle border border-primary-subtle text-primary-emphasis text-decoration-none border border-primary';
}
add_filter('bootscore/class/badge/category', 'change_category_badge_link_class');

/**
 * Change widget categories badge
 */
function change_block_widget_categories_badge($block_content, $block) {
  
    $search  = array(
      '<span class="badge bg-primary-subtle text-primary-emphasis border border-primary">'
    );
    $replace = array(
      '<span class="badge bg-danger-subtle text-danger-emphasis border border-danger">'
    );  

  return str_replace($search, $replace, $block_content);
}
add_filter('bootscore/block/categories/content', 'change_block_widget_categories_badge', 10, 2);

