<?php
/**
 * Element Name: Timeline
 *
 * @class EPLUS_Element_timeline
 *
 * @package elements/timeline
 * @copyright Pluginbazar 2019
 */

class EPLUS_Element_timeline extends EPLUS_Element {

	/**
	 * EPLUS_Element_timeline constructor.
	 *
	 * @param $id
	 * @param string $element_name
	 * @param array $element
	 */
	function __construct( $id, $element_name = '', $element = array() ) {
		parent::__construct( $id, $element_name, $element );

		$this->set_element_config( array(
			'content_element'         => true,
			'show_settings_on_create' => true,
			'description'             => esc_html__( 'Element plus timeline', 'element-plus' ),
			'style_variations'        => 4,
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

		$this_params = array(
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Total Items', 'element-plus' ),
				'param_name' => 'posts_per_page',
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
				'type'       => 'param_group',
				'heading'    => esc_html__( 'Timeline Icons', 'element-plus' ),
				'param_name' => 'timeline_icons',
				'params'     => array(
					array(
						'type' => 'iconlibrary',
					),
				),
				'dependency' => array(
					'element' => 'style',
					'value'   => array( '4' ),
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
				'group'      => esc_html__( 'Design', 'element-plus' ),
				'dependency' => array(
					'element' => 'style',
					'value'   => array( '1','2','3' ),
				)
			),
		);

		return array_merge( eplus()->get_posts_params(), $this_params );
	}
}