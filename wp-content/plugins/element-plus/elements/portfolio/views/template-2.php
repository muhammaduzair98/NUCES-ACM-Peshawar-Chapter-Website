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

                        <div class="eplus-shape">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 384 204">
                                <path d="M0,0S71.342-99.681,189.008-51.19,384-104,384-104V100H0Z" transform="translate(0 104)"
                                      opacity="0.76"></path>
                            </svg>
                        </div>

                        <div class="p-title-wrap">
                            <span class="p-category"><?php echo esc_html( $category ); ?></span>
	                        <?php if ( ! empty( $p_link ) && ! empty( $p_link['title'] ) ) : ?>
                                <h3 class="p-title">
                                    <a href="<?php echo esc_url( $p_link['url'] ); ?>"><?php echo esc_html( $p_link['title'] ); ?></a>
                                </h3>
	                        <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
		<?php endforeach; ?>
    </div>
</div>