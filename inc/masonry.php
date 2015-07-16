<?php

/**
 * UCFBands Genesis Child Theme
 * 
 * Include Masonry JS (or Isotope) on page
 */


//-- ENQUEUE MASONRY SCRIPTS --//
add_action('wp_enqueue_scripts', 'ucfbands_masonry_scripts');
function ucfbands_masonry_scripts() {
    
    // Included jQuery Masonry
    wp_enqueue_script( 'jquery-masonry', array( 'jquery' ), true );
    
    wp_enqueue_script( 'jquery-masonry-init', get_stylesheet_directory_uri() . '/inc/js/masonry-init.js', array( 'jquery-masonry' ), true );
    
}



add_action( 'genesis_after_content', 'show_masonry_grid');
/**
 * Show Masonry Grid on Grid Template
 *
 * @author Jordan Pakrosnis
 * @link http://ucfbands.com/
 */
function show_masonry_grid() {
    
    
    // Include Parsedown
    require_once( CHILD_DIR . '/inc/parsedown/Parsedown.php' );
    $Parsedown = new Parsedown();
    
    
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
    
    
    // MASONRY GRID CONTAINER //
    
    // Get Layout Option
    $masonry_column_layout = get_post_meta( $post->ID, '_ucfbands_blocks_column_layout', true );
    
    // Use Layout Option with container output
    echo '<section class="masonry-' . $masonry_column_layout . '-grid">';
        echo '<div class="masonry-' . $masonry_column_layout . '-grid-sizer"></div>';
        echo '<div class="masonry-' . $masonry_column_layout . '-gutter-sizer"></div>';
    
    
    //-- BLOCK LOOP --//
	foreach ( $blocks as $block ) {       
        
        // Get Block Meta Data
        $block_title =          $block['title'];
        $block_icon =           esc_attr( $block['icon'] );
        $block_width =          esc_attr( $block['width'] );
        $block_is_featured =    esc_attr( $block['featured'] );
        $block_content =        esc_attr( $block['block-content'] );
        $block_is_breaker =     esc_attr( $block['breaker'] );
       
        
        // If the block isn't a "breaker", proceed as normal
        if ($block_is_breaker == false) {
            
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

                
                <!-- BLOCK TITLE & ICON -->
                <h2><?php echo $block_title . $block_icon; ?></h2>


                <?php // FOR TESTING: Show Block Width ?>
                <?php //echo '<h4 style="color:red;">' . $block_width . '</h4>'; ?>

                
                <div class="entry-content">
            
                    <!-- BLOCK MARKDOWN CONTENT -->
                    <?php 

                    // ALTERNATIVE: echo do_shortcode( $Parsedown->text( $block_content ) );

                    // Parse block content into Markdown HTML
                    $block_content = $Parsedown->text($block_content);


                    // Apply 'the_content' filter to render shortcodes
                    echo apply_filters('the_content', $block_content);

                    ?>
                
                </div><!-- /.entry-content -->
                
            </div><!-- /BLOCK -->

            <?php

        } // if block is breaker
        
        
        // Block is a breaker
        else {
            
            ?>

            <!-- MASONRY BLOCK -->
            <div class="masonry-block masonry-block-size--one-whole masonry-breaker-block"></div><!-- /BLOCK -->

            <?php   
            
        } // else
        
        
        
	} // foreach block
    
    
    // End Masonry Grid Container
    echo '</div>';
    

} // show_masonry_grid()
