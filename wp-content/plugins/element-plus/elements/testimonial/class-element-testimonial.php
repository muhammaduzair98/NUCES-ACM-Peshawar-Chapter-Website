<?php
/**
 * Element Name: Testimonial
 *
 * @class EPLUS_Element_testimonial
 *
 * @package elements/testimonial
 * @copyright Pluginbazar 2019
 */

class EPLUS_Element_testimonial extends EPLUS_Element {

	function __construct( $id, $element_name = '', $element = array()  ) {
		parent::__construct( $id, $element_name, $element );

		$this->set_element_config( array(
			'content_element'         => true,
			'show_settings_on_create' => true,
			'description'             => esc_html__( 'Element plus testimonial', 'element-plus' ),
			'style_variations'        => 6,
			'views'                   => array(
				'1' => 'template-1',
				'2' => 'template-2',
				'3' => 'template-3',
				'4' => 'template-4',
				'5' => 'template-5',
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
				'type'        => 'attach_image',
				'heading'     => esc_html__( 'Team Image', 'element-plus' ),
				'param_name'  => 'img',
				'description' => esc_html__( 'Select image from media library.', 'element-plus' ),
			),
			array(
				'param_name'  => 'name',
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Name', 'element-plus' ),
				'admin_label' => true,
			),
			array(
				'param_name' => 'designation',
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Designation', 'element-plus' ),
			),
			array(
				'type'       => 'textarea',
				'heading'    => esc_html__( 'Review Text', 'element-plus' ),
				'param_name' => 'review_text',
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Rating', 'element-plus' ),
				'param_name' => 'rating',
				'value'      => array(
					esc_html__( 'No Rating', 'element-plus' ) => '0',
					esc_html__( '1', 'element-plus' )         => '1',
					esc_html__( '1.5', 'element-plus' )       => '1.5',
					esc_html__( '2', 'element-plus' )         => '2',
					esc_html__( '2.5', 'element-plus' )       => '2.5',
					esc_html__( '3', 'element-plus' )         => '3',
					esc_html__( '3.5', 'element-plus' )       => '3.5',
					esc_html__( '4', 'element-plus' )         => '4',
					esc_html__( '4.5', 'element-plus' )       => '4.5',
					esc_html__( '5', 'element-plus' )         => '5',
				),
			),
			array(
				'param_name' => 'recommend_text',
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Recommend Text', 'element-plus' ),
				'dependency' => array(
					'element' => 'style',
					'value'   => array( '2' ),
				)
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Primary Color', 'element-plus' ),
				'param_name'  => 'primary_color',
				'group'       => esc_html__( 'Design', 'element-plus' ),
				'dependency'  => array(
					'element' => 'style',
					'value'   => array( '4', '5' ),
				),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Secondary Color', 'element-plus' ),
				'param_name'  => 'secondary_color',
				'group'       => esc_html__( 'Design', 'element-plus' ),
				'dependency'  => array(
					'element' => 'style',
					'value'   => array( '4' ),
				),
			),
		);
	}
}