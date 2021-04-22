<?php
/**
 * Element Name: Banner
 *
 * @package elements/banner/view/template-4
 * @copyright Pluginbazar 2019
 */

$unique_id            = uniqid();
$style                = eplus()->get_shortcode_atts( 'style' );
$title                = eplus()->get_shortcode_atts( 'title' );
$sub_title            = eplus()->get_shortcode_atts( 'sub_title' );
$short_desc           = eplus()->get_shortcode_atts( 'short_desc' );
$btn_1                = vc_build_link( eplus()->get_shortcode_atts( 'btn_1' ) );
$btn_2                = vc_build_link( eplus()->get_shortcode_atts( 'btn_2' ) );
$padding              = eplus()->get_shortcode_atts( 'padding' );
$bg_imgurl            = wp_get_attachment_image_url( eplus()->get_shortcode_atts( 'bg_imgid' ), 'full', false );
$img_url              = wp_get_attachment_image_url( eplus()->get_shortcode_atts( 'img_id' ), 'full', false );
$img_margin           = eplus()->get_shortcode_atts( 'img_margin' );
$content_layout_class = ! empty( eplus()->get_shortcode_atts( 'content_layout' ) ) ? ' eplus-banner-img-left' : '';


if ( ! empty( $padding ) || ! empty( $img_margin ) || ! empty( $bg_imgurl ) ) : ?>
    <style>
        #eplus-banner<?php echo esc_attr( $unique_id ); ?> {
            background-image: url("<?php echo esc_url( $bg_imgurl ); ?>");
            padding: <?php echo esc_attr( $padding ); ?>
        }
        #eplus-banner<?php echo esc_attr( $unique_id ); ?> .banner-img {
            margin: <?php echo esc_attr( $img_margin ); ?>
        }
    </style>
<?php endif;
?>

<div id="eplus-banner<?php echo esc_attr( $unique_id ); ?>"
     class="eplus-banner-<?php echo esc_attr( $style . $content_layout_class ) ?>">
    <div class="container">
        <div class="pb-row pb-align-items-center">
            <div class="pb-col-md-7">
				<?php if ( ! empty( $sub_title ) ) : ?>
                    <h4 class="banner-sub-title"><?php echo esc_html( $sub_title ); ?></h4>
				<?php endif; ?>

				<?php if ( ! empty( $title ) ) : ?>
                    <h2 class="banner-title"><?php echo esc_html( $title ); ?></h2>
				<?php endif; ?>

				<?php if ( ! empty( $short_desc ) ) : ?>
                    <p class="short-desc"><?php echo wp_kses_post( $short_desc ); ?></p>
				<?php endif; ?>

                <div class="banner-btns">
					<?php if ( ! empty( $btn_1['url'] && ! empty( $btn_1['title'] ) ) ) : ?>
                        <a href="<?php echo esc_url( $btn_1['url'] ); ?>"
                           class="banner-btn-1"><?php echo esc_html( $btn_1['title'] ); ?></a>
					<?php endif; ?>

					<?php if ( ! empty( $btn_2['url'] && ! empty( $btn_2['title'] ) ) ) : ?>
                        <a href="<?php echo esc_url( $btn_1['url'] ); ?>"
                           class="banner-btn-2"><?php echo esc_html( $btn_2['title'] ); ?></a>
					<?php endif; ?>
                </div>
            </div>
            <div class="pb-col-md-5">
				<?php if ( ! empty( $img_url ) ) : ?>
                    <div class="banner-img">
                        <img src="<?php echo esc_url( $img_url ); ?>" alt="<?php echo esc_attr( $title ); ?>">
                    </div>
				<?php endif; ?>
            </div>
        </div>
    </div>
</div>