<?php

/**
 * SHOW ON CB
 *
 * Settings modifiers to make certain settings only show on applicable pages
 *
 * @author Jordan Pakrosnis
 */

/**
 * Exclude page_title setting on specific pages
 * @param  object $field Current field object
 * @return bool
 * @author Jordan Pakrosnis
 */
function cmb_exclude_setting_page_title( $field ) {
    
    // Get Current Template
    $current_template = basename( get_page_template() );
    
    // Exclude on these templates
    switch ($current_template) {
        
        case 'page.php':
            return 0;
        
        
        default:
            return 1;
        
    } // switch
    
}


/**
 * Exclude setting on default template (page.php)
 * @param  object $field Current field object
 * @return bool
 * @author Jordan Pakrosnis
 */
function cmb_exclude_default_page( $field ) {
    
    // Get Current Template
    $current_template = basename( get_page_template() );
    
    // Exclude on these templates
    switch ($current_template) {
        
        case 'page.php':
            return 0;
        
        
        default:
            return 1;
        
    } // switch
    
} // cmb_exclude_default_page()


/**
 * Exclude setting on section child page
 * @param  object $field Current field object
 * @return bool
 * @author Jordan Pakrosnis
 */
function cmb_exclude_section_child_page( $field ) {
    
    // Get Current Template
    $current_template = basename( get_page_template() );
    
    // If it's a section page or section grid, check if it's a child
    // Exclude on these templates
    if( ($current_template == 'page_section.php') || ($current_template == 'page_section_grid.php') ) {
        
        $page_parents = get_post_ancestors( $post );
        
        if( $page_parents[0] != '' ) {
            return 0;
        }
        
    } // if()
    
    else {
        return 1;   
    }
    
} // cmb_exclude_section_child_page()