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

    // Post ID
    $post_ID = get_the_ID();
    
    // Section Classes
    $page_title_section_classes = 'page-title';
    
    
    // Get Title Settings Meta
    $remove_page_title  = get_post_meta( $post_ID, '_ucfbands_page_title_remove_page_title', true );
    $conductor_name     = get_post_meta( $post_ID, '_ucfbands_page_title_conductor_name', true );
    
    
    // Get Featured Image Background
    $page_featured_image = wp_get_attachment_url( get_post_thumbnail_id( $post_ID ) );
    
    if ($page_featured_image) {
        $page_featured_image = 'background-image: url(' . $page_featured_image . ') ';
        $page_title_section_classes .= ' page-title-lg';
    }
    
    
    // Conductor Name
    if ($conductor_name) {
        $conductor_name = '<span class="conductor-name"><i class="fa fa-user"></i>&nbsp;&nbsp;Conductor: ' . $conductor_name . '</span>';   
    }
    
    
    // Remove Page Title
    if ($remove_page_title == false) {
        
        ?>
        
        <section class="<?php echo $page_title_section_classes; ?>" style="<?php echo $page_featured_image; ?>">
            
            <?php genesis_do_post_title(); ?>
            
            <?php echo $conductor_name; ?>

        </section>


        <?php
        
    } // if Remove Page Title
    
} // ucfbands_custom_page_title()
