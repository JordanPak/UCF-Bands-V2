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
    
}