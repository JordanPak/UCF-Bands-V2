<?php

/*
 *  UCFBands Custom Page Header Settings
 */


// Add page title before content_sidebar_wrap
add_action( 'genesis_before_content_sidebar_wrap', 'ucfbands_custom_page_header', 10);
/**
 *  UCFBands Custom Page Header
 *  
 *  @author Jordan Pakrosnis
 */
function ucfbands_custom_page_header() {

    
    // SET PAGE HEADER VARS //
    
    // Get array of parent IDs
    $page_parents = get_post_ancestors( $post );
    
    // If the first spot is not null, there's a parent.
    if( $page_parents[0] != '' ) {
        $page_has_parent = true;
    }
    
    // SET VARS: Page has no parent (dashboard?)
    if( $page_has_parent == false ) {
        
        // Post ID
        $post_ID = get_the_ID();
        $header_title = get_the_title( $post_ID );
        $post = get_post( $post_ID );
        $page_slug = $post->post_name;
        
        $header_link_before = '';
        $header_link_after = '';
    }
    
    // SET VARS: Page is child
    else {
        
        // End returns the last element (greatest parent) to add compatibility for
        // Child pages of a child page.
        $post_ID = end( $page_parents );
        
        $header_title = get_the_title( $post_ID );
        $parent_post = get_post( $post_ID );
        $page_slug = $parent_post->post_name;
        
        $header_link_before = '<a href="' . get_permalink( $parent_post ) . '">';
        $header_link_after = '</a>';
    }
    
    
    
    // Section Classes
    $page_header_section_classes = 'page-header';
    
    
    // Set Meta ID
    $meta_id_prefix = '_ucfbands_page_settings_';
    
    
    // GET TITLE SETTINGS META
    $remove_page_header                 = get_post_meta( get_the_ID(), $meta_id_prefix . 'remove_page_header', true );
    $icon                               = get_post_meta( $post_ID, $meta_id_prefix . 'icon', true );
    $icon_position                      = get_post_meta( $post_ID, $meta_id_prefix . 'icon_position', true );
    $remove_page_header_background_fade = get_post_meta( $post_ID, $meta_id_prefix . 'remove_page_header_background_fade', true );
    $conductor_or_director              = get_post_meta( $post_ID, $meta_id_prefix . 'conductor_or_director', true );
    $conductor_name                     = get_post_meta( $post_ID, $meta_id_prefix . 'conductor_name', true );
    
    
    // CONFIGURE ICON
    if ($icon) { 
        $icon = '<i class="fa fa-' . $icon . '"></i>';
        
        if ($icon_position === 'before') {
            $icon_before = $icon . '&nbsp;&nbsp;';
            $icon_after = '';
        }
        else {
            $icon_before = '';
            $icon_after = '&nbsp;&nbsp;' . $icon;
        }
    }
    
    
    // CONFIGURE CONDUCTOR NAME
    if ($conductor_name) {
        
        // Span opening, icon, and space
        $conductor_director_output = '<span class="conductor-name"><i class="fa fa-user"></i>&nbsp;&nbsp;';
        
        // If "Conductor"
        if( $conductor_or_director == 'conductor' ) {
            $conductor_director_output .= 'Conductor';
        }
        
        // If "Director"
        else {
            $conductor_director_output .= 'Director';
        }
        
        // Check for multiple names
        if ( strpos($conductor_name, '&') == true ) {
            $conductor_director_output .= 's: ';
        }
        else {
            $conductor_director_output .= ': ';
        }
        
        // Apply names
        $conductor_director_output .= $conductor_name;
        
        // Finish the output
        $conductor_director_output .= '</span>';
    
    } // If Conductor/Director name(s) are entered
    
        
    // CONFIGURE FEATURED IMAGE BACKGROUND
    $page_featured_image = wp_get_attachment_url( get_post_thumbnail_id( $post_ID ) );
    
    if ($page_featured_image) {
        $page_featured_image = 'background-image: url(' . $page_featured_image . ') ';
        $page_header_section_classes .= ' page-title-lg';
    }
    
    
    // REMOVE PAGE TITLE BACKGROUND FADE
    if ($remove_page_header_background_fade == true) {
        $page_header_section_classes .= ' remove-background-fade';   
    }
    
    
    // CONFIGURE SECTION MENU
    $current_template = basename( get_page_template() );
    
    if ( ($current_template == 'page_section.php') || ($current_template == 'page_section_grid.php') ) {
        $display_section_menu = true;
    }
        
    if ($display_section_menu == true) {
    
        $section_menu_args = array(
            'menu'            => $page_slug,
            'container'       => 'nav',
            'container_class' => 'section-menu',
            'menu_class'      => 'menu genesis-nav-menu clearfix',
            'echo'            => true,
            'depth'           => 2,
    //                    'walker'          => ''
        );
        
    } // if
    
    
    // DISPLAY PAGE TITLE //
    if ($remove_page_header == false) {
        
        ?>
        
        <section class="<?php echo $page_header_section_classes; ?>" style="<?php echo $page_featured_image; ?>">
            
            
            <div class="page-title-inner">
                
                <?php echo $header_link_before; ?>
                
                    <h1 class="entry-title" itemprop="headline">
                        <?php
                            echo $icon_before;
                            echo $header_title;
                            echo $icon_after;
                        ?>
                    </h1>
                
                <?php echo $header_link_after; ?>

                <?php echo $conductor_director_output; ?>
                
            </div>
            

            <?php 
              
            // OUTPUT SECTION MENU
            if ($display_section_menu == true) {
                wp_nav_menu( $section_menu_args ); 
            }
        
            ?>
    
        </section>

        <?php
        
    } // if Remove Page Title
    
} // ucfbands_custom_page_header()
