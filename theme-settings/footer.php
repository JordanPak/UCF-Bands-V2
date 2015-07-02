<?php

/**
 * UCFBands Footer Settings Defaults
 * @author Jordan Pakrosnis
 * @link http://ucfbands.com/
 *
 * @param array $defaults
 * @return array modified defaults
 *
 */
function be_footer_options_defaults( $defaults ) {
    
    //--  LIST OF SETTINGS  --//
    
    // SOCIAL URLS
	$defaults['facebook_url'] = '';
	$defaults['twitter_url'] = '';
	$defaults['youtube_url'] = '';
    
    
    // ADDRESS
    $defaults['address_name'] = 'University of Central Florida Bands';
    $defaults['address_name2'] = 'Department of Music';
    $defaults['address_street'] = '12488 Centaurus Blvd.';
    $defaults['address_city_state_zip'] = 'Orlanod, FL 32816-1354';
    
    
    // CREDITS
    $defaults['credits_text'] = 'Website Credits';
    $defaults['credits_url'] = '';
    
    
    // COPYRIGHT
    $defaults['copyright_name'] = 'UCFBands';
    $defaults['copyright_year'] = echo date(Y);
    
    
    // GOOGLE MAP CODE
    $defaults['google_map_code'] = '';
    
    


	return $defaults;
}
add_filter( 'genesis_theme_settings_defaults', 'be_footer_options_defaults' );



/**
 * Sanitization
 * Register our two new option values with the no_html sanitization type defined within Genesis.
 *
 * @author Jordan Pakrosnis
 * @link http://ucfbands.com/
 *
 */

function be_theme_settings_defaults_sanitization_filters() {
	genesis_add_option_filter( 
		'no_html', 
		GENESIS_SETTINGS_FIELD,
		array(
			'facebook_url',
			'twitter_url',
            'youtube_url',
            'address_name',
            'address_name2',
            'address_street',
            'address_city_state_zip',
            'credits_text',
            'credits_url',
            'copyright_name',
            'copyright_year'
		) 
	);
	genesis_add_option_filter( 
		'requires_unfiltered_html', 
		GENESIS_SETTINGS_FIELD,
		array(
			'google_map_code'
		) 
	);
}
add_action( 'genesis_settings_sanitizer_init', 'be_theme_settings_defaults_sanitization_filters' );