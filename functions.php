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
    // wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Droid+Serif:400,700|Roboto:400,400italic,700,700italic|Oswald', array(), CHILD_THEME_VERSION );
    // wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Montserrat:700,700i|Roboto:400,400i|Oswald', array(), CHILD_THEME_VERSION );
    wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Montserrat:700,700i|Open+Sans:400,400i,700', array(), CHILD_THEME_VERSION );

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


// use a new site title ("The Tab")
remove_action( 'genesis_site_title', 'genesis_seo_site_title' );
add_action( 'genesis_site_title', 'ucfbands_site_title' );

function ucfbands_site_title() { ?>

    <p class="site-title" itemprop="headline"><a href="<?php echo home_url(); ?>">

        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
            viewBox="0 0 79.8 107.5" enable-background="new 0 0 79.8 107.5" xml:space="preserve">
        <rect x="0" width="79.8" height="107.5"/>
        <g>
            <path fill="#FFFFFF" d="M15.3,86v-9.6H19v9.5c0,2.7,1.4,4.1,3.6,4.1c2.3,0,3.6-1.4,3.6-4v-9.6h3.7v9.5c0,5.1-2.9,7.6-7.4,7.6
                C18,93.4,15.3,90.9,15.3,86z"/>
            <path fill="#FFFFFF" d="M33.6,84.8L33.6,84.8c0-4.8,3.6-8.7,8.7-8.7c3.2,0,5.1,1.1,6.6,2.6l-2.3,2.7c-1.3-1.2-2.6-1.9-4.3-1.9
                c-2.8,0-4.9,2.3-4.9,5.2v0c0,2.9,2,5.3,4.9,5.3c1.9,0,3.1-0.8,4.4-2l2.3,2.4c-1.7,1.8-3.6,3-6.9,3C37.3,93.5,33.6,89.7,33.6,84.8z"
                />
            <path fill="#FFFFFF" d="M52.8,76.4h12.8v3.4h-9.1v3.6h8v3.4h-8v6.5h-3.7V76.4z"/>
        </g>
        <g>
            <path fill="#F5C400" d="M49.9,58.2c0-1.4-0.3-2.7-1-4c-1.2-2.4-5-4.2-8.7-5.9c-1.8-0.8-3.6-1.7-5-2.5c-6.9-4.2-9.1-9.3-9.8-12.8
                c-0.2-1-0.3-2-0.3-2.9c0-3,0.9-5.9,2.5-8.1c6.5-8.7,17.5-7.7,20.7-7.2c-3.2,0.1-11,1.5-14.8,9c-0.7,1.5-1.1,3-1.1,4.5
                c0,6.1,6.2,11.3,11.2,15.6c1.7,1.5,3.4,2.8,4.6,4.1c2.2,2.3,3.3,4.8,3.3,7.3c0,3-1.5,5.4-2.5,6.5C49.7,60.6,49.9,59.4,49.9,58.2"/>
            <path fill="#F5C400" d="M19.4,54.6c1.5,1.3,4.7,3.4,10.6,5c3,0.8,5.8,0.9,8.1,1c2,0,3.6,0.1,4.6,0.6c0.8,0.5,1.3,1.2,1.3,2L44,63.7
                c-0.3,1.1-1.8,2.3-5.3,2.4C28.4,66.2,21.9,58.4,19.4,54.6"/>
            <path fill="#F5C400" d="M38,36.8c0,0,4.3-7.2,8.7-8.3c5.4-1.4,8.3,0.9,8.3,0.9l1.5-2.9l2.3,11.2c0,0,0.4,1-1.5,2.3
                c-1.9,1.3-2,1-2,1s-1.2-4.6-3.6-5.1c-2.4-0.5-2.4,2.7-2.3,3.7c0.1,1,2.2,5.2,5.6,3.5c3.8-1.9,5.5-4.3,5.5-4.3s0.5-1.3,1.1-0.9
                c0.5,0.4,2.5,2.6,2.5,2.6l-0.8,13.4c0,0,0,1.7-2.3,2.3c-2.3,0.6-2.3,0.5-2.3,0.5l1.2-4.1h1.5L61.1,43c0,0-1.3,6.2-3.6,10.2
                c-2.8,4.9-7.4,8.8-7.4,8.8s2.9-3.4,2.4-7.6c-0.3-2.8-1.5-6-7.5-11C41.6,40.7,38,36.8,38,36.8"/>
            <path fill="#F5C400" d="M45.1,62.9c0-0.4-0.1-0.8-0.3-1.2c-0.7-1.3-2.5-2-5.5-2.1c-5.4-0.2-18.2-1.5-21.8-10
                c-1.2-2.7-1.7-5.7-1.7-8.8c0-3.6,0.8-6.5,1.3-8.1c-0.1,0.4-0.1,1.2-0.1,1.2c0,3.4,0.8,9.7,6.2,14.1c3.4,2.8,8.6,5.1,15.3,6.7
                c4.5,1.1,7.1,2.7,7.7,4.8l0.1,0.9c0,1.1-0.5,2.2-1.3,3.3C45,63.4,45.1,62.9,45.1,62.9"/>
            <path fill="#F5C400" d="M47.4,60.5c0-0.6-0.1-1.3-0.4-1.9c-1-2.3-3.7-4-8.1-4.9c-11.6-2.5-18.1-7.2-20.1-14.2
                c-0.5-1.7-0.7-3.3-0.7-4.9c0-9.6,8.4-14.8,11.3-16.2c-1.5,1.4-4.8,5-5.4,9.5c-0.1,0.8-0.2,1.6-0.2,2.4c0,5.7,2.9,10.7,8.9,15.3
                c1.9,1.4,4.5,2.6,6.9,3.7c3.5,1.6,6.9,3.1,8.2,5.3c0.7,1.1,0.9,2.2,0.9,3.2c0,2.1-1.1,3.7-1.8,4.7C47.3,61.9,47.4,61.3,47.4,60.5"
                />
            <path fill="#F5C400" d="M47.1,21.1c-1.9,0-3.6-1.7-3.6-3.6c0,1.9-1.7,3.6-3.6,3.6c1.9,0,3.6,1.7,3.6,3.6
                C43.5,22.9,45.2,21.1,47.1,21.1"/>
        </g>
        </svg>

    </a></p><!-- .site-title -->

<?php }


//------------------------------//
//  REMOVE USELESS ADMIN MENUS  //
//------------------------------//

function ucfbands_remove_admin_menus(){
    remove_menu_page( 'edit.php' );             // Posts
    remove_menu_page( 'edit-comments.php' );    //Comments
}
add_action( 'admin_menu', 'ucfbands_remove_admin_menus' );
