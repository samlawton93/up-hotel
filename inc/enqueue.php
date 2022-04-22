<?php

// Exit if accessed directly
defined('ABSPATH') || exit;

if(!function_exists('uphotel_scripts')) {
  /**
   * Load theme's Javascript and CSS sources.
  */

  function uphotel_scripts() {
    // Get theme data
    $the_theme = wp_get_theme();
    $theme_version = $the_theme->get('Version');

    $css_version = $theme_version . '.' . filemtime( get_template_directory() . '/css/theme.min.css' );
    wp_enqueue_style( 'font', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap' );
    wp_enqueue_style( 'metishealth-styles', get_template_directory_uri() . '/css/theme.min.css', array(), $css_version );
    wp_enqueue_style( 'FontAwesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css' );
    wp_enqueue_style( 'AOS', 'https://unpkg.com/aos@2.3.1/dist/aos.css' );

    wp_deregister_script('jquery');
    wp_enqueue_script( 'jquery', 'https://code.jquery.com/jquery-3.1.1.min.js', array(), '3.1.1', true );
    $js_version = $theme_version . '.' . filemtime( get_template_directory() . '/js/theme.min.js' );
    wp_enqueue_script( 'metishealth-scripts', get_template_directory_uri() . '/js/theme.min.js', array(), $js_version, true );
    wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array(), $js_version, true );
    wp_enqueue_script( 'lazysizes', get_template_directory_uri() . '/js/lazysizes.min.js', array(), $js_version, true );
    wp_enqueue_script( 'AOS', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array(), $js_version, true );
  }
}

add_action('wp_enqueue_scripts', 'uphotel_scripts');
