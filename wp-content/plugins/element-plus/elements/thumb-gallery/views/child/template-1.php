<?php
/**
 * Element Name: Thumb Gallery - Child Element
 *
 * @package elements/thumb-gallery/views/child/template-1
 * @copyright Pluginbazar 2019
 */

$unique_id = uniqid();
$img_url = wp_get_attachment_image_url( eplus()->get_shortcode_atts( 'logo_img' ), 'full' );
?>

<div class="thumb-gallery-single">
    <img src="<?php echo esc_url( $img_url ); ?>" alt="<?php echo esc_attr( $link['title'] ); ?>">
</div>

