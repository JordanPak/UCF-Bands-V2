<?php

/**
 * UCFBands Genesis Child Theme
 * 
 * Include Masonry JS (or Isotope) on page
 */


//-- ENQUEUE MASONRY SCRIPTS --//
add_action('wp_enqueue_scripts', 'ucfbands_masonry_scripts');
function ucfbands_masonry_scripts() {
    
    // Included jQuery Masonry
    wp_enqueue_script( 'jquery-masonry', array( 'jquery' ), true );
    
    // Masonry Init
    wp_enqueue_script( 'jquery-masonry-init', get_stylesheet_directory_uri() . '/inc/js/masonry-init.js', array( 'jquery-masonry' ), true );
    
} // ucfbands_masonry_scripts()



//-- ADD MASONRY PAGE BODY CLASS--//
add_filter( 'body_class', 'body_class_masonry_page' );
/**
 * UCFBands Genesis Child Theme 
 * Add masonry-page class to masonry pages
 *
 * @author Jordan Pakrosnis
 */
function body_class_masonry_page( $classes ) {

    $classes[] = 'masonry-page';   
    
    return $classes;
    
} // body_class_masonry_page()