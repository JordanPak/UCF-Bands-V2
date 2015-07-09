<?php

/*
 *  UCFBands Custom Page Title
 */


// Add page title before content_sidebar_wrap
add_action( 'genesis_before_content_sidebar_wrap', 'ucfbands_custom_page_title');
/**
 *  UCFBands Custom Page Title
 *  
 *  @author Jordan Pakrosnis
 */
function ucfbands_custom_page_title() {

    // Get Title Settings Meta
    $remove_page_title = get_post_meta( get_the_ID(), '_ucfbands_page_title_remove_page_title', true );
    
    
    // Remove Page Title
    if ($remove_page_title == false) {
        
        ?>
        
        <section class="page-title">


            <?php genesis_do_post_title(); ?>


        </section>


        <?php
        
    } // if Remove Page Title
    
} // ucfbands_custom_page_title()
