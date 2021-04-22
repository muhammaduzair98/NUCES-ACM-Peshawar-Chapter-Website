<?php
/**
 * Element Name: Countdown Timer
 *
 * @class EPLUS_Element_countdown
 *
 * @package elements/countdown
 * @copyright Pluginbazar 2019
 */

class EPLUS_Element_countdown extends EPLUS_Element {

	function __construct( $id, $element_name = '', $element = array()  ) {
		parent::__construct( $id, $element_name, $element );

		$this->set_element_config( array(
			'content_element'         => true,
			'show_settings_on_create' => true,
			'description'             => esc_html__( 'Element plus countdown timer', 'element-plus' ),
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
				'param_name'  => 'date_time',
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Date & Time', 'element-plus' ),
				'value' => esc_html__( '20-10-2020 01:51 pm', 'element-plus' ),
				'description' => esc_html__( 'Use this format to add date with/without time. Format: d-m-Y h:i a. Example: 20-10-2020 01:51 pm', 'element-plus' ),
				'admin_label' => true,
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Primary Color', 'element-plus' ),
				'param_name'  => 'primary_color',
				'dependency'  => array(
					'element' => 'style',
					'value'   => array( '4', '5' ),
				),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Secondary Color', 'element-plus' ),
				'param_name'  => 'secondary_color',
				'dependency'  => array(
					'element' => 'style',
					'value'   => array( '4', '5' ),
				),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Text Color', 'element-plus' ),
				'param_name'  => 'color',
				'dependency'  => array(
					'element' => 'style',
					'value'   => array( '4', '5' ),
				),
			),
		);
	}
}