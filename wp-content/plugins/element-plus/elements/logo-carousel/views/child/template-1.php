<?php
/**
 * Element Name: Logo Carousel - Child Element
 *
 * @package elements/logo-carousel/views/child/template-1
 * @copyright Pluginbazar 2019
 */

$unique_id = uniqid();
$img_url = wp_get_attachment_image_url( eplus()->get_shortcode_atts( 'logo_img' ), 'full' );
$link    = vc_build_link( eplus()->get_shortcode_atts( 'link' ) );
$item_bg = eplus()->get_shortcode_atts( 'item_bg' );
?>


<div id="ls-<?php echo esc_attr( $unique_id  ); ?>" class="logo-single">

    <?php if ( ! empty( $item_bg ) ) : ?>
        <style>
            #ls-<?php echo esc_attr( $unique_id  ); ?> .logo-single-link {
            <?php if ( !empty( $item_bg ) ) { ?> background-color: <?php echo esc_attr( $item_bg ); } ?>;
            }
        </style>
    <?php endif; ?>

	<?php if ( ! empty( $link['url'] ) ) : ?>
        <a href="<?php echo esc_url( $link['url'] ); ?>" class="logo-single-link"><img
                    src="<?php echo esc_url( $img_url ); ?>" alt="<?php echo esc_attr( $link['title'] ); ?>"></a>
	<?php else: ; ?>
        <div class="logo-single-link">
            <img src="<?php echo esc_url( $img_url ); ?>" alt="<?php echo esc_attr( $link['title'] ); ?>">
        </div>
	<?php endif; ?>

</div>

