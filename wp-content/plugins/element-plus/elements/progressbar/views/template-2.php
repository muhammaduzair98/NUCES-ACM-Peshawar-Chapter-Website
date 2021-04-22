<?php
/**
 * Element Name: Progressbar
 *
 * @package elements/progressbar/view/template-2
 * @copyright Pluginbazar 2019
 */

$unique_id      = uniqid();
$style          = eplus()->get_shortcode_atts( 'style' );
$pb_value       = abs( eplus()->get_shortcode_atts( 'pb_value' ) );
$start_label    = eplus()->get_shortcode_atts( 'start_label' );
$end_label      = eplus()->get_shortcode_atts( 'end_label' );
$pb_value       = $pb_value > 100 ? 0 : $pb_value;
$bar_color      = eplus()->get_shortcode_atts( 'bar_color' );
$label_color    = eplus()->get_shortcode_atts( 'label_color' );
$img_background = eplus()->get_shortcode_atts( 'img_background' );
$bar_img        = wp_get_attachment_image_url( eplus()->get_shortcode_atts( 'bar_img' ) );
?>

<div id="eplus-progress-bar<?php echo esc_attr( $unique_id ); ?>"
     class="eplus-progress-bar eplus-progress-bar-<?php echo esc_attr( $style ); ?>">

    <span class="eplus-pb-start-label"><?php echo esc_html( !empty( $start_label ) ? $start_label : '0' ); ?></span>

    <div class="eplus-progress-bar-inner">
        <div class="eplus-progress-fill" role="progressbar" aria-valuenow="<?php echo esc_attr( $pb_value ); ?>"
             aria-valuemin="0" aria-valuemax="100"
             style="width:<?php echo esc_attr( $pb_value . '%' ); ?>">

			<?php if ( ! empty( $bar_img ) ) : ?>
                <div class="eplus-pb-indicator">
                    <img src="<?php echo esc_url( $bar_img ); ?>" alt="<?php echo esc_attr( $pb_value . '%' ); ?>">
                </div>
			<?php endif; ?>

	        <?php if( !empty( $pb_value ) ) : ?>
            <div class="eplus-pb-percent">
                <svg xmlns="http://www.w3.org/2000/svg" width="69.999" height="41" viewBox="0 0 69.999 41">
                    <g transform="translate(-741 -474)">
                        <g transform="translate(2590 408)" fill="none">
                            <path d="M -1783 105.0000991821289 C -1781.8974609375 105.0000991821289 -1781.000366210938 104.1026763916016 -1781.000366210938 102.9996032714844 L -1781.000366210938 79.00019836425781 C -1781.000366210938 77.89712524414063 -1781.8974609375 76.99970245361328 -1783 76.99970245361328 L -1809 76.99970245361328 L -1810.1767578125 76.99970245361328 L -1810.748291015625 75.97105407714844 L -1814.00048828125 70.11769104003906 L -1817.252563476563 75.97104644775391 L -1817.824096679688 76.99970245361328 L -1819.000854492188 76.99970245361328 L -1845 76.99970245361328 C -1846.1025390625 76.99970245361328 -1846.999633789063 77.89712524414063 -1846.999633789063 79.00019836425781 L -1846.999633789063 102.9996032714844 C -1846.999633789063 104.1026763916016 -1846.1025390625 105.0000991821289 -1845 105.0000991821289 L -1783 105.0000991821289 M -1783 107.0000991821289 L -1845 107.0000991821289 C -1847.209594726563 107.0000991821289 -1848.999633789063 105.209098815918 -1848.999633789063 102.9996032714844 L -1848.999633789063 79.00019836425781 C -1848.999633789063 76.79070281982422 -1847.209594726563 74.99970245361328 -1845 74.99970245361328 L -1819.000854492188 74.99970245361328 L -1814.00048828125 65.99970245361328 L -1809 74.99970245361328 L -1783 74.99970245361328 C -1780.791381835938 74.99970245361328 -1779.000366210938 76.79070281982422 -1779.000366210938 79.00019836425781 L -1779.000366210938 102.9996032714844 C -1779.000366210938 105.209098815918 -1780.791381835938 107.0000991821289 -1783 107.0000991821289 Z"
                                  stroke="none"
                                  fill="<?php echo esc_attr( ! empty( $label_color ) ? $label_color : '#444' ); ?>">
                        </g>
                        <text transform="translate(760 504)"
                              fill="<?php echo esc_attr( ! empty( $label_color ) ? $label_color : '#444' ); ?>"
                              font-size="16"
                              font-family="Nunito-Regular, Nunito" font-weight="600">
                            <tspan x="0" y="0"><?php echo esc_html( $pb_value . '%' ); ?></tspan>
                        </text>
                    </g>
                </svg>
            </div>
            <?php endif; ?>

        </div>
    </div>

    <span class="eplus-pb-end-label"><?php echo esc_html( !empty( $end_label ) ? $end_label : '100' ); ?></span>

    <?php
        if ( ! empty( $label_color ) || ! empty( $img_background ) || ! empty( $bar_color ) ) : ?>
            <style>
                <?php if( !empty( $bar_color ) ) : ?>
                #eplus-progress-bar<?php echo esc_attr( $unique_id ); ?> .eplus-progress-fill {background-color: <?php echo esc_attr( $bar_color . ';' ); ?>}
                <?php endif; ?>
                <?php if( !empty( $img_background ) ) : ?>
                #eplus-progress-bar<?php echo esc_attr( $unique_id ); ?> .eplus-pb-indicator {background-color: <?php echo esc_attr( $img_background . ';' ); ?>}
                <?php endif; ?>
                <?php if( !empty( $label_color ) ) : ?>
                #eplus-progress-bar<?php echo esc_attr( $unique_id ); ?> .eplus-pb-start-label,
                #eplus-progress-bar<?php echo esc_attr( $unique_id ); ?> .eplus-pb-end-label {color: <?php echo esc_attr( $label_color . ';' ); ?>}
                <?php endif; ?>
            </style>
        <?php endif;
    ?>
</div>
