<?php
/**
 * Element Name: Countdown Timer
 *
 * @package elements/countdown/view/template-1
 * @copyright Pluginbazar 2019
 */

$unique_id       = uniqid();
$style           = eplus()->get_shortcode_atts( 'style' );
$date_time       = eplus()->get_shortcode_atts( 'date_time', date( 'd-m-Y h:i a', strtotime( '+1 day', current_time( 'U' ) ) ) );
$date_time       = date( 'd M Y h:i a', strtotime( $date_time ) );
$primary_color   = eplus()->get_shortcode_atts( 'primary_color' );
$secondary_color = eplus()->get_shortcode_atts( 'secondary_color' );
$color           = eplus()->get_shortcode_atts( 'color' );

if ( ! empty( $primary_color ) || ! empty( $secondary_color ) || ! empty( $color ) ) : ?>
    <style>
        <?php if( $style == '4' ): ?>
        #eplus-countdown-<?php echo esc_attr( $unique_id ); ?> > span {
        <?php if ( !empty( $primary_color ) ) { ?> border-left-color: <?php echo esc_attr( $primary_color ); } ?>;
        <?php if ( !empty( $secondary_color ) ) { ?> border-right-color: <?php echo esc_attr( $secondary_color ); } ?>;
        }

        #eplus-countdown-<?php echo esc_attr( $unique_id ); ?> .count-number {
        <?php if ( !empty( $color ) ) { ?> color: <?php echo esc_attr( $color ); } ?>;
        }
        <?php endif; ?>

        <?php if( $style == '5' ): ?>
        #eplus-countdown-<?php echo esc_attr( $unique_id ); ?> > span {
        <?php if ( !empty( $primary_color ) ) { ?> background-color: <?php echo esc_attr( $primary_color ); } ?>;
        <?php if ( !empty( $secondary_color ) || !empty( $primary_color ) ) { ?> background-image: linear-gradient(-225deg, <?php echo esc_attr( $primary_color ); ?> 0%, <?php echo esc_attr( $secondary_color ); ?> 100%); <?php } ?>;
        }

        #eplus-countdown-<?php echo esc_attr( $unique_id ); ?> span {
        <?php if ( !empty( $color ) ) { ?> color: <?php echo esc_attr( $color ); } ?>;
        }
        <?php endif; ?>
    </style>
<?php endif; ?>

<div id="eplus-countdown-<?php echo esc_attr( $unique_id ); ?>"
     class="eplus-countdown-<?php echo esc_attr( $style ) ?>"></div>
<script>
    (function ($, window, document) {
        "use strict";

        (function updateTime() {
            var countDownDate = new Date(new Date('<?php echo esc_attr( $date_time ); ?>').toString()).getTime(),
                now = new Date().getTime(),
                distance = countDownDate - now,
                days = 0, hours = 0, minutes = 0, seconds = 0;

            if (distance > 0) {
                days = Math.floor(distance / (1000 * 60 * 60 * 24));
                hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                seconds = Math.floor((distance % (1000 * 60)) / 1000);
            }

            days = days < 10 ? '0' + days : days;
            hours = hours < 10 ? '0' + hours : hours;
            minutes = minutes < 10 ? '0' + minutes : minutes;
            seconds = seconds < 10 ? '0' + seconds : seconds;

            $("#eplus-countdown-<?php echo esc_attr( $unique_id ); ?>").html(
                '<span class="days"><span class="count-number">' + days + '</span><span class="count-text"><?php esc_html_e( 'Days', 'element-plus' ); ?></span></span>' +
                '<span class="hours"><span class="count-number">' + hours + '</span><span class="count-text"><?php esc_html_e( 'Hours', 'element-plus' ) ?></span></span>' +
                '<span class="minutes"><span class="count-number">' + minutes + '</span><span class="count-text"><?php esc_html_e( 'Minutes', 'element-plus' ); ?></span></span>' +
                '<span class="seconds"><span class="count-number">' + seconds + '</span><span class="count-text"><?php esc_html_e( 'Seconds', 'element-plus' ) ?></span></span>');

            setTimeout(updateTime, 1000);
        })();

    })(jQuery, window, document);
</script>