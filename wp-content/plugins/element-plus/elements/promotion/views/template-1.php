<?php
/**
 * Element Name: Promotion Banner
 *
 * @package elements/promotion/view/template-1
 * @copyright Pluginbazar 2019
 */

$unique_id      = uniqid();
$style          = eplus()->get_shortcode_atts( 'style' );
$accordions     = (array) vc_param_group_parse_atts( eplus()->get_shortcode_atts( 'accordions' ) );
$img            = wp_get_attachment_image_url( eplus()->get_shortcode_atts( 'img' ), 'full' );
$img            = ! empty( $img ) ? $img : EPLUS_PLUGIN_URL . 'elements/promotion/img/ipad.png';
$title          = eplus()->get_shortcode_atts( 'title', esc_html__( 'Promotion Title', 'element-plus' ) );
$sub_title      = eplus()->get_shortcode_atts( 'sub_title', esc_html__( 'Promotion Sub Title', 'element-plus' ) );
$button         = vc_build_link( eplus()->get_shortcode_atts( 'link' ) );
$color          = eplus()->get_shortcode_atts( 'color' );
$bg_color       = eplus()->get_shortcode_atts( 'bg_color' );
$btn_color      = eplus()->get_shortcode_atts( 'btn_color' );
$btn_background = eplus()->get_shortcode_atts( 'btn_background' );
$img_padding    = eplus()->get_shortcode_atts( 'img_padding' );
$banner_padding = eplus()->get_shortcode_atts( 'banner_padding' );
$img_margin     = eplus()->get_shortcode_atts( 'img_margin' );
$max_width      = eplus()->get_shortcode_atts( 'max_width' );
$min_height     = eplus()->get_shortcode_atts( 'min_height' );
$img_position   = ! empty( eplus()->get_shortcode_atts( 'img_position' ) ) ? 'image-alignment-right' : '';

if ( ! empty( $banner_padding ) || ! empty( $color ) || ! empty( $min_height ) || ! empty( $max_width ) || ! empty( $bg_color ) || ! empty( $btn_color ) || ! empty( $btn_background ) || ! empty( $img_margin ) || ! empty( $img_padding ) ) : ?>
    <style>
        #eplus-promo<?php echo esc_attr( $unique_id ); ?> {
        <?php if ( !empty( $bg_color ) ) { ?> background-color: <?php echo esc_attr( $bg_color ); } ?>;
        <?php if ( !empty( $min_height ) ) { ?> min-height: <?php echo esc_attr( $min_height . 'px' ); } ?>;
        <?php if ( !empty( $banner_padding ) ) { ?> padding: <?php echo esc_attr( $banner_padding ); } ?>;
        }

        #eplus-promo<?php echo esc_attr( $unique_id ); ?> .eplus-promo-title,
        #eplus-promo<?php echo esc_attr( $unique_id ); ?> .eplus-promo-sub-title {
            color: <?php echo esc_attr( $color ); ?>;
        }

        <?php if( !empty( $btn_background ) || !empty( $btn_color ) ) : ?>
        #eplus-promo<?php echo esc_attr( $unique_id ); ?> .promo-btn {
            background-color: <?php echo esc_attr( $btn_background ); ?>;
            color: <?php echo esc_attr( $btn_color ); ?>;
        }

        <?php endif; ?>
        <?php if( !empty( $img_margin ) || !empty( $img_padding ) || !empty( $max_width ) ) : ?>
        #eplus-promo<?php echo esc_attr( $unique_id ); ?> .eplus-promo-img {
            margin: <?php echo esc_attr( $img_margin ); ?>;
            padding: <?php echo esc_attr( $img_padding ); ?>;
            <?php if ( !empty( $max_width ) ) { ?> max-width: <?php echo esc_attr( abs( $max_width ) . 'px' ); } ?>;
        }
        <?php endif; ?>
    </style>
<?php endif;


?>

<div id="eplus-promo<?php echo esc_attr( $unique_id ); ?>"
     class="eplus-promo eplus-promo-<?php echo esc_attr( $style . ' ' . $img_position ); ?>">
    <div class="eplus-promo-img">
        <img src="<?php echo esc_url( $img ); ?>" alt="<?php echo esc_attr( $title ); ?>">
    </div>
    <div class="eplus-promo-info">
		<?php if ( ! empty( $sub_title ) ) : ?>
            <h4 class="eplus-promo-sub-title"><?php echo esc_html( $sub_title ); ?></h4>
		<?php endif; ?>

		<?php if ( ! empty( $title ) ) : ?>
            <h3 class="eplus-promo-title"><?php echo esc_html( $title ); ?></h3>
		<?php endif; ?>

        <a href="<?php echo esc_url( eplus()->get_shortcode_atts( 'url', '#', $button ) ); ?>"
           class="promo-btn"><?php echo esc_html( eplus()->get_shortcode_atts( 'title', 'Buy Now', $button ) ); ?></a>
    </div>
</div>