<?php
/**
 * Element Name: Pricing
 *
 * @package elements/pricing/view/template-2
 * @copyright Pluginbazar 2019
 */

$unique_id        = uniqid();
$style            = eplus()->get_shortcode_atts( 'style' );
$regular_price    = eplus()->get_shortcode_atts( 'regular_price' );
$sale_price       = eplus()->get_shortcode_atts( 'sale_price' );
$currency         = eplus()->get_shortcode_atts( 'currency' );
$short_desc       = eplus()->get_shortcode_atts( 'short_desc' );
$highlighted_text = eplus()->get_shortcode_atts( 'highlighted_text' );
$icon_type        = eplus()->get_shortcode_atts( 'icon_type' );
$icon             = eplus()->get_shortcode_atts( 'icon' );
$configuration    = explode( ',', eplus()->get_shortcode_atts( 'configuration' ) );
$btn              = vc_build_link( eplus()->get_shortcode_atts( 'btn' ) );
$features         = (array) vc_param_group_parse_atts( eplus()->get_shortcode_atts( 'features' ) );
$primary_color    = eplus()->get_shortcode_atts( 'primary_color' );
$secondary_color  = eplus()->get_shortcode_atts( 'secondary_color' );
$btn_hover_color  = eplus()->get_shortcode_atts( 'btn_hover_color' );

$featured_class = in_array( 'featured', $configuration, true ) ? ' is-featured' : '';
$feature_icon   = in_array( 'hide_icon', $configuration, true ) ? 'no-feature-icon' : '';
vc_icon_element_fonts_enqueue( 'fontawesome' );

if ( ! empty( $primary_color ) || ! empty( $secondary_color ) || ! empty( $btn_hover_color ) ) : ?>
    <style>
        #eplus-pricing<?php echo esc_attr( $unique_id ); ?> .pricing-footer > a {
        <?php if ( !empty( $primary_color ) ) { ?> background-color: <?php echo esc_attr( $primary_color ); } ?>;
        }
        #eplus-pricing<?php echo esc_attr( $unique_id ); ?> .pricing-footer > a:hover {
        <?php if ( !empty( $btn_hover_color ) ) { ?> background-color: <?php echo esc_attr( $btn_hover_color ); } ?>;
        }
    </style>
<?php endif;
?>

<div id="eplus-pricing<?php echo esc_attr( $unique_id ); ?>"
     class="eplus-pricing eplus-pricing-<?php echo esc_attr( $style . $featured_class ); ?>">
    <div class="pricing-head">
		<?php if ( ! empty( $highlighted_text ) ) : ?>
            <h4 class="pricing-duration"><?php echo esc_html( $highlighted_text ) ?></h4>
		<?php endif; ?>

		<?php if ( ! empty( $sale_price ) || ! empty( $regular_price ) ) : ?>
            <div class="price <?php echo esc_attr( ! empty( $sale_price ) ? 'has-sale-price' : '' ); ?>">
				<?php if ( ! empty( $regular_price ) ) : ?>
                    <span class="regular-price">
                        <span class="currency"><?php echo esc_html( $currency ); ?></span><?php echo esc_html( $regular_price ); ?>
                    </span>
				<?php endif; ?>
				<?php if ( ! empty( $sale_price ) ) : ?>
                    <span class="sale-price">
                        <span class="currency"><?php echo esc_html( $currency ); ?></span><?php echo esc_html( $sale_price ); ?>
                    </span>
				<?php endif; ?>
				<?php if ( ! empty( $short_desc ) ) : ?>
                    <span class="pricing-title"><?php echo esc_html( $short_desc ); ?></span>
				<?php endif; ?>
            </div>
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

	<?php if ( ! empty( $featured_class ) ) : ?>
        <div class="eplus-bubbles">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="440" height="247"
                 viewBox="0 0 440 247">
                <defs>
                    <linearGradient id="<?php echo esc_attr( $unique_id ); ?>" x1="0.5" x2="0.5" y2="1"
                                    gradientUnits="objectBoundingBox">
                        <stop offset="0"
                              stop-color="<?php echo esc_attr( ! empty( $primary_color ) ? $primary_color : '#f19886' ); ?>"></stop>
                        <stop offset="1"
                              stop-color="<?php echo esc_attr( ! empty( $secondary_color ) ? $secondary_color : '#f6e1c2' ); ?>"></stop>
                    </linearGradient>
                </defs>
                <g transform="translate(-722 -822)">
                    <path d="M82,0A82,82,0,1,1,0,82,82,82,0,0,1,82,0Z" transform="translate(998 872)"
                          fill="url(#<?php echo esc_attr( $unique_id ); ?>)"></path>
                    <circle cx="103.5" cy="103.5" r="103.5" transform="translate(895 822)" opacity="0.5"
                            fill="url(#<?php echo esc_attr( $unique_id ); ?>)"></circle>
                    <circle cx="82" cy="82" r="82" transform="translate(722 849)" opacity="0.5"
                            fill="url(#<?php echo esc_attr( $unique_id ); ?>)"></circle>
                    <circle cx="82" cy="82" r="82" transform="translate(787 905)"
                            fill="url(#<?php echo esc_attr( $unique_id ); ?>)"></circle>
                </g>
            </svg>
        </div>
	<?php endif; ?>
</div>