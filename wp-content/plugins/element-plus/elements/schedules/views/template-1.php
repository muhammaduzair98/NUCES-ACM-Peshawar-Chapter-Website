<?php
/**
 * Element Name: Schedules
 *
 * @package elements/schedules/view/template-1
 * @copyright Pluginbazar 2019
 */

$unique_id     = uniqid();
$style         = eplus()->get_shortcode_atts( 'style' );
$schedules     = (array) vc_param_group_parse_atts( eplus()->get_shortcode_atts( 'schedules' ) );
$img_url       = wp_get_attachment_image_url( eplus()->get_shortcode_atts( 'ss_imgid' ) );
$primary_color = eplus()->get_shortcode_atts( 'primary_color' );
$color         = eplus()->get_shortcode_atts( 'color' );

if ( $style == '3' || ! empty( $primary_color ) || ! empty( $color ) ) : ?>
<style>
    <?php if ( !empty( $primary_color ) ) : ?>
    #eplus-schedules-<?php echo esc_attr( $unique_id ); ?> .eplus-schedules {
        background-color: <?php echo esc_attr( $primary_color ); ?>;
    }
    <?php endif; ?>
    <?php if ( !empty( $color ) ) : ?>
    #eplus-schedules-<?php echo esc_attr( $unique_id ); ?> .eplus-schedule {
        color: <?php echo esc_attr( $color ); ?>;
    }
    #eplus-schedules-<?php echo esc_attr( $unique_id ); ?> .eplus-arrow-icon:after,
    #eplus-schedules-<?php echo esc_attr( $unique_id ); ?> .eplus-arrow-icon:before {
        background-color: <?php echo esc_attr( $color ); ?>;
    }
    <?php endif; ?>
</style>
<?php endif; ?>

<div id="eplus-schedules-<?php echo esc_attr( $unique_id ); ?>"
     class="eplus-schedules-wrap eplus-schedules-style-<?php echo esc_attr( $style ); ?>">
    <div class="eplus-schedules">

		<?php if ( ! empty( $img_url ) ) : ?>
            <div class="eplus-status-img">
                <img src="<?php echo esc_url( $img_url ); ?>"
                     alt="<?php echo esc_attr__( 'Schedules Status', 'element-plus' ) ?>">
            </div>
		<?php endif ?>

		<?php foreach ( $schedules as $schedule ) :
			$sessions = (array) vc_param_group_parse_atts( isset( $schedule['sessions'] ) ? $schedule['sessions'] : '' );
			$day = isset( $schedule['day'] ) ? $schedule['day'] : '';
			?>
            <div class="eplus-schedule  shop-close">
                <div class="eplus-day-name">
					<?php echo esc_html( $day ); ?> <span class="eplus-arrow-icon"></span>
                </div>
                <div class="eplus-day-schedules">
					<?php foreach ( $sessions as $session ) :
						$open = isset( $session['open'] ) ? $session['open'] : '';
						$close = isset( $session['close'] ) ? $session['close'] : '';
						if ( empty( $open ) || empty( $close ) ) {
							continue;
						}
						?>
                        <div class="eplus-day-schedule"><?php echo esc_html( $open . ' - ' . $close ); ?></div>
					<?php endforeach; ?>
                </div>
            </div>
		<?php endforeach; ?>
    </div>
</div>
