<?php
/**
 * Element Name: Info Box
 *
 * @package elements/info-box/view/template-1
 * @copyright Pluginbazar 2019
 */


$unique_id       = uniqid();
$unique_id_2     = uniqid();
$style           = eplus()->get_shortcode_atts( 'style' );
$icon_type       = eplus()->get_shortcode_atts( 'icon_type', 'fontawesome' );
$icon_class      = eplus()->get_shortcode_atts( 'icon_' . $icon_type, 'fa fa-heart' );
$title           = eplus()->get_shortcode_atts( 'title', esc_html__( 'Info Box Title', 'element-plus' ) );
$short_desc      = eplus()->get_shortcode_atts( 'short_desc' );
$info_count      = eplus()->get_shortcode_atts( 'info_count' );
$link            = vc_build_link( eplus()->get_shortcode_atts( 'url' ) );
$color           = eplus()->get_shortcode_atts( 'color' );
$primary_color   = eplus()->get_shortcode_atts( 'primary_color' );
$secondary_color = eplus()->get_shortcode_atts( 'secondary_color' );
$has_link_class  = ! empty( $link['url'] ) ? 'has-info-box-link' : '';
$featured_class  = ! empty( eplus()->get_shortcode_atts( 'featured' ) ) ? 'eplus-featured' : '';

vc_icon_element_fonts_enqueue( $icon_type );

if ( ! empty( $color ) || ! empty( $primary_color ) || ! empty( $secondary_color ) ) : ?>
    <style>
        <?php if ( $style == '1' ) : ?>
        #eplus-info-box<?php echo esc_attr( $unique_id ); ?> .icon-wrap > i {
        <?php if ( !empty( $color ) ) { ?> color: <?php echo esc_attr( $color ); } ?>;
        <?php if ( !empty( $primary_color ) ) { ?> background-color: <?php echo esc_attr( $primary_color ); } ?>;
        }

        #eplus-info-box<?php echo esc_attr( $unique_id ); ?> .eplus-info-btn:hover {
        <?php if ( !empty( $primary_color ) ) { ?> background-color: <?php echo esc_attr( $primary_color ); }?>;
        <?php if ( !empty( $color ) ) { ?> color: <?php echo esc_attr( $color ); }?>;
        }

        <?php endif; ?>

        <?php if ( $style == '2' ) : ?>
        #eplus-info-box<?php echo esc_attr( $unique_id ); ?> .icon-wrap > i {
        <?php if ( !empty( $color ) ) { ?> color: <?php echo esc_attr( $color ); } ?>;
        <?php if ( !empty( $primary_color ) ) { ?> background-color: <?php echo esc_attr( $primary_color ); } ?>;
        <?php if ( !empty( $primary_color ) ) { ?> box-shadow: 0 0 0 1px<?php echo esc_attr( $primary_color ); }?>;
        }

        #eplus-info-box<?php echo esc_attr( $unique_id ); ?> .eplus-info-btn {
        <?php if ( !empty( $primary_color ) ) { ?> background-color: <?php echo esc_attr( $primary_color ); }?>;
        <?php if ( !empty( $color ) ) { ?> color: <?php echo esc_attr( $color ); }?>;
        }

        #eplus-info-box<?php echo esc_attr( $unique_id ); ?> .eplus-info-btn > svg path {
        <?php if ( !empty( $color ) ) { ?> fill: <?php echo esc_attr( $color ); }?>;
        }

        <?php endif; ?>

        <?php if ( $style == '3' ) : ?>
        #eplus-info-box<?php echo esc_attr( $unique_id ); ?> .icon-wrap > i {
        <?php if ( !empty( $color ) ) { ?> color: <?php echo esc_attr( $color ); } ?>;
        }

        #eplus-info-box<?php echo esc_attr( $unique_id ); ?> .eplus-info-btn > svg path {
        <?php if ( !empty( $color ) ) { ?> fill: <?php echo esc_attr( $color ); }?>;
        }

        <?php endif; ?>

        <?php if ( $style == '4' ) : ?>
        #eplus-info-box<?php echo esc_attr( $unique_id ).':hover'; ?> {
        <?php if ( !empty( $primary_color ) ) { ?> background-color: <?php echo esc_attr( $primary_color ); } ?>;
        }

        #eplus-info-box<?php echo esc_attr( $unique_id ); ?> .eplus-info-btn:hover > svg path {
        <?php if ( !empty( $primary_color ) ) { ?> fill: <?php echo esc_attr( $primary_color ); }?>;
        }

        <?php endif; ?>

        <?php if ( $style == '5' ) : ?>
        #eplus-info-box<?php echo esc_attr( $unique_id ); ?> {
        <?php if ( !empty( $primary_color ) ) { ?> background-color: <?php echo esc_attr( $primary_color ); } ?>;
        }

        <?php endif; ?>

        <?php if ( $style == '7' ) : ?>
        #eplus-info-box<?php echo esc_attr( $unique_id ); ?> .icon-wrap > i {
        <?php if ( !empty( $primary_color ) ) { ?> color: <?php echo esc_attr( $primary_color ); } ?>;
        }

        #eplus-info-box<?php echo esc_attr( $unique_id ); ?> .eplus-info-btn:hover {
        <?php if ( !empty( $primary_color ) ) { ?> background-color: <?php echo esc_attr( $primary_color ); } ?>;
        }

        <?php endif; ?>

        <?php if ( $style == '8' ) : ?>
        #eplus-info-box<?php echo esc_attr( $unique_id ); ?> .eplus-info-btn {
        <?php if ( !empty( $primary_color ) ) { ?> background-color: <?php echo esc_attr( $primary_color ); }?>;
        <?php if ( !empty( $color ) ) { ?> color: <?php echo esc_attr( $color ); }?>;
        }

        <?php endif; ?>

        <?php if ( $style == '9' ) : ?>
        #eplus-info-box<?php echo esc_attr( $unique_id ); ?> .icon-wrap > i {
        <?php if ( !empty( $primary_color ) || !empty( $secondary_color ) ) { ?> background-image: linear-gradient(130deg, <?php echo esc_attr( $primary_color ); ?> 27.9%, <?php echo esc_attr( $secondary_color ); ?> 84.2%)<?php } ?>
        }

        #eplus-info-box<?php echo esc_attr( $unique_id ); ?> .eplus-info-btn {
        <?php if ( !empty( $primary_color ) ) { ?> background-color: <?php echo esc_attr( $primary_color ); } ?>;
        }

        #eplus-info-box<?php echo esc_attr( $unique_id ); ?>.eplus-info-box-9 .icon-wrap:before {
        <?php if ( !empty( $primary_color ) ) { ?> background-color: <?php echo esc_attr( $primary_color ); } ?>;
        }
        <?php endif; ?>

        <?php if ( $style == '10' ) : ?>
        #eplus-info-box<?php echo esc_attr( $unique_id ); ?> .icon-wrap:before {
        <?php if ( !empty( $primary_color ) ) { ?> background-color: <?php echo esc_attr( $primary_color ); } ?>;
        }
        #eplus-info-box<?php echo esc_attr( $unique_id ); ?> .icon-wrap i {
        <?php if ( !empty( $primary_color ) ) { ?> color: <?php echo esc_attr( $primary_color ); } ?>;
        }

        <?php endif; ?>
    </style>
<?php endif; ?>


<div id="eplus-info-box<?php echo esc_attr( $unique_id ); ?>"
     class="eplus-info-box eplus-info-box-<?php echo esc_attr( $style . ' ' . $has_link_class . ' ' . $featured_class ) ?>">

	<?php if ( ! empty( $style == '6' ) && ! empty( $info_count ) ) : ?>
        <div class="info-count"><?php echo esc_html( $info_count ); ?></div>
	<?php endif; ?>

    <div class="icon-wrap">
		<?php if ( $style == '8' ) : ?>
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="74" height="100"
                 viewBox="0 0 74 100">
                <defs>
                    <linearGradient id="linear-gradient<?php echo esc_attr( $unique_id ); ?>" x1="0.5" x2="0.5" y2="1"
                                    gradientUnits="objectBoundingBox">
                        <stop offset="0"
                              stop-color="<?php echo esc_attr( ! empty( $primary_color ) ? $primary_color : '#43d5e1' ); ?>"></stop>
                        <stop offset="1"
                              stop-color="<?php echo esc_attr( ! empty( $secondary_color ) ? $secondary_color : '#3ceeb0' ); ?>"></stop>
                    </linearGradient>
                </defs>
                <path d="M37,0A37.076,37.076,0,0,1,74,37.151C74.07,71.977,37,100,37,100S.324,75.282,0,37.151A37.076,37.076,0,0,1,37,0Z"
                      fill="url(#linear-gradient<?php echo esc_attr( $unique_id ); ?>)"></path>
            </svg>
		<?php endif; ?>

        <i class="<?php echo esc_attr( $icon_class ); ?>" <?php ?>></i>
    </div>

    <div class="eplus-info-desc">

        <h3 class="eplus-info-title"><?php echo esc_html( $title ); ?></h3>

		<?php if ( ! empty( $short_desc ) ) : ?>
            <p><?php echo esc_html( $short_desc ); ?></p>
		<?php endif; ?>

		<?php if ( ! empty( $link['url'] ) ) : ?>
            <a href="<?php echo esc_url( $link['url'] ); ?>"
               class="eplus-info-btn" title="<?php echo esc_attr( $link['title'] ); ?>">
				<?php if ( $style == '1' || $style == '7' ) {
					echo esc_html( $link['title'] );
				} else { ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="14" viewBox="0 0 20 14">
                        <path d="M13.468,4.885a.708.708,0,1,0-1.008.993l5.111,5.088H.706a.7.7,0,0,0-.706.7.708.708,0,0,0,.706.713H17.571L12.46,17.46a.718.718,0,0,0,0,1,.708.708,0,0,0,1.008,0l6.321-6.292a.689.689,0,0,0,0-.993Z"
                              transform="translate(0 -4.674)" fill="#fff"></path>
                    </svg>
				<?php } ?>
            </a>
		<?php endif; ?>
    </div>

    <?php if ( $style == '10' ) : ?>
    <div class="curve-shape">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="228.968" height="360"
             viewBox="0 0 228.968 360">
            <defs>
                <linearGradient id="<?php echo esc_attr( $unique_id_2 ); ?>" x1="0.5" x2="0.5" y2="1" gradientUnits="objectBoundingBox">
                    <stop offset="0" stop-color="<?php echo esc_attr( !empty( $primary_color ) ? $primary_color : '#ee9ca7' ); ?>"></stop>
                    <stop offset="1" stop-color="<?php echo esc_attr( !empty( $secondary_color ) ? $secondary_color : '#ffdde1' ); ?>"></stop>
                </linearGradient>
            </defs>
            <path d="M8,0H192a8,8,0,0,1,8,7.992V351.635a8,8,0,0,1-8,7.992H8a8,8,0,0,1-8-7.992s-65.179-81.049,0-182.629S-2,50.243,0,7.991C2.3-2.994,3.582,0,8,0Z"
                  transform="translate(28.968 0.373)" opacity="0.1" fill="url(#<?php echo esc_attr( $unique_id_2 ); ?>)"></path>
        </svg>
    </div>
    <?php endif; ?>
</div>