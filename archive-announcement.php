<?php

/*
 *  UCFBands Theme Functionality
 *  Archive: Announcements
 *    
 *  @author Jordan Pakrosnis
*/

// REMOVE SIDEBAR //
remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );


//-- LOAD FRAMEWORK --//
genesis();