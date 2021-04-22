<?php
/**
 * Element Name: Button
 *
 * @package elements/button/view/template-1
 * @copyright Pluginbazar 2019
 */

$unique_id = uniqid();
$style     = eplus()->get_shortcode_atts( 'style' );
$button    = vc_build_link( eplus()->get_shortcode_atts( 'btn_property' ) );

$custom_design = eplus()->get_shortcode_atts( 'custom_design' );

$title               = isset( $button['title'] ) ? $button['title'] : '';
$url                 = isset( $button['url'] ) ? $button['url'] : '';
$target              = isset( $button['target'] ) ? $button['target'] : '';
$rel                 = isset( $button['rel'] ) ? $button['rel'] : '';

if ( empty( $url ) || empty( $title ) ) {
	return;
}

if ( ! empty( $custom_design ) ) :

	$primary_color = eplus()->get_shortcode_atts( 'primary_color' );
	$secondary_color = eplus()->get_shortcode_atts( 'secondary_color' );
	$color           = eplus()->get_shortcode_atts( 'color' );
	$hover_color     = eplus()->get_shortcode_atts( 'hover_color' );
	$margin          = eplus()->get_shortcode_atts( 'margin' );
	$min_width       = eplus()->get_shortcode_atts( 'min_width' );
	$fullwidth       = eplus()->get_shortcode_atts( 'fullwidth' );
	$padding         = eplus()->get_shortcode_atts( 'padding' );
	$font_size       = eplus()->get_shortcode_atts( 'font_size' );
	$radius          = eplus()->get_shortcode_atts( 'radius' );
	$stroke          = eplus()->get_shortcode_atts( 'stroke' );

	?>

    <style>

        #eplus-btn-<?php echo esc_attr( $unique_id ); ?> {
        <?php if ( !empty( $radius ) ) { ?> border-radius: <?php echo esc_attr( $radius ); } ?>;
        <?php if ( !empty( $min_width ) ) { ?> min-width: <?php echo esc_attr( $min_width . 'px' ); } ?>;
        <?php if ( !empty( $padding ) ) { ?> padding: <?php echo esc_attr( $padding ); } ?>;
        <?php if ( !empty( $margin ) ) { ?> margin: <?php echo esc_attr( $margin ); } ?>;
        <?php if ( !empty( $font_size ) ) { ?> font-size: <?php echo esc_attr( $font_size ); } ?>;
        }

        <?php if( empty( $stroke ) ) : ?>
        #eplus-btn-<?php echo esc_attr( $unique_id ); ?> {
        <?php if ( !empty( $primary_color ) ) { ?> background-color: <?php echo esc_attr( $primary_color ); } ?>;
        <?php if ( !empty( $color ) ) { ?> color: <?php echo esc_attr( $color ); } ?>;
        }

        #eplus-btn-<?php echo esc_attr( $unique_id ) . ':hover'; ?>,
        #eplus-btn-<?php echo esc_attr( $unique_id ) . ':focus'; ?> {
        <?php if ( !empty( $hover_color ) ) { ?> color: <?php echo esc_attr( $hover_color ); } ?>;
        <?php if ( !empty( $secondary_color ) ) { ?> background-color: <?php echo esc_attr( $secondary_color ); } ?>;
        }

        <?php endif; ?>

        <?php if( !empty( $stroke ) ) : ?>
        #eplus-btn-<?php echo esc_attr( $unique_id ); ?> {
        <?php if ( !empty( $primary_color ) ) { ?> border-color: <?php echo esc_attr( $primary_color ); } ?>;
        <?php if ( !empty( $color ) ) { ?> color: <?php echo esc_attr( $color ); } ?>;
        }

        #eplus-btn-<?php echo esc_attr( $unique_id ) . ':hover'; ?>,
        #eplus-btn-<?php echo esc_attr( $unique_id ) . ':focus'; ?> {
        <?php if ( !empty( $hover_color ) ) { ?> color: <?php echo esc_attr( $hover_color ); } ?>;
        <?php if ( !empty( $secondary_color ) ) { ?> background-color: <?php echo esc_attr( $secondary_color ); } ?>;
        <?php if ( !empty( $secondary_color ) ) { ?> border-color: <?php echo esc_attr( $secondary_color ); } ?>;
        }

        <?php endif; ?>

    </style>
<?php endif;
?>

<a id="eplus-btn-<?php echo esc_attr( $unique_id ); ?>" href="<?php echo esc_url( $url ); ?>"
   target="<?php echo esc_attr( trim( $target, ' ' ) ); ?>"
   rel="<?php echo esc_attr( $rel ); ?>"
   class="eplus-btn eplus-btn-<?php echo esc_attr( $style ); ?> <?php echo esc_attr( ! empty( $stroke ) ? 'eplus-btn-stroke' : '' ); ?> <?php echo esc_attr( ! empty( $fullwidth ) ? $fullwidth : '' ); ?>">
    <?php echo esc_html( $title ); ?>
</a>
