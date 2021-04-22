<?php
/**
 * Element Name: Products Grid
 *
 * @class EPLUS_Element_products_grid
 *
 * @package elements/products-grid
 * @copyright Pluginbazar 2019
 */

class EPLUS_Element_products_grid extends EPLUS_Element {

	/**
	 * EPLUS_Element_products_grid constructor.
	 *
	 * @param $id
	 * @param string $element_name
	 */
	function __construct( $id, $element_name = '', $element = array() ) {
		parent::__construct( $id, $element_name, $element );

		$this->set_element_config( array(
			'content_element'         => true,
			'show_settings_on_create' => true,
			'description'             => esc_html__( 'Element plus products grid', 'element-plus' ),
			'style_variations'        => 3,
		) );
	}


	/**
	 * Return settings fields for this element
	 *
	 * @return array
	 */
	function setting_fields() {

		$this_params = array(
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Total Items', 'element-plus' ),
				'param_name' => 'posts_per_page',
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Item (s) Per Row', 'element-plus' ),
				'param_name' => 'items_per_row',
				'value'      => array(
					esc_html__( '1 Column', 'element-plus' ) => '12',
					esc_html__( '2 Column', 'element-plus' ) => '6',
					esc_html__( '3 Column', 'element-plus' ) => '4',
					esc_html__( '4 Column', 'element-plus' ) => '3',
					esc_html__( '6 Column', 'element-plus' ) => '2',
				),
			),
			array(
				'type'       => 'colorpicker',
				'heading'    => esc_html__( 'Primary Color', 'element-plus' ),
				'param_name' => 'primary_color',
				'group'      => esc_html__( 'Design', 'element-plus' ),
			),
			array(
				'type'       => 'colorpicker',
				'heading'    => esc_html__( 'Secondary Color', 'element-plus' ),
				'param_name' => 'secondary_color',
				'dependency' => array(
					'element' => 'style',
					'value'   => array( '2' ),
				),
				'group'      => esc_html__( 'Design', 'element-plus' ),
			),
		);

		return array_merge( eplus()->get_products_params(), $this_params );
	}
}