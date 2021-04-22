<?php
/**
 * Element Name: Products Carousel
 *
 * @package elements/products-carousel/view/template-1
 * @copyright Pluginbazar 2019
 */

$unique_id       = uniqid();
$style           = eplus()->get_shortcode_atts( 'style' );
$content_type    = eplus()->get_shortcode_atts( 'content_type', 'by_products' );
$primary_color   = eplus()->get_shortcode_atts( 'primary_color' );
$secondary_color = eplus()->get_shortcode_atts( 'secondary_color' );


$arrows                 = eplus()->get_shortcode_atts( 'arrows' );
$dots                   = eplus()->get_shortcode_atts( 'dots' );
$autoplay               = eplus()->get_shortcode_atts( 'autoplay' );
$autoplay_speed         = eplus()->get_shortcode_atts( 'autoplay_speed' );
$animation_speed        = eplus()->get_shortcode_atts( 'animation_speed' );
$pause_on_hover         = eplus()->get_shortcode_atts( 'pause_on_hover' );
$gutter                 = eplus()->get_shortcode_atts( 'gutter' );
$display_columns        = eplus()->get_shortcode_atts( 'display_columns' );
$tablet_display_columns = eplus()->get_shortcode_atts( 'tablet_display_columns' );
$mobile_display_columns = eplus()->get_shortcode_atts( 'mobile_display_columns' );

$product_ids = array();

if ( $content_type == 'by_products_category' ) {

	foreach ( explode( ',', eplus()->get_shortcode_atts( 'category_ids' ) ) as $category_id ) {
		$query_string = sprintf( 'fields=ids&posts_per_page=-1&category=%s', $category_id );
		$product_ids  = array_merge( $product_ids, get_posts( $query_string ) );
	}
} elseif ( $content_type == 'by_products_tags' ) {
	$product_ids = get_posts( array(
		'post_type'      => 'product',
		'posts_per_page' => - 1,
		'fields'         => 'ids',
		'tax_query'      => array(
			array(
				'taxonomy' => 'product_tag',
				'field'    => 'term_id',
				'terms'    => explode( ',', eplus()->get_shortcode_atts( 'tag_ids' ) ),
			),
		)
	) );
} elseif ( $content_type == 'by_latest_products' ) {
	$product_ids = get_posts( array(
		'posts_per_page' => - 1,
		'offset'         => 0,
		'orderby'        => 'post_date',
		'fields'         => 'ids',
		'order'          => 'DESC',
		'post_type'      => 'product',
		'post_status'    => 'publish'
	) );

} elseif ( $content_type == 'by_custom' ) {
	$product_ids = explode( ',', eplus()->get_shortcode_atts( 'custom_product_ids' ) );
} else {
	$product_ids = explode( ',', eplus()->get_shortcode_atts( 'product_ids' ) );
}

$product_ids = array_unique( $product_ids );
$length      = eplus()->get_shortcode_atts( 'posts_per_page', count( $product_ids ) );
$product_ids = array_slice( $product_ids, 0, $length );


if ( ! empty( $primary_color ) || ! empty( $secondary_color ) ) : ?>
    <style>
        <?php if( $style == '2' ) : ?>
        #eplus-products-carousel-<?php echo esc_attr( $unique_id ); ?> .product-button > a {
            background-color: <?php echo esc_attr( $primary_color ); ?>;
            background-image: radial-gradient(circle farthest-corner at 3.1% 6.8%, <?php echo esc_attr( $primary_color ); ?> 0%, <?php echo esc_attr( $secondary_color ); ?> 130%);
        }

        <?php endif; ?>

        <?php if( $style == '1' || $style == '3' ) : ?>
        #eplus-products-carousel-<?php echo esc_attr( $unique_id ); ?> .product-button > a {
            background-color: <?php echo esc_attr( $primary_color ); ?>;
        }

        <?php endif; ?>

    </style>
<?php endif; ?>

<div class="eplus-products-carousel-<?php echo esc_attr( $style ); ?>">

    <div id="eplus-products-carousel-<?php echo esc_attr( $unique_id ); ?>" class="owl-carousel">
		<?php foreach ( $product_ids as $index => $product_id ) :

			global $product;

			$product = wc_get_product( $product_id );

			$product_image = $product->get_image( 'full' );

			?>

            <div class="eplus-product-item">

				<?php if ( ! empty( $product_image ) ) : ?>
                    <div class="product-image">
                        <a href="<?php echo esc_url( $product->get_permalink() ); ?>">
							<?php echo wp_kses_post( $product_image ); ?>
                        </a>
                    </div>
				<?php endif; ?>

                <div class="product-body">
                    <h3 class="product-title">
                        <a href="<?php echo esc_url( $product->get_permalink() ); ?>"><?php echo esc_html( $product->get_title() ); ?></a>
                    </h3>
                    <p class="short-desc">
						<?php echo esc_html( $product->get_short_description() ); ?>
                    </p>
                    <div class="price-wrap">
						<?php echo wp_kses_post( $product->get_price_html() ); ?>
                    </div>
                    <div class="product-button">
                        <a href="<?php echo esc_url( $product->add_to_cart_url() ); ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24">
                                <g transform="translate(-1.076)">
                                    <path d="M24.917,8.559a.912.912,0,0,0-.747-.388H21.906a2.66,2.66,0,0,0-.163-2.129,2.728,2.728,0,0,0-1.862-1.4V2.706A2.667,2.667,0,0,0,19.028.754,2.75,2.75,0,0,0,17.137,0H15.449a2.751,2.751,0,0,0-1.892.754A2.658,2.658,0,0,0,12.7,2.706v1.94a2.728,2.728,0,0,0-1.862,1.4,2.659,2.659,0,0,0-.163,2.129H8.429L6.386,5.934a1.216,1.216,0,0,0-.9-.395h-3.2a1.192,1.192,0,1,0,0,2.383H4.95L6.6,9.727l3.492,8.953a.906.906,0,0,0,.846.573h9.608a.9.9,0,0,0,.846-.573l3.625-9.295A.882.882,0,0,0,24.917,8.559ZM12.767,7.032a.574.574,0,0,1,.508-.3h1.6V2.706a.57.57,0,0,1,.573-.565h1.69a.57.57,0,0,1,.573.565V6.728h1.6a.574.574,0,0,1,.508.3.556.556,0,0,1-.038.585l-3.017,4.265a.577.577,0,0,1-.47.241h0a.577.577,0,0,1-.47-.241L12.805,7.617A.556.556,0,0,1,12.767,7.032Z"
                                          fill="#fff"></path>
                                    <path d="M193.852,413.565a1.878,1.878,0,1,0,1.878,1.878A1.878,1.878,0,0,0,193.852,413.565Z"
                                          transform="translate(-181.505 -393.322)" fill="#fff"></path>
                                    <path d="M328.356,413.565a1.878,1.878,0,1,0,1.878,1.878A1.878,1.878,0,0,0,328.356,413.565Z"
                                          transform="translate(-309.391 -393.322)" fill="#fff"></path>
                                </g>
                            </svg>
                            <span class="cart-tooltip"><?php echo esc_html( $product->add_to_cart_text() ); ?></span>
                        </a>
                    </div>
                </div>
            </div>

		<?php endforeach; ?>
    </div>
</div>

<script>
    (function ($) {
        "use strict";

        $(function () {
            $('#eplus-products-carousel-<?php echo esc_attr( $unique_id ); ?>').owlCarousel({
                loop: <?php echo esc_attr( ! empty( $arrows ) ? $arrows : 'false' ); ?>,
                margin: <?php echo esc_attr( ! empty( $gutter ) ? $gutter : '20' ); ?>,
                nav: <?php echo esc_attr( ! empty( $arrows ) ? $arrows : 'false' ); ?>,
                dots: <?php echo esc_attr( ! empty( $dots ) ? $dots : 'false' ); ?>,
                autoplay: <?php echo esc_attr( ! empty( $autoplay ) ? $autoplay : 'false' ); ?>,
                autoplayTimeout: <?php echo esc_attr( ! empty( $autoplay_speed ) ? $autoplay_speed : 2000 ); ?>,
                autoplayHoverPause: <?php echo esc_attr( ! empty( $pause_on_hover ) ? $pause_on_hover : 'false' ); ?>,
                autoHeight: true,
                smartSpeed: <?php echo esc_attr( ! empty( $animation_speed ) ? $animation_speed : 500 ); ?>,
                navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
                responsive: {
                    0: {
                        items: <?php echo esc_attr( ! empty( $mobile_display_columns ) ? $mobile_display_columns : 1 ); ?>,
                    },
                    600: {
                        items: <?php echo esc_attr( ! empty( $tablet_display_columns ) ? $tablet_display_columns : 2 ); ?>,
                    },
                    992: {
                        items: <?php echo esc_attr( ! empty( $display_columns ) ? $display_columns : 4 ); ?>,
                    }
                }
            });
        });

    })(jQuery);
</script>