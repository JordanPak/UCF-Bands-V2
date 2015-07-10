<?php

/*
 *  UCFBands Custom Page Title Settings
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
    
    
    // Set Meta ID
    $meta_id_prefix = '_ucfbands_page_settings_';
    
    
    // GET TITLE SETTINGS META
    $remove_page_title  = get_post_meta( $post_ID, $meta_id_prefix . 'remove_page_title', true );
    $icon               = get_post_meta( $post_ID, $meta_id_prefix . 'icon', true );
    $icon_position      = get_post_meta( $post_ID, $meta_id_prefix . 'icon_position', true );
    $conductor_name     = get_post_meta( $post_ID, $meta_id_prefix . 'conductor_name', true );
    
    
    // CONFIGURE ICON
    if ($icon) { 
        $icon = '<i class="fa fa-' . $icon . '"></i>';
        
        if ($icon_position === 'before') {
            $icon_before = $icon . '&nbsp;&nbsp;';
            $icon_after = '';
        }
        else {
            $icon_before = '';
            $icon_after = '&nbsp;&nbsp;' . $icon;
        }
    }
    
    
    // CONFIGURE CONDUCTOR NAME
    if ($conductor_name) {
        $conductor_name = '<span class="conductor-name"><i class="fa fa-user"></i>&nbsp;&nbsp;Conductor: ' . $conductor_name . '</span>';   
    }
    
        
    // CONFIGURE FEATURED IMAGE BACKGROUND
    $page_featured_image = wp_get_attachment_url( get_post_thumbnail_id( $post_ID ) );
    
    if ($page_featured_image) {
        $page_featured_image = 'background-image: url(' . $page_featured_image . ') ';
        $page_title_section_classes .= ' page-title-lg';
    }
    
    
    // DISPLAY PAGE TITLE
    if ($remove_page_title == false) {
        
        ?>
        
        
        <section class="<?php echo $page_title_section_classes; ?>" style="<?php echo $page_featured_image; ?>">
            
            <h1 class="entry-title" itemprop="headline">
                <?php
                    echo $icon_before;
                    echo the_title();
                    echo $icon_after;
                ?>
            </h1>
            
            <?php echo $conductor_name; ?>

        </section>


        <?php
        
    } // if Remove Page Title
    
} // ucfbands_custom_page_title()
