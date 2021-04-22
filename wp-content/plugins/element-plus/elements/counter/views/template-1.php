<?php
/**
 * Element Name: Counter
 *
 * @package elements/counter/view/template-1
 * @copyright Pluginbazar 2019
 */

$unique_id = uniqid();
$style     = eplus()->get_shortcode_atts( 'style' );
$counters  = (array) vc_param_group_parse_atts( eplus()->get_shortcode_atts( 'counters' ) );

?>

<div class="eplus-counter-<?php echo esc_attr( $style ) ?>">

	<?php foreach ( $counters as $index => $counter ) :
		$title   = isset( $counter['title'] ) && ! empty( $counter['title'] ) ? $counter['title'] : esc_html__('Cups Of Coffee', 'element-plus' );
		$number   = isset( $counter['number'] ) && ! empty( $counter['number'] ) ? $counter['number'] : esc_html__('12,218', 'element-plus' );
		$counter_id = sprintf('%s%s', $unique_id, $index );
		$icon_type       = isset( $counter['icon_type'] ) ? $counter['icon_type'] : 'fontawesome';
		vc_icon_element_fonts_enqueue( $icon_type );
		$has_icon = !empty( $counter['icon_' . $icon_type] ) ? ' has-icon' : '' ;
		?>

        <div class="counter-col">
            <?php
            if ( ! empty( $icon_color = $counter['icon_color'] ) || ! empty( $counter['number_color'] ) || ! empty( $counter['title_color'] ) ) : ?>
                <style>
                    #counter-single<?php echo esc_attr( $counter_id ); ?> i {
                    <?php if ( !empty( $icon_color ) ) { ?> color: <?php echo esc_attr( $icon_color ); } ?>;
                    }
                    #counter-single<?php echo esc_attr( $counter_id ); ?> .counter-number {
                    <?php if ( !empty( $counter['number_color'] ) ) { ?> color: <?php echo esc_attr( $counter['number_color'] ); } ?>;
                    }
                    #counter-single<?php echo esc_attr( $counter_id ); ?> .counter-title {
                    <?php if ( !empty( $counter['title_color'] ) ) { ?> color: <?php echo esc_attr( $counter['title_color'] ); } ?>;
                    }
                    <?php if ( $style == '2' ) : ?>
                        .eplus-counter-2 #counter-single<?php echo esc_attr( $counter_id ); ?> {
                            <?php if ( !empty( $counter['primary'] ) ) { ?> background-color: <?php echo esc_attr( $counter['primary'] ); } ?>;
                        }
                    <?php endif; ?>
                </style>
            <?php endif;
            ?>

            <div id="counter-single<?php echo esc_attr( $counter_id ); ?>" class="counter-single<?php echo esc_attr( $has_icon ); ?>">

                <?php if( $style == '3' ) : ?>
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" height="100%" viewBox="0 0 800 696">
                        <defs>
                            <clipPath id="clip-path<?php echo esc_attr( $counter_id ); ?>">
                                <path d="M588.169,0a20,20,0,0,1,17.342,10.038l188.425,328a20,20,0,0,1,0,19.925l-188.425,328A20,20,0,0,1,588.169,696H211.491a20,20,0,0,1-17.342-10.038l-188.425-328a20,20,0,0,1,0-19.925l188.426-328A20,20,0,0,1,211.491,0Z" transform="translate(0 0)" fill="<?php echo esc_attr( !empty( $counter['primary'] ) ? $counter['primary'] : '#fff' ); ?>"></path>
                            </clipPath>
                        </defs>
                        <g transform="translate(-1132 1027)">
                            <path d="M588.427,0a20,20,0,0,1,17.34,10.034l188.506,328a20,20,0,0,1,0,19.931l-188.506,328A20,20,0,0,1,588.427,696H211.573a20,20,0,0,1-17.34-10.034l-188.506-328a20,20,0,0,1,0-19.931l188.506-328A20,20,0,0,1,211.573,0Z" transform="translate(1132 -1027)" fill="<?php echo esc_attr( !empty( $counter['primary'] ) ? $counter['primary'] : '#fff' ); ?>"></path>
                            <g transform="translate(1132 -1027)" opacity="0.2" clip-path="url(#clip-path<?php echo esc_attr( $counter_id ); ?>)">
                                <g transform="translate(165.855 186.587)">
                                    <circle cx="152.528" cy="152.528" r="152.528" transform="translate(355.404 355.404)" fill="<?php echo esc_attr( !empty( $counter['secondary'] ) ? $counter['secondary'] : '#715ff2' ); ?>" opacity="0.45"></circle>
                                    <circle cx="265.072" cy="265.072" r="265.072" transform="translate(242.86 242.86)" fill="<?php echo esc_attr( !empty( $counter['secondary'] ) ? $counter['secondary'] : '#715ff2' ); ?>" opacity="0.45"></circle>
                                    <circle cx="407.234" cy="407.234" r="407.234" transform="translate(100.698 100.698)" fill="<?php echo esc_attr( !empty( $counter['secondary'] ) ? $counter['secondary'] : '#715ff2' ); ?>" opacity="0.45"></circle>
                                    <circle cx="507.932" cy="507.932" r="507.932" fill="<?php echo esc_attr( !empty( $counter['secondary'] ) ? $counter['secondary'] : '#715ff2' ); ?>" opacity="0.45"></circle>
                                </g>
                            </g>
                        </g>
                    </svg>
                <?php endif; ?>


                <?php if( $style == '4' ) : ?>
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" height="100%" viewBox="0 0 1000 1000">
                        <defs>
                            <clipPath id="clip-path<?php echo esc_attr( $counter_id ); ?>">
                                <rect width="1000" height="1000" transform="translate(606 383)" fill="<?php echo esc_attr( !empty( $counter['primary'] ) ? $counter['primary'] : '#1e90ff'  ); ?>"></rect>
                            </clipPath>
                            <clipPath id="clip-path-2<?php echo esc_attr( $counter_id ); ?>">
                                <rect width="1000" height="1000" fill="<?php echo esc_attr( !empty( $counter['primary'] ) ? $counter['primary'] : '#1e90ff'  ); ?>"></rect>
                            </clipPath>
                        </defs>
                        <g transform="translate(-27 -173)">
                            <g transform="translate(-579 -210)" opacity="0.4" clip-path="url(#clip-path<?php echo esc_attr( $counter_id ); ?>)">
                                <circle cx="964.815" cy="964.815" r="964.815" transform="translate(606 383)" fill="<?php echo esc_attr( !empty( $counter['primary'] ) ? $counter['primary'] : '#1e90ff'  ); ?>"></circle>
                            </g>
                            <g transform="translate(27 173)" opacity="0.4" clip-path="url(#clip-path-2<?php echo esc_attr( $counter_id ); ?>)">
                                <circle cx="964.815" cy="964.815" r="964.815" transform="translate(-929.63 -929.63)" fill="<?php echo esc_attr( !empty( $counter['primary'] ) ? $counter['primary'] : '#1e90ff'  ); ?>"></circle>
                            </g>
                        </g>
                    </svg>
                <?php endif; ?>


                <?php if ( !empty( $icon_class = $counter['icon_' . $icon_type] ) ) : ?>
                <div class="counter-icon">
                    <?php if( $style == '5') : ?>
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="131.019" height="127.372" viewBox="0 0 131.019 127.372">
                            <defs>
                                <linearGradient id="linear-gradient<?php echo esc_attr( $counter_id ); ?>" x1="95.118" y1="135.446" x2="96.118" y2="135.446" gradientUnits="objectBoundingBox">
                                    <stop offset="0.001" stop-color="<?php echo esc_attr( !empty( $counter['primary'] ) ? $counter['primary'] : '#ffa8a5'  ); ?>"></stop>
                                    <stop offset="1" stop-color="<?php echo esc_attr( !empty( $counter['secondary'] ) ? $counter['secondary'] : '#f25678'  ); ?>"></stop>
                                </linearGradient>
                                <filter id="Path_6<?php echo esc_attr( $counter_id ); ?>" x="0" y="0" width="126.321" height="127.372" filterUnits="userSpaceOnUse">
                                    <feGaussianBlur stdDeviation="5" result="blur"></feGaussianBlur>
                                    <feFlood flood-opacity="0.141"></feFlood>
                                    <feComposite operator="in" in2="blur"></feComposite>
                                    <feComposite in="SourceGraphic"></feComposite>
                                </filter>
                                <linearGradient id="linear-gradient-2<?php echo esc_attr( $counter_id ); ?>" y1="-244.518" x2="1" y2="-244.518" gradientUnits="objectBoundingBox">
                                    <stop offset="0.001" stop-color="<?php echo esc_attr( !empty( $counter['primary'] ) ? $counter['primary'] : '#ffa8a5'  ); ?>"></stop>
                                    <stop offset="1" stop-color="<?php echo esc_attr( !empty( $counter['secondary'] ) ? $counter['secondary'] : '#e9235b'  ); ?>"></stop>
                                </linearGradient>
                                <linearGradient id="linear-gradient-3<?php echo esc_attr( $counter_id ); ?>" x1="3.251" y1="28.23" x2="4.178" y2="28.23" xlink:href="#linear-gradient<?php echo esc_attr( $counter_id ); ?>"></linearGradient>
                            </defs>
                            <g transform="translate(-1072 -363.628)">
                                <circle cx="3.329" cy="3.329" r="3.329" transform="translate(1098.335 407.516)" fill="url(#linear-gradient<?php echo esc_attr( $counter_id ); ?>)" style="mix-blend-mode: multiply;isolation: isolate"></circle>
                                <g transform="matrix(1, 0, 0, 1, 1072, 363.63)" filter="url(#Path_6<?php echo esc_attr( $counter_id ); ?>)">
                                    <path d="M448.506,116.952c-9.954-10.794-25.137-16.971-39.981-19.535-8.218-1.42-17-1.906-24.6,1.533-8.952,4.054-14.848,13.065-17.481,22.5-4.221,15.117-4.783,34.718,3.327,48.554a48.788,48.788,0,0,0,34.639,23.228c17.816,2.555,34.685-5.2,45.289-19.288,7.541-10.016,11.506-22.311,9.551-34.838A41.606,41.606,0,0,0,448.506,116.952Z" transform="translate(-348.43 -81.34)" fill="#fff"></path>
                                </g>
                                <path d="M377.09,160.928a28.716,28.716,0,0,0,3.206,11.89c4.417,8.228,13.223,13.285,22.2,15.954,18.357,5.455,38.973,1.931,54.863-8.568,16.81-11.108,23.269-33.244,15.227-51.979-6.03-14.049-20.074-21.671-33.538-27.049-13.969-5.577-27.5-5.953-39.738,4.419-10.856,9.2-16.562,23.068-20.011,36.837C377.8,148.425,376.7,154.81,377.09,160.928Z" transform="translate(726.99 282.694)" fill="url(#linear-gradient-2<?php echo esc_attr( $counter_id ); ?>)" style="mix-blend-mode: multiply;isolation: isolate"></path>
                                <path d="M404.87,120.574a13.721,13.721,0,0,0,4.783-8.282,15.631,15.631,0,0,0-3.7-12.988,14.227,14.227,0,0,0-16.4-3.752,20.681,20.681,0,0,0-11.064,12.929,9.091,9.091,0,0,0-.432,4.228c.624,3.418,4.207,4.032,7.14,4.376,2.442.287,2.835,1.669,4.555,3.155a11.8,11.8,0,0,0,14.4.865Q404.522,120.853,404.87,120.574Z" transform="translate(728.167 281.63)" fill="url(#linear-gradient-3<?php echo esc_attr( $counter_id ); ?>)" style="mix-blend-mode: multiply;isolation: isolate"></path>
                            </g>
                        </svg>
                    <?php endif; ?>
                    <i class="<?php echo esc_attr( $icon_class ); ?>"></i>
                </div>
                <?php endif; ?>

                <div class="counter-info">
                    <h3 id="counter-<?php echo esc_attr( $counter_id ); ?>" class="counter-number"><?php echo esc_html( $number ); ?></h3>
                    <h4 class="counter-title"><?php echo esc_html( $title ); ?></h4>
                </div>
            </div>

            <script>
                jQuery(document).ready(function ($) {
                    $('#counter-<?php echo esc_attr( $counter_id ); ?>').counterUp({
                        delay: 10,
                        time: 2000
                    });
                });
            </script>
        </div>
	<?php endforeach; ?>
</div>