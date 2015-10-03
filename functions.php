<?php

//------------------------//
//  START GENESIS ENGINE  //
//------------------------//
include_once( get_template_directory() . '/lib/init.php' );



//---------------------//
//  UCFBANDS INCLUDES  //
//---------------------//

// Jetpack Development Mode
add_filter( 'jetpack_development_mode', '__return_true' );


// MENUS
require_once( CHILD_DIR . '/inc/menus.php' );

// THEME SETTINGS
require_once( CHILD_DIR . '/inc/theme-settings/footer.php' );

// CUSTOM META BOXES (CMB2)
require_once( CHILD_DIR . '/inc/cmb/grid-blocks.php' );
require_once( CHILD_DIR . '/inc/cmb/page-settings.php' );


// CHILD THEME STUFF
define( 'CHILD_THEME_NAME', 'UCFBands' );
define( 'CHILD_THEME_URL', 'http://ucfbands.com/' );
define( 'CHILD_THEME_VERSION', '2.0.0' );



// PASSWORD PROTECTION
require_once( CHILD_DIR . '/inc/password-form.php' );


// ENQUEUE GLOBAL STYLES
add_action( 'wp_enqueue_scripts', 'ucfbands_global_styles' );
function ucfbands_global_styles() {

    // Google Fonts
    wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Droid+Serif:400,700|Roboto:400,400italic,700,700italic|Oswald', array(), CHILD_THEME_VERSION );

    // Font Awesome
    wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css', array(), CHILD_THEME_VERSION );

} // ucfbands_global_styles()


// ENQUEUE GLOBAL SCRIPTS
add_action( 'wp_enqueue_scripts', 'ucfbands_global_scripts' );
function ucfbands_global_scripts() {

    if ( !is_admin() ) {

        // Bootstrap (Custom Stuff)
        wp_enqueue_script( 'bootstrap-custom', get_stylesheet_directory_uri() . '/inc/js/bootstrap.min.js', array( 'jquery' ), CHILD_THEME_VERSION );

        // Pushy
        wp_enqueue_script( 'pushy', get_stylesheet_directory_uri() . '/inc/js/pushy.min.js', array( 'jquery' ), CHILD_THEME_VERSION );

        // jQuery UI Accordion
        wp_enqueue_script( 'jquery-ui-accordion' );

        // Accordion Init
        wp_enqueue_script( 'accordion-init', get_stylesheet_directory_uri() . '/inc/js/accordion-init.js', array('jquery')
		);

    } // if admin

} // ucfbands_global_scripts()



//-----------------------//
//  EXTRA GENESIS STUFF  //
//-----------------------//

// HTML5 Markup Structure
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

// Viewport Meta Tag
add_theme_support( 'genesis-responsive-viewport' );

// Remove Edit Link
add_filter( 'edit_post_link', '__return_false' );

//* Unregister secondary sidebar
unregister_sidebar( 'sidebar-alt' );

// Remove Genesis Layout Settings
remove_theme_support( 'genesis-inpost-layouts' );

//// Unregister content/sidebar layout setting
//genesis_unregister_layout( 'content-sidebar' );

// Unregister sidebar/content layout setting
genesis_unregister_layout( 'sidebar-content' );

// Unregister content/sidebar/sidebar layout setting
genesis_unregister_layout( 'content-sidebar-sidebar' );

// Unregister sidebar/sidebar/content layout setting
genesis_unregister_layout( 'sidebar-sidebar-content' );

// Unregister sidebar/content/sidebar layout setting
genesis_unregister_layout( 'sidebar-content-sidebar' );

// Unregister full-width content layout setting
genesis_unregister_layout( 'full-width-content' );


//-----------------//
//  MORE UCFBANDS  //
//-----------------//

// Favicon
add_filter( 'genesis_pre_load_favicon', 'ucfbands_favicon_filter' );
function ucfbands_favicon_filter( $favicon_url ) {
	return site_url() . '/wp-content/themes/ucfbands/images/favicon.ico';
}


// Font Style Check
require_once( CHILD_DIR . '/inc/font-style.php' );

// ADD TOP BAR
add_action( 'genesis_before_header', 'add_top_bar' );
function add_top_bar() {
    echo '<div id="top-bar"></div>';
}


// Icon settings support for default page template
require_once( CHILD_DIR . '/inc/page-header-default.php' );


// Page Slider
require_once( CHILD_DIR . '/inc/page-slider.php' );


// Pre-Content Shortcode
require_once( CHILD_DIR . '/inc/pre-content-shortcode.php' );


// CMB2
if ( file_exists(  __DIR__ . '/cmb2/init.php' ) ) {
  require_once  __DIR__ . '/cmb2/init.php';
} elseif ( file_exists(  __DIR__ . '/CMB2/init.php' ) ) {
  require_once  __DIR__ . '/CMB2/init.php';
}


//------------------------------//
//  REMOVE USELESS ADMIN MENUS  //
//------------------------------//

function ucfbands_remove_admin_menus(){
    remove_menu_page( 'edit.php' );             // Posts
    remove_menu_page( 'edit-comments.php' );    //Comments
}
add_action( 'admin_menu', 'ucfbands_remove_admin_menus' );
