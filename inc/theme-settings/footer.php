<?php

// Remove default footer and add custom footer
remove_action( 'genesis_footer', 'genesis_do_footer' );
add_action( 'genesis_footer', 'ucfbands_footer' );


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
	$defaults['ucfbands_footer_facebook_url'] = 'facebook.com/ucfmarchingknights';
	$defaults['ucfbands_footer_twitter_url'] = 'twitter.com/marchingknights';
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
			// 'ucfbands_footer_facebook_url',
			// 'ucfbands_footer_twitter_url',
            // 'ucfbands_footer_youtube_url',
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

    <!--
    <p><b>Social</b></p>
    
    <p><?php //_e( 'Facebook URL:', 'be-genesis-child' );?><br>
        <input type="text" name="<?php //echo GENESIS_SETTINGS_FIELD; ?>[ucfbands_footer_facebook_url]" value="<?php //echo esc_url( genesis_get_option('ucfbands_footer_facebook_url') ); ?>" size="50" >
    </p>

    <p><?php //_e( 'Twitter URL:', 'be-genesis-child' );?><br>
        <input type="text" name="<?php //echo GENESIS_SETTINGS_FIELD; ?>[ucfbands_footer_twitter_url]" value="<?php //echo esc_url( genesis_get_option('ucfbands_footer_twitter_url') ); ?>" size="50" >
    </p>

    <p><?php //_e( 'YouTube URL:', 'be-genesis-child' );?><br>
        <input type="text" name="<?php //echo GENESIS_SETTINGS_FIELD; ?>[ucfbands_footer_youtube_url]" value="<?php //echo esc_url( genesis_get_option('ucfbands_footer_youtube_url') ); ?>" size="50" >
    </p>

    <hr>
    -->

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



/**
 * UCFBands Footer Settings Output
 * @author Jordan Pakrosnis
 * @link http://ucfbands.com/
 *
 */
function ucfbands_footer() {
    
    //-- GET OPTIONS --//
    
    // // Social
    // $footer_facebook_url = genesis_get_option( 'ucfbands_footer_facebook_url', GENESIS_SETTINGS_FIELD );
    // $footer_twitter_url = genesis_get_option( 'ucfbands_footer_twitter_url', GENESIS_SETTINGS_FIELD );
    // $footer_youtube_url = genesis_get_option( 'ucfbands_footer_youtube_url', GENESIS_SETTINGS_FIELD );
    
    // Address & Google Map
    $footer_address_url = genesis_get_option( 'ucfbands_footer_address_url', GENESIS_SETTINGS_FIELD );
    $footer_address_name1 = genesis_get_option( 'ucfbands_footer_address_name1', GENESIS_SETTINGS_FIELD );
    $footer_address_name2 = genesis_get_option( 'ucfbands_footer_address_name2', GENESIS_SETTINGS_FIELD );
    $footer_address_street = genesis_get_option( 'ucfbands_footer_address_street', GENESIS_SETTINGS_FIELD );
    $footer_address_city_state_zip = genesis_get_option( 'ucfbands_footer_address_city_state_zip', GENESIS_SETTINGS_FIELD );
    $footer_google_map_code = genesis_get_option( 'ucfbands_footer_google_map_code', GENESIS_SETTINGS_FIELD );
    
    // Website Credits
    $footer_credits_text = genesis_get_option( 'ucfbands_footer_credits_text', GENESIS_SETTINGS_FIELD );
    $footer_credits_url = genesis_get_option( 'ucfbands_footer_credits_url', GENESIS_SETTINGS_FIELD );
    
    // Copyright Name
    $footer_copyright_name = genesis_get_option( 'ucfbands_footer_copyright_name', GENESIS_SETTINGS_FIELD );

    
    
    //-- OUTPUT OPTIONS --//

    // // Social
    // if ( $footer_facebook_url || $footer_twitter_url || $footer_youtube_url ) {
    
    //     echo '<div id="footer-social">';
        
    //     if ( $footer_facebook_url ) {
    //         echo '<a href="' . $footer_facebook_url . '" target="_BLANK"><i class="fa fa-facebook fa-lg"></i></a>';
    //     }
    //     if ( $footer_twitter_url ) {
    //         echo '<a href="' . esc_url( $footer_twitter_url ) . '" target="_BLANK"><i class="fa fa-twitter fa-lg"></i></a>';
    //     }
    //     if ( $footer_youtube_url ) {
    //         echo '<a href="' . esc_url( $footer_youtube_url ) . '" target="_BLANK"><i class="fa fa-youtube-play fa-lg"></i></a>';
    //     }
        
    //     echo '</div>'; // #footer-social
        
    // } // Social
    
    
    // echo '<br>';
    
    
    // Address Max-Height Placeholder
    echo '<p class="address-placeholder"><a href="' . esc_url( $footer_address_url ) . '" target="_BLANK">Contact &amp; Address</a></p>';
    
    // Address
    echo '<address><a href="' . esc_url( $footer_address_url ) . '" target="_BLANK">';
    
    if ( $footer_address_name1 ) {
        echo $footer_address_name1 . '<br>';
    }
    if ( $footer_address_name2 ) {
        echo $footer_address_name2 . '<br>';
    }
    if ( $footer_address_street ) {
        echo $footer_address_street . '<br>';
    }
    if ( $footer_address_city_state_zip ) {
        echo $footer_address_city_state_zip . '<br>';
    }
    
    echo '</a></address>';
    
    
    if ( $footer_credits_text ) {
        echo '<a href="' . esc_url( $footer_credits_url ) . '">' . $footer_credits_text . '</a>';
    }
    if ( $footer_copyright_name ) {
        echo ' | &copy; ' . $footer_copyright_name . ' ' . date('Y');    
    }
    

} // ucfbands_footer()
