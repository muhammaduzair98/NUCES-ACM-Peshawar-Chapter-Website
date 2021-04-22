<?php
/**
 * Element Name: Social Profile
 *
 * @package elements/social-profile/view/template-3
 * @copyright Pluginbazar 2019
 */

$unique_id    = uniqid();
$style        = eplus()->get_shortcode_atts( 'style' );
$social_items = (array) vc_param_group_parse_atts( eplus()->get_shortcode_atts( 'social_items' ) );
$primary      = eplus()->get_shortcode_atts( 'primary' );
$secondary    = eplus()->get_shortcode_atts( 'secondary' );

?>

<div class="eplus-social-profile-<?php echo esc_attr( $style ) ?>"
     id="eplus-social-profile-<?php echo esc_attr( $unique_id ) ?>">

	<?php foreach ( $social_items as $index => $social_item ) :
		$icon_type = isset( $social_item['icon_type'] ) ? $social_item['icon_type'] : 'fontawesome';
		vc_icon_element_fonts_enqueue( $icon_type );
		$item_id    = sprintf( '%s%s', $unique_id, $index );
		$color      = ! empty( $social_item['color'] ) ? $social_item['color'] : '';
		$icon_class = ! empty( $social_item[ 'icon_' . $icon_type ] ) ? $social_item[ 'icon_' . $icon_type ] : 'fa fa-facebook';
		$link       = isset( $social_item['url'] ) ? vc_build_link( $social_item['url'] ) : array();
		$url        = isset( $link['url'] ) ? $link['url'] : '';

		if ( empty( $url ) && empty( $icon_class ) ) {
			continue;
		}
		?>

        <a href="<?php echo esc_url( $url ); ?>" id="social-link<?php echo esc_attr( $item_id ); ?>">

            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%"
                 height="100%" viewBox="0 0 54.401 59.921">
                <defs>
                    <filter id="sfbg-path<?php echo esc_attr( $item_id ); ?>" x="0" y="0" width="54.401" height="59.921"
                            filterUnits="userSpaceOnUse">
                        <feOffset dx="0.852" dy="1.704"></feOffset>
                        <feGaussianBlur stdDeviation="1.704" result="blur"></feGaussianBlur>
                        <feFlood flood-color="<?php echo esc_attr( !empty( $primary ) ? $primary : '#3f6faa' ); ?>" flood-opacity="0.251"></feFlood>
                        <feComposite operator="in" in2="blur"></feComposite>
                        <feComposite in="SourceGraphic"></feComposite>
                    </filter>
                    <linearGradient id="sfbg-gradient<?php echo esc_attr( $item_id ); ?>" x1="0.18" y1="-3.379"
                                    x2="1.125" y2="-3.379" gradientUnits="objectBoundingBox">
                        <stop offset="0" stop-color="<?php echo esc_attr( !empty( $secondary ) ? $secondary : '#50d5ff' ); ?>"></stop>
                        <stop offset="1" stop-color="#3b5998"></stop>
                    </linearGradient>
                    <linearGradient id="sfbg-gradient-2<?php echo esc_attr( $item_id ); ?>" x1="-0.011" y1="-10.055"
                                    x2="1.002" y2="-10.055" gradientUnits="objectBoundingBox">
                        <stop offset="0" stop-color="#3f6ca8"></stop>
                        <stop offset="1" stop-color="<?php echo esc_attr( !empty( $secondary ) ? $secondary : '#50d5ff' ); ?>"></stop>
                    </linearGradient>
                    <linearGradient id="sfbg-gradient-3<?php echo esc_attr( $item_id ); ?>" x1="-3.045" y1="-43.829"
                                    x2="-2.045" y2="-43.829" gradientUnits="objectBoundingBox">
                        <stop offset="0" stop-color="#3b5998"></stop>
                        <stop offset="1" stop-color="<?php echo esc_attr( !empty( $secondary ) ? $secondary : '#50d5ff' ); ?>"></stop>
                    </linearGradient>
                </defs>
                <g transform="translate(-439.74 -325.896)">
                    <g transform="translate(444 329)">
                        <g transform="matrix(1, 0, 0, 1, -4.26, -3.1)"
                           filter="url(#sfbg-path<?php echo esc_attr( $item_id ); ?>)">
                            <path d="M184.908,259.2a13.214,13.214,0,0,1-1.73-1.149c-2.365-1.85-4.212-4.327-6.318-6.5-3.6-3.714-7.987-5.651-12.91-3.757-1.553.6-3.353,1.071-4.8.218-1.527-.9-2.062-2.951-2.166-4.8s.06-3.783-.643-5.479c-.674-1.625-2.1-2.895-2.393-4.641-.655-3.891,3.629-5.581,6.506-5.337,2.032.172,4.1.752,6.078.244,3.248-.833,5.219-4.262,6.593-7.488s2.7-6.794,5.566-8.615c3.731-2.371,8.8-.709,11.858,2.571,3.427,3.675,5.738,9.6,6.68,14.616a59.786,59.786,0,0,1,.79,12.657c-.106,3.957.056,8.346-1.133,12.13-.882,2.8-2.785,5.416-5.451,6.286A8.261,8.261,0,0,1,184.908,259.2Z"
                                  transform="translate(-149.63 -207.37)" fill="#fff"></path>
                        </g>
                        <path d="M188.761,259.415c-6.461.293-13.106-2.657-18.518-6.688-3-2.232-5.877-4.957-7.163-8.587-1.516-4.281-.536-9.192,1.591-13.171,3.406-6.377,9.35-13.031,16.188-14.934a20.5,20.5,0,0,1,18.011,3.714c6.333,5.011,9.152,13.115,8.05,21.248a21.912,21.912,0,0,1-7.906,14.639A17.761,17.761,0,0,1,188.761,259.415Z"
                              transform="translate(-157.153 -212.228)"
                              fill="url(#sfbg-gradient<?php echo esc_attr( $item_id ); ?>)"
                              style="mix-blend-mode: multiply;isolation: isolate"></path>
                        <path d="M168.741,213.358a11.011,11.011,0,0,1,3.94,5.695,6.55,6.55,0,0,1,.331,3.818,5.337,5.337,0,0,1-3.072,3.209c-2.237,1-5.253,1.541-7.577.615a7.587,7.587,0,0,1-4.388-4.787,7.44,7.44,0,0,1,1.934-7.411,7.226,7.226,0,0,1,5.161-2.276A6.51,6.51,0,0,1,168.741,213.358Z"
                              transform="translate(-155.346 -211.029)"
                              fill="url(#sfbg-gradient-2<?php echo esc_attr( $item_id ); ?>)"
                              style="mix-blend-mode: multiply;isolation: isolate"></path>
                        <circle cx="1.532" cy="1.532" r="1.532" transform="translate(17.927)"
                                fill="url(#sfbg-gradient-3<?php echo esc_attr( $item_id ); ?>)"
                                style="mix-blend-mode: multiply;isolation: isolate"></circle>
                    </g>
                </g>
            </svg>

            <i class="<?php echo esc_attr( $icon_class ); ?>"></i>
        </a>

	<?php endforeach; ?>

</div>