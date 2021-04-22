<?php
/**
 * Element Name: Tabs
 *
 * @class EPLUS_Element_tabs
 *
 * @package elements/tabs
 * @copyright Pluginbazar 2019
 */

class EPLUS_Element_tabs extends EPLUS_Element {

	function __construct( $id, $element_name = '', $element = array()  ) {
		parent::__construct( $id, $element_name, $element );

		$this->set_element_config( array(
			'content_element'         => true,
			'show_settings_on_create' => true,
			'description'             => esc_html__( 'Element plus tabs', 'element-plus' ),
			'enable_js'               => true,
			'style_variations'        => 5,
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
				'heading'    => esc_html__( 'Tabs', 'element-plus' ),
				'param_name' => 'tabs',
				'params'     => array(
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__( 'Label', 'element-plus' ),
						'param_name' => 'label',
					),
					array(
						'type' => 'iconlibrary',
					),
					array(
						'type'        => 'textarea',
						'param_name'  => 'content',
						'heading'     => esc_html__( 'Content', 'element-plus' ),
						'description' => esc_html__( 'Enter you tab content here. Custom HTML markup allowed', 'element-plus' ),
					),
				),
			),
		);
	}
}