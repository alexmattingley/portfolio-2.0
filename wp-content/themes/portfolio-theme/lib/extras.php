<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Config;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Config\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');

// img unautop
function img_unautop($pee) {
    $pee = preg_replace('/<p>\\s*?(<a .*?><img.*?><\\/a>|<img.*?>)?\\s*<\\/p>/s', '<div class="figure">$1</div>', $pee);
    return $pee;
}
add_filter( 'the_content', __NAMESPACE__ .'\\img_unautop', 30 );


/*===============================================
=            Begin Grizzly Functions            =
===============================================*/



/*==========  ACF Options Page Setup  ==========*/

if( function_exists('acf_add_options_page') ) {

  acf_add_options_page(array(
    'page_title'  => 'Theme General Settings',
    'menu_title'  => 'Theme Settings',
    'menu_slug'   => 'theme-general-settings',
    'capability'  => 'edit_posts',
    'redirect'    => false
  ));

  acf_add_options_sub_page(array(
    'page_title'  => 'Social Settings',
    'menu_title'  => 'Social',
    'parent_slug' => 'theme-general-settings',
  ));

  acf_add_options_sub_page(array(
    'page_title'  => 'Theme Footer Settings',
    'menu_title'  => 'Footer',
    'parent_slug' => 'theme-general-settings',
  ));

}


/*==========  Pretty Printing for printing arrays or variables  ==========*/

function prettyPrint( $var, $args = array() ) {
  $defaults = array(
    'strip_tags'    => false,
    'allow_tags'  => null
  );

  $options = array_merge($defaults, $args);

  if( $options['strip_tags'] ){
    $var = strip_tags($var, $options['allow_tags']);
  }

  echo '<pre>';
  print_r($var);
  echo '</pre>';

}

/* Example usage: Extras\prettyPrint($map); */




/*==========  Allows for SVG to be uploaded  ==========*/

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', __NAMESPACE__ . '\\cc_mime_types');



/**
* Custom Excerpt
* 
* returns your content with your desired character length
* ex. related_excerpt(get_the_content(), 40)
* ex. related_excerpt(get_the_title(), 20)
**/

function related_excerpt( $content = null, $length ) {
  $excerpt = $content;
  $excerpt = strip_shortcodes($excerpt);
  $excerpt = strip_tags($excerpt);

  if ( strlen($excerpt) <= $length ) {
    return $excerpt;
  } else {
    $excerpt = substr($excerpt, 0, $length);
    $excerpt = $excerpt . '...';
    return $excerpt;
  }

}


/*=============================================
=            Adds admin stylesheet            =
=============================================*/


function load_admin_style() {
  wp_register_style( 'admin_css', get_template_directory_uri() . '/dist/styles/admin-style.css', false, '1.0.0' );
  wp_enqueue_style( 'admin_css', get_template_directory_uri() . '/dist/styles/admin-style.css', false, '1.0.0' );
}

add_action( 'admin_enqueue_scripts', __NAMESPACE__ . '\\load_admin_style' );
