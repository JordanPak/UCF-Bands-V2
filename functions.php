<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'UCFBands' );
define( 'CHILD_THEME_URL', 'http://ucfbands.com/' );
define( 'CHILD_THEME_VERSION', '2.0.0' );

//* Enqueue Google Fonts
add_action( 'wp_enqueue_scripts', 'ucfbands_google_fonts' );
function ucfbands_google_fonts() {

    wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Droid+Serif|Roboto:400,400italic,700,700italic|Oswald', array(), CHILD_THEME_VERSION );
    
    wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css', array(), CHILD_THEME_VERSION );
    
}

//* Enque JS Stuff
add_action( 'wp_enqueue_scripts', 'ucfbands_scripts' );
function ucfbands_scripts() {
    
    wp_enqueue_script( 'ucfb-masonry', get_stylesheet_directory_uri() . '/js/masonry.pkgd.min.js', array('jquery'), CHILD_THEME_VERSION );
    wp_enqueue_script( 'ucfb-masonry-init', get_stylesheet_directory_uri() . '/js/masonry-init.js', array('jquery', 'ucfb-masonry'), CHILD_THEME_VERSION );
}


//* Add HTML5 markup structure
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );


//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );


//* Add support for custom background
//add_theme_support( 'custom-background' );

//* Add support for 3-column footer widgets
//add_theme_support( 'genesis-footer-widgets', 3 );


// Add Top Bar
add_action( 'genesis_before_header', 'add_top_bar' );
function add_top_bar() {
    echo '<div id="top-bar"></div>';
}


// ISOTOPE: Add div.grid


/** Remove Edit Link */
add_filter( 'edit_post_link', '__return_false' );