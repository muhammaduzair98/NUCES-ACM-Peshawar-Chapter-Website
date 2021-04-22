<?php
/**
 * Element Name: Heading
 *
 * @package elements/heading/view/template-1
 * @copyright Pluginbazar 2019
 */
$unique_id     = uniqid();
$style         = eplus()->get_shortcode_atts( 'style' );
$title         = eplus()->get_shortcode_atts( 'title' );
$sub_title     = eplus()->get_shortcode_atts( 'sub_title' );
$short_desc    = eplus()->get_shortcode_atts( 'short_desc' );
$custom_design = eplus()->get_shortcode_atts( 'custom_design' );
$align         = eplus()->get_shortcode_atts( 'align' );
$align         = ! empty( $align ) ? ' eplus-heading-' . $align : '';

$sub_title_size   = abs( eplus()->get_shortcode_atts( 'sub_title_size' ) );
$title_size       = abs( eplus()->get_shortcode_atts( 'title_size' ) );
$short_desc_size  = abs( eplus()->get_shortcode_atts( 'short_desc_size' ) );
$sub_title_color  = eplus()->get_shortcode_atts( 'sub_title_color' );
$title_color      = eplus()->get_shortcode_atts( 'title_color' );
$short_desc_color = eplus()->get_shortcode_atts( 'short_desc_color' );

if ( ! empty( $custom_design ) ) : ?>
    <style>
        <?php if( !empty( $sub_title_size ) || !empty( $sub_title_color ) ): ?>
        #eplus-heading-<?php echo esc_attr( $unique_id ); ?> .eplus-sub-title {
        <?php if ( !empty( $sub_title_color ) ) { ?> color: <?php echo esc_attr( $sub_title_color ); } ?>;
        <?php if ( !empty( $sub_title_size ) ) { ?> font-size: <?php echo esc_attr( $sub_title_size . 'px' ); } ?>;
        }
        <?php endif; ?>

        <?php if( !empty( $title_size ) || !empty( $title_color ) ): ?>
        #eplus-heading-<?php echo esc_attr( $unique_id ); ?> .eplus-title {
        <?php if ( !empty( $title_color ) ) { ?> color: <?php echo esc_attr( $title_color ); } ?>;
        <?php if ( !empty( $title_size ) ) { ?> font-size: <?php echo esc_attr( $title_size . 'px' ); } ?>;
        }
        <?php endif; ?>

        <?php if( !empty( $short_desc_size ) || !empty( $short_desc_color ) ): ?>
        #eplus-heading-<?php echo esc_attr( $unique_id ); ?> .eplus-short-desc {
        <?php if ( !empty( $short_desc_color ) ) { ?> color: <?php echo esc_attr( $short_desc_color ); } ?>;
        <?php if ( !empty( $short_desc_size ) ) { ?> font-size: <?php echo esc_attr( $short_desc_size . 'px' ); } ?>;
        }
        <?php endif; ?>
    </style>
<?php endif;
?>


<div id="eplus-heading-<?php echo esc_attr( $unique_id ); ?>"
     class="eplus-heading-<?php echo esc_attr( $style . $align ); ?>">

	<?php if ( ! empty( $sub_title ) ): ?>
        <h6 class="eplus-sub-title"><?php echo esc_html( $sub_title ); ?></h6>
	<?php endif; ?>
	<?php if ( ! empty( $title ) ): ?>
        <h2 class="eplus-title"><?php echo esc_html( $title ); ?></h2>
	<?php endif; ?>

	<?php if ( ! empty( $short_desc ) ): ?>
        <p class="eplus-short-desc"><?php echo esc_html( $short_desc ); ?></p>
	<?php endif; ?>
</div>