<?php
/*
 * Template Name: Grid
 */

// Do not display SIDEBAR or ENTRY CONTENT
remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );
remove_action( 'genesis_entry_content', 'genesis_do_post_content' );
remove_action( 'genesis_loop', 'genesis_do_loop' );


add_action( 'genesis_before_content', 'show_page_title');
function show_page_title() {
    
    genesis_do_post_title();
    
    
} // show_page_title()


add_action( 'genesis_after_content', 'show_boxes');
function show_boxes() {
    
    // Get post object.
	$post = get_post();

	// Get blocks attached to this page.
	$blocks = get_post_meta( $post->ID, '_ucfbands_block_meta', true );   
    
    // Leave if there's no boxes
    if ( empty( $blocks ) ) {
		echo 'No Boxes';
	}
    
    
    // Testing
    //print_r($blocks);
    
    
    echo '<section class="blocks">';
    
    //-- BLOCK LOOP --//
    $counter = 1;
    
	foreach ( $blocks as $block ) {
        
        
        // SET CLASSES
        $block_classes = 'entry ' . 'block ' . esc_attr( $block['width'] );
        
        if ( esc_attr( $block['featured'] ) == true ) {
            $block_classes .= ' block-featured';
        }
        
        if ($counter == 1) {
            $block_classes .= ' first';
        }
        
        $counter++;
        
        // SET ICON
        $block_icon = esc_attr( $block['icon'] );
        
        if ($block_icon) {
            $block_icon = '&nbsp;&nbsp;<i class="fa fa-' . $block_icon . '"></i>';
        }
        
        ?>

        
        <!-- START BLOCK -->
        <div class="<?php echo $block_classes; ?>">

            <h2><?php echo $block['title']; ?><?php echo $block_icon; ?></h2>
            
            <?php echo esc_attr( $block['block-content'] ); ?>
        
        </div><!-- /BLOCK -->
        
		<?php
        
        //echo '<h3 class="fullname">' . esc_attr( $block['title'] ) . '</h3>';
		
	}    
}


    echo '</main>';



//-- Load Framework --//
genesis();