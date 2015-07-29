<?php

/*
 *  UCFBands CPT Single Template: Events
 *    
 *  @author Jordan Pakrosnis
*/

// REMOVE SIDEBAR, POST INFO, & META //
remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );



// FULL-WIDTH CLASS
require_once( CHILD_DIR . '/inc/full-width-content.php' );





//-- LOAD FRAMEWORK --//
genesis();
