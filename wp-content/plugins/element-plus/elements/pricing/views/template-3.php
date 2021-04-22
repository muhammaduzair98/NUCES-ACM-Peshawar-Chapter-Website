<?php
/**
 * Element Name: Pricing
 *
 * @package elements/pricing/view/template-3
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
$img_url          = wp_get_attachment_url( eplus()->get_shortcode_atts( 'img' ) );
$configuration    = explode( ',', eplus()->get_shortcode_atts( 'configuration' ) );
$btn              = vc_build_link( eplus()->get_shortcode_atts( 'btn' ) );
$features         = (array) vc_param_group_parse_atts( eplus()->get_shortcode_atts( 'features' ) );

$featured_class = in_array( 'featured', $configuration, true ) ? ' is-featured' : '';
$feature_icon   = in_array( 'hide_icon', $configuration, true ) ? 'no-feature-icon' : '';

vc_icon_element_fonts_enqueue( 'fontawesome' );

?>

<div id="eplus-pricing<?php echo esc_attr( $unique_id ); ?>"
     class="eplus-pricing eplus-pricing-<?php echo esc_attr( $style . $featured_class ); ?>">
    <div class="pricing-head">
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

		<?php if ( ! empty( $highlighted_text ) ) : ?>
            <h4 class="pricing-duration"><?php echo esc_html( $highlighted_text ) ?></h4>
		<?php endif; ?>
    </div>

    <div class="pricing-content">
        <div class="pricing-icon">
			<?php if ( $icon_type == 'pricing_img' ): ?>
                <img src="<?php echo esc_url( $img_url ); ?>" alt="<?php echo esc_html( $highlighted_text ) ?>">
			<?php else: ?>
                <i class="<?php echo esc_attr( $icon ); ?>"></i>
			<?php endif; ?>
        </div>

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