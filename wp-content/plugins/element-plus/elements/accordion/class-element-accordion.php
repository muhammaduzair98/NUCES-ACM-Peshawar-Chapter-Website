<?php
/**
 * Element Name: Accordion
 *
 * @class EPLUS_Element_accordion
 *
 * @package elements/accordion
 * @copyright Pluginbazar 2019
 */

class EPLUS_Element_accordion extends EPLUS_Element {

	function __construct( $id, $element_name = '', $element = array()  ) {
		parent::__construct( $id, $element_name, $element );

		$this->set_element_config( array(
			'content_element'         => true,
			'show_settings_on_create' => true,
			'description'             => esc_html__( 'Element plus accordion', 'element-plus' ),
			'enable_js'               => true,
			'style_variations'        => 5,
			'views'                   => array(
				'4' => 'template-2',
				'5' => 'template-2',
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
				'type'       => 'param_group',
				'heading'    => esc_html__( 'Feature (s)', 'element-plus' ),
				'param_name' => 'accordions',
				'params'     => array(
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__( 'Title', 'element-plus' ),
						'param_name' => 'title',
					),
					array(
						'type'       => 'textarea',
						'heading'    => esc_html__( 'Content', 'element-plus' ),
						'param_name' => 'content',
					),
				),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Color', 'element-plus' ),
				'param_name'  => 'color',
				'group'       => esc_html__( 'Design', 'element-plus' ),
				'dependency'  => array(
					'element' => 'style',
					'value'   => array( '3', '4', '5' ),
				),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Primary Color', 'element-plus' ),
				'param_name'  => 'primary_color',
				'group'       => esc_html__( 'Design', 'element-plus' ),
				'dependency'  => array(
					'element' => 'style',
					'value'   => array( '3', '4', '5' ),
				),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Secondary Color', 'element-plus' ),
				'param_name'  => 'secondary_color',
				'group'       => esc_html__( 'Design', 'element-plus' ),
				'dependency'  => array(
					'element' => 'style',
					'value'   => array( '3', '4', '5' ),
				),
			),
		);
	}
}