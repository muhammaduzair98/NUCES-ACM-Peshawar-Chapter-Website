<?php
/**
 * Element Name: Marquee
 *
 * @class EPLUS_Element_marquee
 *
 * @package elements/marquee
 * @copyright Pluginbazar 2019
 */

class EPLUS_Element_marquee extends EPLUS_Element {

	/**
	 * EPLUS_Element_marquee constructor.
	 *
	 * @param $id
	 * @param string $element_name
	 */
	function __construct( $id, $element_name = '', $element = array()  ) {
		parent::__construct( $id, $element_name, $element );

		$this->set_element_config( array(
			'content_element'         => true,
			'show_settings_on_create' => true,
			'description'             => esc_html__( 'Element plus marquee', 'element-plus' ),
			'enable_js'               => true,
			'scripts_in_footer'       => false,
			'enqueue_assets'          => array( 'jquery.jConveyorTicker.js' ),
			'style_variations'        => 5,
		) );
	}


	/**
	 * Return settings fields for this element
	 *
	 * @return array
	 */
	function setting_fields() {
		return eplus()->get_posts_params();
	}
}