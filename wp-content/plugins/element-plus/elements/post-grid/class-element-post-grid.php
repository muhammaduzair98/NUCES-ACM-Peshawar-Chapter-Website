<?php
/**
 * Element Name: Post Grid
 *
 * @class EPLUS_Element_post_grid
 *
 * @package elements/post-grid
 * @copyright Pluginbazar 2019
 */

class EPLUS_Element_post_grid extends EPLUS_Element {

	/**
	 * EPLUS_Element_post_grid constructor.
	 *
	 * @param $id
	 * @param string $element_name
	 */
	function __construct( $id, $element_name = '', $element = array()  ) {
		parent::__construct( $id, $element_name, $element );

		$this->set_element_config( array(
			'content_element'         => true,
			'show_settings_on_create' => true,
			'description'             => esc_html__( 'Element plus post grid', 'element-plus' ),
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
				'type'       => 'range_slider',
				'heading'    => esc_html__( 'Excerpt Length', 'element-plus' ),
				'param_name' => 'excerpt_length',
				'min'        => 0,
				'max'        => 300,
				'value'      => 24,
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Button Text', 'element-plus' ),
				'param_name' => 'btn_text',
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Readmore Style', 'element-plus' ),
				'param_name' => 'readmore_style',
				'value'      => array(
					esc_html__( 'Style 1', 'element-plus' ) => '1',
					esc_html__( 'Style 2', 'element-plus' ) => '2',
				),
			),
		);

		return array_merge( eplus()->get_posts_params(), $this_params );
	}
}