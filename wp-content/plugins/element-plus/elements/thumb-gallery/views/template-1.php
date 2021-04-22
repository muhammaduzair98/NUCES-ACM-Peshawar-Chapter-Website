<?php
/**
 * Element Name: Logo Carousel
 *
 * @package elements/thumb-gallery/view/template-1
 * @copyright Pluginbazar 2019
 */


$slider_id       = uniqid();
$thumb_id        = uniqid();
$style           = eplus()->get_shortcode_atts( 'style' );
$autoplay        = eplus()->get_shortcode_atts( 'autoplay' );
$autoplay_speed  = eplus()->get_shortcode_atts( 'autoplay_speed' );
$animation_speed = eplus()->get_shortcode_atts( 'animation_speed' );
$pause_on_hover  = eplus()->get_shortcode_atts( 'pause_on_hover' );
$thumb_per_row   = eplus()->get_shortcode_atts( 'thumb_per_row' );
$center_mode     = eplus()->get_shortcode_atts( 'center_mode' );

$attachment_ids = array();
foreach ( explode( '][', eplus()->get_shortcode_atts( 'content' ) ) as $single_content ) {
	$single_content = shortcode_parse_atts( $single_content );
	if ( isset( $single_content['logo_img'] ) && ! empty( $single_content['logo_img'] ) ) {
		$attachment_ids[] = $single_content['logo_img'];
	}
}

?>


<div class="eplus-thumb-gallery-<?php echo esc_attr( $style ); ?>">

    <div class="eplus-gallery-for eplus-gallery-for<?php echo esc_attr( $slider_id ); ?>">
		<?php eplus()->do_child_element(); ?>
    </div>

    <div class="gallery-nav eplus-gallery-nav<?php echo esc_attr( $thumb_id ); ?>">
		<?php foreach ( $attachment_ids as $attachment_id ) : ?>
            <div class="thumb-item"><img
                        src="<?php echo esc_url( wp_get_attachment_image_url( $attachment_id, 'gallery-thumb' ) ); ?>"
                        alt="<?php echo esc_attr( str_replace( '-', ' ', get_the_title( $attachment_id ) ) ); ?>"></div>
		<?php endforeach; ?>
    </div>

    <script>
        (function ($) {
            "use strict";
            $(document).on('ready', function () {

                $('.eplus-gallery-for<?php echo esc_attr( $slider_id ); ?>').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                    fade: true,
                    adaptiveHeight: true,
                    autoplay: <?php echo esc_attr( empty( $autoplay ) ? 'true' : $autoplay ); ?>,
                    autoplaySpeed: <?php echo esc_attr( ! empty( $autoplay_speed ) ? $autoplay_speed : 3000 ); ?>,
                    pauseOnHover: <?php echo esc_attr( ! empty( $pause_on_hover ) ? $pause_on_hover : 'false' ); ?>,
                    asNavFor: '.eplus-gallery-nav<?php echo esc_attr( $thumb_id ); ?>'
                });

                $('.eplus-gallery-nav<?php echo esc_attr( $thumb_id ); ?>').slick({
                    slidesToShow: <?php echo esc_attr( ! empty( $thumb_per_row ) ? $thumb_per_row : '5' ) ?>,
                    slidesToScroll: 1,
                    asNavFor: '.eplus-gallery-for<?php echo esc_attr( $slider_id ); ?>',
                    dots: false,
                    arrows: false,
                    centerMode: <?php echo esc_attr( empty( $center_mode ) ? 'true' : $center_mode ); ?>,
                    pauseOnHover: <?php echo esc_attr( ! empty( $pause_on_hover ) ? $pause_on_hover : 'false' ); ?>,
                    centerPadding: '80px',
                    focusOnSelect: true,
                    speed: 550,
                    responsive: [
                        {
                            breakpoint: 767,
                            settings: {
                                slidesToShow: 2,
                            }
                        },
                        {
                            breakpoint: 480,
                            settings: {
                                slidesToShow: 1,
                            }
                        },
                    ]
                });
            });

        })(jQuery);
    </script>
</div>