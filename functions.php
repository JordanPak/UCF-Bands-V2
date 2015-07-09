<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );


//-- INCLUDES --//

//* THEME SETTINGS
require_once( CHILD_DIR . '/theme-settings/footer.php' );

// SHORTCODES
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



//* Customize Site Footer
remove_action( 'genesis_footer', 'genesis_do_footer' );

add_action( 'genesis_footer', 'ucfbands_footer' );
function ucfbands_footer() {
    
    
    //-- GET OPTIONS --//
    
    // Social
    $footer_facebook_url = genesis_get_option( 'ucfbands_footer_facebook_url', GENESIS_SETTINGS_FIELD );
    $footer_twitter_url = genesis_get_option( 'ucfbands_footer_twitter_url', GENESIS_SETTINGS_FIELD );
    $footer_youtube_url = genesis_get_option( 'ucfbands_footer_youtube_url', GENESIS_SETTINGS_FIELD );
    
    // Address & Google Map
    $footer_address_url = genesis_get_option( 'ucfbands_footer_address_url', GENESIS_SETTINGS_FIELD );
    $footer_address_name1 = genesis_get_option( 'ucfbands_footer_address_name1', GENESIS_SETTINGS_FIELD );
    $footer_address_name2 = genesis_get_option( 'ucfbands_footer_address_name2', GENESIS_SETTINGS_FIELD );
    $footer_address_street = genesis_get_option( 'ucfbands_footer_address_street', GENESIS_SETTINGS_FIELD );
    $footer_address_city_state_zip = genesis_get_option( 'ucfbands_footer_address_city_state_zip', GENESIS_SETTINGS_FIELD );
    $footer_google_map_code = genesis_get_option( 'ucfbands_footer_google_map_code', GENESIS_SETTINGS_FIELD );
    
    // Website Credits
    $footer_credits_text = genesis_get_option( 'ucfbands_footer_credits_text', GENESIS_SETTINGS_FIELD );
    $footer_credits_url = genesis_get_option( 'ucfbands_footer_credits_url', GENESIS_SETTINGS_FIELD );
    
    // Copyright Name
    $footer_copyright_name = genesis_get_option( 'ucfbands_footer_copyright_name', GENESIS_SETTINGS_FIELD );
    
    
	// Footer HTML
    echo '<footer class="site-footer" role="contentinfo" itemscope="itemscope" itemtype="http://schema.org/WPFooter"><div class="wrap">';

    
    //-- OUTPUT OPTIONS --//

    // Social
    if ( $footer_facebook_url || $footer_twitter_url || $footer_youtube_url ) {
    
        echo '<div id="footer-social">';
        
        if ( $footer_facebook_url ) {
            echo '<a href="' . esc_url( $footer_facebook_url ) . '" target="_BLANK"><i class="fa fa-facebook fa-lg"></i></a>';
        }
        if ( $footer_twitter_url ) {
            echo '<a href="' . esc_url( $footer_twitter_url ) . '" target="_BLANK"><i class="fa fa-twitter fa-lg"></i></a>';
        }
        if ( $footer_youtube_url ) {
            echo '<a href="' . esc_url( $footer_youtube_url ) . '" target="_BLANK"><i class="fa fa-youtube-play fa-lg"></i></a>';
        }
        
        echo '</div>'; // #footer-social
        
    } // Social
    
    
    echo '<br>';
    
    
    // Address
    echo '<address><a href="' . esc_url( $footer_address_url ) . '" target="_BLANK">';
    
    if ( $footer_address_name1 ) {
        echo $footer_address_name1 . '<br>';
    }
    if ( $footer_address_name2 ) {
        echo $footer_address_name2 . '<br>';
    }
    if ( $footer_address_street ) {
        echo $footer_address_street . '<br>';
    }
    if ( $footer_address_city_state_zip ) {
        echo $footer_address_city_state_zip . '<br>';
    }
    
    echo '</a></address>';
    
    
    if ( $footer_credits_text ) {
        echo '<a href="' . esc_url( $footer_credits_url ) . '">' . $footer_credits_text . '</a>';
    }
    if ( $footer_copyright_name ) {
        echo ' | &copy; ' . $footer_copyright_name . ' ' . date('Y');    
    }
    
    // End Footer HTML
    echo '</div></footer>';

} // ucfbands_footer



// ISOTOPE: Add div.grid


/** Remove Edit Link */
add_filter( 'edit_post_link', '__return_false' );



//-- FIRE UP CMB2! --//
if ( file_exists(  __DIR__ . '/cmb2/init.php' ) ) {
  require_once  __DIR__ . '/cmb2/init.php';
} elseif ( file_exists(  __DIR__ . '/CMB2/init.php' ) ) {
  require_once  __DIR__ . '/CMB2/init.php';
}