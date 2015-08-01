<?php

add_filter( 'body_class', 'body_class_athletic_font' );

/**
 * "Manually" Set Athletic Font to Page
 *
 * @author Jordan Pakrosnis
 */
function body_class_athletic_font( $classes ) {

    $classes[] = 'font-style-athletic';   
    
    return $classes;
}
