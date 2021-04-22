<?php
/**
 * Element Name: Team
 *
 * @package elements/info-box/view/template-5
 * @copyright Pluginbazar 2019
 */


$unique_pattern  = uniqid( 'unique-pattern' );
$unique_id       = uniqid( 'linear-gradient' );
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

            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%"
                 height="100%" viewBox="0 0 270 245">
                <defs>
                    <linearGradient id="<?php echo esc_attr( $unique_id ); ?>" x1="0.5" x2="0.5" y2="1"
                                    gradientUnits="objectBoundingBox">
                        <stop offset="0"
                              stop-color="<?php echo esc_attr( ! empty( $primary_color ) ? $primary_color : '#E91E63' ); ?>"></stop>
                        <stop offset="1"
                              stop-color="<?php echo esc_attr( ! empty( $secondary_color ) ? $secondary_color : '#5828bb' ); ?>"></stop>
                    </linearGradient>
                    <pattern id="<?php echo esc_attr( $unique_pattern ); ?>" width="1" height="1"
                             patternTransform="matrix(-1, 0, 0, 1, 493, 0)" viewBox="0 0 253.289 245">
                        <image preserveAspectRatio="xMidYMid slice" width="253.289" height="253.289"
                               xlink:href="<?php echo esc_url( $team_img ); ?>"></image>
                    </pattern>
                </defs>
                <g transform="translate(-675 -437)">
                    <path d="M119.94,0c60.326,0,150.816,154.737,120.653,206.316s-211.143,51.579-241.306,0S59.614,0,119.94,0Z"
                          transform="translate(698.415 437)" fill="#deceff"></path>
                    <path d="M119.94,0c60.326,0,150.816,154.737,120.653,206.316s-211.143,51.579-241.306,0S59.614,0,119.94,0Z"
                          transform="translate(698.415 437)" opacity="0.5"
                          fill="url(#<?php echo esc_attr( $unique_id ); ?>)"></path>
                    <path d="M119.94,0c60.326,0,150.816,154.737,120.653,206.316s-211.143,51.579-241.306,0S59.614,0,119.94,0Z"
                          transform="translate(688.74 437)" opacity="0.5"
                          fill="url(#<?php echo esc_attr( $unique_id ); ?>)"></path>
                    <g>
                        <path d="M119.941,0C59.614,0-30.876,154.737-.712,206.316s211.143,51.579,241.306,0S180.267,0,119.941,0Z"
                              transform="translate(681.704 437)"
                              fill="url(#<?php echo esc_attr( $unique_pattern ); ?>)"></path>
                    </g>
                </g>
            </svg>
        </div>
	<?php endif; ?>

    <div class="eplus-team-info">
        <h3 class="eplus-team-title"><?php echo esc_html( $name ); ?></h3>
        <span class="eplus-team-designation"><?php echo esc_html( $designation ); ?></span>
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
</div>