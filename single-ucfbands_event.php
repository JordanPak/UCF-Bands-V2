<?php

/*
 *  UCFBands CPT Single Template: Events
 *    
 *  @author Jordan Pakrosnis
*/

// REMOVE SIDEBAR & STANDARD LOOP //
remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );


// Add full-width-content Body Class
require_once( CHILD_DIR . '/inc/full-width-content.php' );





//-- LOAD FRAMEWORK --//
genesis();
