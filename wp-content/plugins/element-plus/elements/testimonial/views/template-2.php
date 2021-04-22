<?php
/**
 * Element Name: Testimonial
 *
 * @package elements/testimonial/view/template-1
 * @copyright Pluginbazar 2019
 */

$unique_id   = uniqid();
$style       = eplus()->get_shortcode_atts( 'style' );
$name        = eplus()->get_shortcode_atts( 'name' ) ? eplus()->get_shortcode_atts( 'name' ) : esc_html__( 'James Smith', 'element-plus' );
$designation = eplus()->get_shortcode_atts( 'designation' ) ? eplus()->get_shortcode_atts( 'designation' ) : esc_html__( 'Developer', 'element-plus' );
$testi_img   = wp_get_attachment_image_url( eplus()->get_shortcode_atts( 'img' ) );
$rating      = (float) eplus()->get_shortcode_atts( 'rating', 0 );
$review_text = eplus()->get_shortcode_atts( 'review_text' );
$recommend_text = eplus()->get_shortcode_atts( 'recommend_text' );

?>

<div id="eplus-testimonial<?php echo esc_attr( $unique_id ); ?>"
     class="eplus-testimonial-<?php echo esc_attr( $style ); ?>">

	<?php if ( ! empty( $testi_img ) ) : ?>
        <div class="eplus-testi-img">
            <img src="<?php echo esc_url( $testi_img ); ?>" alt="<?php echo esc_attr( $name ); ?>">
        </div>
	<?php endif; ?>

    <div class="eplus-testi-footer">

        <div class="eplus-testi-info">
            <h3 class="eplus-testi-title"><?php echo esc_html( $name ); ?></h3>
            <span class="eplus-testi-designation"><?php echo esc_html( $designation ); ?></span>
        </div>

        <div class="eplus-testi-desc">
		    <?php if ( !empty( $review_text ) ) :  ?>
                <p><?php echo esc_html( $review_text ); ?></p>
		    <?php endif; ?>

            <div class="eplus-testi-rating">
			    <?php
			    for ( $index = 1; $index <= 5; $index ++ ) {
				    if ( $rating != 0 && $index <= $rating ) {
					    echo wp_kses_post('<i class="fa fa-star"></i>');
				    } else if( abs( $rating - $index ) === 0.5 ) {
					    echo wp_kses_post( '<i class="fa fa-star-half-o"></i>');
				    } else {
					    echo wp_kses_post( '<i class="fa fa-star-o"></i>');
				    }
			    }

			    if ( !empty( $recommend_text ) ) :
			    ?>
                <span class="eplus-testi-rating-text"><?php echo esc_html( $recommend_text ); ?></span>
                <?php endif; ?>

            </div>
        </div>

    </div>
</div>