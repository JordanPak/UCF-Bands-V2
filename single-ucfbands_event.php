<?php

/*
 *  UCFBands CPT Single Template: Events
 *    
 *  @author Jordan Pakrosnis
*/

// REMOVE SIDEBAR & POST INFO //
remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );

// FULL-WIDTH CLASS
require_once( CHILD_DIR . '/inc/full-width-content.php' );





//-- LOAD FRAMEWORK --//
genesis();
