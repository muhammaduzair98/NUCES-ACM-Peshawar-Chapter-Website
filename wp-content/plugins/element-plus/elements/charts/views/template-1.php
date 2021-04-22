<?php
/**
 * Element Name: Charts
 *
 * @style Line | Bar - Column
 *
 * @package elements/charts/view/template-1
 * @copyright Pluginbazar 2019
 */

$options     = array();
$series_data = array();
$unique_id   = uniqid();
$chart_type  = eplus()->get_shortcode_atts( 'style', 'line' );
$chart_data  = (array) vc_param_group_parse_atts( eplus()->get_shortcode_atts( 'chart_data' ) );

foreach ( $chart_data as $data ) {

	$data_label = isset( $data['data_label'] ) ? $data['data_label'] : '';
	$data_value = isset( $data['data_value'] ) ? $data['data_value'] : '';

	if ( ! empty( $data_label ) && ! empty( $data_value ) ) {
		$series_data[] = array(
			'x' => $data_label,
			'y' => $data_value,
		);
	}
}

$options['chart']['type'] = $chart_type;
$options['series'][]      = array(
	'name' => eplus()->get_shortcode_atts( 'series_label' ),
	'data' => $series_data,
);

$options = json_encode( $options );
$options = preg_replace( '/"([^"]+)"\s*:\s*/', '$1:', $options );

?>

<div id="eplus-charts-<?php echo esc_attr( $unique_id ); ?>"
     class="eplus-testimonial-<?php echo esc_attr( $chart_type ); ?>">
</div>

<script>
    let chart_<?php echo esc_attr( $unique_id ); ?> = new ApexCharts(document.querySelector("#eplus-charts-<?php echo esc_attr( $unique_id ); ?>"), <?php echo $options; ?>);
    chart_<?php echo esc_attr( $unique_id ); ?>.render();
</script>