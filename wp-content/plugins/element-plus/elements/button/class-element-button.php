<?php
/**
 * Element Name: Button
 *
 * @class EPLUS_Element_button
 *
 * @package elements/button
 * @copyright Pluginbazar 2019
 */

class EPLUS_Element_button extends EPLUS_Element {

	function __construct( $id, $element_name = '', $element = array()  ) {
		parent::__construct( $id, $element_name, $element );

		$this->set_element_config( array(
			'content_element'         => true,
			'show_settings_on_create' => true,
			'description'             => esc_html__( 'Element plus button', 'element-plus' ),
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
				'type'       => 'vc_link',
				'heading'    => esc_html__( 'Button Property', 'element-plus' ),
				'param_name' => 'btn_property',
			),
			array(
				'type'        => 'checkbox',
				'param_name'  => 'custom_design',
				'description' => esc_html__( 'If checked, Custom design option will be available on design tab.', 'element-plus' ),
				'value'       => array( esc_html__( 'Custom Design', 'element-plus' ) => 'yes' ),
			),
			array(
				'type'        => 'checkbox',
				'param_name'  => 'fullwidth',
				'group'      => esc_html__( 'Design', 'element-plus' ),
				'value'       => array( esc_html__( 'Fullwidth Button', 'element-plus' ) => 'eplus-btn-fullwidth' ),
				'dependency' => array(
					'element'   => 'custom_design',
					'not_empty' => true,
				),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Padding', 'element-plus' ),
				'param_name'  => 'padding',
				'description' => esc_html__( 'Format: Top Right Bottom Left. Example: 10px 15px 10px 15px | Default: 0 0 0 0', 'element-plus' ),
				'group'      => esc_html__( 'Design', 'element-plus' ),
				'dependency' => array(
					'element'   => 'custom_design',
					'not_empty' => true,
				),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Margin', 'element-plus' ),
				'param_name'  => 'margin',
				'description' => esc_html__( 'Format: Top Right Bottom Left. Example: 10px 15px 10px 15px | Default: 0 0 0 0', 'element-plus' ),
				'group'      => esc_html__( 'Design', 'element-plus' ),
				'dependency' => array(
					'element'   => 'custom_design',
					'not_empty' => true,
				),
			),
			array(
				'type'       => 'range_slider',
				'heading'    => esc_html__( 'Min Width', 'element-plus' ),
				'param_name' => 'min_width',
				'min'        => 80,
				'max'        => 320,
				'value'      => 90,
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Font Size', 'element-plus' ),
				'param_name' => 'font_size',
				'group'      => esc_html__( 'Design', 'element-plus' ),
				'description' => esc_html__( 'Example: 10px Default: 0', 'element-plus' ),
				'dependency' => array(
					'element'   => 'custom_design',
					'not_empty' => true,
				),
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Radius', 'element-plus' ),
				'param_name' => 'radius',
				'group'      => esc_html__( 'Design', 'element-plus' ),
				'description' => esc_html__( 'Format: Top Right Bottom Left. Example: 10px 15px 10px 15px | Default: 0 0 0 0', 'element-plus' ),
				'dependency' => array(
					'element'   => 'custom_design',
					'not_empty' => true,
				),
			),
			array(
				'type'        => 'checkbox',
				'param_name'  => 'stroke',
				'value'       => array( esc_html__( 'Stroke Button', 'element-plus' ) => 'yes' ),
				'group'      => esc_html__( 'Design', 'element-plus' ),
				'dependency' => array(
					'element'   => 'custom_design',
					'not_empty' => true,
				)
			),
			array(
				'type'       => 'colorpicker',
				'heading'    => esc_html__( 'Color', 'element-plus' ),
				'param_name' => 'color',
				'group'      => esc_html__( 'Design', 'element-plus' ),
				'dependency' => array(
					'element'   => 'custom_design',
					'not_empty' => true,
				)
			),
			array(
				'type'       => 'colorpicker',
				'heading'    => esc_html__( 'Hover Color', 'element-plus' ),
				'param_name' => 'hover_color',
				'group'      => esc_html__( 'Design', 'element-plus' ),
				'dependency' => array(
					'element'   => 'custom_design',
					'not_empty' => true,
				)
			),
			array(
				'type'       => 'colorpicker',
				'heading'    => esc_html__( 'Primary Color', 'element-plus' ),
				'param_name' => 'primary_color',
				'group'      => esc_html__( 'Design', 'element-plus' ),
				'dependency' => array(
					'element'   => 'custom_design',
					'not_empty' => true,
				)
			),
			array(
				'type'       => 'colorpicker',
				'heading'    => esc_html__( 'Secondary Color', 'element-plus' ),
				'param_name' => 'secondary_color',
				'group'      => esc_html__( 'Design', 'element-plus' ),
				'dependency' => array(
					'element'   => 'custom_design',
					'not_empty' => true,
				)
			),
		);
	}
}