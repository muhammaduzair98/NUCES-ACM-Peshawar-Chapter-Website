<?php
/**
 * Element Name: Modal Box
 *
 * @class EPLUS_Element_modal
 *
 * @package elements/portfolio
 * @copyright Pluginbazar 2019
 */

class EPLUS_Element_modal extends EPLUS_Element {

	function __construct( $id, $element_name = '', $element = array() ) {
		parent::__construct( $id, $element_name, $element );

		$this->set_element_config( array(
			'content_element'         => true,
			'show_settings_on_create' => true,
			'description'             => esc_html__( 'Element plus modal box', 'element-plus' ),
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
				'type'        => 'textfield',
				'param_name'  => 'listener_id',
				'heading'     => esc_html__( 'Listener ID', 'element-plus' ),
				'description' => esc_html__( 'Add any hash-id as click listener to popup this modal box. Example: #open-modal', 'element-plus' ),
			),
			array(
				'type'       => 'textfield',
				'param_name' => 'box_title',
				'heading'    => esc_html__( 'Box Title', 'element-plus' ),
			),
			array(
				'type'       => 'textarea_html',
				'param_name' => 'content',
				'heading'    => esc_html__( 'Box Content', 'element-plus' ),
			),
			array(
				'type'       => 'dropdown',
				'param_name' => 'animation',
				'heading'    => esc_html__( 'Animation Effects', 'element-plus' ),
				'value'      => array(
					esc_html__( 'Fade', 'element-plus' )            => '',
					esc_html__( 'Zoom', 'element-plus' )            => 'mfp-zoom-in',
					esc_html__( 'Newspaper', 'element-plus' )       => 'mfp-newspaper',
					esc_html__( 'Horizontal Move', 'element-plus' ) => 'mfp-move-horizontal',
					esc_html__( 'Move from Top', 'element-plus' )   => 'mfp-move-from-top',
					esc_html__( '3D Unfold', 'element-plus' )       => 'mfp-3d-unfold',
				),
				'group'      => esc_html__( 'Modal Options', 'element-plus' ),
			),
			array(
				'type'       => 'checkbox',
				'heading'    => esc_html__( 'Options', 'element-plus' ),
				'param_name' => 'options',
				'value'      => array(
					esc_html__( 'Hide Close Button', 'element-plus' )              => 'showCloseBtn',
					esc_html__( 'Close Button Position - Inside', 'element-plus' ) => 'closeBtnInside',
					esc_html__( 'Close on Background Click', 'element-plus' )      => 'closeOnBgClick',
				),
				'group'      => esc_html__( 'Modal Options', 'element-plus' ),
			),

		);
	}
}