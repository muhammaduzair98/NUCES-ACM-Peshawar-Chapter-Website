<?php
/**
 * Element Name: Info Box
 *
 * @package elements/info-box/view/template-11
 * @copyright Pluginbazar 2019
 */


$unique_id      = uniqid();
$style          = eplus()->get_shortcode_atts( 'style' );
$icon_type      = eplus()->get_shortcode_atts( 'icon_type', 'fontawesome' );
$icon_class     = eplus()->get_shortcode_atts( 'icon_' . $icon_type, 'fa fa-heart' );
$link           = vc_build_link( eplus()->get_shortcode_atts( 'url' ) );
$has_link_class = ! empty( $link['url'] ) ? 'has-info-box-link' : '';

vc_icon_element_fonts_enqueue( $icon_type );
?>

<a id="eplus-info-box<?php echo esc_attr( $unique_id ); ?>"
   href="<?php echo esc_url( $link['url'] ); ?>"
   class="eplus-info-box eplus-info-box-<?php echo esc_attr( $style . ' ' . $has_link_class ) ?>">

    <div class="icon-wrap">
        <i class="<?php echo esc_attr( $icon_class ); ?>" <?php ?>></i>
    </div>

    <div class="eplus-info-desc">
        <h3 class="eplus-info-title"><?php echo esc_html( $link['title'] ); ?></h3>
    </div>
</a>