<?php
/**
 * Element Name: Portfolio
 *
 * @package elements/portfolio/view/template-1
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
			$author = isset( $portfolio['author'] ) ? $portfolio['author'] : '';
			$category = isset( $portfolio['category'] ) ? $portfolio['category'] : '';
			$img_url = isset( $portfolio['img_id'] ) ? wp_get_attachment_url( $portfolio['img_id'] ) : '';
			$p_link = isset( $portfolio['p_link'] ) ? vc_build_link( $portfolio['p_link'] ) : '';
			$btn_hire = isset( $portfolio['btn_hire'] ) ? vc_build_link( $portfolio['btn_hire'] ) : '';
			$s_profiles = isset( $portfolio['s_profiles'] ) ? (array) vc_param_group_parse_atts( $portfolio['s_profiles'] ) : '';


			?>
            <div class="pb-col-lg-<?php echo esc_attr( $items_per_row ); ?> pb-col-md-6">

                <div class="eplus-portfolio-item">

					<?php if ( ! empty( $img_url ) ) : ?>
                        <div class="image-wrap">
                            <a href="<?php echo esc_url( $p_link['url'] ); ?>">
                                <img src="<?php echo esc_url( $img_url ); ?>" alt="<?php echo esc_attr( $title ); ?>">
                            </a>
                            <span class="p-category"><?php echo esc_html( $category ); ?></span>
                        </div>
					<?php endif; ?>

                    <div class="p-info">
						<?php if ( ! empty( $p_link ) && ! empty( $p_link['title'] ) ) : ?>
                            <h3 class="p-title">
                                <a href="<?php echo esc_url( $p_link['url'] ); ?>"><?php echo esc_html( $p_link['title'] ); ?></a>
                            </h3>
						<?php endif; ?>

						<?php if ( ! empty( $author ) ) : ?>
                            <div class="p-author"><?php echo esc_html( $author ); ?></div>
						<?php endif; ?>

                        <div class="p-footer">
	                        <?php if ( ! empty( $btn_hire ) ) : ?>
                                <a href="<?php echo esc_url( $btn_hire['url'] ); ?>" class="btn-hire"><?php echo esc_html( $btn_hire['title'] ); ?></a>
	                        <?php endif; ?>

	                        <?php if ( ! empty( $s_profiles ) && $s_profiles ) : ?>
                                <ul class="eplus-p-social">
			                        <?php foreach ( $s_profiles as $profile ) :
				                        $s_icon = isset( $profile['s_icon'] ) ? $profile['s_icon'] : '';
				                        $link = isset( $profile['link'] ) ? vc_build_link( $profile['link'] ) : array();
				                        $url = isset( $link['url'] ) ? $link['url'] : esc_url( '#' );
				                        ?>

                                        <li><a href="<?php echo esc_url( $url ); ?>"><i
                                                        class="<?php echo esc_attr( $s_icon ); ?>"></i></a>
                                        </li>
			                        <?php endforeach; ?>
                                </ul>
	                        <?php endif; ?>
                        </div>

                    </div>
                </div>
            </div>
		<?php endforeach; ?>
    </div>
</div>