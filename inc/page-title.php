<?php

/*
 *  UCFBands Page Title for Grid Layouts
 */

add_action( 'genesis_before_content', 'ucfbands_page_title');
/**
 * Output Page Title
 * Outputs page title; intended for section grid templates
 *
 * @author Jordan Pakrosnis
 * @link http://ucfbands.com/
 */
function ucfbands_page_title() {
    
    
    $page_parents = get_post_ancestors( get_the_ID() );
    
    // Only Run if Sub-page
    if ( empty( $page_parents ) ) {
        
        // GET ID
        $post_ID = get_the_ID();


        // GET OPTIONS META
        $meta_id_prefix = '_ucfbands_page_settings_';

        $remove_title  = get_post_meta( $post_ID, $meta_id_prefix . 'remove_page_title', true );
        $icon           = get_post_meta( $post_ID, $meta_id_prefix . 'icon', true );
        $icon_position  = get_post_meta( $post_ID, $meta_id_prefix . 'icon_position', true );


        // PROCEED IF NOT REMOVED
        if ($remove_title == false) {


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
            } else {
                $icon_before = $icon_after = '';
            }


            // OUTPUT TITLE
            ?>

            <h1 class="entry-title section-page-title" itemprop="headline">
                <?php
                    echo $icon_before;
                    echo get_the_title();
                    echo $icon_after;
                ?>
            </h1>


            <?php


        } // if title is removed
        
    } // if sub-page
    
} // ucfbands_page_title()