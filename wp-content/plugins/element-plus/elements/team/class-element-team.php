<?php
/**
 * Element Name: Team Member
 *
 * @class EPLUS_Element_team
 *
 * @package elements/team
 * @copyright Pluginbazar 2019
 */

class EPLUS_Element_team extends EPLUS_Element {

	function __construct( $id, $element_name = '', $element = array()  ) {
		parent::__construct( $id, $element_name, $element );

		$this->set_element_config( array(
			'content_element'         => true,
			'show_settings_on_create' => true,
			'description'             => esc_html__( 'Element plus team', 'element-plus' ),
			'style_variations'        => 7,
			'views'                   => array(
				'2' => 'template-2',
				'3' => 'template-3',
				'4' => 'template-4',
				'5' => 'template-5',
				'6' => 'template-6',
			),
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
				'type'        => 'attach_image',
				'heading'     => esc_html__( 'Team Image', 'element-plus' ),
				'param_name'  => 'img',
				'description' => esc_html__( 'Select image from media library.', 'element-plus' ),
			),
			array(
				'param_name'  => 'name',
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Name', 'element-plus' ),
				'admin_label' => true,
			),
			array(
				'param_name' => 'designation',
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Designation', 'element-plus' ),
			),
			array(
				'param_name' => 'tel_no',
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Tel No', 'element-plus' ),
				'dependency' => array(
					'element' => 'style',
					'value'   => array( '2' ),
				),
			),
			array(
				'param_name' => 'email',
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Email', 'element-plus' ),
				'dependency' => array(
					'element' => 'style',
					'value'   => array( '2' ),
				),
			),
			array(
				'type'       => 'textarea',
				'heading'    => esc_html__( 'Short Description', 'element-plus' ),
				'param_name' => 'short_desc',
				'dependency' => array(
					'element' => 'style',
					'value'   => array( '2', '6' ),
				),
			),
			array(
				'type'       => 'param_group',
				'heading'    => esc_html__( 'Social Profile', 'element-plus' ),
				'param_name' => 's_profiles',
				'params'     => array(
					array(
						'type'       => 'iconpicker',
						'heading'    => esc_html__( 'Select Icon', 'element-plus' ),
						'param_name' => 's_icon',
						'value'      => 'fa fa-facebook',
						'settings'   => array(
							'emptyIcon'    => false,
							'iconsPerPage' => 4000,
						),
					),
					array(
						'type'        => 'vc_link',
						'heading'     => esc_html__( 'Label & URL (s)', 'element-plus' ),
						'param_name'  => 'link',
						'description' => esc_html__( 'Add team profile url(s)', 'element-plus' ),
					),
				),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Primary Color', 'element-plus' ),
				'param_name'  => 'primary_color',
				'description' => esc_html__( 'Choose icon primary color for this info box.', 'element-plus' ),
				'group'       => esc_html__( 'Design', 'element-plus' ),
				'dependency'  => array(
					'element' => 'style',
					'value'   => array( '3', '4', '5' ),
				),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Secondary Color', 'element-plus' ),
				'param_name'  => 'secondary_color',
				'description' => esc_html__( 'Choose icon secondary color for this info box.', 'element-plus' ),
				'group'       => esc_html__( 'Design', 'element-plus' ),
				'dependency'  => array(
					'element' => 'style',
					'value'   => array( '3', '4', '5' ),
				),
			),
		);
	}
}