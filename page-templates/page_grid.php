<?php
/*
 * Template Name: Grid
 */

// INCLUDES //

// Masonry
require_once( CHILD_DIR . '/inc/masonry.php' );


// REMOVE SIDEBAR & POST CONTENT //
remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );
remove_action( 'genesis_entry_content', 'genesis_do_post_content' );
remove_action( 'genesis_loop', 'genesis_do_loop' );


// PUT PAGE TITLE BEFORE CONTENT //
add_action( 'genesis_before_content_sidebar_wrap', 'show_page_title');
function show_page_title() {

    genesis_do_post_title();
    
} // show_page_title()



add_action( 'genesis_after_content', 'show_boxes');
/**
 * Show Boxes on Grid Template
 *
 * @author Jordan Pakrosnis
 * @link http://ucfbands.com/
 */
function show_boxes() {
    
    // Get post object.
	$post = get_post();

	// Get blocks attached to this page.
	$blocks = get_post_meta( $post->ID, '_ucfbands_blocks_meta', true );   
    
    // Leave if there's no boxes
    if ( empty( $blocks ) ) {
		echo '<div class="entry block one-fourth">';
        echo '<h3>Coming Soon&nbsp;&nbsp;<i class="fa fa-wrench"></i></h3>';
        
        
        if ( is_user_logged_in() ) {
            echo '<br>';
            echo '<i class="mkmc-note">MKMC Note: There are no blocks found on this page. This page <b>does not</b> show its main content.</i>';
        }
        
        echo '</div>';
        return;
    }
    
    
    // Masonry Grid Container
    echo '<section class="masonry-blocks">';
    echo '<div class="masonry-block-sizer"></div>';
    echo '<div class="masonry-gutter-sizer"></div>';
    
    
    //-- BLOCK LOOP --//
	foreach ( $blocks as $block ) {       
        
        // Get Block Meta Data
        $block_title =          $block['title'];
        $block_icon =           esc_attr( $block['icon'] );
        $block_width =          esc_attr( $block['width'] );
        $block_is_featured =    esc_attr( $block['featured'] );
        $block_content =        esc_attr( $block['block-content'] );
        
        
        // SET INITIAL CLASSES
        $block_classes = 'block masonry-block masonry-block-size--' . $block_width;
        
        // Featured?
        if ($block_is_featured == true ) {
            $block_classes .= ' block-featured';
        }
        
        // Block Icon?
        if ($block_icon) {
            $block_icon = '&nbsp;&nbsp;<i class="fa fa-' . $block_icon . '"></i>';
        } else {
            $block_icon = '';   
        }
        
        ?>
        
        <!-- MASONRY BLOCK -->
        <div class="<?php echo $block_classes; ?>">

            <h2><?php echo $block_title . $block_icon; ?></h2>
            
            <?php echo $block_content; ?>
        
        </div><!-- /BLOCK -->
        
		<?php
        
	} // foreach block
    
    
    // End Masonry Grid Container
    echo '</div>';
    

} // show_boxes()


//-- LOAD FRAMEWORK --//
genesis();