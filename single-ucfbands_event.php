<?php

/*
 *  UCFBands CPT Single Template: Event
 *    
 *  @author Jordan Pakrosnis
*/

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
    $event_meta = ucfbands_event_get_meta( $event );
    
} // ucfbands_event_single_data() 




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
    
    echo $event_date;
    
    
    // FACEBOOK SHARE BUTTON
    echo '<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=330141470465449";
  fjs.parentNode.insertBefore(js, fjs);
}(document, \'script\', \'facebook-jssdk\'));</script>';
    
    echo '<div class="fb-share-button" data-href="' . get_permalink() . '" data-layout="button"></div>';
    
    
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
    $location = '<span class="location">';

        if ( $event_meta['location_name'] == '' )
            $location .= 'TBA';

        else
            $location .= $event_meta['location_name'];


    $location .= '</span>';
    
    
    
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
        echo '<i class="fa fa-map-marker"></i> ' . $location;
    
    
    // Close Wrapper
    echo '</span>';
    
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



add_action( 'genesis_entry_content', 'ucfbands_event_single_content_location', 5 );

/**
 * UCFBands Event Single - Content & Location
 *
 * @author Jordan Pakrosnis
 */
function ucfbands_event_single_content_location() {
    
    // EVENT DETAILS (Content)
    echo '<div class="two-thirds first">';
        
        the_content();
    
    echo '</div>';
    
    echo '<div class="one-third"><h2><i class="fa fa-map-marker"></i>&nbsp;&nbsp;Location</h2><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3502.91164238481!2d-81.20005989999996!3d28.602427399999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88e7685d6a0a495f%3A0x5fd59b92b3c79bab!2sUniversity+of+Central+Florida!5e0!3m2!1sen!2sus!4v1438201178230" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
    <br>
    <address>
    <b>University of Central Florida</b><br>
    4000 Central Florida Blvd<br>
    Orlando, FL 32817
    </address>
    </div>';
    
} // ucfbands_event_single_content()



add_action( 'genesis_entry_content', 'ucfbands_event_single_schedule_repitoire', 15 );

/**
 * UCFBands Event Single - Schedule and Repitoire
 *
 * @author Jordan Pakrosnis
 */
function ucfbands_event_single_schedule_repitoire() {
    
    // Wrap
    echo '<div class="event-schedule-location-repitoire clearfix">';
    
        // HR
        echo '<hr>';
    
    
        // Schedule
        echo '<div class="one-half first"><h2>Schedule</h2>';
        echo '</div>';
    
    
        // Program
        echo '<div class="one-half"><h2>Program</h2>';
        echo '</div>';    
    
    
    // Wrap Close
    echo '</div>';
    
} // ucfbands_event_single_schedule_repitoire()



//-- LOAD FRAMEWORK --//
genesis();
