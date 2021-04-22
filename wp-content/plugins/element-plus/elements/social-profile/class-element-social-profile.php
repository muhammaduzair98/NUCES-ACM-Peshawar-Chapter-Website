<?php
/**
 * Element Name: Social Profile
 *
 * @class EPLUS_Element_social_profile
 *
 * @package elements/social-profile
 * @copyright Pluginbazar 2019
 */

class EPLUS_Element_social_profile extends EPLUS_Element {

	function __construct( $id, $element_name = '', $element = array()  ) {
		parent::__construct( $id, $element_name, $element );

		$this->set_element_config( array(
			'content_element'         => true,
			'show_settings_on_create' => true,
			'description'             => esc_html__( 'Element plus social profile', 'element-plus' ),
			'style_variations'        => 5,
			'views'                   => array(
				'2' => 'template-2',
				'4' => 'template-3',
			)
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
				'heading'    => esc_html__( 'Social Item (s)', 'element-plus' ),
				'param_name' => 'social_items',
				'params'     => array(
					array(
						'type'       => 'vc_link',
						'heading'    => esc_html__( 'URL (Link)', 'element-plus' ),
						'param_name' => 'url',
					),
					array(
						'type' => 'iconlibrary',
					),
					array(
						'type'       => 'colorpicker',
						'heading'    => esc_html__( 'Color', 'element-plus' ),
						'param_name' => 'color',
					),
				),
			),
			array(
				'type'       => 'colorpicker',
				'heading'    => esc_html__( 'Primary Color', 'element-plus' ),
				'param_name' => 'primary',
				'dependency' => array(
					'element' => 'style',
					'value'   => array( '1', '2', '4', '5' ),
				),
			),
			array(
				'type'       => 'colorpicker',
				'heading'    => esc_html__( 'Secondary Color', 'element-plus' ),
				'param_name' => 'secondary',
				'dependency' => array(
					'element' => 'style',
					'value'   => array( '4', '5' ),
				),
			),
		);
	}
}