<?php

/*
 *  UCFBands Theme Archive: Events
 *    
 *  @author Jordan Pakrosnis
*/

// REMOVE SIDEBAR & STANDARD LOOP //
remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );
remove_action ('genesis_loop', 'genesis_do_loop');



// Manual Page Header
//require_once( CHILD_DIR . '/inc/page-header-manual.php' );


// Add page header before content_sidebar_wrap
add_action( 'genesis_before_content_sidebar_wrap', 'ucfbands_page_header_manual' );

/*
 *  UCFBands Theme "Manual" Header
 *
 *  @author Jordan Pakrosnis
*/
function ucfbands_page_header_manual() {

    ?>

    <section class="page-header page-header-lg">

        <div class="page-header-inner">

            <h1 class="entry-title" itemprop="headline">Upcoming Events&nbsp;&nbsp;<i class="fa fa-calendar"></i></h1>

        </div>

    </section>

    <?php

} // ucfbands_page_header_manual()



add_action( 'genesis_before_content', 'archive_masonry_grid');
/**
 * Archive Masonry Grid
 *
 * @author Jordan Pakrosnis
 * @link http://ucfbands.com/
 */
function archive_masonry_grid() {
    
    
    //-- CPT QUERY --//
    $events = ucfbands_event_query( 20, 'all-bands' );
    
    
    // If there's events, do the grid
    if ( $events->have_posts() ):
        
        
        // MASONRY GRID CONTAINER //
    
        // Column Layout
        $masonry_column_layout = '6col';

        // Use Layout Option with container output
        echo '<section class="masonry-' . $masonry_column_layout . '-grid">';
            echo '<div class="masonry-' . $masonry_column_layout . '-grid-sizer"></div>';
            echo '<div class="masonry-' . $masonry_column_layout . '-gutter-sizer"></div>';


        
            // GET EVENTS LISTING //
            echo ucfbands_events_listing( $events, true );
               
        
        // End Grid
        echo '</section>';
        
    
    
        // PAGINATION //
        ?>    
        
        <!-- Pagination Container -->
        <div class="archive-pagination pagination">
            <ul>
                
                <!-- Previous Posts -->
                <li><?php previous_posts_link( 'Newer Announcements' ); ?></li>
                
                <!-- Older Announcements -->
                <li><?php next_posts_link( 'Older Announcements' ); ?></li>

            </ul>
        </div><!-- /.archive-pagination.pagination -->
        
        <?php
    
    
    endif; // if posts found
    

} // archive_masonry_grid()



//-- INCLUDE MASONRY --//
require_once( CHILD_DIR . '/inc/masonry.php' );


//-- LOAD FRAMEWORK --//
genesis();
