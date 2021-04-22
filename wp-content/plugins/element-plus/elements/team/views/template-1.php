<?php
/**
 * Element Name: Team
 *
 * @package elements/info-box/view/template-1
 * @copyright Pluginbazar 2019
 */


$unique_id   = uniqid();
$style       = eplus()->get_shortcode_atts( 'style' );
$name        = eplus()->get_shortcode_atts( 'name' ) ? eplus()->get_shortcode_atts( 'name' ) : esc_html__( 'James Smith', 'element-plus' );
$designation = eplus()->get_shortcode_atts( 'designation' ) ? eplus()->get_shortcode_atts( 'designation' ) : esc_html__( 'Developer', 'element-plus' );
$s_profiles  = (array) vc_param_group_parse_atts( eplus()->get_shortcode_atts( 's_profiles' ) );
$team_img   = wp_get_attachment_url( eplus()->get_shortcode_atts( 'img' ) );

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