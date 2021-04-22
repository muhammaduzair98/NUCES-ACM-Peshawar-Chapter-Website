<?php
/**
 * Element Name: QR Code
 *
 * @package elements/qr-code/view/template-1
 * @copyright Pluginbazar 2019
 */


global $shrtocode_args;

if ( is_wp_error( $qr_code = eplus_generate_qrcode( $shrtocode_args ) ) ) {

	eplus_print_notice( $qr_code->get_error_message(), 'error' );

	return;
}

$qr_code = json_decode( $qr_code, true );
$qr_url  = isset( $qr_code['url'] ) ? $qr_code['url'] : '';

?>
<div id="eplus-qrcode"
     class="eplus-qrcode eplus-qrcode-<?php echo esc_attr( eplus()->get_shortcode_atts( 'style' ) ); ?>">

    <img src="<?php echo esc_url( $qr_url ); ?>"
         alt="<?php echo esc_attr( eplus()->get_shortcode_atts( 'style' ) ); ?>">
</div>