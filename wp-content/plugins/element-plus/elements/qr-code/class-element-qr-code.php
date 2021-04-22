<?php
/**
 * Element Name: Info Box
 *
 * @class EPLUS_Element_info_box
 *
 * @package elements/info_box
 * @copyright Pluginbazar 2019
 */

class EPLUS_Element_qrcode extends EPLUS_Element {

	function __construct( $id, $element_name = '', $element = array()  ) {
		parent::__construct( $id, $element_name, $element );

		$this->set_element_config( array(
			'content_element'         => true,
			'show_settings_on_create' => true,
			'description'             => esc_html__( 'QR Code', 'element-plus' ),
		) );

		/**
		 * @todo Minimize Frontend API call and handle it from Backend on post saved
		 *
		 * save_post
		 */
	}


	/**
	 * Save post track
	 *
	 * @param $post_id
	 */
	function save_qrcode( $post_id ) {

		if ( isset( $_POST['post_content'] ) && ! empty( $content = sanitize_text_field( $_POST['post_content'] ) ) && has_shortcode( $content, 'eplus_qr-code' ) ) {

			$regex = '/\[eplus_qr-code[^\]]*?[^\]]*\]/';
			preg_match_all( $regex, $content, $matches );
			$shortcodes = isset( $matches[0] ) && is_array( $matches[0] ) ? $matches[0] : array();

			foreach ( $shortcodes as $_shortcode ) {

				$args = array();
				$atts = shortcode_parse_atts( $_shortcode );

				unset( $atts[0] );

				foreach ( $atts as $att ) {

					$att   = trim( $att );
					$att   = str_replace( array( '[', ']' ), '', $att );
					$att   = explode( '=', $att );
					$key   = isset( $att[0] ) ? $att[0] : '';
					$value = isset( $att[1] ) ? $att[1] : '';

					if ( ! empty( $key ) ) {
						$args[ $key ] = $value;
					}
				}

				$qr_code = eplus_generate_qrcode( $args );
				$qr_code = json_decode( $qr_code, true );
			}
		}
	}


	/**
	 * Return settings fields for this element
	 *
	 * @return array
	 */
	function setting_fields() {
		return array(
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'URL', 'element-plus' ),
				'param_name' => 'qr_url',
			),

			array(
				'type'       => 'image_select',
				'heading'    => esc_html__( 'Pattern', 'element-plus' ),
				'param_name' => 'qr_pattern',
				'value'      => $this->get_all_patterns(),
			),
			array(
				'type'       => 'image_select',
				'heading'    => esc_html__( 'Eye Patterns - Outer', 'element-plus' ),
				'param_name' => 'qr_eye_outer',
				'value'      => $this->get_all_eyes_outer(),
			),
			array(
				'type'       => 'image_select',
				'heading'    => esc_html__( 'Eye Patters - Inner', 'element-plus' ),
				'param_name' => 'qr_eye_inner',
				'value'      => $this->get_all_eyes_inner(),
			),
			array(
				'type'        => 'attach_image',
				'heading'     => esc_html__( 'Add your Logo', 'element-plus' ),
				'description' => esc_html__( 'Logo might not work if you are creating element from Local or Offline server that is not publicly accessable.', 'element-plus' ),
				'param_name'  => 'qr_logo',
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Primary Color', 'element-plus' ),
				'param_name'  => 'primary_color',
				'description' => esc_html__( 'Choose primary color for this info box.', 'element-plus' ),
				'group'       => esc_html__( 'Design', 'element-plus' ),
			),

			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Secondary Color', 'element-plus' ),
				'param_name'  => 'secondary_color',
				'description' => esc_html__( 'Choose secondary color for this info box.', 'element-plus' ),
				'group'       => esc_html__( 'Design', 'element-plus' ),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Background Color', 'element-plus' ),
				'param_name'  => 'background_color',
				'description' => esc_html__( 'Choose background color for this info box.', 'element-plus' ),
				'group'       => esc_html__( 'Design', 'element-plus' ),
			),
		);
	}


	/**
	 * Return all eye patterns
	 *
	 * @return array
	 */
	function get_all_patterns() {

		return array(
			'pattern0'  => $this->get_things_url( 'images/p0.svg' ),
			'pattern1'  => $this->get_things_url( 'images/p1.png' ),
			'pattern2'  => $this->get_things_url( 'images/p2.png' ),
			'pattern3'  => $this->get_things_url( 'images/p3.png' ),
			'pattern4'  => $this->get_things_url( 'images/p4.png' ),
			'pattern5'  => $this->get_things_url( 'images/p5.svg' ),
			'pattern6'  => $this->get_things_url( 'images/p6.svg' ),
			'pattern7'  => $this->get_things_url( 'images/p7.svg' ),
			'pattern8'  => $this->get_things_url( 'images/p8.svg' ),
			'pattern9'  => $this->get_things_url( 'images/p9.svg' ),
			'pattern10' => $this->get_things_url( 'images/p10.svg' ),
		);
	}


	/**
	 * Return all eyes outers
	 *
	 * @return array
	 */
	function get_all_eyes_outer() {

		return array(
			'eyeOuter0'  => $this->get_things_url( 'images/eo0.png' ),
			'eyeOuter1'  => $this->get_things_url( 'images/eo1.png' ),
			'eyeOuter2'  => $this->get_things_url( 'images/eo2.png' ),
			'eyeOuter3'  => $this->get_things_url( 'images/eo3.png' ),
			'eyeOuter4'  => $this->get_things_url( 'images/eo4.png' ),
			'eyeOuter5'  => $this->get_things_url( 'images/eo5.png' ),
			'eyeOuter6'  => $this->get_things_url( 'images/eo6.png' ),
			'eyeOuter7'  => $this->get_things_url( 'images/eo7.png' ),
			'eyeOuter8'  => $this->get_things_url( 'images/eo8.png' ),
			'eyeOuter9'  => $this->get_things_url( 'images/eo9.png' ),
			'eyeOuter11' => $this->get_things_url( 'images/eo11.png' ),
			'eyeOuter12' => $this->get_things_url( 'images/eo12.png' ),
		);
	}


	/**
	 * Return all eye inners
	 *
	 * @return array
	 */
	function get_all_eyes_inner() {

		return array(
			'eyeInner0'  => $this->get_things_url( 'images/ei0.png' ),
			'eyeInner1'  => $this->get_things_url( 'images/ei1.png' ),
			'eyeInner2'  => $this->get_things_url( 'images/ei2.png' ),
			'eyeInner3'  => $this->get_things_url( 'images/ei3.png' ),
			'eyeInner4'  => $this->get_things_url( 'images/ei4.png' ),
			'eyeInner5'  => $this->get_things_url( 'images/ei5.png' ),
			'eyeInner6'  => $this->get_things_url( 'images/ei6.png' ),
			'eyeInner7'  => $this->get_things_url( 'images/ei7.png' ),
			'eyeInner8'  => $this->get_things_url( 'images/ei8.png' ),
			'eyeInner9'  => $this->get_things_url( 'images/ei9.png' ),
			'eyeInner10' => $this->get_things_url( 'images/ei10.png' ),
		);
	}
}