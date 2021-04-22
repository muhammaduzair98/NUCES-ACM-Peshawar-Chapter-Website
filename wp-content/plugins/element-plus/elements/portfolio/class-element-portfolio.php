<?php
/**
 * Element Name: Portfolio
 *
 * @class EPLUS_Element_portfolio
 *
 * @package elements/portfolio
 * @copyright Pluginbazar 2019
 */

class EPLUS_Element_portfolio extends EPLUS_Element {

	function __construct( $id, $element_name = '', $element = array()  ) {
		parent::__construct( $id, $element_name, $element );

		$this->set_element_config( array(
			'content_element'         => true,
			'show_settings_on_create' => true,
			'description'             => esc_html__( 'Element plus portfolio', 'element-plus' ),
			'style_variations'        => 3,
			'views'                   => array(
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
				'heading'    => esc_html__( 'Item (s) Per Row', 'element-plus' ),
				'param_name' => 'items_per_row',
				'value'      => array(
					esc_html__( '1 Column', 'element-plus' ) => '12',
					esc_html__( '2 Column', 'element-plus' ) => '6',
					esc_html__( '3 Column', 'element-plus' ) => '4',
					esc_html__( '4 Column', 'element-plus' ) => '3',
				),
			),
			array(
				'type'       => 'param_group',
				'heading'    => esc_html__( 'Portfolio (s)', 'element-plus' ),
				'param_name' => 'portfolios',
				'params'     => array(
					array(
						'type'       => 'attach_image',
						'heading'    => esc_html__( 'Select Image', 'element-plus' ),
						'param_name' => 'img_id',
					),
					array(
						'type'        => 'vc_link',
						'heading'     => esc_html__( 'Title & Link', 'element-plus' ),
						'param_name'  => 'p_link',
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__( 'Author', 'element-plus' ),
						'param_name' => 'author',
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__( 'Category', 'element-plus' ),
						'param_name' => 'category',
					),
					array(
						'type'        => 'vc_link',
						'heading'     => esc_html__( 'Hire Me Button', 'element-plus' ),
						'param_name'  => 'btn_hire',
					),
					array(
						'type'       => 'param_group',
						'heading'    => esc_html__( 'Social Profile', 'element-plus' ),
						'param_name' => 's_profiles',
						'params'     => array(
							array(
								'type'       => 'iconpicker',
								'heading'    => esc_html__( 'Select Icon', 'element-plus' ),
								'param_name' => 's_icon',
								'settings'   => array(
									'emptyIcon'    => true,
									'iconsPerPage' => 4000,
								),
							),
							array(
								'type'        => 'vc_link',
								'heading'     => esc_html__( 'Label & URL (s)', 'element-plus' ),
								'param_name'  => 'link',
								'description' => esc_html__( 'Add team profile url(s)', 'element-plus' ),
							),
						),
					),
				),
			),
		);
	}
}