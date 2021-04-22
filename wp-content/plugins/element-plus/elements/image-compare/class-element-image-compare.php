<?php
/**
 * Element Name: Accordion
 *
 * @class EPLUS_Element_accordion
 *
 * @package elements/accordion
 * @copyright Pluginbazar 2019
 */

class EPLUS_Element_image_compare extends EPLUS_Element {

	/**
	 * EPLUS_Element_image_compare constructor.
	 *
	 * @param $id
	 * @param string $element_name
	 */
	function __construct( $id, $element_name = '', $element = array()  ) {
		parent::__construct( $id, $element_name, $element );

		$this->set_element_config( array(
			'content_element'         => true,
			'show_settings_on_create' => true,
			'description'             => esc_html__( 'Element plus image compare', 'element-plus' ),
			'enable_js'               => true,
			'scripts_in_footer'       => false,
			'enqueue_assets'          => array( 'cocoen.min.js', 'cocoen-jquery.min.js', 'cocoen.min.css' ),
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
				'heading'    => esc_html__( 'Image', 'element-plus' ),
				'param_name' => 'img_before',
			),
			array(
				'type'       => 'attach_image',
				'heading'    => esc_html__( 'Image', 'element-plus' ),
				'param_name' => 'img_after',
			),
		);
	}
}