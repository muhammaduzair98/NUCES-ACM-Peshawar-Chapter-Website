<?php
/**
 * Element Name: Pricing
 *
 * @package elements/pricing/view/template-1
 * @copyright Pluginbazar 2019
 */

$unique_id        = uniqid( 'gradient-p' );
$unique_id_2      = uniqid( 'gradient-s' );
$style            = eplus()->get_shortcode_atts( 'style' );
$regular_price    = eplus()->get_shortcode_atts( 'regular_price' );
$sale_price       = eplus()->get_shortcode_atts( 'sale_price' );
$currency         = eplus()->get_shortcode_atts( 'currency' );
$short_desc       = eplus()->get_shortcode_atts( 'short_desc' );
$highlighted_text = eplus()->get_shortcode_atts( 'highlighted_text' );
$icon_type        = eplus()->get_shortcode_atts( 'icon_type' );
$icon             = eplus()->get_shortcode_atts( 'icon' );
$img_url          = wp_get_attachment_image_url( eplus()->get_shortcode_atts( 'img' ) );

$configuration   = explode( ',', eplus()->get_shortcode_atts( 'configuration' ) );
$btn             = vc_build_link( eplus()->get_shortcode_atts( 'btn' ) );
$features        = (array) vc_param_group_parse_atts( eplus()->get_shortcode_atts( 'features' ) );
$primary_color   = eplus()->get_shortcode_atts( 'primary_color' );
$secondary_color = eplus()->get_shortcode_atts( 'secondary_color' );
$btn_hover_color = eplus()->get_shortcode_atts( 'btn_hover_color' );

$featured_class = in_array( 'featured', $configuration, true ) ? ' is-featured' : '';
$feature_icon   = in_array( 'hide_icon', $configuration, true ) ? 'no-feature-icon' : '';
vc_icon_element_fonts_enqueue( 'fontawesome' );

if ( ! empty( $primary_color ) || ! empty( $secondary_color ) || ! empty( $btn_hover_color ) ) : ?>
    <style>
        #eplus-pricing<?php echo esc_attr( $unique_id ); ?>.eplus-pricing-1 .pricing-footer > a {
        <?php if ( !empty( $primary_color ) ) { ?> background-color: <?php echo esc_attr( $primary_color ); } ?>;
        }

        #eplus-pricing<?php echo esc_attr( $unique_id ); ?>.eplus-pricing-1 .pricing-footer > a:hover {
        <?php if ( !empty( $btn_hover_color ) ) { ?> background-color: <?php echo esc_attr( $btn_hover_color ); } ?>;
        }

        #eplus-pricing<?php echo esc_attr( $unique_id ); ?>.is-featured {
        <?php if ( !empty( $primary_color ) ) { ?> border-top-color: <?php echo esc_attr( $primary_color ); } ?>;
        }
    </style>
<?php endif;
?>

<div id="eplus-pricing<?php echo esc_attr( $unique_id ); ?>"
     class="eplus-pricing eplus-pricing-<?php echo esc_attr( $style . $featured_class ); ?>">
    <div class="pricing-head">

		<?php if ( ! empty( $icon ) || ! empty( $img_url ) ): ?>
            <div class="pricing-icon">

                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100"
                     height="109.135" viewBox="0 0 100 109.135">
                    <defs>
                        <linearGradient id="<?php echo esc_attr( $unique_id ); ?>" x1="0.5" x2="0.5" y2="1"
                                        gradientUnits="objectBoundingBox">
                            <stop offset="0"
                                  stop-color="<?php echo esc_attr( ! empty( $primary_color ) ? $primary_color : '#ff2a3d' ); ?>"></stop>
                            <stop offset="1"
                                  stop-color="<?php echo esc_attr( ! empty( $secondary_color ) ? $secondary_color : '#ff6b81' ); ?>"></stop>
                        </linearGradient>
                        <linearGradient id="<?php echo esc_attr( $unique_id_2 ); ?>" x1="0.5" x2="0.5" y2="1"
                                        gradientUnits="objectBoundingBox">
                            <stop offset="0"
                                  stop-color="<?php echo esc_attr( ! empty( $primary_color ) ? $primary_color : '#FF4757' ); ?>"></stop>
                            <stop offset="1"
                                  stop-color="<?php echo esc_attr( ! empty( $secondary_color ) ? $secondary_color : '#ff6b81' ); ?>"></stop>
                        </linearGradient>
                    </defs>
                    <g transform="translate(-1652.788 -752.865)">
                        <path d="M48.337,100c23.817,0,59.543-63.158,47.635-84.211S12.611-5.263.7,15.789,24.519,100,48.337,100Z"
                              transform="translate(1751.124 852.865) rotate(180)" opacity="0.16"
                              fill="url(#<?php echo esc_attr( $unique_id ); ?>)"></path>
                        <path d="M48.337,0C72.154,0,107.88,63.158,95.971,84.211S12.611,105.263.7,84.211,24.519,0,48.337,0Z"
                              transform="translate(1751.124 862) rotate(180)"
                              fill="url(#<?php echo esc_attr( $unique_id_2 ); ?>)"></path>
                    </g>
                </svg>

				<?php if ( $icon_type == 'pricing_img' ): ?>
                    <img src="<?php echo esc_url( $img_url ); ?>" alt="<?php echo esc_html( $highlighted_text ) ?>">
				<?php else: ?>
                    <i class="<?php echo esc_attr( $icon ); ?>"></i>
				<?php endif; ?>
            </div>
		<?php endif; ?>

		<?php if ( ! empty( $highlighted_text ) ) : ?>
            <h4 class="pricing-duration"><?php echo esc_html( $highlighted_text ) ?></h4>
		<?php endif; ?>

		<?php if ( ! empty( $sale_price ) || ! empty( $regular_price ) ) : ?>
            <div class="price <?php echo esc_attr( ! empty( $sale_price ) ? 'has-sale-price' : '' ); ?>">
				<?php if ( ! empty( $sale_price ) ) : ?>
                    <span class="sale-price">
                        <span class="currency"><?php echo esc_html( $currency ); ?></span><?php echo esc_html( $sale_price ); ?>
                    </span>
				<?php endif; ?>

				<?php if ( ! empty( $regular_price ) ) : ?>
                    <span class="regular-price">
                        <span class="currency"><?php echo esc_html( $currency ); ?></span><?php echo esc_html( $regular_price ); ?>
                    </span>
				<?php endif; ?>
            </div>
		<?php endif; ?>

		<?php if ( ! empty( $short_desc ) ) : ?>
            <h3 class="pricing-title"><?php echo esc_html( $short_desc ); ?></h3>
		<?php endif; ?>
    </div>

    <div class="pricing-content">
        <ul class="<?php echo esc_attr( $feature_icon ); ?>">
			<?php foreach ( $features as $feature ) :

				$feature_text = isset( $feature['feature_text'] ) && ! empty( $feature['feature_text'] ) ? $feature['feature_text'] : '';
				$feature_in = isset( $feature['feature_in'] ) && ! empty( $feature['feature_in'] ) ? ' feature-not-in' : 'feature-in';
				?>

                <li class="<?php echo esc_attr( $feature_in ); ?>"><?php echo esc_html( $feature_text ); ?></li>
			<?php endforeach; ?>
        </ul>
    </div>

	<?php if ( ! empty( $btn['url'] ) ) : ?>
        <div class="pricing-footer">
            <a href="<?php echo esc_url( $btn['url'] ); ?>"><?php echo esc_html( $btn['title'] ); ?></a>
        </div>
	<?php endif; ?>
</div>