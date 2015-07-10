<?php

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
		'show_on'      => array(
            'key' => 'page-template', 
            'value' => array('page-templates/page_section_grid.php', 'page-templates/page_grid.php'),
        ),
    ) );

//    $cmb->add_field( array(
//        'name'             => 'Display Style',
//        'desc'             => 'Select an option',
//        'id'               => 'display_style',
//        'type'             => 'select',
//        'show_option_none' => false,
//        'default'          => 'default',
//        'options'          => array(
//            'default'           => __( 'Default', 'cmb' ),
//            'featured-image-bg' => __( 'Featured Image Background', 'cmb' ),
//            'solid-color-bg'    => __( 'Solid Color Backvground', 'cmb' ),
//        ),
//    ) );

    $cmb->add_field( array(
        'name' => 'Remove Page Title',
        'desc' => 'Check box if the page title should not be shown.',
        'id'   => $prefix . 'remove_page_title',
        'type' => 'checkbox'
    ) );
    
	$cmb->add_field( array(
		'name' => 'Title Icon',
        'desc' => 'The <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_BLANK">FontAwesome</a> icon suffix (Ex: "file-text" instead of "fa fa-file-text")',
		'id'   => $prefix . 'icon',
		'type' => 'text'
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
        'name'    => 'Conductor Name',
        'desc'    => '<b>Optional</b>. Name of conductor.',
        'default' => '',
        'id'      => $prefix . 'conductor_name',
        'type'    => 'text_medium'
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
    ) );

}
add_action( 'cmb2_init', 'ucfbands_page_settings_metabox' );
