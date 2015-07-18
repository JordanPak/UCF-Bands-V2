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
    
    <section style="text-align: center; display: block; width: 100%; padding: 150px; background-color: #FFCA06;">
        
        <h2 style="text-align: center; color: white; font-size: 4em;">BE THE #BOOGIE THAT BE</h2>
        
        <br>
        
        <a style="color: white; border-color: white;" class="button button-lg button-outline" href="#">JOIN THE MKS NOW</a>

    </section>

    <?php
    
} // ucfbands_pre_content_shortcode()