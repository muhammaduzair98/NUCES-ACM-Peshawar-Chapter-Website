<?php
/**
 * Element Name: Team
 *
 * @package elements/info-box/view/template-4
 * @copyright Pluginbazar 2019
 */


$unique_id       = uniqid();
$unique_id_2     = uniqid();
$style           = eplus()->get_shortcode_atts( 'style' );
$name            = eplus()->get_shortcode_atts( 'name' ) ? eplus()->get_shortcode_atts( 'name' ) : esc_html__( 'James Smith', 'element-plus' );
$designation     = eplus()->get_shortcode_atts( 'designation' ) ? eplus()->get_shortcode_atts( 'designation' ) : esc_html__( 'Developer', 'element-plus' );
$team_img        = wp_get_attachment_url( eplus()->get_shortcode_atts( 'img' ) );
$s_profiles      = (array) vc_param_group_parse_atts( eplus()->get_shortcode_atts( 's_profiles' ) );
$primary_color   = eplus()->get_shortcode_atts( 'primary_color' );
$secondary_color = eplus()->get_shortcode_atts( 'secondary_color' );

vc_icon_element_fonts_enqueue( 'fontawesome' );


?>


<div id="eplus-team<?php echo esc_attr( $unique_id ); ?>"
     class="eplus-team eplus-team-<?php echo esc_attr( $style ); ?>">

	<?php if ( ! empty( $team_img ) ) : ?>
        <div class="eplus-team-img">
            <img src="<?php echo esc_url( $team_img ); ?>" alt="<?php echo esc_attr( $name ); ?>">
            <div class="eplus-team-title-wrap">
                <div class="eplus-shape">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="184"
                         height="89" viewBox="0 0 184 89">
                        <defs>
                            <linearGradient id="linear-gradient<?php echo esc_attr( $unique_id ); ?>" x1="0.5" x2="0.5"
                                            y2="1"
                                            gradientUnits="objectBoundingBox">
                                <stop offset="0"
                                      stop-color="<?php echo esc_attr( ! empty( $primary_color ) ? $primary_color : '#E91E63' ); ?>"></stop>
                                <stop offset="1"
                                      stop-color="<?php echo esc_attr( ! empty( $secondary_color ) ? $secondary_color : '#5828bb' ); ?>"></stop>
                            </linearGradient>
                            <linearGradient id="linear-gradient<?php echo esc_attr( $unique_id_2 ); ?>" x1="0.5"
                                            x2="0.5" y2="1"
                                            gradientUnits="objectBoundingBox">
                                <stop offset="0"
                                      stop-color="<?php echo esc_attr( ! empty( $secondary_color ) ? $secondary_color : '#5828bb' ); ?>"></stop>
                                <stop offset="1"
                                      stop-color="<?php echo esc_attr( ! empty( $primary_color ) ? $primary_color : '#E91E63' ); ?>"></stop>
                            </linearGradient>
                        </defs>
                        <g transform="translate(-711 -860)">
                            <path d="M131.091-5.321C81.815-26.421,32.026-14.712.085,2.487s-46.036,39.888,3.24,60.987,76.42.111,108.361-17.088S180.367,15.778,131.091-5.321Z"
                                  transform="translate(739.886 876.661)" opacity="0.9"
                                  fill="url(#linear-gradient<?php echo esc_attr( $unique_id ); ?>)"></path>
                            <path d="M-4.863-5.321c49.276-21.1,99.064-9.391,131.006,7.808s46.036,39.888-3.24,60.987-76.42.111-108.361-17.088S-54.139,15.778-4.863-5.321Z"
                                  transform="translate(739.886 876.661)" opacity="0.8"
                                  fill="url(#linear-gradient<?php echo esc_attr( $unique_id_2 ); ?>)"></path>
                        </g>
                    </svg>
                </div>
                <h3 class="eplus-team-title"><?php echo esc_html( $name ); ?></h3>
                <span class="eplus-team-designation"><?php echo esc_html( $designation ); ?></span>
            </div>
        </div>
	<?php endif; ?>

	<?php if ( ! empty( $s_profiles ) && $s_profiles ) : ?>
        <ul class="eplus-team-social">
			<?php foreach ( $s_profiles as $profile ) :
				$s_icon = isset( $profile['s_icon'] ) ? $profile['s_icon'] : '';
				$link = isset( $profile['link'] ) ? vc_build_link( $profile['link'] ) : array();
				$url = isset( $link['url'] ) ? $link['url'] : esc_url( '#' );
				?>

                <li><a href="<?php echo esc_url( $url ); ?>"><i class="<?php echo esc_attr( $s_icon ); ?>"></i></a>
                </li>
			<?php endforeach; ?>
        </ul>
	<?php endif; ?>
</div>