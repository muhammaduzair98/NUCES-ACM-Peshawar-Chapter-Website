<?php
/**
 * New Param Type: Number Field
 */


class EPLUS_Param_type_number_field extends EPLUS_Param_type {

	/**
	 * EPLUS_Param_type_number_field constructor.
	 *
	 * @param $param_type
	 */
	function __construct( $param_type ) {
		parent::__construct( $param_type );

		$this->set_config( array(
			'enable_js' => false,
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

		$param_name = isset( $settings['param_name'] ) ? $settings['param_name'] : '';
		?>
        <input class="wpb_vc_param_value" type="number"
               value="<?php echo esc_attr( $value ); ?>"
               name="<?php echo esc_attr( $param_name ); ?>">
		<?php
	}
}