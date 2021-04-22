<?php
/**
 * Element Name: Newsticker
 *
 * @class EPLUS_Element_newsticker
 *
 * @package elements/accordion
 * @copyright Pluginbazar 2019
 */

class EPLUS_Element_newsticker extends EPLUS_Element {

	/**
	 * EPLUS_Element_newsticker constructor.
	 *
	 * @param $id
	 * @param string $element_name
	 */
	function __construct( $id, $element_name = '', $element = array()  ) {
		parent::__construct( $id, $element_name, $element );

		$this->set_element_config( array(
			'content_element'         => true,
			'show_settings_on_create' => true,
			'description'             => esc_html__( 'Element plus Newsticker', 'element-plus' ),
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