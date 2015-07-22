<?php

/**
 * UCFBands Jetpack Settings
 * @author Jordan Pakrosnis
 * @link http://ucfbands.com/
 *
 * @param array $defaults
 * @return array modified defaults
 *
 */
function be_ucfbands_jetpack_settings_defaults( $defaults ) {
    
    //--  LIST OF SETTINGS  --//
    
    // Development Mode
	$defaults['ucfbands_jetpack_dev_mode'] = false;

	return $defaults;
}

add_filter( 'genesis_theme_settings_defaults', 'be_ucfbands_jetpack_settings_defaults' );