<?php
/**
 * Element Name: Products Carousel
 *
 * @class EPLUS_Element_products_carousel
 *
 * @package elements/products-carousel
 * @copyright Pluginbazar 2019
 */

class EPLUS_Element_products_carousel extends EPLUS_Element {

	/**
	 * EPLUS_Element_products_carousel constructor.
	 *
	 * @param $id
	 * @param string $element_name
	 */
	function __construct( $id, $element_name = '', $element = array() ) {
		parent::__construct( $id, $element_name, $element );

		$this->set_element_config( array(
			'content_element'         => true,
			'show_settings_on_create' => true,
			'description'             => esc_html__( 'Element plus products carousel', 'element-plus' ),
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

		return array_merge( eplus()->get_carousel_options_params( 'Carousel Options' ), eplus()->get_products_params(), $this_params );
	}
}