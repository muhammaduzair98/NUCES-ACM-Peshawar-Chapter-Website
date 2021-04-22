<?php
/**
 * Element Name: Progressbar
 *
 * @class EPLUS_Element_progressbar
 *
 * @package elements/progressbar
 * @copyright Pluginbazar 2019
 */

class EPLUS_Element_progressbar extends EPLUS_Element {

	function __construct( $id, $element_name = '', $element = array()  ) {
		parent::__construct( $id, $element_name, $element );

		$this->set_element_config( array(
			'content_element'         => true,
			'show_settings_on_create' => true,
			'description'             => esc_html__( 'Element plus progressbar', 'element-plus' ),
			'style_variations'        => 3,
			'views'                   => array(
				'3' => 'template-2',
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
				'heading'    => esc_html__( 'Label', 'element-plus' ),
				'param_name' => 'pb_label',
				'dependency' => array(
					'element' => 'style',
					'value'   => array( '1', '2' ),
				)
			),

			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Start Label', 'element-plus' ),
				'param_name' => 'start_label',
				'dependency' => array(
					'element' => 'style',
					'value'   => array( '3' ),
				),
				'description'    => esc_html__( 'Enter starting label here.', 'element-plus' ),
			),

			array(
				'type'       => 'textfield',
				'param_name' => 'pb_value',
				'heading'    => esc_html__( 'Value', 'element-plus' ),
				'description'    => esc_html__( 'Enter only number value here. length 0% - 100%', 'element-plus' ),
			),

			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'End Label', 'element-plus' ),
				'param_name' => 'end_label',
				'dependency' => array(
					'element' => 'style',
					'value'   => array( '3' ),
				),
				'description'    => esc_html__( 'Enter end label here.', 'element-plus' ),
			),
			array(
				'type'       => 'attach_image',
				'heading'    => esc_html__( 'Bar Image', 'element-plus' ),
				'param_name' => 'bar_img',
				'dependency' => array(
					'element' => 'style',
					'value'   => array( '3' ),
				)
			),

			array(
				'type'       => 'colorpicker',
				'heading'    => esc_html__( 'Label Color', 'element-plus' ),
				'param_name' => 'label_color',
			),

			array(
				'type'       => 'colorpicker',
				'heading'    => esc_html__( 'Bar Image Background', 'element-plus' ),
				'param_name' => 'img_background',
				'dependency' => array(
					'element' => 'style',
					'value'   => array( '3' ),
				)
			),

			array(
				'type'       => 'colorpicker',
				'heading'    => esc_html__( 'Number Color', 'element-plus' ),
				'param_name' => 'num_color',
				'dependency' => array(
					'element' => 'style',
					'value'   => array( '1', '2' ),
				)
			),

			array(
				'type'       => 'colorpicker',
				'heading'    => esc_html__( 'Bar Color', 'element-plus' ),
				'param_name' => 'bar_color',
				'dependency' => array(
					'element' => 'style',
					'value'   => array( '1', '3' ),
				)
			),

			array(
				'type'       => 'colorpicker',
				'heading'    => esc_html__( 'Primary Background', 'element-plus' ),
				'param_name' => 'primary_color',
				'dependency' => array(
					'element' => 'style',
					'value'   => array( '2' ),
				)
			),

			array(
				'type'       => 'colorpicker',
				'heading'    => esc_html__( 'Secondary Background', 'element-plus' ),
				'param_name' => 'secondary_color',
				'dependency' => array(
					'element' => 'style',
					'value'   => array( '2' ),
				)
			),
		);
	}
}