<?php
/*
 * Template Name: Grid
 */

// Masonry
require_once( CHILD_DIR . '/inc/masonry.php' );


// REMOVE SIDEBAR & POST CONTENT //
remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );
remove_action( 'genesis_entry_content', 'genesis_do_post_content' );
remove_action( 'genesis_loop', 'genesis_do_loop' );


// Page Title
require_once( CHILD_DIR . '/inc/page-title.php' );


// Show Blocks
require_once( CHILD_DIR . '/inc/show-blocks.php' );


//-- LOAD FRAMEWORK --//
genesis();