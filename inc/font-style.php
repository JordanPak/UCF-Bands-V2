<?php 

/**
 *  Font Style
 */


add_filter( 'body_class', 'body_class_font_style' );

/**
 * Body Class Font Style
 *
 * Check to see if page setting for athletic font is set
 *
 * @author Jordan Pakrosnis
 */
function body_class_font_style( $classes ) {
    
    $post_ID = get_the_ID();
    
    $font_style = get_post_meta( $post_ID, '_ucfbands_page_settings_font_style', true );
    
    if ($font_style == 'athletic') {
        $classes[] = 'font-style-athletic';   
    }
    
    return $classes;
}