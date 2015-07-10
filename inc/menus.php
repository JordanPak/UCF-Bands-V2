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



// REGISTER MAIN MENU
//add_filter( 'genesis_after_header', 'register_main_menu' );
//function register_main_menu() {
//  echo '<div class="">';
//	$args = array(
//			'theme_location'  => 'main-menu',
//			'container'       => 'nav',
//			'container_class' => 'wrap',
//			'menu_class'      => 'menu genesis-nav-menu menu-tertiary',
//			'depth'           => 1,
//		);
//	wp_nav_menu( $args );
//  echo '</div>';
//}