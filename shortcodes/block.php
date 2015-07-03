<?php
/**
 * Register Block as repeatable group fields
 */
function ucfbands_block_metabox() {
	$prefix = '_ucfbands_block_';

	$cmb_group = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => __( 'Blocks', 'ucfbands-blocks' ),
		'object_types' => array( 'page' ),
		'show_on'      => array( 'key' => 'page-template', 'value' => 'page-templates/page_grid.php' ),
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
        'desc' => 'The FontAwesome icon suffix (Ex: "file-text" instead of "fa fa-file-text"'
	) );

	$cmb_group->add_group_field( $group_field_id, array(
		'name' => __( 'Featured', 'ucfbands-blocks' ),
		'id'   => 'featured',
		'type' => 'checkbox'
	) );
    
	$cmb_group->add_group_field( $group_field_id, array(
		'name' => __( 'Width', 'ucfbands-blocks' ),
		'id'   => 'width',
		'type' => 'select',
        'default' => 'one-fourth',
        'options' => array(
            'one-whole'     => __( 'One Whole', 'cmb' ),
            'one-half'      => __( 'One Half', 'cmb' ),
            'three-sixths'  => __( 'Three Sixths', 'cmb' ),
            'two-fourths'   => __( 'Two Fourths', 'cmb' ),
            'one-third'     => __( 'One Third', 'cmb' ),
            'two-sixths'    => __( 'Two Sixths', 'cmb' ),
            'four-sixths'   => __( 'Four Sixths', 'cmb' ),
            'two-thirds'    => __( 'Two Thirds', 'cmb' ),
            'one-fourth'    => __( 'One Fourth', 'cmb' ),
            'three-fourths' => __( 'Three Fourrths', 'cmb' ),
            'one-sixth'     => __( 'One Sixth', 'cmb' ),
            'five-sixths'   => __( 'Five Sixths', 'cmb' ),
        ),
	) );
    
	$cmb_group->add_group_field( $group_field_id, array(
		'name' => __( 'Block Content', 'ucfbands-blocks' ),
		'id'   => 'block-content',
		'type' => 'wysiwyg'
	) );
    
}
add_action( 'cmb2_init', 'ucfbands_block_metabox' );