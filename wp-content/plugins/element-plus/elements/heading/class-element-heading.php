<?php
/**
 * Element Name: Heading
 *
 * @class EPLUS_Element_heading
 *
 * @package elements/heading
 * @copyright Pluginbazar 2019
 */

class EPLUS_Element_heading extends EPLUS_Element {

	function __construct( $id, $element_name = '', $element = array()  ) {
		parent::__construct( $id, $element_name, $element );

		$this->set_element_config( array(
			'content_element'         => true,
			'show_settings_on_create' => true,
			'description'             => esc_html__( 'Element plus heading', 'element-plus' ),
			'style_variations'        => 1,
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
				'param_name' => 'sub_title',
				'heading'    => esc_html__( 'Sub Title', 'element-plus' ),
			),
			array(
				'type'       => 'textfield',
				'param_name' => 'title',
				'heading'    => esc_html__( 'Title', 'element-plus' ),
			),
			array(
				'type'       => 'textarea',
				'param_name' => 'short_desc',
				'heading'    => esc_html__( 'Short Description', 'element-plus' ),
			),
			array(
				'type'       => 'checkbox',
				'param_name' => 'custom_design',
				'value'       => array( esc_html__( 'Custom Design ( Size, Color & Align )', 'element-plus' ) => 'yes' ),
			),
			array(
				'type'       => 'dropdown',
				'param_name' => 'align',
				'heading'    => esc_html__( 'Heading Alignment', 'element-plus' ),
				'group'      => esc_html__( 'Design', 'element-plus' ),
				'value'      => array(
					esc_html__( 'Left' )   => '',
					esc_html__( 'Center' ) => 'center',
					esc_html__( 'Right' )  => 'right',
				),
				'dependency' => array( 'element' => 'custom_design', 'not_empty' => true, ),

			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'sub_title_size',
				'heading'     => esc_html__( 'Sub Title Size', 'element-plus' ),
				'description' => esc_html__( 'Enter sub title font size here. Example, 22px', 'element-plus' ),
				'group'       => esc_html__( 'Design', 'element-plus' ),
				'dependency'  => array( 'element' => 'custom_design', 'not_empty' => true, ),
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'title_size',
				'heading'     => esc_html__( 'Title Size', 'element-plus' ),
				'description' => esc_html__( 'Enter title font size here. Example, 52px', 'element-plus' ),
				'group'       => esc_html__( 'Design', 'element-plus' ),
				'dependency'  => array( 'element' => 'custom_design', 'not_empty' => true, ),
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'short_desc_size',
				'heading'     => esc_html__( 'Short Description Size', 'element-plus' ),
				'description' => esc_html__( 'Enter short desc font size here. Example, 18px', 'element-plus' ),
				'group'       => esc_html__( 'Design', 'element-plus' ),
				'dependency'  => array( 'element' => 'custom_design', 'not_empty' => true, ),
			),
			array(
				'type'       => 'colorpicker',
				'heading'    => esc_html__( 'Sub Title Color', 'element-plus' ),
				'param_name' => 'sub_title_color',
				'group'      => esc_html__( 'Design', 'element-plus' ),
				'dependency' => array( 'element' => 'custom_design', 'not_empty' => true, ),
			),
			array(
				'type'       => 'colorpicker',
				'heading'    => esc_html__( 'Title Color', 'element-plus' ),
				'param_name' => 'title_color',
				'group'      => esc_html__( 'Design', 'element-plus' ),
				'dependency' => array( 'element' => 'custom_design', 'not_empty' => true, ),
			),
			array(
				'type'       => 'colorpicker',
				'heading'    => esc_html__( 'Short Description Color', 'element-plus' ),
				'param_name' => 'short_desc_color',
				'group'      => esc_html__( 'Design', 'element-plus' ),
				'dependency' => array( 'element' => 'custom_design', 'not_empty' => true, ),
			),
		);
	}
}