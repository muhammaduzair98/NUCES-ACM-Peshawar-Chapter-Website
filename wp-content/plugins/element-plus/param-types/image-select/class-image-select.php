<?php
/**
 * New Param Type: Image Select
 */


class EPLUS_Param_type_image_select extends EPLUS_Param_type {

	/**
	 * EPLUS_Param_type_image_select constructor.
	 *
	 * @param $param_type
	 */
	function __construct( $param_type ) {
		parent::__construct( $param_type );

		$this->set_config( array(
			'enable_js'      => true,
			'enqueue_assets' => array( 'scripts.js' ),
		) );
	}


	/**
	 * Display Field Output
	 *
	 * @param array $settings
	 * @param mixed $value
	 *
	 * @return false|mixed|string|void
	 */
	function render_output( $settings, $value ) {

		$values     = isset( $settings['value'] ) && is_array( $settings['value'] ) ? $settings['value'] : array();
		$param_name = isset( $settings['param_name'] ) ? $settings['param_name'] : '';

		ob_start();

		foreach ( $values as $key => $val ) {
			printf( '<li class="%s"><img src="%s" alt="%s"></li>', $value == $key ? 'active' : '', $val, $key );
		}

		printf( '<ul class="eplus-vc-image-select">%s<input type="text" class="wpb_vc_param_value" name="%s" value="%s"></ul>',
			ob_get_clean(), $param_name, $value
		);
	}
}