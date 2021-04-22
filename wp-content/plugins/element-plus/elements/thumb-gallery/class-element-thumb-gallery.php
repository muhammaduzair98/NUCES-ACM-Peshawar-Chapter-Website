<?php
/**
 * Element Name: Thumb Gallery
 *
 * @class EPLUS_Element_thumb_gallery
 *
 * @package elements/thumb-gallery
 * @copyright Pluginbazar 2019
 */

class EPLUS_Element_thumb_gallery extends EPLUS_Element {

	function __construct( $id, $element_name = '', $element = array() ) {
		parent::__construct( $id, $element_name, $element );

		$this->set_element_config( array(
			'content_element'         => true,
			'show_settings_on_create' => true,
			'description'             => esc_html__( 'Element plus thumb gallery', 'element-plus' ),
			'style_variations'        => 3,
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
				'type'        => 'checkbox',
				'param_name'  => 'autoplay',
				'heading'     => esc_html__( 'Autoplay?', 'element-plus' ),
				'description' => esc_html__( 'Should the carousel autoplay as in a slideshow.', 'element-plus' ),
				"value"       => array( esc_html__( "No", "element-plus" ) => 'false' ),
				'group'       => esc_html__( 'Slider Options', 'element-plus' )
			),
			array(
				'type'       => 'number_field',
				"param_name" => "autoplay_speed",
				'heading'    => esc_html__( 'Autoplay speed', 'element-plus' ),
				'value'      => 3000,
				'group'      => esc_html__( 'Slider Options', 'element-plus' )
			),
			array(
				'type'       => 'number_field',
				"param_name" => "animation_speed",
				'heading'    => esc_html__( 'Slide Animation Speed', 'element-plus' ),
				'value'      => 600,
				'group'      => esc_html__( 'Slider Options', 'element-plus' )
			),
			array(
				'type'        => 'checkbox',
				"param_name"  => "pause_on_hover",
				'heading'     => esc_html__( 'Pause on Hover', 'element-plus' ),
				'description' => esc_html__( 'Should the slider pause on mouse hover over the slider.', 'element-plus' ),
				"value"       => array( __( "Yes", "element-plus" ) => 'true' ),
				'group'       => esc_html__( 'Slider Options', 'element-plus' ),
			),
			array(
				'type'       => 'range_slider',
				'param_name' => 'thumb_per_row',
				'heading'    => esc_html__( 'Thumbs Item per Row', 'element-plus' ),
				'min'        => 1,
				'max'        => 9,
				'step'       => 2,
				'value'      => 5,
				'group'      => esc_html__( 'Thumbs Options', 'element-plus' ),
			),
			array(
				'type'        => 'checkbox',
				"param_name"  => "center_mode",
				'heading'     => esc_html__( 'Center Mode', 'element-plus' ),
				'description' => esc_html__( 'It will apply on thumbs item.', 'element-plus' ),
				"value"       => array( __( "No", "element-plus" ) => 'false' ),
				'group'       => esc_html__( 'Thumbs Options', 'element-plus' ),
			),
		);
	}


	/**
	 * Return settings array of each child of this parent element
	 * 'has_child' parameter should be true to make it working
	 *
	 * @return array
	 */
	function child_setting_fields() {

		return array(
			array(
				'type'       => 'attach_image',
				'heading'    => esc_html__( 'Select Image', 'element-plus' ),
				'param_name' => 'logo_img',
			),
		);
	}
}


if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_eplus_thumb_gallery extends WPBakeryShortCodesContainer {
	}
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
	class WPBakeryShortCode_eplus_thumb_gallery_child extends WPBakeryShortCode {
	}
}


