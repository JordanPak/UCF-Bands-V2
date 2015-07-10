<?php

/**
 * Register Block as repeatable group fields
 */
function ucfbands_blocks_metabox() {
	$prefix = '_ucfbands_blocks_';

	$cmb_group = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => __( 'Blocks', 'ucfbands-blocks' ),
		'object_types' => array( 'page' ),
		'show_on'      => array(
            'key' => 'page-template', 
            'value' => array('page-templates/page_section_grid.php', 'page-templates/page_grid.php'),
        ),
        'priority'     => 'high',
	) );

	$group_field_id = $cmb_group->add_field( array(
		'id'          => $prefix . 'meta',
		'type'        => 'group',
		'description' => '',
		'options'     => array(
			'group_title'   => __( 'Block', 'ucfbands-blocks' ),
			'add_button'    => __( 'Add Another Block', 'ucfbands-blocks' ),
			'remove_button' => __( 'Remove', 'ucfbands-blocks' ),
			'sortable'      => true
		)
	) );

	$cmb_group->add_group_field( $group_field_id, array(
		'name' => __( 'Title', 'ucfbands-blocks' ),
		'id'   => 'title',
		'type' => 'text'
	) );

	$cmb_group->add_group_field( $group_field_id, array(
		'name' => __( 'Icon', 'ucfbands-blocks' ),
		'id'   => 'icon',
		'type' => 'text',
        'desc' => 'The <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_BLANK">FontAwesome</a> icon suffix (Ex: "file-text" instead of "fa fa-file-text")'
	) );

	$cmb_group->add_group_field( $group_field_id, array(
		'name' => __( 'Featured', 'ucfbands-blocks' ),
		'id'   => 'featured',
		'type' => 'checkbox',
        'desc' => 'Enables black and gold bars at the top and bottom of the block.'
	) );
    
	$cmb_group->add_group_field( $group_field_id, array(
		'name' => __( 'Width', 'ucfbands-blocks' ),
		'id'   => 'width',
		'type' => 'select',
        'default' => 'one-fourth',
        'options' => array(
            'one-fourth'    => __( 'One Fourth', 'cmb' ),
            'one-third'     => __( 'One Third', 'cmb' ),
            'one-half'      => __( 'One Half', 'cmb' ),
            'two-thirds'    => __( 'Two Thirds', 'cmb' ),
            'three-fourths' => __( 'Three Fourths', 'cmb' ),
            'one-whole'     => __( 'One Whole', 'cmb' ),
        ),
	) );
    
	$cmb_group->add_group_field( $group_field_id, array(
		'name' => __( 'Block Content', 'ucfbands-blocks' ),
		'id'   => 'block-content',
		'type' => 'textarea' //'type' => 'wysiwyg'
	) );
    
}
add_action( 'cmb2_init', 'ucfbands_blocks_metabox' );