<?php
/**
 * Element Name: Table
 *
 * @class EPLUS_Element_table
 *
 * @package elements/table
 * @copyright Pluginbazar 2019
 */

class EPLUS_Element_table extends EPLUS_Element {

	function __construct( $id, $element_name = '', $element = array()  ) {
		parent::__construct( $id, $element_name, $element );

		$this->set_element_config( array(
			'content_element'         => true,
			'show_settings_on_create' => true,
			'description'             => esc_html__( 'Element plus table', 'element-plus' ),
			'style_variations'        => 1,
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
				'type'       => 'select2',
				'heading'    => esc_html__( 'Select a Table', 'element-plus' ),
				'param_name' => 'table_id',
				'value'      => 'POSTS_%tablepress_table%',
			),
		);
	}
}