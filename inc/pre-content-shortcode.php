<?php

/*
 *  UCFBands Pre-Content Shortcode
 */


// Add shortcode after header but before content_sidebar_wrap
add_action( 'genesis_before_content_sidebar_wrap', 'ucfbands_pre_content_shortcode', 15);
/**
 *  UCFBands Pre-Content Shortcode
 *  
 *  @author Jordan Pakrosnis
 */
function ucfbands_pre_content_shortcode() {
    
    // Get Meta Option
    $pre_content_shortcode = get_post_meta( get_the_ID(), '_ucfbands_page_settings_pre_content_shortcode', true );
    
    
    // If the shortcode exists, put it here.
    if ($pre_content_shortcode != '') {
        
        echo '<div class="pre-content-shortcode">';
        
            echo do_shortcode( $pre_content_shortcode );
        
        echo '</div>';
        
    } // if slider shortcode exists    

} // ucfbands_pre_content_shortcode()