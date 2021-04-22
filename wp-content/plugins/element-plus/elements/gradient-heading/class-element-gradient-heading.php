<?php
/**
 * Element Name: Gradient Header
 *
 * @class EPLUS_Element_gradient_heading
 *
 * @package elements/gradient-heading
 * @copyright Pluginbazar 2019
 */

class EPLUS_Element_gradient_heading extends EPLUS_Element {

	function __construct( $id, $element_name = '', $element = array()  ) {
		parent::__construct( $id, $element_name, $element );

		$this->set_element_config( array(
			'content_element'         => true,
			'show_settings_on_create' => true,
			'description'             => esc_html__( 'Element plus gradient header', 'element-plus' ),
			'style_variations'        => 1,
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
				'type'        => 'textfield',
				'param_name'  => 'heading_text',
				'heading'     => esc_html__( 'Heading Text', 'element-plus' ),
				'description' => esc_html__( 'Write content for the Heading', 'element-plus' ),
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'font_size',
				'heading'     => esc_html__( 'Font Size', 'element-plus' ),
				'description' => esc_html__( 'Heading text font size here. Example, 22', 'element-plus' ),
				'group'       => esc_html__( 'Design', 'element-plus' ),
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'font_weight',
				'heading'     => esc_html__( 'Font Weight', 'element-plus' ),
				'description' => esc_html__( 'Heading text font weight here. Example, 700', 'element-plus' ),
				'group'       => esc_html__( 'Design', 'element-plus' ),
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'line_height',
				'heading'     => esc_html__( 'Line Height', 'element-plus' ),
				'description' => esc_html__( 'Heading text font line height here. Example, 1.8', 'element-plus' ),
				'group'       => esc_html__( 'Design', 'element-plus' ),
			),

			array(
				'type'        => 'textfield',
				'param_name'  => 'heading_degree',
				'heading'     => esc_html__( 'Gradient Angle', 'element-plus' ),
				'description' => esc_html__( 'Specify gradient angle in degree unit. No need to add deg. Example: 90 or -180', 'element-plus' ),
				'group'       => esc_html__( 'Design', 'element-plus' ),
			),
			array(
				'type'       => 'colorpicker',
				'heading'    => esc_html__( 'Primary Color', 'element-plus' ),
				'param_name' => 'primary_color',
				'group'      => esc_html__( 'Design', 'element-plus' ),
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'heading_stop_1',
				'heading'     => esc_html__( 'Stoppage 1', 'element-plus' ),
				'description' => esc_html__( 'First stoppage for primary color. Example: 0', 'element-plus' ),
				'group'       => esc_html__( 'Design', 'element-plus' ),
			),
			array(
				'type'       => 'colorpicker',
				'heading'    => esc_html__( 'Secondary Color', 'element-plus' ),
				'param_name' => 'secondary_color',
				'group'      => esc_html__( 'Design', 'element-plus' ),
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'heading_stop_2',
				'heading'     => esc_html__( 'Stoppage 2', 'element-plus' ),
				'description' => esc_html__( 'Last stoppage for primary color. Example: 50', 'element-plus' ),
				'group'       => esc_html__( 'Design', 'element-plus' ),
			),
		);
	}
}