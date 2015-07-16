<?php

/*
 *  UCFBands Page Slider Output
 */

// Add page title before content_sidebar_wrap
add_action( 'genesis_before_content_sidebar_wrap', 'ucfbands_page_slider', 15);
/**
 *  UCFBands Page Slider
 *  Outputs/Renders a slider shortcode below the page title
 *  
 *  @author Jordan Pakrosnis
 */
function ucfbands_page_slider() {
    
    // Get Meta Option
    $slider_shortcode = get_post_meta( get_the_ID(), '_ucfbands_page_settings_slider_shortcode', true );
    
    // If the slider shortcode exists, put it here.
    if ($slider_shortcode != '') {
        
        echo '<div class="ucfbands-slider-wrap">';
        
            echo do_shortcode( $slider_shortcode );
        
        echo '</div>';
        
    } // if slider shortcode exists
    
} // ucfbands_page_slider()