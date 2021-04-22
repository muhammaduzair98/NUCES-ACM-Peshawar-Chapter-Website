<?php
/**
 * Element Name: Progressbar
 *
 * @package elements/progressbar/view/template-1
 * @copyright Pluginbazar 2019
 */

$unique_id       = uniqid();
$style           = eplus()->get_shortcode_atts( 'style' );
$pb_value        = abs( eplus()->get_shortcode_atts( 'pb_value' ) );
$pb_value        = $pb_value > 100 ? 0 : $pb_value;
$pb_label        = eplus()->get_shortcode_atts( 'pb_label' );
$bar_color       = eplus()->get_shortcode_atts( 'bar_color' );
$label_color     = eplus()->get_shortcode_atts( 'label_color' );
$num_color       = eplus()->get_shortcode_atts( 'num_color' );
$primary_color   = eplus()->get_shortcode_atts( 'primary_color' );
$secondary_color = eplus()->get_shortcode_atts( 'secondary_color' );
?>

<div id="eplus-progress-bar<?php echo esc_attr( $unique_id ); ?>"
     class="eplus-progress-bar eplus-progress-bar-<?php echo esc_attr( $style ); ?>">
    <div class="eplus-progress-fill" role="progressbar" aria-valuenow="<?php echo esc_attr( $pb_value ); ?>"
         aria-valuemin="0" aria-valuemax="100"
         style="width:<?php echo esc_attr( $pb_value . '%' ); ?>">

		<?php if ( $style == '2' ) : ?>
            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="90" viewBox="0 0 460 90">
                <g transform="translate(-638 -407)">
                    <circle cx="22" cy="22" r="22" transform="translate(761 415)" fill="#fff"
                            opacity="0.2"></circle>
                    <circle cx="16.5" cy="16.5" r="16.5" transform="translate(820 454)" fill="#fff"
                            opacity="0.2"></circle>
                    <circle cx="17.5" cy="17.5" r="17.5" transform="translate(887 407)" fill="#fff"
                            opacity="0.2"></circle>
                    <circle cx="19" cy="19" r="19" transform="translate(940 459)" fill="#fff"
                            opacity="0.2"></circle>
                    <circle cx="9" cy="9" r="9" transform="translate(986 407)" fill="#fff" opacity="0.2"></circle>
                    <circle cx="11" cy="11" r="11" transform="translate(1044 475)" fill="#fff"
                            opacity="0.2"></circle>
                    <circle cx="5.5" cy="5.5" r="5.5" transform="translate(1087 430)" fill="#fff"
                            opacity="0.2"></circle>
                    <circle cx="22" cy="22" r="22" transform="translate(638 447)" fill="#fff"
                            opacity="0.2"></circle>
                    <circle cx="5.5" cy="5.5" r="5.5" transform="translate(1013 442)" fill="#fff"
                            opacity="0.2"></circle>
                </g>
            </svg>
		<?php endif; ?>

        <?php if ( !empty( $pb_label ) ) : ?>
            <span class="eplus-pb-label"><?php echo esc_html( $pb_label ); ?></span>
        <?php endif; ?>

	    <?php if ( !empty( $pb_value ) ) : ?>
            <span class="eplus-pb-percent"><?php echo esc_html( $pb_value . '%' ); ?></span>
	    <?php endif; ?>
    </div>
    <?php
    if ( ! empty( $bar_color ) || ! empty( $num_color ) || ! empty( $label_color ) || ! empty( $primary_color ) || ! empty( $secondary_color ) ) : ?>
        <style>
            #eplus-progress-bar<?php echo esc_attr( $unique_id ); ?> .eplus-progress-fill {
            <?php if ( !empty( $bar_color ) ) { ?> background-color: <?php echo esc_attr( $bar_color ); } ?>;
            }
            #eplus-progress-bar<?php echo esc_attr( $unique_id ); ?> .eplus-pb-label {
            <?php if ( !empty( $label_color ) ) { ?> color: <?php echo esc_attr( $label_color ); } ?>;
            }
            #eplus-progress-bar<?php echo esc_attr( $unique_id ); ?> .eplus-pb-percent {
            <?php if ( !empty( $num_color ) ) { ?> color: <?php echo esc_attr( $num_color ); } ?>;
            }
            <?php if( $style == '2' && !empty( $primary_color ) && !empty( $secondary_color ) ) : ?>
            #eplus-progress-bar<?php echo esc_attr( $unique_id ); ?> .eplus-progress-fill {
                background-color: <?php echo esc_attr( $primary_color ); ?>;
                background-image: radial-gradient(circle farthest-corner at 7.1% 15.6%, <?php echo esc_attr( $primary_color ); ?> 0%, <?php echo esc_attr( $secondary_color ); ?> 100.3%);
            }
            <?php endif; ?>
        </style>
    <?php endif; ?>
</div>
