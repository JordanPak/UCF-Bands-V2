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
        'priority'      => 'high',
    ) );

    $cmb->add_field( array(
        'name' => 'Remove Page Title',
        'desc' => 'Check box if the page title should not be shown.',
        'id'   => $prefix . 'remove_page_title',
        'type' => 'checkbox',
        'show_on_cb' => 'cmb_exclude_default_page',
    ) );
    
	$cmb->add_field( array(
		'name'        => 'Title Icon',
        'desc'        => 'The <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_BLANK">FontAwesome</a> icon suffix (Ex: "file-text" instead of "fa fa-file-text")',
		'id'          => $prefix . 'icon',
		'type'        => 'text',
	) );

    $cmb->add_field( array(
        'name'             => 'Title Icon Position',
        'id'               => $prefix . 'icon_position',
        'type'             => 'radio',
        'show_option_none' => false,
        'default'          => 'after',
        'options'          => array(
            'before' => __( 'Before Title', 'before' ),
            'after'   => __( 'After Title', 'after' ),
        ),
    ) );
    
    $cmb->add_field( array(
        'name' => 'Remove Page Title Background Fade',
        'desc' => 'Check box to remove the dark shadow on the left side of the page title.',
        'id'   => $prefix . 'remove_page_title_background_fade',
        'type' => 'checkbox',
        'show_on_cb' => 'cmb_exclude_default_page',
    ) );    
    
    $cmb->add_field( array(
        'name'    => 'Conductor Name',
        'desc'    => '<b>Optional</b>. Name of conductor.',
        'default' => '',
        'id'      => $prefix . 'conductor_name',
        'type'    => 'text_medium',
        'show_on_cb'  => 'cmb_exclude_default_page',
    ) );
    
    $cmb->add_field( array(
        'name'             => 'Font Style',
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

}
add_action( 'cmb2_init', 'ucfbands_page_settings_metabox' );
