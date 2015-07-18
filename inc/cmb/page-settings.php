<?php

// Include show_on_cb Filters
require_once( CHILD_DIR . '/inc/cmb/show-on-cb.php' );


/**
 *  UCFBands Register Page Settings Metabox
 *
 *  @author Jordan Pakrosnis
 */
function ucfbands_page_settings_metabox() {
	$prefix = '_ucfbands_page_settings_';

	/**
     * Initiate the metabox
     */
    $cmb = new_cmb2_box( array(
        'id'            => $prefix . 'metabox',
        'title'         => __( 'Page Settings', 'ucfbands-page-settings' ),
        'object_types'  => array( 'page' ),
        'context'       => 'normal',
        'priority'      => 'core',
    ) );
    
	$cmb->add_field( array(
		'name'        => 'Page Title Icon',
        'desc'        => 'The <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_BLANK">FontAwesome</a> icon suffix (Ex: "file-text" instead of "fa fa-file-text")',
		'id'          => $prefix . 'icon',
		'type'        => 'text',
	) );

    $cmb->add_field( array(
        'name'             => 'Page Title Icon Position',
        'id'               => $prefix . 'icon_position',
        'type'             => 'radio',
        'show_option_none' => false,
        'default'          => 'after',
        'options'          => array(
            'before' => __( 'Before Header Title', 'before' ),
            'after'   => __( 'After Header Title', 'after' ),
        ),
    ) );

    $cmb->add_field( array(
        'name' => 'Remove Section Page Title',
        'desc' => 'Only applies to section pages. Check box if this section page\'s title should not be shown.',
        'id'   => $prefix . 'remove_page_title',
        'type' => 'checkbox',
        'show_on_cb' => 'cmb_exclude_default_page',
    ) );
    
    $cmb->add_field( array(
        'name' => 'Remove Page Header',
        'desc' => 'Check box if the page header should not be shown.',
        'id'   => $prefix . 'remove_page_header',
        'type' => 'checkbox',
        'show_on_cb' => 'cmb_exclude_default_page',
    ) );
    
    $cmb->add_field( array(
        'name' => 'Remove Page Header Background Fade',
        'desc' => '<br>Check box to remove the dark shadow on the left side of the page header.<br><b>If the current page is a child, this option is inherited by the parent page.</b>',
        'id'   => $prefix . 'remove_page_header_background_fade',
        'type' => 'checkbox',
        'show_on_cb' => 'cmb_exclude_default_page',
    ) );    

    $cmb->add_field( array(
        'name'             => 'Conductor/Director',
        'desc'             => '<b>If the current page is a child, this option is inherited by the parent page.</b>',
        'id'               => $prefix . 'conductor_or_director',
        'type'             => 'radio',
        'show_option_none' => false,
        'default'          => 'conductor',
        'options'          => array(
            'conductor' => __( 'Use "Conductor"', 'cmb' ),
            'director'   => __( 'Use "Director"', 'cmb' ),
        ),
    ) );
    
    $cmb->add_field( array(
        'name'    => 'Conductor/Director Name(s)',
        'desc'    => '
            <br>"Conductors" or "Directors" (plural) will only be used if there is an <u><b>&</b></u> entered between the names.
            <br><b>Optional. If the current page is a child, this option is inherited by the parent page.</b>
        ',
        'default' => '',
        'id'      => $prefix . 'conductor_name',
        'type'    => 'text_medium',
        'show_on_cb'  => 'cmb_exclude_default_page',
    ) );
    
    $cmb->add_field( array(
        'name'             => 'Font Style',
        'desc'             => '<b>If the current page is a child, this option is inherited by the parent page.</b>',
        'id'               => $prefix . 'font_style',
        'type'             => 'radio',
        'show_option_none' => false,
        'default'          => 'default',
        'options'          => array(
            'default' => __( 'Default (Serif)', 'cmb' ),
            'athletic'   => __( 'Athletic', 'cmb' ),
        ),
        'show_on_cb' => 'cmb_exclude_section_child_page',
    ) );
    
	$cmb->add_field( array(
		'name'        => 'Slider Shortcode',
        'desc'        => 'Slider will be placed below the page header',
		'id'          => $prefix . 'slider_shortcode',
		'type'        => 'text',
	) );    
    
	$cmb->add_field( array(
		'name'        => 'Pre-Content Shortcode',
        'desc'        => 'Shortcode will be executed after the header and before the page content or blocks.',
		'id'          => $prefix . 'pre_content_shortcode',
		'type'        => 'text',
	) ); 

    $cmb->add_field( array(
        'name' => 'Disable Grid Area Padding',
        'desc' => 'Check this to disable the spacing around the grid',
        'id'   => $prefix . 'disable_grid_padding',
        'type' => 'checkbox',
        'show_on_cb' => 'cmb_exclude_default_page',
    ) );    
    
}
add_action( 'cmb2_init', 'ucfbands_page_settings_metabox' );
