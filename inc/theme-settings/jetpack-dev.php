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



/**
 * UCFBands Jetpack Settings Metabox Registration
 * Register Metabox for entering the values
 *
 * @author Jordan Pakrosnis
 * @link http://ucfbands.com/
 *
 */
function be_ucfbands_jetpack_settings_metabox_registration( $_genesis_theme_settings_pagehook ) {

    add_meta_box( 'be-jetpack-settings', 'Jetpack Settings', 'be_ucfbands_jetpack_settings_box', $_genesis_theme_settings_pagehook, 'main', 'high' );

}
add_action( 'genesis_theme_settings_metaboxes', 'be_ucfbands_jetpack_settings_metabox_registration' );