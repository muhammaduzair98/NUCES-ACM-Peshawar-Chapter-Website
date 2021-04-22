<?php
/**
 * Element Name: Promotion Banner
 *
 * @class EPLUS_Element_promotion
 *
 * @package elements/promotion
 * @copyright Pluginbazar 2019
 */

class EPLUS_Element_promotion extends EPLUS_Element {

	function __construct( $id, $element_name = '', $element = array()  ) {
		parent::__construct( $id, $element_name, $element );

		$this->set_element_config( array(
			'content_element'         => true,
			'show_settings_on_create' => true,
			'description'             => esc_html__( 'Element plus promotion banner', 'element-plus' ),
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
				'type'       => 'attach_image',
				'heading'    => esc_html__( 'Select Image', 'element-plus' ),
				'param_name' => 'img',
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Title', 'element-plus' ),
				'param_name' => 'title',
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Sub Title', 'element-plus' ),
				'param_name' => 'sub_title',
			),
			array(
				'type'       => 'vc_link',
				'heading'    => esc_html__( 'Button URL (s)', 'element-plus' ),
				'param_name' => 'link',
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'banner_padding',
				'heading'     => esc_html__( 'Banner Padding', 'element-plus' ),
				'description' => esc_html__( 'Reposition banner using Padding with this format: Top Right Bottom Left. Example: 10px 0 10px 0 | Default: 0 0 0 0', 'element-plus' ),
				'group'       => esc_html__( 'Design', 'element-plus' ),
			),
			array(
				'type'       => 'range_slider',
				'heading'    => esc_html__( 'Banner Min Height', 'element-plus' ),
				'group'      => esc_html__( 'Design', 'element-plus' ),
				'param_name' => 'min_height',
				'min'        => 100,
				'max'        => 800,
				'value'      => 300,
			),
			array(
				'type'       => 'colorpicker',
				'heading'    => esc_html__( 'Title Color', 'element-plus' ),
				'param_name' => 'color',
				'group'      => esc_html__( 'Design', 'element-plus' ),
			),
			array(
				'type'       => 'colorpicker',
				'heading'    => esc_html__( 'Promo Background', 'element-plus' ),
				'param_name' => 'bg_color',
				'group'      => esc_html__( 'Design', 'element-plus' ),
			),
			array(
				'type'       => 'colorpicker',
				'heading'    => esc_html__( 'Button Color', 'element-plus' ),
				'param_name' => 'btn_color',
				'group'      => esc_html__( 'Design', 'element-plus' ),
			),
			array(
				'type'       => 'colorpicker',
				'heading'    => esc_html__( 'Button Background', 'element-plus' ),
				'param_name' => 'btn_background',
				'group'      => esc_html__( 'Design', 'element-plus' ),
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'img_margin',
				'heading'     => esc_html__( 'Image Margin', 'element-plus' ),
				'description' => esc_html__( 'Reposition image using Margin with this format: Top Right Bottom Left. Example: 10px 0 -15px -5px | Default: 0 0 0 0', 'element-plus' ),
				'group'       => esc_html__( 'Design', 'element-plus' ),
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'img_padding',
				'heading'     => esc_html__( 'Image Padding', 'element-plus' ),
				'description' => esc_html__( 'Reposition image using Padding with this format: Top Right Bottom Left. Example: 10px 0 -15px -5px | Default: 0 0 0 0', 'element-plus' ),
				'group'       => esc_html__( 'Design', 'element-plus' ),
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Image Max Width', 'element-plus' ),
				'group'      => esc_html__( 'Design', 'element-plus' ),
				'description' => esc_html__( 'Default: auto, Example: 520px', 'element-plus' ),
				'param_name' => 'max_width',
			),
			array(
				'type'       => 'dropdown',
				'param_name' => 'img_position',
				'heading'    => esc_html__( 'Image Position', 'element-plus' ),
				'group'      => esc_html__( 'Design', 'element-plus' ),
				'value'      => array(
					esc_html__( 'Left', 'element-plus' )  => '',
					esc_html__( 'Right', 'element-plus' ) => 'right',
				),
			),
		);
	}
}