<?php
/**
 * Element Name: EDD Products Grid
 *
 * @package elements/edd-products/view/template-1
 * @copyright Pluginbazar 2019
 */

$unique_id       = uniqid();
$style           = eplus()->get_shortcode_atts( 'style' );
$excerpt_length  = eplus()->get_shortcode_atts( 'excerpt_length', '14' );
$content_type    = eplus()->get_shortcode_atts( 'content_type', 'by_products' );
$items_per_row   = eplus()->get_shortcode_atts( 'items_per_row', '12' );
$primary_color   = eplus()->get_shortcode_atts( 'primary_color' );
$secondary_color = eplus()->get_shortcode_atts( 'secondary_color' );
$product_ids     = array();

if ( $content_type == 'by_products_category' ) {

	$product_ids = get_posts( array(
		'post_type'      => 'download',
		'posts_per_page' => - 1,
		'fields'         => 'ids',
		'tax_query'      => array(
			array(
				'taxonomy' => 'download_category',
				'field'    => 'term_id',
				'terms'    => explode( ',', eplus()->get_shortcode_atts( 'category_ids' ) ),
			),
		)
	) );
} elseif ( $content_type == 'by_products_tags' ) {
	$product_ids = get_posts( array(
		'post_type'      => 'download',
		'posts_per_page' => - 1,
		'fields'         => 'ids',
		'tax_query'      => array(
			array(
				'taxonomy' => 'download_tag',
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
		'post_type'      => 'download',
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
        #eplus-edd-<?php echo esc_attr( $unique_id ); ?> .edd-submit.button {
            background-color: <?php echo esc_attr( $primary_color ); ?>;
        }

        #eplus-edd-<?php echo esc_attr( $unique_id ); ?> .edd-submit.button:hover {
            background-color: <?php echo esc_attr( $secondary_color ); ?>;
        }

        #eplus-edd-<?php echo esc_attr( $unique_id ); ?> .edd_price_options input:checked:before,
        #eplus-edd-<?php echo esc_attr( $unique_id ); ?> .edd_price_options input:hover:before {
            background-color: <?php echo esc_attr( $primary_color ); ?>;
            border-color: <?php echo esc_attr( $primary_color ); ?>;
        }

        #eplus-edd-<?php echo esc_attr( $unique_id ); ?> .edd_price {
            background-color: <?php echo esc_attr( $secondary_color ); ?>;
        }
    </style>
<?php endif; ?>

<div id="eplus-edd-<?php echo esc_attr( $unique_id ); ?>" class="eplus-edd-products-<?php echo esc_attr( $style ); ?>">

    <div class="pb-row">
		<?php foreach ( $product_ids as $index => $post_id ) :

			global $post;

			$post = get_post( $post_id );

			setup_postdata( $post );

			$has_thumb_class = ! has_post_thumbnail() ? 'no-product-thumb' : '';

			?>

            <div class="pb-col-lg-<?php echo esc_attr( $items_per_row ); ?> pb-col-md-6">
                <div class="edd-product-item <?php echo esc_attr( $has_thumb_class ); ?>">

					<?php if ( has_post_thumbnail() ) : ?>
                        <div class="edd-product-image">
                            <a href="<?php echo esc_url( get_the_permalink() ); ?>">
                                <img src="<?php echo esc_url( get_the_post_thumbnail_url( $post_id ) ); ?>"
                                     alt="<?php echo esc_attr( get_the_title() ); ?>">
                            </a>
                        </div>
					<?php endif; ?>

                    <div class="edd-product-body">
                        <h3 class="edd-product-title">
                            <a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a>
                        </h3>
						<?php edd_price( get_the_ID() ); ?>
                        <div class="edd-product-content">
							<?php if ( has_excerpt() ) : ?>
								<?php echo apply_filters( 'edd_downloads_excerpt', wp_trim_words( get_post_field( 'post_excerpt', get_the_ID() ), $excerpt_length ) ); ?>
							<?php elseif ( get_the_content() ) : ?>
								<?php echo apply_filters( 'edd_downloads_excerpt', wp_trim_words( get_post_field( 'post_content', get_the_ID() ), $excerpt_length ) ); ?>
							<?php endif; ?>
                        </div>
                        <div class="edd-product-footer">
							<?php echo edd_get_purchase_link( array( 'download_id' => get_the_ID() ) ); ?>
                        </div>
                    </div>
                </div>
            </div>

			<?php wp_reset_postdata();
		endforeach; ?>
    </div>
</div>
