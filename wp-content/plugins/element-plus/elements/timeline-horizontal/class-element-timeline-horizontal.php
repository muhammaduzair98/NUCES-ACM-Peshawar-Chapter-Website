<?php
/**
 * Element Name: Timeline - Horizontal
 *
 * @class EPLUS_Element_timeline_horizontal
 *
 * @package elements/timeline-horizontal
 * @copyright Pluginbazar 2019
 */

class EPLUS_Element_timeline_horizontal extends EPLUS_Element {

	/**
	 * EPLUS_Element_timeline_horizontal constructor.
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
			'description'             => esc_html__( 'Element plus timeline - horizontal', 'element-plus' ),
			'style_variations'        => 1,
			'enable_js'               => true,
			'scripts_in_footer'       => false,
			'enqueue_assets'          => array( 'timeline.min.js' ),
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
				'type'       => 'range_slider',
				'heading'    => esc_html__( 'Excerpt Length', 'element-plus' ),
				'param_name' => 'excerpt_length',
				'min'        => 0,
				'max'        => 300,
				'value'      => 24,
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
			),
		);

		return array_merge( eplus()->get_posts_params(), $this_params );
	}
}