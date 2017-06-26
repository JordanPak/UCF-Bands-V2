<?php

// Do filter function on default page template
if ( basename( get_page_template() ) == 'page.php' ){
    
    add_filter( 'genesis_post_title_text', 'add_post_title_icon' );
}


/**
 * Add Post Title Icon
 * Adds post title icon (using the settings) for default page template
 *
 * @author Jordan Pakrosnis
 */
function add_post_title_icon( $title ) {
    
    // Post ID
    $post_ID = get_the_ID();
    
    // Set Meta ID
    $meta_id_prefix = '_ucfbands_page_settings_';
    
    // GET TITLE SETTINGS META
    $icon               = get_post_meta( $post_ID, $meta_id_prefix . 'icon', true );
    $icon_position      = get_post_meta( $post_ID, $meta_id_prefix . 'icon_position', true );
    
    
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
    
    // Concat title with icon
    $title = $icon_before . $title . $icon_after;

    return $title;
}