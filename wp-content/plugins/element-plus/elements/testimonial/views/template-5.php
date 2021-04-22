<?php
/**
 * Element Name: Testimonial
 *
 * @package elements/testimonial/view/template-5
 * @copyright Pluginbazar 2019
 */

$unique_id       = uniqid();
$style           = eplus()->get_shortcode_atts( 'style' );
$name            = eplus()->get_shortcode_atts( 'name' ) ? eplus()->get_shortcode_atts( 'name' ) : esc_html__( 'James Smith', 'element-plus' );
$designation     = eplus()->get_shortcode_atts( 'designation' ) ? eplus()->get_shortcode_atts( 'designation' ) : esc_html__( 'Developer', 'element-plus' );
$testi_img       = wp_get_attachment_image_url( eplus()->get_shortcode_atts( 'img' ) );
$rating          = (float) eplus()->get_shortcode_atts( 'rating', 0 );
$review_text     = eplus()->get_shortcode_atts( 'review_text' );
$primary_color   = eplus()->get_shortcode_atts( 'primary_color' );
$secondary_color = eplus()->get_shortcode_atts( 'secondary_color' );

vc_icon_element_fonts_enqueue( 'fontawesome' );

if ( ! empty( $primary_color ) ) : ?>
    <style>
        #eplus-testimonial<?php echo esc_attr( $unique_id ) . ':after'; ?> {
        <?php if ( !empty( $primary_color ) ) { ?> border-color: <?php echo esc_attr( $primary_color ); } ?>;
        }
    </style>
<?php endif;

?>

<div id="eplus-testimonial<?php echo esc_attr( $unique_id ); ?>"
     class="eplus-testimonial-<?php echo esc_attr( $style ); ?>">

	<?php if ( ! empty( $testi_img ) ) : ?>
        <div class="eplus-testi-img">
            <img src="<?php echo esc_url( $testi_img ); ?>" alt="<?php echo esc_attr( $name ); ?>">
        </div>
	<?php endif; ?>

    <div class="eplus-testi-desc">
        <i class="fa fa-quote-right eplus-quote"></i>
		<?php if ( ! empty( $review_text ) ) : ?>
            <p><?php echo esc_html( $review_text ); ?></p>
		<?php endif; ?>
    </div>

    <div class="eplus-testi-info">
        <h3 class="eplus-testi-title"><?php echo esc_html( $name ); ?></h3>
        <span class="eplus-testi-designation"><?php echo esc_html( $designation ); ?></span>
        <div class="eplus-testi-rating">
			<?php
			for ( $index = 1; $index <= 5; $index ++ ) {
				if ( $rating != 0 && $index <= $rating ) {
					echo wp_kses_post( '<i class="fa fa-star"></i>' );
				} else if ( abs( $rating - $index ) === 0.5 ) {
					echo wp_kses_post( '<i class="fa fa-star-half-o"></i>' );
				} else {
					echo wp_kses_post( '<i class="fa fa-star-o"></i>' );
				}
			}
			?>
        </div>
    </div>
</div>