<?php
/**
 * Element Name: Progress Pie
 *
 * @package elements/progresspie/view/template-1
 * @copyright Pluginbazar 2019
 */

$unique_id   = uniqid();
$label       = eplus()->get_shortcode_atts( 'label' );
$value       = eplus()->get_shortcode_atts( 'value' );
$bar_size    = eplus()->get_shortcode_atts( 'bar_size' );
$trackcolor  = eplus()->get_shortcode_atts( 'trackcolor' );
$barcolor    = eplus()->get_shortcode_atts( 'barcolor' );
$fillcolor   = eplus()->get_shortcode_atts( 'fillcolor' );
$value_color = eplus()->get_shortcode_atts( 'value_color' );
$label_color = eplus()->get_shortcode_atts( 'label_color' );
$linecap     = eplus()->get_shortcode_atts( 'linecap' );

if ( ! empty( $value_color ) || ! empty( $label_color ) || ! empty( $linecap ) ) : ?>
    <style>
        #eplus-pie-<?php echo esc_attr( $unique_id ) ?> .eplus-progress-pie-number {
            color: <?php echo esc_attr( $value_color ); ?>;
        }
        #eplus-pie-<?php echo esc_attr( $unique_id ) ?> .eplus-progress-pie-label {
            color: <?php echo esc_attr( $label_color ); ?>;
        }
        #eplus-pie-<?php echo esc_attr( $unique_id ) ?> .eplus-progress-pie-svg path {
            stroke-linecap: <?php echo esc_attr( $linecap ); ?>;
        }
        #eplus-pie-<?php echo esc_attr( $unique_id ) ?> .eplus-progress-pie-svg ellipse {
            stroke-width: calc( <?php echo esc_attr( ! empty( $bar_size ) ? $bar_size : '10' ); ?> - 1px);
        }
    </style>
<?php endif;
?>

<div id="eplus-pie-<?php echo esc_attr( $unique_id ) ?>"
     class="eplus-progress-pie <?php echo esc_attr( empty( $label ) ? 'no-pie-label' : '' ); ?>" role="progressbar"
     data-speed="30"
     data-delay="1000" data-goal="<?php echo esc_attr( ! empty( $value ) ? $value : '50' ); ?>"
     data-trackcolor="<?php echo esc_attr( ! empty( $trackcolor ) ? $trackcolor : '#e5e5e5' ); ?>"
     data-fillcolor="<?php echo esc_attr( ! empty( $fillcolor ) ? $fillcolor : '#0000' ); ?>"
     data-barcolor="<?php echo esc_attr( ! empty( $barcolor ) ? $barcolor : '#e91e63' ); ?>"
     data-barsize="<?php echo esc_attr( ! empty( $bar_size ) ? $bar_size : '10' ); ?>" aria-valuemin="0"
     aria-valuemax="100">
    <h3 class="eplus-progress-pie-number"></h3>
	<?php if ( ! empty( $label ) ) : ?>
        <p class="eplus-progress-pie-label"><?php echo esc_html( $label ); ?></p>
	<?php endif; ?>
</div>