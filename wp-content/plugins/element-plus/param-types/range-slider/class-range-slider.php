<?php
/**
 * New Param Type: Range Slider
 */


class EPLUS_Param_type_range_slider extends EPLUS_Param_type {

	/**
	 * EPLUS_Param_type_range_slider constructor.
	 *
	 * @param $param_type
	 */
	function __construct( $param_type ) {
		parent::__construct( $param_type );

		$this->set_config( array(
			'enable_js'      => true,
			'enqueue_assets' => array( 'style.css', 'range-slider.js' ),
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

		$param_name   = isset( $settings['param_name'] ) ? $settings['param_name'] : '';
		$range_step   = isset( $settings['step'] ) ? $settings['step'] : 1;
		$range_min    = isset( $settings['min'] ) ? $settings['min'] : 1;
		$range_max    = isset( $settings['max'] ) ? $settings['max'] : 100;
		$range_suffix = isset( $settings['suffix'] ) ? $settings['suffix'] : '';
		$value        = empty( $value ) ? 0 : $value;

		?>

        <div class="eplus-range-slider-wrap" data-suffix="<?php echo esc_attr( $range_suffix ); ?>">
            <input class="wpb_vc_param_value" type="range"
                   min="<?php echo esc_attr( $range_min ); ?>"
                   max="<?php echo esc_attr( $range_max ); ?>"
                   value="<?php echo esc_attr( $value ); ?>"
                   step="<?php echo esc_attr( $range_step ); ?>"
                   name="<?php echo esc_attr( $param_name ); ?>">
            <span class="slider-val"><?php echo esc_html( $value ); ?><?php echo esc_html( $range_suffix ); ?></span>
        </div>
		<?php
	}
}