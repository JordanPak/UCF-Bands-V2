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
    
    wp_enqueue_script( 'jquery-masonry-init', get_stylesheet_directory_uri() . '/inc/js/masonry-init.js', array( 'jquery-masonry' ), true );
    
}