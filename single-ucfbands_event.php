<?php

/*
 *  UCFBands CPT Single Template: Event
 *    
 *  @author Jordan Pakrosnis
*/

// REMOVE SIDEBAR, POST INFO, & META //
remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );


// FULL-WIDTH CLASS
require_once( CHILD_DIR . '/inc/full-width-content.php' );



// GET POST & META
add_action( 'genesis_before_entry', 'ucfbands_event_single_data' );

/**
 * UCFBands Event - Get Post & Data
 *
 * @author Jordan Pakrosnis
 */
function ucfbands_event_single_data() {
    
    // Get Post ID
    $event = get_the_ID();
    
    // Get Event meta
    $event_meta = ucfbands_event_get_meta( $event );
    
} // ucfbands_event_single_data() 



// DATE & TIME
add_action( 'genesis_entry_header', 'ucfbands_event_single_time' );

/**
 * UCFBands Event - Get Post & Data
 *
 * @author Jordan Pakrosnis
 */
function ucfbands_event_single_time() {
    
    echo ucfbands_event_time(
        $event_meta['is_all_day_event'],
        $event_meta['start_date_time'],
        $event_meta['finish_date_time'],
        $event_meta['is_time_tba'],
        $event_meta['show_finish_time']
    );
    
} // ucfbands_event_single_data() 




//-- LOAD FRAMEWORK --//
genesis();
