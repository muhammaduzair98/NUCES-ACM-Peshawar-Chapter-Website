<?php
/**
 * Element Name: Banner
 *
 * @class EPLUS_Element_banner
 *
 * @package elements/banner
 * @copyright Pluginbazar 2019
 */

class EPLUS_Element_banner extends EPLUS_Element {

	function __construct( $id, $element_name = '', $element = array()  ) {
		parent::__construct( $id, $element_name, $element );

		$this->set_element_config( array(
			'content_element'         => true,
			'show_settings_on_create' => true,
			'description'             => esc_html__( 'Element plus banner', 'element-plus' ),
			'style_variations'        => 4,
			'views'                   => array(
				'2' => 'template-2',
				'3' => 'template-3',
				'4' => 'template-4',
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
				'heading'    => esc_html__( 'Background Image', 'element-plus' ),
				'param_name' => 'bg_imgid',
				'dependency' => array(
					'element' => 'style',
					'value'   => array( '3', '4' ),
				)
			),
			array(
				'type'       => 'attach_image',
				'heading'    => esc_html__( 'Select Front Image', 'element-plus' ),
				'param_name' => 'img_id',
				'dependency' => array(
					'element' => 'style',
					'value'   => array( '2', '3', '4' ),
				)
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Sub Title', 'element-plus' ),
				'param_name' => 'sub_title',
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Title', 'element-plus' ),
				'param_name'  => 'title',
				'admin_label' => true,
			),
			array(
				'type'       => 'textarea',
				'heading'    => esc_html__( 'Short Description', 'element-plus' ),
				'param_name' => 'short_desc',
			),
			array(
				'type'        => 'vc_link',
				'heading'     => esc_html__( 'Button 1', 'element-plus' ),
				'param_name'  => 'btn_1',
				'description' => esc_html__( 'Add custom link.', 'element-plus' ),
			),
			array(
				'type'        => 'vc_link',
				'heading'     => esc_html__( 'Button 2', 'element-plus' ),
				'param_name'  => 'btn_2',
				'description' => esc_html__( 'Add custom link.', 'element-plus' ),
			),
			array(
				'type'       => 'dropdown',
				'param_name' => 'align',
				'heading'    => esc_html__( 'Alignment', 'element-plus' ),
				'group'      => esc_html__( 'Design', 'element-plus' ),
				'value'      => array(
					esc_html__( 'Left' )   => '',
					esc_html__( 'Center' ) => 'banner-center',
					esc_html__( 'Right' )  => 'banner-right',
				),
				'dependency' => array( 'element' => 'style', 'value' => '1', ),
			),
			array(
				'type'       => 'dropdown',
				'param_name' => 'content_layout',
				'heading'    => esc_html__( 'Content Layout', 'element-plus' ),
				'group'      => esc_html__( 'Design', 'element-plus' ),
				'value'      => array(
					esc_html__( 'Image Right - Content Left' ) => '',
					esc_html__( 'Image Left - Content Right' ) => 'img_left',
				),
				'dependency' => array( 'element' => 'style', 'value' => array( '3' ), ),
			),
			array(
				'type'        => 'checkbox',
				'param_name'  => 'circle_shape',
				'value'       => array( esc_html__( 'Banner Circle Shape', 'element-plus' ) => 'eplus-banner-circle' ),
				'group'      => esc_html__( 'Design', 'element-plus' ),
				'dependency' => array( 'element' => 'style', 'value' => array( '3' ), ),
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'circle_position',
				'heading'     => esc_html__( 'Circle Shape Position', 'element-plus' ),
				'description' => esc_html__( 'Reposition Circle Shape with this format: Top Right Bottom Left. Example: -200 0 -200 auto | Default: 0 0 0 0', 'element-plus' ),
				'group'       => esc_html__( 'Design', 'element-plus' ),
				'dependency' => array(
					'element'   => 'circle_shape',
					'not_empty' => true,
				)
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Circle Shape Color', 'element-plus' ),
				'param_name'  => 'circle_shape_color',
				'group'       => esc_html__( 'Design', 'element-plus' ),
				'dependency' => array(
					'element'   => 'circle_shape',
					'not_empty' => true,
				)
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'padding',
				'heading'     => esc_html__( 'Banner Padding', 'element-plus' ),
				'description' => esc_html__( 'Reposition image using Padding with this format: Top Right Bottom Left. Example: 150px 0 100px 0 | Default: 0 0 0 0', 'element-plus' ),
				'group'       => esc_html__( 'Design', 'element-plus' ),
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'img_margin',
				'heading'     => esc_html__( 'Front Image Margin', 'element-plus' ),
				'description' => esc_html__( 'Reposition image using Margin with this format: Top Right Bottom Left. Example: 150px 0 100px 0 | Default: 0 0 0 0', 'element-plus' ),
				'group'       => esc_html__( 'Design', 'element-plus' ),
				'dependency'  => array( 'element' => 'style', 'value' => array( '2', '3', '4' ), ),
			),
		);
	}
}