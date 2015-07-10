<?php

//------------------------//
//  START GENESIS ENGINE  //
//------------------------//
include_once( get_template_directory() . '/lib/init.php' );



//---------------------//
//  UCFBANDS INCLUDES  //
//---------------------//

// THEME SETTINGS
require_once( CHILD_DIR . '/inc/theme-settings/footer.php' );

// CUSTOM META BOXES (CMB2)
require_once( CHILD_DIR . '/inc/cmb/grid-blocks.php' );
require_once( CHILD_DIR . '/inc/cmb/page-settings.php' );

// SHORTCODES
//require_once( CHILD_DIR . '/inc/shortcodes/file.php' );


// CHILD THEME STUFF
define( 'CHILD_THEME_NAME', 'UCFBands' );
define( 'CHILD_THEME_URL', 'http://ucfbands.com/' );
define( 'CHILD_THEME_VERSION', '2.0.0' );


// ENQUEUE GLOBAL STYLES
add_action( 'wp_enqueue_scripts', 'ucfbands_global_styles' );
function ucfbands_global_styles() {
    
    // Google Fonts
    wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Droid+Serif|Roboto:400,400italic,700,700italic|Oswald', array(), CHILD_THEME_VERSION );
    
    // Font Awesome
    wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css', array(), CHILD_THEME_VERSION );
    
} // ucfbands_global_styles()



//-----------------------//
//  EXTRA GENESIS STUFF  //
//-----------------------//

// HTML5 Markup Structure
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

// Viewport Meta Tag
add_theme_support( 'genesis-responsive-viewport' );

// Remove Edit Link
add_filter( 'edit_post_link', '__return_false' );



//-----------------//
//  MORE UCFBANDS  //
//-----------------//

// Font Style Check
require_once( CHILD_DIR . '/inc/font-style.php' );

// ADD TOP BAR
add_action( 'genesis_before_header', 'add_top_bar' );
function add_top_bar() {
    echo '<div id="top-bar"></div>';
}

// CMB2
if ( file_exists(  __DIR__ . '/cmb2/init.php' ) ) {
  require_once  __DIR__ . '/cmb2/init.php';
} elseif ( file_exists(  __DIR__ . '/CMB2/init.php' ) ) {
  require_once  __DIR__ . '/CMB2/init.php';
}