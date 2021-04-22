<?php
/**
 * Element Name: Team
 *
 * @package elements/info-box/view/template-3
 * @copyright Pluginbazar 2019
 */


$unique_id       = uniqid();
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
        </div>
	<?php endif; ?>

    <div class="eplus-team-info">
        <div class="eplus-shape">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%"
                 height="100%" viewBox="0 0 270 91.859">
                <defs>
                    <linearGradient id="linear-gradient<?php echo esc_attr( $unique_id ); ?>" y1="0.582" x2="0.993"
                                    y2="0.572" gradientUnits="objectBoundingBox">
                        <stop offset="0"
                              stop-color="<?php echo esc_attr( ! empty( $primary_color ) ? $primary_color : '#E91E63' ); ?>"></stop>
                        <stop offset="1"
                              stop-color="<?php echo esc_attr( ! empty( $secondary_color ) ? $secondary_color : '#5828bb' ); ?>"></stop>
                    </linearGradient>
                </defs>
                <path d="M0,0S63.8-26.683,139.407,0,270,0,270,0V72a8,8,0,0,1-8,8H8a8,8,0,0,1-8-8Z"
                      transform="translate(0 11.859)"
                      fill="url(#linear-gradient<?php echo esc_attr( $unique_id ); ?>)"></path>
            </svg>

        </div>
        <div class="eplus-team-title-wrap">
            <h3 class="eplus-team-title"><?php echo esc_html( $name ); ?></h3>
            <span class="eplus-team-designation"><?php echo esc_html( $designation ); ?></span>
        </div>

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