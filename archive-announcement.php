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
    
    
    
    // MASONRY GRID CONTAINER //
    
    // Column Layout
    $masonry_column_layout = '4col';
    
    // Use Layout Option with container output
    echo '<section class="masonry-' . $masonry_column_layout . '-grid">';
        echo '<div class="masonry-' . $masonry_column_layout . '-grid-sizer"></div>';
        echo '<div class="masonry-' . $masonry_column_layout . '-gutter-sizer"></div>';
    
    
//    //-- BLOCK LOOP --//
//	foreach ( $blocks as $block ) {       
//        
//        // Get Block Meta Data
//        $block_title                        = esc_attr( $block['title'] );
//        $block_icon                         = esc_attr( $block['icon'] );
//        $block_width                        = esc_attr( $block['width'] );
//        $block_is_featured                  = esc_attr( $block['featured'] );
//        $block_content                      = esc_attr( $block['block-content'] );
//        $block_remove_background_padding    = esc_attr( $block['remove-background'] );
//        $block_is_breaker                   = esc_attr( $block['breaker'] );
//       
//        
//            
//        // SET INITIAL CLASSES
//        $block_classes = 'block masonry-block masonry-block-size--' . $block_width;
//
//        // Featured?
//        if ($block_is_featured == true ) {
//            $block_classes .= ' block-featured';
//        }
//
//        // Background/Padding Disabled?
//        if ($block_remove_background_padding) {
//            $block_classes .= ' block-remove-background-padding';
//        }
//
//        // Block Icon?
//        if ($block_icon) {
//            $block_icon = '&nbsp;&nbsp;<i class="fa fa-' . $block_icon . '"></i>';
//        } else {
//            $block_icon = '';   
//        }
//
//        ?>
//
//        <!-- MASONRY BLOCK -->
//        <div class="<?php echo $block_classes; ?>">
//
//
//            <!-- BLOCK TITLE & ICON -->
//            <?php if ($block_title != '') { ?>
//                <h2 class="block-header"><?php echo $block_title . $block_icon; ?></h2>
//            <?php } ?>
//
//            <?php // FOR TESTING: Show Block Width ?>
//            <?php //echo '<h4 style="color:red;">' . $block_width . '</h4>'; ?>
//
//
//            <div class="entry-content">
//
//                <!-- BLOCK MARKDOWN CONTENT -->
//                <?php 
//
//                // ALTERNATIVE: echo do_shortcode( $Parsedown->text( $block_content ) );
//
//                // Parse block content into Markdown HTML
//                $block_content = $Parsedown->text($block_content);
//
//
//                // Apply 'the_content' filter to render shortcodes
//                echo apply_filters('the_content', $block_content);
//
//                ?>
//
//            </div><!-- /.entry-content -->
//
//        </div><!-- /BLOCK -->
//
//        <?php
//
//        
//	} // foreach block
    
    
    // End Masonry Grid Container
    echo '</div>';
    

} // archive_masonry_grid()





//-- INCLUDE MASONRY --//
require_once( CHILD_DIR . '/inc/masonry.php' );


//-- LOAD FRAMEWORK --//
genesis();
