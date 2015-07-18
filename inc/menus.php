<?php

/**
 * UCFBands Menu Registration & Configuration
 *
 * @author Jordan Pakrosnis
 */


// REGISTER MENU LOCATIONS
add_theme_support( 'genesis-menus', array(
    'primary'           => __( 'Primary Navigation Menu', 'genesis' ),
    'concert-band'      => __( 'Concert Band Section Menu', 'genesis' ),
    'symphonic-band'    => __( 'Symphonic Band Section Menu', 'genesis' ),
    'wind-ensemble'     => __( 'Wind Ensemble Section Menu', 'genesis' ),
    'marching-knights'  => __( 'Marching Knights Section Menu', 'genesis' ),
    'jammin-knights'    => __( 'Jammin\' Knights Section Menu', 'genesis' ),
    'mkmc'              => __( 'MKMC Section Menu', 'genesis' )
) );



// PRIMARY MENU REGISTRATION & CONFIGURATION

// Unregister header widget area
unregister_sidebar( 'header-right' );

// Move do_nav inside the header
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_header', 'genesis_do_nav', 12 );




add_action( 'genesis_header', 'ucfbands_mobile_menu', 14 );
/**
 * UCFBands Mobile Menu
 * Outputs the Primary Navigation Menu into the Pushy Menu
 *
 * @author Jordan Pakrosnis
 */
function ucfbands_mobile_menu() {
    
    echo '<h2>TESTING BEFORE HEADER CLOSE</h2>';
    
} // ucfbands_mobile_menu()



/**
 * Section Menu Configuration & Output
 * 
 * @author Jordan Pakrosnis
 */
function section_menu_configuration() {


    add_action( 'genesis_before_content_sidebar_wrap', 'add_section_menu', 11);
    /**
     * Add Section Menu
     * Matches a menu and location to the Section Page slug
     *
     * @author Jordan Pakrosnis
     */
    function add_section_menu() {

        $post = get_post();

        $section_menu_args = array(
            'menu'            => $post->post_name,
            'container'       => 'nav',
            'container_class' => 'section-menu',
//            'menu_class'      => 'section-menu',
            'echo'            => true,
            'depth'           => 2,
    //        'walker'          => ''
        );

        // Output Menu
        wp_nav_menu( $section_menu_args );

    } // add_section_menu()
    
} // section_menu_configuration()