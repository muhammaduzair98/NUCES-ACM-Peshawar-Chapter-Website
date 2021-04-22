<?php
/**
 * Element Name: Logo Carousel
 *
 * @package elements/logo-carousel/view/template-1
 * @copyright Pluginbazar 2019
 */

$unique_id              = uniqid();
$style                  = eplus()->get_shortcode_atts( 'style' );
$arrows                 = eplus()->get_shortcode_atts( 'arrows' );
$dots                   = eplus()->get_shortcode_atts( 'dots' );
$autoplay               = eplus()->get_shortcode_atts( 'autoplay' );
$autoplay_speed         = eplus()->get_shortcode_atts( 'autoplay_speed' );
$animation_speed        = eplus()->get_shortcode_atts( 'animation_speed' );
$pause_on_hover         = eplus()->get_shortcode_atts( 'pause_on_hover' );
$gutter                 = eplus()->get_shortcode_atts( 'gutter' );
$display_columns        = eplus()->get_shortcode_atts( 'display_columns' );
$tablet_display_columns = eplus()->get_shortcode_atts( 'tablet_display_columns' );
$mobile_display_columns = eplus()->get_shortcode_atts( 'mobile_display_columns' );
$item_padding           = eplus()->get_shortcode_atts( 'item_padding' );
$item_radius            = eplus()->get_shortcode_atts( 'item_radius' );
$control_color          = eplus()->get_shortcode_atts( 'control_color' );
$control_bg             = eplus()->get_shortcode_atts( 'control_bg' );
$control_hover_color    = eplus()->get_shortcode_atts( 'control_hover_color' );
$control_hover_bg       = eplus()->get_shortcode_atts( 'control_hover_bg' );
$control_radius         = eplus()->get_shortcode_atts( 'control_radius' );

if ( ! empty( $item_padding ) || ! empty( $item_radius ) ) : ?>
    <style>
        #eplus-logo-carousel<?php echo esc_attr( $unique_id ); ?> .logo-single-link {
        <?php if ( !empty( $item_padding ) ) { ?> padding: <?php echo esc_attr( $item_padding ); } ?>;
        <?php if ( !empty( $item_radius ) ) { ?> border-radius: <?php echo esc_attr( $item_radius ); } ?>;
        }
    </style>
<?php endif;

if ( ! empty( $control_color ) || ! empty( $control_bg ) || ! empty( $control_hover_bg ) || ! empty( $control_radius ) ) : ?>
    <style>
        #eplus-logo-carousel<?php echo esc_attr( $unique_id ); ?> .owl-nav button {
        <?php if ( !empty( $control_color ) ) { ?> color: <?php echo esc_attr( $control_color ); } ?>;
        <?php if ( !empty( $control_bg ) ) { ?> background-color: <?php echo esc_attr( $control_bg ); } ?>;
        <?php if ( !empty( $control_radius ) ) { ?> border-radius: <?php echo esc_attr( $control_radius ); } ?>;
        }

        #eplus-logo-carousel<?php echo esc_attr( $unique_id ); ?> .owl-dots .owl-dot {
        <?php if ( !empty( $control_bg ) ) { ?> background-color: <?php echo esc_attr( $control_bg ); } ?>;
        }

        #eplus-logo-carousel<?php echo esc_attr( $unique_id ); ?> .owl-nav button:hover,
        #eplus-logo-carousel<?php echo esc_attr( $unique_id ); ?> .owl-dots .owl-dot:hover,
        #eplus-logo-carousel<?php echo esc_attr( $unique_id ); ?> .owl-dots .owl-dot.active {
        <?php if ( !empty( $control_hover_bg ) ) { ?> background-color: <?php echo esc_attr( $control_hover_bg ); } ?>;
        <?php if ( !empty( $control_hover_color ) ) { ?> color: <?php echo esc_attr( $control_hover_color ); } ?>;
        }
    </style>
<?php endif;

?>

<div id="eplus-logo-carousel<?php echo esc_attr( $unique_id ); ?>"
     class="owl-carousel eplus-logo-carousel-<?php echo esc_attr( $style ); ?>">
	<?php eplus()->do_child_element(); ?>
</div>

<script>
    (function ($) {
        "use strict";
        $(document).on('ready', function () {
            $('#eplus-logo-carousel<?php echo esc_attr( $unique_id ); ?>').owlCarousel({
                loop: true,
                nav: <?php echo esc_attr( ! empty( $arrows ) ? $arrows : 'false' ); ?>,
                dots: <?php echo esc_attr( ! empty( $dots ) ? $dots : 'false' ); ?>,
                autoplay: <?php echo esc_attr( empty( $autoplay ) ? 'true' : $autoplay ); ?>,
                autoplayTimeout: <?php echo esc_attr( ! empty( $autoplay_speed ) ? $autoplay_speed : 3000 ); ?>,
                autoplayHoverPause: <?php echo esc_attr( ! empty( $pause_on_hover ) ? $pause_on_hover : 'false' ); ?>,
                smartSpeed: <?php echo esc_attr( ! empty( $animation_speed ) ? $animation_speed : 800 ); ?>,
                margin: <?php echo esc_attr( $gutter ); ?>,
                navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
                responsive: {
                    0: {
                        items: <?php echo esc_attr( ! empty( $mobile_display_columns ) ? $mobile_display_columns : 1 ); ?>,
                        nav: false,
                    },
                    600: {
                        items: <?php echo esc_attr( ! empty( $tablet_display_columns ) ? $tablet_display_columns : 3 ); ?>,
                    },
                    992: {
                        items: <?php echo esc_attr( ! empty( $display_columns ) ? $display_columns : 5 ); ?>,
                    }
                }
            });
        });

    })(jQuery);
</script>
