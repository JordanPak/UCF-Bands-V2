<?php

/**
 *  UCFBands Register Page Title Metabox
 *
 *  @author Jordan Pakrosnis
 */
function ucfbands_page_title_metabox() {
	$prefix = '_ucfbands_page_title_';

	/**
     * Initiate the metabox
     */
    $cmb = new_cmb2_box( array(
        'id'            => $prefix . 'metabox',
        'title'         => __( 'Page Title Settings', 'ucfbands-page-title' ),
        'object_types'  => array( 'page' ),
        'context'       => 'normal',
        'priority'      => 'high',
        'show_on'      => array( 'key' => 'page-template', 'value' => 'page-templates/page_grid.php' ),
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
        'name'    => 'Conductor Name',
        'desc'    => '<b>Optional</b>. Name of conductor.',
        'default' => '',
        'id'      => 'conductor_name',
        'type'    => 'text_medium'
    ) );    
}
add_action( 'cmb2_init', 'ucfbands_page_title_metabox' );