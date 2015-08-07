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
        'priority'     => 'core',
	) );
    
    $cmb_group->add_field( array(
        'name'      => 'Column Layout',
        'id'        => $prefix . 'column_layout',
        'type'      => 'radio',
        'desc'      => '
            <span style="color: #000;"><b>Note:</b> If a block width is set outside of its compatible layout (ex: "One Third" on a 4-Column Layout), errors will occur!</span>',
        'default'   => '6-column',
        'options'   => array(
            '6col' => __( '6-Column &emsp; (Widths: One Third, One Half, Two Thirds, &amp; One Whole)', 'cmb' ),
            '4col' => __( '4-Column &emsp; (Widths: One Fourth, One Half, Three Fourths, &amp; One Whole)', 'cmb' ),
        )
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
        'default' => 'one-third',
        'options' => array(
            'one-third'     => __( 'One Third &emsp; (6-Column Only)', 'cmb' ),
            'two-thirds'    => __( 'Two Thirds &emsp; (6-Column Only)', 'cmb' ),
            'one-fourth'    => __( 'One Fourth &emsp; (4-Column Only)', 'cmb' ),
            'three-fourths' => __( 'Three Fourths &emsp; (4-Column Only)', 'cmb' ),
            'one-half'      => __( 'One Half', 'cmb' ),
            'one-whole'     => __( 'One Whole', 'cmb' ),
        ),
	) );
    
	$cmb_group->add_group_field( $group_field_id, array(
		'name' => __( 'Block Content', 'ucfbands-blocks' ),
		'id'   => 'block-content',
		'type' => 'textarea_code', //'type' => 'wysiwyg'
        'desc' => 'This text area supports <b><a href="https://help.github.com/articles/github-flavored-markdown/" target="_BLANK">GithHub Flavored Markdown</a></b> and shortcodes. Markdown is required to format the block text. However, this functionality can be removed below.'
	) );

	$cmb_group->add_group_field( $group_field_id, array(
		'name' => __( 'Render as HTML', 'ucfbands-blocks' ),
		'id'   => 'render_html',
		'type' => 'checkbox',
        'desc' => 'Renders content as HTML instead of Github-Flavored Markdown',
	) );    
    
	$cmb_group->add_group_field( $group_field_id, array(
		'name' => __( 'Remove Block Background &amp; Padding', 'ucfbands-blocks' ),
		'id'   => 'remove-background',
		'type' => 'checkbox',
        'desc' => 'Remove the white background &amp; shadow, along with the padding to be compatible with a block-filled shortcode.',
	) );
    
    $cmb_group->add_group_field( $group_field_id, array(
		'name' => __( 'Breaker Block', 'ucfbands-blocks' ),
		'id'   => 'breaker',
		'type' => 'checkbox',
        'desc' => 'Turn this block into a "row breaker", which separates the blocks this block is between.'
	) );
    
}
add_action( 'cmb2_init', 'ucfbands_blocks_metabox' );