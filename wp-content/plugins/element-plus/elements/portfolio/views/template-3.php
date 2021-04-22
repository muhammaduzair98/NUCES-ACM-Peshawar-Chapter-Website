<?php
/**
 * Element Name: Portfolio
 *
 * @package elements/portfolio/view/template-2
 * @copyright Pluginbazar 2019
 */

$unique_id     = uniqid();
$style         = eplus()->get_shortcode_atts( 'style' );
$portfolios    = (array) vc_param_group_parse_atts( eplus()->get_shortcode_atts( 'portfolios' ) );
$items_per_row = eplus()->get_shortcode_atts( 'items_per_row', '12' );

?>

<div id="eplus-portfolio<?php echo esc_attr( $unique_id ); ?>"
     class="eplus-portfolio eplus-portfolio-<?php echo esc_attr( $style ); ?>">
    <div class="pb-row">
		<?php foreach ( $portfolios as $portfolio_id => $portfolio ) :
			$category = isset( $portfolio['category'] ) ? $portfolio['category'] : '';
			$img_url = isset( $portfolio['img_id'] ) ? wp_get_attachment_url( $portfolio['img_id'] ) : '';
			$p_link = isset( $portfolio['p_link'] ) ? vc_build_link( $portfolio['p_link'] ) : '';
			?>
            <div class="pb-col-lg-<?php echo esc_attr( $items_per_row ); ?> pb-col-md-6">
                <div class="eplus-portfolio-item">
					<?php if ( ! empty( $img_url ) ) : ?>
                        <img src="<?php echo esc_url( $img_url ); ?>" alt="<?php echo esc_attr( $title ); ?>">
					<?php endif; ?>

                    <div class="p-info">
	                    <?php if ( ! empty( $p_link ) ) : ?>
                            <a class="p-link" href="<?php echo esc_url( $p_link['url'] ); ?>"><i class="fa fa-link"></i></a>
	                    <?php endif; ?>
                        <p class="p-category"><?php echo esc_html( $category ); ?></p>
	                    <?php if ( ! empty( $p_link ) && ! empty( $p_link['title'] ) ) : ?>
                            <h3 class="p-title">
                                <a href="<?php echo esc_url( $p_link['url'] ); ?>"><?php echo esc_html( $p_link['title'] ); ?></a>
                            </h3>
	                    <?php endif; ?>
                    </div>
                </div>
            </div>
		<?php endforeach; ?>
    </div>
</div>