<?php
/**
 * Element Name: Counter
 *
 * @class EPLUS_Element_counter
 *
 * @package elements/counter
 * @copyright Pluginbazar 2019
 */

class EPLUS_Element_counter extends EPLUS_Element {

	function __construct( $id, $element_name = '', $element = array()  ) {
		parent::__construct( $id, $element_name, $element );

		$this->set_element_config( array(
			'content_element'         => true,
			'show_settings_on_create' => true,
			'description'             => esc_html__( 'Element plus counter', 'element-plus' ),
			'enable_js'               => true,
			'enqueue_assets'          => array( 'jquery.counter.min.js', 'waypoint.min.js' ),
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
				'heading'    => esc_html__( 'Counter (s)', 'element-plus' ),
				'param_name' => 'counters',
				'params'     => array(
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__( 'Number', 'element-plus' ),
						'param_name' => 'number',
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__( 'Title', 'element-plus' ),
						'param_name' => 'title',
					),
					array(
						'type'      => 'iconlibrary',
						'emptyIcon' => true,
					),
					array(
						'type'       => 'colorpicker',
						'heading'    => esc_html__( 'Icon Color', 'element-plus' ),
						'param_name' => 'icon_color',
					),
					array(
						'type'       => 'colorpicker',
						'heading'    => esc_html__( 'Number Color', 'element-plus' ),
						'param_name' => 'number_color',
					),
					array(
						'type'       => 'colorpicker',
						'heading'    => esc_html__( 'Title Color', 'element-plus' ),
						'param_name' => 'title_color',
					),
					array(
						'type'       => 'colorpicker',
						'heading'    => esc_html__( 'Primary Background', 'element-plus' ),
						'param_name' => 'primary',
						'dependency' => array(
							'element' => 'style',
							'value'   => array( '2' ),
						),
					),
					array(
						'type'       => 'colorpicker',
						'heading'    => esc_html__( 'Secondary Background', 'element-plus' ),
						'param_name' => 'secondary',
						'dependency' => array(
							'element' => 'style',
							'value'   => array( '10' ),
						),
					),
				),
			),
		);
	}
}