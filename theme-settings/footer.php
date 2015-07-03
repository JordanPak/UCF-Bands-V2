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
function be_ucfbands_footer_settings_defaults( $defaults ) {
    
    //--  LIST OF SETTINGS  --//
    
    // SOCIAL URLS
	$defaults['ucfbands_footer_facebook_url'] = '';
	$defaults['ucfbands_footer_twitter_url'] = '';
	$defaults['ucfbands_footer_youtube_url'] = '';
    
    
    // ADDRESS
    $defaults['ucfbands_footer_address_url'] = '';
    $defaults['ucfbands_footer_address_name'] = 'University of Central Florida Bands';
    $defaults['ucfbands_footer_address_name2'] = 'Department of Music';
    $defaults['ucfbands_footer_address_street'] = '12488 Centaurus Blvd.';
    $defaults['ucfbands_footer_address_city_state_zip'] = 'Orlando, FL 32816-1354';
    
    // GOOGLE MAP CODE
    $defaults['ucfbands_footer_google_map_code'] = '';
    
    
    // CREDITS
    $defaults['ucfbands_footer_credits_text'] = 'Website Credits';
    $defaults['ucfbands_footer_credits_url'] = '';
    
    
    // COPYRIGHT
    $defaults['ucfbands_footer_copyright_name'] = 'UCFBands';
    

	return $defaults;
}
add_filter( 'genesis_theme_settings_defaults', 'be_ucfbands_footer_settings_defaults' );




/**
 * UCFBands Footer Settings Sanitization
 * Sanitize the footer setting inputs
 *
 * @author Jordan Pakrosnis
 * @link http://ucfbands.com/
 *
 */
function be_ucfbands_footer_settings_defaults_sanitization_filters() {
	
    genesis_add_option_filter( 
		'no_html', 
		GENESIS_SETTINGS_FIELD,
		array(
			'ucfbands_footer_facebook_url',
			'ucfbands_footer_twitter_url',
            'ucfbands_footer_youtube_url',
            'ucfbands_footer_address_url',
            'ucfbands_footer_address_name',
            'ucfbands_footer_address_name2',
            'ucfbands_footer_address_street',
            'ucfbands_footer_address_city_state_zip',
            'ucfbands_footer_credits_text',
            'ucfbands_footer_credits_url',
            'ucfbands_footer_copyright_name',
		) 
	);
	
    genesis_add_option_filter( 
		'requires_unfiltered_html', 
		GENESIS_SETTINGS_FIELD,
		array(
			'ucfbands_footer_google_map_code'
		) 
	);
}
add_action( 'genesis_settings_sanitizer_init', 'be_ucfbands_footer_settings_defaults_sanitization_filters' );




/**
 * UCFBands Footer Settings Metabox Registration
 * Register Metabox for entering the values
 *
 * @author Jordan Pakrosnis
 * @link http://ucfbands.com/
 *
 */

function be_ucfbands_footer_settings_metabox_registration( $_genesis_theme_settings_pagehook ) {

    add_meta_box( 'be-footer-settings', 'Footer Settings', 'be_ucfbands_footer_settings_box', $_genesis_theme_settings_pagehook, 'main', 'high' );

}
add_action( 'genesis_theme_settings_metaboxes', 'be_ucfbands_footer_settings_metabox_registration' );



/**
 * UCFBands Footer Settings Metabox Callback
 * @see be_register_social_settings_box()
 * @author Jordan Pakrosnis
 * @link http://ucfbands.com/
 *
 */

function be_ucfbands_footer_settings_box() {
	?>

    <p><b>Social</b></p>
    
    <p><?php _e( 'Facebook URL:', 'be-genesis-child' );?><br>
        <input type="text" name="<?php echo GENESIS_SETTINGS_FIELD; ?>[ucfbands_footer_facebook_url]" value="<?php echo esc_url( genesis_get_option('ucfbands_footer_facebook_url') ); ?>" size="50" >
    </p>

    <p><?php _e( 'Twitter URL:', 'be-genesis-child' );?><br>
        <input type="text" name="<?php echo GENESIS_SETTINGS_FIELD; ?>[ucfbands_footer_twitter_url]" value="<?php echo esc_url( genesis_get_option('ucfbands_footer_twitter_url') ); ?>" size="50" >
    </p>

    <p><?php _e( 'YouTube URL:', 'be-genesis-child' );?><br>
        <input type="text" name="<?php echo GENESIS_SETTINGS_FIELD; ?>[ucfbands_footer_youtube_url]" value="<?php echo esc_url( genesis_get_option('ucfbands_footer_youtube_url') ); ?>" size="50" >
    </p>

    <hr>

    <p><b>Address</b></p>

    <p><?php _e( 'Link URL:', 'be-genesis-child' );?><br>
        <input type="text" name="<?php echo GENESIS_SETTINGS_FIELD; ?>[ucfbands_footer_address_url]" value="<?php echo esc_url( genesis_get_option('ucfbands_footer_address_url') ); ?>" size="50" >
    </p>

    <p><?php _e( 'Name - Line 1:', 'be-genesis-child' );?><br>
        <input type="text" name="<?php echo GENESIS_SETTINGS_FIELD; ?>[ucfbands_footer_address_name1]" value="<?php echo genesis_get_option('ucfbands_footer_address_name1'); ?>" size="50" >
    </p>

    <p><?php _e( 'Name - Line 2:', 'be-genesis-child' );?><br>
        <input type="text" name="<?php echo GENESIS_SETTINGS_FIELD; ?>[ucfbands_footer_address_name2]" value="<?php echo genesis_get_option('ucfbands_footer_address_name2'); ?>" size="50" >
    </p>

    <p><?php _e( 'Street Address:', 'be-genesis-child' );?><br>
        <input type="text" name="<?php echo GENESIS_SETTINGS_FIELD; ?>[ucfbands_footer_address_street]" value="<?php echo genesis_get_option('ucfbands_footer_address_street'); ?>" size="50" >
    </p>

    <p><?php _e( 'City, State, and Zip:', 'be-genesis-child' );?><br>
        <input type="text" name="<?php echo GENESIS_SETTINGS_FIELD; ?>[ucfbands_footer_address_city_state_zip]" value="<?php echo genesis_get_option('ucfbands_footer_address_city_state_zip'); ?>" size="50" >
    </p>

   <p><?php _e( 'Google Map Code:', 'be-genesis-child' );?><br>
       <textarea rows="4" cols="50" name="<?php echo GENESIS_SETTINGS_FIELD; ?>[ucfbands_footer_google_map_code]"><?php echo genesis_get_option('ucfbands_footer_google_map_code'); ?></textarea>
    </p>


    <hr>

    <p><b>Website Credits</b></p>

    <p><?php _e( 'Credits link text:', 'be-genesis-child' );?><br>
        <input type="text" name="<?php echo GENESIS_SETTINGS_FIELD; ?>[ucfbands_footer_credits_text]" value="<?php echo genesis_get_option('ucfbands_footer_credits_text'); ?>" size="25" >
    </p>

    <p><?php _e( 'Credits link URL:', 'be-genesis-child' );?><br>
        <input type="text" name="<?php echo GENESIS_SETTINGS_FIELD; ?>[ucfbands_footer_credits_url]" value="<?php echo esc_url( genesis_get_option('ucfbands_footer_credits_url') ); ?>" size="50" >
    </p>


    <hr>

    <p><b>Copyright Information</b></p>

    <p><?php _e( 'Copyright Name', 'be-genesis-child' );?><br>
        <input type="text" name="<?php echo GENESIS_SETTINGS_FIELD; ?>[ucfbands_footer_copyright_name]" value="<?php echo genesis_get_option('ucfbands_footer_copyright_name'); ?>" size="25" >
    </p>


	<?php
}


