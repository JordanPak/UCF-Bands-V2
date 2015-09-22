<?php

/*
 *  UCFBands CPT Single Template: Event
 *
 *  @author Jordan Pakrosnis
*/


// GOOGLE MAPS API
add_action( 'wp_enqueue_scripts', 'ucfbands_google_maps_api' );
function ucfbands_google_maps_api() {

    wp_enqueue_script( 'google-maps-api', 'http://maps.googleapis.com/maps/api/js', array(), CHILD_THEME_VERSION );

} // ucfbands_google_maps_api()



// REMOVE SIDEBAR, POST INFO, & META //
remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );
remove_action( 'genesis_entry_content', 'genesis_do_post_content' );
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );


// FULL-WIDTH CLASS
require_once( CHILD_DIR . '/inc/full-width-content.php' );




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
    global $event_meta;
    $event_meta = ucfbands_event_get_meta( $event, true, true, true );

} // ucfbands_event_single_data()




add_filter( 'body_class', 'body_class_athletic_font' );

/**
 * UCFBands Event - Set Athletic Font if Athletic Event
 *
 * @author Jordan Pakrosnis
 */
function body_class_athletic_font( $classes ) {

    // Get Post ID
    $event = get_the_ID();

    // Get Event meta
    $event_meta = ucfbands_event_get_meta( $event );

    if ( $event_meta['icon_background_color'] == 'gold' )
        $classes[] = 'font-style-athletic';

    return $classes;

} // body_class_athletic_font()




add_action( 'genesis_entry_header', 'ucfbands_event_single_date_badge', 5 );

/**
 * UCFBands Event - Date Badge for Single
 *
 * @author Jordan Pakrosnis
 */
function ucfbands_event_single_date_badge() {

    $event_meta = $GLOBALS["event_meta"];

    $event_date = ucfbands_event_date_badge(
        $event_meta['start_date_time'],
        $event_meta['finish_date_time'],
        $event_meta['icon_background_color']
    );


    // Get Ticket Info
    $event_ticket_price =   $event_meta['ticket_price'];
    $event_ticket_link =    esc_url( $event_meta['ticket_link'] );


    $header_class_extra = '';

    // If there's no ticket info, add class to make header-left 100%
    if ( ($event_ticket_price == '') || ($event_ticket_price == '0.00') )
        $header_class_extra = ' full-width';

    // Header-Left Wrapper
    echo '<div class="header-left' . $header_class_extra . '">';

        echo $event_date;

} // ucfbands_event_single_date_badge()




add_action( 'genesis_entry_header', 'ucfbands_event_single_time_location' );

/**
 * UCFBands Event - Time & Location for Single
 *
 * @author Jordan Pakrosnis
 */
function ucfbands_event_single_time_location() {

    $event_meta = $GLOBALS["event_meta"];


    // Event Location Logic
    if ( $event_meta['location_name'] == '' )
        $location .= 'TBA';

    else
        $location .= $event_meta['location_name'];



    // WRAPPER
    echo '<span class="event-time-location">';


        //-- EVENT TIME --//
        $event_time = ucfbands_event_time(
            $event_meta['is_all_day_event'],
            $event_meta['start_date_time'],
            $event_meta['finish_date_time'],
            $event_meta['is_time_tba'],
            $event_meta['show_finish_time']
        );

        echo $event_time;



        //-- EVENT LOCATION --//
        echo '<span class="location"><i class="fa fa-map-marker"></i> ' . $location . '</span>';


    // Close Wrapper
    echo '</span>';

    // Close Header-Left Wrapper
    echo '</div>';



    $event_ticket_price =   $event_meta['ticket_price'];
    $event_ticket_link =    esc_url( $event_meta['ticket_link'] );


    // EVENT ADMISSION/TICKET PRICE
    if ( ($event_ticket_price != '') && ($event_ticket_price != '0.00') ) {

        // Open Header-Right Wrapper, as needed
        echo '<div class="header-right">';


            // Free Admission
            if ( ($event_ticket_price == '0.01') || ($event_ticket_price == '00.01') ) {

                // If there's a Ticket Link
                if ( $event_ticket_link )
                    echo '<a class="event-ticket-price button button-med button-white" href="' . $event_ticket_link . '" target="_BLANK"><i class="fa fa-ticket"></i>&nbsp;&nbsp;Free&nbsp;Admission</a>';

                else
                    echo '<span class="event-ticket-price button button-med button-white no-hover" href="#"><i class="fa fa-ticket"></i>&nbsp;&nbsp;Free Admission</span>';
            }

            else
                echo '<a class="event-ticket-price button button-med" href="' . $event_ticket_link . '" target="_BLANK"><i class="fa fa-ticket"></i>&nbsp;&nbsp;Tickets&nbsp;&nbsp;|&nbsp;&nbsp;$' . $event_ticket_price . '</a>';


        // Close Header-Right Wrapper
        echo '</div>';

    } // if there's an event price



} // ucfbands_event_single_time_location()




add_action( 'genesis_entry_header', 'ucfbands_event_single_featured_image', 15 );

/**
 * UCFBands Event - Featured Image
 *
 * @author Jordan Pakrosnis
 */
function ucfbands_event_single_featured_image() {

    // Check for Image
    if ( has_post_thumbnail() )
        the_post_thumbnail();

    else // If none, use HR
        echo '<hr class="event-header-hr">';


} // ucfbands_event_single_featured_image()




add_action( 'genesis_entry_content', 'ucfbands_event_single_content', 5 );

/**
 * UCFBands Event Single - Content with Location, Schedule, and Program Data
 *
 * @author Jordan Pakrosnis
 */
function ucfbands_event_single_content() {

    $event_meta = $GLOBALS["event_meta"];


    // CONDITIONAL LAYOUT SETUP //

    // Defaults
    $show_content =                 false;
    $show_schedule =                true;
    $show_program =                 true;
    $show_hr =                      false;
    $show_schedule_program_wrap =   false;

    // Content
    if ( get_the_content() != '' ) {
        $show_content =     true;
        $show_hr      =     true;
        $show_schedule_program_wrap = true;

        $width_content =    'two-thirds first';
        $width_location =   'one-third';
        $width_schedule =   'one-half first';
        $width_program =    'one-half';
    }
    else {
        $width_location =   'one-third first';
        $width_schedule =   'one-third';
        $width_program =    'one-third';
    }

    // Schedule
    if ( $event_meta['attached_schedule'] == null )
        $show_schedule =    false;

    // Program
    if ( $event_meta['program_group'] == null )
        $show_program =     false;



    //-- POST CONTENT --//
    if ( $show_content ) {
        echo '<div class="' . $width_content . '">';
            the_content();
        echo '</div>';
    }


    //-- LOCATION --//

    // Column Wrapper & Title
    echo '<div class="' . $width_location . '"><h2><i class="fa fa-map-marker"></i>&nbsp;&nbsp;Location</h2>';

        // Google Map
        if ( ($event_meta['location_google_map_latitude'] != '') || ($event_meta['location_google_map_longitude'] != '') )
            ucfbands_event_google_map( $event_meta['location_google_map_latitude'], $event_meta['location_google_map_longitude'] );

        // Address
        $address = ucfbands_event_address( $event_meta['location_address'], $event_meta['location_name'] );
        echo $address;


    echo '</div>';


    // Wrap
    if ( $show_schedule_program_wrap )
        echo '<div class="event-schedule-repitoire clearfix">';


        // HR
        if ( $show_hr )
            echo '<hr>';


        //-- SCHEDULE --//
        if ( $show_schedule ) {

            echo '<div class="' . $width_schedule . '">';

                // Get Schedule Items
                $schedule = $event_meta['attached_schedule'];

                // Get Schedule
                echo ucfbands_output_schedule( $schedule, true );

            echo '</div>';
        } // show schedule



        //-- PROGRAM --//
        if ( $show_program ) {

            if ( $show_schedule ) {
                echo '<div class="' . $width_program . '">';
            }

            else {
                $width_program .= ' first';
                echo '<div class="' . $width_program . '">';
            }

                // Get Program & Guest Composer
                $program =                  $event_meta['program_group'];
                $program_guest_composer =   $event_meta['program_guest_composer'];

                // Get Program
                echo ucfbands_event_program( $program, $program_guest_composer );

            // Close Wrapper
            echo '</div>';

        } // show program


    // Wrap Close
    if ( $wrap_schedule_program )
        echo '</div>';

} // ucfbands_event_single_content()



//-- LOAD FRAMEWORK --//
genesis();
