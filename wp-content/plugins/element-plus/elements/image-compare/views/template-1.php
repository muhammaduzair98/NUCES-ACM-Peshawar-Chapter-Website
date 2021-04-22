<?php
/**
 * Element Name: Image Compare
 *
 * @package elements/image-compare/view/template-1
 * @copyright Pluginbazar 2019
 */

$unique_id = uniqid( 'eplus-image-compare-' );
$style     = eplus()->get_shortcode_atts( 'style' );

$img_before = wp_get_attachment_url( eplus()->get_shortcode_atts( 'img_before' ) );
$img_after  = wp_get_attachment_url( eplus()->get_shortcode_atts( 'img_after' ) );

?>


<div id="<?php echo esc_attr( $unique_id ); ?>"
     class="cocoen eplus-image-compare eplus-image-compare-<?php echo esc_attr( $style ); ?>">
    <img src="<?php echo esc_url( $img_before ); ?>"/>
    <img src="<?php echo esc_url( $img_after ); ?>"/>
</div>

<script>
    (function ($) {
        "use strict";

        $('#<?php echo esc_attr( $unique_id ); ?>').cocoen();
    })(jQuery);
</script>