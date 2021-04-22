<?php
/**
 * Element Name: Social Profile
 *
 * @package elements/social-profile/view/template-1
 * @copyright Pluginbazar 2019
 */

$unique_id    = uniqid();
$style        = eplus()->get_shortcode_atts( 'style' );
$social_items = (array) vc_param_group_parse_atts( eplus()->get_shortcode_atts( 'social_items' ) );
$primary      = eplus()->get_shortcode_atts( 'primary' );
$secondary    = eplus()->get_shortcode_atts( 'secondary' );

if ( ! empty( $primary ) || !empty( $secondary ) && $style == '1' || $style == '5' ) : ?>
    <style>
        #eplus-social-profile-<?php echo esc_attr( $unique_id ) ?> > a {
            background-color: <?php echo esc_attr( $primary ); ?>
        }
        #eplus-social-profile-<?php echo esc_attr( $unique_id ) ?> .eplus-sp-label,
        #eplus-social-profile-<?php echo esc_attr( $unique_id ) ?> a i {
            color: <?php echo esc_attr( $secondary ); ?>
        }
    </style>
<?php endif; ?>

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
		$label      = isset( $link['title'] ) ? $link['title'] : '';
		if ( empty( $url ) && empty( $icon_class ) ) {
			continue;
		}
		?>

        <a href="<?php echo esc_url( $url ); ?>" id="social-link<?php echo esc_attr( $item_id ); ?>">
			<?php if ( ! empty( $color ) ) : ?>
                <style>
                    #social-link<?php echo esc_attr( $item_id ); ?> i {
                        background-color: <?php echo esc_attr( $color ); ?>;
                    }
                </style>
			<?php endif; ?>
            <i class="<?php echo esc_attr( $icon_class ); ?>"></i>

			<?php if ( $style == '5' && !empty( $label ) ) : ?>
                <span class="eplus-sp-label"><?php echo esc_html( $label ); ?></span>
			<?php endif; ?>
        </a>

	<?php endforeach; ?>
</div>