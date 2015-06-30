<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'UCFBands' );
define( 'CHILD_THEME_URL', 'http://ucfbands.com/' );
define( 'CHILD_THEME_VERSION', '2.0.0' );

//* Enqueue Google Fonts
add_action( 'wp_enqueue_scripts', 'genesis_sample_google_fonts' );
function genesis_sample_google_fonts() {

//	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Oswald:400,700', array(), CHILD_THEME_VERSION );
    wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Droid+Serif|Roboto:400,400italic,700,700italic|Oswald', array(), CHILD_THEME_VERSION );
}

//* Add HTML5 markup structure
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Add support for custom background
add_theme_support( 'custom-background' );

//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );