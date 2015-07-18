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
    
    ?>
    
    <div class="pre-content-shortcode">
        
        <h1>LOOK AT DIS PIFF</h1>
        
    </div><!-- /.pre-content-shortcode -->

    <?php
    
} // ucfbands_pre_content_shortcode()