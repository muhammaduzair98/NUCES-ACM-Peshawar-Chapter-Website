<?php
/**
 * Element Name: Progress Pie
 *
 * @class EPLUS_Element_progresspie
 *
 * @package elements/progresspie
 * @copyright Pluginbazar 2019
 */

class EPLUS_Element_progresspie extends EPLUS_Element {

	function __construct( $id, $element_name = '', $element = array() ) {
		parent::__construct( $id, $element_name, $element );

		$this->set_element_config( array(
			'content_element'         => true,
			'show_settings_on_create' => true,
			'description'             => esc_html__( 'Element plus progresspie', 'element-plus' ),
			'style_variations'        => 1,
			'enable_js'               => true,
			'scripts_in_footer'       => false,
			'enqueue_assets'          => array( 'jquery.appear.js', 'jquery-asPieProgress.min.js' ),
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
				'type'       => 'textfield',
				'param_name' => 'label',
				'heading'    => esc_html__( 'Label', 'element-plus' ),
				'dependency' => array(
					'element' => 'style',
					'value'   => array( '1', '2' ),
				)
			),

			array(
				'type'        => 'range_slider',
				'param_name'  => 'value',
				'heading'     => esc_html__( 'Value', 'element-plus' ),
				'description' => esc_html__( 'Enter only number value here. length 0% - 100%', 'element-plus' ),
				'min'         => 0,
				'max'         => 100,
				'value'       => 50,
			),

			array(
				'type'        => 'range_slider',
				'heading'     => esc_html__( 'Bar Size', 'element-plus' ),
				'description' => esc_html__( 'This value will apply in pixel unit. Default: 10px', 'element-plus' ),
				'param_name'  => 'bar_size',
				'min'         => 1,
				'max'         => 80,
				'value'       => 10,
			),

			array(
				'type'       => 'dropdown',
				'param_name' => 'linecap',
				'heading'    => esc_html__( 'Line Cap', 'element-plus' ),
				'value'      => array(
					esc_html__( 'Butt', 'element-plus' )    => 'butt',
					esc_html__( 'Round', 'element-plus' ) => 'round',
					esc_html__( 'Square', 'element-plus' )  => 'square',
				)
			),

			array(
				'type'       => 'colorpicker',
				'param_name' => 'value_color',
				'heading'    => esc_html__( 'Value Color', 'element-plus' ),
				'group'      => esc_html__( 'Design', 'element-plus' ),
			),

			array(
				'type'       => 'colorpicker',
				'param_name' => 'label_color',
				'heading'    => esc_html__( 'Label Color', 'element-plus' ),
				'group'      => esc_html__( 'Design', 'element-plus' ),
			),

			array(
				'type'       => 'colorpicker',
				'param_name' => 'trackcolor',
				'heading'    => esc_html__( 'Track Color', 'element-plus' ),
				'group'      => esc_html__( 'Design', 'element-plus' ),
			),

			array(
				'type'       => 'colorpicker',
				'param_name' => 'barcolor',
				'heading'    => esc_html__( 'Bar Color', 'element-plus' ),
				'group'      => esc_html__( 'Design', 'element-plus' ),
			),

			array(
				'type'       => 'colorpicker',
				'param_name' => 'fillcolor',
				'heading'    => esc_html__( 'Fill Color', 'element-plus' ),
				'group'      => esc_html__( 'Design', 'element-plus' ),
			),

		);
	}
}