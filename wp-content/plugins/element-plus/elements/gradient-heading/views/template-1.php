<?php
/**
 * Element Name: Heading
 *
 * @package elements/heading/view/template-1
 * @copyright Pluginbazar 2019
 */

global $shrtocode_args;

$unique_id        = uniqid();
$style            = eplus()->get_shortcode_atts( 'style' );
$title            = eplus()->get_shortcode_atts( 'title' );
$font_size        = sprintf( '%spx', abs( eplus()->get_shortcode_atts( 'font_size', 32 ) ) );
$font_weight      = abs( eplus()->get_shortcode_atts( 'font_weight', 600 ) );
$line_height      = eplus()->get_shortcode_atts( 'line_height', '42px' );
$primary_color    = eplus()->get_shortcode_atts( 'primary_color', '#0273aa' );
$secondary_color  = eplus()->get_shortcode_atts( 'secondary_color', '#dd3333' );
$background_image = sprintf( 'linear-gradient(%sdeg, %s %s, %s %s)',
	abs( eplus()->get_shortcode_atts( 'heading_degree', 90 ) ),
	$primary_color, abs( eplus()->get_shortcode_atts( 'heading_stop_1', 10 ) ) . '%',
	$secondary_color, abs( eplus()->get_shortcode_atts( 'heading_stop_2', 50 ) ) . '%'
);

?>

<div id="eplus-gradient-heading-<?php echo esc_attr( $unique_id ); ?>"
     class="eplus-gradient-heading-<?php echo esc_attr( $style ); ?>">

    <h2 class="eplus-gradient-heading"><?php echo esc_html( eplus()->get_shortcode_atts( 'heading_text' ) ); ?></h2>
</div>


<style>
    #eplus-gradient-heading-<?php echo esc_attr( $unique_id ); ?> > h2.eplus-gradient-heading {
        color: <?php echo esc_attr( $primary_color ); ?>;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-color: transparent;
        background-image: <?php echo esc_attr( $background_image ); ?>;
        font-size: <?php echo esc_attr( $font_size ); ?>;
        font-weight: <?php echo esc_attr( $font_weight ); ?>;
        line-height: <?php echo esc_attr( $line_height ); ?>;
    }
</style>