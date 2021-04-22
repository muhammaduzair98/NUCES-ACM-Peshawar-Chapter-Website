<?php
/**
 * Element Name: Accordion
 *
 * @package elements/accordion/view/template-1
 * @copyright Pluginbazar 2019
 */

$unique_id     = uniqid( 'gradient-p' );
$style         = eplus()->get_shortcode_atts( 'style' );
$regular_price = eplus()->get_shortcode_atts( 'regular_price' );
$accordions    = (array) vc_param_group_parse_atts( eplus()->get_shortcode_atts( 'accordions' ) );
$color           = eplus()->get_shortcode_atts( 'color' );
$primary_color   = eplus()->get_shortcode_atts( 'primary_color' );
$secondary_color = eplus()->get_shortcode_atts( 'secondary_color' );

if ( ! empty( $primary_color ) || ! empty( $secondary_color ) || ! empty( $color ) ) : ?>
    <style>
        #eplus-accordion<?php echo esc_attr( $unique_id ); ?> .eplus-accordion-item.active .eplus-accordion-title {
            <?php if ( !empty( $color ) ) { ?> color: <?php echo esc_attr( $color ); } ?>;
            <?php if ( !empty( $secondary_color ) || !empty( $primary_color ) ) { ?> background-image: linear-gradient(180deg, <?php echo esc_attr( $primary_color ); ?> 34%, <?php echo esc_attr( $secondary_color ); ?> 86%); <?php } ?>;
        }
        #eplus-accordion<?php echo esc_attr( $unique_id ); ?> .eplus-accordion-content:before {
            <?php if ( !empty( $primary_color ) ) { ?> background-color: <?php echo esc_attr( $primary_color ); } ?>;
        }
        #eplus-accordion<?php echo esc_attr( $unique_id ); ?> .eplus-accordion-item.active .toggle-icon:before,
        #eplus-accordion<?php echo esc_attr( $unique_id ); ?> .eplus-accordion-item.active .toggle-icon:after {
            <?php if ( !empty( $color ) ) { ?> background-color: <?php echo esc_attr( $color ); } ?>;
        }
    </style>
<?php endif;
?>

<div id="eplus-accordion<?php echo esc_attr( $unique_id ); ?>" class="eplus-accordion eplus-accordion-<?php echo esc_attr( $style ); ?>">
    <?php foreach ( $accordions as $index => $accordion ) :
		$title = isset( $accordion['title'] ) && ! empty( $accordion['title'] ) ? $accordion['title'] : '';
		$content = isset( $accordion['content'] ) && ! empty( $accordion['content'] ) ? $accordion['content'] : '';
		?>

        <div class="eplus-accordion-item">
            <h3 class="eplus-accordion-title">
				<?php echo esc_html( $title ); ?>
                <span class="toggle-icon icon-plus"></span>
            </h3>
            <div class="eplus-accordion-content"><?php echo wp_kses_post( $content ); ?></div>
        </div>
	<?php endforeach; ?>
</div>