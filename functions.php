<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );


//-- INCLUDES --//

//* THEME SETTINGS
require_once( CHILD_DIR . '/theme-settings/footer.php' );

//* SHORTCODES
require_once( CHILD_DIR . '/shortcodes/block.php' );


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


//* Add HTML5 markup structure
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );


//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );


// Add Top Bar
add_action( 'genesis_before_header', 'add_top_bar' );
function add_top_bar() {
    echo '<div id="top-bar"></div>';
}



// ISOTOPE: Add div.grid


/** Remove Edit Link */
add_filter( 'edit_post_link', '__return_false' );



//-- FIRE UP CMB2! --//
if ( file_exists(  __DIR__ . '/cmb2/init.php' ) ) {
  require_once  __DIR__ . '/cmb2/init.php';
} elseif ( file_exists(  __DIR__ . '/CMB2/init.php' ) ) {
  require_once  __DIR__ . '/CMB2/init.php';
}