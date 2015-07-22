<?php

/*
 *  UCFBands Theme Functionality
 *  Archive: Announcements
 *    
 *  @author Jordan Pakrosnis
*/

// REMOVE SIDEBAR & STANDARD LOOP //
remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );
remove_action ('genesis_loop', 'genesis_do_loop');



add_action( 'genesis_before_content', 'archive_masonry_grid');
/**
 * Archive Masonry Grid
 *
 * @author Jordan Pakrosnis
 * @link http://ucfbands.com/
 */
function archive_masonry_grid() {
    
    
    //-- CPT QUERY --//
      
    // Taxonomy Query
    $tax_query = array(
        array(
            'taxonomy'  => 'band',
            'field'     => 'slug',
            'terms'     => 'all-bands',
        ),
    );
    
    // Query Options
    $announcements_args = array(
        'post_type'         => 'announcement',
        'tax_query'         => $tax_query,
        'fields'            => 'ids',
        'orderby'           => 'meta_value_num',
        'order'             => 'DSC',
        'posts_per_page'    => 16,
    );
    
    // Query/Get Post IDs
    $announcements = new WP_Query( $announcements_args );
    
    
    // If there's announcements, do the grid
    if ( $announcements->have_posts() ):
        
        
        // MASONRY GRID CONTAINER //
    
        // Column Layout
        $masonry_column_layout = '6col';

        // Use Layout Option with container output
        echo '<section class="masonry-' . $masonry_column_layout . '-grid">';
            echo '<div class="masonry-' . $masonry_column_layout . '-grid-sizer"></div>';
            echo '<div class="masonry-' . $masonry_column_layout . '-gutter-sizer"></div>';


        
        // LOOP THROUGH POSTS //
        while ( $announcements->have_posts() ): $announcements->the_post(); //global $post;
            
                    
            // Get the current post
            $post = get_post();
            
            ?>
            
            <!-- MASONRY BLOCK -->
            <div class="block masonry-block masonry-block-size--one-third">

                
                <!-- BLOCK TITLE -->
                <h3 class="block-header"><?php the_title(); ?></h3>
                
                
                <!-- DATE -->
                <span class="announcement-date">
                    <i class="fa fa-calendar"></i>&nbsp; <?php echo mysql2date( 'F j, Y', $post->post_date ) ?>
                </span>
                
                
                <!-- BLOCK CONTENT -->
                <div class="entry-content">
                
                    <?php echo $post->post_content; ?>
                
                </div><!-- /.entry-content -->


            </div><!-- / .block.masonry-block -->
            

            <?php
        
        endwhile;
               
        
        // End Grid
        echo '</section>';
        
    
    endif; // if posts found
    

} // archive_masonry_grid()





//-- INCLUDE MASONRY --//
require_once( CHILD_DIR . '/inc/masonry.php' );


//-- LOAD FRAMEWORK --//
genesis();
