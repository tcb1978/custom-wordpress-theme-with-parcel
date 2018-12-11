<?php
// include theme menu
add_theme_support( 'menus' );

// include menu location
register_nav_menus( array(
  'top-menu' => __('Top Menu', 'theme'),
  'footer-menu' => __('Footer Menu', 'theme')
));

// include styles
function load_stylesheets() {
  wp_register( 'style', get_template_directory_uri(  ) . '/style.css', array(), false, 'all' );
  wp_enqueue_style( 'style' );
}
add_action( 'wp_enqueue_scripts', 'load_stylesheets' );

// include scripts
// function loadjs() {
//   wp_register_script( 'customjs', get_template_directory_uri(  ) . './js/index.js', '', 1, true );
//   wp_enqueue_scripts( 'customjs' );
// }
// add_action( 'wp_enqueue_scripts', 'loadjs' );

//include jquery
function include_jquery() {
  wp_deregister_script( 'jquery' );

  wp_enqueue_script( 'jquery', get_template_directory_uri(  ) . '/js/jquery-3.3.1.min.js', '', 1, true );
  add_action( 'wp_enqueue_scripts', 'jquery' );
}
add_action( 'wp_enqueue_scripts', 'include_jquery' );

// include post thumbnails
add_theme_support( 'post-thumbnails' );

// set image sizes
add_image_size( 'smallest', 300, 300, true );
add_image_size( 'largest', 800, 800, true );