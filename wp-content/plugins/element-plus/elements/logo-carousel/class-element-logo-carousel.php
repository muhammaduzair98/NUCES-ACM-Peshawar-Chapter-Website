<?php
/**
 * Element Name: Logo Carousel
 *
 * @class EPLUS_Element_logo_carousel
 *
 * @package elements/logo-carousel
 * @copyright Pluginbazar 2019
 */

class EPLUS_Element_logo_carousel extends EPLUS_Element {

	function __construct( $id, $element_name = '', $element = array() ) {
		parent::__construct( $id, $element_name, $element );

		$this->set_element_config( array(
			'content_element'         => true,
			'show_settings_on_create' => true,
			'description'             => esc_html__( 'Element plus logo carousel', 'element-plus' ),
			'style_variations'        => 1,
			'enable_js'               => true,
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
				'type'       => 'checkbox',
				"param_name" => "arrows",
				'heading'    => esc_html__( 'Prev/Next Arrows?', 'element-plus' ),
				"value"      => array( esc_html__( "Yes", "element-plus" ) => 'true' ),
				'group'      => esc_html__( 'Carousel Options', 'element-plus' )
			),
			array(
				'type'       => 'checkbox',
				"param_name" => "dots",
				'heading'    => esc_html__( 'Show dot indicators for navigation?', 'element-plus' ),
				"value"      => array( esc_html__( "Yes", "element-plus" ) => 'true' ),
				'group'      => esc_html__( 'Carousel Options', 'element-plus' )
			),
			array(
				'type'        => 'checkbox',
				'param_name'  => 'autoplay',
				'heading'     => esc_html__( 'Autoplay?', 'element-plus' ),
				'description' => esc_html__( 'Should the carousel autoplay as in a slideshow.', 'element-plus' ),
				"value"       => array( esc_html__( "No", "element-plus" ) => 'false' ),
				'group'       => esc_html__( 'Carousel Options', 'element-plus' )
			),
			array(
				'type'       => 'number_field',
				"param_name" => "autoplay_speed",
				'heading'    => esc_html__( 'Autoplay speed', 'element-plus' ),
				'value'      => 3000,
				'group'      => esc_html__( 'Carousel Options', 'element-plus' )
			),
			array(
				'type'       => 'number_field',
				"param_name" => "animation_speed",
				'heading'    => esc_html__( 'Slide Animation Speed', 'element-plus' ),
				'value'      => 600,
				'group'      => esc_html__( 'Carousel Options', 'element-plus' )
			),
			array(
				'type'        => 'checkbox',
				"param_name"  => "pause_on_hover",
				'heading'     => esc_html__( 'Pause on Hover', 'element-plus' ),
				'description' => esc_html__( 'Should the slider pause on mouse hover over the slider.', 'element-plus' ),
				"value"       => array( __( "Yes", "element-plus" ) => 'true' ),
				'group'       => esc_html__( 'Carousel Options', 'element-plus' ),
			),
			array(
				'type'       => 'number_field',
				'param_name' => 'gutter',
				'heading'    => esc_html__( 'Gutter', 'element-plus' ),
				'value'      => 20,
				'group'      => esc_html__( 'Carousel Options', 'element-plus' ),
			),
			array(
				'type'             => 'textfield',
				'param_name'       => 'item_padding',
				'heading'          => esc_html__( 'Item Padding', 'element-plus' ),
				'description'      => esc_html__( 'Format: Top Right Bottom Left. Example: 10px 0 10px 0 | Default: 0 0 0 0', 'element-plus' ),
				'group'            => esc_html__( 'Design', 'element-plus' ),
			),
			array(
				'type'             => 'textfield',
				'heading'          => esc_html__( 'Item Radius', 'element-plus' ),
				'param_name'       => 'item_radius',
				'group'            => esc_html__( 'Design', 'element-plus' ),
				'description'      => esc_html__( 'Format: Top Right Bottom Left. Example: 10px 15px 10px 15px | Default: 0 0 0 0', 'element-plus' ),
			),
			array(
				'type'       => 'colorpicker',
				'heading'    => esc_html__( 'Control Color', 'element-plus' ),
				'param_name' => 'control_color',
				'group'      => esc_html__( 'Design', 'element-plus' ),
			),
			array(
				'type'       => 'colorpicker',
				'heading'    => esc_html__( 'Control Background', 'element-plus' ),
				'param_name' => 'control_bg',
				'group'      => esc_html__( 'Design', 'element-plus' ),
			),
			array(
				'type'       => 'colorpicker',
				'heading'    => esc_html__( 'Control Hover Color', 'element-plus' ),
				'param_name' => 'control_hover_color',
				'group'      => esc_html__( 'Design', 'element-plus' ),
			),
			array(
				'type'       => 'colorpicker',
				'heading'    => esc_html__( 'Control Hover/Active Background', 'element-plus' ),
				'param_name' => 'control_hover_bg',
				'group'      => esc_html__( 'Design', 'element-plus' ),
			),
			array(
				'type'             => 'textfield',
				'heading'          => esc_html__( 'Control Radius', 'element-plus' ),
				'param_name'       => 'control_radius',
				'group'            => esc_html__( 'Design', 'element-plus' ),
				'dependency' => array( 'element' => 'arrows', 'not_empty' => true ),
				'description'      => esc_html__( 'Format: Top Right Bottom Left. Example: 10px 15px 10px 15px | Default: 0 0 0 0', 'element-plus' ),
			),
			array(
				'type'       => 'range_slider',
				'param_name' => 'display_columns',
				'heading'    => esc_html__( 'Desktop View', 'element-plus' ),
				'min'        => 1,
				'max'        => 8,
				'step'       => 1,
				'value'      => 5,
				'group'      => esc_html__( 'Responsive', 'element-plus' ),
			),
			array(
				'type'       => 'range_slider',
				'param_name' => 'tablet_display_columns',
				'heading'    => esc_html__( 'Tablet View', 'element-plus' ),
				'min'        => 1,
				'max'        => 4,
				'step'       => 1,
				'value'      => 3,
				'group'      => esc_html__( 'Responsive', 'element-plus' ),
			),
			array(
				'type'       => 'range_slider',
				'param_name' => 'mobile_display_columns',
				'heading'    => esc_html__( 'Mobile View', 'element-plus' ),
				'min'        => 1,
				'max'        => 3,
				'step'       => 1,
				'value'      => 1,
				'group'      => esc_html__( 'Responsive', 'element-plus' ),
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
				'heading'    => esc_html__( 'Logo image', 'element-plus' ),
				'param_name' => 'logo_img',
			),
			array(
				'type'       => 'vc_link',
				'heading'    => esc_html__( 'URL (s)', 'element-plus' ),
				'param_name' => 'link',
			),
			array(
				'type'       => 'colorpicker',
				'heading'    => esc_html__( 'Item Background Color', 'element-plus' ),
				'param_name' => 'item_bg',
				'group'      => esc_html__( 'Design', 'element-plus' ),
			),
		);
	}
}


if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_eplus_logo_carousel extends WPBakeryShortCodesContainer {
	}
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
	class WPBakeryShortCode_eplus_logo_carousel_child extends WPBakeryShortCode {
	}
}


