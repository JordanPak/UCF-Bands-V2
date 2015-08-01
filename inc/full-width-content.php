<?php

/*
 *  UCFBands Full Width Content
 *  Adds "full-width-content" to body class.
 *    
 *  @author Jordan Pakrosnis
*/

add_filter( 'body_class', 'body_class_full_width_content' );
/**
 * UCFBands Genesis Child Theme 
 * Add masonry-page class to masonry pages
 *
 * @author Jordan Pakrosnis
 */
function body_class_full_width_content( $classes ) {

    $classes[] = 'full-width-content';   
    
    return $classes;
    
} // body_class_full_width_content()
