<?php

/*
 *  UCFBands CPT Single Template: Announcement
 *    
 *  @author Jordan Pakrosnis
*/


// REMOVE SIDEBAR, POST INFO, & META //
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );


add_action( 'genesis_before_entry_content', 'ucfbands_announcement_single_date' );

function ucfbands_announcement_single_date() {

    $post_ID = get_the_id();
    $post = get_post($post_ID);

    echo $post_ID;
    ?>


    <!-- DATE -->
    <span class="announcement-date">
        <i class="fa fa-calendar"></i>&nbsp; <?php echo mysql2date( 'F j, Y', $post->post_date ) ?>
    </span>
    
    <?php

} // ucfbands_announcement_single_date()


//-- LOAD FRAMEWORK --//
genesis();
