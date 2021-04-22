<?php
/**
 * Element Name: Info Box
 *
 * @class EPLUS_Element_info_box
 *
 * @package elements/info_box
 * @copyright Pluginbazar 2019
 */

class EPLUS_Element_info_box extends EPLUS_Element {

	function __construct( $id, $element_name = '', $element = array()  ) {
		parent::__construct( $id, $element_name, $element );

		$this->set_element_config( array(
			'content_element'         => true,
			'show_settings_on_create' => true,
			'description'             => esc_html__( 'Element plus info box', 'element-plus' ),
			'style_variations'        => 11,
			'views'                   => array(
				'11' => 'template-11',
			),
		) );
	}


	/**
	 * Return settings fields for this element
	 *
	 * @return array
	 */
	function setting_fields() {
		return array(
			array(
				'type'        => 'checkbox',
				'param_name'  => 'featured',
				'description' => esc_html__( 'If checked, info box will have featured.', 'element-plus' ),
				'value'       => array( esc_html__( 'Featured', 'element-plus' ) => 'no' ),
				'dependency'  => array(
					'element' => 'style',
					'value'   => array( '2', '8' ),
				),
			),
			array(
				'type' => 'iconlibrary',
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Count Text', 'element-plus' ),
				'param_name' => 'info_count',
				'dependency' => array(
					'element' => 'style',
					'value'   => array( '6' ),
				),
			),
			array(
				'param_name'  => 'title',
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Title', 'element-plus' ),
				'admin_label' => true,
				'description' => esc_html__( 'Info box title here.', 'element-plus' ),
				'dependency'  => array(
					'element' => 'style',
					'value'   => array( '1', '2', '3', '4', '5', '6', '7', '8', '9', '10' ),
				),
			),
			array(
				'type'        => 'textarea',
				'heading'     => esc_html__( 'Short Description', 'element-plus' ),
				'param_name'  => 'short_desc',
				'admin_label' => false,
				'dependency'  => array(
					'element' => 'style',
					'value'   => array( '1', '2', '3', '4', '5', '6', '7', '8', '9', '10' ),
				),
			),
			array(
				'type'        => 'vc_link',
				'heading'     => esc_html__( 'URL (Link)', 'element-plus' ),
				'param_name'  => 'url',
				'description' => esc_html__( 'Add custom link.', 'element-plus' ),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Color', 'element-plus' ),
				'param_name'  => 'color',
				'description' => esc_html__( 'This color will apply on text, icon', 'element-plus' ),
				'group'       => esc_html__( 'Design', 'element-plus' ),
				'dependency'  => array(
					'element' => 'style',
					'value'   => array( '1', '2', '3' ),
				),
			),
			array(
				'type'       => 'colorpicker',
				'heading'    => esc_html__( 'Button Text Color', 'element-plus' ),
				'param_name' => 'btn_color',
				'group'      => esc_html__( 'Design', 'element-plus' ),
				'dependency' => array(
					'element' => 'style',
					'value'   => array( '1', '2', '3' ),
				),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Primary Color', 'element-plus' ),
				'param_name'  => 'primary_color',
				'description' => esc_html__( 'Choose icon primary color for this info box.', 'element-plus' ),
				'group'       => esc_html__( 'Design', 'element-plus' ),
				'dependency'  => array(
					'element' => 'style',
					'value'   => array( '1', '2', '4', '5', '7', '8', '9', '10' ),
				),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Secondary Color', 'element-plus' ),
				'param_name'  => 'secondary_color',
				'description' => esc_html__( 'Choose icon secondary color for this info box.', 'element-plus' ),
				'group'       => esc_html__( 'Design', 'element-plus' ),
				'dependency'  => array(
					'element' => 'style',
					'value'   => array( '8', '9', '10' ),
				),
			),
		);
	}
}