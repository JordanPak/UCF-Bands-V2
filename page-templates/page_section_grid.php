<?php
/*
 * Template Name: Section Page (Block Grid)
 */

// REMOVE SIDEBAR & POST CONTENT //
remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );
remove_action( 'genesis_entry_content', 'genesis_do_post_content' );
remove_action( 'genesis_loop', 'genesis_do_loop' );


// Page Header
require_once( CHILD_DIR . '/inc/page-header.php' );


// Disable Grid Padding
add_filter( 'body_class', 'body_class_disable_grid_padding' );
function body_class_disable_grid_padding( $classes ) {
    
    $post_ID = get_the_ID();
    
    $disable_grid_padding = get_post_meta( $post_ID, '_ucfbands_page_settings_disable_grid_padding', true );
    
    if ($disable_grid_padding) {
        $classes[] = 'content-sidebar-wrap-disable-padding';   
    }
    
    return $classes;
}


// Grid Page Content
add_action( 'genesis_before_content', 'ucfbands_grid_page_content', 11);
function ucfbands_grid_page_content() {
    
    $post = get_post();
    
    // Password Protection					
    if ( post_password_required( $post ))
        echo ucfbands_password_form( $post, true );

    else
        echo apply_filters( 'the_content', $post->post_content );
    
} // ucfbands_grid_page_content()


// Page Title
require_once( CHILD_DIR . '/inc/page-title.php' );


// Masonry Init & Output
require_once( CHILD_DIR . '/inc/masonry.php' );
require_once( CHILD_DIR . '/inc/masonry-blocks.php' );


//-- LOAD FRAMEWORK --//
genesis();