<?php
/**
 * New Param Type: Select2
 */


class EPLUS_Param_type_select2 extends EPLUS_Param_type {

	/**
	 * EPLUS_Param_type_select2 constructor.
	 *
	 * @param $param_type
	 */
	function __construct( $param_type ) {
		parent::__construct( $param_type );

		$this->set_config( array(
			'enable_js'      => true,
			'enqueue_assets' => array( 'select2.min.css', 'select2.min.js' ),
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

		$values        = isset( $settings['value'] ) ? $settings['value'] : '';
		$values        = is_array( $values ) ? $values : $this->generate_args_from_string( $values, $settings );
		$param_name    = isset( $settings['param_name'] ) ? $settings['param_name'] : '';
		$multiple      = isset( $settings['multiple'] ) ? (bool) $settings['multiple'] : false;
		$field_options = isset( $settings['field_options'] ) ? $settings['field_options'] : array();
		$field_options = preg_replace( '/"([^"]+)"\s*:\s*/', '$1:', json_encode( $field_options ) );
		$field_id      = uniqid( 'eplus-select2-' );

		ob_start();

		foreach ( $values as $key => $label ) {

			if ( $multiple ) {
				$selected = in_array( $key, explode( ',', trim( $value ) ) ) ? "selected" : "";
			} else {
				$selected = $value == $key ? "selected" : "";
			}
			printf( '<option %s value="%s">%s</option>', $selected, $key, $label );
		}

		printf( '<select %s name="%s" class="eplus-vc-select2 wpb_vc_param_value" id="%s">%s</select>',
			$multiple ? 'multiple' : '', $param_name, $field_id, ob_get_clean()
		);

		?>
        <script>
            jQuery(document).ready(function ($) {
                $("#<?php echo esc_attr( $field_id ); ?>").select2(<?php echo wp_kses_post( $field_options ); ?>);
            });
        </script>
		<?php
	}
}