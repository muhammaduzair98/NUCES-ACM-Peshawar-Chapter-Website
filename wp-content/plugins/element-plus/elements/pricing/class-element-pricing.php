<?php
/**
 * Element Name: Pricing
 *
 * @class EPLUS_Element_pricing
 *
 * @package elements/pricing
 * @copyright Pluginbazar 2019
 */

class EPLUS_Element_pricing extends EPLUS_Element {

	function __construct( $id, $element_name = '', $element = array()  ) {
		parent::__construct( $id, $element_name, $element );

		$this->set_element_config( array(
			'content_element'         => true,
			'show_settings_on_create' => true,
			'description'             => esc_html__( 'Element plus pricing plan', 'element-plus' ),
			'style_variations'        => 3,
			'views'                   => array(
				'1' => 'template-1',
				'2' => 'template-2',
				'3' => 'template-3',
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
				'type'       => 'dropdown',
				'param_name' => 'icon_type',
				'heading'    => esc_html__( 'Icon Type', 'element-plus' ),
				'value'      => array(
					esc_html__( 'Icon', 'element-plus' )  => 'pricing_icon',
					esc_html__( 'Image', 'element-plus' ) => 'pricing_img',
				),
				'dependency' => array(
					'element' => 'style',
					'value'   => array( '1', '3' ),
				),
			),
			array(
				'type'       => 'iconpicker',
				'heading'    => esc_html__( 'Select Icon', 'element-plus' ),
				'param_name' => 'icon',
				'settings'   => array(
					'emptyIcon'    => true,
					'iconsPerPage' => 4000,
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value'   => 'pricing_icon'
				),
			),
			array(
				'type'        => 'attach_image',
				'heading'     => esc_html__( 'Select Icon', 'element-plus' ),
				'param_name'  => 'img',
				'dependency'  => array(
					'element' => 'icon_type',
					'value'   => 'pricing_img'
				),
			),
			array(
				'type'       => 'textfield',
				'param_name' => 'currency',
				'heading'    => esc_html__( 'Currency symbol', 'element-plus' ),
			),
			array(
				'param_name' => 'regular_price',
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Regular Price', 'element-plus' ),
			),
			array(
				'type'       => 'textfield',
				'param_name' => 'sale_price',
				'heading'    => esc_html__( 'Sale Price', 'element-plus' ),
				'dependency' => array(
					'element'   => 'regular_price',
					'not_empty' => true,
				),
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'highlighted_text',
				'admin_label' => true,
				'heading'     => esc_html__( 'Highlighted Text', 'element-plus' ),
			),
			array(
				'type'       => 'textarea',
				'param_name' => 'short_desc',
				'heading'    => esc_html__( 'Short Description', 'element-plus' ),
			),
			array(
				'type'       => 'param_group',
				'heading'    => esc_html__( 'Feature (s)', 'element-plus' ),
				'param_name' => 'features',
				'params'     => array(
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__( 'Feature Text', 'element-plus' ),
						'param_name' => 'feature_text',
					),
					array(
						'type'       => 'checkbox',
						'param_name' => 'feature_in',
						'value'      => array( esc_html__( 'Disable this feature', 'element-plus' ) => 'yes' ),
					),
				),
			),
			array(
				'type'       => 'vc_link',
				'heading'    => esc_html__( 'Button', 'element-plus' ),
				'param_name' => 'btn',
			),
			array(
				'type'       => 'checkbox',
				'heading'    => esc_html__( 'Configuration', 'element-plus' ),
				'param_name' => 'configuration',
				'value'      => array(
					esc_html__( 'Make this pricing featured', 'element-plus' ) => 'featured',
					esc_html__( 'Hide feature icons', 'element-plus' )         => 'hide_icon',
				),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Primary Color', 'element-plus' ),
				'param_name'  => 'primary_color',
				'group'       => esc_html__( 'Design', 'element-plus' ),
				'dependency'  => array(
					'element' => 'style',
					'value'   => array( '1', '2' ),
				),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Secondary Color', 'element-plus' ),
				'param_name'  => 'secondary_color',
				'group'       => esc_html__( 'Design', 'element-plus' ),
				'dependency'  => array(
					'element' => 'style',
					'value'   => array( '1', '2' ),
				),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Button Hover', 'element-plus' ),
				'param_name'  => 'btn_hover_color',
				'group'       => esc_html__( 'Design', 'element-plus' ),
				'dependency'  => array(
					'element' => 'style',
					'value'   => array( '1', '2' ),
				),
			),
		);
	}
}