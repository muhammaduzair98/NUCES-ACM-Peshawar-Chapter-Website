<?php
/**
 * Element Name: Schedules
 *
 * @class EPLUS_Element_schedules
 *
 * @package elements/schedules
 * @copyright Pluginbazar 2019
 */

class EPLUS_Element_schedules extends EPLUS_Element {

	function __construct( $id, $element_name = '', $element = array()  ) {
		parent::__construct( $id, $element_name, $element );

		$this->set_element_config( array(
			'content_element'         => true,
			'show_settings_on_create' => true,
			'description'             => esc_html__( 'Element plus business schedules', 'element-plus' ),
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
				'type'        => 'attach_image',
				'heading'     => esc_html__( 'Schedules Status Image', 'element-plus' ),
				'param_name'  => 'ss_imgid',
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Primary Color', 'element-plus' ),
				'param_name'  => 'primary_color',
				'dependency'  => array(
					'element' => 'style',
					'value'   => array( '3' ),
				),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Text Color', 'element-plus' ),
				'param_name'  => 'color',
				'dependency'  => array(
					'element' => 'style',
					'value'   => array( '3' ),
				),
			),
			array(
				'type'       => 'param_group',
				'heading'    => esc_html__( 'All Schedules', 'element-plus' ),
				'param_name' => 'schedules',
				'group'      => esc_html__( 'Schedules', 'element-plus' ),
				'params'     => array(
					array(
						'type'        => 'textfield',
						'heading'     => esc_html__( 'Day Name', 'element-plus' ),
						'description' => esc_html__( 'Add a day name. You can add any range of days too. Example: Saturday or Saturday - Thursday', 'element-plus' ),
						'param_name'  => 'day',
					),
					array(
						'type'       => 'param_group',
						'heading'    => esc_html__( 'Day Schedules', 'element-plus' ),
						'param_name' => 'sessions',
						'params'     => array(
							array(
								'type'        => 'timepicker',
								'heading'     => esc_html__( 'Opening time', 'element-plus' ),
								'param_name'  => 'open',
								'placeholder' => esc_html__( '10:00 AM', 'element-plus' ),
							),
							array(
								'type'        => 'timepicker',
								'heading'     => esc_html__( 'Closing time', 'element-plus' ),
								'param_name'  => 'close',
								'placeholder' => esc_html__( '05:00 PM', 'element-plus' ),
							),
						),
					),
				),
			),
		);
	}
}