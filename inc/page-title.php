<?php

/*
 *  UCFBands Page Title for Grid Layouts
 */

add_action( 'genesis_before_content', 'ucfbands_page_title');
/**
 * Output Page Title
 * Outputs page title; intended for grid templates
 *
 * @author Jordan Pakrosnis
 * @link http://ucfbands.com/
 */
function ucfbands_page_title() {
    
    // GET ID
    $post_ID = get_the_ID();
    
    
    // GET OPTIONS META
    $icon           = get_post_meta( $post_ID, $meta_id_prefix . 'icon', true );
    $icon_position  = get_post_meta( $post_ID, $meta_id_prefix . 'icon_position', true );
                
    
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
        
    
    // OUTPUT TITLE
    ?>

    <h1 class="entry-title" itemprop="headline">
        <?php
            echo $icon_before;
            echo get_the_title();
            echo $icon_after;
        ?>
    </h1>


    <?php
    
} // ucfbands_page_title()