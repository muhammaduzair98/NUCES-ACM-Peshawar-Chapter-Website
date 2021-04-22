<?php
/**
 * Element Name: Charts
 *
 * @class EPLUS_Element_charts
 *
 * @package elements/charts
 * @copyright Pluginbazar 2019
 */

class EPLUS_Element_charts extends EPLUS_Element {

	function __construct( $id, $element_name = '', $element = array()  ) {
		parent::__construct( $id, $element_name, $element );

		$this->set_element_config( array(
			'content_element'         => true,
			'show_settings_on_create' => true,
			'description'             => esc_html__( 'Element plus Charts', 'element-plus' ),
			'enable_js'               => true,
			'scripts_in_footer'       => false,
			'enqueue_assets'          => array( 'apexcharts.js' ),
			'styles'                  => array(
				'line'  => esc_html__( 'Line', 'element-plus' ),
				'bar'   => esc_html__( 'Bar / Column', 'element-plus' ),
				'pie'   => esc_html__( 'Pie', 'element-plus' ),
				'donut' => esc_html__( 'Donut', 'element-plus' ),
			),
			'views'                   => array(
				'pie'   => 'template-2',
				'donut' => 'template-2',
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
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Data Label', 'element-plus' ),
				'param_name' => 'series_label',
				'dependency' => array(
					'element' => 'style',
					'value'   => array( 'line', 'bar' ),
				),
			),
			array(
				'type'       => 'param_group',
				'heading'    => esc_html__( 'Chart Data', 'element-plus' ),
				'param_name' => 'chart_data',
				'params'     => array(
					array(
						'type'        => 'textfield',
						'heading'     => esc_html__( 'Label', 'element-plus' ),
						'description' => esc_html__( 'Add level of this data value, this label will appear at the x-axis.', 'element-plus' ),
						'param_name'  => 'data_label',
					),
					array(
						'type'        => 'textfield',
						'heading'     => esc_html__( 'Value', 'element-plus' ),
						'description' => esc_html__( 'Specify the value for this data.', 'element-plus' ),
						'param_name'  => 'data_value',
					),
				),

			),
		);
	}
}