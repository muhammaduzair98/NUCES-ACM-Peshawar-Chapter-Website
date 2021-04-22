<?php
/**
 * New Param Type: Timepicker
 */


class EPLUS_Param_type_timepicker extends EPLUS_Param_type {

	/**
	 * EPLUS_Param_type_timepicker constructor.
	 *
	 * @param $param_type
	 */
	function __construct( $param_type ) {
		parent::__construct( $param_type );

		$this->set_config( array(
			'enable_js'      => true,
			'enqueue_assets' => array( 'jquery-timepicker.css', 'jquery-timepicker.js' ),
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

		$param_name      = isset( $settings['param_name'] ) ? $settings['param_name'] : '';
		$placeholder     = isset( $settings['placeholder'] ) ? $settings['placeholder'] : esc_html( '08:00 AM' );
		$field_id        = uniqid( 'eplus-timepicker-' );
		$default_options = array( 'timeFormat' => 'h:i A', 'step' => 1, );
		$field_options   = isset( $settings['field_options'] ) ? $settings['field_options'] : array();
		$field_options   = preg_replace( '/"([^"]+)"\s*:\s*/', '$1:', json_encode( array_merge( $default_options, $field_options ) ) );

		printf( '<input type="text" name="%s" class="eplus-vc-timepicker wpb_vc_param_value" id="%s" value="%s" autocomplete="off" placeholder="%s">',
			$param_name, $field_id, $value, $placeholder
		);

		?>
        <script>
            jQuery(document).ready(function ($) {
                $("#<?php echo esc_attr( $field_id ); ?>").timepicker(<?php echo wp_kses_post( $field_options ); ?>);
            });
        </script>
		<?php
	}
}